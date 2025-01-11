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
use App\Models\PropertyImage;
use Illuminate\Validation\Rule;
use File,Str,Hash;
use App\Events\CrmNotification;

class UserController extends Controller
{
    public $model        =    'users';

    public $filterName        =    'userListingFilterData';
    public $listRouteUrl;
    public function __construct(Request $request){
        parent::__construct();
        $this->middleware(function ($request, $next) {  
           
            $this->listRouteUrl = route(routeNamePrefix().'user.index');
            
            return $next($request);
        });
        View()->share('model', $this->model);
        View()->share('listRouteUrl', $this->listRouteUrl);
        View()->share('filterName', $this->filterName);
        $this->request = $request;
        
    }

    public function index(Request $request){
        $loggedInUserId = Auth::user()->id;
      
        $DB =  User::leftJoin('user_roles', 'users.user_role_id', '=', 'user_roles.id')->leftJoin('properties', function ($join) {
            $join->on('properties.owner_id', '=', 'users.id')
                 ->whereNull('properties.deleted_at');
        }) ;

        $searchData = !empty($request->{$this->filterName}) ? $request->{$this->filterName} : (session()->has($this->filterName) ? session()->get($this->filterName) : '') ;
        if (!empty($searchData)) {
           
            if ((!empty($searchData['search']))) {
                $DB->where(function ($query) use($searchData){
                    $query->Orwhere("users.name","LIKE","%".$searchData['search']."%");
                    $query->Orwhere("users.email","LIKE","%".$searchData['search']."%");
                    $query->Orwhere("users.phone","LIKE","%".$searchData['search']."%");
                });
            }
            if ((!empty($searchData['user_role_id']))) {
                $DB->where("users.user_role_id", $searchData['user_role_id']);
            }
          
           session()->put($this->filterName,$searchData);
        }

        if(!empty($searchData['sort_by']) && $searchData['sort_by'] == 'newest'){
            $DB->orderBy('users.created_at','desc');
        }else if(!empty($searchData['sort_by']) && $searchData['sort_by'] == 'oldest'){
            $DB->orderBy('users.created_at','asc');
        }else{
            $DB->orderBy('users.created_at','desc');  
        }

        $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page"); 
        $DB->whereNull('users.deleted_at')->whereNotNull('users.email_verified_at');
        $results = $DB->select('users.*','user_roles.name as user_role',DB::raw('COUNT(properties.id) as total_properties'))->groupBy('users.id')->paginate($recordsPerPage);
        $listingType = 'user-listing';
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
            return  View("modules.$this->model.index", compact('results','listingType','filterData','searchData'));
        }
    }

    public function create(Request $request)
    {
        return View("modules.$this->model.create");
    }

    public function store(Request $request){
        // $user = User::where('id',Auth::user()->id)->first();
            $formData = $request->all();
            if (!empty($formData)) {
                $validator = Validator::make(
                    $request->all(),
                    array(
                        'image'      => 'nullable|mimes:jpg,jpeg,png',
                        'first_name' => 'required',
                        'last_name' => 'required',
                        'phone' => ['required', 'regex:/^\+\(\d{1,2}\) \(\d{3} \d{3} \d{3}\)$/'],
                        // , 'regex:/\+\((\d{1,2})\) \((\d{4})\) \((\d{3})\) \((\d{3})\)/'
                        'email' => ['required','email', Rule::unique('users')]

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
                   $agentRoleId = Role::where('name','agent')->value('id');
                   DB::beginTransaction();
                   $obj   = New User;
                   $obj->name = $request->first_name." ".$request->last_name;
                   $obj->email = $request->email;
                   $obj->phone = $request->phone;
                   $obj->user_role_id = $agentRoleId;
                   $obj->email_verified_at = now();
                   $randomPassword = Str::random(8);
                   $obj->password = Hash::make($randomPassword);
                   if ($request->hasFile('image')) {
                        $extension = $request->file('image')->getClientOriginalExtension();
                        $originalName = $request->file('image')->getClientOriginalName();
                        $fileName = time().'-user.'.(Auth::user()->id).'.'. $extension;
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

                    // $message = config('messages.CRM_NOTIFICATION_1');
                    //Notification
                    $dynamicValues =  $obj->name;

                    event(new CrmNotification(auth()->user()->id,'CRM_NOTIFICATION_1',
                    ['action_url' => route(routeNamePrefix().'user.index'), 'type' => 'user', 'reference_id' => $lastId,'values' => $dynamicValues]));
                    
                    event(new CrmNotification(
                        $lastId,'CRM_NOTIFICATION_15',
                        ['action_url' => route(routeNamePrefix().'user.dashboard'), 'type' => 'user', 'reference_id' => auth()->user()->id,'values' => $dynamicValues]
                    ));

                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans("messages.User_added_successfully");
                    $response["data"] = route(routeNamePrefix().'user.index');
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

    public function edit(Request $request,$id){

        // $user = User::where('id',Auth::user()->id)->first();
        $user = User::findOrFail($id);

        return  View("modules.$this->model.edit", compact('user'));
    }

    public function update(Request $request,$id){
         if(!empty($request->id)){
        $formData = $request->all();
            if (!empty($formData)) {
            $validator = Validator::make(
                    $request->all(),
                    array(
                        'image'      => 'nullable|mimes:jpg,jpeg,png',
                        'first_name' => 'required',
                        'last_name' => 'required',
                        'phone' => ['required', 'regex:/^\+\(\d{1,2}\) \(\d{3} \d{3} \d{3}\)$/'],
                        // , 'regex:/\+\((\d{1,2})\) \((\d{4})\) \((\d{3})\) \((\d{3})\)/'
                        'email' => ['required','email', Rule::unique('users')->ignore($id)]

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
               
                    $agentRoleId = Role::where('name','agent')->value('id');
                    DB::beginTransaction();
                    $obj                                =  User::find($request->id);
                    $obj->name = $request->first_name." ".$request->last_name;
                    $obj->email = $request->email;
                    $obj->phone = $request->phone;
                    
                    if ($request->hasFile('image')) {
                        $extension = $request->file('image')->getClientOriginalExtension();
                        $originalName = $request->file('image')->getClientOriginalName();
                        $fileName = time().'-user.'.(Auth::user()->id).'.'. $extension;
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
                        
                        //Super Admin Notification
                    $dynamicValues =  $obj->name;
                    event(new CrmNotification(auth()->user()->id,'CRM_NOTIFICATION_2',
                    ['action_url' => route(routeNamePrefix().'user.index'), 'type' => 'user', 'reference_id' => $lastId, 'values' => $dynamicValues]));
                        // Notification User
                     event(new CrmNotification(
                        $lastId,'CRM_NOTIFICATION_4',
                        ['action_url' => route(routeNamePrefix().'user.dashboard'), 'type' => 'user', 'reference_id' => auth()->user()->id,'values' => $dynamicValues]
                    ));

                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans("messages.User_updated_successfully");
                    $response["data"] = route(routeNamePrefix().'user.index');
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
        }else{
          $response             =   array();
          $response["status"]       =   "error";
          $response["data"]     =   (object)array();
          $response["msg"]      =   trans("messages.The_user_id_field_is_required");
          $response["http_code"]    =   400;
          return response()->json($response,400);

        }    

    }

    public function destroy(Request $request,$id)
    {
        $user = User::findOrFail($id);  
        // Super Admin Notification
        $dynamicValues =  $user->name;
        event(new CrmNotification(auth()->user()->id,'CRM_NOTIFICATION_3',
        ['action_url' => route(routeNamePrefix().'user.index'), 'type' => 'user', 'reference_id' => $id,'values' => $dynamicValues])); 

            // User Notification
        event(new CrmNotification($id,'CRM_NOTIFICATION_22',
        ['action_url' => route(routeNamePrefix().'user.dashboard'), 'type' => 'user', 'reference_id' => auth()->user()->id,'values' => $dynamicValues]));   

        $user->delete();       
        return redirect()->route(routeNamePrefix().'user.index')->with('flash_notice', trans('messages.User_deleted_successfully'));
    }

    public function userProperties(Request $request,$id){
        $checkIfValidUser = User::where('id',$id)->first();
        if(!empty($checkIfValidUser)){
            $DB = Property::where('owner_id',$id)->leftJoin('users','users.id','properties.owner_id')->select('properties.*','users.name as agent_name');

            $sortBy = $request->input('sortBy') ? $request->input('sortBy') : 'properties.created_at';
            $order = $request->input('order') ? $request->input('order') : 'desc';
            $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page"); 
            $DB->whereNull('properties.deleted_at');
            $results = $DB->groupBy('properties.id')->orderBy($sortBy, $order)->paginate($recordsPerPage);
            $listingType = 'property-listing';
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
                return  View("modules.users.user_properties", compact('results','listingType','filterData','checkIfValidUser'));
            }
        }else{
            return redirect()->back()->with('error', trans('messages.Invalid_request'));
        }
        
    }

    public function userPropertiesCreate(Request $request,$userId,$reference = null){   
        $checkIfValidUser = User::where('id',$userId)->first();
        if(!empty($checkIfValidUser)){
            $property = Property::pluck('name', 'id');
            $categories = Category::pluck('name', 'id');
            $situations = Situation::pluck('name', 'id'); 
            $types      = Type::pluck('name', 'id');
            $features   = Feature::select('name','id','icon')->get()->toArray();
            $user = User::where('id',Auth::user()->id)->first();

            $agentsDropdown = User::whereHas('role', function ($query) {
                $query->where('name', 'agent');
            })->whereNotNull('email_verified_at')->where('is_active',1)->whereNull('deleted_at')->pluck('name', 'id');
            if(!empty($reference)){
                if((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'sub-developer' || auth()->user()->role->name == 'developer') && $property->owner_id != auth()->user()->id){
                    return Redirect()->route(routeNamePrefix().'user.dashboard')->with('error',trans('messages.popup-message.You_are_not_authorized_to_access_this_page'));
                }
                $property = Property::where('reference',$reference)->whereNull('deleted_at')->first();
                if(!empty($property)){
                    $propertyImages = PropertyImage::where('property_id',$property->id)->orderBy('created_at','asc')->get();
                    return view("modules.properties.create",compact('property','categories','situations','types','user','features','propertyImages','agentsDropdown','checkIfValidUser'));
                }else{
                    Session()->flash('error', trans('messages.Invalid_request'));
                    return redirect()->back();
                }
            }else{
                $property = [];
                return view("modules.properties.create",compact('categories','situations','types','user','features','property','agentsDropdown','property','checkIfValidUser'));
            }
        }else{
            return redirect()->back()->with('error', trans('messages.Invalid_request'));
        }
        

    }


}

