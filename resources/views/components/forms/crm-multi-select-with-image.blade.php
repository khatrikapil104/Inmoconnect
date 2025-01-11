@php
    $totalCount = storeCrmComponentsDataIntoSession('crm-select');
@endphp
@if(!empty($totalCount) && ($totalCount == 1))
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link  rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
<style>
  /* .gallery_sec{
  width:100%;
  padding:80px 0;
} */
/* .heading{
  width:100%;
  text-align:center;
}
.heading h2{
  font-size:30px;
  font-weight:bold;
  border-bottom:2px solid #000;
  padding-bottom:25px;
} */
/* .gallery_sec img{
  width:100%;
  margin-bottom:30px;
  height:250px;
} */
.multiselect-select .select2-container--default .select2-selection--multiple {
    border-radius: 8px!important;
    border: 1px solid var(--Black-Grey-Color, #17213A)!important;
    height:46px;
    padding-bottom:0!important;
}
.multiselect-select .select2-container .select2-search--inline .select2-search__field{
    height: 42px!important;
    margin-top: 0px!important;
    top: 50%;
    left: 50%;
    transform: translate(-49%, -27%);
    position: absolute;
    font-family: "Lato", sans-serif!important;
    font-size: 14px;
}
.multiselect-select span.selection{
    position:relative;
}
/* span.selection:after{
    border-color: #000 !important;
    border-style: inherit !important;
    border-width: 0 !important;
    display: block !important;
    width: 8px !important;
    height: 8px !important;
    border-top: 2px solid #000 !important;
    border-left: 2px solid #000 !important;
    transform: rotate(-135deg) !important;
    right: 16px;
    margin-left: -4px !important;
    margin-top: -2px;
    position: absolute !important;
    top: 13px;
    content:'';
} */
.multiselect-select .select2-container--default .select2-selection--multiple .select2-selection__choice{
        vertical-align: middle!important;
        margin-top:0px!important;
        padding-left:0!important;
    border-radius: 5px!important;
border: 1px solid #FFF!important;
box-shadow: 0px 0px 3px 1px rgba(56, 49, 146, 0.15)!important;
background-color:transparent!important;
margin-left: -5px!important;
}
.multiselect-select .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
    display:none;
 
}
.multiselect-select .select2-container--default .select2-selection--multiple .select2-selection__choice__display img{
    width: 30px;
    height: 30px;
}
.multiselect-select .select2-container--default .select2-selection--multiple .select2-selection__choice__display{
        padding-left: 0px!important;
     padding-right: 0px!important;
}
.multiselect-select .select2-container .select2-selection--multiple .select2-selection__rendered{
    padding-left: 15px!important;
    position: absolute;
    top: 8px;
    width: 276px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
.multiselect-select .select2-container--default .select2-selection--multiple .select2-selection__clear{
    display:none;
}
.multiselect-select .select2-results__option--selectable span img{
    width: 24px;
    height: 24px;
    border-radius: 5px;
margin-right:10px;
}


.multiselect-select .select2-results__option--selectable{
    display: flex;
    align-items: center;
}
 /* .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple ~ span.selection:after{
    transform: rotate(0deg) !important;
} */
.multiselect-select span.select2-container.select2-container--default.select2-container--open span.selection:after{
    transform: rotate(46deg) !important;
    top:17px;
}
/* //////////////////////////////////////////////////////////////////////////////////// */
.multiselect-select .select_with_checkbox .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
    display:block;
    border: none;
    color: #383192;
    right: 0;
    top: 2px;
    left: inherit;
}
.multiselect-select .select_with_checkbox .select2-container--default .select2-selection--multiple .select2-selection__choice{
    background-color: #F6F6FF!important;
    border:none!important;
    box-shadow:none!important;
    padding: 2px 22px 2px 10px!important;
    margin-right: 10px;
}
.multiselect-select .select_with_checkbox .select2-container--default .select2-selection--multiple .select2-selection__choice__display{
    font-size: 14px;
    color: #383192;
}
.multiselect-select .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover, .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:focus{
    background-color:transparent;
}
    </style>
