@extends('layouts.app')
@section('content')

@section('title')
{{trans('messages.beta-agents.beta_agents')}} Inmoconnect
@endsection


<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <h3
                        class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">
                        {{trans('messages.beta-agents.beta_agents')}}
                </h3>
                </div>
                
            </div>
        </div>

  
        <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  p-30">
            <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                <div class="search_button">
                    <div class="form-group position-relative">
                        <div class="input-group input-group-sm dashboard_input-search">
                            <span
                                class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                            <input type="text" name="table_search_input"
                                class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                placeholder="{{trans('messages.agent-dashboard.search_here')}}" value="">
                        </div>
                    </div>
                </div>
                <button type="button" onclick="window.open('{{route(routeNamePrefix().'beta_agents.exportBetaAgents')}}','_self')"
                    class="delete_project small-button border-r-8 text-14 font-weight-700 lineheight-18 d-flex align-items-center justify-content-center">
                    <i class=" icon-Export me-2 icon-20"></i>
                    {{trans('messages.my-customer.Export')}}
                </button>
            </div>
            <div class="table_customer-three pt-10">
                <table id="example_one" class="display  dashboard_edit_one" style="width:100%; ">
                    <thead>
                        <tr>
                            <th>{{trans('messages.beta-agents.Full_name')}}</th>
                            <th>{{trans('messages.beta-agents.email')}}</th>
                            <th>{{trans('messages.beta-agents.Mobile_Number')}}</th>
                            <th>{{trans('messages.beta-agents.Company_Name')}}</th>
                            <th>{{trans('messages.beta-agents.Role_Position')}}</th>
                            <th>{{trans('messages.beta-agents.Date_added')}}</th>
                            
                        </tr>
                    </thead>
                    <tbody class="tableData">
                        @if($results->isNotEmpty())
                        @include('components.tables.custom-table',['results' =>$results ])
                        @else
                        <tr>
                            <td colspan="6" class="text-center">

                                <p>{{trans('messages.beta-agents.no_beta_agents_found')}}</p>
                            </td>
                        </tr>
                        @endif
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

@endsection