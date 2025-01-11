<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class UserCompanyTask extends Model
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
    public function loadUserCompanyTasks($data,$requestData,$requiredData){
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $userData = UserCompanyTask::with('userCompanyTaskAssign.assignTo','userCompanyTaskAssign.assignBy')->leftJoin('users','user_company_tasks.added_by','users.id');
        
        if(!empty($data['companyId'])){
            $userData->where('user_company_tasks.company_id',$data['companyId']);
        }
        if (!empty($data['taskId'])) {
            $userData->whereHas('userCompanyTaskAssign', function ($query) use ($data) {
                $query->where('user_task_id', $data['taskId']);
            });
            
        }

        if(!empty($requestData['search_input_task'])){
            $searchData = $requestData['search_input_task'];
            $userData->where(function ($query) use($searchData){
                $query->Orwhere("user_company_tasks.task_name","LIKE","%".$searchData."%");
                $query->Orwhere("user_company_tasks.status","LIKE","%".$searchData."%");
            });
        }
        if(!empty($data['status'])){
            $userData->where('user_company_tasks.status',$data['status']);
        }
        
        $userData->orderBy('user_company_tasks.created_at','desc');

        
        $userData->select('user_company_tasks.*','users.name as added_by_name');
        
        if(!empty($data['perPage'])){
            $results = $userData->groupBy('user_company_tasks.id')->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $userData->count();
        }else{
            $results = $userData->groupBy('user_company_taskss.id')->get();
        }
        return $results; 
    }

    public function userCompanyTaskAssign()
    {
        return $this->hasMany(UserCompanyTaskAssign::class, 'user_task_id', 'id');
    }
   
}
