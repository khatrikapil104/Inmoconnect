@extends('layouts.app')
@section('content')
@section('title')
    Developments Inmoconnect
@endsection

<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                        Developments
                    </div>
                </div>
                <div class="header-left-team d-flex gap-3">
                    <button
                        class="b-color-transparent header-right-button border-r-8 opacity-5 border-blue  d-flex justify-content-center align-items-center px-3 py-2"
                        data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                        <i class=" icon-add_new_development text-20"></i><span class="d-none d-sm-block ms-2 text-14 font-weight-700">Add New
                            Development</span>
                    </button>
                </div>
                
            </div>
        </div>

       
        <div class="row developmentListingData tableData">

        @include('components.tables.custom-table',['results' =>$results ])
        </div>
        <div class="paginationData">
        <!-- Custom Pagination File -->
        @include('components.tables.pagination')
        </div>
            
    </div>
</div>

<!-- /////////////////////////////////////////////Add-new customer-modal ///////////////////////////////////////////// -->
<div class="modal fade" id="dataFilterModal" tabindex="-1" aria-labelledby="dataFilterModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
        <div class="modal-content border-r-8 border-0 b-color-white">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-b-blue w-100"
                    id="dataFilterModalLabel">
                    Add New Development
                </h4>
                <button type="button" class="close b-color-transparent cursor-pointer end-0" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">
                        <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body modal-body modal-header_file">
                <form id="addDevelopmentForm" class="row" type="post" enctype="multipart/form-data">
                    @include('modules.developments.includes.create_edit_development')
                </form>
                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                    <button type="button"
                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white addDevelopmentBtn ">
                        Add Development
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ///////////////////////////////////end-add-new -development_modal ///////////////////////////////////////// -->

<!-- /////////////////////////////////////////////Edit development-modal ///////////////////////////////////////////// -->
<div class="modal fade" id="editDevelopmentModal" tabindex="-1" aria-labelledby="editDevelopmentModalLabel"
    style="display: none; z-index:1999" aria-hidden="true">
    <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
        <div class="modal-content border-r-8 border-0 b-color-white">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-b-blue w-100"
                    id="editDevelopmentModalLabel">
                    Edit Development
                </h5>
                <button type="button" class="close b-color-transparent cursor-pointer end-0" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">
                        <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body modal-body modal-header_file">
                <form id="updateDevelopmentForm" class="row" type="post" enctype="multipart/form-data">

                </form>
                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                    
                    <button type="button" data-id=""
                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white updateDevelopmentBtn">
                        {{ trans('messages.my-customers.save') }}
                    </button>
                </div>


            </div>

        </div>
    </div>
</div>


<!-- ///////////////////////////////////end-Edit -development_modal ///////////////////////////////////////// -->


@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap&libraries=places" defer></script>
    <script>
        var routeUrlAddDevelopment = "{{ route(routeNamePrefix() . 'developments.store') }}";
        var routeUrlUpdateDevelopment = "{{ route(routeNamePrefix() . 'developments.update', ':id') }}";
        var routeUrlLoadEditView = "{{ route(routeNamePrefix() . 'developments.loadEditView', ':id') }}";
        var routeUrlRemoveInvite = "{{ route(routeNamePrefix() . 'developments.destroy', ':id') }}";
        var areYouSureTextConfirmPopup = "{{ trans('messages.confirm_popup.Are_you_sure') }}";
        var removeTextConfirmPopup = "{{ trans('messages.confirm_popup.Remove') }}";
        var developmentDeleteConfirmText = "{{ trans('You are attempting to remove Your Development') }}";
        var developmentDeleteUrl = "{{ route(routeNamePrefix() . 'developments.destroy', ':id') }}";
    </script>
    <script src="{{ asset('assets/js/modules/developments/index.js') }}"></script>
@endpush
@endsection
