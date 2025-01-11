@extends('layouts.app')
@section('content')
@section('title')
    {{ trans('messages.sidebar.Dashboard') }} Inmoconnect
@endsection
@push('styles')
    <!-- slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/modules/dashboard/dashboard.css') }}">
@endpush


<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="main-content-crm b-color-background  min-vh-100">
    <div class="crm-main-content">

        <!-- /////////////////////////breadcrumb/////////////////////////////// -->
        <x-forms.crm-breadcrumb :fieldData="[['url' => '', 'label' => trans('messages.sidebar.Dashboard')]]" />
        <!-- /////////////////////////end-breadcrumb////////////////////////////// -->

        <!-- ///////////////////////////card////////////////////////////////////////////// -->
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3 pb-0 mb-md-3 pb-md-1 mb-lg-0 pb-lg-0 ">
                <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="dashboard-top">
                            <h4
                                class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                {{ trans('messages.customer-dashboard.Upcoming_Property_View') }}
                            </h4>
                            <h2 class="lineheight-42 text-32 font-weight-700 color-primary">
                                {{ $upcomingViewedPropertyCount ?? 0 }}
                            </h2>
                        </div>
                        <div class="dashboard-bottom">
                            <div class="dashboard-img">
                                <img src="{{ asset('img/dashboard-1.svg') }}" alt="image" class="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3 pb-0 mb-md-3 pb-md-1 mb-lg-0 pb-lg-0 "
                onclick="window.open('{{ route(routeNamePrefix() . 'agents.index') }}','_self')">
                <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="dashboard-top">
                            <h4
                                class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                {{ trans('messages.customer-dashboard.Participated_Projects') }}
                            </h4>
                            <h2 class="lineheight-42 text-32 font-weight-700 color-primary">
                                {{ ($project->count()) }}
                            </h2>
                        </div>
                        <div class="dashboard-bottom">
                            <div class="dashboard-img">
                                <img src="{{ asset('img/dashboard-2.svg') }}" alt="image" class="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 " onclick="">
                <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="dashboard-top">
                            <h4
                                class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                {{ trans('messages.customer-dashboard.Saved_Properties') }}
                            </h4>
                            <h2 class="lineheight-42 text-32 font-weight-700 color-primary">{{$savedProperties->total() ?? 0}}</h2>
                        </div>
                        <div class="dashboard-bottom">
                            <div class="dashboard-img">
                                <img src="{{ asset('img/dashboard-5.svg') }}" alt="image" class="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////end-card////////////////////////////////////////// -->


        <div class="row mt-20">
            <div class="col-lg-12">
                <!-- ////////////////////////////new-listed-property///////////////////////////// -->
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  propertyTableData">
                    <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                        {{ trans('messages.customer-dashboard.My_Agents_Properties').':' }}
                    </h4>
                <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                    <div class="search_button">
                        <div class="form-group mt-3 position-relative">
                            <div class="input-group input-group-sm dashboard_input-search">
                                <span
                                    class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                <input type="text" name="search_input_property"
                                    class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                    placeholder="{{ trans('messages.agent-dashboard.search_here') }}" value="">
                            </div>
                        </div>
                    </div>
                    <div class="search-select common-label-css without_checkbox">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'sort_by_property',
                            'hasLabel' => true,
                            'label' => trans('messages.search_filter.Sort_By'),
                            'id' => 'table_sort_by',
                            'options' => [
                                'newest' => trans('messages.agent-dashboard.sort_newest'),
                                'oldest' => trans('messages.agent-dashboard.sort_oldest'),
                            ],
                            'attributes' => [],
                            'hasHelpText' => false,
                            'placeholder' => trans('messages.search_filter.Sort_By'),
                            'isRequired' => false,
                        ]" />
                    </div>

                </div>
                @include('modules.dashboard.includes.load-properties-table-data')
            </div>

            <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20 agentTableData">
                <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary">
                    {{ trans('messages.customer-dashboard.On-Going_Project_To-Do_List') }}
                </h4>
            @include('modules.projects.includes.todo_mgmt')
        </div>
    </div>
    <!-- ////////////////////////////end-new-property//////////////////////////// -->
 <!-- ////////////////////////////start-map//////////////////////////// -->
