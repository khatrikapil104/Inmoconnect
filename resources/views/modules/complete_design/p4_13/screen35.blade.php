@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.dashboard.Edit_Profile') }} Inmoconnect
        @endsection

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


                <button type="button"
                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                    data-toggle="modal" data-target="#customer_details">
                    <i class=" icon-Export me-2 icon-20"></i>
                    Connect Agent</button>


                {{-- modal-subagent --}}
                <div class="modal fade" id="customer_details" tabindex="-1" role="dialog"
                    aria-labelledby="customer_detailsLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_seven" role="document">
                        <div class="modal-content modal-content-file">

                            <div class="modal-body pt-0 pb-0 ps-2 pe-2 overflow-hidden">
                                <div class="row ">
                                    <div class="col-lg-4 modal-header_file modal-header_color d-flex">
                                        <div class="modal-reject-img d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('img/inmoconnect_reject-modal.svg') }}" alt="agent image">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 modal-header_file ">
                                        <div class="modal-header border-0  p-0">
                                            <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                id="customer_detailsLabel">
                                                <img src="{{ asset('img/login-logo.png') }}" alt="agent image" width='227'>
                                            </h5>
                                            <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true"> <i
                                                        class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal_checkbox-h pt-30">
                                            <h6 class="text-16 font-weight-700 color-primary lineheight-20 ">Please mention the
                                                reason for this action?</h6>
                                            <label class="customcb mt-3">Proposed commission price is to High.
                                                <input type="checkbox" name="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="customcb mt-3">Property is sold out just recently.
                                                <input type="checkbox" name="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="customcb mt-3">Not available for a viewing on selected date.
                                                <input type="checkbox" name="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="customcb mt-3">Have a better offer than proposed one.
                                                <input type="checkbox" name="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="customcb mt-3">Other
                                                <input type="checkbox" name="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                            <textarea
                                                class="crm-textarea form-control form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue mt-3"
                                                name="modal_msg" id="modal_msg" rows="3"></textarea>

                                            <div class="d-flex align-items-center justify-content-end mt-30">
                                                <button type="button"
                                                    class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 small-button gardient-button searchFilterBtn"
                                                    id="searchFilterBtn">
                                                    Reject
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @push('scripts')

            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>

        @endpush
    @endsection
