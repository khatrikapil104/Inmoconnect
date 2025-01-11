<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ViewedUserProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Property;
use App\Events\CrmNotification;
use App\Models\AgentLead;
use App\Models\SocialUser;
use App\Models\PendingRequest;
use App\Models\UserCertificate;
use App\Models\Category;
use App\Models\Development;
use App\Models\Situation;
use App\Models\Type;
use App\Models\Feature;
use App\Models\Event;
use App\Models\EventAttachment;
use App\Models\FeedImportProgress;
use App\Models\Role;
use App\Models\Project;
use App\Models\userCompanyDetail;
use App\Models\UserFile;
use App\Models\UserProfessionalInformation;
use App\Models\UserPropertyFeature;
use App\Models\UserPropertyPreference;
use App\Models\UserCompanyTask;
use App\Models\UserCompanyTaskAssign;
use App\Models\Group;
use App\Models\GroupParticipants;
use App\Models\SavedProperties;
use App\Models\UserFileFolders;
use App\Models\UserRecentActivity;
use App\Models\XmlFeedsAssisted;
use DB, Redirect, Response, File, Auth, Hash;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Laravel\Socialite\Facades\Socialite;

class DashboardController extends Controller
{
    public $model = 'dashboard';
    public function __construct(Request $request)
    {
        parent::__construct();
        View()->share('model', $this->model);
        $this->request = $request;
    }
    public function index(Request $request)
    {
        $requestData = $request->all();
        $currentDate = Carbon::now();
        $currentDate = $currentDate->format('Y-m-d');
        $loggedInUserId = auth()->user()->id;
        $agentRoleId = Role::where('name', 'agent')->value('id');
        $customerRoleId = Role::where('name', 'customer')->value('id');
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $folderInstance = new UserFileFolders();
        $folders = $folderInstance->loadUserFolder(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], $request->all(), []);

        if (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin') {
            $usersCount = User::whereNotNull('email_verified_at')->whereNull('deleted_at')->count();

            $propertiesCount = Property::whereNull('deleted_at')->count();
            return View("modules.$this->model.index", compact('usersCount', 'propertiesCount', 'folders'));
        } elseif (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer') {
            $teamMemberInstance = new User();
            $totalActiveMembers = $teamMemberInstance->loadUserMembers(['userId' => $loggedInUserId, 'user_role_id' => getUserRoleId('sub-' . auth()->user()->role->name), 'withSelf' => false, 'is_active' => 1], $request->all(), []);
            $activeMembersLimit = config('Modules.team_management.' . auth()->user()->role->name . '_members_limit');
            $connectedAgentsCount = PendingRequest::where('requests.status', config('constant.REQUEST_STATUS.ACCEPTED'))->leftJoin('users', function ($join) use ($loggedInUserId) {
                $join->on('users.id', '=', 'requests.to')
                    ->where('requests.from', '=', $loggedInUserId)
                    ->orWhere(function ($query) use ($loggedInUserId) {
                        $query->on('users.id', '=', 'requests.from')
                            ->where('requests.to', '=', $loggedInUserId);
                    });
            })->leftJoin('user_roles', 'users.user_role_id', '=', 'user_roles.id')->where('user_roles.name', '=', 'agent')->whereNull('users.deleted_at')->whereNotNull('users.email_verified_at')->count();
            $connectedCustomersCount = PendingRequest::where('requests.status', config('constant.REQUEST_STATUS.ACCEPTED'))->leftJoin('users', function ($join) use ($loggedInUserId) {
                $join->on('users.id', '=', 'requests.to')
                    ->where('requests.from', '=', $loggedInUserId)
                    ->orWhere(function ($query) use ($loggedInUserId) {
                        $query->on('users.id', '=', 'requests.from')
                            ->where('requests.to', '=', $loggedInUserId);
                    });
            })->leftJoin('user_roles', 'users.user_role_id', '=', 'user_roles.id')->where('user_roles.name', '=', 'customer')->whereNull('users.deleted_at')->whereNotNull('users.email_verified_at')->count();
            $userInstance = new User();
            $connectedAgentsData = $userInstance->loadUserConnectedUsersData(['perPage' => $recordsPerPage, 'userRoleName' => 'agent', 'userId' => $loggedInUserId], $requestData);
            $connectedCustomersData = $userInstance->loadUserConnectedUsersData(['perPage' => $recordsPerPage, 'userRoleName' => 'customer', 'userId' => $loggedInUserId], $requestData);
            $propertyInstance = new Property();
            $agentProperties = $propertyInstance->loadPropertiesByAgentId(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], $requestData);

            $publishedProperties = $propertyInstance->where('owner_id', auth()->user()->id)->where('properties.status', 'published')->whereNull('properties.deleted_at')->count();

