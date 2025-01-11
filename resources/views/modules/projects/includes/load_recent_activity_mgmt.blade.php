{{-- @if ($project_recent_activities && $project_recent_activities->isNotEmpty())
@foreach ($project_recent_activities as $activity)
<div class="activity_before d-flex align-items-start mb-30">
    <div class="activity_img empty-image empty_image_top">
        <i class=" icon-Task_Management-Icon  icon-16 color-primary"></i>
    </div>
    <div class="activity_text ms-2">
        <div
            class="color-light-grey-seven  text-14 font-weight-400 lineheight-18 text-capitalize">
            {!! $activity->activity_data ?? '' !!}</div>
        <div
            class="mt-1 color-light-grey-six text-14 font-weight-400 lineheight-18 text-capitalize">
            {{formatTimeDifference($activity->created_at)}}</div>
    </div>
</div>

@endforeach
@endif --}}
@if (isset($project_recent_activities) && $project_recent_activities->isNotEmpty())
    @foreach ($project_recent_activities as $activity)
        <div class="activity_before d-flex align-items-start mb-30">
            <div class="activity_img empty-image empty_image_top">
                @php
                    $iconClass = 'icon-16 color-primary';
                    switch ($activity->activity) {
                        case 'CRM_PROJECT_RECENT_ACTIVITY_1':
                        case 'CRM_PROJECT_RECENT_ACTIVITY_2':
                        case 'CRM_PROJECT_RECENT_ACTIVITY_3':
                            $iconClass = 'icon-my_project   icon-16 color-primary';
                            break;

                        case 'CRM_PROJECT_RECENT_ACTIVITY_4':
                        case 'CRM_PROJECT_RECENT_ACTIVITY_5':
                        case 'CRM_PROJECT_RECENT_ACTIVITY_6':
                            $iconClass = 'icon-house_id   icon-16 color-primary';
                            break;

                        case 'CRM_PROJECT_RECENT_ACTIVITY_7':
                        case 'CRM_PROJECT_RECENT_ACTIVITY_8':
                        case 'CRM_PROJECT_RECENT_ACTIVITY_9':
                        case 'CRM_PROJECT_RECENT_ACTIVITY_10':
                            $iconClass = 'icon-agent   icon-16 color-primary';
                            break;

                        case 'CRM_PROJECT_RECENT_ACTIVITY_11':
                        case 'CRM_PROJECT_RECENT_ACTIVITY_12':
                        case 'CRM_PROJECT_RECENT_ACTIVITY_13':
                            $iconClass = 'icon-customer   icon-16 color-primary';
                            break;

                        case 'CRM_PROJECT_RECENT_ACTIVITY_14':
                        case 'CRM_PROJECT_RECENT_ACTIVITY_15':
                            $iconClass = 'icon-Task_Management-Icon  icon-16 color-primary';
                            break;

                        case 'CRM_PROJECT_RECENT_ACTIVITY_16':
                        case 'CRM_PROJECT_RECENT_ACTIVITY_17':
                            $iconClass = 'icon-zip   icon-16 color-primary';
                            break;

                        case 'CRM_PROJECT_RECENT_ACTIVITY_18':
                        case 'CRM_PROJECT_RECENT_ACTIVITY_19':
                        case 'CRM_PROJECT_RECENT_ACTIVITY_20':
                            $iconClass = 'icon-Task_Management-Icon  icon-16 color-primary';
                            break;

                        case 'CRM_PROJECT_RECENT_ACTIVITY_21':
                            $iconClass = 'icon-my_project icon-16 color-primary';
                            break;

                        case 'CRM_PROJECT_RECENT_ACTIVITY_22':
                            $iconClass = 'icon-price  icon-16 color-primary';
                            break;

                        case 'CRM_PROJECT_RECENT_ACTIVITY_23':
                            $iconClass = ' icon-description  icon-16 color-primary';
                            break;

                        case 'CRM_PROJECT_RECENT_ACTIVITY_24':
                            $iconClass = 'icon-time  icon-16 color-primary';
                            break;

                        case 'CRM_PROJECT_RECENT_ACTIVITY_25':
                            $iconClass = ' icon-location  icon-16 color-primary';
                            break;

                        // default:
                        //     $iconClass = 'icon-my_project icon-16 color-primary';
                        //     break;
                    }
                @endphp
                <i class="{{ $iconClass }}"></i>
            </div>
            <div class="activity_text ms-2">
                <h6 class="color-light-grey-seven text-14 font-weight-400 lineheight-18 text-capitalize">
                    {!! $activity->activity_data ?? '' !!}
                </h6>
                <h6 class="mt-1 color-light-grey-six text-14 font-weight-400 lineheight-18 text-capitalize">
                    {{ formatTimeDifference($activity->created_at) }}
                </h6>
            </div>
        </div>
    @endforeach
