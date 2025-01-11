@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/components/forms/crm-password-field.css') }}">
@endpush
@php

    $totalCount = storeCrmComponentsDataIntoSession('crm-password-field');

@endphp

<div class="form-group crm-password-container position-relative mt-3 {{ $values['componentClass'] ?? '' }}"
    style="{{ !empty($values['isComponentHidden']) ? 'display:none;' : 'display:block;' }}">
    @if (isset($values['hasLabel']) && $values['hasLabel'])
        <label for="{{ $values['id'] ?? '' }}"
            class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ $values['label'] ?? 'Password Input' }}
            @if (isset($values['isRequired']) && $values['isRequired'])
                <span class="required">*</span>
            @endif
        </label>
    @endif
    <input type="password"
        class= " crm-password-input form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46  {{ $values['class'] ?? '' }}"
        name="{{ $values['name'] ?? '' }}" id="{{ $values['id'] ?? '' }}"
        placeholder="{{ $values['placeholder'] ?? '' }}"
        @if (isset($values['attributes']) && is_array($values['attributes'])) {!! implode(' ', $values['attributes']) !!} @endif>
    <div class="invalid-feedback fw-bold"></div>
    <span class="toggle-password cursor-pointer togglePassword{{ $values['id'] ?? $values['name'] }}">
        <img src="{{ asset('img/eye.svg') }}" alt="image" class="open-eyes">
        <img src="{{ asset('img/eye-slash.svg') }}" alt="image" class="close-eyes">
    </span>
    @if (isset($values['hasHelpText']) && $values['hasHelpText'])
        <small
            class="small-text-password color-b-blue opacity-8 text-14 font-weight-400 lineheight-18 position-relative pt-2">{!! $values['help'] ?? '' !!}</small>
    @endif
</div>

@push('scripts')
    @if (!empty($totalCount) && $totalCount == 1)
        <script>
            $(".toggle-password").hover(

                function functionName() {
                    //Change the attribute to text
                    $(this).parents('.crm-password-container').find('.crm-password-input').attr('type', 'text');
                    $(".glyphicon")
                        .removeClass("open-eyes")
                        .addClass("close-eyes");
                },
                function() {
                    //Change the attribute back to password
                    $(this).parents('.crm-password-container').find('.crm-password-input').attr('type', 'password');
                    $(".glyphicon")
                        .removeClass("close-eyes")
                        .addClass("open-eyes");
                }
            );
        </script>
    @endif
@endpush
