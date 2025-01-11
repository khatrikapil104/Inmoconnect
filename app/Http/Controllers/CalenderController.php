<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use  App\Models\Project;
use  App\Models\Event;
use  App\Models\Property;
use  App\Models\User;
use App\Models\Role;
use App\Models\UserFileFolders;
use DB,Redirect,Response,Auth,File;
use Illuminate\Validation\Rule;

class CalenderController extends Controller
{
    public $model        =    'calender';
    public $filterName        =    'calenderSearchFilterData';
    public $listRouteUrl;
    public function __construct(Request $request){
        parent::__construct();
        $this->middleware(function ($request, $next) {

            $this->listRouteUrl = route(routeNamePrefix().'calender.index');
            return $next($request);
        });
        View()->share('model', $this->model);
        View()->share('listRouteUrl', $this->listRouteUrl);
        View()->share('filterName', $this->filterName);
        $this->request = $request;

    }
    public function index(Request $request){
        $requestData = $request->all();
        $loggedInUserId = auth()->user()->id;
        $agentRoleId = Role::where('name','agent')->value('id');
        $customerRoleId = Role::where('name','customer')->value('id');
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $eventInstance = new Event();
        $events = $eventInstance->fetchEvents(['perPage' => '','userId' => ''],[],['user_associations']);

        $projectInstance = new Project();
        $agentProjects = $projectInstance->fetchProjects(['perPage' => $recordsPerPage,'userId' => $loggedInUserId],[],[]);

        $propertyInstance = new Property();
        $agentProperties = $propertyInstance->loadPropertiesByAgentId(['perPage' => $recordsPerPage,'userId' => $loggedInUserId],$requestData);

        $userInstance = new User();
        $connectedAgentsData = $userInstance->loadUserConnectedUsersData(['perPage' => $recordsPerPage,'userRoleName' => 'agent','userId' => $loggedInUserId],$requestData);
        $connectedCustomersData = $userInstance->loadUserConnectedUsersData(['perPage' => $recordsPerPage,'userRoleName' => 'customer','userId' => $loggedInUserId],$requestData);

        $folderInstance = new UserFileFolders();
        $folders = $folderInstance->loadUserFolder(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], $request->all(), []);

        $agentProjectsArray = [];
        if($agentProjects->isNotEmpty()){
            foreach($agentProjects as $agentProject){
                $agentProjectsArray[$agentProject->id] =  $agentProject->project_name;
            }
        }

        $agentPropertiesArray = [];
        if($agentProperties->isNotEmpty()){
            foreach($agentProperties as $agentProperty){
                $agentPropertiesArray[$agentProperty->id] = ['label' => $agentProperty->name, 'image' => (!empty($agentProperty->cover_image) ) ? $agentProperty->cover_image : asset('img/default-property.jpg') ];
            }
        }

        $connectedCustomersArray = [];
        if($connectedCustomersData->isNotEmpty()){
            foreach($connectedCustomersData as $connectAgent){
                $connectedCustomersArray[$connectAgent->id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image) ) ? $connectAgent->image : asset('img/default-user.jpg')  ];
            }
        }

        $connectedAgentsArray = [];
        if($connectedAgentsData->isNotEmpty()){
            foreach($connectedAgentsData as $connectAgent){
                $connectedAgentsArray[$connectAgent->id] = ['label' => $connectAgent->name, 'image' => (!empty($connectAgent->image) ) ? $connectAgent->image : asset('img/default-user.jpg')  ];
            }
        }


        $timeArray = $this->generateTimeArray();
        // echo "<pre>"; print_r($events);die;
        return View("modules.$this->model.index",compact('events','timeArray', 'agentProjectsArray', 'agentPropertiesArray', 'connectedCustomersArray', 'connectedAgentsArray','folders'));
    }



}
