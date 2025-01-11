@extends('layouts.app')
@section('content')

@section('title')
    {{($checkIfValidUser->name ?? '').'\'s '.trans('messages.view_agent.breadcrumb.Properties')}} Inmoconnect
@endsection



<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">
        <x-forms.crm-breadcrumb :fieldData="[['url' => route(routeNamePrefix().'user.index'),'label' => trans('messages.sidebar.Users')],['url' => route(routeNamePrefix().'user.index'),'label' => trans('messages.properties.My_Users')],['url' => '','label' => ($checkIfValidUser->name ?? '').'\'s '.trans('messages.view_agent.breadcrumb.Properties')]]" :additionalData="['hasAddButton'=> true, 'addButtonClass' => ' icon-icon_home','url' => (requestSegment(1) == 'agents')
            ? (!empty($checkIfValidUser->id)
                ? route(routeNamePrefix().'agents.userPropertiesCreate', $checkIfValidUser->id)
                : route(routeNamePrefix().'properties.create')
            )
            : ((requestSegment(1) == 'users')
                ? (!empty($checkIfValidUser->id)
                    ? route(routeNamePrefix().'user.userPropertiesCreate', $checkIfValidUser->id)
                    : route(routeNamePrefix().'properties.create')
                )
                : route(routeNamePrefix().'properties.create'))
            ]" />
            <div class="row propertyListingData tableData">
               
                @include('components.tables.custom-table',['results' =>$results,'listRouteUrl' => route(routeNamePrefix().'user.userProperties',$checkIfValidUser->id ?? '')])
            </div>
            <div class="paginationData">
                <!-- Custom Pagination File -->
                @include('components.tables.pagination')
            </div>

    </div>
</div>

@endsection