<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProjectTask extends Model
{
    use HasFactory;
    // const STATUS = [
    //     'active' => 'Active',
    //     'completed' => 'Completed',
    //     'pending' => 'Pending'
    // ];

    const STATUS = [
        'active' => 'project_task.active',
        'completed' => 'project_task.completed',
        'pending' => 'project_task.pending'
    ];
    public function loadProjectTasks($data,$requestData,$requiredData){
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $userData = ProjectTask::with('taskType','taskSubType','projectTaskAssign.assignTo','projectTaskAssign.assignBy')->leftJoin('users','project_tasks.added_by','users.id');
        
        if(!empty($data['projectId'])){
            $userData->where('project_tasks.project_id',$data['projectId']);
        }
        if (!empty($data['taskId'])) {
            $userData->whereHas('projectTaskAssign', function ($query) use ($data) {
                $query->where('project_task_id', $data['taskId']);
            });
            
        }

        if(!empty($requestData['search_input_task'])){
            $searchData = $requestData['search_input_task'];
            $userData->where(function ($query) use($searchData){
                $query->Orwhere("project_tasks.task_name","LIKE","%".$searchData."%");
                $query->Orwhere("project_tasks.status","LIKE","%".$searchData."%");
            });
        }
        if(!empty($data['status'])){
            $userData->where('project_tasks.status',$data['status']);
        }
        
        $userData->orderBy('project_tasks.created_at','desc');

        
        $userData->select('project_tasks.*','users.name as added_by_name');
        
        if(!empty($data['perPage'])){
            $results = $userData->groupBy('project_tasks.id')->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $userData->count();
        }else{
            $results = $userData->groupBy('project_tasks.id')->get();
        }
        return $results; 
    }

    public function taskSubType()
    {
        return $this->hasOne(TaskSubType::class, 'id', 'sub_task_id');
    }
    public function taskType()
    {
        return $this->hasOne(TaskType::class, 'id', 'task_id');
    }
    public function projectTaskAssign()
    {
        return $this->hasMany(ProjectTaskAssign::class, 'project_task_id', 'id');
    }
   
}
