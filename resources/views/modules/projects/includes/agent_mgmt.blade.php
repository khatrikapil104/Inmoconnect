@if ($project->project_agents && $project->project_agents->isNotEmpty())
    <div class="table_dashboard table-dashboard_two">
        <table id="example" class="display dashboard_table" style="width:100%; ">
            <thead>
                <tr>
                    <th></th>
                    <th>{{ trans('messages.Agent_Name') }}</th>
                    <th>{{ trans('messages.Agent_Permission') }}</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="projectAgentTableData">

                @include('modules.projects.includes.load_agent_mgmt', [
                    'project_agents' => $project->project_agents,
                ])
            </tbody>
        </table>
    </div>
@else
    <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
        <div class="empty-table">
            <div class="empty-image">
                <i class=" icon-agent icon-30 color-primary"></i>
            </div>
            <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                Start importing agents who will be part of<br>this project from your general agents network
            </h4>
            @if (checkUserProjectPermissions($project->id, 'Agent Management'))
                <button type="button"
                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white importAgentsBtn">Add
                    New Agent</button>
            @endif
        </div>
    </div>
@endif
