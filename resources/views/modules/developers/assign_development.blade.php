@extends('layouts.app')
@section('content')
@section('title')
    Development Inmoconnect
@endsection

<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">
        {{-- breadcrumb  --}}
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                {{-- property-left --}}
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36"
                        onclick="window.open('{{ route(routeNamePrefix() . 'user.company-details') }}','_self')">My
                        Company
                    </div>
                    <div class="small-breadcrum text-20 lineheight-24 color-primary d-inline-block font-weight-400 letter-s-36 breadcrumb-top ps-4"
                        onclick="window.open('','_self')">XML Feed
                    </div>
                    <div class="small-breadcrum text-20 lineheight-24 color-primary d-inline-block font-weight-400 letter-s-36 breadcrumb-top ps-4"
                        onclick="window.open('','_self')">Assign Development
                    </div>
                </div>
                {{-- property-right --}}
                <div class="header-right-button_one d-flex align-items-center gap-3">
                </div>
            </div>
        </div>
        {{-- end-breadcrumb --}}


        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  p-30">
            <div class="search-dashboard d-flex flex-column flex-md-row gap-2 justify-content-between">
                <div class="d-flex flex-column flex-xl-row align-items-start align-items-xl-end justify-content-xl-center">
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
                    @if ($userDevelopments->isNotEmpty())
                        <div class="action_Short_by opacity-50">
                            <x-forms.crm-single-select :fieldData="[
                                'id' => 'select_development',
                                'options' => $userDevelopments ?? [],
                                'attributes' => ['disabled'],
                                'hasHelpText' => false,
                                'placeholder' => 'Select Development',
                                'isRequired' => false,
                            ]" />
                        </div>
                        <button type="button" id="assign_btn"
                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ms-2 updateDevelopementStatus"
                            disabled data-bs-toggle="modal" data-bs-target="#single_todolist"
                           >
                            Assign
                        </button>
                    @endif
                </div>
                <div class="search-select common-label-css without_checkbox">
                    <x-forms.crm-single-select :fieldData="[
                        'name' => 'table_sort_by',
                        'hasLabel' => true,
                        'label' => trans('messages.search_filter.Sort_By'),
                        'id' => 'table_sort_by',
                        'options' => [
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
            <div class="table_customer-three pt-10">
                <table id="example_one" class="display  dashboard_edit_one table-bottom-border" style="width:100%; ">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="assign-select-all"></th>
                            <th>Property Refrence</th>
                            <th>Property Title</th>
                            <th>Property Type</th>
                            <th>City</th>
                            <th>Property Size</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="tableData">
                        @include('components.tables.custom-table', [
                            'results' => $results,
                            'listingType' => 'assign-property-listing',
                        ])
                    </tbody>

                </table>
            </div>
        </div>

        <div class="paginationData mt-10">
            <!-- Custom Pagination File -->
            @include('components.tables.pagination')
        </div>

    </div>
</div>
<div class="modal " id="assign_properties_model" data-bs-backdrop="static" style="display: none;background: #00000040;"
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
                    <div
                        class="text-18 lineheight-22 font-weight-700 letter-s-48 color-primary pt-10 modal-confirm-message">
                        Assign Properties</div>
                    <div
                        class="text-18 lineheight-22 font-weight-700 letter-s-48 color-b-blue opacity-8 pt-30 modal-message">
                        You are assigning <span class="assigncount">5</span> Properties in Development <span
                            class="assigToDevelopment"></span></div>
                    <div class="modal-confirm" style="">

                        <div
                            class="text-18 lineheight-22 font-weight-700 letter-s-48 color-primary pt-10 modal-confirm-message">
                            Are you sure?</div>
                        <div
                            class="text-12 font-weight-400 lineheight-15 opacity-5 color-black pt-20 modal-confirm-secondary-text">
                            <span class="assigncount">5</span> Properties selected
                        </div>

                        <div class="text-12 font-weight-400 lineheight-15 color-black pt-20 reference_collection">
                        </div>


                        <div class="d-flex align-items-center justify-content-center gap-3 mt-10">
                            <button type="button" id="bulkAssignProperty"
                                class="gardient-button small-button border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white">Yes</button>
                            <button type="button"
                                class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center">No</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        developmentrouteurl = "{{ route(routeNamePrefix() . 'developments.index') }}";
        propertyAssignToDev = "{{ route(routeNamePrefix() . 'developer.propertyAssignToDevelopment') }}";
    </script>
    @if ($userDevelopments->isEmpty())
        <script>
            $(document).ready(function() {
                defaultAssign();
            });

            function defaultAssign() {
                show_message3("There is no development listed in your system yet. Please create a development",
                    "confirm", {
                        confirmMessage: "Create Development",
                        confirmBtnText: "Development",
                        confirmSecondaryMessage: "Action Required",
                        callback: function() {
                            window.location.href = developmentrouteurl;
                        },
                    });
            }
        </script>
    @endif
    <script>
        // function assign_property_model() {

        //     let myModal = new
        //     bootstrap.Modal(document.getElementById('assign_properties_model'), {});
        //     myModal.show();
        // }



        var selectedCheckboxesArr = [];
        $(document).on('change', '.assign-select-all', function(e) {
            if ($(this).prop('checked') == true) {
                $('.assign-property-checkbox').prop('checked', true);
                $('#select_development').attr('disabled', false);
                $('.action_Short_by').removeClass('opacity-50');
                $('#assign_btn').attr('disabled', false);

                $(".assign-property-checkbox").each(function(index, element) {
                    if ($(element).prop("checked")) {
                        selectedCheckboxesArr.push($(element).data("id"));
                    }
                });
            } else {
                $('.action_Short_by').addClass('opacity-50');
                $('.assign-property-checkbox').prop('checked', false);
                $('#select_development').attr('disabled', true);
                $('#assign_btn').attr('disabled', true);
            }

        });

        $(document).on("click", ".assign-property-checkbox", function(e) {
            let selectedCheckboxesArr = [];
            $(".assign-property-checkbox").each(function(index, element) {
                if ($(element).prop("checked")) {
                    selectedCheckboxesArr.push($(element).data("id"));
                }
            });

            if (selectedCheckboxesArr.length > 0) {
                $('.action_Short_by').removeClass('opacity-50');
                $("#select_development").attr('disabled', false);
                $('#assign_btn').attr('disabled', false);

            } else {
                $('.action_Short_by').addClass('opacity-50');
                $("#select_development").attr('disabled', true);
                $('#assign_btn').attr('disabled', true);

            }
        });




        $(document).on("click", "#assign_btn", function(e) {
            var selectedCheckboxesArr = [];
            var propertyReferenceArr = [];


            $(".assign-property-checkbox:checked").each(function(index, element) {
                selectedCheckboxesArr.push($(element).data("id"));
            });

            $(".assign-property-checkbox:checked").each(function(index, element) {
                propertyReferenceArr.push($(element).data("reference"));
            });

            var developmentSelectionValue = $("#select_development option:selected").text();
            var developmentValue = $("#select_development option:selected").val();
            console.log(developmentValue)
            
           
            $('.assigncount').text(selectedCheckboxesArr.length);
            $('.assigToDevelopment').text(developmentSelectionValue);
            if (selectedCheckboxesArr.length > 0) {
                
                if (developmentValue) {
                    $('#assign_properties_model').modal('show');
                }
                $('.reference_collection').html('');
                propertyReferenceArr.forEach(function(item) {

                    $('.reference_collection').append(
                        '<p class="text-12 font-weight-400 lineheight-15 color-black pt-20 ">' + item +
                        '</p>')
                });
            }
        });

        $(document).on("click", "#bulkAssignProperty", function(e) {
            e.preventDefault();

            $btnName = $(this).text();
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
                $btnName
            );
            const that = this;
            var selectedCheckboxesArr = [];


            $(".assign-property-checkbox:checked").each(function(index, element) {
                selectedCheckboxesArr.push($(element).data("id"));
            });

            if (selectedCheckboxesArr.length > 0) {

                var developmentId = $("#select_development option:selected").val();
                var formData = new FormData();
                formData.append('selectedCheckboxesArr', selectedCheckboxesArr);
                formData.append('developmentId', developmentId);

                const attributes = {
                    hasButton: true,
                    btnSelector: "#bulkAssignProperty",
                    btnText: $btnName,
                    handleSuccess: function() {
                        show_message(datas["msg"], "success");
                        window.location.reload();
                    },
                    handleErrorMessages: function() {

                    },
                };

                const ajaxOptions = {
                    url: propertyAssignToDev,
                    method: "post",
                    data: formData,
                };

                makeAjaxRequest(ajaxOptions, attributes);
            }
        });
    </script>
@endpush
@endsection
