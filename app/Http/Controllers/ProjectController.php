<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Models\Project;
use  App\Models\Property;
use  App\Models\ProjectProperty;
use  App\Models\ProjectCustomer;
use  App\Models\User;
use  App\Models\ProjectAgent;
use  App\Models\ProjectAgentPermission;
use  App\Models\ProjectPermission;
use DB, Redirect, Response, Auth, File;
use  App\Models\ProjectAttachment;
use  App\Models\ProjectTask;
use App\Models\ProjectTaskAssign;
use App\Models\Role;
use App\Models\TaskSubType;
use App\Models\TaskType;
use App\Models\UserFileFolders;
use App\Models\UserFile;
use App\Models\GroupParticipants;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class ProjectController extends Controller
{
    public $model        =    'projects';
    public $filterName        =    'projectSearchFilterData';
    public $listRouteUrl;
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {

            $this->listRouteUrl = route(routeNamePrefix() . 'projects.index');
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
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $projectInstance = new Project;
        $results = $projectInstance->fetchProjects(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], $request->all(), ['all', 'project_agents', 'project_customers', 'project_tasks']);
        $collaboratedProjects = $projectInstance->fetchProjects(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], $request->all(), ['collaborated', 'project_agents', 'project_customers', 'project_tasks']);
        $completedProjects = $projectInstance->fetchProjects(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId, 'status' => 'completed'], $request->all(), ['all', 'project_agents', 'project_customers', 'project_tasks']);
        $listingType = 'my-projects';

        $total_projects =  $projectInstance->fetchProjects(['fetchCount' => true, 'userId' => $loggedInUserId], [], []);

        $ongoing_projects = $projectInstance->fetchProjects(['fetchCount' => true, 'userId' => $loggedInUserId, 'status' => 'in_progress'], [], []);
        $overdue_projects = $projectInstance->fetchProjects(['fetchCount' => true, 'userId' => $loggedInUserId, 'status' => 'overdue'], [], []);
        $completed_projects = $projectInstance->fetchProjects(['fetchCount' => true, 'userId' => $loggedInUserId, 'status' => 'completed'], [], []);


        return View("modules.$this->model.index", compact('results', 'listingType', 'total_projects', 'overdue_projects', 'ongoing_projects', 'completed_projects', 'collaboratedProjects', 'completedProjects'));
    }

    public function store(Request $request, $projectId = null)
    {
        $lastId = '';
        $formData = $request->all();
        $loggedInUserId = Auth::user()->id;
        $projectSuccessMessage = !empty($projectId) ? trans('Project updated successfully') : trans('Project added successfully');
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
            $rules = [
                'project_name' => 'required',
                'project_type' => 'required',
                'project_budget' => 'required|numeric|gt:0|between:1,999999999999999999.99',
                'project_location' => 'required',
                'start_date' => 'required|date_format:m-d-Y',
                'end_date' => 'required|date_format:m-d-Y|after:start_date',

            ];

            $validator = Validator::make(
                $request->all(),
                $rules,
                array(
                    "project_name.required" => trans('messages.my-project.project_name_required'),
                    "project_type.required" => trans('messages.my-project.project_type_required'),
                    "project_budget.required" => trans('messages.my-project.project_budget_required'),
                    "project_location.required" => trans('messages.my-project.project_location_required'),
                    "start_date.required" => trans('messages.my-project.project_start_date'),
                    "end_date.required" => trans('messages.my-project.project_end_date'),
                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                $owner_id = auth()->user()->id;

                DB::beginTransaction();

                if (!empty($projectId)) {
                    $obj = Project::where('id', $projectId)->first();
                } else {
                    $obj = new Project;
                    $slug = getSlugText($request->input('project_name'), new Project);
                    $obj->slug = $slug;
                    $obj->owner_id = $owner_id;

                }
                $start_date = \Carbon\Carbon::createFromFormat('m-d-Y', $request->input('start_date'))->format('Y-m-d');
                $end_date = \Carbon\Carbon::createFromFormat('m-d-Y', $request->input('end_date'))->format('Y-m-d');


                // Saving Data to Recent Activities if Project Updated
                if (!empty($projectId)) {
                    if ($request->input('project_name') != $obj->project_name) {
                        $this->saveProjectRecentActivity((['project_id' => $projectId, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_2', 'values' => [auth()->user()->name, $request->input('project_name')], 'type' => 'project_information']));
                    }
                    //here
                    if ($request->input('project_budget') != $obj->project_budget) {
                        $this->saveProjectRecentActivity((['project_id' => $projectId, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_22', 'values' => [auth()->user()->name, 'Investment'], 'type' => 'project_information']));
                    }
                    if ($request->input('project_description') != $obj->project_description) {
                        $this->saveProjectRecentActivity((['project_id' => $projectId, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_23', 'values' => [auth()->user()->name, 'Description'], 'type' => 'project_information']));
                    }
                    if ($start_date != $obj->start_date) {
                        $this->saveProjectRecentActivity((['project_id' => $projectId, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_24', 'values' => [auth()->user()->name, 'Starting Date'], 'type' => 'project_information']));
                    }
                    if ($end_date != $obj->end_date) {
                        $this->saveProjectRecentActivity((['project_id' => $projectId, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_24', 'values' => [auth()->user()->name, 'Deadline'], 'type' => 'project_information']));
                    }
                    if ($request->input('project_location') != $obj->project_location) {
                        $this->saveProjectRecentActivity((['project_id' => $projectId, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_25', 'values' => [auth()->user()->name, 'Location'], 'type' => 'project_information']));
                    }
                }

                $obj->project_name = $request->input('project_name');
                $obj->project_type = $request->input('project_type');
                $obj->project_budget = $request->input('project_budget');
                $obj->project_location = $request->input('project_location');
                $obj->latitude = $request->input('latitude');
                $obj->longitude = $request->input('longitude');
                $obj->start_date = $start_date;
                $obj->end_date = $end_date;
                $obj->project_description = !empty($request->input('project_description')) ? $request->input('project_description') : Null;

                $deleted_at = $request->deleted_at ? \Carbon\Carbon::createFromFormat('m-d-Y', $request->input('deleted_at'))->format('Y-m-d') : null;
                $obj->deleted_at = $deleted_at;

                $obj->save();
                $lastId = $obj->id;
                if (!empty($request->input('files'))) {

                    $files = $request->input('files');
                    foreach ($files as $imageKey => $fileId) {
                        if (!empty($fileId)) {
                            $fileData = UserFile::find($fileId);
                            if (!empty($fileData)) {
                                if (!ProjectAttachment::where('file_id', $fileData->id)->exists()) {
                                    $obj = new ProjectAttachment();
                                    $obj->project_id = $lastId;
                                    $obj->file_id = $fileId;
                                    $obj->added_by = $loggedInUserId;
                                    $obj->save();
                                }
                            }
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
                // dd("not");
                if (empty($lastId)) {
                    DB::rollback();
                    $response = array();
                    $response["status"] = "error";
                    $response["msg"] = trans("messages.Something_went_wrong");
                    $response["data"] = (object) array();
                    $response["http_code"] = 500;
                    return Response::json($response, 500);
                }

                if (empty($projectId)) {
                    $this->saveProjectRecentActivity((['project_id' => $lastId, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_1', 'values' => [auth()->user()->name, $request->input('project_name')], 'type' => 'project_information']));

                    $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id , 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_1', 'type' => 'project', 'values' => [auth()->user()->name, $request->input('project_name'), '']]));

                    //Create a Group and add a entry into group_participants table
                    $obj   = new Group;
                    $obj->created_by = $owner_id;
                    $obj->name = $request->input('project_name');
                    $obj->group_number = getGroupNumber();
                    $obj->is_project_group = 1;
                    $obj->project_id = $lastId;
                    $obj->save();
                    $createdGroupId = $obj->id;
                    if (empty($createdGroupId)) {
                        DB::rollback();
                        $response = array();
                        $response["status"] = "error";
                        $response["msg"] = trans("messages.Something_went_wrong");
                        $response["data"] = (object) array();
                        $response["http_code"] = 500;
                        return Response::json($response, 500);
                    }

                    //Adding a entry in group participants
                    $obj2   =  new GroupParticipants;
                    $obj2->user_id = $owner_id;
                    $obj2->group_id = $createdGroupId;
                    $obj2->is_admin = 1;
                    $obj2->save();

                    // Save Message Data
                    $this->saveMessageData(['group_id' => $createdGroupId, 'sender_id' => $owner_id, 'receiver_id' => $owner_id,  'message' => 'CRM_GROUP_MESSAGE_1', 'values' => ['value1' => auth()->user()->name, 'value2' => $request->input('project_name')], 'message_type' => 'comment']);
                }

                DB::commit();

                if ((Auth::user()->role->name == 'agent' || Auth::user()->role->name == 'developer' || Auth::user()->role->name == 'sub-agent' || Auth::user()->role->name == 'sub-developer')  && empty($projectId)) {
                    $getProjectPermissions = ProjectPermission::all();
                    if ($getProjectPermissions->isNotEmpty()) {
                        // Interting a entry into project_agents
                        $obj     =  new ProjectAgent;
                        $obj->project_id   = $lastId;
                        $obj->agent_id     = $loggedInUserId;
                        $obj->added_by     = $loggedInUserId;
                        $obj->is_project_owner         = 1;
                        $obj->save();
                        $agentId = $obj->id;
                        if (!empty($agentId)) {

                            foreach ($getProjectPermissions as $permission) {
                                $obj2  =  new ProjectAgentPermission;
                                $obj2->project_id  = $lastId;
                                $obj2->agent_id  = $agentId;
                                $obj2->permission_id  = $permission->id;
                                $obj2->save();
                            }
                        }
                        if($request->primaryAgent){
                            //**************************add primaryAgent

                            $objagent     =  new ProjectAgent;
                            $objagent->project_id   = $lastId;
                            $objagent->agent_id     = $request->primaryAgent;
                            $objagent->added_by     = $loggedInUserId;
                            $objagent->is_project_owner         = 1;
                            $objagent->deleted_at = $deleted_at;
                            $objagent->save();
                            $primaryAgent = $objagent->id;
                            if (!empty($primaryAgent)) {
                                foreach ($getProjectPermissions as $permission) {
                                    $objper  =  new ProjectAgentPermission;
                                    $objper->project_id  = $lastId;
                                    $objper->agent_id  = $primaryAgent;
                                    $objper->permission_id  = $permission->id;
                                    $objper->deleted_at = $deleted_at;
                                    $objper->save();
                                }
                            }
                            //*************************add Property
                            $objproperty = new ProjectProperty;
                            $objproperty->project_id = $lastId;
                            $objproperty->property_id = $request->property_id;
                            $objproperty->added_by = $loggedInUserId;
                            $objproperty->deleted_at = $deleted_at;
                            $objproperty->save();
                            //************************add customer
                            $objcustomer = new ProjectCustomer;
                            $objcustomer->project_id = $lastId;
                            $objcustomer->customer_id = $request->customer_id[0];
                            $objcustomer->added_by = $loggedInUserId;
                            $objcustomer->deleted_at = $deleted_at;
                            $objcustomer->save();
                        }
                    }
                }




                $response = array();
                $response["status"] = "success";
                $response["msg"] = $projectSuccessMessage;
                $response["id"] = $lastId ? $lastId : '';
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

    public function show(Request $request, $slug)
    {
        // dd(34);


        $projectId = $request->id;
        $currentDate = Carbon::now();
        $currentDate = $currentDate->format('Y-m-d');
        $requestData = $request->all();
        $loggedInUserId = Auth::user()->id;



        $projectInstance = new Project();
        $agentRoleId = Role::where('name', 'agent')->value('id');
        $customerRoleId = Role::where('name', 'customer')->value('id');
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $folderInstance = new UserFileFolders();
        $folders = $folderInstance->loadUserFolder(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], $request->all(), []);

        $eventInstance = new Event();
        $events = $eventInstance->fetchEvents(['perPage' => '', 'userId' => '', 'projectId' => $projectId], ['date' => $currentDate], ['user_associations']);
        // dd($events);
        $projectInstance = new Project();
        $agentProjects = $projectInstance->fetchProjects(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], [], []);

        $agentProjectsArray = [];
        if ($agentProjects->isNotEmpty()) {
            foreach ($agentProjects as $agentProject) {
                $agentProjectsArray[$agentProject->id] =  $agentProject->project_name;
            }
        }

        $projectPropertyInstance = new ProjectProperty();
        $project_properties = $projectPropertyInstance->loadProjectProperties(['perPage' => '', 'projectId' => $projectId, 'userId' => $loggedInUserId], '', []);
        $agentPropertiesArray = [];
        if ($project_properties->isNotEmpty()) {
            foreach ($project_properties as $agentProperty) {
                $agentPropertiesArray[$agentProperty->property_id] = ['label' => $agentProperty->name, 'image' => (!empty($agentProperty->firstImage_image)) ? getFileUrl($agentProperty->firstImage_image ?? '', 'properties') : asset('img/default-property.jpg')];
            }
        }

        $projectPropertyInstance = new ProjectAgent();
        $project_agents = $projectPropertyInstance->loadProjectAgents(['perPage' => '', 'projectId' => $projectId, 'userId' => $loggedInUserId], '', ['agent_permissions']);

        $connectedAgentsArray = [];
        if ($project_agents->isNotEmpty()) {
            foreach ($project_agents as $connectAgent) {
                $connectedAgentsArray[$connectAgent->agent_id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image)) ?
                    getFileUrl($connectAgent->image ?? '', 'users') : asset('img/default-user.jpg')];
            }
        }
        $projectCustomerInstance = new ProjectCustomer();
        $connectedCustomersData = $projectCustomerInstance->loadProjectCustomers(['perPage' => '', 'projectId' => $projectId, 'userId' => $loggedInUserId], '', []);

        $connectedCustomersArray = [];
        if ($connectedCustomersData->isNotEmpty()) {
            foreach ($connectedCustomersData as $connectCustomer) {
                $connectedCustomersArray[$connectCustomer->customer_id] = ['label' => $connectCustomer->name, 'image' => (!empty($connectCustomer->image)) ? getFileUrl($connectCustomer->image ?? '', 'users') : asset('img/default-user.jpg')];
            }
        }


        // dd($project_properties,$project_agents, $connectedCustomersData);
        $projectName = [];
        if ($agentProjects->isNotEmpty()) {
            foreach ($agentProjects as $agentProject) {
                if ($agentProject->slug == $slug) {
                    $projectName[$agentProject->id] =  $agentProject->project_name;
                }
            }
        }


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

        $timeArray = $this->generateTimeArray();
        $project = $projectInstance->getProjectDetails($slug, ['userId' => $loggedInUserId], ['project_properties', 'project_agents', 'project_customers', 'project_tasks', 'project_events', 'project_attachments', 'project_recent_activities']);
        $attachments = $project->project_attachments;
        foreach ($attachments as $attachment) {
            if (!empty($attachment->projectAttachment->userFolder->name)) {
                $attachment->folderName=$attachment->projectAttachment->userFolder->name;
            }
        }
        $currentMonthDateData = $this->getCurrentMonthDaysDateArr();
        if (!empty($project)) {
            $projectTaskAssign = [];
            foreach ($project->project_tasks as $projectTask) {
                if (!empty($projectTask->projectTaskAssign)) {
                    foreach ($projectTask->projectTaskAssign as $taskAssign) {
                        array_push($projectTaskAssign, $taskAssign);
                    }
                }
            }

            $projectAgents = $project->project_agents->where('is_project_owner', 0)->whereNotIn('agent_id', auth()->user()->id);
            $projectUsers = $projectAgents->merge($project->project_customers);
            ($project->project_customers);
            $projectUserData = [];
            if ($projectUsers->isNotEmpty()) {
                foreach ($projectUsers as $projectUser) {
                    $projectUserData[$projectUser->agent_id ?? $projectUser->customer_id] = ['label' => $projectUser->name, 'image' => (!empty($projectUser->image)) ? getFileUrl($projectUser->image ?? '', 'users') : asset('img/default-user.jpg')];
                }
            }

            $taskType = TaskType::pluck('name', 'id');
            $totalTasks = ProjectTask::where('project_id', $projectId)->whereNull('deleted_at')->count();
            $completedTasks = ProjectTask::where('project_id', $projectId)->whereNull('deleted_at')->where('status', 'completed')->count();

            $findThisProjectGroup = Group::where('project_id', $project->id)->where('is_project_group', 1)->first();
            if (!empty($findThisProjectGroup)) {
                $groupInstance = new Group();
                $groupChatHistoryData = $groupInstance->getGroupChatHistoryData($request, $loggedInUserId, $loggedInUserId, $findThisProjectGroup->id, $findThisProjectGroup);
            } else {
                $groupChatHistoryData = "";
            }

            $assignToTask = true;
            return view("modules.$this->model.show", compact('project', 'currentMonthDateData', 'totalTasks', 'completedTasks', 'events', 'timeArray', 'agentProjectsArray', 'agentPropertiesArray', 'connectedCustomersArray', 'connectedAgentsArray', 'actionCount', 'slug', 'currentDate', 'projectName', 'projectId', 'taskType', 'projectUserData', 'projectTaskAssign', 'groupChatHistoryData', 'assignToTask','folders','attachments'));
        } else {
            Session()->flash('error', trans('messages.Invalid_request'));
            return redirect()->route(routeNamePrefix() . 'projects.index');
        }
    }


    public function fetchImportProperties(Request $request, $projectSlug)
    {
        $loggedInUserId = auth()->user()->id;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $propertyInstance = new Property();
        $projectPropertyInstance = new ProjectProperty();

        $project_properties = $projectPropertyInstance->loadProjectProperties(['pluck' => 'project_properties.property_id', 'projectSlug' => $projectSlug, 'userId' => $loggedInUserId], [], []);
        $agent_properties = $propertyInstance->loadPropertiesByAgentId(['userId' => $loggedInUserId, 'includeProjectProperties' => $project_properties], $request->all());

        // dd($agent_properties);
        $htmlData = View('modules.projects.includes.load_import_properties', compact('agent_properties', 'projectSlug', 'project_properties'))->render();
        $response = array();
        $response["status"] = "success";
        $response["msg"] = '';
        $response["data"] = $htmlData;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }
    public function fetchProjectProperties(Request $request, $projectSlug)
    {

        $loggedInUserId = auth()->user()->id;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $projectInstance = new Project();
        $project = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        if (!empty($project)) {
            $projectPropertyInstance = new ProjectProperty();
            $project_properties = $projectPropertyInstance->loadProjectProperties(['perPage' => $recordsPerPage, 'projectId' => $project->id, 'userId' => $loggedInUserId], $request->all(), []);


            $htmlData = View('modules.projects.includes.load_property_mgmt', compact('project_properties', 'project'))->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = '';
            $response["data"] = $htmlData;
            $response['properties'] = $project_properties;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        }
    }


    public function submitImportProperties(Request $request, $projectSlug)
    {
        $loggedInUserId = Auth::user()->id;
        $projectInstance = new Project();
        $projectDetails = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        if (!empty($projectDetails)) {
            if (!empty($request->dataArr) && is_array($request->dataArr)) {
                $propertyNameArr = [];
                foreach ($request->dataArr as $dataVal) {
                    $checkPropertyVal = ProjectProperty::where('project_id', $projectDetails->id)->where('property_id', $dataVal)->first();
                    if (!empty($checkPropertyVal)) {
                        $obj = $checkPropertyVal;
                    } else {
                        $obj = new ProjectProperty;
                    }
                    $obj->project_id = $projectDetails->id;
                    $obj->property_id = $dataVal;
                    $obj->added_by = $loggedInUserId;
                    $obj->save();

                    $propertyNameArr[] = Property::where('id', $dataVal)->whereNull('deleted_at')->value('name');
                }

                if (count($request->dataArr) > 1) {
                    $this->saveProjectRecentActivity((['project_id' => $projectDetails->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_4', 'type' => 'property_management', 'values' => [auth()->user()->name, !empty($propertyNameArr) ? implode('||', $propertyNameArr) : '']]));
                } else {
                    $this->saveProjectRecentActivity((['project_id' => $projectDetails->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_5', 'type' => 'property_management', 'values' => [auth()->user()->name, !empty($propertyNameArr) ? implode('||', $propertyNameArr) : '']]));

                }

                ProjectProperty::whereNotIn('property_id', !empty($request->dataArr) ? $request->dataArr : [])->where('project_id', $projectDetails->id)->delete();
                Session()->flash('flash_notice', trans('Properties Imported Successfully'));
                return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
            } else {
                Session()->flash('error', trans('Please select atleast 1 property to import'));
                return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
            }
        } else {
            Session()->flash('error', trans('Something went wrong'));
            return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
        }
    }

    public function fetchImportAgents(Request $request, $projectSlug)
    {
        $loggedInUserId = auth()->user()->id;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $projectInstance = new Project();

        $project = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        if (!empty($project)) {
            $projectAgentInstance = new ProjectAgent();


            $project_agents = $projectAgentInstance->loadProjectAgents(['pluck' => 'project_agents.agent_id', 'projectId' => $project->id, 'userId' => $loggedInUserId, 'withoutLoggedInUser' => true], [], []);
            // print_r($project_agents);die;
            $userInstance = new User();
            if (Route::currentRouteName() == routeNamePrefix() . 'projects.fetchManageAgents') {

                $connectedAgentsData = $userInstance->loadUserConnectedUsersData(['perPage' => $recordsPerPage, 'userRoleName' => 'agent', 'userId' => $loggedInUserId, 'selectedProjectAgents' => $project_agents, 'projectId' => $project->id], $request->all(), ['agent_permissions']);

                $htmlData = View('modules.projects.includes.load_manage_agents', compact('connectedAgentsData', 'projectSlug', 'project_agents'))->render();
            } else {
                $connectedAgentsData = $userInstance->loadUserConnectedUsersData(['userRoleName' => 'agent', 'userId' => $loggedInUserId], $request->all());
                $htmlData = View('modules.projects.includes.load_import_agents', compact('connectedAgentsData', 'projectSlug', 'project_agents'))->render();
            }

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
    public function fetchAgentPermissions(Request $request, $projectSlug)
    {
        $loggedInUserId = auth()->user()->id;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $projectAgentInstance = new ProjectAgent();

        $userInstance = new User();
        $connectedAgentsData = $userInstance->loadUserConnectedUsersData(['perPage' => $recordsPerPage, 'userRoleName' => 'agent', 'userId' => $loggedInUserId], $request->all());

        $project_agents = $projectAgentInstance->loadProjectAgents(['pluck' => 'project_agents.property_id', 'projectSlug' => $projectSlug, 'userId' => $loggedInUserId], [], []);

        $htmlData = View('modules.projects.includes.load_agent_permissions', compact('connectedAgentsData', 'projectSlug', 'project_agents'))->render();
        $response = array();
        $response["status"] = "success";
        $response["msg"] = '';
        $response["data"] = $htmlData;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }

    public function fetchProjectAgents(Request $request, $projectSlug)
    {
        $loggedInUserId = auth()->user()->id;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $projectInstance = new Project();
        $project = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        if (!empty($project)) {
            $projectPropertyInstance = new ProjectAgent();
            $project_agents = $projectPropertyInstance->loadProjectAgents(['perPage' => $recordsPerPage, 'projectId' => $project->id, 'userId' => $loggedInUserId], $request->all(), ['agent_permissions']);


            $htmlData = View('modules.projects.includes.load_agent_mgmt', compact('project_agents', 'project'))->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = '';
            $response["data"] = $htmlData;
            $response['agents'] = $project_agents;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        }
    }


    public function submitImportAgents(Request $request, $projectSlug)
    {
        $loggedInUserId = Auth::user()->id;
        $projectInstance = new Project();
        $projectDetails = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        if (!empty($projectDetails)) {
            if (!empty($request->dataArr) && is_array($request->dataArr)) {
                $agentArr = [];
                $agentNameArr = [];
                foreach ($request->dataArr as $dataVal) {
                    if (!empty($dataVal['agent_id'])) {
                        $agentName = User::where('id', $dataVal['agent_id'])->value('name');

                        $checkAgentVal = ProjectAgent::where('project_id', $projectDetails->id)->where('agent_id', $dataVal['agent_id'])->first();
                        if (!empty($checkAgentVal)) {
                            $obj = $checkAgentVal;
                        } else {
                            $obj = new ProjectAgent;
                        }
                        $obj->project_id = $projectDetails->id;
                        $obj->agent_id = $dataVal['agent_id'];
                        $obj->added_by = $loggedInUserId;
                        $obj->is_project_owner = 0;

                        $obj->save();


                        if (!empty($dataVal['permissions']) && !empty($obj->id)) {
                            $permissionArr = [];
                            foreach ($dataVal['permissions'] as $permissionKey => $permission) {
                                if (!empty($permission)) {
                                    $projectPermissionInstance = new ProjectPermission();

                                    $permissionId = $projectPermissionInstance->getProjectPermissionIdByName($permissionKey);

                                    $checkIfThisPermissionOfAgentExists = ProjectAgentPermission::where('project_id', $projectDetails->id)->where('agent_id', $obj->id)->where('permission_id', $permissionId)->first();
                                    if (!empty($checkIfThisPermissionOfAgentExists)) {
                                        $objPer = ProjectAgentPermission::find($checkIfThisPermissionOfAgentExists->id);
                                    } else {
                                        $objPer = new ProjectAgentPermission();
                                    }
                                    $objPer->project_id = $projectDetails->id;
                                    $objPer->agent_id = $obj->id;
                                    $objPer->permission_id = $permissionId;
                                    $objPer->save();
                                    $permissionArr[] = $permissionId;
                                }
                            }
                            ProjectAgentPermission::whereNotIn('permission_id', !empty($permissionArr) ? $permissionArr : [])->where('project_id', $projectDetails->id)->where('agent_id', $obj->id)->delete();

                            $this->saveProjectRecentActivity((['project_id' => $projectDetails->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_10', 'type' => 'agent_management', 'values' => [auth()->user()->name, $agentName]]));
                        }
                        $agentArr[] = $dataVal['agent_id'];

                        $agentNameArr[] = $agentName;
                    }
                }

                if (count($request->dataArr) > 1) {
                    $this->saveProjectRecentActivity((['project_id' => $projectDetails->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_7', 'type' => 'agent_management', 'values' => [auth()->user()->name, !empty($agentNameArr) ? implode('||', $agentNameArr) : '']]));
                } else {
                    $this->saveProjectRecentActivity((['project_id' => $projectDetails->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_8', 'type' => 'agent_management', 'values' => [auth()->user()->name, !empty($agentNameArr) ? implode('||', $agentNameArr) : '']]));
                }

                $fetchProjectOwner = ProjectAgent::where('project_id', $projectDetails->id)->where('is_project_owner', 1)->value('agent_id');
                if (!empty($fetchProjectOwner)) {

                    $agentArr[] = $fetchProjectOwner;
                }
                ProjectAgent::whereNotIn('agent_id', !empty($agentArr) ? $agentArr : [])->where('project_id', $projectDetails->id)->delete();
                Session()->flash('flash_notice', trans('Agents Imported Successfully'));
                return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
            } else {
                Session()->flash('error', trans('Please select atleast 1 agent to import'));
                return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
            }
        } else {
            Session()->flash('error', trans('Something went wrong'));
            return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
        }
    }

    public function submitAgentPermissions(Request $request, $projectSlug)
    {
        $loggedInUserId = Auth::user()->id;
        $projectInstance = new Project();
        $projectDetails = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        $agentIds = [];
        if (!empty($projectDetails)) {
            if (!empty($request->dataArr) && is_array($request->dataArr)) {
                foreach ($request->dataArr as $dataVal) {
                    if (!empty($dataVal['agent_id'])) {
                        $agentIds[] = $dataVal['agent_id'];
                        if (!empty($dataVal['permissions'])) {
                            foreach ($dataVal['permissions'] as $permissionKey => $permissionVal) {
                                if ($permissionVal == 1) {
                                    $obj   =   new ProjectAgentPermission;
                                    $obj->project_id  = $projectDetails->id;
                                    $obj->agent_id  = $dataVal['agent_id'];
                                    $obj->permission_id  = $permissionKey;
                                    $obj->save();
                                }
                            }
                        }
                    }
                }

                // Delete Agents and agent permission those are removed
                if (!empty($agentIds)) {
                    $getNotIncludedAgents = ProjectAgent::whereNotIn('id', !empty($agentIds) ? $agentIds : [])->where('project_id', $projectDetails->id)->get();
                    if ($getNotIncludedAgents->isNotEmpty()) {
                        foreach ($getNotIncludedAgents as $agent) {
                            ProjectAgent::where('id', $agent->id)->delete();
                            ProjectAgentPermission::where('project_id', $projectDetails->id)->where('agent_id', $agent->id)->delete();
                        }
                    }
                }

                Session()->flash('flash_notice', trans('Permissions updated Successfully'));
                return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
            }
        } else {
            Session()->flash('error', trans('Something went wrong'));
            return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
        }
    }

    public function fetchImportCustomers(Request $request, $projectSlug)
    {
        $loggedInUserId = auth()->user()->id;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $projectCustomerInstance = new ProjectCustomer();

        $userInstance = new User();

        $project_customers = $projectCustomerInstance->loadProjectCustomers(['pluck' => 'project_customers.customer_id', 'projectSlug' => $projectSlug, 'userId' => $loggedInUserId], [], []);

        if (Route::currentRouteName() == routeNamePrefix() . 'projects.fetchManageCustomers') {
            $connectedCustomersData = $userInstance->loadUserConnectedUsersData(['userRoleName' => 'customer', 'userId' => $loggedInUserId, 'selectedProjectCustomers' => $project_customers], $request->all());
            $htmlData = View('modules.projects.includes.load_manage_customers', compact('connectedCustomersData', 'projectSlug', 'project_customers'))->render();
        } else {
            $connectedCustomersData = $userInstance->loadUserConnectedUsersData(['userRoleName' => 'customer', 'userId' => $loggedInUserId], $request->all());
            $htmlData = View('modules.projects.includes.load_import_customers', compact('connectedCustomersData', 'projectSlug', 'project_customers'))->render();
        }



        $response = array();
        $response["status"] = "success";
        $response["msg"] = '';
        $response["data"] = $htmlData;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }

    public function fetchProjectCustomers(Request $request, $projectSlug)
    {
        $loggedInUserId = auth()->user()->id;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $projectInstance = new Project();
        $project = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        if (!empty($project)) {
            $projectCustomerInstance = new ProjectCustomer();
            $project_customers = $projectCustomerInstance->loadProjectCustomers(['perPage' => $recordsPerPage, 'projectId' => $project->id, 'userId' => $loggedInUserId], $request->all(), []);


            $htmlData = View('modules.projects.includes.load_customer_mgmt', compact('project_customers', 'project'))->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = '';
            $response["data"] = $htmlData;
            $response['customers'] = $project_customers;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        }
    }


    public function submitImportCustomers(Request $request, $projectSlug)
    {
        $loggedInUserId = Auth::user()->id;
        $projectInstance = new Project();
        $projectDetails = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        if (!empty($projectDetails)) {
            if (!empty($request->dataArr) && is_array($request->dataArr)) {
                $customerNameArr = [];
                foreach ($request->dataArr as $dataVal) {
                    $checkCustomerVal = ProjectCustomer::where('project_id', $projectDetails->id)->where('customer_id', $dataVal)->first();
                    if (!empty($checkCustomerVal)) {
                        $obj = $checkCustomerVal;
                    } else {
                        $obj = new ProjectCustomer;
                    }
                    $obj->project_id = $projectDetails->id;
                    $obj->customer_id = $dataVal;
                    $obj->added_by = $loggedInUserId;
                    $obj->save();

                    $customerNameArr[] = User::where('id', $dataVal)->value('name');
                }

                if (count($request->dataArr) > 1) {
                    $this->saveProjectRecentActivity((['project_id' => $projectDetails->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_11', 'type' => 'customer_management', 'values' => [auth()->user()->name, !empty($customerNameArr) ? implode('||', $customerNameArr) : '']]));
                } else {
                    $this->saveProjectRecentActivity((['project_id' => $projectDetails->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_12', 'type' => 'customer_management', 'values' => [auth()->user()->name, !empty($customerNameArr) ? implode('||', $customerNameArr) : '']]));
                }
                ProjectCustomer::whereNotIn('customer_id', !empty($request->dataArr) ? $request->dataArr : [])->where('project_id', $projectDetails->id)->delete();
                Session()->flash('flash_notice', trans('Customers Imported Successfully'));
                return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
            } else {
                Session()->flash('error', trans('Please select atleast 1 customer to import'));
                return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
            }
        } else {
            Session()->flash('error', trans('Something went wrong'));
            return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
        }
    }


    public function fetchProjectTasks(Request $request, $projectSlug)
    {
        $loggedInUserId = auth()->user()->id;
        $assignToTask = false;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $projectInstance = new Project();
        $project = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        if (!empty($project)) {
            // dd($assignToTask);
            $projectTaskInstance = new ProjectTask();
            $project_tasks = $projectTaskInstance->loadProjectTasks(['perPage' => $recordsPerPage, 'projectId' => $project->id, 'userId' => $loggedInUserId], $request->all(), []);

            $htmlData = View('modules.projects.includes.load_todo_mgmt', compact('project_tasks', 'project', 'assignToTask'))->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = '';
            $response["data"] = $htmlData;
            $response['customers'] = $project_tasks;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        }
    }
    public function updateTaskStatus(Request $request, $projectSlug)
    {
        $loggedInUserId = auth()->user()->id;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $projectInstance = new Project();
        $project = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        if (!empty($project)) {
            if (!empty($request->dataArr)) {
                foreach ($request->dataArr as $val) {
                    $taskStatus = ProjectTask::find($val);
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
                    $taskName = ProjectTask::where('id', $val)->value('task_name');

                    $this->saveProjectRecentActivity((['project_id' => $project->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_15', 'type' => 'todo_list', 'values' => [auth()->user()->name, $taskName]]));
                }
            }

            $totalTasks = ProjectTask::where('project_id', $project->id)->whereNull('deleted_at')->count();
            $completedTasks = ProjectTask::where('project_id', $project->id)->whereNull('deleted_at')->where('status', 'completed')->count();
            $completeProjectBtnHtml = View('modules.projects.includes.elements.complete_project_btn', compact('totalTasks', 'project', 'completedTasks'))->render();

            $response = array();
            $response["status"] = "success";
            $response["msg"] = 'Task status updated successfully';
            $response["data"] = $completeProjectBtnHtml;
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

    public function fetchProjectAttachments(Request $request, $projectSlug)
    {
        $loggedInUserId = auth()->user()->id;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $projectInstance = new Project();
        $project = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        if (!empty($project)) {
            $projectAttachmenInstance = new ProjectAttachment();
            $project_attachments = $projectAttachmenInstance->loadProjectAttachments(['perPage' => $recordsPerPage, 'projectId' => $project->id, 'userId' => $loggedInUserId], $request->all(), []);


            $htmlData = View('modules.projects.includes.load_attachment_mgmt', compact('project_attachments', 'project'))->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = '';
            $response["data"] = $htmlData;
            $response['customers'] = $project_attachments;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        }
    }

    public function saveTaskData(Request $request, $projectSlug)
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

    public function submitImportAttachments(Request $request, $projectSlug)
    {
        $loggedInUserId = Auth::user()->id;
        $projectInstance = new Project();
        $projectDetails = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        if (!empty($projectDetails)) {
            if (!empty($request->dataArr) && is_array($request->dataArr)) {
                $attahmentNameArr = [];
                foreach ($request->dataArr as $dataVal) {
                    $checkAttachmentVal = ProjectAttachment::where('project_id', $projectDetails->id)->where('file_id', $dataVal)->first();
                    if (!empty($checkAttachmentVal)) {
                        $obj = $checkAttachmentVal;
                    } else {
                        $obj = new ProjectAttachment;
                    }
                    $obj->project_id = $projectDetails->id;
                    $obj->file_id = $dataVal;
                    $obj->added_by = $loggedInUserId;
                    $obj->folder_id = $request->folder_id;
                    $obj->save();

                    $attahmentNameArr[] = UserFile::where('id', $dataVal)->value('file_name');
                }

                $this->saveProjectRecentActivity((['project_id' => $projectDetails->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_16', 'type' => 'attachment', 'values' => [auth()->user()->name, !empty($attahmentNameArr) ? implode('||', $attahmentNameArr) : '']]));

                // ProjectAttachment::whereNotIn('file_id', !empty($request->dataArr) ? $request->dataArr : [])->where('project_id', $projectDetails->id)->delete();
                Session()->flash('flash_notice', trans('Attachments added Successfully'));
                return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
            } else {
                Session()->flash('error', trans('Please select atleast 1 attachment to import'));
                return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
            }
        } else {
            Session()->flash('error', trans('Something went wrong'));
            return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
        }
    }

    public function deleteProjectProperty($id, Request $request)
    {
        $data = ProjectProperty::where('id', $id)->whereNull('project_properties.deleted_at')->first();
        if (!empty($data)) {
            $data->delete();
            $propertyName = Property::where('id', $data->property_id)->value('name');

            $this->saveProjectRecentActivity((['project_id' => $data->project_id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_6', 'type' => 'property_management', 'values' => [auth()->user()->name, !empty($propertyName) ?  $propertyName : '']]));

            $response = array();
            $response["status"] = "success";
            $response["msg"] = 'Property deleted successfully';
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
    public function deleteProjectCustomer($id, Request $request)
    {
        $data = ProjectCustomer::where('id', $id)->whereNull('project_customers.deleted_at')->first();;
        if (!empty($data)) {
            $data->delete();
            $projectCustomer = User::where('id', $data->customer_id)->value('name');

            $this->saveProjectRecentActivity((['project_id' => $data->project_id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_13', 'type' => 'project_customers', 'values' => [auth()->user()->name, !empty($projectCustomer) ?  $projectCustomer : '']]));

            $response = array();
            $response["status"] = "success";
            $response["msg"] = 'Customer deleted successfully';
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
    public function deleteProjectAgent($id, Request $request)
    {
        $data = ProjectAgent::where('id', $id)->whereNull('project_agents.deleted_at')->first();;
        if (!empty($data)) {
            ProjectAgentPermission::where('project_id', $data->project_id)->where('agent_id', $data->id)->delete();
            $data->delete();
            $projectAgent = User::where('id', $data->agent_id)->value('name');

            $this->saveProjectRecentActivity((['project_id' => $data->project_id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_9', 'type' => 'project_agent', 'values' => [auth()->user()->name, !empty($projectAgent) ?  $projectAgent : '']]));

            $response = array();
            $response["status"] = "success";
            $response["msg"] = 'Agent deleted successfully';
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

    public function deleteProjectTask($id, Request $request)
    {
        $projectTaskdata = ProjectTask::where('id', $id)->whereNull('project_tasks.deleted_at')->first();
        $projectTaskAssignData = ProjectTaskAssign::where('project_task_id', $id);
        if (!empty($projectTaskdata) && !empty($projectTaskAssignData)) {
            $projectTaskAssignData->delete();
            $projectTaskdata->delete();
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
    public function downloadProjectAttachment($id, Request $request)
    {
        $data = UserFile::whereNull("deleted_at")->find($id);
        $fileName = $data->file_name;
            $originalFileName = $data->file_original_name;
        if (!empty($data)) {
            $url= url('storage/user_files/'.$fileName);
            $response = array();
            $response["status"] = "success";
            $response["msg"] = trans("messages.Certificate_Removed_Successfully");
            $response["data"] = $url;
            $response["originalFileName"] = $originalFileName;
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
    public function destroy($id, Request $request)
    {
        $project = Project::where('id', $id)->whereNull('projects.deleted_at')->first();;
        if (!empty($project)) {
            $project->delete();
            Session()->flash('success', trans('Project deleted successfully'));
            return redirect()->route(routeNamePrefix() . 'projects.index');
        } else {
            Session()->flash('error', trans('messages.Invalid_request'));
            return redirect()->route(routeNamePrefix() . 'projects.index');
        }
    }

    public function addAttachments(Request $request)
    {
        $loggedInUserId = auth()->user()->id;
        if ($request->checkedDocumentsId) {
            $projectAttachmentData = UserFile::whereIn('id', $request->checkedDocumentsId)->get();
            $data = View('modules.projects.includes.project_attachments_data', compact('projectAttachmentData'))->render();
            $response["status"] = "success";
            $response["msg"] = '';
            $response["data"] = $data;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        }
    }

    public function removeProjectAttachement($atachementId)
    {
        $projectAttachemnt = ProjectAttachment::find($atachementId);
        if (!empty($projectAttachemnt)) {
            $projectAttachemnt->delete();
            $attahmentName = UserFile::where('id', $projectAttachemnt->file_id)->value('file_name');
            $this->saveProjectRecentActivity((['project_id' => $projectAttachemnt->project_id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_17', 'type' => 'attachment', 'values' => [auth()->user()->name, $attahmentName ?? '']]));

            $projectAttachmentData = ProjectAttachment::where('project_id', $projectAttachemnt->project_id)->get();
            $htmlData = View("modules.projects.includes.project_attachments_data", ['projectAttachmentData' => $projectAttachmentData])->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = trans("messages.Projecct_Attachment_Removed_Successfully");
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


    public function completeProject(Request $request, $projectSlug)
    {
        $loggedInUserId = auth()->user()->id;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $projectInstance = new Project();
        $project = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        if (!empty($project)) {
            $checkUserPermission = checkUserProjectPermissions($project->id, 'Project Information');
            if ($checkUserPermission) {
                Project::where('id', $project->id)->update(['status' => 'completed']);

                $this->saveProjectRecentActivity((['project_id' => $project->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_21', 'type' => 'project_information', 'values' => [auth()->user()->name, $project->project_name]]));

                $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id , 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_12', 'type' => 'project_information', 'values' => [auth()->user()->name, $project->project_name]]));

                Session()->flash('success', trans('Project completed successfully'));
                return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
            } else {

                Session()->flash('error', trans('messages.Invalid_request'));
                return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
            }
        } else {
            Session()->flash('error', trans('You are not allowed to perform this operation'));
            return redirect()->route(routeNamePrefix() . 'projects.show', $projectSlug);
        }
    }

    public function  loadCurrentEvent(Request $request)
    {
        $currentDate = $request->current_date;
        $loggedInUserId = auth()->user()->id;

        $eventInstance = new Event();
        $events = $eventInstance->fetchEvents(['perPage' => '', 'userId' => '', 'projectId' => $request->project_id], ['date' => $currentDate], ['user_associations']);
        $projectInstance = new Project;
        $project = $projectInstance->getProjectDetails($request->slug, ['userId' => $loggedInUserId], ['project_properties', 'project_agents', 'project_customers', 'project_tasks', 'project_events', 'project_attachments', 'project_recent_activities']);

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

        $data = View('modules.projects.includes.event_mgmt_data', compact('events', 'actionCount', 'project', 'currentDate'))->render();
        $response["status"] = "success";
        $response["msg"] = '';
        $response["data"] = $data;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }

    public function projectsTaskType($taskId)
    {
        $loggedInUserId = auth()->user()->id;
        if ($taskId) {
            $subTypeTask = TaskSubType::where('task_id', $taskId)->get();
            $data = View('modules.projects.includes.todo-task-subtype', compact('subTypeTask'))->render();
            $response['subTypeTask_id'] = $subTypeTask->pluck('id');
            $response["status"] = "success";
            $response["msg"] = '';
            $response["data"] = $data;
            $response["http_code"] = 200;
            return Response::json($response, 200);
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
                    foreach ($request->assign_to_user as $assign_to) {
                        $obj   = ProjectTaskAssign::where('project_task_id', $request->project_task_id)->where('assign_to', $assign_to)->first();
                        // dd(auth()->user()->id);
                        if (!empty($obj)) {
                            $obj->project_task_id = $request->project_task_id;
                            $obj->assign_to = $assign_to;
                        } else {
                            $obj   = new ProjectTaskAssign();
                            $obj->project_task_id = $request->project_task_id;
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
                    // if (!in_array(auth()->user()->id, $request->assign_to_user)) {
                        // if(ProjectTaskAssign::whereNotIn('assign_to', $request->assign_to_user)->where('project_task_id', $request->project_task_id)->where('')){
                    //     dd('h2i');
                        $assignedUsers = !empty($request->assign_to_user) ? $request->assign_to_user : [];
                        $assignedUsers[] = auth()->user()->id;
                        ProjectTaskAssign::whereNotIn('assign_to', $assignedUsers)->where('project_task_id', $request->project_task_id)->delete();
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
    public function saveSingleTaskData(Request $request, $projectSlug)
    {
        $formData = $request->all();
        $loggedInUserId = Auth::user()->id;
        $projectInstance = new Project();
        $projectDetails = $projectInstance->getProjectDetails($projectSlug, ['userId' => $loggedInUserId], []);
        if (!empty($projectDetails && $formData)) {
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
                    $obj = new ProjectTask;
                    $obj->added_by = $loggedInUserId;
                    $obj->project_id = $projectDetails->id;
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

                    $this->saveProjectRecentActivity((['project_id' => $projectDetails->id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_14', 'type' => 'todo_list', 'values' => [auth()->user()->name, $request->input('task_name'), '']]));

                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = 'Task added successfully';
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
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Something_went_wrong");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }


    public function removeFiles(Request $request)
    {
        $loggedInUserId = Auth::user()->id;
        $projectAttachment = ProjectAttachment::whereIn('file_id', $request->fileId)->where('added_by', $loggedInUserId);
        if (!empty($projectAttachment)) {
            $projectAttachment->delete();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = trans('Attachments remove Successfully');
            $response["http_code"] = 200;
            return Response::json($response, 200);
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Something_went_wrong");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }

}
