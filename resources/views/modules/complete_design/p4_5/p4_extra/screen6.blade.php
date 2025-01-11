@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.sidebar.Property_Search') }} Inmoconnect
        @endsection

        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

        <div class="overlay" id="overlay"></div>
        <div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                <!-- ////////////////////////////breadcrum///////////////////////////////////// -->
                <div class="empty-search-header">
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                                Profile
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ///////////////////////////end-breadcrum////////////////////////////////////// -->

                <!-- /////////////////////////////profile-details//////////////////////////////////////// -->
                <div class="b-color-white box-shadow-one border-r-8  edit_profiile-tab_one">
                    <div class="border-r-12 b-color-white ">
                        <div class="row row-border row-border-phase_four">
                            <div class="col-lg-12 px-0">
                                <div class="text-18 font-weight-700 lineheight-22 text-capitalize color-primary pb-3 ">
                                    Personal Information:
                                </div>
                            </div>
                        </div>
                        <div class="main-card_profile">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="pt-3 d-flex align-items-center">
                                        <div class="personal_information_img">
                                            <img src="{{ asset('img/default-user.jpg') }}" alt="Default Image"
                                                class=" border-r-12" id="image_image" height="80" width="80">
                                        </div>
                                        <div class="presonal_information_s_card ms-3">
                                            <div class="text-18 color-primary font-weight-700 lineheight-22 text-capitalize">
                                                James Henry</div>
                                            <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-1">
                                                Agent</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Email:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">henrytom@gmail.com
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Mobile Number:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">+34 2345678123
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Date of Birth:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">21/07/1994</div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Gender:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Male</div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Languages Spoken:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Spanish</div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Qualification Type:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Engineer</div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Professional Certifications:</div>
                                        <a href="#" target="_blank"
                                            class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Cer_henry_realestate</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Field of Study/Major:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Lorem Ipsum Lore
                                            Ipsum Lorem Ipsum</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Address:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Bellavista 79,
                                            Santibáñez De Vidriales, Barcelona, Spain, 49610</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="b-color-white box-shadow-one border-r-8  edit_profiile-tab_one mt-20">
                    <div class="border-r-12 b-color-white ">
                        <div class="row row-border row-border-phase_four">

                            <div class="col-lg-12 px-0">
                                <div class="text-18 font-weight-700 lineheight-22 text-capitalize color-primary pb-3 ">
                                    Company Information:
                                </div>
                            </div>
                        </div>
                        <div class="main-card_profile">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="pt-3 d-flex align-items-center">
                                        <div class="personal_information_img">
                                            <img src="{{ asset('img/default-realinmo.svg') }}" alt="Default Image"
                                                class=" border-r-12" id="image_image" height="100" width="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Company Name:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Realinmo</div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Company Email:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">realinmo@gmail.com
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Company Mobile Number:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">+31 2345678912
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Tax Number:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">123456789123456789
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Company Address:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Calle del Capitan
                                            Angosto Gomez Castrillon, 21
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            City:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Santibáñez De
                                            Vidriales
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            State/Province:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Málaga</div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Country:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Spain</div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            ZipCode:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">49610</div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Primary Service Area:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Spanish</div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Professional Title/Role:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Project Manager
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Properties in Portfolio:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">101-1000
                                            Properties
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Number of Current Customers:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">0-10 Years
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Property Types Specialized In:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Apartment,
                                            Apartment Duplex </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Years of Experience in Real Estate:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">0-10 Years</div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Average Number of Properties Managed/Listed:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">3000+ Properties
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-30">
                                    <div class="presonal_information_s_card">
                                        <div class="text-14 color-primary font-weight-700 lineheight-18">
                                            Property Specialization:</div>
                                        <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">Lorem ipsum dolor
                                            sit amet consectetur. Pellentesque facilisi ipsum sed porta donec pretium feugiat.
                                            Mauris amet integer etiam eu. Egestas netus sollicitudin ac faucibus convallis.
                                            Tempor viverra sit nisl egestas amet venenatis faucibus posuere felis. Velit mattis
                                            mi id lacus etiam. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ///////////////////////////////profile-details-end////////////////////////////////// -->
            </div>
        </div>

        @push('scripts')

            <script src="{{ asset('assets/js/modules/properties/property_index.js') }}"></script>
        @endpush
    @endsection
