@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.sidebar.Property_Search') }} Inmoconnect
        @endsection


        <div class="overlay" id="overlay"></div>
        <div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                {{-- breadcrumb --}}
                <div class="empty-search-header">
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                                Development
                            </div>
                        </div>
                        <div class="header-left-team d-flex gap-3">
                            <button
                                class="b-color-transparent header-right-button border-r-8 opacity-5 border-blue  d-flex justify-content-center align-items-center px-3 py-2"
                                data-toggle="modal" data-target="#subagent">
                                <i class=" icon-add_new_development text-20"></i><span class="ms-2 text-14 font-weight-700">Add New
                                    Development</span>
                            </button>
                        </div>
                    </div>

                </div>
                {{-- end-breadcrumb --}}

                {{-- card --}}
                <div class="main-card border-r-8 p-20 mb-20 b-color-white box-shadow-one">
                    <div class="main-card_flex d-block d-sm-flex align-center gap-2 gap-sm-4">


                        <div class="main-card-left">
                            <div class="main-card-img main_card_img_developer">
                                <img src="http://127.0.0.1:8000/img/default-property.jpg" alt="image">
                            </div>
                        </div>
                        <div class="d-flex flex-column w-100">
                            <div class="row">


                                <div class="col-lg-9">
                                    <div class="gap-2 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                        <div class="main-card-bottom">
                                            <div
                                                class="property-title property-h-responsive text-20 font-weight-700 lineheight-24 text-capitalize color-primary">
                                                Awesome Interior Apartment
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column gap-2">
                                            <div class="d-flex align-items-center gap-2 mb-1">
                                                <div class="property-price text-16 font-weight-700 lineheight-20 color-primary">
                                                    € 144,850.00</div>
                                            </div>


                                            <div class="d-flex gap-2 align-items-start ">
                                                <i class=" icon-location text-20 color-b-blue"></i>
                                                <div
                                                    class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    06600 Antibes, France</div>

                                            </div>
                                            <div class="d-flex gap-2 gap-md-3">
                                                <div class="d-flex gap-2 align-items-start">
                                                    <i class="icon-house_type text-20  color-b-blue "></i>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        marcroldán12345679</div>
                                                </div>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <span class=" icon-estimated_possession_date  text-20  color-b-blue"></span>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        12/2024</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-3 mt-3">
                                                <div class="card-units">
                                                    <h6 class="text-14 font-weight-400 color-primary">Number of Units:</h6>
                                                    <h4 class="text-20 font-weight-700 color-primary">120</h4>
                                                </div>
                                                <div class="card-units">
                                                    <h6 class="text-14 font-weight-400 color-primary">Units Sold:</h6>
                                                    <h4 class="text-20 font-weight-700 color-primary">20</h4>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-3 mt-3 mt-lg-0">
                                    <div
                                        class=" h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                        <div class="slider-top-right in_progress">
                                            <div class="">
                                                Under Construction</div>
                                        </div>
                                        <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                            <button type="button" class=" icon-share text-24 b-color-transparent color-b-blue"
                                                id="deleteBtn">
                                            </button>
                                            <button type="button" class=" icon-edit text-24 b-color-transparent color-b-blue"
                                                id="deleteBtn">
                                            </button>
                                            <button type="button" class=" icon-Delete text-24 b-color-transparent color-b-blue"
                                                id="deleteBtn">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="border_property-card  mt-20 pt-20">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center gap-12">
                                            <img src="http://127.0.0.1:8000/img/real-inmo-sidebar.svg" alt="image"
                                                class="border-r-4" width="36" height="36">
                                            <h6 class="text-14 font-weight-700 color-b-blue">Harmony Real Estate</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-flex justify-content-end">
                                        <button type="button"
                                            class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  small-button gardient-button searchFilterBtn">
                                            Manage Development
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-card --}}

                {{-- card --}}
                <div class="main-card border-r-8 p-20 mb-20 b-color-white box-shadow-one">
                    <div class="main-card_flex d-block d-sm-flex align-center gap-2 gap-sm-4">


                        <div class="main-card-left">
                            <div class="main-card-img main_card_img_developer">
                                <img src="http://127.0.0.1:8000/img/default-property.jpg" alt="image">
                            </div>
                        </div>
                        <div class="d-flex flex-column w-100">
                            <div class="row">


                                <div class="col-lg-9">
                                    <div class="gap-2 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                        <div class="main-card-bottom">
                                            <div
                                                class="property-title property-h-responsive text-20 font-weight-700 lineheight-24 text-capitalize color-primary">
                                                Awesome Interior Apartment
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column gap-2">
                                            <div class="d-flex align-items-center gap-2 mb-1">
                                                <div class="property-price text-16 font-weight-700 lineheight-20 color-primary">
                                                    € 144,850.00</div>
                                            </div>


                                            <div class="d-flex gap-2 align-items-start ">
                                                <i class=" icon-location text-20 color-b-blue"></i>
                                                <div
                                                    class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    06600 Antibes, France</div>

                                            </div>
                                            <div class="d-flex gap-2 gap-md-3">
                                                <div class="d-flex gap-2 align-items-start">
                                                    <i class="icon-house_type text-20  color-b-blue "></i>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        marcroldán12345679</div>
                                                </div>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <span class="icon-estimated_possession_date   text-20  color-b-blue"></span>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        12/2024</div>
                                                </div>
                                            </div>
                                            <div class="d-flex gap-3 mt-3">
                                                <div class="card-units">
                                                    <h6 class="text-14 font-weight-400 color-primary">Number of Units:</h6>
                                                    <h4 class="text-20 font-weight-700 color-primary">120</h4>
                                                </div>
                                                <div class="card-units">
                                                    <h6 class="text-14 font-weight-400 color-primary">Units Sold:</h6>
                                                    <h4 class="text-20 font-weight-700 color-primary">20</h4>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-3 mt-3 mt-lg-0">
                                    <div
                                        class=" h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                        <div class="slider-top-right pink_button_account">
                                            <div class="">
                                                Running Late</div>
                                        </div>
                                        <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                            <button type="button"
                                                class=" icon-share text-24 b-color-transparent color-b-blue" id="deleteBtn">
                                            </button>
                                            <button type="button"
                                                class="icon-edit text-24 b-color-transparent color-b-blue" id="deleteBtn">
                                            </button>
                                            <button type="button"
                                                class=" icon-Delete text-24 b-color-transparent color-b-blue" id="deleteBtn">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="border_property-card  mt-20 pt-20">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center gap-12">
                                            <img src="http://127.0.0.1:8000/img/real-inmo-sidebar.svg" alt="image"
                                                class="border-r-4" width="36" height="36">
                                            <h6 class="text-14 font-weight-700 color-b-blue">Harmony Real Estate</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-flex justify-content-end">
                                        <button type="button"
                                            class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  small-button gardient-button searchFilterBtn">
                                            Manage Development
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-card --}}

            </div>
        </div>


        @push('scripts')

        @endpush
    @endsection
