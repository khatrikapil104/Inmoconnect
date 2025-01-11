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
                                Team Management
                            </div>
                        </div>
                        <div class="header-left-team d-flex gap-3">
                            <button
                                class="header-right-button border-r-8 opacity-5 border-blue  d-flex justify-content-center align-items-center px-3 py-2"
                                data-toggle="modal" data-target="#create_new_folder">
                                <i class=" icon-property_search"></i><span class="ms-2">Create New Folder</span>
                            </button>
                        </div>
                    </div>

                </div>
                {{-- end-breadcrumb --}}

                {{-- my-files-progress --}}
                <div class="p-20 b-color-white box-shadow-one border-r-8  ">
                    <div class="text-18 color-primary lineheight-22 font-weight-700 pb-3">
                        Storage Status
                    </div>
                    <div class="task-progress">
                        <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">
                            887.12 KB
                            <span class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">1 GB</span>
                        </p>
                        <progress class="progress progress1" max="100" value="0.084602739661932"></progress>
                    </div>
                </div>
                {{-- end-my-file-progress --}}

                {{-- folder-search --}}
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
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
                            class="gradiant-hover w-150 h-42 b-color-transparent color-light-blue d-flex align-items-center justify-content-center border-r-8 border-light-blue deleteFilesBtn">
                            <i class=" icon-Delete me-2"></i>
                            Delete Files
                        </button>
                    </div>
                    <div class="folder_height mt-20">
                        <div class="row ">
                            <div class="col-lg-3">
                                <div class="folder_box">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="checkbox" id="vehicle_one" name="vehicle1" class="checkboxone">
                                        <div class="folder_section-top position-relative">
                                            <button onclick="myFunction()" class="table_dropdown_one b-color-transparent"> <i
                                                    class="  icon-dot  icon-16"></i></button>
                                            <div id="table_dropdown" class="table_dropdown-content">
                                                <a href="#" data-toggle="modal" data-target="#edit_new_folder"> <i
                                                        class="icon-eye me-2"></i>Edit</a>
                                                <a href="#about"> <i class="icon-Delete me-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center gap-3 folder_name-box">
                                        <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                        <p class="text-14 font-weight-700 color_black"> Ranadeep Complex</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="text-14 font-weight-400 color-black">30 Files</p>
                                        <p class="text-14 font-weight-400 color-black">30 MB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="folder_box">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="checkbox" id="vehicle_one" name="vehicle1" class="checkboxone">
                                        <div class="folder_section-top position-relative">
                                            <button onclick="myFunction()" class="table_dropdown_one b-color-transparent"> <i
                                                    class="  icon-dot  icon-16"></i></button>
                                            <div id="table_dropdown" class="table_dropdown-content">
                                                <a href="#"> <i class="icon-eye me-2"></i>Edit</a>
                                                <a href="#about"> <i class="icon-Delete me-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center gap-3 folder_name-box">
                                        <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                        <p class="text-14 font-weight-700 color_black"> Ranadeep Complex</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="text-14 font-weight-400 color-black">30 Files</p>
                                        <p class="text-14 font-weight-400 color-black">30 MB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="folder_box">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="checkbox" id="vehicle_one" name="vehicle1" class="checkboxone">
                                        <div class="folder_section-top position-relative">
                                            <button onclick="myFunction()" class="table_dropdown_one b-color-transparent"> <i
                                                    class="  icon-dot  icon-16"></i></button>
                                            <div id="table_dropdown" class="table_dropdown-content">
                                                <a href="#"> <i class="icon-eye me-2"></i>Edit</a>
                                                <a href="#about"> <i class="icon-Delete me-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center gap-3 folder_name-box">
                                        <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                        <p class="text-14 font-weight-700 color_black"> Ranadeep Complex</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="text-14 font-weight-400 color-black">30 Files</p>
                                        <p class="text-14 font-weight-400 color-black">30 MB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="folder_box">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="checkbox" id="vehicle_one" name="vehicle1" class="checkboxone">
                                        <div class="folder_section-top position-relative">
                                            <button onclick="myFunction()" class="table_dropdown_one b-color-transparent"> <i
                                                    class="  icon-dot  icon-16"></i></button>
                                            <div id="table_dropdown" class="table_dropdown-content">
                                                <a href="#"> <i class="icon-eye me-2"></i>Edit</a>
                                                <a href="#about"> <i class="icon-Delete me-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center gap-3 folder_name-box">
                                        <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                        <p class="text-14 font-weight-700 color_black"> Ranadeep Complex</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="text-14 font-weight-400 color-black">30 Files</p>
                                        <p class="text-14 font-weight-400 color-black">30 MB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="folder_box">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="checkbox" id="vehicle_one" name="vehicle1" class="checkboxone">
                                        <div class="folder_section-top position-relative">
                                            <button onclick="myFunction()" class="table_dropdown_one b-color-transparent"> <i
                                                    class="  icon-dot  icon-16"></i></button>
                                            <div id="table_dropdown" class="table_dropdown-content">
                                                <a href="#"> <i class="icon-eye me-2"></i>Edit</a>
                                                <a href="#about"> <i class="icon-Delete me-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center gap-3 folder_name-box">
                                        <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                        <p class="text-14 font-weight-700 color_black"> Ranadeep Complex</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="text-14 font-weight-400 color-black">30 Files</p>
                                        <p class="text-14 font-weight-400 color-black">30 MB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="folder_box">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="checkbox" id="vehicle_one" name="vehicle1" class="checkboxone">
                                        <div class="folder_section-top position-relative">
                                            <button onclick="myFunction()" class="table_dropdown_one b-color-transparent"> <i
                                                    class="  icon-dot  icon-16"></i></button>
                                            <div id="table_dropdown" class="table_dropdown-content">
                                                <a href="#"> <i class="icon-eye me-2"></i>Edit</a>
                                                <a href="#about"> <i class="icon-Delete me-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center gap-3 folder_name-box">
                                        <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                        <p class="text-14 font-weight-700 color_black"> Ranadeep Complex</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="text-14 font-weight-400 color-black">30 Files</p>
                                        <p class="text-14 font-weight-400 color-black">30 MB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="folder_box">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="checkbox" id="vehicle_one" name="vehicle1" class="checkboxone">
                                        <div class="folder_section-top position-relative">
                                            <button onclick="myFunction()" class="table_dropdown_one b-color-transparent"> <i
                                                    class="  icon-dot  icon-16"></i></button>
                                            <div id="table_dropdown" class="table_dropdown-content">
                                                <a href="#"> <i class="icon-eye me-2"></i>Edit</a>
                                                <a href="#about"> <i class="icon-Delete me-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center gap-3 folder_name-box">
                                        <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                        <p class="text-14 font-weight-700 color_black"> Ranadeep Complex</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="text-14 font-weight-400 color-black">30 Files</p>
                                        <p class="text-14 font-weight-400 color-black">30 MB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="folder_box">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="checkbox" id="vehicle_one" name="vehicle1" class="checkboxone">
                                        <div class="folder_section-top position-relative">
                                            <button onclick="myFunction()" class="table_dropdown_one b-color-transparent"> <i
                                                    class="  icon-dot  icon-16"></i></button>
                                            <div id="table_dropdown" class="table_dropdown-content">
                                                <a href="#"> <i class="icon-eye me-2"></i>Edit</a>
                                                <a href="#about"> <i class="icon-Delete me-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-center gap-3 folder_name-box">
                                        <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                        <p class="text-14 font-weight-700 color_black"> Ranadeep Complex</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="text-14 font-weight-400 color-black">30 Files</p>
                                        <p class="text-14 font-weight-400 color-black">30 MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-folder-search --}}


                {{-- Create New Folder-modal --}}
                <div class="modal fade" id="create_new_folder" tabindex="-1" role="dialog"
                    aria-labelledby="create_new_folderLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_eight" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="create_new_folderLabel">Create New Folder</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-n3">
                                        <div class="form-group mt-3 position-relative">
                                            <label for="reference"
                                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Folder Name:<span
                                                    class="required">*</span></label>
                                            <input type="text"
                                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                                name="reference" id="reference" value="" placeholder="Folder Name">
                                            <div class="invalid-feedback fw-bold"></div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                                        <div class="form-group position-relative">
                                            <button type="button"
                                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Create
                                                New Folder</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-create-new-folder-modal --}}


                 {{-- Create New Folder-modal --}}
                 <div class="modal fade" id="edit_new_folder" tabindex="-1" role="dialog"
                 aria-labelledby="edit_new_folderLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_eight" role="document">
                     <div class="modal-content modal-content-file">
                         <div class="modal-header border-0 modal-header_file pb-0">
                             <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                 id="edit_new_folderLabel">Edit Folder</h5>
                             <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                 aria-label="Close">
                                 <span aria-hidden="true"> <i
                                         class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                             </button>
                         </div>
                         <div class="modal-body modal-header_file">
                             <div class="row">
                                 <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-n3">
                                     <div class="form-group mt-3 position-relative">
                                         <label for="reference"
                                             class="text-14 font-weight-400 lineheight-18 color-b-blue">Folder Name:<span
                                                 class="required">*</span></label>
                                         <input type="text"
                                             class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                             name="reference" id="reference" value="" placeholder="Folder Name">
                                         <div class="invalid-feedback fw-bold"></div>
                                     </div>
                                 </div>
                                 <div
                                     class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                                     <div class="form-group position-relative">
                                         <button type="button"
                                             class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Create
                                             New Folder</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             {{-- end-create-new-folder-modal --}}





                @push('scripts')

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
                    <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>

                    <script>
                        function myFunction() {
                            document.getElementById("table_dropdown").classList.toggle("show");
                        }

                        // Close the dropdown if the user clicks outside of it
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
                    </script>


                @endpush
            @endsection
