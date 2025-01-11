@extends('layouts.app')
@section('content')
@section('title')
    {{ trans('messages.sidebar.Property_Search') }} Inmoconnect
@endsection
@push('styles')
    <!-- slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/modules/projects/show.css') }}">
@endpush

<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">

     {{-- breadcrumb  --}}
        <x-forms.crm-breadcrumb :fieldData="[
            [
                'url' => route(routeNamePrefix() . 'projects.index'),
                'label' => trans('messages.dashboard-sidebar.My_Projects'),
            ],
            ['url' => '', 'label' => $project->project_name ?? ''],
        ]" />
        {{-- end-breadcrumb --}}

        <div class="main_property">
            {{-- location --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 ">
                        <div
                            class="edit_price_empty d-flex justify-content-between align-items-baseline mb-3 flex-wrap">
                            <div
                                class="edit-price_left d-flex justify-content-between gap-2 gap-sm-3 align-items-center flex-wrap ">
                                <h4
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    {{ $project->project_name ?? '-' }}
                                </h4>
                                <h6
                                    class="text-14 font-weight-400 lineheight-18 text-capitalize in_progress border-r-5">
                                    <div class="edit_progress-button">
                                        {{ trans('messages.' . getModalSpecificData('Project', 'STATUS', trans($project->status) ?? '')) }}
                                    </div>
                                </h6>
                               @if ($project->status != 'completed')
                                @if (checkUserProjectPermissions($project->id, 'Project Information'))
                                    <div class="  icon-edit icon-20 color-b-blue" data-bs-toggle="modal"
                                        data-bs-target="#dataFilterModal"></div>
                                @endif
                               @endif
                            </div>

                            {{-- price --}}
                            <div class="edit-price-right">
                                <h4
                                    class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    {{ !empty($project->project_budget)
                                        ? config('Reading.default_currency') . ' ' . number_format($project->project_budget, 2)
                                        : config('Reading.default_currency') . ' 0.00' }}
                                </h4>
                            </div>

                        </div>
                        <div class="property_type-empty-card mb-10">
                            <h6 class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">
                                {{ trans('messages.my-project.Project_Type') . ':' }}
                            </h6>
                            <h6
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1">
                                {{-- {{getModalSpecificData('Project','PROJECT_TYPE',$project->project_type ?? '')}}::: --}}
                                {{ trans('messages.' . getModalSpecificData('Project', 'PROJECT_TYPE', trans($project->project_type) ?? '')) }}
                            </h6>
                        </div>
                        <div class="property_type-empty-card mb-10">
                            <h6 class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">
                                {{ trans('messages.my-project.Project_Description') . ':' }}
                            </h6>
                            <p class="text-12 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1">
                                {!! $project->project_description ?? '' !!}</p>
                        </div>
                        <div class="property_type-empty-card mb-10">
                            <h6 class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">
                                {{ trans('messages.project-show.project_start_date') }}
                            </h6>
                            <h6
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1 d-flex align-items-center">
                                <span><i
                                        class=" icon-my_calender me-2 icon-12"></i>{{ date('d/m/Y', strtotime($project->start_date)) }}</span>
                            </h6>
                        </div>
                        <div class="property_type-empty-card mb-10">
                            <h6 class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">
                                {{ trans('messages.project-show.project_end_date') }}
                            </h6>
                            <h6
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1 d-flex align-items-center">
                                <span><i
                                        class=" icon-my_calender me-2 icon-12"></i>{{ date('d/m/Y', strtotime($project->end_date)) }}</span>
                            </h6>
                        </div>
                        <div class="property_type-empty-card">
                            <h6 class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">
                                {{ trans('messages.my-project.Location') . ':' }}
                            </h6>
                            <h6
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 mt-1 d-flex align-items-center">
                                <span> <i
                                        class="icon-location me-2 icon-12"></i>{{ $project->project_location ?? '-' }}</span>
                            </h6>
                            <div id="projectLocationMap" class="mt-10" style="height: 330px;"></div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- end-location --}}

            {{-- add-property --}}
            <div class="row propertyMangementRow">
                <div class="col-lg-12">
                    <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                        <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                            {{ trans('messages.project-show.Property_Management') }}
                        </h4>
                        @if ($project->project_properties && $project->project_properties->isNotEmpty())
                            <div class="search-dashboard d-flex justify-content-between flex-wrap">
                                <div class="search_button">
                                    <div class="form-group mt-3 position-relative">
                                        <div class="input-group input-group-sm dashboard_input-search">
                                            <span
                                                class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                            <input type="text" name="search_input_property"
                                                class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                                placeholder="{{ trans('messages.agent-dashboard.search_here') }}"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="header-right-button_one d-flex align-items-center gap-3">
                                    @if (checkUserProjectPermissions($project->id, 'Property Management'))
                                        <div
                                            class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center importProperiesBtn">
                                            <i class=" icon-property_managment"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @include('modules.projects.includes.property_mgmt')
                    </div>
                </div>
            </div>
          {{-- end-add-property --}}

            <!-- /////////////////////////////////////agent-management////////////////////////////// -->
            <div class="row">
                <div class="col-lg-6 agentMangementRow">
                    <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                        <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                            {{ trans('messages.project-show.Agent_Management') }}
                        </h4>
                        @if ($project->project_agents && $project->project_agents->isNotEmpty())
                            <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                                <div class="search_button">
                                    <div class="form-group mt-3 position-relative">
                                        <div class="input-group input-group-sm dashboard_input-search">
                                            <span
                                                class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                            <input type="text" name="search_input_agent"
                                                class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                                placeholder="{{ trans('messages.agent-dashboard.search_here') }}"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="header-right-button_one d-flex align-items-center gap-12">
                                    @if (checkUserProjectPermissions($project->id, 'Agent Management'))
                                        @if ($project->project_agents->total() > 1)
                                            <a
                                                class="text-14 color-primary font-weight-400 lineheight-18 text-decoration-underline text-capitalize manageAgentsBtn">
                                                {{ trans('messages.Manage_Agents') }}
                                            </a>
                                        @endif
                                        <div
                                            class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center importAgentsBtn">
                                            <i class=" icon-manage_agent"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @include('modules.projects.includes.agent_mgmt')

                    </div>
                </div>
                <div class="col-lg-6 customerMangementRow">
                    <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                        <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                            {{ trans('messages.project-show.Customer_Management') }}
                        </h4>
                        @if ($project->project_customers && $project->project_customers->isNotEmpty())
                            <div class="search-dashboard d-flex justify-content-between flex-wrap">
                                <div class="search_button">
                                    <div class="form-group mt-3 position-relative">
                                        <div class="input-group input-group-sm dashboard_input-search">
                                            <span
                                                class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                            <input type="text" name="search_input_customer"
                                                class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                                placeholder="{{ trans('messages.agent-dashboard.search_here') }}"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="header-right-button_one d-flex align-items-center gap-12">
                                    @if (checkUserProjectPermissions($project->id, 'Customer Management'))
                                        <a
                                            class="text-14 color-primary font-weight-400 lineheight-18 text-decoration-underline text-capitalize manageCustomersBtn">
                                            {{ trans('messages.project-show.Manage Customers') }}
                                        </a>

                                        <div
                                            class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center importCustomersBtn">
                                            <i class=" icon-manage_customer"></i>

                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @include('modules.projects.includes.customer_mgmt')

                    </div>
                </div>
            </div>
            <!-- /////////////////////////////////////////////end-agent-managment////////////////////////////////// -->

            <div class="row">
                <div class="col-lg-12">
                    <div class=" border-r-12 b-color-white box-shadow-one mt-20 ">
                        {!! $groupChatHistoryData ?? '' !!}
                    </div>
                </div>
            </div>

            {{-- add-to-list --}}
            <div class="row">
                <div class="col-lg-12 taskMangementRow">
                    <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                        <div class="dashboard_card-title d-flex align-items-center justify-content-between">
                            <div
                                class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                                {{ trans('messages.To_do_list') }}
                            </div>
                            @if ($project->project_tasks && $project->project_tasks->isNotEmpty())
                                @if (checkUserProjectPermissions($project->id, 'To-Do List'))
                                    <div class="header-right-button_one d-flex align-items-center gap-3">
                                        {{-- button --}}
                                        <button type="button"
                                            class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#todolist">
                                            <i class=" icon-plus me-2 icon-18 font-weight-700"></i>
                                            Load To-Do List
                                        </button>
                                        {{-- modal-button --}}
                                        <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#single_todolist">
                                            <i class="icon-To_do_list"></i>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                        @include('modules.projects.includes.todo_mgmt')
                    </div>
                </div>
            </div>
            {{-- end-add-to-list --}}

            <!-- ////////////////////////////////////////project-event-sehdule /////////////////////////////////  -->
            <div class="load-event-data">
                @include('modules.projects.includes.event_mgmt')

            </div>
            <!-- ////////////////////////////////////////end-projrct-event-sehdule///////////////////////////////////// -->

            <!-- /////////////////////////////////////attachment-management////////////////////////////// -->
            <div class="row">
                <div class="col-lg-6 attachmentMangementRow">
                    <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                        <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                            {{ trans('messages.project-show.Attachments') }}
                        </h4>
                        @if ($project->project_attachments && $project->project_attachments->isNotEmpty())
                            <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                                <div class="search_button">
                                    <div class="form-group mt-3 position-relative">
                                        <div class="input-group input-group-sm dashboard_input-search">
                                            <span
                                                class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                            <input type="text" name="search_input_attachment"
                                                class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                                placeholder="{{ trans('messages.agent-dashboard.search_here') }}"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="header-right-button_one d-flex align-items-center gap-12">
                                    <a href="javascript:void(0)"
                                        class="text-14 color-primary font-weight-400 lineheight-18 text-decoration-underline text-capitalize projectAttachmentUploaded">
                                        {{ trans('messages.project-show.View_File') }}
                                    </a>
                                    <div
                                        class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center projectAttachmentChooseBtn">
                                        <i class="icon-view-files"></i>
                                    </div>
                                </div>

                            </div>
                        @endif
                        @include('modules.projects.includes.attachment_mgmt')

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20">
                        <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                            {{ trans('messages.project-show.Recent_Activity') }}
                        </h4>
                        @include('modules.projects.includes.recent_activity_mgmt')
                        <!-- <div
                            class="table_dashboard empty-dashboard table-empty-dashboard_property recent-activity_height">
                            <div class="d-flex align-items-center">
                                <div class="activity_img empty-image">
                                    <i class=" icon-my_project icon-16 color-primary"></i>


                                </div>
                                <div class="activity_text ms-2">
                                    <div
                                        class="color-light-grey-seven text-14 font-weight-400 lineheight-18 text-capitalize">
                                        <span class="font-weight-700 color-b-blue">{{ auth()->user()->name }}</span>
                                         {{ trans('messages.project-show.Initiated_project') }}
                                        <span class="font-weight-700 color-b-blue">{{ $project->project_name ?? '' }}.</span></div>
                                    <div
                                        class="mt-1 color-light-grey-six text-14 font-weight-400 lineheight-18 ">
                                        {{ formatTimeDifference($project->created_at) }}</div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
            <!-- /////////////////////////////////////////////end-agent-managment////////////////////////////////// -->

            <!-- //////////////////////////todolist/////////////////////button////////////////////////////////////////// -->
            <div class="row mt-30 mb-10">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between">
                        @include('modules.projects.includes.elements.complete_project_btn')
                        <button type="button"
                            class="delete_project small-button border-r-8 text-14 font-weight-700 lineheight-18 deleteProjectBtn"
                            data-name="{{ $project->project_name }}" data-id="{{ $project->id }}">
                            {{ trans('messages.project-show.Delete_Project') }}
                        </button>
                    </div>
                </div>
            </div>
            <!-- ///////////////////////////////////////////end-button/////////////////////////////////////////// -->


            <!-- //////////////////////////////////////////////////customer-modal////////////////////////////////////////////// -->
            @include('modules.projects.includes.import_customers')
            @include('modules.projects.includes.manage_customers')
            <!-- //////////////////////////////////////////////end-customer-modal////////////////////////////////////// -->

            <!-- //////////////////////////////////////////////agent modal /////////////////////////////////////// -->
            @include('modules.projects.includes.import_agents')
            @include('modules.projects.includes.manage_agents')
            <!-- ///////////////////////////////////////////////end-agent-modal ///////////////////////////////////// -->

            <!-- //////////////////////////////Add-property modal /////////////////////////////////////////////////// -->
            @include('modules.projects.includes.import_properties')
            <!-- ///////////////////////////////////////end Add-property modal ////////////////////////////////////// -->

            @include('modules.projects.includes.add_todo_list_modal')

            <!-- Project Attachment Modal -->

           
            
        </div>
    </div>
