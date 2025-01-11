@if ($results->isnotEmpty())
   @foreach($results as $result)
        <div class="main-card border-r-8 p-20  b-color-white w-100 mb-20">
            <div class="main-card_flex d-block d-sm-flex align-center gap-2 gap-sm-4">
                <div class="main-card-left">
                    <div class="main-card-img">
                        <img src="{{ !empty($result->cover_image) ? $result->cover_image : asset('img/default-property.jpg') }}" alt="{{ $result->name }}">
                    </div>
                </div>
                <div class="d-flex flex-column w-100">
                    <div class="row">
                        <div class="col-lg-9">
                            <div
                                class="gap-12 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <div
                                            class="property-price text-20 font-weight-700 lineheight-24 color-primary">
                                            {{ !empty($result->price)
                                            ? config('Reading.default_currency') . ' ' . number_format($result->price, 2)
                                            : config('Reading.default_currency') . ' 0.00' }}
                                        </div>
                                    </div>
                                    <div class="main-card-bottom">
                                        <div
                                            class="property-title property-h-responsive text-16 font-weight-700 lineheight-20 text-capitalize color-primary">
                                            {{ $result->name ?? '' }}
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2 align-items-start ">
                                        <i class=" icon-location text-20 color-b-blue"></i>
                                        <div
                                            class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                            {{ $result->address ?? '' }}</div>

                                    </div>
                                    <div class="d-flex gap-2 gap-md-3">
                                        <div class="d-flex gap-2 align-items-start">
                                            <i class="icon-my_profile text-20  color-b-blue "></i>
                                            <div
                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                {{ $result->agent_name ?? '' }}</div>
                                        </div>
                                        <div class="d-flex gap-2 align-items-start">
                                            <i class="icon-my_profile text-20  color-b-blue "></i>
                                            <div
                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                --</div>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class=" icon-house_id  text-20  color-b-blue"></span>
                                            <div
                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                {{ !empty($result->plot_size) ? number_format($result->plot_size, 2) : '0.00' }}
                                                                {{ $result->dimension_type ? 'm' : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2 gap-md-3">
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class=" icon-house_scale text-20  color-b-blue"></span>
                                            <div
                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                {{ !empty($result->size) ? number_format($result->size, 2) : '0.00' }}
                                                                    {{ $result->dimension_type === 'Feet' ? 'ft' : 'm' }}
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="icon-bed text-20  color-b-blue"></span>
                                            <div
                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                {{ $result->bedrooms ?? '' }}</div>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="icon-bathroom text-20  color-b-blue"></span>
                                            <div
                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                {{ $result->bathrooms ?? '' }}</div>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="icon-floor text-20  color-b-blue"></span>
                                            <div
                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                {{ $result->floors ?? '' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- buttons --}}
                        <div class="col-lg-3 mt-3 mt-lg-0">
                            <div
                                class=" h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                <button type="button" onclick="window.open('{{route(routeNamePrefix().'properties.show',$result->reference)}}','_self')"
                                    class="text-14 font-weight-400 lineheight-18 border-r-8 b-color-primary color-white-grey viewPropertyBtn"
                                    id="viewPropertyBtn">
                                    View Property
                                </button>
                                <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                    <button type="button"
                                        class=" icon-share text-20 b-color-transparent color-b-blue"
                                        id="deleteBtn">
                                    </button>
                                    <button type="button"
                                        class=" icon-edit text-20 b-color-transparent color-b-blue"
                                        id="deleteBtn" onclick="window.open('{{route(routeNamePrefix().'properties.edit',$result->reference)}}','_self')">
                                    </button>
                                    <button type="button" class=" icon-Delete text-20 b-color-transparent color-b-blue deletePropertyBtn" data-id="{{$result->id}}" data-name="{{$result->reference}}"  id="deleteBtn">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- bottom-text --}}
                    <div class="border_property-card  mt-3 pt-20">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center gap-12">
                                    <img src="{{ asset('img/real-inmo-sidebar.svg') }}" alt="image"
                                        class="">
                                    <h6 class="text-14 font-weight-700 color-b-blue">Realinmo</h6>
                                </div>
                            </div>
                            <!-- <div class="col-lg-6">
                                <div class="d-flex justify-content-end align-items-center gap-3">
                                    <button type="button"
                                        class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                        data-toggle="modal" data-target="#book_appointment">
                                        <i class="icon-my_calender me-2 icon-20"></i>
                                        Book Appointment</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="b-color-white box-shadow-one border-r-8  p-20 mt-20">
        <div class="d-block justify-content-between align-items-center text-center flex-wrap gap-2">
            <h6 class="p-10">No results found</h6>
        </div>
    </div>
@endif
@push('scripts')
    <script src="{{ asset('assets/js/components/tables/custom-table.js') }}"></script>
@endpush
