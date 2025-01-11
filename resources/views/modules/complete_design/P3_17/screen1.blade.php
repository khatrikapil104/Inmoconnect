@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.sidebar.Property_Search') }} Inmoconnect
        @endsection

        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

        <div class="overlay" id="overlay"></div>
        <div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                <!-- ////////////////////////////breadcrum///////////////////////////////////// -->
                <div class="empty-search-header">
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div
                                class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">
                                My Projects
                            </div>
                        </div>
                        <div class="header-right-button_one d-flex align-items-center gap-3 header-input-file">
                            <div
                                class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center">
                                <input type="file" name="file-input" id="file-input" class="file-input__input" />
                                <label class="file-input__label" for="file-input">
                                    <i class=" icon-My_files_breadcrumb "></i>

                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ///////////////////////////end-breadcrum////////////////////////////////////// -->

                <!-- ///////////////////////////progessbar////////////////////////////////////////////// -->
                <div class="p-20 b-color-white box-shadow-one border-r-8  ">
                    <div class="text-18 color-primary lineheight-22 font-weight-700 pb-3">Storage Status</div>
                    <div class="task-progress">
                        <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                            <span class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                        </p>
                        <progress class="progress progress1" max="100" value="80"></progress>
                    </div>
                </div>

                <!-- ///////////////////////////////end-progressbar/////////////////////////////////////// -->

                <!-- /////////////////////////////////table////////////////////////////////////////// -->

                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                    <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                        <div class="search_button">
                            <div class="form-group mt-3 position-relative">
                                <div class="input-group input-group-sm dashboard_input-search">

                                    <span
                                        class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                    <input type="text" name="userListingFilterData[search]"
                                        class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                        placeholder="Search here..." value="">
                                </div>
                            </div>
                        </div>

                        <button
                            class="gradiant-hover w-150 h-42 b-color-transparent color-light-blue d-flex align-items-center justify-content-center border-r-8 border-light-blue">
                            <i class=" icon-Delete me-2"></i>Delete Files</button>
                    </div>
                    <div class="table_dashboard">
                        <table id="example" class="display dashboard_table my_file_table" style="width:100%; ">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>File Name</th>
                                    <th>File Type</th>
                                    <th>File Size</th>
                                    <th>Date Uploaded</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone"></td>
                                    <td><a href=""><span>Cer_henry_realestate</span></a></td>
                                    <td><a href="">Pdf</a></td>
                                    <td><a href="">50 MB</a></td>
                                    <td><a href="">18/01/2024</a></td>
                                    <td class="download-button"><button><i
                                                class="icon-download_black  icon-20 color-b-blue"></i></button></td>
                                    <td class="delete-button"><button><i class="icon-Delete  icon-20 color-b-blue"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone"></td>
                                    <td><a href=""><span>Cer_henry_realestate</span></a></td>
                                    <td><a href="">Pdf</a></td>
                                    <td><a href="">50 MB</a></td>
                                    <td><a href="">18/01/2024</a></td>
                                    <td class="download-button"><button><i
                                                class="icon-download_black  icon-20 color-b-blue"></i></button></td>
                                    <td class="delete-button"><button><i class="icon-Delete  icon-20 color-b-blue"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone"></td>
                                    <td><a href=""><span>Cer_henry_realestate</span></a></td>
                                    <td><a href="">Pdf</a></td>
                                    <td><a href="">50 MB</a></td>
                                    <td><a href="">18/01/2024</a></td>
                                    <td class="download-button"><button><i
                                                class="icon-download_black  icon-20 color-b-blue"></i></button></td>
                                    <td class="delete-button"><button><i class="icon-Delete  icon-20 color-b-blue"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone"></td>
                                    <td><a href=""><span>Cer_henry_realestate</span></a></td>
                                    <td><a href="">Pdf</a></td>
                                    <td><a href="">50 MB</a></td>
                                    <td><a href="">18/01/2024</a></td>
                                    <td class="download-button"><button><i
                                                class="icon-download_black  icon-20 color-b-blue"></i></button></td>
                                    <td class="delete-button"><button><i class="icon-Delete  icon-20 color-b-blue"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone"></td>
                                    <td><a href=""><span>Cer_henry_realestate</span></a></td>
                                    <td><a href="">Pdf</a></td>
                                    <td><a href="">50 MB</a></td>
                                    <td><a href="">18/01/2024</a></td>
                                    <td class="download-button"><button><i
                                                class="icon-download_black  icon-20 color-b-blue"></i></button></td>
                                    <td class="delete-button"><button><i class="icon-Delete  icon-20 color-b-blue"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone"></td>
                                    <td><a href=""><span>Cer_henry_realestate</span></a></td>
                                    <td><a href="">Pdf</a></td>
                                    <td><a href="">50 MB</a></td>
                                    <td><a href="">18/01/2024</a></td>
                                    <td class="download-button"><button><i
                                                class="icon-download_black  icon-20 color-b-blue"></i></button></td>
                                    <td class="delete-button"><button><i
                                                class="icon-Delete  icon-20 color-b-blue"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone"></td>
                                    <td><a href=""><span>Cer_henry_realestate</span></a></td>
                                    <td><a href="">Pdf</a></td>
                                    <td><a href="">50 MB</a></td>
                                    <td><a href="">18/01/2024</a></td>
                                    <td class="download-button"><button><i
                                                class="icon-download_black  icon-20 color-b-blue"></i></button></td>
                                    <td class="delete-button"><button><i
                                                class="icon-Delete  icon-20 color-b-blue"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- //////////////////////////////////end-table////////////////////////////////////// -->
            </div>
        </div>



        @push('scripts')

            <script src="{{ asset('assets/js/modules/properties/property_index.js') }}"></script>
        @endpush
    @endsection