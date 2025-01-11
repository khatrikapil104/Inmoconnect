<div class="modal fade" id="uploadDocumentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_two" role="document">
        <div class="modal-content modal-content-file">
            <div class="modal-header border-0 modal-header_file pb-0">
                <a class ="gobackbtn d-none">
                    < Go Back </a>
                        <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="dataFilterModalLabel" style="width: 60%">Upload New File</h4>
                        <button type="button" id="fileFolderModalClose" class="close b-color-transparent"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
            </div>
            <div class="modal-body modal-header_file">
                <div class="modal_body_text">


                    <div class="d-flex custom_width-modal-folder gap-3">
                        @if (isset($attachments) & !empty($attachments))
                            @foreach ($attachments as $atachment)
                                <div class="custom_modal-box">
                                    <div class="d-flex align-items-center gap-30">
                                        <div class="d-flex align-items-center gap-2">
                                            {{-- <i class=" icon-property_search text-24 color-primary"></i> --}}
                                            <img src="{{ asset('img/certificate.svg') }}" alt="" height="35px"
                                                width="35px">
                                            <div class="d-flex flex-column">
                                                <h6
                                                    class="title_wrap title_dashboard-wrap text-14 color-primary font-weight-400">
                                                    <span>{{ $atachment->file_original_name }}</span>
                                                </h6>
                                                <a href="#"
                                                    class="color-primary text-10 text-decoration-underline pt-1">{{ $atachment->projectAttachment->userFolder->name }}</a>
                                            </div>

                                        </div>
                                        <button type="button" class="b-color-transparent"><i
                                                class=" icon-cross text-10 color-primary "></i></button>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>



                    <form action="" method="post" enctype="multipart/form-data" id="uploadDocumentModalForm">
                        <div class="row folders-row">
                            <span id="folder_id"></span>
                            @include('modules.dashboard.includes.project-load-folder')
                        </div>
                    </form>
                </div>
                <div class="pt-30 modal-body_footer d-flex justify-content-between align-items-center">
                    <form method="post" enctype="multipart/form-data" class="form_file d-none">

                        <label for="apply"> <input type="file" name="file-input" id="apply"
                                accept="image/*,.pdf" class="handleUploadDocumentsFile" multiple>
                            {{ trans('messages.uploads.upload_from_Browser') }}
                        </label>
                    </form>
                    <button type="button" id="create_new_folder_btn"
                        class="delete_project small-button border-r-8  text-14 font-weight-400 lineheight-18 "
                        onclick="openMyModal2()">Create
                        New Folder</button>
                    <button type="button" class="small-button border-r-8 text-14 font-weight-400 lineheight-18 color-white uploadDcoumentsModalSubmitBtn">
                        Import</button>
                        


                </div>
            </div>
        </div>
    </div>
</div>
{{-- Create New Folder-modal --}}
<div class="modal fade" id="create_new_folder" tabindex="-1" style="display: none;background: #00000040;"
    role="dialog" aria-labelledby="create_new_folderLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_eight" role="document">
        <div class="modal-content modal-content-file">
            <div class="modal-header border-0 modal-header_file pb-0">
                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                    id="create_new_folderLabel">Create New Folder</h5>
                <button type="button" class="close b-color-transparent cursor-pointer" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                </button>
            </div>
            <div class="modal-body modal-header_file">
                <div class="row">
                    <form action="" method="post" id="addFolder" enctype="multipart/form-data">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-n3">
                            <div class="form-group mt-3 position-relative">
                                <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Folder
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
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- end-create-new-folder-modal --}}

