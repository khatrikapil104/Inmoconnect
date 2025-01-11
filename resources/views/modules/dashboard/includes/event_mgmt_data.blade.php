@if ($events->isNotEmpty())
    <div class=" table-empty-dashboard_property Schedule_call_height Project_Events_Schedule_data">
        <div class="today_schdule table-schdule_one pt-3 pb-2">
            @php
                $now = \Carbon\Carbon::now()->format('Y-m-d');
            @endphp
            @if ($currentDate == $now)
                <div class="text-14 font-weight-700 color-primary lineheight-18 text-capitalize text-start">
                    {{ trans('messages.project-show.Today’s Events') }}
                </div>
            @else
                <div class="text-14 font-weight-700 color-primary lineheight-18 text-capitalize text-start">
                    {{ trans('messages.project-show.Event') }}
                </div>
            @endif

            <div class="today_schdule-call d-flex align-items-center pt-10 gap-3">
                <div class="today_call d-flex align-items-center gap-2">
                    <div class="call_round green "></div>
                    <div class="toda_call_text green_text">
                        @if (!empty($actionCount['callCount']))
                            {{ $actionCount['callCount'] }}
                        @endif
                        {{ trans('messages.project-show.call') }}
                    </div>
                </div>
                <div class="today_call d-flex align-items-center gap-2">
                    <div class="call_round sky "></div>
                    <div class="toda_call_text sky_text">
                        @if (!empty($actionCount['viewingCount']))
                            {{ $actionCount['viewingCount'] }}
                        @endif
                        {{ trans('messages.project-show.View_Meeting') }}
                    </div>
                </div>
                <div class="today_call d-flex align-items-center gap-2">
                    <div class="call_round red"></div>
                    <div class="toda_call_text red_text">
                        @if (!empty($actionCount['meetingCount']))
                            {{ $actionCount['meetingCount'] }}
                        @endif
                        {{ trans('messages.project-show.Meeting') }}
                    </div>
                </div>
            </div>
        </div>
        @foreach ($events as $event)
            <div class="today_schdule_call_text">
                <div class="green_bg schdule_call-section d-flex justify-content-between align-items-center mt-10">
                    <div class="schdule-call-left ">
                        <div class="d-flex align-items-center gap-2">
                            <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                {{ date('H:i', strtotime($event->start_from)) }} -
                                {{ date('H:i', strtotime($event->end_to)) }}
                            </div>
                            @if ($event->action == 'call')
                                <i class=" icon-bell icon-8 icon_bg green"></i>
                                <img src="/img/square_1.svg" alt="image" class="#">
                            @elseif($event->action == 'view_meeting')
                                <i class=" icon-bell icon-8 icon_bg sky"></i>
                                <img src="/img/square_2.svg" alt="image" class="#">
                            @elseif($event->action == 'meeting')
                                <i class=" icon-bell icon-8 icon_bg red"></i>
                                <img src="/img/square_3.svg" alt="image" class="#">
                            @endif
                        </div>
                        <div class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                            {{ $event->event_name }}</div>
                    </div>
                    <a href="javascript:void(0)" data-id={{ $event->id }} 
                        class="upcomingEventName">
                        <i class="  icon-eye  icon-20"></i>
                    </a>
                </div>
            </div>
        @endforeach

    </div>
@else
    <div
        class="table_dashboard empty-dashboard table-empty-dashboard_property Schedule_call_height Project_Events_Schedule_data">
        <div class="today_schdule pt-3">
            @php
                $now = \Carbon\Carbon::now()->format('Y-m-d');
            @endphp
            @if ($currentDate == $now)
                <div class="text-14 font-weight-700 color-primary lineheight-18 text-capitalize text-start">
                    {{ trans('messages.project-show.Today’s Events') }}
                </div>
            @else
                <div class="text-14 font-weight-700 color-primary lineheight-18 text-capitalize text-start">
                    {{ trans('messages.project-show.Event') }}
                </div>
            @endif
            <div class="today_schdule-call d-flex align-items-center pt-10 gap-3">
                <div class="today_call d-flex align-items-center gap-2">
                    <div class="call_round green "></div>
                    <div class="toda_call_text green_text">
                        @if (!empty($actionCount['callCount']))
                            {{ $actionCount['callCount'] }}
                        @endif
                        {{ trans('messages.project-show.call') }}
                    </div>
                </div>
                <div class="today_call d-flex align-items-center gap-2">
                    <div class="call_round sky "></div>
                    <div class="toda_call_text sky_text">
                        @if (!empty($actionCount['viewingCount']))
                            {{ $actionCount['viewingCount'] }}
                        @endif
                        {{ trans('messages.project-show.View_Meeting') }}
                    </div>
                </div>
                <div class="today_call d-flex align-items-center gap-2">
                    <div class="call_round red"></div>
                    <div class="toda_call_text red_text">
                        @if (!empty($actionCount['meetingCount']))
                            {{ $actionCount['meetingCount'] }}
                        @endif
                        {{ trans('messages.project-show.Meeting') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="empty-table sehudle_empty">
            <div class="empty-image">
                <i class=" icon-Task_Management-Icon  icon-30 color-primary"></i>
            </div>
            {{-- @dd(now()) --}}
            @if ($currentDate == $now)
                <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                    {{ trans('messages.project-show.No_upcoming_event_today') }}
                </h4>
            @else
                <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                    {{ trans('messages.project-show.No_upcoming_event_found') }}
                </h4>
            @endif
            @if ($currentDate >= $now)
                
                    <button type="button"
                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"data-bs-toggle="modal"
                        data-bs-target="#addEventModal">
                        {{ trans('messages.project-show.Add_Event') }}
                    </button>
                
            @endif
        </div>
    </div>

@endif