<div class="col-lg-8 mt-20">
    <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 ">
        <div class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-primary pb-3">
            Properties Map
        </div>
        <div id="tab-1" class="tab-content_one current">
            @if ($agentProperties->isNotEmpty())
                <div id="propertyMap" style="height: 400px;"></div>
            @else
                <div class="dashboard_map-empty empty-dashboard">
                    <div class="empty-table">
                        <div class="empty-image">
                            <img src="/img/empty-property.svg" alt="image" class="">
                        </div>
                        <h4
                            class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                            {{ trans('messages.agent-dashboard.This_section_is_empty') }}
                        </h4>

                    </div>
                </div>
            @endif
        </div>
        <div id="tab-2" class="tab-content_one">

        </div>
    </div>

</div>
 <!-- ////////////////////////////end-map//////////////////////////// -->

    <!-- //////////////////upcoming-event//////////////////////////////// -->
    <div class="col-lg-4 upcoming_event customer_event">
        @include('modules.dashboard.includes.event_mgmt')
</div>
<!-- //////////////////////end-upcoming-event///////////////////////////// -->
</div>

<!-- ///////////////////////////////////////map////////////////////////////// -->

</div>
</div>

<!-- Event Sidebar Modal -->
@include('modules.events.includes.event_sidebar')

<!-- Add Event Modal -->
@include('modules.events.includes.add_event')



