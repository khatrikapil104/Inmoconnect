@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.dashboard.Edit_Profile') }} Inmoconnect
        @endsection

        <div class="overlay" id="overlay"></div>
        <div id="page-content-wrapper" class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
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

                <div class="row">
                    <div class="col-lg-9">
                        <div class="new_dashboard_agent d-flex justify-content-between ">
                            <div class="new_dashboard-text">
                                <h3 class="text-18 color-white font-weight-700">Good Morning, James Henry!</h3>
                                <h6 class="text-14 opacity-7 color-white mt-2">Welcome to InmoConnect Dashboard, Your Next Gen
                                    Real
                                    Estate CRM</h6>
                                <div class="d-flex mt-4">
                                    <div class="d-flex flex-column dashboard_agent-line">
                                        <img src="http://127.0.0.1:8000/img/dashboard-2.svg" alt="image" class=""
                                            width="32" height="32">
                                        <h6 class="text-14 color-white font-weight-400 pt-1 pb-1">Active Sub-Agents</h6>
                                        <h5 class="text-20 line-height-24 font-weight-700 color-white">0</h5>
                                    </div>
                                    <div class="d-flex flex-column dashboard_agent-line">
                                        <img src="http://127.0.0.1:8000/img/dashboard-2.svg" alt="image" class=""
                                            width="32" height="32">
                                        <h6 class="text-14 color-white font-weight-400 pt-1 pb-1">Remaining Seats Available</h6>
                                        <h5 class="text-20 line-height-24 font-weight-700 color-white">0</h5>
                                    </div>
                                    <div class="d-flex flex-column dashboard_agent-line">
                                        <img src="http://127.0.0.1:8000/img/dashboard-2.svg" alt="image" class=""
                                            width="32" height="32">
                                        <h6 class="text-14 color-white font-weight-400 pt-1 pb-1">Number of Shared Properties
                                        </h6>
                                        <h5 class="text-20 line-height-24 font-weight-700 color-white">0</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="new_dashboard-img">
                                <img src="{{ asset('img/dashboard_home.svg') }}" alt="image">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div
                            class="new_dashboard-left box-shadow-two b-color-white border-r-8 w-100 h-100 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('img/realinmo_dashboard.svg') }}" alt="image">
                        </div>
                    </div>
                </div>

                <div class="row mt-20">
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-3 pb-0 mb-md-3 pb-md-1 mb-lg-0 pb-lg-0 "
                        onclick="window.open('{{ route(routeNamePrefix() . 'properties.index') }}','_self')">
                        <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="dashboard-top">
                                    <h4
                                        class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                        {{ trans('messages.agent-dashboard.My_Listed_Properties') }}
                                    </h4>
                                    <h2 class="lineheight-42 text-32 font-weight-700 color-primary">{{ $propertiesCount ?? 0 }}
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
                </div>

                <div class="row ">
                    <div class="col-lg-12">
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
                            <div class="table_dashboard empty-dashboard ">
                                <div class="empty-table">
                                    <div class="empty-image">
                                        <img src="/img/empty-property.svg" alt="image" class="">
                                    </div>
                                    <div
                                        class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                        Start importing properties who are part of<br>this project from your general
                                        listings
                                    </div>
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                                        data-toggle="modal" data-target="#addproperty">Add New Property</button>
                                </div>
                            </div>
                            {{-- @include('modules.dashboard.includes.load-properties-table-data') --}}
                        </div>
                    </div>
                </div>

                <div class="row mt-20">
                    <div class="col-lg-8">
                        <div class=" box-shadow-two b-color-white border-r-8">
                            <div class="chat_massage_card d-flex align-items-center justify-content-between">
                                <a class="viewGroupDetails">
                                    <div class="chat_message_p-left d-flex align-items-center">
                                        <div class="p_left-img">
                                            <img src="https://www.staging.inmoconnect.com/img/Group_Icon_profile.svg"
                                                alt="Default Image" class="border-r-8" height="50" width="50">
                                        </div>
                                        <div class="p_left-text ps-2">
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Hernán Cortés II
                                            </div>
                                            <!-- <div class="text-14 font-weight-400 lineheight-18 color-grey">Customer</div> -->
                                            <div class="text-14 font-weight-400 lineheight-16 color-green">1
                                                members are online</div>
                                        </div>
                                    </div>
                                </a>
                                <div class="chat_message_p-right">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="d-flex ">
                                            <div class="dashboard_img chat_d-img">
                                                <img src="https://www.staging.inmoconnect.com/img/default-user.jpg"
                                                    alt="image" class="">
                                            </div>
                                            <div class="dashboard_img chat_d-img">
                                                <img src="https://www.staging.inmoconnect.com/img/default-user.jpg"
                                                    alt="image" class="">
                                            </div>
                                            <div class="dashboard_img chat_d-img">
                                                <img src="https://www.staging.inmoconnect.com/img/default-user.jpg"
                                                    alt="image" class="">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="chat_message_second-card p-20">
                                <div class="chat_msg-height chat_msg-dashboard">
                                    <div class="empty-chat d-flex align-items-center justify-content-center h-100 flex-column">
                                        <div class="empty-image">
                                            <i class="icon-house_id icon-30 color-primary"></i>
                                        </div>
                                        <div
                                            class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                            No any Message in the Group
                                        </div>
                                    </div>
                                </div>
                                <div class="chat_bottom_text d-flex align-items-center mt-30">
                                    <div class="chat_massage-input">
                                        <div class="chat_message_input-icon emoji-picker-container">
                                            <input class="input-chat" type="text" placeholder="Type your message here"
                                                data-emojiable="true" name="private_input_message">
                                        </div>
                                    </div>
                                    <button class="chat-meassage_document privateDocumentSelectBtn" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class=" icon-send_document icon-24 "></i>
                                    </button>
                                    <button class="chat-message_delivery privateMessageSendBtn" data-user-id="3">
                                        <i class=" icon-send_msg icon-24 "></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 mt-20">
                            <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                                Property Portfolio Overview:
                            </h4>
                            <div class="dashboard_portfolio pt-20 d-flex justify-content-center">
                                <img src="{{ asset('img/dashboard_portfolio.svg') }}" alt="image" class="">

                            </div>
                            <div class="d-flex gap-3 justify-content-center align-items-center pt-30">
                                <div class="small-card-dot d-flex align-items-center">
                                    <div class="dashboard-round red-color me-2">
                                    </div>
                                    <h6
                                        class="chart-label text-14 lineheight-18 font-weight-400 color-light-grey-four text-capitalize">
                                        Apartment</h6>
                                </div>
                                <div class="small-card-dot d-flex align-items-center">
                                    <div class="dashboard-round blue-color me-2">
                                    </div>
                                    <h6
                                        class="chart-label text-14 lineheight-18 font-weight-400 color-light-grey-four text-capitalize">
                                        House</h6>
                                </div>
                                <div class="small-card-dot d-flex align-items-center">
                                    <div class="dashboard-round orange-color me-2">
                                    </div>
                                    <h6
                                        class="chart-label text-14 lineheight-18 font-weight-400 color-light-grey-four text-capitalize">
                                        Plot</h6>
                                </div>
                                <div class="small-card-dot d-flex align-items-center">
                                    <div class="dashboard-round lightgreen-color me-2">
                                    </div>
                                    <h6
                                        class="chart-label text-14 lineheight-18 font-weight-400 color-light-grey-four text-capitalize">
                                        Commercial</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8">
                            <div class="dashboard_card-title d-flex align-items-center justify-content-between">
                                <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                                    Project’s Events Schedule:
                                </h4>
                                <div class="header-right-button_one d-flex align-items-center gap-3 " id="">
                                    <div class="" id="project_add_event">
                                        <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center my_dsevent"
                                            data-bs-toggle="modal" data-bs-target="#addEventModal" id="">
                                            <i class="icon-schedule_add"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex pt-3 pb-3 border-empty-dashboard align-items-center justify-content-between">
                                <div class="d-flex flex-column">
                                    <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                        Mon</div>
                                    <div class="color-b-blue text-14 font-weight-700 lineheight-18">
                                        15
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                        Tue</div>
                                    <div class="color-b-blue text-14 font-weight-700 lineheight-18">
                                        16
                                    </div>
                                </div>
                                <div class="today_appointment-dashboard d-flex flex-column">
                                    <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                        Tue</div>
                                    <div class="color-b-blue text-14 font-weight-700 lineheight-18">
                                        30
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                        Thu</div>
                                    <div class="color-b-blue text-14 font-weight-700 lineheight-18">
                                        18
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                        Fri</div>
                                    <div class="color-b-blue text-14 font-weight-700 lineheight-18">
                                        19
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                        Sat</div>
                                    <div class="color-b-blue text-14 font-weight-700 lineheight-18">
                                        20
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                        Sun</div>
                                    <div class="color-b-blue text-14 font-weight-700 lineheight-18">
                                        21
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard_table-swiper">
                                <div class="empty-table d-flex flex-column h-100 justify-content-center align-items-center">
                                    <div class="empty-image">
                                        <img src="/img/empty-calender.svg" alt="image" class="">
                                    </div>
                                    <div
                                        class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                        No Upcoming Event
                                    </div>
                                    <button type="button"
                                        class="small-button Gradient_button   border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white  modal-confirm-btn-success position-relative"
                                        data-bs-toggle="modal" data-bs-target="#addEventModal">
                                        Add New Event
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 mt-20">
                            <div class="d-flex justify-content-between ">
                                <div class="">
                                    <h5 class="color-primary text-18 font-weight-700 text-capitalize">last sync: </h5>
                                    <h5 class="color-primary text-18 font-weight-700 pt-3 text-capitalize">No Update </h5>
                                </div>
                                <div class="align-items-center d-flex flex-column">
                                    <img src="{{ asset('img/refresh-dashboard.svg') }}" alt="image" class="">
                                    <h5 class="color-primary text-18 font-weight-700 pt-2 text-capitalize">Sync Now </h5>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 mt-20">
                            <div class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary mb-20">
                                Top Regions:
                            </div>
                            <img src="{{ asset('img/top_regions.svg') }}" alt="image" class="">
                        </div>
                    </div>
                </div>

                <div class="row propertyMangementRow">
                    <div class="col-lg-12">
                        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                            <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                                Company's To-Do List:
                            </h4>
                            <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
                                <div class="empty-table">
                                    <div class="empty-image">
                                        <i class="icon-house_id icon-30 color-primary"></i>
                                    </div>
                                    <div
                                        class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                        Add your tasks checklist and manage <br />them with timely manner
                                    </div>
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white importProperiesBtn">
                                        Add New To-Do List
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-lg-12">
                        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                            <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                                Properties Inquiry:
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

                            <div class="table_dashboard empty-dashboard table-empty-dashboard_inquiry">
                                <div class="empty-table">
                                    <div class="empty-image">
                                        <i class="icon-house_id icon-30 color-primary"></i>
                                    </div>
                                    <div
                                        class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                        Add your tasks checklist and manage <br />them with timely manner
                                    </div>
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white importProperiesBtn">
                                        Add New To-Do List
                                    </button>
                                </div>
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

                            <div class="table_dashboard empty-dashboard table-empty-dashboard_inquiry">
                                <div class="empty-table">
                                    <div class="empty-image">
                                        <i class="icon-house_id icon-30 color-primary"></i>
                                    </div>
                                    <div
                                        class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                        Add your tasks checklist and manage <br />them with timely manner
                                    </div>
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white importProperiesBtn">
                                        Add New To-Do List
                                    </button>
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

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                            <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                                Recent Activity:
                            </h4>
                            <div
                                class="table_dashboard empty-dashboard table-empty-dashboard_property recent-activity_height d-block pt-10 recent_activity_h-one projectRecentActivityTableData">
                                <div class="activity_before d-flex align-items-start mb-30">
                                    <div class="activity_img empty-image empty_image_top">
                                        <i class=" icon-Task_Management-Icon  icon-16 color-primary"></i>
                                    </div>
                                    <div class="activity_text ms-2">
                                        <div
                                            class="color-light-grey-seven  text-14 font-weight-400 lineheight-18 text-capitalize">
                                            <span class="font-weight-700 color-b-blue">Makwana himanshi</span> imported new
                                            customer <span class="font-weight-700 color-b-blue">Gabriel John</span>
                                        </div>
                                        <div
                                            class="mt-1 color-light-grey-six text-14 font-weight-400 lineheight-18 text-capitalize">
                                            16/07/2024, 12:58 PM</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @push('scripts')



            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>

        @endpush
    @endsection
