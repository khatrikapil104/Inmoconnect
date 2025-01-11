@extends('layouts.app')
@section('content')
@section('title')
    {{ trans('Customers') }} Inmoconnect
@endsection


<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <h3
                        class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">
                        {{ trans('messages.my-customers.Customers') }}
                    </h3>
                </div>
                @if (empty($pageType))
                <div class="header-right-button_one d-flex align-items-center gap-3">
                    <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                        data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                        <i class="icon-Add-Customer"></i>

                    </div>
                </div>
                @endif
            </div>
        </div>
        @if(auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer' )
        <ul class="tabs" style="margin-bottom:20px;">
            <li class="tab-link {{empty($pageType) ? 'current' : ''}} text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                 onclick="window.open('{{route(routeNamePrefix().'customers.index')}}','_self')">My Customers </li>
            <li class="tab-link {{($pageType == 'company') ? 'current' : ''}} text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                 onclick="window.open('{{route(routeNamePrefix().'customers.index',['pageType' => 'company'])}}','_self')">Company's Clientele</li>
            
        </ul>
        @endif
        <!-- <div id="tab-1" class="tab-content_one current">
            <div class="b-color-white box-shadow-one border-r-8  p-30 "> -->
                 @if ($results->isNotEmpty())
                                                                                                                                                                                                         
                    <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  p-30">
                        <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                            <div class="search_button">
                                <div class="form-group position-relative">
                                    <div class="input-group input-group-sm dashboard_input-search">
                                        <span
                                            class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                        <input type="text" name="table_search_input"
                                            class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                            placeholder="{{ trans('messages.agent-dashboard.search_here') }}" value="">
                                    </div>
                                </div>
                            </div>
                            @if(empty($pageType))
                            <button type="button"
                                onclick="window.open('{{ route(routeNamePrefix() . 'customers.exportCustomers') }}','_self')"
                                class="delete_project small-button border-r-8 text-14 font-weight-700 lineheight-18 d-flex align-items-center justify-content-center">
                                <i class=" icon-Export me-2 icon-20"></i>
                                {{ trans('messages.my-customer.Export') }}
                            </button>
                            @endif
                        </div>
                        <div class="table_customer-three pt-10">
                            <table id="example_one" class="display  dashboard_edit_one table-bottom-border"
                                style="width:100%; ">
                                <thead>
                                    @if($pageType == 'company')
                                    <tr>
                                        <th></th>
                                        <th>{{ trans('messages.my-customers.Customer_Name') }}</th>
                                        <th>{{ trans('messages.my-customers.Email') }}</th>
                                        <th>{{ trans('messages.my-customers.mobile_number') }}</th>
                                        <th>{{ trans('Added By') }}</th>
                                        <th>{{ trans('Add Date') }}</th>
                                        <th>{{ trans('City') }}</th>
                                        <th></th>
                                    </tr>
                                    
                                    @else
                                    <tr>
                                        <th></th>
                                        <th>{{ trans('messages.my-customers.Customer_Name') }}</th>
                                        <th>{{ trans('messages.my-customers.Email') }}</th>
                                        <th>{{ trans('messages.my-customers.mobile_number') }}</th>
                                        <th>{{ trans('messages.my-customers.Date_Added') }}</th>
                                        <th>{{ trans('messages.my-customers.Last_login') }}</th>
                                        <th>{{ trans('messages.my-customers.Status') }}</th>
                                        <th></th>
                                    </tr>
                                    @endif
                                    
                                </thead>
                                <tbody class="tableData">
                                    @include('components.tables.custom-table', ['results' => $results])
                                </tbody>

                            </table>
                        </div>
                    </div>
                @else
                    <div class="row CustomerListingData tableData">

                        @include('components.tables.empty-table')
                    </div>
                @endif

                <div class="paginationData mt-10">
                    <!-- Custom Pagination File -->
                    @include('components.tables.pagination')
                </div>
            <!-- </div>
        </div> -->
       

    </div>
</div>

<!-- /////////////////////////////////////////////Add-new customer-modal ///////////////////////////////////////////// -->
<div class="modal fade" id="dataFilterModal" tabindex="-1" aria-labelledby="dataFilterModalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
        <div class="modal-content border-r-8 border-0 b-color-white">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-b-blue w-100"
                    id="dataFilterModalLabel">
                    {{ trans('messages.my-customers.invite_customer') }}
                </h4>
                <button type="button" class="close b-color-transparent cursor-pointer end-0" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">
                        <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body modal-body modal-header_file">
                <form id="inviteCustomerForm" class="row">
                    @include('modules.customers.includes.create_edit_customer')
                </form>
                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                    <button type="button"
                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white inviteCustomerBtn ">
                        {{ trans('messages.my-customers.invite_customer') }}
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ///////////////////////////////////end-add-new -customer_modal ///////////////////////////////////////// -->

<!-- /////////////////////////////////////////////Edit customer-modal ///////////////////////////////////////////// -->
<div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModalLabel"
    style="display: none; z-index:1999" aria-hidden="true">
    <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
        <div class="modal-content border-r-8 border-0 b-color-white">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-b-blue w-100"
                    id="editCustomerModalLabel">
                    {{ trans('messages.my-customers.Edit_Invited_Customer') }}
                </h5>
                <button type="button" class="close b-color-transparent cursor-pointer end-0" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">
                        <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body modal-body modal-header_file">
                <form id="updateCustomerForm" class="row">

                </form>
                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                    <button type="button" data-id="" data-name=""
                        class="delete_project small-button border-r-8 text-14 font-weight-700 lineheight-18 d-flex align-items-center justify-content-center cancelInvitationBtn"
                        style="margin-right: 10px;">
                        {{ trans('messages.my-customers.Cancel_Invitation') }}
                    </button>
                    <button type="button" data-id=""
                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white updateCustomerBtn">
                        {{ trans('messages.my-customers.save') }}
                    </button>
                </div>


            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="customerDetailsModal" tabindex="-1" role="dialog" aria-labelledby="customer_detailsLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
        <div class="modal-content modal-content-file">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="customer_detailsLabel">Customer Details</h5>
                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>
            </div>
            <div class="modal-body modal-header_file">
                <form action="" id="view_customer_details"></form>
            </div>
        </div>
    </div>
</div>

<!-- ///////////////////////////////////end-Edit -customer_modal ///////////////////////////////////////// -->


@push('scripts')
    <script>
        var routeUrlInviteCustomer = "{{ route(routeNamePrefix() . 'customers.invite') }}";
        var routeUrlUpdateCustomer = "{{ route(routeNamePrefix() . 'customers.update', ':id') }}";
        var routeUrlLoadEditView = "{{ route(routeNamePrefix() . 'customers.loadEditView', ':id') }}";
        var routeUrlRemoveInvite = "{{ route(routeNamePrefix() . 'customers.destroy', ':id') }}";
        var routeUrlCancelInvite = "{{ route(routeNamePrefix() . 'customers.cancelInvite', ':id') }}";
        var areYouSureTextConfirmPopup = "{{ trans('messages.confirm_popup.Are_you_sure') }}";
        var cancelInvitationTextConfirmPopup = "{{ trans('messages.confirm_popup.Cancel_Invitation') }}";
        var cancelInviteConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_cancel_invite') }}";
    </script>
    <script src="{{ asset('assets/js/modules/customers/index.js') }}"></script>
@endpush
@endsection
