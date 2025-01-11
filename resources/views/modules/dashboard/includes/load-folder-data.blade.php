@if ($results->isNotEmpty())
    @foreach ($results as $folder)
        <?php
        $totalOccupiedStorage = $folder->userFile->sum('file_size');
        $totalStorageLimit = getFileSizeLimit();
        $totalStorageLimitInBytes = formatFileSizeFlexible($totalStorageLimit, 'KB', 'B');
        $progress = ($totalOccupiedStorage / $totalStorageLimitInBytes) * 100;
        
        ?>
        <div class="col-lg-3">
            <div class="folder_box load-folder-data">
                <div class="d-flex align-items-center justify-content-between">
                    <input type="checkbox" name="vehicle1" data-id="{{ $folder->id }}" class="checkboxone folderCheckbox">
                    <div class="folder_section-top position-relative">
                        <button onclick="myFunction({{ $folder->id }})" class="table_dropdown_one b-color-transparent"
                            style="rotate: 90deg">
                            <i class="icon-dot  icon-16"></i></button>
                        <div id="table_dropdown_{{ $folder->id }}" class="table_dropdown-content my_File_Edit">
                            <a href="#" data-bs-toggle="modal"
                                data-bs-target="#edit_new_folder{{ $folder->id }}"> <i
                                    class="icon-edit me-2"></i>Edit</a>

                            <a href="javascript:void(0)" class="deleteFolderBtn color-blue" data-id="{{ $folder->id }}"
                                data-name="{{ $folder->name }}">
                                <i class="icon-Delete me-2"></i>Delete</a>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center gap-3 folder_name-box">
                    <a href="{{ route(routeNamePrefix() . 'files.index', $folder->id) }}"><img
                            src="{{ asset('img/folder_img.svg') }}" alt="image" class="#"></a>
                    <p class="text-14 font-weight-700 color_black">{{ $folder->name }}</p>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <p class="text-14 font-weight-400 color-black">{{ count($folder->userFile) }} Files</p>
                    <p class="text-14 font-weight-400 color-black">{{ formatFileSize($totalOccupiedStorage) }}</p>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit_new_folder{{ $folder->id }}" tabindex="-1" role="dialog"
            aria-labelledby="edit_new_folderLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_eight" role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="edit_new_folderLabel">Edit Folder</h5>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file">
                        <form action="" method="post" id="editFolder{{ $folder->id }}"
                            enctype="multipart/form-data">
                            <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-n3">
                                    <div class="form-group mt-3 position-relative">
                                        <label for="reference"
                                            class="text-14 font-weight-400 lineheight-18 color-b-blue">Folder
                                            Name:<span class="required">*</span></label>
                                        <input type="text"
                                            class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                            name="edit_name" id="name" value="{{ $folder->name }}"
                                            placeholder="Folder Name">
                                        <div class="invalid-feedback fw-bold"></div>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                                    <div class="form-group position-relative">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white editFolderBtn"
                                            data-id="{{ $folder->id }}">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class=" table_dashboard empty-dashboard table-empty-dashboard">
        <div class="empty-table">
            <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                {{ trans('No  Folder Found') }}
            </h4>
        </div>
    </div>
@endif
