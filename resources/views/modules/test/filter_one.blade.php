@extends('layouts.app')
@section('content')

<style>
    body {
        font-family: "Lato", sans-serif;
    }

    .main-card {
        /* background: #FFFFFF; */
        /* box-shadow: 0px 2px 6px 0px #17213A26; */
        /* padding: 1px 15px 17px 15px; */
        /* border-radius: 8px; */
    }

    button.main-button {
        display: block;
        border: 1px solid #17213A;
        width: 100%;
        margin-top: 1rem !important;
        height: 46px;
        border-radius: 8px;
        background-color: transparent;
        text-align: left;
        padding: 7px;
        color: #17213A;
    }

    #main_content {
        display: none;
        position: absolute;
        background: #FFFFFF;
        box-shadow: 0px 2px 6px 0px #17213A26;
        border-radius: 8px;
        width: 795px;
        right: 0px;
        top: 73px;
    }

    .main_dropdown_button {
        position: relative;
    }

    .vertical-tabs {
        float: left;
        width: 100%;
        padding-top: 8px;
    }

    .vertical-tabs p {
        padding: 14px 12px;
        border-bottom: 1px solid #17213A26;
    }

    .vertical-tabs .tablinks {
        display: block;
        background-color: transparent;
        border-bottom: 1px solid #17213A26;
        width: 100%;
        text-align: left;
        padding: 14px 12px;
        cursor: pointer;
        /* margin-bottom: 5px; */
    }

    .tabcontent {
        display: none;
        padding: 20px 13px 20px 13px;
        /* border: 1px solid #ccc; */
    }

    .tabcontent.active {
        display: block;
    }

    .tab-content_height {
        height: 410px;
        overflow-y: scroll;
        overflow-x: hidden;
        margin-right: -7px;
        padding-right: 8px;
    }

    .custom_input input[type="checkbox"] {
        display: none;
    }

    .custom_input input+label {
        display: inline-block;
        border: 1px solid #383192;
        padding: 8px 15px;
        border-radius: 8px;
        position: relative;
        cursor: pointer;
        color: #383192;
        font-size: 14px;
        font-weight: 700;
        line-height: 18px;
        background-color: transparent;
        top: 0;
        left: 0;
    }

    .custom_input input:checked+label {
        background: linear-gradient(132.96deg, #3AC5EC 0%, #C547E9 102.13%);
        color: #fff;
        border: none;
    }

    .tab_content-small-content {
        padding: 20px 0;
        border-bottom: 1px solid rgb(23 33 58 / 30%);
    }

    .tab_content-small-content p {
        padding-bottom: 8px;
        color: #000000;
        font-size: 14px;
        font-weight: 400;
    }

    button.tablinks.active {
        position: relative;
    }

    button.tablinks.active:after {
        background-image: url(../../img/filter-square.png);
        content: '';
        width: 4px;
        display: block;
        height: 40px;
        position: absolute;
        right: 0;
        top: 4px;
    }

    .form-group {
        position: relative;
    }

    .form-group:after {
        content: '';
        width: 10px;
        height: 10px;
        background-color: #383192;
        border-radius: 50%;
        display: block;
        position: absolute;
        top: -4px;
        right: -3px;
    }

    .tabcontent .form-group:after {
        width: 0;
        height: 0;
    }

    .tabcontent .crm-range-slider-container .input-group {
        max-width: 89px;
    }

    .tabcontent .crm-range-slider-container .input-group input {
        border: 1px solid #383192;
        font-size: 16px;
        line-height: 18px;
        font-weight: 400;
    }

    .tab_content-small-content:first-child {
        padding: 0 0 20px 0;
    }

    .gap-10 {
        gap: 10px;
    }

    .tab_content-small-content:last-child {
        border: none;
    }

    .tab_content-small-content .noUi-connect,
    .noUi-origin {
        right: 9px;
        width: 97%;
    }

    .form-control::placeholder,
    textarea::placeholder {
        color: #17213A !important;
        opacity: 1;
    }

    .form-control::-ms-input-placeholder {
        color: #17213A;
    }

    button.main-button {
        position: relative;
        padding-right: 20px;
        /* Give space for the arrow */
    }

    /* Create the arrow with ::after */
    button.main-button::before {
        content: "";
        position: absolute;
        right: 5px;
        top: 50%;
        width: 8px;
        height: 8px;
        border-right: 2px solid black;
        border-bottom: 2px solid black;
        transform: translate(-50%, -50%) rotate(45deg);
        transition: transform 0.3s;
    }

    /* Rotate the arrow when content is visible */
    button.main-button.active::before {
        transform: translate(-50%, -50%) rotate(-135deg);
    }

    span.select2.select2-container.select2-container--default::before {
        content: "";
        position: absolute;
        right: 5px;
        top: 50%;
        width: 8px;
        height: 8px;
        border-right: 2px solid black;
        border-bottom: 2px solid black;
        transform: translate(-50%, -50%) rotate(45deg);
        transition: transform 0.3s;
        z-index: 1;
    }

    span.select2-container.select2-container--default.select2-container--open:before {
        transform: translate(-50%, -50%) rotate(-135deg);
    }
</style>

<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">

        <!-- ////////////////////////////breadcrum///////////////////////////////////// -->
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36"
                        onclick="window.open('http://127.0.0.1:8000/admin/properties/search','_self')">Property Search
                    </div>
                </div>
                <div class="header-right-button_one d-flex align-items-center gap-3">
                    <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                        data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                        <i class=" icon-property_search"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////end-breadcream////////////////////////////////////// -->

        <div class="modal fade" id="dataFilterModal" tabindex="-1" aria-labelledby="dataFilterModalLabel"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-width-change_one" role="document">
                <div class="modal-content border-r-8 border-0 b-color-white p-30 ">
                    <div class="modal-header border-0 text-center p-0 position-relative mb-3">
                        <h4 class="modal-title text-18 font-weight-700 lineheight-22 color-b-blue w-100"
                            id="dataFilterModalLabel"> Advance Search</h4>
                        <button type="button" class="close b-color-transparent cursor-pointer position-absolute end-0"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body p-0 text-center mt10">
                    <div class="main-card">
                    <div class="row">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 select_with_checkbox">
                            <x-forms.crm-multi-select :fieldData="[
                                'name' => 'user_select2',
                                'hasLabel' => true,
                                'label' => 'Location',
                                'id' => 'user_select2',
                                'options' => [
                                'Spanish' => 'Spanish',
                                                                    'English' => 'English',
                                                                    'German' => 'German'
                                ],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => 'User',
                                'isRequired' => true,
                            ]" />
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group mt-3 position-relative">
                                <!-- <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Property
                            Reference: <span class="required">*</span></label> -->
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="reference" id="reference" placeholder="Name">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group mt-3 position-relative">
                                <!-- <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Property
                            Reference: <span class="required">*</span></label> -->
                                <input type="Email"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="reference" id="reference" value="" placeholder="Email Id">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <x-forms.crm-multi-select :fieldData="[
                                'name' => 'user_select3',
                                'hasLabel' => true,
                                'label' => 'Primary Service Area ',
                                'id' => 'user_select3',
                                'options' => [
                                    'Spanish' => 'Spanish',
                                    'English' => 'English',
                                    'German' => 'German'
                                ],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => 'Primary Service Area ',
                                'isRequired' => true,
                            ]" />
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group main_dropdown_button">
                                <button id="toggleButton" onclick="toggleContent()" class="main-button">More
                                    Filter</button>
                                <div id="main_content">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="vertical-tabs">
                                                <p>Listed by:</p>
                                                <button class="tablinks active"
                                                    onclick="openTab(event, 'tab1')">Personal
                                                    Information:</button>
                                                <button class="tablinks" onclick="openTab(event, 'tab2')">Professional
                                                    Information:</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="tabcontent active" id="tab1">
                                                <div class="tab-content_height">
                                                    <div class="tab_content-small-content">
                                                        <p>Gender:</p>
                                                        <div class="d-flex gap-3">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">male</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">Female</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Other</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab_content-small-content">
                                                        <p>Languages Spoken:</p>
                                                        <div class="d-flex gap-3">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">Spanish</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">English</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">German</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Property Types Specialized In:</p>
                                                        <div class="d-flex gap-10 flex-wrap">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">Apartment</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">House</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Plot</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Commercial</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Countyhouse</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Duplex</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">penthouse</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Townhouse</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Villa</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab_content-small-content">
                                                        <p>Properties Listed in Portfolio:</p>
                                                        <div class="d-flex gap-3">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">1-100</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">101-1000</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">1000+</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Total Years of Experience in Real Estate:</p>
                                                        <div class="d-flex gap-3">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">0-10 Years</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">10-20 Years</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">20+ Years</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Number of Current Customers:</p>
                                                        <div class="d-flex gap-3">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">1-100</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">101-500</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">500+</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Average Number of Properties Managed/Listed:</p>
                                                                <x-forms.crm-range-slider :fieldData="[
                                                                    'name' => 'propertyRangeSlider',
                                                                    'hasLabel' => false,
                                                                    'id' => 'propertyRangeSlider',
                                                                    'attributes' => [],
                                                                    'hasHelpText' => false,
                                                                    'help' => 'Please enter your name',
                                                                    'isRequired' => false,
                                                                    'minId'=>'min_property',
                                                                    'minName'=>'min_property',
                                                                    'maxName'=>'max_property',
                                                                    'maxId'=>'max_property',
                                                                    'minRange'=>'0',
                                                                    'maxRange'=>'10000',
                                                                    'minValue'=> !empty($searchData['min_property']) ? $searchData['min_property'] : '' ,
                                                                    'maxValue'=> !empty($searchData['max_property']) ? $searchData['max_property'] : '' ,
                                                                ]" />
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- ///////////////////////// -->
                                            <div class="tabcontent" id="tab2">
                                                <div class="tab-content_height">
                                                    <div class="tab_content-small-content">
                                                        <p>Property Situation:</p>
                                                        <div class="d-flex gap-3">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">Golf</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">Island</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Beach</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Coast</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Property Subtype:</p>
                                                        <div class="d-flex gap-3 flex-wrap">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">Ground Floor
                                                                    Apartment</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">Middle Floor
                                                                    Apartment</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Top Floor
                                                                    ApartmentBeach</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Penthouse</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Penthouse Duplex</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Duplex</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Ground Floor
                                                                    Studio</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Middle Floor
                                                                    Studio</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Top Floor Studio</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Bedrooms:</p>
                                                        <div class="d-flex gap-3">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">Any</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">+1</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+2</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+3</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Bathrooms:</p>
                                                        <div class="d-flex gap-3">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">Any</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">+1</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+2</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+3</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Total Size:</p>
                                                        <x-forms.crm-range-slider :fieldData="[
                                                            'name' => 'propertyRangeSlider',
                                                            'hasLabel' => false,
                                                            'id' => 'propertyRangeSlider_one',
                                                            'attributes' => [],
                                                            'hasHelpText' => false,
                                                            'help' => 'Please enter your name',
                                                            'isRequired' => false,
                                                            'minId'=>'min_property_one',
                                                            'minName'=>'min_property_one',
                                                            'maxName'=>'max_property_one',
                                                            'maxId'=>'max_property_one',
                                                            'minRange'=>'0',
                                                            'maxRange'=>'10000',
                                                            'minValue'=> !empty($searchData['min_property']) ? $searchData['min_property'] : '' ,
                                                            'maxValue'=> !empty($searchData['max_property']) ? $searchData['max_property'] : '' ,
                                                        ]" />
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Floor No.:</p>
                                                        <div class="d-flex gap-3">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">Any</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">+1</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+2</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+3</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Built:</p>
                                                        <x-forms.crm-range-slider :fieldData="[
                                                            'name' => 'propertyRangeSlider',
                                                            'hasLabel' => false,
                                                            'id' => 'propertyRangeSlider_two',
                                                            'attributes' => [],
                                                            'hasHelpText' => false,
                                                            'help' => 'Please enter your name',
                                                            'isRequired' => false,
                                                            'minId'=>'min_property_one',
                                                            'minName'=>'min_property_one',
                                                            'maxName'=>'max_property_one',
                                                            'maxId'=>'max_property_one',
                                                            'minRange'=>'0',
                                                            'maxRange'=>'10000',
                                                            'minValue'=> !empty($searchData['min_property']) ? $searchData['min_property'] : '' ,
                                                            'maxValue'=> !empty($searchData['max_property']) ? $searchData['max_property'] : '' ,
                                                        ]" />
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Storeys:</p>
                                                        <div class="d-flex gap-3">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">Any</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">+1</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+2</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+3</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>No. of Properties In Build in:</p>
                                                        <div class="d-flex gap-3">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">Any</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">+1</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+2</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+3</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Terrace:</p>
                                                        <x-forms.crm-range-slider :fieldData="[
                                                            'name' => 'propertyRangeSlider',
                                                            'hasLabel' => false,
                                                            'id' => 'propertyRangeSlider_three',
                                                            'attributes' => [],
                                                            'hasHelpText' => false,
                                                            'help' => 'Please enter your name',
                                                            'isRequired' => false,
                                                            'minId'=>'min_property_one',
                                                            'minName'=>'min_property_one',
                                                            'maxName'=>'max_property_one',
                                                            'maxId'=>'max_property_one',
                                                            'minRange'=>'0',
                                                            'maxRange'=>'10000',
                                                            'minValue'=> !empty($searchData['min_property']) ? $searchData['min_property'] : '' ,
                                                            'maxValue'=> !empty($searchData['max_property']) ? $searchData['max_property'] : '' ,
                                                        ]" />
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Levels:</p>
                                                        <div class="d-flex gap-3">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">Any</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">+1</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+2</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+3</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Agency Ref:</p>
                                                        <div class="d-flex gap-3">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">Any</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">+1</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+2</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+3</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">+4</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab_content-small-content">
                                                        <p>Garden/Plot:</p>
                                                        <x-forms.crm-range-slider :fieldData="[
                                                            'name' => 'propertyRangeSlider',
                                                            'hasLabel' => false,
                                                            'id' => 'propertyRangeSlider_four',
                                                            'attributes' => [],
                                                            'hasHelpText' => false,
                                                            'help' => 'Please enter your name',
                                                            'isRequired' => false,
                                                            'minId'=>'min_property_one',
                                                            'minName'=>'min_property_one',
                                                            'maxName'=>'max_property_one',
                                                            'maxId'=>'max_property_one',
                                                            'minRange'=>'0',
                                                            'maxRange'=>'10000',
                                                            'minValue'=> !empty($searchData['min_property']) ? $searchData['min_property'] : '' ,
                                                            'maxValue'=> !empty($searchData['max_property']) ? $searchData['max_property'] : '' ,
                                                        ]" />
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Int. Floor space:</p>
                                                        <x-forms.crm-range-slider :fieldData="[
                                                            'name' => 'propertyRangeSlider',
                                                            'hasLabel' => false,
                                                            'id' => 'propertyRangeSlider_five',
                                                            'attributes' => [],
                                                            'hasHelpText' => false,
                                                            'help' => 'Please enter your name',
                                                            'isRequired' => false,
                                                            'minId'=>'min_property_one',
                                                            'minName'=>'min_property_one',
                                                            'maxName'=>'max_property_one',
                                                            'maxId'=>'max_property_one',
                                                            'minRange'=>'0',
                                                            'maxRange'=>'10000',
                                                            'minValue'=> !empty($searchData['min_property']) ? $searchData['min_property'] : '' ,
                                                            'maxValue'=> !empty($searchData['max_property']) ? $searchData['max_property'] : '' ,
                                                        ]" />
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Listed By:</p>
                                                        <div class="d-flex gap-3">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">Agent</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">Vendor</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Owner</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab_content-small-content">
                                                        <p>Property Amnesties:</p>
                                                        <div class="d-flex gap-3 flex-wrap">
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">Air Conditioning</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">Parking</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Balcony</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test3' id="test3" checked>
                                                                <label for="test3" id="test3">Internet</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">Swimming Pool</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Near Green Zone</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test4' id="test4">
                                                                <label for="test4" id="test4">Electricity</label>
                                                            </div>
                                                            <div class="mb-2 custom_input">
                                                                <input type="checkbox" name='test5' id="test5">
                                                                <label for="test5" id="test5">Shop</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ////////////////////////////////////// -->
        <div class="row propertySearchData tableData">
               
                <div class="main-card border-r-8  mb-15">

    <div class="empty-search border-r-8 b-color-white d-flex align-items-center justify-content-center px-50 py-30 box-shadow-one">
                <div class="row d-flex align-items-center">
            <div class="col-lg-6 empty-order">
                <div class="search-left me-4">
                    <div class="text-20 lineheight-22 color-primary font-weight-700 letter-s-48">Discover Opportunities:<br>Search Agent Listings on InmoConnect</div>
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue pt-10">Why Search Agent Listings on InmoConnect?</div>
                    <ul class="search-list">
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span class="font-weight-700">Diverse Inventory:</span> Access a wide range of properties
    listed by experienced professionals.</li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span class="font-weight-700">Market Insights:</span> Stay informed about market trends and pricing strategies.</li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span class="font-weight-700">Collaboration Potential:</span> Find properties for collaboration and expand your real estate network.</li>
                    </ul>
                    <div class="text14 font-weight-400 lineheight-18 color-b-blue pt-15">Explore the listings now and find your next real estate opportunity on InmoConnect!</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="search-right">
                    <div class="search-right-img text-center mb-5 mb-lg-0">
                        <img src="http://127.0.0.1:8000/img/empty-search.png" alt="image" class="#">
                    </div>
                </div>
            </div>
        </div>
            </div>
