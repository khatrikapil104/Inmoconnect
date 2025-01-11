@extends('layouts.app')
@section('content')

@section('title')
    {{trans('messages.sidebar.Users')}} Inmoconnect
@endsection


<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">
        <x-forms.crm-breadcrumb :fieldData="[['url' => route(routeNamePrefix().'user.index'),'label' => trans('messages.sidebar.Users')],['url' => route(routeNamePrefix().'user.index'),'label' => trans('messages.properties.My_Users')]]" :additionalData="['hasFilterButton'=> true, 'filterButtonClass' => 'icon-agent_search','hasAddButton'=> true, 'addButtonClass' => ' icon-manage_customer','url'=>route(routeNamePrefix().'user.create')]" />
            <div class="row UserListingData tableData">
               
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
        @include('modules.users.filter_fields')
    </form>
</x-tables.filter-modal>
@push('scripts')
<script src="{{ asset('assets/js/modules/users/user_listing.js') }}"></script>
@endpush
@endsection