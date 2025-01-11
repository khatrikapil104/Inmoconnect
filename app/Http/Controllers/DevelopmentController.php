<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use DB, Redirect, Response, Auth;
use App\Models\Role;
use App\Models\Property;
use App\Models\Category;
use App\Models\Situation;
use App\Models\Type;
use App\Models\Feature;
use App\Models\DevelopmentImage;
use App\Models\PropertyImage;
use App\Models\DevelopmentFloorPlan;
use Illuminate\Validation\Rule;
use File, Str, Hash, Mail, Session;
use App\Events\CrmNotification;
use App\Models\Development;
use App\Models\UserPropertyFeature;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class DevelopmentController extends Controller
{
    public $model        =    'developments';

    public $filterName        =    'developmentListingFilterData';
    public $listRouteUrl;
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {

            $this->listRouteUrl = route(routeNamePrefix() . 'developments.manage', ':id');
            return $next($request);
        });
        View()->share('model', $this->model);
        View()->share('listRouteUrl', $this->listRouteUrl);
        View()->share('filterName', $this->filterName);
        $this->request = $request;
    }

    public function index(Request $request)
    {
        $loggedInUserId = Auth::user()->id;
        $developmentInstance = new Development();
        $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $results = $developmentInstance->loadDevelopments(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], $request->all(), []);


        $listingType = 'development-listing';
        if ($request->ajax()) {

            $tableData =  View("components.tables.custom-table", compact('results', 'listingType'))->render();
            $paginationData =  View("components.tables.pagination", compact('results', 'listingType'))->render();

            $response = array();
            $response["status"] = "success";
            $response["msg"] = "";
            $response['tableData'] = $tableData;
            $response['paginationData'] = $paginationData;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        } else {
            $filterData = $this->getFilterData($this->filterName);
            return  View("modules.$this->model.index", compact('results', 'listingType', 'filterData'));
        }
    }


    public function store(Request $request)
    {
        $loggedInUserId = Auth::user()->id;
        $formData = $request->all();
        if (!empty($formData)) {
            $validator = Validator::make(
                $request->all(),
                array(
                    'development_name' => 'required',
                    'development_number' => [
                        'required',
                        Rule::unique('developments', 'development_number'),
                    ],
                    'cadastral_reference' => 'required',
                    'building_license' => 'required',
                    'start_date' => 'required|date_format:m-Y',
                    'end_date' => 'required|date_format:m-Y|after:start_date',
                    'min_selling_price' => 'required|numeric|gt:0',
                    'max_selling_price' => 'required|numeric|gt:0',
                    'agent_commission_per' => 'required',
                    'brochure' => 'required',
                    'cover_image' => 'required',
                    'development_images' => 'required',
                    'floor_plans' => 'required',
                    'legal_document' => 'required',
                    'location' => 'required',
                    'latitude' => 'required',
                    'longitude' => 'required',
                ),
                array()
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {

                DB::beginTransaction();
                $obj   = new Development;
                $obj->user_id = $loggedInUserId;
                $obj->development_name = $request->development_name;
                $obj->development_description = !empty($request->development_description) ? $request->development_description : Null;
                $obj->development_number = $request->development_number;
                $obj->cadastral_reference = $request->cadastral_reference;
                $obj->building_license = $request->building_license;
                $obj->start_date = \Carbon\Carbon::createFromFormat('m-Y', $request->input('start_date'))->format('m/Y');
                $endDate = \Carbon\Carbon::createFromFormat('m-Y', $request->input('end_date'));
                $obj->end_date = $endDate->format('m/Y');
                $obj->min_selling_price = $request->min_selling_price;
                $obj->max_selling_price = $request->max_selling_price;
                $obj->agent_commission_per = $request->agent_commission_per;
                $obj->location = $request->location;
                $obj->latitude = $request->latitude;
                $obj->longitude = $request->longitude;
                $obj->open_for_collaboration = !empty($request->open_for_collaboration) ? 1 : 0;
                if ($request->hasFile('brochure')) {
                    $extension = $request->file('brochure')->getClientOriginalExtension();
                    $originalName = $request->file('brochure')->getClientOriginalName();
                    $fileName = time() . '-brochure.' . $extension;
                    $folderPath = Config('constant.DEVELOPMENT_IMAGE_ROOT_PATH');
                    if (!File::exists($folderPath)) {
                        File::makeDirectory($folderPath, $mode = 0777, true);
                    }
                    if ($request->file('brochure')->move($folderPath, $fileName)) {
                        $obj->brochure = $fileName;
                    }
                }

                if ($request->hasFile('cover_image')) {
                    $extension = $request->file('cover_image')->getClientOriginalExtension();
                    $originalName = $request->file('cover_image')->getClientOriginalName();
                    $fileName = time() . '-cover_image.' . $extension;
                    $folderPath = Config('constant.PROPERTY_IMAGE_ROOT_PATH');
                    if (!File::exists($folderPath)) {
                        File::makeDirectory($folderPath, $mode = 0777, true);
                    }
                    if ($request->file('cover_image')->move($folderPath, $fileName)) {
                        $obj->cover_image = $fileName;
                    }
                }
                if ($request->hasFile('legal_document')) {
                    $extension = $request->file('legal_document')->getClientOriginalExtension();
                    $originalName = $request->file('legal_document')->getClientOriginalName();
                    $fileName = time() . '-legal_document.' . $extension;
                    $folderPath = Config('constant.DEVELOPMENT_IMAGE_ROOT_PATH');
                    if (!File::exists($folderPath)) {
                        File::makeDirectory($folderPath, $mode = 0777, true);
                    }
                    if ($request->file('legal_document')->move($folderPath, $fileName)) {
                        $obj->legal_document = $fileName;
                    }
                }

                if ($endDate->isBefore(Carbon::today())) {
                    $obj->status = 'running_late';
                } else {
                    $obj->status = 'under_construction';
                }

                $obj->save();
                $lastId = $obj->id;
                if (empty($lastId)) {
                    DB::rollback();
                    $response = array();
                    $response["status"] = "error";
                    $response["msg"] = trans("messages.Something_went_wrong");
                    $response["data"] = (object) array();
                    $response["http_code"] = 500;
                    return Response::json($response, 500);
                }

                if (!empty($request->file('development_images'))) {

                    $files = $request->file('development_images');
                    foreach ($files as $imageKey => $imageVal) {
                        if (!empty($imageVal)) {
                            $extension = $imageVal->getClientOriginalExtension();
                            $fileType = determineFileType($extension);
                            if ($fileType != 'unknown') {
                                $obj = new DevelopmentImage;
                                $obj->development_id = $lastId;
                                $obj->type = $fileType;
                                $originalName = $imageVal->getClientOriginalName();
                                $fileName = time() . '-development_images-' . $lastId . $imageKey . '.' . $extension;


                                $folderPath = Config('constant.DEVELOPMENT_IMAGE_ROOT_PATH');
                                if (!File::exists($folderPath)) {
                                    File::makeDirectory($folderPath, $mode = 0777, true);
                                }
                                if ($imageVal->move($folderPath, $fileName)) {
                                    $obj->image = $fileName;
                                    // $obj->original_image_name = $originalName;
                                }

                                $obj->save();
                                $lastFileId = $obj->id;
                                if (empty($lastFileId)) {
                                    DB::rollback();
                                    $response = array();
                                    $response["status"] = "error";
                                    $response["msg"] = trans("messages.Something_went_wrong");
                                    $response["data"] = (object) array();
                                    $response["http_code"] = 500;
                                    return Response::json($response, 500);
                                }
                            }
                        }
                    }
                }

                if (!empty($request->file('floor_plans'))) {

                    $files = $request->file('floor_plans');
                    foreach ($files as $imageKey => $imageVal) {
                        if (!empty($imageVal)) {
                            $extension = $imageVal->getClientOriginalExtension();
                            $fileType = determineFileType($extension);
                            if ($fileType != 'unknown') {
                                $obj = new DevelopmentFloorPlan;
                                $obj->development_id = $lastId;
                                $obj->type = $fileType;
                                $originalName = $imageVal->getClientOriginalName();
                                $fileName = time() . '-floor_plans-' . $lastId . $imageKey . '.' . $extension;


                                $folderPath = Config('constant.DEVELOPMENT_IMAGE_ROOT_PATH');
                                if (!File::exists($folderPath)) {
                                    File::makeDirectory($folderPath, $mode = 0777, true);
                                }
                                if ($imageVal->move($folderPath, $fileName)) {
                                    $obj->image = $fileName;
                                    // $obj->original_image_name = $originalName;
                                }

                                $obj->save();
                                $lastFileId = $obj->id;
                                if (empty($lastFileId)) {
                                    DB::rollback();
                                    $response = array();
                                    $response["status"] = "error";
                                    $response["msg"] = trans("messages.Something_went_wrong");
                                    $response["data"] = (object) array();
                                    $response["http_code"] = 500;
                                    return Response::json($response, 500);
                                }
                            }
                        }
                    }
                }
                DB::commit();

                $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id, 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_15', 'type' => 'development', 'values' => [auth()->user()->name, $request->development_name]]));

                $response = array();
                $response["status"] = "success";
                $response["msg"] = trans('Development Added Successfully');
                $response["data"] = route(routeNamePrefix() . 'user.index');
                $response["http_code"] = 200;
                return Response::json($response, 200);
            }
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);

        return  View("modules.$this->model.edit", compact('user'));
    }

    public function update(Request $request, $id)
    {

        if (!empty($id)) {
            $formData = $request->all();
            if (!empty($formData)) {
                $validator = Validator::make(
                    $request->all(),
                    array(
                        'development_name' => 'required',
                        'cadastral_reference' => 'required',
                        'building_license' => 'required',
                        'start_date' => 'required|date_format:m-Y',
                        'end_date' => 'required|date_format:m-Y|after:start_date',
                        'min_selling_price' => 'required|numeric|gt:0',
                        'max_selling_price' => 'required|numeric|gt:0',
                        'agent_commission_per' => 'required',
                        'brochure' => !empty($request->removedUploadedbrochureIds) ? 'required' : 'nullable',
                        'cover_image' => !empty($request->removedUploadedcover_imageIds) ? 'required' : 'nullable',
                        'development_images' => 'nullable',
                        'floor_plans' => 'nullable',
                        'legal_document' => !empty($request->removedUploadedlegal_documentIds) ? 'required' : 'nullable',
                        'location' => 'required',
                        'latitude' => 'required',
                        'longitude' => 'required',

                    ),
                    array()
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {

                    DB::beginTransaction();
                    $obj   =  Development::find($id);
                    $obj->development_name = $request->development_name;
                    $obj->development_description = !empty($request->development_description) ? $request->development_description : Null;
                    $obj->development_number = $request->development_number;
                    $obj->cadastral_reference = $request->cadastral_reference;
                    $obj->building_license = $request->building_license;
                    $obj->start_date = \Carbon\Carbon::createFromFormat('m-Y', $request->input('start_date'))->format('m/Y');
                    $endDate = \Carbon\Carbon::createFromFormat('m-Y', $request->input('end_date'));
                    $obj->end_date = $endDate->format('m/Y');
                    $obj->min_selling_price = $request->min_selling_price;
                    $obj->max_selling_price = $request->max_selling_price;
                    $obj->agent_commission_per = $request->agent_commission_per;
                    $obj->location = $request->location;
                    $obj->latitude = $request->latitude;
                    $obj->longitude = $request->longitude;
                    $obj->open_for_collaboration = !empty($request->open_for_collaboration) ? 1 : 0;

                    if ($request->hasFile('brochure')) {
                        $extension = $request->file('brochure')->getClientOriginalExtension();
                        $originalName = $request->file('brochure')->getClientOriginalName();
                        $fileName = time() . '-brochure.' . $extension;
                        $folderPath = Config('constant.DEVELOPMENT_IMAGE_ROOT_PATH');
                        if (!File::exists($folderPath)) {
                            File::makeDirectory($folderPath, $mode = 0777, true);
                        }
                        if ($request->file('brochure')->move($folderPath, $fileName)) {
                            $obj->brochure = $fileName;
                        }
                    }

                    if ($request->hasFile('cover_image')) {
                        $extension = $request->file('cover_image')->getClientOriginalExtension();
                        $originalName = $request->file('cover_image')->getClientOriginalName();
                        $fileName = time() . '-cover_image.' . $extension;
                        $folderPath = Config('constant.PROPERTY_IMAGE_ROOT_PATH');
                        if (!File::exists($folderPath)) {
                            File::makeDirectory($folderPath, $mode = 0777, true);
                        }
                        if ($request->file('cover_image')->move($folderPath, $fileName)) {
                            $obj->cover_image = $fileName;
                        }
                    }
                    if ($request->hasFile('legal_document')) {
                        $extension = $request->file('legal_document')->getClientOriginalExtension();
                        $originalName = $request->file('legal_document')->getClientOriginalName();
                        $fileName = time() . '-legal_document.' . $extension;
                        $folderPath = Config('constant.DEVELOPMENT_IMAGE_ROOT_PATH');
                        if (!File::exists($folderPath)) {
                            File::makeDirectory($folderPath, $mode = 0777, true);
                        }
                        if ($request->file('legal_document')->move($folderPath, $fileName)) {
                            $obj->legal_document = $fileName;
                        }
                    }

                    if ($endDate->isBefore(Carbon::today())) {
                        $obj->status = 'running_late';
                    } else {
                        $obj->status = 'under_construction';
                    }

                    $obj->save();
                    $lastId = $obj->id;
                    if (empty($lastId)) {
                        DB::rollback();
                        $response = array();
                        $response["status"] = "error";
                        $response["msg"] = trans("messages.Something_went_wrong");
                        $response["data"] = (object) array();
                        $response["http_code"] = 500;
                        return Response::json($response, 500);
                    }

                    if (!empty($request->file('development_images'))) {

                        $files = $request->file('development_images');
                        foreach ($files as $imageKey => $imageVal) {
                            if (!empty($imageVal)) {
                                $extension = $imageVal->getClientOriginalExtension();
                                $fileType = determineFileType($extension);
                                if ($fileType != 'unknown') {
                                    $obj = new DevelopmentImage;
                                    $obj->development_id = $lastId;
                                    $obj->type = $fileType;
                                    $originalName = $imageVal->getClientOriginalName();
                                    $fileName = time() . '-development_images-' . $lastId . $imageKey . '.' . $extension;


                                    $folderPath = Config('constant.DEVELOPMENT_IMAGE_ROOT_PATH');
                                    if (!File::exists($folderPath)) {
                                        File::makeDirectory($folderPath, $mode = 0777, true);
                                    }
                                    if ($imageVal->move($folderPath, $fileName)) {
                                        $obj->image = $fileName;
                                        // $obj->original_image_name = $originalName;
                                    }

                                    $obj->save();
                                    $lastFileId = $obj->id;
                                    if (empty($lastFileId)) {
                                        DB::rollback();
                                        $response = array();
                                        $response["status"] = "error";
                                        $response["msg"] = trans("messages.Something_went_wrong");
                                        $response["data"] = (object) array();
                                        $response["http_code"] = 500;
                                        return Response::json($response, 500);
                                    }
                                }
                            }
                        }
                    }

                    if (!empty($request->file('floor_plans'))) {

                        $files = $request->file('floor_plans');
                        foreach ($files as $imageKey => $imageVal) {
                            if (!empty($imageVal)) {
                                $extension = $imageVal->getClientOriginalExtension();
                                $fileType = determineFileType($extension);
                                if ($fileType != 'unknown') {
                                    $obj = new DevelopmentFloorPlan;
                                    $obj->development_id = $lastId;
                                    $obj->type = $fileType;
                                    $originalName = $imageVal->getClientOriginalName();
                                    $fileName = time() . '-floor_plans-' . $lastId . $imageKey . '.' . $extension;


                                    $folderPath = Config('constant.DEVELOPMENT_IMAGE_ROOT_PATH');
                                    if (!File::exists($folderPath)) {
                                        File::makeDirectory($folderPath, $mode = 0777, true);
                                    }
                                    if ($imageVal->move($folderPath, $fileName)) {
                                        $obj->image = $fileName;
                                        // $obj->original_image_name = $originalName;
                                    }

                                    $obj->save();
                                    $lastFileId = $obj->id;
                                    if (empty($lastFileId)) {
                                        DB::rollback();
                                        $response = array();
                                        $response["status"] = "error";
                                        $response["msg"] = trans("messages.Something_went_wrong");
                                        $response["data"] = (object) array();
                                        $response["http_code"] = 500;
                                        return Response::json($response, 500);
                                    }
                                }
                            }
                        }
                    }

                    if (!empty($request->removedUploadeddevelopment_imagesIds)) {
                        $removedUploadeddevelopment_imagesIds = explode(",", $request->removedUploadeddevelopment_imagesIds);
                        DevelopmentImage::whereIn("id", $removedUploadeddevelopment_imagesIds)->delete();
                    }
                    $developmentImagesCount = DevelopmentImage::where('development_id', $lastId)->count();
                    if ($developmentImagesCount == 0) {
                        $validator->errors()->add('development_images', trans('messages.Please_upload_atleast_1_file'));
                        $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                        return Response::json($response, 200);
                    }

                    if (!empty($request->removedUploadedfloor_plansIds)) {
                        $removedUploadedfloor_plansIds = explode(",", $request->removedUploadedfloor_plansIds);
                        DevelopmentFloorPlan::whereIn("id", $removedUploadedfloor_plansIds)->delete();
                    }
                    $developmentImagesCount = DevelopmentFloorPlan::where('development_id', $lastId)->count();
                    if ($developmentImagesCount == 0) {
                        $validator->errors()->add('floor_plans', trans('messages.Please_upload_atleast_1_file'));
                        $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                        return Response::json($response, 200);
                    }
                    DB::commit();

                    $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id, 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_16', 'type' => 'development', 'values' => [auth()->user()->name, $request->development_name]]));

                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans('Development Updated Successfully');
                    $response["data"] = route(routeNamePrefix() . 'user.index');
                    $response["http_code"] = 200;
                    return Response::json($response, 200);
                }
            } else {
                $response = array();
                $response["status"] = "error";
                $response["msg"] = trans("messages.Invalid_request");
                $response["data"] = (object) array();
                $response["http_code"] = 500;
                return Response::json($response, 500);
            }
        } else {
            $response             =   array();
            $response["status"]       =   "error";
            $response["data"]     =   (object)array();
            $response["msg"]      =   trans("messages.The_user_id_field_is_required");
            $response["http_code"]    =   400;
            return response()->json($response, 400);
        }
    }

    public function destroy(Request $request, $id)
    {
        $user = Development::findOrFail($id);

        $user->delete();

        DevelopmentImage::where('development_id', $id)->delete();
        DevelopmentFloorPlan::where('development_id', $id)->delete();

        $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id, 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_17', 'type' => 'development', 'values' => [auth()->user()->name, $user->development_name]]));

        return redirect()->route(routeNamePrefix() . 'developments.index')->with('flash_notice', trans('Development Deleted Successfully'));
    }

    public function unitDestroy($id, Request $request)
    {
        $property = Property::where('id', $id)->whereNull('properties.deleted_at')->first();;
        if (!empty($property)) {
            if (auth()->user()->role->name == 'agent' && $property->owner_id != auth()->user()->id) {
                return Redirect()->route(routeNamePrefix() . 'user.dashboard')->with('error', trans('messages.You_are_not_authorized_to_access_this_functionality'));
            }

            $dynamicValues =  $property->reference;
            $loggedInUserRole = auth()->user()->role->name;
            if ($loggedInUserRole == 'agent') {

                // Notification for  agents
                event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_10',  [
                    'action_url' => route(routeNamePrefix() . 'properties.index'),
                    'type' => 'property',
                    'reference_id' => null,
                    'values' => $dynamicValues
                ]));
            } 
            
            elseif ($loggedInUserRole == 'developer') {

                // Notification for  agents
                event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_10',  [
                    'action_url' => route(routeNamePrefix() . 'properties.index'),
                    'type' => 'property',
                    'reference_id' => null,
                    'values' => $dynamicValues
                ]));
            } 
            else {

                event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_10', [
                    'action_url' => route(routeNamePrefix() . 'properties.index'),
                    'type' => 'property',
                    'reference_id' => null,
                    'values' => $dynamicValues
                ]));

                event(new CrmNotification($property->owner_id, 'CRM_NOTIFICATION_7', ['action_url' => route(routeNamePrefix() . 'properties.index'), 'type' => 'property', 'reference_id' => $id, 'values' => $dynamicValues]));
            }

            $property->delete();
            Session()->flash('success', trans('messages.Property_deleted_successfully'));
            $previousUri = $request->server('HTTP_REFERER');
            return redirect()->to($previousUri);
        } else {
            Session()->flash('error', trans('messages.Invalid_request'));
            return redirect()->route(routeNamePrefix() . 'developments.index');
        }
    }


    public function loadEditView(Request $request, $id)
    {

        $developmentInstance = new Development();
        $result = $developmentInstance->loadDevelopments(['recordId' => $id], $request->all(), []);
        if (!empty($result)) {
            $developmentImages = DevelopmentImage::where('development_id', $result->id)->orderBy('created_at', 'asc')->get();
            $floorPlans = DevelopmentFloorPlan::where('development_id', $result->id)->orderBy('created_at', 'asc')->get();

            $coverImageInstance = new Development;
            $coverImageInstance->image = $result->cover_image;
            $coverImageInstance->id = $result->id . "01";
            $coverImageInstance->type = 'image';

            $brochureInstance = new Development;
            $brochureInstance->image = $result->brochure;
            $brochureInstance->id = $result->id . "03";
            $brochureInstance->type = 'document';


            $legalDocumentInstance = new Development;
            $legalDocumentInstance->image = $result->legal_document;
            $legalDocumentInstance->id = $result->id . "02";
            $legalDocumentInstance->type = 'document';

            $type = 'edit';
            $htmlData = View('modules.developments.includes.create_edit_development', compact('result', 'type', 'coverImageInstance', 'legalDocumentInstance', 'developmentImages', 'floorPlans', 'brochureInstance'))->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = '';
            $response["data"] = $htmlData;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }

    public function manage(Request $request, $id)
    {
        // $previousUri = $request->server('HTTP_REFERER');
        // if(strpos($previousUri, 'developments/create-unit') !== false && Session::has('developmentUnitData')){
        //     $developmentUnitData = Session::get('developmentUnitData');

        // }else{
        //     $developmentUnitData = [];
        // }

        $loggedInUserId = Auth::user()->id;
        $listingType = 'development-unit-listing';
        $developmentInstance = new Development();
        $result = $developmentInstance->loadDevelopments(['singleRecord' => true, 'recordId' => $id], $request->all(), []);

        if (!empty($result)) {
            $developmentImagesData = DevelopmentImage::where('development_id', $result->id)->orderBy('created_at', 'asc')->get();
            
            if (!empty($result->cover_image)) {
                $coverImageInstance = new Development;
                $coverImageInstance->image = $result->cover_image;
                $coverImageInstance->type = 'image';
                $developmentImagesData->prepend($coverImageInstance);
            }
            $developmentImageCount = $developmentImagesData->count();
            if ($developmentImageCount < 4) {
                for ($i = $developmentImageCount + 1; $i <= 4; $i++) {
                    $dummyImage = new DevelopmentImage();
                    $dummyImage->image = asset('img/default-property.jpg');
                    $dummyImage->type = 'image';
                    $developmentImagesData->push($dummyImage);
                }
            }
            $floorPlans = DevelopmentFloorPlan::where('development_id', $result->id)->orderBy('created_at', 'asc')->get();
            $situations = Situation::pluck('name', 'id');
            $types = Type::pluck('name', 'id');
            $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
            $propertyInstance = new Property();
            $developmentUnitsData = $propertyInstance->loadPropertiesByAgentId(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId, 'development_id' => $id], $request->all());
            $csvFormatFilePath = asset('assets/data/units_csv_format.csv');


            // Edit Development Related Things
            $developmentImages = DevelopmentImage::where('development_id', $result->id)->orderBy('created_at', 'asc')->get();
            $coverImageInstance = new Development;
            $coverImageInstance->image = $result->cover_image;
            $coverImageInstance->id = $result->id . "01";
            $coverImageInstance->type = 'image';

            $brochureInstance = new Development;
            $brochureInstance->image = $result->brochure;
            $brochureInstance->id = $result->id . "03";
            $brochureInstance->type = 'document';


            $legalDocumentInstance = new Development;
            $legalDocumentInstance->image = $result->legal_document;
            $legalDocumentInstance->id = $result->id . "02";
            $legalDocumentInstance->type = 'document';
            $type = 'edit';
            if ($request->ajax()) {
                if (!empty($request->development_status)) {
                    $data = Property::whereIn('id', $request->selectedCheckboxesArr)->update(['status' => $request->development_status]);
                    return redirect()->route(routeNamePrefix() . 'developments.index');
                } else {
                    $results = $developmentUnitsData;
                    $tableData = View("components.tables.custom-table", compact('results', 'listingType'))->render();
                    $paginationData = View("components.tables.pagination", compact('results', 'listingType'))->render();
                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = "";
                    $response['tableData'] = $tableData;
                    $response['paginationData'] = $paginationData;
                    $response["http_code"] = 200;
                    return Response::json($response, 200);
                }
            }

            return view("modules.developments.manage", compact('result', 'developmentImagesData', 'floorPlans', 'situations', 'types', 'developmentUnitsData', 'listingType', 'csvFormatFilePath', 'type', 'coverImageInstance', 'legalDocumentInstance', 'developmentImages', 'floorPlans', 'brochureInstance'));
        } else {
            Session()->flash('error', trans('messages.Invalid_request'));
            return redirect()->route(routeNamePrefix() . 'developments.index');
        }
    }


    public function addUnit(Request $request, $id)
    {
        $loggedInUserId = Auth::user()->id;
        $formData = $request->all();
        $developmentInstance = new Development();
        $result = $developmentInstance->loadDevelopments(['singleRecord' => true, 'recordId' => $id], $request->all(), []);
        if (!empty($result)) {
            if (!empty($formData)) {
                $validator = Validator::make(
                    $request->all(),
                    array(
                        'type_id' => 'required',
                        'subtype_id' => 'required',
                        'situation_id' => 'required',

                    ),
                    array()
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {
                    $request->merge(['development_id' => $id]);
                    $request->merge(['development_name' => $result->development_name]);

                    Session::put('developmentUnitData', $request->all());

                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans('Processing');
                    $response["data"] = route(routeNamePrefix() . 'developments.createUnit');
                    $response["http_code"] = 200;
                    return Response::json($response, 200);
                }
            } else {
                $response = array();
                $response["status"] = "error";
                $response["msg"] = trans("messages.Invalid_request");
                $response["data"] = (object) array();
                $response["http_code"] = 500;
                return Response::json($response, 500);
            }
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }

    public function submitUploadedProperties(Request $request, $id)
    {
        $loggedInUserId = Auth::user()->id;
        $formData = $request->all();
        $developmentInstance = new Development();
        $result = $developmentInstance->loadDevelopments(['singleRecord' => true, 'recordId' => $id], $request->all(), []);
        $gettingAlreadyCreatedUnit = Property::where('development_id', $id)->whereNull('deleted_at')->orderBy('created_at', 'desc')->first();
        if (!empty($result) && !empty($gettingAlreadyCreatedUnit)) {
            $data = $request->input('uploadedPropertiesData');
            // Define base rules without requiring `property_checkbox`
            $rules = [];
            $messages = [
                "uploadedPropertiesData.*.reference.required" => 'Required',
                "uploadedPropertiesData.*.type_id.required" => 'Required',
                "uploadedPropertiesData.*.size.required" => 'Required',
                "uploadedPropertiesData.*.size.numeric" => 'Should be Numeric',
                "uploadedPropertiesData.*.price.required" => 'Required',
                "uploadedPropertiesData.*.price.numeric" => 'Should be Numeric',
            ];
            // Add conditional validation for other fields only when `property_checkbox` is checked (1)
            foreach ($data as $index => $item) {
                if (!empty($item['property_checkbox']) && $item['property_checkbox'] == 1) {
                    $rules["uploadedPropertiesData.$index.reference"] = 'required';
                    $rules["uploadedPropertiesData.$index.type_id"] = 'required';
                    $rules["uploadedPropertiesData.$index.size"] = 'required|numeric';
                    $rules["uploadedPropertiesData.$index.price"] = 'required|numeric';
                }
            }

            // Initialize the validator with conditional rules
            $validator = Validator::make($request->all(), $rules, $messages);

            $validator->after(function ($validator) use ($data, $gettingAlreadyCreatedUnit) {
                // Filter data to include only items where `property_checkbox` is checked
                $filteredData = array_filter($data, fn($item) => !empty($item['property_checkbox']) && $item['property_checkbox'] == 1);
                $referenceValues = array_column($filteredData, 'reference');

                if (count($referenceValues) !== count(array_unique($referenceValues))) {
                    $validator->errors()->add('uploadedPropertiesData', 'Each reference field must be unique within the form.');
                }


                foreach ($filteredData as $index => $item) {
                    $exists = DB::table('properties')->where('reference', $item['reference'])->where('id', '!=', $gettingAlreadyCreatedUnit->id)->exists();
                    if ($exists) {
                        $validator->errors()->add("uploadedPropertiesData.$index.reference", "Already Exists");
                    }
                }
            });

            if ($validator->fails()) {
                $formattedErrors = [];
                foreach ($validator->errors()->toArray() as $key => $messages) {
                    // Convert dot notation to bracket notation
                    $formattedKey = preg_replace('/\.(\d+)\./', '[$1][', $key) . ']';
                    $formattedErrors[$formattedKey] = $messages;
                }
                // $response = $this->change_error_msg_layout_custom($validator->errors()->getMessages());
                // return Response::json($response, 200);
                return response()->json([
                    'status' => 'error',
                    'type' => 'custom',
                    'errors' => $formattedErrors
                ], 200);
            }
            $uploadedPropertiesData = $request->input('uploadedPropertiesData');
            $newRecords = [];
            request()->merge(['bypass_accessor' => true]);
            for ($i = 0; $i < count($uploadedPropertiesData); $i++) {
                if ($i == 0) {
                    $gettingAlreadyCreatedUnit->reference = $uploadedPropertiesData[$i]['reference'];
                    $gettingAlreadyCreatedUnit->type_id = $uploadedPropertiesData[$i]['type_id'];
                    $gettingAlreadyCreatedUnit->size = $uploadedPropertiesData[$i]['size'];
                    $gettingAlreadyCreatedUnit->price = $uploadedPropertiesData[$i]['price'];
                    $gettingAlreadyCreatedUnit->status = $request->status ?? 'published';
                    $gettingAlreadyCreatedUnit->save();
                    
                } else {

                    $newRecord = $gettingAlreadyCreatedUnit->replicate();
                    $newRecord->reference = $uploadedPropertiesData[$i]['reference'];
                    $newRecord->type_id = $uploadedPropertiesData[$i]['type_id'];
                    $newRecord->size = $uploadedPropertiesData[$i]['size'];
                    $newRecord->price = $uploadedPropertiesData[$i]['price'];
                    $newRecord->status = $request->status ?? 'published';
                    
                    $newRecords[] = $newRecord->getAttributes();
                 
                }
                event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_8',  [
                    'action_url' => route(routeNamePrefix() . 'properties.show', $uploadedPropertiesData[$i]['reference']),
                    'type' => 'property',
                    'reference_id' => null,
                    'values' => $uploadedPropertiesData[$i]['reference']
                ]));
            }
            
            if (!empty($newRecords)) {
                $alreadyExistingPropertyImages = PropertyImage::where('property_id',$gettingAlreadyCreatedUnit->id)->get();
                foreach ($newRecords as $record) {
                    $property = Property::create($record); 
                    // $property->cover_image = Property::getCoverImageWithoutAccessor($property->cover_image);
                    // $property->save();
                    // print_r($property->cover_image);die;
                    if(!empty($property->id) && !empty($alreadyExistingPropertyImages)){
                        // Property::where('id',$property->id)->update(['cover_image' => Property::getCoverImageWithoutAccessor($property->cover_image) ]);
                        foreach($alreadyExistingPropertyImages as $propertyImage){
                            $newPropertyImageRecord = $propertyImage->replicate();
                            $newPropertyImageRecord->property_id = $property->id;
                            // $newPropertyImageRecord->image = $propertyImage->getOriginal('image');
                            $lastPropertyImage = PropertyImage::create($newPropertyImageRecord->getAttributes());
                            // if(!empty($lastPropertyImage->id)){
                            //     PropertyImage::where('id',$property->id)->update(['image' => PropertyImage::getImageWithoutAccessor($property->image) ]);
                            // }
                        }
                    }
                }
               
            }
            $response = array();
            $response["status"] = "success";
            $response["msg"] = 'Development units added successfully';
            $response["data"] = route(routeNamePrefix() . 'developments.manage', $id);
            $response["http_code"] = 200;
            return Response::json($response, 200);
            return response()->json([
                'status' => 'success',
                'message' => 'Development units added successfully'
            ], 200);
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }
}
