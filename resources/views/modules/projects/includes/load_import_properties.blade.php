@if ($agent_properties && $agent_properties->isNotEmpty())
    <div class="mb-15 modal-body-selectall d-flex justify-content-between">
        <span
            class="modal-select_order d-flex align-items-center text-14 font-weight-700 lineheight-18 text-capitalize color-black "><input
                type="checkbox" id="vehicle1" name="vehicle1" value="Bike"
                class="me-3 selectAllManagePropertyCheckbox">
               {{trans('messages.project-property.select_all_property')}}
        </span>
        <h6 class="text-14 font-weight-400 lineheight-18 color-light-grey-five">
            {{trans('messages.project-property.no_of_property_selected')}} 
            <span class="selectedManagePropertiesCount">{{ count($project_properties) ?? 0 }}</span>/<span
                class="color-b-blue font-weight-700 totalManagePropertiesCount">{{ $agent_properties->count() }}</span>
        </h6>
    </div>
@endif
<div class="modal-body_select-agent  ">
    <div class="row importPropertiesContainer">
        @if ($agent_properties && $agent_properties->isNotEmpty())
            @foreach ($agent_properties as $property)
                <div class="col-lg-12">
                    <div class="modal-body_card">
                        <input type="checkbox" class="managePropertyCheckbox" name="dataArr[]"
                            value="{{ $property->id }}"
                            {{ in_array($property->id, $project_properties) ? 'checked' : '' }}>
                        <div class="modal-body_left gap-4">
                            <div class="modal_img">
                                <img src="{{ !empty($property->cover_image) ? $property->cover_image : asset('img/default-property.jpg') }}"
                                    alt="image" class="border-r-8" height="142" width="250">
                            </div>
                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">

                                <div
                                    class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue letter-s-36 property-h-responsive">
                                    {{ $property->name ?? '' }}</div>
                                <div class="d-flex gap-2 align-items-center  ">
                                    <i class=" icon-location icon-20 color-b-blue"></i>
                                    <div class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                        {{ $property->address ?? '' }}</div>
                                </div>
                                <div
                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="  icon-my_profile icon-20 color-b-blue"></i>
                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                            {{ $property->agent_name ?? '' }}</div>
                                    </div>

                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="icon-bed icon-20 color-b-blue"></i>
                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                            {{ $property->bedrooms ?? '' }}</div>
                                    </div>
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="icon-bathroom icon-20 color-b-blue"></i>
                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                            {{ $property->bathrooms ?? '' }}</div>
                                    </div>
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="icon-floor icon-20 color-b-blue"></i>
                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                            {{ $property->floors ?? '' }}</div>
                                    </div>

                                </div>
                                <div
                                    class="main-card-center-two  d-flex d-inline-flex  gap-1 gap-sm-2 align-items-center w36 flex-wrap">
                                    @if (!empty($property->plot_size) || !empty($property->size))
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="icon-house_scale icon-20 color-b-blue"></i>
                                            
                                            <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                                {{ !empty($property->plot_size) ? number_format($property->plot_size, 2) : number_format($property->size, 2) }}
                                                {{ $property->dimension_type === 'Feet' ? 'ft' : 'm' }}<sup>2</sup>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="icon-house_id icon-20 color-b-blue"></i>
                                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                            {{ $property->reference ?? '' }}</div>
                                    </div>
                                </div>
                                <div class="prize-title ">
                                    <div class=" text-14 font-weight-700 lineheight-18 color-primary">
                                        {{ !empty($property->price)
                                            ? config('Reading.default_currency') . ' ' . number_format($property->price, 2)
                                            : config('Reading.default_currency') . ' 0.00' }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12 text-center">
                <p>{{trans('messages.project-property.no_property_found')}}</p>
            </div>
        @endif
    </div>
</div>
@if ($agent_properties && $agent_properties->isNotEmpty())
    <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
        <button type="submit"
            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">
            {{trans('messages.project-property.import')}}
        </button>
    </div>
@endif
