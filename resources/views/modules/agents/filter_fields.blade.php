<div class="row">
        <div class="col-12 col-sm-4 col-md-4 common-label-css mt-0 mt-sm-2">
            <x-forms.crm-text-field :fieldData="[
                    'name' => $filterName.'[address]',
                    'hasLabel' => true,
                    'label' => trans('messages.search_filter.Location'),
                    'id' => 'address',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => false,
                    'placeholder' => trans('messages.search_filter.Location'),
                    'value' => !empty($searchData['address']) ? $searchData['address'] : '' 
                ]"/>
        </div>
        <div class="col-12 col-sm-4 col-md-4 common-label-css mt-0 mt-sm-2">
            <x-forms.crm-text-field :fieldData="[
                    'name' => $filterName.'[zipcode]',
                    'hasLabel' => true,
                    'label' => trans('messages.search_filter.Pincode'),
                    'id' => 'zipcode',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => false,
                    'placeholder' => trans('messages.search_filter.Pincode'),
                    'value' => !empty($searchData['zipcode']) ? $searchData['zipcode'] : '' 
                ]"/>
        </div>
        {{-- <div class="col-12 col-sm-4 col-md-4 common-label-css mt-0 mt-sm-2">
            <x-forms.crm-text-field :fieldData="[
                    'name' => $filterName.'[email]',
                    'hasLabel' => true,
                    'label' =>trans('messages.search_filter.Email_ID'),
                    'id' => 'email',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => false,
                    'placeholder' => trans('messages.search_filter.Email_ID'),
                    'value' => !empty($searchData['email']) ? $searchData['email'] : '' 
                ]"/>
        </div> --}}
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
        
        <div class="col-12 col-sm-4 col-md-4 common-label-css">
            <x-forms.crm-single-select :fieldData="[
                    'name' => $filterName.'[category_id]',
                    'hasLabel' => true,
                    'label' => trans('messages.search_filter.Category'),
                    'id' => 'category_id',
                    'options' => $filterData['categories'],
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => trans('messages.search_filter.Category'),
                    'isRequired' => false,
                    'selected' => !empty($searchData['category_id']) ? $searchData['category_id'] : '' 
                ]"/>
        </div>
        <div class="col-12 col-sm-4 col-md-4 common-label-css">
            <x-forms.crm-single-select :fieldData="[
                    'name' => $filterName.'[sort_by]',
                    'hasLabel' => true,
                    'label' => trans('messages.search_filter.Sort_By'),
                    'id' => 'sort_by',
                    'options' => ['newest' => trans('messages.agent-dashboard.sort_newest'),
                                  'oldest' => trans('messages.agent-dashboard.sort_oldest')],
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => trans('messages.search_filter.Sort_By'),
                    'isRequired' => false,
                    'selected' => !empty($searchData['sort_by']) ? $searchData['sort_by'] : '' 
                ]"/>
        </div>
        <div class="col-md-12  common-label-css ">
        <x-forms.crm-range-slider :fieldData="[
                'name' => 'propertyRangeSlider',
                'hasLabel' => true,
                'label' => trans('messages.search_filter.Number_of_Property_Listing'),
                'id' => 'propertyRangeSlider',
                'attributes' => [],
                'hasHelpText' => false,
                'help' => 'Please enter your name',
                'isRequired' => false,
                'minId'=>'min_property',
                'minName'=>$filterName.'[min_property]',
                'maxName'=>$filterName.'[max_property]',
                'maxId'=>'max_property',
                'minRange'=>'0',
                'maxRange'=>'10000',
                'minValue'=> !empty($searchData['min_property']) ? $searchData['min_property'] : '' ,
                'maxValue'=> !empty($searchData['max_property']) ? $searchData['max_property'] : '' ,
            ]"/>
        </div> 
        <div class="col-md-12 mt-30 d-flex justify-content-between flex-wrap gap-2">

            <x-forms.crm-button :fieldData="[
                'text' => '<span class=\'w-30 h-30 d-flex align-items-center justify-content-center icon-reset_filter button-icon text-20 color-b-blue border-r-8 border-blue p-1 me-2\'></span>'.trans('messages.search_filter.Reset_all_filters'),
                'type' => 'button',
                'class' => ' d-flex gap-2 align-items-center b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue position-relative resetFilterBtn ',
                'id' => 'resetFilterBtn',
                'attributes' => []
                    ]"/>
                <x-forms.crm-button :fieldData="[
                'text' => trans('messages.search_filter.Search'),
                'type' => 'button',
                'class' => 'border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 small-button gardient-button searchFilterBtn',
                'id' => 'searchFilterBtn',
                'attributes' => [],
                
                    ]"/>
        </div>
        
    </div>