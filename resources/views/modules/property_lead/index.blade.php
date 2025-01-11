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
                                Property Leads
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-breadcrumb --}}

                {{-- table --}}

                <div class="b-color-white box-shadow-one border-r-8  p-30 ">
                    <div class="dashboard-card_three b-color-white border-r-8">
                        <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2 flex-wrap">
                            @if ($results->isNotEmpty())
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
                            <div class="search-select common-label-css without_checkbox mt-n3">
                                <x-forms.crm-single-select :fieldData="[
                                    'name' => 'table_sort_by',
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
                        @endif
                        </div>
                        @if ($results->isNotEmpty())
                        <div class="table_customer-three pt-20">
                            <table id="example_one"
                                class="display  dashboard_edit_one table-bottom-border propertyLeadTableData"
                                style="width:100%; ">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Property Reference</th>
                                        <th>Property Title</th>
                                        <th>Lead Date</th>
                                        <th>Lead Name</th>
                                        <th>Account Type</th>
                                        <th>City</th>
                                        <th>Price</th>
                                        <th></th>
                                        <th>
                                        <th>
                                    </tr>
                                </thead>
                                <tbody class="tableData">
                                    @if ($results->isNotEmpty())
                                        @include('components.tables.custom-table', ['results' => $results])
                                    @else
                                        <tr>
                                            <td colspan="8" class="text-center">

                                                <p>{{ trans('messages.properties.no_properties_inquiry_found') }}</p>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>

                            </table>                      
                
                        </div>     
                        @else
                        <div class="table_dashboard empty-dashboard table-empty-dashboard_1">
                            <div class="empty-table">
                                <div class="empty-image">
                                    <i class="icon-house_id icon-30 color-primary"></i>
                                    <!-- <img src="{{ asset('img/empty-property1.svg') }}" alt="image" class=""> -->
                                </div>
                                <div class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                    No any Property lead receive in your system
                                </div>
                            </div>
                        </div>
                        @endif                 
                    </div>
                  
                </div>
                <div class="paginationData mt-10">
                    @include('components.tables.pagination',['results' =>$results ])
                </div>
            </div>
           
        </div>

        @include('modules.property_lead.includes.property_lead')
        @push('scripts')

            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>
            <script>
                var getLeadDetails = "{{ route(routeNamePrefix() . 'properties.getLeadDetails', ':id') }}";
                var routeUrlLoadPropertyLeadData = "{{ route(routeNamePrefix() . 'properties.lead.index') }}";
            </script>
            <script>
                function openSidebar(id) {

                    // alert(id)
                    document.getElementById("property_lead_sidebar").style.width = "755px";
                    // document.getElementById("main").style.marginLeft = "0px";


                    const attributes = {
                        hasButton: false,
                        handleSuccess: function() {

                            console.log(datas['htmlData']);

                            $('.property_lead_sidebar').html("");
                            $('.property_lead_sidebar').html(datas['htmlData']);

                        },
                        handleError: function() {
                            // $(".propertyTableData")
                            //     .find(".table_dashboard")
                            //     .removeClass("loader");
                        },
                        handleErrorMessages: function() {},
                    };

                    const ajaxOptions = {
                        url: getLeadDetails.replace(':id', id),
                        method: "get",
                        data: {},
                    };

                    makeAjaxRequest(ajaxOptions, attributes);

                }

                function closeSidebar() {
                    document.getElementById("property_lead_sidebar").style.width = "0";
                    // document.getElementById("main").style.marginLeft = "0";
                }
            </script>


        @endpush
    @endsection
