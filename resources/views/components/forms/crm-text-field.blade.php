@php
if(!empty($values['isInputMask'])){
    $totalCount = storeCrmComponentsDataIntoSession('crm-text-field');
}
@endphp
<div class="form-group mt-3 position-relative {{ $values['componentClass'] ?? '' }}" style="{{!empty($values['isComponentHidden']) ? 'display:none;' : 'display:block;'}}" >
@if(isset($values['hasLabel']) && $values['hasLabel'])
<label for="{{ $values['id'] ?? '' }}" class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ $values['label'] ?? 'Text Input' }} @if(isset($values['isRequired']) && $values['isRequired'])<span class="required">*</span>@endif</label>
@endif
<input type="text" class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 {{ $values['class'] ?? '' }}" name="{{ $values['name'] ?? '' }}" id="{{ $values['id'] ?? '' }}" value="{{ $values['value'] ?? '' }}" placeholder="{{ $values['placeholder'] ?? '' }}" 
@if(isset($values['attributes']) && is_array($values['attributes']))
    {!! implode(' ', $values['attributes']) !!}
@endif
>
<div class="invalid-feedback fw-bold"></div>
@if(isset($values['hasHelpText']) && $values['hasHelpText'])
<small class="color-b-blue opacity-8 text-10 font-weight-400 line-height-20 text-capitalize">{!! $values['help'] ?? '' !!}</small>
@endif
</div> 

@push('scripts')
@if(!empty($values['isInputMask']) && !empty($totalCount) && ($totalCount == 1))
<script src="{{ asset('assets/js/input_mask.js') }}"></script>
@endif
@if(!empty($values['isInputMask']))
<script>
    $(document).ready(function () {
        $('#{{ $values['id'] ?? '' }}').inputmask("{{$values['maskPattern'] ?? '999-999-9999'}}");
    });
</script>
@endif
@endpush

