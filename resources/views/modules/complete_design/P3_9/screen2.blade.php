@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.sidebar.Property_Search') }} Inmoconnect
        @endsection

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

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


                <!-- /////////////////////////////////table//////////////////////////////////////////////// -->

                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20 p-30">
                    <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                        <div class="search_button">
                            <div class="form-group position-relative">
                                <div class="input-group input-group-sm dashboard_input-search">
                                    <span
                                        class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                    <input type="text" name="userListingFilterData[search]"
                                        class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                        placeholder="Search here..." value="">
                                </div>
                            </div>
                        </div>
                        <button type="button"
                            class="Gradient_button w-150 height-40 border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">
                            <i class=" icon-Export me-2 icon-20"></i>Create</button>
                    </div>
                    <div class="table_customer-three pt-10">
                        <table id="example_one" class="display  dashboard_edit_one" style="width:100%; ">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Date Added</th>
                                    <th>Last Login</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span class="ms-2">Brian Baker</span>
                                    </td>
                                    <td>brianbaker@gmail.com</td>
                                    <td>-----</td>
                                    <td>18/11/2022</td>
                                    <td>-----</td>
                                    <td class="change_active"><span class="span_pending">Inactive</span></td>
                                    <td><button class="b-color-transparent" data-toggle="modal" data-target="#todolist"> <i
                                                class="  icon-edit icon-18 color-b-blue"></i></button></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span class="ms-2">Brian Baker</span>
                                    </td>
                                    <td>brianbaker@gmail.com</td>
                                    <td>-----</td>
                                    <td>18/11/2022</td>
                                    <td>-----</td>
                                    <td class="change_active"><span class="span_active span_complate_one">Active</span></td>
                                    <td><button class="b-color-transparent" data-toggle="modal" data-target="#cancelbutton"> <i
                                                class=" icon-Delete icon-18 color-b-blue"></i></button></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span class="ms-2">Brian Baker</span>
                                    </td>
                                    <td>brianbaker@gmail.com</td>
                                    <td>-----</td>
                                    <td>18/11/2022</td>
                                    <td>-----</td>
                                    <td class="change_active"><span class="span_active span_complate_one">Active</span></td>
                                    <td><button data-toggle="modal" data-target="#todolist"> <i
                                                class="  icon-edit icon-18 color-b-blue"></i></button></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span class="ms-2">Brian Baker</span>
                                    </td>
                                    <td>brianbaker@gmail.com</td>
                                    <td>-----</td>
                                    <td>18/11/2022</td>
                                    <td>-----</td>
                                    <td class="change_active"><span class="span_active span_complate_one">Active</span></td>
                                    <td><button data-toggle="modal" data-target="#todolist"> <i
                                                class="  icon-edit icon-18 color-b-blue"></i></button></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span class="ms-2">Brian Baker</span>
                                    </td>
                                    <td>brianbaker@gmail.com</td>
                                    <td>-----</td>
                                    <td>18/11/2022</td>
                                    <td>-----</td>
                                    <td class="change_active"><span class="span_active span_complate_one">Active</span></td>
                                    <td><button data-toggle="modal" data-target="#todolist"> <i
                                                class="  icon-edit icon-18 color-b-blue"></i></button></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span class="ms-2">Brian Baker</span>
                                    </td>
                                    <td>brianbaker@gmail.com</td>
                                    <td>-----</td>
                                    <td>18/11/2022</td>
                                    <td>-----</td>
                                    <td class="change_active"><span class="span_active span_complate_one">Active</span></td>
                                    <td><button data-toggle="modal" data-target="#todolist"> <i
                                                class="  icon-edit icon-18 color-b-blue"></i></button></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span class="ms-2">Brian Baker</span>
                                    </td>
                                    <td>brianbaker@gmail.com</td>
                                    <td>-----</td>
                                    <td>18/11/2022</td>
                                    <td>-----</td>
                                    <td class="change_active"><span class="span_active span_complate_one">Active</span></td>
                                    <td><button data-toggle="modal" data-target="#todolist"> <i
                                                class="  icon-edit icon-18 color-b-blue"></i></button></td>
                                </tr>



                            </tbody>

                        </table>
                    </div>
                </div>


                <!-- ///////////////////////////////////end-table/////////////////////////////////////////////// -->

            </div>
        </div>

        <!-- /////////////////////////////////////////////Add-new project-modal ///////////////////////////////////////////// -->
        <div class="modal fade" id="todolist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Edit Invited Customer</h4>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                <div class="form-group mt-3 position-relative">
                                    <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Group
                                        Name:*<span class="required">*</span></label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="reference" id="reference" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                <div class="form-group mt-3 position-relative">
                                    <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Add
                                        Customer:</label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="reference" id="reference" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                <div class="form-group mt-3 position-relative">
                                    <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Add
                                        Agents:</label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="reference" id="reference" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                <div class="form-group mt-3 position-relative">
                                    <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Select
                                        Your
                                        Group Admin:</label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="reference" id="reference" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                            <div
                                class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                                <div class="form-group position-relative">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Create</button>
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                                        data-toggle="modal" data-target="#cancelbutton">Cancel Invitation</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /////////////////////////////////////////////cancel-button//////////////////////////////////////////////////// -->
        <div class="modal fade" id="cancelbutton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel">Edit Invited Customer</h4>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                <div class="form-group mt-3 position-relative">
                                    <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Group
                                        Name:*<span class="required">*</span></label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="reference" id="reference" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                <div class="form-group mt-3 position-relative">
                                    <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Add
                                        Customer:</label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="reference" id="reference" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                <div class="form-group mt-3 position-relative">
                                    <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Add
                                        Agents:</label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="reference" id="reference" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                                <div class="form-group mt-3 position-relative">
                                    <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Select
                                        Your
                                        Group Admin:</label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="reference" id="reference" value="" placeholder="">
                                    <div class="invalid-feedback fw-bold"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- ///////////////////////////////////end-add-new -project_modal ///////////////////////////////////////// -->
        @push('scripts')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script src="https://unpkg.com/popper.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <!-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> -->

            <!-- <script>
                new DataTable('#example_one');
            </script> -->
        @endpush
    @endsection
