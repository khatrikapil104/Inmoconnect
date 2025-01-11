@extends('layouts.app')
@section('content')
@section('title')
    {{ trans('messages.dashboard.Edit_Profile') }} Inmoconnect
@endsection



<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">

        <!-- ///////////////breadcrumb////////////////// -->
        <x-forms.crm-breadcrumb :fieldData="[
            ['url' => route(routeNamePrefix() . 'user.profile'), 'label' => trans('messages.dashboard.Edit_Profile')],
        ]" />

        <div class="b-color-white box-shadow-one border-r-8  p-30">
            <!-- /////tabs///////// -->
            <ul class="tabs">
                <li class="tab-link current text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                    data-tab="tab-1">Company Information </li>
                <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                    data-tab="tab-2">Team Member</li>
            </ul>

            {{-- Company Information --}}
            <div id="tab-1" class="tab-content_one current">
                <form action="" id="tab1Form" type="post" enctype="multipart/form-data">
                    <div class="row">
                        {{-- image-upload --}}
                        <div class="col-md-6 mt-30">
                            <div class="form-group crm-profile-image-upload-container position-relative">
                                <div class="image-container  common-label-css">
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
                                    <span class="d-block pt-12 text-14">(Supported file Formats: Png, Jpg,<br /> Max.
                                        size: 120 px*120
                                        px)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-30">
                            <p class="color-b-blue text-end font-weight-700">InmoConnect BETA Account Validity:</p>
                            <ul id="timeControl">
                                <li><span id="days"></span>Day</li>
                                <li><span id="hours"></span>Hours</li>
                                <li><span id="minutes"></span>Minutes</li>
                                <li><span id="seconds"></span>Seconds</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        @php
                            $nameArr = !empty($user->name) ? explode(' ', $user->name) : [];
                        @endphp
                        {{-- company-name --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-14">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'first_name',
                                'hasLabel' => true,
                                'label' => 'Company Name:',
                                'id' => 'first_name',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'value' => !empty($nameArr[0]) ? $nameArr[0] : '',
                            ]" />
                        </div>
                        {{-- company-email --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'email',
                                'hasLabel' => true,
                                'label' => 'Company Email:',
                                'id' => 'email',
                                'attributes' => ['readonly'],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'value' => !empty($user->email) ? $user->email : '',
                            ]" />
                        </div>
                        {{-- Company Mobile Number --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'phone',
                                'hasLabel' => true,
                                'label' => 'Company Mobile Number:',
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
                        {{-- tax-number --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'phone',
                                'hasLabel' => true,
                                'label' => 'Tax Number:',
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
                        {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-datepicker :fieldData="[
                                'name' => 'date_of_birth',
                                'hasLabel' => true,
                                'label' => trans('messages.profile-setup.Date_of_Birth') . ':',
                                'inputId' => 'date_of_birth',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'isInputMask' => true,
                                'value' => !empty($user->date_of_birth) ? $user->date_of_birth : '',
                                'endDate' => date('m-d-Y'),
                            ]" />

                        </div> --}}
                        {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-single-select :fieldData="[
                                'name' => 'gender',
                                'hasLabel' => true,
                                'label' => trans('messages.profile-setup.Gender') . ':',
                                'id' => 'gender',
                                'options' => [
                                    'male' => trans('messages.profile-setup.Gender_Male'),
                                    'female' => trans('messages.profile-setup.Gender_Female'),
                                    'other' => trans('messages.profile-setup.Gender_Other'),
                                ],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('messages.profile-setup.Gender'),
                                'isRequired' => true,
                                'selected' => !empty($user->gender) ? $user->gender : '',
                            ]" />
                        </div> --}}

                        {{-- Company Website --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'address',
                                'hasLabel' => true,
                                'label' => 'Company Website:',
                                'id' => 'address',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'value' => !empty($user->address) ? $user->address : '',
                            ]" />
                        </div>
                        {{-- Company Address --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'city',
                                'hasLabel' => true,
                                'label' => 'Company Address:',
                                'id' => 'city',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'value' => !empty($user->city) ? $user->city : '',
                            ]" />
                        </div>
                        {{-- city --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'city',
                                'hasLabel' => true,
                                'label' => 'City:',
                                'id' => 'city',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'value' => !empty($user->city) ? $user->city : '',
                            ]" />
                        </div>
                        {{-- State/Province --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-single-select-ajax-based :fieldData="[
                                'name' => 'state',
                                'hasLabel' => true,
                                'label' => 'State/Province:',
                                'id' => 'state',
                                'minimumResultsForSearch' => 1,
                                'ajaxUrl' => route('user.getStates'),
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('State'),
                                'isRequired' => true,
                                'selectedVal' => !empty($user->state) ? $user->state : '',
                                'selectedName' => !empty($user->state) ? $user->state : '',
                            ]" />
                        </div>
                        {{-- Country --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-single-select :fieldData="[
                                'name' => 'country',
                                'hasLabel' => true,
                                'label' => 'Country:',
                                'id' => 'country',
                                'options' => $countries ?? [],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('Country'),
                                'isRequired' => true,
                                'selected' => !empty($user->country) ? $user->country : '',
                            ]" />
                        </div>
                        {{-- ZipCode --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'zipcode',
                                'hasLabel' => true,
                                'label' => 'ZipCode:',
                                'id' => 'zipcode',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'value' => !empty($user->zipcode) ? $user->zipcode : '',
                            ]" />
                        </div>
                        {{-- Primary Service Area:* --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10 select_with_checkbox">
                            <x-forms.crm-multi-select :fieldData="[
                                'name' => 'languages_spoken',
                                'hasLabel' => true,
                                'label' => 'Primary Service Area:',
                                'id' => 'languages_spoken',
                                'options' => [
                                    'Spanish' => 'Spanish',
                                    'English' => 'English',
                                    'German' => 'German',
                                ],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => 'Languages Spoken',
                                'isRequired' => true,
                                'selected' => !empty($user->languages_spoken)
                                    ? explode(',', $user->languages_spoken)
                                    : [],
                            ]" />
                        </div>
                        {{-- Professional Title/Role --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'field_of_study',
                                'hasLabel' => true,
                                'label' => 'Professional Title/Role:',
                                'id' => 'field_of_study',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => false,
                                'value' => !empty($user->field_of_study) ? $user->field_of_study : '',
                            ]" />
                        </div>

                        {{-- Property Types Specialized In --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10 select_with_checkbox">
                            <x-forms.crm-multi-select :fieldData="[
                                'name' => 'languages_spoken',
                                'hasLabel' => true,
                                'label' => 'Property Types Specialized In:',
                                'id' => 'property_specialized',
                                'options' => [
                                    'Spanish' => 'Spanish',
                                    'English' => 'English',
                                    'German' => 'German',
                                ],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => 'Languages Spoken',
                                'isRequired' => true,
                                'selected' => !empty($user->languages_spoken)
                                    ? explode(',', $user->languages_spoken)
                                    : [],
                            ]" />
                        </div>
                        {{-- Property Specialization --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-text-field :fieldData="[
                                'name' => 'field_of_study',
                                'hasLabel' => true,
                                'label' => 'Property Specialization:',
                                'id' => 'field_of_study',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => false,
                                'value' => !empty($user->field_of_study) ? $user->field_of_study : '',
                            ]" />
                        </div>
                        {{-- Numbers of Sub-Agents --}}
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 common-label-css mt-10 block_responsive">
                            <x-forms.crm-radio-custom-for-profile-setup :fieldData="[
                                'name' => 'total_years_experiance',
                                'hasLabel' => true,
                                'label' => 'Numbers of Sub-Agents:',
                                //'id' => 'total_years_experiance',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'options' => $total_years_experiance ?? [],
                                'selected' => !empty($user->total_years_experiance)
                                    ? $user->total_years_experiance
                                    : '',
                            ]" />
                        </div>
                        {{-- How Many Properties Are in Your Portfolio --}}
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 common-label-css mt-10 block_responsive">
                            <x-forms.crm-radio-custom-for-profile-setup :fieldData="[
                                'name' => 'total_years_experiance',
                                'hasLabel' => true,
                                'label' => 'How Many Properties Are in Your Portfolio?:',
                                //'id' => 'total_years_experiance',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'options' => $total_years_experiance ?? [],
                                'selected' => !empty($user->total_years_experiance)
                                    ? $user->total_years_experiance
                                    : '',
                            ]" />
                        </div>
                        {{-- Total Years of Experience in Real Estate --}}
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 common-label-css mt-10 block_responsive">
                            <x-forms.crm-radio-custom-for-profile-setup :fieldData="[
                                'name' => 'total_years_experiance',
                                'hasLabel' => true,
                                'label' => 'Total Years of Experience in Real Estate:',
                                //'id' => 'total_years_experiance',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'options' => $total_years_experiance ?? [],
                                'selected' => !empty($user->total_years_experiance)
                                    ? $user->total_years_experiance
                                    : '',
                            ]" />
                        </div>
                        {{-- Number of Current Customers --}}
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 common-label-css mt-10 block_responsive">
                            <x-forms.crm-radio-custom-for-profile-setup :fieldData="[
                                'name' => 'total_years_experiance',
                                'hasLabel' => true,
                                'label' => 'Number of Current Customers:',
                                //'id' => 'total_years_experiance',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'options' => $total_years_experiance ?? [],
                                'selected' => !empty($user->total_years_experiance)
                                    ? $user->total_years_experiance
                                    : '',
                            ]" />
                        </div>
                        {{-- Average Number of Properties Managed/Listed --}}
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-10 block_responsive">
                            <x-forms.crm-radio-custom-for-profile-setup :fieldData="[
                                'name' => 'avg_number_properties_managed',
                                'hasLabel' => true,
                                'label' => 'Average Number of Properties Managed/Listed:',
                                //'id' => 'avg_number_properties_managed',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'isRequired' => true,
                                'options' => $avg_number_properties_managed ?? [],
                                'selected' => !empty($user->avg_number_properties_managed)
                                    ? $user->avg_number_properties_managed
                                    : '',
                            ]" />
                        </div>
                    </div>
                    <div class="col-md-12 pt-40  d-flex gap-4 justify-content-between justify-content-sm-start ">
                        <x-forms.crm-button :fieldData="[
                            'text' => trans('messages.dashboard.Update'),
                            'type' => 'button',
                            'class' =>
                                'border-r-8 b-color-Gradient color-white text-14 font-weight-400 small-button line-height-15 gardient-button updateTab1Btn',
                            'id' => 'updateTab1Btn',
                            'attributes' => [],
                        ]" />
                        <x-forms.crm-button :fieldData="[
                            'text' => trans('messages.dashboard.Cancel'),
                            'type' => 'button',
                            'url' => route(routeNamePrefix() . 'user.dashboard'),
                            'class' =>
                                'b-color-transparent color-primary text-14 font-weight-700 lineheight-18 cancelBtn ',
                            'target' => '_self',
                            'id' => 'cancelBtn',
                            'attributes' => [],
                        ]" />
                    </div>
                </form>
            </div>

            {{-- Team Member --}}
            <div id="tab-2" class="tab-content_one">
                <form action="" id="tab2Form" type="post" enctype="multipart/form-data">
                    <div class="row pt-2">
                        <div class="col-lg-4 mt-20">
                            <div class="team_member_card">
                                <div class="d-flex gap-3">
                                    <img src="{{ asset('img/default-user.jpg') }}" alt="image" class="border-r-4"
                                        width="42" height="42">
                                    <div class="">
                                        <h6 class="text-14 font-weight-700 color color-primary">James Henry</h6>
                                        <h6 class="text-14 mt-2 color-black ">Agent</h6>
                                    </div>
                                </div>
                                <div class="mt-20 pt-4 border_team">
                                    <div class="d-flex gap-3 align-items-center">
                                        <i class="icon-Mail icon-18 color-primary"></i>
                                        <a href="#" class="text-14   color-b-blue">James Henry</a>
                                    </div>
                                    <div class="d-flex mt-3 justify-content-between">
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="icon-phone icon-18 color-primary"></i>
                                            <a href="#" class="text-14   color-b-blue">+56 234 567 891</a>
                                        </div>
                                        <div class="">
                                            <i class="icon-message  icon-20 color-b-blue"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-20">
                            <div class="team_member_card">
                                <div class="d-flex gap-3">
                                    <img src="{{ asset('img/default-user.jpg') }}" alt="image" class="border-r-4"
                                        width="42" height="42">
                                    <div class="">
                                        <h6 class="text-14 font-weight-700 color color-primary">James Henry</h6>
                                        <h6 class="text-14 mt-2 color-black ">Agent</h6>
                                    </div>
                                </div>
                                <div class="mt-20 pt-4 border_team">
                                    <div class="d-flex gap-3 align-items-center">
                                        <i class="icon-Mail icon-18 color-primary"></i>
                                        <a href="#" class="text-14   color-b-blue">James Henry</a>
                                    </div>
                                    <div class="d-flex mt-3 justify-content-between">
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="icon-phone icon-18 color-primary"></i>
                                            <a href="#" class="text-14   color-b-blue">+56 234 567 891</a>
                                        </div>
                                        <div class="">
                                            <i class="icon-message  icon-20 color-b-blue"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-20">
                            <div class="team_member_card">
                                <div class="d-flex gap-3">
                                    <img src="{{ asset('img/default-user.jpg') }}" alt="image" class="border-r-4"
                                        width="42" height="42">
                                    <div class="">
                                        <h6 class="text-14 font-weight-700 color color-primary">James Henry</h6>
                                        <h6 class="text-14 mt-2 color-black ">Agent</h6>
                                    </div>
                                </div>
                                <div class="mt-20 pt-4 border_team">
                                    <div class="d-flex gap-3 align-items-center">
                                        <i class="icon-Mail icon-18 color-primary"></i>
                                        <a href="#" class="text-14   color-b-blue">James Henry</a>
                                    </div>
                                    <div class="d-flex mt-3 justify-content-between">
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="icon-phone icon-18 color-primary"></i>
                                            <a href="#" class="text-14   color-b-blue">+56 234 567 891</a>
                                        </div>
                                        <div class="">
                                            <i class="icon-message  icon-20 color-b-blue"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-20">
                            <div class="team_member_card">
                                <div class="d-flex gap-3">
                                    <img src="{{ asset('img/default-user.jpg') }}" alt="image" class="border-r-4"
                                        width="42" height="42">
                                    <div class="">
                                        <h6 class="text-14 font-weight-700 color color-primary">James Henry</h6>
                                        <h6 class="text-14 mt-2 color-black ">Agent</h6>
                                    </div>
                                </div>
                                <div class="mt-20 pt-4 border_team">
                                    <div class="d-flex gap-3 align-items-center">
                                        <i class="icon-Mail icon-18 color-primary"></i>
                                        <a href="#" class="text-14   color-b-blue">James Henry</a>
                                    </div>
                                    <div class="d-flex mt-3 justify-content-between">
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="icon-phone icon-18 color-primary"></i>
                                            <a href="#" class="text-14   color-b-blue">+56 234 567 891</a>
                                        </div>
                                        <div class="">
                                            <i class="icon-message  icon-20 color-b-blue"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-20">
                            <div class="team_member_card">
                                <div class="d-flex gap-3">
                                    <img src="{{ asset('img/default-user.jpg') }}" alt="image" class="border-r-4"
                                        width="42" height="42">
                                    <div class="">
                                        <h6 class="text-14 font-weight-700 color color-primary">James Henry</h6>
                                        <h6 class="text-14 mt-2 color-black ">Agent</h6>
                                    </div>
                                </div>
                                <div class="mt-20 pt-4 border_team">
                                    <div class="d-flex gap-3 align-items-center">
                                        <i class="icon-Mail icon-18 color-primary"></i>
                                        <a href="#" class="text-14   color-b-blue">James Henry</a>
                                    </div>
                                    <div class="d-flex mt-3 justify-content-between">
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="icon-phone icon-18 color-primary"></i>
                                            <a href="#" class="text-14   color-b-blue">+56 234 567 891</a>
                                        </div>
                                        <div class="">
                                            <i class="icon-message  icon-20 color-b-blue"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-20">
                            <div class="team_member_card">
                                <div class="d-flex gap-3">
                                    <img src="{{ asset('img/default-user.jpg') }}" alt="image" class="border-r-4"
                                        width="42" height="42">
                                    <div class="">
                                        <h6 class="text-14 font-weight-700 color color-primary">James Henry</h6>
                                        <h6 class="text-14 mt-2 color-black ">Agent</h6>
                                    </div>
                                </div>
                                <div class="mt-20 pt-4 border_team">
                                    <div class="d-flex gap-3 align-items-center">
                                        <i class="icon-Mail icon-18 color-primary"></i>
                                        <a href="#" class="text-14   color-b-blue">James Henry</a>
                                    </div>
                                    <div class="d-flex mt-3 justify-content-between">
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="icon-phone icon-18 color-primary"></i>
                                            <a href="#" class="text-14   color-b-blue">+56 234 567 891</a>
                                        </div>
                                        <div class="">
                                            <i class="icon-message  icon-20 color-b-blue"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


@push('scripts')
    <script>
        var routeUrlTab1 = "{{ route(routeNamePrefix() . 'user.profileTab1') }}";
        var routeUrlTab2 = "{{ route(routeNamePrefix() . 'user.profileTab2') }}";
        var addCertificateUrl = "{{ route(routeNamePrefix() . 'user.uploadCertificates') }}";
        var removeCertificateUrl = "{{ route(routeNamePrefix() . 'user.removeCertificate', ':id') }}";
    </script>
    <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>
    <script>
        let timeToStart = document.querySelector('#timeToStart')
        let timeControl = document.querySelector('#timeControl')
        let second = 1000
        let minute = second * 60
        let hour = minute * 60
        let day = hour * 24

        let countDown = new Date('Sep 20, 2025 00:00:00').getTime();

        const myRacing = () => {

            let nowDate = new Date().getTime(),
                distance = countDown - nowDate;
            //
            document.getElementById('days').innerText = Math.floor(distance / (day)),
                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

            if (distance < 0) {
                clearInterval(MyTimer);
                timeToStart.innerHTML = 'The camp began ☻'
                timeControl.innerHTML = ''
            }

        }

        MyTimer = setInterval(myRacing, 1000);
    </script>
@endpush
@endsection
