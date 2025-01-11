@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />

@section('title')
{{ !empty($property->reference) ? trans('messages.properties.Edit_Property') : trans('messages.properties.Add_New_Property') }}
Inmoconnect
@endsection


<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="min-vh-100 b-color-background">
    <div class="crm-main-content">
        <div class="" style='position: fixed;z-index:99;background-color:#f6f6ff;width: calc(100% - 324px);'>
        <x-forms.crm-breadcrumb
            :fieldData="[['url' => route(routeNamePrefix().'properties.index'),'label' => trans('messages.sidebar.Property_Listing')],['url' => '','label' =>!empty($property->reference) ? trans('messages.properties.Edit_Property') : trans('messages.properties.Add_New_Property')]]" />
    </div> 


            <div class="tab_slider-main" style="overflow: hidden">
                <div class="tab_slider">
                    <div>
                        <button class="tablinks" data-target="Tab1">Property Information</button>
                    </div>
                    <div>
                        <button class="tablinks" data-target="Tab2">Property Pricing</button>
                    </div>
                    <div>
                        <button class="tablinks" data-target="Tab3">Property Location</button>
                    </div>
                    <div>
                        <button class="tablinks" data-target="Tab4">Property Dimension</button>
                    </div>
                    <div>
                        <button class="tablinks" data-target="Tab5">Property Document Information</button>
                    </div>
                    <div>
                        <button class="tablinks" data-target="Tab6">Professional Information</button>
                    </div>
                    <div>
                        <button class="tablinks" data-target="Tab7">Property Media</button>
                    </div>
                    <div>
                        <button class="tablinks" data-target="Tab8">Property Tour</button>
                    </div>
                    <div>
                        <button class="tablinks" data-target="Tab9">Property Features</button>
                    </div>
                    <div>
                        <button class="tablinks" data-target="Tab10">Contact Information</button>
                    </div>

                </div>
                <button class="prev"></button>
                <button class="next"></button>
            </div> 
        <form action="" class="tab_slider-view-page" id="addNewPropertyForm" type="post" enctype="multipart/form-data">

            <x-views.layouts.main-card.main-card-index 
                :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25','id' => 'Tab1']">

                <x-views.layouts.main-card.sub-components.card-heading
                    :fieldData="['class' => '','name' => trans('messages.properties.Property_Information')]" />
                <div class="row">
                    {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                            <x-forms.crm-single-select :fieldData="[
                        'name' => 'category_id',
                        'hasLabel' => true,
                        'label' => trans('messages.properties.Property_Category').':',
                        'id' => 'category_id',
                        'options' => $categories,
                        'attributes' => [],
                        'hasHelpText' => false,
                        'placeholder' => trans('messages.properties.Property_Category'),
                        'isRequired' => true,
                        'selected' => $property->category_id ?? ''
                    ]" />
                        </div> --}}
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-single-select :fieldData="[
                    'name' => 'situation_id',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Property_Situation').':',
                    'id' => 'situation_id',
                    'options' => $situations,
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => trans('messages.properties.Property_Situation'),
                    'isRequired' => true,
                    'selected' => $property->situation_id ?? '',
                ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-single-select :fieldData="[
                    'name' => 'subtype_id',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Property_Subtype').':',
                    'id' => 'subtype',
                    'options' => [],
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => trans('messages.properties.Property_Subtype'),
                    'isRequired' => true,
                    'minimumResultsForSearch' => 0,
                    'selected' => $property->subtype_id ?? '', 
                ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2" id="subtype2Container"
                        style="display: none;">

                        <x-forms.crm-single-select :fieldData="[
                    'name' => 'subtype_id2',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Property_Subtype2'),
                    'id' => 'subtype2',
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => trans('messages.properties.Property_Subtype2'),
                    //'isRequired' => true,
                    'minimumResultsForSearch' => 0,
                    'selected' => $property->subtype_id2 ?? '', 
                ]" />
                    </div>
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
                    'value' => $property->reference ?? ''
                ]" />
                    </div>
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
                    'value' => $property->name ?? ''
                ]" />
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        {{-- <x-forms.crm-text-field :fieldData="[
                    'name' => 'price',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Property_Price'),
                    'id' => 'price',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->price ?? '',
                ]" /> --}}
                    </div>

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
                    'value' => $property->bathrooms ?? '',

                ]" />
                    </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                    <x-forms.crm-single-select :fieldData="[
                        'name' => 'completion_status',
                        'hasLabel' => true,
                        'label' => 'Property Status/Completion:',
                        'id' => 'completion_status',
                        'options' => ['completed' => 'Completed', 
                                    'under_construction' => 'Under Construction',
                                    'off_plan' => 'Off Plan'],
                        'attributes' => [],
                        'hasHelpText' => false,
                        'placeholder' => 'Select Property Status or Completion',
                        'isRequired' => true,
                        'minimumResultsForSearch' => 0,
                        'selected' => $property->status_completion ?? '',
                    ]" />
                </div>
                <div id="year_completed_container" class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2" style="display:none;">
                    <x-forms.crm-single-select :fieldData="[
                        'name' => 'year_completed',
                        'hasLabel' => true,
                        'label' => 'Select Completion Year',
                        'id' => 'year_completed',
                        'options' => ['2023' => '2023'],  // Add more years if needed
                        'attributes' => [],
                        'hasHelpText' => false,
                        'placeholder' => 'Select Completion Year',
                        'isRequired' => true,
                        'selected' => $property->year ?? '',
                    ]" />
                </div>
                <div id="month_year_container" class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2" style="display:none;">
                    <x-forms.crm-single-select :fieldData="[
                        'name' => 'month_year',
                        'hasLabel' => true,
                        'label' => 'Select Completion Month and Year',
                        'id' => 'month_year',
                        'options' => [ /* Populate options */ ],
                        'attributes' => [],
                        'hasHelpText' => false,
                        'placeholder' => 'Select Completion Month and Year',
                        'isRequired' => true,
                        'selected' => $property->year ?? '',
                    ]" />
                </div>

                    <div id="commercial_checkbox_container" class="mt-3 d-flex align-items-center gap-2">
                        <div class="col-lg-2 col-md-3 common-label-css d-flex align-items-center gap-2">
                            <input type="checkbox" name="freehold" id="freehold_checkbox" {{ !empty($property->freehold)
                            ? 'checked' : '' }}>{{ trans('messages.properties.Freehold') }}

                        </div>
                        <div class="col-lg-2 col-md-3 common-label-css d-flex align-items-center gap-2">
                            <input type="checkbox" name="leasehold" id="leasehold_checkbox" {{
                                !empty($property->leasehold) ? 'checked' : ''
                            }}>{{trans('messages.properties.Leasehold')}}
                        </div>
                    </div>
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
                    <div class="col-md-12 common-label-css mt-2 "> 
                        <label>Feeds: </label><br>
                        <div class="d-flex gap-3">
                            <label class="d-flex gap-2">
                                <input type="radio" id="feeds_yes" name="feeds" value="1" {{
                                    !empty($property) && $property->nota_simple == 1 ? 'checked' : '' }}>
                                <span class="radio-custom" for="feeds_yes"></span>
                                Realinmo
                            </label>
                        </div></label>
                    </div>
                </div>
            </x-views.layouts.main-card.main-card-index>

            <!--Property Pricing --> 
            <x-views.layouts.main-card.main-card-index
                     :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25' ,'id' => 'Tab2']">
                <x-views.layouts.main-card.sub-components.card-heading
                :fieldData="['class' => '','name' => 'Property Pricing']" />
                <div class="row">
                    <div id="listed_as" class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'pro_listed_as',
                            'hasLabel' => true,
                            'label' => 'Property Listed As'.':',
                            'id' => 'pro_listed_as_one',
                            'options' => ['for_sale' =>'For Sale','for_rent' => 'For Rent'],
                            'attributes' => [],
                            'hasHelpText' => false,
                            'placeholder' => 'Property Listed As',
                            'isRequired' => true,
                            'selected' => $property->listed_as ?? '',
                        ]" />
                    </div>
                    <div id="sale_price_container" class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'price',
                            'hasLabel' => true,
                            'label' => 'Sale Price'.':',
                            'id' => 'price',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->price ?? '',
                        ]" />
                    </div>
                    <div id="rental_conatiner" class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'rent_type',
                            'hasLabel' => true,
                            'label' => 'Rent Type'.':',
                            'id' => 'rent_type',
                            'options' => ['short_term' =>'For Rent - Short Term',
                                        'long_term' => 'For Rent - Low Term'],
                            'attributes' => [],
                            'hasHelpText' => false,
                            'placeholder' => 'Rent Type',
                            'isRequired' => true,
                            'selected' => $property->rent_type ?? '',
                        ]" />
                    </div>
                </div>
                <div class="row">
                    <div id="short_term_container" class="col-md-4 common-label-css">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'price',
                            'hasLabel' => true,
                            'label' => 'Short Term Low Season'.':',
                            'id' => 'price',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->price ?? '',
                        ]" />
                    </div>
                    <div id="long_term_container" class="col-md-4 common-label-css">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'price',
                            'hasLabel' => true,
                            'label' => 'Long Term High Season'.':',
                            'id' => 'price',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->price ?? '',
                        ]" />
                    </div>
                    <div id="percentage_container" class="col-md-4 common-label-css">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'percentage',
                            'hasLabel' => true,
                            'label' => 'Percentage'.':',
                            'id' => 'percentage',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->percentage ?? '',
                        ]" />
                    </div>
                    <div id="commission_container" class="col-md-4 common-label-css">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'commission',
                            'hasLabel' => true,
                            'label' => 'Commission'.':',
                            'id' => 'commission',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'isRequired' => true,
                            'value' => $property->commission ?? '',
                        ]" />
                    </div>
                    <div id="net_price_container" class="col-md-4 common-label-css">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'net_price',
                            'hasLabel' => true,
                            'label' => 'Net Price'.':',
                            'id' => 'net_price',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->net_price ?? '',
                        ]" />
                </div>
        </div>
        <!-- for himanshi Add Label of listing agent-->
        <div id="listing_container" class="row">
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                <x-forms.crm-text-field :fieldData="[
            'name' => 'list_agent_per',
            'hasLabel' => true,
            'label' => 'Listing Agent'.':',
            'id' => 'list_agent',
            'attributes' => [],
            'hasHelpText' => false,
            //'help' => 'Please enter your name',
            'isRequired' => true,
            'value' => $property->list_agent_per ?? '',

        ]" />
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                <x-forms.crm-text-field :fieldData="[
            'name' => 'list_Agent_com',
            'hasLabel' => true,
            'label' => 'Listing Agent'.':',
            'id' => 'list_Agent_c',
            'attributes' => [],
            'hasHelpText' => false,
            //'help' => 'Please enter your name',
            'isRequired' => true,
            'value' => $property->list_Agent_c ?? '',
        ]" />
            </div>

        </div>
        <!-- for himanshi Add Label of selling agent-->
        <div id="selling_container" class="row">
            <div  class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                <x-forms.crm-text-field :fieldData="[
            'name' => 'sell_agent_per',
            'hasLabel' => true,
            'label' => 'Selling Agent'.':',
            'id' => 'sell_agent',
            'attributes' => [],
            'hasHelpText' => false,
            //'help' => 'Please enter your name',
            'isRequired' => true,
            'value' => $property->sell_agent_per ?? '',

        ]" />
            </div>
            <div  class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                <x-forms.crm-text-field :fieldData="[
            'name' => 'sell_Agent_com',
            'hasLabel' => true,
            'label' => 'Selling Agent'.':',
            'id' => 'sell_Agent_c',
            'attributes' => [],
            'hasHelpText' => false,
            //'help' => 'Please enter your name',
            'isRequired' => true,
            'value' => $property->sell_Agent_c ?? '',
        ]" />
            </div>
            <div id="value_deed_container" class="row">
                <div class="col-md-4 common-label-css">
                            <x-forms.crm-text-field :fieldData="[
                        'name' => 'valuation',
                        'hasLabel' => true,
                        'label' => 'Valuation'.':',
                        'id' => 'valuation',
                        'attributes' => [],
                        'hasHelpText' => false,
                        //'help' => 'Please enter your name',
                        {{-- 'isRequired' => true, --}}
                        'value' => $property->valuation ?? '',

                    ]" />
                </div>
                <div class="col-md-4 common-label-css">
                            <x-forms.crm-text-field :fieldData="[
                        'name' => 'valuation_year',
                        'hasLabel' => true,
                        'label' => 'Valuation Year'.':',
                        'id' => 'valuation_year',
                        'attributes' => [],
                        'hasHelpText' => false,
                        //'help' => 'Please enter your name',
                        {{-- 'isRequired' => true, --}}
                        'value' => $property->valuation_year ?? '',

                    ]" />
                </div>
                <div class="col-md-4 common-label-css">
                            <x-forms.crm-text-field :fieldData="[
                        'name' => 'deed_value',
                        'hasLabel' => true,
                        'label' => 'Deed Value'.':',
                        'id' => 'deed_value',
                        'attributes' => [],
                        'hasHelpText' => false,
                        //'help' => 'Please enter your name',
                        {{-- 'isRequired' => true, --}}
                        'value' => $property->deed_value ?? '',

                    ]" />
                 </div>
            </div>
            <div id="minimun_container" class="row">
                <div class="col-md-4 common-label-css">
                    <x-forms.crm-text-field :fieldData="[
                        'name' => 'min_price',
                        'hasLabel' => true,
                        'label' => 'Minimun Price'.':',
                        'id' => 'min_price',
                        'attributes' => [],
                        'hasHelpText' => false,
                        //'help' => 'Please enter your name',
                        {{-- 'isRequired' => true, --}}
                        'value' => $property->min_price ?? '',

                    ]" />
                </div>
            </div>
            <div id="fees_tax_container" class="row">
                <div class="col-md-4 common-label-css">
                    <x-forms.crm-text-field :fieldData="[
                        'name' => 'community_fees',
                        'hasLabel' => true,
                        'label' => 'Community Fees'.':',
                        'id' => 'community_fees',
                        'attributes' => [],
                        'hasHelpText' => false,
                        //'help' => 'Please enter your name',
                        {{-- 'isRequired' => true, --}}
                        'value' => $property->community_fees ?? '',

                    ]" />
                </div>
                <div class="col-md-4 common-label-css">
                    <x-forms.crm-text-field :fieldData="[
                        'name' => 'garbage_price',
                        'hasLabel' => true,
                        'label' => 'Garbage Tax'.':',
                        'id' => 'garbage_price',
                        'attributes' => [],
                        'hasHelpText' => false,
                        //'help' => 'Please enter your name',
                        {{-- 'isRequired' => true, --}}
                        'value' => $property->garbage_price ?? '',

                    ]" />
                </div>
                <div class="col-md-4 common-label-css">
                    <x-forms.crm-text-field :fieldData="[
                        'name' => 'ibi_fees',
                        'hasLabel' => true,
                        'label' => 'IBI Fees'.':',
                        'id' => 'ibi_fees',
                        'attributes' => [],
                        'hasHelpText' => false,
                        //'help' => 'Please enter your name',
                        {{-- 'isRequired' => true, --}}
                        'value' => $property->ibi_fees ?? '',

                    ]" />
                </div>
            </div>
            <div id="commission_note_container" class="row">
                <div class="col-md-12 common-label-css mt-2 ">
                    <x-forms.crm-textarea :fieldData="[
                'name' => 'note_com',
                'hasLabel' => true,
                'label' => 'Commission Notes (Seen By Other Agencies)',
                'id' => 'note_com',
                'attributes' => [],
                'hasHelpText' => false,
                //'help' => 'Please enter your name',
                'isRequired' => true,
                {{-- 'useCkEditor' => true, --}}
                'value' => $property->note_com ?? '',
                ]" />
                </div>
            </div>
       
            <!--for Himanshi check the spacing and hight-width-->
            <div class="row">
            <div id="allow_required_container" >
                <div class="d-flex gap-3 mt-3">
                <label class="d-flex gap-2">
                    <input type="radio" id="bank_yes" name="bank" value="1" {{
                        !empty($property) && $property->nota_simple == 1 ? 'checked' : '' }}>
                    <span class="radio-custom" for="bank_yes"></span>
                    Bank Guarantee Required
                </label>
                <label class="d-flex gap-2">
                    <input type="radio" id="refrence_yes" name="refrence" value="1" {{
                        !empty($property) && $property->nota_simple == 1 ? 'checked' : '' }}>
                    <span class="radio-custom" for="refrence_yes"></span>
                    Reference Required
                </label>
                <label class="d-flex gap-2">
                    <input type="radio" id="smoking_yes" name="smoking" value="1" {{
                        !empty($property) && $property->smoking_allowed == 1 ? 'checked' : '' }}>
                    <span class="radio-custom" for="smoking_yes"></span>
                    Smoking Allowed
                </label>
                <label class="d-flex gap-2">
                    <input type="radio" id="pets_yes" name="pets" value="1" {{
                        !empty($property) && $property->pets_allowed == 1 ? 'checked' : '' }}>
                    <span class="radio-custom" for="pets_yes"></span>
                    Pets Allowed
                </label>
            </div>
            </div>
            <div id="rent_certificate_container">
                <div  class="col-md-12 common-label-css mt-2 "> 
                    <label>Rental Certificate: </label><br>
                    <div class="d-flex gap-3">
                        <label class="d-flex gap-2">
                            <input type="radio" id="rental_yes" name="rental" value="1" {{
                                !empty($property) && $property->rental == 1 ? 'checked' : '' }}>
                            <span class="radio-custom" for="rental_yes"></span>
                            Yes
                        </label>
                    </div></label>
                </div>
            </div>
            </div>

        </div>
        </x-views.layouts.main-card.main-card-index>
            
        <!--End of Property Pricing -->

            <x-views.layouts.main-card.main-card-index
                :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25','id' => 'Tab3']">
                <x-views.layouts.main-card.sub-components.card-heading
                    :fieldData="['class' => '','name' => trans('messages.properties.Property_Location')]" />
                <div class="row">
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
                    <div class="col-9 col-md-10 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                    'name' => 'address',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Property_Address').':',
                    'id' => 'address',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->address ?? '',
                ]" />
                    </div>
                    <div class="col-3 col-md-2">
                        <div class="form-group mt-3 position-relative mt-5">
                            <label for=""
                                class="text-13 font-weight-400 line-height-20 text-capitalize color-b-blue"></label>
                            <x-forms.crm-button :fieldData="[
                    'text' => trans('messages.properties.To_Locate'),
                    'type' => 'button',
                    'class' => 'border-r-8 b-color-Gradient color-white text-12 font-weight-400 line-height-15 w-100 h-42 gardient-button locateAddressBtn mt-2',
                    'id' => 'locateAddressBtn',
                    'attributes' => []
                        ]" />
                        </div>
                    </div>
                    <input type="hidden" name="latitude" class="form-control small latitude_v"
                        value="{{!empty($property->reference) ? $property->latitude : old('latitude')}}"
                        id="latitude_v" />
                    <input type="hidden" name="longitude" class="form-control small longitude_v"
                        value="{{!empty($property->reference) ? $property->longitude : old('longitude')}}"
                        id="longitude_v" />
                    <input type="hidden" name="country" class="form-control small country_v"
                        value="{{!empty($property->reference) ? $property->country : old('country')}}" id="country_v" />
                    <input type="hidden" name="state" class="form-control small state_v"
                        value="{{!empty($property->reference) ? $property->state : old('state')}}" id="state_v" />
                    {{-- <input type="hidden" name="city" class="form-control small city_v"
                        value="{{!empty($property->reference) ? $property->city : old('city')}}" id="city_v" /> --}}
                    <div class="col-lg-12 mt-3">
                        <div id="propertyMap" style="height: 330px;"></div>
                        <!-- <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus"
            width="100%" height="330" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    </div>
                    {{-- <div class="col-md-12 common-label-css mt-2 ">
                        <x-forms.crm-textarea :fieldData="[
                    'name' => 'notes',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Property_Notes').':',
                    'id' => 'notes',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    //'isRequired' => true,
                    'value' => $property->notes ?? '',
                ]" />
                    </div> --}}
                </div>
            </x-views.layouts.main-card.main-card-index>

            <x-views.layouts.main-card.main-card-index
                :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25','id' => 'Tab4']">
                <x-views.layouts.main-card.sub-components.card-heading
                    :fieldData="['class' => '','name' => trans('messages.properties.Property_Dimensions')]" />
                <div class="row">
                    <div class="col-md-4 common-label-css">
                        <x-forms.crm-single-select :fieldData="[
                        'name' => 'dimension_type',
                        'hasLabel' => true,
                        'label' => 'Dimension Type'.':',
                        'id' => 'dimension_type',
                        'options' => ['Meter'=>'Meters', 'Feet'=>'Feet'],
                        'attributes' => [],
                        'hasHelpText' => false,
                        'placeholder' => 'Dimension Type',
                        'isRequired' => true,
                        'minimumResultsForSearch' => 0,
                        'selected' => $property->dimension_type ?? '',
                    ]" />
                    </div>
                    
                    <div class="col-md-4 common-label-css" id="floors">
                        <x-forms.crm-text-field :fieldData="[
                                'name' => 'floors',
                                'hasLabel' => true,
                                'label' => trans('messages.properties.Floors'),
                                'id' => 'floors',
                                'attributes' => [],
                                'hasHelpText' => false,
                                //'help' => 'Please enter your name',
                                'isRequired' => true,
                                'value' => $property->floors ?? '',
                                
                        ]" />
                    </div>
                    <!-- <div class="col-md-4 common-label-css" id="total_size">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'size',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Total_Size'),
                    'id' => 'total_size',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => 0,

                ]"/>
        </div> -->
                    <div class="col-md-4 common-label-css" id="total_size">
                        <div class=" from-group mt-3 position-relative">
                            <label>{{trans('messages.properties.Total_Size')}}</label>
                            <input type="number"
                                class=" form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="size" id="total_size" value="{{ $property->size ?? '' }}" required>
                            <div class="input-group-append">
                                <span class="input-group-text">m</span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-4 common-label-css" id="plot_size">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'plot_size',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.plot_size'),
                    'id' => 'plot_size',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => 0,

                ]"/>
        </div> -->
                    <div class="col-md-4 common-label-css" id="plot_size" style="display: none;">
                        <div class="from-group mt-3 position-relative">
                            <label>{{trans('messages.properties.plot_size')}}</label>
                            <input type="number"
                                class=" form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46"
                                name="plot_size" id="plot_size_input" value="{{ $property->plot_size ?? '' }}"
                                required>
                            <div class="input-group-append">
                                <span class="input-group-text">m²</span>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-md-4 common-label-css">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'built',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Built'),
                    'id' => 'built',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => 0,
                ]"/>
        </div> -->
                    <div class="col-md-4 common-label-css">
                        <div class="from-group mt-3 position-relative">
                            <label>{{trans('messages.properties.Built')}}</label>
                            <input type="number"
                                class=" form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46"
                                name="built" id="built" value="{{ $property->built ?? '' }}" required>
                            <div class="input-group-append">
                                <span class="input-group-text">m²</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 common-label-css" id="storeys">
                        <x-forms.crm-text-field :fieldData="[
                    'name' => 'storeys',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Storeys'),
                    'id' => 'storeys',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->storeys ?? '',
                   
                ]" />
                    </div>

                    <div class="col-md-4 common-label-css" id="no_of_properties_builtin">
                        <x-forms.crm-text-field :fieldData="[
                    'name' => 'no_of_properties_builtin',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.No_of_Properties_In_Buildin'),
                    'id' => 'no_of_properties_builtin',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->no_of_properties_builtin ?? '',
                    
                ]" />
                    </div>
                    <!-- <div class="col-md-4 common-label-css" id="terrace">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'terrace',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Terrace'),
                    'id' => 'terrace',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => 0,
                ]"/>
        </div> -->
                    <div class="col-md-4 common-label-css" id="terrace">
                        <div class="from-group mt-3 position-relative">
                            <label>{{trans('messages.properties.Terrace')}}</label>
                            <input type="number"
                                class=" form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46"
                                name="terrace" id="terrace" value="{{$property->terrace ?? ''}}" required>
                            <div class="input-group-append">
                                <span class="input-group-text">m²</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 common-label-css" id="levels">
                        <x-forms.crm-text-field :fieldData="[
                    'name' => 'levels',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Levels'),
                    'id' => 'levels',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->levels ?? '',
                   
                ]" />
                    </div>

                    <div class="col-md-4 common-label-css" id="agency_ref">
                        <x-forms.crm-text-field :fieldData="[
                    'name' => 'agency_ref',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Agency_Ref'),
                    'id' => 'agency_ref',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->agency_ref ?? '',

                ]" />
                    </div>
                    <!--  <div class="col-md-4 common-label-css" id="garden_plot">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'garden_plot',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Garden_Plot'),
                    'id' => 'garden_plot',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => 0,
                ]"/>
        </div> -->
                    <div class="col-md-4 common-label-css">
                        <div class="from-group mt-3 position-relative" id="garden_plot">
                            <label>{{trans('messages.properties.Garden_Plot')}}</label>
                            <input type="number"
                                class=" form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46"
                                name="garden_plot" id="garden_plot" value="{{$property->garden_plot ?? ''}}" required>
                            <div class="input-group-append">
                                <span class="input-group-text">m²</span>
                            </div>
                        </div>
                    </div>
                    <!--  <div class="col-md-4 common-label-css" id="properties_int_floor_space">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'properties_int_floor_space',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Int_Floor_Space'),
                    'id' => 'properties_int_floor_space',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => 0,
                ]"/>
        </div> -->
                    <div class="col-md-4 common-label-css">
                        <div class="from-group mt-3 position-relative" id="properties_int_floor_space">
                            <label>{{trans('messages.properties.Int_Floor_Space')}}</label>
                            <input type="number"
                                class=" form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46"
                                name="properties_int_floor_space" id="properties_int_floor_space"
                                value="{{$property->properties_int_floor_space ?? ''}}" required>
                            <div class="input-group-append">
                                <span class="input-group-text">m</span>
                            </div>
                            <div class="input_estimated">(estimated)</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'co2_emission',
                            'hasLabel' => true,
                            'label' => 'CO2 Emission'.':',
                            'id' => 'co2_emission',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            {{-- 'isRequired' => true, --}}
                            'value' => $property->co2_emission ?? '',
                        ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-single-select :fieldData="[
                    'name' => 'letter_emi',
                    'hasLabel' => true,
                    'label' =>'Letter'.':',
                    'id' => 'letter_emi',
                    'options' => ['A'=>'A',
                                'B'=>'B',
                                'C' =>'C',
                                'D' =>'D',
                                'E' =>'E',
                                'F'=>'F',
                                'G'=>'G'],
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => 'Letter',
                    'selected' => $property->letter_emi ?? '',
                ]" />
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'energy_consumption',
                            'hasLabel' => true,
                            'label' => 'Energy Consumption'.':',
                            'id' => 'energy_consumption',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            {{-- 'isRequired' => true, --}}
                            'value' => $property->energy_consumption ?? '',
                        ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-single-select :fieldData="[
                    'name' => 'letter_con',
                    'hasLabel' => true,
                    'label' =>'Letter'.':',
                    'id' => 'letter_con',
                    'options' => ['A'=>'A',
                                'B'=>'B',
                                'C' =>'C',
                                'D' =>'D',
                                'E' =>'E',
                                'F'=>'F',
                                'G'=>'G'],
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => 'Letter',
                    'selected' => $property->letter_con ?? '',
                ]" />
                    </div>

                </div>
            </x-views.layouts.main-card.main-card-index>

            <x-views.layouts.main-card.main-card-index
                :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25','id' => 'Tab5']">
                <x-views.layouts.main-card.sub-components.card-heading
                    :fieldData="['class' => '','name' => trans('messages.properties.Property_Documents_Information')]" />
                <div class="row">
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
                    <div class="col-12 col-sm-12 col-md-12  col-lg-12 common-label-css common-attachment">
                        <div class="form-group mt-3 position-relative propertyDocumentsDiv">

                            <div class="form-group_file gap-3">
                                <input type="file" name="documents[]" onchange="handleDocumentsSelect(event)" accept=".pdf,.xlsx .jpeg, .jpg, .png" multiple class="input-file_choose propertyDocumentsInput input_property-file">
                                <div
                                    class="attachment_scroll d-flex align-tems-center gap-3 flex-wrap w-100 propertyDocumentsData">
                                    @if(!empty($documentData) && $documentData->isNotEmpty())
                                    @include('modules.properties.includes.property_documents_data')
                                    @endif
                                </div>

                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
            <input type="file" name="file" id="certificate_file" accept="image/*">
            <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize">
                @if(!empty($property->file))
                    {{ basename($property->file) }}
                <span class="ps-4 removeFileBtn" data-id="{{ $property->owner_id ?? '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z"
                            fill="#383192" />
                    </svg>
                </span>
                @endif
            </div>
        </div> -->
                    <div class="col-md-2 common-label-css mt-3">
                        <label>{{ trans('messages.properties.Nota_Simple') }}</label><br>
                        <div class="d-flex gap-3">
                            <label class="d-flex gap-2">
                                <input type="radio" id="nota_simple_yes" name="nota_simple" value="1" {{
                                    !empty($property) && $property->nota_simple == 1 ? 'checked' : '' }}>
                                <span class="radio-custom" for="nota_simple_yes"></span>
                                {{ trans('messages.properties.yes') }}
                            </label>
                            <label class="d-flex gap-2">
                                <input type="radio" id="nota_simple_no" name="nota_simple" value="0" {{
                                    !empty($property) && $property->nota_simple == 0 ? 'checked' : '' }}>
                                <span class="radio-custom" for="nota_simple_no"></span>
                                {{ trans('messages.properties.no') }}
                            </label>
                        </div>
                    </div>

                    <div class="col-md-2 common-label-css mt-3">
                        <label>{{ trans('messages.properties.IBI_Receipt') }}</label><br>
                        <div class="d-flex gap-3">
                            <label class="d-flex gap-2">
                                <input type="radio" id="ibi_receipt_yes" name="IBI_receipt" value="1" {{
                                    !empty($property) && $property->IBI_receipt == 1 ? 'checked' : '' }}>
                                <span class="radio-custom" for="ibi_receipt_yes"></span>
                                {{ trans('messages.properties.yes') }}
                            </label>
                            <label class="d-flex gap-2">
                                <input type="radio" type="radio" id="ibi_receipt_no" name="IBI_receipt" value="0" {{
                                    !empty($property) && $property->IBI_receipt == 0 ? 'checked' : '' }}>
                                <span class="radio-custom" for="ibi_receipt_no"></span>
                                {{ trans('messages.properties.no') }}
                            </label>
                        </div>
                    </div>

                    <div class="col-md-5 common-label-css mt-3">
                        <label>{{ trans('messages.properties.First_Occupancy_License_AFO') }}</label><br>
                        <div class="d-flex gap-3">
                            <label class="d-flex gap-2">
                                <input type="radio" id="first_occupancy_license_yes" name="first_occupancy_license_aFO"
                                    value="1" {{ !empty($property) && $property->first_occupancy_license_aFO == 1 ?
                                'checked' : '' }}>
                                <span class="radio-custom" for="first_occupancy_license_yes"></span>
                                {{ trans('messages.properties.yes') }}
                            </label>
                            <label class="d-flex gap-2">
                                <input type="radio" id="first_occupancy_license_no" name="first_occupancy_license_aFO"
                                    value="0" {{ !empty($property) && $property->first_occupancy_license_aFO == 0 ?
                                'checked' : '' }}>
                                <span class="radio-custom" for="first_occupancy_license_no"></span>
                                {{ trans('messages.properties.no') }}
                            </label>
                        </div>
                    </div>
                    <!-- <div class="col-md-2 common-label-css mt-3">
                        <label>{{ trans('messages.properties.Nota_Simple') }}</label><br>
                        <input type="radio" id="nota_simple_yes" name="nota_simple" value="1"
                            {{ !empty($property) && $property->nota_simple == 1 ? 'checked' : '' }}>
                        <label for="nota_simple_yes">{{ trans('messages.properties.yes') }}</label>
                        <input type="radio" id="nota_simple_no" name="nota_simple" value="0"
                            {{ !empty($property) && $property->nota_simple == 0 ? 'checked' : '' }}>
                        <label for="nota_simple_no">{{ trans('messages.properties.no') }}</label>
                    </div> -->
                    <!-- <div class="col-md-2 common-label-css mt-3">
                        <label>{{ trans('messages.properties.IBI_Receipt') }}</label><br>
                        <input type="radio" id="ibi_receipt_yes" name="IBI_receipt" value="1"
                            {{ !empty($property) && $property->IBI_receipt == 1 ? 'checked' : '' }}>
                        <label for="ibi_receipt_yes">{{ trans('messages.properties.yes') }}</label>
                        <input type="radio" id="ibi_receipt_no" name="IBI_receipt" value="0"
                            {{ !empty($property) && $property->IBI_receipt == 0 ? 'checked' : '' }}>
                        <label for="ibi_receipt_no">{{ trans('messages.properties.no') }}</label>
                    </div> -->
                    <!-- <div class="col-md-3 common-label-css mt-3">
                        <label>{{ trans('messages.properties.First_Occupancy_License_AFO') }}</label><br>
                        <div class="d-flex">
                        <div class="from-group">
                        <input type="radio" id="first_occupancy_license_yes" name="first_occupancy_license_aFO"
                            value="1"
                            {{ !empty($property) && $property->first_occupancy_license_aFO == 1 ? 'checked' : '' }}>
                        <label for="first_occupancy_license_yes">{{ trans('messages.properties.yes') }}</label>
                        </div>
                        <div class="from-group">
                        <input type="radio" id="first_occupancy_license_no" name="first_occupancy_license_aFO" value="0"
                            {{ !empty($property) && $property->first_occupancy_license_aFO == 0 ? 'checked' : '' }}>
                        <label for="first_occupancy_license_no">{{ trans('messages.properties.no') }}</label>
                        </div>
                        </div>
                    </div> -->
                </div>
            </x-views.layouts.main-card.main-card-index>

            <x-views.layouts.main-card.main-card-index
                :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25','id' => 'Tab6']">
                <x-views.layouts.main-card.sub-components.card-heading
                    :fieldData="['class' => '','name' => trans('messages.properties.Property_Listed_By')]" />
                <div class="row">
                    <!-- <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'listed_by',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Listed_By'),
                    'id' => 'listed_by',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                ]"/>
        </div> -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        @if(Auth::user()->role->name === 'agent')
                        <x-forms.crm-text-field :fieldData="[
                    'name' => 'owner_name',
                    'hasLabel' => true,
                    'label' =>trans('messages.properties.Listed_By'),
                    'id' => 'owner_name',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    //'isRequired' => true,
                    'value' => !empty($checkIfValidUser->name) ? $checkIfValidUser->name : (!empty($property->reference) ? $property->contact_name : ( auth()->user()->role->name == 'agent' ? auth()->user()->name : ''))
                ]" />

                        @elseif(Auth::user()->role->name === 'superadmin' || Auth::user()->role->name === 'admin' )

                        <x-forms.crm-single-select :fieldData="[
                    'name' => 'owner_id',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Listed_By'),
                    'id' => 'owner_id',
                    'options' => $agentsDropdown, // Pass the agents' data to populate the dropdown
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please select an agent',
                    'isRequired' => true,
                    'placeholder' => trans('messages.properties.Listed_By'),
                    'selected' => !empty($checkIfValidUser->id) ? $checkIfValidUser->id : (!empty($property->owner_id) ? $property->owner_id : '') ,

                ]" />
                        @endif

                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                    'name' => 'contact_name',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Contact_Name'),
                    'id' => 'contact_name',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    //'isRequired' => true,
                    'value' => !empty($checkIfValidUser->name) ? $checkIfValidUser->name : (!empty($property->reference) ? $property->contact_name : ( auth()->user()->role->name == 'agent' ? auth()->user()->name : '')) 
                ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                    'name' => 'contact_email',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Contact_Email'),
                    'id' => 'contact_email',
                    'attributes' => ['readonly'],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    //'isRequired' => true,
                    'value' => !empty($checkIfValidUser->email) ? $checkIfValidUser->email : (!empty($property->reference) ? $property->contact_email : ( auth()->user()->role->name == 'agent' ? auth()->user()->email : '')) 
                ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                    'name' => 'contact_mobile',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Contact_Mobile'),
                    'id' => 'contact_mobile',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    //'isRequired' => true,
                    'isInputMask' => true,
                    'maskPattern' => '+(9{1,2}) (999 999 999)',
                    'value' => !empty($checkIfValidUser->phone) ? $checkIfValidUser->phone : (!empty($property->reference) ? $property->contact_mobile : ( auth()->user()->role->name == 'agent' ? auth()->user()->phone : ''))
                ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                    'name' => 'contact_street_address',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Contact_Street_Address'),
                    'id' => 'contact_street_address',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => !empty($checkIfValidUser->address) ? $checkIfValidUser->address : (!empty($property->reference) ? $property->contact_street_address : ( auth()->user()->role->name == 'agent' ? auth()->user()->address : ''))
                ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                    'name' => 'contact_city',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Contact_City'),
                    'id' => 'contact_city',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    //'isRequired' => true,
                    'value' => !empty($checkIfValidUser->city) ? $checkIfValidUser->city : (!empty($property->reference) ? $property->contact_city : ( auth()->user()->role->name == 'agent' ? auth()->user()->city : ''))
                ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                    'name' => 'contact_state_province',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Contact_State_Province'),
                    'id' => 'contact_state_province',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    //'isRequired' => true,
                    'value' => !empty($checkIfValidUser->state) ? $checkIfValidUser->state : (!empty($property->reference) ? $property->contact_state_province : ( auth()->user()->role->name == 'agent' ? auth()->user()->state : ''))
                ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                    'name' => 'contact_country',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Contact_Country'),
                    'id' => 'contact_country',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => !empty($checkIfValidUser->country) ? $checkIfValidUser->country : (!empty($property->reference) ? $property->contact_country : ( auth()->user()->role->name == 'agent' ? auth()->user()->country : ''))
                ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                    'name' => ' ',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Contact_postcode'),
                    'id' => 'contact_zipcode',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    //'isRequired' => true,
                     'value' => !empty($checkIfValidUser->zipcode) ? $checkIfValidUser->zipcode : (!empty($property->reference) ? $property->contact_zipcode : ( auth()->user()->role->name == 'agent' ? auth()->user()->zipcode : ''))
                ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                    'name' => 'company_name',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Company_Name'),
                    'id' => 'company_name',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    //'isRequired' => true,
                    {{-- 'value' => !empty($checkIfValidUser->company_name) ? $checkIfValidUser->company_name : (!empty($property->reference) ? $property->company_name : ( auth()->user()->role->name == 'agent' ? auth()->user()->company_name : '')), --}}
                    'value' => !empty($userProfessionalInfo->company_name) ? $userProfessionalInfo->company_name  : '',
                ]" />
                    </div>
                </div>
            </x-views.layouts.main-card.main-card-index>
            @php
            $defaultMessageCoverImage = "<img src='".asset('img/upload.svg')."' class='upload'> " .
            trans('messages.multi_image_component.Drop_cover_picture_here_or_click_to_upload');
            $defaultMessagePropertiesImages = "<img src='".asset('img/upload.svg')."' class='upload'> " .
            trans('messages.multi_image_component.Drop_cover_picture_here_or_click_to_upload') . ". <br><small>" .
                trans('messages.multi_image_component.You_can_upload_up_to') . " 30 " .
                trans('messages.multi_image_component.files_text') . ". " .
                trans('messages.multi_image_component.Each_file_should_not_be_larger_than') . " 5 MB.</small>";
            @endphp
            <x-views.layouts.main-card.main-card-index
                :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25','id' => 'Tab7']">
                <x-views.layouts.main-card.sub-components.card-heading
                    :fieldData="['class' => '','name' => trans('messages.properties.Property_Media')]" />
                <div class="row">
                    <div class="col-md-12 common-label-css mt-3">
                        <x-forms.crm-multi-image-upload :fieldData="[
                'name' => 'cover_image',
                'hasLabel' => true,
                'label' => trans('messages.properties.cover_images').':',
                'id' => 'cover_image',
                'attributes' => [],
                'hasHelpText' => false,
                'help' => 'Please enter your name',
                'maxFilesize' => 10,
                'maxFiles' => 1,
                'isRequired' => true,
                'addRemoveLinks' => true,
                'dictDefaultMessage' => $defaultMessageCoverImage,
                'acceptedFiles' => 'image/*',
                'uploadedFiles' => !empty($property->reference) ? collect([$coverImageInstance]) : collect([])
            ]" />
                    </div>

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
                'acceptedFiles' => 'image/*, application/pdf, application/msword,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel, video/*',
                'uploadedFiles' => !empty($property->reference) ? $propertyImages : collect([])
            ]" />
                    </div>

                </div>
            </x-views.layouts.main-card.main-card-index>
                        <!--property Tour -->
                        <x-views.layouts.main-card.main-card-index
                        :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25','id' => 'Tab8']">
                        <x-views.layouts.main-card.sub-components.card-heading
                        :fieldData="['class' => '','name' => 'Property Tour']" />
                <div class="row">
                    <div class="col-md-12 common-label-css mt-3">
                        <x-forms.crm-multi-image-upload :fieldData="[
                            'name' => 'virtual_tour',
                            'hasLabel' => true,
                            'label' => 'Virtual Tour'.':',
                            'id' => 'virtual_tour',
                            'attributes' => [],
                            'hasHelpText' => false,
                            'value' => $property->virtual_tour ?? '',
                        ]" />
                    </div>

                    <div class="col-md-12 common-label-css mt-3">
                        <x-forms.crm-multi-image-upload :fieldData="[
                            'name' => 'video_tour',
                            'hasLabel' => true,
                            'label' => 'Video Tour'.':',
                            'id' => 'video_tour',
                            'attributes' => [],
                            'hasHelpText' => false,
                            'help' => 'Please enter your name',
                            
                        ]" />
                    </div>

                </div>
            </x-views.layouts.main-card.main-card-index>

            <x-views.layouts.main-card.main-card-index
                :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25','id' => 'Tab9']">
                <x-views.layouts.main-card.sub-components.card-heading
                    :fieldData="['class' => '','name' => trans('messages.properties.Propery_Amnesties')]" />
                <div class="row common-label-css">
                    @php
                    $selectedFeatures = !empty($property->reference) ? $property->features->pluck('id')->toArray() : [];
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
                'hasIcon' => true
            ]">
                    </x-forms.crm-checkbox>

                </div>
            </x-views.layouts.main-card.main-card-index>

            <!--Contact Information -->
        <x-views.layouts.main-card.main-card-index
            :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25','id' => 'Tab10']">
            <x-views.layouts.main-card.sub-components.card-heading
            :fieldData="['class' => '','name' => 'Contact Information']" />

            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                    <x-forms.crm-text-field :fieldData="[
                        'name' => 'owner_one',
                        'hasLabel' => true,
                        'label' => 'Owner 1'.':',
                        'id' => 'owner_one',
                        'attributes' => [],
                        'hasHelpText' => false,
                        //'help' => 'Please enter your name',
                        'value' => $property->owner_one ?? '',
                    ]" />
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                    <x-forms.crm-text-field :fieldData="[
                        'name' => 'owner_two',
                        'hasLabel' => true,
                        'label' => 'Owner 2'.':',
                        'id' => 'owner_two',
                        'attributes' => [],
                        'hasHelpText' => false,
                        //'help' => 'Please enter your name',
                        'value' => $property->owner_two ?? '',
                    ]" />
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                    <x-forms.crm-text-field :fieldData="[
                        'name' => 'key_holder',
                        'hasLabel' => true,
                        'label' => 'Key Holder'.':',
                        'id' => 'key_holder',
                        'attributes' => [],
                        'hasHelpText' => false,
                        //'help' => 'Please enter your name',
                        'value' => $property->key_holder ?? '',
                    ]" />
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                    <x-forms.crm-text-field :fieldData="[
                        'name' => 'developer',
                        'hasLabel' => true,
                        'label' => 'Developer'.':',
                        'id' => 'developer',
                        'attributes' => [],
                        'hasHelpText' => false,
                        //'help' => 'Please enter your name',
                        'value' => $property->developer ?? '',
                    ]" />
                </div>
            </div>
            <div class='row'>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                    <x-forms.crm-single-select :fieldData="[
                'name' => 'key_status',
                'hasLabel' => true,
                'label' => 'Key Status'.':',
                'id' => 'key_status',
                'options' => ['vendors' =>'Vendor',
                            'in office'=>'In Office',
                            'booke out'=>'Booked out'],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => 'Key Status',
                'selected' => $property->key_status ?? '',
            ]" />
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                    <x-forms.crm-text-field :fieldData="[
                        'name' => 'key_id',
                        'hasLabel' => true,
                        'label' => 'Key Id'.':',
                        'id' => 'key_id',
                        'attributes' => [],
                        'hasHelpText' => false,
                        //'help' => 'Please enter your name',
                        'value' => $property->key_id ?? '',
                    ]" />
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'key_details',
                            'hasLabel' => true,
                            'label' => 'Key Details'.':',
                            'id' => 'key_details',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->key_details ?? '',
                        ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
                        <x-forms.crm-text-field :fieldData="[
                            'name' => 'private_note',
                            'hasLabel' => true,
                            'label' => 'Private Note'.':',
                            'id' => 'private_note',
                            'attributes' => [],
                            'hasHelpText' => false,
                            //'help' => 'Please enter your name',
                            'value' => $property->private_note ?? '',
                        ]" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 common-label-css mt-2 ">
                        <x-forms.crm-textarea :fieldData="[
                    'name' => 'lawyer',
                    'hasLabel' => true,
                    'label' => 'Lawyer'.':',
                    'id' => 'lawyer',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'value' => $property->lawyer ?? '',
                ]" />
                    </div>
                </div>

            </div>

        </x-views.layouts.main-card.main-card-index>
            <!--End of Contact Information-->

            <div class="col-md-12 d-flex gap-4">
                <x-forms.crm-button :fieldData="[
                'text' => !empty($property->reference) ? trans('messages.dashboard.Update') : trans('messages.dashboard.Save'),
                'type' => 'button',
                'class' => 'border-r-8 b-color-Gradient color-white text-16 font-weight-400 line-height-24 small-button gardient-button addCreateNewPropertyBtn',
                'id' => 'addCreateNewPropertyBtn',
                'attributes' => []
                    ]" />
                <x-forms.crm-button :fieldData="[
                'text' => trans('messages.dashboard.Cancel'),
                'type' => 'button',
                'url'  => url()->previous(),
                'target' => '_self',
                'class' => 'b-color-transparent color-primary text-12 font-weight-700 line-height-15 cancelBtn ',
                'id' => 'cancelBtn',
                'attributes' => [],

                ]" />
            </div>


    </form>