@endpush
@endif
<style>
#select2-{{ $values['name'] ?? '' }}-results .select2-results__option:before {
    content: "";
    display: inline-block;
    position: relative;
    height: 16px;
    width: 16px;
    border: 2px solid #e9e9e9;
    border-radius: 4px;
    background-color: #fff;
    margin-right: 10px;
    vertical-align: middle;
    flex-shrink: 0;
} 
#select2-{{ $values['name'] ?? '' }}-results .select2-results__option--selected:before {
    font-family: fontAwesome;
    content: "\f00c";
    color: #fff;
    background-color: #383192;
    border: 0;
    display: inline-block;
    padding-left: 3px;
    padding-top: 0px;
    font-size: 13px;
}
</style>


<div class="form-group crm-multi-select-container position-relative mt-3">
    @if(isset($values['hasLabel']) && $values['hasLabel'])
        <label for="{{ $values['id'] ?? '' }}" class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ $values['label'] ?? 'Multi-Select' }} @if(isset($values['isRequired']) && $values['isRequired'])<span class="required">*</span>@endif</label>
    @endif

    <select class="crm-multi-select form-control {{ $values['class'] ?? '' }}" name="{{ $values['name'] ?? 'multiSelect' }}[]" id="{{ $values['id'] ?? 'multiSelect' }}" multiple="multiple"
            @if(isset($values['attributes']) && is_array($values['attributes']))
            {!! implode(' ', $values['attributes']) !!}
            @endif
    >
        <option value="">{{ $values['placeholder'] ?? 'Select options' }}</option>
        @if(isset($values['options']) && is_array($values['options']))
        @foreach($values['options'] as $optionValue => $optionData)
        <option value="{{ $optionValue }}" data-image="{{ $optionData['image'] }}" @if(isset($values['selected']) && in_array($optionValue, $values['selected'])) selected @endif>{{ $optionData['label'] }}</option>
        @endforeach
        @endif
    </select>

    <div class="invalid-feedback fw-bold"></div>

    @if(isset($values['hasHelpText']) && $values['hasHelpText'])
        <small class="small-text-multi-select color-b-blue opacity-8 text-10 font-weight-400 line-height-20 text-capitalize position-relative">{!! $values['help'] ?? '' !!}</small>
    @endif
</div>

@if(!empty($totalCount) && ($totalCount == 1))
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
@endif
<script>
    $(document).ready(function () {
        $("#{{ $values['id'] ?? '' }}").select2({
            tags: @if(isset($values['allowTags']) && $values['allowTags']) true @else false @endif,
            tokenSeparators: [','],
            closeOnSelect : false,
            allowHtml: true,
			allowClear: true,
            placeholder: "{{ $values['placeholder'] ?? 'Select options' }}",
            templateResult: function (data) {
                if (!data.id) {
                    return data.text;
                }

                var imageUrl = $(data.element).data('image');
                if (!imageUrl) {
                    return data.text;
                }

                return $(
                    '<span>' +
                    '<img class="select2-user-image" src="' + imageUrl + '" height="20" />' +
                    ' ' +  data.text  +  '</span>'
                );
            },
            templateSelection: function (data) {
                if (!data.id) {
                    return data.text;
                }

                var imageUrl = $(data.element).data('image');
                if (!imageUrl) {
                    return data.text;
                }

                return $(
                    '<span><img class="select2-user-image" src="' + imageUrl + '" height="20" /></span>'
                );
            },
        });

    });
</script>
<!-- Showing Selected Values Without Dropdown -->
@if(!empty($values['showSelectedWithoutDropdown']))
@foreach($values['showSelectedWithoutDropdown'] as $selectedValue)
<script>
$("#{{ $values['id'] ?? '' }}").append(new Option('{{$selectedValue['name']}}', '{{$selectedValue['value']}}', true, true)).trigger('change');
</script>
@endforeach
@endif
