<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class UserPermission extends Model
{
    use HasFactory;


    function getUserPermissionIdByName($permissionName = ""){
        $permissionId = UserPermission::where('permission_name',$permissionName)->value('id');
        return !empty($permissionId) ? $permissionId : 0;
    }
}
