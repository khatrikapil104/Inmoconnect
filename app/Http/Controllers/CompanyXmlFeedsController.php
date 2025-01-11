<?php

namespace App\Http\Controllers;

use App\Events\CrmNotification;
use App\Jobs\XmlFeedJob;
use App\Jobs\XmlJobTest;
use App\Models\Development;
use App\Models\FeedImportProgress;
use App\Models\Property;
use App\Models\Situation;
use App\Models\Subtype;
use App\Models\Type;
use App\Models\XmlFeedsAssisted;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToArray;
use Symfony\Component\Console\Helper\ProgressBar;

class CompanyXmlFeedsController extends Controller
{
    // public $model        =    'developers';
    // public $filterName        =    'developmentListingFilterData';
    public $listRouteUrl;
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {

            $this->listRouteUrl = route(routeNamePrefix() . 'developer.assigndevelopment');
            return $next($request);
        });
        // View()->share('model', $this->model);
        View()->share('listRouteUrl', $this->listRouteUrl);
        // View()->share('filterName', $this->filterName);
        $this->request = $request;
    }

    public function XmlFeedsAssisted(Request $request)
    {
        $formData = $request->all();
        // dd($formData);
        $validationArr = [];
        if (!empty($formData)) {
            $validationArr = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'company_name' => 'required',
                //'company_website' => 'required',
            ];
            $validator = Validator::make(
                $request->all(),
                $validationArr,
                array(

                    "first_name.required" => "The first name fields is required.",
                    "last_name.required" => "The last name fields is required.",
                    "email.required" => "The email fields is required.",
                    "phone.required" => "The phone number fields is required.",
                    "company_name.required" => "The company name fields is required.",
                    //"company_website.required" => "The company website fields is required.",


                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                // dd($request->all());
                if (auth()->user()->role->name == 'agent') {
                    DB::beginTransaction();
                    $obj = new XmlFeedsAssisted();

                    $obj->user_id = Auth::user()->id;
                    $obj->first_name = $request->first_name;
                    $obj->last_name = $request->last_name;
                    $obj->email = $request->email;
                    $obj->mobile_number = $request->phone;
                    $obj->company_name = $request->company_name;
                    $obj->company_website = $request->company_website;
                    $obj->message = $request->notes;
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
                    } else {
                        DB::commit();
                        $response = array();
                        $response["status"] = "success";
                        $response["msg"] = "Your request has sent successfully";
                        $response["data"] = (object) array();
                        $response["http_code"] = 200;
                        return Response::json($response, 200);
                    }
                }
            }
        }
    }

    public function xmlFeedsRun(Request $request)
    {
        // dd($request->all());
        $validationArr = [];
        // $validationArr = [
        //     'run_feed' => 'required|regex:/^https:\/\/[a-z0-9-]+\.realinmo\.briskalmas\.com\/wp-content\/plugins\/property-xml-feed\/xml\/property-feed-page-\d+\.xml$/',
        // ];

        // $validator = Validator::make(
        //     $request->all(),
        //     $validationArr,
        //     [
        //         "run_feed.required" => "The url field is required.",
        //         "run_feed.regex" => "Please enter the correct URL.",
        //     ]
        // );
        $validationArr = [
            'run_feed' => 'required|regex:/\.xml$/i',
        ];
        $validator = Validator::make(
            $request->all(),
            $validationArr,
            [
                "run_feed.required" => "The URL field is required.",
                "run_feed.regex" => "The URL must end with .xml.",
            ]
        );

        if ($validator->fails()) {
            $response = $this->change_error_msg_layout($validator->errors()->getMessages());
            return Response::json($response, 200);
        }
        $url = $request->run_feed;
        $htmlData = view('modules.dashboard.comfirm-and-run-import-xml-feed', compact('url'))->render();
        $response = array();
        $response["status"] = "success";
        $response["msg"] = "";
        $response['htmlData'] = $htmlData;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }

    public function FeedSyncedIndex(Request $request)
    {
        $formattedDate = '';
        if (!empty($request->feedurl)) {

            $progressbatchdata = FeedImportProgress::where('user_id', auth()->user()->id)->where('url', $request->feedurl)->first();
        } else {

            $progressbatchdata = FeedImportProgress::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->first();
        }
        if (!empty($progressbatchdata->updated_at)) {
            $date =  $progressbatchdata->updated_at;
            $formattedDate = Carbon::parse($date)->format('H:i, d/m/Y');
        }
        return view('modules.dashboard.feed_synced_successfully', compact('progressbatchdata', 'formattedDate'));
    }
    public function Xmluploads(Request $request)
    {

        if ($request->isMethod('POST')) {
            $response = Http::withOptions(['verify' => false])->timeout(120)->get($request->uploadurl);
            $xmlContent = $response->body();
            $xml = simplexml_load_string($xmlContent);

            // $totalPages = (int) !empty($xml->pagination->total_pages) ? $xml->pagination->total_pages : 1;
            // $recordperpage = (int) $xml->pagination->per_page;
            // $totalrecords = (int) $xml->pagination->total_items;
            // for ($i = 1; $i <= $totalPages; $i++) {
            //     if ($i == 1) {
            //         $page = "page-" . $i;
            //         $url = str_replace("page-1", $page, $request->uploadurl);
            //         $response = Http::withOptions(['verify' => false])->timeout(120)->get($request->uploadurl);
            $xmlFeedErrors = [];
            if (auth()->user()->role->name == 'developer' && empty($xml->development->development_number)) {
                $xmlFeedErrors[] = "Development ID";
            }
            foreach ($xml->properties->property as $recordKey => $record) {
                // if($recordKey > 0){ break; }
                
                if (empty($record->property_information->property_type)) {
                    $xmlFeedErrors[] = "Property Type";
                }
                if (empty($record->property_information->property_refrence)) {

                    $xmlFeedErrors[] = "Property Refrence";
                }
                if (empty($record->property_information->property_title)) {

                    $xmlFeedErrors[] = "Property Title";
                }
                if (empty($record->property_information->bathrooms)) {

                    $xmlFeedErrors[] = "Bathroom";
                }
                if (empty($record->property_information->bedrooms)) {

                    $xmlFeedErrors[] = "Bedroom";
                }
                if (empty($record->property_information->status_completion)) {

                    $xmlFeedErrors[] = "Status Completion";
                }
                if (empty($record->property_information->description)) {

                    $xmlFeedErrors[] = "Description";
                }
                if (empty($record->property_pricing->sale_price)) {

                    $xmlFeedErrors[] = "Sale Price";
                }
                if (empty($record->property_location->street_number)) {

                    $xmlFeedErrors[] = "Street Number";
                }
                if (empty($record->property_location->street_name)) {

                    $xmlFeedErrors[] = "Street Name";
                }
                if (empty($record->property_location->city)) {

                    $xmlFeedErrors[] = "City";
                }
                if (empty($record->property_location->state)) {

                    $xmlFeedErrors[] = "State";
                }
                if (empty($record->property_location->country)) {

                    $xmlFeedErrors[] = "Country";
                }
                if (empty($record->property_location->postcode)) {

                    $xmlFeedErrors[] = "Postcode";
                }
                if (empty($record->property_location->address)) {

                    $xmlFeedErrors[] = "Address";
                }
                if (empty($record->property_dimensions->total_size)) {

                    $xmlFeedErrors[] = "Total Size";
                }
                if (empty($record->property_media->property_images)) {

                    $xmlFeedErrors[] = "Properties Images";
                }
            }

            if (!empty($xmlFeedErrors)) {
                $xmlFeedErrorText = !empty($xmlFeedErrors) ? implode(',', $xmlFeedErrors) : "";
                $response = array();
                $response["status"] = "error";
                $response["msg"] = $xmlFeedErrorText . " fields are required to process this xml feed";
                $response["data"] = (object) array();
                $response["http_code"] = 500;
                return Response::json($response, 500);
            }
            //     }
            // }
            $devt_no = Development::where('development_number', !empty($xml->development->development_number) ? $xml->development->development_number : null)->value('id');
            // $devt_no = !empty($xml->development->development_number) ? $xml->development->development_number : null;
            // $exists = Development::whereIn('development_number', [$devt_no])->exists();
            // dd($devt_no);
            if (!empty($request->uploadurl)) {
                $loggedInUser = auth()->user()->id;
                $loggedInUserRole = auth()->user()->role->name;
                FeedImportProgress::where('url', $request->uploadurl)->where('user_id', $loggedInUser)->delete();
                if (auth()->user()->role->name == 'developer') {

                    if (empty($devt_no)) {
                        $response = array();
                        $response["status"] = "error";
                        $response["msg"] = "Development ID Not Found.";
                        $response["data"] = (object) array();
                        $response["http_code"] = 500;
                        return Response::json($response, 500);
                    }
                }
                XmlFeedJob::dispatch($request->uploadurl, $loggedInUser, $loggedInUserRole);
            }

            $htmlData = view('modules.dashboard.xml-feeds-running')->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = "Properties are being imported. You can monitor progress.";
            $response['htmlData'] = $htmlData;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        } else {
            return view('modules.dashboard.xml-feeds-running');
        }
    }

    public function importProgress(Request $request)
    {
        $progressbatch = FeedImportProgress::where('user_id', auth()->user()->id)->where('url', $request->feedurl)->first();
        if (!empty($progressbatch)) {
            return response()->json($progressbatch);
        }

        return response()->json(['message' => 'Batch not found'], 404);
    }

    public function assignDevelopmentIndex(Request $request)
    {
        $searchKey = array_key_exists('table_search_input', $request->all());
        $sortKey = array_key_exists('sortBy', $request->all());
        if ($searchKey) {
            $request['search_input_property'] = $request['table_search_input'];
            unset($request['table_search_input']);
        }
        if ($sortKey) {
            $request['sort_by_property'] = $request['sortBy'];
            unset($request['sortBy']);
        }
        $loggedInUserId = auth()->user()->id;
        $userDevelopments = Development::where('user_id', auth()->user()->id)->pluck('development_name', 'id');
        $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $propertyInstance = new Property();
        $results = $propertyInstance->loadPropertiesByAgentId(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], $request->all());


        $listingType = 'assign-property-listing';

        if ($request->ajax()) {

            $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

            $tableData =  View("components.tables.custom-table", compact('results', 'listingType'))->render();
            $paginationData =  View("components.tables.pagination", compact('results', 'listingType'))->render();

            $response = array();
            $response["status"] = "success";
            $response["msg"] = "";
            $response['tableData'] = $tableData;
            $response['paginationData'] = $paginationData;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        } else {
            return view('modules.developers.assign_development', compact('results', 'userDevelopments'));
        }
    }

    public function propertyAssignToDevelopment(Request $request)
    {
        $propertiesId = explode(',', $request->selectedCheckboxesArr);
        $count = count($propertiesId);
        $developmentName = Development::select('development_name')->find($request->developmentId);
        $properties =  Property::whereIn('id', $propertiesId)->get();
        foreach ($properties as $key => $value) {
            $value->development_id = $request->developmentId;
            $value->save();
        }

        if (auth()->user()->role->name == 'developer') {
            // event(new CrmNotification(auth()->user()->id, 'CRM_NOTIFICATION_42',  [
            //     'action_url' => route(routeNamePrefix() . 'developer.assigndevelopment'),
            //     'type' => 'property',
            //     'reference_id' => NULL,
            //     'values' => ['value1' => $count, 'value2' => $developmentName->development_name]
            // ]));
        }
        $response = array();
        $response["status"] = "success";
        $response["msg"] = "Properties Assigned Successfully";
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }

    public function XmluploadsTest(Request $request)
    {
        // dd(123);

        if ($request->isMethod('POST')) {
            $response = Http::withOptions(['verify' => false])->timeout(120)->get($request->uploadurl);
            $xmlContent = $response->body();
            $xml = simplexml_load_string($xmlContent);

            // $totalPages = (int) !empty($xml->pagination->total_pages) ? $xml->pagination->total_pages : 1;
            // $recordperpage = (int) $xml->pagination->per_page;
            // $totalrecords = (int) $xml->pagination->total_items;
            // for ($i = 1; $i <= $totalPages; $i++) {
            //     if ($i == 1) {
            //         $page = "page-" . $i;
            //         $url = str_replace("page-1", $page, $request->uploadurl);
            //         $response = Http::withOptions(['verify' => false])->timeout(120)->get($request->uploadurl);
            // $xmlFeedErrors = [];
            // if (auth()->user()->role->name == 'developer' && empty($xml->development->development_number)) {
            //     $xmlFeedErrors[] = "Development ID";
            // }
            // foreach ($xml->property as $recordKey => $record) {
            //     // if($recordKey > 0){ break; }
            //     dd($record->ref);
                
            //     if (empty($record->type)) {
            //         $xmlFeedErrors[] = "Property Type";
            //     }
            //     if (empty($record->ref)) {

            //         $xmlFeedErrors[] = "Property Refrence";
            //     }
            //     // if (empty($record->property_information->property_title)) {

            //     //     $xmlFeedErrors[] = "Property Title";
            //     // }
            //     if (empty($record->baths)) {

            //         $xmlFeedErrors[] = "Bathroom";
            //     }
            //     if (empty($record->beds)) {

            //         $xmlFeedErrors[] = "Bedroom";
            //     }
            //     if (empty($record->property_information->status_completion)) {

            //         $xmlFeedErrors[] = "Status Completion";
            //     }
            //     if (empty($record->property_information->description)) {

            //         $xmlFeedErrors[] = "Description";
            //     }
            //     if (empty($record->property_pricing->sale_price)) {

            //         $xmlFeedErrors[] = "Sale Price";
            //     }
            //     if (empty($record->property_location->street_number)) {

            //         $xmlFeedErrors[] = "Street Number";
            //     }
            //     if (empty($record->property_location->street_name)) {

            //         $xmlFeedErrors[] = "Street Name";
            //     }
            //     if (empty($record->property_location->city)) {

            //         $xmlFeedErrors[] = "City";
            //     }
            //     if (empty($record->property_location->state)) {

            //         $xmlFeedErrors[] = "State";
            //     }
            //     if (empty($record->property_location->country)) {

            //         $xmlFeedErrors[] = "Country";
            //     }
            //     if (empty($record->property_location->postcode)) {

            //         $xmlFeedErrors[] = "Postcode";
            //     }
            //     if (empty($record->property_location->address)) {

            //         $xmlFeedErrors[] = "Address";
            //     }
            //     if (empty($record->property_dimensions->total_size)) {

            //         $xmlFeedErrors[] = "Total Size";
            //     }
            //     if (empty($record->property_media->property_images)) {

            //         $xmlFeedErrors[] = "Properties Images";
            //     }
            // }

            // if (!empty($xmlFeedErrors)) {
            //     $xmlFeedErrorText = !empty($xmlFeedErrors) ? implode(',', $xmlFeedErrors) : "";
            //     $response = array();
            //     $response["status"] = "error";
            //     $response["msg"] = $xmlFeedErrorText . " fields are required to process this xml feed";
            //     $response["data"] = (object) array();
            //     $response["http_code"] = 500;
            //     return Response::json($response, 500);
            // }
            //     }
            // }
            $devt_no = Development::where('development_number', !empty($xml->development->development_number) ? $xml->development->development_number : null)->value('id');
            // $devt_no = !empty($xml->development->development_number) ? $xml->development->development_number : null;
            // $exists = Development::whereIn('development_number', [$devt_no])->exists();
            // dd($devt_no);
            if (!empty($request->uploadurl)) {
                $loggedInUser = auth()->user()->id;
                $loggedInUserRole = auth()->user()->role->name;
                FeedImportProgress::where('url', $request->uploadurl)->where('user_id', $loggedInUser)->delete();
                if (auth()->user()->role->name == 'developer') {

                    if (empty($devt_no)) {
                        $response = array();
                        $response["status"] = "error";
                        $response["msg"] = "Development ID Not Found.";
                        $response["data"] = (object) array();
                        $response["http_code"] = 500;
                        return Response::json($response, 500);
                    }
                }
                XmlJobTest::dispatch($request->uploadurl, $loggedInUser, $loggedInUserRole);
            }

            $htmlData = view('modules.dashboard.xml-feeds-running')->render();
            $response = array();
            $response["status"] = "success";
            $response["msg"] = "Properties are being imported. You can monitor progress.";
            $response['htmlData'] = $htmlData;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        } else {
            return view('modules.dashboard.xml-feeds-running');
        }
    }
}
