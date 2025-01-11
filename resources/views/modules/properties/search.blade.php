@extends('layouts.app')
@section('content')
    @push('styles')

        {{-- title --}}
        @section('title')
            Property Search Inmoconnect
        @endsection

        {{-- main-content --}}
        <div class="overlay" id="overlay"></div>
        <div id="page-content-wrapper" class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                {{-- breadcrumb  --}}
                <div class="empty-search-header">
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                                Property Search
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-breadcrumb --}}


                <div class="b-color-white box-shadow-one border-r-8  p-30">

                    {{-- tabs --}}
                    <ul class="tabs search_tabs">
                        @if ($types->isNotEmpty())
                            @php $firstTypeId = 0; @endphp
                            @foreach ($types as $typeKey => $type)
                                @if ($typeKey == 0)
                                    @php $firstTypeId = $type->id; @endphp
                                @endif
                                <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black propertyTypeTab {{ $typeKey == 0 ? 'current' : '' }}"
                                    data-tab="tab-{{ $typeKey + 1 }}" data-id="{{ $type->id }}">{{ $type->name }} </li>
                            @endforeach
                        @endif


                    </ul>
                    {{-- end-tabs --}}

                    <form id="propertySearchForm" action="{{ route(routeNamePrefix() . 'properties.advance_search.index') }}"
                        method="POST">
                        @csrf
                        <input type="hidden" name="type_id[]" value="{{ $firstTypeId }}">

                        <div class="row">
                            <div class="col-lg-6">
                                {{-- State/Province --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-single-select-ajax-based :fieldData="[
                                        'name' => 'state_name',
                                        'hasLabel' => true,
                                        'label' => 'State/Province:',
                                        'id' => 'state_name',
                                        'minimumResultsForSearch' => 1,
                                        'ajaxUrl' => route('user.getStates'),
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => 'State',
                                        'isRequired' => true,
                                    ]" />

                                </div>

                                {{-- City --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-single-select-ajax-based :fieldData="[
                                        'name' => 'city_name',
                                        'hasLabel' => true,
                                        'label' => 'City:',
                                        'id' => 'select_city',
                                        'minimumResultsForSearch' => 1,
                                        {{-- 'ajaxUrl' => route('user.getcities'),  --}}
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => 'City',
                                        {{-- 'isRequired' => true  --}}
                                    ]" />
                                </div>

                                {{-- search-button --}}
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-start  pt-30 mb-30">
                                    <div class="form-group position-relative" style="z-index:0;">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white propertySearchBtn">Search</button>
                                    </div>
                                </div>
                            </div>

                            {{-- tabs-img --}}
                            <div class="col-lg-6">
                                <div id="tab-1" class="tab-content_one current">
                                    <div class="image_property-tab">
                                        <img src="{{ asset('img/Apartment.svg') }}" alt="image">
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-content_one">
                                    <div class="image_property-tab">
                                        <img src="{{ asset('img/House.svg') }}" alt="image">
                                    </div>
                                </div>
                                <div id="tab-3" class="tab-content_one">
                                    <div class="image_property-tab">
                                        <img src="{{ asset('img/Plot.svg') }}" alt="image">
                                    </div>
                                </div>
                                <div id="tab-4" class="tab-content_one">
                                    <div class="image_property-tab">
                                        <img src="{{ asset('img/Commercial.svg') }}" alt="image">
                                    </div>
                                </div>
                                <div id="tab-5" class="tab-content_one">
                                    <div class="image_property-tab">
                                        <img src="{{ asset('img/Countryhouse.svg') }}" alt="image">
                                    </div>
                                </div>
                                <div id="tab-6" class="tab-content_one">
                                    <div class="image_property-tab">
                                        <img src="{{ asset('img/Duplex.svg') }}" alt="image">
                                    </div>
                                </div>
                                <div id="tab-7" class="tab-content_one">
                                    <div class="image_property-tab">
                                        <img src="{{ asset('img/Penthouse.svg') }}" alt="image">
                                    </div>
                                </div>
                                <div id="tab-8" class="tab-content_one">
                                    <div class="image_property-tab">
                                        <img src="{{ asset('img/Townhouse.svg') }}" alt="image">
                                    </div>
                                </div>
                                <div id="tab-9" class="tab-content_one">
                                    <div class="image_property-tab">
                                        <img src="{{ asset('img/Villas.svg') }}" alt="image">
                                    </div>
                                </div>
                                <div id="tab-10" class="tab-content_one">
                                    <div class="image_property-tab">
                                        <img src="{{ asset('img/New_Development.svg') }}" alt="image">
                                    </div>
                                </div>
                            </div>
                            {{-- end-tabs-img --}}
                        </div>
                    </form>
                    {{-- House --}}

                    {{-- Saved buttons --}}
                    <div class="border_tab-search">
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-start align-items-center pt-30">
                            <div class="form-group position-relative gap-12 d-flex align-items-center flex-wrap">
                                <a href="{{ route(routeNamePrefix() . 'properties.save_search_data') . '?tab=search' }}"
                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center">
                                    <i class=" icon-saved_items me-2 icon-20"></i>
                                    Saved Search</a>
                                <a href="{{ route(routeNamePrefix() . 'properties.save_search_data') . '?tab=properties' }}"
                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center">
                                    <i class=" icon-saved_propertis me-2 icon-20"></i>
                                    Saved Properties</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @push('scripts')

            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>
            <script>
                $('.propertyTypeTab').click(function() {
                    $('input[name="type_id[]"]').val($(this).data('id'));
                });

                $('.propertySearchBtn').on('click', function(e) {
                    e.preventDefault();
                    $btnName = $(this).text();
                    $(this).prop('disabled', true);
                    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
                        $btnName);
                    const that = this;

                    var formData = new FormData($('#propertySearchForm')[0]);

                    const attributes = {
                        hasButton: true,
                        btnSelector: '.propertySearchBtn',
                        btnText: $btnName,
                        handleSuccess: function() {
                            $('#propertySearchForm')[0].submit();
                        }
                    };
                    const ajaxOptions = {
                        url: "{{ route(routeNamePrefix() . 'properties.submitPropertySearch') }}",
                        method: 'post',
                        data: formData
                    };

                    makeAjaxRequest(ajaxOptions, attributes);
                });
            </script>

 <script>
    $(document).ready(function() {
        $('#state_name').change(function() {
            var selectedState = $(this).val();
           console.log(selectedState);


            $.ajax({
                url: '{{ route("user.getcities") }}',
                type: 'GET',
                data: {
                    state_id: selectedState,
             },

            success: function(data) {

                var citySelect = $('#select_city');

                citySelect.empty(); // Clear previous options

                 // Add default option
                citySelect.append('<option value="">Select City</option>');

                 // Populate dropdown with new options
                $.each(data.results, function(index, city) {

                citySelect.append('<option value="' + city.id + '">' + city.text + '</option>');
            });

        // Handle pagination if needed
        if (data.pagination.more) {
            // Implement logic for loading more cities (e.g., show "Load More" button or infinite scroll)
        }
        },
        error: function(xhr) {
        console.log('Error:', xhr.responseText); // Debugging
        }
    });


        });
    });
 </script>




        @endpush
    @endsection
