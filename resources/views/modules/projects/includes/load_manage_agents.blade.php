<div class="modal-body_select-agent">
    <table id="example" class="display dashboard_table dashboard_table_edit_two">
        <thead>
            <tr>
                <th>{{ trans('messages.permission') }}</th>
                <th class="table-extra-width">{{ trans('messages.permission.project') }}</th>
                <th class="table-extra-width">{{ trans('messages.permission.property') }}</th>
                <th class="table-extra-width">{{ trans('messages.permission.agnt_mgmt') }}</th>
                <th class="table-extra-width">{{ trans('messages.permission.cust_mgmt') }}</th>
                <th class="table-extra-width">{{ trans('messages.permission.ToDo_List') }}</th>
                <th class="table-extra-width">{{ trans('messages.permission.Event') }}</th>
            </tr>
        </thead>
        <tbody>
            @if ($connectedAgentsData && $connectedAgentsData->isNotEmpty())
                @foreach ($connectedAgentsData as $agentKey => $agent)
                    <tr>
                        <td> <img src="{{ !empty($agent->image) ? $agent->image : asset('img/default-user.jpg') }}"
                                alt="image"><span class="table-agent_name">{{ $agent->name ?? '' }}</span><button
                                class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline removeAgentFromManageCustomers">Remove</button>
                        </td>
                        <td>

                            <input type="checkbox" name="dataArr[{{ $agentKey }}][permissions][Project Information]"
                                class="checkbox" value="1" @if (!empty($agent->agent_permissions) && in_array('Project Information', $agent->agent_permissions)) checked @endif />

                        </td>
                        <td>

                            <input type="checkbox"
                                name="dataArr[{{ $agentKey }}][permissions][Property Management]" class="checkbox"
                                value="1" @if (!empty($agent->agent_permissions) && in_array('Property Management', $agent->agent_permissions)) checked @endif />

                        </td>
                        <td>

                            <input type="checkbox" name="dataArr[{{ $agentKey }}][permissions][Agent Management]"
                                class="checkbox" value="1" @if (!empty($agent->agent_permissions) && in_array('Agent Management', $agent->agent_permissions)) checked @endif />

                        </td>
                        <td>

                            <input type="checkbox"
                                name="dataArr[{{ $agentKey }}][permissions][Customer Management]" class="checkbox"
                                value="1" @if (!empty($agent->agent_permissions) && in_array('Customer Management', $agent->agent_permissions)) checked @endif />

                        </td>
                        <td>

                            <input type="checkbox" name="dataArr[{{ $agentKey }}][permissions][To-Do List]"
                                class="checkbox" value="1" @if (!empty($agent->agent_permissions) && in_array('To-Do List', $agent->agent_permissions)) checked @endif />

                        </td>
                        <td>

                            <input type="checkbox" name="dataArr[{{ $agentKey }}][permissions][Event]"
                                class="checkbox" value="1" @if (!empty($agent->agent_permissions) && in_array('Event', $agent->agent_permissions)) checked @endif />


                        </td>


                    </tr>
                    <input type="hidden" name="dataArr[{{ $agentKey }}][agent_id]" value="{{ $agent->id }}">
                @endforeach
            @else
                <div class="col-md-12 text-center">
                    <p>{{ trans('messages.customer-dashboard.No_agent_found') }}</p>
                </div>
            @endif

        </tbody>
    </table>
</div>

@if ($connectedAgentsData && $connectedAgentsData->isNotEmpty())
    <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
        <button type="submit"
            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">
            {{ trans('messages.dashboard.Save') }}
        </button>
    </div>
@endif
