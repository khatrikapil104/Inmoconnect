<div class="row">

    <div class="col-md-12  common-label-css  mt-0 mt-sm-2">
    <x-forms.crm-range-slider :fieldData="[
            'name' => 'priceRangeSlider',
            'hasLabel' => true,
            'label' => trans('messages.search_filter.Price_Range'),
            'id' => 'priceRangeSlider',
            'attributes' => [],
            'hasHelpText' => false,
            'help' => 'Please enter your name',
            'isRequired' => false,
            'minId'=>'min_price',
            'minName'=>$filterName.'[min_price]',
            'maxName'=>$filterName.'[max_price]',
            'maxId'=>'max_price',
            'minRange'=>'0',
            'maxRange'=>!empty($filterData['maxPriceAndSize']->max_price) ? (round($filterData['maxPriceAndSize']->max_price + 1, 2))  : '100000',
            'prefix'=>config('Reading.default_currency'),
            'minValue'=> !empty($searchData['min_price']) ? $searchData['min_price'] : '' ,
            'maxValue'=> !empty($searchData['max_price']) ? $searchData['max_price'] : '' ,
        ]"/>
    </div> 
    <div class="col-12 col-sm-4 col-md-4 common-label-css mt-0 mt-sm-2">
        <x-forms.crm-single-select :fieldData="[
                'name' => $filterName.'[type_id]',
                'hasLabel' => true,
                'label' => trans('messages.search_filter.Type'),
                'id' => 'type_id',
                'options' => $filterData['types'],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.search_filter.Type'),
                'isRequired' => false,
                'minimumResultsForSearch' => 0,
                'onFilterPage' => true,
                'selected' => !empty($searchData['type_id']) ? $searchData['type_id'] : '' 
            ]"/>
    </div>
    <div class="col-12 col-sm-4 col-md-4 common-label-css mt-0 mt-sm-2">
        <x-forms.crm-text-field :fieldData="[
                'name' => $filterName.'[reference]',
                'hasLabel' => true,
                'label' => trans('messages.search_filter.Property_ID'),
                'id' => 'reference',
                'attributes' => [],
                'hasHelpText' => false,
                //'help' => 'Please enter your name',
                'isRequired' => false,
                'placeholder' => trans('messages.search_filter.Property_ID'),
                'value' => !empty($searchData['reference']) ? $searchData['reference'] : '' 
            ]"/>
    </div>
    <div class="col-12 col-sm-4 col-md-4 common-label-css mt-0 mt-sm-2">
        <x-forms.crm-single-select :fieldData="[
                'name' => $filterName.'[state]',
                'hasLabel' => true,
                'label' => trans('messages.search_filter.Property_State'),
                'id' => 'state',
                'options' => $filterData['statesArr'],
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.search_filter.Property_State'),
                'isRequired' => false,
                'selected' => !empty($searchData['state']) ? $searchData['state'] : '' 
            ]"/>
    </div>
    <div class="col-12 col-sm-4 col-md-4 common-label-css">
        <x-forms.crm-radio-custom-filter :fieldData="[
            'name' => $filterName.'[floors]',
            'hasLabel' => true,
            'label' => trans('messages.search_filter.Property_Floors'),
            //'id' => 'floors',
            'attributes' => [],
            'hasHelpText' => false,
            'help' => 'Please enter your name',
            'isRequired' => false,
            'options' => ['any','+1','+2','+3','+4'],
            'selected' => !empty($searchData['floors']) ? $searchData['floors'] : '' 
        ]"/>
    </div>  
    <div class="col-12 col-sm-4 col-md-4 common-label-css">
        <x-forms.crm-radio-custom-filter :fieldData="[
            'name' => $filterName.'[bedrooms]',
            'hasLabel' => true,
            'label' => trans('messages.search_filter.Bedrooms'),
            //'id' => 'bedrooms',
            'attributes' => [],
            'hasHelpText' => false,
            'help' => 'Please enter your name',
            'isRequired' => false,
            'options' => ['any','+1','+2','+3','+4'],
            'selected' => !empty($searchData['bedrooms']) ? $searchData['bedrooms'] : '' 
        ]"/>
    </div> 
    <div class="col-12 col-sm-4 col-md-4 common-label-css">
        <x-forms.crm-radio-custom-filter :fieldData="[
            'name' => $filterName.'[bathrooms]',
            'hasLabel' => true,
            'label' => trans('messages.search_filter.Bathrooms'),
            //'id' => 'bathrooms',
            'attributes' => [],
            'hasHelpText' => false,
            'help' => 'Please enter your name',
            'isRequired' => false,
            'options' => ['any','+1','+2','+3','+4'],
            'selected' => !empty($searchData['bathrooms']) ? $searchData['bathrooms'] : '' 
        ]"/>
    </div> 
    <div class="col-md-12  common-label-css">
    <x-forms.crm-range-slider :fieldData="[
            'name' => 'size',
            'hasLabel' => true,
            'label' => trans('messages.search_filter.Sqft'),
            'id' => 'size',
            'attributes' => [],
            'hasHelpText' => false,
            'help' => 'Please enter your name',
            'isRequired' => false,
            'minId'=>'min_size',
            'minName'=>$filterName.'[min_size]',
            'maxName'=>$filterName.'[max_size]',
            'maxId'=>'max_size',
            'minRange'=>'0',
            'maxRange'=>!empty($filterData['maxPriceAndSize']->max_size) ? (round($filterData['maxPriceAndSize']->max_size + 1, 2)) : '10000',
            'minValue'=> !empty($searchData['min_size']) ? $searchData['min_size'] : '' ,
            'maxValue'=> !empty($searchData['max_size']) ? $searchData['max_size'] : '' ,
        ]"/>
    </div> 
    <div class="col-md-12 mt-30 d-flex justify-content-between flex-wrap gap-2">

        <x-forms.crm-button :fieldData="[
            'text' => '<span class=\' w-30 h-30 d-flex align-items-center justify-content-center icon-reset_filter button-icon text-20 color-b-blue border-r-8 border-blue p-1 me-2\'></span>'.trans('messages.search_filter.Reset_all_filters'),
            'type' => 'button',
            'class' => ' d-flex gap-2 align-items-center b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue position-relative resetFilterBtn ',
            'id' => 'resetFilterBtn',
            'attributes' => []
                ]"/>
            <x-forms.crm-button :fieldData="[
            'text' => trans('messages.search_filter.Search'),
            'type' => 'button',
            'class' => 'border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  small-button gardient-button searchFilterBtn',
            'id' => 'searchFilterBtn',
            'attributes' => [],
            
                ]"/>
    </div>
</div>