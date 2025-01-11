@if ($project->project_properties && $project->project_properties->isNotEmpty())
    <div class="table_dashboard table-dashboard_one">
        <table id="example" class="display dashboard_table" style="width:100%;">
            <thead>
                <tr>
                    <th></th>
                    <th>{{ trans('messages.property_id') }}</th>
                    <th class="property_edit_title">{{ trans('messages.Property_Title') }}</th>
                    <th>{{ trans('messages.Property_Type') }}</th>
                    <th>{{ trans('messages.Property_City') }}</th>
                    <th>{{ trans('messages.Property_Sq_m') }}</th>
                    <th>{{ trans('messages.Property_Price') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="projectPropertyTableData">
                @include('modules.projects.includes.load_property_mgmt', [
                    'project_properties' => $project->project_properties,
                ])
            </tbody>
        </table>
    </div>
@else
    @if (auth()->user()->role->name == 'customer')
        <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
            <div class="empty-table">
                <div class="empty-image">
                    <i class="icon-house_id icon-30 color-primary"></i>
                </div>
                <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                    {{ trans('messages.No_Property_Has_Been_Added') }}
                </h4>
            </div>
        </div>
    @else
        <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
            <div class="empty-table">
                <div class="empty-image">
                    <i class="icon-house_id icon-30 color-primary"></i>
                </div>
                <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                    {{ trans('messages.project-show.Start_importing_properties_who_are_part_of') }}
                    <br>
                    {{ trans('messages.project-show.this_project_from_your_general_listings') }}
                </h4>
                @if (checkUserProjectPermissions($project->id, 'Property Management'))
                    <button type="button"
                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white importProperiesBtn">
                        {{ trans('messages.project-show.Add_New_Property') }}
                    </button>
                @endif
            </div>
        </div>
    @endif
@endif
