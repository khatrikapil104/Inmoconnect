@if ($user_company_tasks && $user_company_tasks->isNotEmpty())
    @if (auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'sub-developer')
    @if ($userCompanyTaskAssign && in_array(auth()->user()->id, collect($userCompanyTaskAssign)->pluck('assign_to')->toArray()))
            <div class="table_dashboard table-dashboard_one table-dashboard_todolist">
                <table id="example" class="display dashboard_table dashboard_edit_one my_file_table "
                    style="width:100%; ">
                    <thead>
                        <tr>
                            <th class="d-flex align-items-center gap-12">
                                <span>{{ trans('messages.Task_name') }}</span>
                            </th>
                            @if (auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'sub-developer')
                                <th>Assign By</th>
                            @else
                                <th>To Assign</th>
                            @endif

                            <th>{{ trans('messages.status') }}</th>
                            <th>{{ trans('messages.deadline') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="userCompanyTaskTableData">
                        @include('modules.dashboard.includes.load_todo_mgmt', [
                            'user_company_tasks' => $user_company_tasks,
                        ])

                </table>
            </div>
        @else
            <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
                <div class="empty-table">
                    <div class="empty-image">
                        <i class="icon-house_id icon-30 color-primary"></i>
                    </div>
                    <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                        Hurray! you don't have any assigned to-do list
                    </h4>
                </div>
            </div>
        @endif
    @else
        <div class="table_dashboard table-dashboard_one table-dashboard_todolist">
            <table id="example" class="display dashboard_table dashboard_edit_one my_file_table to-do-table"
                style="width:100%; ">
                <thead>
                    <tr>
                        <th class="d-flex align-items-center gap-12">
                            <span>{{ trans('messages.Task_name') }}</span>
                        </th>
                        @if (auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'sub-developer')
                            <th>Assign By</th>
                        @else
                            <th>To Assign</th>
                        @endif

                        <th>{{ trans('messages.status') }}</th>
                        <th>{{ trans('messages.deadline') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="userCompanyTaskTableData">
                    @include('modules.dashboard.includes.load_todo_mgmt', [
                        'user_company_tasks' => $user_company_tasks,
                    ])

            </table>
        </div>
    @endif
@else
    @if (auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'sub-developer')
        <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
            <div class="empty-table">
                <div class="empty-image">
                    <i class="icon-house_id icon-30 color-primary"></i>
                </div>
                <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                    Hurray! you don't have any assigned to-do list
                </h4>
            </div>
        </div>
    @else<div class="table_dashboard empty-dashboard table-empty-dashboard_property">
            <div class="empty-table">
                <div class="empty-image">
                    <i class=" icon-to_do_list_empty  icon-30 color-primary"></i>
                </div>
                <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                    {{ trans('messages.project-show.Add your tasks checklist and manage') }}
                    <br>
                    {{ trans('messages.project-show.them with timely manner') }}
                </h4>
                
                    <button type="button"
                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                        data-bs-toggle="modal" data-bs-target="#single_todolist">
                        Add To-Do List
                    </button>
                
            </div>
        </div>
    @endif

@endif
