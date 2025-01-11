<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'superadmin'],
            ['name' => 'admin'],
            ['name' => 'agent'],
            ['name' => 'customer'],
            ['name' => 'sub-agent'],
            ['name' => 'developer'],
            ['name' => 'sub-developer'],
        ];
        $newRoleNames = array_column($roles, 'name');
        
        Role::whereNotIn('name', $newRoleNames)->delete();

        foreach ($roles as $roleData) {
            Role::updateOrCreate(['name' => $roleData['name']], $roleData);
        }
    }
}