</div>
</div>
@push('scripts')
<script
    src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap&libraries=places"
    defer></script>


<script>
   var routeUrl = "{{ route(routeNamePrefix().'properties.store').(!empty($property->reference) ? '/'.$property->reference : '') }}";
    var geAgentDetailsUrl = "{{ route(routeNamePrefix().'properties.getAgentDetails',':id')}}";
    var subtypeSelectedTypeId = "{{ route(routeNamePrefix().'properties.subtype',':typeId') }}";
    var invalidAddressText = "{{trans('messages.errors.Please_enter_valid_address')}}";
    var addDocumentUrl = "{{route(routeNamePrefix().'properties.uploadDocuments').(!empty($property->id) ? '/'.$property->id : '') }}";
    var removeDocumentUrl = "{{route(routeNamePrefix().'properties.removeDocument',':id')}}";
    var isEditPage = "{{!empty($property->id) ? 'Yes' : 'No'}}";
    var subTypeId = "{{!empty($property->id) ? $property->subtype_id : ''}}";
</script>
<!-- <script src="{{ asset('assets/js/modules/properties/add_property.js') }}"></script> -->
<script src="{{ asset('assets/js/modules/properties/add_property_new.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


{{-- <script type="text/javascript">
    $(document).ready(function() {
        $('.tab_slider').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 5,

        });
    });
