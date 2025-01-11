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
                    </div>
                </div>
                {{-- end-breadcrumb --}}

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
                                    <div class="gap-12 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                        <div class="d-flex flex-column gap-2">
                                            <div class="main-card-bottom">
                                                <div
                                                    class="property-title property-h-responsive text-16 font-weight-700 lineheight-20 text-capitalize color-primary">
                                                    Awesome Interior Apartment
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center gap-2 mb-1">
                                                <div class="property-price text-20 font-weight-700 lineheight-24 color-primary">
                                                    € 144,850.00</div>
                                                <div class="form-group position-relative">
                                                    <button type="button"
                                                        class="Gradient_button add_property_button border-r-8 b-color-Gradient text-12 font-weight-400 color-white ">New
                                                        Property</button>
                                                </div>
                                                <div class="form-group position-relative">
                                                    <button type="button"
                                                        class="Gradient_button add_property_button border-r-8 b-color-Gradient text-12 font-weight-400 color-white ">New
                                                        Property</button>
                                                </div>
                                            </div>

                                            <div class="d-flex gap-2 align-items-start ">
                                                <i class="icon-house_type text-20 color-b-blue"></i>
                                                <div
                                                    class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    Randeep Apartment</div>

                                            </div>
                                            <div class="d-flex gap-2 align-items-start ">
                                                <i class=" icon-location text-20 color-b-blue"></i>
                                                <div
                                                    class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    Comandante Izarduy 57, Vilanova Del Camí, La Guardia De Jaén, Barcelona,
                                                    Biscay, 08788</div>

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
                                                class="fa-regular fa-heart text-20 b-color-transparent color-b-blue add_property"
                                                data-id="4">
                                            </button>

                                            <button type="button" class=" icon-share text-20 b-color-transparent "
                                                id="shareBtn">

                                            </button>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- bottom-text --}}
                            <div class="border_property-card  mt-3 pt-20">
                                <div class="row w-100 ">
                                    <div class="col-lg-4">
                                        <div class="d-flex align-items-center gap-12">
                                            <img src="{{ asset('img/real-inmo-sidebar.svg') }}" alt="image" class="">
                                            <h6 class="text-14 font-weight-700 color-b-blue">Realinmo</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="d-flex flex-wrap gap-2 gap-md-3 justify-content-end">
                                            <button type="button"
                                                class=" small-button border-r-8 b-color-primary text-14 font-weight-700 lineheight-18 color-white border-primary d-flex align-items-center"
                                                data-toggle="modal" data-target="#initiate_collaboration">
                                                <i class=" icon-Download me-2 icon-20 "></i>
                                                Download Brochure</button>

                                            <button type="button"
                                                class="download_plan small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                                data-toggle="modal" data-target="#initiate_collaboration">
                                                <i class=" icon-phone me-2 icon-20 color-primary"></i>
                                                Connect Agent</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-card --}}



                @push('scripts')

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

                @endpush
            @endsection
