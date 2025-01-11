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
use App\Models\UserPermission;
use App\Models\UserPermissionAccess;
use App\Models\UserCertificate;
use App\Models\userCompanyDetail;
use Illuminate\Validation\Rule;
use File, Str, Hash, Mail;
use App\Events\CrmNotification;
use App\Mail\InviteTeamMember;

use Maatwebsite\Excel\Facades\Excel;

class TeamManagementController extends Controller
{
    public $model        =    'team_management';

    public $filterName        =    'teamManagementListingFilterData';
    public $listRouteUrl;
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {

            $this->listRouteUrl = route(routeNamePrefix() . 'team_management.index');
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
        $teamMemberInstance = new User();
        $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $results = $teamMemberInstance->loadUserMembers(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId, 'user_role_id' => getUserRoleId(auth()->user()->role->name == 'agent' ? 'sub-agent' : 'sub-developer'), 'withSelf' => true], $request->all(), []);
        $listingType = 'team-management-listing';

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
            if (auth()->user()->role->name == 'agent') {

                $userPermissions = UserPermission::where('is_team_management_permission', 1)->where('is_agent_related_permission', 1)->get();
            } else {
                $userPermissions = UserPermission::where('is_team_management_permission', 1)->where('is_developer_related_permission', 1)->get();
            }
            $teamMembersWithPermissionsData = $teamMemberInstance->loadUserMembers(['userId' => $loggedInUserId, 'user_role_id' => getUserRoleId(auth()->user()->role->name == 'agent' ? 'sub-agent' : 'sub-developer'), 'withSelf' => false, 'is_active' => 1], $request->all(), ['user_permissions']);
            $activeMembersLimit = config('Modules.team_management.' . auth()->user()->role->name . '_members_limit');
            return  View("modules.$this->model.index", compact('results', 'listingType', 'filterData', 'teamMembersWithPermissionsData', 'userPermissions', 'activeMembersLimit'));
        }
    }


    public function inviteTeamMember(Request $request)
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
                    'email' => ['required', 'email', Rule::unique('users')],
                    // 'userAccessArr.*' => 'required'
                ),
                array(

                    "first_name.required" => trans("messages.The_first_name_field_is_required"),
                    "last_name.required" => trans("messages.The_last_name_field_is_required"),
                    "phone.required" => trans("messages.The_mobile_number_field_is_required"),
                    "phone.regex" => trans("messages.Please_enter_a_valid_mobile_number"),
                    "email.required" => trans("messages.The_email_field_is_required"),
                    "email.email" => trans("messages.The_email_field_must_be_a_valid_email_address"),
                    "email.unique" => trans("messages.The_email_has_already_been_taken"),
                    'userAccessArr.*.required' => 'Please provide atleast 1 access'

                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                $teamMemberInstance = new User();
                $teamMembersCount = $teamMemberInstance->loadUserMembers(['userId' => $loggedInUserId, 'user_role_id' => getUserRoleId(auth()->user()->role->name == 'agent' ? 'sub-agent' : 'sub-developer'), 'fetchCount' => true, 'withSelf' => false, 'is_active' => 1], $request->all(), []);
                $activeMembersLimit = config('Modules.team_management.' . auth()->user()->role->name . '_members_limit');
                if ($teamMembersCount == $activeMembersLimit) {
                    $response = array();
                    $response["status"] = "error";
                    $response["msg"] = trans("You cannot have more than " . $activeMembersLimit . " active members at a time.");
                    $response["data"] = (object) array();
                    $response["http_code"] = 500;
                    return Response::json($response, 500);
                }
                DB::beginTransaction();
                $obj   = new User;
                $obj->parent_user_id = $loggedInUserId;
                $obj->name = $request->first_name . " " . $request->last_name;
                $obj->email = $request->email;
                $obj->phone = $request->phone;
                $obj->user_role_id = getUserRoleId('sub-' . auth()->user()->role->name);
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

                if (!empty($request->userAccessArr)) {
                    foreach ($request->userAccessArr as $accessId) {
                        $obj2   =   new UserPermissionAccess;
                        $obj2->user_id  = $lastId;
                        $obj2->user_permission_id  = $accessId;
                        $obj2->save();
                    }
                }
                DB::commit();

                //Send Invite Email to Team Member
                Mail::to($obj->email)->send(new InviteTeamMember($obj->name, auth()->user()->name, auth()->user()->image, route('user.register') . "?invite-token=" . $obj->verification_token));

                $response = array();
                $response["status"] = "success";
                $response["msg"] = trans('Sub-' . ucfirst(auth()->user()->role->name) . ' added successfully');
                $response["data"] = route(routeNamePrefix() . 'team_management.index');
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

    public function submitTeamMemberAccessData(Request $request)
    {
        $loggedInUserId = Auth::user()->id;
        if (!empty($request->dataArr) && is_array($request->dataArr)) {
            foreach ($request->dataArr as $dataVal) {
                if (!empty($dataVal['user_id'])) {
                    $accessIdArr = [];
                    if (!empty($dataVal['permissions'])) {
                        foreach ($dataVal['permissions'] as $permissionKey => $permissionVal) {
                            if ($permissionVal == 1) {
                                $checkIfThisPermissionAlreadyExists = UserPermissionAccess::where('user_id', $dataVal['user_id'])->where('user_permission_id', $permissionKey)->whereNull('deleted_at')->first();
                                $userPermissionId = UserPermission::where('permission_name', $permissionKey)->value('id');
                                if (!empty($checkIfThisPermissionAlreadyExists)) {
                                    $obj   =  UserPermissionAccess::find($checkIfThisPermissionAlreadyExists->id);
                                } else {
                                    $obj   =   new UserPermissionAccess;
                                }
                                $obj->user_id  = $dataVal['user_id'];
                                $obj->user_permission_id  = $userPermissionId;
                                $obj->save();
                                $accessIdArr[] = $obj->id;
                            }
                        }
                    }
                    UserPermissionAccess::whereNotIn('id', $accessIdArr)->where('user_id', $dataVal['user_id'])->delete();
                }
            }

            Session()->flash('flash_notice', trans('Privileges updated Successfully'));
            return redirect()->route(routeNamePrefix() . 'team_management.index');
        }
    }

    public function edit(Request $request, $id)
    {

        if (auth()->user()->role->name == 'agent') {

            $userPermissions = UserPermission::where('is_team_management_permission', 1)->where('is_agent_related_permission', 1)->get();
        } else {
            $userPermissions = UserPermission::where('is_team_management_permission', 1)->where('is_developer_related_permission', 1)->get();
        }
        $user = User::findOrFail($id);

        return  View("modules.$this->model.edit", compact('user', 'userPermissions'));
    }

    public function updateTeamMember(Request $request, $id)
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
                    $obj   = User::find($id);

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

                    $accessIdArr = [];
                    if (!empty($request->userAccessArr)) {
                        foreach ($request->userAccessArr as $accessId) {
                            $checkIfThisPermissionAlreadyExists = UserPermissionAccess::where('user_id', $lastId)->where('user_permission_id', $accessId)->whereNull('deleted_at')->first();
                            if (!empty($checkIfThisPermissionAlreadyExists)) {
                                $obj   =  UserPermissionAccess::find($checkIfThisPermissionAlreadyExists->id);
                            } else {
                                $obj   =   new UserPermissionAccess;
                            }

                            $obj->user_id  = $lastId;
                            $obj->user_permission_id  = $accessId;
                            $obj->save();
                            $accessIdArr[] = $obj->id;
                        }
                    }
                    UserPermissionAccess::whereNotIn('id', $accessIdArr)->where('user_id', $lastId)->delete();

                    DB::commit();

                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans('Sub-' . ucfirst(auth()->user()->role->name) . ' updated successfully');
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
        $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id, 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_14', 'type' => 'team_management', 'values' => [$user->name,auth()->user()->companyDetails->company_name, auth()->user()->name]]));


        return redirect()->route(routeNamePrefix() . 'team_management.index')->with('flash_notice', trans('User deleted successfully'));
    }
    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $loggedInUserId = Auth::user()->id;
        if (!empty($user)) {
            $teamMemberInstance = new User();
            $teamMembersCount = $teamMemberInstance->loadUserMembers(['userId' => $loggedInUserId, 'user_role_id' => getUserRoleId(auth()->user()->role->name == 'agent' ? 'sub-agent' : 'sub-developer'), 'fetchCount' => true, 'withSelf' => false, 'is_active' => 1], $request->all(), []);
            $activeMembersLimit = config('Modules.team_management.' . auth()->user()->role->name . '_members_limit');
            if ($teamMembersCount == $activeMembersLimit && $user->is_active == 0) {
                return redirect()->route(routeNamePrefix() . 'team_management.index')->with('error',  trans("You cannot have more than " . $activeMembersLimit . " active members at a time."));
               
            }
            User::where('id', $id)->update(['is_active' => !empty($user->is_active) ? 0 : 1]);
            return redirect()->route(routeNamePrefix() . 'team_management.index')->with('flash_notice', trans('Status Changed Successfully'));
        } else {
            return redirect()->route(routeNamePrefix() . 'team_management.index')->with('error', trans('Invalid Request'));
        }
    }

    public function cancelInvite(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route(routeNamePrefix() . 'team_management.index')->with('flash_notice', trans('Invite cancelled successfully'));
    }

    public function exportCustomers()
    {
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }

    public function loadEditView(Request $request, $id)
    {

        $teamMemberInstance = new User();
        $result = $teamMemberInstance->loadUserMembers(['singleRecord' => true, 'recordId' => $id], $request->all(),  ['user_permissions']);
        if (!empty($result)) {

            $type = 'edit';
            if (auth()->user()->role->name == 'agent') {

                $userPermissions = UserPermission::where('is_team_management_permission', 1)->where('is_agent_related_permission', 1)->get();
            } else {
                $userPermissions = UserPermission::where('is_team_management_permission', 1)->where('is_developer_related_permission', 1)->get();
            }
            $htmlData = View('modules.team_management.includes.create_edit_team_member', compact('result', 'type', 'userPermissions'))->render();
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

    public function show(Request $request, $id)
    {
        $loggedInUserId = auth()->user()->id;
        $user = User::where('users.id', $id)->leftJoin('user_company_details', 'user_company_details.user_id', 'users.id')->select('users.*', 'user_company_details.company_name', 'user_company_details.company_email', 'user_company_details.company_mobile', 'user_company_details.company_tax_number', 'user_company_details.company_website', 'user_company_details.company_address', 'user_company_details.company_city', 'user_company_details.company_sate', 'user_company_details.company_country', 'user_company_details.company_zipcode', 'user_company_details.company_sub_agent', 'user_company_details.company_image', 'user_company_details.professional_title', 'user_company_details.property_types_specialized', 'user_company_details.property_specialization', 'user_company_details.total_properties_in_portfolio', 'user_company_details.total_years_experiance', 'user_company_details.number_of_current_customers', 'user_company_details.avg_number_properties_managed', 'user_company_details.primary_service_area')->first();
        $companyDetails = User::find(auth()->user()->id);

        $certificateData = UserCertificate::where('user_id', auth()->user()->id)->get();
        $total_properties_in_portfolio = userCompanyDetail::total_properties_in_portfolio;
        $total_years_experiance = userCompanyDetail::total_years_experiance;
        $number_of_current_customers = userCompanyDetail::number_of_current_customers;
        $avg_number_properties_managed = userCompanyDetail::avg_number_properties_managed;
        $number_of_sub_agents = userCompanyDetail::number_of_sub_agents;
        // $typeIdsArray = !empty($user->property_types_specialized) ? explode(',', $user->property_types_specialized) : [];
        $typeIdsArray = !empty($companyDetails->companyDetails->property_types_specialized) ? explode(',', $companyDetails->companyDetails->property_types_specialized) : [];
        $typeData = Type::whereIn('id', $typeIdsArray)->pluck('name');
        $user->typeNames = implode(', ', $typeData->toArray());
        $teamMemberInstance = new User();
        $teamMembersCount = $teamMemberInstance->loadUserMembers(['userId' => $loggedInUserId, 'user_role_id' => getUserRoleId(auth()->user()->role->name == 'agent' ? 'sub-agent' : 'sub-developer'), 'fetchCount' => true, 'withSelf' => false, 'is_active' => 1], $request->all(), []);
        $activeMembersLimit = config('Modules.team_management.' . auth()->user()->role->name . '_members_limit');
        return  View("modules.$this->model.view_team_management", compact('user', 'teamMembersCount', 'activeMembersLimit', 'certificateData', 'companyDetails', 'total_properties_in_portfolio', 'total_years_experiance', 'number_of_current_customers', 'avg_number_properties_managed', 'number_of_sub_agents'));
    }
}
