<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\EventCreate;
use App\Mail\EventUpdate;
use App\Mail\EventUserCreate;
use App\Mail\EventUserUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Models\Event;
use  App\Models\EventAssociation;
use  App\Models\EventAttachment;
use  App\Models\User;
use  App\Models\Property;
use  App\Models\Project;
use App\Models\ProjectAgent;
use App\Models\ProjectCustomer;
use App\Models\ProjectProperty;
use  App\Models\UserFile;
use DB, Redirect, Response, Auth, File, Mail;
use Carbon\Carbon;

class EventController extends Controller
{
    public $model        =    'events';
    public function __construct(Request $request)
    {
        parent::__construct();

        View()->share('model', $this->model);
        $this->request = $request;
    }

    public function store(Request $request, $eventId = null)
    {
        // echo "<pre>"; print_r($request->input('files')); echo "</pre>"; die();
        $now = Carbon::now();
        $data = Event::with('associations')->whereNotNull('reminder')->get();
        $date = date('H:i:s', time());
        $now = Carbon::now();

        $formData = $request->all();
        // dd($formData);
        $propertySuccessMessage = !empty($eventId) ? trans('messages.popup-message.Event_updated_successfully') : trans('messages.popup-message.Event_added_successfully');
        if (!empty($formData)) {
            Validator::extend('lat_lng_should_not_empty', function ($attribute, $value, $parameters, $validator) {
                $latitudeField = $parameters[0] ?? 'latitude';
                $longitudeField = $parameters[1] ?? 'longitude';

                $latitude = $validator->getData()[$latitudeField] ?? null;
                $longitude = $validator->getData()[$longitudeField] ?? null;

                return !empty($latitude) && !empty($longitude);
            });
            Validator::extend('contains_whitespace', function ($attribute, $value, $parameters, $validator) {
                return !preg_match('/\s/', $value);
            });
            $rules = [
                'event_name' => 'required',
                'action' => 'required',
                'due_date' => 'required',
                'start_from' => 'required|date_format:H:i:s',
                'end_to' => 'required|date_format:H:i:s|after:start_from',
            ];
            if (!empty($request->is_project_base_event) && $request->is_project_base_event == 1) {
                $rules['project_id'] = 'required';
            }
            $validator = Validator::make(
                $request->all(),
                $rules,
                array(
                    "event_name.required" => trans('messages.add-events.event_name_field_required'),
                    "action.required" => trans('messages.add-events.action_field_required'),
                    "due_date.required" => trans('messages.add-events.due_date_field_required'),
                    "start_from.required" => trans('messages.add-events.start_from_field_required'),
                    "end_to.required" => trans('messages.add-events.end_to_field_required'),
                )
            );



            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            }
            $now = Carbon::now();
            $time = $now->format('H:i:s');
            $nowDate = $now->format('Y-m-d');

            $due_date = Carbon::createFromFormat('m-d-Y', $request->due_date)->format('Y-m-d');
            $existingEvents = false;
            $existingTimeEvents = false;

            $startTimeRange = $request->start_from;
            $endTimeRange = $request->end_to;
            $eventOwner = Event::where('owner_id',auth()->user()->id)->exists();

            if ((($startTimeRange < $time) && ($due_date <= $nowDate)) || (($endTimeRange < $time) && ($due_date <= $nowDate))) {

                $existingTimeEvents = true;
            }

            $existingEvents = Event::where('owner_id',auth()->user()->id)->where(function ($query)  use ($startTimeRange, $endTimeRange) {
                $query->where(function ($query) use ($startTimeRange, $endTimeRange) {
                    $query->where('start_from', '<', $endTimeRange)
                        ->where('end_to', '>', $startTimeRange);
                })->orWhere(function ($query) use ($startTimeRange, $endTimeRange) {
                    $query->whereBetween('start_from', [$startTimeRange, $endTimeRange])
                        ->orWhereBetween('end_to', [$startTimeRange, $endTimeRange]);
                });
            })
                ->whereDate('due_date', $due_date)
                ->where('id', '!=', $eventId)
                ->exists();


            $startTimeFormated = Carbon::createFromFormat('H:i:s', $startTimeRange)->format('g:i A');
            $endTimeFormated = Carbon::createFromFormat('H:i:s', $endTimeRange)->format('g:i A');
            if ($existingEvents) {
                $errorMsg = 'There is already an event scheduled between ' . $startTimeFormated . ' and ' . $endTimeFormated;
                // return Response::json($errorMsg, 200);
                $response = array();
                $response["status"] = "error";
                $response["msg"] = $errorMsg;
                $response["data"] = (object) array();
                $response["http_code"] = 500;
                return Response::json($response, 500);
            }
            if ($existingTimeEvents) {
                $errorMsg = 'You cannot create event for past time ' . $startTimeFormated . ' and ' . $endTimeFormated;
                // return Response::json($errorMsg, 200);
                $response = array();
                $response["status"] = "error";
                $response["msg"] = $errorMsg;
                $response["data"] = (object) array();
                $response["http_code"] = 500;
                return Response::json($response, 500);
            } else {
                $owner_id = auth()->user()->id;

                $time = $now->format('H:i:s');
                DB::beginTransaction();

                if (!empty($eventId)) {
                    $obj = Event::where('id', $eventId)->first();
                } else {
                    $obj = new Event;
                }
                if (!empty($request->project_id)) {
                    $obj->project_id = $request->input('project_id');
                    $projectName = Project::find($request->input('project_id'));
                    $projectName = $projectName->project_name;
                } else {
                    $obj->project_id = NULL;
                    $projectName = '';
                }
                $obj->event_name = $request->input('event_name');
                $obj->action = $request->input('action');
                $obj->due_date = Carbon::createFromFormat('m-d-Y', $request->input('due_date'))->format('Y-m-d');
                $obj->start_from = date('H:i:s', strtotime($request->input('start_from')));
                $obj->end_to = date('H:i:s', strtotime($request->input('end_to')));
                $obj->owner_id = $owner_id;
                $obj->event_description = !empty($request->input('event_description')) ? $request->input('event_description') : Null;
                $obj->priority = !empty($request->input('priority')) ? $request->input('priority') : Null;
                $obj->reminder = !empty($request->input('reminder')) ? $request->input('reminder') : Null;
                $obj->save();
                $lastId = $obj->id;
                if (!empty($lastId)) {

                    $properties = [];
                    $customerData = [];
                    $agentData = [];
                    $userData = [];
                    if (!empty($request->agent_id)) {
                        $agentData = User::with('role')->whereIn('id', $request->agent_id)->get();
                        $agentUserData = User::whereIn('id', $request->agent_id)->pluck('name')->toArray();
                        $userData = array_merge($userData, $agentUserData);
                    }
                    if (!empty($request->customer_id)) {
                        $customerData = User::with('role')->whereIn('id', $request->customer_id)->get();
                        $customerUserData = User::whereIn('id', $request->customer_id)->pluck('name')->toArray();
                        $userData = array_merge($userData, $customerUserData);
                    }
                    if (!empty($request->property_id)) {
                        $properties = Property::whereIn('id', $request->property_id)->get();
                        foreach ($request->property_id as $assVal) {
                            if (!empty($assVal)) {

                                $checkAssVal = EventAssociation::where('event_id', $lastId)->where('association_id', $assVal)->where('type', 'property')->first();
                                if (!empty($checkAssVal)) {
                                    $assObj = $checkAssVal;
                                } else {
                                    $assObj = new EventAssociation;
                                }
                                $assObj->event_id = $lastId;
                                $assObj->association_id = $assVal;
                                $assObj->type = 'property';
                                $assObj->save();
                                $lastAssId = $assObj->id;
                                if (empty($lastAssId)) {
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
                    if (!empty($request->agent_id)) {
                        foreach ($request->agent_id as $assVal) {
                            if (!empty($assVal)) {

                                $checkAssVal = EventAssociation::where('event_id', $lastId)->where('association_id', $assVal)->where('type', 'agent')->first();
                                if (!empty($checkAssVal)) {
                                    $assObj = $checkAssVal;
                                } else {
                                    $assObj = new EventAssociation;
                                }
                                $assObj->event_id = $lastId;
                                $assObj->association_id = $assVal;
                                $assObj->type = 'agent';
                                $assObj->save();
                                $lastAssId = $assObj->id;
                                if (empty($lastAssId)) {
                                    DB::rollback();
                                    $response = array();
                                    $response["status"] = "error";
                                    $response["msg"] = trans("messages.Something_went_wrong");
                                    $response["data"] = (object) array();
                                    $response["http_code"] = 500;
                                    return Response::json($response, 500);
                                }

                                $data = User::find($assVal);

                                if (!empty($eventId)) {
                                    Mail::to($data->email)->send(new EventUserUpdate($data->name, $obj->due_date, $obj->start_from, $obj->end_to, $request->input('event_name'), $projectName, $customerData, $properties, $agentData));
                                } else {
                                    Mail::to($data->email)->send(new EventUserCreate($data->name, $obj->due_date, $obj->start_from, $obj->end_to, $request->input('event_name'), $projectName, $customerData, $properties, $agentData));
                                }
                            }
                        }
                    }
                    if (!empty($request->customer_id)) {

                        foreach ($request->customer_id as $assVal) {
                            if (!empty($assVal)) {

                                $checkAssVal = EventAssociation::where('event_id', $lastId)->where('association_id', $assVal)->where('type', 'customer')->first();
                                if (!empty($checkAssVal)) {
                                    $assObj = $checkAssVal;
                                } else {
                                    $assObj = new EventAssociation;
                                }
                                $assObj->event_id = $lastId;
                                $assObj->association_id = $assVal;
                                $assObj->type = 'customer';
                                $assObj->save();
                                $lastAssId = $assObj->id;
                                if (empty($lastAssId)) {
                                    DB::rollback();
                                    $response = array();
                                    $response["status"] = "error";
                                    $response["msg"] = trans("messages.Something_went_wrong");
                                    $response["data"] = (object) array();
                                    $response["http_code"] = 500;
                                    return Response::json($response, 500);
                                }
                                $data = User::find($assVal);
                                if (!empty($eventId)) {
                                    Mail::to($data->email)->send(new EventUserUpdate($data->name, $obj->due_date, $obj->start_from, $obj->end_to, $request->input('event_name'), $projectName, $customerData, $properties, $agentData));
                                } else {
                                    Mail::to($data->email)->send(new EventUserCreate($data->name, $obj->due_date, $obj->start_from, $obj->end_to, $request->input('event_name'), $projectName, $customerData, $properties, $agentData));
                                }
                            }
                        }
                    }


                        $checkAssVal = EventAssociation::where('event_id', $lastId)->where('association_id', auth()->user()->id)->where('type', 'owner')->first();
                        if (!empty($checkAssVal)) {
                            $assObj = $checkAssVal;
                        } else {
                            $assObj = new EventAssociation;
                        }
                        $assObj->event_id = $lastId;
                        $assObj->association_id =  auth()->user()->id;
                        $assObj->type = 'owner';
                        $assObj->save();
                        $lastAssId = $assObj->id;
                        if (empty($lastAssId)) {
                            DB::rollback();
                            $response = array();
                            $response["status"] = "error";
                            $response["msg"] = trans("messages.Something_went_wrong");
                            $response["data"] = (object) array();
                            $response["http_code"] = 500;
                            return Response::json($response, 500);
                        }

                    EventAssociation::whereNotIn('association_id', !empty($request->property_id) ? $request->property_id : [])->where('event_id', $lastId)->where('type', 'property')->delete();
                    EventAssociation::whereNotIn('association_id', !empty($request->agent_id) ? $request->agent_id : [])->where('event_id', $lastId)->where('type', 'agent')->delete();
                    EventAssociation::whereNotIn('association_id', !empty($request->customer_id) ? $request->customer_id : [])->where('event_id', $lastId)->where('type', 'customer')->delete();
                    // dd($request->input('files'));
                    if (!empty($request->input('files'))) {

                        $files = $request->input('files');
                        // dd($files);
                        foreach ($files as $imageKey => $fileId) {
                            if (!empty($fileId)) {
                                $fileData = UserFile::find($fileId);
                                if (!empty($fileData)) {
                                    // dd('new');
                                    $obj = new EventAttachment;
                                    $obj->event_id = $lastId;
                                    $obj->file_id = $fileId;
                                    $obj->type = $fileData->file_type == 'pdf' ? 'document' : 'jpg';
                                    $originalName = $fileData->file_original_name;
                                    $fileName = $fileData->file_name;
                                    $obj->file_name = $fileName;
                                    $obj->original_name = $originalName;

                                    $obj->save();
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

                    if (!empty($obj->project_id)) {
                        if ($request->action == 'call') {
                            $this->saveProjectRecentActivity((['project_id' => $obj->project_id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_18', 'values' => [auth()->user()->name, !empty($userData) ? implode('||', $userData) : ''], 'type' => 'project_information']));

                            $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id , 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_9', 'type' => 'event', 'values' => [auth()->user()->name, !empty($userData) ? implode('||', $userData) : '']]));
                        }
                        if ($request->action == 'view_meeting') {
                            $this->saveProjectRecentActivity((['project_id' => $obj->project_id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_19', 'values' => [auth()->user()->name, !empty($userData) ? implode('||', $userData) : ''], 'type' => 'project_information']));

                            $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id , 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_10', 'type' => 'event', 'values' => [auth()->user()->name, !empty($userData) ? implode('||', $userData) : '']]));
                        }
                        if ($request->action == 'meeting') {
                            $this->saveProjectRecentActivity((['project_id' => $obj->project_id, 'activity' => 'CRM_PROJECT_RECENT_ACTIVITY_20', 'values' => [auth()->user()->name, !empty($userData) ? implode('||', $userData) : ''], 'type' => 'project_information']));

                            $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id , 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_11', 'type' => 'event', 'values' => [auth()->user()->name, !empty($userData) ? implode('||', $userData) : '']]));
                        }
                    }else{
                        if ($request->action == 'call') {
                            $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id , 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_9', 'type' => 'event', 'values' => [auth()->user()->name, !empty($userData) ? implode('||', $userData) : '']]));
                        }
                        if ($request->action == 'view_meeting') {
                            $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id , 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_10', 'type' => 'event', 'values' => [auth()->user()->name, !empty($userData) ? implode('||', $userData) : '']]));
                        }
                        if ($request->action == 'meeting') {
                            $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id , 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_11', 'type' => 'event', 'values' => [auth()->user()->name, !empty($userData) ? implode('||', $userData) : '']]));
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

                if (!empty($eventId)) {
                    Mail::to(auth()->user()->email)->send(new EventUpdate(auth()->user()->name, $obj->due_date, $obj->start_from, $obj->end_to, $request->input('event_name'), $projectName, $customerData, $properties, $agentData));
                } else {
                    Mail::to(auth()->user()->email)->send(new EventCreate(auth()->user()->name, $obj->due_date, $obj->start_from, $obj->end_to, $request->input('event_name'), $projectName, $customerData, $properties, $agentData));
                }

                $response = array();
                $response["status"] = "success";
                $response["msg"] = $propertySuccessMessage;
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

    public function getEventDetailSideview(Request $request, $eventId = null)
    {
        if (!empty($eventId)) {
            $projectId = Event::find($eventId)->project_id;
        }
        $eventInstance  = new Event;
        $requestData = $request->all();
        $loggedInUserId = auth()->user()->id;
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $result = $eventInstance->getEventDetails($eventId, ['user_associations']);
        if (!empty($result)) {

            $userInstance = new User();
            $connectedAgentsData = $userInstance->loadUserConnectedUsersData(['perPage' => $recordsPerPage, 'userRoleName' => 'agent', 'userId' => $result->owner_id], $requestData);
            $connectedCustomersData = $userInstance->loadUserConnectedUsersData(['perPage' => $recordsPerPage, 'userRoleName' => 'customer', 'userId' => $result->owner_id], $requestData);

            $projectInstance = new Project();
            $agentProjects = $projectInstance->fetchProjects(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], [], []);
            $agentProjectsArray = [];
            if ($agentProjects->isNotEmpty()) {
                foreach ($agentProjects as $agentProject) {
                    $agentProjectsArray[$agentProject->id] =  $agentProject->project_name;
                }
            }

            $agentPropertiesArray = [];
            if (!empty($projectId)) {
                $projectPropertyInstance = new ProjectProperty();
                $agentProperties = $projectPropertyInstance->loadProjectProperties(['perPage' => '', 'projectId' => $projectId, 'userId' => $loggedInUserId], '', []);
                if ($agentProperties->isNotEmpty()) {
                    foreach ($agentProperties as $agentProperty) {
                        $agentPropertiesArray[$agentProperty->property_id] = ['label' => $agentProperty->name, 'image' => (!empty($agentProperty->firstImage_image)) ? getFileUrl($agentProperty->firstImage_image ?? '', 'properties') : asset('img/default-property.jpg')];
                    }
                }
            } else {
                $propertyInstance = new Property();
                $agentProperties = $propertyInstance->loadPropertiesByAgentId(['perPage' => 10, 'userId' => $result->owner_id], []);
                if ($agentProperties->isNotEmpty()) {
                    foreach ($agentProperties as $agentProperty) {
                        $agentPropertiesArray[$agentProperty->id] = ['label' => $agentProperty->name, 'image' => (!empty($agentProperty->cover_image)) ? $agentProperty->cover_image  : asset('img/default-property.jpg')];
                    }
                }
            }



            if (!empty($projectId)) {
                $projectPropertyInstance = new ProjectAgent();
                $project_agents = $projectPropertyInstance->loadProjectAgents(['perPage' => '', 'projectId' => $projectId, 'userId' => $loggedInUserId], '', ['agent_permissions']);
                if ($project_agents->isNotEmpty()) {
                    foreach ($project_agents as $connectAgent) {
                        $connectedAgentsArray[$connectAgent->agent_id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image)) ?
                            getFileUrl($connectAgent->image ?? '', 'users') : asset('img/default-user.jpg')];
                    }
                }
            } else {
                $connectedAgentsArray = [];
                if ($connectedAgentsData->isNotEmpty()) {
                    foreach ($connectedAgentsData as $connectAgent) {
                        $connectedAgentsArray[$connectAgent->id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image)) ? $connectAgent->image : asset('img/default-user.jpg')];
                    }
                }
            }
            if (!empty($projectId)) {
                $projectCustomerInstance = new ProjectCustomer();
                $connectedCustomersData = $projectCustomerInstance->loadProjectCustomers(['perPage' => '', 'projectId' => $projectId, 'userId' => $loggedInUserId], '', []);

                $connectedCustomersArray = [];
                if ($connectedCustomersData->isNotEmpty()) {
                    foreach ($connectedCustomersData as $connectAgent) {
                        $connectedCustomersArray[$connectAgent->customer_id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image)) ? getFileUrl($connectAgent->image ?? '', 'users') : asset('img/default-user.jpg')];
                    }
                }
            } else {
                $connectedCustomersArray = [];
                if ($connectedCustomersData->isNotEmpty()) {
                    foreach ($connectedCustomersData as $connectAgent) {
                        $connectedCustomersArray[$connectAgent->id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image)) ? $connectAgent->image : asset('img/default-user.jpg')];
                    }
                }
            }


            $eventAttachemntData = EventAttachment::where('event_id', $eventId)->get();
            $timeArray = $this->generateTimeArray();
            $htmlData = View('modules.events.includes.view_event', compact('result', 'agentPropertiesArray', 'connectedAgentsArray', 'connectedCustomersArray', 'timeArray', 'request', 'agentProjectsArray', 'eventAttachemntData'))->render();
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


    public function destroy(Request $request, $eventId = null)
    {
        $event = Event::where('id', $eventId)->whereNull('events.deleted_at')->first();;
        if (!empty($event)) {
            $event->delete();
            Session()->flash('success', trans('messages.popup-message.Event_deleted_successfully'));
            return redirect()->back();
        } else {
            Session()->flash('error', trans('messages.Invalid_request'));
            return redirect()->back();
        }
    }

    public function addAttachments(Request $request)
    {
        // dd($request->all());
        $loggedInUserId = auth()->user()->id;
        $type = 'edit';
        if ($request->checkedDocumentsId) {
            $type = 'edit';
            $eventAttachemntData = UserFile::whereIn('id', $request->checkedDocumentsId)->get();
            $data = View('modules.events.includes.event_attachments_data', compact('eventAttachemntData', 'type'))->render();
            $response["status"] = "success";
            $response["msg"] = '';
            $response["type"] = $type;
            $response["data"] = $data;
            $response["http_code"] = 200;
            // dd($response);
            return Response::json($response, 200);
        }
    }
    public function associationDataLoad($projectId = null)
    {
        $loggedInUserId = auth()->user()->id;
        if ($projectId) {
            $projectPropertyInstance = new ProjectProperty();
            $project_properties = $projectPropertyInstance->loadProjectProperties(['perPage' => '', 'projectId' => $projectId, 'userId' => $loggedInUserId], '', []);
            // dd($project_properties);
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
                foreach ($connectedCustomersData as $connectAgent) {
                    $connectedCustomersArray[$connectAgent->customer_id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image)) ? getFileUrl($connectAgent->image ?? '', 'users') : asset('img/default-user.jpg')];
                }
            }
        } else {
            $propertyInstance = new Property();
            $agentProperties = $propertyInstance->loadPropertiesByAgentId(['perPage' => Config("Reading.records_per_page"), 'userId' => $loggedInUserId], '');

            $agentPropertiesArray = [];
            if ($agentProperties->isNotEmpty()) {
                foreach ($agentProperties as $agentProperty) {
                    $agentPropertiesArray[$agentProperty->id] = ['label' => $agentProperty->name, 'image' => (!empty($agentProperty->cover_image)) ? $agentProperty->cover_image : asset('img/default-property.jpg')];
                }
            }
            $userInstance = new User();
            $connectedAgentsData = $userInstance->loadUserConnectedUsersData(['perPage' =>  Config("Reading.records_per_page"), 'userRoleName' => 'agent', 'userId' => $loggedInUserId], '');
            $connectedCustomersData = $userInstance->loadUserConnectedUsersData(['perPage' =>  Config("Reading.records_per_page"), 'userRoleName' => 'customer', 'userId' => $loggedInUserId], '');

            $connectedCustomersArray = [];
            if ($connectedCustomersData->isNotEmpty()) {
                foreach ($connectedCustomersData as $connectAgent) {
                    $connectedCustomersArray[$connectAgent->id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image)) ? $connectAgent->image : asset('img/default-user.jpg')];
                }
            }

            $connectedAgentsArray = [];
            if ($connectedAgentsData->isNotEmpty()) {
                foreach ($connectedAgentsData as $connectAgent) {
                    $connectedAgentsArray[$connectAgent->id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image)) ? $connectAgent->image : asset('img/default-user.jpg')];
                }
            }
        }
        $data = View('modules.events.includes.add_prop_cust_agnt', compact('agentPropertiesArray', 'connectedAgentsArray', 'connectedCustomersArray'))->render();
        // dd($data);
        $response["status"] = "success";
        $response["msg"] = '';
        $response["data"] = $data;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }
}
