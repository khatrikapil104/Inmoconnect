<div class="row">
    <div class="col-lg-12">
        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
            <div class="dashboard_card-title d-flex align-items-center justify-content-between">
                <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                    {{ trans('messages.project-show.Project_Events_Schedule') }}
                </h4>
                @php
                    $now = \Carbon\Carbon::now()->format('Y-m-d');
                @endphp

                {{-- @dd($currentDate >= $now) --}}
                {{-- @if ($currentDate >= $now) --}}
                    <div class="header-right-button_one d-flex align-items-center gap-3 " id="">
                        <div class="" id="project_add_event">
                            <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center my_dsevent"
                            data-bs-toggle="modal" data-bs-target="#addEventModal" id="">
                            <i class="icon-schedule_add"></i>
                        </div>
                    </div>
                    </div>
                {{-- @endif --}}
            </div>
            <div class="slick-slider_main">
                <div class="slick-list">

                    @if (!empty($currentMonthDateData))
                        @foreach ($currentMonthDateData as $date)
                            <div>
                                <div class="calender_date {{ date('Y-m-d') == $date['fullDate'] ? 'tody_appointment_date' : '' }}"
                                    current_date={{ $date['fullDate'] ?? '' }} id="current_date"
                                    slug="{{ $slug ?? '' }}" project_id="{{$project->id}}">
                                    <div
                                        class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                        {{ $date['dayName'] ?? '' }}</div>
                                    <div class="color-b-blue text-14 font-weight-700 lineheight-18">
                                        {{ $date['date'] ?? '' }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif


                </div>
            </div>
            <div class="Project_Events_Schedule_data">
                @include('modules.projects.includes.event_mgmt_data')
            </div>
        </div>
    </div>
</div>
</div>