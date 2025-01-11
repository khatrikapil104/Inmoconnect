@extends('layouts.app')
@section('content')
@section('title')
    Profile Setup Inmoconnect
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<!-- <link  rel="stylesheet" href="{{ asset('assets/css/app.css') }}"> -->

<div
    class="profile-setup b-color-background vh-100 step-form-pading position-relative d-flex align-items-lg-center align-items-start justify-content-center ">

    <!-- //////////back-button/////////// -->
    <a href="#" class="d-flex align-items-center pb-20 backBtn d-none"><img
            src="{{ asset('img/Breadcrumb_icon.svg') }}" alt="image" class="pe-2">
        <span class="text-14 font-weight-400 lineheight-16  color-b-blue">
            {{ trans('messages.profile-silder.go_back') }}
        </span>
    </a>

    <div class="step-form-agent w-100">
        <div class="row row-height-agent">

            <!-- ////////////////slider/////////////////// -->
            <div class="col-lg-5 pe-2 pe-lg-0 ps-2 order_responsive">
                <div
                    class="left-fixed-agent justify-content-center align-items-center h-100 d-flex flex-column b-color-Gradient">
                    <h2
                        class="text-32 font-weight-700 color-white-grey text-capitalize lineheight-42 profile-set-up-text">
                        {{ trans('messages.profile-silder.profile_setup') }}
                    </h2>
                    <div class="abc">
                        <div class="agent-slider pb-3 mt-30">
                            <div class="slick-slider">
                                <div class="element element-1">
                                    <div class="slider-img d-flex justify-content-center">
                                        <img src="{{ asset('img/slider-1.svg') }}" alt="image" class="">
                                    </div>
                                    <div
                                        class="pt-20 text-18 font-weight-700 text-capitalize letter-s-36 lineheight-22 color-white text-center">
                                        {{ trans('messages.profile-silder.Connect_with_trusted_professionals') }}
                                    </div>
                                    <div class="pt-12 text-center color-white text-14 lineheight-18 font-weight-400">
                                        {{ trans('messages.profile-silder.third_line_fist_page') }}
                                    </div>
                                </div>
                                <div class="element element-2">
                                    <div class="slider-img d-flex justify-content-center">
                                        <img src="{{ asset('img/slider-2.svg') }}" alt="image" class="">
                                    </div>
                                    <div
                                        class="pt-20 text-18 font-weight-700 text-capitalize letter-s-36 lineheight-22 color-white text-center">
                                        {{ trans('messages.profile-silder.Next_Gen_Property_Management') }}
                                    </div>
                                    <div class="pt-12 text-center color-white text-14 lineheight-18 font-weight-400">
                                        {{ trans('messages.profile-silder.Experience_cutting-edge_design') }}
                                    </div>
                                </div>
                                <div class="element element-3">
                                    <div class="slider-img d-flex justify-content-center">
                                        <img src="{{ asset('img/slider-3.svg') }}" alt="image" class="">
                                    </div>
                                    <div
                                        class="pt-20 text-18 font-weight-700 text-capitalize letter-s-36 lineheight-22 color-white text-center">
                                        {{ trans('messages.profile-slider.Your_Real_Estate_Journey_Starts_Here') }}
                                    </div>
                                    <div class="pt-12 text-center color-white text-14 lineheight-18 font-weight-400">
                                        {{ trans('messages.profile-slider.Embark_connected_journey_at_InmoConnect') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- step-form -->
            <div class=" col-lg-7 ps-2 ps-lg-0 pe-2">
                <div class="right-fixed-agent d-flex flex-column position-relative" style="border-bottom: 33px solid #fff;">
                <div class="dev_age_setup_head mx-3">
                    <span class="dev_age_btn">{{ str_replace(" ","-",ucwords(str_replace("-", " ", $user->role->name))) }} Account</span>
                </div>
                <div class="py-35">
                    <!-- ////logo///// -->
                    <div class="crm-image text-center">
                        <img src="{{ asset('img/login-logo.png') }}" alt="image" class="logo-step-form h-auto">
                    </div>

                    <div class="tab-content" style="display:block;">

                        <!-- //////////////step-1//////////////////////// -->
                        <div class="tab-pane" id="step1">
                            <form action="javascript:void(0)" id="step1Form">
                                <h2
                                    class="text-24 font-weight-700 text-capitalize color-primary text-center lineheight-30 mt-30">
                                    {{ trans('messages.profile-setup.Personal_Information') }}
                                </h2>
                                <div class="form-group crm-profile-image-upload-container position-relative mt-30">
                                    <div class="image-container  common-label-css text-center image-add_personal">
                                        <x-forms.crm-profile-image-upload :attributes="[
                                            'name' => 'image',
                                            'hasLabel' => false,
                                            'label' => trans('messages.dashboard.Profile_Image'),
                                            'id' => 'image',
                                            'attributes' => [],
                                            'selectedImage' => !empty($user->image) ? $user->image : '',
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your password',
                                            'isRequired' => false,
                                        ]" />
                                    </div>
                                </div>
                                @php
                                    $nameArr = !empty($user->name) ? explode(' ', $user->name) : [];
                                @endphp
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-3 mt-sm-0">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'first_name',
                                            'hasLabel' => true,
                                            'label' => trans('messages.dashboard.First_Name') . ':',
                                            'id' => 'first_name',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($nameArr[0]) ? $nameArr[0] : '',
                                        ]" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1 mt-sm-0">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'last_name',
                                            'hasLabel' => true,
                                            'label' => trans('messages.dashboard.Last_Name') . ':',
                                            'id' => 'last_name',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($nameArr[1]) ? $nameArr[1] : '',
                                        ]" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'email',
                                            'hasLabel' => true,
                                            'label' => trans('messages.dashboard.Email') . ':',
                                            'id' => 'email',
                                            'attributes' => ['readonly'],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($user->email) ? $user->email : '',
                                        ]" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'phone',
                                            'hasLabel' => true,
                                            'label' => trans('messages.dashboard.Mobile_Number') . ':',
                                            'id' => 'phone',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'isInputMask' => true,
                                            'maskPattern' => '+(9{1,2}) (999 999 999)',
                                            'value' => !empty($user->phone) ? $user->phone : '',
                                        ]" />
                                    </div>
                                    <div
                                        class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1 small_capitalize">
                                        <x-forms.crm-datepicker :fieldData="[
                                            'name' => 'date_of_birth',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Date_of_Birth') . ':',
                                            'inputId' => 'date_of_birth',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            {{-- 'isRequired' => true, --}}
                                            'isInputMask' => true,
                                            'value' => !empty($user->date_of_birth) ? $user->date_of_birth : '',
                                            'endDate' => date('m-d-Y'),
                                        ]" />

                                    </div>
                                    <div
                                        class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1 without_checkbox">
                                        <x-forms.crm-single-select :fieldData="[
                                            'name' => 'gender',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Gender') . ':',
                                            'id' => 'gender',
                                            'options' => [
                                                'Male' => trans('messages.profile-setup.Gender_Male'),
                                                'Female' => trans('messages.profile-setup.Gender_Female'),
                                                'Other' => trans('messages.profile-setup.Gender_Other'),
                                            ],
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'placeholder' => trans('messages.profile-setup.Gender'),
                                            'isRequired' => true,
                                            'selected' => !empty($user->gender) ? $user->gender : '',
                                        ]" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'address',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Street_Address') . ':',
                                            'id' => 'address',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($user->address) ? $user->address : '',
                                        ]" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'city',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.City') . ':',
                                            'id' => 'city',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($user->city) ? $user->city : '',
                                        ]" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-single-select-ajax-based :fieldData="[
                                            'name' => 'state',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.State') . ':',
                                            'id' => 'state',
                                            'minimumResultsForSearch' => 1,
                                            'ajaxUrl' => route('user.getStates'),
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'placeholder' => trans('messages.profile-setup.State'),
                                            'isRequired' => true,
                                            'selectedVal' => !empty($user->state) ? $user->state : '',
                                            'selectedName' => !empty($user->state) ? $user->state : '',
                                        ]" />
                                    </div>
                                    <div
                                        class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1 select_not-checkbox">
                                        <x-forms.crm-single-select-ajax-based :fieldData="[
                                            'name' => 'country',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Country') . ':',
                                            'id' => 'country',
                                            'options' => $countries ?? [],
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'placeholder' => trans('messages.profile-setup.Country'),
                                            'isRequired' => true,
                                            'selected' => !empty($user->country) ? $user->country : '',
                                        ]" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'zipcode',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Zip_Code') . ':',
                                            'id' => 'zipcode',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($user->zipcode) ? $user->zipcode : '',
                                        ]" />
                                    </div>
                                    <div
                                        class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1 select_with_checkbox">
                                        <x-forms.crm-multi-select :fieldData="[
                                            'name' => 'languages_spoken',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Languages_Spoken') . ':',
                                            'id' => 'languages_spoken',
                                            'options' => [
                                                'Spanish' => 'Spanish',
                                                'English' => 'English',
                                                'German' => 'German',
                                            ],
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'placeholder' => trans('messages.profile-setup.Languages_Spoken'),
                                            'isRequired' => true,
                                            'selected' => !empty($user->languages_spoken)
                                                ? explode(',', $user->languages_spoken)
                                                : [],
                                        ]" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-single-select :fieldData="[
                                            'name' => 'qualification_type',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Qualification_Type') . ':',
                                            'id' => 'qualification_type',
                                            'options' => $qualification_type ?? [],
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'placeholder' => trans('messages.profile-setup.Qualification_Type'),
                                            {{-- 'isRequired' => true, --}}
                                            'selected' => !empty($user->qualification_type)
                                                ? $user->qualification_type
                                                : '',
                                        ]" />
                                    </div>
                                    {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'field_of_study',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Field_of_Study_Major') . ':',
                                            'id' => 'field_of_study',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($user->field_of_study) ? $user->field_of_study : '',
                                        ]" />
                                    </div> --}}
                                    <div
                                        class="col-md-12 common-label-css pt-20 certificateData information_image-upload">
                                        @include('modules.profile-setup.includes.certificate-data')
                                    </div>
                                    <div
                                        class="col-md-12 common-label-css pt-20 governmentData information_image-upload">
                                        @include('modules.profile-setup.includes.government-data')
                                    </div>
                                </div>
                                <div style="list-style: none; display: block" class="text-end">
                                    <button type="button"
                                        class="next-btn small-button next-btn1 border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 gardient-button locateAddressBtn">{{ trans('messages.profile-setup.Next') }}
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- /////////////////step-2//////////////////  -->
                        <div class="tab-pane" id="step2">
                            <form action="javascript:void(0)" id="step2Form">

                                <h2
                                    class="text-24 font-weight-700 text-capitalize color-primary text-center lineheight-30 mt-30 mb-2">
                                    {{ trans('messages.profile-setup.Company_Information') }}
                                </h2>
                                @if(auth()->user()->role->name == 'developer')
                                <div class="row">
                                    <div class="form-group crm-profile-image-upload-container position-relative mt-30">
                                        <div class="image-container  common-label-css text-center image-add_personal">
                                            <x-forms.crm-profile-image-upload :attributes="[
                                                'name' => 'company_image',
                                                'hasLabel' => false,
                                                'label' => trans('messages.dashboard.Profile_Image'),
                                                'id' => 'company_image',
                                                'attributes' => [],
                                                'selectedImage' => !empty(
                                                    $companyDetails->companyDetails->company_image
                                                )
                                                    ? $companyDetails->companyDetails->company_image
                                                    : asset('img/logoplaceholder.svg'),
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your password',
                                                'isRequired' => false,
                                            ]" />
                                            <br>
                                            Add Your Logo Image <br>
                                            (Supported file Formats: Png, Jpg, Max. size: 120 px*120 px)
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'company_name',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Company_Name') . ':',
                                            'id' => 'company_name',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($user->company_name) ? $user->company_name : '',
                                        ]" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'company_email',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.company_email') . ':',
                                            'id' => 'company_email',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($user->company_email) ? $user->company_email : '',
                                        ]" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'company_mobile',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.company_mobile') . ':',
                                            'id' => 'company_mobile',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            {{-- 'isRequired' => true, --}}
                                            'isInputMask' => true,
                                            'maskPattern' => '+(9{1,2}) (999 999 999)',
                                            'value' => !empty($user->company_mobile) ? $user->company_mobile : '',
                                        ]" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'cif_nie',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.cif_nie') . ':',
                                            'id' => 'cif_nie',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            {{-- 'isRequired' => true, --}}
                                            'value' => !empty($user->cif_nie)
                                                ? $user->cif_nie
                                                : '',
                                        ]" />
                                    </div>
                                    

                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'company_website',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.company_website') . ':',
                                            'id' => 'company_website',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            {{-- 'isRequired' => true, --}}
                                            'value' => !empty($user->company_website) ? $user->company_website : '',
                                        ]" />
                                    </div>

                                    {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'company_address',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.company_address') . ':',
                                            'id' => 'company_address',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($user->company_address) ? $user->company_address : '',
                                        ]" />
                                    </div> --}}

                                    {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'company_city',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.company_city') . ':',
                                            'id' => 'company_city',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($user->company_city) ? $user->company_city : '',
                                        ]" />
                                    </div> --}}

                                    {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'company_state',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.company_state_province') . ':',
                                            'id' => 'company_state',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($user->company_sate) ? $user->company_sate : '',
                                        ]" />
                                    </div> --}}

                                    {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'company_country',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.company_country') . ':',
                                            'id' => 'company_country',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($user->company_country) ? $user->company_country : '',
                                        ]" />
                                    </div> --}}

                                    {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'company_zipcode',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.company_zipcode') . ':',
                                            'id' => 'company_zipcode',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($user->company_zipcode) ? $user->company_zipcode : '',
                                        ]" />
                                    </div> --}}

                                    <div
                                        class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1 select_with_checkbox">
                                        <x-forms.crm-multi-select :fieldData="[
                                            'name' => 'primary_service_area',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Primary_Service_Area') . ':',
                                            'id' => 'primary_service_area',
                                            'options' => [
                                                'Spanish' => 'Spanish',
                                                'English' => 'English',
                                                'German' => 'German',
                                            ],
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'placeholder' => trans('messages.profile-setup.Primary_Service_Area'),
                                            'isRequired' => true,
                                            'selected' => !empty($user->primary_service_area)
                                                ? explode(',', $user->primary_service_area)
                                                : [],
                                        ]" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'professional_title',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Professional_Title_Role') . ':',
                                            'id' => 'professional_title',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            {{-- 'isRequired' => true, --}}
                                            'value' => !empty($user->professional_title)
                                                ? $user->professional_title
                                                : '',
                                        ]" />
                                    </div>
                                    <div
                                        class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1 select_with_checkbox">
                                        <x-forms.crm-multi-select :fieldData="[
                                            'name' => 'property_types_specialized',
                                            'hasLabel' => true,
                                            'label' =>
                                                trans('messages.profile-setup.Property_Types_Specialized_In') . ':',
                                            'id' => 'property_types_specialized',
                                            'options' => $types ?? [],
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'placeholder' => trans(
                                                'messages.profile-setup.Property_Types_Specialized_In',
                                            ),
                                            {{-- 'isRequired' => true, --}}
                                            'selected' => !empty($user->property_types_specialized)
                                                ? explode(',', $user->property_types_specialized)
                                                : [],
                                        ]" />
                                    </div>
                                    <!-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-text-field :fieldData="[
                                            'name' => 'property_specialization',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Property_Specialization') . ':',
                                            'id' => 'property_specialization',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'value' => !empty($user->property_specialization)
                                                ? $user->property_specialization
                                                : '',
                                        ]" />
                                    </div> -->
                                    <div
                                        class="col-12 col-sm-12 col-md-12 col-lg-6 common-label-css mt-1 block_responsive">
                                        <x-forms.crm-radio-custom-for-profile-setup :fieldData="[
                                            'name' => 'num_of_sub_agents',
                                            'hasLabel' => true,
                                            'label' => 'Number of Sub Developers' . ':',
                                            //'id' => 'total_properties_in_portfolio',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            {{-- 'isRequired' => true, --}}
                                            'options' => $number_of_sub_agents ?? [],
                                            'selected' => !empty($user->company_sub_agent)
                                                ? $user->company_sub_agent
                                                : '',
                                        ]" />
                                    </div>

                                    <div
                                        class="col-12 col-sm-12 col-md-12 col-lg-6 common-label-css mt-1 block_responsive">
                                        <x-forms.crm-radio-custom-for-profile-setup :fieldData="[
                                            'name' => 'total_properties_in_portfolio',
                                            'hasLabel' => true,
                                            'label' =>
                                                trans(
                                                    'messages.profile-setup.How_Many_Properties_Are_in_Your_Portfolio',
                                                ) . ':',
                                            //'id' => 'total_properties_in_portfolio',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            {{-- 'isRequired' => true, --}}
                                            'options' => $total_properties_in_portfolio ?? [],
                                            'selected' => !empty($user->total_properties_in_portfolio)
                                                ? $user->total_properties_in_portfolio
                                                : '',
                                        ]" />
                                    </div>
                                    <div
                                        class="col-12 col-sm-12 col-md-12 col-lg-6 common-label-css mt-1 block_responsive">
                                        <x-forms.crm-radio-custom-for-profile-setup :fieldData="[
                                            'name' => 'total_years_experiance',
                                            'hasLabel' => true,
                                            'label' =>
                                                trans(
                                                    'messages.profile-setup.Total_Years_of_Experience_in_Real_Estate',
                                                ) . ':',
                                            //'id' => 'total_years_experiance',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            {{-- 'isRequired' => true, --}}
                                            'options' => $total_years_experiance ?? [],
                                            'selected' => !empty($user->total_years_experiance)
                                                ? $user->total_years_experiance
                                                : '',
                                        ]" />
                                    </div>
                                    <!-- <div
                                        class="col-12 col-sm-12 col-md-12 col-lg-6 common-label-css mt-1 block_responsive">
                                        <x-forms.crm-radio-custom-for-profile-setup :fieldData="[
                                            'name' => 'number_of_current_customers',
                                            'hasLabel' => true,
                                            'label' =>
                                                trans('messages.profile-setup.Number_of_Current_Customers') . ':',
                                            //'id' => 'number_of_current_customers',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => true,
                                            'options' => $number_of_current_customers ?? [],
                                            'selected' => !empty($user->number_of_current_customers)
                                                ? $user->number_of_current_customers
                                                : '',
                                        ]" />
                                    </div> -->
                                    <div
                                        class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-1 block_responsive">
                                        <x-forms.crm-radio-custom-for-profile-setup :fieldData="[
                                            'name' => 'avg_number_properties_managed',
                                            'hasLabel' => true,
                                            'label' =>
                                                trans(
                                                    'messages.profile-setup.Average_Number_of_Properties_Managed_Listed',
                                                ) . ':',
                                            //'id' => 'avg_number_properties_managed',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            {{-- 'isRequired' => true, --}}
                                            'options' => $avg_number_properties_managed ?? [],
                                            'selected' => !empty($user->avg_number_properties_managed)
                                                ? $user->avg_number_properties_managed
                                                : '',
                                        ]" />
                                    </div>
                                </div>
                                @else
                                @include('modules.profile-setup.includes.developer-profile-overview',['showingOnSubDeveloperSide' => true])
                                @endif
                                <div class="text-end">
                                    <button type="button"
                                        class="next-btn small-button next-btn2 border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 small-button gardient-button">{{ trans('messages.profile-setup.Next') }}
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- //////////step-3/////////////////////// -->
                        <div class="tab-pane profileOverviewData" id="step3">
                        </div>
                    </div>

                    <!-- ////////////progress-bar/////////// -->
                    <div class="progress-wrap">
                        <div class="line-progress-bar">
                            <ul class="checkout-bar">
                                <li class="progressbar-dotss_zero">
                                    <span class="progressbar-dots active"></span>
                                    <span
                                        class="color-light-grey-two text-14 font-weight-400 lineheight-18 text-capitalize pt-10">{{ trans('messages.profile-setup.step_one') }}
                                    </span>
                                    <span
                                        class="color-b-blue text-14 font-weight-700 lineheight-18 text-capitalize pt-1">{{ trans('messages.profile-setup.Personal_Information') }}</span>
                                    <span
                                        class="color-primary text-14 font-weight-400 lineheight-18 text-capitalize pt-2"
                                        id="change-text">{{ trans('messages.profile-setup.In_Progress') }}
                                    </span>
                                </li>
                                <li class="progressbar-dotss_one">
                                    <span class="progressbar-dots"></span>
                                    <span
                                        class="color-light-grey-two text-14 font-weight-400 lineheight-18 text-capitalize pt-10">{{ trans('messages.profile-setup.step_two') }}</span>
                                    <span
                                        class="color-b-blue text-14 font-weight-700 lineheight-18 text-capitalize pt-1">{{ trans('messages.profile-setup.Company_Information') }}</span>
                                    <span
                                        class="color-light-grey-three text-14 font-weight-400 lineheight-18 text-capitalize pt-2"
                                        id="change-text_one">{{ trans('messages.profile-setup.Pending') }}
                                    </span>
                                </li>
                                <li class="progressbar-dotss_two">
                                    <span class="progressbar-dots final-dots"></span>
                                    <span
                                        class="color-light-grey-two text-14 font-weight-400 lineheight-18 text-capitalize pt-10">{{ trans('messages.profile-setup.step_three') }}
                                    </span>
                                    <span
                                        class="color-b-blue text-14 font-weight-700 lineheight-18 text-capitalize pt-1">{{ trans('messages.profile-setup.Profile_Overview') }}
                                    </span>
                                    <span
                                        class="color-light-grey-three text-14 font-weight-400 lineheight-18 text-capitalize pt-2"
                                        id="change-text_two">{{ trans('messages.profile-setup.Pending') }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- ///////////////loader////////////////// -->
                    <div id="loader" style="display: none;">
                        <img src="//d2erq0e4xljvr7.cloudfront.net/assets/img/ring.svg">
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        var routeUrl = "{{ route('user.postRegister') }}";
        var addCertificateUrl = "{{ route(routeNamePrefix() . 'user.uploadCertificates') }}";
        var addGovCertificateUrl = "{{ route(routeNamePrefix() . 'user.uploadGovtCertificates') }}";
        var removeCertificateUrl = "{{ route(routeNamePrefix() . 'user.removeCertificate', ':id') }}";
        var downloadGovCertificateUrl = "{{ route(routeNamePrefix() . 'user.downloadGovCertificate', ':id') }}";
        var saveProfileSetupUrl = "{{ route(routeNamePrefix() . 'user.storeProfileSetupData') }}";
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script src="{{ asset('assets/js/modules/profile-setup/agent-setup.js') }}"></script>
@endpush
@endsection
