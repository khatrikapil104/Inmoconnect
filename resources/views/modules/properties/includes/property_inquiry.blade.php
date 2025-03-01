@if (!empty($connectAgent))
<form action="" id="property_inquiery_form">
    <div class="modal fade" id="initiate_collaboration" tabindex="-1" role="dialog"
        aria-labelledby="initiate_collaborationLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_three " role="document">
            <div class="modal-content modal-content-file">
                <div class="modal-header border-0 modal-header_file pb-0">
                    <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="initiate_collaborationLabel">Contact Agent</h5>
                    <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                    </button>
                </div>
                <div class="modal-body modal-header_file">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                            <h6 class="text-14 font-weight-700 color-primary">Agent Details</h6>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details ">
                            <div class="row">
                                <div class="col-sm-6 col-md-3 col-lg-3">
                                    <div class="d-flex gap-12">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" width="40"
                                            height="40" alt="image" class="border-r-4">
                                        <div class="">
                                            <h6 class="text-14 font-weight-700 color-primary">Name:</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">
                                                @if (!empty($connectAgent->name))
                                                    {{ $connectAgent->name }}
                                                @endif
                                            </h6>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-6 col-md-3 col-lg-3 pt-3 pt-sm-0">
                                    <div class="modal-details-c">
                                        <h6 class="text-14 font-weight-700 color-primary">Mobile Number:</h6>
                                        <h6 class="text-14 font-weight-400 color-b-blue pt-1">
                                            @if (!empty($connectAgent->phone))
                                                {{ $connectAgent->name }}
                                            @endif
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 col-lg-3 pt-3 pt-md-0">
                                    <div class="modal-details-c">
                                        <h6 class="text-14 font-weight-700 color-primary">Email:</h6>
                                        <h6 class="text-14 font-weight-400 color-b-blue pt-1">
                                            @if (!empty($connectAgent->email))
                                                {{ $connectAgent->email }}
                                            @endif
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 col-lg-3 pt-3 pt-md-0">
                                    <div class="modal-details-c">
                                        <h6 class="text-14 font-weight-700 color-primary">City</h6>
                                        <h6 class="text-14 font-weight-400 color-b-blue pt-1">
                                            @if (!empty($connectAgent->city))
                                                {{ $connectAgent->city }}
                                            @endif
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (auth()->user()->role->name == 'agent')
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                                <h6 class="text-14 font-weight-700 color-primary">A Message From Primary Agent</h6>
                            </div>
                            <div class="col-md-12 common-label-css">
                                <div class="form-group crm-textarea-container position-relative mt-3">
                                    <textarea
                                        class="crm-textarea form-control form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue"
                                        name="m_primary_agent" id="m_primary_agent" rows="3">{{ $connectAgent->msg_to_collaborator_agents }}</textarea>
                                </div>
                            </div>
                        @endif
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center mt-30">
                            <h6 class="text-14 font-weight-700 color-primary">Please share your contact Details</h6>
                        </div>
                        <input type="hidden" class="d-none" name="property_id" id="property_id">
                        <input type="hidden" class="d-none"
                            value="@if (!empty($connectAgent->id)) {{ $connectAgent->id }} " @endif name="agent_id">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                            <div class="form-group mt-3 position-relative">
                                <label for="name" class="text-14 font-weight-400 lineheight-18  color-b-blue">Full
                                    Name:<span class="required">*</span>
                                </label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="name" id="name" value="{{ Auth::user()->name }}" placeholder="">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                            <div class="form-group mt-3 position-relative">
                                <label for="email"
                                    class="text-14 font-weight-400 lineheight-18  color-b-blue">Email:<span
                                        class="required">*</span>
                                </label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="email" id="email" value="{{ Auth::user()->email }}" placeholder="" readonly>
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                            <div class="form-group mt-3 position-relative">
                                <label for="phone" class="text-14 font-weight-400 lineheight-18  color-b-blue">Mobile
                                    Number:<span class="required">*</span>
                                </label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="phone" id="phone" value="{{ Auth::user()->phone }}" placeholder="">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                            <div class="form-group mt-3 position-relative">
                                <label for="city"
                                    class="text-14 font-weight-400 lineheight-18  color-b-blue">City:
                                    <span class="required">*</span>
                                </label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="city" id="city" value="{{ Auth::user()->city }}" placeholder="">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>
                        </div>
                        <div class="col-md-12 common-label-css">
                            <div class="form-group crm-textarea-container position-relative mt-3">
                                <label for="message"
                                    class="text-14 font-weight-400 lineheight-18 color-b-blue">Message:
                                </label>
                                <textarea
                                    class="crm-textarea form-control form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue"
                                    name="message" id="message" rows="3"></textarea>
                            </div>
                        </div>
                        @if (auth()->user()->role->name == 'agent')
                            <div class="col-md-12 d-flex gap-3 align-items-center mt-3 agent_terms_agree_id">
                                <input type="checkbox" id="checkbox_modal" name="agent_terms_agree">


                                <p class="text-14 color-b-blue font-weight-400">I agree with primary agent's message
                                    and
                                    give
                                    my consent to post this property at my portfolio.</p>
                            </div>
                            <div class="invalid-feedback fw-bold"></div>
                        @endif
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                            <div class="form-group position-relative">
                                <button type="button" id="send_or_initiate_btn"
                                    class=" small-button border-r-8 b-color-white text-14 font-weight-400 lineheight-18 color-primary border-primary"
                                    onclick="openMyModal2()">
                                    @if (auth()->user()->role->name == 'agent')
                                        Initiate Collaboration
                                    @else
                                        Send Inquiry
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</form>

