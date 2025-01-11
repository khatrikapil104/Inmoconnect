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
use Illuminate\Validation\Rule;
use File, Str, Hash, Mail;
use App\Events\CrmNotification;
use App\Mail\InviteCustomer;
use App\Exports\CustomersExport;
use App\Models\PropertyFeature;
use App\Models\UserPropertyFeature;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public $model        =    'customers';

    public $filterName        =    'customerListingFilterData';
    public $listRouteUrl;
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {

            $this->listRouteUrl = route(routeNamePrefix() . 'customers.index');
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
        $customerInviteInstance = new User();
        $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        if(auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin' ){
            $results = $customerInviteInstance->loadUserMembers(['perPage' => $recordsPerPage,'user_role_id' => getUserRoleId('customer') , 'withSelf' => false, ], $request->all(), []);
        }else{
            if($pageType == 'company'){
                $getCompanyUserIds = $customerInviteInstance->loadUserMembers(['userId' => $loggedInUserId, 'user_role_id' => getUserRoleId((auth()->user()->role->name == 'agent' ? 'sub-agent' : 'sub-developer')) , 'withSelf' => false,'pluck' => 'users.id'], $request->all(), []);

                $results = $customerInviteInstance->loadUserMembers([ 'perPage' => $recordsPerPage,'user_role_id' => getUserRoleId('customer') , 'userIds' => !empty($getCompanyUserIds) ? $getCompanyUserIds : [],'is_active' => 1], $request->all(), []);
                
            }else{
                $results = $customerInviteInstance->loadUserMembers(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId, 'user_role_id' => getUserRoleId('customer') , 'withSelf' => false], $request->all(), []);
            }
        }
        if($pageType == 'company'){
            $listingType = 'customer-listing-company';
            
        }else{
            $listingType = 'customer-listing';

        }
        if ($request->ajax()) {

            $tableData =  View("components.tables.custom-table", compact('results', 'listingType','pageType'))->render();
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
            return  View("modules.$this->model.index", compact('results', 'listingType', 'filterData','pageType'));
        }
    }


    public function invite(Request $request)
    {
        $loggedInUserId = Auth::user()->id;
        $formData = $request->all();
        
        if (!empty($formData)) {
            $validator = Validator::make(
                $request->all(),
                array(
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'phone' => ['required', 'regex:/^\+\(\d{1,2}\) \(\d{3} \d{3} \d{3}\)$/'],
                    // , 'regex:/\+\((\d{1,2})\) \((\d{4})\) \((\d{3})\) \((\d{3})\)/'
                    'email' => ['required', 'email', Rule::unique('users')]

                ),
                array(

                    "first_name.required" => trans("messages.The_first_name_field_is_required"),
                    "last_name.required" => trans("messages.The_last_name_field_is_required"),
                    "phone.required" => trans("messages.The_mobile_number_field_is_required"),
                    "phone.regex" => trans("messages.Please_enter_a_valid_mobile_number"),
                    "email.required" => trans("messages.The_email_field_is_required"),
                    "email.email" => trans("messages.The_email_field_must_be_a_valid_email_address"),
                    "email.unique" => trans("messages.The_email_has_already_been_taken"),

                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                
                DB::beginTransaction();
                $obj   = new User;
                $obj->parent_user_id = $loggedInUserId;
                $obj->name = $request->first_name . " " . $request->last_name;
                $obj->email = $request->email;
                $obj->phone = $request->phone;
                $obj->user_role_id = getUserRoleId('customer');
                $obj->verification_token           =  Str::uuid();
                $obj->markEmailAsVerified();
                $obj->is_active = 0;
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
                DB::commit();

                //Send Invite Email to Customer
                Mail::to($obj->email)->send(new InviteCustomer($obj->name, auth()->user()->name, auth()->user()->image, route('user.register') . "?invite-token=" . $obj->verification_token));

                $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id , 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_6', 'type' => 'customer', 'values' => [auth()->user()->name, $request->first_name . " " . $request->last_name ]]));

                $response = array();
                $response["status"] = "success";
                $response["msg"] = trans('messages.popup-message.Customer_invited_successfully');
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

        // $user = User::where('id',Auth::user()->id)->first();
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
                        'first_name' => 'required',
                        'last_name' => 'required',

                        'phone' => ['required', 'regex:/^\+\(\d{1,2}\) \(\d{3} \d{3} \d{3}\)$/'],
                        // , 'regex:/\+\((\d{1,2})\) \((\d{4})\) \((\d{3})\) \((\d{3})\)/'
                        'email' => ['required', 'email', Rule::unique('users')->ignore($id)]

                    ),
                    array(
                        "images.mimes" => trans("messages.The_image_field_must_be_a_file_of_type_jpg_jpeg_png"),
                        "first_name.required" => trans("messages.The_first_name_field_is_required"),
                        "last_name.required" => trans("messages.The_last_name_field_is_required"),
                        "phone.required" => trans("messages.The_mobile_number_field_is_required"),
                        "phone.regex" => trans("messages.Please_enter_a_valid_mobile_number"),
                        "email.required" => trans("messages.The_email_field_is_required"),
                        "email.email" => trans("messages.The_email_field_must_be_a_valid_email_address"),
                        "email.unique" => trans("messages.The_email_has_already_been_taken"),


                    )
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {

                    DB::beginTransaction();
                    $obj                                =  User::find($id);
                    $obj->name = $request->first_name . " " . $request->last_name;
                    $obj->email = $request->email;
                    $obj->phone = $request->phone;
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
                    DB::commit();

                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans('messages.popup-message.Customer_invite_updated_successfully');
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
        $user = User::findOrFail($id);

        $user->delete();

        $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id , 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_7', 'type' => 'customer', 'values' => [auth()->user()->name, $user->name ]]));

        return redirect()->route(routeNamePrefix() . 'customers.index')->with('flash_notice', trans('messages.popup-message.Customer_invite_cancelled_successfully'));
    }

    public function cancelInvite(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route(routeNamePrefix() . 'customers.index')->with('flash_notice', trans('messages.popup-message.Customer_invite_cancelled_successfully'));
    }

    public function exportCustomers()
    {
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }

    public function loadEditView(Request $request, $id)
    {
        $customerInviteInstance = new User();
        $result = $customerInviteInstance->loadUserMembers(['singleRecord' => true,'recordId' => $id ], $request->all(), []);
        if (!empty($result)) {
            if ($request->type == 'view') {
                $featureId = UserPropertyFeature::where('user_id',$result->id)->pluck('feature_id')->toArray();
                $feature = Feature::whereIn('id',$featureId)->pluck('name')->toArray();
                $result->feature = implode(', ', $feature);

                $typeIdsArray = !empty($result->userPropertyPreference) ? explode(',', $result->userPropertyPreference->type_id) : [];
                $typeData = Type::whereIn('id', $typeIdsArray)->pluck('name');
                $result->typeNames = implode(', ', $typeData->toArray());

                $situationIdsArray = !empty($result->userPropertyPreference->situation_id) ? explode(',', $result->userPropertyPreference->situation_id) : [];
                $situationData = Situation::whereIn('id', $situationIdsArray)->pluck('name');
                $result->situationNames = implode(', ', $situationData->toArray());
                $htmlData = View('modules.customers.includes.view_customer', compact('result'))->render();
                $response = array();
                $response["status"] = "success";
                $response["msg"] = '';
                $response["data"] = $htmlData;
                $response["http_code"] = 200;
                return Response::json($response, 200);
            } else {
                $type = 'edit';
                $htmlData = View('modules.customers.includes.create_edit_customer', compact('result', 'type'))->render();
                $response = array();
                $response["status"] = "success";
                $response["msg"] = '';
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
}