@push('scripts')
    <script>
        var getLeadDetails = "{{ route(routeNamePrefix() . 'properties.getLeadDetails', ':id') }}";
        var routeUrl = "{{ route(routeNamePrefix() . 'user.profile') }}";
        var routeUrlAddEvent = "{{ route(routeNamePrefix() . 'events.store') }}";
        var routeUrlViewEvent = "{{ route(routeNamePrefix() . 'events.getEventDetailSideview', ':eventId') }}";
        var routeUrlEditEvent = "{{ route(routeNamePrefix() . 'events.store', ':eventId') }}";
        var routeUrlLoadProperties = "{{ route(routeNamePrefix() . 'user.loadPropertiesData') }}";
        var routeUrlLoadAgents = "{{ route(routeNamePrefix() . 'user.loadAgentManagementData') }}";
        var eventDeleteUrl = "{{ route(routeNamePrefix() . 'events.destroy', ':eventId') }}";
        var eventDetailstext = "{{ trans('messages.add-events.Event_Details') }}";
        var editEventDetailsText = "{{ trans('messages.add-events.Edit_events_details') }}";
        var Attempt_deleteText = "{{ trans('messages.delete-events.You_Are_Attempting_To_Delete_Event') }}";
        var areYouSureText = "{{ trans('messages.delete-events.Are_You_Sure') }}";
        var deleteText = "{{ trans('messages.delete-events.delete') }}";
        var propertyCategories = [];
        var categoryCounts = [];
        var hasChart = false;
    </script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=places"
    defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="{{ asset('assets/js/modules/dashboard/customer-dashboard.js') }}"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('propertyMap'), {
                zoom: 2,
                center: {
                    lat: 40.7128,
                    lng: -74.0060
                }
            });
    
            var bounds = new google.maps.LatLngBounds(); // Create a LatLngBounds object to contain all markers
            // Loop through agent properties to add markers
            @if ($agentProperties->isNotEmpty())
                @foreach ($agentProperties as $property)
    
                    var userIcon = {
                        url: '{{ asset('img/location_map.svg') }}',
                        scaledSize: new google.maps.Size(40, 40),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(15, 15)
                    };
    
                    var marker = new google.maps.Marker({
                        position: {
                            lat: {{ $property->latitude }},
                            lng: {{ $property->longitude }}
                        },
                        map: map,
                        icon: userIcon,
                    });
    
                    var userImage = {
                        url: '{{ Config('constant.USER_IMAGE_URL') . $property->agentImage }}',
                        scaledSize: new google.maps.Size(20, 20),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(6, 10),
                        className: 'userImageMarker'
                    };
    
                    var userMarker = new google.maps.Marker({
                        position: {
                            lat: {{ $property->latitude }},
                            lng: {{ $property->longitude }}
                        },
                        icon: userImage,
                        title: 'userMarker'
                    });
    
                    // Set zIndex explicitly
                    marker.setZIndex(1);
                    userMarker.setZIndex(0);
    
                    // Create the info window content
                    var infoContent =
                        '<div class="map_text"><div><img src="{{ !empty($property->cover_image) ? $property->cover_image : asset('img/default-property.jpg') }}" alt="Property Image" style="max-width: 50px; height: 50px;"></div>' +
                        '<div class="map-text-two"><div class="text-14 font-weight-700 color-b-blue lineheight-18">{{ $property->name }}</div>' +
                        '<div class="d-flex pt-2 gap-2"><span class="icon-location icon-16 color-b-blue"></span><span class="map-property-address text-14 font-weight-400 lineheight-18 color-b-blue">{{ $property->address }}</span></div>' +
                        '<div class="d-flex pt-2 justify-content-between"><div class="d-flex  gap-2"><span class="icon-house_id icon-16 color-b-blue"></span><span class=" text-14 font-weight-400 lineheight-18 color-b-blue">{{ $property->reference }}</span></div><a class="text-decoration-underline text-14 lineheight-18 font-weight-400 color-b-blue" href="' +
                        "{{ route(routeNamePrefix() . 'properties.show', $property->reference) }}" +
                        '">View</a></div></div></div>';
    
                    // Create the info window
                    var infowindow = new google.maps.InfoWindow();
    
                    // Extend the bounds to include each marker's position
                    bounds.extend(new google.maps.LatLng({{ $property->latitude }}, {{ $property->longitude }}));
    
                    // Add click event listener to the marker to open the info window
                    marker.addListener('click', function(property) {
                        return function() {
                            infowindow.setContent(property);
                            infowindow.open(map, this);
                        }
                    }(infoContent)); // Pass infoContent as a variable
    
                    // Add both markers to the map
                    marker.setMap(map);
                    userMarker.setMap(map);
                @endforeach
            @endif
    
            // Adjust the map to fit all markers within the bounds
            map.fitBounds(bounds);
        }
    </script>
     <script>
        let timeToStart = document.querySelector('#timeToStart')
        console.log(timeToStart);
        
        let timeControl = document.querySelector('#timeControl')
        let second = 1000
        let minute = second * 60
        let hour = minute * 60
        let day = hour * 24

        let countDown = new Date('Sep 20, 2025 00:00:00').getTime();

        const myRacing = () => {

            let nowDate = new Date().getTime(),
                distance = countDown - nowDate;
            //
            document.getElementById('days').innerText = Math.floor(distance / (day)),
                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

            if (distance < 0) {
                clearInterval(MyTimer);
                timeToStart.innerHTML = 'The camp began ☻'
                timeControl.innerHTML = ''
            }

        }

        MyTimer = setInterval(myRacing, 1000);
    </script>
     <script>
        function openSidebar(id) {
            document.getElementById("property_lead_sidebar").style.width = "755px";

            const attributes = {
                hasButton: false,
                handleSuccess: function() {
                    $('.property_lead_sidebar').html("");
                    $('.property_lead_sidebar').html(datas['htmlData']);

                },
                handleError: function() {},
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
            document.getElementById("mySidebar_one").style.width = "0";
        }
    </script>
@endpush
@endsection