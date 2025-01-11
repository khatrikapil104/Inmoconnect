@if ($results->isnotEmpty())
    @foreach ($results as $result)
        @if (
            $listingType != 'customer-listing' &&
                $listingType != 'beta-agent-listing' &&
                $listingType != 'newsletter-listing' &&
                $listingType != 'file-listing')
            <div class="main-card border-r-8 p-20 mb-20 b-color-white">
                <div class="main-card_flex d-flex align-center gap-4">

                    {{-- image --}}
                    <div class="main-card-left">
                        <div class="main-card-img main_card_image_one ">
                            <img src="{{ !empty($result->cover_image) ? $result->cover_image : asset('img/default-property.jpg') }}"
                                alt="image">
                        </div>
                    </div>
                    <div class="d-flex flex-column w-100">
                        <div class="row">

                            {{-- text --}}
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
                                            @if ($result->created_at > now()->subHours(48))
                                                <div class="form-group position-relative">
                                                    <button type="button"
                                                        class="Gradient_button add_property_button border-r-8 b-color-Gradient text-12 font-weight-400 color-white ">New
                                                        Property</button>
                                                </div>
                                            @endif
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
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    {{ $result->reference ?? '' }}</div>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 gap-md-3">
                                            @if (!empty($result->size))
                                                <div class="d-flex gap-2 align-items-center">
                                                    <span class=" icon-house_scale text-20  color-b-blue"></span>
                                                    <div
                                                        class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        {{ !empty($result->size) ? number_format($result->size, 2) : '0.00' }}
                                                        Sqft</div>
                                                </div>
                                            @endif
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-bed text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    2</div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-bathroom text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    2</div>
                                            </div>
                                            <div class="d-flex gap-2 align-items-center">
                                                <span class="icon-floor text-20  color-b-blue"></span>
                                                <div
                                                    class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                    2</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- buttons --}}
                            <div class="col-lg-3 mt-3 mt-lg-0">
                                <div
                                    class=" h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                    <button type="button"
                                        class="text-14 font-weight-400 lineheight-18 border-r-8 b-color-primary color-white-grey viewPropertyBtn text-nowrap"
                                        id="viewPropertyBtn">
                                        View Property
                                    </button>
                                    <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                        @if (!empty($result->saveProperty))
                                            @if ($result->saveProperty->user_id == $result->owner_id && $result->saveProperty->property_id == $result->id)
                                                <button type="button"
                                                    class="fa-solid fa-heart text-20 b-color-transparent color-b-blue add_property"
                                                    data-id="{{ $result->id }}">
                                                </button>
                                            @endif
                                        @else
                                            <button type="button"
                                                class="fa-regular fa-heart text-20 b-color-transparent color-b-blue add_property"
                                                data-id="{{ $result->id }}">
                                            </button>
                                        @endif


                                        <button type="button"
                                            class=" icon-Delete text-20 b-color-transparent color-b-blue"
                                            id="deleteBtn">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- bottom-text --}}
                        <div class="border_property-card  mt-3 pt-20">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center gap-12">
                                        <img src="{{ asset('img/real-inmo-sidebar.svg') }}" alt="image"
                                            class="width-36 height-36">
                                        <h6 class="text-14 font-weight-700 color-b-blue">Realinmo</h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex justify-content-end">
                                    <button type="button"
                                        class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                        data-toggle="modal" data-target="#initiate_collaboration">
                                        <i class=" icon-Export me-2 icon-20"></i>
                                        Initiate Collaboration</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @if ($listingType == 'customer-listing')
                <tr>
                    <td> <img src="{{ !empty($result->image) ? $result->image : asset('img/default-user.jpg') }}"
                            width="36" height="36" alt="image" class="border-r-4"></td>
                    <td><span class="ms-2">{{ $result->name ?? '-----' }}</span></td>
                    <td class="text-lowercase">{{ $result->email ?? '-----' }}</td>
                    <td>{{ $result->phone ?? '-----' }}</td>
                    <td>{{ date('d/m/Y', strtotime($result->created_at)) }}</td>
                    <td>{{ !empty($result->last_login) ? date('d/m/Y', strtotime($result->last_login)) : '-----' }}
                    </td>
                    <!--here -->
                    <td class="change_active"><span
                            class="{{ $result->status == 'active' ? 'span_active span_complate_one' : 'span_pending' }}">
                            {{ trans('messages.' . getModalSpecificData('CustomerInvite', 'STATUS', $result->status ?? '')) }}
                        </span></td>
                    <td>
                        @if ($result->status == 'active')
                            <button class="b-color-transparent removeCustomerInviteBtn" data-id="{{ $result->id }}"
                                data-name="{{ $result->name ?? '' }}"> <i
                                    class=" icon-Delete icon-18 color-b-blue "></i></button>
                        @else
                            <button class="b-color-transparent editCustomerInviteBtn" data-id="{{ $result->id }}"
                                data-name="{{ $result->name ?? '' }}"> <i
                                    class="  icon-edit icon-18 color-b-blue "></i></button>
                        @endif

                    </td>
                </tr>
            @elseif($listingType == 'beta-agent-listing')
                <tr>
                    <td> <span class="ms-2">{{ $result->name ?? '-----' }}</span></td>
                    <td>{{ $result->email ?? '-----' }}</td>
                    <td>{{ $result->phone ?? '-----' }}</td>
                    <td>{{ $result->company_name ?? '-----' }}</td>
                    <td>{{ $result->role ?? '-----' }}</td>
                    <td>{{ date('d/m/Y', strtotime($result->created_at)) }}</td>

                </tr>
            @elseif($listingType == 'newsletter-listing')
                <tr>

                    <td>{{ $result->email ?? '-----' }}</td>
                    <td>{{ date('d/m/Y', strtotime($result->created_at)) }}</td>

                </tr>
            @elseif($listingType == 'file-listing')
                @include('modules.files.includes.table_row')
            @endif
        @endif
    @endforeach
