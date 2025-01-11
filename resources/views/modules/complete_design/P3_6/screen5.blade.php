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
                                        <div class="  icon-edit icon-20 color-b-blue"></div>
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
                                        <span><i class=" icon-my_calender me-2 icon-12"></i>22/12/2023</span>
                                    </div>
                                </div>
                                <div class="property_type-empty-card mb-10">
                                    <div class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">Project End
                                        date:</div>
                                    <div
                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1 d-flex align-items-center">
                                        <span><i class=" icon-my_calender me-2 icon-12"></i>22/12/2023</span>
                                    </div>
                                </div>
                                <div class="property_type-empty-card">
                                    <div class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">Location:
                                    </div>
                                    <div
                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1 d-flex align-items-center">
                                        <span> <i class="icon-location me-2 icon-12"></i>Bellavista 79, Santibáñez De Vidriales,
                                            Zamora, 49610</span>
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
                                        <i class="icon-house_id icon-30 color-primary"></i>
                                    </div>
                                    <div class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                        Start importing properties who are part of<br>this project from your general
                                        listings
                                    </div>
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
                                    <i class=" icon-agent icon-30 color-primary"></i>
                                </div>
                                <div class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                    Start importing agents who will be part of<br>this project from your general agents
                                    network
                                </div>
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
                                <i class=" icon-customer icon-30 color-primary"></i>
                            </div>
                            <div class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                Start importing customer who will be part of this<br>project from your general
                                customers network
                            </div>
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
                            <i class=" icon-to_do_list_empty  icon-30 color-primary"></i>
                        </div>
                        <div class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                            Add your tasks checklist and manage<br>them with timely manner
                        </div>
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
                            <i class=" icon-Task_Management-Icon  icon-30 color-primary"></i>
                        </div>
                        <div class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                            No upcoming event today!
                        </div>
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
                            <i class=" icon-zip icon-30 color-primary"></i>
                        </div>
                        <div class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                            Add all the project's related files<br>and attachments over here.
                        </div>
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
                        <i class=" icon-my_project icon-16 color-primary"></i>


                    </div>
                    <div class="activity_text ms-2">
                        <div class="color-light-grey-seven text-14 font-weight-400 lineheight-18 text-capitalize">
                            <span class="font-weight-700 color-b-blue">James Henry</span> Initiated project
                            <span class="font-weight-700 color-b-blue">Ratnadeep Complex.</span>
                        </div>
                        <div class="mt-1 color-light-grey-six text-14 font-weight-400 lineheight-18 text-capitalize">
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
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Upload Document</h5>
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
                                            <i class=" icon-zip icon-24 "></i>
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
                                            <i class=" icon-zip icon-24 "></i>
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
                                            <i class=" icon-zip icon-24 "></i>
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
                                        <i class=" icon-zip icon-24 "></i>
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
                                        <i class=" icon-zip icon-24 "></i>
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
                                        <i class=" icon-zip icon-24 "></i>
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
                                        <i class=" icon-zip icon-24 "></i>
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
                                        <i class=" icon-zip icon-24 "></i>
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
                                        <i class=" icon-zip icon-24 "></i>
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
                                        <i class=" icon-zip icon-24 "></i>
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
                                        <i class=" icon-zip icon-24 "></i>
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
            <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Add To-Do List</h5>
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
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Customers</h5>
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
                                                    <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-location icon-20"></i>
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
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Agents</h5>
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
                                                    <i class=" icon-location icon-20"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-home_protection icon-18"></i>
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
                                                    <i class=" icon-location icon-20"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-home_protection icon-18"></i>
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
                                                    <i class=" icon-location icon-20"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-home_protection icon-18"></i>
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
                                                    <i class=" icon-location icon-20"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-home_protection icon-18"></i>
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
                                                    <i class=" icon-location icon-20"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-home_protection icon-18"></i>
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
                                                    <i class=" icon-location icon-20"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-home_protection icon-18"></i>
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
                                                    <i class=" icon-location icon-20"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-home_protection icon-18"></i>
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
                                                    <i class=" icon-location icon-20"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-home_protection icon-18"></i>
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
                                                    <i class=" icon-location icon-20"></i>
                                                    <div
                                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>

                                                </div>
                                                <div class="d-flex gap-2 align-items-center  ">
                                                    <i class=" icon-home_protection icon-18"></i>
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
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Properties</h5>
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
                                    type="checkbox" id="vehicle1" name="vehicle1" value="Bike" class="me-3">Select All
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
                                                    <i class=" icon-location icon-20 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>
                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="  icon-my_profile icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            James Henry</div>
                                                    </div>

                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-bed icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-bathroom icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-floor icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>

                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class=" icon-house_scale icon-20 color-b-blue"></i>
                                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            1240 m<sup>2</sup></div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-house_id icon-20 color-b-blue"></i>
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
                                                    <i class=" icon-location icon-20 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>
                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="  icon-my_profile icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            James Henry</div>
                                                    </div>

                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-bed icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-bathroom icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-floor icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>

                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class=" icon-house_scale icon-20 color-b-blue"></i>
                                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            1240 m<sup>2</sup></div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-house_id icon-20 color-b-blue"></i>
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
                                                    <i class=" icon-location icon-20 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>
                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="  icon-my_profile icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            James Henry</div>
                                                    </div>

                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-bed icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-bathroom icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-floor icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>

                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class=" icon-house_scale icon-20 color-b-blue"></i>
                                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            1240 m<sup>2</sup></div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-house_id icon-20 color-b-blue"></i>
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
                                                    <i class=" icon-location icon-20 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        Carretera Cádiz-Málaga 16, Getaria, Guipúzcoa, 20808</div>
                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="  icon-my_profile icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            James Henry</div>
                                                    </div>

                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-bathroom icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-bathroom icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-floor icon-20 color-b-blue"></i>
                                                        <div
                                                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                            2</div>
                                                    </div>

                                                </div>
                                                <div
                                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class=" icon-house_scale icon-20 color-b-blue"></i>
                                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            1240 m<sup>2</sup></div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="icon-house_id icon-20 color-b-blue"></i>
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
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Manage Customers</h5>
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

                                                    <i class=" icon-agent icon-18 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>

                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-agent icon-18 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-agent icon-18 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-agent icon-18 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-agent icon-18 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-agent icon-18 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-agent icon-18 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location icon-20"></i>
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
                                                    <i class=" icon-agent icon-18 color-b-blue"></i>
                                                    <div
                                                        class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                                        James Henry</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center  ">
                                                <i class=" icon-location icon-20"></i>
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
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Upload Document</h5>
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
                                        <i class="  icon-zip icon-24 "></i>
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
                                    <i class=" icon-Delete icon-20"></i>
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <i class=" icon-zip icon-24 "></i>
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
                                    <i class=" icon-Delete icon-20"></i>
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <i class=" icon-zip icon-24 "></i>
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
                                    <i class=" icon-Delete icon-20"></i>
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <i class=" icon-zip icon-24 "></i>
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
                                    <i class=" icon-Delete icon-20"></i>
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <i class=" icon-zip icon-24 "></i>
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
                                    <i class=" icon-Delete icon-20"></i>
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <i class=" icon-zip icon-24 "></i>
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
                                    <i class=" icon-Delete icon-20"></i>
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <i class=" icon-zip icon-24 "></i>
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
                                    <i class=" icon-Delete icon-20"></i>
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <i class=" icon-zip icon-24 "></i>
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
                                    <i class=" icon-Delete icon-20"></i>
                                </div>
                            </div>
                            <div class="modal-body_card justify-content-between">
                                <div class="modal-body_left">
                                    <div class="modal_img">
                                        <i class=" icon-zip icon-24 "></i>
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
                                    <i class=" icon-Delete icon-20"></i>
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
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Manage Agents</h5>
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
                            <table id="example" class="display dashboard_table dashboard_table_edit_two">
                                <thead>
                                    <tr>
                                        <th>Agent</th>
                                        <th class="table-extra-width">Project Information</th>
                                        <th class="table-extra-width">Property Management</th>
                                        <th class="table-extra-width">Agent Management</th>
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
