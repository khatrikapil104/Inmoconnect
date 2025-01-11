<?php

namespace App\Http\Controllers;

use App\Events\CrmNotification;
use App\Models\AgentLead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB, Redirect, Response, Auth;

class PropertyLeadController extends Controller
{
    public $model        =    'property_lead';
    public $listRouteUrl;
    public function __construct(Request $request)
    {
        
        parent::__construct();
        $this->middleware(function ($request, $next) {

            $this->listRouteUrl = route(routeNamePrefix() . 'properties.lead.index');
            return $next($request);
        });
        View()->share('model', $this->model);
        View()->share('listRouteUrl', $this->listRouteUrl);
        $this->request = $request;
    }

    public function storePropertyInquirey(Request $request)
    {
        $formData = $request->all();
        if (!empty($formData)) {
            $validator = Validator::make(
                $request->all(),
                array(
                    'name' => 'required',
                    'phone' => 'required',
                    'city' => 'required',
                    'agent_terms_agree' => auth()->user()->role->name=='agent' ? 'required' : '',

                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {

                $obj    =   AgentLead::where('email', $request->email)->where('property_id', $request->property_id)->first();
                if (!empty($obj)) {
                    $obj->name = !empty($request->name) ? $request->name : Null;
                    $obj->phone = !empty($request->phone) ? $request->phone : Null;
                    $obj->city = !empty($request->city) ? $request->city : Null;
                    $obj->message = !empty($request->message) ? $request->message : Null;
                    $obj->account_type = auth()->user()->role->name ?? NULL;
                    $obj->user_id = auth()->user()->id ?? NULL;
                } else {
                    $obj    =   new AgentLead;
                    $obj->agent_id = $request->agent_id;
                    $obj->name = !empty($request->name) ? $request->name : Null;
                    $obj->email = !empty($request->email) ? $request->email : Null;
                    $obj->phone = !empty($request->phone) ? $request->phone : Null;
                    $obj->city = !empty($request->city) ? $request->city : Null;
                    $obj->message = !empty($request->message) ? $request->message : Null;
                    $obj->property_id = !empty($request->property_id) ? $request->property_id : Null;
                    $obj->account_type = auth()->user()->role->name ?? NULL;
                    $obj->user_id = auth()->user()->id ?? NULL;

                }
                $obj->save();

                $agentDetail = User::find($request->agent_id);
                event(new CrmNotification(
                    auth()->user()->id,
                    'CRM_NOTIFICATION_26',
                    ['action_url' => route(routeNamePrefix() . 'properties.advance_search.index'), 'type' => 'inquiry', 'reference_id' => auth()->user()->id, 'values' => $agentDetail->name]
                ));

                event(new CrmNotification(
                    $request->agent_id,
                    'CRM_NOTIFICATION_44',
                    ['action_url' => route(routeNamePrefix() . 'properties.advance_search.index'), 'type' => 'inquiry', 'reference_id' => $request->agent_id, 'values' => auth()->user()->name]
                ));

                $response = array();
                $response["status"] = "success";
                $response["msg"] = trans("Lead successfully added");
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
    public function propertiesLead(Request $request)
    {
        $loggedInUserId = Auth::user()->id;
        $loadLeadUser = new AgentLead();
        $listingType = 'property_lead_list';
        $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $results = $loadLeadUser->loadLeadUser(['perPage' => $recordsPerPage], $request->all(), $loggedInUserId );
        // dd($results);
        if($request->ajax()){
            $tableData =  View("components.tables.custom-table", compact('results','listingType'))->render();
            $paginationData =  View("components.tables.pagination", compact('results','listingType'))->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = "";
            $response['tableData'] = $tableData;
            $response['leadProperties'] = $results;
            $response['paginationData'] = $paginationData;
            $response["http_code"] = 200;
            return Response::json($response, 200);
           
        }else{
            return  View("modules.$this->model.index", compact('results','listingType'));

        }

    }

    public function getLeadDetails($id){
       
        $result = AgentLead::with('propertyDetail.type','user','userPropertyPreferences')->find($id);
        $htmlData = view('modules.property_lead.includes.property_lead_sidebar',compact('result'))->render();
        $response = array();
        $response["status"] = "success";
        $response["msg"] = "";
        $response['propertyLeadDetails'] = $result;
        $response['htmlData'] = $htmlData;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }
}
