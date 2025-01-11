<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Property;
use App\Events\CrmNotification;
use App\Models\SocialUser;
use App\Models\PendingRequest;
use App\Models\Type;
use App\Models\UserCertificate;
use App\Models\UserProfessionalInformation;
use App\Models\Category;
use App\Models\Situation;
use App\Models\Feature;
use App\Models\userCompanyDetail;
use App\Models\UserPropertyFeature;
use App\Models\UserPropertyPreference;
use App\Models\Group;
use App\Models\GroupParticipants;
use DB, Redirect, Response,File,Auth,Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Laravel\Socialite\Facades\Socialite;

class ProfileSetupController extends Controller
{
    public $model = 'profile-setup';
    public function __construct(Request $request)
    {
        parent::__construct();
        View()->share('model', $this->model);
        $this->request = $request;

    }
    public function profileSetup(Request $request)
    {
        $filePath = public_path('assets/data/countries_states.json');
        $countries = [];
        if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);
            $data = json_decode($jsonContent, true);
            if(!empty($data['countries'])){
                foreach($data['countries'] as $countryVal){
                    $countries[$countryVal['text']] = $countryVal['text'];
                }
            }
        }

        if(auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent'){
            $qualification_type = User::qualification_type;
            $total_properties_in_portfolio = userCompanyDetail::total_properties_in_portfolio;
            $total_years_experiance = userCompanyDetail::total_years_experiance;
            $number_of_current_customers = userCompanyDetail::number_of_current_customers;
            $avg_number_properties_managed = userCompanyDetail::avg_number_properties_managed;
            $number_of_sub_agents = userCompanyDetail::number_of_sub_agents;
            $user = User::where('users.id',auth()->user()->id);
            if(auth()->user()->role->name == 'agent'){

                $user->leftJoin('user_company_details','user_company_details.user_id','users.id');
            }else{
                $user->leftJoin('user_company_details','user_company_details.user_id','users.parent_user_id');
            }
            
            $user = $user->select('users.*','user_company_details.company_name','user_company_details.company_email','user_company_details.company_mobile','user_company_details.company_tax_number','user_company_details.company_website','user_company_details.company_address','user_company_details.company_city','user_company_details.company_sate','user_company_details.company_country','user_company_details.company_zipcode','user_company_details.company_sub_agent','user_company_details.company_image','user_company_details.professional_title','user_company_details.property_types_specialized','user_company_details.property_specialization','user_company_details.total_properties_in_portfolio','user_company_details.total_years_experiance','user_company_details.number_of_current_customers','user_company_details.avg_number_properties_managed','user_company_details.primary_service_area')->first();
            $companyDetails = auth()->user()->companyDetails;

            $certificateData = UserCertificate::where('user_id',auth()->user()->id)->get();
            $userGovCertificate = User::find(auth()->user()->id);
            $types = Type::pluck('name', 'id')->toArray();
            return View("modules.$this->model.agent-setup",compact('countries','certificateData','userGovCertificate','user','qualification_type','total_properties_in_portfolio','total_years_experiance','number_of_current_customers','avg_number_properties_managed','types','number_of_sub_agents','companyDetails')); 
        }else if(auth()->user()->role->name == 'customer'){
            $user = User::where('users.id',auth()->user()->id)->leftJoin('user_property_preferences','user_property_preferences.user_id','users.id')->select('users.*','user_property_preferences.category_id','user_property_preferences.type_id','user_property_preferences.situation_id','user_property_preferences.preferred_location','user_property_preferences.max_size','user_property_preferences.min_size','user_property_preferences.min_price','user_property_preferences.max_price')->first();
            $categories = Category::pluck('name', 'id')->toArray();
            $situations = Situation::pluck('name', 'id')->toArray();
            $types = Type::pluck('name', 'id')->toArray();
            $features = Feature::with('subFeature')->select('name', 'id', 'icon')->get()->toArray();
            $maxPriceAndSize = Property::whereNull('deleted_at')->select(DB::raw('max(price) as max_price'),DB::raw('max(size) as max_size'))->first();
            return View("modules.$this->model.".auth()->user()->role->name."-setup",compact('countries','user','types','situations','categories','maxPriceAndSize','features')); 
        }
        elseif(auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer' ){
            $qualification_type = User::qualification_type;
            $total_properties_in_portfolio = userCompanyDetail::total_properties_in_portfolio;
            $total_years_experiance = userCompanyDetail::total_years_experiance;
            $number_of_current_customers = userCompanyDetail::number_of_current_customers;
            $avg_number_properties_managed = userCompanyDetail::avg_number_properties_managed;
            $number_of_sub_agents = userCompanyDetail::number_of_sub_agents;
            $user = User::where('users.id',auth()->user()->id);
            if(auth()->user()->role->name == 'developer'){

                $user->leftJoin('user_company_details','user_company_details.user_id','users.id');
            }else{
                $user->leftJoin('user_company_details','user_company_details.user_id','users.parent_user_id');
            }
            $user = $user->select('users.*','user_company_details.company_name','user_company_details.company_email','user_company_details.cif_nie','user_company_details.company_mobile','user_company_details.company_tax_number','user_company_details.company_website','user_company_details.company_address','user_company_details.company_city','user_company_details.company_sate','user_company_details.company_country','user_company_details.company_zipcode','user_company_details.company_sub_agent','user_company_details.company_image','user_company_details.professional_title','user_company_details.property_types_specialized','user_company_details.property_specialization','user_company_details.total_properties_in_portfolio','user_company_details.total_years_experiance','user_company_details.number_of_current_customers','user_company_details.avg_number_properties_managed','user_company_details.primary_service_area')->first();
            $companyDetails = auth()->user()->companyDetails;

            $certificateData = UserCertificate::where('user_id',auth()->user()->id)->get();
            $userGovCertificate = User::find(auth()->user()->id);
            $types = Type::pluck('name', 'id')->toArray();
            return View("modules.$this->model.developer-setup",compact('countries','certificateData','userGovCertificate','user','qualification_type','total_properties_in_portfolio','total_years_experiance','number_of_current_customers','avg_number_properties_managed','types','number_of_sub_agents','companyDetails')); 
        }
        
        
    }

    public function storeProfileSetupData(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();
        if ($request->isMethod('POST')) {
            $formData = $request->all();
            $validationArr = [];
            if(!empty($request->current_status)){
                if((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent') && $request->current_status == 'second_step'){
                    $validationArr = [
                        'image'      => 'nullable|mimes:jpg,jpeg,png',
                        'first_name' => 'required',
                        'last_name' => 'required',
                        // 'email' => ['required','email', Rule::unique('users')->ignore($user->id)],
                        'phone' =>  ['required', 'regex:/^\+\(\d{1,2}\) \(\d{3} \d{3} \d{3}\)$/'],
                        // , 'regex:/\+\((\d{1,2})\) \((\d{4})\) \((\d{3})\) \((\d{3})\)/'
                        //'date_of_birth' => 'required',
                        'gender' => 'required',
                        'address' => 'required',
                        'city' => 'required',
                        'state' => 'required',
                        'country' => 'required',
                        'zipcode' => 'required|numeric',
                        'languages_spoken' => 'required',
                        //'qualification_type' => 'required',
                        //'field_of_study' => 'required',
                    ];
                }else if(auth()->user()->role->name == 'agent' && $request->current_status == 'third_step'){
                    // dd($formData);
                    $validationArr = [
                        'company_name' => 'required',
                        'company_image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048|dimensions:width=120,height=120',
                        'company_email' => ['required',Rule::unique('user_company_details', 'company_email')->ignore(Auth::user()->id, 'user_id')],
                        //'company_mobile' => 'required',
                        //'company_tax_number' => 'required',
                        //'company_website' => 'required',
                        //'company_address' => 'required',
                        //'company_city' => 'required',
                        //'company_state' => 'required',
                        //'company_country' => 'required',
                        //'company_zipcode' => 'required',
                        'primary_service_area' => 'required',
                        //'professional_title' => 'required',
                        //'property_types_specialized' => 'required',
                        // 'property_specialization' => 'required',
                        //'total_properties_in_portfolio' => 'required',
                        //'total_years_experiance' => 'required',
                        // 'number_of_current_customers' => 'required',
                        //'avg_number_properties_managed' => 'required',
                        //'num_of_sub_agents' => 'required',
                        
                    ];
                }else if(auth()->user()->role->name == 'customer' && $request->current_status == 'second_step'){
                    $validationArr = [
                        'image'      => 'nullable|mimes:jpg,jpeg,png',
                        'first_name' => 'required',
                        'last_name' => 'required',
                        // 'email' => ['required','email', Rule::unique('users')->ignore($user->id)],
                        'phone' => ['required', 'regex:/^\+\(\d{1,2}\) \(\d{3} \d{3} \d{3}\)$/'],
                        // , 'regex:/\+\((\d{1,2})\) \((\d{4})\) \((\d{3})\) \((\d{3})\)/'
                        'date_of_birth' => 'required',
                        'gender' => 'required',
                        'address' => 'required',
                        'city' => 'required',
                        'state' => 'required',
                        'country' => 'required',
                        'zipcode' => 'required|numeric',
                        'languages_spoken' => 'required',
                        
                    ];
                }else if(auth()->user()->role->name == 'customer' && $request->current_status == 'third_step'){
                    $validationArr = [
                        // 'category_id' => 'required',
                        'type_id' => 'required',
                        'situation_id' => 'required',
                        'preferred_location' => 'required'
                        
                    ];
                }
                if((auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer') && $request->current_status == 'second_step'){
                    $validationArr = [
                        'image'      => 'nullable|mimes:jpg,jpeg,png',
                        'first_name' => 'required',
                        'last_name' => 'required',
                        // 'email' => ['required','email', Rule::unique('users')->ignore($user->id)],
                        'phone' =>  ['required', 'regex:/^\+\(\d{1,2}\) \(\d{3} \d{3} \d{3}\)$/'],
                        // , 'regex:/\+\((\d{1,2})\) \((\d{4})\) \((\d{3})\) \((\d{3})\)/'
                        //'date_of_birth' => 'required',
                        'gender' => 'required',
                        'address' => 'required',
                        'city' => 'required',
                        'state' => 'required',
                        'country' => 'required',
                        'zipcode' => 'required|numeric',
                        'languages_spoken' => 'required',
                        //'qualification_type' => 'required',
                        //'field_of_study' => 'required',
                    ];
                }else if(auth()->user()->role->name == 'developer' && $request->current_status == 'third_step'){
                    $validationArr = [
                        'company_name' => 'required',
                        'company_image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048|dimensions:width=120,height=120',
                        'company_email' => ['required',Rule::unique('user_company_details', 'company_email')->ignore(Auth::user()->id, 'user_id')],
                        //'cif_nie' => 'required',
                        //'company_mobile' => 'required',
                        //'company_website' => 'required',
                        //'company_address' => 'required',
                        //'company_city' => 'required',
                        //'company_state' => 'required',
                        //'company_country' => 'required',
                        //'company_zipcode' => 'required',
                        'primary_service_area' => 'required',
                        //'professional_title' => 'required',
                        //'property_types_specialized' => 'required',
                        // 'property_specialization' => 'required',
                        //'total_properties_in_portfolio' => 'required',
                        //'total_years_experiance' => 'required',
                        // 'number_of_current_customers' => 'required',
                        //'avg_number_properties_managed' => 'required',
                        
                    ];
                }
                
            }else{
                $response = array();
                $response["status"] = "error";
                $response["msg"] = trans("messages.Invalid_request");
                $response["data"] = (object) array();
                $response["http_code"] = 500;
                return Response::json($response, 500);
            }
            if (!empty($formData)) {
                $validator = Validator::make(
                    $request->all(),
                    $validationArr ,
                    array(
                        "images.mimes" => trans("messages.The_image_field_must_be_a_file_of_type_jpg_jpeg_png"),
                        "first_name.required" => trans("messages.The_first_name_field_is_required"),
                        "last_name.required" => trans("messages.The_last_name_field_is_required"),
                        "phone.required" => trans("messages.The_mobile_number_field_is_required"),
                        "phone.regex" => trans("messages.Please_enter_a_valid_mobile_number"),
                        "phone.numeric" => trans("messages.phone_number_must_be_a_numeric"),
                        "email.required" => trans("messages.The_email_field_is_required"),
                        "email.email" => trans("messages.The_email_field_must_be_a_valid_email_address"),
                        "email.unique" => trans("messages.The_email_has_already_been_taken"),
                        //"date_of_birth" => trans("messages.profile-setup.date_of_birth_required"),
                        "gender.required" => trans("messages.profile-setup.gender_required"),
                        "address.required" => trans("messages.profile-setup.address_required"),
                        "city.required" => trans("messages.profile-setup.city_required"),
                        "state.required" => trans("messages.profile-setup.state_reuired"),
                        "country.required" => trans("messages.profile-setup.country_required"),
                        "zipcode.required" => trans("messages.profile-setup.zipcode_required"),
                        "zipcode.numeric" => trans("messages.zipcode_must_be_a_numeric"),
                        "languages_spoken.required" => trans("messages.profile-setup.languages_spoken_required"),
                        //"qualification_type.required" => trans("messages.profile-setup.qualification_required"),
                        //"field_of_study.required" => trans("messages.profile-setup.field_of_study_major_required"),
                        //2nd step
                        "company_name.required" => trans('messages.profile-setup.company_name_required'),
                        // "company_tax_number.required" => trans('messages.profile-setup.company_tax_number_required'),
                        // "company_website.required" => trans('messages.profile-setup.company_website_required'),
                        // "company_address.required" => trans('messages.profile-setup.company_address_required'),
                        // "company_city.required" => trans('messages.profile-setup.company_city_required'),
                        // "company_state.required" => trans('messages.profile-setup.company_state_required'),
                        // "company_country.required" => trans('messages.profile-setup.company_country_required'),
                        // "company_zipcode.required" => trans('messages.profile-setup.company_zipcode_required'),
                        //'professional_title.required' => trans('messages.profile-setup.professional_title_required'),
                        'primary_service_area' => trans('messages.profile-setup.primary_services_required'),
                        //'property_types_specialized' => trans('messages.profile-setup.property_type_specialize_required'),
                        'property_specialization' => trans('messages.profile-setup.property_specialization_required'),
                        //'total_properties_in_portfolio' =>trans('messages.profile-setup.total_property_required'),
                        //'total_years_experiance' => trans('messages.profile-setup.total_years_required'),
                        //'number_of_current_customers' => trans('messages.profile-setup.current_cust_required'),
                        //'avg_number_properties_managed' => trans('messages.profile-setup.property_managed_required'),
                        //'num_of_sub_agents' => trans('messages.the_number_of_sub-agents_field_is_required'),
                        //customer profile-setup page 2nd
                        // 'category_id.required' => trans('messages.profile-setup.category_field_required'),
                        'type_id.required' => trans('messages.profile-setup.type_field_required'),
                        'situation_id.required' => trans('messages.profile-setup.situation_field_required'),
                        'preferred_location.required' => trans('messages.profile-setup.preferred_location_field_required')
                        

                    )
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {
                    // dd($request->all());
                    if((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent') && $request->current_status == 'second_step'){
                        $checkIfAnyCertificatesUploadedYet = UserCertificate::where('user_id',Auth::user()->id)->count();
                        $checkIfAnyGovtCertificatesUploadedYet = User::find(Auth::user()->id)->government_certification;
                        // if($checkIfAnyCertificatesUploadedYet == 0){
                        //     $validator->errors()->add('files', trans("messages.profile-setup.professional_certifications_required"));
                        //     $response = $this->change_error_msg_layout($validator->errors()->getMessages());    
                        //     return Response::json($response, 200);
                        // }
                        // if($checkIfAnyGovtCertificatesUploadedYet == null){
                        //     $validator->errors()->add('gov_files', trans("messages.profile-setup.gov_certifications_required"));
                        //     $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                        //     return Response::json($response, 200);
                        // }
                        DB::beginTransaction();
                        $obj   = User::find(Auth::user()->id);
                        $obj->name = $request->first_name." ".$request->last_name;
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
                   
                        $obj->date_of_birth = $request->date_of_birth;
                        $obj->gender = $request->gender;
                        $obj->address = $request->address;
                        $obj->city = $request->city;
                        $obj->state = $request->state;
                        $obj->country = $request->country;
                        $obj->zipcode = $request->zipcode;
                        $obj->languages_spoken =  is_array($request->languages_spoken) ? implode(',',$request->languages_spoken) : Null;
                        $obj->qualification_type = $request->qualification_type;
                        $obj->field_of_study = $request->field_of_study;
                        $obj->current_status = $request->current_status;
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
                        $response["msg"] = "";
                        $response["data"] = (object) array();
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    }else if((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent') && $request->current_status == 'third_step'){
                        if(auth()->user()->role->name == 'agent'){


                            DB::beginTransaction();
                            $checkUserProfessionalInformation = userCompanyDetail::where('user_id',Auth::user()->id)->first();
                            if(!empty($checkUserProfessionalInformation)){

                                $obj   = userCompanyDetail::find($checkUserProfessionalInformation->id);
                            }else{
                                $obj   = new userCompanyDetail;
                            }
                            $obj->user_id = Auth::user()->id;
                            $obj->company_name = $request->company_name;
                            $obj->company_email = $request->company_email;
                            $obj->company_mobile = $request->company_mobile;
                            $obj->company_tax_number = $request->company_tax_number;
                            $obj->company_website = $request->company_website;
                            $obj->company_address = $request->company_address;
                            $obj->company_city = $request->company_city;
                            $obj->company_sate = $request->company_state;
                            $obj->company_country = $request->company_country;
                            $obj->company_zipcode = $request->company_zipcode;
                            $obj->company_sub_agent = $request->num_of_sub_agents;
                            $obj->professional_title = $request->professional_title;
                            $obj->primary_service_area = is_array($request->primary_service_area) ? implode(',',$request->primary_service_area) : Null;
                            $obj->property_types_specialized = is_array($request->property_types_specialized) ? implode(',',$request->property_types_specialized) : Null;
                             $obj->property_specialization = $request->property_specialization;
                            $obj->total_properties_in_portfolio = $request->total_properties_in_portfolio;
                            $obj->total_years_experiance = $request->total_years_experiance;
                             $obj->number_of_current_customers = $request->number_of_current_customers;
                            $obj->avg_number_properties_managed = $request->avg_number_properties_managed;
                            // dd($request->file('company_image'));
                            if ($request->hasFile('company_image')) {
                                $extension = $request->file('company_image')->getClientOriginalExtension();
                                $originalName = $request->file('company_image')->getClientOriginalName();
                                $fileName = time().'-company_image.'.(Auth::user()->id).'.'. $extension;
                                $folderPath = Config('constant.COMPANY_IMAGE_ROOT_PATH');
                                if (!File::exists($folderPath)) {
                                    File::makeDirectory($folderPath, $mode = 0777, true);
                                }
                                if ($request->file('company_image')->move($folderPath, $fileName)) {
                                    $obj->company_image = $fileName;
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
                        }
                        User::where('id',auth()->user()->id)->update(['current_status' => $request->current_status]);
                        $user = User::where('users.id',auth()->user()->id);
                        if(auth()->user()->role->name == 'agent'){

                            $user->leftJoin('user_company_details','user_company_details.user_id','users.id');
                        }else{
                            $user->leftJoin('user_company_details','user_company_details.user_id','users.parent_user_id');
                        }
                        $user = $user->select('users.*','user_company_details.company_name','user_company_details.company_email','user_company_details.company_mobile','user_company_details.company_tax_number','user_company_details.company_website','user_company_details.company_address','user_company_details.company_city','user_company_details.company_sate','user_company_details.company_country','user_company_details.company_zipcode','user_company_details.company_sub_agent','user_company_details.company_image','user_company_details.professional_title','user_company_details.property_types_specialized','user_company_details.property_specialization','user_company_details.total_properties_in_portfolio','user_company_details.total_years_experiance','user_company_details.number_of_current_customers','user_company_details.avg_number_properties_managed','user_company_details.primary_service_area')->first();
                        $companyDetails = auth()->user()->companyDetails;

                        $certificateData = UserCertificate::where('user_id',auth()->user()->id)->get();
                        $total_properties_in_portfolio = userCompanyDetail::total_properties_in_portfolio;
                        $total_years_experiance = userCompanyDetail::total_years_experiance;
                        $number_of_current_customers = userCompanyDetail::number_of_current_customers;
                        $avg_number_properties_managed = userCompanyDetail::avg_number_properties_managed;
                        $number_of_sub_agents = userCompanyDetail::number_of_sub_agents;
                        $typeIdsArray = !empty($user->property_types_specialized) ? explode(',', $user->property_types_specialized) : [];
                        $typeData = Type::whereIn('id', $typeIdsArray)->pluck('name');
                        $user->typeNames = implode(', ', $typeData->toArray());
                        $htmlData = View("modules.profile-setup.includes.agent-profile-overview",['user' => $user, 'certificateData' => $certificateData, 'total_properties_in_portfolio' => $total_properties_in_portfolio, 'total_years_experiance' => $total_years_experiance, 'number_of_current_customers' => $number_of_current_customers, 'number_of_sub_agents' => $number_of_sub_agents, 'avg_number_properties_managed' => $avg_number_properties_managed,
                        'companyDetails'=> $companyDetails])->render();
                        $response = array();
                        $response["status"] = "success";
                        $response["msg"] = "";
                        $response["data"] = $htmlData;
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    }else if((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent') && $request->current_status == 'last_step'){
                        User::where('id',auth()->user()->id)->update(['current_status' => 'completed','is_active' =>  1]);

                            //Create a Group and add a entry into group_participants table
                            $obj   = new Group;
                            $obj->created_by = auth()->user()->id;
                            $obj->name = auth()->user()->companyDetails->company_name ?? Null;
                            $obj->group_number = getGroupNumber();
                            $obj->is_company_group = 1;
                            $obj->company_id = auth()->user()->companyDetails->id ?? 0;
                            $obj->save();
                            $createdGroupId = $obj->id;
                            if (!empty($createdGroupId)) {
                                
                                //Adding a entry in group participants
                                $obj2   =  new GroupParticipants;
                                $obj2->user_id = auth()->user()->id;
                                $obj2->group_id = $createdGroupId;
                                $obj2->is_admin = 1;
                                $obj2->save();
                            }
                        
                        $this->saveTeamRecentActivity((['company_id' => auth()->user()->companyDetails->id , 'activity' => 'CRM_TEAM_RECENT_ACTIVITY_13', 'type' => 'agent', 'values' => [auth()->user()->name,auth()->user()->companyDetails->company_name]]));

                        $response = array();
                        $response["status"] = "success";
                        $response["msg"] = trans("Your profile has been set up successfully. Enjoy the seamless experience ahead!");
                        $response["data"] = route(routeNamePrefix().'user.dashboard');
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    }else if(auth()->user()->role->name == 'customer' && $request->current_status == 'second_step'){
                        DB::beginTransaction();
                        $obj   = User::find(Auth::user()->id);
                        $obj->name = $request->first_name." ".$request->last_name;
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
                        $obj->date_of_birth = $request->date_of_birth;
                        $obj->gender = $request->gender;
                        $obj->address = $request->address;
                        $obj->city = $request->city;
                        $obj->state = $request->state;
                        $obj->country = $request->country;
                        $obj->zipcode = $request->zipcode;
                        $obj->languages_spoken =  is_array($request->languages_spoken) ? implode(',',$request->languages_spoken) : Null;
                        $obj->current_status = $request->current_status;
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
                        $response["msg"] = "";
                        $response["data"] = (object) array();
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    }else if(auth()->user()->role->name == 'customer' && $request->current_status == 'third_step'){
                        DB::beginTransaction();
                        $checkUserPropertyPreference = UserPropertyPreference::where('user_id',Auth::user()->id)->first();
                        if(!empty($checkUserPropertyPreference)){

                            $obj   = UserPropertyPreference::find($checkUserPropertyPreference->id);
                        }else{
                            $obj   = new UserPropertyPreference;
                        }
                        $obj->user_id = Auth::user()->id;
                        // $obj->category_id = $request->category_id;
                        $obj->type_id = is_array($request->type_id) ? implode(',',$request->type_id) : Null;;
                        $obj->situation_id = is_array($request->situation_id) ? implode(',',$request->situation_id) : Null;;
                        $obj->preferred_location = $request->preferred_location ?? Null;
                        $obj->max_size = str_replace(' m²', '', str_replace(',', '', $request->max_size)) ?? 0;
                        $obj->min_size = str_replace(' m²', '', str_replace(',', '', $request->min_size)) ?? 0;
                        $obj->min_price = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $request->min_price)) ?? 0;
                        $obj->max_price = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $request->max_price)) ?? 0;
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
                        
                        if (!empty($request->feature_id) && !empty($request->subFetureId)) {
                            $subFeatureArray = array_keys($request->subFetureId);
                            $subFeatureId = $request->subFetureId;
                            foreach ($request->feature_id as  $featureKey =>  $featureVal) {
                                if (!empty($featureVal)) {
                                    if (in_array($featureVal, $subFeatureArray)) {
                                        $subFetureIdData = explode(',', $subFeatureId[$featureVal]);
                                        if (!empty($subFetureIdData)) {
                                            foreach ($subFetureIdData as $subFeatureVal) {
                                                $checkFeatureVal = UserPropertyFeature::where('user_id', auth()->user()->id)->where('feature_id', $featureVal)->where('sub_feature_id', $subFeatureVal)->first();
                                                if (!empty($checkFeatureVal)) {
                                                    $featureObj = $checkFeatureVal;
                                                } else {
                                                    $featureObj = new UserPropertyFeature;
                                                }
                                                $featureObj->user_id = auth()->user()->id;
                                                $featureObj->feature_id = $featureVal;
                                                $featureObj->sub_feature_id = $subFeatureVal;
                                                $featureObj->save();
                                                $lastFeatureId=$featureObj->id;
                                                if (empty($lastFeatureId)) {
                                                    DB::rollback();
                                                    $response = array();
                                                    $response["status"] = "error";
                                                    $response["msg"] = trans("messages.Something_went_wrong");
                                                    $response["data"] = (object) array();
                                                    $response["http_code"] = 500;
                                                    return Response::json($response, 500);
                                                }
                                            }
                                            UserPropertyFeature::whereNotIn('sub_feature_id', !empty($subFetureIdData) ? $subFetureIdData : [])->where('feature_id', $featureVal)->delete();
                                        }
                                    }
                                }
                            }
                        }
    
    
                        UserPropertyFeature::whereNotIn('feature_id', !empty($request->feature_id) ? $request->feature_id : [])->where('user_id', auth()->user()->id)->delete();
    
                        UserPropertyFeature::whereNotIn('feature_id', !empty($request->feature_id) ? $request->feature_id : [])->where('user_id', $lastId)->delete();


                        DB::commit();
                        User::where('id',auth()->user()->id)->update(['current_status' => $request->current_status]);
                        $user = User::where('users.id',auth()->user()->id)->leftJoin('user_property_preferences','user_property_preferences.user_id','users.id')->leftJoin('categories','user_property_preferences.category_id','categories.id')->select('users.*','user_property_preferences.category_id','user_property_preferences.type_id','user_property_preferences.situation_id','user_property_preferences.preferred_location','user_property_preferences.max_size','user_property_preferences.min_size','user_property_preferences.min_price','user_property_preferences.max_price','categories.name as category_name')->first();
                        
                       
                        $typeIdsArray = !empty($user->type_id) ? explode(',', $user->type_id) : [];
                        $typeData = Type::whereIn('id', $typeIdsArray)->pluck('name');
                        $user->typeNames = implode(', ', $typeData->toArray());

                        $situationIdsArray = !empty($user->situation_id) ? explode(',', $user->situation_id) : [];
                        $situationData = Situation::whereIn('id', $situationIdsArray)->pluck('name');
                        $user->situationNames = implode(', ', $situationData->toArray());

                        $situationIdsArray = !empty($user->situation_id) ? explode(',', $user->situation_id) : [];
                        $situationData = Situation::whereIn('id', $situationIdsArray)->pluck('name');
                        $user->situationNames = implode(', ', $situationData->toArray());

                        $featureIdsArray = UserPropertyFeature::where('user_id',auth()->user()->id)->pluck('feature_id')->toArray();
                      
                        $featureData = Feature::whereIn('id', $featureIdsArray)->pluck('name');
                        $user->featureNames = implode(', ', $featureData->toArray());
                        
                        $htmlData = View("modules.profile-setup.includes.customer-profile-overview",['user' => $user])->render();
                        $response = array();
                        $response["status"] = "success";
                        $response["msg"] = "";
                        $response["data"] = $htmlData;
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    }else if(auth()->user()->role->name == 'customer' && $request->current_status == 'last_step'){
                        User::where('id',auth()->user()->id)->update(['current_status' => 'completed']);
                        $response = array();
                        $response["status"] = "success";
                        $response["msg"] = trans("Your profile has been set up successfully. Enjoy the seamless experience ahead!");
                        $response["data"] = route(routeNamePrefix().'user.dashboard');
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    }elseif((auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer') && $request->current_status == 'second_step'){
                        $checkIfAnyCertificatesUploadedYet = UserCertificate::where('user_id',Auth::user()->id)->count();
                        $checkIfAnyGovtCertificatesUploadedYet = User::find(Auth::user()->id)->government_certification;
                        // if($checkIfAnyCertificatesUploadedYet == 0){
                        //     $validator->errors()->add('files', trans("messages.profile-setup.professional_certifications_required"));
                        //     $response = $this->change_error_msg_layout($validator->errors()->getMessages());    
                        //     return Response::json($response, 200);
                        // }
                        // if($checkIfAnyGovtCertificatesUploadedYet == null){
                        //     $validator->errors()->add('gov_files', trans("messages.profile-setup.gov_certifications_required"));
                        //     $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                        //     return Response::json($response, 200);
                        // }
                        DB::beginTransaction();
                        $obj   = User::find(Auth::user()->id);
                        $obj->name = $request->first_name." ".$request->last_name;
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
                   
                        $obj->date_of_birth = $request->date_of_birth;
                        $obj->gender = $request->gender;
                        $obj->address = $request->address;
                        $obj->city = $request->city;
                        $obj->state = $request->state;
                        $obj->country = $request->country;
                        $obj->zipcode = $request->zipcode;
                        $obj->languages_spoken =  is_array($request->languages_spoken) ? implode(',',$request->languages_spoken) : Null;
                        $obj->qualification_type = $request->qualification_type;
                        $obj->field_of_study = $request->field_of_study;
                        $obj->current_status = $request->current_status;
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
                        $response["msg"] = "";
                        $response["data"] = (object) array();
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    }else if((auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer') && $request->current_status == 'third_step'){
                        if(auth()->user()->role->name == 'developer'){
                            DB::beginTransaction();
                            $checkUserProfessionalInformation = userCompanyDetail::where('user_id',Auth::user()->id)->first();
                            if(!empty($checkUserProfessionalInformation)){

                                $obj   = userCompanyDetail::find($checkUserProfessionalInformation->id);
                            }else{
                                $obj   = new userCompanyDetail;
                            }
                            // dd($request->all());
                            $obj->user_id = Auth::user()->id;
                            $obj->company_name = $request->company_name;
                            $obj->company_email = $request->company_email;
                            $obj->company_mobile = $request->company_mobile;
                            $obj->company_tax_number = $request->company_tax_number;
                            $obj->company_website = $request->company_website;
                            $obj->company_address = $request->company_address;
                            $obj->company_city = $request->company_city;
                            $obj->company_sate = $request->company_state;
                            $obj->company_country = $request->company_country;
                            $obj->company_zipcode = $request->company_zipcode;
                            $obj->company_sub_agent = $request->num_of_sub_agents;
                            $obj->professional_title = $request->professional_title;
                            $obj->primary_service_area = is_array($request->primary_service_area) ? implode(',',$request->primary_service_area) : Null;
                            $obj->property_types_specialized = is_array($request->property_types_specialized) ? implode(',',$request->property_types_specialized) : Null;
                            // dd($obj->property_types_specialized);
                            // $obj->property_specialization = $request->property_specialization;
                            $obj->total_properties_in_portfolio = $request->total_properties_in_portfolio;
                            // dd($obj->total_properties_in_portfolio);
                            $obj->total_years_experiance = $request->total_years_experiance;
                            // $obj->number_of_current_customers = $request->number_of_current_customers;
                            $obj->avg_number_properties_managed = $request->avg_number_properties_managed;
                            
                            $obj->cif_nie = $request->cif_nie;
                            // dd($request->file('company_image'));
                            if ($request->hasFile('company_image')) {
                                $extension = $request->file('company_image')->getClientOriginalExtension();
                                $originalName = $request->file('company_image')->getClientOriginalName();
                                $fileName = time().'-company_image.'.(Auth::user()->id).'.'. $extension;
                                $folderPath = Config('constant.COMPANY_IMAGE_ROOT_PATH');
                                if (!File::exists($folderPath)) {
                                    File::makeDirectory($folderPath, $mode = 0777, true);
                                }
                                if ($request->file('company_image')->move($folderPath, $fileName)) {
                                    $obj->company_image = $fileName;
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
                        }

                        User::where('id',auth()->user()->id)->update(['current_status' => $request->current_status]);
                        $user = User::where('users.id',auth()->user()->id);
                        if(auth()->user()->role->name == 'developer'){

                            $user->leftJoin('user_company_details','user_company_details.user_id','users.id');
                        }else{
                            $user->leftJoin('user_company_details','user_company_details.user_id','users.parent_user_id');
                        }
                        $user = $user->select('users.*','user_company_details.company_name','user_company_details.company_email','user_company_details.company_mobile','user_company_details.company_tax_number','user_company_details.company_website','user_company_details.company_address','user_company_details.company_city','user_company_details.company_sate','user_company_details.company_country','user_company_details.company_zipcode','user_company_details.company_sub_agent','user_company_details.company_image','user_company_details.professional_title','user_company_details.property_types_specialized','user_company_details.property_specialization','user_company_details.total_properties_in_portfolio','user_company_details.total_years_experiance','user_company_details.number_of_current_customers','user_company_details.avg_number_properties_managed','user_company_details.primary_service_area','user_company_details.cif_nie')->first();
                        $companyDetails = auth()->user()->companyDetails;
                        $certificateData = UserCertificate::where('user_id',auth()->user()->id)->get();
                        $total_properties_in_portfolio = userCompanyDetail::total_properties_in_portfolio;
                        $total_years_experiance = userCompanyDetail::total_years_experiance;
                        $number_of_current_customers = userCompanyDetail::number_of_current_customers;
                        $avg_number_properties_managed = userCompanyDetail::avg_number_properties_managed;
                        $number_of_sub_agents = userCompanyDetail::number_of_sub_agents;
                        $typeIdsArray = !empty($companyDetails->property_types_specialized) ? explode(',', $companyDetails->property_types_specialized) : [];
                        $typeData = Type::whereIn('id', $typeIdsArray)->pluck('name');
                        $user->typeNames = implode(', ', $typeData->toArray());
                        // dd($user->typeNames);
                        $htmlData = View("modules.profile-setup.includes.developer-profile-overview",['user' => $user, 
                        'certificateData' => $certificateData,
                         'total_properties_in_portfolio' => $total_properties_in_portfolio, 'total_years_experiance' => $total_years_experiance, 'number_of_current_customers' => $number_of_current_customers, 'number_of_sub_agents' => $number_of_sub_agents, 'avg_number_properties_managed' => $avg_number_properties_managed,
                        'companyDetails'=> $companyDetails])->render();
                        $response = array();
                        $response["status"] = "success";
                        $response["msg"] = "";
                        $response["data"] = $htmlData;
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    }
                    else if((auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer') && $request->current_status == 'last_step'){
                        
                        // User::where('id',auth()->user()->id)->update(['current_status' => 'under_review','is_active' => '0']);
                        User::where('id',auth()->user()->id)->update(['current_status' => 'completed','is_active' =>  1]);

                        //Create a Group and add a entry into group_participants table
                        $obj   = new Group;
                        $obj->created_by = auth()->user()->id;
                        $obj->name = auth()->user()->companyDetails->company_name ?? Null;
                        $obj->group_number = getGroupNumber();
                        $obj->is_company_group = 1;
                        $obj->company_id = auth()->user()->companyDetails->id ?? 0;
                        $obj->save();
                        $createdGroupId = $obj->id;
                        if (!empty($createdGroupId)) {
                            
                            //Adding a entry in group participants
                            $obj2   =  new GroupParticipants;
                            $obj2->user_id = auth()->user()->id;
                            $obj2->group_id = $createdGroupId;
                            $obj2->is_admin = 1;
                            $obj2->save();
                        }

                        $response = array(); 
                        $response["status"] = "success";
                        // $response["msg"] = trans("Your profile has been set up successfully. Enjoy the seamless experience ahead!");
                        // $response["data"] = 'developer';
                        $response["msg"] = trans("Your profile has been set up successfully. Enjoy the seamless experience ahead!");
                        $response["data"] = route(routeNamePrefix().'user.dashboard');
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    }
                    else{
                        $response = array();
                        $response["status"] = "error";
                        $response["msg"] = trans("messages.Invalid_request");
                        $response["data"] = (object) array();
                        $response["http_code"] = 500;
                        return Response::json($response, 500);
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
        return View("modules.$this->model.profile",compact('user'));
    }
    public function uploadCertificates(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();
        if ($request->isMethod('POST')) {
            $formData = $request->all();
            if (!empty($formData)) {
                $validator = Validator::make(
                    $request->all(),
                    array(
                        'files.*' => 'required|mimes:pdf,jpeg,png,jpg|max:'.config('Modules.certificate_upload_size'),
                    ),
                    array(

                        "files.*.required" =>trans("messages.profile-setup.professional_certifications_required"),
                        "files.*.mimes" => trans("messages.The_certificate_field_must_be_a_file_of_type_pdf_jpg_jpeg_png"),
                        "files.*.max" => trans("messages.The_certificate_size_should_not_exceed")." ".config('Modules.certificate_upload_size')."mb",
                        
                    )
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {
                   DB::beginTransaction();

                   if (!empty($request->file('files'))) {

                    $files = $request->file('files');
                    foreach ($files as $imageKey => $imageVal) {
                        if (!empty($imageVal)) {
                            $extension = $imageVal->getClientOriginalExtension();
                            
                                $obj = new UserCertificate;
                                $obj->user_id = $user->id;
                                $obj->type = ($extension == 'pdf') ? 'document' : 'image';
                                $originalName = $imageVal->getClientOriginalName();
                                $fileName = time() . '-user_certificate-' . $user->id . $imageKey . '.' . $extension;


                                $folderPath = Config('constant.USER_CERTIFICATE_ROOT_PATH');
                                if (!File::exists($folderPath)) {
                                    File::makeDirectory($folderPath, $mode = 0777, true);
                                }
                                if ($imageVal->move($folderPath, $fileName)) {
                                    $obj->certificate = $fileName;
                                    $obj->original_name = $originalName;
                                }

                                $obj->save();
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

                    DB::commit();

                    $certificateData = UserCertificate::where('user_id',auth()->user()->id)->get();
                    $htmlData = View("modules.profile-setup.includes.certificate-data",['certificateData' => $certificateData])->render();
                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans("messages.Profile_Updated_Successfully");
                    $response["data"] = $htmlData;
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
        return View("modules.$this->model.profile",compact('user'));
    }

    public function removeCertificate(Request $request,$certificateId){
        $userCertificate = UserCertificate::where('id', $certificateId)->first();

        if (!empty($userCertificate)) {
            $filePath = Config('constant.USER_CERTIFICATE_ROOT_PATH') . $userCertificate->certificate;

            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            UserCertificate::where('id', $certificateId)->delete();

            $certificateData = UserCertificate::where('user_id',auth()->user()->id)->get();
            $htmlData = View("modules.profile-setup.includes.certificate-data",['certificateData' => $certificateData])->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = trans("messages.Certificate_Removed_Successfully");
            $response["data"] = $htmlData;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        }else{
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }


    }

    public function uploadGovtCertificates(Request $request)
    {
        // dd($request->all());
        if ($request->isMethod('POST')) {
            $formData = $request->all();
            if (!empty($formData)) {
                $validator = Validator::make(
                    $request->all(),
                    array(
                        'files.*' => 'required|mimes:pdf,jpeg,png,jpg|max:'.config('Modules.govcertificate_upload_size'),
                    ),
                    array(

                        // "files.*.required" =>trans("messages.profile-setup.gov_certifications_required"),
                        "files.*.mimes" => trans("messages.The_certificate_field_must_be_a_file_of_type_pdf_jpg_jpeg_png"),
                        "files.*.max" => trans("messages.The_certificate_size_should_not_exceed")." ".config('Modules.certificate_upload_size')."mb",
                        
                    )
                );
                if ($validator->fails()) {
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                } else {
                   DB::beginTransaction();

                   if (!empty($request->file('files'))) {

                    $file = $request->file('files');
                    // foreach ($files as $imageKey => $imageVal) {
                        if (!empty($file)) {
                            $extension = $file->getClientOriginalExtension();
                            
                                $obj = User::find(Auth::user()->id);
                                // $obj->user_id = $user->id;
                                $obj->doc_type = ($extension == 'pdf') ? 'document' : 'image';
                                $original_doc_name = $file->getClientOriginalName();
                                $fileName = time() . '-user_govt_certificate-' . Auth::user()->id. '.' . $extension;


                                $folderPath = Config('constant.USER_CERTIFICATE_ROOT_PATH');
                                if (!File::exists($folderPath)) {
                                    File::makeDirectory($folderPath, $mode = 0777, true);
                                }
                                if ($file->move($folderPath, $fileName)) {
                                    $obj->government_certification = $fileName;
                                    $obj->original_doc_name = $original_doc_name;
                                }

                                $obj->save();
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
                    // }

                }

                    DB::commit();

                    $userGovCertificate = User::find(auth()->user()->id);
                    $htmlData = View("modules.profile-setup.includes.government-data",['userGovCertificate' => $userGovCertificate])->render();
                    $response = array();
                    $response["status"] = "success";
                    $response["msg"] = trans("messages.Profile_Updated_Successfully");
                    $response["data"] = $htmlData;
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
        return View("modules.$this->model.profile",compact('user'));
    }
    
    public function downloadGovCertificate(Request $request,$govCertificateUserId){
        $userGovCertificate = User::find($govCertificateUserId);
        if (!empty($userGovCertificate)) {
            $GovernmentCertification = $userGovCertificate->government_certification;
            $originalFileName = $userGovCertificate->original_doc_name;
            $url= url('storage/user_certificates/'. $GovernmentCertification);
            $response = array();
            $response["status"] = "success";
            $response["msg"] = trans("messages.Certificate_Removed_Successfully");
            $response["data"] = $url;
            $response["originalFileName"] = $originalFileName;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        }else{
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }
    
}
