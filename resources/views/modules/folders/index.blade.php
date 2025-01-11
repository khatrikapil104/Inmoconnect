@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.dashboard-sidebar.My_Files') }} Inmoconnect
        @endsection

        <div class="overlay" id="overlay"></div>
        <div id="page-content-wrapper" class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                {{-- breadcrumb  --}}
                <div class="empty-search-header">
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                                {{ trans('messages.dashboard-sidebar.My_Files') }}
                            </div>
                        </div>
                        <div class="header-left-team d-flex gap-3">
                            <button
                                class="header-right-button border-r-8 opacity-5 border-blue  d-flex justify-content-center align-items-center px-3 py-2"
                                data-bs-toggle="modal" data-bs-target="#create_new_folder">
                                <i class="icon-My_files_breadcrumb"></i></i><span class="ms-2">Create New Folder</span>
                            </button>
                        </div>
                    </div>

                </div>
                {{-- end-breadcrumb --}}
                <div class="p-20 b-color-white box-shadow-one border-r-8  ">
                    <div class="text-18 color-primary lineheight-22 font-weight-700 pb-3">
                        Storage Status
                    </div>
                    <div class="task-progress">
                        @include('modules.files.includes.storage_status')
                    </div>
                </div>
                {{-- end-my-file-progress --}}

                {{-- folder-search --}}
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20 load-folder">
                    <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                        <div class="search_button">
                            <div class="form-group position-relative">
                                <div class="input-group input-group-sm dashboard_input-search">

                                    <span
                                        class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                    <input type="text" name="table_search_input"
                                        class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                        placeholder="Search here..." value="">
                                </div>
                            </div>
                        </div>

                        <button
                            class="gradiant-hover w-150 h-42 b-color-transparent color-light-blue d-flex align-items-center justify-content-center border-r-8 border-light-blue deleteMultipleFolderBtn">
                            <i class=" icon-Delete me-2"></i>
                            Delete Folder
                        </button>
                    </div>
                    <div class="folder_height mt-20">
                        <div class="row new-foldata-data">
                            @include('modules.dashboard.includes.load-folder-data')
                        </div>
                    </div>
                </div>
                {{-- end-folder-search --}}


                {{-- Create New Folder-modal --}}
                <div class="modal fade add_folder_modal" id="create_new_folder" tabindex="-1" role="dialog"
                    aria-labelledby="create_new_folderLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_eight" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="create_new_folderLabel">Create New Folder</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <form action="" method="post" id="addFolder" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-n3">
                                            <div class="form-group mt-3 position-relative">
                                                <label for="reference"
                                                    class="text-14 font-weight-400 lineheight-18 color-b-blue">Folder
                                                    Name:<span class="required">*</span></label>
                                                <input type="text"
                                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                    name="name" id="name" value="" placeholder="Folder Name">
                                                <div class="invalid-feedback fw-bold"></div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                                            <div class="form-group position-relative">
                                                <button type="button"
                                                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white addFolderBtn">Create
                                                    New Folder</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-create-new-folder-modal --}}

                @push('scripts')

                    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
                    <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script> --}}
                    <script>
                        // $(document).ready(function() {
                            function myFunction(id) {
                                const dropdowns = document.querySelectorAll('[id^="table_dropdown_"]');
                                dropdowns.forEach(dropdown => {
                                    if (dropdown.id !== "table_dropdown_" + id) {
                                        dropdown.classList.remove("show");
                                        dropdown.classList.add("hide");
                                    }
                                });
                                const currentDropdown = document.getElementById("table_dropdown_" + id);

                                currentDropdown.classList.toggle("show");
                            }


                            window.onclick = function(event) {

                                if (!event.target.matches('.table_dropdown_one')) {

                                    var dropdowns = document.getElementsByClassName("table_dropdown-content");
                                    var i;
                                    for (i = 0; i < dropdowns.length; i++) {
                                        var openDropdown = dropdowns[i];
                                        if (openDropdown.classList.contains('show')) {
                                            openDropdown.classList.remove('show');
                                        }
                                    }
                                }
                            }

                            $(document).on('click', '.addFolderBtn', function(e) {
                                e.preventDefault();
                                $btnName = $(this).text();
                                $(this).prop('disabled', true);
                                $(this).html(
                                    '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
                                    $btnName);
                                const that = this;
                                var routeUrlAddFolder = "{{ route(routeNamePrefix() . 'folder.store') }}";
                                var formData = new FormData($('#addFolder')[0]);
                                const attributes = {
                                    hasButton: true,
                                    btnSelector: '.addFolderBtn',
                                    btnText: $btnName,
                                    handleSuccess: function() {
                                        toastr.success(datas.msg)
                                        $("#create_new_folder").modal('hide');
                                        $('td[name="name"]').val('');
                                        loadFolderData();
                                    }
                                };
                                const ajaxOptions = {
                                    url: routeUrlAddFolder,
                                    method: 'post',
                                    data: formData
                                };

                                makeAjaxRequest(ajaxOptions, attributes);

                            });

                            $(document).on('click', '.editFolderBtn', function(e) {
                                e.preventDefault();

                                var folderId = $(this).data('id');

                                console.log('editFolderBtn');

                                $btnName = $(this).text();
                                $(this).prop('disabled', true);
                                $(this).html(
                                    '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
                                    $btnName);
                                const that = this;
                                var routeUrlAddProject = "{{ route(routeNamePrefix() . 'folder.edit') }}";
                                var formData = new FormData($('#editFolder' + folderId)[0]);
                                const attributes = {
                                    hasButton: true,
                                    btnSelector: '.editFolderBtn',
                                    btnText: $btnName,
                                    handleSuccess: function() {
                                        toastr.success(datas.msg)
                                        $("#edit_new_folder" + folderId).modal('hide');
                                        loadFolderData();
                                    }
                                };
                                const ajaxOptions = {
                                    url: routeUrlAddProject,
                                    method: 'post',
                                    data: formData
                                };

                                makeAjaxRequest(ajaxOptions, attributes);

                            });
                            $(document).on("click", ".folderCheckbox", function(e) {
                                let selectedCheckboxesArr = [];
                                $(".folderCheckbox").each(function(index, element) {
                                    if ($(element).prop("checked")) {
                                        selectedCheckboxesArr.push($(element).data("id"));
                                    }
                                });
                                if (selectedCheckboxesArr.length > 0) {
                                    $(".deleteMultipleFolderBtn").addClass("gradiant-button");
                                } else {
                                    $(".deleteMultipleFolderBtn").removeClass("gradiant-button");
                                }
                            });
                            $(document).on("click", ".deleteFolderBtn", function(e) {
                                e.preventDefault();
                                var name = $(this).data("name");
                                var id = $(this).data("id");
                                var routeUrlDeleteFolder = "{{ route(routeNamePrefix() . 'folder.destroy', ':id') }}";
                                show_message3('You are attempting to delete '+name+'?', "confirm", {
                                    confirmMessage: 'Are you sure?',
                                    confirmBtnText: 'Delete',
                                    confirmSecondaryMessage: 'Delete' + " " + name,
                                    callback: function() {
                                        $.ajax({
                                            url: routeUrlDeleteFolder.replace(':id', id),
                                            type: 'get',
                                            success: function(response) {
                                                toastr.success(response.msg)
                                                loadFolderData();
                                            },
                                            error: function(xhr, status, error) {
                                                alert('Error deleting file: ' + error);
                                            }
                                        });
                                    },
                                });
                            });
                            $(document).on('click', '.deleteMultipleFolderBtn', function(e) {
                                e.preventDefault();
                                let selectedCheckboxesArr = [];
                                $('.folderCheckbox').each(function(index, element) {
                                    if ($(element).prop('checked')) {
                                        selectedCheckboxesArr.push($(element).data('id'));
                                    }
                                });
                                var routeUrlDeleteFolder = "{{ route(routeNamePrefix() . 'folder.destroy', ':id') }}";

                                if (selectedCheckboxesArr.length > 0) {
                                    var id = selectedCheckboxesArr.join(',');
                                    show_message3('You are attempting to delete Your Folder?', "confirm", {
                                        confirmMessage: 'Are you sure?',
                                        confirmBtnText: 'Delete',
                                        callback: function() {
                                            $.ajax({
                                                url: routeUrlDeleteFolder.replace(':id', id),
                                                type: 'get',
                                                success: function(response) {
                                                    toastr.success(response.msg)
                                                    loadFolderData();
                                                },
                                                error: function(xhr, status, error) {
                                                    alert('Error deleting file: ' + error);
                                                }
                                            });
                                        },
                                    });
                                }


                            });

                            function loadFolderData() {
                                let formData = new FormData();
                                formData.append(
                                    "table_search_input",
                                    $("input[name=table_search_input]").val() || ""
                                );
                                var url = "{{ route(routeNamePrefix() . 'folder.loadFolderData') }}";
                                const attributes = {
                                    hasButton: false,
                                    handleSuccess: function() {

                                        // $(".load-folder").find(".load-folder-data").empty();
                                        if (
                                            datas["folder"].current_page != 2 &&
                                            datas.folder['data'] != "" && datas.folder['data'] != null
                                        ) {

                                            console.log(datas["data"]);
                                            $(".load-folder").find(".load-folder-data").remove();
                                            $(".load-folder")
                                                .find(".new-foldata-data")
                                                .html(datas["data"]);
                                        } else {
                                            console.log(datas["data"]);

                                            $(".load-folder").find(".load-folder-data").html("");
                                            $(".load-folder")
                                                .find(".new-foldata-data")
                                                .html(datas["data"]);
                                        }
                                    },
                                    handleError: function() {
                                        $(".developer_table_data")
                                            .find(".developer_data_table")
                                            .removeClass("loader");
                                    },
                                    handleErrorMessages: function() {},
                                };
                                const ajaxOptions = {
                                    url: url,
                                    method: "post",
                                    data: formData,
                                };

                                makeAjaxRequest(ajaxOptions, attributes);
                            }
                            $(document).on("keyup", "input[name=table_search_input]", function() {

                                loadFolderData();
                            });
                        // });
                    </script>


                @endpush
            @endsection
