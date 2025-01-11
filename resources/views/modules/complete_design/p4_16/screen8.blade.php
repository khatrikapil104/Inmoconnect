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
                        onclick="openSidebar()">Task Event 11</div>
                    <!-- <button class="open-btn" onclick="openSidebar()">☰ Open Sidebar</button> -->
                </div>


                <div class="sidebar_one" id="mySidebar_one">
                    <h4 class="pb-4 modal-title text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="dataFilterModalLabel">Developer Details</h4>
                    <a href="javascript:void(0)" class="close-btn" onclick="closeSidebar()">
                        <span aria-hidden="true">
                            <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                        </span>
                    </a>
                    <div class="fixed_sidebar">
                        <div class="sidebar_one-content">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="text-18 font-weight-700 lineheight-22 color-b-blue">Marc Roldán</div>
                                <div class="text-18 font-weight-700 lineheight-22 color-b-blue">Harmony Real Estate</div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue">+56 644 005 891
                                </div>
                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue">+56 082 134 039</div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue">marcroldán@gmail.com
                                </div>
                                <div class="text-14 font-weight-400 lineheight-18 color-b-blue">harmony@gmail.com</div>
                            </div>
                        </div>


                        <div class="sidebar_one-content-card-four p-30 pb-0">
                            <div class="modal_customer-details mt-0">
                                <div class="  modal_margin-detail">
                                    <div class="cat_box-small-i">
                                        <h6 class="text-16 font-weight-700 color-primary text-center">Personal Information</h6>
                                    </div>
                                    <div class="d-flex align-items-start justify-content-between pt-20">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" width="60" height="60"
                                            alt="image" class="border-r-8">
                                    </div>
                                    <div class="row text-start">
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Name:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Marc Roldán</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Email:</p>
                                                <p class="text-14 color-b-blue font-weight-400">marcroldán@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Mobile Number:</p>
                                                <p class="text-14 color-b-blue font-weight-400">+56 644 005 891</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Date of Birth:</p>
                                                <p class="text-14 color-b-blue font-weight-400">20/12/1986</p>
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
                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Street Address:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Av Manuel Llaneza, 17</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">City:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Gijon
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">State/Province:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Valencia</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Country:
                                                </p>
                                                <p class="text-14 color-b-blue font-weight-400">Spain</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Zip Code:</p>
                                                <p class="text-14 color-b-blue font-weight-400">33205</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Qualification Type:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Sr. Engineer</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Field of Study/Major:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Lorem Ipsum
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Professional Certifications:
                                                </p>
                                                <p class="text-14 color-b-blue font-weight-400"><span
                                                        class="d-flex align-items-center gap-1"><i
                                                            class="icon-certificate_2 text-18 color-b-blue"></i>
                                                        <i class="icon-Mail text-18 color-b-blue"></i></span></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Government ID:
                                                </p>
                                                <p class="text-14 color-b-blue font-weight-400"><span
                                                        class="d-flex align-items-center gap-1"><i
                                                            class="icon-Mail text-18 color-b-blue"></i>
                                                        Upload_Goverment_Approved_ID.Pdf</span></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal_customer-details mb-0">
                                <div class="  modal_margin-detail ">
                                    <div class="cat_box-small-i">
                                        <h6 class="text-16 font-weight-700 color-primary text-center">Comapny Information</h6>
                                    </div>
                                    <div class="d-flex align-items-start justify-content-between pt-20">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" width="60" height="60"
                                            alt="image" class="border-r-8">
                                    </div>
                                    <div class="row text-start">
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Company Name:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Harmony Real Estate</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Company Email:</p>
                                                <p class="text-14 color-b-blue font-weight-400">harmony@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Company Mobile Number:</p>
                                                <p class="text-14 color-b-blue font-weight-400">+56 082 134 039</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">CIF/NIE:</p>
                                                <p class="text-14 color-b-blue font-weight-400">987623451234561232</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Company Website:</p>
                                                <p class="text-14 color-b-blue font-weight-400">harmonyrealestate.com</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Company Address:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Calle del Capitan Angosto Gomez
                                                    Castrillon, 21</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">City:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Santibáñez De Vidriales</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">State/Province:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Málaga</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Country:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Spain</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Zip Code:
                                                </p>
                                                <p class="text-14 color-b-blue font-weight-400">49610 </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Primary Service Area:
                                                </p>
                                                <p class="text-14 color-b-blue font-weight-400">Spanish </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Professional Title/Role:
                                                </p>
                                                <p class="text-14 color-b-blue font-weight-400">Property Management </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Properties in Portfolio:
                                                </p>
                                                <p class="text-14 color-b-blue font-weight-400">101-1000 Properties </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Number of Current Customers:
                                                </p>
                                                <p class="text-14 color-b-blue font-weight-400">500+ Customers </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Numbers of Sub-Agents:
                                                </p>
                                                <p class="text-14 color-b-blue font-weight-400">11-50 Sub-Agents </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Types Specialized In:
                                                </p>
                                                <p class="text-14 color-b-blue font-weight-400">Apartment, Apartment Duplex
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Years of Experience in Real
                                                    Estate:
                                                </p>
                                                <p class="text-14 color-b-blue font-weight-400">0-10 Years </p>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Average Number of Properties
                                                    Managed/Listed:</p>
                                                <p class="text-14 color-b-blue font-weight-400">3000+ Properties</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Specialization:</p>
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
                        </div>


                    </div>
                    <div
                        class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-center pt-30 py-30">
                        <div class="form-group position-relative gap-4 d-flex align-items-center">
                            <button type="button" class="sidebar_accept_button sidebar_button" data-toggle="modal"
                                data-target="#cancelbutton">
                                <img src="{{ asset('img/right_accept.svg') }}" alt="image" class="me-2 ">
                                Accept</button>
                            <button type="button" class="sidebar_reject_button sidebar_button" data-toggle="modal"
                                data-target="#cancelbutton">
                                <img src="{{ asset('img/cross_reject.svg') }}" alt="image" class="me-2">
                                Reject</button>
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
