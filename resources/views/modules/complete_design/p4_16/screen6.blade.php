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
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_nine" role="document">
                        <div class="modal-content modal-content-file">

                            <div class="modal-body pt-0 pb-0 ps-2 pe-2 overflow-hidden">
                                <div class="row ">
                                    <div class="justify-content-center col-lg-4 modal-header_file modal-header_color d-flex">
                                        <div class="modal-reject-img d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('img/underview_modal.svg') }}" alt="agent image">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 modal-header_file ">
                                        <div class="modal-header border-0  p-0">
                                            <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                                id="customer_detailsLabel">
                                                <img src="{{ asset('img/login-logo.png') }}" alt="agent image" width="228"
                                                    height="32">
                                            </h4>
                                            <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true"> <i
                                                        class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal_checkbox-h pt-30 text-center">
                                            <h4 class="text-20 color-primary font-weight-700">Your Application is under Review!
                                            </h4>
                                            <h6 class="text-14 color-b-blue font-weight-400 pt-12">Team Inmoconnect is reviewing
                                                your application and will be getting in touch with you over your email regarding
                                                the status of your Developer's Account at our CRM Portal.</h6>
                                            <h6 class="text-14 color-b-blue font-weight-400 pt-20 mb-3">For any queries or
                                                concern, you can always reach out to us on</h6>
                                            <a href="#"
                                                class="text-16 font-weight-700 color-primary lineheight-20">business@inmoconnect.com</a>

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
