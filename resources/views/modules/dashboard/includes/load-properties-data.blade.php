@if ($agentProperties->isNotEmpty())
    @foreach ($agentProperties as $result)
        <tr class="table-dashboard-data">
            <td class="table-dashboard_img">
                @if (auth()->user()->role->name == 'customer')
                    <img src="{{ !empty($result->cover_image) ? $result->cover_image : asset('img/default-property.jpg') }}" alt="image" width="36" height="36" alt="image" class="border-r-4" style="max-width: max-content">
                @else
                    <img src="{{ !empty($result->cover_image) ? $result->cover_image : asset('img/default-property.jpg') }}"
                        alt="image" width="36" height="36" alt="image" class="border-r-4" style="max-width: max-content">
                @endif

            </td>
            <td style="padding-left:20px;">{{ $result->reference ?? '' }}</td>
            <td class="title_wrap title_dashboard-wrap"><span>{{ $result->name ?? '' }}</span></td>
            @if (auth()->user()->role->name == 'customer')
                <td>{{ date('d/m/Y', strtotime($result->viewed_user_properties_created_at)) }}
                    <br>{{ date('h:i A', strtotime($result->viewed_user_properties_created_at)) }}
                </td>
            @else
                <td>{{ date('d/m/Y', strtotime($result->created_at)) }}
                    <br>{{ date('h:i A', strtotime($result->created_at)) }}
                </td>
            @endif

            <td class="table_prize">
                {{ !empty($result->price)
                    ? config('Reading.default_currency') . ' ' . number_format($result->price, 2)
                    : config('Reading.default_currency') . ' 0.00' }}
            </td>
            <td>{{ $result->city ?? '' }}</td>
            <td><a href="{{ route(routeNamePrefix() . 'properties.show', $result->reference) }}"><img
                        src="{{ asset('img/eye.svg') }}" alt="image" style="max-width: max-content"></a></td>
        </tr>
    @endforeach
@else
    <div class="table_dashboards empty-dashboard table-empty-dashboard_1">
        <div class="empty-table">
            <div class="empty-image">
                <i class="icon-house_id icon-30 color-primary"></i>
                <!-- <img src="{{ asset('img/empty-property1.svg') }}" alt="image" class=""> -->
            </div>
            <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                {{ trans('messages.agent-dashboard.no_property') }}
            </h4>
            {{-- @if (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'agent')
        <button type="button" onclick="window.open('{{route(routeNamePrefix().'properties.create')}}','_self')"
            class="small-button Gradient_button border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white  modal-confirm-btn-success">
            {{trans('messages.agent-dashboard.Add_New_Property')}}
          </button>
        @endif --}}
        </div>
    </div>
@endif
