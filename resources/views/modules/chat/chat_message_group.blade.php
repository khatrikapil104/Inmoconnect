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
                    <h3 class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">
                        Massages
                    </h3>
                </div>
            </div>
        </div>
        <!-- ///////////////////////////end-breadcrum////////////////////////////////////// -->
        <!-- ////////////////////////////////chat_message///////////////////////////////////// -->
        <div class="flex">
            <div class="col-lg-3" style="width:300px">
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
                        <li class="tab-link  tab_link_one" data-tab="tab-1">Private</li>
                        <li class="tab-link current tab_link-two" data-tab="tab-2">Group</li>
                        <li class="tab-link tab_link_three" data-tab="tab-3">Contacts</li>
                    </ul>
                    <!-- /////////////////////tab_1///////////////// -->
                    <div id="tab-1" class="tab-content ">
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
                    <div id="tab-2" class="tab-content current">
                        <div class="chat_m-second-card mt-2">
                            <div class="chat-m-button">
                                <button
                                    class="w-100 h-42 b-color-transparent border-r-8 text-14 font-weight-400 lineheight-18 color-primary">Create
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
                    <div id="tab-11" class="tab-content_one ">
                        <div class="chat_massage_card">
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
                            <div class="chat_message_p-right"></div>
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
                                </div>
                            </div>
                            <div class="chat_bottom_text d-flex align-items-center mt-30">
                                <div class="chat_massage-input">
                                    <div class="chat_message_input-icon">
                                        <i class="icon-bell icon-24 color-b-blue"></i>
                                        <textarea class="input-chat" type="text" placeholder="Type your message here">
                                        </textarea>
                                    </div>
                                </div>
                                <button class="chat-meassage_document">
                                </button>
                                <button class="chat-message_delivery">
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- //////////////////////tab_2////////////// -->
                    <div id="tab-22" class="tab-content2 active ">
                        <div class="chat_second-card">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <!-- Your Image Upload Component -->
                                    <div class="form-group crm-profile-image-upload-container position-relative">
                                        <div class="image-container  common-label-css">
                                            <label for="image" class="position-relative image-labelimage cursor-pointer">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                    alt="Default Image" class=" border-r-20" id="image_image"
                                                    height="150" width="150">
                                                <div
                                                    class="badge-overlay position-absolute b-color-blue opacity-5 w-100 edit-profile-img color-white">
                                                    <span
                                                        class="badge badge-pill badge-add d-block color-white text-16 lineheight-20 font-weight-700">Edit</span>
                                                </div>
                                            </label>
                                            <input type="file" id="image_file" name="image" class="d-none mt-3"
                                                accept="image/*" onchange="updateImage(this,'image')">
                                            <div class="invalid-feedback fw-bold"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 pt-2">
                                        <div class="text-14 font-weight-700 text-capitalize lineheight-18 color-b-blue">
                                            UI/UX Designer Group</div>
                                        <div class="color-light-grey-eight lineheight-18 text-14 font-weight-400 ">
                                            Number of group members : 8</div>
                                        <div class="lineheight-18 text-14 font-weight-400 color-primary">Group ID:
                                            H20BF4</div>
                                    </div>
                                </div>
                            </div>
                            <!-- ///////////////////////////////////////grop_tabs//////////////////////////// -->
                            <ul class="Group_chat">
                                <li class="tab-link1 current" data-tab="Group_c-1">About</li>
                                <li class="tab-link1" data-tab="Group_c-2">Members</li>
                                <li class="tab-link1 " data-tab="Group_c-3">Files</li>
                            </ul>
                            <!-- //////////////inner-tab-1/////////////////////// -->
                            <div id="Group_c-1" class="tab-content_group current">
                                <div class="row">
                                    <div class="col-lg-7 pt-2 pb-3">
                                        <div class="tab_group-content">
                                            <div class="d-flex align-items-center gap-1 mt-3">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                    Group Name:</div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                    UI/UX Designer Group </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-1 mt-3">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                    Group ID:</div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 color-b-blue text-uppercase">
                                                    H20BF4 </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-1 mt-3">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                    Number of group members:</div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                    8</div>
                                            </div>
                                            <div class="d-flex align-items-center gap-1 mt-3">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                    Admin of Group:</div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                    James Henry, Henry Jamee </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-1 mt-3">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                    Group Created By:</div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                    James Henry</div>
                                            </div>
                                            <div class="d-flex align-items-center gap-3 mt-3">
                                                <i class=" icon-Logout text-20 color-red-two "></i>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 color-red-two text-capitalize">
                                                    Leave Group</div>
                                            </div>
                                            <div class="d-flex align-items-center gap-3 mt-3">
                                                <i class="icon-Delete   text-20 color-red-two "></i>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 color-red-two text-capitalize">
                                                    Delete Group</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-m-button col-lg-5 d-flex justify-content-end pt-20 mt-1">
                                        <button
                                            class=" w-150 h-42 text-14 lineheight-18 font-weight-700 color-primary d-flex align-items-center justify-content-center gap-2 b-color-transparent border-primary border-r-8"
                                            data-toggle="modal" data-target="#todolist"><i
                                                class=" icon-edit   text-20 color-red-two "></i>Edit Group</button>
                                    </div>
                                </div>
                            </div>
                            <!-- ///////////////inner-tab-2//////////////////////// -->
                            <div id="Group_c-2" class="tab-content_group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- ////////searc-button -->
                                        <div class="pt-4 pb-2 search-dashboard d-flex justify-content-between flex-wrap gap-2">
                                            <div class="search_button w-100">
                                                <div class="form-group position-relative">
                                                    <div
                                                        class="input-group input-group-sm dashboard_input-search w-100">
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
                                        <div class="member-height-group">
                                            <div
                                                class="chat_msg-first d-flex justify-content-between ps-2 align-items-center">
                                                <div
                                                    class="chat_message_p-left d-flex align-items-center position-relative">
                                                    <div class="p_left-img image_chat_before">
                                                        <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                            alt="Default Image" class="border-r-8" height="40"
                                                            width="40">
                                                    </div>
                                                    <div class="p_left-text ps-2">
                                                        <div class="text-14 font-weight-700 lineheight-18 color-black">
                                                            James Henry
                                                        </div>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-light-grey-nine pt-1">
                                                            Agent</div>
                                                    </div>
                                                </div>
                                                <div class="chat-msg_f-right">
                                                    <div
                                                        class="text-14 font-weight-400 lineheight-18 color-light-grey-nine">
                                                        Admin</div>
                                                </div>
                                            </div>
                                            <div
                                                class="chat_msg-first d-flex justify-content-between ps-2 align-items-center">
                                                <div
                                                    class="chat_message_p-left d-flex align-items-center position-relative">
                                                    <div class="p_left-img image_chat_before">
                                                        <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                            alt="Default Image" class="border-r-8" height="40"
                                                            width="40">
                                                    </div>
                                                    <div class="p_left-text ps-2">
                                                        <div class="text-14 font-weight-700 lineheight-18 color-black">
                                                            James Henry
                                                        </div>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-light-grey-nine pt-1">
                                                            Agent</div>
                                                    </div>
                                                </div>
                                                <div class="chat-msg_f-right">
                                                    <div
                                                        class="text-14 font-weight-400 lineheight-18 color-light-grey-nine">
                                                        Admin</div>
                                                </div>
                                            </div>
                                            <div
                                                class="chat_msg-first d-flex justify-content-between ps-2 align-items-center">
                                                <div
                                                    class="chat_message_p-left d-flex align-items-center position-relative">
                                                    <div class="p_left-img image_chat_before">
                                                        <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                            alt="Default Image" class="border-r-8" height="40"
                                                            width="40">
                                                    </div>
                                                    <div class="p_left-text ps-2">
                                                        <div class="text-14 font-weight-700 lineheight-18 color-black">
                                                            James Henry
                                                        </div>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-light-grey-nine pt-1">
                                                            Agent</div>
                                                    </div>
                                                </div>
                                                <div class="chat-msg_f-right">
                                                    <div
                                                        class="text-14 font-weight-400 lineheight-18 color-light-grey-nine">
                                                        Admin</div>
                                                </div>
                                            </div>
                                            <div
                                                class="chat_msg-first d-flex justify-content-between ps-2 align-items-center">
                                                <div
                                                    class="chat_message_p-left d-flex align-items-center position-relative">
                                                    <div class="p_left-img image_chat_before">
                                                        <img src="http://127.0.0.1:8000/img/default-user.jpg"
                                                            alt="Default Image" class="border-r-8" height="40"
                                                            width="40">
                                                    </div>
                                                    <div class="p_left-text ps-2">
                                                        <div class="text-14 font-weight-700 lineheight-18 color-black">
                                                            James Henry
                                                        </div>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-light-grey-nine pt-1">
                                                            Agent</div>
                                                    </div>
                                                </div>
                                                <div class="chat-msg_f-right">
                                                    <div
                                                        class="text-14 font-weight-400 lineheight-18 color-light-grey-nine">
                                                        Admin</div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-- /////////////////inner-tab-3//////////////////// -->
                            <div id="Group_c-3" class="tab-content_group ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- ////////searc-button -->
                                        <div class="pt-4 pb-2 search-dashboard d-flex justify-content-between flex-wrap gap-2">
                                            <div class="search_button w-100">
                                                <div class="form-group position-relative">
                                                    <div
                                                        class="input-group input-group-sm dashboard_input-search w-100">
                                                        <span
                                                            class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                                        <input type="text" name="userListingFilterData[search]"
                                                            class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                                            placeholder="Search Member here..." value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="search-select"></div>
                                        </div>
                                        <div class="member-height-group">
                                            <div
                                                class="chat_msg-first d-flex justify-content-between ps-2 align-items-center">
                                                <div class="modal-body_left">
                                                    <div class="modal_img">
                                                        <img src="/img/file_image.svg" alt="image" class="">
                                                    </div>
                                                    <div class="modal_body-left_text">
                                                        <div
                                                            class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                            Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                                            0.1 MB/1.28 MB</div>
                                                    </div>
                                                </div>
                                                <div class="chat-msg_f-right">
                                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue">Sent
                                                        by: <span class="color-light-grey-nine font-weight-400"> Danial
                                                            Mark</span></div>
                                                </div>
                                            </div>
                                            <div
                                                class="chat_msg-first d-flex justify-content-between ps-2 align-items-center">
                                                <div class="modal-body_left">
                                                    <div class="modal_img">
                                                        <img src="/img/file_image.svg" alt="image" class="">
                                                    </div>
                                                    <div class="modal_body-left_text">
                                                        <div
                                                            class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                            Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                                            0.1 MB/1.28 MB</div>
                                                    </div>
                                                </div>
                                                <div class="chat-msg_f-right">
                                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue">Sent
                                                        by: <span class="color-light-grey-nine font-weight-400"> Danial
                                                            Mark</span></div>
                                                </div>
                                            </div>
                                            <div
                                                class="chat_msg-first d-flex justify-content-between ps-2 align-items-center">
                                                <div class="modal-body_left">
                                                    <div class="modal_img">
                                                        <img src="/img/file_image.svg" alt="image" class="">
                                                    </div>
                                                    <div class="modal_body-left_text">
                                                        <div
                                                            class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                            Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                                            0.1 MB/1.28 MB</div>
                                                    </div>
                                                </div>
                                                <div class="chat-msg_f-right">
                                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue">Sent
                                                        by: <span class="color-light-grey-nine font-weight-400"> Danial
                                                            Mark</span></div>
                                                </div>
                                            </div>
                                            <div
                                                class="chat_msg-first d-flex justify-content-between ps-2 align-items-center">
                                                <div class="modal-body_left">
                                                    <div class="modal_img">
                                                        <img src="/img/file_image.svg" alt="image" class="">
                                                    </div>
                                                    <div class="modal_body-left_text">
                                                        <div
                                                            class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                            Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                                            0.1 MB/1.28 MB</div>
                                                    </div>
                                                </div>
                                                <div class="chat-msg_f-right">
                                                    <div class="text-14 font-weight-700 lineheight-18 color-b-blue">Sent
                                                        by: <span class="color-light-grey-nine font-weight-400"> Danial
                                                            Mark</span></div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //////////////////////////tab_3////////////// -->
                    <div id="tab-33" class="tab-content3">
                        <div class="chat_massage_card">
                            <div class="chat_message_p-left d-flex align-items-center">
                                <div class="p_left-img">
                                    <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                        class="border-r-8" height="50" width="50">
                                </div>
                                <div class="p_left-text ps-2">
                                    <div class="text-14 font-weight-700 lineheight-18 color-b-primary">Mona Lott</div>
                                    <div class="text-14 font-weight-400 lineheight-18 color-grey">Customer</div>
                                    <div class="text-14 font-weight-400 lineheight-16 color-green">edfk</div>
                                </div>
                            </div>
                            <div class="chat_message_p-right"></div>
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
                                </div>
                            </div>
                            <div class="chat_bottom_text d-flex align-items-center mt-30">
                                <div class="chat_massage-input">
                                    <div class="chat_message_input-icon">
                                        <i class="icon-bell icon-24 color-b-blue"></i>
                                        <textarea class="input-chat" type="text" placeholder="Type your message here">
                                        </textarea>
                                    </div>
                                </div>
                                <button class="chat-meassage_document">
                                </button>
                                <button class="chat-message_delivery">
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
                    id="dataFilterModalLabel">Edit Group</h4>
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
    $(document).ready(function () {

        $('ul.Group_chat li').click(function () {
            var tab_id = $(this).attr('data-tab');


            $('ul.Group_chat li').removeClass('current');
            $('.tab-content_group').removeClass('current');


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
        $('.tab-content2').removeClass('active');
        $('.tab-content3').addClass('active');
    });
</script>

@endpush
@endsection