@else
    @if (
        $listingType != 'customer-listing' &&
            $listingType != 'beta-agent-listing' &&
            $listingType != 'newsletter-listing' &&
            $listingType != 'file-listing')
        @include('components.tables.empty-table')
    @else
        @if ($listingType == 'customer-listing')
            <tr>
                <td colspan="6" class="text-center">

                    <p>No customers found</p>
                </td>
            </tr>
        @elseif($listingType == 'beta-agent-listing')
            <tr>
                <td colspan="6" class="text-center">

                    <p>No beta agents found</p>
                </td>
            </tr>
        @elseif($listingType == 'newsletter-listing')
            <tr>
                <td colspan="2" class="text-center">

                    <p>No newsletters found</p>
                </td>
            </tr>
        @elseif($listingType == 'file-listing')
            <tr>
                <td colspan="5" class="text-center">

                    <p>{{ trans('messages.my-files.no_files_found') }}</p>
                </td>
            </tr>
        @endif
    @endif
@endif
@push('scripts')
    <script>
        var routeUrl = "{{ $listRouteUrl ?? '' }}";
        var sectionName = "{{ $model ?? '' }}";
        var resetFormRoute = "{{ route(routeNamePrefix() . 'miscellaneous.refreshFilterData') }}";
        var addAgentUrl = "{{ route(routeNamePrefix() . 'miscellaneous.sendRequestToAgent') }}";
        var propertyDeleteUrl = "{{ route(routeNamePrefix() . 'properties.destroy', ':id') }}";
        var propertyAddPropertyUrl = "{{ route(routeNamePrefix() . 'properties.add_property', ':id') }}";
        var userDeleteUrl = "{{ route(routeNamePrefix() . 'user.destroy', ':id') }}";
        var userDeleteConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_delete_User') }}";
        var propertyDeleteConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_delete_Your_Property') }}";
        var areYouSureTextConfirmPopup = "{{ trans('messages.confirm_popup.Are_you_sure') }}";
        var deleteTextConfirmPopup = "{{ trans('messages.confirm_popup.Delete') }}";
        var customerDeleteConfirmText1 =
            "{{ trans('messages.confirm_popup.You_are_attempting_to_remove_customer_text_1') }}";
        var customerDeleteConfirmText2 = "{{ trans('messages.confirm_popup.You_are_attempting_to_remove_customer_text_2') }}";
        var customerDeleteUrl = "{{ route(routeNamePrefix() . 'customers.destroy', ':id') }}";
        var removeTextConfirmPopup = "{{ trans('messages.confirm_popup.Remove') }}";
        var fileDeleteUrl = "{{ route(routeNamePrefix() . 'files.destroy', ':id') }}";
        var fileDeleteConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_delete_Your_File') }}";
        var filesDeleteConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_delete_Your_Files') }}";
    </script>
    <script src="{{ asset('assets/js/components/tables/custom-table.js') }}"></script>
@endpush
