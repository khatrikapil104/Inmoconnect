<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DB, Redirect,Response,Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
 
    public function login(Request $request)
    { 
        try{
            $formData = $request->all();
           
            if (!empty($formData)) {
                $validator = Validator::make(
                    $request->all(),
                    array(
                        'email' => 'required|email',
                        'password' => 'required',

                    )
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {
                    $userData = User::with('role')->where('email', $request->email)->first();
                   
                    if ($userData && Hash::check($request->password, $userData->password)) {
                        if ($userData->is_active == 0) {
                            
                            $response = array();
                            $response["status"] = "error";
                            $response["msg"] = trans("Your account is deactivated. Please contact to admin.");
                            $response["data"] = (object) array();
                            $response["http_code"] = 500;
                            return Response::json($response, 500);
                        }
                        if (!empty($userData->deleted_at)) {
                           
                            $response = array();
                            $response["status"] = "error";
                            $response["msg"] = trans("Your account is deleted. Please contact to admin.");
                            $response["data"] = (object) array();
                            $response["http_code"] = 500;
                            return Response::json($response, 500);
                        }
                        if (empty($userData->email_verified_at) ) {
                            
                            $response = array();
                            $response["status"] = "error";
                            $response["msg"] = trans("Your account is not verified");
                            $response["data"] = (object) array();
                            $response["http_code"] = 500;
                            return Response::json($response, 500);
                        }  
                        
                        
                        $token = $userData->createToken('Inmoconnect_App')->accessToken;
                        $response = array();
                        $response["status"] = "success";
                        $response["msg"] = trans("You are now logged in");
                        $response["token"] = $token;
                        $response["user_name"] = $userData->name ?? '';
                        $response["user_email"] = $userData->email ?? '';
                        $response["user_role"] = $userData->role->name ?? '';
                        $response["http_code"] = 200;
                        return Response::json($response, 200);

                    } else {

                        $response = array();
                        $response["status"] = "error";
                        $response["msg"] = trans("Email or password is incorrect");
                        $response["data"] = (object) array();
                        $response["http_code"] = 500;
                        return Response::json($response, 500);
                    }
                  
                }
            } else {
                $response = array();
                $response["status"] = "error";
                $response["msg"] = trans("Invalid Request");
                $response["data"] = (object) array();
                $response["http_code"] = 500;
                return Response::json($response, 500);
            }
        } catch (Exception $e) {
            Log::error($e);
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("Email or password is incorrect");
            $response["msg_org"] = $e->getMessage();
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }
}
