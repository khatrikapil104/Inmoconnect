<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class UserPermissionAccess extends Model
{
    use HasFactory;

    protected $table="user_permission_access";


    public function loadUserPermissionAccessData($data,$requestData,$requiredData){
        $loggedInUserId = !empty($data['userId']) ? $data['userId'] : auth()->user()->id;
        $userData = UserPermissionAccess:: leftJoin('user_permissions','user_permissions.id','user_permission_access.user_permission_id');
       
        if(!empty($data['userId'])){
            $userData->where('user_permission_access.user_id',$data['userId']);
        }
        if(!empty($data['recordId'])){
            $users->where('user_permission_access.id',$data['recordId']);
        }
        if(!empty($data['permissionName'])){
            $userData->where('user_permission_access.permission_name',$data['permissionName']);
        }



        if(!empty($data['perPage'])){
            $results = $userData->select('user_permission_access.*','user_permissions.permission_name')->groupBy('user_permission_access.id')->paginate($data['perPage']);
        }elseif(!empty($data['fetchCount'])){
            $results = $userData->count();
        }elseif(!empty($data['pluck'])){
            $results = $userData->pluck($data['pluck'])->toArray();
        }elseif(!empty($data['singleRecord'])){
            $results = $userData->select('user_permission_access.*')->first();
            
        }else{
            $results = $userData->select('user_permission_access.*','user_permissions.permission_name')->groupBy('user_permission_access.id')->get();
        }
        
        return $results; 
    }
}