</script> --}}

<script>
    function scrollToContent(tabId) {
        document.getElementById(tabId).scrollIntoView({
            behavior: 'smooth'
        });
    }
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', () => {
        const sections = document.querySelectorAll('.card-description');
        const navLinks = document.querySelectorAll('.tablinks');
        let activeLink = null;

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

        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const targetId = entry.target.id;
                    const link = document.querySelector(`.tablinks[data-target="${targetId}"]`);
                    makeActive(link);
                }
            });
        }, { threshold: 0.7 });

        sections.forEach((section) => {
            sectionObserver.observe(section);
        });

        navLinks.forEach((link) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetSectionId = link.getAttribute('data-target');
                const targetSection = document.getElementById(targetSectionId);
                if (targetSection) {
                    window.scrollTo({
                        top: targetSection.offsetTop,
                        behavior: 'smooth',
                    });
                    makeActive(link);
                }
            });
        });
    });

    function scrollToContent(id) {
        const targetSection = document.getElementById(id);
        if (targetSection) {
            window.scrollTo({
                top: targetSection.offsetTop,
                behavior: 'smooth',
            });
            const link = document.querySelector(`.tablinks[data-target="${id}"]`);
            makeActive(link);
        }
    }

    function makeActive(link) {
        const navLinks = document.querySelectorAll('.tablinks');
        navLinks.forEach((navLink) => navLink.classList.remove('active'));
        if (link) {
            link.classList.add('active');
            activeLink = link;
        }
    }
</script> --}}


<script>
    $(document).ready(function() {
        const sections = document.querySelectorAll('.card-description');
        const navLinks = document.querySelectorAll('.tablinks');
        let activeLink = null;
        const offset = 205; // Offset in pixels

        $('.tab_slider').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: false
        });

        $('.prev').on('click', function() {
            $('.tab_slider').slick('slickPrev');
            updateActiveTabAndScroll();
        });

        $('.next').on('click', function() {
            $('.tab_slider').slick('slickNext');
            updateActiveTabAndScroll();
        });

        const updateActiveTabAndScroll = () => {
            const currentIndex = $('.tab_slider').slick('slickCurrentSlide');
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

        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const targetId = entry.target.id;
                    const link = document.querySelector(`.tablinks[data-target="${targetId}"]`);
                    makeActive(link);
                    const index = Array.from(navLinks).indexOf(link);
                    $('.tab_slider').slick('slickGoTo', index);
                }
            });
        }, { threshold: 0.7 });

        sections.forEach((section) => {
            sectionObserver.observe(section);
        });

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
                    $('.tab_slider').slick('slickGoTo', index);
                }
            });
        });
    });
</script>


@endpush
@endsection