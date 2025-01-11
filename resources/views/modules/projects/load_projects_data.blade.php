@if($results->isnotEmpty())
        @foreach($results as $result)
        <div>
            <div class="row h-100">
                <div class="col-lg-12 slider-main-card">
                    <a href="{{route(routeNamePrefix().'projects.show',['slug' => $result->slug, 'id' => $result->id] )}}" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <h4
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    {{$result->project_name ?? '-'}}</h4>
                                <h6 class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    {{trans('messages.'.(getModalSpecificData('Project','PROJECT_TYPE',trans($result->project_type) ?? '')))}}</h6>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">
                                    {{trans('messages.'.(getModalSpecificData('Project','STATUS',trans($result->status) ?? '')))}}</div>
                            </div>
                        </div>
                        <h4
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            {{!empty($result->project_budget)?config('Reading.default_currency').' '.number_format($result->project_budget,2) :
                            config('Reading.default_currency').' 0.00'}}</h4>
                        <div class="slider-Agent d-flex  align-items-center">
                        <i class="icon-my_profile me-2 icon-16"></i>
                            <h6 class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">
                                {{trans('messages.project-listing.Project_Owner')}}
                            </h6>
                            <h6
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                {{ $result->owner_name ?? ''}}</h6>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                        <i class="  icon-my_calender me-2 icon-16"></i>
                            <h6 class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">
                                {{trans('messages.project-listing.deadline')}}
                            </h6>
                            <h6
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                {{date('d/m/Y',strtotime($result->end_date))}}</h6>
                        </div>
                        <?php
                            $limitedDescription = mb_substr(strip_tags($result->project_description), 0, 500);
                        ?>
                        <h6
                            class="text-break slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 text-project_slider">
                            <?php echo $limitedDescription; ?>
                    </h6>
                        <div class="row px-15 gap-2">
                            @if($result->project_customers && $result->project_customers->isNotEmpty() )
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class=" icon-customer me-2 icon-18"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                             
                                        @foreach($result->project_customers as $keyCustomer => $customer)
                                        @if($keyCustomer < 3)
                                        <img src="{{ getFileUrl($customer->image,'users') }}" alt="image" class="border-r-4" width="18" height="18">
                                        @endif
                                        @endforeach
                                    </div>
                                    @if($result->project_customers->total() > 3)
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">
                                        {{trans('messages.project-listing.more')}}
                                    </button>
                                    @endif
                                </div>
                            </div>
                            @endif
                            @if($result->project_agents && $result->project_agents->isNotEmpty() )
                            <div class="col-lg-6">
                                <div class="d-flex agent_image-dashboard">
                                <i class="icon-agent text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        @foreach($result->project_agents as $keyAgent => $agent)
                                        @if($keyAgent < 3)
                                        <img src="{{ getFileUrl($agent->image,'users') }}" alt="image" class="border-r-4" width="18" height="18">
                                        @endif
                                        @endforeach
                                    </div>
                                    @if($result->project_agents->total() > 3)
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_butt on b-color-transparent ms-1">
                                        {{trans('messages.project-listing.more')}}
                                    </button>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">{{$result->project_tasks->total()}} 
                                {{trans('messages.project-listing.Task')}}
                            @if($result->project_tasks->total() > 0)
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">{{number_format($result->project_tasks_completed_percentage,2)}}%</span>
                            @endif
                            </p>
                            @if($result->project_tasks->total() > 0)
                            <progress class="progress progress1 " max="100" value="{{$result->project_tasks_completed_percentage}}"></progress>
                            @endif
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        @endif