
@if($project->project_recent_activities && $project->project_recent_activities->isNotEmpty())

<div class="table_dashboard empty-dashboard table-empty-dashboard_property recent-activity_height d-block pt-10 recent_activity_h-one projectRecentActivityTableData">
    @include('modules.projects.includes.load_recent_activity_mgmt',['project_recent_activities' => $project->project_recent_activities])
</div>

@endif

