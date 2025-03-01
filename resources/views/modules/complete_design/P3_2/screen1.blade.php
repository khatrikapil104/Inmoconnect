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

                <!-- ////////////////////////////////dashboard-card///////////////////////////////////////////// -->

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-3 pb-0 mb-md-3 pb-md-1 mb-lg-0 pb-lg-0 "
                        onclick="window.open('','_self')">
                        <div class="dashboard-card">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="dashboard-top">
                                    <h4
                                        class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                        My Listed Properties</h4>
                                    <h2 class="lineheight-42 text-32 font-weight-700 color-primary">100</h2>
                                </div>
                                <div class="dashboard-bottom">
                                    <div class="dashboard-img">
                                        <img src="/img/dashboard-1.svg" alt="image" class="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-3 pb-0 mb-md-3 pb-md-1 mb-lg-0 pb-lg-0 " onclick="">
                        <div class="dashboard-card">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="dashboard-top">
                                    <h4
                                        class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                        My Network Agents</h4>
                                    <h2 class="lineheight-42 text-32 font-weight-700 color-primary">30</h2>
                                </div>
                                <div class="dashboard-bottom">
                                    <div class="dashboard-img">
                                        <img src="/img/dashboard-2.svg" alt="image" class="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 " onclick="">
                        <div class="dashboard-card">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="dashboard-top">
                                    <h4
                                        class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                        My Customers</h4>
                                    <h2 class="lineheight-42 text-32 font-weight-700 color-primary">15</h2>
                                </div>
                                <div class="dashboard-bottom">
                                    <div class="dashboard-img">
                                        <img src="/img/dashboard-3.svg" alt="image" class="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ////////////////////////////////end-dashboard-card/////////////////////////////////////////////// -->

                <!-- //////////////////////////////dashboard-table////////////////////////////////////////////////////////////////// -->
                <div class="row mt-20">
                    <div class="col-lg-8">
                        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 ">
                            <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">New
                                Listed Properties
                            </h4>
                        <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                            <div class="search_button">
                                <div class="form-group mt-3 position-relative">
                                    <div class="input-group input-group-sm dashboard_input-search">
                                        <span
                                            class="input-group-text  icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                        <input type="text" name="userListingFilterData[search]"
                                            class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                            placeholder="Search here..." value="">
                                    </div>
                                </div>
                            </div>
                            <div class="search-select"></div>
                        </div>
                        <div class="table_dashboard">
                            <table id="example" class="display dashboard_table" style="width:100%; overflow-y:scroll;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Property Reference</th>
                                        <th>Property Title</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>City</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image" class="me-3"></td>
                                        <td><span>RT48</span></td>
                                        <td>Awesome Interior Apartment</td>
                                        <td>17/8/2023 <br>12:24 AM</td>
                                        <td>€4580.00</td>
                                        <td>Almería</td>
                                        <td><a href="#"> <i class="  icon-eye icon-20 color-b-blue"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image" class="me-3"></td>
                                        <td><span>RT48</span></td>
                                        <td>Awesome Interior Apartment</td>
                                        <td>17/8/2023 <br>12:24 AM</td>
                                        <td>€4580.00</td>
                                        <td>Almería</td>
                                        <td> <i class="  icon-eye icon-20 color-b-blue"></i></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image" class="me-3"></td>
                                        <td><span>RT48</span></td>
                                        <td>Awesome Interior Apartment</td>
                                        <td>17/8/2023 <br>12:24 AM</td>
                                        <td>€4580.00</td>
                                        <td>Almería</td>
                                        <td> <i class="  icon-eye icon-20 color-b-blue"></i></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image" class="me-3"></td>
                                        <td><span>RT48</span></td>
                                        <td>Awesome Interior Apartment</td>
                                        <td>17/8/2023 <br>12:24 AM</td>
                                        <td>€4580.00</td>
                                        <td>Almería</td>
                                        <td> <i class="  icon-eye icon-20 color-b-blue"></i></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image" class="me-3"></td>
                                        <td><span>RT48</span></td>
                                        <td>Awesome Interior Apartment</td>
                                        <td>17/8/2023 <br>12:24 AM</td>
                                        <td>€4580.00</td>
                                        <td>Almería</td>
                                        <td> <i class="  icon-eye icon-20 color-b-blue"></i></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image" class="me-3"></td>
                                        <td><span>RT48</span></td>
                                        <td>Awesome Interior Apartment</td>
                                        <td>17/8/2023 <br>12:24 AM</td>
                                        <td>€4580.00</td>
                                        <td>Almería</td>
                                        <td> <i class="  icon-eye icon-20 color-b-blue"></i></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image" class="me-3"></td>
                                        <td><span>RT48</span></td>
                                        <td>Awesome Interior Apartment</td>
                                        <td>17/8/2023 <br>12:24 AM</td>
                                        <td>€4580.00</td>
                                        <td>Almería</td>
                                        <td> <i class="  icon-eye icon-20 color-b-blue"></i></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image" class="me-3"></td>
                                        <td><span>RT48</span></td>
                                        <td>Awesome Interior Apartment</td>
                                        <td>17/8/2023 <br>12:24 AM</td>
                                        <td>€4580.00</td>
                                        <td>Almería</td>
                                        <td> <i class="  icon-eye icon-20 color-b-blue"></i></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image" class="me-3"></td>
                                        <td><span>RT48</span></td>
                                        <td>Awesome Interior Apartment</td>
                                        <td>17/8/2023 <br>12:24 AM</td>
                                        <td>€4580.00</td>
                                        <td>Almería</td>
                                        <td> <i class="  icon-eye icon-20 color-b-blue"></i></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image" class="me-3"></td>
                                        <td><span>RT48</span></td>
                                        <td>Awesome Interior Apartment</td>
                                        <td>17/8/2023 <br>12:24 AM</td>
                                        <td>€4580.00</td>
                                        <td>Almería</td>
                                        <td> <i class="  icon-eye icon-20 color-b-blue"></i></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image" class="me-3"></td>
                                        <td><span>RT48</span></td>
                                        <td>Awesome Interior Apartment</td>
                                        <td>17/8/2023 <br>12:24 AM</td>
                                        <td>€4580.00</td>
                                        <td>Almería</td>
                                        <td> <i class="  icon-eye icon-20 color-b-blue"></i></td>
                                    </tr>
                                    <tr>
                                        <td> <img src="/img/profile_1.png" alt="image" class="me-3"></td>
                                        <td><span>RT48</span></td>
                                        <td>Awesome Interior Apartment</td>
                                        <td>17/8/2023 <br>12:24 AM</td>
                                        <td>€4580.00</td>
                                        <td>Almería</td>
                                        <td> <i class="  icon-eye icon-20 color-b-blue"></i></td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                        <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">Property
                            Portfolio Overview
                        </h4>
                    <div class="chart text-center">
                        <canvas id="myChart"
                            style="width:100%;max-width:900px;margin-left:auto;margin-right:auto;"></canvas>
                    </div>
                </div>
            </div>
            <!-- ////////////////////////////upcoming-event////////////////////////////////////////////////////////// -->
            <div class="col-lg-4">
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 ">
                    <div class="d-flex justify-content-between pb-3">
                        <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                            Upcoming Event
                        </h4>
                    <a href="#"
                        class="text-14 font-weight-400 text-capitalize lineheight-18 letter-s-36 color-black border-bottom-black">View
                        All</a>
                </div>
                <div class="dashboard-main-left">
                    <div class="dashboard-left-card pb-3">
                        <div class="small-left-card">
                            <div class="small-card-profile d-flex justify-content-between">
                                <div class="small-card-dot d-flex align-items-center">
                                    <div class="dashboard-round green-color me-2"></div>
                                    <div class="text-14 lineheight-18 font-weight-700 color-b-blue">Call</div>
                                </div>
                                <div class="d-flex">
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                </div>
                            </div>

                            <div class="content" id="main">
                                <div class="text-14 lineheight-18 font-weight-700 color-b-blue pt-12 text-capitalize open-btn"
                                    onclick="openSidebar()">Task Event 01</div>
                                <!-- <button class="open-btn" onclick="openSidebar()">☰ Open Sidebar</button> -->
                            </div>

                            <div class="text-14 lineheight-18 font-weight-400 color-b-blue pt-12">Lorem ipsum dolor
                                sit amet consectetur. Accumsan senectus id non netus odio viverra id arcu
                                suspendisse.</div>
                            <div class="d-flex align-items-center pt-12">
                                <i class="  icon-my_project icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">Project 03
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-12">
                                <i class=" icon-my_calender icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">Monday,
                                    December 18</div>
                            </div>
                            <div class="d-flex align-items-center pt-12">
                                <i class="  icon-time icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">09:30 - 11:00
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-12">
                                <i class="  icon-bell icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">before 30 mins.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-left-card pb-3">
                        <div class="small-left-card">
                            <div class="small-card-profile d-flex justify-content-between">
                                <div class="small-card-dot d-flex align-items-center">
                                    <div class="dashboard-round red-color me-2"></div>
                                    <div class="text-14 lineheight-18 font-weight-700 color-b-blue">Meeting</div>
                                </div>
                                <div class="d-flex">
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                </div>
                            </div>
                            <div class="text-14 lineheight-18 font-weight-700 color-b-blue pt-12 text-capitalize">
                                Task Event 01</div>
                            <div class="text-14 lineheight-18 font-weight-400 color-b-blue pt-12">Lorem ipsum dolor
                                sit amet consectetur. Accumsan senectus id non netus odio viverra id arcu
                                suspendisse.</div>
                            <div class="d-flex align-items-center pt-12">
                                <i class="  icon-my_project icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">Project 03
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-12">
                                <i class=" icon-my_calender icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">Monday,
                                    December 18</div>
                            </div>
                            <div class="d-flex align-items-center pt-12">
                                <i class="  icon-time icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">09:30 - 11:00
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-12">
                                <i class="  icon-bell icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">before 30 mins.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-left-card pb-3">
                        <div class="small-left-card">
                            <div class="small-card-profile d-flex justify-content-between">
                                <div class="small-card-dot d-flex align-items-center">
                                    <div class="dashboard-round blue-color me-2"></div>
                                    <div class="text-14 lineheight-18 font-weight-700 color-b-blue">View</div>
                                </div>
                                <div class="d-flex">
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                </div>
                            </div>
                            <div class="text-14 lineheight-18 font-weight-700 color-b-blue pt-12 text-capitalize">
                                Task Event 01</div>
                            <div class="text-14 lineheight-18 font-weight-400 color-b-blue pt-12">Lorem ipsum dolor
                                sit amet consectetur. Accumsan senectus id non netus odio viverra id arcu
                                suspendisse.</div>
                            <div class="d-flex align-items-center pt-12">
                                <i class="  icon-my_project icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">Project 03
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-12">
                                <i class=" icon-my_calender icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">Monday,
                                    December 18</div>
                            </div>
                            <div class="d-flex align-items-center pt-12">
                                <i class="  icon-time icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">09:30 - 11:00
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-12">
                                <i class="  icon-bell icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">before 30 mins.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-left-card pb-3">
                        <div class="small-left-card">
                            <div class="small-card-profile d-flex justify-content-between">
                                <div class="small-card-dot d-flex align-items-center">
                                    <div class="dashboard-round green-color me-2"></div>
                                    <div class="text-14 lineheight-18 font-weight-700 color-b-blue">Call</div>
                                </div>
                                <div class="d-flex">
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <div class="dashboard_img">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                </div>
                            </div>
                            <div class="text-14 lineheight-18 font-weight-700 color-b-blue pt-12 text-capitalize">
                                Task Event 01</div>
                            <div class="text-14 lineheight-18 font-weight-400 color-b-blue pt-12">Lorem ipsum dolor
                                sit amet consectetur. Accumsan senectus id non netus odio viverra id arcu
                                suspendisse.</div>
                            <div class="d-flex align-items-center pt-12">
                                <i class="  icon-my_project icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">Project 03
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-12">
                                <i class=" icon-my_calender icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">Monday,
                                    December 18</div>
                            </div>
                            <div class="d-flex align-items-center pt-12">
                                <i class="  icon-time icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">09:30 - 11:00
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-12">
                                <i class="  icon-bell icon-16 color-b-blue"></i>
                                <div class="text-14 lineheight-18 font-weight-400 color-b-blue ms-2">before 30 mins.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //////////////////////////////////////end-upcoming-event/////////////////////////////////////////////// -->
        </div>
        <!-- /////////////////////////////////////////////////////end-dashboard-table////////////////////////////////////////////// -->

        <!-- //////////////////////////dashboard-map///////////////////////////////////////////////////////////////// -->
        <div class="row mt-20">
            <div class="col-lg-12">
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 ">
                    <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                        Properties Map
                    </h4>
                <div class="dashboard_map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus"
                        width="100%" height="330" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        </div>

        <!-- ///////////////////////////////end-dashboard-map//////////////////////////////////////////// -->
        </div>
        </div>


        <!-- //////////////////////////////////sidebar-dashboard//////////////////////////////////////////////// -->
        <div class="sidebar_one" id="mySidebar_one">
            <h4 class="modal-title text-18 font-weight-700 lineheight-22 color-b-blue w-100" id="dataFilterModalLabel">Event
                Details</h4>
            <a href="javascript:void(0)" class="close-btn" onclick="closeSidebar()">
                <span aria-hidden="true">
                    <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                </span>
            </a>
            <div class="sidebar_one-content">
                <div class="text-18 font-weight-700 lineheight-32 color-b-blue">Call</div>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.7132 2.1948L10.7267 2.20153L11.6613 2.66723C11.7973 2.73507 11.8789 2.78416 11.9061 2.81449C12.0304 2.95303 12.0361 3.17631 11.8943 3.30508C11.86 3.33625 11.8112 3.3676 11.7481 3.39909L6.69113 5.91728C6.55463 5.98528 6.4451 6.03163 6.36261 6.0563C6.0188 6.15907 5.68951 6.1063 5.36871 5.94628C3.68347 5.10581 1.96143 4.24808 0.202522 3.37309C-0.0715253 3.23657 -0.0637738 2.86851 0.203529 2.73548C1.91309 1.88534 3.62348 1.03345 5.33472 0.179807C5.47089 0.111798 5.58884 0.0651975 5.68851 0.0400356C5.99603 -0.0379829 6.30075 -0.00197201 6.60263 0.148053C7.97354 0.829666 9.34478 1.51296 10.7132 2.1948ZM5.09485 8.7432C4.362 8.38056 3.63101 8.01728 2.89859 7.65329C2.0329 7.22308 1.16523 6.79188 0.29023 6.3596C0.179207 6.30458 0.109047 6.25776 0.0797196 6.2192C-0.0715558 6.02119 0.00244921 5.77729 0.217476 5.6713C0.508613 5.5277 0.791572 5.38764 1.06641 5.25113C1.28956 5.14031 1.50736 5.0318 1.71976 4.92565C1.72208 4.92452 1.72455 4.92368 1.72706 4.92318C1.72822 4.92295 1.72941 4.92278 1.7306 4.92267L1.73301 4.92258C1.73762 4.92258 1.74213 4.92363 1.74625 4.92565L2.98426 5.54069C3.63532 5.86417 4.28076 6.18495 4.92059 6.50299C5.12344 6.60391 5.2757 6.67083 5.37735 6.70375C5.90204 6.87449 6.42245 6.83143 6.93866 6.57457C8.06268 6.01528 9.1708 5.4649 10.263 4.9234C10.2688 4.92041 10.2747 4.92041 10.2805 4.9234C10.752 5.15966 11.2463 5.40522 11.7633 5.66009C11.9345 5.74438 12.0323 5.88328 11.9903 6.0763C11.9676 6.18022 11.9048 6.25785 11.8018 6.30923C10.2527 7.08165 8.55536 7.92613 6.70965 8.8427C6.53714 8.92832 6.4014 8.98277 6.30237 9.00605C6.04355 9.06672 5.79105 9.05143 5.54486 8.96015C5.51419 8.94884 5.3642 8.87653 5.09485 8.7432ZM6.89483 9.53774C6.44162 9.76466 5.96237 9.8089 5.45715 9.67044C5.32913 9.63531 5.18301 9.57662 5.01883 9.49435C3.92169 8.94501 2.83011 8.39954 1.74415 7.85791C1.7363 7.85407 1.72855 7.85407 1.72089 7.85791L0.823524 8.30639L0.202949 8.61643C-0.0663373 8.75112 -0.0683515 9.1216 0.201179 9.25555C1.86057 10.0816 3.53031 10.9161 5.21036 11.7589C5.38437 11.8462 5.5145 11.9045 5.60065 11.934C5.84103 12.0164 6.0914 12.0217 6.35174 11.9497C6.44009 11.9253 6.56772 11.8713 6.73456 11.7877C8.40945 10.9478 10.0843 10.1109 11.759 9.27712C11.9205 9.19686 12.021 9.0732 11.9963 8.88381C11.98 8.75866 11.8972 8.66408 11.784 8.60766C11.2992 8.36652 10.798 8.11628 10.2803 7.85691C10.277 7.8553 10.2737 7.85451 10.2704 7.85453C10.2672 7.85454 10.264 7.85533 10.2608 7.85691C8.82226 8.57445 7.70028 9.13473 6.89483 9.53774Z"
                                fill="#17213A" />
                        </svg>
                        <div class="text-14 lineheight-18 font-weight-700 color-b-blue ms-2 text-capitalize font-style-italic">
                            Project 03</div>
                    </div>
                    <div class="d-flex gap-2 align-items-center  ">
                        <img src="http://127.0.0.1:8000/img/user_one.svg" alt="image" class="#">
                        <div class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                            James Henry: </div>
                        <div
                            class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize text-decoration-underline">
                            James henry</div>

                    </div>
                </div>
                <div class="text-14 color-light-grey font-weight-400 lineheight-20">Wednesday, December 2023</div>
                <div class="text-14 color-light-grey font-weight-400 lineheight-20">15:30 - 6:00</div>
            </div>
            <div class="sidebar_one-content-card">
                <div class="d-flex justify-content-between">
                    <!--////////////////////////////use-select /////////////////////////// -->
                    <div class="small-card-dot d-flex align-items-center">
                        <div class="dashboard-round green-color me-2"></div>
                        <div class="text-14 lineheight-18 font-weight-700 color-b-blue">Call</div>
                    </div>
                    <!-- /////////////////////////////end-use-select////////////////////////// -->
                    <div class="form-group crm-single-select-container position-relative mt-3">
                        <div class="invalid-feedback fw-bold"></div>
                    </div>
                    <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                        <button type="button" class=" icon-edit text-20 b-color-transparent" id="editBtn">
                        </button>
                        <button type="button"
                            class="icon-Delete  text-20 b-color-transparent deletePropertyBtn color-primary" id="deleteBtn"
                            data-id="69" data-name="16989-231042123">
                        </button>
                    </div>
                </div>
                <div class="row pt-15">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css common_css_two">
                        <div class="form-group position-relative">
                            <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Project Name:
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="reference" id="reference" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <!-- /////////////////////////////////use-textarea//////////////////////////////////////////////// -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css common_css_two">
                        <textarea id="textarea_sidebar" name="w3review" rows="4" cols="50"></textarea>
                    </div>
                    <!-- ////////////////////////////////end-textarea///////////////////////////////////////////// -->
                </div>
                <div class="row">
                    <!-- ///////////////////////////////use-select////////////////////////////////////////// -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Project Type:
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_name" id="vendor_name" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <!-- //////////////////////////////////////end-select////////////////////////////////////////// -->
                    <!-- /////////////////////////////////////////use-select/////////////////////////////////////// -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Project Type:
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_name" id="vendor_name" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <!-- ////////////////////////////////end-select////////////////////////////////////////////// -->
                    <!-- ///////////////////////////////////use-select//////////////////////////////////////////// -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Project Type:
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_name" id="vendor_name" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <!-- /////////////////////////////////////end-select///////////////////////////////////////////// -->

                    <!-- /////////////////////////////////////use-datepicker///////////////////////////////////////////  /test/date_picker -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Project Type:
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_name" id="vendor_name" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <!-- ////////////////////////////////////////end-date-picker///////////////////////////////////// -->
                    <!-- ////////////////////////////////////use-select////////////////////////////////////////////// -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Project Type:
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_name" id="vendor_name" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <!-- ////////////////////////////////////////end--select//////////////////////////////////////// -->
                    <!-- //////////////////////////////////////////use-select////////////////////////////////////////// -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Project Type:
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_name" id="vendor_name" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <!-- ///////////////////////////////////////////end-select//////////////////////////////////////// -->

                    <!-- /////////////////////////////////////use-date-picker/////////////////////  /date-picker/date-picker.blade.php -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Project Type:
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_name" id="vendor_name" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <!-- /////////////////////////////////////end-date-picker/////////////////////////////////////// -->

                    <!-- /////////////////////////////////////use-date-picker/////////////////////  /date-picker/date-picker.blade.php -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Project Type:
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_name" id="vendor_name" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <!-- //////////////////////////////////////////end-date-picker/////////////////////////////////// -->
                </div>

                <!-- /////////////////////////modal-button/////////////////////////// -->
                <div class="row">
                    <div class="col-lg-12 common-label-css mt-2 mt-sm-3">
                        <label>Add Attachments</label>
                        <button class="input-file_choose" data-toggle="modal" data-target="#exampleModal"> <span>Choose
                                File</span>
                        </button>
                    </div>
                </div>
                <!-- ///////////////////////////////end-modal-button//////////////////////// -->


                <!-- ////////////////////////////////////svae-button//////////////////////////////////// -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                            <button type="button"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">save</button>
                        </div>
                    </div>
                </div>
                <!-- //////////////////////////////////////////end-save-button///////////////////////////////// -->

                <!-- //////////////////////////////////////////done-button/////////////////////////////////////// -->
                <button
                    class="border-button text-align-start d-flex align-items-center b-color-transparent h-42 border-r-8 border-primary text-14 font-weight-400 lineheight-18 text-capitalize w100 dashboard_sidebar-button justify-content-center color-primary"><span
                        class=" me-2 "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="14"
                            viewBox="0 0 16 14" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.35119 9.34457L14.127 0L16 1.99438L5.35119 13.3333L0 7.63534L1.87299 5.64096L5.35119 9.34457Z"
                                fill="#383192" />
                        </svg></span>Done
                </button>

                <!-- ///////////////////////////////////end-done-button/////////////////////////////////////////// -->


                <!-- ////////////////////////////////modal/////////////////////////////////////////////////// -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_two" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h4 class="modal-title text-18 font-weight-700 lineheight-22 color-b-blue w-100"
                                    id="dataFilterModalLabel">Event
                                    Details</h4>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="modal_body_text">
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left">
                                            <div class="modal_img">
                                                <img src="/img/file_image.svg" alt="image" class="">
                                            </div>
                                            <div class="modal_body-left_text">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    home_henry_realestate</div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                                    1.28 MB</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left">
                                            <div class="modal_img">
                                                <img src="/img/file_image.svg" alt="image" class="">
                                            </div>
                                            <div class="modal_body-left_text">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    home_henry_realestate</div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                                    1.28 MB</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left">
                                            <div class="modal_img">
                                                <img src="/img/file_image.svg" alt="image" class="">
                                            </div>
                                            <div class="modal_body-left_text">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    home_henry_realestate</div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                                    1.28 MB</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left">
                                            <div class="modal_img">
                                                <img src="/img/file_image.svg" alt="image" class="">
                                            </div>
                                            <div class="modal_body-left_text">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    home_henry_realestate</div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                                    1.28 MB</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left">
                                            <div class="modal_img">
                                                <img src="/img/file_image.svg" alt="image" class="">
                                            </div>
                                            <div class="modal_body-left_text">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    home_henry_realestate</div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                                    1.28 MB</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left">
                                            <div class="modal_img">
                                                <img src="/img/file_image.svg" alt="image" class="">
                                            </div>
                                            <div class="modal_body-left_text">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    home_henry_realestate</div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                                    1.28 MB</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left">
                                            <div class="modal_img">
                                                <img src="/img/file_image.svg" alt="image" class="">
                                            </div>
                                            <div class="modal_body-left_text">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    home_henry_realestate</div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                                    1.28 MB</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left">
                                            <div class="modal_img">
                                                <img src="/img/file_image.svg" alt="image" class="">
                                            </div>
                                            <div class="modal_body-left_text">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    home_henry_realestate</div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                                    1.28 MB</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body_card">
                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                        <div class="modal-body_left">
                                            <div class="modal_img">
                                                <img src="/img/file_image.svg" alt="image" class="">
                                            </div>
                                            <div class="modal_body-left_text">
                                                <div
                                                    class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                                    home_henry_realestate</div>
                                                <div
                                                    class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                                    1.28 MB</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-between align-items-center">

                                    <form method="post" enctype="multipart/form-data" class="form_file">
                                        <label for="apply"><input type="file" name="" id="apply"
                                                accept="image/*,.pdf">Upload
                                            From Browser</label>
                                    </form>
                                    <!-- <button type="button" class="modal-button border-r-8 b-color-Gradient text-12 font-weight-400 line-height-23 color-white mt-10 modal-confirm-btn-success">Logout</button> -->
                                    <button type="button"
                                        class="w-150 h-42 gardient-button border-r-8 b-color-Gradient text-12 font-weight-400 line-height-23 color-white mt-10 modal-confirm-btn-success">Logout</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- //////////////////////////////////end-modal////////////////////////////////////////////////// -->

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
            //test for getting url value from attr
            // var img1 = $('.test').attr("data-thumbnail");
            // console.log(img1);

            //test for iterating over child elements
            $(document).ready(function() {
                var langArray = [];
                // Get all options inside the select field
                var options = $('.vodiapicker_one').find('option');

                // Loop through the options and extract information
                options.each(function() {
                    var img = $(this).attr("data-thumbnail");
                    var text = this.innerText;
                    var value = $(this).val();
                    var item = '<li><img src="' + img + '" alt="" value="' + value + '"/><span>' + text +
                        '</span></li>';
                    langArray.push(item);
                });

                $('#a').html(langArray);

                //Set the button value to the first el of the array
                $('.btn-select').html(langArray[0]);
                $('.btn-select').attr('value', 'en');

                //change button stuff on click
                $('#a li').click(function() {
                    var img = $(this).find('img').attr("src");
                    var value = $(this).find('img').attr('value');
                    var text = this.innerText;
                    var item = '<li><img src="' + img + '" alt="" /><span>' + text + '</span></li>';
                    $('.btn-select').html(item);
                    $('.btn-select').attr('value', value);
                    $(".b").toggle();
                    //console.log(value);
                });

                $(".btn-select").click(function() {
                    $(".b").toggle();
                });

                //check local storage for the lang
                var sessionLang = localStorage.getItem('lang');
                if (sessionLang) {
                    //find an item with value of sessionLang
                    var langIndex = langArray.indexOf(sessionLang);
                    $('.btn-select').html(langArray[langIndex]);
                    $('.btn-select').attr('value', sessionLang);
                } else {
                    var langIndex = langArray.indexOf('ch');
                    console.log(langIndex);
                    $('.btn-select').html(langArray[langIndex]);
                    //$('.btn-select').attr('value', 'en');
                }
            });
        </script>
        <script>
            $(document).ready(function() {
                var langArray = [];
                // Get all options inside the select field
                var options = $('.vodiapicker_two').find('option');

                // Loop through the options and extract information
                options.each(function() {
                    var img = $(this).attr("data-thumbnail");
                    var text = this.innerText;
                    var value = $(this).val();
                    var item = '<li><img src="' + img + '" alt="" value="' + value + '"/><span>' + text +
                        '</span></li>';
                    langArray.push(item);
                });

                $('#a1').html(langArray);

                //Set the button value to the first el of the array
                $('.btn-select_one').html(langArray[0]);
                $('.btn-select_one').attr('value', 'en');

                //change button stuff on click
                $('#a1 li').click(function() {
                    var img = $(this).find('img').attr("src");
                    var value = $(this).find('img').attr('value');
                    var text = this.innerText;
                    var item = '<li><img src="' + img + '" alt="" /><span>' + text + '</span></li>';
                    $('.btn-select_one').html(item);
                    $('.btn-select_one').attr('value', value);
                    $(".b1").toggle();
                    //console.log(value);
                });

                $(".btn-select_one").click(function() {
                    $(".b1").toggle();
                });

                //check local storage for the lang
                var sessionLang = localStorage.getItem('lang');
                if (sessionLang) {
                    //find an item with value of sessionLang
                    var langIndex = langArray.indexOf(sessionLang);
                    $('.btn-select_one').html(langArray[langIndex]);
                    $('.btn-select_one').attr('value', sessionLang);
                } else {
                    var langIndex = langArray.indexOf('ch');
                    console.log(langIndex);
                    $('.btn-select_one').html(langArray[langIndex]);
                    //$('.btn-select').attr('value', 'en');
                }
            });
        </script>
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

        <script>
            new DataTable('#example', {
                paging: false,
                scrollCollapse: true,
                scrollY: '400px'
            });
            // chart
            // round corners
            Chart.pluginService.register({
                afterUpdate: function(chart) {
                    for (let i = 1; i < chart.config.data.labels.length; i++) {
                        var arc = chart.getDatasetMeta(0).data[i];
                        arc.round = {
                            x: (chart.chartArea.left + chart.chartArea.right) / 2,
                            y: (chart.chartArea.top + chart.chartArea.bottom) / 2,
                            // radius: (chart.outerRadius + chart.innerRadius) / 2,
                            thickness: (chart.outerRadius - chart.innerRadius) / 2 - 1,
                            backgroundColor: arc._model.backgroundColor
                        }
                    }
                    // Draw rounded corners for first item
                    var arc = chart.getDatasetMeta(0).data[0];
                    arc.round = {
                        x: (chart.chartArea.left + chart.chartArea.right) / 2,
                        y: (chart.chartArea.top + chart.chartArea.bottom) / 2,
                        // radius: (chart.outerRadius + chart.innerRadius) / 2,
                        thickness: (chart.outerRadius - chart.innerRadius) / 2 - 1,
                        backgroundColor: arc._model.backgroundColor
                    }
                },

                afterDraw: function(chart) {
                    for (let i = 1; i < chart.config.data.labels.length; i++) {
                        var ctx = chart.chart.ctx;
                        arc = chart.getDatasetMeta(0).data[i];
                        var startAngle = Math.PI / 2 - arc._view.startAngle;
                        var endAngle = Math.PI / 2 - arc._view.endAngle;
                        ctx.save();
                        ctx.translate(arc.round.x, arc.round.y);
                        ctx.fillStyle = arc.round.backgroundColor;
                        ctx.beginPath();
                        ctx.arc(arc.round.radius * Math.sin(endAngle), arc.round.radius * Math.cos(endAngle), arc
                            .round.thickness, 0, 2 * Math.PI);
                        ctx.closePath();
                        ctx.fill();
                        ctx.restore();
                    }
                    // Draw rounded corners for first item
                    var ctx = chart.chart.ctx;
                    arc = chart.getDatasetMeta(0).data[0];
                    var startAngle = Math.PI / 2 - arc._view.startAngle;
                    var endAngle = Math.PI / 2 - arc._view.endAngle;
                    ctx.save();
                    ctx.translate(arc.round.x, arc.round.y);
                    ctx.fillStyle = arc.round.backgroundColor;
                    ctx.beginPath();
                    // ctx.arc(arc.round.radius * Math.sin(startAngle), arc.round.radius * Math.cos(startAngle), arc.round.thickness, 0, 2 * Math.PI);
                    ctx.arc(arc.round.radius * Math.sin(endAngle), arc.round.radius * Math.cos(endAngle), arc.round
                        .thickness, 0, 2 * Math.PI);
                    ctx.closePath();
                    ctx.fill();
                    ctx.restore();
                },
            });

            var config = {
                type: 'doughnut',
                data: {
                    labels: [
                        'Red',
                        'Green',
                        'blue',
                        'sky',
                        'orange',
                        'lightpink',
                        'yellow'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [300, 100, 200, 100, 100, 400, 150],
                        backgroundColor: [
                            'rgba(241, 66, 27, 1)',
                            'rgba(6, 180, 138, 1)',
                            'rgba(101, 96, 240, 1)',
                            'rgba(111, 211, 247, 1)',
                            'rgba(255, 138, 0, 1)',
                            'rgba(252, 113, 255, 1)',
                            'rgba(243, 196, 76, 1)',
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,

                    legend: {
                        position: 'bottom',
                        // reverse: true,
                        lineWidth: 50,
                        maxWidth: 100,
                        fullWidth: false,
                        labels: {
                            // generateLabels:({e,legentItem,legend})=>{
                            //     console.log(legentItem,'legentItem')
                            //     console.log(legend,'legend')
                            // },
                            usePointStyle: true,
                            boxWidth: 10,
                            padding: 25,
                            fontSize: 14,
                            fontColor: 'rgba(95, 95, 95, 1)',
                            width: 300,
                        }
                    },

                    tooltips: {
                        enabled: true,
                    },
                    cutoutPercentage: 78,
                    rotation: -0.5 * Math.PI,
                    circumference: 2 * Math.PI,
                    // title: {
                    // 	display: true,
                    // 	text: 'Chart.js Doughnut Chart'
                    // },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    elements: {
                        center: {
                            // the longest text that could appear in the center  7,500,000 /10,000,000
                            maxText: '100%',
                            text: '',
                            fontColor: '#000',
                            fontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                            fontStyle: 'bold',
                            minFontSize: 1,
                            maxFontSize: 256,
                        }
                    }
                }
            };
            window.onload = function() {
                var ctx = document.getElementById('myChart').getContext('2d');
                window.myDoughnut = new Chart(ctx, config);
                // window.myDoughnut.generateLegend();
            };
        </script>

        <!-- <script>
            $(document).ready(function() {
                $(".input-file_choose").click(function() {
                    $(".sidebar_one").addClass("overlay_1");
                });
            });
        </script> -->
