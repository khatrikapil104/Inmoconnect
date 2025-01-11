@extends('layouts.app')
@section('content')

@section('title')
    {{ trans('messages.sidebar.Dashboard') }} Inmoconnect
@endsection
@push('styles')
    <!-- slider -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/modules/dashboard/dashboard.css') }}">
@endpush
<style>

</style>

<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="main-content-crm b-color-background  min-vh-100">
    <div class="crm-main-content">

        {{-- breadcrumb  --}}
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                        Dashboard
                    </div>
                </div>
            </div>

        </div>
        {{-- end-breadcrumb --}}
        @php
            $currentHour = \Carbon\Carbon::now()->hour;
            if ($currentHour >= 5 && $currentHour < 12) {
                $greeting = 'Good Morning';
            } elseif ($currentHour >= 12 && $currentHour < 18) {
                $greeting = 'Good Afternoon';
            } elseif ($currentHour >= 18 && $currentHour < 21) {
                $greeting = 'Good Evening';
            } else {
                $greeting = 'Good Night';
            }
        @endphp
        <div class="d-flex flex-column-reverse flex-md-row align-items-center justify-content-between">
            <div class="me-md-3 w-100 mb-3 mb-md-0 mt-3 mt-md-0" style="flex: 1;">
                <div class="new_dashboard_agent d-flex justify-content-between">
                    <div class="new_dashboard-text">
                        <h3 class="text-18 color-white font-weight-700">{{ $greeting }},
                            {{ ucfirst(auth()->user()->name) }}!</h3>
                        <h6 class="text-14 opacity-7 color-white mt-2">Welcome to InmoConnect Dashboard, Your Next Gen
                            Real
                            Estate CRM</h6>

                        @if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer')
                            @php
                                $totalActiveTeamMembers = $totalActiveMembers->count();
                            @endphp
                            <div class="d-flex mt-md-4 mt-lg-2 mt-xl-4">
                                <div class="d-flex flex-column dashboard_agent-line">
                                    @if (auth()->user()->role->name == 'agent')
                                        <img src="{{ asset('img/active_sub_agent.svg') }}" alt="image" class=""
                                            width="32" height="32">
                                    @else
                                        <img src="{{ asset('img/active_sub-developer.svg') }}" alt="image"
                                            class="" width="32" height="32">
                                    @endif
                                    <h6 class="text-14 color-white font-weight-400 pt-1 pb-1">Active
                                        Sub-{{ auth()->user()->role->name == 'agent' ? 'Agent' : 'Developer' }}s</h6>
                                    <h5 class="text-20 line-height-24 font-weight-700 color-white">
                                        {{ $totalActiveTeamMembers }}</h5>
                                </div>
                                <div class="d-flex flex-column dashboard_agent-line">
                                    @if (auth()->user()->role->name == 'agent')
                                        <img src="{{ asset('img/remaing_seat_available.svg') }}" alt="image"
                                            class="" width="32" height="32">
                                    @else
                                        <img src="{{ asset('img/developer_seats-remaining.svg') }}" alt="image"
                                            class="" width="32" height="32">
                                    @endif
                                    <h6 class="text-14 color-white font-weight-400 pt-1 pb-1">Remaining Seats Available
                                    </h6>
                                    <h5 class="text-20 line-height-24 font-weight-700 color-white">
                                        {{ $activeMembersLimit - $totalActiveTeamMembers }}</h5>
                                </div>
                                @if (auth()->user()->role->name == 'agent')
                                    <div class="d-flex flex-column dashboard_agent-line">
                                        <img src="{{ asset('img/home_icon.svg') }}" alt="image" class=""
                                            width="32" height="32">
                                        <h6 class="text-14 color-white font-weight-400 pt-1 pb-1">Number Of Shared
                                            Properties
                                        </h6>
                                        <h5 class="text-20 line-height-24 font-weight-700 color-white">
                                            0</h5>
                                    </div>
                                @endif

                            </div>
                        @else
                            @if (auth()->user()->role->name == 'sub-agent')
                                <!-- <div class="d-flex mt-4">
                                <div class="d-flex flex-column dashboard_agent-line">
                                    <img src="{{ asset('img/active_sub_dev.svg') }}" alt="image" class=""
                                        width="32" height="32">
                                    <h6 class="text-14 color-white font-weight-400 pt-1 pb-1">Active Sub-Developers</h6>
                                    <h5 class="text-20 line-height-24 font-weight-700 color-white">0</h5>
                                </div>
                                <div class="d-flex flex-column dashboard_agent-line">
                                    <img src="{{ asset('img/active_sub_dev.svg') }}" alt="image" class=""
                                        width="32" height="32">
                                    <h6 class="text-14 color-white font-weight-400 pt-1 pb-1">Remaining Seats Available
                                    </h6>
                                    <h5 class="text-20 line-height-24 font-weight-700 color-white">0</h5>
                                </div>
                            </div> -->
                                <p class="color-white text-start font-weight-700 mt-4">InmoConnect BETA Account
                                    Validity:
                                </p>
                                <ul id="timeControl" class="timecontrol_dashboard">
                                    <li><span id="days">340</span>Day</li>
                                    <li><span id="hours">6</span>Hours</li>
                                    <li><span id="minutes">26</span>Minutes</li>
                                    <li><span id="seconds">12</span>Seconds</li>
                                </ul>
                            @endif
                        @endif

                    </div>
                    <div class="new_dashboard-img d-none d-lg-block">
                        <img src="{{ asset('img/dashboard_home.svg') }}" alt="image">
                    </div>
                </div>
            </div>
            @if (!empty(Auth::user()->companyDetails))
                <div class="new_dashboard-left_main d-flex align-items-center justify-content-center">
                    <div
                        class="new_dashboard-left box-shadow-two b-color-white border-r-8 w-100 h-100 d-flex align-items-center justify-content-center">
                        <img src="{{ !empty(Auth::user()->companyDetails->company_image) ? Auth::user()->companyDetails->company_image : asset('img/logoplaceholder.svg') }}"
                            alt="image">
                    </div>
                </div>
            @endif
        </div>


        <div class="row mt-20">
            @if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent')
                <div class="col-sm-6 col-md-6 col-lg-4 mb-3 pb-0 mb-md-3 pb-md-1 mb-lg-0 pb-lg-0 "
                    onclick="window.open('{{ route(routeNamePrefix() . 'properties.index') }}','_self')">
                    <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="dashboard-top">
                                <h4
                                    class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                    {{ trans('messages.agent-dashboard.My_Listed_Properties') }}
                                </h4>
                                <h2 class="lineheight-42 text-32 font-weight-700 color-primary">
                                    {{ $agentProperties->total() }}
                                </h2>
                            </div>
                            <div class="dashboard-bottom">
                                <div class="dashboard-img">
                                    <img src="{{ asset('img/dashboard-1.svg') }}" alt="image" class="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-3 pb-0 mb-md-3 pb-md-1 mb-lg-0 pb-lg-0 "
                    onclick="window.open('{{ route(routeNamePrefix() . 'agents.index') }}','_self')">
                    <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="dashboard-top">
                                <h4
                                    class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                    {{ trans('messages.agent-dashboard.My_Network_Agents') }}
                                </h4>
                                <h2 class="lineheight-42 text-32 font-weight-700 color-primary">
                                    {{ $connectedAgentsCount ?? 0 }}</h2>
                            </div>
                            <div class="dashboard-bottom">
                                <div class="dashboard-img">
                                    <img src="{{ asset('img/dashboard-2.svg') }}" alt="image" class="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 "
                    onclick="window.open('{{ route(routeNamePrefix() . 'customers.index') }}','_self')">
                    <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="dashboard-top">
                                <h4
                                    class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                    {{ trans('messages.agent-dashboard.My_Customers') }}
                                </h4>
                                <h2 class="lineheight-42 text-32 font-weight-700 color-primary">
                                    {{ $connectedCustomersCount ?? 0 }}</h2>
                            </div>
                            <div class="dashboard-bottom">
                                <div class="dashboard-img">
                                    <img src="{{ asset('img/dashboard-3.svg') }}" alt="image" class="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-sm-6 col-md-6 col-lg-4 mb-3 pb-0 mb-md-3 pb-md-1 mb-lg-0 pb-lg-0 "
                    onclick="window.open('{{ route(routeNamePrefix() . 'developments.index') }}','_self')">
                    <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="dashboard-top">
                                <h4
                                    class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                    Listed Developments
                                </h4>
                                <h2 class="lineheight-42 text-32 font-weight-700 color-primary">
                                    {{ $agentProjects->total() }}</h2>
                            </div>
                            <div class="dashboard-bottom">
                                <div class="dashboard-img">
                                    <img src="{{ asset('img/dashboard-4.svg') }}" alt="image" class="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-3 pb-0 mb-md-3 pb-md-1 mb-lg-0 pb-lg-0 "
                    onclick="window.open('{{ route(routeNamePrefix() . 'properties.index') }}','_self')">
                    <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="dashboard-top">
                                <h4
                                    class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                    Total Number of Units
                                </h4>
                                <h2 class="lineheight-42 text-32 font-weight-700 color-primary">
                                    {{ !empty($publishedProperties) ? $publishedProperties : 0 }}</h2>
                            </div>
                            <div class="dashboard-bottom">
                                <div class="dashboard-img">
                                    <img src="{{ asset('img/dashboard-1.svg') }}" alt="image" class="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 "
                    onclick="window.open('{{ route(routeNamePrefix() . 'agents.index') }}','_self')">
                    <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="dashboard-top">
                                <h4
                                    class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                    My Agents Network
                                </h4>
                                <h2 class="lineheight-42 text-32 font-weight-700 color-primary">
                                    {{ $connectedAgentsCount ?? 0 }}</h2>
                            </div>
                            <div class="dashboard-bottom">
                                <div class="dashboard-img">
                                    <img src="{{ asset('img/dashboard-2.svg') }}" alt="image" class="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>



        <div class="row ">
            <div class="col-lg-12">
                <!-- ////////////////////////////new-listed-property///////////////////////////// -->
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  propertyTableData mt-20">
                    <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                        {{ trans('messages.agent-dashboard.New_Listed_Properties') }}
                    </h4>
                    <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2 flex-wrap">
                        <div class="search_button">
                            <div class="form-group mt-3 position-relative">
                                <div class="input-group input-group-sm dashboard_input-search">
                                    <span
                                        class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                    <input type="text" name="search_input_property"
                                        class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                        placeholder="{{ trans('messages.agent-dashboard.search_here') }}"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div class="search-select common-label-css without_checkbox">
                            <x-forms.crm-single-select :fieldData="[
                                'name' => 'sort_by_property',
                                'hasLabel' => true,
                                'label' => trans('messages.search_filter.Sort_By'),
                                'id' => 'sort_by_property',
                                'options' => [
                                    'high_low' => trans('messages.agent-dashboard.sort_high_to_low'),
                                    'low_high' => trans('messages.agent-dashboard.sort_low_to_high'),
                                    'newest' => trans('messages.agent-dashboard.sort_newest'),
                                    'oldest' => trans('messages.agent-dashboard.sort_oldest'),
                                ],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('messages.search_filter.Sort_By'),
                                'isRequired' => false,
                            ]" />
                        </div>
                    </div>
                    @include('modules.dashboard.includes.load-properties-table-data')
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 d-flex flex-column justify-content-between">
                <div class=" border-r-12 b-color-white box-shadow-one mt-20 ">
                    {!! $groupChatHistoryData ?? '' !!}
                </div>


                <!-- /////////////////////////////chart///////////////////////////////////////// -->
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                    <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                        {{ trans('messages.agent-dashboard.Property_Portfolio_Overview') }}
                    </h4>
                    @if ($agentProperties->isNotEmpty())
                        <div class="chart text-center">
                            <canvas id="myChart"
                                style="width:100%;max-width:637px;margin-left:auto;margin-right:auto;"></canvas>
                        </div>
                    @else
                        @php
                            $colorArr = ['red', 'blue', 'orange', 'sky', 'lightgreen', 'yellow', 'pink'];
                        @endphp
                        <div class="chart text-center pt-3">
                            <img src="/img/Round.svg" alt="image" class="">
                        </div>
                        <div class="chart-labels pt-30 pb-1">
                            @foreach ($propertyTypes as $categoryKey => $category)
                                <div class="small-card-dot d-flex align-items-center">
                                    <div
                                        class="dashboard-round {{ !empty($colorArr[$categoryKey]) ? $colorArr[$categoryKey] : 'red' }}-color me-2">
                                    </div>
                                    <h6
                                        class="chart-label text-14 lineheight-18 font-weight-400 color-light-grey-four text-capitalize">
                                        {{ $category ?? '' }}</h6>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <!-- //////////////////////////end-chart///////////////////////////////////// -->
            </div>
            <div class="col-lg-4 d-flex flex-column justify-content-between">

                @include('modules.dashboard.includes.event_mgmt')
                @if (auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'agent')
                    <div class="dashboard-card_one box-shadow-two b-color-white border-r-8 mt-20">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <h5 class="color-primary text-18 font-weight-700 text-capitalize">Feed Status: </h5>
                                <h5 class="color-primary text-14 font-weight-700 pt-3 text-capitalize">
                                    @if (!empty($formattedDate))
                                        Feed Synced Successfully
                                    @else
                                        Not Synced
                                    @endif
                                </h5>
                            </div>
                            <div class="align-items-center d-flex flex-column justify-content-center">
                                @if (!empty($formattedDate))
                                    <button type="button" class="bg-transparent"
                                        onclick="window.open('{{ route(routeNamePrefix() . 'user.view-company') }}','_self')">
                                        <img src="{{ asset('img/refresh-dashboard_green.svg') }}" alt="image"
                                            class="">
                                        <p class="color-primary text-16 font-weight-500 pt-2 text-capitalize">
                                            {{ $formattedDate }} </p>
                                    </button>
                                @else
                                    <button type="button" id="sync_btn"
                                        class="blur_btn_gradiant small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white d-flex text-16 align-items-center "
                                        onclick="window.open('{{ route(routeNamePrefix() . 'user.view-company') }}','_self')">
                                        <img src="{{ asset('img/refresh-dashboard.svg') }}" alt="image"
                                            class="pe-2">
                                        Sync
                                    </button>
                                @endif

                            </div>
                        </div>
                    </div>
                @endif

                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 mt-20">
                    <div class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary mb-20">
                        Top Regions:
                    </div>
                    <canvas id="myBarChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 taskMangementRow">
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                    <div class="dashboard_card-title d-flex align-items-center justify-content-between">
                        <div class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                            Company's To-Do List
                        </div>
                        @if ($user_company_tasks && $user_company_tasks->isNotEmpty())
                            <div class="header-right-button_one d-flex align-items-center gap-3">

                                {{-- modal-button --}}
                                <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#single_todolist">
                                    <i class="icon-To_do_list"></i>
                                </div>
                            </div>
                        @endif
                    </div>
                    @include('modules.dashboard.includes.todo_mgmt')
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-12">
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                    <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                        Properties Leads:
                    </h4>
                    <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2 flex-wrap">
                        <div class="search_button">
                            <div class="form-group mt-3 position-relative">
                                <div class="input-group input-group-sm dashboard_input-search">
                                    <span
                                        class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                    <input type="text" name="table_search_input"
                                        class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                        placeholder="{{ trans('messages.agent-dashboard.search_here') }}"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div class="search-select common-label-css without_checkbox">
                            <x-forms.crm-single-select :fieldData="[
                                'name' => 'table_sort_by',
                                'hasLabel' => true,
                                'label' => trans('messages.search_filter.Sort_By'),
                                'id' => 'sort_by_property_two',
                                'options' => [
                                    'high_low' => trans('messages.agent-dashboard.sort_high_to_low'),
                                    'low_high' => trans('messages.agent-dashboard.sort_low_to_high'),
                                    'newest' => trans('messages.agent-dashboard.sort_newest'),
                                    'oldest' => trans('messages.agent-dashboard.sort_oldest'),
                                ],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('messages.search_filter.Sort_By'),
                                'isRequired' => false,
                            ]" />
                        </div>
                    </div>

                    <div class="table_customer-three pt-20">
                        <table id="example_one"
                            class="display  dashboard_edit_one table-bottom-border propertyLeadTableData"
                            style="width:100%; ">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Property Reference</th>
                                    <th>Property Title</th>
                                    <th>Lead Date</th>
                                    <th>Lead Name</th>
                                    <th>Account Type</th>
                                    <th>City</th>
                                    <th>Price</th>
                                    <th></th>
                                    <th>
                                    <th>
                                </tr>
                            </thead>

                            <tbody class="tableData">
                                @if ($results->isNotEmpty())
                                    @include('components.tables.custom-table', [
                                        'results' => $results,
                                        'listingType' => 'property_lead_list',
                                    ])
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">

                                            <p>{{ trans('messages.properties.no_properties_inquiry_found') }}</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-12">
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                    <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                        List of Collaborated Properties:
                    </h4>
                    <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2 flex-wrap">
                        <div class="search_button">
                            <div class="form-group mt-3 position-relative">
                                <div class="input-group input-group-sm dashboard_input-search">
                                    <span
                                        class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                    <input type="text" name="search_input_property_collaboration"
                                        class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                        placeholder="{{ trans('messages.agent-dashboard.search_here') }}"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div class="search-select common-label-css without_checkbox">
                            <x-forms.crm-single-select :fieldData="[
                                'name' => 'sort_by_property_collaboration',
                                'hasLabel' => true,
                                'label' => trans('messages.search_filter.Sort_By'),
                                'id' => 'sort_by_property_three',
                                'options' => [
                                    'high_low' => trans('messages.agent-dashboard.sort_high_to_low'),
                                    'low_high' => trans('messages.agent-dashboard.sort_low_to_high'),
                                    'newest' => trans('messages.agent-dashboard.sort_newest'),
                                    'oldest' => trans('messages.agent-dashboard.sort_oldest'),
                                ],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('messages.search_filter.Sort_By'),
                                'isRequired' => false,
                            ]" />
                        </div>
                    </div>

                    <div class="table_dashboard empty-dashboard table-empty-dashboard_1">
                        <div class="empty-table">
                            <div class="empty-image">
                                <i class="icon-house_id icon-30 color-primary"></i>
                                <!-- <img src="{{ asset('img/empty-property1.svg') }}" alt="image" class=""> -->
                            </div>


                            <div
                                class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                No Collaborations Found
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="row mt-20">
            <div class="col-lg-12">
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 ">
                    <div class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary pb-3">
                        Properties Map
                    </div>
                    <ul class="pb-3 tabs border-0 map_tabs">
                        @if (auth()->user()->role->name == 'agent')
                            <li class="tab-link tab_1 current small-button  border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-black text-wrap"
                                data-tab="tab-1"> <img src="{{ asset('img/location_gradiant.svg') }}" alt="image"
                                    class="me-2">Company's Listing</li>
                        @endif
                        <li class="tab-link tab_2 small-button  border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-black text-wrap"
                            data-tab="tab-1"><img src="{{ asset('img/location_blue.svg') }}" alt="image"
                                class="me-2">Connected Agent's Listings</li>
                    </ul>
                    <div id="tab-1" class="tab-content_one current">
                        @if ($agentProperties->isNotEmpty())
                            <div id="propertyMap" style="height: 400px;"></div>
                        @else
                            <div class="dashboard_map-empty empty-dashboard">
                                <div class="empty-table">
                                    <div class="empty-image">
                                        <img src="/img/empty-property.svg" alt="image" class="">
                                    </div>
                                    <h4
                                        class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                        {{ trans('messages.agent-dashboard.This_section_is_empty') }}
                                    </h4>

                                </div>
                            </div>
                        @endif
                    </div>
                    <div id="tab-2" class="tab-content_one">

                    </div>
                </div>
            </div>
            @if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer')
                <div class="col-lg-12">
                    <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                        <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                            Team Member's Activity:
                        </h4>
                        @if ($userRecentActivities && $userRecentActivities->isNotEmpty())
                            <div style="overflow-y: scroll"
                                class="table_dashboard empty-dashboard table-empty-dashboard_property pt-10 recent_activity_h-one projectRecentActivityTableData flex-column justify-content-start align-items-start">
                                @include('modules.projects.includes.load_recent_activity_mgmt', [
                                    'userRecentActivities' => $userRecentActivities,
                                ])
                                {{-- @if ($userRecentActivities->isNotEmpty())
                                @foreach ($userRecentActivities as $activity)
                                <div class="d-flex align-items-start mb-30">
                                    <div class="d-flex activity_before mb-4">
                                        <div class="activity_img empty-image empty_image_top">
                                            <i class=" icon-Task_Management-Icon  icon-16 color-primary"></i>
                                        </div>
                                        <div class="activity_text ms-2">
                                            <div
                                                class="color-light-grey-seven  text-14 font-weight-400 lineheight-18 text-capitalize">
                                                <span class="font-weight-700 color-b-blue">Ivana Tinkle</span> creates new
                                                checklist for <span class="font-weight-700 color-b-blue">Inés Ferrer</span>
    
                                            </div>
                                            <div
                                                class="mt-1 color-light-grey-six text-14 font-weight-400 lineheight-18 text-capitalize text-start">
                                                16/07/2024, 12:58 PM</div>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach
                            @else
                                <div class="empty-table text-center">
                                    <div class="empty-image">
                                        <i class="icon-house_id icon-30 color-primary"></i>
                                        <!-- <img src="{{ asset('img/empty-property1.svg') }}" alt="image" class=""> -->
                                    </div>


                                    <div
                                        class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                        No Recent Activities Found
                                    </div>

                                </div>
                            @endif --}}
                            </div>
                        @endif
                    </div>
            @endif
        </div>
    </div>
