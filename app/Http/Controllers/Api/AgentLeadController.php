<?php

namespace App\Http\Controllers\Api;

use App\Events\CrmNotification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DB, Redirect, Response, Auth;
use App\Models\User;
use App\Models\AgentLead;
use App\Models\Property;

class AgentLeadController extends Controller
{
    public function storeAgentLeadDetails(Request $request)
    {

        try {
            $userId = auth()->guard('api')->user()->id;

            if (!empty($userId)) {
                $validator = Validator::make(
                    $request->all(),
                    array(
                        'name' => 'required',
                        'email' => 'required|email',

                    )
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {
                    $propertyId = 0;
                    if (!empty($request->ref_id)) {
                        $propertyId = Property::where('reference', $request->ref_id)->value('id');
                    }
                    $obj    =   new AgentLead;
                    $obj->agent_id = $userId;
                    $obj->name = !empty($request->name) ? $request->name : Null;
                    $obj->email = !empty($request->email) ? $request->email : Null;
                    $obj->phone = !empty($request->phone) ? $request->phone : Null;
                    $obj->subject = !empty($request->subject) ? $request->subject : Null;
                    $obj->message = !empty($request->message) ? $request->message : Null;
                    $obj->property_id = !empty($propertyId) ? $propertyId : Null;
                    $obj->save();

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
                $response["msg"] = trans("Invalid User");
                $response["data"] = (object) array();
                $response["http_code"] = 500;
                return Response::json($response, 500);
            }
        } catch (Exception $e) {
            Log::error($e);
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("Something Went Wrong.");
            $response["msg_org"] = $e->getMessage();
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }
}
