@extends('layouts.app')
@section('content')

@push('styles')
<!-- slider -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
<link  rel="stylesheet" href="{{ asset('assets/css/modules/projects/project-listing.css') }}">
@endpush

@section('title')
{{trans('messages.dashboard-sidebar.My_Projects')}} Inmoconnect
@endsection



<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background  min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">
        <x-forms.crm-breadcrumb :fieldData="[['url' => route(routeNamePrefix().'projects.index'),'label' => trans('messages.dashboard-sidebar.My_Projects')]]" :additionalData="['hasAddButton'=> (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'agent' ||  auth()->user()->role->name == 'sub-agent' ||  auth()->user()->role->name == 'developer' ||  auth()->user()->role->name == 'sub-developer' ) ? true : false,'addButtonClass' => ' icon-Add-Projct', 'isModalOpen' => true]" />
            @if($results->isnotEmpty())
                @include('modules.projects.project-listings',['results' =>$results, 'total_projects' =>$total_projects , 'ongoing_projects' => $ongoing_projects, 'overdue_projects' => $overdue_projects, 'completed_projects' => $completed_projects])
            @else
                <div class="row propertySearchData tableData">
                    <div class="main-card border-r-8  mb-15">
                        <div
                            class="empty-search border-r-8 b-color-white d-flex align-items-center justify-content-center px-50 py-30 box-shadow-one">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-6 empty-order">
                                    <div class="search-left me-4">
                                        <h3 class="text-20 lineheight-22 color-primary font-weight-700 letter-s-48">
                                            {{trans('messages.my-projects.Transform_Visions_into_Reality_with_InmoConnect_Projects')}} 
                                        </h3>
                                        <h6 class="text14 font-weight-400 lineheight-18 color-b-blue pt-10">
                                            {{trans('messages.my-projects.Why_Utilize_InmoConnect_Projects')}}
                                        </h6>
                                        <ul class="search-list">
                                            <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                                    class="font-weight-700">
                                                    {{trans('messages.my-projects.Efficient_Collaboration')}}
                                                </span>
                                                 {{trans('messages.my-projects.details_Efficient_Collaboration')}}
                                                </li>
                                            <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                                    class="font-weight-700">
                                                    {{trans('messages.my-projects.Centralized Management')}}
                                                </span>
                                                {{trans('messages.my-projects.details_Centralized_Management')}}
                                                </li>
                                            <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                                    class="font-weight-700">
                                                    {{trans('messages.my-projects.Transparent_Progress_Tracking')}}
                                                </span>
                                                 {{trans('messages.my-projects.details_Transparent_Progress_Tracking')}}
                                                </li>
                                            <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                                    class="font-weight-700">
                                                    {{trans('messages.my-projects.Document_Centralization')}}
                                                </span> 
                                                 {{trans('messages.my-projets.details_Document_Centralization')}}
                                                </li>
                                            <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                                    class="font-weight-700">
                                                    {{trans('messages.my-projects.Effortless_Meetings')}}
                                                </span> 
                                                {{trans('messages.my-projects.details_Effortless_Meetings')}}
                                            </li>
                                        </ul>
                                        <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue pt-15">
                                            {{trans('messages.my-projects.start_your_first_project')}}
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="search-right">
                                        <div class="search-right-img text-center mb-5 mb-lg-0">
                                            <img src="{{asset('img/empty_myproject.svg')}}" alt="image" class="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
    </div>
</div>

@include('modules.projects.add-project')

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap&libraries=places" defer></script>
<script>
    var routeUrlAddProject = "{{ route(routeNamePrefix().'projects.store') }}";
    var invalidAddressText = "{{trans('messages.errors.Please_enter_valid_address')}}";
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="{{ asset('assets/js/modules/projects/project_index.js') }}"></script>
<script src="{{ asset('assets/js/modules/projects/add_project.js') }}"></script>

@endpush
@endsection