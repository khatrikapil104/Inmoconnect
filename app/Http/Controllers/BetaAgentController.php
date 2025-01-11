<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use DB, Redirect,Response,Auth;
use App\Models\Role;
use App\Models\Property;
use App\Models\Category;
use App\Models\Situation;
use App\Models\Type;
use App\Models\Feature;
use App\Models\BetaAgent;
use Illuminate\Validation\Rule;
use File,Str,Hash,Mail;
use App\Events\CrmNotification;
use App\Exports\BetaAgentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\TicketConfirmedAdmin;
use App\Mail\TicketConfirmedUser;
class BetaAgentController extends Controller
{
    public $model        =    'beta_agents';

    public $filterName        =    'betaAgentListingFilterData';
    public $listRouteUrl;
    public function __construct(Request $request){
        parent::__construct();
        if(auth()->check()){

            $this->middleware(function ($request, $next) {  
               
                $this->listRouteUrl = route(routeNamePrefix().'beta_agents.index');
                return $next($request);
            });
        }
        View()->share('model', $this->model);
        View()->share('listRouteUrl', $this->listRouteUrl);
        View()->share('filterName', $this->filterName);
        $this->request = $request;
        
    }

    public function index(Request $request){
        $loggedInUserId = Auth::user()->id;
        $betaAgentInstance = new BetaAgent();
        $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page"); 

        $results = $betaAgentInstance->loadBetaAgents(['perPage' => $recordsPerPage],$request->all(),[]);
        $listingType = 'beta-agent-listing';
        if($request->ajax()){

            $tableData =  View("components.tables.custom-table", compact('results','listingType'))->render();
            $paginationData =  View("components.tables.pagination", compact('results','listingType'))->render();

            $response = array();
            $response["status"] = "success";
            $response["msg"] = "";
            $response['tableData'] = $tableData;
            $response['paginationData'] = $paginationData;
            $response["http_code"] = 200;
            return Response::json($response, 200);
           
        }else{
            $filterData = $this->getFilterData($this->filterName);
            return  View("modules.$this->model.index", compact('results','listingType','filterData'));
        }
    }

    public function store(Request $request){
            $formData = $request->all();
            if (!empty($formData)) {
                $validator = Validator::make(
                    $request->all(),
                    array(
                        'name' => 'required',
                        'email' => ['required','email', Rule::unique('beta_agents')],
                        'phone' => ['required', 'regex:/^\+\(\d{1,2}\) \(\d{3} \d{3} \d{3}\)$/'],
                        'role' => 'required',
                        'terms_conditions' => 'required',
                        'g-recaptcha-response' => 'required',

                    ),
                    array(

                        "first_name.required" => trans("messages.The_first_name_field_is_required"),
                        "last_name.required" => trans("messages.The_last_name_field_is_required"),
                        "phone.required" => trans("messages.The_mobile_number_field_is_required"),
                        "phone.regex" => trans("messages.Please_enter_a_valid_mobile_number"),
                        "email.required" => trans("messages.The_email_field_is_required"),
                        "terms_conditions.required" => trans("messages.landing_page.The_terms_conditions_field_is_required"),
                        "role.required" => trans("messages.landing_page.The_role_field_is_required"),
                        "email.email" => trans("messages.The_email_field_must_be_a_valid_email_address"),
                        "email.unique" => trans("messages.landing_page.You_have_already_registered_for_beta_launch"),
                        "g-recaptcha-response.required" => trans("messages.landing_page.Please_Complete_the_Recaptcha_to_proceed"),
                        
                    )
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {
                   
                   DB::beginTransaction();
                   $obj   = New BetaAgent;
                   $obj->name = $request->name;
                   $obj->email = $request->email;
                   $obj->phone = $request->phone;
                   $obj->company_name = !empty($request->company_name) ? $request->company_name : NULL ;
                   $obj->role = $request->role;
                  
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
                    $superadminEmail= config('Mail.Admin_Email');

                    //Send Email to User
                    $mailUser = new TicketConfirmedUser($obj->name);
                    // $mailUser->from($superadminEmail, 'Inmoconnect Admin');

                    Mail::to($obj->email)->send($mailUser);

                    //Send Email to Admin
                    $mailAdmin = new TicketConfirmedAdmin('Admin',$obj->name,$obj->email,$obj->phone,$obj->company_name,$obj->role);

                    // $mailAdmin->from($superadminEmail, 'Inmoconnect Admin');

                    Mail::to($superadminEmail)->send($mailAdmin);
                   
                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans("messages.landing_page.You_are_successfully_signed_up_for_InmoConnect_Beta_Launch");
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



    public function exportBetaAgents()
    {
        return Excel::download(new BetaAgentsExport, 'beta_agents.xlsx');
    }



}

