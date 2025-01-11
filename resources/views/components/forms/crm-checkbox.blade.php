<div class="form-group crm-checkbox-container position-relative row">
    @if (isset($values['hasLabel']) && $values['hasLabel'])
        <label class="text-14 font-weight-400 lineheight-18 color-b-blue pt-3 ps-2">{{ $values['label'] ?? 'Checkbox Group' }}
            @if (isset($values['isRequired']) && $values['isRequired'])
                <span class="required">*</span>
            @endif
        </label>
    @endif
    @php
        $counter = 0;
    @endphp
    @foreach ($values['options'] ?? [] as $optionValue => $optionLabel)
        <div class="col-lg-3 col-md-3 col-sm-3 col-6 mt-2">
            <div class="form-check d-flex align-items-center">
                @if (!empty($values['hasIcon']))
                    <input class="featureChekedId form-check-input crm-checkbox-input me-2{{ $values['class'] ?? '' }}"
                        type="checkbox" name="{{ $values['name'] ?? 'checkboxGroup' }}[{{ $counter }}]"
                        id="{{ $optionLabel['id'] ?? 'checkbox' . $counter }}"
                        value="{{ $optionLabel['id'] ?? '' }}"
                        @if (isset($values['attributes']) && is_array($values['attributes'])) {!! implode(' ', $values['attributes']) !!} @endif
                        @if (isset($values['selected']) && in_array($optionLabel['id'], $values['selected'])) checked @endif data-bs-toggle="modal"
                        @if (isset($values['hasPropertyFeature']))
                        data-bs-toggle="modal" data-bs-target="#{{ $values['id'] . $optionLabel['id'] }}" 
                        @endif
                        data-id="{{ $optionLabel['id'] }}">

                    <label
                        class="form-check-label d-flex align-items-center p-0 text-12 font-weight-400 line-height-15 gap-2"
                        for="{{ $values['id'] . $counter ?? 'checkbox' . $counter }}" data-bs-toggle="modal"
                        data-bs-target="#{{ $values['id'] . $optionLabel['id'] }}">
                        <i class="text-20 {{ $optionLabel['icon'] ?? '' }}"></i> {{ $optionLabel['name'] ?? '' }}
                    </label>
                @else
                    <input class="featureId form-check-input crm-checkbox-input me-2{{ $values['class'] ?? '' }}"
                        type="checkbox" name="{{ $values['name'] ?? 'checkboxGroup' }}[{{ $counter }}]"
                        id="{{ $values['id'] . $counter ?? 'checkbox' . $counter }}" value="{{ $optionValue }}"
                        @if (isset($values['attributes']) && is_array($values['attributes'])) {!! implode(' ', $values['attributes']) !!} @endif
                        @if (isset($values['selected']) && in_array($optionValue, $values['selected'])) checked @endif data-bs-toggle="modal"
                        data-bs-target="#{{ $values['id'] . $optionLabel['id'] }}">
                    <label class="form-check-label" for="{{ $values['id'] . $counter ?? 'checkbox' . $counter }}"
                        data-bs-toggle="modal"
                        data-bs-target="#{{ $values['id'] . $optionLabel['id'] . $optionLabel['id'] }}"
                        data-bs-toggle="modal"
                        data-bs-target="#{{ $values['id'] . $optionLabel['id'] }}"data-id="{{ $optionLabel['id'] }}">
                        {{ $optionLabel }}
                    </label>
                @endif

            </div>
        </div>
        @if (!empty($values['hasPropertyFeature']))
            <div class="modal fade checkbox_modal" id="{{ $values['id'] . $optionLabel['id'] }}" tabindex="-1"
                role="dialog" aria-labelledby="setting" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-file">
                        <div class="modal-header border-0 modal-header_file pb-0">
                            <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                id="SelectSettingsLabel">Select {{$optionLabel['name']}}</h4>
                            <button type="button" feature_id="{{ $optionLabel['id'] }}" class="close b-color-transparent cursor-pointer close_modal"
                                data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> <i
                                        class="icon-cross text-24 color-b-blue opacity-8"></i></span>
                            </button>
                        </div>
                        <div class="modal-body modal-header_file checkbox_view-page">
                            <div class="row">
                                @foreach ($optionLabel['sub_feature'] as $sub_feature)
                                    <div class="col-lg-4">
                                        <div class="d-flex gap-1 align-items-center mt-20">
                                            <input type="checkbox" class="subFetureCheckbox"
                                                data-id="{{ $sub_feature['id'] }}" id="{{ $sub_feature['id'] }}" feature_id="{{ $optionLabel['id'] }}"
                                                @if (isset($values['selectedSubFeature']) && in_array($sub_feature['id'], $values['selectedSubFeature'])) checked @endif>
                                            <label class="text-14 color-b-blue" for="beachfront">
                                                {{ $sub_feature['name'] }}</label>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                            <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                                <button type="button"
                                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white addSubFeturesBtn "
                                    data-id="{{ $optionLabel['id'] }}">
                                    Add {{$optionLabel['name']}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @php $counter++; @endphp
    @endforeach

    <div class="invalid-feedback fw-bold"></div>

    @if (isset($values['hasHelpText']) && $values['hasHelpText'])
        <small
            class="small-text-checkbox color-b-blue opacity-8 text-10 font-weight-400 line-height-20 text-capitalize position-relative">{!! $values['help'] ?? '' !!}</small>
    @endif
</div>
