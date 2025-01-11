<input type="hidden" name="total_properties_count" value="{{ $totalResults ?? 0 }}">
@if (!empty($searchData))
    @php $propertyDataFilterFormat = getModalSpecificData('Property', 'PROPERTY_FILTER_DATA_FORMAT');  @endphp
    @foreach ($searchData as $dataKey => $dataVal)
        @if (!empty($propertyDataFilterFormat[$dataKey]['filter_name']) && !empty($dataVal))
            <div class="col-lg-6 pt-20">
                <div class="d-flex gap-1 align-items-start">
                    <h6
                        class="text-nowrap text-start text-14 color-primary font-weight-700 position-relative modal_save">
                        {{ $propertyDataFilterFormat[$dataKey]['filter_name'] }}:
                    </h6>
                    @php
                        $finalValue = [];
                        if ($dataKey == 'commission_percentage') {
                            foreach ($dataVal as $key => $percentage) {
                                $finalValue[] = $percentage;
                            }
                        } elseif ($dataKey == 'price_range') {
                            foreach ($dataVal as $key => $price_range) {
                                $finalValue[] = $price_range;
                            }
                        } 
                        elseif ($dataKey == 'net_price') {
                            foreach ($dataVal as $key => $net_price) {
                                $finalValue[] = $net_price;
                            }
                        } 
                        elseif ($dataKey == 'list_agent_commission') {
                            foreach ($dataVal as $key => $list_agent_commission) {
                                $finalValue[] = $list_agent_commission;
                            }
                        } 
                        elseif ($dataKey == 'selling_agent_commission') {
                            foreach ($dataVal as $key => $selling_agent_commission) {
                                $finalValue[] = $selling_agent_commission;
                            }
                        } 
                        elseif ($dataKey == 'total_size') {
                            foreach ($dataVal as $key => $total_size) {
                                $finalValue[] = $total_size;
                            }
                        } 
                        elseif ($dataKey == 'valuation') {
                            foreach ($dataVal as $key => $valuation) {
                                $finalValue[] = $valuation;
                            }
                        }
                        elseif ($dataKey == 'deed_value') {
                            foreach ($dataVal as $key => $deed_value) {
                                $finalValue[] = $deed_value;
                            }
                        }
                        elseif ($dataKey == 'minimum_price') {
                            foreach ($dataVal as $key => $minimum_price) {
                                $finalValue[] = $minimum_price;
                            }
                        }
                        elseif ($dataKey == 'community_fee') {
                            foreach ($dataVal as $key => $community_fee) {
                                $finalValue[] = $community_fee;
                            }
                        }
                        elseif ($dataKey == 'garbage_tax') {
                            foreach ($dataVal as $key => $garbage_tax) {
                                $finalValue[] = $garbage_tax;
                            }
                        }
                        elseif ($dataKey == 'ibi_fee') {
                            foreach ($dataVal as $key => $ibi_fee) {
                                $finalValue[] = $ibi_fee;
                            }
                        }
                        elseif ($dataKey == 'built_size') {
                            foreach ($dataVal as $key => $built_size) {
                                $finalValue[] = $built_size;
                            }
                        }
                        elseif ($dataKey == 'terrace') {
                            foreach ($dataVal as $key => $terrace) {
                                $finalValue[] = $terrace;
                            }
                        }
                        elseif ($dataKey == 'garden_plot') {
                            foreach ($dataVal as $key => $garden_plot) {
                                $finalValue[] = $garden_plot;
                            }
                        }
                        elseif ($dataKey == 'int_floor_space') {
                            foreach ($dataVal as $key => $int_floor_space) {
                                $finalValue[] = $int_floor_space;
                            }
                        }
                        elseif (is_array($dataVal)) {
                            foreach ($dataVal as $dataV) {
                                if (!empty($propertyDataFilterFormat[$dataKey]['reference_modal'])) {
                                    $className =
                                        'App\Models\\' . $propertyDataFilterFormat[$dataKey]['reference_modal'];
                                    $referenceColumnName = $propertyDataFilterFormat[$dataKey]['reference_column_name'];
                                    $finalValue[] = findSpecificRecordData(
                                        $className,
                                        ['id' => $dataV],
                                        $referenceColumnName,
                                    );
                                } else {
                                    $finalValue[] = $dataV;
                                }
                            }
                        } else {
                                    $finalValue[] = $dataVal;
                        }
                        $rangeKeys = ['commission_percentage', 'net_price', 'price_range','list_agent_commission','selling_agent_commission','total_size','valuation','deed_value','minimum_price','community_fee','garbage_tax','ibi_fee','built_size','terrace','garden_plot','int_floor_space'];
                        $bed_bath_keys = ['bedrooms', 'bathrooms','floors','storeys','no_of_properties_builtin','levels','ageny_ref'];
                        if (array_intersect($rangeKeys, $propertyDataFilterFormat[$dataKey])) {
                            $finalValue = implode(' - ', $finalValue);
                        } elseif (array_intersect($bed_bath_keys, $propertyDataFilterFormat[$dataKey])) {
                            $value = implode('', $finalValue);
                            $finalValue = '+' . $value;
                        } else {
                            $finalValue = implode(', ', $finalValue);
                        }
                    @endphp
                    <h6 class="text-start color-b-blue text-14 font-weight-400">{{ $finalValue ?? '' }}</h6>


                </div>
            </div>
        @endif
    @endforeach
    {{--
    <div class="col-lg-12 pt-20">
        <div class="d-flex gap-1 align-items-start">
            <h6
                class="text-nowrap text-start text-14 color-primary font-weight-700 position-relative modal_save">
                Property
                Status/Completion:</h6>
            <h6 class="text-start color-b-blue text-14 font-weight-400">Under Construction</h6>
        </div>
    </div>
    <div class="col-lg-12 pt-20">
        <div class="d-flex gap-1 align-items-start">
            <h6 class="text-14 color-primary font-weight-700 position-relative modal_save">Completion
                Year & Month:</h6>
            <h6 class="color-b-blue text-14 font-weight-400">03/2025</h6>
        </div>
    </div> --}}



@endif
