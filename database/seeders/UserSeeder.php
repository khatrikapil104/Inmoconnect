<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrNew([
            'email' => 'info@inmoconnect.com'
        ]);
        $roleId = Role::where('name','superadmin')->first()->id;
        if(empty($roleId)){
            $this->call([
                RoleSeeder::class
            ]);
        }
        if (!empty($roleId)) {
            $user->name = 'Super Admin';
            $user->user_role_id = $roleId;
            $user->email_verified_at = now();
            $user->password = Hash::make('Inmoconnect@2023');
            $user->save();
        } 
        
    }
}   