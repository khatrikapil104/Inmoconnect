@if ($connectedAgentsData->isNotEmpty())
    <div class="table_dashboard">
        <table id="example" class="display dashboard_table" style="width:100%;  overflow-y:scroll;">
            <thead>
                <tr>
                    <th></th>
                    <th style="padding-left:20px;">
                        {{ trans('messages.customer-dashboard.Agent_Name') }}
                    </th>
                    <th>
                        {{ trans('messages.customer-dashboard.On_Going_Project') }}
                    </th>

                </tr>
            </thead>
            <tbody>
                @include('modules.dashboard.includes.load-agents-data')
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">
                        <div class="no_data_found">
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
@else
    <div class=" table_dashboard empty-dashboard table-empty-dashboard ">
        <div class="empty-table">
            <div class="empty-image">
                <i class=" icon-agent icon-30 color-primary"></i>
                <!-- <img src="{{ asset('img/empty-property.svg') }}" alt="image" class=""> -->
            </div>
            <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                {{ trans('messages.customer-dashboard.No_Agent') }}
            </h4>
            <!-- <button type="button" onclick="window.open('{{ route(routeNamePrefix() . 'properties.create') }}','_self')"
            class="Gradient_button small-button  border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white  modal-confirm-btn-success">Add
            New Property</button> -->
        </div>
    </div>
@endif
