<?php

namespace Database\Seeders;

use App\Models\UserPermission;
use App\Models\UserRolePermissionAccess;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRolePermissionAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          $rolePermissionAccessData = [
            ['user_role' => 'superadmin','permissions_to_restrict' => ['Team Management','Saved Items','Developments']],
            ['user_role' => 'admin','permissions_to_restrict' => ['Team Management','Saved Items','Developments']],
            ['user_role' => 'agent','permissions_to_restrict' => ['Users','Developers','Beta Agents','Beta Developers','Newsletters','Developments']],
            ['user_role' => 'customer','permissions_to_restrict' => ['Team Management','Manage Customers','Developments','Users','Developers','Beta Agents','Beta Developers','Newsletters','Search Agents','Manage Listings']],
            ['user_role' => 'developer','permissions_to_restrict' => ['Property Search','Users','Developers','Beta Agents','Beta Developers','Newsletters','Saved Items']],
            ['user_role' => 'sub-agent','permissions_to_restrict' => ['Users','Developers','Beta Agents','Beta Developers','Newsletters','Developments','Team Management']],
            ['user_role' => 'sub-developer','permissions_to_restrict' => ['Manage Listings','Property Search','Users','Developers','Beta Agents','Beta Developers','Newsletters','Team Management','Developments','Saved Items']],
       
        ];
       $permissionAccessIds = [];
        foreach ($rolePermissionAccessData as $data) {
            $userRoleId = getUserRoleId($data['user_role']);
            if(!empty($data['permissions_to_restrict'])){
                foreach($data['permissions_to_restrict'] as $permission){
                   $permissionId = UserPermission::where('permission_name',$permission)->value('id');

                   $checkIfThisAccessAlreadyExists = UserRolePermissionAccess::where('user_role_id',$userRoleId)->where('user_permission_id_restrict',!empty($permissionId) ? $permissionId : 0 )->first();
                   if(!empty($checkIfThisAccessAlreadyExists)){
                        $obj  =  UserRolePermissionAccess::find($checkIfThisAccessAlreadyExists->id);
                   }else{
                        $obj = new UserRolePermissionAccess;
                   }
                   $obj->user_role_id = $userRoleId;
                   $obj->user_permission_id_restrict = !empty($permissionId) ? $permissionId : 0;
                   $obj->save();
                   $lastId = $obj->id;
                   $permissionAccessIds[] = $lastId;
                }
            }
        }
        UserRolePermissionAccess::whereNotIn('id', $permissionAccessIds)->delete();
       
    }
}
