@php
    $totalCount = storeCrmComponentsDataIntoSession('crm-select');
@endphp

@if (!empty($totalCount) && $totalCount == 1)
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
        <style>
            .crm-single-select-container .select2-results__option:before{
                width: 0px;
            }
        </style>
    @endpush
@endif

<div class="form-group crm-single-select-container position-relative mt-3">
    @if (isset($values['hasLabel']) && $values['hasLabel'])
        <label for="{{ $values['id'] ?? '' }}" class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ $values['label'] ?? 'Select Input' }} @if(isset($values['isRequired']) && $values['isRequired'])<span class="required">*</span>@endif</label>
    @endif

    <div class="abc">
        <select class="crm-single-select form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 color-b-blue height-50 {{ $values['class'] ?? '' }}" name="{{ $values['name'] ?? '' }}" id="{{ $values['id'] ?? '' }}" 
            @if (isset($values['attributes']) && is_array($values['attributes']))
                {!! implode(' ', $values['attributes']) !!}
            @endif
            
        >
            <option value="">{{ $values['placeholder'] ?? 'Select options' }}</option>
            <option value="resetPlaceholder">{{ $values['placeholder'] ?? 'Select options' }}</option>
            @foreach ($values['options'] ?? [] as $optionValue => $optionLabel)
                <option value="{{ $optionValue }}" @if (isset($values['selected']) && $values['selected'] == $optionValue) selected @endif>{{ $optionLabel }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback fw-bold"></div>
    </div>


    @if (isset($values['hasHelpText']) && $values['hasHelpText'])
        <small class="small-text-select color-b-blue opacity-8 text-10 font-weight-400 line-height-20 text-capitalize position-relative">{!! $values['help'] ?? '' !!}</small>
    @endif
</div>

@if (!empty($totalCount) && $totalCount == 1)
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
@endif

<script>
    // Initialize Select2
    $(document).ready(function () {
        var selector = "#{{ $values['id'] ?? '' }}";
        var placeholder = "{{ $values['placeholder'] ?? 'Select options' }}";
        var minimumResultsForSearch = "{{ $values['minimumResultsForSearch'] ?? '-1' }}";
        dropdownParent = '';
        @if(!empty($values['id'] && $values['id'] == 'type_id') && !empty($values['onFilterPage']))
        dropdownParent = $("#dataFilterModal") ;
        
        @endif


        @if (isset($values['ajaxUrl']))
            var ajaxUrl = "{{ $values['ajaxUrl'] ?? 'Select options' }}";

            initializeSelect2(selector, placeholder, minimumResultsForSearch, dropdownParent, ajaxUrl);
            // Prepopulate selected value if available
            var selectedValue = "{{ $values['selectedVal'] ?? '' }}";
            var selectedName = "{{ $values['selectedName'] ?? '' }}";
            if (selectedValue && selectedName) {
                $(selector).append(new Option(selectedName, selectedValue, true, true)).trigger('change');
            }
        @else
            initializeSelect2(selector, placeholder, minimumResultsForSearch);
        @endif

        @if (!empty($values['id']) && $values['id'] == 'type_id' && !empty($values['onFilterPage']))
            initializeSelect2(selector, placeholder, minimumResultsForSearch,$("#dataFilterModal"));
        @endif

        
    });

    function initializeSelect2(selector, placeholder, minimumResultsForSearch, dropdownParent = null, ajaxUrl = null) {
        var options = {
            placeholder: placeholder,
            minimumResultsForSearch: minimumResultsForSearch
        };

        if (ajaxUrl) {
            options.ajax = {
                url: ajaxUrl,
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        page: params.page || 1
                    }

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data.results,
                        pagination: {
                            more: (data.results.length > 0) 
                        }
                    };
                }

            };

            if (dropdownParent) {
                options.dropdownParent = $(dropdownParent);
            }
        }

        $(selector).select2(options);

        // Handle selection of the placeholder
        $(selector).on('select2:select', function (e) {
            if (e.params.data.id === 'resetPlaceholder') {
                $(this).val('').trigger('change');
            }
        });
    }
</script>
