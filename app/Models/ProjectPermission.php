<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProjectPermission extends Model
{
    use HasFactory;


    function getProjectPermissionIdByName($permissionName = ""){
        $permissionId = ProjectPermission::where('permission_name',$permissionName)->value('id');
        return !empty($permissionId) ? $permissionId : 0;
    }
}
