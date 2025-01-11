@if ($results->isNotEmpty())
    <div class="table_customer-three pt-10">
        <table id="example_one" class="display developer_data_table  dashboard_edit_one table-bottom-border"
            style="width:100%; ">
            <thead>
                <tr>
                    <th></th>
                    <th>Developers Name</th>
                    <th>Company Name</th>
                    <th>Mobile Number</th>
                    <th>City</th>
                    <th>Sign up Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="tableData">
                @if ($results->isNotEmpty())
                    @include('modules.dashboard.includes.load-developer-data', ['results' => $results])
                @else
                    <tr>
                        <td colspan="8" class="text-center">
                            <p>{{ trans('messages.view-developers.no_data_found_developer') }}</p>
                        </td>
                    </tr>
                @endif
            </tbody>
                <tfoot style="height:100%;">
                    <tr>
                        <td colspan="8" class="text-center no_data_found_developer">
                            {{-- <p>{{ trans('messages.view-developers.no_data_found_developer') }}</p> --}}
                        </td>
                    </tr>
                </tfoot>          

        </table>
    </div>
@else
    <div class="empty-dashboard table-empty-dashboard_1">
        <div class="empty-table">
            <div class="empty-image">
                <i class="icon-house_id icon-30 color-primary"></i>
                <!-- <img src="{{ asset('img/empty-property1.svg') }}" alt="image" class=""> -->
            </div>

            @if (auth()->user()->role->name == 'superadmin' ||
                    auth()->user()->role->name == 'admin' ||
                    auth()->user()->role->name == 'agent')
                <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                    {{ trans('messages.agent-dashboard.showcase_your_property_1') }}
                    <br>
                    {{ trans('messages.agent-dashboard.showcase_your_property_2') }}
                </h4>
                <button type="button"
                    onclick="window.open('{{ route(routeNamePrefix() . 'properties.create') }}','_self')"
                    class="small-button Add-new-event Gradient_button border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white  modal-confirm-btn-success">
                    {{ trans('messages.agent-dashboard.Add_New_Property') }}

                </button>
            @else
                <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                    {{ trans('messages.agent-dashboard.No_Recent_Property_Viewed') }}
                </h4>
            @endif
        </div>
    </div>

@endif
