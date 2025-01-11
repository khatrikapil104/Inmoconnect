<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;
use App\Models\PendingRequest;
use DB, Redirect, Response, Hash, Auth, Mail;
use App\Events\CrmNotification;
use App\Events\CrmRequest;
use App\Mail\RequestAccepted;
use App\Mail\RequestReceived;
use Illuminate\Support\Facades\Storage;
class MiscellaneousController extends Controller
{

    public function __construct(Request $request)
    {
        parent::__construct();
        $this->request = $request;

    }

    public function refreshFilterData(Request $request)
    {
        if (!empty($request->filterName) && !empty($request->sectionName)) {
            if (session()->has($request->filterName)) {
                session()->forget($request->filterName);
            }
            $filterData = $this->getFilterData($request->filterName);
            $htmlData = View("modules.$request->sectionName.filter_fields", ['filterData' => $filterData, 'filterName' => $request->filterName])->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = "";
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

    public function fetchNotifications(Request $request)
    {
        $notifications = fetchNotifications($request);
        $htmlData = View("components.views.layouts.notifications.notification-index", ['values' => $notifications['data']])->render();
        $response = array();
        $response["status"] = "success";
        $response["msg"] = "";
        $response["data"] = $htmlData;
        $response["notifications"] = $notifications;
        $response["http_code"] = 200;
        return Response::json($response, 200);

    }

    public function fetchRequests(Request $request)
    {
        $requests = fetchRequests($request);
        $htmlData = View("components.views.layouts.requests.request-index", ['values' => $requests['data']])->render();
        $response = array();
        $response["status"] = "success";
        $response["msg"] = "";
        $response["data"] = $htmlData;
        $response["requests"] = $requests;
        $response["http_code"] = 200;
        return Response::json($response, 200);

    }

    public function acceptRejectRequest(Request $request)
    {
        if (!empty($request->request_id) && !empty($request->action)) {
            $checkIfRequestIsValidWithCurrentUser = PendingRequest::leftJoin('users', 'users.id', 'requests.from')->where('requests.id', $request->request_id)->where('requests.to', auth()->user()->id)->select('requests.*', 'users.name as from_name', 'users.email as from_email')->first();
            $successMessage = "";
            if (!empty($checkIfRequestIsValidWithCurrentUser)) {
                $dynamicValues = auth()->user()->name;
                $dynamicValues2 = $checkIfRequestIsValidWithCurrentUser->from_name ?? '';
                if ($request->action == 'accept') {
                    $successMessage = trans("messages.Request_has_been_accepted_successfully");
                    PendingRequest::where('id', $request->request_id)->update(['status' => config('constant.REQUEST_STATUS.ACCEPTED')]);

                    // Send Request acceptance email
                    Mail::to($checkIfRequestIsValidWithCurrentUser->from_email)->send(new RequestAccepted($checkIfRequestIsValidWithCurrentUser->from_name, auth()->user()->name, auth()->user()->image, route(routeNamePrefix() . 'agents.viewAgent', auth()->user()->id)));

                    // Send acceptance notification
                    event(new CrmNotification(
                        auth()->user()->id,
                        'CRM_NOTIFICATION_12',
                        ['action_url' => route(routeNamePrefix() . 'agentSearch.index', ['agent' => $checkIfRequestIsValidWithCurrentUser->from_email]), 'type' => 'request', 'reference_id' => $checkIfRequestIsValidWithCurrentUser->from, 'values' => $dynamicValues2]
                    ));

                    event(new CrmNotification(
                        $checkIfRequestIsValidWithCurrentUser->from,
                        'CRM_NOTIFICATION_17',
                        ['action_url' => route(routeNamePrefix() . 'agentSearch.index', ['agent' => auth()->user()->email]), 'type' => 'request', 'reference_id' => auth()->user()->id, 'values' => $dynamicValues]
                    ));

                } elseif ($request->action == 'reject') {
                    $successMessage = trans("messages.Request_has_been_rejected_successfully");
                    PendingRequest::where('id', $request->request_id)->update(['status' => config('constant.REQUEST_STATUS.REJECTED')]);
                    event(new CrmNotification(
                        auth()->user()->id,
                        'CRM_NOTIFICATION_13',
                        ['action_url' => route(routeNamePrefix() . 'agentSearch.index', ['agent' => $checkIfRequestIsValidWithCurrentUser->from_email]), 'type' => 'request', 'reference_id' => $checkIfRequestIsValidWithCurrentUser->from, 'values' => $dynamicValues2]
                    ));
                    event(new CrmNotification(
                        $checkIfRequestIsValidWithCurrentUser->from,
                        'CRM_NOTIFICATION_21',
                        ['action_url' => route(routeNamePrefix() . 'agentSearch.index', ['agent' => auth()->user()->email]), 'type' => 'request', 'reference_id' => auth()->user()->id, 'values' => $dynamicValues]
                    ));
                }


                $response = array();
                $response["status"] = "success";
                $response["msg"] = $successMessage;
                $response["data"] = (object) array();
                ;
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

        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }

    public function sendRequestToAgent(Request $request)
    {
        if (!empty($request->agent_id)) {
            $checkIfRequestAlreadyExistsForBothUser = PendingRequest::where('from', auth()->user()->id)->where('to', $request->agent_id)->first();
            if (!empty($checkIfRequestAlreadyExistsForBothUser)) {
                $response = array();
                $response["status"] = "error";
                $response["msg"] = trans("messages.Invalid_request");
                $response["data"] = (object) array();
                $response["http_code"] = 500;
                return Response::json($response, 500);
            } else {
                $obj = new PendingRequest;
                $obj->to = $request->agent_id;
                $obj->from = auth()->user()->id;
                $obj->save();
                $lastId = $obj->id;

                $agent = User::find($request->agent_id);    
                // $agent->parent_user_id = auth()->user()->id;// This should not be there 
                // $agent->save();
                $dynamicValues = $agent->name ?? '';

                // Send Request receivd email
                Mail::to($agent->email)->send(new RequestReceived($agent->name, auth()->user()->name, auth()->user()->image));
                $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id , 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_5', 'type' => 'property', 'values' => [auth()->user()->name, $dynamicValues ]]));

                event(new CrmNotification(
                    auth()->user()->id,
                    'CRM_NOTIFICATION_11',
                    [
                        'action_url' => route(routeNamePrefix() . 'agentSearch.index', ['agent' => $agent->email]),
                        'type' => 'request',
                        'reference_id' => $request->agent_id,
                        'values' => $dynamicValues
                    ]
                ));
                event(new CrmRequest($request->agent_id, $lastId));

                $response = array();
                $response["status"] = "success";
                $response["msg"] = trans("messages.Request_Sent_Successfully");
                $response["data"] = (object) array();
                ;
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

    public function getCountries()
    {
        $filePath = public_path('assets/data/countries_states.json');

        if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);
            $data = json_decode($jsonContent, true);

            return response()->json(['countries' => $data['countries']]);
        } else {
            return response()->json(['error' => 'File not found']);
        }

    }

    public function getStates(Request $request)
    {
        $filePath = public_path('assets/data/countries_states.json');
        if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);
            $data = json_decode($jsonContent, true);

            $searchTerm = $request->input('search');
            $page = $request->input('page', 1); // Default page is 1
            $perPage = 20; // Number of records per page
            $startIndex = ($page - 1) * $perPage;
            $endIndex = $startIndex + $perPage;

            $states = [];
            $counter = 0;

            foreach ($data['states'] as $state) {
                if (empty($searchTerm) || stripos($state['text'], $searchTerm) !== false) {
                    $counter++;

                    if ($counter > $startIndex && $counter <= $endIndex) {
                        $states[] = $state;
                    }
                }
            }

            return response()->json(['results' => $states]);
        } else {
            return response()->json(['error' => 'File not found']);
        }
    }

    
    public function getcities(Request $request)
    {
        // dd($request->state_id);
        $filePath = public_path('assets/data/citiesByState.json');

        if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);
            $data = json_decode($jsonContent, true);

            // Check if 'cities' key exists and is an array
            if (!isset($data['cities']) || !is_array($data['cities'])) {
                return response()->json(['error' => 'Cities data not found', 'data' => $data]);
            }

            $stateId = $request->state_id;         
            $filteredCities = array_filter($data['cities'], function ($city) use ($stateId) {
                //dd($city['state_id'], $stateId);
                return $city['state_id'] === $stateId;
               
            });
            // Convert to grouped array by state
            $cities = array_map(function ($city) {
                return [
                    'id' => $city['id'],
                    'text' => $city['text'],
                ];
            }, $filteredCities);

            return response()->json(['results' => $cities]);
        } else {
            return response()->json(['error' => 'File not found']);
        }
    }



}


