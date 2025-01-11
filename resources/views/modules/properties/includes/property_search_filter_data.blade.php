<form action="" id="filterForm">
    <div class="row">
        <input type="hidden" name="state_name"
            value="{{ !empty($searchData['state_name']) ? $searchData['state_name'] : '' }}">
        <input type="hidden" name="city_name"
            value="{{ !empty($searchData['city_name']) ? $searchData['city_name'] : '' }}">

        <div
            class="advanced_not-before advanced_property col-12 select_with_checkbox  position-relative Search_filter_height">
            <span style="top: 50%; left: 24px;" class="icon-Search position-absolute"></span>
            <div class="search_filter_group search_filter_one"
                style="{{ !empty($searchData['location']) ? 'display:block' : 'display:none' }}"></div>

            <x-forms.crm-multi-select :fieldData="[
                'name' => 'location',
                'hasLabel' => true,
                'label' => 'Location',
                'id' => 'location',
                'class' => 'selected-data',
                'options' => !empty($searchData['location']) ? $searchData['location'] : [],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => '',
                'isRequired' => true,
                'selected' => !empty($searchData['location']) ? $searchData['location'] : [],
                'allowTags' => true,
            ]" />
        </div>

        {{-- sale/rent --}}
        {{-- <div
            class="col-12 col-sm-12 col-md-4 col-lg-4 advanced_property flex-1 select_with_checkbox position-relative Search_filter_height  ">

            <div class="search_filter_group search_filter_one"
                style="{{ !empty($searchData['listed_as']) ? 'display:block' : 'display:none' }}"></div>

            <x-forms.crm-multi-select :fieldData="[
                'name' => 'listed_as',
                'hasLabel' => false,
                'label' => 'Listed As',
                'id' => 'listed_as',
                'class' => 'property-category',
                'options' => [
                    'For Sale' => 'For Sale',
                    'For Rent' => 'For Rent',
                ],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => 'All',
                'isRequired' => true,
                'selected' => !empty($searchData['listed_as']) ? $searchData['listed_as'] : [],
            ]" />
        </div> --}}


    </div>
    <div class="d-block d-md-flex gap-3 filter_block">
        {{-- Reference ID --}}
        <div class="flex-1 position-relative Search_filter_height">

            <div class="search_filter_group search_filter_two"
                style="{{ !empty($searchData['reference']) ? 'display:block' : 'display:none' }}"></div>

            <div class="form-group mt-3 position-relative refrence_id_form ">
                <input type="text"
                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                    name="reference" id="reference_id"
                    value="{{ !empty($searchData['reference']) ? $searchData['reference'] : '' }}"
                    placeholder="Reference Id ">
                <div class="invalid-feedback fw-bold"></div>
            </div>
        </div>

        {{-- prize --}}
        <div class="flex-1 select_with_checkbox position-relative Search_filter_height">
            <div class="search_filter_group search_filter_two"></div>
            <div class="chat_message_p-rights mt-3">
                <a href="#" class="chat_img-dropdown" onclick="myFunctions()">
                    <div class="filter_box">
                        <label class="text-14 color-b-blue"><span
                                class="minPriceRangeVal">{{ config('Reading.default_currency') . '0' }}</span> - <span
                                class="maxPriceRangeVal">{{ !empty($maxPriceAndSize->max_price)
                                    ? config('Reading.default_currency') . round($maxPriceAndSize->max_price + 1, 2)
                                    : config('Reading.default_currency') . '10000' }}</span>
                        </label>
                    </div>
                </a>
                <div id="myDropdown" class="chatimg-dropdowns">
                    <x-forms.crm-range-slider :fieldData="[
                        'name' => 'price_range',
                        'hasLabel' => false,
                        'id' => 'price_range',
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
                            : '10000',
                        'prefix' => config('Reading.default_currency'),
                        'minValue' => !empty($searchData['min_price']) ? $searchData['min_price'] : '',
                        'maxValue' => !empty($searchData['max_price']) ? $searchData['max_price'] : '',
                    ]" />

                </div>
            </div>
        </div>
        @php

            $propertyType = App\Models\Type::pluck('name', 'id')->toArray();

        @endphp
        {{-- Property Type --}}
        <div class="advanced_property flex-1 select_with_checkbox position-relative Search_filter_height">
            <div class="search_filter_group search_filter_two"
                style="{{ !empty($searchData['type_id']) ? 'display:block' : 'display:none' }}"></div>
            <x-forms.crm-multi-select :fieldData="[
                'name' => 'type_id',
                'hasLabel' => true,
                'label' => 'Property Type',
                'id' => 'type_id',
                'class' => 'selected-property',
                'options' => $propertyType ?? [],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => 'Property Type',
                'isRequired' => true,
                'selected' => !empty($searchData['type_id']) ? $searchData['type_id'] : [],
            ]" />
        </div>


        {{-- Property Subtype --}}

        <div class="advanced_property flex-1 select_with_checkbox position-relative Search_filter_height">
            <div class="search_filter_group search_filter_two"
                style="{{ !empty($searchData['subtype_id']) ? 'display:block' : 'display:none' }}"></div>
            <x-forms.crm-multi-select :fieldData="[
                'name' => 'subtype_id',
                'hasLabel' => true,
                'label' => 'Property Subtype',
                'id' => 'subtype_id',
                'class' => 'selected-property',
                'options' => [],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => 'Property Subtype',
                'isRequired' => true,
                'selected' => [],
            ]" />
        </div>

        {{-- More Filter --}}
        <div class="flex-1 position-relative">
            <div class="search_filter_group search_filter_two"></div>
            <div class="form-group main_dropdown_button ">
                <button type="button" id="toggleButton" {{-- onclick="toggleContent()" --}} class="main-button-property-filter">More
                    Filter</button>
                <div id="property_filter_main_content">
                    <div class="row">

                        {{-- tabs --}}
                        <div class="col-lg-4">
                            <div class="vertical-tabs">
                                <p>Listed by:</p>
                                <ul class="tablink_main">
                                    <li><a class="tablinks active" href="#personal_information">Property
                                            Information:</a></li>
                                    <li><a class="tablinks" href="#property_pricing">Property Pricing:</a>
                                    </li>
                                    <li><a class="tablinks" href="#property_dimensions">Property
                                            Dimensions:</a>
                                    </li>
                                    <li><a class="tablinks" href="#property_listed_by">Property Listed
                                            By:</a></li>
                                    <li><a class="tablinks" href="#Property_amenities">Property
                                            Amenities:</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="filter_tab" id="tab1">
                                <div class="filter_tab-content_height">
                                    <section class="personal_information active" id="personal_information">
                                        @php
                                            $propertySituation = App\Models\Situation::select('name', 'id')->get();
                                        @endphp
                                        {{-- Property Situation --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Property Situation:</p>
                                            <div class="d-flex gap-3 flex-wrap">
                                                @foreach ($propertySituation as $situation)
                                                    <div class=" filter_custom_input">
                                                        <input type="checkbox" name="situation_id[]"
                                                            id="situation{{ $situation->id }}"
                                                            value="{{ $situation->id }}"
                                                            {{ !empty($searchData['situation_id']) && in_array($situation->id, $searchData['situation_id']) ? 'checked' : '' }}>
                                                        <label
                                                            for="situation{{ $situation->id }}">{{ $situation->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        {{-- Bedrooms --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Bedrooms:</p>
                                            <div class="d-flex gap-3 flex-wrap">
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='bedrooms' id="bedrooms_any"
                                                        value="any" {{-- {{ empty($searchData['bedrooms']) || (!empty($searchData['bedrooms']) && $searchData['bedrooms'] == 'any') ? 'checked' : '' }}> --}}
                                                        {{ !empty($searchData['bedrooms']) && $searchData['bedrooms'] == 'any' ? 'checked' : '' }}>
                                                    <label for="bedrooms_any">Any</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='bedrooms' id="bedrooms_plus_1"
                                                        value="1"
                                                        {{ !empty($searchData['bedrooms']) && $searchData['bedrooms'] == '1' ? 'checked' : '' }}>
                                                    <label for="bedrooms_plus_1">+1</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='bedrooms' id="bedrooms_plus_2"
                                                        value="2"
                                                        {{ !empty($searchData['bedrooms']) && $searchData['bedrooms'] == '2' ? 'checked' : '' }}>
                                                    <label for="bedrooms_plus_2">+2</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='bedrooms' id="bedrooms_plus_3"
                                                        value="3"
                                                        {{ !empty($searchData['bedrooms']) && $searchData['bedrooms'] == '3' ? 'checked' : '' }}>
                                                    <label for="bedrooms_plus_3">+3</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='bedrooms' id="bedrooms_plus_4"
                                                        value="4"
                                                        {{ !empty($searchData['bedrooms']) && $searchData['bedrooms'] == '4' ? 'checked' : '' }}>
                                                    <label for="bedrooms_plus_4">+4</label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Bathrooms --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Bathrooms:</p>
                                            <div class="d-flex gap-3 flex-wrap">
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='bathrooms' id="bathrooms_any"
                                                        value="any" {{-- {{ empty($searchData['bathrooms']) || (!empty($searchData['bathrooms']) && $searchData['bathrooms'] == 'any') ? 'checked' : '' }}> --}}
                                                        {{ !empty($searchData['bathrooms']) && $searchData['bathrooms'] == 'any' ? 'checked' : '' }}>
                                                    <label for="bathrooms_any">Any</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='bathrooms' id="bathrooms_plus_1"
                                                        value="1"
                                                        {{ !empty($searchData['bathrooms']) && $searchData['bathrooms'] == '1' ? 'checked' : '' }}>
                                                    <label for="bathrooms_plus_1">+1</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='bathrooms' id="bathrooms_plus_2"
                                                        value="2"
                                                        {{ !empty($searchData['bathrooms']) && $searchData['bathrooms'] == '2' ? 'checked' : '' }}>
                                                    <label for="bathrooms_plus_2">+2</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='bathrooms' id="bathrooms_plus_3"
                                                        value="3"
                                                        {{ !empty($searchData['bathrooms']) && $searchData['bathrooms'] == '3' ? 'checked' : '' }}>
                                                    <label for="bathrooms_plus_3">+3</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='bathrooms' id="bathrooms_plus_4"
                                                        value="4"
                                                        {{ !empty($searchData['bathrooms']) && $searchData['bathrooms'] == '4' ? 'checked' : '' }}>
                                                    <label for="bathrooms_plus_4">+4</label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Property Status/Completion --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Property Status/Completion:</p>
                                            <div class="d-flex gap-3 flex-wrap">
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='status_completion'
                                                        id="completed_construction" value="Completed"
                                                        {{ !empty($searchData['status_completion']) && $searchData['status_completion'] == 'Completed' ? 'checked' : '' }}>
                                                    <label for="completed_construction">Completed
                                                        Construction</label>
                                                </div>

                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='status_completion'
                                                        id="under_construction" value="Under Construction"
                                                        {{ !empty($searchData['status_completion']) && $searchData['status_completion'] == 'Under Construction' ? 'checked' : '' }}>
                                                    <label for="under_construction">Under
                                                        Construction</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='status_completion' id="off_plan"
                                                        value="Off Plan"
                                                        {{ !empty($searchData['status_completion']) && $searchData['status_completion'] == 'Off Plan' ? 'checked' : '' }}>
                                                    <label for="off_plan">Off Plan</label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Select Completion Year & Month --}}
                                        <div class="filter_tab_content-small-content" id="completion_year"
                                            style="{{ !empty($searchData['status_completion']) && $searchData['status_completion'] == 'Completed' ? 'display:block' : 'display:none' }}">
                                            <p class="pb-0">Select Completion Year:</p>
                                            <div class="col-12 common-label-css add-event d-flex gap-3 w-50"
                                                id="">
                                                <x-forms.crm-datepicker :fieldData="[
                                                    'name' => 'year',
                                                    'hasLabel' => false,
                                                    'label' => 'Select Completion Year:',
                                                    'inputId' => 'year',
                                                    'attributes' => [],
                                                    'hasHelpText' => false,
                                                    'help' => 'Select Year',
                                                    'isRequired' => true,
                                                    'isInputMask' => true,
                                                    'value' => !empty($searchData['year']) ? $searchData['year'] : '',
                                                    'format' => 'yyyy',
                                                    'minViewMode' => 2,
                                                ]" />
                                            </div>
                                        </div>
                                        <div class="filter_tab_content-small-content"
                                            id="under_construction_month_year"
                                            style="{{ !empty($searchData['status_completion']) && ($searchData['status_completion'] == 'Under Construction' || $searchData['status_completion'] == 'Off Plan') ? 'display:block' : 'display:none' }}">
                                            <p class="pb-0">Select Completion Year & Month:</p>
                                            <div class="col-12 common-label-css add-event d-flex align-items-center gap-3 w-100"
                                                id="">

                                                <x-forms.crm-datepicker :fieldData="[
                                                    'name' => 'year_month',
                                                    'hasLabel' => false,
                                                    'label' => '',
                                                    'inputId' => 'year_month',
                                                    'attributes' => [],
                                                    'hasHelpText' => false,
                                                    'help' => 'Select Year',
                                                    'isRequired' => true,
                                                    'isInputMask' => true,
                                                    'value' => !empty($searchData['year_month'])
                                                        ? $searchData['year_month']
                                                        : '',
                                                    'format' => 'mm/yyyy',
                                                    'minViewMode' => 1,
                                                    'placeholder' => '',
                                                    'startDate' => date('Y-m-01'),
                                                ]" />

                                            </div>
                                        </div>

                                        {{-- Rent Type --}}
                                        {{-- <div class="filter_tab_content-small-content rent_type"
                                            style="{{ !empty($searchData['status_completion']) && $searchData['status_completion'] == 'Completed' ? 'display:block' : 'display:none' }}">
                                            <p>Rent Type:</p>
                                            <div class="d-flex gap-3 flex-wrap">
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name="rent_type" id="long_term"
                                                        value="long_term"
                                                        {{ !empty($searchData['rent_type']) && $searchData['rent_type'] == 'long_term' ? 'checked' : '' }}>
                                                    <label for="long_term" id="long_term">For Rent - Long
                                                        Term</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='rent_type' id="short_term"
                                                        value="short_term"
                                                        {{ !empty($searchData['rent_type']) && $searchData['rent_type'] == 'short_term' ? 'checked' : '' }}>
                                                    <label for="short_term" id="short_term">For Rent -
                                                        Short
                                                        Term</label>
                                                </div>
                                            </div>
                                        </div> --}}


                                    </section>
                                    <section class="personal_information" id="property_pricing">

                                        {{-- Long Term (Per Month) --}}
                                        <div class="filter_tab_content-small-content longTermPriceDiv"
                                            style="{{ !empty($searchData['rent_type']) && $searchData['rent_type'] == 'long_term' ? 'display:block' : 'display:none' }}">
                                            <p>Long Term (Per Month):</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'long_price',
                                                'hasLabel' => false,
                                                'id' => 'long_price',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_long_price',
                                                'minName' => 'min_long_price',
                                                'maxName' => 'max_long_price',
                                                'maxId' => 'max_long_price',
                                                'minRange' => '0',
                                                'maxRange' => !empty($maxPriceAndSize->max_price)
                                                    ? round($maxPriceAndSize->max_price + 1, 2)
                                                    : '10000',
                                                'prefix' => config('Reading.default_currency'),
                                                'minValue' => !empty($searchData['min_long_price'])
                                                    ? $searchData['min_long_price']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_long_price'])
                                                    ? $searchData['max_long_price']
                                                    : '',
                                            ]" />
                                        </div>

                                        {{-- Short Term (Per Month) --}}
                                        <div class="filter_tab_content-small-content shortTermPriceDiv"
                                            style="{{ !empty($searchData['rent_type']) && $searchData['rent_type'] == 'short_term' ? 'display:block' : 'display:none' }}">
                                            <p>Short Term (Per Month):</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'short_price',
                                                'hasLabel' => false,
                                                'id' => 'short_price',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_short_price',
                                                'minName' => 'min_short_price',
                                                'maxName' => 'max_short_price',
                                                'maxId' => 'max_short_price',
                                                'minRange' => '0',
                                                'maxRange' => !empty($maxPriceAndSize->max_price)
                                                    ? round($maxPriceAndSize->max_price + 1, 2)
                                                    : '10000',
                                                'prefix' => config('Reading.default_currency'),
                                                'minValue' => !empty($searchData['min_short_price'])
                                                    ? $searchData['min_short_price']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_short_price'])
                                                    ? $searchData['max_short_price']
                                                    : '',
                                            ]" />
                                        </div>

                                        {{-- Commission Percentage --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Commission Percentage:</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'percentage',
                                                'hasLabel' => false,
                                                'id' => 'percentage',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_percentage',
                                                'minName' => 'min_percentage',
                                                'maxName' => 'max_percentage',
                                                'maxId' => 'max_percentage',
                                                'minRange' => '0',
                                                'maxRange' => '100',
                                                'suffix' => '%',
                                                'minValue' => !empty($searchData['min_percentage'])
                                                    ? $searchData['min_percentage']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_percentage'])
                                                    ? $searchData['max_percentage']
                                                    : '',
                                            ]" />
                                        </div>

                                        {{-- Net Price --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Net Price:</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'net_price',
                                                'hasLabel' => false,
                                                'id' => 'net_price',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_net_price',
                                                'minName' => 'min_net_price',
                                                'maxName' => 'max_net_price',
                                                'maxId' => 'max_net_price',
                                                'minRange' => '0',
                                                'maxRange' => !empty($maxPriceAndSize->max_net_price)
                                                    ? round($maxPriceAndSize->max_net_price + 1, 2)
                                                    : '10000',
                                                'prefix' => config('Reading.default_currency'),
                                                'minValue' => !empty($searchData['min_net_price'])
                                                    ? $searchData['min_net_price']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_net_price'])
                                                    ? $searchData['max_net_price']
                                                    : '',
                                            ]" />
                                        </div>

                                        {{-- Security Deposit --}}
                                        {{-- <div class="filter_tab_content-small-content">
                                            <p>Security Deposit:</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'security_deposit',
                                                'hasLabel' => false,
                                                'id' => 'security_deposit',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_security_deposit',
                                                'minName' => 'min_security_deposit',
                                                'maxName' => 'max_security_deposit',
                                                'maxId' => 'max_security_deposit',
                                                'minRange' => '0',
                                                'maxRange' => '10000',
                                                'prefix' => config('Reading.default_currency'),
                                                'minValue' => !empty($searchData['min_security_deposit'])
                                                    ? $searchData['min_security_deposit']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_security_deposit'])
                                                    ? $searchData['max_security_deposit']
                                                    : '',
                                            ]" />
                                        </div> --}}

                                        {{-- Listing Agent Commission --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Listing Agent Commission:</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'list_agent_per',
                                                'hasLabel' => false,
                                                'id' => 'list_agent_per',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_list_agent_per',
                                                'minName' => 'min_list_agent_per',
                                                'maxName' => 'max_list_agent_per',
                                                'maxId' => 'max_list_agent_per',
                                                'minRange' => '0',
                                                'maxRange' => '100',
                                                'suffix' => '%',
                                                'minValue' => !empty($searchData['min_list_agent_per'])
                                                    ? $searchData['min_list_agent_per']
                                                    : '0',
                                                'maxValue' => !empty($searchData['max_list_agent_per'])
                                                    ? $searchData['max_list_agent_per']
                                                    : '100',
                                            ]" />
                                        </div>
                                        

                                        {{-- Selling Agent Commission --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Selling Agent Commission:</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'sell_agent_per',
                                                'hasLabel' => false,
                                                'id' => 'sell_agent_per',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_sell_agent_per',
                                                'minName' => 'min_sell_agent_per',
                                                'maxName' => 'max_sell_agent_per',
                                                'maxId' => 'max_sell_agent_per',
                                                'minRange' => '0',
                                                'maxRange' => '100',
                                                'suffix' => '%',
                                                'minValue' => !empty($searchData['min_sell_agent_per'])
                                                    ? $searchData['min_sell_agent_per']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_sell_agent_per'])
                                                    ? $searchData['max_sell_agent_per']
                                                    : '',
                                            ]" />
                                        </div>


                                        {{-- Valuation --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Valuation:</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'valuation',
                                                'hasLabel' => false,
                                                'id' => 'valuation',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_valuation',
                                                'minName' => 'min_valuation',
                                                'maxName' => 'max_valuation',
                                                'maxId' => 'max_valuation',
                                                'minRange' => '0',
                                                'maxRange' => !empty($maxPriceAndSize->max_valuation)
                                                    ? round($maxPriceAndSize->max_valuation + 1, 2)
                                                    : '10000',
                                                'prefix' => config('Reading.default_currency'),
                                                'minValue' => !empty($searchData['min_valuation'])
                                                    ? $searchData['min_valuation']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_valuation'])
                                                    ? $searchData['max_valuation']
                                                    : '',
                                            ]" />
                                        </div>

                                        <div class="filter_tab_content-small-content">
                                            <p class="pb-0">Valuation Year:</p>
                                            <div class="col-12 common-label-css add-event d-flex gap-3 w-50"
                                                id="">
                                                <x-forms.crm-datepicker :fieldData="[
                                                    'name' => 'valuation_year',
                                                    'hasLabel' => false,
                                                    'label' => 'Select Valuation Year:',
                                                    'inputId' => 'valuation_year',
                                                    'attributes' => [],
                                                    'hasHelpText' => false,
                                                    'help' => 'Select Valuation Year',
                                                    'isRequired' => true,
                                                    'isInputMask' => true,
                                                    'value' => !empty($searchData['valuation_year'])
                                                        ? $searchData['valuation_year']
                                                        : '',
                                                    'format' => 'yyyy',
                                                    'minViewMode' => 2,
                                                ]" />
                                            </div>
                                        </div>

                                        {{-- Deed Value --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Deed Value:</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'deed_value',
                                                'hasLabel' => false,
                                                'id' => 'deed_value',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_deed_value',
                                                'minName' => 'min_deed_value',
                                                'maxName' => 'max_deed_value',
                                                'maxId' => 'max_deed_value',
                                                'minRange' => '0',
                                                'maxRange' => !empty($maxPriceAndSize->max_deed_value)
                                                    ? round($maxPriceAndSize->max_deed_value + 1, 2)
                                                    : '10000',
                                                'prefix' => config('Reading.default_currency'),
                                                'minValue' => !empty($searchData['min_deed_value'])
                                                    ? $searchData['min_deed_value']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_deed_value'])
                                                    ? $searchData['max_deed_value']
                                                    : '',
                                            ]" />
                                        </div>

                                        {{-- Minimum Price --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Minimum Price:</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'mini_price',
                                                'hasLabel' => false,
                                                'id' => 'mini_price',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_mini_price',
                                                'minName' => 'min_mini_price',
                                                'maxName' => 'max_mini_price',
                                                'maxId' => 'max_mini_price',
                                                'minRange' => '0',
                                                'maxRange' => !empty($maxPriceAndSize->max_mini_price)
                                                    ? round($maxPriceAndSize->max_mini_price + 1, 2)
                                                    : '10000',
                                                'prefix' => config('Reading.default_currency'),
                                                'minValue' => !empty($searchData['min_mini_price'])
                                                    ? $searchData['min_mini_price']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_mini_price'])
                                                    ? $searchData['max_mini_price']
                                                    : '',
                                            ]" />
                                        </div>

                                        {{-- Community Fees (Per Month) --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Community Fees (Per Month):</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'comm_fees',
                                                'hasLabel' => false,
                                                'id' => 'comm_fees',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_comm_fees',
                                                'minName' => 'min_comm_fees',
                                                'maxName' => 'max_comm_fees',
                                                'maxId' => 'max_comm_fees',
                                                'minRange' => '0',
                                                'maxRange' => !empty($maxPriceAndSize->max_comm_fees)
                                                    ? round($maxPriceAndSize->max_comm_fees + 1, 2)
                                                    : '10000',
                                                'prefix' => config('Reading.default_currency'),
                                                'minValue' => !empty($searchData['min_comm_fees'])
                                                    ? $searchData['min_comm_fees']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_comm_fees'])
                                                    ? $searchData['max_comm_fees']
                                                    : '',
                                            ]" />
                                        </div>

                                        {{-- Garbage Tax (Per Year) --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Garbage Tax (Per Year):</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'garbage_tax',
                                                'hasLabel' => false,
                                                'id' => 'garbage_tax',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_garbage_tax',
                                                'minName' => 'min_garbage_tax',
                                                'maxName' => 'max_garbage_tax',
                                                'maxId' => 'max_garbage_tax',
                                                'minRange' => '0',
                                                'maxRange' => !empty($maxPriceAndSize->max_garbage_tax)
                                                    ? round($maxPriceAndSize->max_garbage_tax + 1, 2)
                                                    : '10000',
                                                'prefix' => config('Reading.default_currency'),
                                                'minValue' => !empty($searchData['min_garbage_tax'])
                                                    ? $searchData['min_garbage_tax']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_garbage_tax'])
                                                    ? $searchData['max_garbage_tax']
                                                    : '',
                                            ]" />
                                        </div>

                                        {{-- IBI Fees (Per Year) --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>IBI Fees (Per Year):</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'ibi_fees',
                                                'hasLabel' => false,
                                                'id' => 'ibi_fees',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_ibi_fees',
                                                'minName' => 'min_ibi_fees',
                                                'maxName' => 'max_ibi_fees',
                                                'maxId' => 'max_ibi_fees',
                                                'minRange' => '0',
                                                'maxRange' => !empty($maxPriceAndSize->max_ibi_fees)
                                                    ? round($maxPriceAndSize->max_ibi_fees + 1, 2)
                                                    : '10000',
                                                'prefix' => config('Reading.default_currency'),
                                                'minValue' => !empty($searchData['min_ibi_fees'])
                                                    ? $searchData['min_ibi_fees']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_ibi_fees'])
                                                    ? $searchData['max_ibi_fees']
                                                    : '',
                                            ]" />
                                        </div>

                                        {{-- Other Permissions --}}
                                        {{-- <div class="filter_tab_content-small-content">
                                            <p>Other Permissions:</p>
                                            <div class="d-flex gap-3 flex-wrap">
                                                <div class=" filter_custom_input">
                                                    <input type="checkbox" name='bank' id="bank"
                                                        value="1"
                                                        {{ !empty($searchData['bank']) ? 'checked' : '' }}>
                                                    <label for="bank" id="bank">Bank
                                                        Guarantee
                                                        Required </label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="checkbox" name='references' id="references"
                                                        value="1"
                                                        {{ !empty($searchData['references']) ? 'checked' : '' }}>
                                                    <label for="references" id="references">References
                                                        Required</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="checkbox" name='smoking' id="smoking"
                                                        value="1"
                                                        {{ !empty($searchData['smoking']) ? 'checked' : '' }}>
                                                    <label for="smoking" id="smoking">Smoking
                                                        Allowed</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="checkbox" name='pets' id="pets"
                                                        value="1"
                                                        {{ !empty($searchData['pets']) ? 'checked' : '' }}>
                                                    <label for="pets" id="pets">Pets
                                                        Allowed</label>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </section>
                                    <section class="personal_information" id="property_dimensions">
                                        {{-- Dimension Type --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Dimension Type:</p>
                                            <div class="d-flex gap-3 flex-wrap">
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='dimension_type' id="as_meter"
                                                        value="Meter"
                                                        {{ !empty($searchData['dimension_type']) && $searchData['dimension_type'] == 'Meter' ? 'checked' : '' }}>
                                                    <label for="as_meter" id="as_meter">As Meter </label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='dimension_type' id="as_feet"
                                                        value="Feet"
                                                        {{ !empty($searchData['dimension_type']) && $searchData['dimension_type'] == 'Feet' ? 'checked' : '' }}>
                                                    <label for="as_feet" id="as_feet">As Feet</label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Total Size --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Total Size:</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'size',
                                                'hasLabel' => false,
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
                                                'suffix' => 'ft',
                                                'minValue' => !empty($searchData['min_size'])
                                                    ? $searchData['min_size']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_size'])
                                                    ? $searchData['max_size']
                                                    : '',
                                            ]" />
                                        </div>

                                        {{-- Floor No --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Floor No.:</p>
                                            <div class="d-flex gap-3 flex-wrap">
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='floors' id="any_floor"
                                                        value="any" {{-- {{ empty($searchData['floors']) || (!empty($searchData['floors']) && $searchData['floors'] == 'any') ? 'checked' : '' }}> --}}
                                                        {{ !empty($searchData['floors']) && $searchData['floors'] == 'any' ? 'checked' : '' }}>
                                                    <label for="any_floor" id="any_floor">Any</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='floors' id="floor_1"
                                                        value="1"
                                                        {{ !empty($searchData['floors']) && $searchData['floors'] == '1' ? 'checked' : '' }}>
                                                    <label for="floor_1" id="floor_1">+1</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='floors' id="floor_2"
                                                        value="2"
                                                        {{ !empty($searchData['floors']) && $searchData['floors'] == '2' ? 'checked' : '' }}>
                                                    <label for="floor_2" id="floor_2">+2</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='floors' id="floor_3"
                                                        value="3"
                                                        {{ !empty($searchData['floors']) && $searchData['floors'] == '3' ? 'checked' : '' }}>
                                                    <label for="floor_3" id="floor_3">+3</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='floors' id="floor_4"
                                                        value="4"
                                                        {{ !empty($searchData['floors']) && $searchData['floors'] == '4' ? 'checked' : '' }}>
                                                    <label for="floor_4" id="floor_4">+4</label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Built --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Built:</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'built',
                                                'hasLabel' => false,
                                                'id' => 'built',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_built',
                                                'minName' => 'min_built',
                                                'maxName' => 'max_built',
                                                'maxId' => 'max_built',
                                                'minRange' => '0',
                                                'maxRange' => !empty($maxPriceAndSize->max_built)
                                                    ? round($maxPriceAndSize->max_built + 1, 2)
                                                    : '10000',
                                                'suffix' => 'ft²',
                                                'minValue' => !empty($searchData['min_built'])
                                                    ? $searchData['min_built']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_built'])
                                                    ? $searchData['max_built']
                                                    : '',
                                            ]" />
                                        </div>

                                        {{-- Storeys --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Storeys:</p>
                                            <div class="d-flex gap-3 flex-wrap">
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='storeys' id="storeys_any"
                                                        value="any" {{-- {{ empty($searchData['storeys']) || (!empty($searchData['storeys']) && $searchData['storeys'] == 'any') ? 'checked' : '' }}> --}}
                                                        {{ !empty($searchData['storeys']) && $searchData['storeys'] == 'any' ? 'checked' : '' }}>
                                                    <label for="storeys_any" id="storeys_any">Any</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='storeys' id="storeys_plus_1"
                                                        value="1"
                                                        {{ !empty($searchData['storeys']) && $searchData['storeys'] == '1' ? 'checked' : '' }}>
                                                    <label for="storeys_plus_1" id="storeys_plus_1">+1</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='storeys' id="storeys_plus_2"
                                                        value="2"
                                                        {{ !empty($searchData['storeys']) && $searchData['storeys'] == '2' ? 'checked' : '' }}>
                                                    <label for="storeys_plus_2" id="storeys_plus_2">+2</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='storeys' id="storeys_plus_3"
                                                        value="3"
                                                        {{ !empty($searchData['storeys']) && $searchData['storeys'] == '3' ? 'checked' : '' }}>
                                                    <label for="storeys_plus_3" id="storeys_plus_3">+3</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='storeys' id="storeys_plus_4"
                                                        value="4"
                                                        {{ !empty($searchData['storeys']) && $searchData['storeys'] == '4' ? 'checked' : '' }}>
                                                    <label for="storeys_plus_4" id="storeys_plus_4">+4</label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- No. of Properties In Build in --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>No. of Properties In Build in:</p>
                                            <div class="d-flex gap-3 flex-wrap">
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='no_of_properties_builtin'
                                                        id="properties_build_any" value="any"
                                                        {{-- {{ empty($searchData['no_of_properties_builtin']) || (!empty($searchData['no_of_properties_builtin']) && $searchData['no_of_properties_builtin'] == 'any') ? 'checked' : '' }}> --}}
                                                        {{ !empty($searchData['no_of_properties_builtin']) && $searchData['no_of_properties_builtin'] == 'any' ? 'checked' : '' }}>
                                                    <label for="properties_build_any"
                                                        id="properties_build_any">Any</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='no_of_properties_builtin'
                                                        id="properties_build_pluse_1" value="1"
                                                        {{ !empty($searchData['no_of_properties_builtin']) && $searchData['no_of_properties_builtin'] == '1' ? 'checked' : '' }}>
                                                    <label for="properties_build_pluse_1"
                                                        id="properties_build_pluse_1">+1</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='no_of_properties_builtin'
                                                        id="properties_build_pluse_2" value="2"
                                                        {{ !empty($searchData['no_of_properties_builtin']) && $searchData['no_of_properties_builtin'] == '2' ? 'checked' : '' }}>
                                                    <label for="properties_build_pluse_2"
                                                        id="properties_build_pluse_2">+2</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='no_of_properties_builtin'
                                                        id="properties_build_pluse_3" value="3"
                                                        {{ !empty($searchData['no_of_properties_builtin']) && $searchData['no_of_properties_builtin'] == '3' ? 'checked' : '' }}>
                                                    <label for="properties_build_pluse_3"
                                                        id="properties_build_pluse_3">+3</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='no_of_properties_builtin'
                                                        id="properties_build_pluse_4" value="4"
                                                        {{ !empty($searchData['no_of_properties_builtin']) && $searchData['no_of_properties_builtin'] == '4' ? 'checked' : '' }}>
                                                    <label for="properties_build_pluse_4"
                                                        id="properties_build_pluse_4">+4</label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Terrace --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Terrace:</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'terrace',
                                                'hasLabel' => false,
                                                'id' => 'terrace',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_terrace',
                                                'minName' => 'min_terrace',
                                                'maxName' => 'max_terrace',
                                                'maxId' => 'max_terrace',
                                                'minRange' => '0',
                                                'maxRange' => !empty($maxPriceAndSize->max_terrace)
                                                    ? round($maxPriceAndSize->max_terrace + 1, 2)
                                                    : '10000',
                                                'suffix' => 'ft²',
                                                'minValue' => !empty($searchData['min_terrace'])
                                                    ? $searchData['min_terrace']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_terrace'])
                                                    ? $searchData['max_terrace']
                                                    : '',
                                            ]" />
                                        </div>

                                        {{-- Levels --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Levels:</p>
                                            <div class="d-flex gap-3 flex-wrap">
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='levels' id="levels_any"
                                                        value="any" {{-- {{ empty($searchData['levels']) || (!empty($searchData['levels']) && $searchData['levels'] == 'any') ? 'checked' : '' }}> --}}
                                                        {{ !empty($searchData['levels']) && $searchData['levels'] == 'any' ? 'checked' : '' }}>
                                                    <label for="levels_any" id="levels_any">Any</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='levels' id="levels_pluse_1"
                                                        value="1"
                                                        {{ !empty($searchData['levels']) && $searchData['levels'] == '1' ? 'checked' : '' }}>
                                                    <label for="levels_pluse_1" id="levels_pluse_1">+1</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='levels' id="levels_pluse_2"
                                                        value="2"
                                                        {{ !empty($searchData['levels']) && $searchData['levels'] == '2' ? 'checked' : '' }}>
                                                    <label for="levels_pluse_2" id="levels_pluse_2">+2</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='levels' id="levels_pluse_3"
                                                        value="3"
                                                        {{ !empty($searchData['levels']) && $searchData['levels'] == '3' ? 'checked' : '' }}>
                                                    <label for="levels_pluse_3" id="levels_pluse_3">+3</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='levels' id="levels_pluse_4"
                                                        value="4"
                                                        {{ !empty($searchData['levels']) && $searchData['levels'] == '4' ? 'checked' : '' }}>
                                                    <label for="levels_pluse_4" id="levels_pluse_4">+4</label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Agency Ref --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Agency Ref:</p>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-40 "
                                                name="ageny_ref" id="ageny_ref" value="">
                                            {{-- <div class="d-flex gap-3 flex-wrap">
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='agency_ref' id="agency_ref_any"
                                                        value="any"
                                                        {{ empty($searchData['agency_ref']) || (!empty($searchData['agency_ref']) && $searchData['agency_ref'] == 'any') ? 'checked' : '' }}>
                                                    <label for="agency_ref_any" id="levels_any">Any</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='agency_ref' id="agency_ref_pluse_1"
                                                        value="1"
                                                        {{ !empty($searchData['agency_ref']) && $searchData['agency_ref'] == '1' ? 'checked' : '' }}>
                                                    <label for="agency_ref_pluse_1" id="agency_ref_pluse_1">+1</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='agency_ref' id="agency_ref_pluse_2"
                                                        value="2"
                                                        {{ !empty($searchData['agency_ref']) && $searchData['agency_ref'] == '2' ? 'checked' : '' }}>
                                                    <label for="agency_ref_pluse_2" id="agency_ref_pluse_2">+2</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='agency_ref' id="agency_ref_pluse_3"
                                                        value="3"
                                                        {{ !empty($searchData['agency_ref']) && $searchData['agency_ref'] == '3' ? 'checked' : '' }}>
                                                    <label for="agency_ref_pluse_3" id="agency_ref_pluse_3">+3</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="radio" name='agency_ref' id="agency_ref_pluse_4"
                                                        value="4"
                                                        {{ !empty($searchData['agency_ref']) && $searchData['agency_ref'] == '4' ? 'checked' : '' }}>
                                                    <label for="agency_ref_pluse_4" id="agency_ref_pluse_4">+4</label>
                                                </div>
                                            </div> --}}
                                        </div>

                                        {{-- Garden/Plot --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Garden/Plot:</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'garden_plot',
                                                'hasLabel' => false,
                                                'id' => 'garden_plot',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_garden_plot',
                                                'minName' => 'min_garden_plot',
                                                'maxName' => 'max_garden_plot',
                                                'maxId' => 'max_garden_plot',
                                                'minRange' => '0',
                                                'maxRange' => !empty($maxPriceAndSize->max_garden_plot)
                                                    ? round($maxPriceAndSize->max_garden_plot + 1, 2)
                                                    : '10000',
                                                'suffix' => 'ft²',
                                                'minValue' => !empty($searchData['min_garden_plot'])
                                                    ? $searchData['min_garden_plot']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_garden_plot'])
                                                    ? $searchData['max_garden_plot']
                                                    : '',
                                            ]" />
                                        </div>

                                        {{-- Int. Floor space --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Int. Floor space:</p>
                                            <x-forms.crm-range-slider :fieldData="[
                                                'name' => 'properties_int_floor_space',
                                                'hasLabel' => false,
                                                'id' => 'properties_int_floor_space',
                                                'attributes' => [],
                                                'hasHelpText' => false,
                                                'help' => 'Please enter your name',
                                                'isRequired' => false,
                                                'minId' => 'min_properties_int_floor_space',
                                                'minName' => 'min_properties_int_floor_space',
                                                'maxName' => 'max_properties_int_floor_space',
                                                'maxId' => 'max_properties_int_floor_space',
                                                'minRange' => '0',
                                                'maxRange' => !empty($maxPriceAndSize->max_properties_int_floor_space)
                                                    ? round($maxPriceAndSize->max_properties_int_floor_space + 1, 2)
                                                    : '10000',
                                                'suffix' => 'ft',
                                                'minValue' => !empty($searchData['min_properties_int_floor_space'])
                                                    ? $searchData['min_properties_int_floor_space']
                                                    : '',
                                                'maxValue' => !empty($searchData['max_properties_int_floor_space'])
                                                    ? $searchData['max_properties_int_floor_space']
                                                    : '',
                                            ]" />
                                        </div>
                                    </section>
                                    <section class="personal_information" id="property_listed_by">
                                        {{-- Listed By: --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Listed By:</p>
                                            <div class="d-flex gap-3 flex-wrap">
                                                <div class=" filter_custom_input">
                                                    <input type="checkbox" name='listed_by[]' id="listed_by_agent"
                                                        value="Agent"
                                                        {{ !empty($searchData['listed_by']) && $searchData['listed_by'] == 'Agent' ? 'checked' : '' }}>
                                                    <label for="listed_by_agent" id="listed_by_agent">Agent</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="checkbox" name='listed_by[]' id="listed_by_vendor"
                                                        value="Vendor"
                                                        {{ !empty($searchData['listed_by']) && $searchData['listed_by'] == 'Vendor' ? 'checked' : '' }}>
                                                    <label for="listed_by_vendor" id="listed_by_vendor">Vendor</label>
                                                </div>
                                                <div class=" filter_custom_input">
                                                    <input type="checkbox" name='listed_by[]' id="listed_by_owner"
                                                        value="Owner"
                                                        {{ !empty($searchData['listed_by']) && $searchData['listed_by'] == 'Owner' ? 'checked' : '' }}>
                                                    <label for="listed_by_owner" id="listed_by_owner">Owner</label>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="personal_information" id="Property_amenities">
                                        {{-- Property Amenities --}}
                                        <div class="filter_tab_content-small-content">
                                            <p>Property Amenities:</p>

                                            {{-- modal --}}
                                            <button type="button" id="openModalBtn" class="modal_tab-faq">
                                                <div
                                                    class="d-flex gap-3 flex-wrap px-2 py-2 pe-3 propertyAmenitiesBox">
                                                    @if (!empty($searchData['featureIds']) && is_array($searchData['featureIds']))
                                                        @foreach ($searchData['featureIds'] as $feature)
                                                            <div
                                                                class="button_tab-flex propertyAmenity{{ $feature }}">
                                                                <span>{{ findSpecificRecordData(App\Models\SubFeature::class, ['id' => $feature], 'name') }}</span><a
                                                                    class="removePropertyAmenity"
                                                                    data-id="{{ $feature }}"><span>x</span></a><input
                                                                    type="hidden" name="featureIds[]"
                                                                    value="{{ $feature }}">
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </button>

                                            <div id="myModal" class="modal-tab-header_one filterFeaturesModal">
                                                <div
                                                    class="modal-dialog  modal-dialog-centered modal-width-change_three">
                                                    <div
                                                        class="modal_filter_content modal-content_one border-r-8 border-0 b-color-white p-30 ">
                                                        <div
                                                            class="modal-header border-0 text-center p-0 position-relative">
                                                            <h5 class="modal-title text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                                id="dataFilterModalLabel">Filter Features
                                                            </h5>

                                                            <button type="button"
                                                                class="close b-color-transparent cursor-pointer position-absolute end-0 filterFeaturesModalCloseBtn"
                                                                id="closemodalbtn">
                                                                <span aria-hidden="true">
                                                                    <i
                                                                        class=" icon-cross text-24 color-b-blue opacity-8"></i>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body p-0 text-center mt-30 ">

                                                            <div class="d-flex gap-3 align-items-center">
                                                                <div class="modal_tab-faq_one">
                                                                    <div
                                                                        class="d-flex gap-3 flex-wrap px-2 py-2 pe-3 filterFeaturesBox">
                                                                        @if (!empty($searchData['featureIds']) && is_array($searchData['featureIds']))
                                                                            @foreach ($searchData['featureIds'] as $feature)
                                                                                <div
                                                                                    class="button_tab-flex subFeatureInFilterBox{{ $feature }}">
                                                                                    <span>{{ findSpecificRecordData(App\Models\SubFeature::class, ['id' => $feature], 'name') }}</span><a
                                                                                        class="removeSubFeatureBtnInFilterBox"
                                                                                        data-id="{{ $feature }}"><span
                                                                                            class="position-relative"
                                                                                            style="top:-1px;">x</span></a>
                                                                                </div>
                                                                            @endforeach
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <button type="button"
                                                                    class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 gardient-button updateBtn updateFeaturesBtn">
                                                                    Update
                                                                </button>
                                                            </div>
                                                            @if ($features->isNotEmpty())
                                                                <div class="modal-tab-accordian">
                                                                    <div class="accordion accordion-flush"
                                                                        id="accordionFlushExample">

                                                                        {{-- Setting --}}
                                                                        @foreach ($features as $featureKey => $feature)
                                                                            <div class="accordion-item mt-3">
                                                                                <h2 class="accordion-header"
                                                                                    id="flush-feature{{ $feature->id }}">
                                                                                    <button
                                                                                        class="accordion-button collapsed"
                                                                                        type="button"
                                                                                        data-bs-toggle="collapse"
                                                                                        data-bs-target="#flush-collapsefeature{{ $feature->id }}"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="flush-collapsefeature{{ $feature->id }}">
                                                                                        {{ $feature->name ?? '' }}
                                                                                    </button>
                                                                                </h2>

                                                                                <div id="flush-collapsefeature{{ $feature->id }}"
                                                                                    class="accordion-collapse collapse"
                                                                                    aria-labelledby="flush-feature{{ $feature->id }}"
                                                                                    data-bs-parent="#accordionFlushExample">

                                                                                    @if ($feature->subFeature->isNotEmpty())
                                                                                        @php

                                                                                            $totalSubfeatures = $feature->subFeature->count();

                                                                                            $subfeaturesPerColumn = ceil(
                                                                                                $totalSubfeatures / 3,
                                                                                            );
                                                                                            $chunks = $feature->subFeature->chunk(
                                                                                                $subfeaturesPerColumn,
                                                                                            );
                                                                                        @endphp

                                                                                        <div class="accordion-body">
                                                                                            <div class="row">
                                                                                                @foreach ($chunks as $chunk)
                                                                                                    <div
                                                                                                        class="col-lg-4">
                                                                                                        @php $subFeatureCount = 0; @endphp
                                                                                                        @foreach ($chunk as $subFeatureKey => $subFeature)
                                                                                                            <div
                                                                                                                class="d-flex gap-1 align-items-center {{ $subFeatureCount > 0 ? 'mt-20' : '' }}">
                                                                                                                <input
                                                                                                                    type="checkbox"
                                                                                                                    class="subFeatureCheckbox"
                                                                                                                    data-id="{{ $subFeature->id }}"
                                                                                                                    id="subFeature{{ $subFeature->id }}"
                                                                                                                    name="subfeatures[]"
                                                                                                                    value="{{ $subFeature->id }}"
                                                                                                                    {{ !empty($searchData['featureIds']) && in_array($subFeature->id, $searchData['featureIds']) ? 'checked' : '' }}>
                                                                                                                <label
                                                                                                                    class="text-14 color-b-blue"
                                                                                                                    for="subFeature{{ $subFeature->id }}">
                                                                                                                    {{ $subFeature->name ?? '' }}
                                                                                                                </label>
                                                                                                            </div>
                                                                                                            @php $subFeatureCount ++; @endphp
                                                                                                        @endforeach
                                                                                                    </div>
                                                                                                @endforeach
                                                                                            </div>
                                                                                        </div>
                                                                                    @else
                                                                                        <!-- Handle case where there are no subfeatures -->
                                                                                        <div class="accordion-body">
                                                                                            <p>No subfeatures available.
                                                                                            </p>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        @endforeach


                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end-modal --}}
                                        </div>

                                    </section>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- ///////////////////////// -->

                </div>
            </div>
        </div>

        @include('modules.properties.save_search_name')
    </div>
</form>
{{-- search-filter-buttons --}}
<div class="d-flex justify-content-between align-items-center mt-3 flex-wrap gap-3">
    <div class="d-flex align-items-center gap-3 flex-wrap">
        <button type="button"
            class=" d-flex gap-2 align-items-center b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue position-relative  "
            onclick="window.open('{{ route(routeNamePrefix() . 'properties.searchProperties') }}','_self')">
            <span
                class=" w-24 h-24 d-flex align-items-center justify-content-center icon-reset_filter button-icon text-16 color-b-blue border-r-8 border-blue p-1"></span>Reset
            all filters
        </button>
        <button type="button"
            class=" d-flex gap-2 align-items-center b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue position-relative  saveSearchFilled {{ !empty($savedSearchId) ? '' : 'd-none' }}">
            <span
                class=" w-24 h-24 d-flex align-items-center justify-content-center button-icon text-24 color-b-blue border-r-8 savedSearchIcon icon-fill-save_search"></span>
            Save Search
        </button>
        <button type="button"
            class=" d-flex gap-2 align-items-center b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue position-relative  saveSearchUnfilled {{ !empty($savedSearchId) ? 'd-none' : '' }}"
            data-bs-toggle="modal" data-bs-target="#save-seach-modal">
            <span
                class=" w-24 h-24 d-flex align-items-center justify-content-center button-icon text-24 color-b-blue border-r-8 savedSearchIcon icon-save_search"></span>
            Save Search
        </button>



        <button type="button"
            class=" d-flex gap-2 align-items-center b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue position-relative collabration_button text-start "
            id="resetFilterBtn">
            <span class="d-flex"><input type="checkbox" id="button_reset" name="button_reset"
                    value="button_reset"></span>
            Only Show Open For Collaboration Properties
        </button>
    </div>
    <button type="button"
        class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  small-button gardient-button searchFilterBtn"
        style="z-index:1;" id="searchFilterBtn">
        Search
    </button>
</div>
