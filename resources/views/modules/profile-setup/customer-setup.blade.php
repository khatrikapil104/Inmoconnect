@extends('layouts.app')
@section('content')
@section('title')
    Profile Setup Inmoconnect
@endsection

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<!-- <link  rel="stylesheet" href="{{ asset('assets/css/app.css') }}"> -->


<div
    class="profile-setup b-color-background vh-100 step-form-pading position-relative d-lg-flex d-block align-items-center justify-content-center">

    <!-- //////////////back-button/////////////// -->
    <a href="#" class="d-flex align-items-center pb-20 backBtn d-none"><img
            src="{{ asset('img/Breadcrumb_icon.svg') }}" alt="image" class="pe-2">
        <span class="text-14 font-weight-400 lineheight-16  color-b-blue">
            {{ trans('messages.profile-silder.go_back') }}
        </span>
    </a>

    <div class="step-form-agent w-100">
        <div class="row row-height-agent">

            <!-- //////////////slider///////////////////// -->
            <div class="col-lg-5 pe-2 pe-lg-0 ps-2 order_responsive">
                <div
                    class="left-fixed-agent justify-content-center align-items-center h-100 d-flex flex-column b-color-Gradient">
                    <h2
                        class="text-32 font-weight-700 color-white-grey text-capitalize lineheight-42 profile-set-up-text">
                        {{ trans('messages.profile-silder.profile_setup') }}
                    </h2>
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

            <!-- ////////////////step-form///////////// -->
            <div class="col-lg-7 ps-2 ps-lg-0 pe-2">
                <div class="right-fixed-agent d-flex flex-column py-35 position-relative">
                    <span
                        class="heading_text_account">{{ str_replace(' ', '-', ucwords(str_replace('-', ' ', $user->role->name))) }}
                        Account </span>

                    <!-- ///////logo////////// -->
                    <div class="crm-image text-center">
                        <img src="{{ asset('img/login-logo.png') }}" alt="image" class="logo-step-form h-auto">
                    </div>
                    <div class="tab-content" style="display:block;">

                        <!-- /////////////////step-1/////////////////////// -->
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
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
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
                                            'isRequired' => true,
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
                                </div>
                                <div style="list-style: none; display: block" class="text-end">
                                    <button type="button"
                                        class="next-btn small-button next-btn1 border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  gardient-button locateAddressBtn">{{ trans('messages.profile-setup.Next') }}
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- //////////////////step-2///////////////////// -->
                        <div class="tab-pane" id="step2">
                            <form action="javascript:void(0)" id="step2Form">
                                <h2
                                    class="text-24 font-weight-700 text-capitalize color-primary text-center lineheight-30 mt-30">
                                    {{ trans('messages.profile-setup.Property_Preference') }}</h2>
                                <div class="row">
                                    {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css select_not-checkbox">
                                        <x-forms.crm-single-select-ajax-based :fieldData="[
                                            'name' => 'category_id',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Property_Category') . ':',
                                            'id' => 'category_id',
                                            'options' => $categories ?? [],
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'placeholder' => trans('messages.profile-setup.Property_Category'),
                                            'isRequired' => true,
                                            'selected' => !empty($user->category_id) ? $user->category_id : '',
                                        ]" />
                                    </div> --}}
                                    <div
                                        class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css select_with_checkbox mt-1 mt-sm-0">
                                        <x-forms.crm-multi-select :fieldData="[
                                            'name' => 'type_id',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Property_Type') . ':',
                                            'id' => 'type_id',
                                            'options' => $types ?? [],
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'placeholder' => trans('messages.profile-setup.Property_Type'),
                                            'isRequired' => true,
                                            'selected' => !empty($user->type_id) ? explode(',', $user->type_id) : [],
                                        ]" />
                                    </div>
                                    <div
                                        class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1 select_with_checkbox">
                                        <x-forms.crm-multi-select :fieldData="[
                                            'name' => 'situation_id',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Property_Situation') . ':',
                                            'id' => 'situation_id',
                                            'options' => $situations ?? [],
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'placeholder' => trans('messages.profile-setup.Property_Situation'),
                                            'isRequired' => true,
                                            'selected' => !empty($user->situation_id)
                                                ? explode(',', $user->situation_id)
                                                : [],
                                        ]" />
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-1">
                                        <x-forms.crm-single-select-ajax-based :fieldData="[
                                            'name' => 'preferred_location',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Preferred_Location') . ':',
                                            'id' => 'preferred_location',
                                            'minimumResultsForSearch' => 1,
                                            'ajaxUrl' => route('user.getStates'),
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'placeholder' => trans('messages.profile-setup.Preferred_Location'),
                                            'isRequired' => true,
                                            'selectedVal' => !empty($user->preferred_location)
                                                ? $user->preferred_location
                                                : '',
                                            'selectedName' => !empty($user->preferred_location)
                                                ? $user->preferred_location
                                                : '',
                                        ]" />
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css">
                                        @php
                                        $selectedFeatures = $user->features->pluck('id')->toArray();
                                        $selectedSubFeature = !empty($user->userPropertyFeature)
                                    ? $user->userPropertyFeature->pluck('sub_feature_id')->toArray()
                                    : [];
        
                                    @endphp

                                        <x-forms.crm-checkbox :fieldData="[
                                            'name' => 'feature_id',
                                            'hasLabel' => false, // Set to false as we are handling the label outside the component
                                            'id' => 'feature_id',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            //'help' => 'Please enter your name',
                                            'isRequired' => false,
                                            'options' => $features,
                                            'selected' => $selectedFeatures,
                                            'selectedSubFeature' => $selectedSubFeature,
                                            'hasIcon' => true,
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Feature_Option') . ':',
                                            'hasPropertyFeature' => true,
                                        ]">
                                        </x-forms.crm-checkbox>
                                    </div>
                                    <div
                                        class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-1 block_responsive">
                                        <x-forms.crm-range-slider :fieldData="[
                                            'name' => 'size',
                                            'hasLabel' => true,
                                            'label' => trans('Sq m') . ':',
                                            'id' => 'size',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => false,
                                            'minId' => 'min_size',
                                            'minName' => 'min_size',
                                            'maxName' => 'max_size',
                                            'maxId' => 'max_size',
                                            'minRange' => '0',
                                            'maxRange' => !empty($maxPriceAndSize->max_size)
                                                ? round($maxPriceAndSize->max_size + 1, 2)
                                                : '10000',
                                            'minValue' => !empty($user->min_size) ? $user->min_size : '',
                                            'maxValue' => !empty($user->max_size) ? $user->max_size : '',
                                            'suffix' => ' m²',
                                        ]" />
                                    </div>
                                    <div
                                        class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-1 block_responsive">
                                        <x-forms.crm-range-slider :fieldData="[
                                            'name' => 'priceRangeSlider',
                                            'hasLabel' => true,
                                            'label' => trans('messages.profile-setup.Budget Range') . ':',
                                            'id' => 'priceRangeSlider',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'isRequired' => false,
                                            'minId' => 'min_price',
                                            'minName' => 'min_price',
                                            'maxName' => 'max_price',
                                            'maxId' => 'max_price',
                                            'minRange' => '0',
                                            'maxRange' => !empty($maxPriceAndSize->max_price)
                                                ? round($maxPriceAndSize->max_price + 1, 2)
                                                : '100000',
                                            'prefix' => config('Reading.default_currency'),
                                            'minValue' => !empty($user->min_price) ? $user->min_price : '',
                                            'maxValue' => !empty($user->max_price) ? $user->max_price : '',
                                        ]" />
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="button"
                                        class="next-btn small-button next-btn2 border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  gardient-button">{{ trans('messages.profile-setup.Next') }}
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- //////////////////step-3////////////////// -->
                        <div class="tab-pane profileOverviewData px-4" id="step3">
                        </div>
                    </div>

                    <!-- ////////////////progess-bar//////////////////// -->
                    <div class="progress-wrap">
                        <div class="line-progress-bar">
                            <ul class="checkout-bar">
                                <li class="progressbar-dotss_zero">
                                    <span class="progressbar-dots active"></span>
                                    <span
                                        class="color-light-grey-two text-14 font-weight-400 lineheight-18 text-capitalize pt-10">{{ trans('messages.profile-setup.step_one') }}</span>
                                    <span
                                        class="color-b-blue text-14 font-weight-700 lineheight-18 text-capitalize pt-1">{{ trans('messages.profile-setup.Personal_Information') }}</span>
                                    <span
                                        class="color-primary text-14 font-weight-400 lineheight-18 text-capitalize pt-2"
                                        id="change-text">{{ trans('messages.profile-setup.In_Progress') }}</span>
                                </li>
                                <li class="progressbar-dotss_one">
                                    <span class="progressbar-dots"></span>
                                    <span
                                        class="color-light-grey-two text-14 font-weight-400 lineheight-18 text-capitalize pt-10">{{ trans('messages.profile-setup.step_two') }}</span>
                                    <span
                                        class="color-b-blue text-14 font-weight-700 lineheight-18 text-capitalize pt-1">{{ trans('messages.profile-setup.Property_Preference') }}
                                    </span>
                                    <span
                                        class="color-light-grey-three text-14 font-weight-400 lineheight-18 text-capitalize pt-2"
                                        id="change-text_one">{{ trans('messages.profile-setup.Pending') }}
                                    </span>
                                </li>
                                <li class="progressbar-dotss_two">
                                    <span class="progressbar-dots final-dots"></span>
                                    <span
                                        class="color-light-grey-two text-14 font-weight-400 lineheight-18 text-capitalize pt-10">{{ trans('messages.profile-setup.step_three') }}</span>
                                    <span
                                        class="color-b-blue text-14 font-weight-700 lineheight-18 text-capitalize pt-1">{{ trans('messages.profile-setup.Profile_Overview') }}</span>
                                    <span
                                        class="color-light-grey-three text-14 font-weight-400 lineheight-18 text-capitalize pt-2"
                                        id="change-text_two">{{ trans('messages.profile-setup.Pending') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- ///////////////loader///////////////// -->
                    <div id="loader" style="display: none;">
                        <img src="//d2erq0e4xljvr7.cloudfront.net/assets/img/ring.svg">
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
        var removeCertificateUrl = "{{ route(routeNamePrefix() . 'user.removeCertificate', ':id') }}";
        var saveProfileSetupUrl = "{{ route(routeNamePrefix() . 'user.storeProfileSetupData') }}";
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script src="{{ asset('assets/js/modules/profile-setup/agent-setup.js') }}"></script>
@endpush
@endsection
