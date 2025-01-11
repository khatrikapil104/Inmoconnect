{{-- @if ($results->isNotEmpty()) --}}
    <div class="table_customer-three pt-10">
        <table id="example_one" class="display developer_data_table  dashboard_edit_one table-bottom-border"
            style="width:100%; ">
            <thead>
                <tr>
                    <th>Developers Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Company Name</th>
                    <th>Country</th>
                    <th>{{ trans('messages.beta-agents.Date_added') }}</th>

                </tr>
            </thead>
            <tbody class="tableData">
                @if ($results->isNotEmpty())
                    @include('modules.dashboard.includes.load-beta-developer-data', ['results' => $results])
                @else
                    <tr>
                        <td colspan="6" class="text-center">
                            <p>{{ trans('messages.beta-developer.no_beta_developers_found') }}</p>
                        </td>
                    </tr>
                @endif
            </tbody>
                <tfoot style="height:100%;">
                    <tr>
                        <td colspan="6" class="text-center no_data_found_developer">
                            {{-- <p>{{ trans('messages.view-developers.no_data_found_developer') }}</p> --}}
                        </td>
                    </tr>
                </tfoot>          

        </table>
    </div>
{{-- @else
<p>{{ trans('messages.beta-developer.no_beta_developers_found') }}</p>
@endif --}}