<div class="modal " id="property_lead_sure" data-bs-backdrop="static" style="display: none;background: #00000040;"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_eight" role="document">
        <div class="modal-content  border-r-8 border-0 b-color-white p-30">
            <div class="modal-header border-0 justify-content-end p-0">
                <button type="button" class="close b-color-transparent cursor-pointer" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id="Union" fill-rule="evenodd" clip-rule="evenodd"
                                d="M8 10.0544L2.05438 16L0 13.9456L5.94561 8L6.64978e-06 2.05438L2.05439 0L8 5.94561L13.9456 0L16 2.05438L10.0544 8L16 13.9456L13.9456 16L8 10.0544Z"
                                fill="black" fill-opacity="0.5"></path>
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body p-0 text-center mt10">
                <div class="modal-body-text">
                    <i class="icon-success-icon modalIcons text60" height="60" width="60"
                        style="display:none;"></i>
                    <i class="icon-error-icon modalIcons text60" height="60" width="60"
                        style="display:none;"></i>
                    <i class="icon-warning-icon modalIcons text60" height="60" width="60"
                        style="display:none;"></i>
                    <i class="icon-error-icon1 modalIcons text60" height="60" width="60" style=""></i>
                    <div
                        class="text-18 lineheight-22 font-weight-700 letter-s-48 color-b-blue opacity-8 pt-30 modal-message">
                        You Are Sending Property Inquiry To {{ ucwords(strtolower($connectAgent->name)) }}.</div>
                    <div class="modal-confirm" style="">

                        <div
                            class="text-18 lineheight-22 font-weight-700 letter-s-48 color-primary pt-10 modal-confirm-message">
                            Are you sure?</div>
                        <div
                            class="text-12 font-weight-400 lineheight-15 opacity-5 color-black pt-20 modal-confirm-secondary-text ">
                            Property ID: <span id="property_reference_id"></span></div>
                        <div class="d-flex align-items-center justify-content-center gap-3 mt-10">
                            <button type="button"
                                class="gardient-button small-button border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white"
                                id="send_inquiry_btn" data-name="{{ $connectAgent->name }}">Yes</button>
                            <button type="button"
                                class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                data-bs-dismiss="modal">No</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endif
