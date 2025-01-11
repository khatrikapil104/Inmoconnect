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
                <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                    data-tab="tab-1">{{ trans('messages.profile-setup.Personal_Information') }} </li>
            </ul>

            <!-- ///////////personal-information/////////// -->
            <div id="tab-1" class="tab-content_one current">
                <form action="" id="tab1Form" type="post" enctype="multipart/form-data">
                    <div class="row">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @php
                            $nameArr = !empty($user->name) ? explode(' ', $user->name) : [];
                        @endphp
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-14">
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
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-14">
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
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
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
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
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
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
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

                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
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
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
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
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
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
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-single-select-ajax-based :fieldData="[
                                'name' => 'state',
                                'hasLabel' => true,
                                'label' => trans('messages.profile-setup.State') . ':',
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
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-single-select :fieldData="[
                                'name' => 'country',
                                'hasLabel' => true,
                                'label' => trans('messages.profile-setup.Country') . ':',
                                'id' => 'country',
                                'options' => $countries ?? [],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('Country'),
                                'isRequired' => true,
                                'selected' => !empty($user->country) ? $user->country : '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
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
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10 select_with_checkbox">
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
                                'placeholder' => 'Languages Spoken',
                                'isRequired' => true,
                                'selected' => !empty($user->languages_spoken)
                                    ? explode(',', $user->languages_spoken)
                                    : [],
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-single-select :fieldData="[
                                'name' => 'qualification_type',
                                'hasLabel' => true,
                                'label' => trans('messages.profile-setup.Qualification_Type') . ':',
                                'id' => 'qualification_type',
                                'options' => $qualification_type ?? [],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('Qualification Type'),
                                'isRequired' => true,
                                'selected' => !empty($user->qualification_type) ? $user->qualification_type : '',
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
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
                        </div>

                        {{-- <div class="col-md-12 common-label-css pt-20 certificateData information_image-upload">
                            @include('modules.profile-setup.includes.certificate-data')

                        </div> --}}
                        {{-- <div class="col-md-12 common-label-css pt-20 certificateData information_image-upload">
                            @include('modules.profile-setup.includes.certificate-data')

                        </div> --}}
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
@endpush
@endsection
