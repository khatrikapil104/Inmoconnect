@if ($project->project_customers && $project->project_customers->isNotEmpty())
    <div class="table_dashboard table-dashboard_two">
        <table id="example" class="display dashboard_table" style="width:100%; ">
            <thead>
                <tr>
                    <th></th>
                    <th>{{ trans('messages.project-show.Customer_Name') }}</th>
                    <th>{{ trans('messages.project-show.Agent_Name') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="projectCustomerTableData">
                @include('modules.projects.includes.load_customer_mgmt', [
                    'project_customers' => $project->project_customers,
                ])
            </tbody>
        </table>
    </div>
@else
    <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
        <div class="empty-table">
            <div class="empty-image">
                <i class=" icon-customer icon-30 color-primary"></i>
            </div>
            <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                {{ trans('messages.start_importing_customer') }}
                <br>
                {{ trans('messages.project_from_your_general_customers') }}
            </h4>
            @if (checkUserProjectPermissions($project->id, 'Customer Management'))
                <button type="button"
                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white importCustomersBtn">
                    {{ trans('messages.Add_New_Customer') }}
                </button>
            @endif
        </div>
    </div>
@endif
