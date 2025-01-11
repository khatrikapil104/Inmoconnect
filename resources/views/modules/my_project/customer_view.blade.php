@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.sidebar.Property_Search') }} Inmoconnect
        @endsection

        <!-- slider -->

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">


        <style>
            /* .slick-prev:before{
                                        content: "\f105";
                                        font-family: "Font Awesome 6 Pro";
                                    } */
            /* .slick-next:before{
                                        content: "\f105";
                                        font-family: "    font-family: "Font Awesome 6 Pro";";
                                    } */
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


                <!-- //////////////////////////////////location/////////////////////////////////// -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 ">
                            <div class="edit_price_empty d-flex justify-content-between align-items-baseline mb-3 flex-wrap">
                                <div
                                    class="edit-price_left d-flex justify-content-between gap-2 gap-sm-3 align-items-center flex-wrap ">
                                    <div
                                        class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                        Ratnadeep Complex
                                    </div>
                                    <div class="text-14 font-weight-400 lineheight-18 text-capitalize in_progress border-r-5">
                                        <div class="edit_progress-button">In-Progress</div>
                                    </div>
                                    <img src="{{ asset('img/edit_icon.svg') }}" alt="image" class="#">
                                </div>
                                <div class="edit-price-right">
                                    <div
                                        class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 ">
                                        Є800,000</div>
                                </div>
                            </div>
                            <div class="property_type-empty-card mb-10">
                                <div class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">Project Type:
                                </div>
                                <div class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1">
                                    For Sale</div>
                            </div>
                            <div class="property_type-empty-card mb-10">
                                <div class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">Project
                                    Description:</div>
                                <div class="text-12 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1">
                                    Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                                    ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                                    pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar. Lorem ipsum dolor sit amet
                                    consectetur. Pellentesque nisi eget scelerisque neque eu euismod ipsum vitae. Arcu enim
                                    libero est sagittis faucibus sed viverra viverra. Risus dui fames pulvinar ut est. Viverra
                                    mollis habitasse mi ultricies pulvinar. Lorem ipsum dolor sit amet consectetur. Pellentesque
                                    nisi eget scelerisque neque eu euismod ipsum vitae. Arcu enim libero est sagittis faucibus
                                    sed viverra viverra. Risus dui fames pulvinar ut est. Viverra mollis habitasse mi ultricies
                                    pulvinar.</div>
                            </div>
                            <div class="property_type-empty-card mb-10">
                                <div class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">Project Start
                                    Date:</div>
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
                                <div class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">Location:</div>
                                <div
                                    class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1 d-flex align-items-center">
                                    <span> <i class=" icon-locationtext-16  color-b-blue me-2"></i>Bellavista 79, Santibáñez De
                                        Vidriales, Zamora, 49610</span>
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

                <!-- //////////////////////////////////////Add-property/////////////////////////////////// -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                            <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                                Property Management:
                            </h4>
                        <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                            <div class="search_button">
                                <div class="form-group mt-3 position-relative">
                                    <div class="input-group input-group-sm dashboard_input-search">
                                        <span
                                            class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                        <input type="text" name="userListingFilterData[search]"
                                            class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                            placeholder="Search here..." value="">
                                    </div>
                                </div>
                            </div>
                            <div class="header-right-button_one d-flex align-items-center gap-3">
                                <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                                    <img src="/img/dasktop_home.svg" alt="image" class="">
                                </div>
                            </div>
                        </div>
                        <div class="table_dashboard table-dashboard_one">
                            <table id="example" class="display dashboard_table" style="width:100%; ">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Proeprty ID</th>
                                        <th class="property_edit_title">Property Title</th>
                                        <th>Property Type</th>
                                        <th>City</th>
                                        <th>Sq m</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"></td>
                                        <td><span>RT48</span></td>
                                        <td class="ellipsis"><span>Awesome Interior Apartment</span></td>
                                        <td>Apartment</td>
                                        <td>Zamora</td>
                                        <td>1240 m<sup>2</sup></td>
                                        <td class="table_prize">Є1000</td>
                                        <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"></td>
                                        <td><span>RT48</span></td>
                                        <td class="ellipsis"><span>TY35 Avenue GGLondon Center TY35 Avenue GGLondon Center
                                            </span></td>
                                        <td>Apartment</td>
                                        <td>Zamora</td>
                                        <td>1240 m<sup>2</sup></td>
                                        <td class="table_prize">Є1000</td>
                                        <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"></td>
                                        <td><span>RT48</span></td>
                                        <td class="ellipsis"><span>Awesome Interior Apartment</span></td>
                                        <td>Apartment</td>
                                        <td>Zamora</td>
                                        <td>1240 m<sup>2</sup></td>
                                        <td class="table_prize">Є1000</td>
                                        <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"></td>
                                        <td><span>RT48</span></td>
                                        <td class="ellipsis"><span>Awesome Interior Apartment</span></td>
                                        <td>Apartment</td>
                                        <td>Zamora</td>
                                        <td>1240 m<sup>2</sup></td>
                                        <td class="table_prize">Є1000</td>
                                        <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"></td>
                                        <td><span>RT48</span></td>
                                        <td class="ellipsis"><span>Awesome Interior Apartment</span></td>
                                        <td>Apartment</td>
                                        <td>Zamora</td>
                                        <td>1240 m<sup>2</sup></td>
                                        <td class="table_prize">Є1000</td>
                                        <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"></td>
                                        <td><span>RT48</span></td>
                                        <td class="ellipsis"><span>Awesome Interior Apartment</span></td>
                                        <td>Apartment</td>
                                        <td>Zamora</td>
                                        <td>1240 m<sup>2</sup></td>
                                        <td class="table_prize">Є1000</td>
                                        <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image"></td>
                                        <td><span>RT48</span></td>
                                        <td class="ellipsis"><span>Awesome Interior Apartment</span></td>
                                        <td>Apartment</td>
                                        <td>Zamora</td>
                                        <td>1240 m<sup>2</sup></td>
                                        <td class="table_prize">Є1000</td>
                                        <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a>
                                        </td>
                                    </tr>


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /////////////////////////////////////////end-Add-property/////////////////////////////////// -->



            <!-- /////////////////////////////////to_do_list //////////////////////////////////////////////////  -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                        <div class="dashboard_card-title d-flex align-items-center justify-content-between">
                            <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                                To-do List:
                            </h4>
                        <div class="header-right-button_one d-flex align-items-center gap-3">
                            <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                                <img src="/img/dashboard_add.svg" alt="image" class="">
                            </div>
                        </div>
                    </div>
                    <div class="table_dashboard table-dashboard_one">
                        <table id="example" class="display dashboard_table dashboard_edit_one" style="width:100%; ">
                            <thead>
                                <tr>
                                    <th class="d-flex align-items-center gap-12"><span>Task Name</span></th>
                                    <th>Status</th>
                                    <th>Deadline</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="d-flex align-items-center gap-12"><span class="change_decoration">Lorem
                                            Ipsum Lorem Ipsum Lorem Ipsum</span></td>
                                    <td class="change_active"><span class="span_active span_complate_one">Active</span></td>
                                    <td class="change_decoration">25/12/2022</td>
                                    <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a></td>
                                </tr>
                                <tr>
                                    <td class="d-flex align-items-center gap-12"><span>Lorem Ipsum Lorem Ipsum Lorem
                                            Ipsum</span></td>
                                    <td><span class="span_complete">Completed</span></td>
                                    <td>25/12/2022</td>
                                    <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a></td>
                                </tr>
                                <tr>
                                    <td class="d-flex align-items-center gap-12"><span>Lorem Ipsum Lorem Ipsum Lorem
                                            Ipsum</span></td>
                                    <td><span class="span_pending">Pending</span></td>
                                    <td>25/12/2022</td>
                                    <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a></td>
                                </tr>
                                <tr>
                                    <td class="d-flex align-items-center gap-12"><span>Lorem Ipsum Lorem Ipsum Lorem
                                            Ipsum</span></td>
                                    <td><span class="span_active">Active</span></td>
                                    <td>25/12/2022</td>
                                    <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a></td>
                                </tr>
                                <tr>
                                    <td class="d-flex align-items-center gap-12"><span>Lorem Ipsum Lorem Ipsum Lorem
                                            Ipsum</span></td>
                                    <td><span class="span_active">Active</span></td>
                                    <td>25/12/2022</td>
                                    <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a></td>
                                </tr>
                                <tr>
                                    <td class="d-flex align-items-center gap-12"><span>Lorem Ipsum Lorem Ipsum Lorem
                                            Ipsum</span></td>
                                    <td><span class="span_active">Active</span></td>
                                    <td>25/12/2022</td>
                                    <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a></td>
                                </tr>
                                <tr>
                                    <td class="d-flex align-items-center gap-12"><span>Lorem Ipsum Lorem Ipsum Lorem
                                            Ipsum</span></td>
                                    <td><span class="span_active">Active</span></td>
                                    <td>25/12/2022</td>
                                    <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a></td>
                                </tr>



                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////end_ to_ do_ list //////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////project-event-sehdule /////////////////////////////////  -->
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                    <div class="dashboard_card-title d-flex align-items-center justify-content-between">
                        <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                            Project’s Events Schedule:
                        </h4>
                    <div class="header-right-button_one d-flex align-items-center gap-3">
                        <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                            data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                            <img src="/img/add_schdule.svg" alt="image" class="">
                        </div>
                    </div>
                </div>

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
                <div class=" table-empty-dashboard_property Schedule_call_height">
                    <div class="today_schdule table-schdule_one pt-3 pb-2">
                        <div class="text-14 font-weight-700 color-primary lineheight-18 text-capitalize text-start">
                            Today’s Events</div>
                        <div class="today_schdule-call d-flex align-items-center pt-10 gap-3">
                            <div class="today_call d-flex align-items-center gap-2">
                                <div class="call_round green "></div>
                                <div class="toda_call_text green_text">1 call</div>
                            </div>
                            <div class="today_call d-flex align-items-center gap-2">
                                <div class="call_round sky "></div>
                                <div class="toda_call_text sky_text">1 View Meeting</div>
                            </div>
                            <div class="today_call d-flex align-items-center gap-2">
                                <div class="call_round red"></div>
                                <div class="toda_call_text red_text"> Meeting</div>
                            </div>
                        </div>
                    </div>
                    <div class="today_schdule_call_text">
                        <div class="green_bg schdule_call-section d-flex justify-content-between align-items-center mt-10">
                            <div class="schdule-call-left ">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                        15:30- 18:00</div>
                                    <img src="/img/bell.svg" alt="image" class="icon_bg green" width="8"
                                        height="8">
                                    <img src="/img/square_1.svg" alt="image" class="#">
                                </div>
                                <div class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                    Task Event 01</div>
                            </div>
                            <a href="schdule-call-right">
                                <img src="http://127.0.0.1:8000/img/eye.svg" alt="image">
                            </a>
                        </div>
                        <div class="sky_bg schdule_call-section d-flex justify-content-between align-items-center mt-10">
                            <div class="schdule-call-left ">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                        15:30- 18:00</div>
                                    <img src="/img/bell.svg" alt="image" class="icon_bg sky" width="8"
                                        height="8">
                                    <img src="/img/square_2.svg" alt="image" class="#">
                                </div>
                                <div class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                    Task Event 01</div>
                            </div>
                            <a href="schdule-call-right">
                                <img src="http://127.0.0.1:8000/img/eye.svg" alt="image">
                            </a>
                        </div>
                        <div class="red_bg schdule_call-section d-flex justify-content-between align-items-center mt-10">
                            <div class="schdule-call-left ">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                        15:30- 18:00</div>
                                    <img src="/img/bell.svg" alt="image" class="icon_bg red" width="8"
                                        height="8">
                                    <img src="/img/square_3.svg" alt="image" class="#">
                                </div>
                                <div class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                    Task Event 01</div>
                            </div>
                            <a href="schdule-call-right">
                                <img src="http://127.0.0.1:8000/img/eye.svg" alt="image">
                            </a>
                        </div>
                        <div class="green_bg schdule_call-section d-flex justify-content-between align-items-center mt-10">
                            <div class="schdule-call-left ">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                        15:30- 18:00</div>
                                    <img src="/img/bell.svg" alt="image" class="icon_bg green" width="8"
                                        height="8">
                                    <img src="/img/square_1.svg" alt="image" class="#">
                                </div>
                                <div class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                    Task Event 01</div>
                            </div>
                            <a href="schdule-call-right">
                                <img src="http://127.0.0.1:8000/img/eye.svg" alt="image">
                            </a>
                        </div>
                    </div>


                    <!-- <div class="empty-table">
                                                                    <div class="empty-image">
                                                                        <img src="/img/empty-property.svg" alt="image" class="">
                                                                    </div>
                                                                    <div class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                                                    No upcoming event today!
                                                                    </div>
                                                                    <button type="button" class="Gradient_button small-button  border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white  modal-confirm-btn-success" data-toggle="modal" data-target="#todolist">Add New Property</button>
                                                                </div> -->
                </div>
            </div>
        </div>
        </div>
        <!-- ////////////////////////////////////////end-projrct-event-sehdule///////////////////////////////////// -->

        <!-- ////////////////////////////////////////////attachment /////////////////////////////////////// -->
        <div class="row">
            <div class="col-lg-12">
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                    <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                        Attachments:
                    </h4>
                <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                    <div class="search_button">
                        <div class="form-group mt-3 position-relative">
                            <div class="input-group input-group-sm dashboard_input-search">
                                <span class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                <input type="text" name="userListingFilterData[search]"
                                    class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                    placeholder="Search here..." value="">
                            </div>
                        </div>
                    </div>
                    <div class="header-right-button_one d-flex align-items-center gap-12">
                        <a href="#"
                            class="text-14 color-primary font-weight-400 lineheight-18 text-decoration-underline text-capitalize">View
                            Files</a>
                        <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                            data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                            <img src="/img/add_attachment.svg" alt="image" class="">
                        </div>
                    </div>
                </div>
                <div class="table_dashboard table-dashboard_two">
                    <table id="example" class="display dashboard_table" style="width:100%; ">
                        <thead>
                            <tr>
                                <th></th>
                                <th>File Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="/img/file_image.svg" alt="image" class="file_width me-2"></td>
                                <td><span>Lorem Ipsum Lorem Ipsum.Pdf</span><span class="d-block">Uploaded by James
                                        Henry</span></td>
                                <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a></td>
                            </tr>
                            <tr>
                                <td><img src="/img/file_image.svg" alt="image" class="file_width me-2"></td>
                                <td><span>Lorem Ipsum Lorem Ipsum.Pdf</span><span class="d-block">Uploaded by James
                                        Henry</span></td>
                                <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a></td>
                            </tr>
                            <tr>
                                <td><img src="/img/file_image.svg" alt="image" class="file_width me-2"></td>
                                <td><span>Lorem Ipsum Lorem Ipsum.Pdf</span><span class="d-block">Uploaded by James
                                        Henry</span></td>
                                <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a></td>
                            </tr>
                            <tr>
                                <td><img src="/img/file_image.svg" alt="image" class="file_width me-2"></td>
                                <td><span>Lorem Ipsum Lorem Ipsum.Pdf</span><span class="d-block">Uploaded by James
                                        Henry</span></td>
                                <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a></td>
                            </tr>
                            <tr>
                                <td><img src="/img/file_image.svg" alt="image" class="file_width me-2"></td>
                                <td><span>Lorem Ipsum Lorem Ipsum.Pdf</span><span class="d-block">Uploaded by James
                                        Henry</span></td>
                                <td><a href="#"><img src="/img/delete.svg" alt="image" class=""></a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        </div>
        <!-- /////////////////////////////////////////end-attachment //////////////////////////////////////// -->

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


        </div>
        </div>
        </div>


        @push('scripts')

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
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
            <script>
                /* When the user clicks on the button, 
                                                toggle between hiding and showing the dropdown content */
                function myFunction() {
                    document.getElementById("table_dropdown").classList.toggle("show");
                }

                // Close the dropdown if the user clicks outside of it
                window.onclick = function(event) {
                    if (!event.target.matches('.table_dropdown_one')) {
                        var dropdowns = document.getElementsByClassName("table_dropdown-content");
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
            <script>
                $('#vehicle_one').change(function() {
                    if ($(this).is(":checked")) {
                        $('.change_decoration').addClass('text_decoration_line_through ');
                        $('.span_active').addClass('span_complete');
                        $('.span_active').removeClass('span_active');
                        $(".span_complate_one").text("Complete");

                    } else {
                        $('.change_decoration').removeClass('text_decoration_line_through ');
                        $('.span_complete').addClass('span_active');
                        $('.span_complete').removeClass('span_complete');
                        $(".span_complate_one").text("Active");
                    }
                });
            </script>

        @endpush
    @endsection
