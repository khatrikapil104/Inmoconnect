<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserRecentActivity extends Model
{
    use HasFactory,SoftDeletes;

    public function loadUserRecentActivities($data,$requestData,$requiredData = []){
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        
        $userData = UserRecentActivity::query();
        if(!empty($data['companyId'])){
            $userData->where('user_recent_activities.company_id',$data['companyId']);
        }

        $userData->orderBy('user_recent_activities.created_at','desc');

        
        $userData->select('user_recent_activities.*')->groupBy('user_recent_activities.id');
        
        if(!empty($data['perPage'])){
            $results = $userData->paginate($data['perPage']);
        }else{
            $results = $userData->get();
        }

        if(!is_array($results) && !is_numeric($results) && (is_a($results, 'Illuminate\Database\Eloquent\Collection') ? $results->isNotEmpty() : !empty($results)) && !empty($requiredData) && empty($data['fetchCount']) && empty($data['pluck'])){
            foreach($results as $result){
                if(in_array('activity_data',$requiredData)){
                    
                    $result->activity_data = custom_str_replace_recent_activity_project(trans('messages.'.$result->activity),!empty($result->values) ? explode(',',$result->values) : []);
                }
            }
        }
        
        return $results;
        
    }
    
}
