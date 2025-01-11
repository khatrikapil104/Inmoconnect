<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Request AS CustomerRequest;
use App\Models\Property;
use App\Models\Rejectproposals;
use App\Models\CustomerInquiry;
use App\Models\Collaborates;
use DB, Redirect, Response, Auth, File,Session;
use App\Models\Category;
use App\Models\Situation;
use App\Models\Type;
use App\Models\NewProperty;
use App\Models\User;
use App\Models\Feature;
use App\Models\Role;
use App\Models\Subtype;
use App\Models\PropertyImage;
use App\Models\PropertyFeature;
use App\Models\ViewedUserProperty;
use App\Models\PropertyDocument;
use App\Models\userCompanyDetail;
use App\Models\AgentLead;
use App\Models\Development;

use App\Models\UserProfessionalInformation;
use App\Models\Commission;
use App\Models\Project;
use  App\Models\ProjectProperty;
use  App\Models\ProjectCustomer;
use  App\Models\ProjectAgent;
use  App\Models\ProjectAgentPermission;


use Illuminate\Validation\Rule;
use App\Events\CrmNotification;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PropertyController extends Controller
{
    public $model = 'properties';
    public $filterName = 'propertyListingFilterData';
    public $listRouteUrl;
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {

            $this->listRouteUrl = route(routeNamePrefix() . 'properties.index');
            return $next($request);
        });
        View()->share('model', $this->model);
        View()->share('listRouteUrl', $this->listRouteUrl);
        View()->share('filterName', $this->filterName);
        $this->request = $request;
    }
    public function index(Request $request)
    {
        $pageType = !empty($request->pageType) ? $request->pageType : '';
        $loggedInUserId = Auth::user()->id;
        $DB = Property::leftJoin('users', 'users.id', 'properties.owner_id');
        $userInstance = new User();
        if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'developer') {
            if ($pageType == 'company' && auth()->user()->role->name == 'agent') {
                $getCompanyUserIds = $userInstance->loadUserMembers(['userId' => $loggedInUserId, 'user_role_id' => getUserRoleId('sub-agent'), 'withSelf' => false, 'pluck' => 'users.id'], $request->all(), []);
                $DB->whereIn('properties.owner_id', !empty($getCompanyUserIds) ? $getCompanyUserIds : []);
            } else {
                $DB->where('properties.owner_id', auth()->user()->id);
            }
            $DB->select('properties.*', 'users.name as agent_name', DB::raw('(SELECT development_name from developments where id = properties.development_id LIMIT 1) as development_name'), DB::raw('(SELECT agent_commission_per from developments where id = properties.development_id LIMIT 1) as agent_commission_per'),DB::raw('(SELECT development_number from developments where id = properties.development_id LIMIT 1) as development_number'), DB::raw('(SELECT company_name from user_company_details where user_id = properties.owner_id LIMIT 1) as user_company_name'), DB::raw('(SELECT company_image from user_company_details where user_id = properties.owner_id LIMIT 1) as user_company_image'));
        } else if (auth()->user()->role->name == 'customer') {
            $DB->select('properties.*', 'users.name as agent_name', DB::raw('MAX(requests.status) as request_status'))
                // ->where('properties.owner_id','=',auth()->user()->id)
                ->leftJoin('requests', function ($join) use ($loggedInUserId) {
                    $join->on('users.id', '=', 'requests.to')
                        ->where('requests.from', '=', $loggedInUserId)
                        ->orWhere(function ($query) use ($loggedInUserId) {
                            $query->on('users.id', '=', 'requests.from')
                                ->where('requests.to', '=', $loggedInUserId);
                        });
                });
        } else {
            $DB->select('properties.*', 'users.name as agent_name');
        }
        $searchData = !empty($request->{$this->filterName}) ? $request->{$this->filterName} : (session()->has($this->filterName) ? session()->get($this->filterName) : '');
        if (!empty($searchData)) {

            if ((isset($searchData['min_price'])) && (isset($searchData['max_price']))) {
                $searchData['min_price'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['min_price']));
                $searchData['max_price'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['max_price']));
                $DB->whereBetween('properties.price', [$searchData['min_price'], $searchData['max_price']]);
            }
            if ((isset($searchData['min_size'])) && (isset($searchData['max_size']))) {
                $searchData['min_size'] = str_replace(',', '', $searchData['min_size']);
                $searchData['max_size'] = str_replace(',', '', $searchData['max_size']);
                $DB->whereBetween('properties.size', [$searchData['min_size'], $searchData['max_size']]);
            }
            if ((!empty($searchData['type_id']))) {
                $DB->where('properties.type_id', $searchData['type_id']);
            }
            if ((!empty($searchData['reference']))) {
                $DB->where('properties.reference', $searchData['reference']);
            }
            if ((!empty($searchData['state']))) {
                $DB->where('properties.state', $searchData['state']);
            }
            if ((!empty($searchData['floors']))) {
                $DB->where('properties.floors', '>=', $searchData['floors']);
            }
            if ((!empty($searchData['bedrooms']))) {
                $DB->where('properties.bedrooms', '>=', $searchData['bedrooms']);
            }
            if ((!empty($searchData['bathrooms']))) {
                $DB->where('properties.bathrooms', '>=', $searchData['bathrooms']);
            }

            session()->put($this->filterName, $searchData);
        }

        $sortBy = $request->input('sortBy') ? $request->input('sortBy') : 'properties.created_at';
        $order = $request->input('order') ? $request->input('order') : 'desc';
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $DB->where('properties.status','published')->whereNull('properties.deleted_at');

        if($pageType == 'company' && auth()->user()->role->name == 'agent' ){
            $listingType = 'property-listing-company';
        }elseif($pageType == 'collaborated'){
            $listingType = 'property-listing-collaborated';
            $DB->where('collaborated',1);
        }else{
            $listingType = 'property-listing';
        }
        $results = $DB->groupBy('properties.id')->orderBy($sortBy, $order)->paginate($recordsPerPage);
        // echo "<pre>"; print_r($results); echo "</pre>"; die();
        if ($request->ajax()) {

            $tableData = View("components.tables.custom-table", compact('results', 'listingType', 'pageType'))->render();
            $paginationData = View("components.tables.pagination", compact('results', 'listingType'))->render();

            $response = array();
            $response["status"] = "success";
            $response["msg"] = "";
            $response['tableData'] = $tableData;
            $response['paginationData'] = $paginationData;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        } else {
            //echo "<pre>"; print_r($results); echo "</pre>"; die();
            $filterData = $this->getFilterData($this->filterName);
            return View("modules.$this->model.index", compact('results', 'listingType', 'filterData', 'searchData','pageType'));
        }
    }

    public function create(Request $request, $reference = null)
    {
        $property = Property::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        $situations = Situation::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        // $features = Feature::select('name', 'id', 'icon')->get()->toArray();
        $features = Feature::with('subFeature')->select('name', 'id', 'icon')->get()->toArray();
        $user = User::where('id', Auth::user()->id)->first();

        $agentsDropdown = User::whereHas('role', function ($query) {
            $query->where('name', 'agent');
        })->whereNotNull('email_verified_at')->where('is_active', 1)->whereNull('deleted_at')->pluck('name', 'id');
        $property = Property::where('reference', $reference)->whereNull('deleted_at')->first();
        if (!empty($reference)) {
            if ((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent') && $property->owner_id != auth()->user()->id) {
                return Redirect()->route(routeNamePrefix() . 'user.dashboard')->with('error', trans('messages.You_are_not_authorized_to_access_this_page'));
            }
            if (!empty($property)) {
                $propertyImages = PropertyImage::where('property_id', $property->id)->orderBy('created_at', 'asc')->get();
                return view("modules.$this->model.create", compact('property', 'categories', 'situations', 'types', 'user', 'features', 'propertyImages', 'agentsDropdown'));
            } else {
                Session()->flash('error', trans('messages.Invalid_request'));
                return redirect()->route(routeNamePrefix() . 'properties.index');
            }
        } else {
            $property = [];
            return view("modules.$this->model.create", compact('categories', 'situations', 'types', 'user', 'features', 'property', 'agentsDropdown'));
        }
    }

    public function createNewPropertyPage(Request $request, $reference = null)
    {
        $property = NewProperty::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        $situations = Situation::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $features = Feature::with('subFeature')->select('name', 'id', 'icon')->get()->toArray();
        $user = User::where('id', Auth::user()->id)->first();
        $userProfessionalInfo = UserProfessionalInformation::where('user_id', Auth::user()->id)->first();

        $subtype = Subtype::pluck('name', 'id');

        $agentsDropdown = User::whereHas('role', function ($query) {
            $query->where('name', 'agent');
        })->whereNotNull('email_verified_at')->where('is_active', 1)->whereNull('deleted_at')->pluck('name', 'id');
        $property = NewProperty::where('reference', $reference)->whereNull('deleted_at')->select('properties.*', DB::raw('cover_image as cover_image_new'))->first();
        $companyDetails = auth()->user()->companyDetails;
        if (!empty($reference)) {
            if ((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent') && $property->owner_id != auth()->user()->id) {
                return Redirect()->route(routeNamePrefix() . 'user.dashboard')->with('error', trans('messages.You_are_not_authorized_to_access_this_page'));
            }
            if (!empty($property)) {
                // dd($property);
                $propertyImages = PropertyImage::where('property_id', $property->id)->orderBy('created_at', 'asc')->get();
                $documentData = PropertyDocument::where('property_id', $property->id)->get();


                if (!empty($property->cover_image_new)) {

                    $coverImageInstance = new Property;
                    $coverImageInstance->image = $property->cover_image;
                    $coverImageInstance->id = $property->id . "01";
                    $coverImageInstance->type = 'image';
                } else {
                    $coverImageInstance = [];
                }
                return view("modules.$this->model.create-new-property", compact('property', 'categories', 'situations', 'types', 'user', 'features', 'propertyImages', 'agentsDropdown', 'subtype', 'documentData', 'coverImageInstance', 'userProfessionalInfo', 'companyDetails'));
            } else {
                Session()->flash('error', trans('messages.Invalid_request'));
                return redirect()->route(routeNamePrefix() . 'properties.index');
            }
        } else {
            $property = [];
            $developmentUnitData = [];
            $coverImageInstance = [];
            $previousUri = $request->server('HTTP_REFERER');
            if (requestSegment(1) == 'developments') {
                if (strpos($previousUri, 'developments/manage') !== false && Session::has('developmentUnitData')) {

                    $developmentUnitData = Session::get('developmentUnitData');
                    $developmentData = Development::where('id',$developmentUnitData['development_id'])->select('developments.*',DB::raw('cover_image as cover_image_new'))->first();
                    if(!empty($developmentData)){

                        $property = new Property;
                        $property->type_id = $developmentUnitData['type_id'];
                        $property->subtype_id = $developmentUnitData['subtype_id'];
                        $property->situation_id = $developmentUnitData['situation_id'];
                        $property->address = $developmentData->location ?? '';
                        $property->latitude = $developmentData->latitude ?? '';
                        $property->longitude = $developmentData->longitude ?? '';
                 
                        if (!empty($developmentData->cover_image_new)) {
                            
                            $coverImageInstance = new Property;
                            $coverImageInstance->image = $developmentData->cover_image;
                            $coverImageInstance->id = $developmentData->id . "01";
                            $coverImageInstance->type = 'image';
                        } else {
                            $coverImageInstance = [];
                        }
                        
                        
                    }else{
                        Session()->flash('error', trans('Something Went Wrong While Adding Development Units'));
                        return redirect()->back();
                    }
                }else{
                    Session()->flash('error', trans('Cannot Add The Unit Right Away. Please add it from developments section'));
                    return redirect()->back();
                }
            }
            // $uploadedPropertiesData = Property::where('id',15)->first();
            // $copies = 5;


            return view("modules.$this->model.create-new-property", compact('categories', 'types', 'user', 'features', 'property', 'agentsDropdown', 'property', 'subtype', 'situations', 'userProfessionalInfo','developmentUnitData','companyDetails','coverImageInstance'));

        }
    }

    public function fetchSubtypes($typeId)
    {
        //dd(123);
        $typeId = explode(',', $typeId);
        if (!empty($typeId)) {

            $subtypes = Subtype::whereIn('type_id', $typeId)->get();

            return response()->json($subtypes);
        }
    }
    // public function store(Request $request, $reference = null)
    // {
    //     //dd('Hiiii');
    //     $formData = $request->all();
    //     $propertySuccessMessage = !empty($reference) ? trans('messages.Property_updated_successfully') : trans('messages.Property_added_successfully');

    //     if (!empty($formData)) {
    //         Validator::extend('lat_lng_should_not_empty', function ($attribute, $value, $parameters, $validator) {
    //             $latitudeField = $parameters[0] ?? 'latitude';
    //             $longitudeField = $parameters[1] ?? 'longitude';

    //             $latitude = $validator->getData()[$latitudeField] ?? null;
    //             $longitude = $validator->getData()[$longitudeField] ?? null;

    //             // Check if both latitude and longitude are not empty
    //             return !empty($latitude) && !empty($longitude);
    //         });
    //         Validator::extend('contains_whitespace', function ($attribute, $value, $parameters, $validator) {
    //             return !preg_match('/\s/', $value);
    //         });
    //         $validator = Validator::make(
    //             $request->all(),
    //             array(
    //                 'category_id' => 'required',
    //                 'situation_id' => 'required',
    //                 'type_id' => 'required',
    //                 'owner_id' => (Auth::user()->role->name == 'superadmin' || Auth::user()->role->name == 'admin') ? 'required' : '',
    //                 'reference' => 'required|contains_whitespace|unique:properties,reference' . (!empty($reference) ? ',' . (Property::where('reference', $reference)->value('id')) : ''),
    //                 'name' => 'required',
    //                 'description' => 'required',
    //                 'vendor_name' => 'required',
    //                 'vendor_email' => 'required|email',
    //                 'vendor_mobile' => ['nullable'],
    //                 'vendor_phone' => ['nullable'],
    //                 // , 'regex:/\+\((\d{1,2})\) \((\d{4})\) \((\d{3})\) \((\d{3})\)/'
    //                 'vendor_address' => 'required',
    //                 'bedrooms' => 'required',
    //                 'bathrooms' => 'required',
    //                 'floors' => 'required',
    //                 'size' => 'required|numeric|gt:0|between:1,999999999999999999.99',
    //                 'price' => 'required|numeric|gt:0|between:1,999999999999999999.99',
    //                 'street_number' => 'required',
    //                 'street_name' => 'required',
    //                 'zipcode' => 'required',
    //                 'address' => 'required|lat_lng_should_not_empty:latitude,longitude',
    //                 'latitude' => 'required',
    //                 'longitude' => 'required',
    //                 'files' => (!empty($reference) ? 'nullable' : 'required'),


    //             ),
    //             array(
    //                 "category_id.required" => trans("messages.The_category_field_is_required"),
    //                 "situation_id.required" => trans("messages.The_situation_field_is_required"),
    //                 "type_id.required" => trans("messages.The_type_field_is_required"),
    //                 "owner_id.required" => trans("messages.The_property_owner_field_is_required"),
    //                 "reference.required" => trans("messages.The_reference_field_is_required"),
    //                 "reference.unique" => trans("messages.The_reference_has_already_been_taken"),
    //                 "reference.contains_whitespace" => trans("messages.The_reference_field_should_not_contain_any_whitespaces"),
    //                 "name.required" => trans("messages.The_name_field_is_required"),
    //                 "description.required" => trans("messages.The_description_field_is_required"),
    //                 "vendor_name.required" => trans("messages.The_vendor_name_field_is_required"),
    //                 "vendor_email.required" => trans("messages.The_vendor_email_field_is_required"),
    //                 "vendor_email.email" => trans("messages.The_vendor_email_field_must_be_a_valid_email_address"),
    //                 "vendor_address.required" => trans("messages.The_vendor_address_field_is_required"),
    //                 "bedrooms.required" => trans("messages.The_bedrooms_field_is_required"),
    //                 "bathrooms.required" => trans("messages.The_bathrooms_field_is_required"),
    //                 "floors.required" => trans("messages.The_floors_field_is_required"),
    //                 "size.required" => trans("messages.The_size_field_is_required"),
    //                 "size.numeric" => trans("messages.The_size_must_be_a_numeric_value"),
    //                 "size.gt" => trans("messages.The_size_field_must_be_greater_than_0"),
    //                 "price.required" => trans("messages.The_price_field_is_required"),
    //                 "price.numeric" => trans("messages.The_price_must_be_a_numeric_value"),
    //                 "price.gt" => trans("messages.The_price_field_must_be_greater_than_0"),
    //                 "street_number.required" => trans("messages.The_street_number_field_is_required"),
    //                 "street_name.required" => trans("messages.The_street_name_field_is_required"),
    //                 "zipcode.required" => trans("messages.The_zipcode_field_is_required"),
    //                 "address.required" => trans("messages.The_address_name_field_is_required"),
    //                 "address.lat_lng_should_not_empty" => trans("messages.Please_enter_valid_address"),
    //                 "latitude.required" => trans("messages.The_latitude_field_is_required"),
    //                 "longitude.required" => trans("messages.The_longitude_field_is_required"),
    //                 "files.required" => trans("messages.Please_upload_atleast_1_file"),
    //             )
    //         );
    //         if ($validator->fails()) {
    //             $response = $this->change_error_msg_layout($validator->errors()->getMessages());
    //             return Response::json($response, 200);
    //         } else {

    //             $owner_id = auth()->user()->id;
    //             $owner_name = auth()->user()->name;

    //             // $agentRoleId = Role::where('name','agent')->value('id');

    //             DB::beginTransaction();

    //             if (!empty($reference)) {
    //                 $obj = Property::where('reference', $reference)->first();
    //             } else {
    //                 $obj = new Property;
    //             }
    //             $obj->category_id = $request->input('category_id');
    //             $obj->situation_id = $request->input('situation_id');
    //             $obj->type_id = $request->input('type_id');
    //             $obj->reference = $request->input('reference');
    //             $obj->name = $request->input('name');
    //             if (Auth::user()->role->name == 'superadmin' || Auth::user()->role->name == 'admin') {
    //                 $user_name = User::where('id', $request->input('owner_id'))->value('name');
    //                 $obj->owner_id = $request->input('owner_id');
    //                 $obj->owner_name = $user_name;
    //             } elseif (Auth::user()->role->name == 'agent') {
    //                 $obj->owner_id = $owner_id;
    //                 $obj->owner_name = $request->input('owner_name');
    //             }
    //             $obj->description = $request->input('description');
    //             $obj->vendor_name = $request->input('vendor_name');
    //             $obj->vendor_phone = !empty($request->input('vendor_phone')) ? $request->input('vendor_phone') : Null;
    //             $obj->vendor_fax =!empty($request->input('vendor_fax')) ? $request->input('vendor_fax') : Null;
    //             $obj->vendor_mobile = !empty($request->input('vendor_mobile')) ? $request->input('vendor_mobile') : Null;
    //             $obj->vendor_email = $request->input('vendor_email');
    //             $obj->vendor_address = !empty($request->input('vendor_address')) ? $request->input('vendor_address') : Null;
    //             $obj->bedrooms = $request->input('bedrooms');
    //             $obj->bathrooms = $request->input('bathrooms');
    //             $obj->floors = $request->input('floors');
    //             $obj->size = $request->input('size');
    //             $obj->price = $request->input('price');
    //             $obj->street_number = $request->input('street_number');
    //             $obj->street_name = $request->input('street_name');
    //             $obj->zipcode = $request->input('zipcode');
    //             $obj->address = $request->input('address');
    //             $obj->notes = $request->input('notes');
    //             $obj->latitude = !empty($request->input('latitude')) ? $request->input('latitude') : NULL;
    //             $obj->longitude = !empty($request->input('longitude')) ? $request->input('longitude') : NULL;
    //             $obj->country = !empty($request->input('country')) ? $request->input('country') : NULL;
    //             $obj->state = !empty($request->input('state')) ? $request->input('state') : NULL;
    //             $obj->city = !empty($request->input('city')) ? $request->input('city') : NULL;


    //             $obj->save();
    //             $lastId = $obj->id;
    //             if (!empty($lastId)) {

    //                 if (!empty($request->feature_id)) {
    //                     foreach ($request->feature_id as $featureVal) {
    //                         if (!empty($featureVal)) {

    //                             $checkFeatureVal = PropertyFeature::where('property_id', $lastId)->where('feature_id', $featureVal)->first();
    //                             if (!empty($checkFeatureVal)) {
    //                                 $featureObj = $checkFeatureVal;
    //                             } else {
    //                                 $featureObj = new PropertyFeature;
    //                             }
    //                             $featureObj->property_id = $lastId;
    //                             $featureObj->feature_id = $featureVal;
    //                             $featureObj->save();
    //                             $lastFeatureId = $featureObj->id;
    //                             if (empty($lastFeatureId)) {
    //                                 DB::rollback();
    //                                 $response = array();
    //                                 $response["status"] = "error";
    //                                 $response["msg"] = trans("messages.Something_went_wrong");
    //                                 $response["data"] = (object) array();
    //                                 $response["http_code"] = 500;
    //                                 return Response::json($response, 500);
    //                             }

    //                         }
    //                     }
    //                 }

    //                 PropertyFeature::whereNotIn('feature_id', !empty($request->feature_id) ? $request->feature_id : [])->where('property_id', $lastId)->delete();

    //                 if (!empty($request->file('files'))) {

    //                     $files = $request->file('files');
    //                     foreach ($files as $imageKey => $imageVal) {
    //                         if (!empty($imageVal)) {
    //                             $extension = $imageVal->getClientOriginalExtension();
    //                             $fileType = determineFileType($extension);
    //                             if ($fileType != 'unknown') {
    //                                 $obj = new PropertyImage;
    //                                 $obj->property_id = $lastId;
    //                                 $obj->type = $fileType;
    //                                 $originalName = $imageVal->getClientOriginalName();
    //                                 $fileName = time() . '-product_file-' . $lastId . $imageKey . '.' . $extension;


    //                                 $folderPath = Config('constant.PROPERTY_IMAGE_ROOT_PATH');
    //                                 if (!File::exists($folderPath)) {
    //                                     File::makeDirectory($folderPath, $mode = 0777, true);
    //                                 }
    //                                 if ($imageVal->move($folderPath, $fileName)) {
    //                                     $obj->image = $fileName;
    //                                     // $obj->original_image_name = $originalName;
    //                                 }

    //                                 $obj->save();
    //                                 $lastFileId = $obj->id;
    //                                 if (empty($lastFileId)) {
    //                                     DB::rollback();
    //                                     $response = array();
    //                                     $response["status"] = "error";
    //                                     $response["msg"] = trans("messages.Something_went_wrong");
    //                                     $response["data"] = (object) array();
    //                                     $response["http_code"] = 500;
    //                                     return Response::json($response, 500);
    //                                 }
    //                             }

    //                         }
    //                     }

    //                 }


    //                 if (!empty($request->removedUploadedFilesIds)) {
    //                     $removedUploadedFilesIds = explode(",", $request->removedUploadedFilesIds);
    //                     PropertyImage::whereIn("id", $removedUploadedFilesIds)->delete();
    //                 }
    //                 $propertyImagesCount = PropertyImage::where('property_id', $lastId)->count();
    //                 if ($propertyImagesCount == 0) {
    //                     $validator->errors()->add('files', trans('messages.Please_upload_atleast_1_file'));
    //                     $response = $this->change_error_msg_layout($validator->errors()->getMessages());
    //                     return Response::json($response, 200);
    //                 }

    //             }
    //             if (empty($lastId)) {
    //                 DB::rollback();
    //                 $response = array();
    //                 $response["status"] = "error";
    //                 $response["msg"] = trans("messages.Something_went_wrong");
    //                 $response["data"] = (object) array();
    //                 $response["http_code"] = 500;
    //                 return Response::json($response, 500);
    //             }

    //             DB::commit();
    //             $propertyData = Property::where('id',$lastId)->first();
    //             if (!empty($reference)) {
    //                 //Notification for edit
    //                 $dynamicValues =  $request->reference;
    //                 $loggedInUserRole = auth()->user()->role->name;

    //                 //dd($propertyData);
    //                 if ($loggedInUserRole == 'agent') {

    //                     // Notification for  agents
    //                     event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_9',  [
    //                         'action_url' => route(routeNamePrefix().'properties.show',$reference),
    //                         'type' => 'property',
    //                         'reference_id' => null,
    //                         'values' => $dynamicValues
    //                     ]));
    //                 } else {
    //                     //Admin Update Property Notification send Admin and agent
    //                     event(new CrmNotification($propertyData->owner_id, 'CRM_NOTIFICATION_6',  ['action_url' => route(routeNamePrefix().'properties.show',$reference), 'type' => 'property', 'reference_id' => $lastId,'values' => $dynamicValues]));

    //                     event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_9',  ['action_url' => route(routeNamePrefix().'properties.show',$reference), 'type' => 'property', 'reference_id' => $lastId,'values' => $dynamicValues]));
    //                 }
    //             } else {
    //                 //Notification for create
    //                 $dynamicValues =  $request->reference;
    //                 $loggedInUserRole = auth()->user()->role->name;

    //                 if ($loggedInUserRole == 'agent') {
    //                     // Notification for all agents
    //                     event(new CrmNotification(auth()->user()->id,'CRM_NOTIFICATION_8',  [
    //                         'action_url' => route(routeNamePrefix().'properties.show',$propertyData->reference),
    //                         'type' => 'property',
    //                         'reference_id' => $lastId,
    //                         'values' => $dynamicValues
    //                     ]));
    //                 } else {

    //                     //Admin Add Property Notification send Admin and agent
    //                     event(new CrmNotification($propertyData->owner_id, 'CRM_NOTIFICATION_5',  ['action_url' => route(routeNamePrefix().'properties.show',$propertyData->reference), 'type' => 'property', 'reference_id' => $lastId,'values' => $dynamicValues]));

    //                     event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_8' ,  ['action_url' => route(routeNamePrefix().'properties.show',$propertyData->reference), 'type' => 'property', 'reference_id' => $lastId,'values' => $dynamicValues]));
    //                 }
    //             }

    //             $previousUri = $request->server('HTTP_REFERER');
    //             if(strpos($previousUri, 'view-agent/properties/edit') !== false){
    //                 $previousUri = str_replace('properties/edit/','',preg_replace('/\/[^\/]+$/', '', $request->server('HTTP_REFERER')));
    //             }else if(strpos($previousUri, 'users/properties/edit') !== false){
    //                 $previousUri = str_replace('edit/','',preg_replace('/\/[^\/]+$/', '', $request->server('HTTP_REFERER')));
    //             }else if (strpos($previousUri, 'properties/edit') !== false) {
    //                 $previousUri = route(routeNamePrefix().'properties.index');
    //             }else if(strpos($previousUri, 'view-agent/properties/create') !== false){
    //                 $previousUri = str_replace('properties/create/','',$request->server('HTTP_REFERER'));
    //             }else if(strpos($previousUri, 'users/properties/create') !== false){
    //                 $previousUri = str_replace('create/','',$request->server('HTTP_REFERER'));
    //             }else if (strpos($previousUri, 'properties/create') !== false) {
    //                 $previousUri = route(routeNamePrefix().'properties.index');
    //             }


    //             $response = array();
    //             $response["status"] = "success";
    //             $response["msg"] = $propertySuccessMessage;
    //             $response["data"] = $previousUri;
    //             $response["http_code"] = 200;
    //             return Response::json($response, 200);
    //         }

    //     } else {
    //         $response = array();
    //         $response["status"] = "error";
    //         $response["msg"] = trans("messages.Invalid_request");
    //         $response["data"] = (object) array();
    //         $response["http_code"] = 500;
    //         return Response::json($response, 500);
    //     }
    // }

    public function newPropertyStore(Request $request, $reference = null)
    {
        $formData = $request->all();
        $propertySuccessMessage = !empty($reference) ? trans('messages.Property_updated_successfully') : trans('messages.Property_added_successfully');
        if (!empty($formData)) {
            Validator::extend('lat_lng_should_not_empty', function ($attribute, $value, $parameters, $validator) {
                $latitudeField = $parameters[0] ?? 'latitude';
                $longitudeField = $parameters[1] ?? 'longitude';

                $latitude = $validator->getData()[$latitudeField] ?? null;
                $longitude = $validator->getData()[$longitudeField] ?? null;

                // Check if both latitude and longitude are not empty
                return !empty($latitude) && !empty($longitude);
            });
            Validator::extend('contains_whitespace', function ($attribute, $value, $parameters, $validator) {
                return !preg_match('/\s/', $value);
            });

            $selectedTypeName = "";
            if (!empty($request->type_id)) {
                $selectedTypeName = Type::where('id', $request->type_id)->value('name');
            }
            $selectedCategoryName = "";
            if (!empty($request->category_id)) {
                $selectedCategoryName = Category::where('id', $request->category_id)->value('name');
            }

            $priceValidation = '';
            if (!empty($request->input('pro_listed_as')) && $request->input('pro_listed_as') == 'For Rent') {
                if (!empty($request->input('rent_type')) && $request->input('rent_type') == 'short_term') {
                    $priceValidation = 'short_price';
                } elseif (!empty($request->input('rent_type')) && $request->input('rent_type') == 'long_term') {
                    $priceValidation = 'long_price';
                }
            } elseif (!empty($request->input('pro_listed_as')) && $request->input('pro_listed_as') == 'For Sale') {
                $priceValidation = 'sale_price';
            }

            $validator = Validator::make(
                $request->all(),
                array(
                    //'category_id' => 'required',
                    // 'situation_id' => 'required',
                    'type_id' => 'required',
                    // 'subtype_id' => 'required',
                    'owner_id' => (Auth::user()->role->name == 'superadmin' || Auth::user()->role->name == 'admin') ? 'required' : '',
                    'reference' => 'required|contains_whitespace|unique:properties,reference' . (!empty($reference) ? ',' . (NewProperty::where('reference', $reference)->value('id')) : ''),
                    'name' => 'required',
                    //'price' => 'required|numeric|gt:0|between:1,999999999999999999.99',
                    'bedrooms' => (($selectedTypeName != 'Plot') ? 'required|numeric' : ''),
                    'bathrooms' => (($selectedTypeName != 'Plot') ? 'required|numeric' : ''),

                    'completion_status' => 'required',
                    //'year_completed' => (!empty($request->completion_status) && $request->completion_status == 'Completed') ? 'required' : '',
                    //'month_year' => (!empty($request->completion_status) && ($request->completion_status == 'Under Construction' || $request->completion_status == 'Off Plan')) ? 'required' : '',

                    'description' => 'required',
                    //'pro_listed_as' => 'required',
                    // 'price' => 'required',
                    'short_price' => ($priceValidation == 'short_price') ? 'required|numeric|gt:0|between:1,999999999999999999.99' : '',
                    'long_price' => ($priceValidation == 'long_price') ? 'required|numeric|gt:0|between:1,999999999999999999.99' : '',
                    'sale_price' => ($priceValidation == 'sale_price') ? 'required|numeric|gt:0|between:1,999999999999999999.99' : '',
                    // 'percentage' => 'required|numeric',
                    // 'commission' => 'required|numeric',
                    'list_agent_per' => 'required|numeric',
                    // 'list_Agent_com' => 'required|numeric',
                    // 'sell_agent_per' => 'required|numeric',
                    // 'sell_Agent_com' => 'required|numeric',
                    'net_price' => 'nullable|numeric',
                    'valuation' => 'nullable|numeric',
                    'deed_value' => 'nullable|numeric',
                    'mini_price' => 'nullable|numeric',
                    //'note_com' => 'required',
                    'comm_fees' => 'nullable|numeric',
                    'garbage_tax' => 'nullable|numeric',
                    'ibi_fees' => 'nullable|numeric',

                    'country' => 'required',
                    'state_provenience' => 'required',
                    'city' => 'required',
                    //'dimension_type' => 'required',

                    //'floors' => (($selectedTypeName != 'Plot') ? 'required|' : ''),
                    'size' => (($selectedTypeName != 'Plot') ? 'required|numeric' : ''),
                    //'garden_plot' => 'numeric',
                    //'built' => 'required|numeric',
                    // 'storeys' => (($selectedTypeName != 'Plot') ? 'required|numeric' : ''),
                    // 'no_of_properties_builtin' => (($selectedTypeName != 'Plot') ? 'required|numeric' : ''),
                    // 'terrace' => (($selectedTypeName != 'Plot') ? 'required|numeric' : ''),
                    // 'levels' => (($selectedTypeName != 'Plot') ? 'required|numeric' : ''),
                    // 'agency_ref' => (($selectedTypeName != 'Plot') ? 'required' : ''),
                    // 'garden_plot' => (($selectedTypeName != 'Plot') ? 'required|numeric' : ''),
                    // 'properties_int_floor_space' => (($selectedTypeName != 'Plot') ? 'required|numeric' : ''),
                    'co2_emission' => 'nullable|numeric|between:2,150',
                    'street_number' => 'required',
                    'energy_consumption' => 'nullable|numeric|between:10,500',
                    'street_name' => 'required',
                    'zipcode' => 'required',
                    'address' => 'required|lat_lng_should_not_empty:latitude,longitude',
                    'latitude' => 'required',
                    'longitude' => 'required',
                    //'cover_image' => (!empty($reference) ? (!empty($request->removedUploadedcover_imageIds) ? 'required' : 'nullable') : 'required'),
                    'files' => (!empty($reference) ? 'nullable' : 'required'),
                    'plot_size' => (($selectedTypeName == 'Plot') ? 'required' : 'nullable'),

                ),
                array(
                    //"category_id.required" => trans("messages.The_category_field_is_required"),
                    // "situation_id.required" => trans("messages.The_situation_field_is_required"),
                    "type_id.required" => trans("messages.The_type_field_is_required"),
                    // "subtype_id.required" => trans("messages.The_Subtype_field_is_required"),
                    "owner_id.required" => trans("messages.The_property_owner_field_is_required"),
                    "reference.required" => trans("messages.The_reference_field_is_required"),
                    "reference.unique" => trans("messages.The_reference_has_already_been_taken"),
                    "reference.contains_whitespace" => trans("messages.The_reference_field_should_not_contain_any_whitespaces"),
                    "name.required" => trans("messages.The_name_field_is_required"),
                    "description.required" => trans("messages.The_description_field_is_required"),
                    "country.required" => trans("messages.profile-setup.country_required"),
                    "state_provenience.required" => trans("messages.state_provience_fields_is_required"),
                    "city.required" => trans("messages.profile-setup.city_required"),
                    "bedrooms.required" => trans("messages.The_bedrooms_field_is_required"),
                    "bedrooms.numeric" => trans("messages.The_bedrooms_must_be_in_numeric_value"),
                    "bathrooms.required" => trans("messages.The_bathrooms_field_is_required"),
                    "bathrooms.numeric" => trans("messages.The_bathrooms_must_be_a_numeric"),

                    'completion_status.required' => 'The Status/Completion field is required',
                    'month_year.required' => 'The Month and year field is required',
                    //'year_completed.required' => 'The Completion year field is required',
                    //'year_completed.required_without' => 'The Completion year field is required',
                    'month_year.required_without' => 'The Month and year field is required.',

                    // 'pro_listed_as.required' => 'The property listed as field is required',
                    //    'price.required' => 'The Sale Price field is required',
                    // 'percentage.required' => 'The percentage field is required',
                    // 'percentage.numeric' => 'The Percentage field must be numeric value',
                    // 'commission.required' => 'The Commission field is required',
                    // 'commission.numeric' => 'The commission field must be numeric value',
                    'list_agent_per.required' => 'The listing agent percentage field is required',
                    'list_agent_per.numeric' => 'The Listing Agent field must be numeric value',
                    // 'list_Agent_com.required' => 'The listing agent commission field is required',
                    // 'list_Agent_com.numeric' => 'The listing agent field must be numeric value',
                    // 'sell_agent_per.required' => 'The Selling agent percentage field is required',
                    // 'sell_agent_per.numeric' => 'The Selling agent field must be numeric value',
                    // 'sell_Agent_com.required' => 'The Selling agent commission field is required',
                    'sell_Agent_com.numeric' => 'The Selling agent field must be numeric value',
                    'net_price.numeric' => 'The Net price field must be in numeric',
                    //'note_com.required' => 'The Commission note field is required',
                    //'dimension_type.required' => 'The Dimension Type field is required',
                    'valuation.numeric' => 'The Valuation field must be in numeric',
                    'deed_value.numeric' => 'The Deed value field must be in numeric',
                    'mini_price.numeric' => 'The minimun price field must be in numeric',


                    //"floors.required" => trans("messages.The_floors_field_is_required"),
                    "size.required" => trans("messages.The_size_field_is_required"),
                    "size.numeric" => trans("messages.The_size_must_be_a_numeric_value"),
                    "plot_size.required" => trans("messages.The_plot_size_field_is_required"),
                    "plot_size.numeric" => trans("messages.The_plot_size_must_be_a_numeric_value"),
                    //"built.required" => trans("messages.The_built_field_is_required"),
                    //"built.numeric" => trans("messages.The_built_must_be_a_numeric_value"),
                    // "storeys.required" => trans("messages.The_storeys_field_is_required"),
                    // "storeys.numeric" => trans("messages.The_storeys_must_be_a_numeric_value"),
                    // "no_of_properties_builtin.required" => trans("messages.The_no_of_properties_builtin_field_is_required"),
                    // "no_of_properties_builtin.numeric" => trans("messages.The_no_of_properties_builtin_must_be_a_numeric_value"),
                    // "terrace.required" => trans("messages.The_terrace_field_is_required"),
                    // "terrace.numeric" => trans("messages.The_terrace_must_be_a_numeric_value"),
                    // "levels.required" => trans("messages.The_levels_field_is_required"),
                    // "levels.numeric" => trans("messages.The_levels_must_be_a_numeric_value"),
                    // "agency_ref.required" => trans("messages.The_agency_ref_field_is_required"),
                    // "garden_plot.required" => trans("messages.The_garden_plot_field_is_required"),
                    // "garden_plot.numeric" => trans("messages.The_garden_plot_must_be_a_numeric_value"),
                    // 'co2_emission.numeric' => 'The co2 emission field must be numeric',
                    // 'energy_consumption.numeric' => 'The Energy consumption field must be numeric',
                    // "properties_int_floor_space.required" => trans("messages.The_properties_int_floor_space_field_is_required"),
                    // "properties_int_floor_space.numeric" => trans("messages.The_properties_int_floor_space_must_be_a_numeric_value"),

                    // "size.required" => trans("messages.The_size_field_is_required"),
                    // "size.numeric" => trans("messages.The_size_must_be_a_numeric_value"),
                    // "size.gt" => trans("messages.The_size_field_must_be_greater_than_0"),
                    // "price.required" => trans("messages.The_price_field_is_required"),
                    // "price.numeric" => trans("messages.The_price_must_be_a_numeric_value"),
                    // "price.gt" => trans("messages.The_price_field_must_be_greater_than_0"),
                    "street_number.required" => trans("messages.The_street_number_field_is_required"),
                    "street_name.required" => trans("messages.The_street_name_field_is_required"),
                    "zipcode.required" => trans("messages.The_zipcode_field_is_required"),
                    "address.required" => trans("messages.The_address_name_field_is_required"),
                    "address.lat_lng_should_not_empty" => trans("messages.Please_enter_valid_address"),
                    "latitude.required" => trans("messages.The_latitude_field_is_required"),
                    "longitude.required" => trans("messages.The_longitude_field_is_required"),
                    // "files.required" => trans("messages.Please_upload_atleast_1_file"),
                    //"cover_image.required" => trans("The cover image field is required"),
                    "files.required" => trans("messages.Please_upload_atleast_1_file"),


                )
            );

            if ($validator->fails()) {
                // dd($validator->errors()->getMessages());
                //dd($request->commission_note);
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                $owner_id = auth()->user()->id;
                $owner_name = auth()->user()->name;
                // $agentRoleId = Role::where('name','agent')->value('id');

                DB::beginTransaction();

                if (!empty($reference)) {
                    $obj = NewProperty::where('reference', $reference)->first();
                } else {
                    $obj = new NewProperty;
                }
                // $obj->category_id = !empty($request->input('category_id')) ? $request->input('category_id'): NULL;
                $obj->situation_id = !empty($request->input('situation_id')) ? $request->input('situation_id') : NULL;
                $obj->type_id = !empty($request->input('type_id')) ? $request->input('type_id') : NULL;
                $obj->subtype_id = !empty($request->input('subtype_id')) ? $request->input('subtype_id') : NULL;
                $obj->subtype_id2 = !empty($request->input('subtype_id2')) ? $request->input('subtype_id2') : NULL;
                $obj->reference = !empty($request->input('reference')) ? $request->input('reference') : NULL;
                $obj->name = !empty($request->input('name')) ? $request->input('name') : NULL;
                $obj->price = !empty($request->input('price')) ? $request->input('price') : NULL;
                //Development ID
                $obj->development_id = !empty($request->input('development_id')) ? $request->input('development_id') : (!empty($obj->development_id) ? $obj->development_id : NULL );

                if (Auth::user()->role->name == 'superadmin' || Auth::user()->role->name == 'admin') {
                    $user_name = User::where('id', $request->input('owner_id'))->value('name');
                    $obj->owner_id = !empty($request->input('owner_id')) ? $request->input('owner_id') : NULL;
                    $obj->owner_name = $user_name;
                } elseif (Auth::user()->role->name == 'agent' || Auth::user()->role->name == 'developer' || Auth::user()->role->name == 'sub-agent' || Auth::user()->role->name == 'sub-developer') {
                    $obj->owner_id = $owner_id;
                    $obj->owner_name = !empty($request->input('owner_name')) ? $request->input('owner_name') : NULL;
                }
                $obj->bedrooms = !empty($request->input('bedrooms')) ? $request->input('bedrooms') : 0;
                $obj->bathrooms = !empty($request->input('bathrooms')) ? $request->input('bathrooms') : 0;

                $obj->status_completion = !empty($request->input('completion_status')) ? $request->input('completion_status') : NULL;

                if ((!empty($request->completion_status) && $request->completion_status == 'Completed')) {
                    $obj->year = !empty($request->input('year_completed')) ? $request->input('year_completed') : NULL;
                } elseif ((!empty($request->completion_status) && ($request->completion_status == 'Under Construction' || $request->completion_status == 'Off Plan'))) {
                    $monthYear = $request->input('month_year');
                    // Check if month_year is not empty and contains '/'
                    if (!empty($monthYear) && strpos($monthYear, '/') !== false) {
                        $parts = explode('/', $monthYear);
                        if (!empty($parts) && count($parts) == 2) {
                            $month = $parts[0];
                            $year = $parts[1];
                            $obj->month = $month ?? NULL;
                            $obj->year = $year ?? NULL;
                        } else {
                            $obj->month = NULL;
                            $obj->year = NULL;
                        }
                    } else {
                        $obj->month = NULL;
                        $obj->year = NULL;
                    }
                }

                $obj->feeds  = !empty($request->input('feeds')) ? $request->input('feeds') : NULL;

                $obj->description = !empty($request->input('description')) ? $request->input('description') : NULL;

                $obj->listed_as = !empty($request->input('pro_listed_as')) ? $request->input('pro_listed_as') : NULL;

                if (!empty($request->input('pro_listed_as')) && $request->input('pro_listed_as') == 'For Rent') {
                    if (!empty($request->input('rent_type')) && $request->input('rent_type') == 'short_term') {
                        $obj->price = !empty($request->input('short_price')) ? $request->input('short_price') : NULL;
                    } elseif (!empty($request->input('rent_type')) && $request->input('rent_type') == 'long_term') {
                        $obj->price = !empty($request->input('long_price')) ? $request->input('long_price') : NULL;
                    }
                } elseif (!empty($request->input('pro_listed_as')) && $request->input('pro_listed_as') == 'For Sale') {
                    $obj->price = !empty($request->input('sale_price')) ? $request->input('sale_price') : NULL;
                }


                $obj->percentage = !empty($request->input('percentage')) ? $request->input('percentage') : 0;
                $obj->commission = !empty($request->input('commission')) ? $request->input('commission') : 0;
                $obj->net_price = !empty($request->input('net_price')) ? $request->input('net_price') : NULL;
                $obj->list_agent_per = !empty($request->input('list_agent_per')) ? $request->input('list_agent_per') : 0;
                $obj->list_Agent_com = !empty($request->input('list_Agent_com')) ? $request->input('list_Agent_com') : NULL;
                $obj->sell_agent_per = !empty($request->input('sell_agent_per')) ? $request->input('sell_agent_per') : 0;
                $obj->sell_Agent_com = !empty($request->input('sell_Agent_com')) ? $request->input('sell_Agent_com') : 0;
                $obj->commission_note = !empty($request->input('note_com')) ? $request->input('note_com') : NULL;
                $obj->valuation = !empty($request->input('valuation')) ? $request->input('valuation') : NULL;
                $obj->valuation_year = !empty($request->input('valuation_year')) ? $request->input('valuation_year') : NULL;
                $obj->deed_value = !empty($request->input('deed_value')) ? $request->input('deed_value') : NULL;
                $obj->mini_price = !empty($request->input('mini_price')) ? $request->input('mini_price') : NULL;
                $obj->comm_fees = !empty($request->input('comm_fees')) ? $request->input('comm_fees') : NULL;
                $obj->garbage_tax = !empty($request->input('garbage_tax')) ? $request->input('garbage_tax') : NULL;
                $obj->ibi_fees = !empty($request->input('ibi_fees')) ? $request->input('ibi_fees') : NULL;

                // $obj->size = $request->input('size');
                $obj->street_number = !empty($request->input('street_number')) ? $request->input('street_number') : NULL;
                $obj->street_name = !empty($request->input('street_name')) ? $request->input('street_name') : NULL;
                $obj->country = !empty($request->input('country')) ? $request->input('country') : NULL;
                $obj->state = !empty($request->input('state_provenience')) ? $request->input('state_provenience') : NULL;
                $obj->city = !empty($request->input('city')) ? $request->input('city') : NULL;
                $obj->zipcode = !empty($request->input('zipcode')) ? $request->input('zipcode') : NULL;
                $obj->address = !empty($request->input('address')) ? $request->input('address') : NULL;
                $obj->notes = !empty($request->input('notes')) ? $request->input('notes') : NULL;
                $obj->latitude = !empty($request->input('latitude')) ? $request->input('latitude') : NULL;
                $obj->longitude = !empty($request->input('longitude')) ? $request->input('longitude') : NULL;

                //$obj->dimension_type = !empty($request->input('dimension_type')) ? $request->input('dimension_type') : NULL;
                $obj->floors = !empty($request->input('floors')) ? $request->input('floors') : 0;
                // dd(($selectedTypeName != 'Plot'));
                if ($selectedTypeName != 'Plot') {
                    $obj->plot_size = 0;
                    $obj->size = !empty($request->input('size')) ? $request->input('size') : 0;
                } else {
                    $obj->size = 0;
                    $obj->plot_size = !empty($request->input('plot_size')) ? $request->input('plot_size') : NULL;
                }
                $obj->built = !empty($request->input('built')) ? $request->input('built') : 0;
                $obj->storeys = !empty($request->input('storeys')) ? $request->input('storeys') : 0;
                $obj->no_of_properties_builtin = !empty($request->input('no_of_properties_builtin')) ? $request->input('no_of_properties_builtin') : 0;
                $obj->terrace = !empty($request->input('terrace')) ? $request->input('terrace') : 0;
                $obj->levels = !empty($request->input('levels')) ?  $request->input('levels') : 0;
                $obj->agency_ref = !empty($request->input('agency_ref')) ? $request->input('agency_ref') : 0;
                $obj->garden_plot = !empty($request->input('garden_plot')) ? $request->input('garden_plot') : 0;
                $obj->properties_int_floor_space = !empty($request->input('properties_int_floor_space')) ? $request->input('properties_int_floor_space') : 0;
                $obj->long_term_ref = !empty($request->input('long_term_ref')) ? $request->input('long_term_ref') : NULL;
                $obj->short_term_ref = !empty($request->input('short_term_ref')) ? $request->input('short_term_ref') : NULL;
                $obj->rental_license_ref = !empty($request->input('rental_license_ref')) ? $request->input('rental_license_ref') : NULL;
                $obj->nota_simple = !empty($request->input('nota_simple')) ? $request->input('nota_simple') : NULL;
                $obj->IBI_receipt = !empty($request->input('IBI_receipt')) ? $request->input('IBI_receipt') : NULL;
                $obj->first_occupancy_license_aFO = !empty($request->input('first_occupancy_license_aFO')) ? $request->input('first_occupancy_license_aFO') : NULL;

                $obj->co2_emission = !empty($request->input('co2_emission')) ? $request->input('co2_emission') : NULL;
                $obj->letter_co2 = !empty($request->input('letter_co2')) ? $request->input('letter_co2') : NULL;
                $obj->energy_consumption = !empty($request->input('energy_consumption')) ? $request->input('energy_consumption') : NULL;
                $obj->letter_energy = !empty($request->input('letter_energy')) ? $request->input('letter_energy') : NULL;


                $obj->contact_name = !empty($request->input('contact_name')) ? $request->input('contact_name') : NULL;
                $obj->contact_email = !empty($request->input('contact_email')) ? $request->input('contact_email') : NULL;
                $obj->contact_mobile = !empty($request->input('contact_mobile')) ? $request->input('contact_mobile') : NULL;
                $obj->contact_street_address = !empty($request->input('contact_street_address')) ? $request->input('contact_street_address') : NULL;
                $obj->contact_city = !empty($request->input('contact_city')) ? $request->input('contact_city') : NULL;
                $obj->contact_state_province = !empty($request->input('contact_state_province')) ? $request->input('contact_state_province') : NULL;
                $obj->contact_country = !empty($request->input('contact_country')) ? $request->input('contact_country') : NULL;
                $obj->contact_zipcode = !empty($request->input('contact_zipcode')) ? $request->input('contact_zipcode') : NULL;
                $obj->company_name = !empty($request->input('company_name')) ? $request->input('company_name') : NULL;

                //property tour
                $obj->video_tour = !empty($request->input('video_tour')) ? $request->input('video_tour') : NULL;
                $obj->virtual_tour = !empty($request->input('virtual_tour')) ? $request->input('virtual_tour') : NULL;

                $obj->owner_one = !empty($request->input('owner_one')) ? $request->input('owner_one') : NULL;
                $obj->owner_two = !empty($request->input('owner_two')) ? $request->input('owner_two') : NULL;
                $obj->key_holder = !empty($request->input('key_holder')) ? $request->input('key_holder') : NULL;
                $obj->developer = !empty($request->input('developer')) ? $request->input('developer') : NULL;
                $obj->key_status = !empty($request->input('key_status')) ? $request->input('key_status') : NULL;
                $obj->key_id = !empty($request->input('key_id')) ? $request->input('key_id') : NULL;
                $obj->key_details = !empty($request->input('key_details')) ? $request->input('key_details') : NULL;
                $obj->private_note = !empty($request->input('private_note')) ? $request->input('private_note') : NULL;
                $obj->lawyer = !empty($request->input('lawyer')) ? $request->input('lawyer') : NULL;

                if ($request->property_tenure == 1) {
                    $obj->property_tenure = 1;
                } elseif ($request->property_tenure == 2) {
                    $obj->property_tenure = 2;
                } else {
                    $obj->property_tenure = 0;
                }
                // $obj->property_tenure = empty($request->property_tenure) ? 0 : 1;
                // $obj->leasehold = empty($request->leasehold) ? 0 : 1;
                //cover_image store in properties table
                if ($request->hasFile('cover_image')) {
                    $hasCoverImage = true;
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
                } else if (!empty($request->removedUploadedcover_imageIds)) {
                    $hasCoverImage = false;
                    $obj->cover_image = NULL;
                }else{
                    $hasCoverImage = false;
                }

               
                $obj->save();
                $lastId = $obj->id;

                if (!empty($lastId)) {

                    if (!empty($request->feature_id) && !empty($request->subFetureId)) {
                        $subFeatureArray = array_keys($request->subFetureId);
                        $subFeatureId = $request->subFetureId;
                        foreach ($request->feature_id as  $featureKey =>  $featureVal) {
                            if (!empty($featureVal)) {
                                if (in_array($featureVal, $subFeatureArray)) {
                                    $subFetureIdData = explode(',', $subFeatureId[$featureVal]);
                                    if (!empty($subFetureIdData)) {
                                        foreach ($subFetureIdData as $subFeatureVal) {
                                            $checkFeatureVal = PropertyFeature::where('property_id', $lastId)->where('feature_id', $featureVal)->where('sub_feature_id', $subFeatureVal)->first();
                                            if (!empty($checkFeatureVal)) {
                                                $featureObj = $checkFeatureVal;
                                            } else {
                                                $featureObj = new PropertyFeature;
                                            }
                                            $featureObj->property_id = $lastId;
                                            $featureObj->feature_id = $featureVal;
                                            $featureObj->sub_feature_id = $subFeatureVal;
                                            $featureObj->save();
                                        }
                                        PropertyFeature::whereNotIn('sub_feature_id', !empty($subFetureIdData) ? $subFetureIdData : [])->where('feature_id', $featureVal)->delete();
                                    }
                                }
                            }
                        }
                    }
                    if (empty($lastId)) {
                        DB::rollback();
                        $response = array();
                        $response["status"] = "error";
                        $response["msg"] = trans("messages.Something_went_wrong");
                        $response["data"] = (object) array();
                        $response["http_code"] = 500;
                        return Response::json($response, 500);
                    }
                    DB::commit();
                    $propertyData = Property::where('id', $lastId)->first();
                    if (!empty($reference)) {
                        //Notification for edit
                        $dynamicValues =  $request->reference;
                        $loggedInUserRole = auth()->user()->role->name;

                        //dd($propertyData);
                        if ($loggedInUserRole == 'agent' || $loggedInUserRole == 'sub-agent') {

                            // Notification for  agents
                            event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_9',  [
                                'action_url' => route(routeNamePrefix() . 'properties.show', $reference),
                                'type' => 'property',
                                'reference_id' => null,
                                'values' => $dynamicValues
                            ]));
                        } 
                        elseif ($loggedInUserRole == 'developer' ||  $loggedInUserRole == 'sub-developer') {

                            event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_9',  ['action_url' => route(routeNamePrefix() . 'properties.show', $reference), 'type' => 'property', 'reference_id' => $lastId, 'values' => $dynamicValues]));
                        }
                        else {
                            //Admin Update Property Notification send Admin and agent
                            event(new CrmNotification($propertyData->owner_id, 'CRM_NOTIFICATION_6',  ['action_url' => route(routeNamePrefix() . 'properties.show', $reference), 'type' => 'property', 'reference_id' => $lastId, 'values' => $dynamicValues]));

                            event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_9',  ['action_url' => route(routeNamePrefix() . 'properties.show', $reference), 'type' => 'property', 'reference_id' => $lastId, 'values' => $dynamicValues]));
                        }
                        // update property activity
                        $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id, 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_3', 'type' => 'property', 'values' => [auth()->user()->name, $request->input('name')]]));
                    } else {
                        //Notification for create
                        $dynamicValues =  $request->reference;
                        $loggedInUserRole = auth()->user()->role->name;

                        if ($loggedInUserRole == 'agent' || $loggedInUserRole == 'sub-agent') {
                            // Notification for all agents
                            event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_8',  [
                                'action_url' => route(routeNamePrefix() . 'properties.show', $propertyData->reference),
                                'type' => 'property',
                                'reference_id' => $lastId,
                                'values' => $dynamicValues
                            ]));
                        } 
                        
                        elseif ($loggedInUserRole != 'developer') {

                            //Admin Add Property Notification send Admin and agent
                            event(new CrmNotification($propertyData->owner_id, 'CRM_NOTIFICATION_5',  ['action_url' => route(routeNamePrefix() . 'properties.show', $propertyData->reference), 'type' => 'property', 'reference_id' => $lastId, 'values' => $dynamicValues]));

                            event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_8',  ['action_url' => route(routeNamePrefix() . 'properties.show', $propertyData->reference), 'type' => 'property', 'reference_id' => $lastId, 'values' => $dynamicValues]));
                        }
                        $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id, 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_2', 'type' => 'property', 'values' => [auth()->user()->name, $request->input('name')]]));
                    }

                    PropertyFeature::whereNotIn('feature_id', !empty($request->feature_id) ? $request->feature_id : [])->where('property_id', $lastId)->delete();



                    // multiple file store in PropertyImage table
                    if (!empty($request->file('files'))) {

                        $files = $request->file('files');
                        foreach ($files as $imageKey => $imageVal) {
                            if (!empty($imageVal)) {
                                $extension = $imageVal->getClientOriginalExtension();
                                $fileType = determineFileType($extension);
                                if ($fileType != 'unknown') {
                                    $obj = new PropertyImage;
                                    $obj->property_id = $lastId;
                                    $obj->type = $fileType;
                                    $originalName = $imageVal->getClientOriginalName();
                                    $fileName = time() . '-product_file-' . $lastId . $imageKey . '.' . $extension;


                                    $folderPath = Config('constant.PROPERTY_IMAGE_ROOT_PATH');
                                    if (!File::exists($folderPath)) {
                                        File::makeDirectory($folderPath, $mode = 0777, true);
                                    }
                                    if ($imageVal->move($folderPath, $fileName)) {
                                        $obj->image = $fileName;
                                        if(!$hasCoverImage && $imageKey == 0){
                                            Property::where('id',$lastId)->update(['cover_image' =>$fileName]);
                                        }
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


                    if (!empty($request->removedUploadedfilesIds)) {
                        $removedUploadedfilesIds = explode(",", $request->removedUploadedfilesIds);
                        PropertyImage::whereIn("id", $removedUploadedfilesIds)->delete();
                    }
                    $propertyImagesCount = PropertyImage::where('property_id', $lastId)->count();
                    if ($propertyImagesCount == 0) {
                        $validator->errors()->add('files', trans('messages.Please_upload_atleast_1_file'));
                        $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                        return Response::json($response, 200);
                    }


                    if (!empty($request->documentIds)) {
                        PropertyDocument::whereIn('id', explode(',', $request->documentIds))->update(['property_id' => $lastId]);
                    }
                }
                if (empty($lastId)) {
                    DB::rollback();
                    $response = array();
                    $response["status"] = "error";
                    $response["msg"] = trans("messages.Something_went_wrong");
                    $response["data"] = (object) array();
                    $response["http_code"] = 500;
                    return Response::json($response, 500);
                }

                DB::commit();

                $previousUri = $request->server('HTTP_REFERER');
                if (strpos($previousUri, 'view-agent/properties/edit') !== false) {
                    $previousUri = str_replace('properties/edit/', '', preg_replace('/\/[^\/]+$/', '', $request->server('HTTP_REFERER')));
                } else if (strpos($previousUri, 'users/properties/edit') !== false) {
                    $previousUri = str_replace('edit/', '', preg_replace('/\/[^\/]+$/', '', $request->server('HTTP_REFERER')));
                } else if (strpos($previousUri, 'properties/edit') !== false) {
                    $previousUri = route(routeNamePrefix() . 'properties.index');
                } else if (strpos($previousUri, 'view-agent/properties/create') !== false) {
                    $previousUri = str_replace('properties/create/', '', $request->server('HTTP_REFERER'));
                } else if (strpos($previousUri, 'users/properties/create') !== false) {
                    $previousUri = str_replace('create/', '', $request->server('HTTP_REFERER'));
                } else if (strpos($previousUri, 'properties/create') !== false) {
                    $previousUri = route(routeNamePrefix() . 'properties.index');
                }



                if (!empty($request->development_id) && !empty($request->copies)) {
                    if (Session::has('developmentUnitData')) {
                        $developmentUnitData = Session::get('developmentUnitData');
                        if ($developmentUnitData['development_id'] == $request->development_id) {
                            $uploadedPropertiesData = Property::where('id', $lastId)->first();
                            $copies = $request->copies;
                            $types = Type::pluck('name', 'id');
                            $htmlData = View("modules.developments.includes.uploaded_properties_data",compact('uploadedPropertiesData','copies','types'))->render();

                            $response = array();
                            $response["status"] = "success";
                            $response["msg"] = 'uploadedPropertiesModal';
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
                }

                $response = array();
                $response["status"] = "success";
                $response["msg"] = $propertySuccessMessage;
                $response["data"] = $previousUri;
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

    public function getAgentDetails($id)
    {
        // $agent = User::find($id);
        $agent = User::leftJoin('user_professional_informations', 'users.id', '=', 'user_professional_informations.user_id')->where('users.id', $id)->select(
            'users.name',
            'users.phone',
            'users.email',
            'users.city',
            'users.state',
            'users.country',
            'users.zipcode',
            'users.address',
            'user_professional_informations.company_name'
        )->first();

        return response()->json([
            'name' => $agent->name,
            'phone' => $agent->phone,
            'email' => $agent->email,
            'city' => $agent->city,
            'state' => $agent->state,
            'country' => $agent->country,
            'zipcode' => $agent->zipcode,
            'address' => $agent->address,
            'company_name' => $agent->company_name ?? null,
        ]);
    }

    // public function show($reference)
    // {

    //     $property = Property::where('properties.reference', $reference)->leftJoin('users', 'users.id', 'properties.owner_id')->select('properties.*', 'users.name as agent_name','users.email as agent_email')->whereNull('properties.deleted_at')->first();
    //     if (!empty($property)) {
    //         //Make a entry to track customer viewed properties
    //         $viewedPropertyInstance = new ViewedUserProperty;
    //         $viewedPropertyInstance->storeDetails($property->id);

    //         $categories = Category::pluck('name', 'id');
    //         $situations = Situation::pluck('name', 'id');
    //         $types = Type::pluck('name', 'id');
    //         // $features   = Feature::pluck('name','id');
    //         $users = User::where('id', Auth::user()->id)->first();
    //         $featur = Feature::all();
    //         $user = auth()->user()->name;
    //         $isHidden = (auth()->user()->role->name == 'agent' && $property->owner_id != auth()->user()->id && empty(areAgentFriends(auth()->user()->id, $property->owner_id))) ? true : false;

    //         $propertyImages = PropertyImage::where('property_id', $property->id)->orderBy('created_at', 'asc')->get();
    //         $propertyImageCount = $propertyImages->count();
    //         if ($propertyImageCount < 5) {
    //             for ($i = $propertyImageCount + 1; $i <= 5; $i++) {
    //                 $dummyImage = new PropertyImage();
    //                 $dummyImage->image = asset('img/default-property.jpg');
    //                 $dummyImage->type = 'image';

    //                 $propertyImages->push($dummyImage);
    //             }
    //         }

    //         return view("modules.$this->model.show", compact('property', 'user', 'featur', 'users', 'propertyImages', 'isHidden'));
    //     } else {
    //         Session()->flash('error', trans('messages.Invalid_request'));
    //         return redirect()->route(routeNamePrefix().'properties.index');
    //     }

    // }
    // public function newPropertyShow($reference)
    // {
    //     $property = NewProperty::with('features', 'subFeatures')->where('properties.reference', $reference)->leftJoin('users', 'users.id', 'properties.owner_id')->select('properties.*', 'users.name as agent_name', 'users.email as agent_email')->whereNull('properties.deleted_at')->first();

    //         $categories = Category::pluck('name', 'id');
    //         $situations = Situation::pluck('name', 'id');
    //         $types = Type::pluck('name', 'id');
    //         // $features   = Feature::pluck('name','id');
    //         $users = User::where('id', Auth::user()->id)->first();
    //         $featur = Feature::all();
    //         $user = auth()->user()->name;
    //         $isHidden = (auth()->user()->role->name == 'agent' && $property->owner_id != auth()->user()->id && empty(areAgentFriends(auth()->user()->id, $property->owner_id))) ? true : false;

    //         $propertyImages = PropertyImage::where('property_id', $property->id)->orderBy('created_at', 'asc')->get();
    //         $propertyImageCount = $propertyImages->count();
    //         if ($propertyImageCount < 5) {
    //             for ($i = $propertyImageCount + 1; $i <= 5; $i++) {
    //                 $dummyImage = new PropertyImage();
    //                 $dummyImage->image = asset('img/default-property.jpg');
    //                 $dummyImage->type = 'image';

    //                 $propertyImages->push($dummyImage);
    //             }
    //         }

    //         return view("modules.$this->model.show", compact('property', 'user', 'featur', 'users', 'propertyImages', 'isHidden'));
    //     } else {
    //         Session()->flash('error', trans('messages.Invalid_request'));
    //         return redirect()->route(routeNamePrefix().'properties.index');
    //     }

    // }
    public function newPropertyShow($reference)
    {
        $loggedInUserId = Auth::user()->id;
        $property = NewProperty::with('features', 'subFeatures')->where('properties.reference', $reference)->leftJoin('users', 'users.id', 'properties.owner_id')->select('properties.*', 'users.name as agent_name', 'users.email as agent_email','users.image as agent_image','users.city as agent_city','users.phone as agent_phone')->whereNull('properties.deleted_at')
        ->when(auth()->user()->role->name == 'customer', function($query) use ($loggedInUserId) {
            $query->leftJoin('requests as secondary_agent_requests', function($join) use ($loggedInUserId) {
                $join->on('secondary_agent_requests.to', '=', DB::raw($loggedInUserId))
                     ->orOn('secondary_agent_requests.from', '=', DB::raw($loggedInUserId));
            })
            ->leftJoin('users as secondary_agent', 'secondary_agent.id', '=', 'secondary_agent_requests.from')
            ->addSelect(
                'secondary_agent.id as secondary_agent_id',
                'secondary_agent.name as secondary_agent_name',
                'secondary_agent.image as secondary_agent_image',
                'secondary_agent.city as secondary_agent_city',
                'secondary_agent.phone as secondary_agent_phone',
                'secondary_agent.email as secondary_agent_email'
            );
        })->first();

        if (!empty($property)) {
            //Make a entry to track customer viewed properties
            $viewedPropertyInstance = new ViewedUserProperty;
            $viewedPropertyInstance->storeDetails($property->id);
            $categories = Category::pluck('name', 'id');
            $situations = Situation::pluck('name', 'id');
            $types = Type::pluck('name', 'id');
            // $features   = Feature::pluck('name','id');
            $users = User::where('id', Auth::user()->id)->first();
            $featur = Feature::all();
            $user = auth()->user()->name;
            $companyDetails = auth()->user()->companyDetails;
            $isHidden = ((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'sub-developer' || auth()->user()->role->name == 'developer') && $property->owner_id != auth()->user()->id && empty(areAgentFriends(auth()->user()->id, $property->owner_id))) ? true : false;
            $propertyImages = PropertyImage::where('property_id', $property->id)->orderBy('created_at', 'asc')->get();
            if (!empty($property->cover_image)) {
                $coverImageInstance = new NewProperty;
                $coverImageInstance->image = $property->cover_image;
                $coverImageInstance->type = 'image';
                $propertyImages->prepend($coverImageInstance);
            }
            $propertyImageCount = $propertyImages->count();
            if ($propertyImageCount < 5) {
                for ($i = $propertyImageCount + 1; $i <= 5; $i++) {
                    $dummyImage = new PropertyImage();
                    $dummyImage->image = asset('img/default-property.jpg');
                    $dummyImage->type = 'image';
                    $propertyImages->push($dummyImage);
                }
            }
            $propertyDocumentsData = PropertyDocument::where('property_id', $property->id)->get();
            $connectAgent = null;
            if (!empty(auth()->user()->parent_user_id)) {

                $connectAgent = User::find(auth()->user()->parent_user_id);
            }
            return view("modules.$this->model.show-new", compact('property', 'user', 'featur', 'users', 'propertyImages', 'isHidden', 'propertyDocumentsData', 'connectAgent', 'companyDetails'));
        } else {
            Session()->flash('error', trans('messages.Invalid_request'));
            return redirect()->route(routeNamePrefix() . 'properties.index');
        }
    }

    public function destroy($id, Request $request)
    {
        $property = Property::where('id', $id)->whereNull('properties.deleted_at')->first();;
        if (!empty($property)) {
            if (auth()->user()->role->name == 'agent' && $property->owner_id != auth()->user()->id) {
                return Redirect()->route(routeNamePrefix() . 'user.dashboard')->with('error', trans('messages.You_are_not_authorized_to_access_this_functionality'));
            }

            $dynamicValues =  $property->reference;
            $loggedInUserRole = auth()->user()->role->name;
            if ($loggedInUserRole == 'agent' || $loggedInUserRole == 'sub-agent') {

                // Notification for  agents
                event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_10',  [
                    'action_url' => route(routeNamePrefix() . 'properties.index'),
                    'type' => 'property',
                    'reference_id' => null,
                    'values' => $dynamicValues
                ]));
                $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id, 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_4', 'type' => 'property', 'values' => [auth()->user()->name, $property->name]]));
            } 
            elseif ($loggedInUserRole == 'developer' ||  $loggedInUserRole == 'sub-developer') {
                event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_10',  [
                    'action_url' => route(routeNamePrefix() . 'properties.index'),
                    'type' => 'property',
                    'reference_id' => null,
                    'values' => $dynamicValues
                ]));
                $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id, 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_4', 'type' => 'property', 'values' => [auth()->user()->name, $property->name]]));
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
            if (strpos($previousUri, 'view-agent/properties/view') !== false) {
                return redirect()->to(str_replace('properties/view/', '', preg_replace('/\/[^\/]+$/', '', $request->server('HTTP_REFERER'))));
            } else if (strpos($previousUri, 'users/properties/view') !== false) {
                return redirect()->to(str_replace('view/', '', preg_replace('/\/[^\/]+$/', '', $request->server('HTTP_REFERER'))));
            } else if (strpos($previousUri, 'properties/view') !== false) {
                return redirect()->route(routeNamePrefix() . 'properties.index');
            } else {
                return redirect()->to($previousUri);
            }
        } else {
            Session()->flash('error', trans('messages.Invalid_request'));
            return redirect()->route(routeNamePrefix() . 'properties.index');
        }
    }

    public function uploadDocuments(Request $request, $propertyId = Null)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if ($request->isMethod('POST')) {
            $formData = $request->all();
            $documentIds = !empty($request->documentIds) ? explode(',', $request->documentIds) : [];
            $documentUploadSize = formatFileSizeFromKB(config('Modules.property_document_upload_size'));
            if (!empty($formData)) {
                $validator = Validator::make(
                    $request->all(),
                    array(
                        'files.*' => 'required|mimes:pdf,jpeg,png,jpg,xlsx|max:' . config('Modules.property_document_upload_size'),
                    ),
                    array(

                        "files.*.required" => trans("Please upload atleast one document"),
                        "files.*.mimes" => trans("messages.The_document_field_must_be_a_file_of_type_pdf_jpg_jpeg_png_xlsx"),
                        "files.*.max" => trans("messages.The_document_size_should_not_exceed") . $documentUploadSize,

                    )
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {
                    DB::beginTransaction();

                    if (!empty($request->file('files'))) {

                        $files = $request->file('files');
                        foreach ($files as $imageKey => $imageVal) {
                            if (!empty($imageVal)) {
                                $extension = $imageVal->getClientOriginalExtension();

                                $obj = new PropertyDocument;
                                $obj->property_id = !empty($propertyId) ? $propertyId : NULL;
                                $obj->type = ($extension == 'pdf' || $extension == 'xlsx') ? 'document' : 'image';
                                $originalName = $imageVal->getClientOriginalName();
                                $fileName = time() . '-property_document-' . $user->id . $imageKey . '.' . $extension;


                                $folderPath = Config('constant.PROPERTY_DOCUMENT_ROOT_PATH');
                                if (!File::exists($folderPath)) {
                                    File::makeDirectory($folderPath, $mode = 0777, true);
                                }
                                if ($imageVal->move($folderPath, $fileName)) {
                                    $obj->document = $fileName;
                                    $obj->original_name = $originalName;
                                }

                                $obj->save();
                                $lastFileId = $obj->id;
                                $documentIds[] = $lastFileId;
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

                    DB::commit();

                    $documentData = PropertyDocument::whereIn('id', $documentIds)->get();
                    $htmlData = View("modules.properties.includes.property_documents_data", ['documentData' => $documentData])->render();
                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans("messages.Document_uploaded_successfully");
                    $response["data"] = $htmlData;
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
        return View("modules.$this->model.profile", compact('user'));
    }

    public function removeDocument(Request $request, $documentId)
    {
        $propertyDocument = PropertyDocument::where('id', $documentId)->first();

        if (!empty($propertyDocument)) {
            $documentIds = !empty($request->documentIds) ? explode(',', $request->documentIds) : [];
            $filePath = Config('constant.PROPERTY_DOCUMENT_ROOT_PATH') . $propertyDocument->document;

            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            PropertyDocument::where('id', $documentId)->delete();

            $documentIds = array_diff($documentIds, [$documentId]);

            $documentData = PropertyDocument::whereIn('id', $documentIds)->get();
            $htmlData = View("modules.properties.includes.property_documents_data", ['documentData' => $documentData])->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = trans("messages.Document_Removed_Successfully");
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
    public function removePropertyAttachement(Request $request, $imageId)
    {
        $propertyImage = PropertyImage::where('id', $imageId)->first();
        if (!empty($propertyImage)) {
            $filePath = Config('constant.PROPERTY_IMAGE_ROOT_PATH') . $propertyImage->image;

            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            PropertyImage::where('id', $imageId)->delete();

            $response = array();
            $response["status"] = "success";
            $response["msg"] = trans("messages.Document_Removed_Successfully");
            $response["data"] = '';
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
    public function getProperty($id){
        $property = Property::where('properties.id', $id)
            ->leftJoin('types', 'types.id', '=', 'properties.type_id')
            ->leftJoin('subtypes', 'subtypes.id', '=', 'properties.subtype_id')
            ->select('properties.*', 'subtypes.name as subtype_name', 'types.name as property_type')
            ->first();
        $secondaryAgentDetail = AgentLead::where('property_id', $id)->where('agent_id', Auth::user()->id)->get();
        $response = array();
        if($secondaryAgentDetail){
            $authUser = Auth::user();
            $response["status"] = "success";
            $response['property'] = $property;
            $response['primaryAgentDetail'] = User::where('id',$property->owner_id)->first();
            $response['secondaryAgentDetail'] = Auth::user();
            $response["http_code"] = 200;
        }else{
            $response["status"] = "error";
            $response["http_code"] = 500;
        }



        return Response::json($response, 200);
    }
    public function makeCollaboration(Request $request){
        $response = array();

        $existingCollaboration = AgentLead::where('owner_id', $request->agent)
            ->where('agent_id', $request->fromagent)
            ->where('property_id', $request->propertyId)
            ->first();
        if (!$existingCollaboration) {
            $collaboration = new AgentLead;
            $collaboration->owner_id = $request->agent;
            $collaboration->agent_id = $request->fromagent;
            $collaboration->message = $request->message;
            $collaboration->subject = "Initiate Collaboratiion";
            $collaboration->property_id = $request->propertyId;
            $collaboration->save();
            $code = 200;
            if($collaboration) {
                $response["status"] = "success";
                $lastId = $collaboration->id;

                //send notification
                //to secondary agent
                /*event(new CrmNotification(
                    $request->fromagent,'CRM_NOTIFICATION_31',
                    ['action_url' => route(routeNamePrefix().'messages.index'), 'type' => 'user', 'reference_id' => auth()->user()->id,'values' => auth()->user()->name]
                ));
                //to primary agent
                $primaryAgent = User::where("id",$request->agent)->first();
                event(new CrmNotification(
                    $lastId,'CRM_NOTIFICATION_25',
                    ['action_url' => route(routeNamePrefix().'messages.index'), 'type' => 'user', 'reference_id' => $request->agent,'values' => $primaryAgent->name]
                ));*/
            } else {
                $response["status"] = "error";
                $response["msg"] = trans("messages.Invalid_request");
                $code = 500;
            }
        } else {
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $code = 500;
        }
        return Response::json($response, $code);
    }
    public function collaborate(Request $request){
        $propertyIds = collect($request->input('properties'))->pluck('id')->toArray();
        // Perform the update
        if (!empty($propertyIds)) {
            Property::whereIn('id', $propertyIds)
                ->update(['collaborated' => 1]);

            return response()->json([
                'status' => 'success',
                'msg' => trans("messages.Properties_updated_successfully"),
                'updated_ids' => $propertyIds,
            ]);

        }
        return response()->json([
            'status' => 'error',
            'msg' => trans("messages.Invalid_request"),
            'errors' => trans("messages.Invalid_request"),
        ]);
    }
    public function saveCustomerInquiry(Request $request){

        $customerInquiry = new AgentLead;
        $customerInquiry->owner_id = $request->owner_id;
        $customerInquiry->agent_id = Auth::user()->parent_user_id; //$request->agent_id;
        $customerInquiry->property_id = $request->property_id;
        $customerInquiry->name = $request->name;
        $customerInquiry->phone = $request->phone;
        $customerInquiry->subject = "Customer Inquiry";
        $customerInquiry->message = $request->message;
        $customerInquiry->user_id = $request->customer_id;
        $customerInquiry->save();

        $response = array();
        $code = 200;
        if($customerInquiry) {
            $response["status"] = "success";
        } else {
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $code = 500;
        }
        //to secondary agent
        /*event(new CrmNotification(
            $lastId,'CRM_NOTIFICATION_32',
            ['action_url' => route(routeNamePrefix().'agent.messages'), 'type' => 'user', 'reference_id' => auth()->user()->id,'values' => auth()->user()->name]
        ));*/
        /*//to primary agent
        $primaryAgent = User::where("id",$request->agent)->first();
        event(new CrmNotification(
            $lastId,'CRM_NOTIFICATION_33',
            ['action_url' => route(routeNamePrefix().'user.dashboard'), 'type' => 'user', 'reference_id' => $request->agent,'values' => $primaryAgent->name]
        ));*/
        return Response::json($response, $code);

    }

    public function getCustomer(Request $request){
        $responseData = $request->all();
        $ownerid = $responseData['data']['agentid'];
        $secondaryagent = Auth::user()->id;
        $propertyData = json_decode($responseData['data']['propertyData'], true);


        $requestData = array();
        $requestData['search_input_user'] = '';
        $loggedInUserId = auth()->user()->id;
        $customerRoleId = Role::where('name','customer')->value('id');

        $userInstance = new User();
        $connectedCustomersData = $userInstance->loadUserConnectedUsersData(['perPage' => 10,'userRoleName' => 'customer','userId' => $loggedInUserId],$requestData);

        $connectedCustomersArray = [];
        if($connectedCustomersData->isNotEmpty()){
            foreach($connectedCustomersData as $connectAgent){
                $connectedCustomersArray[$connectAgent->id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image) ) ? $connectAgent->image : asset('img/default-user.jpg')  ];
            }
        }

        $response = array();
        $code = 200;
        if($connectedCustomersArray) {
            $response['customers'] = $connectedCustomersArray;
        } else {
            $code = 500;
        }

        //get time array
        $response['starttime'] = $this->generateTimeArray();

        //get primary agent detail
        $response['primaryAgent'] = User::where('id',$ownerid)->first();
        //get secondary agent detail
        $response['secondaryAgent'] = Auth::user();
        //get secondary agent company detail
        $response['companyDetails'] = $response['primaryAgent']->companyDetails;
        $response['secondarycompanyDetails'] = auth()->user()->companyDetails;

        //get commission details of project

        return Response::json($response, $code);
    }
    public function createCommission(Request $request)
    {
        $commissionData = [];
        // Collect common fields

        $agreementStart = Carbon::createFromFormat('m-d-Y', $request->agreement_start_date)->format('Y-m-d');
        $agreementEnd = Carbon::createFromFormat('m-d-Y', $request->agreement_end_date)->format('Y-m-d');

        $ownerId = $request->owner_id;
        $secondaryAgentId = Auth::user()->id;
        $customerIds = implode(',', $request->customer_id);
        $customerId = $customerIds;
        //$projectId = $request->project_id;
        $propertyId = $request->property_id;
        $additionalNote = $request->additional_note;

        // Process Commission Types
        if ($request->commission_type === 'percentage') {
            $commissionData[] = [
                'commission' => 'Percentage Split',
                'percentage' => $request->percentage,
                'total_commission' => $request->commission_amount,
                'agreement_start_date' => $agreementStart,
                'agreement_end_date' => $agreementEnd,
                'owner_id' => $ownerId,
                'secondaryagent_id' => $secondaryAgentId,
                'customer_id' => $customerId,

                'property_id' => $propertyId,
                'additional_note' => $additionalNote,
            ];
        } elseif ($request->commission_type === 'fixed') {
            $commissionData[] = [
                'commission' => 'Fixed Amount',
                'percentage' => 0,
                'total_commission' => $request->fixed_amount,
                'agreement_start_date' => $agreementStart,
                'agreement_end_date' => $agreementEnd,
                'owner_id' => $ownerId,
                'secondaryagent_id' => $secondaryAgentId,
                'customer_id' => $customerId,

                'property_id' => $propertyId,
                'additional_note' => $additionalNote,
            ];
        } elseif ($request->commission_type === 'tiered') {
                $commissionData[] = [
                    'commission' => 'Tiered Commission',
                    'percentage' => 0,
                    'total_commission' => json_encode($request->tiered_commissions),
                    'agreement_start_date' => $agreementStart,
                    'agreement_end_date' => $agreementEnd,
                    'owner_id' => $ownerId,
                    'secondaryagent_id' => $secondaryAgentId,
                    'customer_id' => $customerId,
                    'property_id' => $propertyId,
                    'additional_note' => $additionalNote,
                ];
        }

        // Check if a matching record exists
        $existingCommission = Commission::where('owner_id', $ownerId)
            ->where('secondaryagent_id', $secondaryAgentId)
            ->where('property_id', $propertyId)
            ->first();

        if ($existingCommission) {
            // Update the existing record
            $commission = $existingCommission->update($commissionData);
        } else {
            // Insert a new record
            $commission = Commission::insert($commissionData);
        }
        return response()->json([
            'success' => true,
            'message' => 'Commission saved successfully!',
        ]);
    }
    public function savesignature(Request $request){

        try {
            $imageData = $request->input('image');

            if (!$imageData) {
                return response()->json(['success' => false, 'message' => 'No image data provided.']);
            }

            // Extract base64 string
            $imageData = explode(',', $imageData)[1];
            $imageName = 'signature_' . time() . '.png';

            // Save the image in storage
            // $filePath = 'public/signatures/' . $imageName;
            // Storage::put($filePath, base64_decode($imageData));

            $filePath = public_path('storage/signatures/' . $imageName);
            file_put_contents($filePath, base64_decode($imageData));

            $user = Auth::user();
            $user->signature = $imageName;
            $user->save();
            return response()->json([
                'success' => true,
                'filename' => $imageName,
                'file_url' => Storage::url($filePath),
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    public function generatePDF(Request $request)
    {
        // Data to pass to the view (if required)
        $data = $request->all();
        // echo "<pre>"; print_r($data['commissionData']); echo "</pre>"; die();
        //echo "<pre>"; print_r($data); echo "</pre>"; die();

        /*// Load the view and generate the PDF
        $pdf = Pdf::loadView('pdf.property_collaboration', $data);

        // Return the PDF as a download
        return $pdf->download('property_collaboration.pdf');
        //return View("pdf.property_collaboration", compact('data'));*/

        // Generate the PDF
        $pdf = Pdf::loadView('pdf.property_collaboration', $data);

        // Define the public folder path and filename
        // $fileName = 'property_collaboration_.pdf';
        $fileName = 'property_collaboration_' . time() . '.pdf';
        $path = public_path('pdfs/' . $fileName);

        // Save the PDF to the public folder
        $pdf->save($path);
        if($request->from){
            //update project

        }
        // Return the file path or a success response
        return response()->json(['success' => true, 'file_path' => url('pdfs/' . $fileName)]);
    }
    public function acceptAgreement(Request $request){

        $responseData = $request->all();
        $ownerid = Auth::user()->id;
        $projectId = $responseData['data']['projectid'];
        $models = [
            ProjectProperty::class,
            ProjectCustomer::class,
            ProjectAgent::class,
            ProjectAgentPermission::class,
        ];
        foreach ($models as $model) {
            $model::where('project_id', $projectId)
                ->whereNotNull('deleted_at')
                ->update(['deleted_at' => null]);
        }
        $update = Project::where('id', $projectId)
                ->whereNotNull('deleted_at')
                ->update(['deleted_at' => null]);
        // echo "<pre>"; print_r($update); echo "</pre>"; die();
        $ownerid = Auth::user()->id;
        $secondaryagent = $responseData['data']['secondaryagent'];
        $propertydata =  Property::where('properties.id', $responseData['data']['propertydata'])
            ->leftJoin('users', 'users.id', '=', 'properties.owner_id')
            ->leftJoin('types', 'types.id', '=', 'properties.type_id')
            ->select('properties.*', 'users.*', 'types.name as property_type')
            ->first();
        $requestData = array();
        $loggedInUserId = auth()->user()->id;
        $response = array();
        $code = 200;
        //get primary agent detail
        $response['primaryAgent'] = Auth::user();
        $response['propertydata'] = $propertydata;
        //get secondary agent detail
        $response['secondaryAgent'] = User::where('id',$secondaryagent)->first();
        //get secondary agent company detail
        $response['companyDetails'] = auth()->user()->companyDetails;
        $response['secondarycompanyDetails'] = $response['secondaryAgent']->companyDetails;
        return Response::json($response, $code);
    }
    public function rejectAgreement(Request $request){
        $reason = $request->reason === 'other'
            ? $request->other_reason
            : $request->reason;

        // Store the rejection in the database
        $rejection = new RejectProposals;
        $rejection->agent_id = Auth::user()->id;
        $rejection->project_id = $request->project_id;
        $rejection->reason = $reason;
        $rejection->save();

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Rejection submitted successfully!',
        ]);
    }
}