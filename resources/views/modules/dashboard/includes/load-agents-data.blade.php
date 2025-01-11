@if ($connectedAgentsData->isNotEmpty())
    @foreach ($connectedAgentsData as $result)
        <tr class="agents-data-list">
            <td class="table-dashboard_img"> <img
                    src="{{ !empty($result->image) ? $result->image : asset('img/default-user.jpg') }}" alt="image"
                    width="36" height="36" alt="image" class="border-r-4 ">
            </td>
            <td style="padding-left:20px;">{{ $result->name ?? '' }}</td>

            <td class="table-dashboard_agent">-</td>
        </tr>
    @endforeach
@else
    <div class=" table_dashboard empty-dashboard table-empty-dashboard">
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
