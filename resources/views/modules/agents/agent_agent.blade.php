@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.sidebar.Property_Search') }} Inmoconnect
        @endsection

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">

        <style>
            .slick-list .slick-slide {
                font-size: 30px;
                text-align: center;
                line-height: 2;
                font-weight: 700;
                margin-left: 10px;
                margin-right: 5px;
            }

            .slick-slide.slick-current.slick-active {
                margin-left: 0;
            }

            .slick-arrow {
                z-index: 1;
            }

            .slick-arrow:before {
                font-size: 30px;
            }

            .slick-next {
                right: 18px;
                top: 14px;
            }

            .slick-prev {
                left: 93%;
                top: 14px;
            }

            .slick-list.draggable {
                padding-top: 60px;
            }

            .slick-next.slick-disabled:before,
            .slick-prev.slick-disabled:before {
                opacity: 1;
            }

            .slick-slider .slick-disabled {
                opacity: 1;
            }

            .slick-next:before,
            .slick-prev:before {
                opacity: 1;
            }

            .my-project_dashboar ul.slick-dots {
                justify-content: end;
            }

            .my-project_dashboar .slick-dots {
                top: 14px;
                left: -100px;
            }

            .my-project_dashboar .slick-dots li button {
                width: 6px;
                height: 6px;
                padding: 0;
                background-color: #8F77EA;
            }

            .my-project_dashboar .slick-dots li.slick-active button {
                background-color: #383192;
            }

            .my-project_dashboar .slick-dots li button:before {
                content: '';
            }

            .my-project_dashboar .slick-dots li {
                width: 0px;
                height: 0px;
            }

            .slick-next:before {
                content: "";
                background-image: url("../../img/slider_right.svg");
                background-repeat: no-repeat;
                width: 30px;
                height: 30px;
                display: block;
                background-position: center center;
            }

            .slick-prev:before {
                content: "";
                background-image: url("../../img/slider_left.svg");
                background-repeat: no-repeat;
                width: 30px;
                height: 30px;
                display: block;
                background-position: center center;
            }

            .slick-arrow:before {
                font-size: 18px;
                padding: 5px 8px;
            }

            .slick-next:before,
            .slick-prev:before {
                border-radius: 4px;
                border: 1px solid #383192;
                line-height: 1;
                opacity: 1;
                color: #383192;
            }

            .slick_list_main_text {
                margin-bottom: -30px;
            }

            .slick-track {
                display: flex;
                flex-direction: row;
                justify-content: center;
                gap: 20px;
            }

            .slick-track:first-child {
                gap: 0;
            }
        </style>

        <div class="overlay" id="overlay"></div>
        <div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                <!-- ///////////////////////////////////////// breadcrumb///////////////////////////////////////////////////////////////////// -->
                <div class="empty-search-header">
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div
                                class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">
                                Agents
                            </div>
                        </div>
                        <div class="header-right-button_one d-flex align-items-center gap-3">
                            <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                                <img src="{{ asset('img/Projct_breadcrum.svg') }}" alt="image" class="#">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ///////////////////////////////////////////breadcrumb_end ///////////////////////////////////////////////////////// -->

                <!-- ///////////////////////////////////////////card//////////////////////////////////////////////////////////////// -->
                <div class=" main-card border-r-8 p-10 mb-15 b-color-white box-shadow-one">
                    <div class="main-card_flex d-block d-sm-flex align-center gap-2">
                        <div class="main-card-left">
                            <div class="main-card-small-img main-card-img main-small-card-three ">
                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="image">
                            </div>
                        </div>
                        <div class="row w-100">
                            <div class="col-lg-9">
                                <div class="main-card-right w-100 d-flex flex-column gap-12 ps-1 ps-md-2 ps-lg-3">
                                    <div class="main-card-top flex-column d-flex gap-1 gap-sm-2">
                                        <div class="main-card-one-header d-flex align-items-center justify-content-between">
                                            <div class="main-card-bottom">
                                                <div
                                                    class="property-title text-18 font-weight-700 lineheight-24 text-capitalize color-b-blue">
                                                    himanshi patel</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="main-card-center-one d-inline-block d-md-flex align-items-center gap-2 gap-md-3">
                                        <div class="d-flex gap-2 align-items-center ">
                                            <i class=" icon-location text-20 color-b-blue"></i>
                                            <div class="property-secondary  text-14 font-weight-400 lineheight-18 color-b-blue">
                                                Bellavista 79, Santibáñez De Vidriales, Zamora, 49610</div>
                                        </div>
                                    </div>
                                    <div class="main-card-center-two  d-flex gap-2 gap-md-3 justify-content-between">
                                        <div
                                            class=" d-flex  gap-2  align-items-flex-start flex-column flex-sm-row align-items-sm-center">
                                            <div class="d-flex gap-2 align-items-center ">
                                                <span class=" icon-Mail  text-20  color-b-blue text-break"></span>
                                                <h6
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue text-break">
                                                    himanshi11@yopmail.com</h6>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-phone text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    +(11) (1111) (111) (111)</div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-home_protection text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    0</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="d-flex align-items-center justify-content-end">
                                    <button type="button"
                                        onclick="openLink('http://127.0.0.1:8000/admin/properties/view/16989-231042123', '_self')"
                                        class="text-12 font-weight-400 line-height-15 border-r-4 b-color-primary color-white-grey viewAgentbtn"
                                        id="viewPropertyBtn">
                                        View Agent
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ///////////////////////////////////////end-card//////////////////////////////////////////////////////////////////// -->

                <div class=" main-card border-r-8 p-10 mb-15 b-color-white box-shadow-one">
                    <div class="main-card_flex d-block d-sm-flex align-center gap-2">
                        <div class="main-card-left">
                            <div class="main-card-small-img main-card-img main-small-card-three ">
                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="image">
                            </div>
                        </div>
                        <div class="row w-100">
                            <div class="col-lg-9">
                                <div class="main-card-right w-100 d-flex flex-column gap-12 ps-1 ps-md-2 ps-lg-3">
                                    <div class="main-card-top flex-column d-flex gap-1 gap-sm-2">
                                        <div class="main-card-one-header d-flex align-items-center justify-content-between">
                                            <div class="main-card-bottom">
                                                <div
                                                    class="property-title text-18 font-weight-700 lineheight-24 text-capitalize color-b-blue">
                                                    himanshi patel</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="main-card-center-one d-inline-block d-md-flex align-items-center gap-2 gap-md-3">
                                        <div class="d-flex gap-2 align-items-center ">
                                            <i class=" icon-location text-20 color-b-blue"></i>
                                            <div class="property-secondary  text-14 font-weight-400 lineheight-18 color-b-blue">
                                                Bellavista 79, Santibáñez De Vidriales, Zamora, 49610</div>
                                        </div>
                                    </div>
                                    <div class="main-card-center-two  d-flex gap-2 gap-md-3 justify-content-between">
                                        <div
                                            class=" d-flex  gap-2  align-items-flex-start flex-column flex-sm-row align-items-sm-center">
                                            <div class="d-flex gap-2 align-items-center ">
                                                <span class=" icon-Mail  text-20  color-b-blue text-break"></span>
                                                <h6
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue text-break">
                                                    himanshi11@yopmail.com</h6>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-phone text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    +(11) (1111) (111) (111)</div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-home_protection text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    0</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="d-flex align-items-center justify-content-end">
                                    <button type="button"
                                        onclick="openLink('http://127.0.0.1:8000/admin/properties/view/16989-231042123', '_self')"
                                        class="text-12 font-weight-400 line-height-15 border-r-4 b-color-primary color-white-grey viewAgentbtn"
                                        id="viewPropertyBtn">
                                        View Agent
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- //////////////////////////////////////////////////////////////// -->

                <div class=" main-card border-r-8 p-10 mb-15 b-color-white box-shadow-one">
                    <div class="main-card_flex d-block d-sm-flex align-center gap-2">
                        <div class="main-card-left">
                            <div class="main-card-small-img main-card-img main-small-card-three ">
                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="image">
                            </div>
                        </div>
                        <div class="row w-100">
                            <div class="col-lg-9">
                                <div class="main-card-right w-100 d-flex flex-column gap-12 ps-1 ps-md-2 ps-lg-3">
                                    <div class="main-card-top flex-column d-flex gap-1 gap-sm-2">
                                        <div class="main-card-one-header d-flex align-items-center justify-content-between">
                                            <div class="main-card-bottom">
                                                <div
                                                    class="property-title text-18 font-weight-700 lineheight-24 text-capitalize color-b-blue">
                                                    himanshi patel</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="main-card-center-one d-inline-block d-md-flex align-items-center gap-2 gap-md-3">
                                        <div class="d-flex gap-2 align-items-center ">
                                            <i class=" icon-location text-20 color-b-blue"></i>
                                            <div
                                                class="property-secondary  text-14 font-weight-400 lineheight-18 color-b-blue">
                                                Bellavista 79, Santibáñez De Vidriales, Zamora, 49610</div>
                                        </div>
                                    </div>
                                    <div class="main-card-center-two  d-flex gap-2 gap-md-3 justify-content-between">
                                        <div
                                            class=" d-flex  gap-2  align-items-flex-start flex-column flex-sm-row align-items-sm-center">
                                            <div class="d-flex gap-2 align-items-center ">
                                                <span class=" icon-Mail  text-20  color-b-blue text-break"></span>
                                                <h6
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue text-break">
                                                    himanshi11@yopmail.com</h6>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-phone text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    +(11) (1111) (111) (111)</div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-home_protection text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    0</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="d-flex align-items-center justify-content-end">
                                    <button type="button"
                                        onclick="openLink('http://127.0.0.1:8000/admin/properties/view/16989-231042123', '_self')"
                                        class="text-12 font-weight-400 line-height-15 border-r-4 b-color-primary color-white-grey viewAgentbtn"
                                        id="viewPropertyBtn">
                                        View Agent
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- //////////////////////////////////////////////////////////////////////////// -->

                <div class=" main-card border-r-8 p-10 mb-15 b-color-white box-shadow-one">
                    <div class="main-card_flex d-block d-sm-flex align-center gap-2">
                        <div class="main-card-left">
                            <div class="main-card-small-img main-card-img main-small-card-three ">
                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="image">
                            </div>
                        </div>
                        <div class="row w-100">
                            <div class="col-lg-9">
                                <div class="main-card-right w-100 d-flex flex-column gap-12 ps-1 ps-md-2 ps-lg-3">
                                    <div class="main-card-top flex-column d-flex gap-1 gap-sm-2">
                                        <div class="main-card-one-header d-flex align-items-center justify-content-between">
                                            <div class="main-card-bottom">
                                                <div
                                                    class="property-title text-18 font-weight-700 lineheight-24 text-capitalize color-b-blue">
                                                    himanshi patel</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="main-card-center-one d-inline-block d-md-flex align-items-center gap-2 gap-md-3">
                                        <div class="d-flex gap-2 align-items-center ">
                                            <i class=" icon-location text-20 color-b-blue"></i>
                                            <div
                                                class="property-secondary  text-14 font-weight-400 lineheight-18 color-b-blue">
                                                Bellavista 79, Santibáñez De Vidriales, Zamora, 49610</div>
                                        </div>
                                    </div>
                                    <div class="main-card-center-two  d-flex gap-2 gap-md-3 justify-content-between">
                                        <div
                                            class=" d-flex  gap-2  align-items-flex-start flex-column flex-sm-row align-items-sm-center">
                                            <div class="d-flex gap-2 align-items-center ">
                                                <span class=" icon-Mail  text-20  color-b-blue text-break"></span>
                                                <h6
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue text-break">
                                                    himanshi11@yopmail.com</h6>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-phone text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    +(11) (1111) (111) (111)</div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-home_protection text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    0</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="d-flex align-items-center justify-content-end">
                                    <button type="button"
                                        onclick="openLink('http://127.0.0.1:8000/admin/properties/view/16989-231042123', '_self')"
                                        class="text-12 font-weight-400 line-height-15 border-r-4 b-color-primary color-white-grey viewAgentbtn"
                                        id="viewPropertyBtn">
                                        View Agent
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ///////////////////////////////////////////////////// -->
            </div>
        </div>
        </div>

        @push('scripts')

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>




        @endpush
    @endsection
