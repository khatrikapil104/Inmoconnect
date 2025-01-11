@php
$totalCount = storeCrmComponentsDataIntoSession('crm-range-slider');
@endphp

@if (!empty($totalCount) && $totalCount == 1)
@endif
@push('styles')
<!-- Include noUiSlider CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.css"
    integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

<div class="form-group crm-range-slider-container position-relative mt-3">
    @if(isset($values['hasLabel']) && $values['hasLabel'])
    <label for="{{ $values['id'] ?? '' }}"
        class="text-14 font-weight-700 lineheight-18 color-b-blue mb-2">{{ $values['label'] ?? 'Range Slider' }}
        @if(isset($values['isRequired']) && $values['isRequired'])<span class="required">*</span>@endif</label>
    @endif

    <div id="{{ $values['id'] ?? 'rangeSlider' }}"></div>

    <div class="crm-input-slider d-flex justify-content-between pt-3">
        <div class="input-group">
            <!-- <label for="{{ $values['minId'] ?? 'minValue' }}" class="input-group-text">{{ $values['minLabel'] ?? 'Min' }}</label> -->
            <input type="text"
                class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 color-b-blue height-40"
                id="{{ $values['minId'] ?? 'minValue' }}" name="{{ $values['minName'] ?? 'minValue' }}"
                >
        </div>

        <div class="input-group">
            <!-- <label for="{{ $values['maxId'] ?? 'maxValue' }}" class="input-group-text">{{ $values['maxLabel'] ?? 'Max' }}</label> -->
            <input type="text"
                class="form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15  color-b-blue height-40"
                id="{{ $values['maxId'] ?? 'maxValue' }}" name="{{ $values['maxName'] ?? 'maxValue' }}"
                >
        </div>
    </div>
    <div class="invalid-feedback fw-bold"></div>

    @if(isset($values['hasHelpText']) && $values['hasHelpText'])
    <small
        class="small-text-slider color-b-blue opacity-8 text-10 font-weight-400 line-height-20 text-capitalize position-relative">{!!
        $values['help'] ?? '' !!}</small>
    @endif
</div>

@if (!empty($totalCount) && $totalCount == 1)

<!-- Include noUiSlider JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.js"
integrity="sha512-UOJe4paV6hYWBnS0c9GnIRH8PLm2nFK22uhfAvsTIqd3uwnWsVri1OPn5fJYdLtGY3wB11LGHJ4yPU1WFJeBYQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.2.0/wNumb.min.js"
integrity="sha512-igVQ7hyQVijOUlfg3OmcTZLwYJIBXU63xL9RC12xBHNpmGJAktDnzl9Iw0J4yrSaQtDxTTVlwhY730vphoVqJQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endif
<script>
    $(document).ready(function () {
        var rangeSlider = document.getElementById('{{ $values['id'] ?? 'rangeSlider' }}');
    var minInput = document.getElementById('{{ $values['minId'] ?? 'minValue' }}');
    var maxInput = document.getElementById('{{ $values['maxId'] ?? 'maxValue' }}');
    var inputs = [minInput, maxInput];

    noUiSlider.create(rangeSlider, {
        start: [{{ !empty($values['minValue']) ? $values['minValue'] : $values['minRange'] }}, {{ !empty($values['maxValue']) ? $values['maxValue'] : $values['maxRange'] }}],
        connect: true,
        // tooltips: [true, wNumb({decimals: 1})],
        range: {
            'min': [{{ $values['minRange'] ?? '0' }}],
            // '10%': [10, 10],
            // '50%': [80, 50],
            // '80%': 150,
            'max': {{ $values['maxRange'] ?? '100000' }}
        },
        margin: 500,
        step : 1000,
        format: wNumb({
            decimals: 0,
            thousand: ',',
            // suffix: '$',
            prefix: '{{ $values['prefix'] ?? '' }}',
            suffix: '{{ $values['suffix'] ?? '' }}'
        })
    });
    rangeSlider.noUiSlider.on('update', function(values, handle) {
        inputs[handle].value = values[handle];
    });

    inputs.forEach(function(input, handle) {

        input.addEventListener('change', function() {
            rangeSlider.noUiSlider.setHandle(handle, this.value);
        });

        input.addEventListener('keydown', function(e) {

            var values = rangeSlider.noUiSlider.get();
            var value = Number(values[handle]);

            // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
            var steps = rangeSlider.noUiSlider.steps();

            // [down, up]
            var step = steps[handle];

            var position;

            // 13 is enter,
            // 38 is key up,
            // 40 is key down.
            switch (e.which) {

                case 13:
                    rangeSlider.noUiSlider.setHandle(handle, this.value);
                    break;

                case 38:

                    // Get step to go increase slider value (up)
                    position = step[1];

                    // false = no step is set
                    if (position === false) {
                        position = 1;
                    }

                    // null = edge of slider
                    if (position !== null) {
                        rangeSlider.noUiSlider.setHandle(handle, value + position);
                    }

                    break;

                case 40:

                    position = step[0];

                    if (position === false) {
                        position = 1;
                    }

                    if (position !== null) {
                        rangeSlider.noUiSlider.setHandle(handle, value - position);
                    }

                    break;
            }
        });
    });
    // noUiSlider.create(rangeSlider, {
    //     start: [{{ $values['minValue'] ?? 0 }}, {{ $values['maxValue'] ?? 100 }}],
    //     connect: true,
    //     range: {
    //         'min': 0,
    //         'max': 100
    //     }
    // });

    // // Update input values when slider changes
    // rangeSlider.noUiSlider.on('update', function (values) {
    //     minInput.value = values[0];
    //     maxInput.value = values[1];
    // });

    // // Attach input event listeners for numeric input
    // minInput.addEventListener('input', function () {
    //     this.value = validateNumericInput(this.value);
    //     updateMaxValue();
    // });

    // maxInput.addEventListener('input', function () {
    //     this.value = validateNumericInput(this.value);
    // });

    // // Function to update max value if smaller than min value
    // function updateMaxValue() {
    //     var minValue = parseInt(minInput.value) || 0;
    //     var maxValue = parseInt(maxInput.value) || 0;

    //     // Ensure max value is always greater than min value
    //     if (maxValue <= minValue) {
    //         maxInput.value = minValue + 1;
    //     }

    //     // Ensure max value is within the range set for the slider
    //     if (maxValue > 100) {
    //         maxInput.value = 100;
    //     }
    // }
    // function updateMinValue() {
    //     var minValue = parseInt(minInput.value) || 0;
    //     var maxValue = parseInt(maxInput.value) || 0;

    //     // Ensure max value is always greater than min value
    //     if (maxValue <= minValue) {
    //         minValue.value = maxValue - 1;
    //     }

    //     // Ensure max value is within the range set for the slider
    //     if (minValue > 100) {
    //         minValue.value = 0;
    //     }
    // }

    // // Attach focusout event listeners to update max value
    // maxInput.addEventListener('focusout', updateMaxValue);
    // minInput.addEventListener('focusout', updateMinValue);

    // // Function to validate numeric input
    // function validateNumericInput(value) {
    //     return value.replace(/[^0-9]/g, '');
    // }
});

