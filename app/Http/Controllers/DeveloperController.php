<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AccpetDeveloper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Models\Property;
use App\Models\Type;
use  App\Models\User;
use App\Models\UserCertificate;
use App\Models\userCompanyDetail;
use DB, Redirect, Response, Auth, File, Mail;
use Illuminate\Validation\Rule;

class DeveloperController extends Controller
{
    public $model        =    'developers';
    public $filterName        =    'agentSearchFilterData';
    public $listRouteUrl;
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {

            $this->listRouteUrl = route(routeNamePrefix() . 'agentSearch.index');
            return $next($request);
        });
        View()->share('model', $this->model);
        View()->share('listRouteUrl', $this->listRouteUrl);
        View()->share('filterName', $this->filterName);
        $this->request = $request;
    }
    public function indexx(Request $request)
    {
        $loggedInUserId = Auth::user()->id;
        $listingType = 'developer-search';
        $filterData = $this->getFilterData($this->filterName);
        if (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin') {
            // $developers = User::withWhereHas('userRoles')->get();

            $results = User::whereHas('userRoles', function ($q) {
                $q->where('name', 'developer');
            })->paginate();

            return  View("modules.$this->model.index", compact('results', 'listingType', 'filterData'));
        } else {
            $DB =  User::where('users.id', '!=', auth()->user()->id)->leftJoin('user_roles', 'users.user_role_id', '=', 'user_roles.id')->leftJoin('properties', function ($join) {
                $join->on('properties.owner_id', '=', 'users.id')
                    ->whereNull('properties.deleted_at');
            })
                ->leftJoin('requests', function ($join) use ($loggedInUserId) {
                    $join->on('users.id', '=', 'requests.to')
                        ->where('requests.from', '=', $loggedInUserId)
                        ->orWhere(function ($query) use ($loggedInUserId) {
                            $query->on('users.id', '=', 'requests.from')
                                ->where('requests.to', '=', $loggedInUserId);
                        });
                })->where('user_roles.name', '=', 'agent');
        }

        if (!empty($request->agent)) {
            $DB->where('users.email', $request->agent);
        }

        $searchData = !empty($request->{$this->filterName}) ? $request->{$this->filterName} : (session()->has($this->filterName) ? session()->get($this->filterName) : '');
        if (!empty($searchData)) {
            if ((isset($searchData['min_property'])) && (isset($searchData['max_property']))) {
                $searchData['min_property'] = str_replace(',', '', $searchData['min_property']);
                $searchData['max_property'] = str_replace(',', '', $searchData['max_property']);
                $DB->havingRaw('total_properties BETWEEN ? AND ?', [$searchData['min_property'], $searchData['max_property']]);
            }
            if ((!empty($searchData['email']))) {
                $DB->where('users.email', $searchData['email']);
            }
            if ((!empty($searchData['address']))) {
                $DB->where("properties.address", 'like', '%' . $searchData['address'] . '%');
            }
            if ((!empty($searchData['zipcode']))) {
                $DB->where("properties.zipcode", $searchData['zipcode']);
            }
            if ((!empty($searchData['type_id']))) {
                $DB->where("properties.type_id", $searchData['type_id']);
            }
            if ((!empty($searchData['category_id']))) {
                $DB->where("properties.category_id", $searchData['category_id']);
            }

            session()->put($this->filterName, $searchData);
        }

        if (!empty($searchData['sort_by']) && $searchData['sort_by'] == 'newest') {
            $DB->orderBy('users.created_at', 'desc');
        } else if (!empty($searchData['sort_by']) && $searchData['sort_by'] == 'oldest') {
            $DB->orderBy('users.created_at', 'asc');
        } else {
            if (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin') {
                $DB->orderBy('users.created_at', 'desc');
            } else {

                $DB->orderByRaw('
                CASE
                    WHEN MAX(requests.status) = ? THEN 1 
                    WHEN MAX(requests.status) = ? THEN 2 
                    WHEN MAX(requests.status) = ? THEN 3
                    WHEN MAX(requests.status) IS NULL THEN 4  
                END
            ', [config('constant.REQUEST_STATUS.ACCEPTED'), config('constant.REQUEST_STATUS.PENDING'), config('constant.REQUEST_STATUS.REJECTED')]);
            }
        }

        $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $DB->whereNull('users.deleted_at')->whereNotNull('users.email_verified_at');
        if (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin') {
            $results = $DB->select('users.*', DB::raw('COUNT(properties.id) as total_properties'), DB::raw('(SELECT address FROM properties WHERE owner_id = users.id ORDER BY created_at LIMIT 1) as property_address'), DB::raw('(SELECT country FROM properties WHERE owner_id = users.id ORDER BY created_at LIMIT 1) as property_country'))->groupBy('users.id')->paginate($recordsPerPage);
        } else {
            $results = $DB->select('users.*', DB::raw('COUNT(properties.id) as total_properties'), DB::raw('(SELECT address FROM properties WHERE owner_id = users.id ORDER BY created_at LIMIT 1) as property_address'), DB::raw('MAX(requests.status) as request_status'), DB::raw('(SELECT country FROM properties WHERE owner_id = users.id ORDER BY created_at LIMIT 1) as property_country'))->groupBy('users.id')->paginate($recordsPerPage);
        }

        if ($results->isNotEmpty()) {
            foreach ($results as $result) {
                $result->isHidden = (auth()->user()->role->name == 'agent' && empty(areAgentFriends(auth()->user()->id, $result->id))) ? true : false;
            }
        }

        $listingType = 'agent-search';
        if (empty($searchData) && empty($request->agent)) {
            $results = collect([]);
        }
        if ($request->ajax()) {

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
            $filterData = $this->getFilterData($this->filterName);
            return  View("modules.$this->model.search", compact('results', 'listingType', 'filterData', 'searchData'));
        }
    }
    public function index(Request $request)
    {
        $loggedInUserId = Auth::user()->id;
        $developers = new User();
        $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $results = $developers->loadDevelopoers(['perPage' => $recordsPerPage], $request->all(), []);
        // dd($results);
        $listingType = 'beta-agent-listing';
        if ($request->ajax()) {

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
            $filterData = $this->getFilterData($this->filterName);
            return  View("modules.$this->model.index", compact('results', 'listingType', 'filterData'));
        }
    }

    public function developerRequestStatus($developerId, Request $request)
    {
        $developer = User::where('id', $developerId)->first();
        if (!empty($developer)) {
            if ($request->type == 'accept') {
                $developer->is_active = 1;
                $developer->current_status = 'completed';
                Mail::to($developer->email)->send(new AccpetDeveloper($developer->name));
            } else {
                $developer->is_active = 0;
                $developer->current_status = 'completed';
            }


            $developer->save();
        }
        $response = array();
        $response["status"] = "success";
        $response["msg"] = "Developer Status Updated Successfully";
        $response["data"] = $developer->is_active;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }

    public function loadDeveloperData(Request $request)
    {
        $requestData = $request->all();
        $loggedInUserId = auth()->user()->id;
        $developers = new User();
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $results = $developers->loadDevelopoers(['perPage' => $recordsPerPage], $requestData, []);

        $htmlData = View("modules.dashboard.includes.load-developer-data", ['results' => $results])->render();
        $response = array();
        $response["status"] = "success";
        $response["msg"] = "";
        $response['data'] = $htmlData;
        $response['developer'] = $results;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }
    public function getDeveloperDetailSideview($developerId)
    {
        $developer = User::find($developerId);
        
        $total_properties_in_portfolio = userCompanyDetail::total_properties_in_portfolio;
        $total_years_experiance = userCompanyDetail::total_years_experiance;
        $number_of_current_customers = userCompanyDetail::number_of_current_customers;
        $avg_number_properties_managed = userCompanyDetail::avg_number_properties_managed;
        $number_of_sub_agents = userCompanyDetail::number_of_sub_agents;
        // dd($developer->companyDetails->avg_number_properties_managed);
        $certificateData = UserCertificate::where('user_id',$developerId)->get();
        $typeIdsArray = !empty($developer->companyDetails->property_types_specialized) ? explode(',', $developer->companyDetails->property_types_specialized) : [];
        $typeData = Type::whereIn('id', $typeIdsArray)->pluck('name');
        $developer->typeNames = implode(', ', $typeData->toArray());
        $htmlData = View("modules.developers.view_sidebar", ['developer' => $developer, 'total_properties_in_portfolio' => $total_properties_in_portfolio, 'total_years_experiance' => $total_years_experiance, 'number_of_current_customers' => $number_of_current_customers, 'avg_number_properties_managed' => $avg_number_properties_managed, 'number_of_sub_agents' => $number_of_sub_agents,'certificateData'=>$certificateData])->render();
        $response = array();
        $response["status"] = "success";
        $response["msg"] = "";
        $response['data'] = $htmlData;
        $response['developer'] = $developer;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }
}
