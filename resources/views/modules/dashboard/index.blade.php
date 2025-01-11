@extends('layouts.app')
@section('content')

@section('title')
{{trans('messages.sidebar.Dashboard')}} Inmoconnect
@endsection

<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="main-content-crm b-color-background  min-vh-100">
    <div class="crm-main-content">

    <!-- /////////////////////breadcrum///////////////////////// -->
        <x-forms.crm-breadcrumb :fieldData="[['url' => '','label' => trans('messages.sidebar.Dashboard')]]" />

        <div class="row">
            @if(auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin')

            <!-- ////////////////////////total-users///////////////// -->
            <div class="col-sm-6 col-md-6 col-lg-3 mb-2"
                onclick="window.open('{{route(routeNamePrefix().'user.index')}}','_self')">
                <div class="dashboard-card box-shadow-two b-color-white border-r-8  ">
                    <div class="d-flex flex-column gap-4">
                        <div class="dashboard-top">
                            <div class="colo-b-blue text-24 font-weight-700">{{$usersCount ?? 0}}</div>
                        </div>
                        <div class="dashboard-bottom">
                            <div class="colo-b-blue text-14 font-weight-400 opacity-8">
                                {{trans('messages.dashboard.Total_Users')}}</div>
                            <div class="color-b-blue text-12 font-weight-400 opacity-4">
                                {{trans('messages.dashboard.Active_Users')}}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
   
            <!-- //////////////////////property-listed////////////////////// -->
            <div class="col-sm-6 col-md-6 col-lg-3 mb-2"
                onclick="window.open('{{route(routeNamePrefix().'properties.index')}}','_self')">
                <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                    <div class="d-flex flex-column gap-4">
                        <div class="dashboard-top">
                            <div class="colo-b-blue text-24 font-weight-700">{{$propertiesCount ?? 0}}</div>
                        </div>
                        <div class="dashboard-bottom">
                            <div class="colo-b-blue text-14 font-weight-400 opacity-8">
                                {{trans('messages.dashboard.Properties_Listed')}}</div>
                            <div class="color-b-blue text-12 font-weight-400 opacity-4">
                                {{trans('messages.dashboard.Property_Portfolio')}}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- //////////////////////agent-count////////////////////////////// -->
            @if(auth()->user()->role->name == 'agent')
            <div class="col-sm-6 col-md-6 col-lg-3 mb-2"
                onclick="window.open('{{route(routeNamePrefix().'agents.index')}}','_self')">
                <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                    <div class="d-flex flex-column gap-4">
                        <div class="dashboard-top">
                            <div class="colo-b-blue text-24 font-weight-700">{{$connectedAgentsCount ?? 0}}</div>
                        </div>
                        <div class="dashboard-bottom">
                            <div class="colo-b-blue text-14 font-weight-400 opacity-8">
                                {{trans('messages.dashboard.Agent_Count')}}</div>
                            <div class="color-b-blue text-12 font-weight-400 opacity-4">
                                {{trans('messages.dashboard.Agent_Contacts')}}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

    </div>
</div>

@endsection