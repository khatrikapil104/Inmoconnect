@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.sidebar.Property_Search') }} Inmoconnect
        @endsection

        <!-- slider -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

        <style>
            .slick-next:before {
                content: "";
                background-image: url("../../img/property-slider-right.svg");
                background-repeat: no-repeat;
                width: 30px;
                height: 30px;
                display: block;
                background-position: center center;
            }

            .slick-prev:before {
                content: "";
                background-image: url("../../img/property-slider-left.svg");
                background-repeat: no-repeat;
                width: 30px;
                height: 30px;
                display: block;
                background-position: center center;
            }

            .slick-next:before,
            .slick-prev:before {
                border-radius: 4px;
                line-height: 1;
                opacity: 1;
                color: #383192;
            }

            .slick-next {
                right: 0;
                top: 28px;
            }

            .slick-arrow {
                z-index: 1;
            }

            .slick-prev {
                left: 0;
                top: 28px;
            }

            .slick-initialized .slick-slide {
                text-align: center;
            }

            .slick-track {
                display: flex;
                align-items: center;
            }

            .calender_date.tody_appointment_date {
                border-radius: 8px;
                background: var(--Main-Colour, #383192);
                width: 60px;
                display: flex;
                align-items: center;
                flex-direction: column;
                justify-content: center;
                height: 60px;
            }

            .calender_date.tody_appointment_date div {
                color: #fff;
            }

            .slick-initialized .slick-slide {
                display: flex;
                justify-content: center;
            }
        </style>

        <div class="overlay" id="overlay"></div>
        <div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                <!-- ////////////////////////////breadcrum///////////////////////////////////// -->
                <div class="empty-search-header">
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div
                                class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">
                                My Projects
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ////////////////////////////////end-breadcream////////////////////////////////////// -->
                <div class="main_property">
                    <!-- //////////////////////////////////location/////////////////////////////////// -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 ">
                                <div
                                    class="edit_price_empty d-flex justify-content-between align-items-baseline mb-3 flex-wrap">
                                    <div
                                        class="edit-price_left d-flex justify-content-between gap-2 gap-sm-3 align-items-center flex-wrap ">
                                        <div
                                            class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                            Ratnadeep Complex
                                        </div>
                                        <div
                                            class="text-14 font-weight-400 lineheight-18 text-capitalize in_progress border-r-5">
                                            <div class="edit_progress-button">In-Progress</div>
                                        </div>
                                        <img src="{{ asset('img/edit_icon.svg') }}" alt="image" class="#">
                                    </div>
                                    <div class="edit-price-right">
                                        <div
                                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                            Є800,000</div>
                                    </div>
                                </div>
                                <div class="property_type-empty-card mb-10">
                                    <div class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">Project
                                        Type:</div>
                                    <div
                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1">
                                        For Sale</div>
                                </div>
                                <div class="property_type-empty-card mb-10">
                                    <div class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">Project
                                        Description:</div>
                                    <div
                                        class="text-12 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1">
                                        Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu
                                        euismod ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus
                                        dui fames pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar. Lorem ipsum
                                        dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod ipsum
                                        vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                                        pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar. Lorem ipsum dolor sit
                                        amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod ipsum vitae. Arcu
                                        enim libero est sagittis faucibus sed viverra viverra. Risus dui fames pulvinar ut est.
                                        Viverra mollis habitasse mi ultricies pulvinar.</div>
                                </div>
                                <div class="property_type-empty-card mb-10">
                                    <div class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">Project
                                        Start Date:</div>
                                    <div
                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1 d-flex align-items-center">
                                        <span> <img src="{{ asset('img/my_p-card_2.svg') }}" alt="image"
                                                class="me-2">22/12/2023</span>
                                    </div>
                                </div>
                                <div class="property_type-empty-card mb-10">
                                    <div class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">Project End
                                        date:</div>
                                    <div
                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1 d-flex align-items-center">
                                        <span> <img src="{{ asset('img/my_p-card_2.svg') }}" alt="image"
                                                class="me-2">22/12/2023</span>
                                    </div>
                                </div>
                                <div class="property_type-empty-card">
                                    <div class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">Location:
                                    </div>
                                    <div
                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1 d-flex align-items-center">
                                        <span> <i class=" icon-locationtext-16  color-b-blue me-2"></i>Bellavista 79, Santibáñez
                                            De Vidriales, Zamora, 49610</span>
                                    </div>
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus"
                                        width="100%" height="330" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade" class="mt-10"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //////////////////////////////////end-location///////////////////////////////////// -->
                    <!-- //////////////////////////////////////add_property/////////////////////////////////// -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                                <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                                    Property Management:
                                </h4>
                            <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
                                <div class="empty-table">
                                    <div class="empty-image">
                                        <img src="/img/empty-property.svg" alt="image" class="">
                                    </div>
                                    <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                        Start importing properties who are part of<br>this project from your general
                                        listings
                                    </h4>
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                                        data-toggle="modal" data-target="#addproperty">Add New Property</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //////////////////////////////////////////end-add_property///////////////////////////////// -->

                <!-- /////////////////////////////////////agent-management////////////////////////////// -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                            <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                                Agent Management:
                            </h4>
                        <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
                            <div class="empty-table">
                                <div class="empty-image">
                                    <img src="/img/attachment.svg" alt="image" class="">
                                </div>
                                <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                    Start importing agents who will be part of<br>this project from your general agents
                                    network
                                </h4>
                                <button type="button"
                                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                                    data-toggle="modal" data-target="#agentlist">Add New Agent</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                        <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                            Customer Management:
                        </h4>
                    <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
                        <div class="empty-table">
                            <div class="empty-image">
                                <img src="/img/user.svg" alt="image" class="">
                            </div>
                            <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                Start importing customer who will be part of this<br>project from your general
                                customers network
                            </h4>
                            <button type="button"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                                data-toggle="modal" data-target="#customerlist">Add New Customer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /////////////////////////////////////////////end-agent-managment////////////////////////////////// -->

        <!-- //////////////////////////////////////add_property/////////////////////////////////// -->
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                    <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                        To-do List:
                    </h4>
                <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
                    <div class="empty-table">
                        <div class="empty-image">
                            <img src="/img/do_list.svg" alt="image" class="">
                        </div>
                        <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                            Add your tasks checklist and manage<br>them with timely manner
                        </h4>
                        <button type="button"
                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                            data-toggle="modal" data-target="#todolist">Add New To-Do List</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- //////////////////////////////////////////end-add_property///////////////////////////////// -->

        <!-- ////////////////////////////////////////project-event-sehdule /////////////////////////////////  -->
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                    <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                        Project’s Events Schedule:
                    </h4>
                <div class="slick-slider_main">
                    <div class="slick-list">
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    Sat</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">16</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    Sun</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">17</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    mon</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">18</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    tue</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">19</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    wed</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">20</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    thu</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">21</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date tody_appointment_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    fri</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">22</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    Sat</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">23</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    Sun</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">24</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    mon</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">25</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    tue</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">26</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    wed</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">27</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    thu</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">28</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    fri</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">29</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    Sat</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">30</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    Sun</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">1</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    mon</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">2</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    tue</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">3</div>
                            </div>
                        </div>
                        <div>
                            <div class="calender_date">
                                <div class="color-light-grey-two text-14 font-weight-700 lineheight-18 text-capitalize">
                                    wed</div>
                                <div class="color-b-blue text-14 font-weight-700 lineheight-18">4</div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="table_dashboard empty-dashboard table-empty-dashboard_property Schedule_call_height">
                    <div class="today_schdule pt-3">
                        <div class="text-14 font-weight-700 color-primary lineheight-18 text-capitalize text-start">
                            Today’s Events</div>
                        <div class="today_schdule-call d-flex align-items-center pt-10 gap-3">
                            <div class="today_call d-flex align-items-center gap-2">
                                <div class="call_round green "></div>
                                <div class="toda_call_text green_text">0 call</div>
                            </div>
                            <div class="today_call d-flex align-items-center gap-2">
                                <div class="call_round sky "></div>
                                <div class="toda_call_text sky_text">0 View Meeting</div>
                            </div>
                            <div class="today_call d-flex align-items-center gap-2">
                                <div class="call_round red"></div>
                                <div class="toda_call_text red_text">0 Meeting</div>
                            </div>
                        </div>
                    </div>


                    <div class="empty-table">
                        <div class="empty-image">
                            <img src="/img/sehdule.svg" alt="image" class="">
                        </div>
                        <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                            No upcoming event today!
                        </h4>
                        <button type="button"
                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                            data-toggle="modal" data-target="#todolist">Add Event</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- ////////////////////////////////////////end-projrct-event-sehdule///////////////////////////////////// -->

        <!-- /////////////////////////////////////agent-management////////////////////////////// -->
        <div class="row">
            <div class="col-lg-6">
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                    <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                        Attachments:
                    </h4>
                <div class="table_dashboard empty-dashboard table-empty-dashboard_property">
                    <div class="empty-table">
                        <div class="empty-image">
                            <img src="/img/resent_activity.svg" alt="image" class="">
                        </div>
                        <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                            Add all the project's related files<br>and attachments over here.
                        </h4>
                        <button type="button"
                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                            data-toggle="modal" data-target="#exampleModal">Add Document</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                    Recent Activity:
                </h4>
            <div class="table_dashboard empty-dashboard table-empty-dashboard_property recent-activity_height">
                <div class="d-flex align-items-center">
                    <div class="activity_img empty-image">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="27" viewBox="0 0 26 27"
                            fill="none">
                            <rect y="0.5" width="26" height="26" rx="13" fill="#F3F4F6" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M19.2844 8.4264L19.3023 8.43537L20.5485 9.05631C20.7299 9.14676 20.8387 9.21221 20.8749 9.25266C21.0406 9.43737 21.0483 9.73508 20.8592 9.90677C20.8134 9.94834 20.7484 9.99013 20.6642 10.0321L13.9216 13.3897C13.7396 13.4804 13.5935 13.5422 13.4835 13.5751C13.0251 13.7121 12.5861 13.6417 12.1583 13.4284C9.91133 12.3077 7.61526 11.1641 5.27003 9.99745C4.90463 9.81542 4.91497 9.32468 5.27137 9.14731C7.5508 8.01378 9.83133 6.87793 12.113 5.73974C12.2946 5.64906 12.4518 5.58693 12.5847 5.55338C12.9948 5.44936 13.401 5.49737 13.8036 5.6974C15.6314 6.60622 17.4598 7.51728 19.2844 8.4264ZM11.7932 17.1576C10.816 16.6741 9.84138 16.1897 8.86481 15.7044C7.71055 15.1308 6.55365 14.5558 5.38698 13.9795C5.23894 13.9061 5.1454 13.8437 5.10629 13.7923C4.90459 13.5283 5.00327 13.2031 5.28997 13.0617C5.67815 12.8703 6.05544 12.6835 6.42189 12.5015C6.71942 12.3537 7.00983 12.2091 7.29303 12.0675C7.29612 12.066 7.29942 12.0649 7.30276 12.0642C7.3043 12.0639 7.30589 12.0637 7.30748 12.0636L7.31069 12.0634C7.31683 12.0634 7.32286 12.0648 7.32835 12.0675L8.97903 12.8876C9.84712 13.3189 10.7077 13.7466 11.5608 14.1706C11.8313 14.3052 12.0343 14.3944 12.1698 14.4383C12.8694 14.666 13.5633 14.6086 14.2516 14.2661C15.7503 13.5204 17.2278 12.7865 18.6841 12.0645C18.6918 12.0606 18.6996 12.0606 18.7074 12.0645C19.3361 12.3795 19.9951 12.707 20.6844 13.0468C20.9128 13.1592 21.0431 13.3444 20.9871 13.6017C20.9569 13.7403 20.8731 13.8438 20.7358 13.9123C18.6704 14.9422 16.4072 16.0682 13.9463 17.2903C13.7162 17.4044 13.5352 17.477 13.4032 17.5081C13.0581 17.589 12.7214 17.5686 12.3932 17.4469C12.3523 17.4318 12.1523 17.3354 11.7932 17.1576ZM14.1932 18.217C13.5889 18.5195 12.9499 18.5785 12.2762 18.3939C12.1056 18.3471 11.9107 18.2688 11.6918 18.1591C10.229 17.4267 8.77351 16.6994 7.32554 15.9772C7.31508 15.9721 7.30475 15.9721 7.29454 15.9772L6.09804 16.5752L5.2706 16.9886C4.91155 17.1682 4.90886 17.6621 5.26824 17.8407C7.48078 18.9422 9.7071 20.0547 11.9472 21.1785C12.1792 21.2949 12.3527 21.3727 12.4676 21.4119C12.7881 21.5219 13.1219 21.5289 13.469 21.433C13.5868 21.4004 13.757 21.3284 13.9795 21.2169C16.2127 20.097 18.4458 18.9812 20.6787 17.8695C20.8941 17.7625 21.0281 17.5976 20.9951 17.3451C20.9734 17.1782 20.8631 17.0521 20.7121 16.9769C20.0658 16.6554 19.3975 16.3217 18.7071 15.9759C18.7027 15.9737 18.6983 15.9727 18.6939 15.9727C18.6896 15.9727 18.6854 15.9738 18.6811 15.9759C16.7631 16.9326 15.2671 17.6796 14.1932 18.217Z"
                                fill="#383192" />
                        </svg>

                    </div>
                    <div class="activity_text ms-2">
                        <div class="color-b-blue text-14 font-weight-400 lineheight-18 text-capitalize">
                            <span class="font-weight-700">James Henry</span> Initiated project <span
                                class="font-weight-700">Ratnadeep Complex.</span>
                        </div>
                        <div class="color-light-grey-six text-14 font-weight-400 lineheight-18 text-capitalize">
                            5 Mins ago</div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <!-- /////////////////////////////////////////////end-agent-managment////////////////////////////////// -->

        <!-- ///////////////////////////////////////////////button////////////////////////////////////////// -->
        <div class="row mt-30 mb-10">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between">
                    <button type="button"
                        class="complete_project w-150 h-42 border-r-8 w-150 h-42 border-r-8  text-14 font-weight-400 lineheight-18 color-white text-14 font-weight-400 lineheight-18 color-white">Complete
                        Project </button>
                    <button type="button"
                        class="delete_project small-button border-r-8 text-14 font-weight-700 lineheight-18 d-flex align-items-center justify-content-center">Delete
                        Project</button>
                </div>
            </div>
        </div>
        <!-- ///////////////////////////////////////////end-button/////////////////////////////////////////// -->


        <!-- ///////////////////////////////////upload-document-modal///////////////////////////////////////////////////// -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_two" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Upload Document</h4>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file">
                        <div class="modal_body_text">
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body-card-left-progress d-flex align-items-center gap-4">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"
                                        disabled="disabled">
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
                                <div class="task-progress d-flex align-items-center">
                                    <span class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">10%</span>
                                    <progress class="progress progress2 mx-2" max="100" value="10"></progress>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                        viewBox="0 0 10 10" fill="none">
                                        <path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5 6.28399L1.28399 10L0 8.71601L3.71601 5L4.15612e-06 1.28399L1.28399 0L5 3.71601L8.71601 0L10 1.28399L6.28399 5L10 8.71601L8.71601 10L5 6.28399Z"
                                            fill="#17213A" />
                                    </svg>
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body-card-left-progress d-flex align-items-center gap-4">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"
                                        disabled="disabled">
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
                                <div class="task-progress d-flex align-items-center">
                                    <span class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">10%</span>
                                    <progress class="progress progress2 mx-2" max="100" value="10"></progress>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                        viewBox="0 0 10 10" fill="none">
                                        <path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5 6.28399L1.28399 10L0 8.71601L3.71601 5L4.15612e-06 1.28399L1.28399 0L5 3.71601L8.71601 0L10 1.28399L6.28399 5L10 8.71601L8.71601 10L5 6.28399Z"
                                            fill="#17213A" />
                                    </svg>
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body-card-left-progress d-flex align-items-center gap-4">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"
                                        disabled="disabled">
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
                                <div class="task-progress d-flex align-items-center">
                                    <span class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">90%</span>
                                    <progress class="progress progress2 mx-2" max="100" value="90"></progress>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                        viewBox="0 0 10 10" fill="none">
                                        <path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5 6.28399L1.28399 10L0 8.71601L3.71601 5L4.15612e-06 1.28399L1.28399 0L5 3.71601L8.71601 0L10 1.28399L6.28399 5L10 8.71601L8.71601 10L5 6.28399Z"
                                            fill="#17213A" />
                                    </svg>
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
                                <label for="apply"><input type="file" name="" id="apply"
                                        accept="image/*,.pdf">Upload From
                                    Browser</label>
                            </form>
                            <button type="button"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Import</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /////////////////////////////////////////end-upload-document/////////////////////////////////////////////////// -->

        <!-- //////////////////////////////////////////////////Add-to do list modal////////////////////////////////////// -->
        <div class="modal fade" id="todolist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Add To-Do List </h4>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                <div class="form-group mt-3 position-relative">
                                    <label for="reference"
                                        class="text-14 font-weight-400 lineheight-18 color-b-blue">Reference <span
                                            class="required">*</span></label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="reference" id="reference" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                <div class="form-group mt-3 position-relative">
                                    <label for="reference"
                                        class="text-14 font-weight-400 lineheight-18 color-b-blue">Reference <span
                                            class="required">*</span></label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="reference" id="reference" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                <div class="form-group mt-3 position-relative">
                                    <label for="reference"
                                        class="text-14 font-weight-400 lineheight-18 color-b-blue">Reference <span
                                            class="required">*</span></label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="reference" id="reference" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                            <div
                                class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css d-flex justify-content-end align-items-end">
                                <div class="form-group position-relative">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////end- add to do list modal ////////////////////////////////// -->

        <!-- //////////////////////////////////////////////////customer-modal////////////////////////////////////////////// -->
        <div class="modal fade" id="customerlist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_one" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Customers</h4>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <p class="pt-10 text-center text-14 color-black font-weight-400 text-capitalize lineheight-18">
                        Import your customers in this project from your customers list.</p>
                    <div class="modal-body modal-header_file">
                        <div class="mb-15 modal-body-selectall d-flex justify-content-between">
                            <span
                                class="d-flex align-items-center text-14 font-weight-700 lineheight-18 text-capitalize color-black"><input
                                    type="checkbox" id="vehicle1" name="vehicle1" value="Bike" class="me-3">Select All
                                Customers</span>
                            <div class="text-14 font-weight-400 lineheight-18 color-light-grey-five">Number of
                                Selected Coustomers: 04/<span class="color-b-blue font-weight-700">120</span></div>
                        </div>
                        <div class="modal-body_select-agent">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                            <button type="button"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Import</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //////////////////////////////////////////////end-customer-modal////////////////////////////////////// -->

        <!-- //////////////////////////////////////////////agent modal /////////////////////////////////////// -->
        <div class="modal fade" id="agentlist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_one" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Agents</h4>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <p class="pt-10 text-center text-14 color-black font-weight-400 text-capitalize lineheight-18">
                        Import agents whom you want to collaborate in this project from your network.</p>
                    <div class="modal-body modal-header_file">
                        <div class="mb-15 modal-body-selectall d-flex justify-content-between">
                            <span
                                class="d-flex align-items-center text-14 font-weight-700 lineheight-18 text-capitalize color-black"><input
                                    type="checkbox" id="vehicle1" name="vehicle1" value="Bike" class="me-3">Select All
                                Agents</span>
                            <div class="text-14 font-weight-400 lineheight-18 color-light-grey-five">Number of
                                Selected Agents: 04/<span class="color-b-blue font-weight-700">120</span></div>
                        </div>
                        <div class="modal-body_select-agent">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class="icon-home_protection text-18 color-b-blue"></i>
                                                    <div
                                                        class="text-12 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        290</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class="icon-home_protection text-18 color-b-blue"></i>
                                                    <div
                                                        class="text-12 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        290</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class="icon-home_protection text-18 color-b-blue"></i>
                                                    <div
                                                        class="text-12 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        290</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class="icon-home_protection text-18 color-b-blue"></i>
                                                    <div
                                                        class="text-12 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        290</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class="icon-home_protection text-18 color-b-blue"></i>
                                                    <div
                                                        class="text-12 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        290</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class="icon-home_protection text-18 color-b-blue"></i>
                                                    <div
                                                        class="text-12 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        290</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class="icon-home_protection text-18 color-b-blue"></i>
                                                    <div
                                                        class="text-12 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        290</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class="icon-home_protection text-18 color-b-blue"></i>
                                                    <div
                                                        class="text-12 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        290</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class="icon-home_protection text-18 color-b-blue"></i>
                                                    <div
                                                        class="text-12 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        290</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                            <button type="button"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Import</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ///////////////////////////////////////////////end-agent-modal ///////////////////////////////////// -->

        <!-- //////////////////////////////Add-property modal /////////////////////////////////////////////////// -->
        <div class="modal fade" id="addproperty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_one" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Properties</h4>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <p class="pt-10 text-center text-14 color-black font-weight-400 text-capitalize lineheight-18">
                        Import your
                        existing listed properties to your project.</p>
                    <div class="modal-body modal-header_file">
                        <div class="mb-15 modal-body-selectall d-flex justify-content-between">
                            <span
                                class="d-flex align-items-center text-14 font-weight-700 lineheight-18 text-capitalize color-black"><input
                                    type="checkbox" id="vehicle1" name="vehicle1" value="Bike"
                                    class="me-3">Select All
                                Properties</span>
                            <div class="text-14 font-weight-400 lineheight-18 color-light-grey-five">Number of
                                Selected
                                Properties: 02/<span class="color-b-blue font-weight-700">120</span></div>
                        </div>
                        <div class="modal-body_select-agent">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-property.jpg" alt="image"
                                                    class="border-r-8" height="142" width="250">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue letter-s-36">
                                                    Awesome Interior Apartment</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>
                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <img src="{{ asset('img/my_p-card_3.svg') }}" alt="image"
                                                            class="#">
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            James Henry</div>
                                                    </div>

                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-bed text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-bathroom text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-floor text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>

                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_scale text-20  color-b-blue"></span>
                                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            1240 m<sup>2</sup></div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            RT48</div>
                                                    </div>
                                                </div>
                                                <div class="prize-title ">
                                                    <div class=" text-14 font-weight-700 lineheight-18 color-primary">
                                                        € 698,000.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-property.jpg" alt="image"
                                                    class="border-r-8" height="142" width="250">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue letter-s-36">
                                                    Awesome Interior Apartment</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>
                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <img src="{{ asset('img/my_p-card_3.svg') }}" alt="image"
                                                            class="#">
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            James Henry</div>
                                                    </div>

                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-bed text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-bathroom text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-floor text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>

                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_scale text-20  color-b-blue"></span>
                                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            1240 m<sup>2</sup></div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            RT48</div>
                                                    </div>
                                                </div>
                                                <div class="prize-title ">
                                                    <div class=" text-14 font-weight-700 lineheight-18 color-primary">
                                                        € 698,000.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-property.jpg" alt="image"
                                                    class="border-r-8" height="142" width="250">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue letter-s-36">
                                                    Awesome Interior Apartment</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>
                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <img src="{{ asset('img/my_p-card_3.svg') }}" alt="image"
                                                            class="#">
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            James Henry</div>
                                                    </div>

                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-bed text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-bathroom text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-floor text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>

                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_scale text-20  color-b-blue"></span>
                                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            1240 m<sup>2</sup></div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            RT48</div>
                                                    </div>
                                                </div>
                                                <div class="prize-title ">
                                                    <div class=" text-14 font-weight-700 lineheight-18 color-primary">
                                                        € 698,000.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-property.jpg" alt="image"
                                                    class="border-r-8" height="142" width="250">
                                            </div>
                                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">
                                                <div
                                                    class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue letter-s-36">
                                                    Awesome Interior Apartment</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>
                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <img src="{{ asset('img/my_p-card_3.svg') }}" alt="image"
                                                            class="#">
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            James Henry</div>
                                                    </div>

                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-bathroom text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-bathroom text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-floor text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>

                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_scale text-20  color-b-blue"></span>
                                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            1240 m<sup>2</sup></div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            RT48</div>
                                                    </div>
                                                </div>
                                                <div class="prize-title ">
                                                    <div class=" text-14 font-weight-700 lineheight-18 color-primary">
                                                        € 698,000.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                            <button type="button"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Import</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ///////////////////////////////////////end Add-property modal ////////////////////////////////////// -->

        <!-- /////////////////////////////////////////////manage-customer////////////////////////////////////////// -->
        <button type="button"
            class="Gradient_button small-button  border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white  modal-confirm-btn-success"
            data-toggle="modal" data-target="#managecustomer">Add
            New Property</button>
        <div class="modal fade" id="managecustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_one" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Manage Customers</h4>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file">
                        <div class="modal-body_select-agent">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                        </div>
                                        <div class="modal_body-left_text_one d-flex flex-column gap-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <img src="{{ asset('img/user_one.svg') }}" alt="image"
                                                        class="#">
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>

                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location text-20 color-b-blue"></i>
                                                <div
                                                    class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                    Carretera Cádiz-Málaga 16,Guipúzcoa, Guipúzcoa, 20808</div>

                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                                <button
                                                    class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                        </div>
                                        <div class="modal_body-left_text_one d-flex flex-column gap-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <img src="{{ asset('img/user_one.svg') }}" alt="image"
                                                        class="#">
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location text-20 color-b-blue"></i>
                                                <div
                                                    class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                    Carretera Cádiz-Málaga 16,Guipúzcoa, Guipúzcoa, 20808</div>

                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                                <button
                                                    class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                        </div>
                                        <div class="modal_body-left_text_one d-flex flex-column gap-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <img src="{{ asset('img/user_one.svg') }}" alt="image"
                                                        class="#">
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location text-20 color-b-blue"></i>
                                                <div
                                                    class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                    Carretera Cádiz-Málaga 16,Guipúzcoa, Guipúzcoa, 20808</div>

                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                                <button
                                                    class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                        </div>
                                        <div class="modal_body-left_text_one d-flex flex-column gap-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <img src="{{ asset('img/user_one.svg') }}" alt="image"
                                                        class="#">
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location text-20 color-b-blue"></i>
                                                <div
                                                    class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                    Carretera Cádiz-Málaga 16,Guipúzcoa, Guipúzcoa, 20808</div>

                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                                <button
                                                    class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                        </div>
                                        <div class="modal_body-left_text_one d-flex flex-column gap-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <img src="{{ asset('img/user_one.svg') }}" alt="image"
                                                        class="#">
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location text-20 color-b-blue"></i>
                                                <div
                                                    class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                    Carretera Cádiz-Málaga 16,Guipúzcoa, Guipúzcoa, 20808</div>

                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                                <button
                                                    class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                        </div>
                                        <div class="modal_body-left_text_one d-flex flex-column gap-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <img src="{{ asset('img/user_one.svg') }}" alt="image"
                                                        class="#">
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location text-20 color-b-blue"></i>
                                                <div
                                                    class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                    Carretera Cádiz-Málaga 16,Guipúzcoa, Guipúzcoa, 20808</div>

                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                                <button
                                                    class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                        </div>
                                        <div class="modal_body-left_text_one d-flex flex-column gap-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <img src="{{ asset('img/user_one.svg') }}" alt="image"
                                                        class="#">
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location text-20 color-b-blue"></i>
                                                <div
                                                    class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                    Carretera Cádiz-Málaga 16,Guipúzcoa, Guipúzcoa, 20808</div>

                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                                <button
                                                    class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="modal-body_card">
                                        <div class="modal-body_left gap-4">
                                            <div class="modal_img">
                                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="Default Image"
                                                    class="border-r-8" height="78" width="78">
                                            </div>
                                        </div>
                                        <div class="modal_body-left_text_one d-flex flex-column gap-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    Eileen Dover</div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <img src="{{ asset('img/user_one.svg') }}" alt="image"
                                                        class="#">
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location text-20 color-b-blue"></i>
                                                <div
                                                    class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                    Carretera Cádiz-Málaga 16,Guipúzcoa, Guipúzcoa, 20808</div>

                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                                    Budget: <span class="font-weight-700 color-primary">Є7000</span></div>
                                                <button
                                                    class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                            <button type="button"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Import</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //////////////////////////////////////////////end-manage-customer///////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////upload-delect-document////////////////////////////////////////// -->
        <button type="button"
            class="Gradient_button small-button  border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white  modal-confirm-btn-success"
            data-toggle="modal" data-target="#upload_deletebutton">Add
            New Property
        </button>
        <div class="modal fade" id="upload_deletebutton" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_two" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Upload Document</h4>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file">
                        <div class="modal_body_text">
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <img src="/img/file_image.svg" alt="image" class="">
                                    </div>
                                    <div class="modal_body-left_text">
                                        <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                            Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                        <div
                                            class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                            1.28 MB/1.28 MB</div>
                                    </div>
                                </div>
                                <div class="modal-upload-right">
                                    <img src="{{ asset('img/delete.svg') }}" alt="image" class="#">
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <img src="/img/file_image.svg" alt="image" class="">
                                    </div>
                                    <div class="modal_body-left_text">
                                        <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                            Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                        <div
                                            class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                            1.28 MB/1.28 MB</div>
                                    </div>
                                </div>
                                <div class="modal-upload-right">
                                    <img src="{{ asset('img/delete.svg') }}" alt="image" class="#">
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <img src="/img/file_image.svg" alt="image" class="">
                                    </div>
                                    <div class="modal_body-left_text">
                                        <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                            Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                        <div
                                            class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                            1.28 MB/1.28 MB</div>
                                    </div>
                                </div>
                                <div class="modal-upload-right">
                                    <img src="{{ asset('img/delete.svg') }}" alt="image" class="#">
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <img src="/img/file_image.svg" alt="image" class="">
                                    </div>
                                    <div class="modal_body-left_text">
                                        <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                            Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                        <div
                                            class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                            1.28 MB/1.28 MB</div>
                                    </div>
                                </div>
                                <div class="modal-upload-right">
                                    <img src="{{ asset('img/delete.svg') }}" alt="image" class="#">
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <img src="/img/file_image.svg" alt="image" class="">
                                    </div>
                                    <div class="modal_body-left_text">
                                        <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                            Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                        <div
                                            class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                            1.28 MB/1.28 MB</div>
                                    </div>
                                </div>
                                <div class="modal-upload-right">
                                    <img src="{{ asset('img/delete.svg') }}" alt="image" class="#">
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <img src="/img/file_image.svg" alt="image" class="">
                                    </div>
                                    <div class="modal_body-left_text">
                                        <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                            Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                        <div
                                            class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                            1.28 MB/1.28 MB</div>
                                    </div>
                                </div>
                                <div class="modal-upload-right">
                                    <img src="{{ asset('img/delete.svg') }}" alt="image" class="#">
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <img src="/img/file_image.svg" alt="image" class="">
                                    </div>
                                    <div class="modal_body-left_text">
                                        <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                            Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                        <div
                                            class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                            1.28 MB/1.28 MB</div>
                                    </div>
                                </div>
                                <div class="modal-upload-right">
                                    <img src="{{ asset('img/delete.svg') }}" alt="image" class="#">
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <img src="/img/file_image.svg" alt="image" class="">
                                    </div>
                                    <div class="modal_body-left_text">
                                        <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                            Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                        <div
                                            class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                            1.28 MB/1.28 MB</div>
                                    </div>
                                </div>
                                <div class="modal-upload-right">
                                    <img src="{{ asset('img/delete.svg') }}" alt="image" class="#">
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <img src="/img/file_image.svg" alt="image" class="">
                                    </div>
                                    <div class="modal_body-left_text">
                                        <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                            Lorem Ipsum Lorem Ipsum Lorem Ipsum.pdf</div>
                                        <div
                                            class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                            1.28 MB/1.28 MB</div>
                                    </div>
                                </div>
                                <div class="modal-upload-right">
                                    <img src="{{ asset('img/delete.svg') }}" alt="image" class="#">
                                </div>
                            </div>

                        </div>
                        <div class="pt-30 modal-body_footer d-flex justify-content-between align-items-center">
                            <form method="post" enctype="multipart/form-data" class="form_file">
                                <label for="apply"><input type="file" name="" id="apply"
                                        accept="image/*,.pdf">Upload From
                                    Browser</label>
                            </form>
                            <button type="button"
                                class="w-150 h-42 gardient-button border-r-8 b-color-Gradient text-12 font-weight-400 line-height-23 color-white mt-10 modal-confirm-btn-success">Logout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /////////////////////////////////////////////////end-upload-document//////////////////////////////////////// -->

        <!-- /////////////////////////////////////// manage- agent /////////////////////////////////////////////// -->
        <button type="button"
            class="Gradient_button small-button  border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white  modal-confirm-btn-success"
            data-toggle="modal" data-target="#manageAgent">Manage Agents
        </button>

        <div class="modal fade" id="manageAgent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_one" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Manage Agents</h4>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <p class="pt-10 text-center text-14 color-black font-weight-400 text-capitalize lineheight-18">
                        Import your
                        existing listed properties to your project.</p>
                    <div class="modal-body modal-header_file">
                        <div class="modal-body_select-agent">
                            <table id="example" class="display dashboard_table dashboard_table_edit_two"
                                style="width:100%; ">
                                <thead>
                                    <tr>
                                        <th>Agent</th>
                                        <th class="table-extra-width">Project Information</th>
                                        <th class="table-extra-width">Customer Management</th>
                                        <th class="table-extra-width">To-Do List</th>
                                        <th class="table-extra-width">Event</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span><button
                                                class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span><button
                                                class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span><button
                                                class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span><button
                                                class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span><button
                                                class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span><button
                                                class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span><button
                                                class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span><button
                                                class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"><span
                                                class="table-agent_name">Brian Baker</span><button
                                                class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline">Remove</button>
                                        </td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                        <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                            <button type="button"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /////////////////////////////////////////////////end-manage-agent //////////////////////////////////////// -->
        </div>
        </div>
        </div>


        @push('scripts')

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
            <script src="https://unpkg.com/popper.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <script src="{{ asset('assets/js/modules/properties/property_index.js') }}"></script>

            <script>
                $(document).ready(function() {
                    $(".slick-list").slick({
                        slidesToShow: 7,
                        slidesToScroll: 7,
                        arrows: true,
                        dots: false,
                        infinite: true,
                        centerPadding: '60px',
                        autoplay: false,
                        // centerMode: true,
                    });
                    $(".prev-btn").click(function() {
                        $(".slick-list").slick("slickPrev");
                    });

                    $(".next-btn").click(function() {
                        $(".slick-list").slick("slickNext");
                    });
                });
            </script>

        @endpush
    @endsection