<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
<script>
    var getFiles = "{{ route(routeNamePrefix() . 'get.files', ':id') }}";

    var routeUrlStoreFiles = "{{ route(routeNamePrefix() . 'files.store', ':id') }}";
    var routeUrlFilesData = "{{ route(routeNamePrefix() . 'files.data', ':id') }}";

    function openMyModal2() {
        let myModal = new
        bootstrap.Modal(document.getElementById('create_new_folder'), {});
        myModal.show();
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
                $('.folders-row').html(datas['project_load_folder']);

                // $(".load-folder").find(".load-folder-data").empty();
                if (
                    datas["folder"].current_page != 2 &&
                    datas.folder['data'] != "" && datas.folder['data'] != null
                ) {

                    $(".load-folder").find(".load-folder-data").remove();
                    $(".load-folder").find(".new-foldata-data").html(datas["data"]);
                } else {
                    $(".load-folder").find(".load-folder-data").html("");
                    $(".load-folder").find(".new-foldata-data").html(datas["data"]);
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
    $(document).ready(function() {
        let fileTable = $(".folders-row");
        let folderId = null;
        let resumable;
        $(document).on('click', '.gobackbtn', function(e) {
            loadFolderData();
            $('#create_new_folder_btn').show();
            $('.form_file').addClass('d-none');
            $('.gobackbtn').addClass('d-none');
            $('.gobackbtn').next('h4').removeClass('w-75').addClass('w-100');
            $('.gobackbtn').next('h4').text('Upload New File');
            $('.custom_width-modal-folder').removeClass('d-none');
        });


        let progress = $(".in_progress_row");

        $(document).on("click", ".getFiles", function(e) {
            folderId = $(this).data("folder-id");
            $(this).parent('.folder_box').addClass('loader');
            loadFiles(folderId);
            $('.custom_width-modal-folder').addClass('d-none');
        });


        function loadFiles(folderId) {
            var routeUrl = routeUrlStoreFiles.replace(":id", folderId);
            var getFilesUrl = getFiles.replace(":id", folderId);

            const attributes = {
                hasButton: false,
                handleSuccess: function() {
                    $('.folders-row').html(datas['files']);
                    $('.gobackbtn').removeClass('d-none').css('width', '10%');
                    $('.gobackbtn').next('h4').removeClass('w-100').addClass('w-75').text(datas[
                        'foldername']['name']);
                    $('#create_new_folder_btn').hide();
                    $('.form_file').removeClass('d-none');
                    initializeResumable(routeUrl);
                },
            };

            const ajaxOptions = {
                url: getFilesUrl,
                method: "get",
                data: {},
            };
            makeAjaxRequest(ajaxOptions, attributes);
        }

        function initializeResumable(routeStoreFiles) {
            resumable = new Resumable({
                target: routeStoreFiles,
                query: {
                    _token: "{{ csrf_token() }}",
                },
                fileType: ["pdf", "jpg", "png", "jpeg", "doc", "docx", "heic"],
                chunkSize: 2 * 1024 * 1024, // 2MB
                headers: {
                    Accept: "application/json",
                },
                testChunks: false,
                throttleProgressCallbacks: 1,
            });
            resumable.on("fileSuccess", function(file, response) {
                hideProgress();
                fileTable.find('#file-' + file.uniqueIdentifier).empty();
                let newRow = `
            <div id="file-${file.uniqueIdentifier}">
                <div class="modal-body_card">
                    <input type="checkbox" id="vehicle1" class="uploadDocumentsCheckbox" name="dataArr[]" value="" data-id="">
                    <div class="modal-body_left">
                        <div class="modal_img">
                            <i class=" icon-zip icon-24 "></i>
                        </div>
                        <div class="modal_body-left_text">
                            <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                ${file.fileName}</div>
                            <div class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                 ${formatFileSize(file.file.size)}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
                fileTable.prepend(newRow);
            });
            resumable.on("complete", function() {
                loadFileData(); // Reload the files after upload completion
            });
            resumable.on("fileError", function(file, response) {
                alert("File upload error.");
            });
        }

        $(document).on("change", ".handleUploadDocumentsFile", function(event) {

            var files = event.target.files;
            var fileCount = files.length;

            for (let i = 0; i < fileCount; i++) {
                resumable.addFile(files[i]);
            }

            resumable.on("fileAdded", function(file) {
                addFileRow(file);
                showProgress();
                resumable.upload(); // Start uploading
            });
            resumable.on("fileProgress", function(file) {
                const progressValue = Math.floor(file.progress() * 100);
                $(`#file-${file.uniqueIdentifier} .progress2`).val(progressValue);
                $(`#file-${file.uniqueIdentifier} .progress-value`).text(`${progressValue}%`);
            });
        });

        function loadFileData() {
            var routeUrlFilesUrl = routeUrlFilesData.replace(":id", folderId);
            const attributes = {
                handleSuccess: function() {
                    $(".folders-row").html(datas['files']);
                }
            };
            const ajaxOptions = {
                url: routeUrlFilesUrl,
                method: 'get',
                data: {}
            };

            makeAjaxRequest(ajaxOptions, attributes);

        }

        $(document).on("change", ".uploadDocumentsCheckbox", function(e) {
            if ($('.uploadDocumentsCheckbox:checked').length > 0) {
                $(".uploadDcoumentsModalSubmitBtn").addClass("gradiant-button");
            } else {
                $(".uploadDcoumentsModalSubmitBtn").removeClass("gradiant-button");
            }
        });


        $(document).on("click", "#fileFolderModalClose", function(e) {
            $("#importfilebtn").removeClass("gradiant-button");
            $('.gobackbtn').addClass('d-none');
            $('.gobackbtn').next('h4').removeClass('w-75').addClass('w-100');
            $('.gobackbtn').next('h4').text('Upload New File');
            loadFolderData();
        });


        function addFileRow(file) {
            fileTable.find('#file-' + file.uniqueIdentifier).remove();
            let newRow = `
        <div id="file-${file.uniqueIdentifier}">
        <div class="modal-body_card justify-content-between in_progress_row">
                <div class="modal-body-card-left-progress d-flex align-items-center gap-4">
                    <input type="checkbox" id="vehicle1" name="dataArr[]" class="uploadDocumentsCheckbox"
                        value="" disabled="disabled">
                    <div class="modal-body_left">
                        <div class="modal_img">
                            <i class=" icon-zip icon-24 "></i>
                        </div>
                        <div class="modal_body-left_text">
                            <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                ${file.fileName}</div>
                            <div
                                class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                ${formatFileSize(file.file.size)}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="task-progress d-flex align-items-center">
                    <span
                        class="text-14 progress-value color-b-blue text-capitalize font-weight-700 lineheight-18">0%</span>
                    <progress class="progress progress2 mx-2" max="100"
                        value=""></progress>
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                        fill="none">
                        <path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd"
                            d="M5 6.28399L1.28399 10L0 8.71601L3.71601 5L4.15612e-06 1.28399L1.28399 0L5 3.71601L8.71601 0L10 1.28399L6.28399 5L10 8.71601L8.71601 10L5 6.28399Z"
                            fill="#17213A" />
                    </svg>
                </div>
        </div>
        </div>
    `;
            fileTable.prepend(newRow);
        }

        function showProgress() {
            progress.find(".progress2").css("width", "0%");
            progress.find(".progress2").html("0%");
            progress.find(".progress2").removeClass("bg-success");
            progress.show();
        }

        function updateProgress(value) {
            progress.find(".progress2").css("width", `${value}%`);
            progress.find(".progress2").val(`${value}%`);
        }

        function hideProgress() {
            progress.hide();
        }

        function formatFileSize(size) {
            if (size < 1024) return size + " Bytes";
            else if (size < 1048576) return (size / 1024).toFixed(2) + " KB";
            else return (size / 1048576).toFixed(2) + " MB";
        }
    });
</script>