@endif




@if (isset($userRecentActivities) && $userRecentActivities->isNotEmpty())
    @foreach ($userRecentActivities as $activity)
        <div class="activity_before d-flex align-items-start mb-30">
            <div class="d-flex activity_before mb-4">
                <div class="activity_img empty-image empty_image_top">
                    @php
                        $iconClass = 'icon-16 color-primary';
                        switch ($activity->activity) {
                            case 'CRM_TEAM_RECENT_ACTIVITY_1':
                                $iconClass = 'icon-my_project   icon-16 color-primary';
                                break;

                            // property related 
                            case 'CRM_TEAM_RECENT_ACTIVITY_2':
                            case 'CRM_TEAM_RECENT_ACTIVITY_3':
                            case 'CRM_TEAM_RECENT_ACTIVITY_4':
                                $iconClass = 'icon-house_id   icon-16 color-primary';
                                break;

                            case 'CRM_TEAM_RECENT_ACTIVITY_5':
                                $iconClass = 'icon-team_management   icon-16 color-primary';
                                break;

                            // case 'CRM_TEAM_RECENT_ACTIVITY_9':
                            // case 'CRM_TEAM_RECENT_ACTIVITY_10':
                                // $iconClass = 'icon-agent   icon-16 color-primary';
                                // break;

                            // case 'CRM_TEAM_RECENT_ACTIVITY_11':
                            case 'CRM_TEAM_RECENT_ACTIVITY_6':
                            case 'CRM_TEAM_RECENT_ACTIVITY_7':
                                $iconClass = 'icon-customer   icon-16 color-primary';
                                break;

                            case 'CRM_TEAM_RECENT_ACTIVITY_8':
                                $iconClass = 'icon-Task_Management-Icon  icon-16 color-primary';
                                break;

                          
                                $iconClass = 'icon-zip   icon-16 color-primary';
                                break;

                            case 'CRM_TEAM_RECENT_ACTIVITY_9':
                            case 'CRM_TEAM_RECENT_ACTIVITY_10':
                            case 'CRM_TEAM_RECENT_ACTIVITY_11':
                                $iconClass = 'icon-my_calender  icon-16 color-primary';
                                break;

                            case 'CRM_TEAM_RECENT_ACTIVITY_12':
                            case 'CRM_TEAM_RECENT_ACTIVITY_15':
                            case 'CRM_TEAM_RECENT_ACTIVITY_16':
                            case 'CRM_TEAM_RECENT_ACTIVITY_17':
                                $iconClass = 'icon-my_project icon-16 color-primary';
                                break;

                            case 'CRM_TEAM_RECENT_ACTIVITY_22':
                                $iconClass = 'icon-price  icon-16 color-primary';
                                break;

                            case 'CRM_TEAM_RECENT_ACTIVITY_23':
                                $iconClass = ' icon-description  icon-16 color-primary';
                                break;

                            case 'CRM_TEAM_RECENT_ACTIVITY_24':
                                $iconClass = 'icon-time  icon-16 color-primary';
                                break;

                            case 'CRM_TEAM_RECENT_ACTIVITY_25':
                                $iconClass = ' icon-location  icon-16 color-primary';
                                break;

                            case 'CRM_TEAM_RECENT_ACTIVITY_13':
                            case 'CRM_TEAM_RECENT_ACTIVITY_14':
                                $iconClass = ' icon-Comapny  icon-16 color-primary';
                                break;

                            // default:
                            //     $iconClass = 'icon-my_project icon-16 color-primary';
                            //     break;
                        }
                    @endphp
                    <i class="{{ $iconClass }}"></i>
                </div>
                <div class="activity_text ms-2">
                    <h6 class="color-light-grey-seven text-14 font-weight-400 lineheight-18 text-capitalize">
                        {!! $activity->activity_data ?? '' !!}
                    </h6>
                    <h6 class="mt-1 color-light-grey-six text-14 font-weight-400 lineheight-18 text-capitalize text-start">
                        {{ $activity->created_at->format('d/m/Y, H:i') }}
                    </h6>
                </div>
            </div>

        </div>
    @endforeach
    {{-- @else
    <div class="empty-table text-center">
        <div class="empty-image">
            <i class="icon-house_id icon-30 color-primary"></i>
            <!-- <img src="{{ asset('img/empty-property1.svg') }}" alt="image" class=""> -->
        </div>
        <div
            class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
            No Recent Activities Found
        </div>

    </div> --}}
@endif
