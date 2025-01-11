@extends('layouts.app')
@section('content')
@section('title')
    {{ trans('messages.dashboard-sidebar.My_Files') }} Inmoconnect
@endsection


<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <h3
                        class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">
                        {{-- {{ trans('messages.dashboard-sidebar.My_Files') }} > kapil --}}
                        <x-forms.crm-breadcrumb
                        :fieldData="[['url' => route(routeNamePrefix().'folder.index'),'label' => trans('messages.dashboard-sidebar.My_Files')],['url' => '','label' => $folder->name ?? ''],]" />
                    </h3>
                </div>
                {{-- <div class="header-right-button_one d-flex align-items-center gap-3 header-input-file">
                    <div
                        class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center">
                        <input type="file" name="file-input" id="file-input" class="file-input__input"
                            onchange="handleFilesSelect(event)" multiple />
                        <label class="file-input__label" for="file-input">
                            <i class=" icon-My_files_breadcrumb "></i>

                        </label>
                    </div>
                </div> --}}
            </div>
        </div>

        <?php
        $totalStorageLimit = getFileSizeLimit();
        $totalStorageLimitInBytes = formatFileSizeFlexible($totalStorageLimit, 'KB', 'B');
        $progress = ($totalOccupiedStorage / $totalStorageLimitInBytes) * 100;
        
        ?>
        <!-- ///////////////////////////progessbar////////////////////////////////////////////// -->
        {{-- <div class="p-20 b-color-white box-shadow-one border-r-8  ">
            <div class="text-18 color-primary lineheight-22 font-weight-700 pb-3">
                {{ trans('messages.my-files.storage_status') }}
            </div>
            <div class="task-progress">
                <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">
                    {{ formatFileSize($totalOccupiedStorage) }}
                    <span
                        class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">{{ getFileSizeLimit(true) }}</span>
                </p>
                <progress class="progress progress1 " max="100" value="{{ $progress }}"></progress>
            </div>
        </div> --}}

        <!-- ///////////////////////////////end-progressbar/////////////////////////////////////// -->




        <!-- /////////////////////////////////table////////////////////////////////////////// -->

        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
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
                <div class="header-right-button_one d-flex align-items-center gap-3 header-input-file">
                    <div
                        class="border-primary color-primary height-40 rounded d-flex align-items-center">
                        <input type="file" name="file-input" id="file-input" class="file-input__input"
                            onchange="handleFilesSelect(event,{{$folder->id}})" 
                            multiple />
                        <label class="file-input__label d-flex align-items-center" for="file-input">
                            <span class="icon-upload-New-Files me-2"></span> Upload New Files

                        </label>
                    </div>
                    <button
                    class="gradiant-hover w-150 h-42 b-color-transparent color-light-blue d-flex align-items-center justify-content-center border-r-8 border-light-blue deleteFilesBtn">
                    <i class=" icon-Delete me-2"></i>
                    {{ trans('messages.my-files.delete_files') }}
                </button>
                </div>

                
            </div>
            <div class="table_dashboard">
                <table id="example" class="display dashboard_table my_file_table" style="width:100%; ">
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                <div class="d-flex">
                                    {{ trans('messages.my-files.file_name') }}
                                    <div class="ms-2 text-6 d-flex flex-column justify-content-center">
                                        <span class="icon-up_filter"></span>
                                        <span class="icon-down_filter"></span>
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="d-flex">
                                    {{ trans('messages.my-files.file_type') }}
                                    <div class="ms-2 text-6 d-flex flex-column justify-content-center">
                                        <span class="icon-up_filter"></span>
                                        <span class="icon-down_filter"></span>
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="d-flex">
                                    {{ trans('messages.my-files.file_size') }}
                                    <div class="ms-2 text-6 d-flex flex-column justify-content-center">
                                        <span class="icon-up_filter"></span>
                                        <span class="icon-down_filter"></span>
                                    </div>
                                </div>
                            </th>
                            <th>
                                <div class="d-flex">
                                    {{ trans('messages.my-files.date_uploaded') }}
                                    <div class="ms-2 text-6 d-flex flex-column justify-content-center">
                                        <span class="icon-up_filter"></span>
                                        <span class="icon-down_filter"></span>
                                    </div>
                                </div>
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="tableData">
                        @include('components.tables.custom-table', ['results' => $results])

                    </tbody>
                </table>
            </div>
        </div>
        <!-- //////////////////////////////////end-table////////////////////////////////////// -->

        <div class="paginationData mt-10">
            <!-- Custom Pagination File -->
            @include('components.tables.pagination')
        </div>

    </div>
</div>

{{-- @dd($folder->id) --}}

@push('scripts')
<script>
    var folderId = "{{ $folder->id ?? 'default_value' }}";
    var routeUrlStoreFiles = "{{ route(routeNamePrefix() . 'files.store',':id') }}";
    var routeStoreFiles = routeUrlStoreFiles.replace(":id", folderId);
    var routeUrlRemoveFile = "{{ route(routeNamePrefix() . 'files.destroy', ':id') }}";
    var areYouSureTextConfirmPopup = "{{ trans('messages.confirm_popup.Are_you_sure') }}";
    var removeFileTextConfirmPopup = "{{ trans('messages.confirm_popup.Remove_File') }}";
    var removeFileConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_remove_file') }}";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
    <script src="{{ asset('assets/js/modules/files/index.js') }}"></script>
    
@endpush
@endsection
