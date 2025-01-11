@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.sidebar.Property_Search') }} Inmoconnect
        @endsection

        <div class="overlay" id="overlay"></div>
        <div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                {{-- breadcrumb --}}
                <div class="empty-search-header">
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                                Development
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-breadcrumb --}}

                {{-- prize --}}
                <div class="row mb-30">
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <!-- property-name -->
                        <div class="property-header-details d-flex align-items-center justify-content-between">
                            <div class="property-details property-name">
                                <h3 class="text-18 font-weight-700 lineheight-22 color-b-blue letter-s-48">Awesome Interior
                                    Apartment
                                </h3>
                            </div>
                        </div>

                        <div class="property-detail-share d-flex justify-content-between align-items-center pt-12">
                            <div class="property-details d-grid d-sm-flex flex-column gap-12 main-card-two-small">
                                <!-- address -->
                                <div
                                    class="property-address main-card-two-small-one d-flex align-items-start gap-1 position-relative">

                                    <i class="icon-location text-14 d-flex align-items-center gap-1"></i>
                                    <p class="text-14 color-b-blue font-weight-400 lineheight-18">TechAlmas LLP, Old High
                                        Court Road, near Loha Bhavan, Shreyas Colony, Navrangpura, Ahmedabad, Gujarat, India
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="pt-12">
                            <p class="text-14 font-weight-400 lineheight-18 color-black">By <span class="color-primary">Harmony
                                    Real Estate</span></p>
                        </div>
                    </div>

                    <div
                        class="gap-3 col-sm-4 col-md-4 col-lg-4 d-flex flex-column justify-content-between align-items-start align-items-sm-end mt-4 pt-4 mt-sm-0 pt-sm-0">
                        <!-- property-price -->
                        <div class="property-details">
                            <p class="text-32 font-weight-700 line-height-40 etter-s-64 color-b-blue position-relative">
                                <span class="propert-price-blurs">€100,000 - €350,000</span>
                            </p>
                        </div>

                        <!-- buttons -->
                        <div class="row">
                            <div class="col-md-12 d-flex gap-2 gap-md-3">
                                <button type="button" class=" icon-share text-24 b-color-transparent color-primary"
                                    id="editBtn">
                                </button>
                                <button type="button" class=" icon-edit text-24 b-color-transparent color-primary"
                                    id="editBtn">
                                </button>
                                <button type="button" class=" icon-Delete text-24 b-color-transparent color-primary"
                                    id="editBtn">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-prize --}}

                {{-- Property Description --}}
                <div class="dashboard-card_one box-shadow-one b-color-white border-r-8  p-20">
                    <div class="card-text-header text-18 font-weight-700 lineheight-22 color-primary " id="">Property
                        Description:
                    </div>
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue pt-3">
                        This 3-bed with a loft, 2-bath home in the gated community of The Hideout has it all. From the open
                        floor plan to the abundance of light from the windows, this home is perfect for entertaining. The living
                        room and dining room have vaulted ceilings and a beautiful fireplace. You will love spending time on the
                        deck taking in the beautiful views. In the kitchen, you'll find stainless steel appliances and a tile
                        backsplash, as well as a breakfast bar.
                    </div>
                </div>
                {{-- end Property Description --}}

                {{-- Manage Unit  --}}
                <div class="dashboard-card_one box-shadow-one b-color-white border-r-8  p-20 mt-20">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="card-text-header text-18 font-weight-700 lineheight-22 color-primary " id="">
                            Property
                            Description:
                        </div>
                        <div class=" d-flex justify-content-start align-items-center">
                            <div class="form-group position-relative gap-12 d-flex align-items-center">
                                <button type="button"
                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                    data-toggle="modal">
                                    Add Unit</button>
                                <button type="button"
                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                    data-toggle="modal" data-target="#bulk_import">
                                    Bulk Import</button>
                            </div>
                        </div>
                    </div>
                    <div class="upload_property-table mt-20">
                        <table id="" class="display dashboard_table dashboard_edit_one table-bottom-border"
                            style="width:100%; ">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkbox" class="checkbox  fileCheckbox" data-id="23">
                                    </th>
                                    <th>Refrance Number</th>
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
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone  fileCheckbox"
                                            data-id="23"></td>
                                    <td>A-001</td>
                                    <td>Apartment</td>
                                    <td>300 m<sup>2</sup></td>
                                    <td class="table_prize">€1000</td>
                                    <td class="change_active">
                                        <button data-toggle="modal" data-target="#add_unit" type="button">
                                            <span class="span_pending span_complate_one">
                                                Sold
                                            </span>
                                        </button>
                                    </td>
                                    <td class="d-flex align-items-center gap-3 justify-content-end"><button
                                            class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-eye icon-20 color-b-blue "></i></button></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone  fileCheckbox"
                                            data-id="23"></td>
                                    <td>A-001</td>
                                    <td>Apartment</td>
                                    <td>300 m<sup>2</sup></td>
                                    <td class="table_prize">€1000</td>
                                    <td class="change_active">
                                        <a href="#">
                                            <span class="span_pending span_complate_one">
                                                Sold
                                            </span>
                                        </a>
                                    </td>
                                    <td class="d-flex align-items-center gap-3 justify-content-end"><button
                                            class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-eye icon-20 color-b-blue "></i></button></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone  fileCheckbox"
                                            data-id="23"></td>
                                    <td>A-001</td>
                                    <td>Apartment</td>
                                    <td>300 m<sup>2</sup></td>
                                    <td class="table_prize">€1000</td>
                                    <td class="change_active">
                                        <a href="#">
                                            <span class="span_pending span_complate_one">
                                                Sold
                                            </span>
                                        </a>
                                    </td>
                                    <td class="d-flex align-items-center gap-3 justify-content-end"><button
                                            class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-eye icon-20 color-b-blue "></i></button></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone  fileCheckbox"
                                            data-id="23"></td>
                                    <td>A-001</td>
                                    <td>Apartment</td>
                                    <td>300 m<sup>2</sup></td>
                                    <td class="table_prize">€1000</td>
                                    <td class="change_active">
                                        <a href="#">
                                            <span class="span_pending span_complate_one">
                                                Sold
                                            </span>
                                        </a>
                                    </td>
                                    <td class="d-flex align-items-center gap-3 justify-content-end"><button
                                            class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-eye icon-20 color-b-blue "></i></button></td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone  fileCheckbox"
                                            data-id="23"></td>
                                    <td>A-001</td>
                                    <td>Apartment</td>
                                    <td>300 m<sup>2</sup></td>
                                    <td class="table_prize">€1000</td>
                                    <td class="change_active">
                                        <a href="#">
                                            <span class="span_active span_complate_one">
                                                Published
                                            </span>
                                        </a>
                                    </td>
                                    <td class="d-flex align-items-center gap-3 justify-content-end"><button
                                            class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-eye icon-20 color-b-blue "></i></button>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-edit icon-20 color-b-blue "></i></button>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-Delete icon-20 color-b-blue "></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone  fileCheckbox"
                                            data-id="23"></td>
                                    <td>A-001</td>
                                    <td>Apartment</td>
                                    <td>300 m<sup>2</sup></td>
                                    <td class="table_prize">€1000</td>
                                    <td class="change_active">
                                        <a href="#">
                                            <span class="span_active span_complate_one">
                                                Published
                                            </span>
                                        </a>
                                    </td>
                                    <td class="d-flex align-items-center gap-3 justify-content-end"><button
                                            class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-eye icon-20 color-b-blue "></i></button>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-edit icon-20 color-b-blue "></i></button>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-Delete icon-20 color-b-blue "></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone  fileCheckbox"
                                            data-id="23"></td>
                                    <td>A-001</td>
                                    <td>Apartment</td>
                                    <td>300 m<sup>2</sup></td>
                                    <td class="table_prize">€1000</td>
                                    <td class="change_active">
                                        <a href="#">
                                            <span class="span_active span_complate_one">
                                                Published
                                            </span>
                                        </a>
                                    </td>
                                    <td class="d-flex align-items-center gap-3 justify-content-end"><button
                                            class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-eye icon-20 color-b-blue "></i></button>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-edit icon-20 color-b-blue "></i></button>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-Delete icon-20 color-b-blue "></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone  fileCheckbox"
                                            data-id="23"></td>
                                    <td>A-001</td>
                                    <td>Apartment</td>
                                    <td>300 m<sup>2</sup></td>
                                    <td class="table_prize">€1000</td>
                                    <td>
                                        <span class="span_complete">Draft</span>
                                    </td>
                                    <td class="d-flex align-items-center gap-3 justify-content-end"><button
                                            class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-eye icon-20 color-b-blue "></i></button>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-edit icon-20 color-b-blue "></i></button>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-Delete icon-20 color-b-blue "></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone  fileCheckbox"
                                            data-id="23"></td>
                                    <td>A-001</td>
                                    <td>Apartment</td>
                                    <td>300 m<sup>2</sup></td>
                                    <td class="table_prize">€1000</td>
                                    <td>
                                        <span class="span_complete">Draft</span>
                                    </td>
                                    <td class="d-flex align-items-center gap-3 justify-content-end"><button
                                            class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-eye icon-20 color-b-blue "></i></button>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-edit icon-20 color-b-blue "></i></button>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-Delete icon-20 color-b-blue "></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox" class="checkbox checkboxone  fileCheckbox"
                                            data-id="23"></td>
                                    <td>A-001</td>
                                    <td>Apartment</td>
                                    <td>300 m<sup>2</sup></td>
                                    <td class="table_prize">€1000</td>
                                    <td>
                                        <span class="span_complete">Draft</span>
                                    </td>
                                    <td class="d-flex align-items-center gap-3 justify-content-end"><button
                                            class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-eye icon-20 color-b-blue "></i></button>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-edit icon-20 color-b-blue "></i></button>
                                        <button class="b-color-transparent removeCustomerInviteBtn" data-id="4"
                                            data-name="Gabriel John" data-toggle="modal" data-target="#customer_details"> <i
                                                class="icon-Delete icon-20 color-b-blue "></i></button>
                                    </td>
                                </tr>


                            </tbody>

                        </table>
                    </div>
                </div>
                {{-- Manage Unit --}}

                {{-- Project Floor Plans --}}
                <div class="dashboard-card_one box-shadow-one b-color-white border-r-8  p-20 mt-20">
                    <div class="card-text-header text-18 font-weight-700 lineheight-22 color-primary " id="">Project
                        Floor Plans:
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-6">
                            <div class="project_floor">
                                <img src="{{ asset('img/project_floor_plan.svg') }}" alt="image" class="#">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="project_floor">
                                <img src="{{ asset('img/project_floor_plan.svg') }}" alt="image" class="#">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End-Project Floor Plans  --}}


                {{-- add-unit --}}
                <div class="modal fade" id="add_unit" tabindex="-1" role="dialog" aria-labelledby="add_unitLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_five " role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="add_unitLabel">Mark as Sold</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <h5
                                    class="text-18 lineheight-22 font-weight-700 letter-s-48 color-b-blue opacity-8 text-center">
                                    Selected all properties will be marked as sold</h5>
                                <h5 class="text-18 lineheight-22 font-weight-700 letter-s-48 color-primary pt-10 text-center">
                                    Are you sure?</h5>
                                <h4 class="text-14 lineheight-24 color-b-blue opacity-5 text-center pt-4">Property ID:</h4>
                                <h4 class="text-14 lineheight-24 color-b-blue text-center ">A-0001</h4>
                                <h4 class="text-14 lineheight-24 color-b-blue text-center ">A-0002</h4>
                                <h4 class="text-14 lineheight-24 color-b-blue text-center ">A-0003</h4>
                                <h4 class="text-14 lineheight-24 color-b-blue text-center ">A-0004</h4>
                                <div class="d-flex justify-content-center gap-3">
                                    <button type="button"
                                        class="complete_project Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white">
                                        Yes</button>
                                    <button type="button"
                                        class="delete_project small-button border-r-8 text-14 font-weight-700 lineheight-18 deleteProjectBtn">
                                        No
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- add-unit --}}
                <div class="modal fade" id="bulk_import" tabindex="-1" role="dialog" aria-labelledby="bulk_importLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_five " role="document">
                        <div class="modal-content modal-content-file">
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="bulk_importLabel">Bulk Import</h5>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>
                            </div>
                            <div class="modal-body modal-header_file">
                                <div class="download_format">
                                    <i class="icon-edit me-2"></i>
                                    Download CSV format
                                    <i class="icon-edit ms-4"></i>
                                </div>

                                {{-- use multi image upload --}}
                                <div class="row">
                                    <div class="col-md-12 common-label-css mt-3">
                                        <x-forms.crm-multi-image-upload :fieldData="[
                                            'name' => 'cover_image',
                                            'hasLabel' => true,
                                            'label' => trans('messages.properties.cover_images') . ':',
                                            'id' => 'cover_image',
                                            'attributes' => [],
                                            'hasHelpText' => false,
                                            'help' => 'Please enter your name',
                                            'maxFilesize' => 10,
                                            'maxFiles' => 1,
                                            'isRequired' => true,
                                            'addRemoveLinks' => true,
                                            'acceptedFiles' => 'image/*',
                                            'uploadedFiles' => !empty($property->reference)
                                                ? collect([$coverImageInstance])
                                                : collect([]),
                                        ]" />
                                    </div>
                                </div>

                                {{-- second-modal --}}
                                <button type="button" style=""
                                    class="Gradient_button small-button  border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white Add-New-To-DoList"
                                    onclick="openMyModal2()">
                                    Import process running!
                                </button>


                            </div>
                        </div>
                    </div>
                </div>

                {{-- add-to-do-list only date --}}
                <div class="modal " id="running_process" data-bs-backdrop="static"
                    style="display: none;background: #00000040;" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_eight" role="document">
                        <div class="modal-content modal-content-file">
                            {{-- modal-header --}}
                            <div class="modal-header border-0 modal-header_file pb-0">
                                <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                    id="dataFilterModalLabel">Import process running!</h4>
                                <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i
                                            class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                                </button>

                            </div>
                            {{-- modal-body --}}
                            <div class="modal-body modal-header_file">
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12 col-sm-12">
                                        <div class="modal_progress">
                                            <div role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100" style="--value:20"></div>
                                        </div>
                                        <p class="color-black text-14 text-center">3 units imported out of 20</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @push('scripts')

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

                    <script>
                        function openMyModal2() {
                            let myModal = new
                            bootstrap.Modal(document.getElementById('running_process'), {});
                            myModal.show();
                        }
                    </script>

                @endpush
            @endsection