//Silder In MLS for Commission , Listing Agent Commission And Selling Agent Commission.. 
$(document).ready(function () {
    // Function that create a slider and manage its events...
    function createSlider(sliderElement, minInputElement, maxInputElement, searchDataMin, searchDataMax) {
        var inputs = [minInputElement, maxInputElement];

        noUiSlider.create(sliderElement, {
            start: [searchDataMin, searchDataMax],
            connect: true,
            range: {
                'min': 0,
                'max': 100
            },
            step: 1,
            format: wNumb({
                decimals: 0,
                suffix: '%'
            })
        });

        sliderElement.noUiSlider.on('update', function (values, handle) {
            inputs[handle].value = values[handle];
        });

        inputs.forEach(function (input, handle) {
            input.addEventListener('change', function () {
                sliderElement.noUiSlider.setHandle(handle, this.value);
            });

            input.addEventListener('keydown', function (e) {
                var values = sliderElement.noUiSlider.get();
                var value = Number(values[handle]);
                var steps = sliderElement.noUiSlider.steps();
                var step = steps[handle];
                var position;

                switch (e.which) {
                    case 13: // Enter key
                        sliderElement.noUiSlider.setHandle(handle, this.value);
                        break;
                    case 38: // Up arrow
                        position = step[1];
                        if (position === false) position = 1;
                        if (position !== null) sliderElement.noUiSlider.setHandle(handle, value + position);
                        break;
                    case 40: // Down arrow
                        position = step[0];
                        if (position === false) position = 1;
                        if (position !== null) sliderElement.noUiSlider.setHandle(handle, value - position);
                        break;
                }
            });
        });
    }
    //will create a slider for the following ..
    // Listing Agent Percentage Slider..
    createSlider(
        document.getElementById('list_agent_per'),
        document.getElementById('min_list_agent_per'),
        document.getElementById('max_list_agent_per'),
        {{ !empty($searchData['min_list_agent_per']) ? $searchData['min_list_agent_per'] : 0 }},
        {{ !empty($searchData['max_list_agent_per']) ? $searchData['max_list_agent_per'] : 100 }}
    );

    // Selling Agent Commission Slider..
    createSlider(
        document.getElementById('sell_agent_per'),
        document.getElementById('min_sell_agent_per'),
        document.getElementById('max_sell_agent_per'),
        {{ !empty($searchData['min_sell_agent_per']) ? $searchData['min_sell_agent_per'] : 0 }},
        {{ !empty($searchData['max_sell_agent_per']) ? $searchData['max_sell_agent_per'] : 100 }}
    );

    // Commission Percentage Slider..
    createSlider(
        document.getElementById('percentage'),
        document.getElementById('min_percentage'),
        document.getElementById('max_percentage'),
        {{ !empty($searchData['min_percentage']) ? $searchData['min_percentage'] : 0 }},
        {{ !empty($searchData['max_percentage']) ? $searchData['max_percentage'] : 100 }}
    );
});

</script>



<script>
    $(document).ready(function () {
        const dimensionTypeRadios = $('input[name="dimension_type"]');

        function updateSuffix(suffix) {
            // Specify the Ids of the range sliders..
            const rangeSliders = [
                'size', 
                'built', 
                'terrace', 
                'garden_plot', 
                'properties_int_floor_space'
            ];

            rangeSliders.forEach(function(sliderId) {
                const rangeSlider = document.getElementById(sliderId); 
                if (rangeSlider) {
                    const isSpecificSlider = (sliderId === 'properties_int_floor_space' || sliderId === 'garden_plot');
                    const currentSuffix = isSpecificSlider ? (suffix === ' m²' ? ' m' : ' ft') : suffix; 

                    rangeSlider.noUiSlider.updateOptions({
                        format: wNumb({
                            decimals: 0,
                            prefix: '',
                            suffix: currentSuffix 
                        })
                    });
                }
            });
        }

        dimensionTypeRadios.on('change', function () {
            const selectedValue = $(this).val();
            const newSuffix = selectedValue === 'Meter' ? ' m²' : ' ft²'; 
            updateSuffix(newSuffix); 
        });

        const initialSelectedValue = $('input[name="dimension_type"]:checked').val();
        const initialSuffix = initialSelectedValue === 'Meter' ? ' m²' : ' ft²';
        updateSuffix(initialSuffix);
    });
</script>