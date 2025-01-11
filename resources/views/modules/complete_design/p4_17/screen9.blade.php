@extends('layouts.app')
@section('content')
    @push('styles')
        @section('title')
            {{ trans('messages.sidebar.Dashboard') }} Inmoconnect
        @endsection

        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />


        <div class="overlay" id="overlay"></div>
        <div id="page-content-wrapper" class="main-content-crm b-color-background  min-vh-100">
            <div class="crm-main-content">

                <!-- ///////////////////////breadcrumb//////////////////////////////////////////////////// -->
                <x-forms.crm-breadcrumb :fieldData="[['url' => '', 'label' => trans('messages.sidebar.Dashboard')]]" />

                <!-- ////////////////////////////end-bredcrumb//////////////////////////////////////////////// -->

                <div class="content" id="main">
                    <div class="text-14 lineheight-18 font-weight-700 color-b-blue pt-12 text-capitalize open-btn"
                        onclick="openSidebar()">Task Event 01</div>
                    <!-- <button class="open-btn" onclick="openSidebar()">☰ Open Sidebar</button> -->
                </div>


                <div class="sidebar_one" id="mySidebar_one">
                    <h4 class="pb-4 modal-title text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="dataFilterModalLabel">Property Lead Details</h4>
                    <a href="javascript:void(0)" class="close-btn" onclick="closeSidebar()">
                        <span aria-hidden="true">
                            <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                        </span>
                    </a>
                    <div class="fixed_sidebar">
                        <div class="sidebar_one-content">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="text-18 font-weight-700 lineheight-22 color-b-blue">Awesome Interior Apartment</div>
                                <div class="text-18 font-weight-700 lineheight-22 color-b-blue">Brain Baker</div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <div class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Type:<span
                                        class="font-weight-400">Apartment</span>
                                </div>
                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue">Customer</div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue"><i
                                        class="icon-property_id text-14"></i> <span> RT48</span>
                                </div>
                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue">18/8/2023, 01:24 PM</div>
                            </div>
                        </div>


                        <div class="sidebar_one-content-card-four p-30 pb-0">
                            <div class="modal_customer-details mt-0">
                                <div class="  modal_margin-detail">
                                    <div class="cat_box-small-i">
                                        <h6 class="text-16 font-weight-700 color-primary text-center">Lead Details</h6>
                                    </div>
                                    <div class="d-flex align-items-start justify-content-between pt-20">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" width="60" height="60"
                                            alt="image" class="border-r-8">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">View
                                            Profile</button>
                                    </div>
                                    <div class="row text-start">
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Lead Name:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Brain Baker</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Account Type:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Customer</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Email Id:</p>
                                                <p class="text-14 color-b-blue font-weight-400">brainbaker@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Mobile Number:</p>
                                                <p class="text-14 color-b-blue font-weight-400">+56 480 098 038</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Gender:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Male</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Languages Spoken:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Spanish, English</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">

                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Government ID:</p>
                                                <div class="d-flex gap-2 align-items-start">
                                                    <img src= "{{ asset('img/certificate.svg') }}" />
                                                    <p class="text-14 color-b-blue font-weight-400">
                                                        <span></span>brain_baker_UI_23
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Preferred Location:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Málaga</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Budget Range:
                                                </p>
                                                <p class="text-14 color-b-blue font-weight-400">€3000.00 - €5000.00 </p>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Address:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Comandante Izarduy 57, Vilanova
                                                    Del Camí, La Guardia De Jaén, Barcelona, Biscay, 08788</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Description:</p>
                                                <p class="text-14 color-b-blue font-weight-400">This 3-bed with a loft, 2-bath
                                                    home in the gated community of The Hideout has it all. From the open floor
                                                    plan to the abundance of light from the windows, this home is perfect for
                                                    entertaining. The living room and dining room have vaulted ceilings and a
                                                    beautiful fireplace. You will love spending time on the deck taking in the
                                                    beautiful views. In the kitchen, you'll find stainless steel appliances and
                                                    a tile backsplash, as well as a breakfast bar.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal_customer-details mb-0">
                                <div class="  modal_margin-detail ">
                                    <div class="cat_box-small-i">
                                        <h6 class="text-16 font-weight-700 color-primary text-center">Property Details</h6>
                                    </div>
                                    <div class="d-flex align-items-start justify-content-between pt-20">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" width="60" height="60"
                                            alt="image" class="border-r-8">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">View
                                            Property</button>
                                    </div>
                                    <div class="row text-start">
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Project Name</p>
                                                <p class="text-14 color-b-blue font-weight-400">Randeep Apartment </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Name</p>
                                                <p class="text-14 color-b-blue font-weight-400">Luxury Apartment in Rego Park
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Reference:</p>
                                                <p class="text-14 color-b-blue font-weight-400">RT48</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Listed As:</p>
                                                <p class="text-14 color-b-blue font-weight-400">For Sale</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Price:</p>
                                                <p class="text-14 color-b-blue font-weight-400">€458,000.00</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Type:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Apartment</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Subtype:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Ground Floor Apartment</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Total Size:</p>
                                                <p class="text-14 color-b-blue font-weight-400">4556 M</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Bedroom:</p>
                                                <p class="text-14 color-b-blue font-weight-400">3</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Bathroom:</p>
                                                <p class="text-14 color-b-blue font-weight-400">3</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Status/Completion:
                                                </p>
                                                <p class="text-14 color-b-blue font-weight-400">Completed Construction </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Commission:</p>
                                                <p class="text-14 color-b-blue font-weight-400">1%</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Address:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Comandante Izarduy 57, Vilanova
                                                    Del Camí, La Guardia De Jaén, Barcelona, Biscay, 08788</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Description:</p>
                                                <p class="text-14 color-b-blue font-weight-400">This 3-bed with a loft, 2-bath
                                                    home in the gated community of The Hideout has it all. From the open floor
                                                    plan to the abundance of light from the windows, this home is perfect for
                                                    entertaining. The living room and dining room have vaulted ceilings and a
                                                    beautiful fireplace. You will love spending time on the deck taking in the
                                                    beautiful views. In the kitchen, you'll find stainless steel appliances and
                                                    a tile backsplash, as well as a breakfast bar.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column ">
                                                <p class="text-14 color-primary font-weight-700">Property Legal Document:</p>
                                                <div class="download_format sidebar_download-format mt-1">
                                                    <img src= "{{ asset('img/certificate.svg') }}" width="14"/>
                                                    property NA-NOC Documnet .PDF
                                                    <i class="icon-Download ms-4"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column ">
                                                <p class="text-14 color-primary font-weight-700">Project Broacher:</p>
                                                <div class="download_format sidebar_download-format mt-1">
                                                    <img src= "{{ asset('img/certificate.svg') }}" width="14"/>
                                                    ME_Brochure.PDF
                                                    <i class="icon-Download ms-4"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div
                        class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-center pt-30 py-30">
                        <div class="form-group position-relative gap-12 d-flex align-items-center">
                            <button type="button"
                                class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                data-toggle="modal" data-target="#cancelbutton">
                                <i class=" icon-message me-2 icon-20"></i>
                                Send Message</button>
                        </div>
                    </div>
                    @push('scripts')

                    @endpush
                @endsection

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

                <script src="https://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                <script src="https://unpkg.com/popper.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>


                <script>
                    function openSidebar() {
                        document.getElementById("mySidebar_one").style.width = "755px";
                        document.getElementById("main").style.marginLeft = "0px";
                    }

                    function closeSidebar() {
                        document.getElementById("mySidebar_one").style.width = "0";
                        document.getElementById("main").style.marginLeft = "0";
                    }
                </script>
