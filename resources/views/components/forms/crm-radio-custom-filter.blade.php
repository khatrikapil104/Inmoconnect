<div class="form-group crm-radio-container position-relative mt-3">
    @if(isset($values['hasLabel']) && $values['hasLabel'])
    <label class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ $values['label'] ?? 'Radio
        Group' }} @if(isset($values['isRequired']) && $values['isRequired'])<span
            class="required">*</span>@endif</label>
    @endif
    <div class="d-flex crm-radio-custom-filter">


        @foreach($values['options'] ?? [] as $optionValue => $optionLabel)
        <div class="input-group">
            <input class="h-4 w-4 text-primary-600 border-gray-300 {{ $values['class'] ?? '' }}" type="radio"
                name="{{ $values['name'] ?? 'radioGroup' }}" id="{{ $values['id'] ?? 'radio'.$values['name']. $loop->index }}"
                value="{{ $optionValue }}" @if(!empty($values['attributes']) && is_array($values['attributes'])) {!!
                implode(' ', $values[' attributes']) !!} @endif @if(isset($values['selected']) &&
                $values['selected']==$optionValue) checked @endif>
            <label class="form-check-label" for="{{ $values['id'] ?? 'radio'.$values['name']. $loop->index }}">
                {{ $optionLabel }}
            </label>
        </div>
        @endforeach
    </div>

    <div class="invalid-feedback fw-bold"></div>

    @if(isset($values['hasHelpText']) && $values['hasHelpText'])
    <small
        class="small-text-radio color-b-blue opacity-8 text-10 font-weight-400 line-height-20 text-capitalize position-relative">{!!
        $values['help'] ?? '' !!}</small>
    @endif
</div>