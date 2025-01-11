@extends('layouts.app')
@section('content')
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.css" />
    @push('styles')
        @section('title')
            Manage Development Inmoconnect
        @endsection
    @endpush

    <div class="overlay" id="overlay"></div>
    <div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
        <div class="crm-main-content">

            {{-- breadcrumb --}}
            <x-forms.crm-breadcrumb :fieldData="[
                [
                    'url' => route(routeNamePrefix() . 'developments.index'),
                    'label' => 'Developments',
                ],
                [
                    'url' => '',
                    'label' => $result->development_name ?? '',
                ],
            ]" />
            {{-- end-breadcrumb --}}

            {{-- prize --}}
            <div class="row mb-30">
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <!-- property-name -->
                    <div class="property-header-details d-flex align-items-center justify-content-between">
                        <div class="property-details property-name">
                            <h3 class="text-18 font-weight-700 lineheight-22 color-b-blue letter-s-48">
                                {{ $result->development_name ?? '' }}
                            </h3>
                        </div>
                    </div>

                    <div class="property-detail-share d-flex justify-content-between align-items-center pt-12">
                        <div class="property-details d-grid d-sm-flex flex-column gap-12 main-card-two-small">
                            <!-- address -->
                            <div
                                class="property-address main-card-two-small-one d-flex align-items-start gap-1 position-relative">

                                <i class="icon-location text-14 d-flex align-items-center gap-1"></i>
                                <p class="text-14 color-b-blue font-weight-400 lineheight-18">{{ $result->location ?? '' }}
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="pt-12">
                        <p class="text-14 font-weight-400 lineheight-18 color-black">By <span
                                class="color-primary">{{ $result->company_name ?? '' }}</span></p>
                    </div>
                </div>

                <div
                    class="gap-3 col-sm-4 col-md-4 col-lg-4 d-flex flex-column justify-content-between align-items-start align-items-sm-end mt-4 pt-4 mt-sm-0 pt-sm-0">
                    <!-- property-price -->
                    <div class="property-details">
                        <p class="text-32 font-weight-700 line-height-40 etter-s-64 color-b-blue position-relative">
                            <span class="propert-price-blurs prices_propert">
                                {{ !empty($result->min_selling_price)
                                    ? config('Reading.default_currency') . ' ' . number_format($result->min_selling_price, 2)
                                    : config('Reading.default_currency') . ' 0.00' }}
                                -
                                {{ !empty($result->max_selling_price)
                                    ? config('Reading.default_currency') . ' ' . number_format($result->max_selling_price, 2)
                                    : config('Reading.default_currency') . ' 0.00' }}</span>
                        </p>
                    </div>
                    <!-- buttons -->
                    <div class="row">
                        <div class="col-md-12 d-flex gap-2 gap-md-3">
                            <button type="button" class=" icon-share text-24 b-color-transparent color-primary">
                            </button>
                            @if (auth()->user()->id == $result->user_id)
                                <button type="button" class=" icon-edit text-24 b-color-transparent color-primary"
                                    id="editBtn" data-bs-toggle="modal" data-bs-target="#editDevelopmentModal">
                                </button>
                            @endif
                            @if (auth()->user()->id == $result->user_id)
                                <button type="button"
                                    class=" icon-Delete text-24 b-color-transparent color-primary removeDevelopmentBtn"
                                    data-id="{{ $result->id }}" data-name="{{ $result->development_name ?? '' }}">
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- end-prize --}}

            {{-- images --}}
            <div class="row">
                @if ($developmentImagesData->isNotEmpty())
                    <div class="col-lg-8">
                        <div class="slider-for fancybox_slider">

                            @foreach ($developmentImagesData as $imageKey => $image)
                                <div><a data-fancybox="gallery" href="{{ $image->image ?? '' }}"><img
                                            src="{{ $image->image ?? '' }}" alt="Image {{ $imageKey + 1 }}"></a>
                                </div>
                            @endforeach


                        </div>

                        <!-- Navigation Slider -->
                        <div class="slider-nav mt-2 pt-1 slider_nav_bottom developer_img_preview">
                            @foreach ($developmentImagesData as $imageKey => $image)
                                <div><img src="{{ $image->image ?? '' }}" alt="Image {{ $imageKey + 1 }} Thumbnail"></div>
                            @endforeach

                        </div>

                    </div>
                @endif
                <div class="col-lg-4">
                    <div class="dashboard-card_one box-shadow-one b-color-white border-r-8  p-20">
                        <div class="card-text-header text-18 font-weight-700 lineheight-22 color-primary " id="">
                            Overview:
                        </div>
                        <div class="mt-3 d-flex align-items-center pt-2">
                            <div
                                class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                <i class=" icon-icon_home text-24 color-b-blue"></i>
                            </div>
                            <div class="card-text-right ps-0 ps-md-2">
                                <div class="text-14 font-weight-700 line-height-18 color-b-blue">Number of Units</div>
                                <div class="text-14 font-weight-400 line-height-18 color-b-blue">
                                    {{ $result->total_units ?? 0 }}</div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex align-items-center pt-2">
                            <div
                                class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                <i class="icon-unit_sold text-24 color-b-blue"></i>
                            </div>
                            <div class="card-text-right ps-0 ps-md-2">
                                <div class="text-14 font-weight-700 line-height-18 color-b-blue">Unit Sold</div>
                                <div class="text-14 font-weight-400 line-height-18 color-b-blue">
                                    {{ $result->total_units_sold ?? 0 }}</div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex align-items-center pt-2">
                            <div
                                class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                <i class=" icon-house_id text-24 color-b-blue"></i>
                            </div>
                            <div class="card-text-right ps-0 ps-md-2">
                                <div class="text-14 font-weight-700 line-height-18 color-b-blue">Building License:</div>
                                <div class="text-14 font-weight-400 line-height-18 color-b-blue">
                                    {{ $result->building_license ?? '' }}</div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex align-items-center pt-2">
                            <div
                                class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                <i class=" icon-development_id text-24 color-b-blue"></i>
                            </div>
                            <div class="card-text-right ps-0 ps-md-2">
                                <div class="text-14 font-weight-700 line-height-18 color-b-blue">Development Number:</div>
                                <div class="text-14 font-weight-400 line-height-18 color-b-blue">
                                    {{ $result->development_number ?? '' }}</div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex align-items-center pt-2">
                            <div
                                class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                <i class=" icon-terms_of_payment text-24 color-b-blue"></i>
                            </div>
                            <div class="card-text-right ps-0 ps-md-2">
                                <div class="text-14 font-weight-700 line-height-18 color-b-blue">Terms of payment:</div>
                                <div class="text-14 font-weight-400 line-height-18 color-b-blue">Default Agent's
                                    Commission:
                                    {{ $result->agent_commission_per ?? 0 }}%</div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex align-items-center pt-2">
                            <div
                                class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                <img src="{{ asset('img/category.svg') }}" alt="image">
                            </div>
                            <div class="card-text-right ps-0 ps-md-2">
                                <div class="text-14 font-weight-700 line-height-18 color-b-blue">Cadastral Reference:</div>
                                <div class="text-14 font-weight-400 line-height-18 color-b-blue">
                                    {{ $result->cadastral_reference ?? '' }}</div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex align-items-center pt-2">
                            <div
                                class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                <i class=" icon-construction_start_date text-24 color-b-blue"></i>
                            </div>
                            <div class="card-text-right ps-0 ps-md-2">
                                <div class="text-14 font-weight-700 line-height-18 color-b-blue">Construction Start Date:
                                </div>
                                <div class="text-14 font-weight-400 line-height-18 color-b-blue">
                                    {{ $result->start_date ?? '' }}</div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex align-items-center pt-2">
                            <div
                                class="card-img-left border-r-8 d-flex align-items-center justify-content-center width-42 height-40 border-grey me-2">
                                <i class=" icon-estimated_possession_date text-24 color-b-blue"></i>
                            </div>
                            <div class="card-text-right ps-0 ps-md-2">
                                <div class="text-14 font-weight-700 line-height-18 color-b-blue">Estimated Possession Date:
                                </div>
                                <div class="text-14 font-weight-400 line-height-18 color-b-blue">
                                    {{ $result->end_date ?? '' }}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- end-images --}}

            @if (!empty($result->development_description))
                {{-- Property Description --}}
                <div class="dashboard-card_one box-shadow-one b-color-white border-r-8  p-20 mt-20">
                    <div class="card-text-header text-18 font-weight-700 lineheight-22 color-primary " id="">
                        Property
                        Description:
                    </div>
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue pt-3">
                        {!! $result->development_description ?? '' !!}
                    </div>
                </div>
            @endif

            {{-- end Property Description --}}

            {{-- Manage Unit --}}
            <div class="dashboard-card_one box-shadow-one b-color-white border-r-8  p-20 mt-20">
                @if ($developmentUnitsData->isNotEmpty())
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="card-text-header text-18 font-weight-700 lineheight-22 color-primary " id="">
                            Manage
                            Unit:
                        </div>
                        <div class=" d-flex justify-content-start align-items-center">
                            <div class="form-group position-relative gap-12 d-flex align-items-center">
                                <button type="button"
                                    class="bg_gradiant_hover small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#add_unit">
                                    Add Unit</button>
                                <button type="button"
                                    class="bg_gradiant_hover small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#bulk_import">
                                    Bulk Import</button>
                            </div>
                        </div>
                    </div>
                    <div class="search-dashboard d-flex flex-column flex-md-row gap-2 justify-content-between">
                        <div class="d-flex flex-column flex-xl-row align-items-start align-items-xl-center">
                            <div class="search_button pe-4">
                                <div class="form-group mt-3 position-relative" style="width: 325px">
                                    <div class="input-group input-group-sm dashboard_input-search w-100">
                                        <span
                                            class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                        <input type="text" name="table_search_input"
                                            class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                            placeholder="Search here..." value="">
                                    </div>
                                </div>
                            </div>
                            <div class="action_Short_by" style="opacity: 50%">
                                <x-forms.crm-single-select :fieldData="[
                                    'name' => 'development_status',
                                    'hasLabel' => false,
                                    'label' => trans('messages.search_filter.Action'),
                                    'id' => 'sort_by_property_two',
                                    'options' => [
                                        'draft' => 'Move To Draft',
                                        'published' => 'Publish',
                                        'edit' => 'Edit',
                                        'sold' => 'Mark As Sold',
                                        'delete' => 'Delete',
                                    ],
                                    'attributes' => ['disabled'],
                                    'hasHelpText' => false,
                                    'placeholder' => 'Actions',
                                    'isRequired' => false,
                                ]" />
                            </div>
                            <button type="button"
                                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ms-2 updateDevelopementStatus mt-3"
                                disabled data-bs-toggle="modal" data-bs-target="#single_todolist">
                                Apply
                            </button>
                        </div>
                        <div class="search-select common-label-css without_checkbox">
                            <x-forms.crm-single-select :fieldData="[
                                'name' => 'table_sort_by',
                                'hasLabel' => false,
                                'label' => trans('messages.search_filter.Sort_By'),
                                'id' => 'sort_by_property_three',
                                'options' => [
                                    'high_low' => trans('messages.agent-dashboard.sort_high_to_low'),
                                    'low_high' => trans('messages.agent-dashboard.sort_low_to_high'),
                                    'newest' => trans('messages.agent-dashboard.sort_newest'),
                                    'oldest' => trans('messages.agent-dashboard.sort_oldest'),
                                ],
                                'attributes' => [],
                                'hasHelpText' => false,
                                'placeholder' => trans('messages.search_filter.Sort_By'),
                                'isRequired' => false,
                            ]" />
                        </div>
                    </div>
                    <div class="upload_property-table mt-20">
                        <table id="" class="display dashboard_table dashboard_edit_one table-bottom-border"
                            style="width:100%; ">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkbox"
                                            class="checkbox  fileCheckbox developmentUnitCheckboxAll">
                                    </th>
                                    <th>Reference Number</th>
                                    <th>Property Type</th>
                                    <th>Property Size</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="tableData">
                                @include('components.tables.custom-table', [
                                    'results' => $developmentUnitsData,
                                ])
                            </tbody>

                        </table>
                        <div class="paginationData mt-10">
                            <!-- Custom Pagination File -->
                            @include('components.tables.pagination', [
                                'results' => $developmentUnitsData,
                            ])
                        </div>
                    </div>
                @else
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="card-text-header text-18 font-weight-700 lineheight-22 color-primary " id="">
                            Manage
                            Unit:
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-column justify-content-center manage_padding">
                        <img src="{{ asset('img/manage_unit.svg') }}" alt="image" class="#">
                        <h3 class="text-20 font-weight-700 lineheight-24 color-primary pt-20">Welcome to NextGen
                            Development
                            Management CRM.</h3>
                        <p class="text-14 font-weight-400 lineheight-18 color-primary pt-12">You have no units added into
                            the
                            development yet, please choose the desired option from the below and start listing.</p>
                        <div class=" d-flex justify-content-start align-items-center pt-30">
                            <div class="form-group position-relative gap-12 d-flex align-items-center">
                                <button type="button"
                                    class="bg_gradiant_hover small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#add_unit">
                                    Add Unit</button>
                                <button type="button"
                                    class="bg_gradiant_hover small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#bulk_import">
                                    Bulk Import</button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            {{-- end-Manage Unit: --}}

            @if ($floorPlans->isNotEmpty())
                {{-- Project Floor Plans --}}
                <div class="dashboard-card_one box-shadow-one b-color-white border-r-8  p-20 mt-20">
                    <div class="card-text-header text-18 font-weight-700 lineheight-22 color-primary " id="">
                        Project
                        Floor Plans:
                    </div>
                    <div class="row mt-20">
                        @foreach ($floorPlans as $plan)
                            <div class="col-lg-6 mt-2">
                                <div class="project_floor">
                                    <img src="{{ $plan->image ?? '' }}" alt="image" class="#">
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif
            {{-- End-Project Floor Plans  --}}
        </div>
    </div>

    {{-- add-unit --}}
    <div class="modal fade" id="add_unit" tabindex="-1" role="dialog" aria-labelledby="add_unitLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_six" role="document">
            <div class="modal-content modal-content-file">
                <div class="modal-header border-0 modal-header_file pb-0">
                    <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="add_unitLabel">Add Unit</h5>
                    <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                    </button>
                </div>
                <div class="modal-body modal-header_file">
                    <form id="addUnitForm" class="row" type="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-n3">
                                <x-forms.crm-single-select :fieldData="[
                                    'name' => 'type_id',
                                    'hasLabel' => true,
                                    'label' => trans('messages.properties.Property_Type') . ':',
                                    'id' => 'type_id',
                                    'options' => $types,
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'placeholder' => trans('messages.properties.Property_Type'),
                                    'isRequired' => true,
                                    'minimumResultsForSearch' => 0,
                                ]" />
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css">
                                <x-forms.crm-single-select :fieldData="[
                                    'name' => 'subtype_id',
                                    'hasLabel' => true,
                                    'label' => trans('messages.properties.Property_Subtype') . ':',
                                    'id' => 'subtype',
                                    'options' => [],
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'placeholder' => trans('messages.properties.Property_Subtype'),
                                    'isRequired' => true,
                                    'minimumResultsForSearch' => 0,
                                ]" />
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css">
                                <x-forms.crm-single-select :fieldData="[
                                    'name' => 'situation_id',
                                    'hasLabel' => true,
                                    'label' => trans('messages.properties.Property_Situation') . ':',
                                    'id' => 'situation_id',
                                    'options' => $situations,
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'placeholder' => trans('messages.properties.Property_Situation'),
                                    'isRequired' => true,
                                ]" />
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css mt-3">

                                <div class="copiesSelector" style="display: flex; align-items: center;">
                                    <span>Number of Copies:</span>
                                    <button type="button" class="decreaseCopiesBtn">-</button>
                                    <input type="number" name="copies" value="1" min="1"
                                        style="text-align: center; width: 50px;" readonly>
                                    <button type="button" class="increaseCopiesBtn">+</button>
                                </div>

                            </div>
                            <div class="col-md-12 mt-30 d-flex justify-content-end flex-wrap gap-2">
                                <button type="button"
                                    class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 small-button gardient-button addNewUnitBtn">
                                    Add New Unit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Bulk Import -->
    <div class="modal fade" id="bulk_import" tabindex="-1" role="dialog" aria-labelledby="bulk_importLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_five " role="document">
            <div class="modal-content modal-content-file">
                <div class="modal-header border-0 modal-header_file pb-0">
                    <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="bulk_importLabel">Bulk Import</h5>
                    <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                    </button>
                </div>
                <div class="modal-body modal-header_file">
                    <button class="download_format" onClick="window.open('{{ $csvFormatFilePath }}','_blank')">
                        <i class="icon-edit me-2"></i>
                        Download CSV format
                        <i class="icon-edit ms-4"></i>
                    </button>
                    @php
                        $bulkUploadMessage =
                            "<img src='" .
                            asset('img/upload.svg') .
                            "' class='upload'> " .
                            trans('Upload or Drop file over here') .
                            '. <br><small>' .
                            trans('Bulk import units using csv file') .
                            '</small>';
                    @endphp
                    {{-- use multi image upload --}}
                    <div class="row">
                        <div class="col-md-12 common-label-css mt-3">
                            <x-forms.crm-multi-image-upload :fieldData="[
                                'name' => 'csv_format',
                                'hasLabel' => false,
                                'label' => trans('Csv Format') . ':',
                                'id' => 'csv_format',
                                'attributes' => [],
                                'hasHelpText' => false,
                                'help' => 'Please enter your name',
                                'maxFiles' => 1,
                                'isRequired' => true,
                                'addRemoveLinks' => true,
                                'dictDefaultMessage' => $bulkUploadMessage,
                                'acceptedFiles' => 'image/*',
                                'uploadedFiles' => collect([]),
                            ]" />
                        </div>
                    </div>

                    {{-- second-modal --}}
                    <!-- <button type="button" style=""
                                                            class="Gradient_button small-button  border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white Add-New-To-DoList"
                                                            onclick="openMyModal2()">
                                                            Import process running!
                                                        </button> -->


                </div>
            </div>
        </div>
    </div>
    <!-- Import Process -->

    <div class="modal " id="running_process" data-bs-backdrop="static" style="display: none;background: #00000040;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_eight" role="document">
            <div class="modal-content modal-content-file">
                {{-- modal-header --}}
                <div class="modal-header border-0 modal-header_file pb-0">
                    <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="dataFilterModalLabel">Import process running!</h4>
                    <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                    </button>

                </div>
                {{-- modal-body --}}
                <div class="modal-body modal-header_file">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12 col-sm-12">
                            <div class="modal_progress">
                                <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                    style="--value:20"></div>
                            </div>
                            <p class="color-black text-14 text-center">3 units imported out of 20</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal " id="property_lead_sure" data-bs-backdrop="static" style="display: none;background: #00000040;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_eight" role="document">
            <div class="modal-content  border-r-8 border-0 b-color-white p-30">
                <div class="modal-header border-0 justify-content-end p-0">
                    <button type="button" class="close b-color-transparent cursor-pointer" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path id="Union" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 10.0544L2.05438 16L0 13.9456L5.94561 8L6.64978e-06 2.05438L2.05439 0L8 5.94561L13.9456 0L16 2.05438L10.0544 8L16 13.9456L13.9456 16L8 10.0544Z"
                                    fill="black" fill-opacity="0.5"></path>
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="modal-body p-0 text-center mt10">
                    <div class="modal-body-text">
                        <div class="text-18 lineheight-22 font-weight-700 letter-s-48 color-primary pt-10 unit_message">
                            Assign</div>
                        <div
                            class="text-18 lineheight-22 font-weight-700 letter-s-48 color-b-blue opacity-8 pt-30 modal-message ">
                            Selected all properties will be <span id="unit_heading"></span>
                        </div>
                        <div class="modal-confirm" style="">

                            <div
                                class="text-18 lineheight-22 font-weight-700 letter-s-48 color-primary pt-10 modal-confirm-message">
                                Are you sure?</div>
                            <div
                                class="text-12 font-weight-400 lineheight-15 opacity-5 color-black pt-20 modal-confirm-secondary-text ">
                                Property Reference: <span id=""></span></div>
                            <div class="property_reference_id">

                            </div>
                            <div class="d-flex align-items-center justify-content-center gap-3 mt-10">
                                <button type="button"
                                    class="gardient-button small-button border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white"
                                    id="send_inquiry_btn" data-name="">Yes</button>
                                <button type="button"
                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                    data-bs-dismiss="modal">No</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ $result->legal_document ?? '' }}" download="{{ $result->legal_document ?? '' }}"
        class="download_legal_document gradiant-hover border-0 small-button border-r-8  text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center">
        <img src="https://www.p4staging.inmoconnect.com/img/toolbar_download.svg" alt="image" class="me-2">
        Download legal Document</a>
    <a href="{{ $result->brochure ?? '' }}" download
        class="download_brochure gradiant-hover border-0  small-button border-r-8  text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center">
        <img src="{{ asset('img/toolbar_download.svg') }}" alt="image" class="me-2">
        Download Brochure</a>


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
                        @include('modules.developments.includes.create_edit_development')
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

    @push('scripts')
        <script
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=places"
            defer></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.umd.js"></script>

        <script>
            var loadManageUrl = "{{ route(routeNamePrefix() . 'developments.manage', $result->id) }}";
            var subtypeSelectedTypeId = "{{ route(routeNamePrefix() . 'properties.subtype', ':typeId') }}";
            var routeUrlAddUnit = "{{ route(routeNamePrefix() . 'developments.addUnit', $result->id) }}";
            var developmentDeleteUrl = "{{ route(routeNamePrefix() . 'developments.destroy', ':id') }}";
            var developmentDeleteUnitUrl = "{{ route(routeNamePrefix() . 'developments.unit.destroy', ':id') }}";
            var developmentDeleteConfirmText = "{{ trans('You Are Attempting To Delete Development') }}";
            var areYouSureTextConfirmPopup = "{{ trans('messages.confirm_popup.Are_you_sure') }}";
            var deleteTextConfirmPopup = "{{ trans('messages.confirm_popup.Delete') }}";
            var routeUrlUpdateDevelopment = "{{ route(routeNamePrefix() . 'developments.update', $result->id) }}";
        </script>
        @if (!empty(request()->action) && request()->action == 'edit')
            <script>
                $(document).ready(function() {
                    $('#editDevelopmentModal').modal('show');
                });
            </script>
        @endif
        <script src="{{ asset('assets/js/modules/developments/manage.js') }}"></script>
    @endpush
@endsection
