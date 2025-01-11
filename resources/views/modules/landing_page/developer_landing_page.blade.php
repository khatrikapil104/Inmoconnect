<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>InmoConnect: Real Estate CRM Revolutionizing Collaboration</title>
    <meta name="description"
        content="InmoConnect is your all-in-one solution for real estate CRM, offering powerful tools for property management, client collaboration, and agent efficiency. Join today and streamline your real estate business!">
    <meta name="keywords"
        content="Real estate CRM, Property management platform, Agent collaboration tool, Real estate software, Real estate, Realtors, Agent Collaboration, Property Project Management, Spanish Real Estate CRM, CRM">

    <!-- favicon -->
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/svg+xml" />
    <!-- botstrap-css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <!-- font-awesome-icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- animation -->
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <!-- google-font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <!-- slick-slider -->
    <link rel="stylesheet" href="{{ asset('assets/css/slick_slider.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom-css -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <!-- icon -->
    <link rel="stylesheet" href="{{ asset('assets/icon/style.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">


</head>

<body>

    <div id="preloader">
        <div class="wrapper" id="firstWrap">
            <div class="dot"></div>
        </div>
        <div class="wrapper" id="secondWrap">
            <div class="dot"></div>
        </div>
        <div class="wrapper" id="thirdWrap">
            <div class="dot"></div>
        </div>
        <div class="wrapper" id="fourthWrap">
            <div class="dot"></div>
        </div>
    </div>

    <div id="top">

        {{-- header --}}
        <header id="header">
            <div id="navbar">
                <nav class="navbar navbar-expand-lg navbar-light w-100 d-block">
                    <div class="landing-page-container">
                        <div class="justify-content-between header-landing d-flex flex-wrap align-items-center">
                            <div class="mobile-logo">
                                <a href="#"> <img src="{{ asset('img/landing-logo.png') }}" width="290"
                                        height="40" alt="image" class="#"
                                        style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'width:200px;' : '' }}'></a>
                            </div>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="bars"><i class="fa-solid fa-bars"></i></span>
                                <span class="cross"><i class="fa-solid fa-xmark"></i></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class=" select-language d-flex align-items-center justify-content-center">
                                    <div class="wrapper1 h-85 d-flex align-items-center">
                                        <dl id="country-select"
                                            class="dropdown languagesDropdown country_select_developer">

                                            <dt>
                                                <a href="javascript:void(0);">
                                                    <span>
                                                        {{-- <span> <img src="{{ asset('img/language-selection-box.png') }}"
                                                                alt="image" class="border-r-8 mx-2" width="20"
                                                                height="20">
                                                            </span> --}}
                                                        <span class="countryName">
                                                            <img src="{{ asset('img/en_flag.png') }}" alt="image"
                                                                class="border-r-8 mx-2">
                                                        </span>

                                                    </span>
                                                </a>
                                            </dt>
                                            <dd>
                                                <ul style="display: none;" class="flag-dropdown">
                                                    <li>
                                                        <a href="{{ route('user.setLocale', 'en') }}">
                                                            <span>
                                                                <img src="{{ asset('img/en_flag.png') }}"
                                                                    alt="image" class="border-r-8 mx-2">
                                                            </span>
                                                            <span
                                                                class="text-18 color-black font-weight-400 lineheight-24 ms-2 countryName">English</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('user.setLocale', 'es') }}">
                                                            <span>
                                                                <img src="{{ asset('img/es_flag.png') }}"
                                                                    alt="image" class="border-r-8 mx-2">
                                                            </span>
                                                            <span
                                                                class="text-18 color-black font-weight-400 lineheight-24 ms-2 countryName">Español</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                                <ul class="navbar-nav navbar-right mb-lg-0">

                                    <li class="nav-item">
                                        <a class="nav-link" href="#home"
                                            title="{{ trans('messages.landing_page.Home') }}"
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#how_work"
                                            title="{{ trans('messages.landing_page.How_it_works') }}"
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>How
                                            it works</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#key-feature"
                                            title="{{ trans('messages.landing_page.Key_features') }}"
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>Key
                                            Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#demo_introduction"
                                            title="{{ trans('messages.landing_page.Demo_Introduction') }}"
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>Demo
                                            Introduction</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#faq_section"
                                            title="{{ trans('messages.landing_page.FAQ') }}"
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>FAQ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#footer"
                                            title="{{ trans('messages.landing_page.Contact_Us') }}"
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>Contact
                                            Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#footer"
                                            title="{{ trans('messages.landing_page.Contact_Us') }}"
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>Developers</a>
                                    </li>
                                    <li class="nav-item header-button">
                                        <a href="#join_us" class="nav-link common-button"
                                            title="{{ trans('messages.landing_page.Join_Now') }}"
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;' : '' }}'>Join
                                            Now!</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

            </div>
        </header>
        {{-- end-header --}}



        {{-- banner-section --}}
        <section class="section banner_section-developer" id="home" data-aos="fade-down"
            data-aos-duration="1000">
            <div class="developer_s_img-one position-relative">
                <img src="{{ asset('img/banner-develop_two.png') }}" alt="image" class="#">
            </div>
            <div class="landing-page-container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="developer_section-text">
                            <h2>{{ trans('messages.developer_page.Banner_text_one') }}</h2>
                            <h4>{{ trans('messages.developer_page.Banner_text_two') }}</h4>
                            <div class="banner-button_developer">
                                <a href="#">{{ trans('messages.developer_page.Banner_button') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-developer-slider position-relative">
                            <span class="redius-shape-slider_one"></span>
                            <span class="redius-shape-slider_two"></span>
                            <div class="slider_developer">
                                <div>
                                    <img src="{{ asset('img/banner_slide-d-one.png') }}" alt="image"
                                        class="#">
                                </div>
                                <div>
                                    <img src="{{ asset('img/banner_slide-d-two.png') }}" alt="image"
                                        class="#">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="developer_s_img-two position-relative">
                    <img src="{{ asset('img/banner-develop_one.png') }}" alt="image" class="#">
                </div>
            </div>
        </section>
        {{-- end-banner-section --}}

        {{-- Key Features of Developer Account --}}
        <section class="section common-l-section " id="key-feature">
            <div class="landing-page-container" data-aos="fade-down" data-aos-duration="1000">
                <div class="row">
                    <div class="col-12">
                        <div class="key-feature-m-text key-d-feature text-center">
                            <h2 class="color-primary position-relative d-inline">
                                {{ trans('messages.developer_page.key_header_d_one') }}</h2>
                            <h5 class="color-black mt-20">{{ trans('messages.developer_page.key_header_d_two') }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-6 mt-20">
                        <div class="key-s-card key_developer key_developer_gradiant text-start" data-aos="fade-down"
                            data-aos-duration="500" data-aos-delay="200">
                            <div class="key-s-card-imgs mb-3 mb-sm-5">
                                <img src="{{ asset('img/key-developer_one.png') }}" alt="image" class="#"
                                    width="60" height="60">
                            </div>
                            <h5 class="key-s-texts color-black pb-1 pb-sm-2">
                                {{ trans('messages.developer_page.key_feature_b_one') }}</h5>
                            <p class=" color-black mt-1">
                                {{ trans('messages.developer_page.key_feature_s_one') }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-20">
                        <div class="key-s-card key_developer text-start" data-aos="fade-down" data-aos-duration="500"
                            data-aos-delay="200">
                            <div class="key-s-card-imgs mb-3 mb-sm-5">
                                <img src="{{ asset('img/key-developer_two.png') }}" alt="image" class="#"
                                    width="60" height="60">
                            </div>
                            <h5 class="key-s-texts color-black pb-1 pb-sm-2">
                                {{ trans('messages.developer_page.key_feature_b_two') }}</h5>
                            <p class=" color-b-blue mt-1">
                                {{ trans('messages.developer_page.key_feature_s_two') }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-20">
                        <div class="key-s-card key_developer text-start" data-aos="fade-down" data-aos-duration="500"
                            data-aos-delay="200">
                            <div class="key-s-card-imgs mb-3 mb-sm-5">
                                <img src="{{ asset('img/key-developer_three.png') }}" alt="image" class="#"
                                    width="60" height="60">
                            </div>
                            <h5 class="key-s-texts color-black pb-1 pb-sm-2">
                                {{ trans('messages.developer_page.key_feature_b_three') }}</h5>
                            <p class=" color-b-blue mt-1">
                                {{ trans('messages.developer_page.key_feature_s_three') }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-20">
                        <div class="key-s-card key_developer text-start" data-aos="fade-down" data-aos-duration="500"
                            data-aos-delay="200">
                            <div class="key-s-card-imgs mb-3 mb-sm-5">
                                <img src="{{ asset('img/key-developer_four.png') }}" alt="image" class="#"
                                    width="60" height="60">
                            </div>
                            <h5 class="key-s-texts color-black pb-1 pb-sm-2">
                                {{ trans('messages.developer_page.key_feature_b_four') }}</h5>
                            <p class=" color-b-blue mt-1">
                                {{ trans('messages.developer_page.key_feature_s_four') }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-20">
                        <div class="key-s-card key_developer text-start" data-aos="fade-down" data-aos-duration="500"
                            data-aos-delay="200">
                            <div class="key-s-card-imgs mb-3 mb-sm-5">
                                <img src="{{ asset('img/key-developer_five.png') }}" alt="image" class="#"
                                    width="60" height="60">
                            </div>
                            <h5 class="key-s-texts color-black pb-1 pb-sm-2">
                                {{ trans('messages.developer_page.key_feature_b_five') }}</h5>
                            <p class=" color-b-blue mt-1">
                                {{ trans('messages.developer_page.key_feature_s_five') }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-20">
                        <div class="key-s-card key_developer text-start" data-aos="fade-down" data-aos-duration="500"
                            data-aos-delay="200">
                            <div class="key-s-card-imgs mb-3 mb-sm-5">
                                <img src="{{ asset('img/key-developer_six.png') }}" alt="image" class="#"
                                    width="60" height="60">
                            </div>
                            <h5 class="key-s-texts color-black pb-1 pb-sm-2">
                                {{ trans('messages.developer_page.key_feature_b_six') }}
                            </h5>
                            <p class=" color-b-blue mt-1">
                                {{ trans('messages.developer_page.key_feature_s_six') }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-20">
                        <div class="key-s-card key_developer text-start" data-aos="fade-down" data-aos-duration="500"
                            data-aos-delay="200">
                            <div class="key-s-card-imgs mb-3 mb-sm-5">
                                <img src="{{ asset('img/key-developer_seven.png') }}" alt="image" class="#"
                                    width="60" height="60">
                            </div>
                            <h5 class="key-s-texts color-black pb-1 pb-sm-2">
                                {{ trans('messages.developer_page.key_feature_b_seven') }}</h5>
                            <p class=" color-b-blue mt-1">
                                {{ trans('messages.developer_page.key_feature_s_seven') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end-Key Features of Developer Account --}}

        {{-- video --}}
        <section class="section common-l-section video_section" id="key-feature">
            <div class="landing-page-container" data-aos="fade-down" data-aos-duration="1000">
                <div class="row">
                    <div class="col-12">
                        <div class="key-feature-m-text key-d-feature text-center">
                            <h2 class="color-primary position-relative d-inline">
                                Developer’s Account Video </h2>
                            <h5 class="color-black mt-20">How to start my Developer’s Account in inmoconnect?
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="video_open position-relative">
                            <div class="waves-block">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </div>
                            <img src="{{ asset('img/video_two.png') }}" alt="image" class="#">
                            <a data-fancybox data-small-btn="true"
                                href="https://www.youtube.com/embed/jaIvYjOCdqA?si=d7H3j773KKqZDxNG">
                                <img class="fancy_box-img" src="{{ asset('img/button_fancy.png') }}"
                                    alt="image" />
                            </a>
                        </div>
                    </div>
                </div>
        </section>
        {{-- end-video --}}

        {{-- What Features in Developer’s Account? --}}
        <section class="section  common-l-section " id="colorContainer">
            <div class="landing-page-container" data-aos="fade-down" data-aos-duration="1000">

                <div class="row">
                    <div class="col-12">
                        <div class="key-feature-m-text key-d-feature text-center">
                            <h2 class="color-primary position-relative d-inline">
                                {{ trans('messages.developer_page.developer_a_one') }} </h2>
                            <h5 class="color-black mt-20 mb-30">
                                {{ trans('messages.developer_page.developer_a_two') }}
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <div class="tab-w-accordian">
                            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                                <li class="nav-item ps-0 d-flex align-items-center">
                                    <a class="nav-link_developer active" id="tab1-tab" data-toggle="tab"
                                        href="#tab1" role="tab">
                                        <img src="{{ asset('img/tab-accordian_one.svg') }}" alt="image"
                                            class="#" width="32" height="32">
                                        <span>{{ trans('messages.developer_page.developer_a_three') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item ps-0 d-flex align-items-center">
                                    <a class="nav-link_developer" id="tab2-tab" data-toggle="tab" href="#tab2"
                                        role="tab">
                                        <img src="{{ asset('img/tab-accordian_two.svg') }}" alt="image"
                                            class="#" width="32" height="32">
                                        <span>{{ trans('messages.developer_page.developer_a_four') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item ps-0 d-flex align-items-center">
                                    <a class="nav-link_developer" id="tab3-tab" data-toggle="tab" href="#tab3"
                                        role="tab">
                                        <img src="{{ asset('img/tab-accordian_three.svg') }}" alt="image"
                                            class="#" width="32" height="32">
                                        <span>{{ trans('messages.developer_page.developer_a_five') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item ps-0 d-flex align-items-center">
                                    <a class="nav-link_developer" id="tab4-tab" data-toggle="tab" href="#tab4"
                                        role="tab">
                                        <img src="{{ asset('img/tab-accordian_four.svg') }}" alt="image"
                                            class="#" width="32" height="32">
                                        <span>{{ trans('messages.developer_page.developer_a_six') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item ps-0 d-flex align-items-center">
                                    <a class="nav-link_developer" id="tab5-tab" data-toggle="tab" href="#tab5"
                                        role="tab">
                                        <img src="{{ asset('img/tab-accordian_five.svg') }}" alt="image"
                                            class="#" width="32" height="32">
                                        <span>{{ trans('messages.developer_page.developer_a_seven') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item ps-0 d-flex align-items-center">
                                    <a class="nav-link_developer" id="tab6-tab" data-toggle="tab" href="#tab6"
                                        role="tab">
                                        <img src="{{ asset('img/tab-accordian_six.svg') }}" alt="image"
                                            class="#" width="32" height="32">
                                        <span>{{ trans('messages.developer_page.developer_a_eight') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>



                    <div class="col-md-8 col-lg-8">
                        <div class="tab_accordian_content">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                    <img src="{{ asset('img/tab_a_one.png') }}" alt="image" class="#">
                                    <h5>{{ trans('messages.developer_page.developer_a_s_one') }}</h5>
                                </div>
                                <div class="tab-pane fade" id="tab2" role="tabpanel">
                                    <img src="{{ asset('img/tab_a_two.png') }}" alt="image" class="#">
                                    <h5>{{ trans('messages.developer_page.developer_a_s_two') }}</h5>
                                </div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel">
                                    <img src="{{ asset('img/tab_a_three.png') }}" alt="image" class="#">
                                    <h5>{{ trans('messages.developer_page.developer_a_s_three') }}</h5>
                                </div>
                                <div class="tab-pane fade" id="tab4" role="tabpanel">
                                    <img src="{{ asset('img/tab_a_four.png') }}" alt="image" class="#">
                                    <h5>{{ trans('messages.developer_page.developer_a_s_four') }}</h5>
                                </div>
                                <div class="tab-pane fade" id="tab5" role="tabpanel">
                                    <img src="{{ asset('img/tab_a_five.png') }}" alt="image" class="#">
                                    <h5>{{ trans('messages.developer_page.developer_a_s_five') }}</h5>
                                </div>
                                <div class="tab-pane fade" id="tab6" role="tabpanel">
                                    <img src="{{ asset('img/tab_a_six.png') }}" alt="image" class="#">
                                    <h5>{{ trans('messages.developer_page.developer_a_s_six') }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Accordion (for responsive view) -->
                <div class="accordian_responsive">
                    <div class="accordion d-md-none" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <img src="{{ asset('img/tab-accordian_one.svg') }}" alt="image"
                                        class="#" width="32" height="32">
                                    <span>Modern Dashboard</span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <img src="{{ asset('img/tab_a_one.png') }}" alt="image" class="#">
                                    <h5>Agents embark on their InmoConnect journey by signing up on our user-friendly
                                        platform</h5>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <img src="{{ asset('img/tab-accordian_two.svg') }}" alt="image"
                                        class="#" width="32" height="32">
                                    <span>Development</span>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <img src="{{ asset('img/tab_a_two.png') }}" alt="image" class="#">
                                    <h5>Agents effortlessly integrate their property portfolio using XML feeds, ensuring
                                        real-time updates.</h5>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    <img src="{{ asset('img/tab-accordian_three.svg') }}" alt="image"
                                        class="#" width="32" height="32">
                                    <span>Agent</span>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <img src="{{ asset('img/tab_a_three.png') }}" alt="image" class="#">
                                    <h5>Empower collaboration by creating teams, connecting with customers, and sharing
                                        properties seamlessly.</h5>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    <img src="{{ asset('img/tab-accordian_four.svg') }}" alt="image"
                                        class="#" width="32" height="32">
                                    <span>In-built Chat System</span>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <img src="{{ asset('img/tab_a_four.png') }}" alt="image" class="#">
                                    <h5>Efficiently manage tasks, projects, and workflows with our integrated Project
                                        Management Module.</h5>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    <img src="{{ asset('img/tab-accordian_five.svg') }}" alt="image"
                                        class="#" width="32" height="32">
                                    <span>Project Management</span>
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <img src="{{ asset('img/tab_a_five.png') }}" alt="image" class="#">
                                    <h5>Facilitate real-time communication within your team and with clients through our
                                        intuitive Chat System.</h5>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <img src="{{ asset('img/tab-accordian_six.svg') }}" alt="image"
                                        class="#" width="32" height="32">
                                    <span>Event Schedule</span>
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <img src="{{ asset('img/tab_a_six.png') }}" alt="image" class="#">
                                    <h5>Facilitate real-time communication within your team and with clients through our
                                        intuitive Chat System.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        {{-- end-What Features in Developer’s Account? --}}

        {{-- What Features in Developer’s Account? --}}
        <section class="section common-l-section form-section " id="join_us" data-aos="fade-down"
            data-aos-duration="1000">
            <div class="landing-page-container" data-aos="fade-down" data-aos-duration="1000">
                <div class="row pb-4">
                    <div class="col-12">
                        <div class="key-feature-m-text text-center faq-section-text">
                            <h2 class="color-primary position-relative d-inline ">
                                {{ trans('messages.developer_page.d_choose_one') }}</h2>
                            <h5 class="color-b-blue mt-20"> {{ trans('messages.developer_page.d_choose_two') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-5 position-relative" data-aos="fade-left" data-aos-duration="2000"
                        data-aos-delay="500">
                        <img src="{{ asset('img/developer_a_one.png') }}" alt="image" class="#">
                        <span class="redius-shape-developer"></span>
                    </div>
                    <div class="col-md-6 col-lg-6 landing-form-responsive" data-aos="fade-right"
                        data-aos-duration="2000" data-aos-delay="500">
                        <div class="form-left">
                            <h2 class="color-primary mb-30">{{ trans('messages.developer_page.d_choose_three') }}

                            </h2>
                            <p>{{ trans('messages.developer_page.d_choose_four') }}</p>
                            <ul class="form-l-listing">

                                <li>{{ trans('messages.developer_page.d_choose_five') }}</li>
                                <li>{{ trans('messages.developer_page.d_choose_six') }}</li>
                                <li>{{ trans('messages.developer_page.d_choose_seven') }}</li>
                                <li>{{ trans('messages.developer_page.d_choose_eight') }}</li>
                                <li>{{ trans('messages.developer_page.d_choose_nine') }}</li>
                                <li>{{ trans('messages.developer_page.d_choose_ten') }}</li>
                                <li>{{ trans('messages.developer_page.d_choose_eleven') }}</li>
                                <li>{{ trans('messages.developer_page.d_choose_twelve') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- What Features in Developer’s Account? --}}

        {{-- Why I Join Inmoconnect Developer’s Account? --}}
        <section class="section common-l-section developer_account " id="join_us" data-aos="fade-down"
            data-aos-duration="1000">
            <div class="landing-page-container" data-aos="fade-down" data-aos-duration="1000">
                <div class="row mb-30">
                    <div class="col-12">
                        <div class="key-feature-m-text text-center faq-section-text">
                            <h2 class="color-primary position-relative d-inline ">
                                {{ trans('messages.developer_page.join_d_one') }}</h2>
                            <h5 class="color-b-blue mt-20">{{ trans('messages.developer_page.join_d_two') }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row align-items-start">
                    <div class="col-md-6 col-lg-6 landing-form-responsive" data-aos="fade-right"
                        data-aos-duration="2000" data-aos-delay="500">
                        <div class="form-left">
                            <h2 class="color-primary mb-30">{{ trans('messages.developer_page.join_d_three') }}
                            </h2>
                            <p>{{ trans('messages.developer_page.join_d_four') }}</p>
                            <ul class="form-l-listing">
                                <li>{{ trans('messages.developer_page.join_d_five') }}</li>
                                <li>{{ trans('messages.developer_page.join_d_six') }}</li>
                                <li>{{ trans('messages.developer_page.join_d_seven') }}</li>
                                <li>{{ trans('messages.developer_page.join_d_eight') }}</li>
                                <li>{{ trans('messages.developer_page.join_d_nine') }}</li>
                                <li>{{ trans('messages.developer_page.join_d_ten') }}</li>
                                <li>{{ trans('messages.developer_page.join_d_eleven') }}</li>
                                <li>{{ trans('messages.developer_page.join_d_twelve') }}</li>
                            </ul>
                            <div class="form-m-text pt-15">
                                <div class="background_form background_form_developer">
                                    <h4>Join the InmoConnect Beta Version Queue Now!</h4>
                                    <div class="form-main-bg">
                                        Coming Soon!<span> <img src="https://www.inmoconnect.com/img/plane_form.svg"
                                                alt="image" class="#" width="33" height="47"></span>
                                    </div>
                                </div>
                                <p class="color-b-blue">Invest in the future of real estate technology. Contact us
                                    today to explore partnership opportunitiesand be a part of the InmoConnect journey.
                                </p>
                                <a href="mailto:business@inmoconnect.com"
                                    class="color-primary text-16 d-flex align-items-center">
                                    <i class="icon-Mail text-20 "></i>
                                    business@inmoconnect.com
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-0 col-lg-1" data-aos="fade-left" data-aos-duration="2000" data-aos-delay="500">
                    </div> --}}
                    <div class="col-md-6 col-lg-6" data-aos="fade-left" data-aos-duration="2000"
                        data-aos-delay="500">
                        <div class="form-right developer_form-right">
                            <form id="claimYourSpotFormId" method="post">
                                <div class="form-group mt-3 position-relative">
                                    <label for="name"
                                        class="">{{ trans('messages.developer_page.join_form_one') }}<span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control " name="name" id="name"
                                        value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                                <div class="form-group mt-3 position-relative">
                                    <label for="email"
                                        class="">{{ trans('messages.developer_page.join_form_two') }} <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control " name="email" id="email"
                                        value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>

                                <div class="form-group mt-3 position-relative">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'phone',
                                        'hasLabel' => true,
                                        'label' => trans('messages.developer_page.join_form_four'),
                                        'id' => 'phone',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'help' => 'Please enter your name',
                                        'isRequired' => true,
                                        'isInputMask' => true,
                                        'maskPattern' => '+(9{1,2}) (999 999 999)',
                                        'value' => '',
                                    ]" />
                                </div>

                                <div class="form-group mt-3 position-relative">
                                    <label for="position"
                                        class="">{{ trans('messages.developer_page.join_form_three') }}<span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control " name="company_name" id="position"
                                        value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                                <div class="d-flex align-items-center mt-3 position-relative gap-3">
                                    <label for="developer_h_label" class="text-14 font-weight-400 color-b-blue">Select Your Country:</label>
                                    <div class="d-flex align-items-center gap-3">
                                        <p class="d-flex align-items-center gap-2 developer_landing">
                                            <input type="radio" id="test1" name="radio-group">
                                            <label for="test1" class="text-14 font-weight-400 color-b-blue">Spain</label>
                                        </p>
                                        <p class="d-flex align-items-center gap-2 developer_landing">
                                            <input type="radio" id="test2" name="radio-group">
                                            <label for="test2" class="text-14 font-weight-400 color-b-blue">Dubai</label>
                                        </p>
                                    </div>
                                </div>
                                {{-- <div class="custom-select">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css add_event">
                                        <x-forms.crm-single-select :fieldData="[
                                            'name' => 'country',
                                            'hasLabel' => false,
                                            'label' => 'Select Your Country',
                                            'id' => 'country_id',
                                            'options' => $countries,
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'placeholder' => 'Select Your Country',
                                            'isRequired' => true,
                                        ]" />
                                    </div>
                                </div> --}}

                                <div class="checkbox_text">
                                    <label for="checkbox">
                                        <input id="checkbox" type="checkbox" name="terms_conditions">
                                        <span class="label-text"></span>
                                    </label>
                                    <p class="checkbox-small-text">
                                        {{ trans('messages.landing_page.form_checkbox_text') }}</p>
                                </div>
                                <div class="invalid-feedback fw-bold"></div>
                                <div class="g-recaptcha mt-4" data-sitekey={{ config('services.recaptcha.key') }}>
                                </div>
                                <!-- <div class="captcha">
                                <div class="spinner">
                                    <label>
                                        <input type="checkbox" onclick="$(this).attr('disabled','disabled');">
                                        <span class="checkmark"><span>&nbsp;</span></span>
                                    </label>
                                    <div class="text">
                                    {{ trans('messages.landing_page.form_checkbox_small_text') }}
                                    </div>
                                </div>

                                <div class="logo">
                                    <img src="{{ asset('img/form-1.png') }}" alt="image" class="#">
                                </div>
                            </div> -->
                                <div class="submit_button">
                                    <div class="invalid-feedback fw-bold error claimYourSpotMsgErr"></div>
                                    <div class="valid-feedback fw-bold success claimYourSpotMsgSuccess"></div>
                                    <button type="submit" class="submit_button claimYourSpotBtnId" id="submit-button"
                                        data-val="agent">
                                        {{ trans('messages.developer_page.join_form_button') }}
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end-Why I Join Inmoconnect Developer’s Account? --}}

        {{-- faq-section --}}
        <section class="section faq_section common-l-section " id="faq_section">
            <div class="landing-page-container" data-aos="fade-down" data-aos-duration="1000">
                <div class="row">
                    <div class="col-12">
                        <div class="key-feature-m-text text-center faq-section-text">
                            <h2 class="color-primary position-relative d-inline text-uppercase">
                                {{ trans('messages.landing_page.Faqs_main') }}</h2>
                            <h5 class="color-b-blue mt-20">{{ trans('messages.landing_page.Faqs_small_text') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 responsive_oder-faq">
                        <div class="accordian-header-text">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000"
                                    data-aos-delay="100">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            {{ trans('messages.landing_page.Faqs_button_1') }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            {{ trans('messages.landing_page.Faqs_button_text_1') }}</div>
                                    </div>
                                </div>
                                <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000"
                                    data-aos-delay="150">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            {{ trans('messages.landing_page.Faqs_button_2') }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            {{ trans('messages.landing_page.Faqs_button_text_2') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000"
                                    data-aos-delay="200">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            {{ trans('messages.landing_page.Faqs_button_3') }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            {{ trans('messages.landing_page.Faqs_button_text_3') }}</div>
                                    </div>
                                </div>
                                <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000"
                                    data-aos-delay="250">
                                    <h2 class="accordion-header" id="flush-headingfour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapsefour"
                                            aria-expanded="false" aria-controls="flush-collapsefour">
                                            {{ trans('messages.landing_page.Faqs_button_4') }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapsefour" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            {{ trans('messages.landing_page.Faqs_button_text_4') }}</div>
                                    </div>
                                </div>
                                <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000"
                                    data-aos-delay="300">
                                    <h2 class="accordion-header" id="flush-headingfive">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapsefive"
                                            aria-expanded="false" aria-controls="flush-collapsefive">
                                            {{ trans('messages.landing_page.Faqs_button_5') }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapsefive" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingfive" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            {{ trans('messages.landing_page.Faqs_button_text_5') }}</div>
                                    </div>
                                </div>
                                <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000"
                                    data-aos-delay="350">
                                    <h2 class="accordion-header" id="flush-headingsix">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapsesix"
                                            aria-expanded="false" aria-controls="flush-collapsesix">
                                            {{ trans('messages.landing_page.Faqs_button_6') }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapsesix" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingsix" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            {{ trans('messages.landing_page.Faqs_button_text_6') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="faq-img text-center text-lg-end position-relative">
                            <img src="{{ asset('img/faq_developer.png') }}" alt="image" class="#">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end-faq-section --}}

        {{-- footer --}}
        <footer class="section footer" id="footer">
            <div class="landing-page-container position-relative">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="footer-logo-social">
                                <div class="footer-logo">
                                    <img src="{{ asset('img/footer-1.png') }}" alt="image" class="#"
                                        width="363" height="50">
                                </div>
                                <h5 class="social_text">{{ trans('messages.landing_page.Footer_follow_us') }}</h5>
                                <div class="social-icon">
                                    <a href="https://www.instagram.com/inmoconnectcrm/" target="_blank"
                                        aria-label="instagram "><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.linkedin.com/company/inmoconnect" target="_blank"
                                        aria-label="linkedin"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="https://twitter.com/inmoconnect" target="_blank"><i
                                            class="fa-brands fa-x-twitter" aria-label="twitter"></i></a>
                                    <a href="https://www.facebook.com/inmoconnectcrm" target="_blank"><i
                                            class="fa-brands fa-facebook-f" aria-label="facebook"></i></a>
                                    <a href="https://www.youtube.com/@InmoConnectcrm" target="_blank"><i
                                            class="fa-brands fa-youtube" aria-label="youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="footer-contact">
                                <h5>{{ trans('messages.landing_page.Footer_contact_info') }}</h5>
                                <div class="contant-s-info d-flex">
                                    <div class="contact-icon">
                                        <i class=" icon-Mail"></i>
                                    </div>
                                    <div class="contant-text">
                                        <p>{{ trans('messages.landing_page.Footer_Email_us') }}</p>
                                        <a href="mailto:business@inmoconnect.com"
                                            class="line_hover">business@inmoconnect.com</a>
                                    </div>
                                </div>
                                <div class="contant-s-info d-flex">
                                    <div class="contact-icon">
                                        <i class=" icon-location"></i>
                                    </div>
                                    <div class="contant-text">
                                        <p>{{ trans('messages.landing_page.Footer_Address') }}</p>
                                        <a href="#">{{ trans('messages.landing_page.Footer_Address_one') }}<br>
                                            {{ trans('messages.landing_page.Footer_Address_two') }}<br>
                                            {{ trans('messages.landing_page.Footer_Address_three') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <form id="subscribeNewsletterForm">
                                <div class="footer-email">
                                    <p> {{ trans('messages.landing_page.Footer_Email_text_one') }}<br>
                                        {{ trans('messages.landing_page.Footer_Email_text_two') }}</P>
                                    <div class="footer-email_button">
                                        <input type="text" name="newsletter_email"
                                            placeholder="{{ trans('messages.landing_page.Footer_Email_placeholder') }}">
                                        <button type="submit"
                                            class="subscribeNewsletterBtn">{{ trans('messages.landing_page.Footer_Email_button') }}</button>
                                    </div>
                                    <div class="invalid-feedback fw-bold error subscribeNewsletterMsgErr"></div>
                                    <div class="valid-feedback fw-bold success subscribeNewsletterMsgSuccess"></div>
                                    <div class="footer-ellipse">
                                        <img src="{{ asset('img/footer-2.png') }}" alt="image" class="#"
                                            width="176" height="192">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom d-flex flex-column align-items-center justify-content-center">
                    <p class="coptyright text-14 lineheight-22 font-weight-700 color-white">
                        {{ trans('messages.landing_page.Footer_copyright') }}</p>
                    <ul class="policy-list">
                        <li><a href="terms-condition" class="line_hover">
                                {{ trans('messages.landing_page.Footer_terms') }}</a></li>

                        <li><a href="privacy-policy" target="_blank" class="line_hover">
                                {{ trans('messages.landing_page.Footer_privacy') }}</a></li>
                    </ul>
                    <a href="https://techalmas.com/" target="_blank" aria-label="techalmas"
                        class="website_p color-white">
                        {{ trans('messages.landing_page.Footer_Powered') }}
                        <span class="line_hover_one"></span>
                        {{ trans('messages.landing_page.Footer_Techalmas') }}</a>
                </div>
            </div>
            <a href="#top" class="footer-top-logo" aria-label="footer">
                <i class="fa-solid fa-arrow-up"></i>
            </a>
        </footer>
        {{-- end-footer --}}

    </div>

    <script>
        var routeUrlClaimYourSpotDeveloper = "{{ route('store.developers') }}";
    </script>
    <!-- bootstrap-js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <!-- animation-js -->
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <!-- slider-js -->
    <script src="{{ asset('assets/js/migrate.js') }}"></script>
    <script src="{{ asset('assets/js/slick_slider.js') }}"></script>

    <script src="{{ asset('assets/js/ajax_request.js') }}" defer></script>
    <script src="{{ asset('assets/js/landing_custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>

    <script></script>

    <script>
        $('.slider_developer').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.getElementById("colorContainer");

            // Check if the container exists
            if (!container) {
                console.error("Container with ID 'colorContainer' not found");
                return;
            }

            // Function to change container background color
            function changeColor(color) {
                container.style.backgroundColor = color;
            }

            // Function to set initial color based on active tab
            function setInitialColor() {
                const activeTab = document.querySelector('.nav-link_developer.active');
                if (activeTab) {
                    if (activeTab.id === "tab1-tab") {
                        changeColor("#F4F1FF");
                    } else if (activeTab.id === "tab2-tab") {
                        changeColor("#DCEDEC");
                    } else if (activeTab.id === "tab3-tab") {
                        changeColor("#F4EEF6");
                    } else if (activeTab.id === "tab4-tab") {
                        changeColor("#E5F1E3");
                    } else if (activeTab.id === "tab5-tab") {
                        changeColor("#E0EBF0");
                    } else if (activeTab.id === "tab6-tab") {
                        changeColor("#EFEDE8");
                    }


                }
            }

            // Set initial color when the page loads (for the first active tab)
            setInitialColor();

            // Add event listeners to tabs
            document.querySelectorAll('.nav-link_developer').forEach(tab => {
                tab.addEventListener("click", function(event) {
                    event.preventDefault(); // Prevent page scroll
                    const targetTab = this.getAttribute('href'); // Get tab content href
                    const tabContent = document.querySelector(
                        targetTab); // Find tab content section

                    // Activate the correct tab and content section
                    document.querySelectorAll('.nav-link_developer').forEach(link => link.classList
                        .remove('active'));
                    document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove(
                        'show', 'active'));

                    this.classList.add('active');
                    tabContent.classList.add('show', 'active');

                    // Change color based on tab clicked
                    if (this.id === "tab1-tab") {
                        changeColor("#F4F1FF");
                    } else if (this.id === "tab2-tab") {
                        changeColor("#DCEDEC");
                    } else if (this.id === "tab3-tab") {
                        changeColor("#F4EEF6");
                    } else if (this.id === "tab4-tab") {
                        changeColor("#E5F1E3");
                    } else if (this.id === "tab5-tab") {
                        changeColor("#E0EBF0");
                    } else if (this.id === "tab6-tab") {
                        changeColor("#EFEDE8");
                    }
                });
            });

            // Add event listeners to accordion buttons for mobile view
            document.querySelectorAll('.accordion-button').forEach(button => {
                button.addEventListener("click", function() {
                    if (this.getAttribute('aria-controls') === "collapseOne") {
                        changeColor("#F4F1FF");
                    } else if (this.getAttribute('aria-controls') === "collapseTwo") {
                        changeColor("#DCEDEC");
                    } else if (this.getAttribute('aria-controls') === "collapseThree") {
                        changeColor("#F4EEF6");
                    } else if (this.getAttribute('aria-controls') === "collapseFour") {
                        changeColor("#E5F1E3");
                    } else if (this.getAttribute('aria-controls') === "collapseFive") {
                        changeColor("#E0EBF0");
                    } else if (this.getAttribute('aria-controls') === "collapseSix") {
                        changeColor("#EFEDE8");
                    }
                });
            });
        });
    </script>

    @stack('scripts')


</body>

</html>
