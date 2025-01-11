@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.sidebar.Property_Search') }} Inmoconnect
        @endsection

        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

        <div class="overlay" id="overlay"></div>
        <div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                <!-- ////////////////////////////breadcrum///////////////////////////////////// -->
                <div class="empty-search-header">
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div
                                class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">
                                Customers
                            </div>
                        </div>
                        <div class="header-right-button_one d-flex align-items-center gap-3">
                            <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                                data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                                <i class="icon-Add-Customer"></i>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ///////////////////////////end-breadcrum////////////////////////////////////// -->

                <!-- ////////////////////////empty-page///////////////////////////////////////////// -->
                <div class="row propertySearchData tableData">
                    <div class="main-card border-r-8  mb-15">
                        <div
                            class="empty-search border-r-8 b-color-white d-flex align-items-center justify-content-center px-50 py-30 box-shadow-one">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-6 empty-order">
                                    <div class="search-left me-4">
                                        <div class="text-20 lineheight-22 color-primary font-weight-700 letter-s-48">Empower
                                            Your Clients: Seamless Customer Onboarding with InmoConnect</div>
                                        <div class="text14 font-weight-400 lineheight-18 color-b-blue pt-10">Why Your Clients
                                            Will Love InmoConnect Invitations?</div>
                                        <ul class="search-list">
                                            <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                                    class="font-weight-700">Seamless Onboarding:</span> Easily invite customers
                                                to join your real estate network for a hassle-free onboarding experience.</li>
                                            <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                                    class="font-weight-700">Unified Collaboration:</span> Foster closer
                                                connections by bringing your clients into the heart of your real estate ventures
                                                on InmoConnect.</li>
                                            <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                                    class="font-weight-700">Efficient Communication:</span> Streamline
                                                communication with your clients, keeping them informed about properties,
                                                negotiations, and more.</li>
                                            <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                                    class="font-weight-700">Exclusive Property Access:</span> Offer your clients
                                                exclusive access to curated property listings, ensuring they stay engaged and
                                                invested.</li>
                                            <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                                    class="font-weight-700">Real-Time Updates:</span>Keep your clients in the
                                                loop with real-time updates on property developments and market trends.</li>
                                        </ul>
                                        <div class="text14 font-weight-400 lineheight-18 color-b-blue pt-15">Start inviting
                                            customers to join InmoConnect today - Where Collaboration Meets Real Estate
                                            Excellence!</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="search-right">
                                        <div class="search-right-img text-center mb-5 mb-lg-0">
                                            <img src="{{ asset('img/empty_myproject.svg') }}" alt="image" class="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /////////////////////////////////////////////end-empty-page///////////////////////////////////////////// -->

            </div>
        </div>

        <!-- /////////////////////////////////////////////Add-new project-modal ///////////////////////////////////////////// -->
        <div class="modal fade" id="dataFilterModal" tabindex="-1" aria-labelledby="dataFilterModalLabel"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
                <div class="modal-content border-r-8 border-0 b-color-white">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-b-blue w-100"
                            id="dataFilterModalLabel">Add New Project</h4>
                        <button type="button" class="close b-color-transparent cursor-pointer end-0" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">
                                <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body modal-body modal-header_file">
                        <div class="row">
                            <!-- //////////////////////first-name/////////////////// -->
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                <div class="form-group mt-3 position-relative">
                                    <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">First
                                        Name:
                                        <span class="required">*</span></label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="vendor_name" id="vendor_name" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                            <!-- //////////////////////Last-name/////////////////// -->
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                <div class="form-group mt-3 position-relative">
                                    <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Last
                                        Name:
                                        <span class="required">*</span></label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="vendor_name" id="vendor_name" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                            <!-- //////////////////////email/////////////////// -->
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                <div class="form-group mt-3 position-relative">
                                    <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">email:
                                        <span class="required">*</span></label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="vendor_name" id="vendor_name" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                            <!-- //////////////////////mobile-no/////////////////// -->
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                <div class="form-group mt-3 position-relative">
                                    <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                        Number:
                                        <span class="required">*</span></label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="vendor_name" id="vendor_name" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                            <button type="button"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">invite
                                Customer </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- ///////////////////////////////////end-add-new -project_modal ///////////////////////////////////////// -->
        @push('scripts')

            <script src="{{ asset('assets/js/modules/properties/property_index.js') }}"></script>
        @endpush
    @endsection
