<?php

namespace Database\Seeders;

use App\Models\UserPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          $types = [
            ['permission_name' => 'Manage Projects','route_names' => json_encode(['projects.index','projects.show','projects.completeProject','projects.destroy']),'is_team_management_permission' => 1,'is_agent_related_permission' => 1,'is_developer_related_permission'=>1],
            ['permission_name' => 'Manage Customers','route_names' => json_encode(['customers.index','customers.cancelInvite','customers.destroy','customers.exportCustomers']),'is_team_management_permission' => 1,'is_agent_related_permission' => 1,'is_developer_related_permission'=>1],
            ['permission_name' => 'Manage Listings','route_names' => json_encode(['properties.index']),'is_team_management_permission' => 1,'is_agent_related_permission' => 1],
            ['permission_name' => 'Dashboard','route_names' => json_encode(['properties.index','projects.show']),'is_team_management_permission' => 0],
            ['permission_name' => 'Property Search','route_names' => json_encode(['propertySearch.index','properties.searchProperties']),'is_team_management_permission' => 0],
            ['permission_name' => 'My Agents','route_names' => json_encode(['agents.index']),'is_team_management_permission' => 0],
            ['permission_name' => 'Search Agents','route_names' => json_encode(['agentSearch.index']),'is_team_management_permission' => 0],
            ['permission_name' => 'Messages','route_names' => json_encode(['messages.index','messages.getUserChatMessage']),'is_team_management_permission' => 0],
            ['permission_name' => 'Files','route_names' => json_encode(['files.index','files.destroy']),'is_team_management_permission' => 0],
            ['permission_name' => 'Calender','route_names' => json_encode(['calender.index']),'is_team_management_permission' => 0],
            ['permission_name' => 'Saved Items','route_names' => json_encode(['properties.save_search_data']),'is_team_management_permission' => 0],
            ['permission_name' => 'Users','route_names' => json_encode(['user.index','user.create','user.edit','user.destroy']),'is_team_management_permission' => 0],
            ['permission_name' => 'Developers','route_names' => json_encode(['developer.index','developer.changeStatus']),'is_team_management_permission' => 0],
            ['permission_name' => 'Team Management','route_names' => json_encode(['team_management.index','team_management.destroy']),'is_team_management_permission' => 0],
            ['permission_name' => 'Developments','route_names' => json_encode(['developments.index','developments.manage']),'is_team_management_permission' => 0],
            ['permission_name' => 'Beta Agents','route_names' => json_encode(['beta_agents.index','beta_agents.exportBetaAgents']),'is_team_management_permission' => 0],
            ['permission_name' => 'Beta Developers','route_names' => json_encode(['beta_developers.index','beta_developers.exportBetaDevelopers']),'is_team_management_permission' => 0],
            ['permission_name' => 'Newsletters','route_names' => json_encode(['newsletters.index','newsletters.exportNewsletters']),'is_team_management_permission' => 0],

        ];
        $newTypeNames = array_column($types, 'permission_name');
        
        UserPermission::whereNotIn('permission_name', $newTypeNames)->delete();

        foreach ($types as $typeData) {
            UserPermission::updateOrCreate(['permission_name' => $typeData['permission_name']], $typeData);
        }
       
    }
}
