<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Models\Property;
use  App\Models\User;
use DB, Redirect, Response, Auth, File;
use Illuminate\Validation\Rule;

class AgentSearchController extends Controller
{
    public $model        =    'agents';
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
    public function index(Request $request)
    {
        $loggedInUserId = Auth::user()->id;
        if (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin') {
            $DB =  User::leftJoin('user_roles', 'users.user_role_id', '=', 'user_roles.id')->leftJoin('properties', function ($join) {
                $join->on('properties.owner_id', '=', 'users.id')
                    ->whereNull('properties.deleted_at');
            })
                ->where('user_roles.name', '=', 'agent');
        } else {
            $DB =  User::with('role')->where('users.id', '!=', auth()->user()->id)->leftJoin('user_roles', 'users.user_role_id', '=', 'user_roles.id')
            ->leftJoin('properties', function ($join) {
                $join->on('properties.owner_id', '=', 'users.id')
                    ->whereNull('properties.deleted_at');
            })
            ->leftJoin('developments', function ($join) {
                $join->on('developments.user_id', '=', 'users.id')
                    ->whereNull('developments.deleted_at');
            })
                ->leftJoin('requests', function ($join) use ($loggedInUserId) {
                    $join->on('users.id', '=', 'requests.to')
                        ->where('requests.from', '=', $loggedInUserId)
                        ->orWhere(function ($query) use ($loggedInUserId) {
                            $query->on('users.id', '=', 'requests.from')
                                ->where('requests.to', '=', $loggedInUserId);
                        });
                })
                ->where('user_roles.name', '=', 'agent');
        }
        if (auth()->user()->role->name=='agent') {
           
            $DB->orWhere('user_roles.name', '=', 'developer');
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
            $results = $DB->select('users.*', DB::raw('COUNT(properties.id) as total_properties'),DB::raw('COUNT(developments.id) as total_development'),DB::raw('(SELECT location FROM developments WHERE user_id = users.id ORDER BY created_at LIMIT 1) as development_address'), DB::raw('(SELECT address FROM properties WHERE owner_id = users.id ORDER BY created_at LIMIT 1) as property_address'), DB::raw('MAX(requests.status) as request_status'), DB::raw('(SELECT country FROM properties WHERE owner_id = users.id ORDER BY created_at LIMIT 1) as property_country'))->groupBy('users.id')->paginate($recordsPerPage);
        }
        
        if ($results->isNotEmpty()) {
            foreach ($results as $result) {
                $result->isHidden = ((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'sub-developer' || auth()->user()->role->name == 'developer') && empty(areAgentFriends(auth()->user()->id, $result->id))) ? true : false;
                if (!empty($result->role->name) && $result->role->name == 'developer') {
                    $result->value = 'developers';
                }
                else{
                    $result->value = null;
                }
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
}
