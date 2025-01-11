@extends('layouts.app')
@section('content')
@section('title')
    {{ trans('messages.dashboard.Edit_Profile') }} Inmoconnect
@endsection
<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">

        <!-- ///////////////breadcrumb/////////// -->
        <x-forms.crm-breadcrumb :fieldData="[
            ['url' => route(routeNamePrefix() . 'user.profile'), 'label' => trans('messages.dashboard.Edit_Profile')],
        ]" />

        <div class="b-color-white box-shadow-one border-r-8  p-30">

            <!-- //////////tabs/////////// -->
            <ul class="tabs">
                <li class="tab-link current text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                    data-tab="tab-1">{{ trans('messages.profile-setup.Personal_Information') }}</li>
                <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                    data-tab="tab-2">{{ trans('messages.profile-setup.Property_Preference') }}</li>
            </ul>

            <!-- ///////////personal-information/////////////////// -->
            <div id="tab-1" class="tab-content_one current">
                <form action="" id="tab1Form" type="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mt-30">
                            <!-- Your Image Upload Component -->
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
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10 ">
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
                                'placeholder' => trans('messages.profile-setup.Languages_Spoken') . ':',
                                'isRequired' => true,
                                'selected' => !empty($user->languages_spoken)
                                    ? explode(',', $user->languages_spoken)
                                    : [],
                            ]" />
                        </div>


                    </div>
                    <div class="col-md-12 pt-40  d-flex gap-4 justify-content-between justify-content-sm-start">
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

            <!-- /////////////////property-preference//////////////// -->
            <div id="tab-2" class="tab-content_one">
                <form action="" id="tab2Form" type="post" enctype="multipart/form-data">
                    <div class="row">
                        {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-14 select_not-checkbox">
                            <x-forms.crm-single-select-ajax-based :fieldData="[
                                'name' => 'category_id',
                                'hasLabel' => true,
                                'label' => trans('messages.profile-setup.Property_Category') . ':',
                                'id' => 'category_id',
                                'options' => $categories ?? [],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('Property Category'),
                                'isRequired' => true,
                                'selected' => !empty($user->category_id) ? $user->category_id : '',
                            ]" />
                        </div> --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-14 select_with_checkbox">
                            <x-forms.crm-multi-select :fieldData="[
                                'name' => 'type_id',
                                'hasLabel' => true,
                                'label' => trans('messages.profile-setup.Property_Type') . ':',
                                'id' => 'type_id',
                                'options' => $types ?? [],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => 'Property Type',
                                'isRequired' => true,
                                'selected' => !empty($user->type_id) ? explode(',', $user->type_id) : [],
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10 select_with_checkbox">
                            <x-forms.crm-multi-select :fieldData="[
                                'name' => 'situation_id',
                                'hasLabel' => true,
                                'label' => trans('messages.profile-setup.Property_Situation') . ':',
                                'id' => 'situation_id',
                                'options' => $situations ?? [],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => 'Property Situation',
                                'isRequired' => true,
                                'selected' => !empty($user->situation_id) ? explode(',', $user->situation_id) : [],
                            ]" />
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-10">
                            <x-forms.crm-single-select-ajax-based :fieldData="[
                                'name' => 'preferred_location',
                                'hasLabel' => true,
                                'label' => trans('messages.profile-setup.Preferred_Location') . ':',
                                'id' => 'preferred_location',
                                'minimumResultsForSearch' => 1,
                                'ajaxUrl' => route('user.getStates'),
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('Preferred Location'),
                                'isRequired' => true,
                                'selectedVal' => !empty($user->preferred_location) ? $user->preferred_location : '',
                                'selectedName' => !empty($user->preferred_location) ? $user->preferred_location : '',
                            ]" />
                        </div>
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css">
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
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css block_responsive mt-10">
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
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css block_responsive mt-10">
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
                        <div class="col-md-12 pt-40  d-flex gap-4 justify-content-between justify-content-sm-start">
                            <x-forms.crm-button :fieldData="[
                                'text' => trans('messages.dashboard.Update'),
                                'type' => 'button',
                                'class' =>
                                    'border-r-8 b-color-Gradient color-white text-14 font-weight-400 small-button line-height-15 gardient-button updateTab2Btn',
                                'id' => 'updateTab2Btn',
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
    </script>
    <script src="{{ asset('assets/js/modules/dashboard/customer-profile.js') }}"></script>
@endpush
@endsection
