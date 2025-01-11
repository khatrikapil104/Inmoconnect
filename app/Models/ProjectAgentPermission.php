<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProjectAgentPermission extends Model
{
    use HasFactory,SoftDeletes;


    public function loadProjectAgentPermission($data,$requestData,$requiredData){
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $userData = ProjectAgentPermission:: leftJoin('project_permissions','project_permissions.id','project_agent_permissions.permission_id');
        if(!empty($data['projectId'])){
            $userData->where('project_agent_permissions.project_id',$data['projectId']);
        }
        if(!empty($data['agentId'])){
            $userData->where('project_agent_permissions.agent_id',$data['agentId']);
        }
        if(!empty($data['permissionName'])){
            $userData->where('project_permissions.permission_name',$data['permissionName']);
        }



        if(!empty($data['perPage'])){
            $results = $userData->select('project_agent_permissions.*','project_permissions.permission_name')->groupBy('project_agent_permissions.id')->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $userData->count();
        }elseif(!empty($data['pluck'])){
            $results = $userData->pluck($data['pluck'])->toArray();
        }elseif(!empty($data['singleRecord'])){
            $results = $userData->select('project_agent_permissions.*')->first();
            
        }else{
            $results = $userData->select('project_agent_permissions.*','project_permissions.permission_name')->groupBy('project_agent_permissions.id')->get();
        }
        
        return $results; 
    }
}