</div>

<!-- Event Sidebar Modal -->
@include('modules.events.includes.event_sidebar')

<!-- Add Event Modal -->
@include('modules.events.includes.add_event')

@include('modules.dashboard.includes.add_todo_list_modal')

@include('modules.property_lead.includes.property_lead')

@push('scripts')
    <script>
        var getLeadDetails = "{{ route(routeNamePrefix() . 'properties.getLeadDetails', ':id') }}";
        var routeLastsync = "{{ route(routeNamePrefix() . 'user.company-details') }}";
        var routeUrl = "{{ route(routeNamePrefix() . 'user.profile') }}";
        var routeUrlAddEvent = "{{ route(routeNamePrefix() . 'events.store') }}";
        var routeUrlViewEvent = "{{ route(routeNamePrefix() . 'events.getEventDetailSideview', ':eventId') }}";
        var routeUrlEditEvent = "{{ route(routeNamePrefix() . 'events.store', ':eventId') }}";
        var routeUrlLoadProperties = "{{ route(routeNamePrefix() . 'user.loadPropertiesData') }}";
        var propertyTypes = {!! json_encode($propertyTypes) !!};
        var typeCounts = {!! json_encode($typeCounts) !!};
        var hasChart = true;
        var hasBarChart = true;

        var loadCurrentEvent = "{{ route(routeNamePrefix() . 'user.loadCurrentEvent') }}";
        var routeUrlAddEvent = "{{ route(routeNamePrefix() . 'events.store') }}";
        var routeUrlViewEvent = "{{ route(routeNamePrefix() . 'events.getEventDetailSideview', ':eventId') }}";
        var routeUrlEditEvent = "{{ route(routeNamePrefix() . 'events.store', ':eventId') }}";
        var eventDeleteUrl = "{{ route(routeNamePrefix() . 'events.destroy', ':eventId') }}";
        var eventDetailstext = "{{ trans('messages.add-events.Event_Details') }}";
        var editEventDetailsText = "{{ trans('messages.add-events.Edit_events_details') }}";
        var Attempt_deleteText = "{{ trans('messages.delete-events.You_Are_Attempting_To_Delete_Event') }}";
        var areYouSureText = "{{ trans('messages.delete-events.Are_You_Sure') }}";
        var deleteText = "{{ trans('messages.delete-events.delete') }}";
        var removeEventAttachementUrl = "{{ route(routeNamePrefix() . 'user.removeEventAttachement', ':id') }}";

        var routeUrlAddSingleTask = "{{ route(routeNamePrefix() . 'user.saveSingleTaskData') }}";
        var routeUrlLoadUserCompanyTasksData = "{{ route(routeNamePrefix() . 'user.fetchUserCompanyTasks') }}";
        var routeUrlDeleteUserCompanyTask = "{{ route(routeNamePrefix() . 'user.deleteUserCompanyTask', ':id') }}";
        var updateTaskStatusUrl = "{{ route(routeNamePrefix() . 'user.updateTaskStatus') }}";
        var userCompanyTaskDeleteConfirmText =
            "{{ trans('messages.confirm_popup.You_Are_Attempting_To_Remove_ToDo_List') }}";
        var addAssignToDoList = "{{ route(routeNamePrefix() . 'user.addAssignToDoList') }}";
        var removeTextConfirmPopup = "{{ trans('messages.confirm_popup.Remove') }}";
    </script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=places"
        defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="{{ asset('assets/js/modules/dashboard/agent-dashboard.js') }}"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('propertyMap'), {
                zoom: 2,
                center: {
                    lat: 40.7128,
                    lng: -74.0060
                }
            });

            var bounds = new google.maps.LatLngBounds(); // Create a LatLngBounds object to contain all markers

            // Loop through agent properties to add markers
            @if ($agentProperties->isNotEmpty())
                @foreach ($agentProperties as $property)

                    var userIcon = {
                        url: '{{ asset('img/location_map.svg') }}',
                        scaledSize: new google.maps.Size(40, 40),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(15, 15)
                    };

                    var marker = new google.maps.Marker({
                        position: {
                            lat: {{ $property->latitude }},
                            lng: {{ $property->longitude }}
                        },
                        map: map,
                        icon: userIcon,
                    });

                    var userImage = {
                        url: '{{ Config('constant.USER_IMAGE_URL') . $property->agentImage }}',
                        scaledSize: new google.maps.Size(20, 20),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(6, 10),
                        className: 'userImageMarker'
                    };

                    var userMarker = new google.maps.Marker({
                        position: {
                            lat: {{ $property->latitude }},
                            lng: {{ $property->longitude }}
                        },
                        icon: userImage,
                        title: 'userMarker'
                    });

                    // Set zIndex explicitly
                    marker.setZIndex(1);
                    userMarker.setZIndex(0);

                    // Create the info window content
                    var infoContent =
                        '<div class="map_text"><div><img src="{{ !empty($property->cover_image) ? $property->cover_image : asset('img/default-property.jpg') }}" alt="Property Image" style="max-width: 50px; height: 50px;"></div>' +
                        '<div class="map-text-two"><div class="text-14 font-weight-700 color-b-blue lineheight-18">{{ $property->name }}</div>' +
                        '<div class="d-flex pt-2 gap-2"><span class="icon-location icon-16 color-b-blue"></span><span class="map-property-address text-14 font-weight-400 lineheight-18 color-b-blue">{{ $property->address }}</span></div>' +
                        '<div class="d-flex pt-2 justify-content-between"><div class="d-flex  gap-2"><span class="icon-house_id icon-16 color-b-blue"></span><span class=" text-14 font-weight-400 lineheight-18 color-b-blue">{{ $property->reference }}</span></div><a class="text-decoration-underline text-14 lineheight-18 font-weight-400 color-b-blue" href="' +
                        "{{ route(routeNamePrefix() . 'properties.show', $property->reference) }}" +
                        '">View</a></div></div></div>';

                    // Create the info window
                    var infowindow = new google.maps.InfoWindow();

                    // Extend the bounds to include each marker's position
                    bounds.extend(new google.maps.LatLng({{ $property->latitude }}, {{ $property->longitude }}));

                    // Add click event listener to the marker to open the info window
                    marker.addListener('click', function(property) {
                        return function() {
                            infowindow.setContent(property);
                            infowindow.open(map, this);
                        }
                    }(infoContent)); // Pass infoContent as a variable

                    // Add both markers to the map
                    marker.setMap(map);
                    userMarker.setMap(map);
                @endforeach
            @endif

            // Adjust the map to fit all markers within the bounds
            map.fitBounds(bounds);
        }
    </script>

    <script>
        let timeToStart = document.querySelector('#timeToStart')
        let timeControl = document.querySelector('#timeControl')
        let second = 1000
        let minute = second * 60
        let hour = minute * 60
        let day = hour * 24

        let countDown = new Date('Sep 20, 2025 00:00:00').getTime();

        const myRacing = () => {

            let nowDate = new Date().getTime(),
                distance = countDown - nowDate;
            //
            document.getElementById('days').innerText = Math.floor(distance / (day)),
                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

            if (distance < 0) {
                clearInterval(MyTimer);
                timeToStart.innerHTML = 'The camp began ☻'
                timeControl.innerHTML = ''
            }

        }

        MyTimer = setInterval(myRacing, 1000);
    </script>

    <script>
        function openSidebar(id) {
            document.getElementById("property_lead_sidebar").style.width = "755px";

            const attributes = {
                hasButton: false,
                handleSuccess: function() {
                    $('.property_lead_sidebar').html("");
                    $('.property_lead_sidebar').html(datas['htmlData']);

                },
                handleError: function() {},
                handleErrorMessages: function() {},
            };

            const ajaxOptions = {
                url: getLeadDetails.replace(':id', id),
                method: "get",
                data: {},
            };

            makeAjaxRequest(ajaxOptions, attributes);

        }

        function closeSidebar() {
            document.getElementById("property_lead_sidebar").style.width = "0";
            document.getElementById("mySidebar_one").style.width = "0";
        }
    </script>
@endpush
@endsection