</div>
<!-- Edit Project Modal -->
@include('modules.events.includes.event_sidebar')
@include('modules.events.includes.add_event')
@include('modules.projects.add-project')

@push('scripts')
    <script>
        var uploadDcoumentsModal = "{{'uploadProjectDcoumentsModal'}}";</script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=places"
        defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="{{ asset('assets/js/modules/projects/show.js') }}"></script>

    <script>
        var latVal = "{{ $project->latitude ?? '' }}";
        var lngVal = "{{ $project->longitude ?? '' }}";
        var importPropertiesUrl = "{{ route(routeNamePrefix() . 'projects.fetchImportProperties', $project->slug) }}";
        var routeUrlLoadProjectPropertiesData =
            "{{ route(routeNamePrefix() . 'projects.fetchProjectProperties', $project->slug) }}";
        var projectDeleteUrl = "{{ route(routeNamePrefix() . 'projects.destroy', ':id') }}";
        var projectDeleteConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_delete_Your_Project') }}";
        var areYouSureTextConfirmPopup = "{{ trans('messages.confirm_popup.Are_you_sure') }}";
        var deleteTextConfirmPopup = "{{ trans('messages.confirm_popup.Delete') }}";
        var routeUrlAddProject = "{{ route(routeNamePrefix() . 'projects.store', $project->id) }}";
        var invalidAddressText = "{{ trans('messages.errors.Please_enter_valid_address') }}";
        var projectPropertyDeleteConfirmText =
            "{{ trans('messages.confirm_popup.You_are_attempting_to_remove_property') }}";
        var removeTextConfirmPopup = "{{ trans('messages.confirm_popup.Remove') }}";
        var routeUrlDeleteProjectProperty = "{{ route(routeNamePrefix() . 'projects.deleteProjectProperty', ':id') }}";

        var importCustomersUrl = "{{ route(routeNamePrefix() . 'projects.fetchImportCustomers', $project->slug) }}";
        var manageCustomersUrl = "{{ route(routeNamePrefix() . 'projects.fetchManageCustomers', $project->slug) }}";
        var routeUrlLoadProjectCustomersData =
            "{{ route(routeNamePrefix() . 'projects.fetchProjectCustomers', $project->slug) }}";
        var routeUrlDeleteProjectCustomer = "{{ route(routeNamePrefix() . 'projects.deleteProjectCustomer', ':id') }}";
        var projectCustomerDeleteConfirmText = "{{ trans('You Are Attempting To Remove Customer') }}";

        var importAgentsUrl = "{{ route(routeNamePrefix() . 'projects.fetchImportAgents', $project->slug) }}";
        var manageAgentsUrl = "{{ route(routeNamePrefix() . 'projects.fetchManageAgents', $project->slug) }}";
        var routeUrlLoadProjectAgentsData =
            "{{ route(routeNamePrefix() . 'projects.fetchProjectAgents', $project->slug) }}";
        var routeUrlDeleteProjectAgent = "{{ route(routeNamePrefix() . 'projects.deleteProjectAgent', ':id') }}";
        var projectAgentDeleteConfirmText = "{{ trans('You Are Attempting To Remove Agent') }}";

        var submitImportAttachmentsUrl =
            "{{ route(routeNamePrefix() . 'projects.submitImportAttachments', $project->slug) }}";
        var submitImportAttachmentsUrl =
            "{{ route(routeNamePrefix() . 'projects.submitImportAttachments', $project->slug) }}";
        var routeUrlLoadProjectAttachmentsData =
            "{{ route(routeNamePrefix() . 'projects.fetchProjectAttachments', $project->slug) }}";
        var routeUrlDownloadProjectAttachment = "{{ route(routeNamePrefix() . 'projects.downloadProjectAttachment', ':id') }}";
        var projectAttachmentDeleteConfirmText = "{{ trans('You Are Attempting To Remove Attachment') }}";

        var routeUrlAddTask = "{{ route(routeNamePrefix() . 'projects.saveTaskData', $project->slug) }}";
        var routeUrlAddSingleTask = "{{ route(routeNamePrefix() . 'projects.saveSingleTaskData', $project->slug) }}";
        var routeUrlLoadProjectTasksData = "{{ route(routeNamePrefix() . 'projects.fetchProjectTasks', $project->slug) }}";
        var routeUrlDeleteProjectTask = "{{ route(routeNamePrefix() . 'projects.deleteProjectTask', ':id') }}";
        var updateTaskStatusUrl = "{{ route(routeNamePrefix() . 'projects.updateTaskStatus', $project->slug) }}";
        var projectTaskDeleteConfirmText = "{{ trans('messages.confirm_popup.You_Are_Attempting_To_Remove_ToDo_List') }}";
        var removeProjectAttachementUrl = "{{ route(routeNamePrefix() . 'projects.removeProjectAttachement', ':id') }}";
        var loadCurrentEvent = "{{ route(routeNamePrefix() . 'projects.loadCurrentEvent') }}";
        var routeUrlAddEvent = "{{ route(routeNamePrefix() . 'events.store') }}";
        var routeUrlViewEvent = "{{ route(routeNamePrefix() . 'events.getEventDetailSideview', ':eventId') }}";
        var routeUrlEditEvent = "{{ route(routeNamePrefix() . 'events.store', ':eventId') }}";
        var eventDeleteUrl = "{{ route(routeNamePrefix() . 'events.destroy', ':eventId') }}";
        var eventDetailstext = "{{ trans('messages.add-events.Event_Details') }}";
        var editEventDetailsText = "{{ trans('messages.add-events.Edit_events_details') }}";
        var Attempt_deleteText = "{{ trans('messages.delete-events.You_Are_Attempting_To_Delete_Event') }}";
        var areYouSureText = "{{ trans('messages.delete-events.Are_You_Sure') }}";
        var deleteText = "{{ trans('messages.delete-events.delete') }}";
        var taskTypeUrl = "{{ route(routeNamePrefix() . 'projects.task_type', ':id') }}";
        var addAssignToDoList = "{{ route(routeNamePrefix() . 'projects.addAssignToDoList') }}";
        var removeEventAttachementUrl = "{{ route(routeNamePrefix() . 'user.removeEventAttachement', ':id') }}";
        var routeProjectRemoveFiles = "{{ route(routeNamePrefix() . 'project.removeFiles') }}";
    </script>
@endpush
@endsection
