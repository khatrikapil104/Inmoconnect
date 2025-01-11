@extends('layouts.app')
@section('content')
@section('title')
    {{ trans('messages.beta-agents.beta_agents') }} Inmoconnect
@endsection

<div class="overlay" id="overlay"></div>

{{-- @dd($results) --}}
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">

        {{-- breadcrumb --}}
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                        Developers
                    </div>
                </div>
            </div>
        </div>
        {{-- end-breadcrumb --}}

        {{-- table --}}
        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  p-30 developer_table_data">
            <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2 flex-wrap">
                <div class="search_button">
                    <div class="form-group position-relative">
                        <div class="input-group input-group-sm dashboard_input-search">
                            <span
                                class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                            <input type="text" name="search_input_developer"
                                class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                placeholder="{{ trans('messages.agent-dashboard.search_here') }}" value="">
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="search-select common-label-css without_checkbox mt-n3">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'sort_by_developer',
                            'hasLabel' => false,
                            'label' => trans('messages.search_filter.Sort_By'),
                            'id' => 'sort_by_developer',
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
            </div>
            @include('modules.dashboard.includes.load-developer-table-data')
        </div>


    </div>
</div>
@include('modules.dashboard.includes.developer_sidebar')
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   
    function openSidebar() {
        // Get the viewport width
        var viewportWidth =
            window.innerWidth || document.documentElement.clientWidth;

        // Set different widths based on the viewport width
        if (viewportWidth >= 992) {
            // Desktop view
            document.getElementById("mySidebar_one").style.width = "755px";
            // document.getElementById("main").style.marginLeft = "0px";
        } else {
            // Mobile view
            // Set different width and margin for mobile view
            document.getElementById("mySidebar_one").style.width = "100%";
            // document.getElementById("main").style.marginLeft = "0px"; // You can adjust this value as needed
        }
    }

    function closeSidebar() {
        document.getElementById("mySidebar_one").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
 $(document).ready(function() {
    function loadDeveloperData() {
        let formData = new FormData();
        // $(".developer_table_data").find(".developer_data").addClass("loader");
        formData.append(
            "search_input_developer",
            $("input[name=search_input_developer]").val() || ""
        );
        formData.append(
            "sort_by_developer",
            $("select[name=sort_by_developer]").val() || ""
        );
        // formData.append("page", propertiesPage);
        var url = "{{ route(routeNamePrefix() . 'developer.loadDeveloperData') }}";
        const attributes = {
            hasButton: false,
            handleSuccess: function() {
                // console.log(datas.developer['data']);
                $(".developer_table_data").find(".no_data_found_developer").empty();
                // console.log(propertiesPage);
                if (
                    datas["developer"].current_page != 2 &&
                    datas.developer['data'] != "" && datas.developer['data'] != null
                ) {
                    console.log('kapil');


                    $(".developer_table_data").find(".developer_data").remove();
                    $(".developer_table_data")
                        .find(".developer_data_table tbody")
                        .html(datas["data"]);
                }
                else {
                    console.log(datas["data"]);
                    
                    $(".developer_table_data").find(".developer_data").remove();
                    $(".developer_table_data")
                        .find(".no_data_found_developer")
                        .html(datas["data"]);
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
    $(document).on("change", "select[name=sort_by_developer]", function() {
        if ($(this).val() && $(this).val() != "") {
            loadDeveloperData();
        }
    });
    $(document).on("keyup", "input[name=search_input_developer]", function() {
        loadDeveloperData();
    });

        $(document).on("click", ".change_status_developer", function(e) {
        var type = $(this).attr('type');
        var updateStatus = $(this).closest('td');
        $developerId = $(this).data('id');
        var changeDevelopersStatus =
            "{{ route(routeNamePrefix() . 'developer.changeStatus', ':developerId') }}";
        let url = changeDevelopersStatus.replace(":developerId", $developerId);
        const attributes = {
            hasButton: false,
            handleSuccess: function() {
                if (datas['data'] == '1') {
                    updateStatus.closest('td').html("");
                    $staus =
                        '<td class="change_active"><span class="span_active span_complate_one">Accepted</></td>';
                    updateStatus.html($staus);
                } else {
                    updateStatus.closest('td').html("");
                    $staus =
                        '<td class="change_active"><span class="span_pending span_complate_one">Rejected</></td>';
                    updateStatus.html($staus);                    
                    updateStatus.closest('tr').addClass('remaining_account-opacity');
                }
            },
        };
        const ajaxOptions = {
            url: url + "?type=" + type,
            method: "get",
            data: {},
        };
        makeAjaxRequest(ajaxOptions, attributes);
    });

    $(document).on("click", ".developerDetails", function(e) {
        $developerId = $(this).attr("data-id");

        // $('.sidebarEventsForm').addClass('loader');
        openSidebar();
        var routeUrlViewDeveloper =
            "{{ route(routeNamePrefix() . 'developer.getDeveloperDetailSideview', ':developerId') }}";
        let url = routeUrlViewDeveloper.replace(":developerId", $developerId);

        const that = this;
        const attributes = {
            hasButton: false,
            handleSuccess: function() {
                $(".sidebarDeveloperForm").removeClass("loader");
                $(".developerSidebarModalTitle").text("Developer Details");
                $(".sidebarDeveloperForm").html(datas["data"]);
            },
        };
        const ajaxOptions = {
            url: url,
            method: "get",
            data: {},
        };
        makeAjaxRequest(ajaxOptions, attributes);
    });

    $(document).on('click', '.downloadGovtCertificateBtn', function() {
        $('.govcertificateInput').addClass('loader');
        const attributes = {
            hasButton: false,
            handleSuccess: function() {
                const data = datas['data'];
                const link = document.createElement('a');
                link.setAttribute('href', data);
                link.setAttribute('download', datas['originalFileName']);
                link.click();
                $('.govcertificateInput').removeClass('loader');
            },
            handleError: function() {},
            handleErrorMessages: function() {}
        };
        let govCertificateUserId = $(this).attr('data-id');
        var downloadGovCertificateUrl = "{{ route(routeNamePrefix() . 'user.downloadGovCertificate', ':id') }}";
        let url = downloadGovCertificateUrl.replace(':id', govCertificateUserId);
        const ajaxOptions = {
            url: url,
            method: 'get'
        };
        makeAjaxRequest(ajaxOptions, attributes);
    });
    });
</script>
