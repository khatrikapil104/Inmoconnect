@if ($upcomingEvents->isNotEmpty())
    <div class="dashboard-main-left dashboard_main-customer-left">
        @foreach ($upcomingEvents as $result)
            <div class="dashboard-left-card pb-3">
                <div class="small-left-card">
                    <div class="small-card-profile d-flex justify-content-between">
                        <div class="small-card-dot d-flex align-items-center">
                            @if ($result->action == 'call')
                                <div class="dashboard-round green-color me-2"></div>
                                <h6 class="text-14 lineheight-18 font-weight-700 color-b-blue">
                                    {{ trans('messages.add-events.Action_call') }}
                                </h6>
                            @elseif($result->action == 'view_meeting')
                                <div class="dashboard-round blue-color me-2"></div>
                                <h6 class="text-14 lineheight-18 font-weight-700 color-b-blue">
                                    {{ trans('messages.add-events.Action_View_Meetings') }}
                                </h6>
                            @elseif($result->action == 'meeting')
                                <div class="dashboard-round red-color me-2"></div>
                                <h6 class="text-14 lineheight-18 font-weight-700 color-b-blue">
                                    {{ trans('messages.add-events.Action_Meeting') }}
                                </h6>
                            @endif
                        </div>
                        @if ($result->user_associations->isNotEmpty())
                            <div class="d-flex">
                                @foreach ($result->user_associations as $assKey => $ass)
                                    @if ($assKey < 5)
                                        <div class="dashboard_img">
                                            <img src="{{ getFileUrl($ass->association_image, 'users') }}" alt="image"
                                                class="">
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        @else
                            <div class="d-flex">
                                <div class="dashboard_img">
                                    <img src="{{ getFileUrl($result->ownerImage, 'users') }}" alt="image"
                                        class="">
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="content" id="main">
                        <h6 class="text-14 lineheight-18 font-weight-700 color-b-blue pt-12 text-capitalize open-btn upcomingEventName"
                            data-id="{{ $result->id }}" onclick="openSidebar()">{{ $result->event_name ?? '' }}</h6>
                        <!-- <button class="open-btn" onclick="openSidebar()">☰ Open Sidebar</button> -->
                    </div>

                    <div class="text-14 lineheight-18 font-weight-400 color-b-blue pt-12">{!! $result->event_description ?? '' !!}</div>
                    @if (!empty($result->project_id))
                        <div class="d-flex align-items-center pt-12">
                            <i class=" icon-my_project icon-16 color-b-blue"></i>
                            <h6 class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">
                                {{ $result->project_name ?? '' }}
                            </h6>
                        </div>
                    @endif
                    <div class="d-flex align-items-center pt-12">
                        <i class=" icon-my_calender icon-16 color-b-blue"></i>
                        <h6 class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">
                            {{ date('l, d/m/Y', strtotime($result->due_date)) }}</h6>
                    </div>
                    <div class="d-flex align-items-center pt-12">
                        <i class=" icon-time icon-16 color-b-blue"></i>
                        <h6 class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">
                            {{ date('H:i', strtotime($result->start_from)) }} -
                            {{ date('H:i', strtotime($result->end_to)) }}
                        </h6>
                    </div>
                    @if (!empty($result->reminder))
                        <div class="d-flex align-items-center pt-12">
                            <i class=" icon-bell icon-16 color-b-blue"></i>
                            <h6 class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">
                                {{ trans('messages.view-event.before') }}
                                {{ $result->reminder }}
                                {{ trans('messages.view-event.min') }}
                            </h6>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
@else
    <div class=" empty-dashboard h-100">
        <div class="empty-table">
            <div class="empty-image">
                <img src="/img/empty-calender.svg" alt="image" class="">
            </div>
            <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                {{ trans('messages.agent-dashboard.No_upcoming_event') }}
            </h4>
            <button type="button"
                class="small-button Gradient_button   border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white  modal-confirm-btn-success position-relative"
                data-bs-toggle="modal" data-bs-target="#addEventModal">
                {{ trans('messages.agent-dashboard.Add_New_Event') }}
            </button>
        </div>
    </div>
@endif
