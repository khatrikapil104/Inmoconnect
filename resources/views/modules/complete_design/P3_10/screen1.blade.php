@extends('layouts.app')
@section('content')

@push('styles')
@section('title')
{{trans('messages.sidebar.Dashboard')}} Inmoconnect
@endsection

<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="main-content-crm b-color-background  min-vh-100">
    <div class="crm-main-content">

        <!-- ////////////////////////////breadcrum///////////////////////////////////// -->
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">
                        Massages
                    </div>
                </div>
            </div>
        </div>
        <!-- ///////////////////////////end-breadcrum////////////////////////////////////// -->
        <!-- ////////////////////////////////chat_message///////////////////////////////////// -->
        <div class="row">
            <div class="col-lg-3">
                <div class="border-r-12 b-color-white box-shadow-one  p-15">
                    <!-- /////////////////search-button///////////// -->
                    <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                        <div class="search_button w-100">
                            <div class="form-group position-relative">
                                <div class="input-group input-group-sm dashboard_input-search w-100">
                                    <span
                                        class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                    <input type="text" name="userListingFilterData[search]"
                                        class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                        placeholder="Search Massage" value="">
                                </div>
                            </div>
                        </div>
                        <div class="search-select"></div>
                    </div>
                    <!-- /////////////////left_tables/////////////// -->
                    <ul class="tabs chat_tab">
                        <li class="tab-link current tab_link_one" data-tab="tab-1">Private</li>
                        <li class="tab-link tab_link-two" data-tab="tab-2">Group</li>
                        <li class="tab-link tab_link_three" data-tab="tab-3">Contacts</li>
                    </ul>
                    <!-- /////////////////////tab_1///////////////// -->
                    <div id="tab-1" class="tab-content current">
                        <div class="chat_message_main-card mt-2">
                            <div class="chat_msg-first d-flex justify-content-between ps-2">
                                <div class="chat_message_p-left d-flex align-items-center position-relative">
                                    <div class="chat_number">1</div>
                                    <div class="p_left-img image_chat_before">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                            class="border-r-8" height="40" width="40">
                                    </div>
                                    <div class="p_left-text ps-2">
                                        <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Mona Lott
                                        </div>
                                        <div class="text-12 font-weight-400 lineheight-18 color-grey">Customer</div>
                                        <div class="text-14 font-weight-400 lineheight-16 color-green">Typing...</div>
                                    </div>
                                </div>
                                <div class="chat-msg_f-right">
                                    <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                </div>
                            </div>
                            <div class="chat_msg-first d-flex justify-content-between ps-2">
                                <div class="chat_message_p-left d-flex align-items-center position-relative">
                                    <div class="chat_number">1</div>
                                    <div class="p_left-img image_chat_before">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                            class="border-r-8" height="40" width="40">
                                    </div>
                                    <div class="p_left-text ps-2">
                                        <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Mona Lott
                                        </div>
                                        <div class="text-12 font-weight-400 lineheight-18 color-grey">Customer</div>
                                        <div
                                            class="text-chat-change text-14 font-weight-400 lineheight-16 color-b-blue">
                                            Hey
                                            Victor! Could you...</div>
                                    </div>
                                </div>
                                <div class="chat-msg_f-right">
                                    <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                </div>
                            </div>
                            <div class="chat_msg-first d-flex justify-content-between ps-2">
                                <div class="chat_message_p-left d-flex align-items-center position-relative">
                                    <div class="chat_number">1</div>
                                    <div class="p_left-img image_chat_before">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                            class="border-r-8" height="40" width="40">
                                    </div>
                                    <div class="p_left-text ps-2">
                                        <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Mona Lott
                                        </div>
                                        <div class="text-12 font-weight-400 lineheight-18 color-grey">Customer</div>
                                        <div
                                            class="text-chat-change text-14 font-weight-400 lineheight-16 color-b-blue">
                                            Hey
                                            Victor! Could you...</div>
                                    </div>
                                </div>
                                <div class="chat-msg_f-right">
                                    <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                </div>
                            </div>
                            <div class="chat_msg-first d-flex justify-content-between ps-2">
                                <div class="chat_message_p-left d-flex align-items-center position-relative">
                                    <div class="chat_number">1</div>
                                    <div class="p_left-img image_chat_before">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                            class="border-r-8" height="40" width="40">
                                    </div>
                                    <div class="p_left-text ps-2">
                                        <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Mona Lott
                                        </div>
                                        <div class="text-12 font-weight-400 lineheight-18 color-grey">Customer</div>
                                        <div
                                            class="text-chat-change text-14 font-weight-400 lineheight-16 color-b-blue">
                                            Hey
                                            Victor! Could you...</div>
                                    </div>
                                </div>
                                <div class="chat-msg_f-right">
                                    <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                </div>
                            </div>
                            <div class="chat_msg-first d-flex justify-content-between ps-2">
                                <div class="chat_message_p-left d-flex align-items-center position-relative">
                                    <div class="chat_number">1</div>
                                    <div class="p_left-img image_chat_before">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                            class="border-r-8" height="40" width="40">
                                    </div>
                                    <div class="p_left-text ps-2">
                                        <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Mona Lott
                                        </div>
                                        <div class="text-12 font-weight-400 lineheight-18 color-grey">Customer</div>
                                        <div class="text-14 font-weight-400 lineheight-16 color-green">Typing...</div>
                                    </div>
                                </div>
                                <div class="chat-msg_f-right">
                                    <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                </div>
                            </div>
                            <div class="chat_msg-first d-flex justify-content-between ps-2">
                                <div class="chat_message_p-left d-flex align-items-center position-relative">
                                    <div class="chat_number">1</div>
                                    <div class="p_left-img image_chat_before">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                            class="border-r-8" height="40" width="40">
                                    </div>
                                    <div class="p_left-text ps-2">
                                        <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Mona Lott
                                        </div>
                                        <div class="text-12 font-weight-400 lineheight-18 color-grey">Customer</div>
                                        <div class="text-14 font-weight-400 lineheight-16 color-green">Typing...</div>
                                    </div>
                                </div>
                                <div class="chat-msg_f-right">
                                    <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /////////////////////tab_2 /////////////// -->
                    <div id="tab-2" class="tab-content">
                        <div class="chat_m-second-card">
                            <div class="chat-m-button">
                                <button
                                    class="w-100 h-42 b-color-transparent border-r-8 text-14 font-weight-400 lineheight-18 color-primary"
                                    data-toggle="modal" data-target="#todolist"><i
                                        class=" icon-plus color-primary me-2"></i>Create
                                    New Group</button>
                            </div>
                            <div class="chat-message-s-card">
                                <div class="chat_msg-first d-flex justify-content-between ps-2">
                                    <div class="chat_message_p-left d-flex align-items-center position-relative">
                                        <div class="chat_number">1</div>
                                        <div class="p_left-img">
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                class="border-r-8" height="40" width="40">
                                        </div>
                                        <div class="p_left-text ps-2">
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">UI/UX
                                                Designer
                                            </div>
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Group
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-msg_f-right">
                                        <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                    </div>
                                </div>
                                <div class="chat_msg-first d-flex justify-content-between ps-2">
                                    <div class="chat_message_p-left d-flex align-items-center position-relative">
                                        <div class="chat_number">1</div>
                                        <div class="p_left-img">
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                class="border-r-8" height="40" width="40">
                                        </div>
                                        <div class="p_left-text ps-2">
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">UI/UX
                                                Designer
                                            </div>
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Group
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-msg_f-right">
                                        <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                    </div>
                                </div>
                                <div class="chat_msg-first d-flex justify-content-between ps-2">
                                    <div class="chat_message_p-left d-flex align-items-center position-relative">
                                        <div class="chat_number">1</div>
                                        <div class="p_left-img">
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                class="border-r-8" height="40" width="40">
                                        </div>
                                        <div class="p_left-text ps-2">
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">UI/UX
                                                Designer
                                            </div>
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Group
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-msg_f-right">
                                        <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                    </div>
                                </div>
                                <div class="chat_msg-first d-flex justify-content-between ps-2">
                                    <div class="chat_message_p-left d-flex align-items-center position-relative">
                                        <div class="chat_number">1</div>
                                        <div class="p_left-img">
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                class="border-r-8" height="40" width="40">
                                        </div>
                                        <div class="p_left-text ps-2">
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">UI/UX
                                                Designer
                                            </div>
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Group
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-msg_f-right">
                                        <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                    </div>
                                </div>
                                <div class="chat_msg-first d-flex justify-content-between ps-2">
                                    <div class="chat_message_p-left d-flex align-items-center position-relative">
                                        <div class="chat_number">1</div>
                                        <div class="p_left-img">
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                class="border-r-8" height="40" width="40">
                                        </div>
                                        <div class="p_left-text ps-2">
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">UI/UX
                                                Designer
                                            </div>
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Group
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-msg_f-right">
                                        <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                    </div>
                                </div>
                                <div class="chat_msg-first d-flex justify-content-between ps-2">
                                    <div class="chat_message_p-left d-flex align-items-center position-relative">
                                        <div class="chat_number">1</div>
                                        <div class="p_left-img">
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                class="border-r-8" height="40" width="40">
                                        </div>
                                        <div class="p_left-text ps-2">
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">UI/UX
                                                Designer
                                            </div>
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Group
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-msg_f-right">
                                        <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                    </div>
                                </div>
                                <div class="chat_msg-first d-flex justify-content-between ps-2">
                                    <div class="chat_message_p-left d-flex align-items-center position-relative">
                                        <div class="chat_number">1</div>
                                        <div class="p_left-img">
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                class="border-r-8" height="40" width="40">
                                        </div>
                                        <div class="p_left-text ps-2">
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">UI/UX
                                                Designer
                                            </div>
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Group
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-msg_f-right">
                                        <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                    </div>
                                </div>
                                <div class="chat_msg-first d-flex justify-content-between ps-2">
                                    <div class="chat_message_p-left d-flex align-items-center position-relative">
                                        <div class="chat_number">1</div>
                                        <div class="p_left-img">
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                class="border-r-8" height="40" width="40">
                                        </div>
                                        <div class="p_left-text ps-2">
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">UI/UX
                                                Designer
                                            </div>
                                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Group
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-msg_f-right">
                                        <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- ////////////////////tab_3//////////////// -->
                    <div id="tab-3" class="tab-content">
                        <div class="chat-message_t-card mt-10">
                            <div class="chat_messag_contant pb-1">
                                <div class="chat-m-number text-capitalize">A</div>
                            </div>
                            <div class="chat_msg-first d-flex justify-content-between ps-2">
                                <div class="chat_message_p-left d-flex align-items-center position-relative">
                                    <div class="chat_number">1</div>
                                    <div class="p_left-img image_chat_before">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                            class="border-r-8" height="40" width="40">
                                    </div>
                                    <div class="p_left-text ps-2">
                                        <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Mona Lott
                                        </div>
                                        <div class="text-12 font-weight-400 lineheight-18 color-grey">Customer</div>
                                        <div class="text-14 font-weight-400 lineheight-16 color-green">Typing...</div>
                                    </div>
                                </div>
                                <div class="chat-msg_f-right">
                                    <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                </div>
                            </div>
                            <div class="chat_msg-first d-flex justify-content-between ps-2">
                                <div class="chat_message_p-left d-flex align-items-center position-relative">
                                    <div class="chat_number">1</div>
                                    <div class="p_left-img image_chat_before">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                            class="border-r-8" height="40" width="40">
                                    </div>
                                    <div class="p_left-text ps-2">
                                        <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Mona Lott
                                        </div>
                                        <div class="text-12 font-weight-400 lineheight-18 color-grey">Customer</div>
                                        <div
                                            class="text-chat-change text-14 font-weight-400 lineheight-16 color-b-blue">
                                            Hey
                                            Victor! Could you...</div>
                                    </div>
                                </div>
                                <div class="chat-msg_f-right">
                                    <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                </div>
                            </div>
                            <div class="chat_msg-first d-flex justify-content-between ps-2">
                                <div class="chat_message_p-left d-flex align-items-center position-relative">
                                    <div class="chat_number">1</div>
                                    <div class="p_left-img image_chat_before">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                            class="border-r-8" height="40" width="40">
                                    </div>
                                    <div class="p_left-text ps-2">
                                        <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Mona Lott
                                        </div>
                                        <div class="text-12 font-weight-400 lineheight-18 color-grey">Customer</div>
                                        <div
                                            class="text-chat-change text-14 font-weight-400 lineheight-16 color-b-blue">
                                            Hey
                                            Victor! Could you...</div>
                                    </div>
                                </div>
                                <div class="chat-msg_f-right">
                                    <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                </div>
                            </div>
                            <div class="chat_messag_contant pb-1 mt-30">
                                <div class="chat-m-number text-capitalize">B</div>
                            </div>
                            <div class="chat_msg-first d-flex justify-content-between ps-2">
                                <div class="chat_message_p-left d-flex align-items-center position-relative">
                                    <div class="chat_number">1</div>
                                    <div class="p_left-img image_chat_before">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                            class="border-r-8" height="40" width="40">
                                    </div>
                                    <div class="p_left-text ps-2">
                                        <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Mona Lott
                                        </div>
                                        <div class="text-12 font-weight-400 lineheight-18 color-grey">Customer</div>
                                        <div class="text-14 font-weight-400 lineheight-16 color-green">Typing...</div>
                                    </div>
                                </div>
                                <div class="chat-msg_f-right">
                                    <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                </div>
                            </div>
                            <div class="chat_msg-first d-flex justify-content-between ps-2">
                                <div class="chat_message_p-left d-flex align-items-center position-relative">
                                    <div class="chat_number">1</div>
                                    <div class="p_left-img image_chat_before">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                            class="border-r-8" height="40" width="40">
                                    </div>
                                    <div class="p_left-text ps-2">
                                        <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Mona Lott
                                        </div>
                                        <div class="text-12 font-weight-400 lineheight-18 color-grey">Customer</div>
                                        <div
                                            class="text-chat-change text-14 font-weight-400 lineheight-16 color-b-blue">
                                            Hey
                                            Victor! Could you...</div>
                                    </div>
                                </div>
                                <div class="chat-msg_f-right">
                                    <div class="text-12 font-weight-400 color-light-grey-seven">16:30</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="border-r-12 b-color-white box-shadow-one  p-0">
                    <!-- ////////////////tab_1//////////// -->
                    <div id="tab-11" class="tab-content_one active">
                        <div class="chat_massage_card d-flex align-items-center justify-content-between">
                            <div class="chat_message_p-left d-flex align-items-center">
                                <div class="p_left-img">
                                    <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                        class="border-r-8" height="50" width="50">
                                </div>
                                <div class="p_left-text ps-2">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Mona Lott</div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-grey">Customer</div>
                                    <div class="text-14 font-weight-400 lineheight-16 color-green">Typing...</div>
                                </div>
                            </div>
                            <div class="chat_message_p-right">
                                <button class="chat_img-dropdown" onclick="myFunction()">
                                    <img src="/img/chat_dropdown.svg" alt="image">
                                </button>
                                <div id="myDropdown" class="chatimg-dropdown">
                                    <a href="#"><i class=" icon-mute  text-24 color-b-blue"></i> Mute Chat</a>
                                    <a href="#"><i class="icon-Delete  text-24 color-b-blue"></i>Delete</a>
                                    <a href="#"><i class="icon-block  text-24 color-b-blue"></i> Block</a>
                                </div>
                            </div>
                        </div>
                        <div class="chat_message_second-card p-30">
                            <div class="chat_msg-height">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="chat_m-box">
                                            <div class="d-flex gap-5 align-items-center">
                                                <div class="text-14 font-weight-400 lineheight-18 color-white">Mona Lott
                                                </div>
                                                <div class="text-14 font-weight-400 lineheight-18 color-white">10:00
                                                </div>
                                            </div>
                                            <div class="pt-2 text-14 font-weight-400 lineheight-18 color-white">Good
                                                Moring!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-30 text-end">
                                        <div class="chat_box-two">
                                            <div class="d-flex justify-content-end">
                                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue">10:00
                                                </div>
                                            </div>
                                            <div class="pt-2 text-14 font-weight-400 lineheight-18 color-b-blue">Good
                                                Moring!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-30">
                                        <div class="chat_m-box">
                                            <div class="d-flex gap-5 align-items-center">
                                                <div class="text-14 font-weight-400 lineheight-18 color-white">Mona Lott
                                                </div>
                                                <div class="text-14 font-weight-400 lineheight-18 color-white">10:00
                                                </div>
                                            </div>
                                            <div class="pt-2 text-14 font-weight-400 lineheight-18 color-white">Good
                                                Moring!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-30 text-end">
                                        <div class="chat_box-two">
                                            <div class="d-flex justify-content-end">
                                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue">10:00
                                                </div>
                                            </div>
                                            <div class="pt-2 text-14 font-weight-400 lineheight-18 color-b-blue">Good
                                                Moring!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-30">
                                        <div class="chat_m-box">
                                            <div class="d-flex gap-5 align-items-center">
                                                <div class="text-14 font-weight-400 lineheight-18 color-white">Mona Lott
                                                </div>
                                                <div class="text-14 font-weight-400 lineheight-18 color-white">10:00
                                                </div>
                                            </div>
                                            <div class="pt-2 text-14 font-weight-400 lineheight-18 color-white">Good
                                                Moring!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-30 text-end">
                                        <div class="chat_box-two">
                                            <div class="d-flex justify-content-end">
                                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue">10:00
                                                </div>
                                            </div>
                                            <div class="pt-2 text-14 font-weight-400 lineheight-18 color-b-blue">Good
                                                Moring!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat_bottom_text d-flex align-items-center mt-30">
                                <div class="chat_massage-input">
                                    <div class="chat_message_input-icon">
                                        <i class="icon-smiely icon-24   "></i>
                                        <input class="input-chat" type="text" placeholder="Type your message here">
                                    </div>
                                </div>
                                <button class="chat-meassage_document" data-toggle="modal" data-target="#exampleModal">
                                    <i class=" icon-send_document icon-24 "></i>
                                </button>
                                <button class="chat-message_delivery">
                                     <i class=" icon-send_msg icon-24 "></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- //////////////////////tab_2////////////// -->
                    <div id="tab-22" class="tab-content2">
                        <div class="chat_massage_card d-flex align-items-center justify-content-between">
                            <a href="#" target="_blank">
                                <div class="chat_message_p-left d-flex align-items-center">
                                    <div class="p_left-img">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                            class="border-r-8" height="50" width="50">
                                    </div>
                                    <div class="p_left-text ps-2">
                                        <div class="text-14 font-weight-700 lineheight-18 color-b-primary">UI/UX
                                            Designer Group</div>
                                        <!-- <div class="text-14 font-weight-400 lineheight-18 color-grey">Customer</div> -->
                                        <div class="text-14 font-weight-400 lineheight-16 color-green">2 member is
                                            online</div>
                                    </div>
                                </div>
                            </a>
                            <div class="chat_message_p-right">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex ">
                                        <div class="dashboard_img chat_d-img">
                                            <img src="/img/profile_1.png" alt="image" class="">
                                        </div>
                                        <div class="dashboard_img chat_d-img">
                                            <img src="/img/profile_1.png" alt="image" class="">
                                        </div>
                                        <div class="dashboard_img chat_d-img">
                                            <img src="/img/profile_1.png" alt="image" class="">
                                        </div>
                                        <div class="dashboard_img chat_d-img">
                                            <img src="/img/profile_1.png" alt="image" class="">
                                        </div>
                                        <div class="dashboard_img chat_d-img">
                                            <img src="/img/profile_1.png" alt="image" class="">
                                        </div>
                                    </div>
                                    <div class="chat_message_p-right">
                                        <!-- <button class="chat_img-dropdown" onclick="myFunction()" class="chat_img-dropdown"> -->
                                        <button class="chat_img-dropdown" onclick="myFunction()">
                                            <img src="/img/chat_dropdown.svg" alt="image">
                                        </button>
                                        <div id="myDropdown" class="chatimg-dropdown show">
                                            <a href="#"><i class=" icon-mute  text-24 color-b-blue"></i> Mute
                                                Chat</a>
                                            <a href="#">Link 2</a>
                                            <a href="#">Link 3</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat_message_second-card p-30">
                            <div class="chat_msg-height">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div
                                            class="color-light-grey-seven text-14 font-weight-400 lineheight-18 text-center pb-3">
                                            James Henry created group “Ui Ux Design Group”. </div>
                                        <div
                                            class="color-light-grey-seven text-14 font-weight-400 lineheight-18 text-center pb-3">
                                            James Henry added agent “Devon Lane”. </div>
                                        <div
                                            class="color-light-grey-seven text-14 font-weight-400 lineheight-18 text-center pb-3">
                                            James Henry added Customer “Mona Lott”.</div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="chat_m-box mt-3">
                                            <div class="d-flex gap-5 align-items-center">
                                                <div class="text-14 font-weight-400 lineheight-18 color-white">Mona Lott
                                                </div>
                                                <div class="text-14 font-weight-400 lineheight-18 color-white">10:00
                                                </div>
                                            </div>
                                            <div class="d-flex gap-5 align-items-center pt-2 justify-content-between">
                                                <div class=" text-14 font-weight-400 lineheight-18 color-white">Send
                                                    File.</div>
                                                  <i class=" icon-customer color-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-30">
                                        <div
                                            class="color-light-grey-seven text-14 font-weight-400 lineheight-18 text-center pb-3">
                                            James Henry updated group name “Ui/Ux design Group”. </div>
                                        <div
                                            class="color-light-grey-seven text-14 font-weight-400 lineheight-18 text-center pb-3">
                                            James Henry Removed Customer “Mona Lott”. </div>
                                        <div
                                            class="day_chat text-14 font-weight-400 color-b-blue lineheight-18 text-center">
                                            <span>Today</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-30 d-flex justify-content-end align-items-center gap-4">
                                        <button class="download-icon">
                                              <i class=" icon-Download"></i>
                                        </button>
                                        <div class="chat_box-two">
                                            <div class="d-flex justify-content-end">
                                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue">10:00
                                                </div>
                                            </div>
                                            <div class="chat_box-download mt-1 mb-1">
                                                <div
                                                    class="d-flex gap-2 align-items-baseline pt-2 justify-content-between p-2">
                                                    <i class=" icon-property-listing text-16 color-b-blue"></i>
                                                    <div class="chat_file-text text-start">
                                                        <div
                                                            class="text-14 font-weight-700 lineheight-18 color-primary">
                                                            File_12293_23486.600.File</div>
                                                        <div class="text-12 font-weight-400 lineheight-18 color-b-blue">
                                                            1.2 MB</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <i class=" icon-agent"></i>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-lg-12 pt-30 d-flex justify-content-end align-items-center gap-4">
                                        <button class="download-icon">
                                              <i class=" icon-Download"></i>
                                        </button>
                                        <div class="chat_box-two">
                                            <div class="d-flex justify-content-end">
                                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue">10:00
                                                </div>
                                            </div>
                                            <div class="chat_box-download mt-1 mb-1">
                                                <div
                                                    class="d-flex gap-2 align-items-baseline pt-2 justify-content-between p-2">
                                                    <i class=" icon-property-listing text-16 color-b-blue"></i>
                                                    <div class="chat_file-text text-start">
                                                        <div
                                                            class="text-14 font-weight-700 lineheight-18 color-primary">
                                                            File_12293_23486.600.File</div>
                                                        <div class="text-12 font-weight-400 lineheight-18 color-b-blue">
                                                            1.2 MB</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <i class=" icon-agent"></i>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-lg-12 pt-30 d-flex justify-content-end align-items-center gap-4">
                                        <button class="download-icon">
                                              <i class=" icon-Download"></i>
                                        </button>
                                        <div class="chat_box-two">
                                            <div class="d-flex justify-content-end">
                                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue">10:00
                                                </div>
                                            </div>
                                            <div class="chat_box-download mt-1 mb-1">
                                                <div
                                                    class="d-flex gap-2 align-items-baseline pt-2 justify-content-between p-2">
                                                    <i class=" icon-property-listing text-16 color-b-blue"></i>
                                                    <div class="chat_file-text text-start">
                                                        <div
                                                            class="text-14 font-weight-700 lineheight-18 color-primary">
                                                            File_12293_23486.600.File</div>
                                                        <div class="text-12 font-weight-400 lineheight-18 color-b-blue">
                                                            1.2 MB</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <i class=" icon-agent"></i>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-lg-12 pt-30">
                                        <div
                                            class="color-light-grey-seven text-14 font-weight-400 lineheight-18 text-center pb-3">
                                            James Henry Removed agent “Devon lane”.</div>
                                        <div
                                            class="color-light-grey-seven text-14 font-weight-400 lineheight-18 text-center pb-3">
                                            Brian Baker has left the group “Ui/Ux design Group”. </div>
                                        <div
                                            class="color-light-grey-seven text-14 font-weight-400 lineheight-18 text-center pb-3">
                                            James Henry has left the group “Ui/Ux design Group”.</div>
                                        <div
                                            class="color-light-grey-seven text-14 font-weight-400 lineheight-18 text-center">
                                            James Henry has delete the group “Ui/Ux design Group”.</div>
                                    </div>
                                </div>

                            </div>
                            <div class="chat_bottom_text d-flex align-items-center mt-30">
                                <div class="chat_massage-input">
                                    <div class="chat_message_input-icon">
                                        <i class="icon-smiely icon-24  "></i>
                                        <!-- <i class="icon-bell icon-24 color-b-blue"></i> -->
                                        <input class="input-chat" type="text" placeholder="Type your message here">
                                    </div>
                                </div>
                                <button class="chat-meassage_document" data-toggle="modal" data-target="#exampleModal">
                    <i class="  icon-send_document icon-24 "></i>
                                </button>
                                <button class="chat-message_delivery">
                                     <i class=" icon-send_msg icon-24 "></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- //////////////////////////tab_3////////////// -->
                    <div id="tab-33" class="tab-content3">
                        <div class="chat_massage_card d-flex align-items-center justify-content-between">
                            <div class="chat_message_p-left d-flex align-items-center">
                                <div class="p_left-img">
                                    <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                        class="border-r-8" height="50" width="50">
                                </div>
                                <div class="p_left-text ps-2">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Mona Lott</div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-grey">Customer</div>
                                    <div class="text-14 font-weight-400 lineheight-16 color-green">Typing...</div>
                                </div>
                            </div>
                            <div class="chat_message_p-right">
                                <button class="chat_img-dropdown" onclick="myFunction()">
                                    <img src="/img/chat_dropdown.svg" alt="image">
                                </button>
                                <div id="myDropdown" class="chatimg-dropdown">
                                    <a href="#"><i class="icon-Delete    text-24 color-b-blue"></i> Mute Chat</a>
                                    <a href="#"><i class="icon-Delete    text-24 color-b-blue"></i>Delete</a>
                                    <a href="#"><i class="icon-Delete    text-24 color-b-blue"></i> Block</a>
                                </div>
                            </div>
                        </div>
                        <div class="chat_message_second-card p-30">
                            <div class="chat_msg-height">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="chat_m-box">
                                            <div class="d-flex gap-5 align-items-center">
                                                <div class="text-14 font-weight-400 lineheight-18 color-white">Mona Lott
                                                </div>
                                                <div class="text-14 font-weight-400 lineheight-18 color-white">10:00
                                                </div>
                                            </div>
                                            <div class="pt-2 text-14 font-weight-400 lineheight-18 color-white">Good
                                                Moring!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-30">
                                        <div
                                            class="day_chat text-14 font-weight-400 color-b-blue lineheight-18 text-center">
                                            <span>Today</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-30 d-flex justify-content-end align-items-center gap-4">
                                        <button class="download-icon">
                                              <i class=" icon-Download"></i>
                                        </button>
                                        <div class="chat_box-two">
                                            <div class="d-flex justify-content-end">
                                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue">10:00
                                                </div>
                                            </div>
                                            <div class="chat_box-download mt-1">
                                                <div
                                                    class="d-flex gap-2 align-items-baseline pt-2 justify-content-between p-2">
                                                    <i class=" icon-property-listing text-16 color-b-blue"></i>
                                                    <div class="chat_file-text text-start">
                                                        <div
                                                            class="text-14 font-weight-700 lineheight-18 color-primary">
                                                            File_12293_23486.600.File</div>
                                                        <div class="text-12 font-weight-400 lineheight-18 color-b-blue">
                                                            1.2 MB</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-12 pt-30">
                                        <div class="chat_m-box">
                                            <div class="d-flex gap-5 align-items-center">
                                                <div class="text-14 font-weight-400 lineheight-18 color-white">Mona Lott
                                                </div>
                                                <div class="text-14 font-weight-400 lineheight-18 color-white">10:00
                                                </div>
                                            </div>
                                            <div class="pt-2 text-14 font-weight-400 lineheight-18 color-white">Good
                                                Moring!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-30 text-end">
                                        <div class="chat_box-two">
                                            <div class="d-flex justify-content-end">
                                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue">10:00
                                                </div>
                                            </div>
                                            <div class="pt-2 text-14 font-weight-400 lineheight-18 color-b-blue">Good
                                                Moring!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat_bottom_text d-flex align-items-center mt-30">
                                <div class="chat_massage-input">
                                    <div class="chat_message_input-icon">
                                        <i class="icon-smiely icon-24  "></i>
                                        <!-- <i class="icon-bell icon-24 color-b-blue"></i> -->
                                        <input class="input-chat" type="text" placeholder="Type your message here">
                                    </div>
                                </div>
                                <button class="chat-meassage_document" data-toggle="modal" data-target="#exampleModal">
                                    <i class=" icon-send_document icon-24 "></i>
                                </button>
                                <button class="chat-message_delivery">
                                     <i class=" icon-send_msg icon-24 "></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /////////////////////////////////////end-chat_message////////////////////////////////// -->

    </div>
