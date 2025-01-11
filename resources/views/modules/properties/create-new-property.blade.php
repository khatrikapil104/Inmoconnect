@extends('layouts.app')
@section('content')

    {{-- slick-slider cdn --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />

    {{-- title --}}
@section('title')
    {{ !empty($property->reference) ? trans('messages.properties.Edit_Property') : trans('messages.properties.Add_New_Property') }}
    Inmoconnect
@endsection

{{-- main-content --}}
<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="min-vh-100 b-color-background">
    <div class="crm-main-content">

        {{-- breadcrumb --}}
        <div class="property_view_breadcrumb">
            @if(empty($developmentUnitData))
            <x-forms.crm-breadcrumb :fieldData="[
                [
                    'url' => route(routeNamePrefix() . 'properties.index'),
                    'label' => trans('messages.sidebar.Property_Listing'),
                ],
                [
                    'url' => '',
                    'label' => !empty($property->reference)
                        ? trans('messages.properties.Edit_Property')
                        : trans('messages.properties.Add_New_Property'),
                ],
            ]" />
            @else
                <x-forms.crm-breadcrumb :fieldData="[
                    [
                        'url' => route(routeNamePrefix() . 'developments.index'),
                        'label' => 'Developments',
                    ],
                    [
                        'url' => route(routeNamePrefix() . 'developments.manage',$developmentUnitData['development_id']),
                        'label' => $developmentUnitData['development_name'] ?? '',
                    ],
                     [
                        'url' => '',
                        'label' => 'Add New Unit',
                    ]
                ]" :additionalData="['hasCopiesField' => true, 'value' => $developmentUnitData['copies'] ?? 1]" />
            
            @endif

        </div>
        {{-- end-breadcrumb --}}

        {{-- slider-tab --}}
        <div class="tab_slider-main" style="overflow: hidden">
            <div class="tab_slider" id="tab-slider_id">
                <div>
                    <button class="tablinks" data-target="Tab1">
                        {{ trans('messages.listing.Property_Information') }}
                    </button>
                </div>
                <div>
                    <button class="tablinks" data-target="Tab2">
                        {{ trans('messages.listing.Property_Pricing') }}
                    </button>
                </div>
                <div>
                    <button class="tablinks" data-target="Tab3">
                        {{ trans('messages.listing.Property_Location') }}
                    </button>
                </div>
                <div>
                    <button class="tablinks" data-target="Tab4">
                        {{ trans('messages.listing.Property_Dimension') }}
                    </button>
                </div>
                <div>
                    <button class="tablinks" data-target="Tab5">
                        {{ trans('messages.listing.Property_Document_Information') }}
                    </button>
                </div>
                <div>
                    <button class="tablinks" data-target="Tab6">
                        {{ trans('messages.listing.Professional_Information') }}
                    </button>
                </div>
                <div>
                    <button class="tablinks" data-target="Tab7">
                        {{ trans('messages.listing.Property_Media') }}
                    </button>
                </div>
                <div>
                    <button class="tablinks" data-target="Tab8">
                        {{ trans('messages.listing.Property_Tour') }}
                    </button>
                </div>
                <div>
                    <button class="tablinks" data-target="Tab9">
                        {{ trans('messages.listing.Property_Features') }}
                    </button>
                </div>
                <div>
                    <button class="tablinks" data-target="Tab10">
                        {{ trans('messages.listing.Contact_Information') }}
                    </button>
                </div>

            </div>
            <button class="prev" id="tab_slider_Prev" style=" visibility: hidden;"></button>
            <button class="next" id="tab_slider_next" style=" visibility: hidden;"></button>
        </div>
        {{-- end-slider-tab --}}

        {{-- form --}}
        <form action="" class="tab_slider-view-page" id="addNewPropertyForm" type="post"
            enctype="multipart/form-data">

            {{-- Property Information: --}}
            <x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25', 'id' => 'Tab1']">

                <x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '', 'name' => trans('messages.properties.Property_Information')]" />
                <div class="row">
                    {{-- Property Type:  --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'type_id',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Property_Type') . ':',
                            'id' => 'type_id',
                            'options' => $types,
                            'attributes' => [],
                            'hasHelpText' => false,
                            'placeholder' => trans('messages.properties.Property_Type'),
                            'isRequired' => true,
                            'minimumResultsForSearch' => 0,
                            'selected' => $property->type_id ?? '',
                        ]" />
                    </div>
                    {{-- Property Situation: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'situation_id',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Property_Situation') . ':',
                            'id' => 'situation_id',
                            'options' => $situations,
                            'attributes' => [],
                            'hasHelpText' => false,
                            'placeholder' => trans('messages.properties.Property_Situation'),
                            {{-- 'isRequired' => true, --}}
                            'selected' => $property->situation_id ?? '',
                        ]" />
                    </div>
                    {{-- Property Subtype: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'subtype_id',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Property_Subtype') . ':',
                            'id' => 'subtype',
                            'options' => [],
                            'attributes' => [],
                            'hasHelpText' => false,
                            'placeholder' => trans('messages.properties.Property_Subtype'),
                            {{-- 'isRequired' => true, --}}
                            'minimumResultsForSearch' => 0,
                            'selected' => $property->subtype_id ?? '',
                        ]" />
                    </div>
                    {{-- Property Subtype:  --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2" id="subtype2Container"
                        style="display: none;">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'subtype_id2',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Property_Subtype2') . ':',
                            'id' => 'subtype2',
                            'attributes' => [],
                            'hasHelpText' => false,
                            'placeholder' => trans('messages.properties.Property_Subtype2'),
                            //'isRequired' => true,
                            'minimumResultsForSearch' => 0,
                            'selected' => $property->subtype_id2 ?? '',
                        ]" />
                    </div>
                    {{-- Property Reference: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'reference',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Reference'),
                            'id' => 'reference',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->reference ?? '',
                        ]" />
                    </div>
                    {{-- Property Title: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'name',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Property_Title'),
                            'id' => 'name',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->name ?? '',
                        ]" />
                    </div>
                    {{-- Number of Bathrooms: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2" id="bathrooms">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'bathrooms',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Number_of_Bathrooms'),
                            'id' => 'bathrooms',
                            'attributes' => [],
                            'hasHelpText' => false,
                            'isRequired' => true,
                            'value' => $property->bathrooms ?? '',
                        ]" />
                    </div>
                    {{-- Number of Bedrooms: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2" id="bedrooms">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'bedrooms',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Number_of_Bedrooms'),
                            'id' => 'bedrooms',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'placeholder' => trans('messages.properties.Number_of_Bedrooms'),
                            'isRequired' => true,
                            'value' => $property->bedrooms ?? '',
                        ]" />
                    </div>
                    {{-- Property Status/Completion: --}}

                    {{-- <div id="completion_status_one" class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'completion_status',
                            'hasLabel' => true,
                            'label' => trans('messages.property.status_completion') . ':',
                            'id' => 'completion_status',
                            'options' => [
                                'Completed' => 'Completed',
                                'Under Construction' => 'Under Construction',
                                'Off Plan' => 'Off Plan',
                            ],
                            'attributes' => [],
                            'hasHelpText' => false,
                            'placeholder' => trans('messages.property.status_completion'),
                            'isRequired' => true,
                            'minimumResultsForSearch' => 0,
                            'selected' => $property->status_completion ?? '',
                        ]" />
                    </div> --}}
                    <div id="completion_status_one" class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        @php
                            // Get the user's role
                            $userRole = auth()->user()->role->name;
                            $selected = $property->status_completion ?? 'Completed';
                        @endphp
                    
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'completion_status',
                            'hasLabel' => true,
                            'label' => trans('messages.property.status_completion') . ':',
                            'id' => 'completion_status',
                            'options' => $userRole === 'developer'
                                ? [
                                    'Completed' => 'Completed',
                                    'Under Construction' => 'Under Construction',
                                    'Off Plan' => 'Off Plan',
                                ]
                                : ['Completed' => 'Completed'],
                            'attributes' => in_array($userRole, ['agent', 'sub-agent']) ? ['readonly' => 'readonly'] : [],
                            'hasHelpText' => false,
                            'placeholder' => trans('messages.property.status_completion'),
                            'isRequired' => true,
                            'selected' => $selected,
                        ]" />
                    </div>
                    
                    
                    {{-- Select Completion Year: --}}
                    <div id="year_completed_container" class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2"
                        style="display:none;">
                        <x-forms.crm-datepicker :fieldData="[
                            'name' => 'year_completed',
                            'hasLabel' => true,
                            'label' => trans('messages.property.Year_selection') . ':',
                            'inputId' => 'year_completed',
                            'attributes' => [],
                            'hasHelpText' => false,
                            'help' => 'Select Year',
                            {{-- 'isRequired' => true, --}}
                            'isInputMask' => true,
                            'value' => $property->year ?? '',
                            'format' => 'yyyy',
                            'minViewMode' => 2,
                        ]" />

                    </div>
                    @php
                        if (isset($property->month) && isset($property->year)) {
                            $monthYear = $property->month . '/' . $property->year;
                        }
                    @endphp
                    {{-- Select Completion Month and Year  --}}
                    {{-- <div id="month_year_container" class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2"
                        style="display:none;">
                        <x-forms.crm-datepicker :fieldData="[
                            'name' => 'month_year',
                            'hasLabel' => true,
                            'label' => trans('messages.property.month_year') . ':',
                            'inputId' => 'month_year',
                            'attributes' => [],
                            'hasHelpText' => false,
                            'help' => 'Select Year',
                            'isRequired' => true,
                            'isInputMask' => true,
                            'value' => $monthYear ?? '',
                            'format' => 'mm/yyyy',
                            'minViewMode' => 1,
                            'placeholder' => '',
                            'startDate' => date('Y-m-01'),
                        ]" />

                    </div> --}}
                    {{-- checkbox-freehold-leashold --}}
                    <div id="commercial_checkbox_container" class="mt-3 pt-2 d-flex align-items-center gap-2 ">
                        <div class="col-lg-2 col-md-3 common-label-css d-flex align-items-center gap-2 checkbox_modal">
                            <label class="d-flex gap-2 property_create-radio">
                                <input type="radio" name="property_tenure" id="property_tenure_checkbox"
                                    {{ !empty($property->property_tenure) && $property->property_tenure == 1 ? 'checked' : '' }}
                                    value="1">
                                <span class="radio-custom" for="property_tenure"></span>
                                {{ trans('messages.properties.Freehold') }}
                            </label>
                        </div>
                        <div class="col-lg-2 col-md-3 common-label-css d-flex align-items-center gap-2 checkbox_modal">
                            <label class="d-flex gap-2 property_create-radio">
                                <input type="radio" name="property_tenure" id="property_tenure_checkbox"
                                    {{ !empty($property->property_tenure) && $property->property_tenure == 2 ? 'checked' : '' }}
                                    value="2">
                                <span class="radio-custom" for="nota_simple_no"></span>
                                {{ trans('messages.properties.Leasehold') }}
                            </label>
                        </div>
                    </div>
                    {{-- Description: --}}
                    <div class="col-md-12 common-label-css mt-2 ">
                        <x-forms.crm-textarea :fieldData="[
                            'name' => 'description',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Description'),
                            'id' => 'description',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'useCkEditor' => true,
                            'value' => $property->description ?? '',
                        ]" />
                    </div>
                    {{-- Feeds: --}}
                    {{-- <div class="col-md-12 common-label-css mt-2 ">
                        <label>{{ trans('messages.property.feeds') . ':' }} </label><br>
                        <div class="d-flex gap-3">
                            <div class="d-flex align-items-center  gap-2 checkbox_modal">
                                <input type="checkbox" id="feeds_yes" name="feeds" value="1"
                                    {{ !empty($property) && $property->feeds == 1 ? 'checked' : '' }}>
                                Realinmo
                            </div>
                        </div>
                    </div> --}}
                </div>
            </x-views.layouts.main-card.main-card-index>
            {{-- end-Property Information: --}}

            {{-- Property Pricing: --}}
            <x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25', 'id' => 'Tab2']">

                <x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '', 'name' => trans('messages.property.property_pricing')]" />

                <div class="row">
                    {{-- Property List As: --}}
                    <div id="listed_as" class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'pro_listed_as',
                            'hasLabel' => true,
                            'label' => trans('messages.property.Property_Listed_As') . ':',
                            'id' => 'pro_listed_as',
                            'options' => [
                                'For Sale' => 'For Sale',
                                'For Rent' => 'For Rent',
                            ],
                            'attributes' => ['readonly' => 'readonly'],
                            'hasHelpText' => false,
                            'placeholder' => trans('messages.property.Property_Listed_As'),
                            'isRequired' => true,
                            'selected' => $property->listed_as ?? 'For Sale',
                        ]" />
                    </div>
                    {{-- Sale Price: --}}
                    <div id="sale_price_container" class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'sale_price',
                            'hasLabel' => true,
                            'label' => trans('messages.property.sale_price') . ':',
                            'id' => 'sale_price',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->price ?? '',
                        ]" />
                    </div>
                    {{-- Rent Type --}}
                    <div id="rental_conatiner" class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'rent_type',
                            'hasLabel' => true,
                            'label' => trans('messages.property.rent_type') . ':',
                            'id' => 'rent_type',
                            'options' => [
                                'short_term' => 'For Rent - Short Term',
                                'long_term' => 'For Rent - Low Term',
                            ],
                            'attributes' => [],
                            'hasHelpText' => false,
                            'placeholder' => trans('messages.property.rent_type'),
                            'isRequired' => true,
                            'selected' => $property->rent_type ?? '',
                        ]" />
                    </div>
                    {{-- Short Term Low Season --}}
                    <div id="short_term_container" class="col-md-4 common-label-css">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'short_price',
                            'hasLabel' => true,
                            'label' => trans('messages.property.short_term') . ':',
                            'id' => 'short_price',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->price ?? '',
                        ]" />
                    </div>
                    {{-- Long Term High Season --}}
                    <div id="long_term_container" class="col-md-4 common-label-css">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'long_price',
                            'hasLabel' => true,
                            'label' => trans('messages.property.long_term') . ':',
                            'id' => 'long_price',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->price ?? '',
                        ]" />
                    </div>
                    {{-- Percentage --}}
                    <div id="percentage_container" class="col-md-4 common-label-css position-relative">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'percentage',
                            'hasLabel' => true,
                            'label' => trans('messages.property.percentage') . ':',
                            'id' => 'percentage',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            {{-- 'isRequired' => true, --}}
                            'value' => $property->percentage ?? '',
                        ]" />
                        <div class="input-group-append property_per">
                            <span class="input-group-text">%</span>
                        </div>
                        <div class="invalid-feedback fw-bold"></div>
                    </div>
                    {{-- Commission --}}
                    <div id="commission_container" class="col-md-4 common-label-css position-relative">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'commission',
                            'hasLabel' => true,
                            'label' => trans('messages.property.commission') . ':',
                            'class' => 'commission',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            {{-- 'isRequired' => true, --}}
                            'value' => $property->commission ?? '',
                        ]" />
                        <div class="input-group-append property_per">
                            <span class="input-group-text">€</span>
                        </div>
                        <div class="invalid-feedback fw-bold"></div>
                    </div>
                    {{-- Net Price  --}}
                    <div id="net_price_container" class="col-md-4 common-label-css position-relative">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'net_price',
                            'hasLabel' => true,
                            'label' => trans('messages.property.net_price') . ':',
                            'id' => 'net_price',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->net_price ?? '',
                        ]" />
                        <div class="input-group-append property_per">
                            <span class="input-group-text">€</span>
                        </div>

                    </div>
                    {{-- Listing Agent-header  --}}
                    <div class="col-12 mt-3 pt-2 listing-agent-header">
                        <p class="text-14 color-primary font-weight-700 lineheight-18">
                            {{ trans('messages.property.listing_agent') }}:
                        </p>
                    </div>
                    {{-- Listing Agent-% --}}
                    <div id="listing_container"
                        class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css position-relative">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'list_agent_per',
                            'hasLabel' => true,
                            'label' => trans('messages.property.listing_agent') . ':',
                            'id' => 'list_agent',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            {{-- 'isRequired' => true, --}}
                            'value' => $property->list_agent_per ?? '',
                        ]" />
                        <div class="input-group-append property_per">
                            <span class="input-group-text">%</span>
                        </div>
                        {{-- <div class="invalid-feedback fw-bold"></div> --}}
                    </div>
                    {{-- Listing Agent-€ --}}
                    <div id="listing_container"
                        class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css position-relative">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'list_Agent_com',
                            'hasLabel' => true,
                            'label' => trans('messages.property.listing_agent') . ':',
                            'id' => 'list_Agent_c',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            {{-- 'isRequired' => true, --}}
                            'value' => $property->list_agent_com ?? 0,
                        ]" />
                        <div class="input-group-append property_per">
                            <span class="input-group-text">€</span>
                        </div>
                        {{-- <div class="invalid-feedback fw-bold"></div> --}}
                    </div>
                    {{-- Selling Agent-header  --}}
                    <div class="col-12 mt-3 pt-2 selling-agent-header">
                        <p class="text-14 color-primary font-weight-700 lineheight-18">
                            {{ trans('messages.property.selling_agent') }}:
                        </p>
                    </div>
                    {{-- Selling Agent-% --}}
                    <div id="selling_container"
                        class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2 position-relative">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'sell_agent_per',
                            'hasLabel' => true,
                            'label' => trans('messages.property.selling_agent') . ':',
                            'id' => 'sell_agent',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            {{-- 'isRequired' => true, --}}
                            'value' => $property->sell_agent_per ?? '',
                        ]" />
                        <div class="input-group-append property_per">
                            <span class="input-group-text">%</span>
                        </div>
                        {{-- <div class="invalid-feedback fw-bold"></div> --}}
                    </div>
                    {{-- Selling Agent-€ --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2 position-relative">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'sell_Agent_com',
                            'hasLabel' => true,
                            'label' => trans('messages.property.selling_agent') . ':',
                            'id' => 'sell_Agent_c',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            {{-- 'isRequired' => true, --}}
                            'value' => $property->sell_agent_com ?? 0,
                        ]" />
                        <div class="input-group-append property_per">
                            <span class="input-group-text">€</span>
                        </div>
                        {{-- <div class="invalid-feedback fw-bold"></div> --}}
                    </div>
                    {{-- Valuation --}}
                    <div class="col-md-4 common-label-css position-relative value_deed_container">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'valuation',
                            'hasLabel' => true,
                            'label' => trans('messages.property.valuation') . ':',
                            'id' => 'valuation',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->valuation ?? '',
                        ]" />
                        <div class="input-group-append property_per">
                            <span class="input-group-text">€</span>
                        </div>
                        <div class="invalid-feedback fw-bold"></div>
                    </div>
                
                    {{-- Valuation Year --}}
                    <div class="col-md-4 common-label-css position-relative value_deed_container">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'valuation_year',
                            'hasLabel' => true,
                            'label' => trans('messages.property.valuation_year') . ':',
                            'id' => 'valuation_year',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->valuation_year ?? '',
                        ]" />
                    </div>
                    {{-- Deed Value: --}}
                    <div class="col-md-4 common-label-css position-relative value_deed_container">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'deed_value',
                            'hasLabel' => true,
                            'label' => trans('messages.property.deed_value') . ':',
                            'id' => 'deed_value',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->deed_value ?? '',
                        ]" />
                        <div class="input-group-append property_per">
                            <span class="input-group-text">€</span>
                        </div>
                        <div class="invalid-feedback fw-bold"></div>
                    </div>
                </div>

                <div id="minimun_container" class="row">
                    {{-- Minimun Price --}}
                    <div class="col-md-4 common-label-css position-relative">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'mini_price',
                            'hasLabel' => true,
                            'label' => trans('messages.property.minimum_price') . ':',
                            'id' => 'mini_price',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->mini_price ?? '',
                        ]" />
                        <div class="input-group-append property_per">
                            <span class="input-group-text">€</span>
                        </div>
                        <div class="invalid-feedback fw-bold"></div>
                    </div>
                </div>

                <div id="fees_tax_container" class="row">
                    {{-- Community Fees  --}}
                    <div class="col-md-4 common-label-css position-relative">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'comm_fees',
                            'hasLabel' => true,
                            'label' => trans('messages.property.community_fees') . ':',
                            'id' => 'community_fees',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->comm_fees ?? '',
                        ]" />
                        <div class="input-group-append property_per">
                            <span class="input-group-text">
                                {{ trans('messages.property.euro_month') }}
                            </span>
                        </div>
                        <div class="invalid-feedback fw-bold"></div>
                    </div>
                    {{-- Garbage Tax: --}}
                    <div class="col-md-4 common-label-css position-relative">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'garbage_tax',
                            'hasLabel' => true,
                            'label' => trans('messages.property.garbage_tax') . ':',
                            'id' => 'garbage_tax',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->garbage_tax ?? '',
                        ]" />
                        <div class="input-group-append property_per">
                            <span class="input-group-text">
                                {{ trans('messages.property.euro_year') }}
                            </span>
                        </div>
                        <div class="invalid-feedback fw-bold"></div>
                    </div>
                    {{-- IBI Fees: --}}
                    <div class="col-md-4 common-label-css position-relative">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'ibi_fees',
                            'hasLabel' => true,
                            'label' => trans('messages.property.ibi_fees') . ':',
                            'id' => 'ibi_fees',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->ibi_fees ?? '',
                        ]" />
                        <div class="input-group-append property_per">
                            <span class="input-group-text">
                                {{ trans('messages.property.euro_year') }}
                            </span>
                        </div>
                        <div class="invalid-feedback fw-bold"></div>
                    </div>
                </div>

                <div id="commission_note_container " class="row">
                    {{-- Commission Notes (Seen By Other Agencies): --}}
                    <div class="col-md-12 common-label-css mt-2 property_create_textarea ">
                        <x-forms.crm-textarea :fieldData="[
                            'name' => 'note_com',
                            'hasLabel' => true,
                            'label' => trans('messages.property.commission_note') . ':',
                            'id' => 'note_com',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            {{-- 'isRequired' => true, --}}
                            'value' => $property->commission_note ?? '',
                        ]" />
                    </div>
                </div>

                <div class="row">
                    {{-- checkbox --}}
                    <div id="allow_required_container" class="col-lg-12">
                        <div class="d-flex gap-3 mt-3 pt-2 flex-wrap">
                            <div class="d-flex align-items-center  gap-2 checkbox_modal">
                                <input type="checkbox" id="bank_yes" name="bank" value="1"
                                    {{ !empty($property) && $property->nota_simple == 1 ? 'checked' : '' }}>

                                Bank Guarantee Required
                            </div>
                            <div class="d-flex align-items-center  gap-2 checkbox_modal">
                                <input type="checkbox" id="refrence_yes" name="refrence" value="1"
                                    {{ !empty($property) && $property->nota_simple == 1 ? 'checked' : '' }}>
                                Reference Required
                            </div>
                            <div class="d-flex align-items-center  gap-2 checkbox_modal">
                                <input type="checkbox" id="smoking_yes" name="smoking" value="1"
                                    {{ !empty($property) && $property->smoking_allowed == 1 ? 'checked' : '' }}>
                                Smoking Allowed
                            </div>
                            <div class="d-flex align-items-center  gap-2 checkbox_modal">
                                <input type="checkbox" id="pets_yes" name="pets" value="1"
                                    {{ !empty($property) && $property->pets_allowed == 1 ? 'checked' : '' }}>
                                Pets Allowed
                            </div>
                        </div>
                        {{-- checkbox --}}
                        <div id="rent_certificate_container" class="col-md-12 common-label-css mt-3 pt-2">
                            <label>Rental Certificate: </label><br>
                            <div class="d-flex gap-3">
                                <div class="d-flex align-items-center  gap-2 checkbox_modal">
                                    <input type="checkbox" id="rental_yes" name="rental" value="1"
                                        {{ !empty($property) && $property->rental == 1 ? 'checked' : '' }}>
                                    Yes
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </x-views.layouts.main-card.main-card-index>
            {{-- end-property-pricing --}}

            {{-- Property Location: --}}
            <x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25', 'id' => 'Tab3']">

                <x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '', 'name' => trans('messages.properties.Property_Location')]" />

                <div class="row">
                    {{-- Property Street Number: --}}
                    <div class="col-md-4 common-label-css">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'street_number',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Property_Street_Number'),
                            'id' => 'street_number_v',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->street_number ?? '',
                        ]" />
                    </div>
                    {{-- Property Street: --}}
                    <div class="col-md-4 common-label-css">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'street_name',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Property_Street'),
                            'id' => 'street_name_v',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->street_name ?? '',
                        ]" />
                    </div>
                    {{-- City: --}}
                    <div class="col-md-4 common-label-css">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'city',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Property_City'),
                            'id' => 'city',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->city ?? '',
                        ]" />
                    </div>
                    {{-- State/Provenience: --}}
                    <div class="col-md-4 common-label-css">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'state_provenience',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.State_Provenience'),
                            'id' => 'state_provenience',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->state ?? '',
                        ]" />
                    </div>
                    {{-- Country: --}}
                    <div class="col-md-4 common-label-css">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'country',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Property_Country'),
                            'id' => 'country',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->country ?? '',
                        ]" />
                    </div>
                    {{-- Postcode: --}}
                    <div class="col-md-4 common-label-css">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'zipcode',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Property_Postcode'),
                            'id' => 'zipcode_v',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->zipcode ?? '',
                        ]" />
                    </div>
                    {{-- Property address: --}}
                    <div class="col-9 col-md-10 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'address',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Property_Address') . ':',
                            'id' => 'address',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->address ?? '',
                        ]" />
                    </div>
                    {{-- location-button --}}
                    <div class="col-3 col-md-2" style="z-index:0">
                        <div class="form-group mt-3 position-relative mt-5">
                            <label for=""
                                class="text-13 font-weight-400 line-height-20 text-capitalize color-b-blue"></label>
                            <x-forms.crm-button :fieldData="[
                                'text' => trans('messages.properties.To_Locate'),
                                'type' => 'button',
                                'class' =>
                                    'border-r-8 b-color-Gradient color-white text-12 font-weight-400 line-height-15 w-100 h-42 gardient-button locateAddressBtn mt-2',
                                'id' => 'locateAddressBtn',
                                'attributes' => [],
                            ]" />
                        </div>
                    </div>
                    <input type="hidden" name="latitude" class="form-control small latitude_v"
                        value="{{ (!empty($property->reference) || !empty($developmentUnitData) ) ? $property->latitude : old('latitude') }}"
                        id="latitude_v" />
                    <input type="hidden" name="longitude" class="form-control small longitude_v"
                        value="{{ (!empty($property->reference) || !empty($developmentUnitData) )  ? $property->longitude : old('longitude') }}"
                        id="longitude_v" />
                    
                    {{-- map --}}
                    <div class="col-lg-12 mt-3">
                        <div id="propertyMap" style="height: 330px;"></div>
                    </div>
                </div>
            </x-views.layouts.main-card.main-card-index>
            {{-- end-Property Location: --}}

            {{-- Property Dimensions: --}}
            <x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25', 'id' => 'Tab4']">

                <x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '', 'name' => trans('messages.listing.Property_Dimension')]" />

                <div class="row">
                    {{-- Dimension Type --}}
                    {{-- <div class="col-md-4 common-label-css">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'dimension_type',
                            'hasLabel' => true,
                            'label' => trans('messages.property.dimension_type') . ':',
                            'id' => 'dimension_type',
                            'options' => [
                                'Meter' => trans('messages.property.Meter'),
                                'Feet' => trans('messages.property.Feets'),
                            ],
                            'attributes' => [],
                            'hasHelpText' => false,
                            'placeholder' => trans('messages.property.dimension_type'),
                            'isRequired' => true,
                            'minimumResultsForSearch' => 0,
                            'selected' => $property->dimension_type ?? '',
                        ]" />
                    </div> --}}
                    {{-- total_size --}}
                    <div class="col-md-4 common-label-css position-relative" id="total_size">
                        <div class=" from-group mt-3 position-relative">
                            <label>{{ trans('messages.properties.Total_Size') }}<span
                                    style="color: red;">*</span></label>
                            <input type="number"
                                class=" form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="size" id="total_size" value="{{ $property->size ?? '' }}" required>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text unit-label2">m²</span>
                        </div>
                        <div class="invalid-feedback fw-bold"></div>
                    </div>
                    {{-- Floor No: --}}
                    <div class="col-md-4 common-label-css" id="floors">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'floors',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Floors'),
                            'id' => 'floors',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            {{-- 'isRequired' => true, --}}
                            'value' => $property->floors ?? '',
                        ]" />
                    </div>
                    {{-- plot_size --}}
                    <div class="col-md-4 common-label-css position-relative" id="plot_size" style="display: none;">
                        <div class="from-group mt-3 position-relative">
                            <label>{{ trans('messages.properties.plot_size') }}<span
                                    style="color: red;">*</span></label>
                            <input type="number"
                                class=" form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46"
                                name="plot_size" id="plot_size_input" value="{{ $property->plot_size ?? '' }}"
                                required>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text unit-label">m²</span>
                        </div>
                        <div class="invalid-feedback fw-bold error"></div>
                    </div>
                    {{-- Built: --}}
                    <div class="col-md-4 common-label-css position-relative">
                        <div class="from-group mt-3 position-relative">
                            <label>{{ trans('messages.properties.Built') }} 
                                {{-- <span style="color: red;">*</span> --}}
                            </label>
                            <input type="number"
                                class=" form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46"
                                name="built" id="built" value="{{ $property->built ?? '' }}" required>

                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text unit-label">m²</span>
                        </div>
                        <div class="invalid-feedback fw-bold"></div>
                    </div>
                    {{-- Storeys: --}}
                    <div class="col-md-4 common-label-css" id="storeys">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'storeys',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Storeys'),
                            'id' => 'storeys',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            {{-- 'isRequired' => true, --}}
                            'value' => $property->storeys ?? '',
                        ]" />
                    </div>
                    {{-- No. of Properties In Build in: --}}
                    <div class="col-md-4 common-label-css" id="no_of_properties_builtin">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'no_of_properties_builtin',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.No_of_Properties_In_Buildin'),
                            'id' => 'no_of_properties_builtin',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            {{-- 'isRequired' => true, --}}
                            'value' => $property->no_of_properties_builtin ?? '',
                        ]" />
                    </div>
                    {{-- terrace --}}
                    <div class="col-md-4 common-label-css position-relative" id="terrace">
                        <div class="from-group mt-3 position-relative">
                            <label>{{ trans('messages.properties.Terrace') }}
                                {{-- <span
                                    style="color: red;">*
                                </span> --}}
                            </label>
                            <input type="number"
                                class=" form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46"
                                name="terrace" id="terrace" value="{{ $property->terrace ?? '' }}" required>

                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text unit-label">m²</span>
                        </div>
                        <div class="invalid-feedback fw-bold"></div>
                    </div>
                    {{-- Levels: --}}
                    <div class="col-md-4 common-label-css" id="levels">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'levels',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Levels'),
                            'id' => 'levels',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            {{-- 'isRequired' => true, --}}
                            'value' => $property->levels ?? '',
                        ]" />
                    </div>
                    {{-- Agency Ref: --}}
                    <div class="col-md-4 common-label-css position-relative" id="agency_ref">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'agency_ref',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Agency_Ref'),
                            'id' => 'agency_ref',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            {{-- 'isRequired' => true, --}}
                            'value' => $property->agency_ref ?? '',
                        ]" />
                        {{-- <div class="input-group-append">
                            <span class="input-group-text unit-label">m²</span>
                        </div> --}}
                    </div>
                    {{-- Garden/Plot: --}}
                    <div class="col-md-4 common-label-css position-relative" id="garden_plot">
                        <div class=" from-group mt-3 position-relative">
                            <label>{{ trans('messages.properties.Garden_Plot') }}
                                {{-- <span
                                    style="color: red;">*
                                </span> --}}
                            </label>
                            <input type="number"
                                class=" form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="garden_plot" value="{{ $property->garden_plot ?? '' }}" required>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text unit-label2">m²</span>
                        </div>
                        <div class="invalid-feedback fw-bold"></div>
                    </div>

                    {{-- Int. Floor space --}}
                    <div class="col-md-4 common-label-css position-relative" id="properties_int_floor_space">
                        <div class=" from-group mt-3 position-relative">
                            <label>{{ trans('messages.properties.Int_Floor_Space') }}
                                {{-- <span
                                    style="color: red;">*
                                </span> --}}
                            </label>
                            <input type="number"
                                class=" form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="properties_int_floor_space"
                                value="{{ $property->properties_int_floor_space ?? '' }}" required>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text unit-label2">m²</span>
                        </div>
                        <div class="invalid-feedback fw-bold"></div>
                    </div>

                    {{-- Energy Rating-header  --}}
                    <div class="col-12 mt-3 pt-2">
                        <p class="text-14 color-primary font-weight-700 lineheight-18">
                            {{ trans('messages.property.energy_rating') }}:
                        </p>
                    </div>
                    {{-- CO2 Emission --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'co2_emission',
                            'hasLabel' => true,
                            'label' => trans('messages.property.co2_emission') . ':',
                            'id' => 'co2_emission',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->co2_emission ?? '',
                        ]" />
                    </div>
                    {{-- Letter: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css ">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'letter_co2',
                            'hasLabel' => true,
                            'label' => trans('messages.property.letter') . ':',
                            'id' => 'letter_co2',
                            'options' => [
                                'A' => 'A',
                                'B' => 'B',
                                'C' => 'C',
                                'D' => 'D',
                                'E' => 'E',
                                'F' => 'F',
                                'G' => 'G',
                            ],
                            'attributes' => [],
                            'hasHelpText' => false,
                            'placeholder' => trans('messages.property.letter'),
                            'selected' => $property->letter_co2 ?? '',
                        ]" />
                    </div>
                    {{-- Energy Consumption: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'energy_consumption',
                            'hasLabel' => true,
                            'label' => trans('messages.property.energy_consumption') . ':',
                            'id' => 'energy_consumption',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->energy_consumption ?? '',
                        ]" />
                    </div>
                    {{-- Letter: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'letter_energy',
                            'hasLabel' => true,
                            'label' => trans('messages.property.letter') . ':',
                            'id' => 'letter_energy',
                            'options' => [
                                'A' => 'A',
                                'B' => 'B',
                                'C' => 'C',
                                'D' => 'D',
                                'E' => 'E',
                                'F' => 'F',
                                'G' => 'G',
                            ],
                            'attributes' => [],
                            'hasHelpText' => false,
                            'placeholder' => trans('messages.property.letter'),
                            'selected' => $property->letter_energy ?? '',
                        ]" />
                    </div>

                </div>
            </x-views.layouts.main-card.main-card-index>
            {{-- end-Property Dimensions: --}}

            {{-- Property Documents Information: --}}
            <x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25', 'id' => 'Tab5']">

                <x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '', 'name' => trans('messages.listing.Property_Document_Information')]" />

                <div class="row">
                    {{-- Long Term Ref: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2" id="long-term-ref-field"
                        style="display: none;">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'long_term_ref',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Long_Term_Ref'),
                            'id' => 'long_term_ref',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->long_term_ref ?? '',
                        ]" />
                    </div>
                    {{-- Short_Term_Ref: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2" id="short-term-ref-field"
                        style="display: none;">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'short_term_ref',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Short_Term_Ref'),
                            'id' => 'short_term_ref',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->short_term_ref ?? '',
                        ]" />
                    </div>
                    {{-- Rental License Ref: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2" id="rental-license-ref-field"
                        style="display: none;">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'rental_license_ref',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Rental_License_Ref'),
                            'id' => 'rental_license_ref',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->rental_license_ref ?? '',
                        ]" />
                    </div>
                    {{-- Document upload feature: --}}
                    <div class="col-12 col-sm-12 col-md-12  col-lg-12 common-label-css common-attachment">
                        <div class="form-group mt-3 position-relative propertyDocumentsDiv mb-3">
                            <div class="form-group_file gap-3">
                                <input type="file" name="documents[]" onchange="handleDocumentsSelect(event)"
                                    accept=".pdf,.xlsx .jpeg, .jpg, .png" multiple
                                    class="input-file_choose propertyDocumentsInput input_property-file">
                                <div
                                    class="attachment_scroll d-flex align-tems-center gap-3 flex-wrap w-100 propertyDocumentsData">
                                    {{-- @if (!empty($documentData) && $documentData->isNotEmpty()) --}}
                                    @include('modules.properties.includes.property_documents_data')
                                    {{-- @endif --}}
                                </div>
                            </div>

                        </div>
                        <div class="invalid-feedback fw-bold">
                        </div>

                    </div>

                    @if (!empty($property->file))
                        {{ basename($property->file) }}
                    @endif
                    {{-- Nota_Simple-checkbox --}}
                    <div class="col-md-2 common-label-css mt-3">
                        <label>{{ trans('messages.properties.Nota_Simple') }}</label><br>
                        <div class="d-flex gap-3">
                            <label class="d-flex gap-2 property_create-radio">
                                <input type="radio" id="nota_simple_yes" name="nota_simple" value="1"
                                    {{ !empty($property) && $property->nota_simple == 1 ? 'checked' : '' }}>
                                <span class="radio-custom" for="nota_simple_yes"></span>
                                {{ trans('messages.properties.yes') }}
                            </label>
                            <label class="d-flex gap-2 property_create-radio">
                                <input type="radio" id="nota_simple_no" name="nota_simple" value="0"
                                    {{ !empty($property) && $property->nota_simple == 0 ? 'checked' : '' }}>
                                <span class="radio-custom" for="nota_simple_no"></span>
                                {{ trans('messages.properties.no') }}
                            </label>
                        </div>
                    </div>

                    {{-- IBI_Receipt-checkbox --}}
                    <div class="col-md-2 common-label-css mt-3">
                        <label>{{ trans('messages.properties.IBI_Receipt') }}</label><br>
                        <div class="d-flex gap-3">
                            <label class="d-flex gap-2 property_create-radio">
                                <input type="radio" id="ibi_receipt_yes" name="IBI_receipt" value="1"
                                    {{ !empty($property) && $property->IBI_receipt == 1 ? 'checked' : '' }}>
                                <span class="radio-custom" for="ibi_receipt_yes"></span>
                                {{ trans('messages.properties.yes') }}
                            </label>
                            <label class="d-flex gap-2 property_create-radio">
                                <input type="radio" type="radio" id="ibi_receipt_no" name="IBI_receipt"
                                    value="0"
                                    {{ !empty($property) && $property->IBI_receipt == 0 ? 'checked' : '' }}>
                                <span class="radio-custom" for="ibi_receipt_no"></span>
                                {{ trans('messages.properties.no') }}
                            </label>
                        </div>
                    </div>

                    {{-- First Occupancy License / AFO-checkbox --}}
                    <div class="col-md-5 common-label-css mt-3">
                        <label>{{ trans('messages.properties.First_Occupancy_License_AFO') }}</label><br>
                        <div class="d-flex gap-3">
                            <label class="d-flex gap-2 property_create-radio">
                                <input type="radio" id="first_occupancy_license_yes"
                                    name="first_occupancy_license_aFO" value="1"
                                    {{ !empty($property) && $property->first_occupancy_license_aFO == 1 ? 'checked' : '' }}>
                                <span class="radio-custom" for="first_occupancy_license_yes"></span>
                                {{ trans('messages.properties.yes') }}
                            </label>
                            <label class="d-flex gap-2 property_create-radio">
                                <input type="radio" id="first_occupancy_license_no"
                                    name="first_occupancy_license_aFO" value="0"
                                    {{ !empty($property) && $property->first_occupancy_license_aFO == 0 ? 'checked' : '' }}>
                                <span class="radio-custom" for="first_occupancy_license_no"></span>
                                {{ trans('messages.properties.no') }}
                            </label>
                        </div>
                    </div>

                </div>
            </x-views.layouts.main-card.main-card-index>
            {{-- End-Property Documents Information: --}}

            {{-- Company Information: --}}
            <x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25', 'id' => 'Tab6']">
                
                <x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '', 'name' => 'Property Listed By:']" />

                    <div class="row pt-2">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="row pt-3">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Listed By:
                                    </h6>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                        {{ auth()->user()->name ?? '-' }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        {{-- Company Email --}}
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="row pt-3">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue text-break">Company
                                        Email:
                                    </h6>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue text-break">
                                        {{ $companyDetails->company_email ?? '-' }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        {{-- Company Mobile Number --}}
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="row pt-3">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Company Mobile:
                                    </h6>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                        {{ $companyDetails->company_mobile ?? '-' }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        @if (auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer')
                            {{-- Tax Number --}}
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="row pt-3">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                        <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">cif_nie:
                                        </h6>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                        <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                            {{$companyDetails->cif_nie ?? '-' }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- Tax Number --}}
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="row pt-3">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                        <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Tax Number:
                                        </h6>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                        <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                            {{-- xxx xxx xxx xxx xxx 999 --}}
                                            {{$companyDetails->company_tax_number ?? '-' }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- website --}}
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="row pt-3">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Company Website:
                                    </h6>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                        {{$companyDetails->company_website ?? '-'}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        {{-- Address --}}
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="row pt-3">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Street
                                        Address:
                                    </h6>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                        {{ auth()->user()->address ?? '-' }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        {{-- city --}}
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="row pt-3">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">City:
                                    </h6>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                        {{ auth()->user()->city ?? '-' }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        {{-- state and province --}}
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="row pt-3">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">State/Province:
                                    </h6>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                        {{ auth()->user()->state ?? '-' }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        {{-- country --}}
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="row pt-3">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Country:
                                    </h6>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                        {{ auth()->user()->country ?? '-' }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        {{-- zipcode --}}
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="row pt-3">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-700 lineheight-18 color-b-blue">Zipcode:
                                    </h6>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                        {{ auth()->user()->zipcode ?? '-' }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        {{-- image --}}
                        <div class="col-12 mt-3 pt-2 border-top">
                            <div class="company-image d-flex align-items-center mt-3">
                                <img src="{{ !empty(auth()->user()->companyDetails->company_image) ? auth()->user()->companyDetails->company_image : asset('img/logoplaceholder.svg') }}" alt="Default Image" class="border-r-12"
                                    width="80" height="80">
                                    <h4 class="card-text-header text-18 font-weight-700 lineheight-22 color-primary ms-3">
                                        {{ $companyDetails->company_name ?? "" }}
                                    </h4>
                            </div>
                        </div>
                    </div>

            </x-views.layouts.main-card.main-card-index>
            {{-- End- Company Information: --}}

            @php
                $defaultMessageCoverImage =
                    "<img src='" .
                    asset('img/upload.svg') .
                    "' class='upload'> " .
                    trans('messages.multi_image_component.Drop_cover_picture_here_or_click_to_upload');
                $defaultMessagePropertiesImages =
                    "<img src='" .
                    asset('img/upload.svg') .
                    "' class='upload'> " .
                    trans('messages.multi_image_component.Drop_cover_picture_here_or_click_to_upload') .
                    '. <br><small>' .
                    trans('messages.multi_image_component.You_can_upload_up_to') .
                    ' 30 ' .
                    trans('messages.multi_image_component.files_text') .
                    '. ' .
                    trans('messages.multi_image_component.Each_file_should_not_be_larger_than') .
                    ' 5 MB.</small>';
            @endphp

            {{-- Property Media: --}}
            <x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25', 'id' => 'Tab7']">

                <x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '', 'name' => trans('messages.properties.Property_Media')]" />

                <div class="row">
                    {{-- Cover Image: --}}
                    <div class="col-md-12 common-label-css mt-3">
                        <x-forms.crm-multi-image-upload :fieldData="[
                            'name' => 'cover_image',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.cover_images') . ':',
                            'id' => 'cover_image',
                            'attributes' => [],
                            'hasHelpText' => false,
                            'help' => 'Please enter your name',
                            'maxFiles' => 1,
                            {{-- 'isRequired' => true, --}}
                            'addRemoveLinks' => true,
                            'dictDefaultMessage' => $defaultMessageCoverImage, 
                            'acceptedFiles' => 'image/*',
                            'uploadedFiles' => (!empty($developmentUnitData) && !empty($coverImageInstance)) ? collect([$coverImageInstance]) : ((!empty($property->reference) && !empty($coverImageInstance))
                                ? collect([$coverImageInstance])
                                : collect([])),
                        ]" />
                    </div>
                    {{-- Properties Images: --}}
                    <div class="col-md-12 common-label-css mt-3">
                        <x-forms.crm-multi-image-upload :fieldData="[
                            'name' => 'files',
                            'hasLabel' => true,
                            'label' => trans('messages.properties.Property_Images'),
                            'id' => 'files',
                            'attributes' => [],
                            'hasHelpText' => false,
                            'help' => 'Please enter your name',
                            'maxFiles' => 30,
                            'maxFilesize' => 5,
                            'isRequired' => true,
                            'addRemoveLinks' => true,
                            'dictDefaultMessage' => $defaultMessagePropertiesImages,
                            'acceptedFiles' =>
                                'image/*, application/pdf, application/msword,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel, video/*',
                            'uploadedFiles' => !empty($property->reference) ? $propertyImages : collect([]),
                        ]" />
                    </div>
                </div>
            </x-views.layouts.main-card.main-card-index>
            {{-- end-Property Media: --}}

            {{-- Property Tour: --}}
            <x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25', 'id' => 'Tab8']">

                <x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '', 'name' => trans('messages.property.property_tour')]" />

                <div class="row">
                    {{-- Virtual Tour:  --}}
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-2">
                        <div class="form-group mt-3 position-relative">
                            <label for="virtual_tour" class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                {{ trans('messages.property.virtual_tour') }}:
                            </label>
                            <input type="text"
                                class="mb-2 form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="virtual_tour" id="virtual_tour" placeholder=""
                                value="{{ $property->virtual_tour ?? '' }}">
                            <span
                                class="mt-10 text-14 color-black font-weight-700 lineheight-18">{{ trans('messages.property.link_to_presentation') }}
                            </span>
                        </div>
                    </div>
                    {{-- Video Tour: --}}
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-2">
                        <div class="form-group mt-3 position-relative">
                            <label for="video_tour" class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                {{ trans('messages.property.video_tour') }}:
                            </label>
                            <input type="text"
                                class="mb-2 form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="video_tour" id="video_tour" placeholder=""
                                value="{{ $property->video_tour ?? '' }}">
                            <span class="mt-10 text-14 color-black font-weight-700 lineheight-18">
                                {{ trans('messages.property.link_to_records') }}
                            </span>
                        </div>
                    </div>
                </div>
            </x-views.layouts.main-card.main-card-index>
            {{-- End-Property Tour: --}}

            {{-- Property Features: --}}
            <x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25', 'id' => 'Tab9']">

                <x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '', 'name' => trans('messages.listing.Property_Features')]" />

                <div class="row common-label-css">
                    @php
                        $selectedSubFeature = !empty($property->subFeatures)
                            ? $property->subFeatures->pluck('id')->toArray()
                            : [];
                        $selectedFeatures = !empty($property->reference)
                            ? $property->features->pluck('id')->toArray()
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
                        'hasPropertyFeature' => true,
                    ]">
                    </x-forms.crm-checkbox>

                </div>
            </x-views.layouts.main-card.main-card-index>
            {{-- End- Property Features: --}}

            <!--Contact Information -->
            <x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25', 'id' => 'Tab10']">

                <x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '', 'name' => trans('messages.property.contact_information')]" />

                <div class="row">
                    {{-- owner1: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'owner_one',
                            'hasLabel' => true,
                            'label' => trans('messages.property.owner_one') . ':',
                            'id' => 'owner_one',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->owner_one ?? '',
                        ]" />
                    </div>
                    {{-- Owner 2 --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'owner_two',
                            'hasLabel' => true,
                            'label' => trans('messages.property.owner_two') . ':',
                            'id' => 'owner_two',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->owner_two ?? '',
                        ]" />
                    </div>
                    {{--  Key Holder: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'key_holder',
                            'hasLabel' => true,
                            'label' => trans('messages.property.key_holder') . ':',
                            'id' => 'key_holder',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->key_holder ?? '',
                        ]" />
                    </div>
                    {{-- Developer: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'developer',
                            'hasLabel' => true,
                            'label' => trans('messages.property.developer') . ':',
                            'id' => 'developer',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->developer ?? '',
                        ]" />
                    </div>
                    {{-- Key Status --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'key_status',
                            'hasLabel' => true,
                            'label' => trans('messages.property.key_status') . ':',
                            'id' => 'key_status',
                            'options' => [
                                'vendors' => trans('messages.property.Vendor'),
                                'in office' => trans('messages.property.In_Office'),
                                'booke out' => trans('messages.property.Booked_out'),
                            ],
                            'attributes' => [],
                            'hasHelpText' => false,
                            'placeholder' => trans('messages.property.key_status'),
                            'selected' => $property->key_status ?? '',
                        ]" />
                    </div>
                    {{-- Key Id: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'key_id',
                            'hasLabel' => true,
                            'label' => trans('messages.property.key_id') . ':',
                            'id' => 'key_id',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->key_id ?? '',
                        ]" />
                    </div>
                    {{-- Key Details:  --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'key_details',
                            'hasLabel' => true,
                            'label' => trans('messages.property.key_detailes') . ':',
                            'id' => 'key_details',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->key_details ?? '',
                        ]" />
                    </div>
                    {{-- Private Notes: --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'private_note',
                            'hasLabel' => true,
                            'label' => trans('messages.property.private_note') . ':',
                            'id' => 'private_note',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->private_note ?? '',
                        ]" />
                    </div>
                    {{-- Lawyer: --}}
                    <div class="col-md-12 common-label-css mt-2 property_create_textarea">
                        <x-forms.crm-textarea :fieldData="[
                            'name' => 'lawyer',
                            'hasLabel' => true,
                            'label' => trans('messages.property.lawyer') . ':',
                            'id' => 'lawyer',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->lawyer ?? '',
                        ]" />
                    </div>
                </div>
            </x-views.layouts.main-card.main-card-index>
            <!--End of Contact Information-->

            {{-- buttons --}}
            <div class="col-md-12 d-flex gap-4">
                <x-forms.crm-button :fieldData="[
                    'text' => !empty($property->reference)
                        ? trans('messages.dashboard.Update')
                        : trans('messages.property.Add_new_property'),
                    'type' => 'button',
                    'class' =>
                        'border-r-8 b-color-Gradient color-white text-16 font-weight-400 line-height-24 small-button gardient-button addCreateNewPropertyBtn',
                    'id' => 'addCreateNewPropertyBtn',
                    'attributes' => [],
                ]" />
                <x-forms.crm-button :fieldData="[
                    'text' => trans('messages.dashboard.Cancel'),
                    'type' => 'button',
                    'url' => url()->previous(),
                    'target' => '_self',
                    'class' => 'b-color-transparent color-primary text-12 font-weight-700 line-height-15 cancelBtn ',
                    'id' => 'cancelBtn',
                    'attributes' => [],
                ]" />
            </div>
            {{-- end-buttons --}}
        </form>
        {{-- end-form --}}

    </div>
</div>


    <!-- Uploaded Properties Modal -->
            
    <div class="modal fade" id="uploadedPropertiesModal" tabindex="-1" role="dialog" aria-labelledby="add_unitLabel"
                aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_three" role="document">
            <div class="modal-content modal-content-file">
                <div class="modal-header border-0 modal-header_file pb-0">
                    <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="add_unitLabel">Uploaded Properties</h5>
                    <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true"> <i
                                class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                    </button>
                </div>
                <div class="modal-body modal_developer-padding">
                    <form id="uploadedPropertiesForm" class="row" type="post" enctype="multipart/form-data">
                        <p class="text-14 font-weight-400 lineheight-18 color-black text-center">Number of copies:
                            <span class="font-weight-700 color-primary numberofcopies">{{!empty($developmentUnitData['copies']) ? $developmentUnitData['copies'] : 0 }}</span>
                        </p>
                        <div class="upload_property-table mt-20">
                            
                                <table id="uploadedPropertiesTableDatas"
                                    class="display dashboard_table dashboard_edit_one table-bottom-border"
                                    style="width:100%; ">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" name="checkbox" checked class="checkbox  fileCheckbox uploadedPropertiesCheckboxAll"
                                                    data-id="23"></th>
                                            <th>Reference Number</th>
                                            <th>Property Type</th>
                                            <th>Property Size</th>
                                            <th>Price</th>
                                            
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="uploadedPropertiesTableData">
                                    @include('modules.developments.includes.uploaded_properties_data')
                                
                                    </tbody>

                                </table>
                            
                        </div>
                        <div class="d-flex align-items-center mt-30 justify-content-end">
                            
                            
                            <div class=" d-flex justify-content-start align-items-center">
                                <div class="form-group position-relative gap-12 d-flex align-items-center">
                                    <button type="button"
                                        class="border-button small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center uploadedPropertiesSubmitBtn uploadedPropertiesdraftBtn" data-name="draft"
                                        >
                                        Save as Draft</button>
                                    <button type="button"
                                        class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  small-button gardient-button uploadedPropertiesSubmitBtn uploadedPropertiespublishedBtn" data-name="published"
                                        >
                                        Publish
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="uploadPropertiesModalErrorMsgs">
                            <p class="text-14 font-weight-400 lineheight-18 red_text d-flex uploadPropertiesModalErrorMsg uploadPropertiesModalErrorMsg1 d-none" > Please provide unique Reference
                                Numbers of the units.</p>
                            <p class="text-14 font-weight-400 lineheight-18 red_text d-flex uploadPropertiesModalErrorMsg uploadPropertiesModalErrorMsg2 d-none" > Please fill out all the required fields.</p>
                            <p class="text-14 font-weight-400 lineheight-18 red_text d-flex uploadPropertiesModalErrorMsg uploadPropertiesModalErrorMsg3 d-none" > Some of the references already exists</p>
                        </div>
                        
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Uploaded Properties Modal -->


@push('scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=places"
        defer></script>


    <script>
        var routeUrl =
            "{{ route(routeNamePrefix() . 'properties.store') . (!empty($property->reference) ? '/' . $property->reference : '') }}";
        var geAgentDetailsUrl = "{{ route(routeNamePrefix() . 'properties.getAgentDetails', ':id') }}";
        var subtypeSelectedTypeId = "{{ route(routeNamePrefix() . 'properties.subtype', ':typeId') }}";
        var invalidAddressText = "{{ trans('messages.errors.Please_enter_valid_address') }}";
        var addDocumentUrl =
            "{{ route(routeNamePrefix() . 'properties.uploadDocuments') . (!empty($property->id) ? '/' . $property->id : '') }}";
        var removeDocumentUrl = "{{ route(routeNamePrefix() . 'properties.removeDocument', ':id') }}";
        var removePropertyAttachement = "{{ route(routeNamePrefix() . 'properties.removePropertyAttachement', ':id') }}";
        var isEditPage = "{{ !empty($property->type_id) ? 'Yes' : 'No' }}";
        var subTypeId = "{{ !empty($property->subtype_id) ? $property->subtype_id : '' }}";
        var subTypeId2 = "{{ !empty($property->id) ? $property->subtype_id2 : '' }}";
        var developmentId = "{{ !empty($developmentUnitData['development_id']) ? $developmentUnitData['development_id'] : 0 }}";
        var routeUrlUploadedProperties = "{{ route(routeNamePrefix() . 'developments.submitUploadedProperties',  !empty($developmentUnitData['development_id']) ? $developmentUnitData['development_id'] : 0) }}";
    </script>
    <!-- <script src="{{ asset('assets/js/modules/properties/add_property.js') }}"></script> -->
    <script src="{{ asset('assets/js/modules/properties/add_property_new.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    {{-- tab with slider  --}}
    <script>
        $(document).ready(function() {
            const sections = document.querySelectorAll('.card-description');
            const navLinks = document.querySelectorAll('.tablinks');
            let activeLink = null;
            const offset = 205;
            const $slider = $('.tab_slider');

            // Slick Slider Initialization
            $slider.slick({
                dots: false,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: false,
                draggable: false,
                responsive: [{
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 3.5
                        }
                    },
                    {
                        breakpoint: 1300,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 786,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            // Show Buttons and Slider on Load
            window.onload = function() {
                document.querySelector('.tab_slider').style.visibility = 'visible';
                document.getElementById('tab_slider_Prev').style.visibility = 'visible';
                document.getElementById('tab_slider_next').style.visibility = 'visible';
            };

            // Prev Button Click Handlers
            $('#tab_slider_Prev').on('click', function() {
                if ($('.slick-slide:last').hasClass('slick-active')) {

                    $('.slick-current').prev().addClass('slick-current');
                    $('.slick-current:last').find('.tablinks').removeClass('active');
                    $('.slick-current:last').removeClass('slick-current');
                    $('.slick-current').find('.tablinks').addClass('active');
                    var currentTabIndex = $('.slick-current').data('slick-index');
                    updateSpecificTabAndScroll(currentTabIndex);

                } else {

                    $slider.slick('slickPrev');
                    updateActiveTabAndScroll();
                }
            });

            // Next Button Click Handlers
            $('#tab_slider_next').on('click', function() {

                if ($('.slick-slide:last').hasClass('slick-active')) {
                    if (!$('.slick-slide:last').hasClass('slick-current')) {
                        $('.slick-current').next().addClass('slick-current');
                        $('.slick-current:first').find('.tablinks').removeClass('active');
                        $('.slick-current:first').removeClass('slick-current');
                        $('.slick-current').find('.tablinks').addClass('active');
                        var currentTabIndex = $('.slick-current').data('slick-index');
                        updateSpecificTabAndScroll(currentTabIndex);
                    }
                } else {

                    $slider.slick('slickNext');
                    updateActiveTabAndScroll();
                }
            });

            // Update Tab and Scroll Functions
            const updateActiveTabAndScroll = () => {
                const currentIndex = $slider.slick('slickCurrentSlide');
                const link = navLinks[currentIndex];
                makeActive(link);
                const targetId = link.getAttribute('data-target');
                const targetSection = document.getElementById(targetId);
                if (targetSection) {
                    window.scrollTo({
                        top: targetSection.offsetTop - offset,
                        behavior: 'smooth'
                    });
                }
            };

            const updateSpecificTabAndScroll = (currentIndex) => {
                const link = navLinks[currentIndex];
                makeActive(link);
                const targetId = link.getAttribute('data-target');
                const targetSection = document.getElementById(targetId);
                if (targetSection) {
                    window.scrollTo({
                        top: targetSection.offsetTop - offset,
                        behavior: 'smooth'
                    });
                }
            };

            // Make Active Tab Function
            const makeActive = (link) => {
                if (activeLink !== link) {
                    if (activeLink) {
                        activeLink.classList.remove('active');
                    }
                    if (link) {
                        link.classList.add('active');
                        activeLink = link;
                    }
                }
            };

            // Intersection Observer for Scrolling Sync
            const sectionObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const targetId = entry.target.id;
                        const link = document.querySelector(`.tablinks[data-target="${targetId}"]`);
                        makeActive(link);
                        const index = Array.from(navLinks).indexOf(link);
                        $slider.slick('slickGoTo', index);
                    }
                });
            }, {
                rootMargin: `-50% 0px -50% 0px`,
                threshold: 0
            });
            sections.forEach((section) => {
                sectionObserver.observe(section);
            });

            // Navigation Link Click Event Listener
            navLinks.forEach((link) => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetSectionId = link.getAttribute('data-target');
                    const targetSection = document.getElementById(targetSectionId);
                    if (targetSection) {
                        window.scrollTo({
                            top: targetSection.offsetTop - offset,
                            behavior: 'smooth'
                        });
                        makeActive(link);
                        const index = Array.from(navLinks).indexOf(link);
                        $slider.slick('slickGoTo', index);
                    }
                });
            });
        });
    </script>

    {{-- fixed with scroll --}}
    <script>
        // Function adjustElements
        function adjustElements() {
            const navbar = document.getElementById('tab-slider_id');
            const sliderPrev = document.getElementById('tab_slider_Prev');
            const sliderNext = document.getElementById('tab_slider_next');
            const screenWidth = window.innerWidth;
            const scrollPosition = window.scrollY;

            // Responsive Layout Logic
            let topPosition;
            if (screenWidth <= 576) {
                topPosition = scrollPosition > 50 ? '124px' : '190px';
            } else if (screenWidth <= 986) {
                topPosition = scrollPosition > 80 ? '50px' : '126px';
            } else {
                topPosition = '126px';
            }

            // Setting the Top Position
            navbar.style.top = topPosition;
            sliderPrev.style.top = topPosition;
            sliderNext.style.top = topPosition;
        }

        // Event Listeners for Scroll and Resize
        window.addEventListener('scroll', adjustElements);
        window.addEventListener('resize', adjustElements);

        // Initial Position Check on Page Load
        adjustElements();
    </script>

{{-- to hide this fields for developers account  --}}
<script>
    var userRole = @json(auth()->user()->role->name);
    var fieldsToHide = ["list_agent", "list_Agent_c", "sell_agent", "sell_Agent_c"];
    var headersToHide = [".listing-agent-header", ".selling-agent-header"];
</script>

@endpush
@endsection
