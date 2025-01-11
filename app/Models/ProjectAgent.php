<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProjectAgent extends Model
{
    use HasFactory;

    public function loadProjectAgents($data,$requestData,$requiredData = []){
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $userData = ProjectAgent::leftJoin('users','project_agents.agent_id','users.id')->leftJoin('users as users_added_by','project_agents.added_by','users_added_by.id');
        if(!empty($data['projectId'])){
            $userData->where('project_agents.project_id',$data['projectId']);
        }
        if(!empty($data['agentId'])){
            $userData->where('project_agents.agent_id',$data['agentId']);
        }
        if(!empty($data['projectSlug'])){
            $userData->leftJoin('projects','projects.id','project_agents.project_id')->where('projects.slug',$data['projectSlug']);
        }
        if(!empty($data['withoutLoggedInUser'])){
            $userData->where('project_agents.agent_id','!=',$loggedInUserId);
        }

        if(!empty($requestData['search_input_agent'])){
            $searchData = $requestData['search_input_agent'];
            $userData->where(function ($query) use($searchData){
                $query->Orwhere("users.name","LIKE","%".$searchData."%");
                $query->Orwhere("users.email","LIKE","%".$searchData."%");
                $query->Orwhere("users.phone","LIKE","%".$searchData."%");
            });
        }
        $userData->orderBy('project_agents.is_project_owner','desc');


        if(!empty($data['perPage'])){
            $results = $userData->select('project_agents.*','users.name','users.image','users_added_by.name as added_by_name')->groupBy('project_agents.id')->paginate($data['perPage']);
            if($results->isNotEmpty()){
                
            }
        }elseif(!empty($data['fetchCount'])){
            $results = $userData->count();
        }elseif(!empty($data['pluck'])){
            $results = $userData->pluck($data['pluck'])->toArray();
        }elseif(!empty($data['singleRecord'])){
            $results = $userData->select('project_agents.*','users.name','users.image','users_added_by.name as added_by_name')->first();
            
        }else{
            $results = $userData->select('project_agents.*','users.name','users.image','users_added_by.name as added_by_name')->groupBy('project_agents.id')->get();
        }
        
        
        if(!is_array($results) && !is_numeric($results) && (is_a($results, 'Illuminate\Database\Eloquent\Collection') ? $results->isNotEmpty() : !empty($results)) && !empty($requiredData) && empty($data['fetchCount']) && empty($data['pluck'])){
            foreach($results as $result){
                if(in_array('agent_permissions',$requiredData)){
                    
                    $projectAgentPermissionInstance = new ProjectAgentPermission();
                    $result->agent_permissions = $projectAgentPermissionInstance->loadProjectAgentPermission(['pluck' => 'project_permissions.permission_name','projectId' => !empty($data['projectId']) ? $data['projectId'] : 0, 'agentId' => $result->id,'userId' => $loggedInUserId ],[],[]);
                }
            }
        }
        
        return $results; 
    }
}
