<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProjectCustomer extends Model
{
    use HasFactory;

    public function projectTaskAssign()
    {
        return $this->hasMany(ProjectTaskAssign::class, 'project_task_id', 'id');
    }
    
    public function loadProjectCustomers($data,$requestData,$requiredData){
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $userData = ProjectCustomer:: leftJoin('users','project_customers.customer_id','users.id')->leftJoin('users as users_added_by','project_customers.added_by','users_added_by.id');
        if(!empty($data['projectId'])){
            $userData->where('project_customers.project_id',$data['projectId']);
        }
        if(!empty($data['projectSlug'])){
            $userData->leftJoin('projects','projects.id','project_customers.project_id')->where('projects.slug',$data['projectSlug']);
        }

        if(!empty($requestData['search_input_customer'])){
            $searchData = $requestData['search_input_customer'];
            $userData->where(function ($query) use($searchData){
                $query->Orwhere("users.name","LIKE","%".$searchData."%");
                $query->Orwhere("users.email","LIKE","%".$searchData."%");
                $query->Orwhere("users.phone","LIKE","%".$searchData."%");
            });
        }
        $userData->orderBy('users.created_at','desc');

        
        // $userData->select('users.*','users_added_by.name as added_by_name')->groupBy('project_customers.id');
        
        if(!empty($data['perPage'])){
            $results = $userData->select('project_customers.*','users.name','users.image','users_added_by.name as added_by_name')->groupBy('project_customers.id')->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $userData->count();
        }elseif(!empty($data['pluck'])){
            $results = $userData->pluck($data['pluck'])->toArray();
        }else{
            $results = $userData->select('project_customers.*','users.name','users.image','users_added_by.name as added_by_name')->groupBy('project_customers.id')->get();
        }
        
        return $results; 
    }
}
