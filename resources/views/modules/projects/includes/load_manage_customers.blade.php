<div class="modal-body_select-agent">
    <div class="row importCustomersContainer">
        @if ($connectedCustomersData && $connectedCustomersData->isNotEmpty())
            @foreach ($connectedCustomersData as $customer)
                <div class="col-lg-6">
                    <input type="hidden" name="dataArr[]" value="{{ $customer->id }}">
                    <div class="modal-body_card">
                        <div class="modal-body_left gap-4">
                            <div class="modal_img">
                                <img src="{{ !empty($customer->image) ? $customer->image : asset('img/default-user.jpg') }}"
                                    alt="Default Image" class="border-r-8" height="78" width="78">
                            </div>
                        </div>
                        <div class="modal_body-left_text_one d-flex flex-column gap-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                    {{ $customer->name ?? '' }}</div>
                                <div class="d-flex gap-2 align-items-center  ">

                                    <i class=" icon-agent icon-18 color-b-blue"></i>
                                    <div class=" text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                                        {{ $customer->added_by_name ?? '' }}</div>

                                </div>
                            </div>
                            <div class="d-flex gap-2 align-items-center  ">
                                <i class=" icon-location icon-20"></i>
                                <div
                                    class="property-secondary_one text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                                    {{ $customer->address ?? '' }}</div>

                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="text-14 font-weight-400 lineheight-18 text-capitalize color-b-blue">
                                    {{trans('messages.project-cust.budget')}}
                                    <span
                                        class="font-weight-700 color-primary">{{ !empty($customer->max_price)
                                            ? config('Reading.default_currency') . ' ' . number_format($customer->max_price, 2)
                                            : config('Reading.default_currency') . ' 0.00' }}</span>
                                </div>
                                <button
                                    class="b-color-transparent text-14 font-weight-400 lineheight-18 text-capitalize color-primary text-decoration-underline removeCustomerFromManageCustomers">
                                    {{trans('messages.confirm_popup.Remove')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12 text-center">
                <p>{{trans('messages.no_customer_found')}}</p>
            </div>
        @endif

    </div>
</div>
@if ($connectedCustomersData && $connectedCustomersData->isNotEmpty())
    <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
        <button type="submit"
            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">
            {{trans('messages.dashboard.Save')}}
        </button>
    </div>
@endif