</div>            </div>

        <!--  -->
    </div>
</div>
               
                            @push('scripts')
                            <!-- <script>
               var content = document.getElementById("main_content");
  var button = document.getElementById("toggleButton");

  function toggleContent() {
    if (content.style.display === "none" || content.style.display === "") {
      content.style.display = "block"; // Show the content
      button.classList.add("active"); // Rotate arrow
    } else {
      content.style.display = "none"; // Hide the content
      button.classList.remove("active"); // Reset arrow
    }
  }
            </script> -->
                            <script>
                                function openTab(evt, tabName) {
                                    var i, tabcontent, tablinks;

                                    tabcontent = document.getElementsByClassName("tabcontent");
                                    for (i = 0; i < tabcontent.length; i++) {
                                        tabcontent[i].style.display = "none";
                                    }

                                    tablinks = document.getElementsByClassName("tablinks");
                                    for (i = 0; i < tablinks.length; i++) {
                                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                                    }

                                    document.getElementById(tabName).style.display = "block";
                                    evt.currentTarget.className += " active";
                                }

                            </script>
                            <!-- <script> -->
                            <script>
                                var content = document.getElementById("main_content");
                                var button = document.getElementById("toggleButton");

                                function toggleContent() {
                                    if (content.style.display === "none" || content.style.display === "") {
                                        content.style.display = "block"; // Show the content
                                        button.classList.add("active"); // Rotate arrow
                                    } else {
                                        closeContent();
                                    }
                                }

                                function closeContent() {
                                    content.style.display = "none"; // Hide the content
                                    button.classList.remove("active"); // Reset arrow
                                }

                                // Event listener to close the content when clicking outside
                                document.addEventListener('click', function (event) {
                                    var isClickInside = content.contains(event.target) || button.contains(event.target);

                                    if (!isClickInside) {
                                        closeContent();
                                    }
                                });

                                // Prevent the document click handler from closing the content when the button or content is clicked
                                content.addEventListener('click', function (event) {
                                    event.stopPropagation();
                                });

                                button.addEventListener('click', function (event) {
                                    event.stopPropagation();
                                });

                            </script>
                            </script>

                            @endpush
                            @endsection