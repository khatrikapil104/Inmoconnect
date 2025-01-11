@extends('layouts.app')
@section('content')

@section('title')
    {{trans('messages.sidebar.Search_Agents')}} Inmoconnect
@endsection

<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background  min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">
        <div class="d-flex justify-content-between">
            <x-forms.crm-breadcrumb :fieldData="[
                [
                    'url' => route(routeNamePrefix() . 'agentSearch.index'),
                    'label' => trans('messages.sidebar.Search_Agents'),
                ],
            ]" />
            <div class="d-flex align-items-center">
                <button
                    class="b-color-transparent header-right-button border-r-8 opacity-5 border-blue  d-flex justify-content-center align-items-center px-3 py-2"
                    data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                    <i class=" icon-Search text-20"></i><span
                        class="d-none d-sm-block ms-2 text-14 font-weight-700">Search Connection</span>
                </button>
            </div>
        </div>
            <div class="row agentSearchData tableData background-opacity">
               
                @include('components.tables.custom-table',['results' =>$results ])
            </div>
            <div class="paginationData">
                <!-- Custom Pagination File -->
                @include('components.tables.pagination')
            </div>

    </div>
</div>

<!-- Filter Modal -->
<x-tables.filter-modal>
    <form action="" method="post" id="filterForm" data-filter-name="{{$filterName ?? ''}}" enctype="multipart/form-data">
        @include('modules.agents.filter_fields')
    </form>
</x-tables.filter-modal>
@push('scripts')

<script src="{{ asset('assets/js/modules/agents/agent_index.js') }}"></script>
@endpush
@endsection