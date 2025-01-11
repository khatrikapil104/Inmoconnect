@extends('layouts.app')
@section('content')
@push('styles')

@section('title')
{{trans('messages.sidebar.Property_Search')}} Inmoconnect
@endsection

<link  rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">

        <!-- ////////////////////////////breadcrum///////////////////////////////////// -->
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36"
                      >My Projects
                    </div>
                </div>
                <div class="header-right-button_one d-flex align-items-center gap-3">
                    <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                        data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                        <i class=" icon-Add-Projct"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- ///////////////////////////end-breadcrum////////////////////////////////////// -->

        <!-- ////////////////////////empty-page///////////////////////////////////////////// -->
        <div class="row propertySearchData tableData">
            <div class="main-card border-r-8  mb-15">
                <div
                    class="empty-search border-r-8 b-color-white d-flex align-items-center justify-content-center px-50 py-30 box-shadow-one">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-6 empty-order">
                            <div class="search-left me-4">
                                <div class="text-20 lineheight-22 color-primary font-weight-700 letter-s-48">Transform Visions into Reality with InmoConnect Projects</div>
                                <div class="text14 font-weight-400 lineheight-18 color-b-blue pt-10">Why Utilize InmoConnect Projects?</div>
                                <ul class="search-list">
                                    <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                            class="font-weight-700">Efficient Collaboration:</span> Work seamlessly with your team, agents, and clients within a unified workspace.</li>
                                    <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                            class="font-weight-700">Centralized Management:</span> Keep all project-related information, from properties to contacts, in one organized space.</li>
                                    <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                            class="font-weight-700">Transparent Progress Tracking:</span> Monitor the progress of each project with real-time updates and milestones.</li>
                                    <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                            class="font-weight-700">Document Centralization:</span>  Store, share, and manage project documents securely in one centralized location.</li>
                                    <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                            class="font-weight-700">Effortless Meetings</span> Schedule and manage project meetings effortlessly with our in-built meeting scheduler.</li>
                                </ul>
                                <div class="text14 font-weight-400 lineheight-18 color-b-blue pt-15">Start your first InmoConnect Project today and turn your real estate visions and excellence into successful ventures.</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="search-right">
                                <div class="search-right-img text-center mb-5 mb-lg-0">
                                    <img src="{{asset('img/empty_myproject.svg')}}" alt="image" class="#">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /////////////////////////////////////////////end-empty-page///////////////////////////////////////////// -->

    </div>
</div>

<!-- /////////////////////////////////////////////Add-new project-modal ///////////////////////////////////////////// -->
<div class="modal fade" id="dataFilterModal" tabindex="-1" aria-labelledby="dataFilterModalLabel" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
        <div class="modal-content border-r-8 border-0 b-color-white ">
        <div class="modal-header border-0 modal-header_file pb-0">
                <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-b-blue w-100" id="dataFilterModalLabel">Add New Project</h4>
                <button type="button" class="close b-color-transparent cursor-pointer end-0"
                    data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class=" icon-cross text-24 color-b-blue opacity-8"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body modal-body modal-header_file">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css common_css_two">
                        <div class="form-group position-relative">
                            <label for="reference"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Project
                                Name: <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="reference" id="reference" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <div class="col-md-12 common-label-css textarea_abc">
                        <x-forms.crm-textarea :fieldData="[
                    'name' => 'description',
                    'id' => 'description',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'useCkEditor' => true,
                    'value' => $property->description ?? '',
                   ]" />
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_name"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Project Type:
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_name" id="vendor_name" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_name"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Project Budget:
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_name" id="vendor_name" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <!-- //////////////////////in this field use test/date_picker.blade.php/////////////////// -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_name"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Project Start Date:
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_name" id="vendor_name" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                      <!-- //////////////////////in this field use test/date_picker.blade.php/////////////////// -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_name"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Project End Date:
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_name" id="vendor_name" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                       <!-- //////////////////////in this field use test/choose_file.blade.php/////////////////// -->
                    <div class="col-12 col-sm-12 col-md-12  col-lg-12 common-label-css common-attachment">
                        <div class="form-group mt-3 position-relative ">
                            <label for="vendor_name"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Add Attachments:
                                <span class="required">*</span>
                            </label>
                            <div class="form-group_file gap-3">
                            <input type="file" class="input-file_choose">
                            <div class="attachment_scroll d-flex align-tems-center gap-3 flex-wrap w-100">
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>

                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4">
                                                    <div class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                                                       agent-e-3.png
                                                        <span class="ps-4 removeCertificateBtn" data-id="60"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7" fill="none">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z" fill="#383192"></path>
                                                        </svg></span>
                                                    </div>
                                                </div>
                                            </div>
                          
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12  col-lg-12 common-label-css">
                        <div class="form-group mt-3 position-relative">
                            <label for="vendor_name"
                                class="text-14 font-weight-400 lineheight-18 color-b-blue">Location:
                                <span class="required">*</span></label>
                            <input type="text"
                                class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                name="vendor_name" id="vendor_name" value="" placeholder="">
                            <div class="invalid-feedback fw-bold"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus"
                            width="100%" height="260" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" class="mt-10"></iframe>
                   </div>
                </div>
                <div class="pt-30 modal-body_footer d-flex justify-content-end align-items-center">
                    <button type="button" class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Create Project</button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ///////////////////////////////////end-add-new -project_modal ///////////////////////////////////////// -->
@push('scripts')

<script src="{{ asset('assets/js/modules/properties/property_index.js') }}"></script>
@endpush
@endsection