</div>

<!-- //////////////////////////////////////////////////////////////////////////////////// -->
<div class="modal fade" id="todolist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-file">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="dataFilterModalLabel">Create New Group</h4>
                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>
            </div>
            <div class="modal-body modal-header_file">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <div class="form-group mt-3 position-relative">
                            <label for="reference"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Group
                                Name:*<span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="reference" id="reference" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <div class="form-group mt-3 position-relative">
                            <label for="reference"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Add
                                Customer:</label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="reference" id="reference" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <div class="form-group mt-3 position-relative">
                            <label for="reference"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Add
                                Agents:</label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="reference" id="reference" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <div class="form-group mt-3 position-relative">
                            <label for="reference"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Select Your
                                Group Admin:</label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="reference" id="reference" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <div
                        class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                        <div class="form-group position-relative">
                            <button type="button"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ///////////////////////////////////upload-document-modal///////////////////////////////////////////////////// -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_two" role="document">
        <div class="modal-content modal-content-file">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="dataFilterModalLabel">Send Document</h4>
                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>
            </div>
            <div class="modal-body modal-header_file">
                <div class="mb-15 modal-body-selectall d-flex justify-content-end">

                    <div class="text-14 font-weight-400 lineheight-18 color-light-grey-five">Maximum Number of Selected
                        Document: 02/<span class="color-b-blue font-weight-700">10</span></div>
                </div>
                <div class="modal_body_text">



                    <div class="modal-body_card">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <div class="modal-body_left">
                            <div class="modal_img">
                                <img src="/img/file_image.svg" alt="image" class="">
                            </div>
                            <div class="modal_body-left_text">
                                <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                    Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                <div
                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                    0.1 MB/1.28 MB</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body_card">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <div class="modal-body_left">
                            <div class="modal_img">
                                <img src="/img/file_image.svg" alt="image" class="">
                            </div>
                            <div class="modal_body-left_text">
                                <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                    Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                <div
                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                    0.1 MB/1.28 MB</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body_card">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <div class="modal-body_left">
                            <div class="modal_img">
                                <img src="/img/file_image.svg" alt="image" class="">
                            </div>
                            <div class="modal_body-left_text">
                                <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                    Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                <div
                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                    0.1 MB/1.28 MB</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body_card">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <div class="modal-body_left">
                            <div class="modal_img">
                                <img src="/img/file_image.svg" alt="image" class="">
                            </div>
                            <div class="modal_body-left_text">
                                <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                    Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                <div
                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                    0.1 MB/1.28 MB</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body_card">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <div class="modal-body_left">
                            <div class="modal_img">
                                <img src="/img/file_image.svg" alt="image" class="">
                            </div>
                            <div class="modal_body-left_text">
                                <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                    Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                <div
                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                    0.1 MB/1.28 MB</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body_card">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <div class="modal-body_left">
                            <div class="modal_img">
                                <img src="/img/file_image.svg" alt="image" class="">
                            </div>
                            <div class="modal_body-left_text">
                                <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                    Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                <div
                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                    0.1 MB/1.28 MB</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body_card">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <div class="modal-body_left">
                            <div class="modal_img">
                                <img src="/img/file_image.svg" alt="image" class="">
                            </div>
                            <div class="modal_body-left_text">
                                <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                    Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                <div
                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                    0.1 MB/1.28 MB</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body_card">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <div class="modal-body_left">
                            <div class="modal_img">
                                <img src="/img/file_image.svg" alt="image" class="">
                            </div>
                            <div class="modal_body-left_text">
                                <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                    Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                <div
                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                    0.1 MB/1.28 MB</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-30 modal-body_footer d-flex justify-content-between align-items-center">
                    <form method="post" enctype="multipart/form-data" class="form_file">
                        <label for="apply"><input type="file" name="" id="apply" accept="image/*,.pdf">Upload From
                            Browser</label>
                    </form>
                    <button type="button"
                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /////////////////////////////////////////end-upload-document/////////////////////////////////////////////////// -->

@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://unpkg.com/popper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {

        $('ul.tabs li').click(function () {
            var tab_id = $(this).attr('data-tab');


            $('ul.tabs li').removeClass('current');
            $('.tab-content').removeClass('current');


            $(this).addClass('current');
            $("#" + tab_id).addClass('current');

        })

    })
</script>
<script>
    $('.tab_link_one').click(function () {
        $('.tab-content_one').removeClass('active');
        $('.tab-content_one').addClass('active');
        $('.tab-content2').removeClass('active');
        $('.tab-content3').removeClass('active');
    });
    $('.tab_link-two').click(function () {
        $('.tab-content_one').removeClass('active');
        $('.tab-content2').addClass('active');
        $('.tab-content3').removeClass('active');
    });
    $('.tab_link_three').click(function () {
        $('.tab-content_one').removeClass('active');
        $('.tab-content2').removeClass('active');
        $('.tab-content3').addClass('active');
    });
</script>

<script>

    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    window.onclick = function (event) {
        if (!event.target.matches('.chat_img-dropdown')) {
            var dropdowns = document.getElementsByClassName("chatimg-dropdown");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
@endpush
@endsection