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
use App\Models\ComingSoonUser;
use App\Models\Newsletter;
use Illuminate\Validation\Rule;
use File,Str,Hash,Mail;
use App\Events\CrmNotification;
use App\Exports\NewsletterExport;
use Maatwebsite\Excel\Facades\Excel;
class NewsletterController extends Controller
{
    public $model        =    'newsletters';

    public $filterName        =    'newsletterListingFilterData';
    public $listRouteUrl;
    public function __construct(Request $request){
        parent::__construct();
        if(auth()->check()){

            $this->middleware(function ($request, $next) {  
            
                $this->listRouteUrl = route(routeNamePrefix().'newsletters.index');
                
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
        $newsletterInstance = new Newsletter();
        $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page"); 

        $results = $newsletterInstance->loadNewsletters(['perPage' => $recordsPerPage],$request->all(),[]);
        $listingType = 'newsletter-listing';
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
                        'newsletter_email' => ['required','email', 'unique:newsletters,email']
                    ),
                    array(

                       
                        "newsletter_email.required" => trans("messages.The_email_field_is_required"),
                        "newsletter_email.email" => trans("messages.The_email_field_must_be_a_valid_email_address"),
                        "newsletter_email.unique" => trans("messages.You_are_already_subscribed_to_newsletter"),
                        
                    )
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {
                   
                   DB::beginTransaction();
                   $obj   = New Newsletter;
                   $obj->email = $request->newsletter_email;
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
                    
                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans("messages.You_are_successfully_subscribed_to_newsletter");
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
    public function postComingSoon(Request $request){
   
            $formData = $request->all();
            if (!empty($formData)) {
                $validator = Validator::make(
                    $request->all(),
                    array(
                        'email' => ['required','email', 'unique:coming_soon_users,email']
                    ),
                    array(

                       
                        "email.required" => trans("messages.The_email_field_is_required"),
                        "email.email" => trans("messages.The_email_field_must_be_a_valid_email_address"),
                        "email.unique" => trans("You've already joined."),
                        
                    )
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {
                   
                   DB::beginTransaction();
                   $obj   = New ComingSoonUser;
                   $obj->email = $request->email;
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
                    
                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans("Thanks for joining Inmoconnect! Stay tuned for exciting updates!");
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



    public function exportNewsletters()
    {
        return Excel::download(new NewsletterExport, 'newsletters.xlsx');
    }



}

