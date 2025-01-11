@extends('layouts.app')
@section('content')

@section('title')
{{trans('messages.sidebar.Property_Listing')}} Inmoconnect
@endsection



<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background  min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">
        <x-forms.crm-breadcrumb :fieldData="[['url' => route(routeNamePrefix().'properties.index'),'label' => trans('messages.sidebar.Property_Listing')]]" :additionalData="['hasFilterButton'=> true, 'filterButtonClass' => ' icon-property_search','hasAddButton'=>(auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent'  ) ? true : false,'addButtonClass' => ' icon-property_managment','url'=>route(routeNamePrefix().'properties.create')]" />
        @if(auth()->user()->role->name == 'agent')
        <ul class="tabs" style="margin-bottom:20px;">
            <li class="tab-link {{empty($pageType) ? 'current' : ''}} text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black" onclick="window.open('{{route(routeNamePrefix().'properties.index')}}','_self')"
                >My Properties </li>
            <li class="tab-link {{($pageType == 'company') ? 'current' : ''}} text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black" onclick="window.open('{{route(routeNamePrefix().'properties.index',['pageType' => 'company'])}}','_self')"
                >Company Properties</li>
                <li class="tab-link {{($pageType == 'collaborated') ? 'current' : ''}} text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black" onclick="window.open('{{route(routeNamePrefix().'properties.index',['pageType' => 'collaborated'])}}','_self')"
                >Collaborated Properties </li>

        </ul>
        @endif
        <!-- <div id="tab-1" class="tab-content_one current">
            <div class="b-color-white box-shadow-one border-r-8  p-30 "> -->
                @if($pageType == 'company')
                    
                        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  p-30">
                            <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
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

                            </div>
                            <div class="table_customer-three pt-10">
                                <table id="example_one" class="display  dashboard_edit_one table-bottom-border"
                                    style="width:100%; ">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Property Reference</th>
                                            <th>Property Title</th>
                                            <th>Add Date</th>
                                            <th>Added By</th>
                                            <th>City</th>
                                            <th>Price</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableData">
                                        @include('components.tables.custom-table', ['results' => $results])
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    
                @elseif($pageType == 'collaborated')
                    @include('components.tables.collaborated',['results' =>$results ])
                @else
                    <div class="row propertyListingData tableData">

                    @include('components.tables.custom-table',['results' =>$results ])
                    </div>
                @endif
                <div class="paginationData">
                    <!-- Custom Pagination File -->
                    @include('components.tables.pagination')
                </div>
            <!-- </div>
        </div> -->



    </div>
</div>

<!-- Filter Modal -->
<x-tables.filter-modal>
    <form action="" method="post" id="filterForm" data-filter-name="{{$filterName ?? ''}}" enctype="multipart/form-data">
        @include('modules.properties.filter_fields')
    </form>
</x-tables.filter-modal>
@push('scripts')

<script src="{{ asset('assets/js/modules/properties/property_index.js') }}"></script>
<script src="{{ asset('assets/js/modules/properties/collaborate_property.js') }}"></script>
@endpush
@endsection