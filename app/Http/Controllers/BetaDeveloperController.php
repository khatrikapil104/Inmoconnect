<?php

namespace App\Http\Controllers;

use App\Exports\BetaDevelopersExport;
use App\Mail\TicketConfirmedAdmin;
use App\Mail\TicketConfirmedDeveloper;
use App\Models\BetaDeveloper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DB, Redirect, Response, Auth;
use File, Str, Hash, Mail;
use Maatwebsite\Excel\Facades\Excel;

class BetaDeveloperController extends Controller
{
    public $model        =    'beta_developers';

    public $filterName        =    'betaDeveloperListingFilterData';
    public $listRouteUrl;

    public function landingDevelopers()
    {
        $filePath = public_path('assets/data/countries_states.json');
        $countries = [];
        if (file_exists($filePath)) {
            $jsonContent = file_get_contents($filePath);
            $data = json_decode($jsonContent, true);
            if (!empty($data['DevelopersCountries'])) {
                foreach ($data['DevelopersCountries'] as $countryVal) {
                    $countries[$countryVal['text']] = $countryVal['text'];
                }
            }
        }
        return view('modules.landing_page.developer_landing_page', compact('countries'));
    }

    public function index(Request $request)
    {
        $loggedInUserId = Auth::user()->id;
        $betaDeveloperInstance = new BetaDeveloper();
        $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $results = $betaDeveloperInstance->loadBetaDeveloper(['perPage' => $recordsPerPage], $request->all(), []);
        return  View("modules.$this->model.index", compact('results'));
    }

    public function store(Request $request)
    {
        $formData = $request->all();
        if (!empty($formData)) {
            // dd($formData);
            $validator = Validator::make(
                $request->all(),
                array(
                    'name' => 'required',
                    'email' => ['required', 'email', Rule::unique('beta_agents')],
                    'phone' => ['required', 'regex:/^\+\(\d{1,2}\) \(\d{3} \d{3} \d{3}\)$/'],
                    'company_name' => 'required',
                    'terms_conditions' => 'required',
                    'country' => 'required',
                    'g-recaptcha-response' => 'required',

                ),
                array(

                    "first_name.required" => trans("messages.The_first_name_field_is_required"),
                    "company_name.required" => trans("messages.profile-setup.company_name_required"),
                    "last_name.required" => trans("messages.The_last_name_field_is_required"),
                    "phone.required" => trans("messages.The_mobile_number_field_is_required"),
                    "phone.regex" => trans("messages.Please_enter_a_valid_mobile_number"),
                    "email.required" => trans("messages.The_email_field_is_required"),
                    "email.email" => trans("messages.The_email_field_must_be_a_valid_email_address"),
                    "email.unique" => trans("messages.landing_page.You_have_already_registered_for_beta_launch"),
                    "terms_conditions.required" => trans("messages.beta_developer_landing_page.The_terms_conditions_field_is_required"),
                    "g-recaptcha-response.required" => trans("messages.landing_page.Please_Complete_the_Recaptcha_to_proceed"),

                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {

                DB::beginTransaction();
                $obj   = new BetaDeveloper();
                $obj->name = $request->name;
                $obj->email = $request->email;
                $obj->phone = $request->phone;
                $obj->company_name = !empty($request->company_name) ? $request->company_name : NULL;
                $obj->country = $request->country;

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
                $superadminEmail = config('Mail.Admin_Email');

                //Send Email to User
                $mailUser = new TicketConfirmedDeveloper($obj->name);

                Mail::to($obj->email)->send($mailUser);

                //Send Email to Admin
                $mailAdmin = new TicketConfirmedAdmin('Admin', $obj->name, $obj->email, $obj->phone, $obj->company_name, $obj->role);


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

    public function exportBetaDevelopers()
    {
        return Excel::download(new BetaDevelopersExport, 'beta_developer.xlsx');
    }

    public function loadBetaDeveloperData(Request $request)
    {
        $betaDeveloperInstance = new BetaDeveloper();
        $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $results = $betaDeveloperInstance->loadBetaDeveloper(['perPage' => $recordsPerPage], $request->all(), []);

        $htmlData = View("modules.dashboard.includes.load-beta-developer-data", ['results' => $results])->render();
        $response = array();
        $response["status"] = "success";
        $response["msg"] = "";
        $response['data'] = $htmlData;
        $response['developer'] = $results;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }
}
