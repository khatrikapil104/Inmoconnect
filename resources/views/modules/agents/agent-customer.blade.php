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
                            <div class="main-card-small-img main-card-img ">
                                <img src="http://127.0.0.1:8000/img/default-user.jpg" alt="image">
                            </div>
                        </div>
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
                            <div class="main-card-center-one d-inline-block d-md-flex align-items-center gap-2 gap-md-3">
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
                                        <h6 class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                            +(11) (1111) (111) (111)</h6>
                                    </div>
                                    <div class="d-flex gap-2 align-items-center">
                                        <span class="icon-home_protection text-20  color-b-blue"></span>
                                        <h6 class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                            0</h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center align-mobile-end">
                                    <button type="button" class=" icon-share text-24 b-color-transparent color-primary"
                                        id="shareBtn">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ///////////////////////////////////////end-card//////////////////////////////////////////////////////////////////// -->

                <!-- //////////////////////////////////slick-slider////////////////////////////////////////////////////////////////// -->
                <div class="my-project_dashboar">
                    <div class="slick_list_main_text pt-30">
                        <div
                            class="slick_list_text text-18 font-weight-700 lineheight-22 text-capitalize color-primary letter-s-36">
                            All
                            Projects
                        </div>
                    </div>
                    <div class="slick-list slick-initialized slick-slider slick-dotted">
                        <button class="slick-prev slick-arrow slick-disabled" aria-label="Previous" type="button"
                            aria-disabled="true" style="">Previous
                        </button>
                        <div class="slick-list draggable">
                            <div class="slick-track" style="opacity: 1; width: 1800px; transform: translate3d(0px, 0px, 0px);">
                                <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false"
                                    tabindex="0" role="tabpanel" id="slick-slide00" aria-describedby="slick-slide-control00"
                                    style="width: 355px;">
                                    <div class="row">
                                        <div class="col-lg-12 slider-main-card">
                                            <a href="login.php" class="slider_card" target="_blank" tabindex="0">
                                                <div
                                                    class="slider-top-progress d-flex justify-content-between align-items-baseline">
                                                    <div class="slider-top-left">
                                                        <div
                                                            class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                                            Ratnadeep Complex</div>
                                                        <div
                                                            class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                                            For Sale</div>
                                                    </div>
                                                    <div class="slider-top-right in_progress">
                                                        <div class="">In-Progress</div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                                                    Є800,000</div>
                                                <div class="slider-Agent d-flex  align-items-center">
                                                    <img src="http://127.0.0.1:8000/img/my_p-card_3.svg" alt="image"
                                                        class="me-2">
                                                    <div
                                                        class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">
                                                        Project
                                                        Owner:</div>
                                                    <div
                                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                                        James Henry</div>
                                                </div>
                                                <div class="slider-Agent d-flex  align-items-center px-15">
                                                    <img src="http://127.0.0.1:8000/img/my_p-card_2.svg" alt="image"
                                                        class="me-2">
                                                    <div
                                                        class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">
                                                        Deadline:
                                                    </div>
                                                    <div
                                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                                        12/02/2024</div>
                                                </div>

                                                <div
                                                    class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                                                    Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque
                                                    neque eu
                                                    euismod
                                                    ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra.
                                                    Risus dui
                                                    fames
                                                    pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                                                </div>
                                                <div class="row px-15">
                                                    <div class="col-lg-6">
                                                        <div class="d-flex">
                                                            <img src="http://127.0.0.1:8000/img/my_p-card_1.svg"
                                                                alt="image" class="me-2">
                                                            <div class="more-image d-flex align-items-center gap-1">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                            </div>
                                                            <button
                                                                class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1"
                                                                tabindex="0">More</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="d-flex">
                                                            <i class="icon-user text-18 color-b-blue me-2"></i>
                                                            <div class="more-image d-flex align-items-center gap-1">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                            </div>
                                                            <button
                                                                class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1"
                                                                tabindex="0">More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="task-progress">
                                                    <p
                                                        class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">
                                                        10 Tasks
                                                        <span
                                                            class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                                                    </p>
                                                    <progress class="progress progress1" max="100"
                                                        value="80"></progress>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false"
                                    tabindex="0" role="tabpanel" id="slick-slide01"
                                    aria-describedby="slick-slide-control01" style="width: 355px;">
                                    <div class="row">
                                        <div class="col-lg-12 slider-main-card">
                                            <a href="login.php" class="slider_card" target="_blank" tabindex="0">
                                                <div
                                                    class="slider-top-progress d-flex justify-content-between align-items-baseline">
                                                    <div class="slider-top-left">
                                                        <div
                                                            class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                                            Ratnadeep Complex</div>
                                                        <div
                                                            class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                                            For Sale</div>
                                                    </div>
                                                    <div class="slider-top-right in_progress">
                                                        <div class="">In-Progress</div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                                                    Є800,000</div>
                                                <div class="slider-Agent d-flex  align-items-center">
                                                    <img src="http://127.0.0.1:8000/img/my_p-card_3.svg" alt="image"
                                                        class="me-2">
                                                    <div
                                                        class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">
                                                        Project
                                                        Owner:</div>
                                                    <div
                                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                                        James Henry</div>
                                                </div>
                                                <div class="slider-Agent d-flex  align-items-center px-15">
                                                    <img src="http://127.0.0.1:8000/img/my_p-card_2.svg" alt="image"
                                                        class="me-2">
                                                    <div
                                                        class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">
                                                        Deadline:
                                                    </div>
                                                    <div
                                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                                        12/02/2024</div>
                                                </div>

                                                <div
                                                    class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                                                    Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque
                                                    neque eu
                                                    euismod
                                                    ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra.
                                                    Risus dui
                                                    fames
                                                    pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                                                </div>
                                                <div class="row px-15">
                                                    <div class="col-lg-6">
                                                        <div class="d-flex">
                                                            <img src="http://127.0.0.1:8000/img/my_p-card_1.svg"
                                                                alt="image" class="me-2">
                                                            <div class="more-image d-flex align-items-center gap-1">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                            </div>
                                                            <button
                                                                class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1"
                                                                tabindex="0">More</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="d-flex">
                                                            <i class="icon-user text-18 color-b-blue me-2"></i>
                                                            <div class="more-image d-flex align-items-center gap-1">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                            </div>
                                                            <button
                                                                class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1"
                                                                tabindex="0">More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="task-progress">
                                                    <p
                                                        class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">
                                                        10 Tasks
                                                        <span
                                                            class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                                                    </p>
                                                    <progress class="progress progress1" max="100"
                                                        value="80"></progress>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false"
                                    tabindex="0" role="tabpanel" id="slick-slide02"
                                    aria-describedby="slick-slide-control02" style="width: 355px;">
                                    <div class="row">
                                        <div class="col-lg-12 slider-main-card">
                                            <a href="login.php" class="slider_card" target="_blank" tabindex="0">
                                                <div
                                                    class="slider-top-progress d-flex justify-content-between align-items-baseline">
                                                    <div class="slider-top-left">
                                                        <div
                                                            class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                                            Ratnadeep Complex</div>
                                                        <div
                                                            class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                                            For Sale</div>
                                                    </div>
                                                    <div class="slider-top-right in_progress">
                                                        <div class="">In-Progress</div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                                                    Є800,000</div>
                                                <div class="slider-Agent d-flex  align-items-center">
                                                    <img src="http://127.0.0.1:8000/img/my_p-card_3.svg" alt="image"
                                                        class="me-2">
                                                    <div
                                                        class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">
                                                        Project
                                                        Owner:</div>
                                                    <div
                                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                                        James Henry</div>
                                                </div>
                                                <div class="slider-Agent d-flex  align-items-center px-15">
                                                    <img src="http://127.0.0.1:8000/img/my_p-card_2.svg" alt="image"
                                                        class="me-2">
                                                    <div
                                                        class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">
                                                        Deadline:
                                                    </div>
                                                    <div
                                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                                        12/02/2024</div>
                                                </div>

                                                <div
                                                    class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                                                    Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque
                                                    neque eu
                                                    euismod
                                                    ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra.
                                                    Risus dui
                                                    fames
                                                    pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                                                </div>
                                                <div class="row px-15">
                                                    <div class="col-lg-6">
                                                        <div class="d-flex">
                                                            <img src="http://127.0.0.1:8000/img/my_p-card_1.svg"
                                                                alt="image" class="me-2">
                                                            <div class="more-image d-flex align-items-center gap-1">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                            </div>
                                                            <button
                                                                class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1"
                                                                tabindex="0">More</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="d-flex">
                                                            <i class="icon-user text-18 color-b-blue me-2"></i>
                                                            <div class="more-image d-flex align-items-center gap-1">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                            </div>
                                                            <button
                                                                class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1"
                                                                tabindex="0">More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="task-progress">
                                                    <p
                                                        class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">
                                                        10 Tasks
                                                        <span
                                                            class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                                                    </p>
                                                    <progress class="progress progress1" max="100"
                                                        value="80"></progress>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1"
                                    role="tabpanel" id="slick-slide03" aria-describedby="slick-slide-control03"
                                    style="width: 355px;">
                                    <div class="row">
                                        <div class="col-lg-12 slider-main-card">
                                            <a href="login.php" class="slider_card" target="_blank" tabindex="-1">
                                                <div
                                                    class="slider-top-progress d-flex justify-content-between align-items-baseline">
                                                    <div class="slider-top-left">
                                                        <div
                                                            class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                                            Ratnadeep Complex</div>
                                                        <div
                                                            class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                                            For Sale</div>
                                                    </div>
                                                    <div class="slider-top-right in_progress">
                                                        <div class="">In-Progress</div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                                                    Є800,000</div>
                                                <div class="slider-Agent d-flex  align-items-center">
                                                    <img src="http://127.0.0.1:8000/img/my_p-card_3.svg" alt="image"
                                                        class="me-2">
                                                    <div
                                                        class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">
                                                        Project
                                                        Owner:</div>
                                                    <div
                                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                                        James Henry</div>
                                                </div>
                                                <div class="slider-Agent d-flex  align-items-center px-15">
                                                    <img src="http://127.0.0.1:8000/img/my_p-card_2.svg" alt="image"
                                                        class="me-2">
                                                    <div
                                                        class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">
                                                        Deadline:
                                                    </div>
                                                    <div
                                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                                        12/02/2024</div>
                                                </div>

                                                <div
                                                    class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                                                    Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque
                                                    neque eu
                                                    euismod
                                                    ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra.
                                                    Risus dui
                                                    fames
                                                    pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                                                </div>
                                                <div class="row px-15">
                                                    <div class="col-lg-6">
                                                        <div class="d-flex">
                                                            <img src="http://127.0.0.1:8000/img/my_p-card_1.svg"
                                                                alt="image" class="me-2">
                                                            <div class="more-image d-flex align-items-center gap-1">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                            </div>
                                                            <button
                                                                class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1"
                                                                tabindex="-1">More</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="d-flex">
                                                            <i class="icon-user text-18 color-b-blue me-2"></i>
                                                            <div class="more-image d-flex align-items-center gap-1">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                            </div>
                                                            <button
                                                                class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1"
                                                                tabindex="-1">More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="task-progress">
                                                    <p
                                                        class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">
                                                        10 Tasks
                                                        <span
                                                            class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                                                    </p>
                                                    <progress class="progress progress1" max="100"
                                                        value="80"></progress>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1"
                                    role="tabpanel" id="slick-slide04" aria-describedby="slick-slide-control04"
                                    style="width: 355px;">
                                    <div class="row">
                                        <div class="col-lg-12 slider-main-card">
                                            <a href="login.php" class="slider_card" target="_blank" tabindex="-1">
                                                <div
                                                    class="slider-top-progress d-flex justify-content-between align-items-baseline">
                                                    <div class="slider-top-left">
                                                        <div
                                                            class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                                            Ratnadeep Complex</div>
                                                        <div
                                                            class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                                            For Sale</div>
                                                    </div>
                                                    <div class="slider-top-right in_progress">
                                                        <div class="">In-Progress</div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                                                    Є800,000</div>
                                                <div class="slider-Agent d-flex  align-items-center">
                                                    <img src="http://127.0.0.1:8000/img/my_p-card_3.svg" alt="image"
                                                        class="me-2">
                                                    <div
                                                        class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">
                                                        Project
                                                        Owner:</div>
                                                    <div
                                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                                        James Henry</div>
                                                </div>
                                                <div class="slider-Agent d-flex  align-items-center px-15">
                                                    <img src="http://127.0.0.1:8000/img/my_p-card_2.svg" alt="image"
                                                        class="me-2">
                                                    <div
                                                        class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">
                                                        Deadline:
                                                    </div>
                                                    <div
                                                        class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                                        12/02/2024</div>
                                                </div>

                                                <div
                                                    class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                                                    Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque
                                                    neque eu
                                                    euismod
                                                    ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra.
                                                    Risus dui
                                                    fames
                                                    pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                                                </div>
                                                <div class="row px-15">
                                                    <div class="col-lg-6">
                                                        <div class="d-flex">
                                                            <img src="http://127.0.0.1:8000/img/my_p-card_1.svg"
                                                                alt="image" class="me-2">
                                                            <div class="more-image d-flex align-items-center gap-1">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                            </div>
                                                            <button
                                                                class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1"
                                                                tabindex="-1">More</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="d-flex">
                                                            <i class="icon-user text-18 color-b-blue me-2"></i>
                                                            <div class="more-image d-flex align-items-center gap-1">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                                <img src="/img/profile_1.png" alt="image" class="">
                                                            </div>
                                                            <button
                                                                class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1"
                                                                tabindex="-1">More</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="task-progress">
                                                    <p
                                                        class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">
                                                        10 Tasks
                                                        <span
                                                            class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                                                    </p>
                                                    <progress class="progress progress1" max="100"
                                                        value="80"></progress>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="slick-next slick-arrow" aria-label="Next" type="button" style=""
                            aria-disabled="false">Next</button>
                        <ul class="slick-dots" style="" role="tablist">
                            <li class="slick-active" role="presentation"><button type="button" role="tab"
                                    id="slick-slide-control00" aria-controls="slick-slide00" aria-label="1 of 2"
                                    tabindex="0" aria-selected="true">1</button></li>
                            <li role="presentation"><button type="button" role="tab" id="slick-slide-control01"
                                    aria-controls="slick-slide01" aria-label="2 of 2" tabindex="-1">2</button></li>
                            <li role="presentation"><button type="button" role="tab" id="slick-slide-control02"
                                    aria-controls="slick-slide02" aria-label="3 of 2" tabindex="-1">3</button></li>
                        </ul>
                    </div>
                </div>
                <!-- /////////////////////////////////////end-slick-slider////////////////////////////////////////////////////////// -->

                <!-- ////////////////////////////////property-card/////////////////////////////////////////////////////////// -->
                <div class=" main-card border-r-8 p-10 mb-15 b-color-white box-shadow-one">
                    <div class="main-card_flex d-block d-sm-flex align-center gap-2">
                        <div class="main-card-left">
                            <div class="main-card-img main_card_image_one">
                                <img src="http://127.0.0.1:8000/img/default-property.jpg" alt="image">
                            </div>
                        </div>
                        <div class="row w-100 ps-1 ps-md-2 ps-lg-3">
                            <div class="col-lg-9">
                                <div class="gap-12 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                    <div class="d-flex flex-column gap-12">
                                        <div class="main-card-bottom">
                                            <h4
                                                class="property-title property-h-responsive text-18 font-weight-700 lineheight-24 text-capitalize color-b-blue">
                                                Awesome Interior Apartment
                                        </h4>
                                        </div>
                                        <div class="main-card-center-one  d-flex align-items-start gap-2 gap-md-3">
                                            <div class="d-flex gap-2 align-items-start ">
                                                <i class=" icon-location text-20 color-b-blue"></i>
                                                <h6
                                                    class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    06600 Antibes, France</h6>

                                            </div>
                                            <div class="d-flex gap-2 align-items-start justify-content-end">
                                                <i class="icon-my_profile text-20  color-b-blue "></i>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    Agent7</div>
                                            </div>
                                        </div>
                                        <div
                                            class="flex-column flex-row main-card-center-one  d-flex align-items-start gap-12">
                                            <div class="d-flex gap-2 gap-md-3">
                                                <div class="d-flex gap-2 align-items-center">
                                                    <span class="icon-bed text-20  color-b-blue"></span>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        2</div>
                                                </div>

                                                <div class="d-flex gap-2 align-items-center">
                                                    <span class="icon-bathroom text-20  color-b-blue"></span>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        2</div>
                                                </div>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <span class="icon-floor text-20  color-b-blue"></span>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        2</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2 gap-md-3">
                                                <div class="d-flex gap-2 align-items-center">
                                                    <span class=" icon-house_scale text-20  color-b-blue"></span>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        1,140.00 Sqft</div>
                                                </div>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        16989-231042123</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-block">
                                        <h6 class="property-price text-14 font-weight-700 lineheight-18 color-primary">
                                            € 144,850.00</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mt-3 mt-lg-0">
                                <div
                                    class="me-2 h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                    <button type="button"
                                        onclick="openLink('http://127.0.0.1:8000/admin/properties/view/16989-231042123', '_self')"
                                        class="text-12 font-weight-400 line-height-15 border-r-4 b-color-primary color-white-grey viewPropertyBtn"
                                        id="viewPropertyBtn">
                                        View Property
                                    </button>
                                    <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                        <button type="button"
                                            class=" icon-Frame-237 text-20 b-color-transparent color-primary" id="shareBtn">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ///////////////////////////////////////end-property-card/////////////////////////////////////////////// -->

            </div>
        </div>
        </div>

        @push('scripts')

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <script src="{{ asset('assets/js/modules/properties/property_index.js') }}"></script>


            <script>
                $(document).ready(function() {
                    $(".slick-list").slick({
                        // slidesToShow: 3,
                        // slidesToScroll: 1,
                        arrows: true,
                        dots: true,
                        infinite: false,
                        centerPadding: '60px',
                        autoplay: false,
                        responsive: [{
                                breakpoint: 1440,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                }
                            },
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1,
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 567,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }

                        ]

                    });
                    $(".prev-btn").click(function() {
                        $(".slick-list").slick("slickPrev");
                    });

                    $(".next-btn").click(function() {
                        $(".slick-list").slick("slickNext");
                    });
                    $(".prev-btn").addClass("slick-disabled");
                    $(".slick-list").on("afterChange", function() {
                        if ($(".slick-prev").hasClass("slick-disabled")) {
                            $(".prev-btn").addClass("slick-disabled");
                        } else {
                            $(".prev-btn").removeClass("slick-disabled");
                        }
                        if ($(".slick-next").hasClass("slick-disabled")) {
                            $(".next-btn").addClass("slick-disabled");
                        } else {
                            $(".next-btn").removeClass("slick-disabled");
                        }
                    });
                });
            </script>

        @endpush
    @endsection
