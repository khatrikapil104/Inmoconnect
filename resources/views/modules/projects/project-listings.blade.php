<div class="row">
    <div class="col-sm-6 col-md-6 col-lg-3 mb-2" onclick="window.open('{{route(routeNamePrefix().'projects.index')}}','_self')">
        <div class="dashboard-card box-shadow-two b-color-white border-r-8">
            <div class="d-flex align-items-center justify-content-between h-100">
                <div class="dashboard-top d-flex justify-content-between flex-column h-100">
                    <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2 opacity-8">
                    {{trans('messages.project-listing.Total_project')}}
                    </h4>
                    <h2 class="lineheight-42 text-32 font-weight-700 color-primary">{{ $total_projects }}</h2>
                </div>
                <div class="dashboard-bottom">
                    <div class="dashboard-img">
                        <img src="/img/my_p-dashboard_4.svg" alt="image" class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3 mb-2" onclick="window.open('{{route(routeNamePrefix().'projects.index')}}','_self')">
        <div class="dashboard-card box-shadow-two b-color-white border-r-8">
            <div class="d-flex align-items-center justify-content-between h-100">
                <div class="dashboard-top d-flex justify-content-between flex-column h-100">
                    <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2 opacity-8">
                    {{trans('messages.project-listing.On_going_project')}}
                    </h4>
                    <h2 class="lineheight-42 text-32 font-weight-700 color-primary">{{ $ongoing_projects }}</h2>
                </div>
                <div class="dashboard-bottom">
                    <div class="dashboard-img">
                        <img src="/img/my_p-dashboard_2.svg" alt="image" class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3 mb-2" onclick="window.open('{{route(routeNamePrefix().'projects.index')}}','_self')">
        <div class="dashboard-card box-shadow-two b-color-white border-r-8">
            <div class="d-flex align-items-center justify-content-between h-100">
                <div class="dashboard-top d-flex justify-content-between flex-column h-100">
                    <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2 opacity-8">
                    {{trans('messages.project-listing.Overdue_project')}}
                    </h4>
                    <h2 class="lineheight-42 text-32 font-weight-700 color-primary">{{ $overdue_projects }}</h2>
                </div>
                <div class="dashboard-bottom">
                    <div class="dashboard-img">
                        <img src="/img/my_p-dashboard_3.svg" alt="image" class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3 mb-2" onclick="window.open('{{route(routeNamePrefix().'projects.index')}}','_self')">
        <div class="dashboard-card box-shadow-two b-color-white border-r-8">
            <div class="d-flex align-items-center justify-content-between h-100">
                <div class="dashboard-top d-flex justify-content-between flex-column h-100">
                    <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2 opacity-8">
                    {{trans('messages.project-listing.Completed_project')}}
                    </h4>
                    <h2 class="lineheight-42 text-32 font-weight-700 color-primary">{{ $completed_projects }}</h2>
                </div>
                <div class="dashboard-bottom">
                    <div class="dashboard-img">
                        <img src="/img/my_p-dashboard_1.svg" alt="image" class="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ////////////////////////slider/////////////////////////////////////////////////// -->
@if($results->isNotEmpty())
<div class="my-project_dashboar">
    <div class="slick_list_main_text pt-30">
        <div class="slick_list_text text-18 font-weight-700 lineheight-22 text-capitalize color-primary letter-s-36">
            {{trans('messages.project-listing.All_projects')}}
        </div>
    </div>
    <div class="slick-list">
        @include('modules.projects.load_projects_data')
    </div>
</div>
@endif
<!-- ///////////////////////////end-slider///////////////////////////////////////////// -->

<!-- //////////////////////second-slider //////////////////////////////////////////-->
@if($collaboratedProjects->isNotEmpty())
<div class="my-project_dashboar">
    <div class="slick_list_main_text pt-30">
        <div class="slick_list_text text-18 font-weight-700 lineheight-22 text-capitalize color-primary letter-s-36">Collaboration
        Projects
        </div>
    </div>
    <div class="slick-list">
        @include('modules.projects.load_projects_data',['results' => $collaboratedProjects])

    </div>
</div>
@endif
<!-- //////////////////////end-slider////////// /////////////////////////////-->

<!-- ////////////////////////////third-slider//////////////////////// -->
@if($completedProjects->isNotEmpty())
<div class="my-project_dashboar">
    <div class="slick_list_main_text pt-30">
        <div class="slick_list_text text-18 font-weight-700 lineheight-22 text-capitalize color-primary letter-s-36">Completed
        Projects
        </div>
    </div>
    <div class="slick-list">
        @include('modules.projects.load_projects_data',['results' => $completedProjects])

    </div>
</div>
@endif

