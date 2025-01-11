@extends('layouts.app')
@section('content')

@section('title')
    {{ trans('messages.sidebar.Agents') }} | {{ trans('messages.sidebar.My_Agents') }} Inmoconnect
@endsection

<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background  min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">
        <x-forms.crm-breadcrumb :fieldData="[
            ['url' => route(routeNamePrefix() . 'agents.index',!empty($value) ? $value : ''), 'label' => trans('Network Connection')],
            ['url' => '', 'label' => !empty($value) ? trans('messages.sidebar.Developer_Agents') : trans('messages.sidebar.My_Agents')],
        ]" :additionalData="['hasFilterButton' => true, 'filterButtonClass' => 'icon-agent_search']" />
        <div class="row agentListingData tableData ">

            @include('components.tables.custom-table', ['results' => $results])
        </div>
        <div class="paginationData">
            <!-- Custom Pagination File -->
            @include('components.tables.pagination')
        </div>

        {{-- </div> --}}
    </div>

    <!-- Filter Modal -->
    <x-tables.filter-modal>
        <form action="" method="post" id="filterForm" data-filter-name="{{ $filterName ?? '' }}"
            enctype="multipart/form-data">
            @include('modules.agents.filter_fields')
        </form>
    </x-tables.filter-modal>
    @push('scripts')
        <script src="{{ asset('assets/js/modules/agents/agent_index.js') }}"></script>
    @endpush
@endsection
