{{-- @if ($agentProperties->isNotEmpty())
    <div class="table_dashboard">
        <table id="example" class="display dashboard_table" style="width:100%;  overflow-y:scroll;">
            <thead>
                <tr>
                    <th></th>
                    <th style="padding-left:20px;">{{ trans('messages.agent-dashboard.property_prefrence') }}</th>
                    <th>{{ trans('messages.agent-dashboard.Property_Title') }}</th>
                    <th>{{ trans('messages.agent-dashboard.Date') }}</th>
                    <th>{{ trans('messages.agent-dashboard.Price') }}</th>
                    <th>{{ trans('messages.agent-dashboard.City') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table_dashboard_content">
                @include('modules.dashboard.includes.load-properties-data')

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <div class="no_data_found">
                        </div>
                    </td>
                </tr>
            </tfoot>

        </table>
      
</div>
@else
    <div class="table_dashboard empty-dashboard table-empty-dashboard_1">
        <div class="empty-table">
            <div class="empty-image">
                <i class="icon-house_id icon-30 color-primary"></i>
                <!-- <img src="{{ asset('img/empty-property1.svg') }}" alt="image" class=""> -->
            </div>
            
            @if (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent')

                <div class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                    
                    {{ trans('messages.agent-dashboard.showcase_your_property_1') }}
                    <br>
                    {{ trans('messages.agent-dashboard.showcase_your_property_2')}}
                </div>
                
                <button type="button"
                    onclick="window.open('{{ route(routeNamePrefix() . 'properties.create') }}','_self')"
                    class="small-button Add-new-event Gradient_button border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white  modal-confirm-btn-success">
                    {{ trans('messages.agent-dashboard.Add_New_Property') }}

                </button>
            @elseif(auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer')
                <div class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                No Properties Found
                </div>
            @else
                <div class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                {{ trans('messages.agent-dashboard.No_Recent_Property_Viewed') }}
                </div>
            @endif
        </div>

    </div>
  
@endif --}}

@if ($agentProperties->isNotEmpty())
    <div class="table_dashboard">
        <table id="example" class="display dashboard_table" style="width:100%;  overflow-y:scroll;height:100%">
            <thead>
                <tr>
                    <th></th>
                    <th style="padding-left:20px;">{{ trans('messages.agent-dashboard.property_prefrence') }}</th>
                    <th>{{ trans('messages.agent-dashboard.Property_Title') }}</th>
                    <th>{{ trans('messages.agent-dashboard.Date') }}</th>
                    <th>{{ trans('messages.agent-dashboard.Price') }}</th>
                    <th>{{ trans('messages.agent-dashboard.City') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table_dashboard_content">
                @include('modules.dashboard.includes.load-properties-data')

            </tbody>
            <tfoot style="height:100%;">
                <tr style="border:none;">
                    <td colspan="7">
                        <div class="no_data_found">
                        </div>
                    </td>
                </tr>
            </tfoot>

        </table>
        <!-- <div class="preloader">
    <div class="wrapper" id="firstWrap">
      <div class="dot"></div>
    </div>
    <div class="wrapper" id="secondWrap">
      <div class="dot"></div>
    </div>
    <div class="wrapper" id="thirdWrap">
      <div class="dot"></div>
    </div>
    <div class="wrapper" id="fourthWrap">
      <div class="dot"></div>
    </div>
  </div> -->
    </div>
    @else
    <div class="table_dashboard empty-dashboard table-empty-dashboard_1">
        <div class="empty-table">
            <div class="empty-image">
                <i class="icon-house_id icon-30 color-primary"></i>
                <!-- <img src="{{ asset('img/empty-property1.svg') }}" alt="image" class=""> -->
            </div>
            
            @if (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'agent')

            <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                {{ trans('messages.agent-dashboard.showcase_your_property_1') }}
                <br>
                {{ trans('messages.agent-dashboard.showcase_your_property_2')}}
            </h4>
                <button type="button"
                    onclick="window.open('{{ route(routeNamePrefix() . 'properties.create') }}','_self')"
                    class="small-button Add-new-event Gradient_button border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white  modal-confirm-btn-success">
                    {{ trans('messages.agent-dashboard.Add_New_Property') }}

                </button>
                @elseif(auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer')
                <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                    No Properties Found
                </h4>
                @else
                <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                    {{ trans('messages.agent-dashboard.No_Recent_Property_Viewed') }}
                </h4>
            @endif
        </div>
    </div>
  
@endif