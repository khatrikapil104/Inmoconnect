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
    <!-- custom-css -->
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <!-- icon -->
    <link rel="stylesheet" href="{{ asset('assets/icon/style.css') }}">
    <!-- <style>
        .youtube-facade {
  position: relative;
  cursor: pointer;
}
.play-button {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);

}

    </style> -->


</head>

<body>

    @php
        $languages = getLanguages();
        $currentLocale = session()->has('locale') ? session()->get('locale') : config('app.locale');

        $defaultLanguage = $languages->firstWhere('lang_code', $currentLocale) ?: $languages->first();
    @endphp

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

        <!-- header -->
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
                                <div class=" select-language d-flex align-items-center">
                                    <div class="wrapper1 h-85 d-flex align-items-center">
                                        <dl id="country-select" class="dropdown languagesDropdown">

                                            <dt>
                                                <a href="javascript:void(0);">
                                                    <span>
                                                        <!-- <span><img src="https://staging.inmoconnect.brisktechalmas.com/img/en_flag.png" alt="image" class="border-r-8 mx-2"></span> -->
                                                        <span> <img src="{{ asset('img/language-selection-box.png') }}"
                                                                alt="image" class="border-r-8 mx-2" width="20"
                                                                height="20"></span>
                                                        <span class="countryName">{{ $defaultLanguage->title }}</span>

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
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>{{ trans('messages.landing_page.Home') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#how_work"
                                            title="{{ trans('messages.landing_page.How_it_works') }}"
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>{{ trans('messages.landing_page.How_it_works') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#key-feature"
                                            title="{{ trans('messages.landing_page.Key_features') }}"
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>{{ trans('messages.landing_page.Key_features') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#demo_introduction"
                                            title="{{ trans('messages.landing_page.Demo_Introduction') }}"
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>{{ trans('messages.landing_page.Demo_Introduction') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#faq_section"
                                            title="{{ trans('messages.landing_page.FAQ') }}"
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>{{ trans('messages.landing_page.FAQ') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#footer"
                                            title="{{ trans('messages.landing_page.Contact_Us') }}"
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>{{ trans('messages.landing_page.Contact_Us') }}</a>
                                    </li>
                                    <li class="nav-item header-button">
                                        <a href="#join_us" class="nav-link common-button"
                                            title="{{ trans('messages.landing_page.Join_Now') }}"
                                            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'font-size:13px!important;' : '' }}'>{{ trans('messages.landing_page.Join_Now') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

            </div>
        </header>
        <!-- end-header -->

        <!-- banner-section -->
        <section class="section banner-section" id="home" data-aos="fade-down" data-aos-duration="1000"
            style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'padding:109px 0 80px 0!important;' : '' }}'>
            <div class="landing-page-container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 pe-md-0 responsive_banner" data-aos="fade-right"
                        data-aos-duration="2000" data-aos-delay="500">
                        <div class="banner-header-text">
                            <h2 class="color-white">{{ trans('messages.landing_page.Banner_text_one') }} <br>
                                {{ trans('messages.landing_page.Banner_text_two') }}
                                <span class="position-relative"> <span class="position-relative">
                                        {{ trans('messages.landing_page.Banner_text_span') }}</span>
                                    <div class="banner-section-img_three">
                                        <img src="{{ asset('img/banner-3.png') }}" alt="image" class="#"
                                            width="185" height="50">
                                    </div>
                                </span>
                            </h2>
                            <p>{{ trans('messages.landing_page.Banner_small_text_one') }} </p>
                            <p>{{ trans('messages.landing_page.Banner_small_text_two') }} </p>
                            <p>{{ trans('messages.landing_page.Banner_small_text_three') }}</p>
                            <div class="banner-button">
                                <a href="#demo_introduction">{{ trans('messages.landing_page.Banner_button') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="banner-section-img" data-aos="zoom-in" data-aos-duration="2000"
                            data-aos-delay="500">
                            <img src="{{ asset('img/banner-2.png') }}" alt="image" class="#" width="732"
                                height="327" rel="preload" fetchpriority="high" loading="lazy">
                        </div>
                        <div class="banner-section-img_one">
                            <img src="{{ asset('img/banner-4.svg') }}" alt="image" class="#" width="424"
                                height="200">
                        </div>
                        <div class="banner-section-img_two">
                            <img src="{{ asset('img/banner-5.svg') }}" alt="image" class="#" width="263"
                                height="200">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end-banner-section -->

        <!-- how-it-work-section -->
        <section class="section how-work-section common-l-section position-relative" id="how_work">
            <div class="how-work-one">
                <img src="{{ asset('img/how-work-4.webp') }}" alt="image" class="#" width="93"
                    height="93">
            </div>
            <div class="how-work-two">
                <img src="{{ asset('img/how-work-2.webp') }}" alt="image" class="#" width="72"
                    height="143">
            </div>
            <div class="how-work-three">
                <img src="{{ asset('img/how-work-3.webp') }}" alt="image" class="#" width="193"
                    height="77">
            </div>
            <div class="how-work-four">
                <img src="{{ asset('img/how-work-1.webp') }}" alt="image" class="#" width="33"
                    height="33">
            </div>
            <div class="how-work-five">
                <img src="{{ asset('img/how-work-1.webp') }}" alt="image" class="#" width="33"
                    height="33">
            </div>
            <div class="how-work-six">
                <img src="{{ asset('img/how-work-12.webp') }}" alt="image" class="#" width="1440"
                    height="706">
            </div>
            <div class="how-work-seven">
                <img src="{{ asset('img/how-work-13.webp') }}" alt="image" class="#" width="749"
                    height="348">
            </div>
            <div class="landing-page-container" data-aos="fade-down" data-aos-duration="1000">
                <div class="row">
                    <div class="col-12">
                        <div class="key-feature-m-text text-center work-section-text">
                            <h2 data-text="How It Works"
                                class="color-primary position-relative d-inline text-capitalization">
                                {{ trans('messages.landing_page.How_it_works') }}</h2>
                            <h5 class="color-b-blue mt-20">{{ trans('messages.landing_page.How_section_small_text') }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row slick_slider-padding">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                        <div class="slider-animation1 position-relative">
                            <div class="how-work-ten">
                                <img src="{{ asset('img/how-work-11.png') }}" alt="image" class="#"
                                    width="360" height="420">
                            </div>
                            <div class="slick-carousel_three">
                                <div> <img src="{{ asset('img/how-work-5.webp') }}" alt="image" class="#"
                                        width="620" height="380">
                                </div>
                                <div> <img src="{{ asset('img/how-work-6.webp') }}" alt="image" class="#"
                                        width="620" height="380">
                                </div>
                                <div> <img src="{{ asset('img/how-work-7.webp') }}" alt="image" class="#"
                                        width="620" height="380">
                                </div>
                                <div> <img src="{{ asset('img/how-work-8.webp') }}" alt="image" class="#"
                                        width="620" height="380">
                                </div>
                                <div> <img src="{{ asset('img/how-work-9.webp') }}" alt="image" class="#"
                                        width="620" height="380">
                                </div>
                                <div> <img src="{{ asset('img/how-work-10.webp') }}" alt="image" class="#"
                                        width="620" height="380">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="main-slider">
                            <div class="text-carousel_one-img">
                                <div class=" slick-carousel">
                                    <div>
                                        <div class="slick-slider-card">
                                            <div class="key_feature-img">
                                                <img src="{{ asset('img/key-feature-23.png') }}" alt="image"
                                                    class="#" width="30" height="30">

                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="slick-slider-card">
                                            <div class="key_feature-img">
                                                <img src="{{ asset('img/key-feature-18.png') }}" alt="image"
                                                    class="#" width="30" height="30">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="slick-slider-card">
                                            <div class="key_feature-img">
                                                <img src="{{ asset('img/key-feature-22.png') }}" alt="image"
                                                    class="#" width="30" height="30">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="slick-slider-card">
                                            <div class="key_feature-img">
                                                <img src="{{ asset('img/key-feature-21.png') }}" alt="image"
                                                    class="#" width="30" height="30">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="slick-slider-card">
                                            <div class="key_feature-img">
                                                <img src="{{ asset('img/key-feature-20.png') }}" alt="image"
                                                    class="#" width="30" height="30">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="slick-slider-card">
                                            <div class="key_feature-img">
                                                <img src="{{ asset('img/key-feature-19.png') }}" alt="image"
                                                    class="#" width="30" height="30">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-carousel_one1">
                                <div class=" slick_carousel_one">
                                    <div>
                                        <div class="slick-slider-text_one">
                                            {{ trans('messages.landing_page.How_section_s1_1') }}
                                            <br>{{ trans('messages.landing_page.How_section_s1_2') }}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="slick-slider-text_one">
                                            {{ trans('messages.landing_page.How_section_s1_3') }} <br>
                                            {{ trans('messages.landing_page.How_section_s1_4') }}</div>
                                    </div>
                                    <div>
                                        <div class="slick-slider-text_one">
                                            {{ trans('messages.landing_page.How_section_s1_5') }}
                                            <br>{{ trans('messages.landing_page.How_section_s1_6') }}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="slick-slider-text_one">
                                            {{ trans('messages.landing_page.How_section_s1_7') }} <br>
                                            {{ trans('messages.landing_page.How_section_s1_8') }}</div>
                                    </div>
                                    <div>
                                        <div class="slick-slider-text_one">
                                            {{ trans('messages.landing_page.How_section_s1_9') }}
                                            <br>{{ trans('messages.landing_page.How_section_s1_10') }}
                                        </div>
                                    </div>
                                    <div>
                                        <div class="slick-slider-text_one">
                                            {{ trans('messages.landing_page.How_section_s1_11') }}
                                            <br>{{ trans('messages.landing_page.How_section_s1_12') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-carousel">
                            <div class="slick-carousel_two">
                                <div>
                                    <div class="slick-slider-text">
                                        {{ trans('messages.landing_page.How_section_s2_1') }}</div>
                                </div>
                                <div>
                                    <div class="slick-slider-text">
                                        {{ trans('messages.landing_page.How_section_s2_2') }}</div>
                                </div>
                                <div>
                                    <div class="slick-slider-text">
                                        {{ trans('messages.landing_page.How_section_s2_3') }}</div>
                                </div>
                                <div>
                                    <div class="slick-slider-text">
                                        {{ trans('messages.landing_page.How_section_s2_4') }}</div>
                                </div>
                                <div>
                                    <div class="slick-slider-text">
                                        {{ trans('messages.landing_page.How_section_s2_5') }}</div>
                                </div>
                                <div>
                                    <div class="slick-slider-text">
                                        {{ trans('messages.landing_page.How_section_s2_6') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- end-how-it-work-section -->

        <!-- key-feature-section -->
        <section class="section key-feature-section common-l-section " id="key-feature">
            <div class="key-f-section position-relative">
                <img src="{{ asset('img/key-feature-1.svg') }}" alt="image" class="#">
            </div>
            <div class="landing-page-container" data-aos="fade-down" data-aos-duration="1000">
                <div class="row">
                    <div class="col-12">
                        <div class="key-feature-m-text text-center">
                            <h2 class="color-white position-relative d-inline">
                                {{ trans('messages.landing_page.Key_features') }} </h2>
                            <h5 class="color-white mt-20">{{ trans('messages.landing_page.Key_feature_small_text') }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-20">
                        <div class="key-s-card" data-aos="fade-down" data-aos-duration="500" data-aos-delay="200">
                            <div class="key-s-card-img">
                                <img src="{{ asset('img/key-feature-2.svg') }}" alt="image" class="#"
                                    width="40" height="40">
                            </div>
                            <h6 class="key-s-text">{{ trans('messages.landing_page.Key_feature_card_1') }}</h6>
                            <h6 class="small-text color-b-blue">
                                {{ trans('messages.landing_page.Key_feature_card_small_1') }}</h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-20">
                        <div class="key-s-card" data-aos="fade-down" data-aos-duration="500" data-aos-delay="400">
                            <div class="key-s-card-img">
                                <img src="{{ asset('img/key-feature-7.svg') }}" alt="image" class="#"
                                    width="40" height="40">
                            </div>
                            <h6 class="key-s-text">{{ trans('messages.landing_page.Key_feature_card_2') }}</h6>
                            <h6 class="small-text color-b-blue">
                                {{ trans('messages.landing_page.Key_feature_card_small_2') }}</h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-20">
                        <div class="key-s-card" data-aos="fade-down" data-aos-duration="500" data-aos-delay="600">
                            <div class="key-s-card-img">
                                <img src="{{ asset('img/key-feature-8.svg') }}" alt="image" class="#"
                                    width="40" height="40">
                            </div>
                            <h6 class="key-s-text">{{ trans('messages.landing_page.Key_feature_card_3') }}</h6>
                            <h6 class="small-text color-b-blue">
                                {{ trans('messages.landing_page.Key_feature_card_small_3') }}</h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-20">
                        <div class="key-s-card" data-aos="fade-down" data-aos-duration="500" data-aos-delay="800">
                            <div class="key-s-card-img">
                                <img src="{{ asset('img/key-feature-4.svg') }}" alt="image" class="#"
                                    width="40" height="40">
                            </div>
                            <h6 class="key-s-text">{{ trans('messages.landing_page.Key_feature_card_4') }}</h6>
                            <h6 class="small-text color-b-blue">
                                {{ trans('messages.landing_page.Key_feature_card_small_4') }}</h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-20">
                        <div class="key-s-card" data-aos="fade-down" data-aos-duration="500" data-aos-delay="200">
                            <div class="key-s-card-img">
                                <img src="{{ asset('img/key-feature-9.svg') }}" alt="image" class="#"
                                    width="40" height="40">
                            </div>
                            <h6 class="key-s-text">{{ trans('messages.landing_page.Key_feature_card_5') }}</h6>
                            <h6 class="small-text color-b-blue">
                                {{ trans('messages.landing_page.Key_feature_card_small_5') }}</h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-20">
                        <div class="key-s-card" data-aos="fade-down" data-aos-duration="500" data-aos-delay="400">
                            <div class="key-s-card-img">
                                <img src="{{ asset('img/key-feature-5.svg') }}" alt="image" class="#"
                                    width="40" height="40">
                            </div>
                            <h6 class="key-s-text">{{ trans('messages.landing_page.Key_feature_card_6') }}</h6>
                            <h6 class="small-text color-b-blue">
                                {{ trans('messages.landing_page.Key_feature_card_small_6') }}</h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-20">
                        <div class="key-s-card" data-aos="fade-down" data-aos-duration="500" data-aos-delay="600">
                            <div class="key-s-card-img">
                                <img src="{{ asset('img/key-feature-10.svg') }}" alt="image" class="#"
                                    width="40" height="40">
                            </div>
                            <h6 class="key-s-text">{{ trans('messages.landing_page.Key_feature_card_7') }}</h6>
                            <h6 class="small-text color-b-blue">
                                {{ trans('messages.landing_page.Key_feature_card_small_7') }}</h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-20">
                        <div class="key-s-card" data-aos="fade-down" data-aos-duration="500" data-aos-delay="800">
                            <div class="key-s-card-img">
                                <img src="{{ asset('img/key-feature-6.svg') }}" alt="image" class="#"
                                    width="40" height="40">
                            </div>
                            <h6 class="key-s-text">{{ trans('messages.landing_page.Key_feature_card_8') }}</h6>
                            <h6 class="small-text color-b-blue">
                                {{ trans('messages.landing_page.Key_feature_card_small_8') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end-key-feature-section -->

        <!-- demo-section -->
        <section class="section common-l-section demo-section " id="demo_introduction">
            <div class="landing-page-container" data-aos="fade-down" data-aos-duration="1000">
                <div class="row">
                    <div class="col-12">
                        <div class="key-feature-m-text text-center demo-section-text">
                            <h2 class="color-primary position-relative d-inline text-capitalization">
                                {{ trans('messages.landing_page.Demo_Introduction') }}
                            </h2>
                            <h5 class="color-b-blue mt-20">
                                {{ trans('messages.landing_page.demo_introduction_small_text') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="video-demo text-center" data-aos="zoom-in" data-aos-duration="1000"
                            data-aos-delay="200">
                            <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/gDEtKbQ5xu0?si=p9TAWZQqs5kPt12K"
                                style='{{ !empty($currentLocale) && $currentLocale == 'es' ? 'display:none;' : '' }}'
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/jaIvYjOCdqA?si=d7H3j773KKqZDxNG"
                                style='{{ !empty($currentLocale) && $currentLocale == 'en' ? 'display:none;' : '' }}'
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end-demo-section -->

        <!-- form-section -->
        <section class="section common-l-section form-section " id="join_us" data-aos="fade-down"
            data-aos-duration="1000">
            <div class="form-img_one position-relative">
                <img src="{{ asset('img/form-2.svg') }}" alt="image" class="#">
            </div>

            <div class="landing-page-container" data-aos="fade-down" data-aos-duration="1000">
                <div class="row">
                    <div class="col-md-6 col-lg-6 landing-form-responsive" data-aos="fade-right"
                        data-aos-duration="2000" data-aos-delay="500">
                        <div class="form-left">
                            <h2 class="color-primary mb-30">{{ trans('messages.landing_page.form_main_one') }}
                                <br>{{ trans('messages.landing_page.form_main_two') }}
                            </h2>
                            <p>{{ trans('messages.landing_page.form_small_text') }}</p>
                            <ul class="form-l-listing">
                                <li>{{ trans('messages.landing_page.form_list_1') }}</li>
                                <li>{{ trans('messages.landing_page.form_list_2') }}</li>
                                <li>{{ trans('messages.landing_page.form_list_3') }}</li>
                                <li>{{ trans('messages.landing_page.form_list_4') }}</li>
                                <li>{{ trans('messages.landing_page.form_list_5') }}</li>
                                <li>{{ trans('messages.landing_page.form_list_6') }}</li>
                                <li>{{ trans('messages.landing_page.form_list_7') }}</li>
                                <li>{{ trans('messages.landing_page.form_list_8') }}</li>
                            </ul>
                            <div class="form-m-text pt-15">
                                <div class="background_form">
                                    <h4>{{ trans('messages.landing_page.form_launch_1') }}</h4>
                                    <div class="form-main-bg">
                                        {{ trans('messages.landing_page.form_launch_2') }}<span> <img
                                                src="{{ asset('img/plane_form.svg') }}" alt="image"
                                                class="#" width="33" height="47"></span></div>
                                </div>
                                <p class="color-b-blue">{{ trans('messages.landing_page.form_samll_list_text') }}</p>
                                <a href="mailto:business@inmoconnect.com"
                                    class="color-primary text-16 d-flex align-items-center">
                                    <i class="icon-Mail text-20 "></i>
                                    business@inmoconnect.com
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5" data-aos="fade-left" data-aos-duration="2000"
                        data-aos-delay="500">
                        <div class="form-right">
                            <div class="form-header-s-text"> {{ trans('messages.landing_page.form_main_text_one') }}
                                <br> {{ trans('messages.landing_page.form_main_text_two') }}
                            </div>
                            <form id="claimYourSpotForm" method="post">
                                <div class="form-group mt-3 position-relative">
                                    <label for="name"
                                        class="">{{ trans('messages.landing_page.form_main_Name') }} <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control " name="name" id="name"
                                        value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                                <div class="form-group mt-3 position-relative">
                                    <label for="email"
                                        class="">{{ trans('messages.landing_page.form_main_Email') }} <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control " name="email" id="email"
                                        value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                                <div class="form-group mt-3 position-relative">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'phone',
                                        'hasLabel' => true,
                                        'label' => trans('messages.dashboard.Mobile_Number'),
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
                                    <label for="text_company"
                                        class="">{{ trans('messages.landing_page.form_main_Company_name') }}</label>
                                    <input type="text" class="form-control " name="company_name"
                                        id="text_company" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                                <div class="form-group mt-3 position-relative">
                                    <label for="position"
                                        class="">{{ trans('messages.landing_page.form_main_Role') }} <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control " name="role" id="position"
                                        value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
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
                                    <button type="submit" class="submit_button claimYourSpotBtn" id="submit-button"
                                        data-val="agent">
                                        {{ trans('messages.landing_page.form_button') }}
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="form-img_two position-relative">
                    <img src="{{ asset('img/form-3.svg') }}" alt="image" class="#">
                </div>
            </div>
        </section>
        <!-- end-form-section -->

        <!-- faq-section -->
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
                                <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000"
                                    data-aos-delay="350">
                                    <h2 class="accordion-header" id="flush-headingsix">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseseven"
                                            aria-expanded="false" aria-controls="flush-collapseseven">
                                            {{ trans('messages.landing_page.Faqs_button_7') }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseseven" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingseven" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            {{ trans('messages.landing_page.Faqs_button_text_7') }}<span
                                                class="d-block pt-2"><strong>{{ trans('messages.landing_page.Faqs_button_text_8') }}</strong>{{ trans('messages.landing_page.Faqs_button_text_9') }}</span>
                                            <span class="d-block pt-2">
                                                <strong>{{ trans('messages.landing_page.Faqs_button_text_10') }}</strong>{{ trans('messages.landing_page.Faqs_button_text_11') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="faq-img text-center text-lg-end position-relative">
                            <img src="{{ asset('img/faq-1.png') }}" alt="image" class="#" width="465"
                                height="452">
                            <div class="faq-img-one">
                                <img src="{{ asset('img/faq-2.png') }}" alt="image" class="#"
                                    width="72" height="72">
                            </div>
                            <div class="faq-img-two">
                                <img src="{{ asset('img/faq-3.png') }}" alt="image" class="#"
                                    width="87" height="87">
                            </div>
                            <div class="faq-img-three" data-aos="zoom-in">
                                <img src="{{ asset('img/faq-4.png') }}" alt="image" class="#"
                                    width="151" height="151">
                            </div>
                            <div class="faq-img-four" data-aos="zoom-in">
                                <img src="{{ asset('img/faq-5.png') }}" alt="image" class="#"
                                    width="38" height="37">
                            </div>
                            <div class="faq-img-five" data-aos="zoom-in">
                                <img src="{{ asset('img/faq-6.png') }}" alt="image" class="#"
                                    width="73" height="106">
                            </div>
                            <div class="faq-img-six" data-aos="zoom-in">
                                <img src="{{ asset('img/faq-7.png') }}" alt="image" class="#"
                                    width="59" height="71">
                            </div>
                            <div class="faq-img-seven" data-aos="zoom-in">
                                <img src="{{ asset('img/faq-8.png') }}" alt="image" class="#"
                                    width="67" height="73">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end-faq-section -->

        <!-- footer -->
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
                                    <a href="https://www.instagram.com/inmoconnectcrm/" target="_blank"><i
                                            class="fab fa-instagram"></i></a>
                                    <a href="https://www.linkedin.com/company/inmoconnect" target="_blank"><i
                                            class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="https://twitter.com/inmoconnect" target="_blank"><i
                                            class="fa-brands fa-x-twitter"></i></a>
                                    <a href="https://www.facebook.com/inmoconnectcrm" target="_blank"><i
                                            class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://www.youtube.com/@InmoConnectcrm" target="_blank"><i
                                            class="fa-brands fa-youtube"></i></a>
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
                    <a href="https://techalmas.com/" target="_blank" class="website_p color-white">
                        {{ trans('messages.landing_page.Footer_Powered') }}
                        <span class="line_hover_one"></span>
                        {{ trans('messages.landing_page.Footer_Techalmas') }}</a>
                </div>
            </div>
            <a href="#top" class="footer-top-logo">
                <i class="fa-solid fa-arrow-up"></i>
            </a>
        </footer>
        <!-- end-footer -->
        <!-- <div class="youtube-facade" onclick="loadYouTubeVideo('VIDEO_ID')">
  <img src="{{ asset('img/video.png') }}" alt="Video Title">
  <button class="play-button"></button>
</div> -->

    </div>



    <!-- js -->
    <script>
        var routeUrlClaimYourSpot = "{{ route('user.claimYourSpot') }}";
        var routeUrlSubscribeNewsletter = "{{ route('user.subscribeNewsletter') }}";
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

    @stack('scripts')

    <!-- <script>
        function loadYouTubeVideo(videoId) {
            var iframe = document.createElement('iframe');
            iframe.setAttribute('src', `https://www.youtube.com/embed/gDEtKbQ5xu0?autoplay=1`);
            iframe.setAttribute('frameborder', '0');
            iframe.setAttribute('allowfullscreen', 'true');
            iframe.style.width = "100%";
            iframe.style.height = "100%";
            var videoDiv = document.querySelector('.youtube-facade');
            videoDiv.innerHTML = '';
            videoDiv.appendChild(iframe);
        }

        document.querySelectorAll('.youtube-facade').forEach(facade => {
            let observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        loadYouTubeVideo(entry.target.getAttribute('data-videoid'));
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                rootMargin: '100px'
            });

            observer.observe(facade);
        });
    </script> -->


</body>

</html>
