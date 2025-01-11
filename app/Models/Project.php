<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use App\Models\ProjectAgent;
use App\Models\ProjectCustomer;
use App\Models\ProjectTask;
use App\Models\ProjectAttachment;
use App\Models\ProjectRecentActivity;
class Project extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'projct_name',
        'project_description',
        'project_type',
        'project_budget ',
        'start_date',
        'end_date',
        'project_location',
        'latitude',
        'project_id',
        'longitude',
        'deleted_at',
        'is_active'

    ];

    // const STATUS = [
    //     'in_progress' => 'In Progress',
    //     'completed' => 'Completed',
    //     'overdue' => 'Overdue'
    // ];
    const STATUS = [
        'in_progress' => "project.in_progress",
        'completed' => "project.completed",
        'overdue' => "project.overdue"
    ];

    public const PROJECT_TYPE = [
        'for_sale' => 'project-listing.For_Sale',
        'for_rent' => 'project-listing.For_Rent',
        'coming_soon' => 'project-listing.Coming_Soon'
    ];

    public function project_agents()
    {
        return $this->hasMany(ProjectAgent::class, 'project_id');
    }

    public function project_customers()
    {
        return $this->hasMany(ProjectCustomer::class, 'project_id');
    }

    public function project_tasks()
    {
        return $this->hasMany(ProjectTask::class, 'project_id');
    }

    public function fetchProjects($data = [],$requestData = [],$requiredData = []){

        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $recordsPerPage = Config("Reading.records_per_page");
        $projectsData = Project::with('project_tasks.projectTaskAssign.assignBy','project_tasks.taskSubType');

        if(in_array('collaborated',$requiredData)){
            $projectsData->where(function ($query) use ($loggedInUserId) {
                $query->orWhereHas('project_agents', function ($query) use ($loggedInUserId) {
                        $query->where('agent_id', $loggedInUserId)->where('is_project_owner', 0);
                    })
                    ->orWhereHas('project_customers', function ($query) use ($loggedInUserId) {
                        $query->where('customer_id', $loggedInUserId);
                    });
            })
            ->whereNull('projects.deleted_at');
        }else{
            $projectsData->where(function ($query) use ($loggedInUserId) {
                $query->where('projects.owner_id', $loggedInUserId)
                    ->orWhereHas('project_agents', function ($query) use ($loggedInUserId) {
                        $query->where('agent_id', $loggedInUserId);
                    })
                    ->orWhereHas('project_customers', function ($query) use ($loggedInUserId) {
                        $query->where('customer_id', $loggedInUserId);
                    });
            })
            ->whereNull('projects.deleted_at');
        }

        if(!empty($data['status'])){
            $projectsData->where('projects.status',$data['status']);
        }

        $projectsData->leftJoin('users', 'users.id', 'projects.owner_id')
        ->select('projects.*', 'users.name as owner_name','users.image as ownerImage',DB::raw('null as project_attachments'),DB::raw('null as project_agents'),DB::raw('null as project_customers'));

        if(!empty($data['perPage'])){
            $results = $projectsData->groupBy('projects.id')->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $projectsData->count();
        }
        else{
            $results = $projectsData->groupBy('projects.id')->get();
        }
        if(!is_numeric($results) && $results->isNotEmpty() && !empty($requiredData) && empty($data['fetchCount'])){

            foreach($results as $result){
                if(in_array('project_properties',$requiredData)){

                }
                if(in_array('project_agents',$requiredData)){
                    $projectAgentInstance = new ProjectAgent();
                    $result->project_agents = $projectAgentInstance->loadProjectAgents(['perPage' =>  $recordsPerPage,'projectId' => $result->id,'userId' => $loggedInUserId ],[],[]);
                }
                if(in_array('project_customers',$requiredData)){
                    $projectCustomerInstance = new ProjectCustomer();
                    $result->project_customers = $projectCustomerInstance->loadProjectCustomers(['perPage' =>  $recordsPerPage,'projectId' => $result->id,'userId' => $loggedInUserId ],[],[]);
                }
                if(in_array('project_tasks',$requiredData)){
                    $projectTaskInstance = new ProjectTask();
                    $result->project_tasks = $projectTaskInstance->loadProjectTasks(['perPage' => $recordsPerPage,'projectId' => $result->id,'userId' => $loggedInUserId ],[],[]);
                    if($result->project_tasks->total() > 0){

                        $completedTasksCount = $projectTaskInstance->loadProjectTasks(['fetchCount' => true,'projectId' => $result->id,'userId' => $loggedInUserId, 'status' => 'completed' ],[],[]);
                        $result->project_tasks_completed_percentage = ($completedTasksCount / $result->project_tasks->total()) * 100;
                    }

                }

            }
        }

        return $results;
    }


    public function getProjectDetails($slug,$data,$requiredData = []){

        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $recordsPerPage = Config("Reading.records_per_page");
        $result = Project::where('projects.slug',$slug)->whereNull('projects.deleted_at')->leftJoin('users', 'users.id', 'projects.owner_id')
        ->select('projects.*', 'users.name as owner_name','users.image as ownerImage',DB::raw('null as project_attachments'),DB::raw('null as project_agents'),DB::raw('null as project_customers'),DB::raw('null as project_tasks'))->groupBy('projects.id')->first();


        if(!empty($result) && !empty($requiredData)){

            if(in_array('project_properties',$requiredData)){
                $projectPropertyInstance = new ProjectProperty();
                $result->project_properties = $projectPropertyInstance->loadProjectProperties(['perPage' => $recordsPerPage,'projectId' => $result->id,'userId' => $loggedInUserId ],[],[]);
            }
            if(in_array('project_agents',$requiredData)){
                $projectAgentInstance = new ProjectAgent();
                $result->project_agents = $projectAgentInstance->loadProjectAgents(['perPage' => $recordsPerPage,'projectId' => $result->id,'userId' => $loggedInUserId ],[],['agent_permissions']);
            }
            if(in_array('project_customers',$requiredData)){
                $projectCustomerInstance = new ProjectCustomer();
                $result->project_customers = $projectCustomerInstance->loadProjectCustomers(['perPage' => $recordsPerPage,'projectId' => $result->id,'userId' => $loggedInUserId ],[],[]);
            }
            if(in_array('project_tasks',$requiredData)){
                $projectTaskInstance = new ProjectTask();
                $result->project_tasks = $projectTaskInstance->loadProjectTasks(['perPage' => $recordsPerPage,'projectId' => $result->id,'userId' => $loggedInUserId ],[],[]);
            }

            if(in_array('project_attachments',$requiredData)){
                $projectAttachmentInstance = new ProjectAttachment();
                $result->project_attachments = $projectAttachmentInstance->loadProjectAttachments(['perPage' => $recordsPerPage,'projectId' => $result->id,'userId' => $loggedInUserId ],[],[]);
            }
            if(in_array('project_events',$requiredData)){
                $eventInstance = new Event();
                $result->project_events = $eventInstance->fetchEvents(['perPage' => $recordsPerPage,'projectId' => $result->id,'userId' => $loggedInUserId ],[],[]);
            }
            if(in_array('project_recent_activities',$requiredData)){
                $recentActivityInstance = new ProjectRecentActivity();
                $result->project_recent_activities = $recentActivityInstance->loadProjectRecentActivities(['perPage' => $recordsPerPage,'projectId' => $result->id,'userId' => $loggedInUserId ],[],['activity_data']);
            }

        }

        return $result;
    }

    public function associations()
    {
        return $this->hasMany(EventAssociation::class);
    }



}
