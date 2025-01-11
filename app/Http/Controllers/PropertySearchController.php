<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Models\Property;
use  App\Models\Feature;
use App\Models\SavedProperties;
use App\Models\SavedSearchCretaria;
use App\Models\Type;
use App\Models\User;
use Carbon\Carbon;
use DB, Redirect, Response, Auth, File;
use Illuminate\Validation\Rule;

class PropertySearchController extends Controller
{
    public $model        =    'properties';
    public $filterName        =    'propertySearchFilterData';
    public $listRouteUrl;
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {

            $this->listRouteUrl = route(routeNamePrefix() . 'propertySearch.index');
            return $next($request);
        });
        View()->share('model', $this->model);
        View()->share('listRouteUrl', $this->listRouteUrl);
        View()->share('filterName', $this->filterName);
        $this->request = $request;
        // dd($request->{$this->filterName});
    }
    public function index(Request $request)
    {
        $types = Type::select('name', 'id')->get();
        // print_r($types);die;
        return  View("modules.$this->model.search", compact('types'));
    }
    public function searchProperties(Request $request, $savedSearchId = 0)
    {

        $listRouteUrl = $this->listRouteUrl;
        $loggedInUserId = Auth::user()->id;


        // if (!empty($request->state_name) || !empty($request->city_name)) {
        //     $location = [];
        //     if (!empty($request->state_name)) {
        //         $location[$request->state_name] = $request->state_name;
        //     }
        //     if (!empty($request->city_name)) {
        //         $location[$request->city_name] = $request->city_name;
        //     }

        //     $request->merge(['location' => $location]);
        // }

        if (!empty($savedSearchId)) {
            $savedSearchData = SavedSearchCretaria::where('id', $savedSearchId)->first();
            if (empty($savedSearchData)) {
                Session()->flash('error', trans('messages.Invalid_request'));
                return redirect()->back();
            }
            $searchData = json_decode($savedSearchData->search_data, true);
            if (!empty($searchData['location'])) {
                $newLocationArray = [];
                foreach ($searchData['location'] as $location) {
                    $newLocationArray[$location] = $location;
                }
                $searchData['location'] = $newLocationArray;
            }
        } else {

            $searchData = $request->all();
            $searchData['commission_percentage'] = [
                "min_percentage" => $request->min_percentage,
                "max_percentage" => $request->max_percentage
            ];
            $searchData['net_price'] = [
                "min_net_price" => $request->min_net_price,
                "max_net_price" => $request->max_net_price
            ];
            $searchData['price_range'] = [
                "min_price" => $request->min_price,
                "max_price" => $request->max_price
            ];
            $searchData['list_agent_commission'] = [
                "min_commission" => $request->min_list_agent_per,
                "max_commission" => $request->max_list_agent_per
            ];
            $searchData['selling_agent_commission'] = [
                "min_commission" => $request->min_sell_agent_per,
                "max_commission" => $request->max_sell_agent_per
            ];
            $searchData['total_size'] = [
                "min_size" => $request->min_size,
                "max_size" => $request->max_size
            ];
            $searchData['valuation'] = [
                "min_valuation" => $request->min_valuation,
                "max_valuation" => $request->max_valuation
            ];
            $searchData['deed_value'] = [
                "min_deed_value" => $request->min_deed_value,
                "max_deed_value" => $request->max_deed_value
            ];
            $searchData['minimum_price'] = [
                "min_price" => $request->min_mini_price,
                "max_price" => $request->max_mini_price
            ];
            $searchData['community_fee'] = [
                "min_community_fee" => $request->min_comm_fees,
                "max_community_fee" => $request->max_comm_fees
            ];
            $searchData['garbage_tax'] = [
                "min_garbage_tax" => $request->min_garbage_tax,
                "max_garbage_tax" => $request->max_garbage_tax
            ];
            $searchData['ibi_fee'] = [
                "min_ibi_fees" => $request->min_ibi_fees,
                "max_ibi_fees" => $request->max_ibi_fees
            ];
            $searchData['built_size'] = [
                "min_built" => $request->min_built,
                "max_built" => $request->max_built
            ];
            $searchData['terrace'] = [
                "min_terrace" => $request->min_terrace,
                "max_terrace" => $request->max_terrace
            ];
            $searchData['garden_plot'] = [
                "min_garden_plot" => $request->min_garden_plot,
                "max_garden_plot" => $request->max_garden_plot
            ];
            $searchData['int_floor_space'] = [
                "min_properties_int_floor_space" => $request->min_properties_int_floor_space,
                "max_properties_int_floor_space" => $request->max_properties_int_floor_space
            ];
        }

        // For Reset Filter Action
        if (!empty($request->type) && $request->type == 'reset') {
            $searchData = [];
        }

        // Format the Range Sliders and other specific Data
        $mergeData = $this->mergeRangeSliderData($searchData);

        if (!empty($mergeData)) {
            $searchData = array_merge($searchData, $mergeData);
        }
        
        $agentId = getUserRoleId('agent');
        $developerId = getUserRoleId('developer');
        
        if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'customer') {
            $DB = Property::leftJoin('users', 'users.id', 'properties.owner_id')->select('properties.*', 'users.name as agent_name','users.image as agent_image' ,'users.city as agent_city', 'users.msg_to_collaborator_agents as messagefrom','users.phone as agent_phone','users.email as agent_email',
                 DB::raw('MAX(requests.status) as request_status'),DB::raw('(SELECT count(id) from saved_properties WHERE user_id = '.$loggedInUserId.' and property_id = properties.id) as is_saved_property'),
                 DB::raw('CASE 
                 WHEN users.user_role_id = '.$agentId.' OR users.user_role_id = '.$developerId.' 
                    THEN (SELECT company_name FROM user_company_details WHERE user_id = properties.owner_id LIMIT 1)
                    ELSE (SELECT company_name FROM user_company_details WHERE user_id = users.parent_user_id LIMIT 1)
                END AS user_company_name'),
                 DB::raw('CASE 
                 WHEN users.user_role_id = '.$agentId.' OR users.user_role_id = '.$developerId.' 
                    THEN (SELECT company_image FROM user_company_details WHERE user_id = properties.owner_id LIMIT 1)
                    ELSE (SELECT company_image FROM user_company_details WHERE user_id = users.parent_user_id LIMIT 1)
                END AS user_company_image'))
                

                ->leftJoin('requests', function ($join) use ($loggedInUserId) {
                    $join->on('users.id', '=', 'requests.to')
                        ->where('requests.from', '=', $loggedInUserId)
                        ->orWhere(function ($query) use ($loggedInUserId) {
                            $query->on('users.id', '=', 'requests.from')
                                ->where('requests.to', '=', $loggedInUserId);
                    });
                })
                ->when(auth()->user()->role->name == 'customer', function($query) use ($loggedInUserId) {
                    $query->leftJoin('users as parent_user', 'users.parent_user_id', '=', 'parent_user.id')
                        ->addSelect(
                            'parent_user.name as secondary_agent_name',
                            'parent_user.image as secondary_agent_image',
                            'parent_user.city as secondary_agent_city',
                            'parent_user.phone as secondary_agent_phone',
                            'parent_user.email as secondary_agent_email',
                            'parent_user.msg_to_collaborator_agents as secondary_messagefrom'
                        );
                })
            /*->when(auth()->user()->role->name == 'customer', function($query) use ($loggedInUserId) {
                $query->where('properties.owner_id',auth()->user()->parent_user_id)->leftJoin('requests as secondary_agent_requests', function($join) use ($loggedInUserId) {
                    $join->on('secondary_agent_requests.to', '=', DB::raw($loggedInUserId))
                         ->orOn('secondary_agent_requests.from', '=', DB::raw($loggedInUserId));
                })
                ->leftJoin('users as secondary_agent', 'secondary_agent.id', '=', 'secondary_agent_requests.from')
                ->addSelect(
                    'secondary_agent.name as secondary_agent_name',
                    'secondary_agent.image as secondary_agent_image',
                    'secondary_agent.city as secondary_agent_city',
                    'secondary_agent.phone as secondary_agent_phone',
                    'secondary_agent.email as secondary_agent_email'
                );
            })*/
            ->leftJoin('agent_leads', function ($join) use ($loggedInUserId) {
                $join->on('agent_leads.agent_id', '=', DB::raw($loggedInUserId))
                    ->on('agent_leads.owner_id', '=', 'properties.owner_id')
                    ->on('agent_leads.property_id', '=', 'properties.id');
            })
            ->addSelect(
                'agent_leads.id as lead_id'
            );
            /*if(auth()->user()->role->name == 'customer' ){
                $DB->leftJoin('requests as secondary_agent_requests', function($join) use ($loggedInUserId) {
                    $join->on('secondary_agent_requests.to', '=', DB::raw($loggedInUserId))
                         ->orOn('secondary_agent_requests.from', '=', DB::raw($loggedInUserId));
                })
                ->leftJoin('users as secondary_agent', 'secondary_agent.id', '=', 'secondary_agent_requests.from');
            }*/
        } else {

            $DB = Property::leftJoin('users', 'users.id', 'properties.owner_id')->select('properties.*', 'users.name as agent_name', DB::raw('(SELECT count(id) from saved_properties WHERE user_id = ' . $loggedInUserId . ' and property_id = properties.id) as is_saved_property'),DB::raw('CASE 
            WHEN users.user_role_id = '.$agentId.' OR users.user_role_id = '.$developerId.' 
               THEN (SELECT company_name FROM user_company_details WHERE user_id = properties.owner_id LIMIT 1)
               ELSE (SELECT company_name FROM user_company_details WHERE user_id = users.parent_user_id LIMIT 1)
           END AS user_company_name'),
            DB::raw('CASE 
            WHEN users.user_role_id = '.$agentId.' OR users.user_role_id = '.$developerId.' 
               THEN (SELECT company_image FROM user_company_details WHERE user_id = properties.owner_id LIMIT 1)
               ELSE (SELECT company_image FROM user_company_details WHERE user_id = users.parent_user_id LIMIT 1)
           END AS user_company_image'));
        }
        
        if (!empty($searchData)) {
            // All Range Sliders Filters
            if ((isset($searchData['min_price'])) && (isset($searchData['max_price']))) {
                $searchData['min_price'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['min_price']));
                $searchData['max_price'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['max_price']));
                if (empty($searchData['min_price'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.price', [0, $searchData['max_price']])
                            ->orWhereNull('properties.price');
                    });
                } else {
                    $DB->whereBetween('properties.price', [$searchData['min_price'], $searchData['max_price']]);
                }
            }
            if ((isset($searchData['min_size'])) && (isset($searchData['max_size']))) {
                $searchData['min_size'] = str_replace(',', '', $searchData['min_size']);
                $searchData['max_size'] = str_replace(',', '', $searchData['max_size']);
                if (empty($searchData['min_size'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.size', [0, $searchData['max_size']])
                            ->orWhereNull('properties.size');
                    });
                } else {
                    $DB->whereBetween('properties.size', [$searchData['min_size'], $searchData['max_size']]);
                }
            }

            if ((isset($searchData['min_long_price'])) && (isset($searchData['max_long_price']))) {
                $searchData['min_long_price'] = str_replace(',', '', $searchData['min_long_price']);
                $searchData['max_long_price'] = str_replace(',', '', $searchData['max_long_price']);

                if (empty($searchData['min_long_price'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.price', [0, $searchData['max_long_price']])
                            ->orWhereNull('properties.price');
                    });
                } else {
                    $DB->whereBetween('properties.price', [$searchData['min_long_price'], $searchData['max_long_price']]);
                }
            }

            if ((isset($searchData['min_short_price'])) && (isset($searchData['max_short_price']))) {
                $searchData['min_short_price'] = str_replace(',', '', $searchData['min_short_price']);
                $searchData['max_short_price'] = str_replace(',', '', $searchData['max_short_price']);
                if (empty($searchData['min_short_price'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.price', [0, $searchData['max_short_price']])
                            ->orWhereNull('properties.price');
                    });
                } else {
                    $DB->whereBetween('properties.price', [$searchData['min_short_price'], $searchData['max_short_price']]);
                }
            }

            if ((isset($searchData['min_net_price'])) && (isset($searchData['max_net_price']))) {
                $searchData['min_net_price'] = str_replace(',', '', $searchData['min_net_price']);
                $searchData['max_net_price'] = str_replace(',', '', $searchData['max_net_price']);
                if (empty($searchData['min_net_price'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.net_price', [0, $searchData['max_net_price']])
                            ->orWhereNull('properties.net_price');
                    });
                } else {
                    $DB->whereBetween('properties.net_price', [$searchData['min_net_price'], $searchData['max_net_price']]);
                }
            }

            if ((isset($searchData['min_percentage'])) && (isset($searchData['max_percentage']))) {
                $searchData['min_percentage'] = str_replace(',', '', $searchData['min_percentage']);
                $searchData['max_percentage'] = str_replace(',', '', $searchData['max_percentage']);
                if (empty($searchData['min_percentage'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.percentage', [0, $searchData['max_percentage']])
                            ->orWhereNull('properties.percentage');
                    });
                } else {
                    $DB->whereBetween('properties.percentage', [$searchData['min_percentage'], $searchData['max_percentage']]);
                }
            }

            // if ((isset($searchData['min_security_deposit'])) && (isset($searchData['max_security_deposit']))) {
            //     $searchData['min_security_deposit'] = str_replace(',', '', $searchData['min_security_deposit']);
            //     $searchData['max_security_deposit'] = str_replace(',', '', $searchData['max_security_deposit']);
            //     if(empty($searchData['min_security_deposit'])){
            //         $DB->whereBetween('properties.security_deposit', [$searchData['min_security_deposit'], $searchData['max_security_deposit']])->orWhereNull('properties.security_deposit');
            //     }else{
            //         $DB->whereBetween('properties.security_deposit', [$searchData['min_security_deposit'], $searchData['max_security_deposit']]);
            //     }
            // }

            if ((isset($searchData['min_list_agent_per'])) && (isset($searchData['max_list_agent_per']))) {
                $searchData['min_list_agent_per'] = str_replace(',', '', $searchData['min_list_agent_per']);
                $searchData['max_list_agent_per'] = str_replace(',', '', $searchData['max_list_agent_per']);
                if (empty($searchData['min_list_agent_per'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.list_agent_per', [0, $searchData['max_list_agent_per']])
                            ->orWhereNull('properties.list_agent_per');
                    });
                } else {
                    $DB->whereBetween('properties.list_agent_per', [$searchData['min_list_agent_per'], $searchData['max_list_agent_per']]);
                }
            }

            if ((isset($searchData['min_sell_agent_per'])) && (isset($searchData['max_sell_agent_per']))) {
                $searchData['min_sell_agent_per'] = str_replace(',', '', $searchData['min_sell_agent_per']);
                $searchData['max_sell_agent_per'] = str_replace(',', '', $searchData['max_sell_agent_per']);
                if (empty($searchData['min_sell_agent_per'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.sell_agent_per', [0, $searchData['max_sell_agent_per']])
                            ->orWhereNull('properties.sell_agent_per');
                    });
                } else {
                    $DB->whereBetween('properties.sell_agent_per', [$searchData['min_sell_agent_per'], $searchData['max_sell_agent_per']]);
                }
            }


            if ((isset($searchData['min_valuation'])) && (isset($searchData['max_valuation']))) {
                $searchData['min_valuation'] = str_replace(',', '', $searchData['min_valuation']);
                $searchData['max_valuation'] = str_replace(',', '', $searchData['max_valuation']);
                if (empty($searchData['min_valuation'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.valuation', [0, $searchData['max_valuation']])
                            ->orWhereNull('properties.valuation');
                    });
                } else {
                    $DB->whereBetween('properties.valuation', [$searchData['min_valuation'], $searchData['max_valuation']]);
                }
            }

            if ((isset($searchData['min_deed_value'])) && (isset($searchData['max_deed_value']))) {
                $searchData['min_deed_value'] = str_replace(',', '', $searchData['min_deed_value']);
                $searchData['max_deed_value'] = str_replace(',', '', $searchData['max_deed_value']);
                if (empty($searchData['min_deed_value'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.deed_value', [0, $searchData['max_deed_value']])
                            ->orWhereNull('properties.deed_value');
                    });
                } else {
                    $DB->whereBetween('properties.deed_value', [$searchData['min_deed_value'], $searchData['max_deed_value']]);
                }
            }

            if ((isset($searchData['min_mini_price'])) && (isset($searchData['max_mini_price']))) {
                $searchData['min_mini_price'] = str_replace(',', '', $searchData['min_mini_price']);
                $searchData['max_mini_price'] = str_replace(',', '', $searchData['max_mini_price']);
                if (empty($searchData['min_mini_price'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.mini_price', [0, $searchData['max_mini_price']])
                            ->orWhereNull('properties.mini_price');
                    });
                } else {
                    $DB->whereBetween('properties.mini_price', [$searchData['min_mini_price'], $searchData['max_mini_price']]);
                }
            }

            if ((isset($searchData['min_comm_fees'])) && (isset($searchData['max_comm_fees']))) {
                $searchData['min_comm_fees'] = str_replace(',', '', $searchData['min_comm_fees']);
                $searchData['max_comm_fees'] = str_replace(',', '', $searchData['max_comm_fees']);
                if (empty($searchData['min_comm_fees'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.comm_fees', [0, $searchData['max_comm_fees']])
                            ->orWhereNull('properties.comm_fees');
                    });
                } else {
                    $DB->whereBetween('properties.comm_fees', [$searchData['min_comm_fees'], $searchData['max_comm_fees']]);
                }
            }

            if ((isset($searchData['min_garbage_tax'])) && (isset($searchData['max_garbage_tax']))) {
                $searchData['min_garbage_tax'] = str_replace(',', '', $searchData['min_garbage_tax']);
                $searchData['max_garbage_tax'] = str_replace(',', '', $searchData['max_garbage_tax']);
                if (empty($searchData['min_garbage_tax'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.garbage_tax', [0, $searchData['max_garbage_tax']])
                            ->orWhereNull('properties.garbage_tax');
                    });
                } else {
                    $DB->whereBetween('properties.garbage_tax', [$searchData['min_garbage_tax'], $searchData['max_garbage_tax']]);
                }
            }

            if ((isset($searchData['min_ibi_fees'])) && (isset($searchData['max_ibi_fees']))) {
                $searchData['min_ibi_fees'] = str_replace(',', '', $searchData['min_ibi_fees']);
                $searchData['max_ibi_fees'] = str_replace(',', '', $searchData['max_ibi_fees']);
                if (empty($searchData['min_ibi_fees'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.ibi_fees', [0, $searchData['max_ibi_fees']])
                            ->orWhereNull('properties.ibi_fees');
                    });
                } else {
                    $DB->whereBetween('properties.ibi_fees', [$searchData['min_ibi_fees'], $searchData['max_ibi_fees']]);
                }
            }

            if ((isset($searchData['min_built'])) && (isset($searchData['max_built']))) {
                $searchData['min_built'] = str_replace(',', '', $searchData['min_built']);
                $searchData['max_built'] = str_replace(',', '', $searchData['max_built']);
                if (empty($searchData['min_built'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.built', [0, $searchData['max_built']])
                            ->orWhereNull('properties.built');
                    });
                } else {
                    $DB->whereBetween('properties.built', [$searchData['min_built'], $searchData['max_built']]);
                }
            }

            if ((isset($searchData['min_terrace'])) && (isset($searchData['max_terrace']))) {
                $searchData['min_terrace'] = str_replace(',', '', $searchData['min_terrace']);
                $searchData['max_terrace'] = str_replace(',', '', $searchData['max_terrace']);
                if (empty($searchData['min_terrace'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.terrace', [0, $searchData['max_terrace']])
                            ->orWhereNull('properties.terrace');
                    });
                } else {
                    $DB->whereBetween('properties.terrace', [$searchData['min_terrace'], $searchData['max_terrace']]);
                }
            }

            if ((isset($searchData['min_garden_plot'])) && (isset($searchData['max_garden_plot']))) {
                $searchData['min_garden_plot'] = str_replace(',', '', $searchData['min_garden_plot']);
                $searchData['max_garden_plot'] = str_replace(',', '', $searchData['max_garden_plot']);
                if (empty($searchData['min_garden_plot'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.garden_plot', [0, $searchData['max_garden_plot']])
                            ->orWhereNull('properties.garden_plot');
                    });
                } else {
                    $DB->whereBetween('properties.garden_plot', [$searchData['min_garden_plot'], $searchData['max_garden_plot']]);
                }
            }

            if ((isset($searchData['min_properties_int_floor_space'])) && (isset($searchData['max_properties_int_floor_space']))) {
                $searchData['min_properties_int_floor_space'] = str_replace(',', '', $searchData['min_properties_int_floor_space']);
                $searchData['max_properties_int_floor_space'] = str_replace(',', '', $searchData['max_properties_int_floor_space']);
                if (empty($searchData['min_properties_int_floor_space'])) {
                    $DB->where(function ($query) use ($searchData) {
                        $query->whereBetween('properties.properties_int_floor_space', [0, $searchData['max_properties_int_floor_space']])
                            ->orWhereNull('properties.properties_int_floor_space');
                    });
                } else {
                    $DB->whereBetween('properties.properties_int_floor_space', [$searchData['min_properties_int_floor_space'], $searchData['max_properties_int_floor_space']]);
                }
            }


            if (!empty($searchData['state_name'])) {
                $DB->where('properties.state', $searchData['state_name']);
            }
            if (!empty($searchData['city_name'])) {
                $DB->where('properties.city', $searchData['city_name']);
            }
            if (!empty($searchData['location'])) {
                $DB->where(function ($query) use ($searchData) {
                    $query->whereIn('properties.street_number', $searchData['location'])
                        ->orWhereIn('properties.street_name', $searchData['location']);
                });
            }

            if ((!empty($searchData['property_title']))) {
                $DB->where('properties.name', 'like', '%' . $searchData['property_title'] . '%');
            }
            if ((!empty($searchData['type_id']))) {
                if ($searchData['type_id'][0] != 10) {
                    $DB->whereIn('properties.type_id', $searchData['type_id']);
                } else {
                    $now = Carbon::now()->subMinutes(2880);
                    $DB->where('properties.created_at', '>', $now);
                }
            }
            if ((!empty($searchData['subtype_id']))) {
                $DB->whereIn('properties.subtype_id', $searchData['subtype_id']);
            }
            if ((!empty($searchData['situation_id']))) {
                $DB->whereIn('properties.situation_id', $searchData['situation_id']);
            }
            if ((!empty($searchData['listed_as']))) {
                $DB->where('properties.listed_as', $searchData['listed_as']);
            }
            if ((!empty($searchData['status_completion']))) {
                $DB->where('properties.status_completion', $searchData['status_completion']);
            }
            if ((!empty($searchData['reference']))) {
                $DB->where('properties.reference', $searchData['reference']);
            }
            if ((!empty($searchData['floors'])) && $searchData['floors'] != 'any') {
                $DB->where('properties.floors', '>=', $searchData['floors']);
            }
            if ((!empty($searchData['bedrooms'])) && $searchData['bedrooms'] != 'any') {
                $DB->where('properties.bedrooms', '>=', $searchData['bedrooms']);
            }
            if ((!empty($searchData['bathrooms'])) && $searchData['bathrooms'] != 'any') {
                $DB->where('properties.bathrooms', '>=', $searchData['bathrooms']);
            }
            if ((!empty($searchData['storeys'])) && $searchData['storeys'] != 'any') {
                $DB->where('properties.storeys', '>=', $searchData['storeys']);
            }
            if ((!empty($searchData['no_of_properties_builtin'])) && $searchData['no_of_properties_builtin'] != 'any') {
                $DB->where('properties.no_of_properties_builtin', '>=', $searchData['no_of_properties_builtin']);
            }
            if ((!empty($searchData['levels'])) && $searchData['levels'] != 'any') {
                $DB->where('properties.levels', '>=', $searchData['levels']);
            }
            if ((!empty($searchData['agency_ref'])) && $searchData['agency_ref'] != 'any') {
                $DB->where('properties.agency_ref', '>=', $searchData['agency_ref']);
            }

            if ((!empty($searchData['valuation_year']))) {
                $DB->where('properties.valuation_year', $searchData['valuation_year']);
            }
            if ((!empty($searchData['dimension_type']))) {
                $DB->where('properties.dimension_type', $searchData['dimension_type']);
            }

            if (!empty($searchData['featureIds'])) {

                $DB->join('property_features', 'property_features.property_id', '=', 'properties.id')
                    ->whereIn('property_features.sub_feature_id', $searchData['featureIds']);
            }
        }


        if (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin') {
            $DB->orderBy('properties.created_at', 'desc');
        } else {

            if (!empty($request->sortBy) && $request->sortBy == 'price_asc') {
                $DB->orderBy('properties.price', 'asc');
            } else if (!empty($request->sortBy) && $request->sortBy == 'price_desc') {
                $DB->orderBy('properties.price', 'desc');
            } else if (!empty($request->sortBy) && $request->sortBy == 'area_asc') {
                $DB->orderBy('properties.size', 'asc');
            } else if (!empty($request->sortBy) && $request->sortBy == 'area_desc') {
                $DB->orderBy('properties.size', 'desc');
            } else if (!empty($request->sortBy) && $request->sortBy == 'last_update') {
                $DB->orderBy('properties.updated_at', 'desc');
            } else if (!empty($request->sortBy) && $request->sortBy == 'newest') {
                $DB->orderBy('properties.created_at', 'desc');
            } else if (!empty($request->sortBy) && $request->sortBy == 'oldest') {
                $DB->orderBy('properties.created_at', 'asc');
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
        $DB->whereNull('properties.deleted_at');

        $results = $DB->groupBy('properties.id')->paginate($recordsPerPage);
        // echo "<pre>"; print_r($results);die;
        if ($results->isNotEmpty()) {
            foreach ($results as $result) {
                $result->isHidden = ((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'sub-developer' || auth()->user()->role->name == 'developer') && $result->owner_id != auth()->user()->id && empty(areAgentFriends(auth()->user()->id, $result->owner_id))) ? true : false;
            }
        }
        $listingType = 'property-search';
        // if (empty($searchData)) {
        //     $results = collect([]);
        // }
        // dd($searchData);

        $totalResults = $results->total();
        if ($request->ajax()) {
            $tableData =  View("components.tables.custom-table", compact('results', 'listingType', 'searchData'))->render();
            $paginationData =  View("components.tables.pagination", compact('results', 'listingType'))->render();
            $type = 'only_text';
            $paginationText = View("components.tables.pagination", compact('results', 'listingType', 'type'))->render();
            $filtersAppliedData = View("modules.properties.includes.filters_applied_data", compact('searchData', 'totalResults'))->render();

            $response = array();
            $response["status"] = "success";
            $response["msg"] = "";
            $response['tableData'] = $tableData;
            $response['paginationData'] = $paginationData;
            $response['paginationText'] = $paginationText;
            $response['filtersAppliedData'] = $filtersAppliedData;
            $response['listingType'] = $listingType;
            $response["http_code"] = 200;
            return Response::json($response, 200);
        } else {

            $features = Feature::with('subFeature')->select('name', 'id', 'icon')->get();
            $maxPriceAndSize = Property::whereNull('deleted_at')
                ->select(
                    DB::raw('CEIL(max(price)) as max_price'),
                    DB::raw('CEIL(max(size)) as max_size'),
                    DB::raw('CEIL(max(net_price)) as max_net_price'),
                    DB::raw('CEIL(max(valuation)) as max_valuation'),
                    DB::raw('CEIL(max(deed_value)) as max_deed_value'),
                    DB::raw('CEIL(max(mini_price)) as max_mini_price'),
                    DB::raw('CEIL(max(comm_fees)) as max_comm_fees'),
                    DB::raw('CEIL(max(ibi_fees)) as max_ibi_fees'),
                    DB::raw('CEIL(max(garbage_tax)) as max_garbage_tax'),
                    DB::raw('CEIL(max(built)) as max_built'),
                    DB::raw('CEIL(max(terrace)) as max_terrace'),
                    DB::raw('CEIL(max(garden_plot)) as max_garden_plot'),
                    DB::raw('CEIL(max(properties_int_floor_space)) as max_properties_int_floor_space')
                )
                ->first();

            $connectAgent=null;
            if (!empty(auth()->user()->parent_user_id)) {

                $connectAgent = User::find(auth()->user()->parent_user_id);
            }
            return  View("modules.$this->model.search_advance_property", compact('results', 'listingType', 'features', 'maxPriceAndSize', 'searchData', 'totalResults', 'listRouteUrl', 'savedSearchId','connectAgent'));
        }
    }

    public function isAlreadySavedSearchData($currentData, $storedData)
    {
        $currentData = array_filter($currentData);
        $storedData = array_filter($storedData);
        return $currentData !== $storedData;
    }

    public function mergeRangeSliderData($searchData)
    {
        $mergeData = [];
        if (!empty($searchData['min_price'])) {
            $mergeData['min_price'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['min_price']));
        }
        if (!empty($searchData['max_price'])) {
            $mergeData['max_price'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['max_price']));
        }

        if (!empty($searchData['min_long_price'])) {
            $mergeData['min_long_price'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['min_long_price']));
        }
        if (!empty($searchData['max_long_price'])) {
            $mergeData['max_long_price'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['max_long_price']));
        }

        if (!empty($searchData['min_short_price'])) {
            $mergeData['min_short_price'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['min_short_price']));
        }
        if (!empty($searchData['max_short_price'])) {
            $mergeData['max_short_price'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['max_short_price']));
        }

        if (!empty($searchData['min_percentage'])) {
            $mergeData['min_percentage'] = str_replace('%', '', str_replace(',', '', $searchData['min_percentage']));
        }
        if (!empty($searchData['max_percentage'])) {
            $mergeData['max_percentage'] = str_replace('%', '', str_replace(',', '', $searchData['max_percentage']));
        }

        if (!empty($searchData['min_security_deposit'])) {
            $mergeData['min_security_deposit'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['min_security_deposit']));
        }
        if (!empty($searchData['max_security_deposit'])) {
            $mergeData['max_security_deposit'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['max_security_deposit']));
        }

        if (!empty($searchData['min_list_agent_per'])) {
            $mergeData['min_list_agent_per'] = str_replace('%', '', str_replace(',', '', $searchData['min_list_agent_per']));
        }
        if (!empty($searchData['max_list_agent_per'])) {
            $mergeData['max_list_agent_per'] = str_replace('%', '', str_replace(',', '', $searchData['max_list_agent_per']));
        }

        if (!empty($searchData['min_sell_agent_per'])) {
            $mergeData['min_sell_agent_per'] = str_replace('%', '', str_replace(',', '', $searchData['min_sell_agent_per']));
        }
        if (!empty($searchData['max_sell_agent_per'])) {
            $mergeData['max_sell_agent_per'] = str_replace('%', '', str_replace(',', '', $searchData['max_sell_agent_per']));
        }

        if (!empty($searchData['min_size'])) {
            $mergeData['min_size'] = str_replace('ft', '', str_replace(',', '', $searchData['min_size']));
        }
        if (!empty($searchData['max_size'])) {
            $mergeData['max_size'] = str_replace('ft', '', str_replace(',', '', $searchData['max_size']));
        }

        if (!empty($searchData['min_built'])) {
            $mergeData['min_built'] = str_replace('ft²', '', str_replace(',', '', $searchData['min_built']));
        }
        if (!empty($searchData['max_built'])) {
            $mergeData['max_built'] = str_replace('ft²', '', str_replace(',', '', $searchData['max_built']));
        }

        if (!empty($searchData['min_terrace'])) {
            $mergeData['min_terrace'] = str_replace('ft²', '', str_replace(',', '', $searchData['min_terrace']));
        }
        if (!empty($searchData['max_terrace'])) {
            $mergeData['max_terrace'] = str_replace('ft²', '', str_replace(',', '', $searchData['max_terrace']));
        }

        if (!empty($searchData['min_garden_plot'])) {
            $mergeData['min_garden_plot'] = str_replace('ft²', '', str_replace(',', '', $searchData['min_garden_plot']));
        }
        if (!empty($searchData['max_garden_plot'])) {
            $mergeData['max_garden_plot'] = str_replace('ft²', '', str_replace(',', '', $searchData['max_garden_plot']));
        }

        if (!empty($searchData['min_properties_int_floor_space'])) {
            $mergeData['min_properties_int_floor_space'] = str_replace('ft', '', str_replace(',', '', $searchData['min_properties_int_floor_space']));
        }
        if (!empty($searchData['max_properties_int_floor_space'])) {
            $mergeData['max_properties_int_floor_space'] = str_replace('ft', '', str_replace(',', '', $searchData['max_properties_int_floor_space']));
        }

        if (!empty($searchData['min_net_price'])) {
            $mergeData['min_net_price'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['min_net_price']));
        }
        if (!empty($searchData['max_net_price'])) {
            $mergeData['max_net_price'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['max_net_price']));
        }

        if (!empty($searchData['min_valuation'])) {
            $mergeData['min_valuation'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['min_valuation']));
        }
        if (!empty($searchData['max_valuation'])) {
            $mergeData['max_valuation'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['max_valuation']));
        }

        if (!empty($searchData['min_deed_value'])) {
            $mergeData['min_deed_value'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['min_deed_value']));
        }
        if (!empty($searchData['max_deed_value'])) {
            $mergeData['max_deed_value'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['max_deed_value']));
        }

        if (!empty($searchData['min_mini_price'])) {
            $mergeData['min_mini_price'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['min_mini_price']));
        }
        if (!empty($searchData['max_mini_price'])) {
            $mergeData['max_mini_price'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['max_mini_price']));
        }

        if (!empty($searchData['min_comm_fees'])) {
            $mergeData['min_comm_fees'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['min_comm_fees']));
        }
        if (!empty($searchData['max_comm_fees'])) {
            $mergeData['max_comm_fees'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['max_comm_fees']));
        }

        if (!empty($searchData['min_ibi_fees'])) {
            $mergeData['min_ibi_fees'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['min_ibi_fees']));
        }
        if (!empty($searchData['max_ibi_fees'])) {
            $mergeData['max_ibi_fees'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['max_ibi_fees']));
        }

        if (!empty($searchData['min_garbage_tax'])) {
            $mergeData['min_garbage_tax'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['min_garbage_tax']));
        }
        if (!empty($searchData['max_garbage_tax'])) {
            $mergeData['max_garbage_tax'] = str_replace(config('Reading.default_currency'), '', str_replace(',', '', $searchData['max_garbage_tax']));
        }
        return $mergeData;
    }

    public function submitPropertySearch(Request $request)
    {
        $searchData = $request->all();
        if (!empty($searchData)) {
            $validator = Validator::make(
                $request->all(),
                array(
                    'state_name' => 'required',
                    // 'city_name' => 'required',
                ),
                array(

                    "state_name.required" => trans("The state/province field is required"),
                    // "city_name.required" => trans("The city field is required")

                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                $response = array();
                $response["status"] = "success";
                $response["msg"] = "";
                $response["data"] =  (object) array();
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


    public function advanceSearchproPertiesSave(Request $request)
    {
        $searchData = $request->all();
        if (!empty($searchData)) {
            $validator = Validator::make(
                $request->all(),
                array(
                    'search_name' => 'required',
                ),
                array(

                    "search_name.required" => trans("The saving name field is required")

                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                $totalSavedSearchOfThisUser = SavedSearchCretaria::where('user_id', auth()->user()->id)->where('type', 'property')->count();
                if ($totalSavedSearchOfThisUser >= config('Modules.properties.saved_search_limit')) {
                    $validator->errors()->add('search_name', trans('You cannot save more than ' . config('Modules.properties.saved_search_limit') . ' searches'));
                    $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                    return Response::json($response, 200);
                }
                $data = new SavedSearchCretaria();
                $data->user_id = auth()->user()->id;
                $data->search_name = !empty($request->search_name) ? $request->search_name : NULL;
                $data->type = 'property';
                $data->search_data = json_encode($searchData);
                $data->total_search_result_count = !empty($request->total_search_result_count) ? $request->total_search_result_count : 0;
                $data->save();
                $response = array();
                $response["status"] = "success";
                $response["msg"] = trans("Search Successfully Saved");
                $response["data"] =  route(routeNamePrefix() . 'properties.save_search_data');
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

    public function saveSearchProperty()
    {
        $loggedInUserId = Auth::user()->id;
        $data = SavedSearchCretaria::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        $savedPropertiesData = SavedProperties::where('saved_properties.user_id', auth()->user()->id)->leftJoin('properties', 'properties.id', 'saved_properties.property_id')->leftJoin('users', 'users.id', 'properties.owner_id')->select('properties.*', 'users.name as agent_name', DB::raw('(SELECT count(id) from saved_properties WHERE user_id = ' . $loggedInUserId . ' and property_id = properties.id) as is_saved_property'))->orderBy('saved_properties.created_at', 'desc')->get();
        if ($savedPropertiesData->isNotEmpty()) {
            foreach ($savedPropertiesData as $result) {
                $result->isHidden = ((auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'sub-developer' || auth()->user()->role->name == 'developer') && $result->owner_id != auth()->user()->id && empty(areAgentFriends(auth()->user()->id, $result->owner_id))) ? true : false;
                $result->cover_image = getFileUrl($result->cover_image, 'properties');
            }
        }
        $listingType = 'property-search';

        return  View("modules.$this->model.save_search", compact('data', 'savedPropertiesData', 'listingType'));
    }

    public function addProperty($propertyId)
    {
        $data = SavedProperties::where('property_id', $propertyId)->where('user_id', auth()->user()->id)->first();
        if (!empty($data)) {
            $data->delete();
        } else {
            $data = new SavedProperties();
            $data->user_id = auth()->user()->id;
            $data->property_id = $propertyId;
            $data->save();
        }
        $response = array();
        $response["status"] = "success";
        return Response::json($response, 200);
    }


    public function deleteSavedSearch($id, Request $request)
    {
        $savedSearch = SavedSearchCretaria::where('id', $id)->first();;
        if (!empty($savedSearch)) {

            $savedSearch->delete();
            Session()->flash('success', 'Saved Search Removed Successfully');
            return redirect()->back();
        } else {
            Session()->flash('error', trans('messages.Invalid_request'));
            return redirect()->back();
        }
    }
    public function isNotificableUpdate($id, Request $request)
    {
        $savedSearch = SavedSearchCretaria::where('id', $id)->first();;
        if (!empty($savedSearch)) {

            SavedSearchCretaria::where('id', $id)->update(['is_notifiable' => ($savedSearch->is_notifiable == 1) ? 0 : 1]);
            $response = array();
            $response["status"] = "success";
            $response["msg"] = ($savedSearch->is_notifiable == 1) ? 'Saved Search Notifications is Now Disabled' : 'Saved Search Notifications is Now Enabled';
            $response["data"] =  (object) array();
            $response["http_code"] = 200;
            return Response::json($response, 200);
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }
}