            $developerPropertiesUnit = $propertyInstance->where('owner_id', auth()->user()->id)->whereNotNull('development_id')->count();
            $projectInstance = new Project();
            $agentProjects = $projectInstance->fetchProjects(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], [], []);
            $propertyTypes = Type::where('is_active', 1)->whereIn('name', ['Apartment', 'House', 'Plot', 'Commercial'])->pluck('name')->toArray();
            $typeCounts = [];

            foreach ($propertyTypes as $typeName) {
                $count = Property::where('properties.owner_id', $loggedInUserId)->whereNull('properties.deleted_at')->where('type_id', function ($query) use ($typeName) {
                    $query->select('id')->from('types')->where('name', $typeName);
                })->count();

                $typeCounts[] = $count;
            }
            $eventInstance = new Event();
            $events = $eventInstance->fetchEvents(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], [], ['user_associations']);

            $agentProjectsArray = [];
            if ($agentProjects->isNotEmpty()) {
                foreach ($agentProjects as $agentProject) {
                    $agentProjectsArray[$agentProject->id] =  $agentProject->project_name;
                }
            }
            // print_r($agentProjectsArray);die;

            $agentPropertiesArray = [];
            if ($agentProperties->isNotEmpty()) {
                foreach ($agentProperties as $agentProperty) {
                    $agentPropertiesArray[$agentProperty->id] = ['label' => $agentProperty->name, 'image' => (!empty($agentProperty->cover_image)) ? $agentProperty->cover_image : asset('img/default-property.jpg')];
                }
            }

            $connectedAgentsArray = [];
            if ($connectedAgentsData->isNotEmpty()) {
                foreach ($connectedAgentsData as $connectAgent) {
                    $connectedAgentsArray[$connectAgent->id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image)) ? $connectAgent->image : asset('img/default-user.jpg')];
                }
            }
            $connectedCustomersArray = [];
            if ($connectedCustomersData->isNotEmpty()) {
                foreach ($connectedCustomersData as $connectAgent) {
                    $connectedCustomersArray[$connectAgent->id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image)) ? $connectAgent->image : asset('img/default-user.jpg')];
                }
            }
            $timeArray = $this->generateTimeArray();
            $currentMonthDateData = $this->getCurrentMonthDaysDateArr();
            $actionCount = [
                'callCount' => 0,
                'viewingCount' => 0,
                'meetingCount' => 0,
            ];

            foreach ($events as $event) {
                if ($event->action == 'call') {
                    $actionCount['callCount'] += 1;
                }
                if ($event->action == 'view_meeting') {
                    $actionCount['viewingCount'] += 1;
                }
                if ($event->action == 'meeting') {
                    $actionCount['meetingCount'] += 1;
                }
            }

            $userCompanyTaskInstance = new UserCompanyTask();
            $user_company_tasks = $userCompanyTaskInstance->loadUserCompanyTasks(['perPage' => $recordsPerPage, 'companyId' => !empty(auth()->user()->companyDetails->id) ?  auth()->user()->companyDetails->id : 0], [], []);

            $userCompanyTaskAssign = [];
            if ($user_company_tasks->isNotEmpty()) {

                foreach ($user_company_tasks as $companyTask) {
                    if (!empty($companyTask->userCompanyTaskAssign)) {
                        foreach ($companyTask->userCompanyTaskAssign as $taskAssign) {
                            array_push($userCompanyTaskAssign, $taskAssign);
                        }
                    }
                }
            }
            $taskUserData = [];
            if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer') {

                if ($totalActiveMembers->isNotEmpty()) {
                    foreach ($totalActiveMembers as $member) {
                        $taskUserData[$member->id] = ['label' => $member->name, 'image' => (!empty($member->image)) ? getFileUrl($member->image ?? '', 'users') : asset('img/default-user.jpg')];
                    }
                }
            }

            $assignToTask = true;


            $findThisCompanyGroup = Group::where('company_id', !empty(auth()->user()->companyDetails->id) ?  auth()->user()->companyDetails->id : 0)->where('is_company_group', 1)->first();
            if (!empty($findThisCompanyGroup)) {
                $groupInstance = new Group();
                $groupChatHistoryData = $groupInstance->getGroupChatHistoryData($request, $loggedInUserId, $loggedInUserId, $findThisCompanyGroup->id, $findThisCompanyGroup);
            } else {
                $groupChatHistoryData = "";
            }

            $recentActivityInstance = new UserRecentActivity();
            $userRecentActivities = $recentActivityInstance->loadUserRecentActivities(['perPage' => $recordsPerPage, 'companyId' => !empty(auth()->user()->companyDetails->id) ?  auth()->user()->companyDetails->id : 0, 'userId' => $loggedInUserId], [], ['activity_data']);

            $loadLeadUser = new AgentLead();
            $results = $loadLeadUser->loadLeadUser(['perPage' => $recordsPerPage], $request->all(), $loggedInUserId);
            $formattedDate = '';
            $progressbatchdata = FeedImportProgress::where('user_id', $loggedInUserId)->first();
            if (!empty($progressbatchdata->updated_at)) {
                $date =  $progressbatchdata->updated_at;
                $formattedDate = Carbon::parse($date)->format('H:i, d/m/Y');
            }
            return View("modules.$this->model.agent-developer-dashboard", array_merge(
                compact(
                    'connectedAgentsCount',
                    'agentProperties',
                    'developerPropertiesUnit',
                    'propertyTypes',
                    'typeCounts',
                    'events',
                    'agentPropertiesArray',
                    'connectedAgentsArray',
                    'connectedCustomersArray',
                    'timeArray',
                    'agentProjects',
                    'agentProjectsArray',
                    'connectedCustomersCount',
                    'user_company_tasks',
                    'userCompanyTaskAssign',
                    'groupChatHistoryData',
                    'actionCount',
                    'currentMonthDateData',
                    'currentDate',
                    'taskUserData',
                    'userRecentActivities',
                    'assignToTask',
                    'folders',
                    'formattedDate',
                    'results',
                    'publishedProperties'
                ),
                (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer') ? compact('totalActiveMembers', 'activeMembersLimit') : []
            ));
        } elseif (auth()->user()->role->name == 'customer') {
            $connectedAgentsCount = PendingRequest::where('requests.status', config('constant.REQUEST_STATUS.ACCEPTED'))->leftJoin('users', function ($join) use ($loggedInUserId) {
                $join->on('users.id', '=', 'requests.to')
                    ->where('requests.from', '=', $loggedInUserId)
                    ->orWhere(function ($query) use ($loggedInUserId) {
                        $query->on('users.id', '=', 'requests.from')
                            ->where('requests.to', '=', $loggedInUserId);
                    });
            })->leftJoin('user_roles', 'users.user_role_id', '=', 'user_roles.id')->where('user_roles.name', '=', 'agent')->whereNull('users.deleted_at')->whereNotNull('users.email_verified_at')->count();

            $propertyInstance = new Property();
            $agentProperties = $propertyInstance->loadPropertiesByAgentId(['perPage' => $recordsPerPage, 'userId' => auth()->user()->parent_user_id], $requestData);
            $eventInstance = new Event();
            $upcomingEvents = $eventInstance->fetchEvents(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], [], ['user_associations']);
            $timeArray = $this->generateTimeArray();
            $userInstance = new User();
            $connectedAgentsData = $userInstance->loadUserConnectedUsersData(['perPage' => $recordsPerPage, 'userRoleName' => 'agent', 'userId' => $loggedInUserId], $requestData);

            $upcomingViewedPropertyCount = Event::where(function ($query) use ($loggedInUserId) {
                $query->where('events.owner_id', $loggedInUserId)
                    ->orWhereHas('associations', function ($query) use ($loggedInUserId) {
                        $query->where('association_id', $loggedInUserId);
                    });
            })
                ->whereNull('events.deleted_at')->where('action', 'view_meeting')->where(DB::raw("CONCAT(due_date, ' ', start_from)"), '>', now())->count();

            $projectInstance = new Project();
            $project = $projectInstance->fetchProjects(['perPage' => $recordsPerPage, 'userId' => auth()->user()->parent_user_id], [], []);
            $projectTaskAssign = [];
            
            foreach ($project as $projectData) {
                // if (!empty($project->project_tasks)) {
                    foreach ($projectData->project_tasks as $projectTask) {
                        if (!empty($projectTask->projectTaskAssign)) {
                            foreach ($projectTask->projectTaskAssign as $taskAssign) {
                                array_push($projectTaskAssign, $taskAssign);
                            }
                        }
                    }
            }
            $currentMonthDateData = $this->getCurrentMonthDaysDateArr();
            $savedProperties = SavedProperties::where('saved_properties.user_id', auth()->user()->id)->paginate();
            $eventInstance = new Event();
            $events = $eventInstance->fetchEvents(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], [], ['user_associations']);
            $actionCount = [
                'callCount' => 0,
                'viewingCount' => 0,
                'meetingCount' => 0,
            ];

            foreach ($events as $event) {
                if ($event->action == 'call') {
                    $actionCount['callCount'] += 1;
                }
                if ($event->action == 'view_meeting') {
                    $actionCount['viewingCount'] += 1;
                }
                if ($event->action == 'meeting') {
                    $actionCount['meetingCount'] += 1;
                }
            }
            return View("modules.$this->model.customer-dashboard", compact('connectedAgentsCount', 'upcomingEvents', 'timeArray', 'connectedAgentsData', 'agentProperties', 'upcomingViewedPropertyCount', 'project', 'savedProperties', 'projectTaskAssign','events','currentDate','currentMonthDateData','actionCount'));
        }
    }

    public function fetchUserCompanyTasks(Request $request)
    {
        $loggedInUserId = auth()->user()->id;
        $assignToTask = false;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $userCompanyTaskInstance = new UserCompanyTask();
        $user_company_tasks = $userCompanyTaskInstance->loadUserCompanyTasks(['perPage' => $recordsPerPage, 'companyId' => !empty(auth()->user()->companyDetails->id) ?  auth()->user()->companyDetails->id : 0], $request->all(), []);

        $htmlData = View('modules.dashboard.includes.load_todo_mgmt', compact('user_company_tasks', 'assignToTask'))->render();
        $response = array();
        $response["status"] = "success";
        $response["msg"] = '';
        $response["data"] = $htmlData;
        $response['customers'] = $user_company_tasks;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }

    public function updateTaskStatus(Request $request)
    {
        $loggedInUserId = auth()->user()->id;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        if (!empty($request->dataArr)) {
            foreach ($request->dataArr as $val) {
                $taskStatus = UserCompanyTask::find($val);
                if ($taskStatus->status == 'completed') {
                    if (!empty($taskStatus->temp_status)) {

                        $taskStatus->status = $taskStatus->temp_status;
                    }
                    $taskStatus->temp_status = $taskStatus->status;
                } else {
                    $taskStatus->temp_status = $taskStatus->status;
                    $taskStatus->status = 'completed';
                }
                $taskStatus->save();
                $taskName = UserCompanyTask::where('id', $val)->value('task_name');

                // $this->saveProjectRecentActivity((['project_id' => $project->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_15', 'type' => 'todo_list', 'values' => [auth()->user()->name, $taskName]]));
            }
        }



        $response = array();
        $response["status"] = "success";
        $response["msg"] = 'Task status updated successfully';
        $response["data"] = (object) array();
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }

    public function saveTaskData(Request $request)
    {
        $formData = $request->all();
        // dd($formData);
        $loggedInUserId = Auth::user()->id;
        $projectInstance = new Project();
        $projectDetails = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        if (!empty($projectDetails && $formData)) {
            if (!empty($formData)) {

                $rules = [
                    'end_date' => 'required|date_format:m-d-Y',
                    // 'task_name' => 'required',

                ];

                $validator = Validator::make(
                    $request->all(),
                    $rules,
                    array(
                        "task_name.required" => trans('messages.my-project.task_name_field_is_required'),
                        "end_date.required" => trans('messages.my-project.project_end_date'),
                    )
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {
                    if (!empty($request->remove_task_id) && ProjectTask::where('project_id', $projectDetails->id)->where('task_id', $request->remove_task_id)->exists()) {

                        // dd('hi');
                        $projectTaskId =  ProjectTask::where('project_id', $projectDetails->id)->where('task_id', $request->remove_task_id)->pluck('id')->toArray();
                        $findingTaskWithAssignment = ProjectTaskAssign::whereIn('project_task_assigns.project_task_id', $projectTaskId)->pluck('project_task_id')->toArray();

                        // dd($projectTaskId);
                        // $remainingProjectTaskIds = array_diff($projectTaskId, $findingTaskWithAssignment);

                        // dd($findingTaskWithAssignment);
                        ProjectTaskAssign::whereIn('project_task_id', $findingTaskWithAssignment)->delete();
                        ProjectTask::whereIn('id', $projectTaskId)->delete();

                        // dd($formData);
                        if (!empty($request->sub_task_id)) {
                            $remainingSubTaskIds = ProjectTask::whereIn('id', $findingTaskWithAssignment)->pluck('sub_task_id')->toArray();
                            foreach ($request->sub_task_id as $subTaskId) {
                                if (!in_array($subTaskId, $remainingSubTaskIds)) {
                                    $obj = new ProjectTask;
                                    $obj->added_by = $loggedInUserId;
                                    $obj->project_id = $projectDetails->id;
                                    $obj->task_id = $request->task_id;
                                    $end_date = \Carbon\Carbon::createFromFormat('m-d-Y', $request->input('end_date'))->format('Y-m-d');
                                    $obj->end_date = $end_date;
                                    $obj->sub_task_id = $subTaskId;
                                    $obj->save();
                                }
                            }
                        }
                        $this->saveProjectRecentActivity((['project_id' => $projectDetails->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_14', 'type' => 'todo_list', 'values' => [auth()->user()->name, $request->input('task_name'), '']]));

                        $response = array();
                        $response["status"] = "success";
                        $response["msg"] = 'Task added successfully';
                        $response["data"] = (object) array();
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    }
                    if (ProjectTask::where('project_id', $projectDetails->id)->where('task_id', $request->task_id)->exists()) {

                        // dd($formData);
                        $response = array();
                        $response["status"] = "success";
                        $response["msg"] = trans("messages.Projecct_Attachment_Removed_Successfully");
                        $response["data"] = $request->task_id;
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    } else {
                        DB::beginTransaction();
                        if (!empty($request->sub_task_id)) {
                            foreach ($request->sub_task_id as $subTaskId) {
                                $obj = new ProjectTask;
                                $obj->added_by = $loggedInUserId;
                                $obj->project_id = $projectDetails->id;
                                $obj->task_id = $request->task_id;
                                $end_date = \Carbon\Carbon::createFromFormat('m-d-Y', $request->input('end_date'))->format('Y-m-d');
                                $obj->end_date = $end_date;
                                $obj->sub_task_id = $subTaskId;

                                $obj->save();
                            }
                        }
                        if (!empty($request->task_name)) {
                            $obj = new ProjectTask;
                            $obj->added_by = $loggedInUserId;
                            $obj->project_id = $projectDetails->id;
                            $obj->task_name = $request->task_name;
                            $end_date = \Carbon\Carbon::createFromFormat('m-d-Y', $request->input('end_date'))->format('Y-m-d');
                            $obj->end_date = $end_date;
                            $obj->save();
                        }
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


                        $this->saveProjectRecentActivity((['project_id' => $projectDetails->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_14', 'type' => 'todo_list', 'values' => [auth()->user()->name, $request->input('task_name'), '']]));

                        $response = array();
                        $response["status"] = "success";
                        $response["msg"] = 'Task added successfully';
                        $response["data"] = (object) array();
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    }
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
            $response["msg"] = trans("messages.Something_went_wrong");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }
    public function deleteUserCompanyTask($id, Request $request)
    {
        $userCompanyTaskdata = UserCompanyTask::where('id', $id)->whereNull('user_company_tasks.deleted_at')->first();
        $userCompanyTaskAssignData = UserCompanyTaskAssign::where('user_task_id', $id);
        if (!empty($userCompanyTaskdata) && !empty($userCompanyTaskAssignData)) {
            $userCompanyTaskAssignData->delete();
            $userCompanyTaskdata->delete();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = 'Task deleted successfully';
            $response["data"] =  (object) array();
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

    public function saveSingleTaskData(Request $request)
    {
        $formData = $request->all();
        $loggedInUserId = Auth::user()->id;
        if (!empty($formData)) {
            $rules = [
                'end_date' => 'required|date_format:m-d-Y',
                'task_name' => 'required',

            ];

            $validator = Validator::make(
                $request->all(),
                $rules,
                array(
                    "task_name.required" => trans('messages.my-project.task_name_field_is_required'),
                    "end_date.required" => trans('messages.my-project.project_end_date'),
                )
            );

            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                DB::beginTransaction();
                $obj = new UserCompanyTask;
                $obj->added_by = $loggedInUserId;
                $obj->company_id = !empty(auth()->user()->companyDetails->id) ?  auth()->user()->companyDetails->id : 0;
                $obj->task_name = $request->task_name;
                $end_date = \Carbon\Carbon::createFromFormat('m-d-Y', $request->input('end_date'))->format('Y-m-d');
                $obj->end_date = $end_date;

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

                // $this->saveProjectRecentActivity((['project_id' => $projectDetails->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_14', 'type' => 'todo_list', 'values' => [auth()->user()->name, $request->input('task_name'), '']]));


                $response = array();
                $response["status"] = "success";
                $response["msg"] = 'Task added successfully';
                $response["data"] = (object) array();
                $response["http_code"] = 200;
                return Response::json($response, 200);
            }

            // DB::commit();
            // $this->saveProjectRecentActivity((['project_id' => $projectDetails->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_14', 'type' => 'todo_list', 'values' => [auth()->user()->name, $request->input('task_name'), '']]));
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }

    public function addAssignToDoList(Request $request)
    {
        $formData = $request->all();
        // dd($formData);
        if (!empty($formData)) {
            $validator = Validator::make(
                $request->all(),
                array(
                    'assign_to_user' => 'required',

                ),
                array(
                    'assign_to_user.required' => trans('messages.project-show.assign_task_to_user')
                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                DB::beginTransaction();
                // dd($formData,auth()->user()->id);
                if (!empty($request->assign_to_user)) {
                    $userData = [];
                    if (!empty($request->assign_to_user)) {
                        $agentUserData = User::whereIn('id', $request->assign_to_user)->pluck('name')->toArray();
                        $userData = array_merge($userData, $agentUserData);
                    }
                    foreach ($request->assign_to_user as $assign_to) {
                        $obj   = UserCompanyTaskAssign::where('user_task_id', $request->user_task_id)->where('assign_to', $assign_to)->first();
                        // dd(auth()->user()->id);
                        if (!empty($obj)) {
                            $obj->user_task_id = $request->user_task_id;
                            $obj->assign_to = $assign_to;
                        } else {
                            $obj   = new UserCompanyTaskAssign();
                            $obj->user_task_id = $request->user_task_id;
                            $obj->assign_to = $assign_to;
                            $obj->assign_by = auth()->user()->id;
                        }
                        // dd(auth()->user()->id, $request->assign_to_user);
                        $obj->save();
                        // if (auth()->user()->id == $assign_to) {
                        //     // dd('hi');
                        //     ProjectTaskAssign::where('assign_to', $assign_to)->where('project_task_id', $request->project_task_id)->delete();
                        // }

                    }
                    $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id, 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_8', 'type' => 'todo_list', 'values' => [auth()->user()->name, !empty($userData) ? implode('||', $userData) : '']]));
                    // if (!in_array(auth()->user()->id, $request->assign_to_user)) {
                    // if(ProjectTaskAssign::whereNotIn('assign_to', $request->assign_to_user)->where('project_task_id', $request->project_task_id)->where('')){
                    //     dd('h2i');
                    $assignedUsers = !empty($request->assign_to_user) ? $request->assign_to_user : [];
                    $assignedUsers[] = auth()->user()->id;
                    UserCompanyTaskAssign::whereNotIn('assign_to', $assignedUsers)->where('user_task_id', $request->user_task_id)->delete();
                    // }
                    // dd('hi5');
                }
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
                $response["msg"] = trans('messages.popup-message.Task_assigned_successfully');
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

    public function  loadCurrentEvent(Request $request)
    {
        $currentDate = $request->current_date;
        $loggedInUserId = auth()->user()->id;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $eventInstance = new Event();
        $events = $eventInstance->fetchEvents(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], ['date' => $currentDate], ['user_associations']);

        $actionCount = [
            'callCount' => 0,
            'viewingCount' => 0,
            'meetingCount' => 0,
        ];

        foreach ($events as $event) {
            if ($event->action == 'call') {
                $actionCount['callCount'] += 1;
            }
            if ($event->action == 'viewing') {
                $actionCount['viewingCount'] += 1;
            }
            if ($event->action == 'meeting') {
                $actionCount['meetingCount'] += 1;
            }
        }
        $currentMonthDateData = $this->getCurrentMonthDaysDateArr();

        $data = View('modules.dashboard.includes.event_mgmt_data', compact('events', 'actionCount', 'currentDate'))->render();
        $response["status"] = "success";
        $response["msg"] = '';
        $response["data"] = $data;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }

    public function loadPropertiesData(Request $request)
    {
        $requestData = $request->all();
        $loggedInUserId = auth()->user()->id;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        if ((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'sub-developer' || auth()->user()->role->name == 'developer')) {
            $propertyInstance = new Property();

            $agentProperties = $propertyInstance->loadPropertiesByAgentId(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], $requestData);
        } 
        elseif($request->type=='agent_properties'){
            $propertyInstance = new Property();

            $agentProperties = $propertyInstance->loadPropertiesByAgentId(['perPage' => $recordsPerPage, 'userId' => auth()->user()->parent_user_id], $requestData);
        }
        else {
            $viewedPropertyInstance = new ViewedUserProperty();
            $agentProperties = $viewedPropertyInstance->loadViewedPropertiesByUserId(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], $requestData);
        }
        $htmlData = View("modules.dashboard.includes.load-properties-data", ['agentProperties' => $agentProperties])->render();
        $response = array();
        $response["status"] = "success";
        $response["msg"] = "";
        $response['data'] = $htmlData;
        $response['properties'] = $agentProperties;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }

    public function loadAgentManagementData(Request $request)
    {
        $requestData = $request->all();
        $loggedInUserId = auth()->user()->id;
        $userInstance = new User();
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $connectedAgentsData = $userInstance->loadUserConnectedUsersData(['perPage' => $recordsPerPage, 'userRoleName' => 'agent', 'userId' => $loggedInUserId], $requestData);
        $htmlData = View("modules.dashboard.includes.load-agents-data", ['connectedAgentsData' => $connectedAgentsData])->render();
        $response = array();
        $response["status"] = "success";
        $response["msg"] = "";
        $response['data'] = $htmlData;
        $response['agents'] = $connectedAgentsData;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }
    public function profile(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if ($request->isMethod('POST')) {
            $formData = $request->all();
            if (!empty($formData)) {
                $validator = Validator::make(
                    $request->all(),
                    array(
                        'image'      => 'nullable|mimes:jpg,jpeg,png',
                        'first_name' => 'required',
                        'last_name' => 'required',
                        // 'email' => ['required','email', Rule::unique('users')->ignore($user->id)],
                        'phone' => ['required', 'regex:/^\+\(\d{1,2}\) \(\d{3} \d{3} \d{3}\)$/'],
                        // , 'regex:/\+\((\d{1,2})\) \((\d{4})\) \((\d{3})\) \((\d{3})\)/'

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
                    $obj   = User::find(Auth::user()->id);
                    $obj->name = $request->first_name . " " . $request->last_name;
                    $obj->phone = $request->phone;
                    if ($request->hasFile('image')) {
                        $extension = $request->file('image')->getClientOriginalExtension();
                        $originalName = $request->file('image')->getClientOriginalName();
                        $fileName = time() . '-user.' . (Auth::user()->id) . '.' . $extension;
                        $folderPath = Config('constant.USER_IMAGE_ROOT_PATH');
                        if (!File::exists($folderPath)) {
                            File::makeDirectory($folderPath, $mode = 0777, true);
                        }
                        if ($request->file('image')->move($folderPath, $fileName)) {
                            $obj->image = $fileName;
                        }
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
                    DB::commit();

                    $dynamicValues =  $obj->name;
                    $loggedInUserRole = auth()->user()->role->name;

                    if ($loggedInUserRole == 'agent') {
                        // Notification for  agents
                        event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_19', [
                            'action_url' => route(routeNamePrefix() . 'user.profile'),
                            'type' => 'user',
                            'reference_id' => $lastId,
                            'values' => $dynamicValues
                        ]));
                    } else {
                        event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_19', [
                            'action_url' => route(routeNamePrefix() . 'user.profile'),
                            'type' => 'user',
                            'reference_id' => $lastId,
                            'values' => $dynamicValues
                        ]));
                    }

                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans("messages.Profile_Updated_Successfully");
                    $response["data"] = (object) array();
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
        $filePath = public_path('assets/data/countries_states.json');
        $countries = [];
        if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);
            $data = json_decode($jsonContent, true);
            if (!empty($data['countries'])) {
                foreach ($data['countries'] as $countryVal) {
                    $countries[$countryVal['text']] = $countryVal['text'];
                }
            }
        }
        if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'developer' ||  auth()->user()->role->name == 'sub-developer') {
            $qualification_type = User::qualification_type;
            $total_properties_in_portfolio = UserProfessionalInformation::total_properties_in_portfolio;
            $total_years_experiance = UserProfessionalInformation::total_years_experiance;
            $number_of_current_customers = UserProfessionalInformation::number_of_current_customers;
            $avg_number_properties_managed = UserProfessionalInformation::avg_number_properties_managed;
            $user = User::where('users.id', auth()->user()->id)->leftJoin('user_professional_informations', 'user_professional_informations.user_id', 'users.id')->select('users.*', 'user_professional_informations.company_name', 'user_professional_informations.professional_title', 'user_professional_informations.property_types_specialized', 'user_professional_informations.property_specialization', 'user_professional_informations.total_properties_in_portfolio', 'user_professional_informations.total_years_experiance', 'user_professional_informations.number_of_current_customers', 'user_professional_informations.avg_number_properties_managed', 'user_professional_informations.primary_service_area')->first();
            $certificateData = UserCertificate::where('user_id', auth()->user()->id)->get();
            $userGovCertificate = User::find(auth()->user()->id);
            $types = Type::pluck('name', 'id')->toArray();

            return View("modules.$this->model.agent-profile", compact('countries', 'certificateData', 'user', 'qualification_type', 'total_properties_in_portfolio', 'total_years_experiance', 'number_of_current_customers', 'avg_number_properties_managed', 'types', 'userGovCertificate'));
        } else if (auth()->user()->role->name == 'customer') {
            $user = User::where('users.id', auth()->user()->id)->leftJoin('user_property_preferences', 'user_property_preferences.user_id', 'users.id')->select('users.*', 'user_property_preferences.category_id', 'user_property_preferences.type_id', 'user_property_preferences.situation_id', 'user_property_preferences.preferred_location', 'user_property_preferences.max_size', 'user_property_preferences.min_size', 'user_property_preferences.min_price', 'user_property_preferences.max_price')->first();

            $categories = Category::pluck('name', 'id')->toArray();
            $situations = Situation::pluck('name', 'id')->toArray();
            $types = Type::pluck('name', 'id')->toArray();
            $maxPriceAndSize = Property::whereNull('deleted_at')->select(DB::raw('max(price) as max_price'), DB::raw('max(size) as max_size'))->first();
            $features = Feature::with('subFeature')->select('name', 'id', 'icon')->get()->toArray();
            return View("modules.$this->model.customer-profile", compact('countries', 'user', 'types', 'situations', 'categories', 'maxPriceAndSize', 'features'));
        } else {
            $user = User::where('id', Auth::user()->id)->first();
            return View("modules.$this->model.profile", compact('user'));
        }
    }
    public function profileTab1(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        $formData = $request->all();
        $validationArr = [];
        if (
            auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' ||
            auth()->user()->role->name == 'developer' ||  auth()->user()->role->name == 'sub-developer'
        ) {
            $validationArr = [
                'image'      => 'nullable|mimes:jpg,jpeg,png',
                'first_name' => 'required',
                'last_name' => 'required',
                // 'email' => ['required','email', Rule::unique('users')->ignore($user->id)],
                // 'phone' => ['required'],
                //the below line will validate the format start with like +(34) 567 890 876
                'phone' => ['required', 'regex:/^\+\(\d{1,2}\) \(\d{3} \d{3} \d{3}\)$/'],
                // , 'regex:/\+\((\d{1,2})\) \((\d{4})\) \((\d{3})\) \((\d{3})\)/'
                //'date_of_birth' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zipcode' => 'required|numeric',
                'languages_spoken' => 'required',
                //'qualification_type' => 'required',
                // 'field_of_study' => 'required',
                'msg_to_collaborator_agents' => 'required',
                //'field_of_study' => 'required',
            ];
        } else if (auth()->user()->role->name == 'customer') {
            $validationArr = [
                'image'      => 'nullable|mimes:jpg,jpeg,png',
                'first_name' => 'required',
                'last_name' => 'required',
                // 'email' => ['required','email', Rule::unique('users')->ignore($user->id)],
                'phone' => ['required', 'regex:/^\+\(\d{1,2}\) \(\d{3} \d{3} \d{3}\)$/'],
                // , 'regex:/\+\((\d{1,2})\) \((\d{4})\) \((\d{3})\) \((\d{3})\)/'
                'date_of_birth' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'zipcode' => 'required|numeric',
                'languages_spoken' => 'required',

            ];
        }
        if (!empty($formData)) {
            $validator = Validator::make(
                $request->all(),
                $validationArr,
                array(


                    "images.mimes" => trans("messages.The_image_field_must_be_a_file_of_type_jpg_jpeg_png"),
                    "first_name.required" => trans("messages.The_first_name_field_is_required"),
                    "last_name.required" => trans("messages.The_last_name_field_is_required"),
                    "phone.required" => trans("messages.The_mobile_number_field_is_required"),
                    "phone.regex" => trans("messages.Please_enter_a_valid_mobile_number"),
                    "email.required" => trans("messages.The_email_field_is_required"),
                    "email.email" => trans("messages.The_email_field_must_be_a_valid_email_address"),
                    "email.unique" => trans("messages.The_email_has_already_been_taken"),
                    //"date_of_birth" => trans("messages.profile-setup.date_of_birth_required"),
                    "gender.required" => trans("messages.profile-setup.gender_required"),
                    "address.required" => trans("messages.profile-setup.address_required"),
                    "city.required" => trans("messages.profile-setup.city_required"),
                    "state.required" => trans("messages.profile-setup.state_reuired"),
                    "country.required" => trans("messages.profile-setup.country_required"),
                    "zipcode.required" => trans("messages.profile-setup.zipcode_required"),
                    "zipcode.numeric" => trans('messages.zipcode_must_be_a_numeric'),
                    "languages_spoken.required" => trans("messages.profile-setup.languages_spoken_required"),
                    //"field_of_study.required" => trans("messages.profile-setup.field_of_study_major_required"),
                    "msg_to_collaborator_agents.required" => trans("messages.profile-setup.msg_to_collaborator_agents_required"),


                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer') {
                    $checkIfAnyCertificatesUploadedYet = UserCertificate::where('user_id', Auth::user()->id)->count();
                    // if ($checkIfAnyCertificatesUploadedYet == 0) {
                    //     $validator->errors()->add('files', trans('Please upload atleast one certificate'));
                    //     $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    //     return Response::json($response, 200);
                    // }
                    DB::beginTransaction();
                    $obj   = User::find(Auth::user()->id);
                    $obj->name = $request->first_name . " " . $request->last_name;
                    $obj->phone = $request->phone;
                    if ($request->hasFile('image')) {
                        $extension = $request->file('image')->getClientOriginalExtension();
                        $originalName = $request->file('image')->getClientOriginalName();
                        $fileName = time() . '-user.' . (Auth::user()->id) . '.' . $extension;
                        $folderPath = Config('constant.USER_IMAGE_ROOT_PATH');
                        if (!File::exists($folderPath)) {
                            File::makeDirectory($folderPath, $mode = 0777, true);
                        }
                        if ($request->file('image')->move($folderPath, $fileName)) {
                            $obj->image = $fileName;
                        }
                    }
                    $obj->date_of_birth = $request->date_of_birth;
                    $obj->gender = $request->gender;
                    $obj->address = $request->address;
                    $obj->city = $request->city;
                    $obj->state = $request->state;
                    $obj->country = $request->country;
                    $obj->zipcode = $request->zipcode;
                    $obj->languages_spoken =  is_array($request->languages_spoken) ? implode(',', $request->languages_spoken) : Null;
                    $obj->qualification_type = $request->qualification_type;
                    $obj->field_of_study = $request->field_of_study;
                    $obj->msg_to_collaborator_agents = $request->msg_to_collaborator_agents;
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
                } else if (auth()->user()->role->name == 'customer') {
                    DB::beginTransaction();
                    $obj   = User::find(Auth::user()->id);
                    $obj->name = $request->first_name . " " . $request->last_name;
                    $obj->phone = $request->phone;
                    if ($request->hasFile('image')) {
                        $extension = $request->file('image')->getClientOriginalExtension();
                        $originalName = $request->file('image')->getClientOriginalName();
                        $fileName = time() . '-user.' . (Auth::user()->id) . '.' . $extension;
                        $folderPath = Config('constant.USER_IMAGE_ROOT_PATH');
                        if (!File::exists($folderPath)) {
                            File::makeDirectory($folderPath, $mode = 0777, true);
                        }
                        if ($request->file('image')->move($folderPath, $fileName)) {
                            $obj->image = $fileName;
                        }
                    }
                    $obj->date_of_birth = $request->date_of_birth;
                    $obj->gender = $request->gender;
                    $obj->address = $request->address;
                    $obj->city = $request->city;
                    $obj->state = $request->state;
                    $obj->country = $request->country;
                    $obj->zipcode = $request->zipcode;
                    $obj->languages_spoken =  is_array($request->languages_spoken) ? implode(',', $request->languages_spoken) : Null;
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
                }
                $dynamicValues = $obj->name;
                $loggedInUserRole = auth()->user()->role->name;

                event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_19', [
                    'action_url' => route(routeNamePrefix() . 'user.profile'),
                    'type' => 'user',
                    'reference_id' => $lastId,
                    'values' => $dynamicValues
                ]));

                $response = array();
                $response["status"] = "success";
                $response["msg"] = trans("messages.Profile_Updated_Successfully");
                $response["data"] = (object) array();
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
    public function profileTab2(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        $formData = $request->all();
        $validationArr = [];
        if (auth()->user()->role->name == 'agent') {
            $validationArr = [
                'company_name' => 'required',
                'professional_title' => 'required',
                'primary_service_area' => 'required',
                'property_types_specialized' => 'required',
                // 'property_specialization' => 'required',
                'total_properties_in_portfolio' => 'required',
                'total_years_experiance' => 'required',
                // 'number_of_current_customers' => 'required',
                'avg_number_properties_managed' => 'required',
            ];
        } else if (auth()->user()->role->name == 'customer') {
            $validationArr = [
                // 'category_id' => 'required',
                'type_id' => 'required',
                'situation_id' => 'required',
                'preferred_location' => 'required'

            ];
        }
        if (!empty($formData)) {
            $validator = Validator::make(
                $request->all(),
                $validationArr,
                array(

                    "images.mimes" => trans("messages.The_image_field_must_be_a_file_of_type_jpg_jpeg_png"),
                    "first_name.required" => trans("messages.The_first_name_field_is_required"),
                    "last_name.required" => trans("messages.The_last_name_field_is_required"),
                    "phone.required" => trans("messages.The_mobile_number_field_is_required"),
                    "email.required" => trans("messages.The_email_field_is_required"),
                    "email.email" => trans("messages.The_email_field_must_be_a_valid_email_address"),
                    "email.unique" => trans("messages.The_email_has_already_been_taken"),
                    "date_of_birth" => trans("messages.profile-setup.date_of_birth_required"),
                    "gender.required" => trans("messages.profile-setup.gender_required"),
                    "address.required" => trans("messages.profile-setup.address_required"),
                    "city.required" => trans("messages.profile-setup.city_required"),
                    "state.required" => trans("messages.profile-setup.state_reuired"),
                    "country.required" => trans("messages.profile-setup.country_required"),
                    "zipcode.required" => trans("messages.profile-setup.zipcode_required"),
                    "languages_spoken.required" => trans("messages.profile-setup.languages_spoken_required"),
                    "qualification_type.required" => trans("messages.profile-setup.qualification_required"),
                    "field_of_study.required" => trans("messages.profile-setup.field_of_study_major_required"),
                    //2nd step
                    "company_name.required" => trans('messages.profile-setup.company_name_required'),
                    'professional_title' => trans('messages.profile-setup.professional_title_required'),
                    'primary_service_area' => trans('messages.profile-setup.primary_services_required'),
                    'property_types_specialized' => trans('messages.profile-setup.property_type_specialize_required'),
                    'property_specialization' => trans('messages.profile-setup.property_specialization_required'),
                    'total_properties_in_portfolio' => trans('messages.profile-setup.total_property_required'),
                    'total_years_experiance' => trans('messages.profile-setup.total_years_required'),
                    'number_of_current_customers' => trans('messages.profile-setup.current_cust_required'),
                    'avg_number_properties_managed' => trans('messages.profile-setup.property_managed_required'),

                    //customer profile-setup page 2nd
                    // 'category_id.required' => trans('messages.profile-setup.category_field_required'),
                    'type_id.required' => trans('messages.profile-setup.type_field_required'),
                    'situation_id.required' => trans('messages.profile-setup.situation_field_required'),
                    'preferred_location.required' => trans('messages.profile-setup.preferred_location_field_required')

                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                if (auth()->user()->role->name == 'agent') {
                    DB::beginTransaction();
                    $checkUserProfessionalInformation = UserProfessionalInformation::where('user_id', Auth::user()->id)->first();
                    if (!empty($checkUserProfessionalInformation)) {

                        $obj   = UserProfessionalInformation::find($checkUserProfessionalInformation->id);
                    } else {
                        $obj   = new UserProfessionalInformation;
                    }
                    $obj->user_id = Auth::user()->id;
                    $obj->company_name = $request->company_name;
                    $obj->professional_title = $request->professional_title;
                    $obj->primary_service_area = is_array($request->primary_service_area) ? implode(',', $request->primary_service_area) : Null;
                    $obj->property_types_specialized = is_array($request->property_types_specialized) ? implode(',', $request->property_types_specialized) : Null;
                    $obj->property_specialization = $request->property_specialization;
                    $obj->total_properties_in_portfolio = $request->total_properties_in_portfolio;
                    $obj->total_years_experiance = $request->total_years_experiance;
                    $obj->number_of_current_customers = $request->number_of_current_customers;
                    $obj->avg_number_properties_managed = $request->avg_number_properties_managed;

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
                } else if (auth()->user()->role->name == 'customer') {
                    DB::beginTransaction();
                    $checkUserPropertyPreference = UserPropertyPreference::where('user_id', Auth::user()->id)->first();
                    if (!empty($checkUserPropertyPreference)) {

                        $obj   = UserPropertyPreference::find($checkUserPropertyPreference->id);
                    } else {
                        $obj   = new UserPropertyPreference;
                    }
                    $obj->user_id = Auth::user()->id;
                    // $obj->category_id = $request->category_id;
                    $obj->type_id = is_array($request->type_id) ? implode(',', $request->type_id) : Null;;
                    $obj->situation_id = is_array($request->situation_id) ? implode(',', $request->situation_id) : Null;;
                    $obj->preferred_location = $request->preferred_location ?? Null;
                    $obj->max_size = str_replace(' m²', '', str_replace(',', '', $request->max_size)) ?? 0;
                    $obj->min_size = str_replace(' m²', '', str_replace(',', '', $request->min_size)) ?? 0;
                    $obj->min_price = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $request->min_price)) ?? 0;
                    $obj->max_price = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $request->max_price)) ?? 0;
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


                    if (!empty($request->feature_id) && !empty($request->subFetureId)) {
                        $subFeatureArray = array_keys($request->subFetureId);
                        $subFeatureId = $request->subFetureId;
                        foreach ($request->feature_id as  $featureKey =>  $featureVal) {
                            if (!empty($featureVal)) {
                                if (in_array($featureVal, $subFeatureArray)) {
                                    $subFetureIdData = explode(',', $subFeatureId[$featureVal]);
                                    if (!empty($subFetureIdData)) {
                                        foreach ($subFetureIdData as $subFeatureVal) {
                                            $checkFeatureVal = UserPropertyFeature::where('user_id', auth()->user()->id)->where('feature_id', $featureVal)->where('sub_feature_id', $subFeatureVal)->first();
                                            if (!empty($checkFeatureVal)) {
                                                $featureObj = $checkFeatureVal;
                                            } else {
                                                $featureObj = new UserPropertyFeature;
                                            }
                                            $featureObj->user_id = auth()->user()->id;
                                            $featureObj->feature_id = $featureVal;
                                            $featureObj->sub_feature_id = $subFeatureVal;
                                            $featureObj->save();
                                        }
                                        UserPropertyFeature::whereNotIn('sub_feature_id', !empty($subFetureIdData) ? $subFetureIdData : [])->where('feature_id', $featureVal)->delete();
                                    }
                                }
                            }
                        }
                    }


                    UserPropertyFeature::whereNotIn('feature_id', !empty($request->feature_id) ? $request->feature_id : [])->where('user_id', auth()->user()->id)->delete();


                    DB::commit();
                }
                $dynamicValues =  $obj->name;
                $loggedInUserRole = auth()->user()->role->name;

                event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_19', [
                    'action_url' => route(routeNamePrefix() . 'user.profile'),
                    'type' => 'user',
                    'reference_id' => $lastId,
                    'values' => $dynamicValues
                ]));

                $response = array();
                $response["status"] = "success";
                $response["msg"] = trans("messages.Profile_Updated_Successfully");
                $response["data"] = (object) array();
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
    public function changePassword(Request $request)
    {
        //dd(123); //yes hitting
        $user = User::where('id', Auth::user()->id)->first();
        if ($request->isMethod('POST')) {
            $formData = $request->all();
            if (!empty($formData)) {
                Validator::extend('current_password_check', function ($attribute, $value, $parameters, $validator) use ($user) {
                    return Hash::check($value, $user->password);
                });
                $validator = Validator::make(
                    $request->all(),
                    array(
                        'current_password' => (!empty($user->password)) ? 'required|current_password_check' : '',
                        'new_password' => ['required', Password::min(8)],
                        'confirm_password' => 'required|required_with:new_password|min:8|same:new_password'

                    ),
                    array(

                        "current_password.current_password_check" => trans("messages.The_password_entered_is_invalid"),
                        "current_password.required" => trans("messages.The_current_password_field_is_required"),
                        "new_password.required" => trans("messages.The_new_password_field_is_required"),
                        "new_password.min" => trans("messages.The_new_password_must_be_atleast_8_characters"),
                        "confirm_password.required" => trans("messages.The_confirm_password_field_is_required"),
                        "confirm_password.same" => trans("messages.confirm_password_same"),
                        "confirm_password.min" => trans("messages.confirm_password_min_validation"),

                    )
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {
                    DB::beginTransaction();
                    $obj   = User::find(Auth::user()->id);
                    $obj->password = Hash::make($request->new_password);
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

                    $dynamicValues =  $obj->name;
                    $loggedInUserRole = auth()->user()->role->name;

                    if ($loggedInUserRole == 'agent') {
                        // Notification for  agents
                        event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_20', [
                            'action_url' => route(routeNamePrefix() . 'user.changePassword'),
                            'type' => 'user',
                            'reference_id' => $lastId,
                            'values' => $dynamicValues
                        ]));
                    } else {
                        event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_20', [
                            'action_url' => route(routeNamePrefix() . 'user.changePassword'),
                            'type' => 'user',
                            'reference_id' => $lastId,
                            'values' => $dynamicValues
                        ]));
                    }

                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans("messages.Password_Changed_Successfully");
                    $response["data"] = (object) array();
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
        return View("modules.$this->model.change-password", compact('user'));
    }

    public function agentDashboard(Request $request)
    {

        $loggedInUserId = Auth::user()->id;

        $agentProperties = Property::where('owner_id', $loggedInUserId)
            ->leftJoin('users', 'users.id', 'properties.owner_id')
            ->leftJoin('property_images', 'property_images.property_id', 'properties.id')
            ->select('properties.*', 'users.name as agent_name', 'users.image as agentImage', 'property_images.image as property_img')
            ->get();
        // dd($agentProperties);

        return View("modules.$this->model.index_one", compact('agentProperties'));
    }

    public function removeEventAttachement(Request $request, $atachementId)
    {
        $eventAttachemnt = EventAttachment::find($atachementId);
        if (!empty($eventAttachemnt)) {
            // $filePath = Config('constant.EVENT_ATTACHMENT_ROOT_PATH') . $eventAttachemnt->file_name;

            // if (File::exists($filePath)) {
            //     File::delete($filePath);
            // }

            $eventAttachemnt->delete();

            $eventAttachemntData = EventAttachment::where('event_id', $eventAttachemnt->event_id)->get();
            $htmlData = View("modules.events.includes.event_attachments_data", ['eventAttachemntData' => $eventAttachemntData, 'type' => 'edit'])->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = trans("messages.Event_Attachment_Removed_Successfully");
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

    public function companyDetails(Request $request)
    {
        if ($request->isMethod('POST')) {
            // dd($request->all());
            $formData = $request->all();
            $validationArr = [];
            if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer') {
                $validationArr = [
                    'company_name' => 'required',
                    'company_image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048|dimensions:width=120,height=120',
                    'company_email' => 'required',
                    // 'company_mobile' => 'required',
                    // 'company_tax_number' => 'required',
                    // 'company_website' => 'required',
                    // 'company_address' => 'required',
                    // 'company_city' => 'required',
                    // 'company_state' => 'required',
                    //'company_country' => 'required',
                    //'company_zipcode' => 'required',
                    'primary_service_area' => 'required',
                    //'professional_title' => 'required',
                    //'property_types_specialized' => 'required',
                    // 'property_specialization' => 'required',
                    //'total_properties_in_portfolio' => 'required',
                    //'total_years_experiance' => 'required',
                    // 'number_of_current_customers' => 'required',
                    // 'avg_number_properties_managed' => 'required',
                ];
            } else if (auth()->user()->role->name == 'customer') {
                $validationArr = [
                    'category_id' => 'required',
                    'type_id' => 'required',
                    'situation_id' => 'required',
                    'preferred_location' => 'required'

                ];
            }
            if (!empty($formData)) {
                $validator = Validator::make(
                    $request->all(),
                    $validationArr,
                    array(

                        "company_name.required" => trans('messages.profile-setup.company_name_required'),
                        // "company_tax_number.required" => trans('messages.profile-setup.company_tax_number_required'),
                        // "company_website.required" => trans('messages.profile-setup.company_website_required'),
                        //  "company_address.required" => trans('messages.profile-setup.company_address_required'),
                        // "company_city.required" => trans('messages.profile-setup.company_city_required'),
                        // "company_state.required" => trans('messages.profile-setup.company_state_required'),
                        // "company_country.required" => trans('messages.profile-setup.company_country_required'),
                        // "company_zipcode.required" => trans('messages.profile-setup.company_zipcode_required'),
                        // 'professional_title.required' => trans('messages.profile-setup.professional_title_required'),
                        'primary_service_area' => trans('messages.profile-setup.primary_services_required'),
                        // 'property_types_specialized' => trans('messages.profile-setup.property_type_specialize_required'),
                        // 'property_specialization' => trans('messages.profile-setup.property_specialization_required'),
                        //'total_properties_in_portfolio' => trans('messages.profile-setup.total_property_required'),
                        // 'total_years_experiance' => trans('messages.profile-setup.total_years_required'),
                        // 'number_of_current_customers' => trans('messages.profile-setup.current_cust_required'),
                        // 'avg_number_properties_managed' => trans('messages.profile-setup.property_managed_required'),
                        //customer profile-setup page 2nd
                        // 'category_id.required' => trans('messages.profile-setup.category_field_required'),
                        // 'type_id.required' => trans('messages.profile-setup.type_field_required'),
                        // 'situation_id.required' => trans('messages.profile-setup.situation_field_required'),
                        // 'preferred_location.required' => trans('messages.profile-setup.preferred_location_field_required')

                    )
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {
                    if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer') {
                        DB::beginTransaction();
                        $checkUserProfessionalInformation = userCompanyDetail::where('user_id', Auth::user()->id)->first();
                        if (!empty($checkUserProfessionalInformation)) {

                            $obj   = userCompanyDetail::find($checkUserProfessionalInformation->id);
                        } else {
                            $obj   = new userCompanyDetail;
                        }
                        $obj->user_id = Auth::user()->id;
                        $obj->company_name = $request->company_name;
                        $obj->company_email = $request->company_email;
                        $obj->company_mobile = $request->company_mobile;
                        $obj->company_tax_number = $request->company_tax_number;
                        $obj->company_website = $request->company_website;
                        $obj->company_address = $request->company_address;
                        $obj->company_city = $request->company_city;
                        $obj->company_sate = $request->company_state;
                        $obj->company_country = $request->company_country;
                        $obj->company_zipcode = $request->company_zipcode;
                        $obj->company_sub_agent = $request->num_of_sub_agents;
                        $obj->professional_title = $request->professional_title;
                        $obj->primary_service_area = is_array($request->primary_service_area) ? implode(',', $request->primary_service_area) : Null;
                        $obj->property_types_specialized = is_array($request->property_types_specialized) ? implode(',', $request->property_types_specialized) : Null;
                        // $obj->property_specialization = $request->property_specialization;
                        $obj->total_properties_in_portfolio = $request->total_properties_in_portfolio;
                        $obj->total_years_experiance = $request->total_years_experiance;
                        $obj->number_of_current_customers = $request->number_of_current_customers;
                        $obj->avg_number_properties_managed = $request->avg_number_properties_managed;
                        if ($request->hasFile('company_image')) {
                            $extension = $request->file('company_image')->getClientOriginalExtension();
                            $originalName = $request->file('company_image')->getClientOriginalName();
                            $fileName = time() . '-company_image.' . (Auth::user()->id) . '.' . $extension;
                            $folderPath = Config('constant.COMPANY_IMAGE_ROOT_PATH');
                            if (!File::exists($folderPath)) {
                                File::makeDirectory($folderPath, $mode = 0777, true);
                            }
                            if ($request->file('company_image')->move($folderPath, $fileName)) {
                                $obj->company_image = $fileName;
                            }
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
                        DB::commit();
                    } else if (auth()->user()->role->name == 'customer') {
                        DB::beginTransaction();
                        $checkUserPropertyPreference = UserPropertyPreference::where('user_id', Auth::user()->id)->first();
                        if (!empty($checkUserPropertyPreference)) {

                            $obj   = UserPropertyPreference::find($checkUserPropertyPreference->id);
                        } else {
                            $obj   = new UserPropertyPreference;
                        }
                        $obj->user_id = Auth::user()->id;
                        $obj->category_id = $request->category_id;
                        $obj->type_id = is_array($request->type_id) ? implode(',', $request->type_id) : Null;;
                        $obj->situation_id = is_array($request->situation_id) ? implode(',', $request->situation_id) : Null;;
                        $obj->preferred_location = $request->preferred_location ?? Null;
                        $obj->max_size = str_replace(' m²', '', str_replace(',', '', $request->max_size)) ?? 0;
                        $obj->min_size = str_replace(' m²', '', str_replace(',', '', $request->min_size)) ?? 0;
                        $obj->min_price = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $request->min_price)) ?? 0;
                        $obj->max_price = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $request->max_price)) ?? 0;
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
                        if (!empty($request->feature_id)) {
                            foreach ($request->feature_id as $featureVal) {
                                if (!empty($featureVal)) {

                                    $checkFeatureVal = UserPropertyFeature::where('user_id', Auth::user()->id)->where('feature_id', $featureVal)->first();
                                    if (!empty($checkFeatureVal)) {
                                        $featureObj = $checkFeatureVal;
                                    } else {
                                        $featureObj = new UserPropertyFeature;
                                    }
                                    $featureObj->user_id = Auth::user()->id;
                                    $featureObj->feature_id = $featureVal;
                                    $featureObj->save();
                                    $lastFeatureId = $featureObj->id;
                                    if (empty($lastFeatureId)) {
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

                        UserPropertyFeature::whereNotIn('feature_id', !empty($request->feature_id) ? $request->feature_id : [])->where('user_id', $lastId)->delete();


                        DB::commit();
                    }
                    $dynamicValues =  $obj->company_name;
                    $loggedInUserRole = auth()->user()->role->name;

                    event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_23', [
                        'action_url' => route(routeNamePrefix() . 'user.company-details'),
                        'type' => 'user',
                        'reference_id' => $lastId,
                        'values' => $dynamicValues
                    ]));

                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans("messages.Company_Updated_Successfully");
                    $response["data"] = (object) array();
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
        $user = User::where('users.id', auth()->user()->id);
        if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer') {

            $user->leftJoin('user_company_details', 'user_company_details.user_id', 'users.id');
        } else {
            $user->leftJoin('user_company_details', 'user_company_details.user_id', 'users.parent_user_id');
        }
        $user = $user->select('users.*', 'user_company_details.company_name', 'user_company_details.company_email', 'user_company_details.company_mobile', 'user_company_details.company_tax_number', 'user_company_details.company_website', 'user_company_details.company_address', 'user_company_details.company_city', 'user_company_details.company_sate', 'user_company_details.company_country', 'user_company_details.company_zipcode', 'user_company_details.company_sub_agent', 'user_company_details.company_image', 'user_company_details.professional_title', 'user_company_details.property_types_specialized', 'user_company_details.property_specialization', 'user_company_details.total_properties_in_portfolio', 'user_company_details.total_years_experiance', 'user_company_details.number_of_current_customers', 'user_company_details.avg_number_properties_managed', 'user_company_details.primary_service_area')->first();
        $companyDetails = User::find(auth()->user()->id);

        $total_properties_in_portfolio = userCompanyDetail::total_properties_in_portfolio;
        $total_years_experiance = userCompanyDetail::total_years_experiance;
        $number_of_current_customers = userCompanyDetail::number_of_current_customers;
        $avg_number_properties_managed = userCompanyDetail::avg_number_properties_managed;
        $number_of_sub_agents = userCompanyDetail::number_of_sub_agents;
        $types = Type::pluck('name', 'id')->toArray();

        $teamMemberInstance = new User();
        $teamMembersData = $teamMemberInstance->loadUserMembers(['userId' => (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer') ? auth()->user()->id : auth()->user()->parent_user_id, 'user_role_id' => getUserRoleId((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent')  ? 'sub-agent' : 'sub-developer'), 'withSelf' => true, 'is_active' => 1], $request->all(), []);
        return View("modules.$this->model.user-company-details", compact('total_properties_in_portfolio', 'total_years_experiance', 'number_of_current_customers', 'avg_number_properties_managed', 'number_of_sub_agents', 'companyDetails', 'user', 'types', 'teamMembersData'));
    }
    public function ViewAgentProfile(Request $request)
    {
        $user = auth()->user();

        // Fetch the certificate data
        $certificateData = UserCertificate::where('user_id', $user->id)->get();

        // Fetch the government certificate (if necessary for the view)
        $userGovCertificate = User::find($user->id);

        // Fetch the types (if necessary for the view)
        $types = Type::pluck('name', 'id')->toArray();

        $userAddress = $user->address . ', ' . $user->city . ', ' . $user->state . ', ' . $user->country . ', ' . $user->zipcode;



        // fetching the type and situation for customer role on profile 
        $userPropertyPreference = UserPropertyPreference::where('user_id', auth()->user()->id)->first();

        $featureIdsArray = UserPropertyFeature::where('user_id', auth()->user()->id)->pluck('feature_id')->toArray();

        $featureData = Feature::whereIn('id', $featureIdsArray)->pluck('name');
        $user->featureNames = implode(', ', $featureData->toArray());

        $preferencetypeArr = Type::whereIn('id', explode(',', !empty($userPropertyPreference->type_id) ? $userPropertyPreference->type_id : ''))
            ->pluck('name')
            ->implode(', ');

        $situationsArr = Situation::whereIn('id', explode(',', !empty($userPropertyPreference->situation_id) ? $userPropertyPreference->situation_id : ''))
            ->pluck('name')
            ->implode(', ');

        // Pass all necessary data to the view
        return view('modules.dashboard.Agent-edit-profile', [
            'user' => $user,
            'certificateData' => $certificateData,
            'userGovCertificate' => $userGovCertificate,
            'types' => $types,
            'userPropertyPreference' => $userPropertyPreference,
            'preferencetypeArr' => $preferencetypeArr,
            'situationsArr' => $situationsArr,
            'userAddress' => $userAddress,
        ]);
    }

    public function ViewCompanyProfile(Request $request)
    {
        $user = User::where('users.id', auth()->user()->id);
        if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer') {

            $user->leftJoin('user_company_details', 'user_company_details.user_id', 'users.id');
        } else {
            $user->leftJoin('user_company_details', 'user_company_details.user_id', 'users.parent_user_id');
        }
        $user = $user->select('users.*', 'user_company_details.company_name', 'user_company_details.company_email', 'user_company_details.company_mobile', 'user_company_details.company_tax_number', 'user_company_details.company_website', 'user_company_details.company_address', 'user_company_details.company_city', 'user_company_details.company_sate', 'user_company_details.company_country', 'user_company_details.company_zipcode', 'user_company_details.company_sub_agent', 'user_company_details.company_image', 'user_company_details.professional_title', 'user_company_details.property_types_specialized', 'user_company_details.property_specialization', 'user_company_details.total_properties_in_portfolio', 'user_company_details.total_years_experiance', 'user_company_details.number_of_current_customers', 'user_company_details.avg_number_properties_managed', 'user_company_details.primary_service_area')->first();
        $companyDetails = User::find(auth()->user()->id);

        $total_properties_in_portfolio = userCompanyDetail::total_properties_in_portfolio;
        $total_years_experiance = userCompanyDetail::total_years_experiance;
        $number_of_current_customers = userCompanyDetail::number_of_current_customers;
        $avg_number_properties_managed = userCompanyDetail::avg_number_properties_managed;
        $number_of_sub_agents = userCompanyDetail::number_of_sub_agents;
        // $temp = array_key_exists($user->property_types_specialized,$types);
        $typeIdsArray = !empty($user->property_types_specialized) ? explode(',', $user->property_types_specialized) : [];
        $typeData = Type::whereIn('id', $typeIdsArray)->pluck('name');
        $user->typeNames = implode(', ', $typeData->toArray());
        $teamMemberInstance = new User();
        $teamMembersData = $teamMemberInstance->loadUserMembers(['userId' => (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer') ? auth()->user()->id : auth()->user()->parent_user_id, 'user_role_id' => getUserRoleId((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent') ? 'sub-agent' : 'sub-developer'), 'withSelf' => true, 'is_active' => 1], $request->all(), []);

        $xmlfeedsassisted = XmlFeedsAssisted::where('user_id', auth()->user()->id)->get();

        return View("modules.dashboard.View-Company", compact('total_properties_in_portfolio', 'total_years_experiance', 'number_of_current_customers', 'avg_number_properties_managed', 'number_of_sub_agents', 'companyDetails', 'user', 'teamMembersData', 'xmlfeedsassisted'));
    }
}
