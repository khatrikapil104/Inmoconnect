<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PendingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\SocialUser;
use App\Models\Role;
use DB, Redirect, Response, Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Str, Exception;
use Carbon\Carbon;
use Mail;
use Hash, Session;
use App\Mail\VerifyEmail;
use App\Mail\ResetPassword;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Access\AuthorizationException;
use App\Events\CrmNotification;
use App\Models\FeedImportProgress;
use App\Models\userCompanyDetail;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public $model = 'auth';
    public function __construct(Request $request)
    {
        parent::__construct();

        View()->share('model', $this->model);
        $this->request = $request;
    }
    public function login(Request $request)
    {
        return View("modules.$this->model.login");
    }

    public function postLogin(Request $request)
    {

        try {
            $formData = $request->all();
            // print_r($formData);die; 
            if (!empty($formData)) {
                $validator = Validator::make(
                    $request->all(),
                    array(
                        'current_step' => 'required',
                        'email' => [
                            'required_if:current_step,email',
                            'exists:users,email'
                        ],
                        'password' => 'required_if:current_step,==,final',

                    ),
                    array(

                        "email.required_if" => trans("messages.The_email_field_is_required"),
                        "email.exists" => trans("The email address is not registered in our system."),
                        "password.required_if" => trans("messages.The_password_field_is_required"),
                    )
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {
                    if ($request->current_step == 'email') {
                        $companyImage = '';
                        $user = User::where('email', $request->email)->first();
                        if (!empty($user)) {

                            $companyDetail = userCompanyDetail::where('user_id', ($user->role->name == 'agent' || $user->role->name == 'developer') ? $user->id : $user->parent_user_id)->first();
                            if (!empty($companyDetail->company_image)) {
                                $companyImage = $companyDetail->company_image;
                            }
                        }

                        $response = array();
                        $response["status"] = "success";
                        $response["msg"] = "";
                        $response["companyImage"] = $companyImage;
                        $response["dataNextStep"] = 'final';
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    } else {

                        $userdata = array(
                            'email'         => $request->email,
                            'password'         => $request->password,
                        );
                        if (auth()->attempt($userdata)) {
                            if (auth()->user()->is_active == 0) {
                                // if (auth()->user()->role->name=='developer') {
                                //     $response = array(); 
                                //     $response["status"] = "success";
                                //     $response["data"] = 'developer';
                                //     $response["http_code"] = 200;
                                //     return Response::json($response, 200);

                                // }

                                auth()->logout();
                                $response = array();
                                $response["status"] = "error";
                                $response["msg"] = trans("messages.Your_account_is_deactivated_Please_contact_to_the_admin");
                                $response["data"] = (object) array();
                                $response["http_code"] = 500;
                                return Response::json($response, 500);
                            }
                            if (!empty(auth()->user()->deleted_at)) {
                                auth()->logout();
                                $response = array();
                                $response["status"] = "error";
                                $response["msg"] = trans("messages.Your_account_is_deleted_Please_contact_to_the_admin");
                                $response["data"] = (object) array();
                                $response["http_code"] = 500;
                                return Response::json($response, 500);
                            }
                            if (empty(auth()->user()->email_verified_at)) {
                                auth()->logout();
                                $response = array();
                                $response["status"] = "error";
                                $response["msg"] = trans("messages.Your_account_is_not_verified");
                                $response["data"] = (object) array();
                                $response["http_code"] = 500;
                                return Response::json($response, 500);
                            }
                            // dd(now()->toDateString());
                            User::where('email', $request->email)->update(['last_login'=>now()->toDateString()]);
                            // if(auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer'){

                            //     $unlistedProperties = FeedImportProgress::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->first();
                            //     $dynamicValues = $unlistedProperties->inserted_records;
                            //     event(new CrmNotification(
                            //         auth()->user()->id,
                            //         'CRM_NOTIFICATION_41',
                            //         ['action_url' => route(routeNamePrefix().'feed-synced-index'), 'type' => 'property', 'reference_id' => auth()->user()->id, 'values' => $dynamicValues]
                            //     ));
                            // }

                            $userLocale = auth()->user()->preferred_locale;
                            app()->setLocale($userLocale);
                            Session::put('locale', $userLocale);
                            // For putting user permission Data In Session
                            $this->putUserPermissionDataIntoSession();

                            

                            $response = array();
                            $response["status"] = "success";
                            $response["msg"] = trans("messages.logged_in_message");
                            $response["data"] = route(routeNamePrefix() . 'user.dashboard');
                            $response["http_code"] = 200;
                            return Response::json($response, 200);
                        } else {

                            $response = array();
                            $response["status"] = "error";
                            $response["msg"] = trans("messages.email_password_incorrect");
                            $response["data"] = (object) array();
                            $response["http_code"] = 500;
                            return Response::json($response, 500);
                        }
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
        } catch (Exception $e) {
            Log::error($e);
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.email_password_incorrect");
            $response["msg_org"] = $e->getMessage();
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }

    public function register(Request $request)
    {
        if (!empty($request['invite-token'])) {
            $invitedUserDetails = User::where('verification_token', $request['invite-token'])->where('is_active', 0)->first();
            if (!empty($invitedUserDetails)) {

                return View("modules.$this->model.register", compact('invitedUserDetails'));
            } else {
                Session()->flash('flash_notice', trans('Invalid Access Token'));
                return redirect()->route(routeNamePrefix() . 'user.login');
            }
        }
        return View("modules.$this->model.register");
    }

    public function postRegister(Request $request)
    {
        $formData = $request->all();
        if (!empty($request['invite-token'])) {
            $invitedUserDetails = User::where('verification_token', $request['invite-token'])->where('is_active', 0)->first();
        }
        // print_r($request->all());die;
        if (!empty($formData)) {
            $validator = Validator::make(
                $request->all(),
                array(
                    'name' => 'required',
                    'type' => 'required',
                    'email' => !empty($invitedUserDetails) ? [] : ['required', 'email', Rule::unique('users')],
                    //'password' => ['required', Password::min(8)],
                    'password' => ['required', 'min:8', 'max:16'],
                    'confirm_password' => 'required|required_with:password|min:8|same:password'
                ),
                array(
                    "name.required" => trans("messages.The_name_field_is_required"),
                    "email.required" => trans("messages.The_email_field_is_required"),
                    "email.email" => trans("messages.The_email_field_must_be_a_valid_email_address"),
                    "email.unique" => trans("messages.The_email_has_already_been_taken"),
                    "password.required" => trans("messages.The_password_field_is_required"),
                    "password.min" => trans("messages.password_min_validation"),
                    "password.max" => trans("messages.Password_max_validation"),
                    "confirm_password.required" => trans("messages.The_confirm_password_field_is_required"),
                    "confirm_password.same" => trans("messages.confirm_password_same"),
                    "confirm_password.min" => trans("messages.confirm_password_min_validation"),
                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                $userRoleId = Role::where('name', $request->type)->value('id');
                DB::beginTransaction();
                if (!empty($invitedUserDetails)) {
                    $obj                               =  User::find($invitedUserDetails->id);
                } else {

                    $obj                               =  new User;
                }
                $obj->user_role_id                 =  $userRoleId ?? NULL;

                $obj->name                         =  $request->input('name');

                $obj->email                        =  !empty($invitedUserDetails) ? $invitedUserDetails->email : $request->input('email');
                $obj->password                     =  Hash::make($request->password);
                if (!empty($invitedUserDetails)) {
                    $obj->markEmailAsVerified();
                    $obj->verification_token = NULL;
                    $obj->phone = $invitedUserDetails->phone ?? Null;
                } else {

                    $obj->verification_token           =  Str::uuid();
                }
                $obj->current_status                    =  User::FIRST_STEP;
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

                if (!empty($invitedUserDetails)) {
                    User::where('id', $invitedUserDetails->id)->update(['is_active' => 1]);

                    // if($invitedUserDetails->user_role_id == getUserRoleId('customer')){

                    // Putting a entry into requests table
                    $obj     =  new PendingRequest;
                    $obj->to = $lastId;
                    $obj->from = $invitedUserDetails->parent_user_id;
                    $obj->status = config('constant.REQUEST_STATUS.ACCEPTED');
                    $obj->save();
                    // }
                    if (!empty(auth()->user()->id)) {
                        auth()->logout();
                    }
                    auth()->loginUsingId($lastId);
                    $userLocale = auth()->user()->preferred_locale;
                    app()->setLocale($userLocale);
                    Session::put('locale', $userLocale);
                    // For putting user permission Data In Session
                    $this->putUserPermissionDataIntoSession();

                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans("messages.logged_in_message");
                    $response["data"] = route(routeNamePrefix() . 'user.dashboard');
                    $response["isInvitedCustomer"] = true;
                    $response["http_code"] = 200;
                    return Response::json($response, 200);
                } else {
                    $dynamicValues =  $obj->name;
                    event(new CrmNotification(
                        $lastId,
                        'CRM_NOTIFICATION_43',
                        ['action_url' => 'user.company-details', 'type' => 'user', 'reference_id' => $lastId, 'values' => $dynamicValues]
                    ));

                    event(new CrmNotification(
                        $lastId,
                        'CRM_NOTIFICATION_15',
                        ['action_url' => 'user.dashboard', 'type' => 'user', 'reference_id' => $lastId, 'values' => $dynamicValues]
                    ));



                    $verificationUrl = route(routeNamePrefix() . 'user.verifyEmail', [
                        'token' => $obj->verification_token,
                    ]);
                    // Send verification email
                    Mail::to($obj->email)->send(new VerifyEmail($verificationUrl, $obj->name));
                    $response = array();
                    $response["status"] = "success";
                    $response["msg1"] = trans("messages.You_have_been_successfully_registered_msg1");
                    $response["msg2"] = trans("messages.You_have_been_successfully_registered_msg2_1") . " <a href='#' class='d-block font-weight-700 color-b-blue'>" . $obj->email . "</a> " . trans("messages.You_have_been_successfully_registered_msg2_2");
                    $response["data"] = route(routeNamePrefix() . 'user.login');
                    $response["isInvitedCustomer"] = false;
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
    }
    public function verifyEmail(Request $request, $token)
    {
        if (!empty($token)) {
            $user = User::where('verification_token', $token)->first();
            if (!empty($user)) {
                $user->markEmailAsVerified();
                $user->verification_token = NULL;
                $user->save();
                Session()->flash('flash_notice', trans('messages.email_verified_successfully'));
                return redirect()->route(routeNamePrefix() . 'user.login');
            } else {
                Session()->flash('flash_notice', trans('messages.Invalid_request'));
                return redirect()->route(routeNamePrefix() . 'user.login');
            }
        } else {
            Session()->flash('flash_notice', trans('messages.Invalid_request'));
            return redirect()->route(routeNamePrefix() . 'user.login');
        }
    }

    public function showLinkRequestForm(Request $request)
    {
        return View("modules.$this->model.request-password-reset");
    }

    public function reset(Request $request)
    {

        $formData   =   $request->all();

        if (!empty($formData)) {
            $validator = Validator::make(
                $request->all(),
                array(
                    'email' => 'required|exists:users',

                ),
                array(
                    "email.required" => trans("messages.The_email_field_is_required"),
                    "email.email" => trans("messages.The_email_field_must_be_a_valid_email_address"),
                    "email.exists" => trans("The email address is not registered in our system."),
                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {

                $existingResetToken = DB::table('password_reset_tokens')
                    ->where('email', $request->email)
                    ->first();

                if ($existingResetToken) {
                    // You may choose to update the existing token or notify the user
                    $response = array();
                    $response["status"] = "error";
                    $response["msg"] = trans("messages.password_reset_email_pending");
                    $response["data"] = (object) array();
                    $response["http_code"] = 500;
                    return Response::json($response, 500);
                }

                $token = Str::random(64);

                DB::table('password_reset_tokens')->insert([
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
                $userDetails = User::where('email', $request->email)->first();

                // Reset password email
                Mail::to($request->email)->send(new ResetPassword($token, $userDetails->name ?? ''));


                $response = array();
                $response["status"] = "success";
                $response["msg1"] = trans("messages.password_reset_msg1");
                $response["msg2"] = trans("messages.password_reset_msg2");
                $response["msg3"] = trans("messages.password_reset_msg3_1") . " <a href='#' class='d-block font-weight-700 color-b-blue'>" . $request->email . "</a> " . trans("messages.password_reset_msg3_2");
                $response["data"] = route(routeNamePrefix() . 'user.login');
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

        // return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetForm($token)
    {
        $resetToken = DB::table('password_reset_tokens')
            ->where('token', $token)
            ->first();
        $companyImage = '';
        $userId = User::where('email', $resetToken->email)->first()->id;
        $companyDetail = userCompanyDetail::where('user_id', $userId)->first();
        if (!empty($companyDetail)) {
            $companyImage = $companyDetail->company_image;
        }

        if (empty($resetToken)) {
            Session()->flash('flash_notice', trans('messages.Invalid_request'));
            return redirect()->route(routeNamePrefix() . 'user.login');
        } else if (!empty($resetToken) && now()->diffInHours($resetToken->created_at) > 8) {
            Session()->flash('flash_notice', trans('messages.your_link_expired'));
            DB::table('password_reset_tokens')->where('token', $token)->delete();

            return redirect()->route(routeNamePrefix() . 'user.login');
        } else {
            return view("modules.$this->model.password-reset", ['token' => $token, 'companyImage' => $companyImage]);
        }
    }

    public function sendResetLinkEmail(Request $request)
    {
        $formData   =   $request->all();
        if (!empty($formData)) {
            $validator = Validator::make(
                $request->all(),
                array(
                    //'password' => ['required', Password::min(8)],
                    'password' => ['required', 'min:8', 'max:16'],
                    'confirm_password' => 'required|required_with:password|min:8|same:password'

                ),
                array(
                    "password.required" => trans("messages.The_password_field_is_required"),
                    "password.min" => trans("messages.password_min_validation"),
                    "password.max" => trans("messages.Password_max_validation"),
                    "confirm_password.required" => trans("messages.The_confirm_password_field_is_required"),
                    "confirm_password.same" => trans("messages.confirm_password_same"),
                    "confirm_password.min" => trans("messages.confirm_password_min_validation"),
                )
            );

            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                $resetToken = DB::table('password_reset_tokens')
                    ->where('token', $request->token)
                    ->first();

                if (!$resetToken || now()->diffInHours($resetToken->created_at) > 8) {
                    $response = array();
                    $response["status"] = "error";
                    $response["msg"] = trans("messages.Invalid_request");
                    $response["data"] = (object) array();
                    $response["http_code"] = 500;
                    return Response::json($response, 500);
                } else {
                    $user = User::where('email', $resetToken->email)->first();

                    if ($user) {
                        // Update the user's password
                        $user->password = Hash::make($request->password);
                        $user->save();

                        DB::table('password_reset_tokens')
                            ->where('token', $request->token)
                            ->delete();

                        $response = array();
                        $response["status"] = "success";
                        $response["msg"] = trans("messages.password_changed_successfully");
                        $response["data"] = route(routeNamePrefix() . 'user.login');
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    } else {
                        $response = array();
                        $response["status"] = "error";
                        $response["msg"] = trans("User not found");
                        $response["data"] = (object) array();
                        $response["http_code"] = 500;
                        return Response::json($response, 500);
                    }
                }
            }
            // return redirect('/login')->with('message', 'Your password has been changed!');
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }

    public function logout()
    {
        Auth::logout();
        // Clear all session data
        session()->flush();
        Session()->flash('flash_notice', trans('messages.logged_out_message'));
        return Redirect()->to('/');
    }
}
