<?php

namespace Database\Seeders;

use App\Models\ProjectPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          $types = [
            ['permission_name' => 'Project Information'],
            ['permission_name' => 'Property Management'],
            ['permission_name' => 'Agent Management'],
            ['permission_name' => 'Customer Management'],
            ['permission_name' => 'To-Do List'],
            ['permission_name' => 'Event']
         
        ];
        $newTypeNames = array_column($types, 'permission_name');
        
        ProjectPermission::whereNotIn('permission_name', $newTypeNames)->delete();

        foreach ($types as $typeData) {
            ProjectPermission::updateOrCreate(['permission_name' => $typeData['permission_name']], $typeData);
        }
       
    }
}
