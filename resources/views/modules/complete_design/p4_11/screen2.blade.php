@extends('layouts.app')
@section('content')
    @push('styles')

        <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css'>

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
                                Property Search
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-breadcrumb --}}


                <div class="d-flex justify-content-between saved_items_tabs">

                    {{-- tabs --}}
                    <ul class="tabs">
                        <li class="tab-link current text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                            data-tab="tab-1">Saved Search </li>
                        <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                            data-tab="tab-2">Saved Properties</li>
                    </ul>

                    {{-- sved-search --}}
                    <h5 class="text-16 opacity-7 font-weight-400 color-b-blue">Numbers of Saved Search: <span
                            class="opacity-1 font-weight-700">05/10</span></h5>
                </div>

                {{-- Saved Search --}}
                <div id="tab-1" class="tab-content_one current">

                    {{-- card --}}
                    <div class="b-color-white box-shadow-one border-r-8  p-20 mt-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="left_side-tab">
                                <h4 class="text-18 font-weight-700">Property Search 01</h4>
                                <h5 class="text-16 font-weight-400 pt-2">Saved on 12/06/2024</h5>
                            </div>
                            <div class="right_side-tab d-flex gap-12">
                                <div class="tab-button-save text-16 font-weight-400 color-primary border-r-4">
                                    Apartment</div>
                                <div class="d-flex gap-12 align-items-center">
                                    <i class="icon-house_id text-24 color-b-blue"></i>
                                    <h5 class="text-16 font-weight-700 color-primary">150</h5>
                                </div>
                                <div class="d-flex gap-12 align-items-center saved_search_icon">
                                    <i class="icon-bell icon-24 color-primary"></i>
                                    <div class="event-checkbox d-flex">
                                        <label class="switch">
                                            <input type="checkbox" name="is_project_base_event" value="1"
                                                class="form-control ">
                                            <span class="slider">

                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <i class="icon-Search  text-24  color-b-blue"></i>
                                <i class="icon-Delete  text-24  color-b-blue"></i>
                            </div>
                        </div>
                    </div>

                    {{-- card --}}
                    <div class="b-color-white box-shadow-one border-r-8  p-20 mt-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="left_side-tab">
                                <h4 class="text-18 font-weight-700">Property Search 02</h4>
                                <h5 class="text-16 font-weight-400 pt-2">Saved on 12/06/2024</h5>
                            </div>
                            <div class="right_side-tab d-flex gap-12">
                                <div class="tab-button-save text-16 font-weight-400 color-primary border-r-4">
                                    House</div>
                                <div class="d-flex gap-12 align-items-center">
                                    <i class="icon-house_id text-24 color-b-blue"></i>
                                    <h5 class="text-16 font-weight-700 color-primary">150</h5>
                                </div>
                                <div class="d-flex gap-12 align-items-center saved_search_icon">
                                    <i class="icon-bell icon-24 color-primary"></i>
                                    <div class="event-checkbox d-flex">
                                        <label class="switch">
                                            <input type="checkbox" name="is_project_base_event" value="1"
                                                class="form-control ">
                                            <span class="slider">

                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <i class="icon-Search  text-24  color-b-blue"></i>
                                <i class="icon-Delete  text-24  color-b-blue"></i>
                            </div>
                        </div>
                    </div>

                    {{-- card --}}
                    <div class="b-color-white box-shadow-one border-r-8  p-20 mt-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="left_side-tab">
                                <h4 class="text-18 font-weight-700">Property Search 03</h4>
                                <h5 class="text-16 font-weight-400 pt-2">Saved on 12/06/2024</h5>
                            </div>
                            <div class="right_side-tab d-flex gap-12">
                                <div class="tab-button-save text-16 font-weight-400 color-primary border-r-4">
                                    Plot</div>
                                <div class="d-flex gap-12 align-items-center">
                                    <i class="icon-house_id text-24 color-b-blue"></i>
                                    <h5 class="text-16 font-weight-700 color-primary">150</h5>
                                </div>
                                <div class="d-flex gap-12 align-items-center saved_search_icon">
                                    <i class="icon-bell icon-24 color-primary"></i>
                                    <div class="event-checkbox d-flex">
                                        <label class="switch">
                                            <input type="checkbox" name="is_project_base_event" value="1"
                                                class="form-control ">
                                            <span class="slider">

                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <i class="icon-Search  text-24  color-b-blue"></i>
                                <i class="icon-Delete  text-24  color-b-blue"></i>
                            </div>
                        </div>
                    </div>

                    {{-- card --}}
                    <div class="b-color-white box-shadow-one border-r-8  p-20 mt-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="left_side-tab">
                                <h4 class="text-18 font-weight-700">Property Search 04</h4>
                                <h5 class="text-16 font-weight-400 pt-2">Saved on 12/06/2024</h5>
                            </div>
                            <div class="right_side-tab d-flex gap-12">
                                <div class="tab-button-save text-16 font-weight-400 color-primary border-r-4">
                                    Commercial</div>
                                <div class="d-flex gap-12 align-items-center">
                                    <i class="icon-house_id text-24 color-b-blue"></i>
                                    <h5 class="text-16 font-weight-700 color-primary">150</h5>
                                </div>
                                <div class="d-flex gap-12 align-items-center saved_search_icon">
                                    <i class="icon-bell icon-24 color-primary"></i>
                                    <div class="event-checkbox d-flex">
                                        <label class="switch">
                                            <input type="checkbox" name="is_project_base_event" value="1"
                                                class="form-control ">
                                            <span class="slider">

                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <i class="icon-Search  text-24  color-b-blue"></i>
                                <i class="icon-Delete  text-24  color-b-blue"></i>
                            </div>
                        </div>
                    </div>

                    {{-- card --}}
                    <div class="b-color-white box-shadow-one border-r-8  p-20 mt-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="left_side-tab">
                                <h4 class="text-18 font-weight-700">Property Search 05</h4>
                                <h5 class="text-16 font-weight-400 pt-2">Saved on 12/06/2024</h5>
                            </div>
                            <div class="right_side-tab d-flex gap-12">
                                <div class="tab-button-save text-16 font-weight-400 color-primary border-r-4">
                                    Countryhouse</div>
                                <div class="d-flex gap-12 align-items-center">
                                    <i class="icon-house_id text-24 color-b-blue"></i>
                                    <h5 class="text-16 font-weight-700 color-primary">150</h5>
                                </div>
                                <div class="d-flex gap-12 align-items-center saved_search_icon">
                                    <i class="icon-bell icon-24 color-primary"></i>
                                    <div class="event-checkbox d-flex">
                                        <label class="switch">
                                            <input type="checkbox" name="is_project_base_event" value="1"
                                                class="form-control ">
                                            <span class="slider">

                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <i class="icon-Search  text-24  color-b-blue"></i>
                                <i class="icon-Delete  text-24  color-b-blue"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Saved Properties --}}
                <div id="tab-2" class="tab-content_one">

                    {{-- card --}}
                    <div class="main-card border-r-8 p-20 mt-20 b-color-white">
                        <div class="main-card_flex d-block d-sm-flex align-center gap-2 gap-sm-4">

                            {{-- image --}}
                            <div class="main-card-left">
                                <div class="main-card-img">
                                    <img src="http://127.0.0.1:8000/img/default-property.jpg" alt="image">
                                </div>
                            </div>
                            <div class="d-flex flex-column w-100">
                                <div class="row">

                                    {{-- text --}}
                                    <div class="col-lg-9">
                                        <div
                                            class="gap-12 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                            <div class="d-flex flex-column gap-2">
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <div
                                                        class="property-price text-20 font-weight-700 lineheight-24 color-primary">
                                                        € 144,850.00</div>
                                                    <div class="form-group position-relative">
                                                        <button type="button"
                                                            class="Gradient_button add_property_button border-r-8 b-color-Gradient text-12 font-weight-400 color-white ">New
                                                            Property</button>
                                                    </div>
                                                </div>
                                                <div class="main-card-bottom">
                                                    <div
                                                        class="property-title property-h-responsive text-16 font-weight-700 lineheight-20 text-capitalize color-primary">
                                                        Awesome Interior Apartment
                                                    </div>
                                                </div>

                                                <div class="d-flex gap-2 align-items-start ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        06600 Antibes, France</div>

                                                </div>
                                                <div class="d-flex gap-2 gap-md-3">
                                                    <div class="d-flex gap-2 align-items-start">
                                                        <i class="icon-my_profile text-20  color-b-blue "></i>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            Agent7</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            16989-231042123</div>
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

                                            </div>
                                        </div>
                                    </div>

                                    {{-- buttons --}}
                                    <div class="col-lg-3 mt-3 mt-lg-0">
                                        <div
                                            class=" h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                            <button type="button"
                                                class="text-14 font-weight-400 lineheight-18 border-r-8 b-color-primary color-white-grey viewPropertyBtn"
                                                id="viewPropertyBtn">
                                                View Property
                                            </button>
                                            <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                                <button type="button"
                                                    class=" icon-Delete text-20 b-color-transparent color-b-blue"
                                                    id="deleteBtn">
                                                </button>
                                                <button type="button"
                                                    class=" icon-Delete text-20 b-color-transparent color-b-blue"
                                                    id="deleteBtn">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- bottom-text --}}
                                <div class="border_property-card  mt-3 pt-20">
                                    <div class="row w-100 ">
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center gap-12">
                                                <img src="{{ asset('img/real-inmo-sidebar.svg') }}" alt="image"
                                                    class="">
                                                <h6 class="text-14 font-weight-700 color-b-blue">Realinmo</h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- card --}}
                    <div class="main-card border-r-8 p-20 mt-20 b-color-white">
                        <div class="main-card_flex d-block d-sm-flex align-center gap-2 gap-sm-4">

                            {{-- image --}}
                            <div class="main-card-left">
                                {{-- <div class="main-card-img">
                                    <img src="http://127.0.0.1:8000/img/default-property.jpg" alt="image">
                                </div> --}}
                                <ul id="lightSliderVertical">
                                    <li data-thumb="https://webdevtrick.com/wp-content/uploads/programming.jpg">
                                        <a href="https://webdevtrick.com/wp-content/uploads/programming.jpg" data-fancybox="gallery">
                                            <img src="https://webdevtrick.com/wp-content/uploads/programming.jpg" />
                                        </a>
                                    </li>
                                    <li data-thumb="https://webdevtrick.com/wp-content/uploads/hardware.jpg">
                                        <a href="https://webdevtrick.com/wp-content/uploads/hardware.jpg" data-fancybox="gallery">
                                            <img src="https://webdevtrick.com/wp-content/uploads/hardware.jpg" />
                                        </a>
                                    </li>
                                    <li data-thumb="https://webdevtrick.com/wp-content/uploads/gadget.jpg">
                                        <a href="https://webdevtrick.com/wp-content/uploads/gadget.jpg" data-fancybox="gallery">
                                            <img src="https://webdevtrick.com/wp-content/uploads/gadget.jpg" />
                                        </a>
                                    </li>
                                    <li data-thumb="https://webdevtrick.com/wp-content/uploads/design.jpg">
                                        <a href="https://webdevtrick.com/wp-content/uploads/design.jpg" data-fancybox="gallery">
                                            <img src="https://webdevtrick.com/wp-content/uploads/design.jpg" />
                                        </a>
                                    </li>
                                    <li data-thumb="https://webdevtrick.com/wp-content/uploads/cons.jpg">
                                        <a href="https://webdevtrick.com/wp-content/uploads/cons.jpg" data-fancybox="gallery">
                                            <img src="https://webdevtrick.com/wp-content/uploads/cons.jpg" />
                                        </a>
                                    </li>
                                    <li data-thumb="https://webdevtrick.com/wp-content/uploads/auto.jpg">
                                        <a href="https://webdevtrick.com/wp-content/uploads/auto.jpg" data-fancybox="gallery">
                                            <img src="https://webdevtrick.com/wp-content/uploads/auto.jpg" />
                                        </a>
                                    </li>
                                    <li data-thumb="https://webdevtrick.com/wp-content/uploads/black-background.jpg">
                                        <a href="https://webdevtrick.com/wp-content/uploads/black-background.jpg"
                                            data-fancybox="gallery">
                                            <img src="https://webdevtrick.com/wp-content/uploads/black-background.jpg" />
                                        </a>
                                    </li>
                                    <li data-thumb="https://webdevtrick.com/wp-content/uploads/coding.jpg">
                                        <a href="https://webdevtrick.com/wp-content/uploads/coding.jpg" data-fancybox="gallery">
                                            <img src="https://webdevtrick.com/wp-content/uploads/coding.jpg" />
                                        </a>
                                    </li>
                                    <li data-thumb="https://webdevtrick.com/wp-content/uploads/1st.jpg">
                                        <a href="https://webdevtrick.com/wp-content/uploads/1st.jpg" data-fancybox="gallery">
                                            <img src="https://webdevtrick.com/wp-content/uploads/1st.jpg" />
                                        </a>
                                    </li>
                                    <li data-thumb="https://webdevtrick.com/wp-content/uploads/sunset-background.jpg">
                                        <a href="https://webdevtrick.com/wp-content/uploads/sunset-background.jpg"
                                            data-fancybox="gallery" data-image="Image #10">
                                            <img src="https://webdevtrick.com/wp-content/uploads/sunset-background.jpg" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex flex-column w-100">
                                <div class="row">

                                    {{-- text --}}
                                    <div class="col-lg-9">
                                        <div
                                            class="gap-12 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                            <div class="d-flex flex-column gap-2">
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <div
                                                        class="property-price text-20 font-weight-700 lineheight-24 color-primary">
                                                        € 144,850.00</div>
                                                    <div class="form-group position-relative">
                                                        <button type="button"
                                                            class="Gradient_button add_property_button border-r-8 b-color-Gradient text-12 font-weight-400 color-white ">New
                                                            Property</button>
                                                    </div>
                                                </div>
                                                <div class="main-card-bottom">
                                                    <div
                                                        class="property-title property-h-responsive text-16 font-weight-700 lineheight-20 text-capitalize color-primary">
                                                        Awesome Interior Apartment
                                                    </div>
                                                </div>

                                                <div class="d-flex gap-2 align-items-start ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        06600 Antibes, France</div>

                                                </div>
                                                <div class="d-flex gap-2 gap-md-3">
                                                    <div class="d-flex gap-2 align-items-start">
                                                        <i class="icon-my_profile text-20  color-b-blue "></i>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            Agent7</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            16989-231042123</div>
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

                                            </div>
                                        </div>
                                    </div>

                                    {{-- buttons --}}
                                    <div class="col-lg-3 mt-3 mt-lg-0">
                                        <div
                                            class=" h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                            <button type="button"
                                                class="text-14 font-weight-400 lineheight-18 border-r-8 b-color-primary color-white-grey viewPropertyBtn"
                                                id="viewPropertyBtn">
                                                View Property
                                            </button>
                                            <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                                <button type="button"
                                                    class=" icon-Delete text-20 b-color-transparent color-b-blue"
                                                    id="deleteBtn">
                                                </button>
                                                <button type="button"
                                                    class=" icon-Delete text-20 b-color-transparent color-b-blue"
                                                    id="deleteBtn">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- bottom-text --}}
                                <div class="border_property-card  mt-3 pt-20">
                                    <div class="row w-100 ">
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center gap-12">
                                                <img src="{{ asset('img/real-inmo-sidebar.svg') }}" alt="image"
                                                    class="">
                                                <h6 class="text-14 font-weight-700 color-b-blue">Realinmo</h6>
                                            </div>
                                        </div>
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
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>
            <script>
                //Code By Webdevtrick ( https://webdevtrick.com ) 
                $ = jQuery;
                $(document).ready(function() {

                    $v_slider_options = {
                        gallery: false,
                        item: 1,
                        loop: true,
                        slideMargin: 0,
                        thumbItem: 4,
                        galleryMargin: 10,
                        thumbMargin: 10,
                        vertical: true,
                        keyPress: false,
                        controls: true,
                    };

                    v_slider = $('#lightSliderVertical').lightSlider($v_slider_options);

                });

                $(window).resize(function() {
                    slider.destroy();
                    h_slider = $('#ocassions-slider').lightSlider(h_slider_options);
                });
                $(document).ready(function() {
                    // Initialize Fancybox
                    $('[data-fancybox="gallery"]').fancybox({
                        loop: false, // Disable looping through images
                        buttons: [
                            "zoom",
                            "close"
                        ],
                        arrows: true,
                        idleTime: false
                    });
                });
            </script>

        @endpush
    @endsection
