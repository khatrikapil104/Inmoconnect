@extends('layouts.app')
@section('content')
@section('title')
    {{ trans('messages.beta-developer.beta_developer') }} Inmoconnect
@endsection

<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <h3
                        class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">
                        {{ trans('messages.beta-developer.beta_developer') }}
                    </h3>
                </div>

            </div>
        </div>

        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  p-30 developer_table_data">
            <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2 flex-wrap">
                <div class="search_button">
                    <div class="form-group position-relative">
                        <div class="input-group input-group-sm dashboard_input-search">
                            <span
                                class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                            <input type="text" name="table_search_input"
                                class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                placeholder="{{ trans('messages.agent-dashboard.search_here') }}" value="">
                        </div>
                    </div>
                </div>
                <button type="button" onclick="window.open('{{route(routeNamePrefix().'beta_developers.exportBetaDevelopers')}}','_self')"
                class="border_line delete_project small-button border-r-8 text-14 font-weight-700 lineheight-18 d-flex align-items-center justify-content-center">
                <i class=" icon-Export me-2 icon-20"></i>
                {{trans('messages.my-customer.Export')}}
            </button>
            </div>
            @include('modules.dashboard.includes.load-beta-developer-table-data')
        </div>


        <div class="paginationData mt-10">
            <!-- Custom Pagination File -->
            @include('components.tables.pagination')
        </div>

    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function loadDeveloperData() {
            let formData = new FormData();
            formData.append(
                "table_search_input",
                $("input[name=table_search_input]").val() || ""
            );
            var url = "{{ route(routeNamePrefix() . 'developer.loadBetaDeveloperData') }}";
            const attributes = {
                hasButton: false,
                handleSuccess: function() {                    
                    $(".developer_table_data").find(".no_data_found_developer").empty();
                    if (
                        datas["developer"].current_page != 2 &&
                        datas.developer['data'] != "" && datas.developer['data'] != null
                    ) {
                        $(".developer_table_data").find(".developer_data").remove();
                        $(".developer_table_data")
                            .find(".developer_data_table tbody")
                            .html(datas["data"]);
                    } else {
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
        $(document).on("keyup", "input[name=table_search_input]", function() {
            loadDeveloperData();
        });
    });
</script>
