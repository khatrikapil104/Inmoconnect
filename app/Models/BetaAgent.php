<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class BetaAgent extends Model
{
    use HasFactory,SoftDeletes;

    public function loadBetaAgents($data,$requestData,$requiredData){
        $betaAgents = BetaAgent::query();
        if(!empty($requestData['table_search_input'])){
            $searchData = $requestData['table_search_input'];
            $betaAgents->where(function ($query) use($searchData){
                $query->Orwhere("beta_agents.name","LIKE","%".$searchData."%");
                $query->Orwhere("beta_agents.email","LIKE","%".$searchData."%");
                $query->Orwhere("beta_agents.phone","LIKE","%".$searchData."%");
            });
        }

        $betaAgents->whereNull('beta_agents.deleted_at')
            ->select('beta_agents.*')->groupBy('beta_agents.id');
        
        if(!empty($data['perPage'])){
            $results = $betaAgents->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $betaAgents->count();
        }else{
            $results = $betaAgents->get();
        }
        
        return $results; 
    }

   
}
