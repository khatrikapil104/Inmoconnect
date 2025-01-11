@extends('layouts.app')
@section('content')

@section('title')
    {{ trans('messages.sidebar.Dashboard') }} Inmoconnect
@endsection

<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">


<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="main-content-crm b-color-background  min-vh-100">
    <div class="crm-main-content">
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36"
                        onclick="window.open('','_self')">Profile
                    </div>
                </div>
                <div class="header-right-button_one d-flex align-items-center gap-3">
                </div>
            </div>
        </div>
        <div class="b-color-white box-shadow-one border-r-8  p-30">
            <ul class="tabs">
                <li class="tab-link current text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                    data-tab="tab-1">Personal Information</li>
                <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                    data-tab="tab-2">Professional Information</li>
            </ul>

            <div id="tab-1" class="tab-content_one current">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Your Image Upload Component -->
                        <div class="form-group crm-profile-image-upload-container position-relative">
                            <div class="image-container  common-label-css">
                                <label for="image" class="position-relative image-labelimage cursor-pointer">
                                    <img src="asset('img/default-user.jpg') }}" alt="Default Image" class=" border-r-20"
                                        id="image_image" height="150" width="150">
                                    <div class="badge-overlay position-absolute b-blue-opacity w-100 edit-profile-img">
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
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="first_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">First
                                Name:<span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="first_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">First
                                Name:<span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="first_name" id="first_name" value="" placeholder="">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="first_name"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Professional
                                Certifications:</label>
                            <div class="d-flex justify-content-between">
                                <div class="left-side-certificate d-flex gap-3 d-flex align-items-center">
                                    <div
                                        class="certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                        <div
                                            class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                            Cer_henry_realestate.Pdf
                                            <span class="ps-4"><svg xmlns="http://www.w3.org/2000/svg" width="6"
                                                    height="7" viewBox="0 0 6 7" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z"
                                                        fill="#383192" />
                                                </svg></span>
                                        </div>
                                    </div>
                                    <div
                                        class="certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                                        <div
                                            class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                            Cer_henry_realestate.Pdf
                                            <span class="ps-4"><svg xmlns="http://www.w3.org/2000/svg" width="6"
                                                    height="7" viewBox="0 0 6 7" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z"
                                                        fill="#383192" />
                                                </svg></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="certificate_button">
                                    <button type="button"
                                        class="border-r-8 b-color-Gradient color-white text-12 font-weight-400 w-150 h-32 line-height-15 gardient-button saveBtn"
                                        id="saveBtn">
                                        Add New Certificate
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 pt-40  d-flex gap-4 justify-content-between justify-content-sm-start">
                    <button type="button"
                        class="border-r-8 b-color-Gradient color-white text-12 font-weight-400 small-button line-height-15 gardient-button saveBtn"
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
            <div id="tab-2" class="tab-content_one">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <div class="form-group mt-3 position-relative">
                            <label for="reference"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Reference
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="reference" id="reference" value="" placeholder="">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <div class="form-group mt-3 position-relative">
                            <label for="reference"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Reference
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="reference" id="reference" value="" placeholder="">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <div class="form-group mt-3 position-relative">
                            <label for="reference"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Reference
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="reference" id="reference" value="" placeholder="">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_mobile"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                Number </label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_mobile"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Mobile
                                Number </label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_mobile" id="vendor_mobile" value="" inputmode="text">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <div class="form-group crm-radio-container position-relative mt-3">
                            <label class="text-14 font-weight-400 lineheight-18 color-b-blue">How Many
                                Properties Are in Your Portfolio?<span class="required">*</span></label>
                            <div class="d-flex crm-radio-custom-filter">
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="propertyListingFilterData[bathrooms]"
                                        id="radiopropertyListingFilterData[bathrooms]0" value="0">
                                    <label class="form-check-label" for="radiopropertyListingFilterData[bathrooms]0">
                                        1-100
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="propertyListingFilterData[bathrooms]" id="100_1000" value="0">
                                    <label class="form-check-label" for="100_1000">
                                        101-1000
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="propertyListingFilterData[bathrooms]" id="100_1000_1" value="0">
                                    <label class="form-check-label" for="100_1000_1">
                                        1000+
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <div class="form-group crm-radio-container position-relative mt-3">
                            <label class="text-14 font-weight-400 lineheight-18 color-b-blue">How Many
                                Properties Are in Your Portfolio?<span class="required">*</span></label>
                            <div class="d-flex crm-radio-custom-filter">
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="propertyListingFilterData[bathrooms]"
                                        id="radiopropertyListingFilterData[bathrooms]0" value="0">
                                    <label class="form-check-label" for="radiopropertyListingFilterData[bathrooms]0">
                                        1-100
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="propertyListingFilterData[bathrooms]" id="100_1000" value="0">
                                    <label class="form-check-label" for="100_1000">
                                        101-1000
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="propertyListingFilterData[bathrooms]" id="100_1000_1" value="0">
                                    <label class="form-check-label" for="100_1000_1">
                                        1000+
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <div class="form-group crm-radio-container position-relative mt-3">
                            <label class="text-14 font-weight-400 lineheight-18 color-b-blue">How Many
                                Properties Are in Your Portfolio?<span class="required">*</span></label>
                            <div class="d-flex crm-radio-custom-filter">
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="propertyListingFilterData[bathrooms]"
                                        id="radiopropertyListingFilterData[bathrooms]0" value="0">
                                    <label class="form-check-label" for="radiopropertyListingFilterData[bathrooms]0">
                                        1-100
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="propertyListingFilterData[bathrooms]" id="100_1000" value="0">
                                    <label class="form-check-label" for="100_1000">
                                        101-1000
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="propertyListingFilterData[bathrooms]" id="100_1000_1" value="0">
                                    <label class="form-check-label" for="100_1000_1">
                                        1000+
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-2">
                        <div class="form-group crm-radio-container position-relative mt-3">
                            <label class="text-14 font-weight-400 lineheight-18 color-b-blue">How Many
                                Properties Are in Your Portfolio?<span class="required">*</span></label>
                            <div class="d-flex crm-radio-custom-filter">
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="propertyListingFilterData[bathrooms]"
                                        id="radiopropertyListingFilterData[bathrooms]0" value="0">
                                    <label class="form-check-label" for="radiopropertyListingFilterData[bathrooms]0">
                                        1-100
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="propertyListingFilterData[bathrooms]" id="100_1000" value="0">
                                    <label class="form-check-label" for="100_1000">
                                        101-1000
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="propertyListingFilterData[bathrooms]" id="100_1000" value="0">
                                    <label class="form-check-label" for="100_1000">
                                        101-1000
                                    </label>
                                </div>
                                <div class="input-group radio-group w-100">
                                    <input class="h-4 w-4 text-primary-600 border-gray-300 " type="radio"
                                        name="propertyListingFilterData[bathrooms]" id="100_1000_1" value="0">
                                    <label class="form-check-label" for="100_1000_1">
                                        1000+
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 pt-40  d-flex gap-4 justify-content-between justify-content-sm-start">
                        <button type="button"
                            class="border-r-8 b-color-Gradient color-white text-12 font-weight-400 small-button line-height-15 gardient-button saveBtn"
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
            </div>
        </div>
    </div>
</div>

@endsection
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
