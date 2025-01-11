<div>
    <!-- He who is contented is rich. - Laozi -->
</div>@php

$totalCount = storeCrmComponentsDataIntoSession('crm-select');

@endphp
@if(!empty($totalCount) && ($totalCount == 1))
@push('styles')
<link  rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endpush

<style>

         .select2-results__option:before{
            width: 0px;
            height:0;
            border:none;
        }
        .select2-results__option[aria-selected="true"]:before{
            padding-left: 0px;
        }
    </style>
@endif
<div class="form-group crm-single-select-container position-relative mt-3">
@if(isset($values['hasLabel']) && $values['hasLabel'])
    <label for="{{ $values['id'] ?? '' }}" class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ $values['label'] ?? 'Select Input' }} @if(isset($values['isRequired']) && $values['isRequired'])<span class="required">*</span>@endif</label>
@endif
<div class="abc">
<select class="crm-single-select form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 {{ $values['class'] ?? '' }}" name="{{ $values['name'] ?? '' }}" id="{{ $values['id'] ?? '' }}" 
    @if(isset($values['attributes']) && is_array($values['attributes']))
        {!! implode(' ', $values['attributes']) !!}
    @endif
>
<option value="">{{ $values['placeholder'] ?? 'Select options' }}</option>

@if(isset($values['options']) && is_array($values['options']))
    @foreach($values['options'] as $optionValue => $optionData)
    <option value="{{ $optionValue }}" data-image="{{ $optionData['image'] }}" data-type="{{ $optionData['type'] }}" @if(isset($values['selected']) && $optionValue == $values['selected']) selected @endif>{{ $optionData['label'] }}</option>

    @endforeach
@endif
</select>
<div class="invalid-feedback fw-bold"></div>
</div>

@if(isset($values['hasHelpText']) && $values['hasHelpText'])
    <small class="small-text-select color-b-blue opacity-8 text-10 font-weight-400 line-height-20 text-capitalize position-relative">{!! $values['help'] ?? '' !!}</small>
@endif
</div>


@if(!empty($totalCount) && ($totalCount == 1))
<script src="{{ asset('assets/js/select2.min.js') }}"></script>

@endif
@if(!empty($values['id'] && $values['id'] == 'type_id') && !empty($values['onFilterPage']))
<script>
// Initialize Select2

$(document).ready(function () {
    $("#{{ $values['id'] ?? '' }}").select2({
        placeholder: "{{ $values['placeholder'] ?? 'Select options' }}",
        allowHtml: true,
        minimumResultsForSearch: {{ $values['minimumResultsForSearch'] ?? '-1' }},
        dropdownParent: $("#dataFilterModal")
    });

    // Handle selection of the placeholder
    //$("#{{ $values['id'] ?? '' }}").on('select2:select', function (e) {
        
       // if (e.params.data.id === 'resetPlaceholder') {
            //$(this).val('').trigger('change');
        //}
   // });


});
</script>
@else
<script>
// Initialize Select2

$(document).ready(function () {
    $("#{{ $values['id'] ?? '' }}").select2({
        placeholder: "{{ $values['placeholder'] ?? 'Select options' }}",
        allowHtml: true,
        minimumResultsForSearch: {{ $values['minimumResultsForSearch'] ?? '-1' }},
        templateResult: function (data) {
            if (!data.id) {
                return data.text;
            }

            var imageUrl = $(data.element).data('image');
            if (!imageUrl) {
                return data.text;
            }
            var dataType = $(data.element).data('type');

            if(dataType && dataType == 'image'){
                return $(
                '<span>' +
                '<img class="select2-user-image" src="' + imageUrl + '" height="20" />' +
                ' ' + data.text + '</span>'
                );
            }else{
                return $(
                    '<div class="' + imageUrl + '"></div><span>' + data.text + '</span>'
                );     
            }
            
        },
        templateSelection: function (data) {
            if (!data.id) {
                return data.text;
            }

            var imageUrl = $(data.element).data('image');
            if (!imageUrl) {
                return data.text;
            }

            var dataType = $(data.element).data('type');

            if(dataType && dataType == 'image'){
                return $(
                '<span>' +
                '<img class="select2-user-image" src="' + imageUrl + '" height="20" />' +
                ' ' + data.text + '</span>'
                );
            }else{
                return $(
                    '<div class="' + imageUrl + '"></div><span>' + data.text + '</span>'
                );  
            }
        },
    });

    // Handle selection of the placeholder
    //$("#{{ $values['id'] ?? '' }}").on('select2:select', function (e) {
        
       // if (e.params.data.id === 'resetPlaceholder') {
            //$(this).val('').trigger('change');
        //}
   // });


});
</script>
@endif


