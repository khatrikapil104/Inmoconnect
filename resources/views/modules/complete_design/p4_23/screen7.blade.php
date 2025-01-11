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
                    </div>
                </div>
                {{-- end-breadcrumb --}}


                <button type="button"
                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                    data-toggle="modal" data-target="#exampleModal">Add Document</button>


                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_two" role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="dataFilterModalLabel">Upload New File</h4>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="modal_body_text">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="folder_box d-flex flex-column align-items-center gap-2">
                                                <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                                <p class="text-14 font-weight-700 color_black lineheight-18"> Ranadeep Complex
                                                </p>
                                                <p class="text-14 font-weight-400 color_black lineheight-18"> 30 Files</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="folder_box d-flex flex-column align-items-center gap-2">
                                                <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                                <p class="text-14 font-weight-700 color_black lineheight-18"> Ranadeep Complex
                                                </p>
                                                <p class="text-14 font-weight-400 color_black lineheight-18"> 30 Files</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="folder_box d-flex flex-column align-items-center gap-2">
                                                <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                                <p class="text-14 font-weight-700 color_black lineheight-18"> Ranadeep Complex
                                                </p>
                                                <p class="text-14 font-weight-400 color_black lineheight-18"> 30 Files</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="folder_box d-flex flex-column align-items-center gap-2">
                                                <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                                <p class="text-14 font-weight-700 color_black lineheight-18"> Ranadeep Complex
                                                </p>
                                                <p class="text-14 font-weight-400 color_black lineheight-18"> 30 Files</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="folder_box d-flex flex-column align-items-center gap-2">
                                                <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                                <p class="text-14 font-weight-700 color_black lineheight-18"> Ranadeep Complex
                                                </p>
                                                <p class="text-14 font-weight-400 color_black lineheight-18"> 30 Files</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="folder_box d-flex flex-column align-items-center gap-2">
                                                <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                                <p class="text-14 font-weight-700 color_black lineheight-18"> Ranadeep Complex
                                                </p>
                                                <p class="text-14 font-weight-400 color_black lineheight-18"> 30 Files</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="folder_box d-flex flex-column align-items-center gap-2">
                                                <img src="{{ asset('img/folder_img.svg') }}" alt="image" class="#">
                                                <p class="text-14 font-weight-700 color_black lineheight-18"> Ranadeep Complex
                                                </p>
                                                <p class="text-14 font-weight-400 color_black lineheight-18"> 30 Files</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-30 modal-body_footer d-flex justify-content-between align-items-center">
                                    <button type="button"
                                        class="delete_project small-button border-r-8  text-14 font-weight-400 lineheight-18 "
                                        onclick="openMyModal2()">Create
                                        New Folder</button>
                                    <button type="button"
                                        class="complete_project small-button border-r-8 border-r-8  text-14 font-weight-400 lineheight-18 color-white text-14 font-weight-700 lineheight-18 color-white">
                                        Import</button>
                                </div>
                            </div>
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
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-n3">
                                <div class="form-group mt-3 position-relative">
                                    <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Folder
                                        Name:<span class="required">*</span></label>
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
                function openMyModal2() {
                    let myModal = new
                    bootstrap.Modal(document.getElementById('create_new_folder'), {});
                    myModal.show();
                }
            </script>

        @endpush
    @endsection
