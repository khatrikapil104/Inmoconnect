<div class="row">
        <div class="col-md-12 common-label-css mt-0 mt-sm-2">
            <div class="form-group mt-3 position-relative">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text icon-Search input-icon-search" ></span>
                    <input type="text" name="{{$filterName}}[search]" class="input-icon-one form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 color-b-blue height-50 " placeholder="{{trans('messages.search_filter.Search_by_name_email_and_phone_number')}}" value="{{ !empty($searchData['search']) ? $searchData['search'] : '' }}">
                </div>

            </div>
            
        </div>
        
        <div class="col-md-6 common-label-css mt-0 mt-sm-2">
            <x-forms.crm-single-select :fieldData="[
                    'name' => $filterName.'[user_role_id]',
                    'hasLabel' => true,
                    'label' => trans('messages.search_filter.User_Role'),
                    'id' => 'user_role_id',
                    'options' => $filterData['roles'],
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => 'Type',
                    'isRequired' => false,
                    'selected' => !empty($searchData['user_role_id']) ? $searchData['user_role_id'] : '' 
                ]"/>
        </div>
        
        <div class="col-md-6 common-label-css">
            <x-forms.crm-single-select :fieldData="[
                    'name' => $filterName.'[sort_by]',
                    'hasLabel' => true,
                    'label' => trans('messages.search_filter.Sort_By'),
                    'id' => 'sort_by',
                    'options' => ['newest' => 'Newest','oldest' => 'Oldest'],
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => 'Sort By',
                    'isRequired' => false,
                    'selected' => !empty($searchData['sort_by']) ? $searchData['sort_by'] : '' 
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
                'class' => 'border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 small-button gardient-button searchFilterBtn',
                'id' => 'searchFilterBtn',
                'attributes' => [],
                
                    ]"/>
        </div>
        
    </div>