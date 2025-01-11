<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Models\Property;
use  App\Models\User;
use  App\Models\Category;
use App\Models\Development;
use  App\Models\Situation;
use  App\Models\Type;
use  App\Models\Feature;
use  App\Models\PropertyImage;
use  App\Models\ViewedUserProperty;
use DB, Redirect, Response, Auth, File;
use Illuminate\Validation\Rule;

class AgentController extends Controller
{
    public $model        =    'agents';
    public $filterName        =    'agentListingFilterData';
    public $listRouteUrl;
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {

            $this->listRouteUrl = route(routeNamePrefix() . 'agents.index');
            return $next($request);
        });
        View()->share('model', $this->model);
        View()->share('listRouteUrl', $this->listRouteUrl);
        View()->share('filterName', $this->filterName);
        $this->request = $request;
    }
    public function index(Request $request, $value = '')
    {
        $loggedInUserId = Auth::user()->id;

        if (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin') {
            $DB =  User::leftJoin('user_roles', 'users.user_role_id', '=', 'user_roles.id')->leftJoin('properties', function ($join) {
                $join->on('properties.owner_id', '=', 'users.id')
                    ->whereNull('properties.deleted_at');
            })
                ->where('user_roles.name', '=', 'agent');
        } else {
            $DB =  User::leftJoin('user_roles', 'users.user_role_id', '=', 'user_roles.id');

            if ($value == 'developers') {
                $DB->leftJoin('developments', function ($join) {
                    $join->on('developments.user_id', '=', 'users.id')
                        ->whereNull('developments.deleted_at');
                });
            } else {
                $DB->leftJoin('properties', function ($join) {
                    $join->on('properties.owner_id', '=', 'users.id')
                        ->whereNull('properties.deleted_at');
                });
            }
            $DB->leftJoin('requests', function ($join) use ($loggedInUserId) {
                $join->on('users.id', '=', 'requests.to')
                    ->where('requests.from', '=', $loggedInUserId)
                    ->orWhere(function ($query) use ($loggedInUserId) {
                        $query->on('users.id', '=', 'requests.from')
                            ->where('requests.to', '=', $loggedInUserId);
                    });
            });

            if ($value == 'developers') {
                $DB->where('user_roles.name', '=', 'developer');
                $listingType = 'developer-listing';
            } else {
                $DB->where('user_roles.name', '=', 'agent');
                $listingType = 'agent-listing';
            }
        }
        $DB->where('requests.status', config('constant.REQUEST_STATUS.ACCEPTED'));

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
            $DB->orderBy('users.created_at', 'desc');
        }

        $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $DB->whereNull('users.deleted_at')->whereNotNull('users.email_verified_at');
        if (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin') {
            $results = $DB->select('users.*', DB::raw('COUNT(properties.id) as total_properties'), DB::raw('(SELECT address FROM properties WHERE owner_id = users.id ORDER BY created_at LIMIT 1) as property_address'), DB::raw('(SELECT country FROM properties WHERE owner_id = users.id ORDER BY created_at LIMIT 1) as property_country'))->groupBy('users.id')->paginate($recordsPerPage);
        } else if ($value == 'developers') {
            $results = $DB->select('users.*', DB::raw('COUNT(developments.id) as total_development'), DB::raw('(SELECT location FROM developments WHERE user_id = users.id ORDER BY created_at LIMIT 1) as development_address'), DB::raw('MAX(requests.status) as request_status'))->groupBy('users.id')->paginate($recordsPerPage);
        } else {
            $results = $DB->select('users.*', DB::raw('COUNT(properties.id) as total_properties'), DB::raw('(SELECT address FROM properties WHERE owner_id = users.id ORDER BY created_at LIMIT 1) as property_address'), DB::raw('(SELECT country FROM properties WHERE owner_id = users.id ORDER BY created_at LIMIT 1) as property_country'), DB::raw('MAX(requests.status) as request_status'))->groupBy('users.id')->paginate($recordsPerPage);
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
            return  View("modules.$this->model.index", compact('results', 'listingType', 'filterData', 'searchData', 'value'));
        }
    }

    public function viewAgent(Request $request, $id, $value = '')
    {
        $checkIfValidUser = User::with('role')->where('id', $id)->first();
        if (!empty($checkIfValidUser)) {

            if ($value == 'developers') {
                $DB = Development::where('developments.user_id', $id)->leftJoin('users', 'users.id', 'developments.user_id')->select('developments.*', 'users.name as developer_name')->whereNull('developments.deleted_at');
                $sortBy = $request->input('sortBy') ? $request->input('sortBy') : 'developments.created_at';
                $listingType = 'developement-listing';

            } else {
                $DB = Property::where('properties.owner_id', $id)->leftJoin('users', 'users.id', 'properties.owner_id')->select('properties.*', 'users.name as agent_name')->whereNull('properties.deleted_at');
                $sortBy = $request->input('sortBy') ? $request->input('sortBy') : 'properties.created_at';
                $listingType = 'property-search';
            }
            $order = $request->input('order') ? $request->input('order') : 'desc';
            $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
            $propertyData = $DB->groupBy('id')->orderBy($sortBy, $order)->paginate($recordsPerPage);
            $connectAgent=null;
            if (!empty(auth()->user()->parent_user_id)) {

                $connectAgent = User::find(auth()->user()->parent_user_id);
            }
            if ($request->ajax()) {
                $tableData =  View("components.tables.custom-table", ['results' => $propertyData, 'listingType' => $listingType])->render();
                $paginationData =  View("components.tables.pagination",  ['results' => $propertyData, 'listingType' => $listingType])->render();

                $response = array();
                $response["status"] = "success";
                $response["msg"] = "";
                $response['tableData'] = $tableData;
                $response['paginationData'] = $paginationData;
                $response["http_code"] = 200;
                return Response::json($response, 200);
            } else {
                if ($value=='developers') {
                    $agentData = User::with('development')->where('users.id',$id)
                    ->leftJoin('developments', function ($join) {
                        $join->on('developments.user_id', '=', 'users.id')
                            ->whereNull('developments.deleted_at');
                    })->select('users.*', DB::raw('COUNT(developments.id) as total_development'), DB::raw('(SELECT location FROM developments WHERE user_id = users.id ORDER BY created_at LIMIT 1) as development_address'))->groupBy('users.id')->paginate(1);

                    
                } else {
                    $agentData = User::where('users.id', $id)->leftJoin('properties', function ($join) {
                        $join->on('properties.owner_id', '=', 'users.id')
                            ->whereNull('properties.deleted_at');
                    })->select('users.*', DB::raw('COUNT(properties.id) as total_properties'), DB::raw('(SELECT address FROM properties WHERE owner_id = users.id ORDER BY created_at LIMIT 1) as property_address'))->groupBy('users.id')->paginate(1);
                }
                return  View("modules.agents.view_agent", compact('propertyData', 'listingType', 'checkIfValidUser', 'agentData', 'value','connectAgent'));
            }
            
        } else {

            return redirect()->back()->with('error', 'Invalid Request');
        }
    }

    public function userPropertiesShow(Request $request, $userId, $reference)
    {

        $checkIfValidUser = User::where('id', $userId)->first();

        if (!empty($checkIfValidUser)) {
            $property = Property::where('properties.reference', $reference)->leftJoin('users', 'users.id', 'properties.owner_id')->select('properties.*', 'users.name as agent_name', 'users.email as agent_email')->whereNull('properties.deleted_at')->first();
            if (!empty($property)) {
                //Make a entry to track customer viewed properties
                $viewedPropertyInstance = new ViewedUserProperty;
                $viewedPropertyInstance->storeDetails($property->id);
                $categories = Category::pluck('name', 'id');
                $situations = Situation::pluck('name', 'id');
                $types = Type::pluck('name', 'id');
                // $features   = Feature::pluck('name','id');
                $users = User::where('id', Auth::user()->id)->first();
                $featur = Feature::all();
                $user = auth()->user()->name;
                $isHidden = ((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'sub-developer' || auth()->user()->role->name == 'developer') && $property->owner_id != auth()->user()->id && empty(areAgentFriends(auth()->user()->id, $property->owner_id))) ? true : false;

                $propertyImages = PropertyImage::where('property_id', $property->id)->orderBy('created_at', 'asc')->get();
                $propertyImageCount = $propertyImages->count();
                if ($propertyImageCount < 5) {
                    for ($i = $propertyImageCount + 1; $i <= 5; $i++) {
                        $dummyImage = new PropertyImage();
                        $dummyImage->image = asset('img/default-property.jpg');
                        $dummyImage->type = 'image';

                        $propertyImages->push($dummyImage);
                    }
                }

                return view("modules.properties.show", compact('property', 'user', 'featur', 'users', 'propertyImages', 'isHidden', 'checkIfValidUser'));
            } else {
                Session()->flash('error', trans('messages.Invalid_request'));
                return redirect()->back();
            }
        } else {
            return redirect()->back()->with('error', trans('messages.Invalid_request'));
        }
    }
}
