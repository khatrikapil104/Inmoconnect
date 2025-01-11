@extends('layouts.app')
@section('content')

@section('title')
    {{ trans('messages.sidebar.Dashboard') }} Inmoconnect
@endsection

<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">


<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="main-content-crm b-color-background  min-vh-100">
    <div class="crm-main-content">

        {{-- /////////////header/////////////////////////////// --}}
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36"
                        onclick="window.open('','_self')">My Company
                    </div>
                </div>
                <div class="header-right-button_one d-flex align-items-center gap-3">
                    <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                        data-bs-toggle="modal" data-bs-target="#Add_Sub-Agent">
                        <i class=" icon-Add-Projct"></i>
                    </div>
                </div>
            </div>
        </div>
        {{-- ////////////////////////end-header//////////////////////////// --}}


        <div class="b-color-white box-shadow-one border-r-8  p-30">
            <div class="d-flex ul_tabs_header justify-content-between align-items-start">
                {{-- ///////////////////////////// tabs-header//////////////////// --}}
                <ul class="tabs">
                    <li class="tab-link current text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                        data-tab="tab-1">Company Information</li>
                    <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                        data-tab="tab-2">Team Management</li>
                    <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                        data-tab="tab-3">Clientele</li>
                    <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                        data-tab="tab-4">Properties</li>
                    <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                        data-tab="tab-5">Settings</li>
                </ul>
                <div class="text-14 font-weight-700  lineheight-18  color-black"><span>03</span> of <span>
                        05</span></div>
            </div>
            {{-- /////////////////////tab-1///////////////////// --}}
            <div id="tab-1" class="tab-content_one current">
                <div class="row">
                    {{-- image-upload --}}
                    <div class="col-md-6 mt-30">
                        <div class="form-group crm-profile-image-upload-container position-relative">
                            <div class="image-container  common-label-css">
                                <!-- Your Image Upload Component -->
                                <div class="form-group crm-profile-image-upload-container position-relative">
                                    <div class="image-container  common-label-css">
                                        <label for="image" class="position-relative image-labelimage cursor-pointer">
                                            <img src="{{ asset('img/default-realinmo.svg') }}" alt="Default Image"
                                                class=" border-r-20" id="image_image" height="150" width="150">
                                            <div
                                                class="badge-overlay position-absolute b-color-blue-opacity-5 w-100 edit-profile-img">
                                                <span
                                                    class="badge badge-pill badge-add d-block color-white text-16 lineheight-20 font-weight-700">Edit</span>
                                            </div>
                                        </label>
                                        <input type="file" id="image_file" name="image" class="d-none mt-3"
                                            accept="image/*" onchange="updateImage(this,'image')">
                                        <div class="invalid-feedback fw-bold"></div>
                                    </div>



                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- company-name --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-4 position-relative">
                            <label for="first_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Company
                                Name:<span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    {{-- company-email  --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-4 position-relative">
                            <label for="first_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Company
                                Email:<span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    {{-- company-mobile-number --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-4 position-relative">
                            <label for="first_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Company
                                Mobile Number:<span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    {{-- tax-number  --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-4 position-relative">
                            <label for="first_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Tax
                                Number:<span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    {{-- company-address --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-4 position-relative">
                            <label for="first_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Company
                                Address:<span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    {{-- city  --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-4 position-relative">
                            <label for="first_name"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">City:<span
                                    class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    {{-- State/Province --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-4 position-relative">
                            <label for="first_name"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">State/Province:<span
                                    class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    {{-- Country --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-4 position-relative">
                            <label for="first_name"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Country:<span
                                    class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    {{-- ZipCode --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-4 position-relative">
                            <label for="first_name"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">ZipCode:<span
                                    class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    {{-- Primary Service Area --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-4 position-relative">
                            <label for="first_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Primary
                                Service Area:<span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    {{-- Professional Title/Role --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-4 position-relative">
                            <label for="first_name"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Professional
                                Title/Role:</label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    {{-- Property Types Specialized In --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-4 position-relative">
                            <label for="first_name"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Property Types
                                Specialized
                                In:<span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    {{-- Property Specialization:  --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-4 position-relative">
                            <label for="first_name"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Property
                                Specialization:</label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    {{-- How Many Properties Are in Your Portfolio?  --}}
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 common-label-css mt-10 block_responsive">
                        <div class="form-group crm-radio-container position-relative mt-3">
                            <label class="text-14 font-weight-400 lineheight-18 color-b-blue">How Many Properties
                                Are
                                in Your Portfolio?:
                                <span class="required">*</span></label>
                            <div class="d-flex crm-radio-custom-filter">
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="total_properties_in_portfolio" id="radiototal_properties_in_portfolio0"
                                        value="1_100" checked="">
                                    <label class="form-check-label" for="radiototal_properties_in_portfolio0">
                                        1-100
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="total_properties_in_portfolio" id="radiototal_properties_in_portfolio1"
                                        value="101_1000">
                                    <label class="form-check-label" for="radiototal_properties_in_portfolio1">
                                        101-1000
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="total_properties_in_portfolio" id="radiototal_properties_in_portfolio2"
                                        value="1000_more">
                                    <label class="form-check-label" for="radiototal_properties_in_portfolio2">
                                        1000+
                                    </label>
                                </div>
                            </div>

                            <div class="invalid-feedback fw-bold"></div>

                        </div>
                    </div>
                    {{-- Total Years of Experience in Real Estate: --}}
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 common-label-css mt-10 block_responsive">
                        <div class="form-group crm-radio-container position-relative mt-3">
                            <label class="text-14 font-weight-400 lineheight-18 color-b-blue">Total Years of
                                Experience
                                in Real Estate: <span class="required">*</span></label>
                            <div class="d-flex crm-radio-custom-filter">


                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="total_years_experiance" id="radiototal_years_experiance0"
                                        value="0_10">
                                    <label class="form-check-label" for="radiototal_years_experiance0">
                                        0-10 Years
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="total_years_experiance" id="radiototal_years_experiance1"
                                        value="10_20" checked="">
                                    <label class="form-check-label" for="radiototal_years_experiance1">
                                        10-20 Years
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="total_years_experiance" id="radiototal_years_experiance2"
                                        value="20_more">
                                    <label class="form-check-label" for="radiototal_years_experiance2">
                                        20+ Years
                                    </label>
                                </div>
                            </div>

                            <div class="invalid-feedback fw-bold"></div>

                        </div>
                    </div>
                    {{-- Number of Current Customers: --}}
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 common-label-css mt-10 block_responsive">
                        <div class="form-group crm-radio-container position-relative mt-3">
                            <label class="text-14 font-weight-400 lineheight-18 color-b-blue">Number of Current
                                Customers: <span class="required">*</span></label>
                            <div class="d-flex crm-radio-custom-filter">


                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="number_of_current_customers" id="radionumber_of_current_customers0"
                                        value="1_100">
                                    <label class="form-check-label" for="radionumber_of_current_customers0">
                                        1-100
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="number_of_current_customers" id="radionumber_of_current_customers1"
                                        value="101_500" checked="">
                                    <label class="form-check-label" for="radionumber_of_current_customers1">
                                        101-500
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="number_of_current_customers" id="radionumber_of_current_customers2"
                                        value="500_more">
                                    <label class="form-check-label" for="radionumber_of_current_customers2">
                                        500+
                                    </label>
                                </div>
                            </div>

                            <div class="invalid-feedback fw-bold"></div>

                        </div>
                    </div>
                    {{-- Average Number of Properties Managed/Listed: --}}
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-10 block_responsive">
                        <div class="form-group crm-radio-container position-relative mt-3">
                            <label class="text-14 font-weight-400 lineheight-18 color-b-blue">Average Number of
                                Properties Managed/Listed: <span class="required">*</span></label>
                            <div class="d-flex crm-radio-custom-filter">


                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="avg_number_properties_managed" id="radioavg_number_properties_managed0"
                                        value="1_100">
                                    <label class="form-check-label" for="radioavg_number_properties_managed0">
                                        1-100 Properties
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="avg_number_properties_managed" id="radioavg_number_properties_managed1"
                                        value="101_1000" checked="">
                                    <label class="form-check-label" for="radioavg_number_properties_managed1">
                                        101-1000 Properties
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="avg_number_properties_managed" id="radioavg_number_properties_managed2"
                                        value="1001_3000">
                                    <label class="form-check-label" for="radioavg_number_properties_managed2">
                                        1001-3000 Properties
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="avg_number_properties_managed" id="radioavg_number_properties_managed3"
                                        value="3000_more">
                                    <label class="form-check-label" for="radioavg_number_properties_managed3">
                                        3000+ Properties
                                    </label>
                                </div>
                            </div>

                            <div class="invalid-feedback fw-bold"></div>

                        </div>
                    </div>

                </div>
                <div class="col-md-12 pt-40  d-flex gap-4 justify-content-between justify-content-sm-start">
                    <button type="button"
                        class="border-r-8 b-color-Gradient color-white text-12 font-weight-400 w-150 h-42 line-height-15 gardient-button saveBtn"
                        id="saveBtn">
                        Update
                    </button>
                    <button type="button"
                        class="b-color-transparent color-primary text-14 font-weight-700 lineheight-18 cancelBtn "
                        id="cancelBtn">
                        Cancel
                    </button>
                </div>
            </div>

            {{-- ////////////////////tab-2/////////////////// --}}
            <div id="tab-2" class="tab-content_one">

                <!-- /////////////////////////////////table//////////////////////////////////////////////// -->
                <div class="dashboard-card_one_phase_four ">
                    <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2 flex-wrap">
                        <div class="search_button">
                            <div class="form-group mt-3 position-relative">
                                <div class="input-group input-group-sm dashboard_input-search">
                                    <span
                                        class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                    <input type="text" name="search_input_property"
                                        class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                        placeholder="{{ trans('messages.agent-dashboard.search_here') }}"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="header-right-button_one d-flex align-items-center gap-3 ">
                                <a href="#"
                                    class="color-primary text-14 font-weight-400 text-decoration-underline"
                                    data-bs-toggle="modal" data-bs-target="#manage_sub_agent">
                                    Manage Sub-Agents
                                </a>
                            </div>
                            <div class="search-select common-label-css without_checkbox">
                                <x-forms.crm-single-select :fieldData="[
                                    'name' => 'sort_by_property',
                                    'hasLabel' => false,
                                    'label' => trans('messages.search_filter.Sort_By'),
                                    'id' => 'sort_by_property',
                                    'options' => [
                                        'high_low' => trans('messages.agent-dashboard.sort_high_to_low'),
                                        'low_high' => trans('messages.agent-dashboard.sort_low_to_high'),
                                        'newest' => trans('messages.agent-dashboard.sort_newest'),
                                        'oldest' => trans('messages.agent-dashboard.sort_oldest'),
                                    ],
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'placeholder' => trans('messages.search_filter.Sort_By'),
                                    'isRequired' => false,
                                ]" />
                            </div>
                        </div>
                    </div>
                    <div class="table_customer-three pt-10">
                        <table id="example_one" class="display  dashboard_edit_one" style="width:100%; ">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Agent Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Add Date</th>
                                    <th>City</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"></td>
                                    <td>James Henry</td>
                                    <td>jameshenry@gmail.om</td>
                                    <td>+31 1234 567 890</td>
                                    <td>18/11/2022</td>
                                    <td>Almería</td>
                                    <td>Owner</td>
                                    <td class="change_active"><span
                                            class="span_active span_complate_one">Active</span>
                                    </td>
                                    <td><a href="#"> <i class="  icon-eye icon-20 color-b-blue"></i></a></td>
                                </tr>

                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"></td>
                                    <td>James Henry</td>
                                    <td>jameshenry@gmail.om</td>
                                    <td>+31 1234 567 890</td>
                                    <td>18/11/2022</td>
                                    <td>Almería</td>
                                    <td>Sub-Agent</td>
                                    <td class="change_active"><span class="span_pending">Inactive</span></td>
                                    <td><button class="b-color-transparent" data-bs-toggle="modal"
                                            data-bs-target="#edit_sub_agent">
                                            <i class=" icon-edit icon-18 color-b-blue"></i></button></td>
                                    <i class="  icon-edit icon-18 color-b-blue"></i></button></td>
                                </tr>

                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"></td>
                                    <td>James Henry</td>
                                    <td>jameshenry@gmail.om</td>
                                    <td>+31 1234 567 890</td>
                                    <td>18/11/2022</td>
                                    <td>Almería</td>
                                    <td>Sub-Agent</td>
                                    <td class="change_active"><span class="span_pending">Inactive</span></td>
                                    <td><button class="b-color-transparent" data-bs-toggle="modal"
                                            data-bs-target="#edit_sub_agent">
                                            <i class=" icon-edit icon-18 color-b-blue"></i></button></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"></td>
                                    <td>James Henry</td>
                                    <td>jameshenry@gmail.om</td>
                                    <td>+31 1234 567 890</td>
                                    <td>18/11/2022</td>
                                    <td>Almería</td>
                                    <td>Sub-Agent</td>
                                    <td class="change_active"><span
                                            class="span_active span_complate_one">Active</span>
                                    </td>
                                    <td><a href="#" class="" data-bs-toggle="modal"
                                            data-bs-target="#delete_modal"> <i
                                                class="  icon-Delete icon-20 color-b-blue"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ///////////////////////////////////end-table/////////////////////////////////////////////// -->

            </div>

            {{-- //////////////////tab-3/////////////////// --}}
            <div id="tab-3" class="tab-content_one">
                <!-- /////////////////////////////////table//////////////////////////////////////////////// -->
                <div class="dashboard-card_one_phase_four ">


                    <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2 flex-wrap">
                        <div class="search_button">
                            <div class="form-group mt-3 position-relative">
                                <div class="input-group input-group-sm dashboard_input-search">
                                    <span
                                        class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                    <input type="text" name="search_input_property"
                                        class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                        placeholder="{{ trans('messages.agent-dashboard.search_here') }}"
                                        value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table_customer-three pt-10">
                        <table id="example_one" class="display  dashboard_edit_one" style="width:100%; ">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Clientele Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Added By</th>
                                    <th>Add Date</th>
                                    <th>City</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"></td>
                                    <td>Mona Lott</td>
                                    <td>monalott@gmail.om</td>
                                    <td>+31 1234 567 890</td>
                                    <td>James Henry</td>
                                    <td>18/11/2022</td>
                                    <td>Almería</td>
                                    <td><a href="#"> <i class="  icon-eye icon-20 color-b-blue"></i></a></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"></td>
                                    <td>Mona Lott</td>
                                    <td>monalott@gmail.om</td>
                                    <td>+31 1234 567 890</td>
                                    <td>James Henry</td>
                                    <td>18/11/2022</td>
                                    <td>Almería</td>
                                    <td><a href="#"> <i class="  icon-eye icon-20 color-b-blue"></i></a></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"></td>
                                    <td>Mona Lott</td>
                                    <td>monalott@gmail.om</td>
                                    <td>+31 1234 567 890</td>
                                    <td>James Henry</td>
                                    <td>18/11/2022</td>
                                    <td>Almería</td>
                                    <td><a href="#"> <i class="  icon-eye icon-20 color-b-blue"></i></a></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"></td>
                                    <td>Mona Lott</td>
                                    <td>monalott@gmail.om</td>
                                    <td>+31 1234 567 890</td>
                                    <td>James Henry</td>
                                    <td>18/11/2022</td>
                                    <td>Almería</td>
                                    <td><a href="#"> <i class="  icon-eye icon-20 color-b-blue"></i></a></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"></td>
                                    <td>Mona Lott</td>
                                    <td>monalott@gmail.om</td>
                                    <td>+31 1234 567 890</td>
                                    <td>James Henry</td>
                                    <td>18/11/2022</td>
                                    <td>Almería</td>
                                    <td><a href="#"> <i class="  icon-eye icon-20 color-b-blue"></i></a></td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ///////////////////////////////////end-table/////////////////////////////////////////////// -->
            </div>

            {{-- ///////////////////tab-4////////////////// --}}
            <div id="tab-4" class="tab-content_one">
                <div class="dashboard-card_one_phase_four ">

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
                    <div class="table_dashboard table_dashboard_phase_four">
                        <table id="example" class="display dashboard_table" style="width:100%; overflow-y:scroll;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Property Reference</th>
                                    <th>Property Title</th>
                                    <th>Add Date</th>
                                    <th>Added By</th>
                                    <th>City</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image" width="36" height="36">
                                    </td>
                                    <td><span>RT48</span></td>
                                    <td><span>TY35 Avenue GGLondon Center TY35 Avenue GGLondon Center</span> </td>
                                    <td>17/8/2023 <br>12:24 AM</td>
                                    <td>James Henry</td>
                                    <td>Almería</td>
                                    <td>€4580.00</td>
                                    <td><a href="#"> <i class="  icon-eye icon-20 color-b-blue"></i></a></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image" width="36" height="36">
                                    </td>
                                    <td><span>RT48</span></td>
                                    <td><span>TY35 Avenue GGLondon Center TY35 Avenue GGLondon Center</span> </td>
                                    <td>17/8/2023 <br>12:24 AM</td>
                                    <td>James Henry</td>
                                    <td>Almería</td>
                                    <td>€4580.00</td>
                                    <td><a href="#"> <i class="  icon-eye icon-20 color-b-blue"></i></a></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image" width="36" height="36">
                                    </td>
                                    <td><span>RT48</span></td>
                                    <td><span>TY35 Avenue GGLondon Center TY35 Avenue GGLondon Center</span> </td>
                                    <td>17/8/2023 <br>12:24 AM</td>
                                    <td>James Henry</td>
                                    <td>Almería</td>
                                    <td>€4580.00</td>
                                    <td><a href="#"> <i class="  icon-eye icon-20 color-b-blue"></i></a></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image" width="36" height="36">
                                    </td>
                                    <td><span>RT48</span></td>
                                    <td><span>TY35 Avenue GGLondon Center TY35 Avenue GGLondon Center</span> </td>
                                    <td>17/8/2023 <br>12:24 AM</td>
                                    <td>James Henry</td>
                                    <td>Almería</td>
                                    <td>€4580.00</td>
                                    <td><a href="#"> <i class="  icon-eye icon-20 color-b-blue"></i></a></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image" width="36" height="36">
                                    </td>
                                    <td><span>RT48</span></td>
                                    <td><span>TY35 Avenue GGLondon Center TY35 Avenue GGLondon Center</span> </td>
                                    <td>17/8/2023 <br>12:24 AM</td>
                                    <td>James Henry</td>
                                    <td>Almería</td>
                                    <td>€4580.00</td>
                                    <td><a href="#"> <i class="  icon-eye icon-20 color-b-blue"></i></a></td>
                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image" width="36" height="36">
                                    </td>
                                    <td><span>RT48</span></td>
                                    <td><span>TY35 Avenue GGLondon Center TY35 Avenue GGLondon Center</span> </td>
                                    <td>17/8/2023 <br>12:24 AM</td>
                                    <td>James Henry</td>
                                    <td>Almería</td>
                                    <td>€4580.00</td>
                                    <td><a href="#"> <i class="  icon-eye icon-20 color-b-blue"></i></a></td>
                                </tr>

                            </tbody>

                        </table>
                    </div>

                </div>
                <div id="tab-5" class="tab-content_one">
                    ghi
                </div>
            </div>
        </div>
    </div>



    <!-- //////////////////////////////////////////////////Add_sub-agent////////////////////////////////////// -->
    <div class="modal fade" id="Add_Sub-Agent" tabindex="-1" aria-labelledby="Add_Sub-AgentModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
            <div class="modal-content border-r-8 border-0 b-color-white ">
                <div class="modal-header border-0 modal-header_file pb-0">
                    <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="Add_Sub-AgentModalLabel">Add Sub-Agent</h5>
                    <button type="button" class="close b-color-transparent cursor-pointer end-0"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                        </span>
                    </button>
                </div>
                <div class="modal-body modal-header_file">
                    <div class="row">
                        {{-- First Name --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <div class="form-group  position-relative">
                                <label for="reference"
                                    class="text-14 font-weight-400 lineheight-18 color-b-blue">First
                                    Name: <span class="required">*</span></label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="reference" id="reference" value="" placeholder="">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>

                        {{-- Last Name --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <div class="form-group position-relative">
                                <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Last
                                    Name:<span class="required">*</span></label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="reference" id="reference" value="" placeholder="">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>

                        {{-- email --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <div class="form-group  position-relative">
                                <label for="reference"
                                    class="text-14 font-weight-400 lineheight-18 color-b-blue">email:
                                    <span class="required">*</span></label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="reference" id="reference" value="" placeholder="">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>

                        {{-- Mobile Number --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <div class="form-group position-relative">
                                <label for="reference"
                                    class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                    Number: <span class="required">*</span></label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="reference" id="reference" value="" placeholder="">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>

                        {{-- button --}}
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                            <div class="form-group position-relative">
                                <button type="button"
                                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">invite
                                    Agent</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////end- Add_sub-agent ////////////////////////////////// -->

    <!-- //////////////////////////////////////////////////edit_sub-agent////////////////////////////////////// -->
    <div class="modal fade" id="edit_sub_agent" tabindex="-1" aria-labelledby="edit_sub_agentModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
            <div class="modal-content border-r-8 border-0 b-color-white ">
                <div class="modal-header border-0 modal-header_file pb-0">
                    <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="edit_sub_agent">Edit invited Sub-Agent</h5>
                    <button type="button" class="close b-color-transparent cursor-pointer end-0"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                        </span>
                    </button>
                </div>
                <div class="modal-body modal-header_file">
                    <div class="row">
                        {{-- First Name --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <div class="form-group  position-relative">
                                <label for="reference"
                                    class="text-14 font-weight-400 lineheight-18 color-b-blue">First
                                    Name: <span class="required">*</span></label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="reference" id="reference" value="" placeholder="">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>

                        {{-- Last Name --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <div class="form-group position-relative">
                                <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Last
                                    Name:<span class="required">*</span></label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="reference" id="reference" value="" placeholder="">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>

                        {{-- email --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <div class="form-group position-relative">
                                <label for="reference"
                                    class="text-14 font-weight-400 lineheight-18 color-b-blue">email:
                                    <span class="required">*</span></label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="reference" id="reference" value="" placeholder="">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>

                        {{-- Mobile Number --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <div class="form-group  position-relative">
                                <label for="reference"
                                    class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                    Number: <span class="required">*</span></label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="reference" id="reference" value="" placeholder="">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>

                        {{-- button --}}
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                            <div class="form-group position-relative gap-12 d-flex align-items-center">

                                <button type="button"
                                    class=" w-150 h-42 border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary"
                                    data-toggle="modal" data-target="#cancelbutton">Cancel Invitation</button>
                                <button type="button"
                                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white ">Save</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////end- edit_sub-agent ////////////////////////////////// -->

    {{-- //////////////////////manage-sub-agent/////////////////////////////// --}}

    <div class="modal fade" id="manage_sub_agent" tabindex="-1" aria-labelledby="manage_sub_agentModalLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-width-change_one modal-dialog-centered" role="document">
            <div class="modal-content border-r-8 border-0 b-color-white  ">
                <div class="modal-header border-0 modal-header_file pb-0">
                    <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="dataFilterModalLabel">sub-agent access</h4>
                    <button type="button" class="close b-color-transparent cursor-pointer end-0"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                        </span>
                    </button>
                </div>
                <p class="pt-10 text-center text-14 color-black font-weight-400 text-capitalize lineheight-18">Manage
                    your
                    Sub-agents access behalf your company.</p>
                <div class="modal-body modal-header_file">
                    <div class="modal-body_select-agent">
                        <table id="example"
                            class="display dashboard_table dashboard_tables_edit_phase_four dashboard_table_edit_two">
                            <thead>
                                <tr>
                                    <th>Agent</th>
                                    <th class="table-extra-width_one">managing projects</th>
                                    <th class="table-extra-width_one">accessing clientele</th>
                                    <th class="table-extra-width_one">property posting</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span
                                            class="table-agent_name">Brian Baker</span>
                                    </td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>

                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span
                                            class="table-agent_name">Brian Baker</span>
                                    </td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>

                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span
                                            class="table-agent_name">Brian Baker</span>
                                    </td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>

                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span
                                            class="table-agent_name">Brian Baker</span>
                                    </td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>

                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span
                                            class="table-agent_name">Brian Baker</span>
                                    </td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>

                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span
                                            class="table-agent_name">Brian Baker</span>
                                    </td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>

                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span
                                            class="table-agent_name">Brian Baker</span>
                                    </td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>

                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span
                                            class="table-agent_name">Brian Baker</span>
                                    </td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>

                                </tr>
                                <tr>
                                    <td> <img src="/img/profile_1.png" alt="image"><span
                                            class="table-agent_name">Brian Baker</span>
                                    </td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>
                                    <td><input type="checkbox" name="checkbox" class="checkbox" /></td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                        <button type="button"
                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Save</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ////////////////////end-sub-agent////////////////////////////////// --}}

    {{-- /////////////////////////delete-modal////////////////////////////// --}}
    <div class="modal fade " id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modalLabel"
        aria-modal="true">
        <div class="modal-dialog modal-width-change_five modal-dialog-centered" role="document">
            <div class="modal-content  border-r-8 border-0 b-color-white p-30">
                <div class="modal-header border-0 justify-content-end p-0">
                    <button type="button" class="close b-color-transparent cursor-pointer" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path id="Union" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 10.0544L2.05438 16L0 13.9456L5.94561 8L6.64978e-06 2.05438L2.05439 0L8 5.94561L13.9456 0L16 2.05438L10.0544 8L16 13.9456L13.9456 16L8 10.0544Z"
                                    fill="black" fill-opacity="0.5"></path>
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="modal-body p-0 text-center mt10">
                    <div class="modal-body-text">
                        <i class="icon-success-icon modalIcons text60" height="60" width="60"
                            style="display:none;"></i>
                        <i class="icon-error-icon modalIcons text60" height="60" width="60"
                            style="display:none;"></i>
                        <i class="icon-warning-icon modalIcons text60" height="60" width="60"
                            style="display:none;"></i>
                        <i class="icon-error-icon1 modalIcons text60" height="60" width="60"
                            style=""></i>

                        <h4
                            class="text-18 lineheight-22 font-weight-700 letter-s-48 color-b-blue opacity-8 pt-30 modal-message">
                            You are attempting to Remove Agent “Ivana Tinkle from your company.”</h4>
                        <div class="modal-confirm" style="">

                            <h4
                                class="text-18 lineheight-22 font-weight-700 letter-s-48 color-primary pt-10 modal-confirm-message">
                                Are you sure?</h4>
                            <p
                                class="text-12 font-weight-400 lineheight-15 opacity-5 color-black pt-20 modal-confirm-secondary-text">
                                Remove Ivana Tinkle</p>

                            <button type="button"
                                class="gardient-button w-150 h-42 border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white mt-10 modal-confirm-btn-success">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- //////////////////////////////end-delete-modal/////////////////////// --}}




@endsection


<script src="https://unpkg.com/popper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('ul.tabs li').click(function() {
            var tab_id = $(this).attr('data-tab');

            $('ul.tabs li').removeClass('current');
            $('.tab-content_one').removeClass('current');

            $(this).addClass('current');
            $("#" + tab_id).addClass('current');
        })

    })
</script>

<script>
    $(document).on('click', '.image-labelimage', function(e) {
        e.preventDefault();
        $('#image_file').click();
    });

    function updateImage(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // Update the image source
                $('#' + id + '_image').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);

            // Change the badge to 'Edit'
            $('#' + id + '_image').parents('.image-labelimage').find('.badge-overlay span').text("Edit");
        }
    }
</script>
