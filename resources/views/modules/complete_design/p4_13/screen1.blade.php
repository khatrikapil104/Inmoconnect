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
                                Property Listing
                            </div>
                        </div>
                        <div class="header-right-button_one d-flex align-items-center gap-3">
                            <div
                                class="small-button header-right-button border-r-8 opacity-5 border-blue d-flex justify-content-center align-items-center font-weight-700 text-14">
                                <i class="icon-bulk_import me-2 icon-16"></i>
                                <span>Bulk Import</span>
                            </div>
                            <div class="small-button header-right-button border-r-8 opacity-5 border-blue d-flex justify-content-center align-items-center text-14 font-weight-700"
                              >
                                <i class="icon-add_new_property me-2 icon-16"></i>
                                <span> Add New Property</span>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- end-breadcrumb --}}


                {{-- tabs --}}
                <ul class="tabs" style="margin-bottom:20px;">
                    <li class="tab-link current text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                        data-tab="tab-1">My Properties </li>
                    <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                        data-tab="tab-2">Company Properties</li>
                    <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                        data-tab="tab-3">Collaborated Properties</li>
                </ul>


                {{-- My Properties --}}
                <div id="tab-1" class="tab-content_one current">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <div class="checkbox_property d-flex align-items-center gap-3">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                            <span class="color-primary text-14 font-weight-400 lineheight-18 text-capitalize">Select All</span>
                        </div>
                        <button type="button"
                            class="opacity-3 delete_project small-button border-r-8 text-14 font-weight-700 lineheight-18 deleteProjectBtn"
                            data-toggle="modal" data-target="#property_collaboration_all">
                            Collaboration
                        </button>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-20">
                        <div class="checkbox_property">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        </div>
                        {{-- card --}}
                        <div class="main-card border-r-8 p-20  b-color-white w-100">
                            <div class="main-card_flex d-block d-sm-flex align-center gap-2 gap-sm-4">

                                {{-- image --}}
                                <div class="main-card-left">
                                    <div class="main-card-img">
                                        <img src="http://127.0.0.1:8000/img/default-property.jpg" alt="image">
                                    </div>
                                </div>
                                <div class="d-flex flex-column w-100">
                                    <div class="row">

                                        {{-- text --}}
                                        <div class="col-lg-9">
                                            <div
                                                class="gap-12 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                                <div class="d-flex flex-column gap-2">
                                                    <div class="d-flex align-items-center gap-2 mb-1">
                                                        <div
                                                            class="property-price text-20 font-weight-700 lineheight-24 color-primary">
                                                            € 144,850.00</div>
                                                    </div>
                                                    <div class="main-card-bottom">
                                                        <div
                                                            class="property-title property-h-responsive text-16 font-weight-700 lineheight-20 text-capitalize color-primary">
                                                            Awesome Interior Apartment
                                                        </div>
                                                    </div>

                                                    <div class="d-flex gap-2 align-items-start ">
                                                        <i class=" icon-location text-20 color-b-blue"></i>
                                                        <div
                                                            class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            06600 Antibes, France</div>

                                                    </div>
                                                    <div class="d-flex gap-2 gap-md-3">
                                                        <div class="d-flex gap-2 align-items-start">
                                                            <i class="icon-my_profile text-20  color-b-blue "></i>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                Agent7</div>
                                                        </div>
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                16989-231042123</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2 gap-md-3">
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span class=" icon-house_scale text-20  color-b-blue"></span>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                1,140.00 Sqft</div>
                                                        </div>
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span class="icon-bed text-20  color-b-blue"></span>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                2</div>
                                                        </div>
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span class="icon-bathroom text-20  color-b-blue"></span>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                2</div>
                                                        </div>
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span class="icon-floor text-20  color-b-blue"></span>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                2</div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- buttons --}}
                                        <div class="col-lg-3 mt-3 mt-lg-0">
                                            <div
                                                class=" h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                                <button type="button"
                                                    class="text-14 font-weight-400 lineheight-18 border-r-8 b-color-primary color-white-grey viewPropertyBtn"
                                                    id="viewPropertyBtn">
                                                    View Property
                                                </button>
                                                <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                                    <button type="button"
                                                        class=" icon-share text-20 b-color-transparent color-b-blue"
                                                        id="deleteBtn">
                                                    </button>
                                                    <button type="button"
                                                        class=" icon-edit text-20 b-color-transparent color-b-blue"
                                                        id="deleteBtn">
                                                    </button>
                                                    <button type="button"
                                                        class=" icon-Delete text-20 b-color-transparent color-b-blue"
                                                        id="deleteBtn">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- bottom-text --}}
                                    <div class="border_property-card  mt-3 pt-20">
                                        <div class="row w-100 align-items-center">
                                            <div class="col-lg-6">
                                                <div class="d-flex align-items-center gap-12">
                                                    <img src="{{ asset('img/real-inmo-sidebar.svg') }}" alt="image"
                                                        class="">
                                                    <h6 class="text-14 font-weight-700 color-b-blue">Realinmo</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="d-flex justify-content-end align-items-center gap-3">
                                                    <p class="text-14 color-primary font-weight-400 lineheight-18">Open For
                                                        Collaboration</p>
                                                    <button
                                                        class="event-checkbox property_checkbox-card d-flex b-color-transparent"
                                                        data-toggle="modal" data-target="#property_collaboration">
                                                        <label class="switch">
                                                            <input type="checkbox" name="is_project_base_event"
                                                                value="1" class="form-control ">
                                                            <span class="slider">

                                                            </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3 mb-20">
                        <div class="checkbox_property">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        </div>
                        {{-- card --}}
                        <div class="main-card border-r-8 p-20  b-color-white w-100">
                            <div class="main-card_flex d-block d-sm-flex align-center gap-2 gap-sm-4">

                                {{-- image --}}
                                <div class="main-card-left">
                                    <div class="main-card-img">
                                        <img src="http://127.0.0.1:8000/img/default-property.jpg" alt="image">
                                    </div>
                                </div>
                                <div class="d-flex flex-column w-100">
                                    <div class="row">

                                        {{-- text --}}
                                        <div class="col-lg-9">
                                            <div
                                                class="gap-12 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                                <div class="d-flex flex-column gap-2">
                                                    <div class="d-flex align-items-center gap-2 mb-1">
                                                        <div
                                                            class="property-price text-20 font-weight-700 lineheight-24 color-primary">
                                                            € 144,850.00</div>
                                                    </div>
                                                    <div class="main-card-bottom">
                                                        <div
                                                            class="property-title property-h-responsive text-16 font-weight-700 lineheight-20 text-capitalize color-primary">
                                                            Awesome Interior Apartment
                                                        </div>
                                                    </div>

                                                    <div class="d-flex gap-2 align-items-start ">
                                                        <i class=" icon-location text-20 color-b-blue"></i>
                                                        <div
                                                            class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            06600 Antibes, France</div>

                                                    </div>
                                                    <div class="d-flex gap-2 gap-md-3">
                                                        <div class="d-flex gap-2 align-items-start">
                                                            <i class="icon-my_profile text-20  color-b-blue "></i>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                Agent7</div>
                                                        </div>
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                16989-231042123</div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-2 gap-md-3">
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span class=" icon-house_scale text-20  color-b-blue"></span>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                1,140.00 Sqft</div>
                                                        </div>
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span class="icon-bed text-20  color-b-blue"></span>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                2</div>
                                                        </div>
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span class="icon-bathroom text-20  color-b-blue"></span>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                2</div>
                                                        </div>
                                                        <div class="d-flex gap-2 align-items-center">
                                                            <span class="icon-floor text-20  color-b-blue"></span>
                                                            <div
                                                                class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                                2</div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- buttons --}}
                                        <div class="col-lg-3 mt-3 mt-lg-0">
                                            <div
                                                class=" h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                                <button type="button"
                                                    class="text-14 font-weight-400 lineheight-18 border-r-8 b-color-primary color-white-grey viewPropertyBtn"
                                                    id="viewPropertyBtn">
                                                    View Property
                                                </button>
                                                <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                                    <button type="button"
                                                        class=" icon-share text-20 b-color-transparent color-b-blue"
                                                        id="deleteBtn">
                                                    </button>
                                                    <button type="button"
                                                        class=" icon-edit text-20 b-color-transparent color-b-blue"
                                                        id="deleteBtn">
                                                    </button>
                                                    <button type="button"
                                                        class=" icon-Delete text-20 b-color-transparent color-b-blue"
                                                        id="deleteBtn">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- bottom-text --}}
                                    <div class="border_property-card  mt-3 pt-20">
                                        <div class="row w-100 align-items-center">
                                            <div class="col-lg-6">
                                                <div class="d-flex align-items-center gap-12">
                                                    <img src="{{ asset('img/real-inmo-sidebar.svg') }}" alt="image"
                                                        class="">
                                                    <h6 class="text-14 font-weight-700 color-b-blue">Realinmo</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="d-flex justify-content-end align-items-center gap-3">
                                                    <p class="text-14 color-primary font-weight-400 lineheight-18">Open For
                                                        Collaboration</p>
                                                    <div class="event-checkbox property_checkbox-card d-flex">
                                                        <label class="switch">
                                                            <input type="checkbox" name="is_project_base_event"
                                                                value="1" class="form-control ">
                                                            <span class="slider">

                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Company Properties --}}
                <div id="tab-2" class="tab-content_one">
                    <div class="b-color-white box-shadow-one border-r-8  p-30 ">
                        <div class="dashboard-card_three b-color-white border-r-8">
                            <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2 flex-wrap">
                                <div class="search_button">
                                    <div class="form-group position-relative">
                                        <div class="input-group input-group-sm dashboard_input-search">
                                            <span
                                                class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                            <input type="text" name="search_input_property"
                                                class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                                placeholder="{{ trans('messages.agent-dashboard.search_here') }}"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="search-select common-label-css without_checkbox mt-n3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'sort_by_property',
                                        'hasLabel' => false,
                                        'label' => trans('messages.search_filter.Sort_By'),
                                        'id' => 'sort_by_property',
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
                            <div class="table_customer-three pt-20">
                                <table id="example_one" class="display  dashboard_edit_one table-bottom-border"
                                    style="width:100%; ">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Property ID</th>
                                            <th>Property Title</th>
                                            <th>Add Date</th>
                                            <th>Added By</th>
                                            <th>City</th>
                                            <th>Price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableData">
                                        <tr>
                                            <td> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36"
                                                    height="36" alt="image" class="border-r-4"></td>
                                            <td><span class="ms-2">0001234</span></td>
                                            <td class="title_wrap table-text-overflow"><span>TY35 Avenue GGLondon Center
                                                    TY35
                                                    Avenue GGLondon
                                                    Center </span></td>
                                            <td>17/8/2023 <br />12:24 AM</td>
                                            <td>Ivana Tinkle</td>
                                            <td>Álava</td>
                                            <td class="table_prize">Є100,000</td>
                                            <td> <a href="#"> <i class=" icon-eye icon-20 color-b-blue "></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <img src="http://127.0.0.1:8000/img/default-user.jpg" width="36"
                                                    height="36" alt="image" class="border-r-4"></td>
                                            <td><span class="ms-2">0001234</span></td>
                                            <td class="title_wrap table-text-overflow"><span>TY35 Avenue GGLondon Center
                                                    TY35
                                                    Avenue GGLondon
                                                    Center </span></td>
                                            <td>17/8/2023 <br />12:24 AM</td>
                                            <td>Ivana Tinkle</td>
                                            <td>Álava</td>
                                            <td class="table_prize">Є100,000</td>
                                            <td> <a href="#"> <i class=" icon-eye icon-20 color-b-blue "></i></a>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Collaborated Properties --}}
                <div id="tab-3" class="tab-content_one">
                    {{-- card --}}
                    <div class="main-card border-r-8 p-20  b-color-white w-100 mb-20">
                        <div class="main-card_flex d-block d-sm-flex align-center gap-2 gap-sm-4">

                            {{-- image --}}
                            <div class="main-card-left">
                                <div class="main-card-img">
                                    <img src="http://127.0.0.1:8000/img/default-property.jpg" alt="image">
                                </div>
                            </div>
                            <div class="d-flex flex-column w-100">
                                <div class="row">

                                    {{-- text --}}
                                    <div class="col-lg-9">
                                        <div
                                            class="gap-12 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                            <div class="d-flex flex-column gap-2">
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <div
                                                        class="property-price text-20 font-weight-700 lineheight-24 color-primary">
                                                        € 144,850.00</div>
                                                </div>
                                                <div class="main-card-bottom">
                                                    <div
                                                        class="property-title property-h-responsive text-16 font-weight-700 lineheight-20 text-capitalize color-primary">
                                                        Awesome Interior Apartment
                                                    </div>
                                                </div>

                                                <div class="d-flex gap-2 align-items-start ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        06600 Antibes, France</div>

                                                </div>
                                                <div class="d-flex gap-2 gap-md-3">
                                                    <div class="d-flex gap-2 align-items-start">
                                                        <i class="icon-my_profile text-20  color-b-blue "></i>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            Agent7</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-start">
                                                        <i class="icon-my_profile text-20  color-b-blue "></i>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            Agent7</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            16989-231042123</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-2 gap-md-3">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_scale text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            1,140.00 Sqft</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-bed text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-bathroom text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-floor text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            2</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- buttons --}}
                                    <div class="col-lg-3 mt-3 mt-lg-0">
                                        <div
                                            class=" h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                            <button type="button"
                                                class="text-14 font-weight-400 lineheight-18 border-r-8 b-color-primary color-white-grey viewPropertyBtn"
                                                id="viewPropertyBtn">
                                                View Property
                                            </button>
                                            <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                                <button type="button"
                                                    class=" icon-share text-20 b-color-transparent color-b-blue"
                                                    id="deleteBtn">
                                                </button>
                                                <button type="button"
                                                    class=" icon-edit text-20 b-color-transparent color-b-blue"
                                                    id="deleteBtn">
                                                </button>
                                                <button type="button"
                                                    class=" icon-Delete text-20 b-color-transparent color-b-blue"
                                                    id="deleteBtn">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- bottom-text --}}
                                <div class="border_property-card  mt-3 pt-20">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center gap-12">
                                                <img src="{{ asset('img/real-inmo-sidebar.svg') }}" alt="image"
                                                    class="">
                                                <h6 class="text-14 font-weight-700 color-b-blue">Realinmo</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center gap-3">
                                                <button type="button"
                                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                                    data-toggle="modal" data-target="#book_appointment">
                                                    <i class="icon-my_calender me-2 icon-20"></i>
                                                    Book Appointment</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- card --}}
                    <div class="main-card border-r-8 p-20  b-color-white w-100 mb-20">
                        <div class="main-card_flex d-block d-sm-flex align-center gap-2 gap-sm-4">

                            {{-- image --}}
                            <div class="main-card-left">
                                <div class="main-card-img">
                                    <img src="http://127.0.0.1:8000/img/default-property.jpg" alt="image">
                                </div>
                            </div>
                            <div class="d-flex flex-column w-100">
                                <div class="row">

                                    {{-- text --}}
                                    <div class="col-lg-9">
                                        <div
                                            class="gap-12 h-100 main-card-one-header d-flex flex-column justify-content-between">
                                            <div class="d-flex flex-column gap-2">
                                                <div class="d-flex align-items-center gap-2 mb-1">
                                                    <div
                                                        class="property-price text-20 font-weight-700 lineheight-24 color-primary">
                                                        € 144,850.00</div>
                                                </div>
                                                <div class="main-card-bottom">
                                                    <div
                                                        class="property-title property-h-responsive text-16 font-weight-700 lineheight-20 text-capitalize color-primary">
                                                        Awesome Interior Apartment
                                                    </div>
                                                </div>

                                                <div class="d-flex gap-2 align-items-start ">
                                                    <i class=" icon-location text-20 color-b-blue"></i>
                                                    <div
                                                        class="property-secondary location_address text-14 font-weight-400 lineheight-18 color-b-blue">
                                                        06600 Antibes, France</div>

                                                </div>
                                                <div class="d-flex gap-2 gap-md-3">
                                                    <div class="d-flex gap-2 align-items-start">
                                                        <i class="icon-my_profile text-20  color-b-blue "></i>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            Agent7</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-start">
                                                        <i class="icon-my_profile text-20  color-b-blue "></i>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            Agent7</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_id  text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            16989-231042123</div>
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-2 gap-md-3">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class=" icon-house_scale text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            1,140.00 Sqft</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-bed text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-bathroom text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            2</div>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="icon-floor text-20  color-b-blue"></span>
                                                        <div
                                                            class="property-secondary text-14 font-weight-400 lineheight-18 color-b-blue">
                                                            2</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- buttons --}}
                                    <div class="col-lg-3 mt-3 mt-lg-0">
                                        <div
                                            class=" h-100 button-header d-flex flex-row justify-content-between align-items-end flex-lg-column">
                                            <button type="button"
                                                class="text-14 font-weight-400 lineheight-18 border-r-8 b-color-primary color-white-grey viewPropertyBtn"
                                                id="viewPropertyBtn">
                                                View Property
                                            </button>
                                            <div class="button-icon d-flex gap-2 gap-md-3 justify-content-end">
                                                <button type="button"
                                                    class=" icon-share text-20 b-color-transparent color-b-blue"
                                                    id="deleteBtn">
                                                </button>
                                                <button type="button"
                                                    class=" icon-edit text-20 b-color-transparent color-b-blue"
                                                    id="deleteBtn">
                                                </button>
                                                <button type="button"
                                                    class=" icon-Delete text-20 b-color-transparent color-b-blue"
                                                    id="deleteBtn">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- bottom-text --}}
                                <div class="border_property-card  mt-3 pt-20">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center gap-12">
                                                <img src="{{ asset('img/real-inmo-sidebar.svg') }}" alt="image"
                                                    class="">
                                                <h6 class="text-14 font-weight-700 color-b-blue">Realinmo</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center gap-3">
                                                <button type="button"
                                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                                    data-toggle="modal" data-target="#cancelbutton">
                                                    <i class="icon-my_calender me-2 icon-20"></i>
                                                    Book Appointment</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- add-unit --}}
        <div class="modal fade" id="property_collaboration" tabindex="-1" role="dialog"
            aria-labelledby="property_collaborationLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_three " role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="property_collaborationLabel">Property Collaboration</h5>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details m-0 ">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="d-flex gap-12 align-items-center justify-content-around">
                                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked>
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" width="40"
                                                height="40" alt="image" class="border-r-4">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property ID </h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">RT48</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property Name</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">Awesome Interior
                                                Apartment
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property SQFT</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">1240 Sqft</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div
                                class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                                <div class="form-group position-relative">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Open
                                        Collaboration</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- add-unit --}}
        <div class="modal fade" id="property_collaboration_all" tabindex="-1" role="dialog"
            aria-labelledby="property_collaboration_allLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_three " role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="property_collaboration_allLabel">Property Collaboration</h5>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details mb-2 mt-0">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="d-flex gap-12 align-items-center justify-content-around">
                                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked>
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" width="40"
                                                height="40" alt="image" class="border-r-4">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property ID </h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">RT48</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property Name</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">Awesome Interior
                                                Apartment
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property SQFT</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">1240 Sqft</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details mb-2 mt-0">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="d-flex gap-12 align-items-center justify-content-around">
                                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked>
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" width="40"
                                                height="40" alt="image" class="border-r-4">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property ID </h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">RT48</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property Name</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">Awesome Interior
                                                Apartment
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property SQFT</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">1240 Sqft</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details mb-2 mt-0">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="d-flex gap-12 align-items-center justify-content-around">
                                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked>
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" width="40"
                                                height="40" alt="image" class="border-r-4">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property ID </h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">RT48</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property Name</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">Awesome Interior
                                                Apartment
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property SQFT</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">1240 Sqft</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details mb-2 mt-0">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="d-flex gap-12 align-items-center justify-content-around">
                                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked>
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" width="40"
                                                height="40" alt="image" class="border-r-4">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property ID </h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">RT48</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property Name</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">Awesome Interior
                                                Apartment
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property SQFT</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">1240 Sqft</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details mb-2 mt-0">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="d-flex gap-12 align-items-center justify-content-around">
                                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked>
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" width="40"
                                                height="40" alt="image" class="border-r-4">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property ID </h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">RT48</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property Name</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">Awesome Interior
                                                Apartment
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Property SQFT</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">1240 Sqft</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div
                                class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                                <div class="form-group position-relative">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Open
                                        Collaboration</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal-subagent --}}
        <div class="modal fade" id="book_appointment" tabindex="-1" role="dialog" aria-labelledby="book_appointmentLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered " role="document">
                <div class="modal-content modal-content-file">
                    <div class="modal-header border-0 modal-header_file pb-0">
                        <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                            id="book_appointmentLabel">Customer Details</h5>
                        <button type="button" class="close b-color-transparent" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                        </button>
                    </div>
                    <div class="modal-body modal-header_file">

                        <div class="row">
                            {{-- <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                                <h6 class="text-14 font-weight-700 color-primary">Personal Details</h6>
                            </div> --}}
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details m-0">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="d-flex gap-12">
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" width="40"
                                                height="40" alt="image" class="border-r-4">
                                            <div class="">
                                                <h6 class="text-14 font-weight-700 color-primary">Name:</h6>
                                                <h6 class="text-14 font-weight-400 color-b-blue pt-1">Mona Lott</h6>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Mobile Number:</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">+56 123 567 890</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Email:</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">monalott@gmail.om</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">City</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1">Almería</h6>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="d-flex">

                                    <div class="">
                                        <h6>Mobile Number:</h6>
                                        <h6>+56 123 567 890</h6>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details mb-0 mt-20">
                                <div class="  modal_margin-detail">
                                    <div class="cat_box-small-i">
                                        <h6 class="text-16 font-weight-700 color-primary text-center">Property Details</h6>
                                    </div>
                                    <div class="d-flex align-items-start justify-content-between pt-20">
                                        <img src="http://127.0.0.1:8000/img/default-user.jpg" width="60" height="60"
                                            alt="image" class="border-r-8">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">View
                                            Property</button>
                                    </div>
                                    <div class="row text-start">
                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Name</p>
                                                <p class="text-14 color-b-blue font-weight-400">Randeep Apartments</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property ID:</p>
                                                <p class="text-14 color-b-blue font-weight-400">DA12</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Listed As:</p>
                                                <p class="text-14 color-b-blue font-weight-400">For Sale</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Price:</p>
                                                <p class="text-14 color-b-blue font-weight-400">€1,000.00</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Type:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Apartment</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Subtype:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Ground Floor Apartment</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Total Size:</p>
                                                <p class="text-14 color-b-blue font-weight-400">300 m<sup>2</sup></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Bedroom:</p>
                                                <p class="text-14 color-b-blue font-weight-400">3</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Bathroom:</p>
                                                <p class="text-14 color-b-blue font-weight-400">3</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Property Status/Completion:
                                                </p>
                                                <p class="text-14 color-b-blue font-weight-400">Completed Construction </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Commission:</p>
                                                <p class="text-14 color-b-blue font-weight-400">1%</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Listing Agent(%):</p>
                                                <p class="text-14 color-b-blue font-weight-400">50%</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Listing Agent(€):</p>
                                                <p class="text-14 color-b-blue font-weight-400">€2,290.00</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Selling Agent(%):</p>
                                                <p class="text-14 color-b-blue font-weight-400">50%</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Selling Agent(€):</p>
                                                <p class="text-14 color-b-blue font-weight-400">€2,290.00</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pt-12">
                                        </div>
                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Address:</p>
                                                <p class="text-14 color-b-blue font-weight-400">Comandante Izarduy 57, Vilanova
                                                    Del Camí, La Guardia De Jaén, Barcelona, Biscay, 08788</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt-12">
                                            <div class="d-flex flex-column">
                                                <p class="text-14 color-primary font-weight-700">Description:</p>
                                                <p class="text-14 color-b-blue font-weight-400">This 3-bed with a loft, 2-bath
                                                    home in the gated community of The Hideout has it all. From the open floor
                                                    plan to the abundance of light from the windows, this home is perfect for
                                                    entertaining. The living room and dining room have vaulted ceilings and a
                                                    beautiful fireplace. You will love spending time on the deck taking in the
                                                    beautiful views. In the kitchen, you'll find stainless steel appliances and
                                                    a tile backsplash, as well as a breakfast bar.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12 common-label-css mt-2 p-0">
                                <x-forms.crm-textarea :fieldData="[
                                    'name' => 'description',
                                    'hasLabel' => false,
                                    'label' => trans('messages.properties.Description'),
                                    'id' => 'description',
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    //'help' => 'Please enter your name',
                                    'isRequired' => true,
                                    'useCkEditor' => true,
                                    'value' => $property->description ?? '',
                                ]" />
                            </div>
                            <div
                                class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css multiselect-select add-select agent-propety-data">
                                <x-forms.crm-multi-select-with-image :fieldData="[
                                    'name' => 'customer_id',
                                    'hasLabel' => true,
                                    'label' => trans('messages.add-events.Customer_Association'),
                                    'class' => 'select-icon',
                                    'id' => 'customer_id',
                                    'options' => $connectedCustomersArray ?? [],
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'placeholder' => trans('messages.add-events.Customer_Association'),
                                    'isRequired' => false,
                                    'attributes' =>
                                        !empty($request->type) && $request->type == 'view' ? ['disabled'] : [],
                                    'selected' => $result->selectedConnectedCustomers ?? [],
                                ]" />
                            </div>
                            <div class="col-12 col-sm-6 col-md-6  col-lg-6 common-label-css common-attachment">
                                <div class="form-group mt-3 position-relative ">
                                    <label for="vendor_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">
                                        {{ trans('messages.add-events.Add_Attachments') . ':' }}
                                        <span class="required">*</span>
                                    </label>
                                    <div class="form-group_file gap-3">
                                        <input type="file" name="files[]"
                                            class="input-file_choose eventAttachmentChooseBtn">
                                        <div
                                            class="attachment_scroll d-flex align-tems-center gap-3 flex-wrap w-100 eventAttachmentData">


                                        </div>

                                        <div class="invalid-feedback fw-bold"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 common-label-css add_event">
                                <x-forms.crm-single-select-with-image :fieldData="[
                                    'name' => 'action',
                                    'hasLabel' => true,
                                    'label' => trans('messages.add-events.Action') . ':',
                                    'id' => 'action',
                                    'options' => [
                                        'call' => [
                                            'label' => trans('messages.add-events.Action_call'),
                                            'type' => 'html',
                                            'image' => 'dashboard-round green-color me-2',
                                        ],
                                        'view_meeting' => [
                                            'label' => trans('messages.add-events.Action_View_Meetings'),
                                            'type' => 'html',
                                            'image' => 'dashboard-round blue-color me-2',
                                        ],
                                        'meeting' => [
                                            'label' => trans('messages.add-events.Action_Meeting'),
                                            'type' => 'html',
                                            'image' => 'dashboard-round red-color me-2',
                                        ],
                                    ],
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'placeholder' => trans('messages.add-events.Action'),
                                    'isRequired' => true,
                                    'selected' => !empty($result->action) ? $result->action : [],
                                ]" />
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 common-label-css add_event">
                                <x-forms.crm-single-select-with-image :fieldData="[
                                    'name' => 'priority',
                                    'hasLabel' => true,
                                    'label' => trans('messages.add-events.Priority') . ':',
                                    'id' => 'priority',
                                    'options' => [
                                        'low' => [
                                            'label' => trans('messages.add-events.priority_low'),
                                            'type' => 'html',
                                            'image' => ' icon-p_level_one  me-2',
                                        ],
                                        'medium' => [
                                            'label' => trans('messages.add-events.priority_medium'),
                                            'type' => 'html',
                                            'image' => ' icon-p_level_two me-2',
                                        ],
                                        'high' => [
                                            'label' => trans('messages.add-events.priority_high'),
                                            'type' => 'html',
                                            'image' => ' icon-P_level_three me-2',
                                        ],
                                    ],
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'placeholder' => trans('messages.add-events.Priority') . ':',
                                    'isRequired' => false,
                                    'selected' => !empty($result->priority) ? $result->priority : [],
                                ]" />
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 common-label-css add_event">
                                <x-forms.crm-single-select :fieldData="[
                                    'name' => 'reminder',
                                    'hasLabel' => true,
                                    'label' => trans('messages.add-events.Add_Reminder') . ':',
                                    'id' => 'reminder',
                                    'options' => [
                                        '15' => trans('messages.add-events.Reminder_fifteen_min'),
                                        '30' => trans('messages.add-events.Reminder_half_an_hour'),
                                        '60' => trans('messages.add-events.Reminder_hour'),
                                    ],
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'placeholder' => trans('messages.add-events.Add_Reminder'),
                                    'isRequired' => false,
                                    'selected' => !empty($result->reminder) ? $result->reminder : '',
                                ]" />
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 common-label-css add-event">
                                <x-forms.crm-datepicker :fieldData="[
                                    'name' => 'due_date',
                                    'hasLabel' => true,
                                    'label' => trans('messages.add-events.Due_Date') . ':',
                                    'inputId' => 'due_date',
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'help' => 'Please enter your name',
                                    'isRequired' => true,
                                    'isInputMask' => true,
                                    'startDate' => date('m-d-Y'),
                                    'value' => !empty($user->due_date) ? $user->due_date : '',
                                ]" />
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 common-label-css add_event">
                                <x-forms.crm-single-select :fieldData="[
                                    'name' => 'start_from',
                                    'hasLabel' => true,
                                    'label' => trans('messages.add-events.Start_From') . ':',
                                    'id' => 'start_from',
                                    'options' => $timeArray ?? [],
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'placeholder' => trans('messages.add-events.Start_From'),
                                    'isRequired' => true,
                                    'selected' => !empty($result->start_from) ? $result->start_from : '',
                                ]" />
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 common-label-css add_event">
                                <x-forms.crm-single-select :fieldData="[
                                    'name' => 'end_to',
                                    'hasLabel' => true,
                                    'label' => trans('messages.add-events.End_To') . ':',
                                    'id' => 'end_to',
                                    'options' => $timeArray ?? [],
                                    'attributes' => [],
                                    'hasHelpText' => false,
                                    'placeholder' => trans('messages.add-events.End_To'),
                                    'isRequired' => true,
                                    'selected' => !empty($result->end_to) ? $result->end_to : '',
                                ]" />
                            </div>


                            <div
                                class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                                <div class="form-group position-relative">
                                    <button type="button"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Send
                                        Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')

            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>

        @endpush
    @endsection
