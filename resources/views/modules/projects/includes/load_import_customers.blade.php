@if ($connectedCustomersData && $connectedCustomersData->isNotEmpty())
    <div class="mb-15 modal-body-selectall d-flex justify-content-between">
        <span class="d-flex align-items-center text-14 font-weight-700 lineheight-18 text-capitalize color-black"><input
                type="checkbox" id="vehicle1" name="vehicle1" value="Bike"
                class="me-3 selectAllManageCustomerCheckbox">
                {{trans('messages.project-cust.Select_All_Customers')}}
            </span>
        <h6 class="text-14 font-weight-400 lineheight-18 color-light-grey-five">
            {{trans('messages.project-cust.Number_of_Selected_Customers')}}
            <span
                class="selectedManageCustomersCount">{{ count($project_customers) ?? 0 }}</span>/<span
                class="color-b-blue font-weight-700 totalManageCustomersCount">{{ $connectedCustomersData->count() }}</span>
        </h6>
    </div>
@endif
<div class="modal-body_select-agent">
    <div class="row importCustomersContainer">
        @if ($connectedCustomersData && $connectedCustomersData->isNotEmpty())
            @foreach ($connectedCustomersData as $customer)
                <div class="col-lg-6">
                    <div class="modal-body_card">
                        <input type="checkbox" name="dataArr[]" value="{{ $customer->id }}"
                            class="manageCustomerCheckbox"
                            {{ in_array($customer->id, $project_customers) ? 'checked' : '' }}>
                        <div class="modal-body_left gap-4">
                            <div class="modal_img">
                                <img src="{{ !empty($customer->image) ? $customer->image : asset('img/default-user.jpg') }}"
                                    alt="Default Image" class="border-r-8" height="78" width="78">
                            </div>
                            <div class="modal_body-left_text d-flex flex-column gap-2 flex-1">

                                <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                    {{ $customer->name ?? '' }}</div>
                                <div class="d-flex gap-2 align-items-center  ">
                                    <i class=" icon-location icon-20"></i>
                                    <div
                                        class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                        {{ $customer->address ?? '' }}</div>

                                </div>
                                <div class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                    {{trans('messages.project-cust.budget')}}
                                    <span
                                        class="font-weight-700 color-primary">{{ !empty($customer->max_price)
                                            ? config('Reading.default_currency') . ' ' . number_format($customer->max_price, 2)
                                            : config('Reading.default_currency') . ' 0.00' }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12 text-center">
                <p>
                    {{ trans('messages.no_customer_found') }}
                </p>
            </div>
        @endif

    </div>
</div>
@if ($connectedCustomersData && $connectedCustomersData->isNotEmpty())
    <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
        <button type="submit"
            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">
            {{trans('messages.project-property.import')}}
        </button>
    </div>
@endif
