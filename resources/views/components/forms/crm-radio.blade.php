<div class="form-group crm-radio-container position-relative mt-3">
    @if(isset($values['hasLabel']) && $values['hasLabel'])
        <label class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ $values['label'] ?? 'Radio Group' }} @if(isset($values['isRequired']) && $values['isRequired'])<span class="required">*</span>@endif</label>
    @endif

    @foreach($values['options'] ?? [] as $optionValue => $optionLabel)
        <div class="form-check">
            <input class="form-check-input crm-radio-input {{ $values['class'] ?? '' }}" type="radio" name="{{ $values['name'] ?? 'radioGroup' }}" id="{{ $values['id'] ?? 'radio' . $loop->index }}" value="{{ $optionValue }}" 
                @if(isset($values['attributes']) && is_array($values['attributes']))
                    {!! implode(' ', $values['attributes']) !!}
                @endif
                @if(isset($values['selected']) && $values['selected'] == $optionValue) checked @endif
            >
            <label class="form-check-label" for="{{ $values['id'] ?? 'radio' . $loop->index }}">
                {{ $optionLabel }}
            </label>
        </div>
    @endforeach

    <div class="invalid-feedback fw-bold"></div>

    @if(isset($values['hasHelpText']) && $values['hasHelpText'])
        <small class="small-text-radio color-b-blue opacity-8 text-10 font-weight-400 line-height-20 text-capitalize position-relative">{!! $values['help'] ?? '' !!}</small>
    @endif
</div>