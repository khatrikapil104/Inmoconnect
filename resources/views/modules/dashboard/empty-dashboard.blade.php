@extends('layouts.app')
@section('content')
@section('title')
    {{ trans('messages.sidebar.Dashboard') }} Inmoconnect
@endsection


<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="main-content-crm b-color-background  min-vh-100">
    <div class="crm-main-content">
        <x-forms.crm-breadcrumb :fieldData="[['url' => '', 'label' => trans('messages.sidebar.Dashboard')]]" />



        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3 pb-0 mb-md-3 pb-md-1 mb-lg-0 pb-lg-0 " onclick="">
                <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="dashboard-top">
                            <h4
                                class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                My Listed Properties</h4>
                            <h2 class="lineheight-42 text-32 font-weight-700 color-primary">0</h2>
                        </div>
                        <div class="dashboard-bottom">
                            <div class="dashboard-img">
                                <img src="/img/dashboard-1.svg" alt="image" class="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-3 pb-0 mb-md-3 pb-md-1 mb-lg-0 pb-lg-0 " onclick="">
                <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="dashboard-top">
                            <h4
                                class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2">
                                My Network Agents</h4>
                            <h2 class="lineheight-42 text-32 font-weight-700 color-primary">0</h2>
                        </div>
                        <div class="dashboard-bottom">
                            <div class="dashboard-img">
                                <img src="/img/dashboard-2.svg" alt="image" class="">
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
                                My Customers</h4>
                            <h2 class="lineheight-42 text-32 font-weight-700 color-primary">0</h2>
                        </div>
                        <div class="dashboard-bottom">
                            <div class="dashboard-img">
                                <img src="/img/dashboard-3.svg" alt="image" class="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-8">
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 ">
                    <div class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue">New
                        Listed Properties</div>
                    <div class="search-dashboard d-flex justify-content-between flex-wrap gap-2">
                        <div class="search_button">
                            <div class="form-group mt-3 position-relative">
                                <div class="input-group input-group-sm dashboard_input-search">
                                    <span
                                        class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                    <input type="text" name="userListingFilterData[search]"
                                        class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                        placeholder="Search here..." value="">
                                </div>
                            </div>
                        </div>
                        <div class="search-select"></div>
                    </div>
                    <div class="table_dashboard empty-dashboard table-empty-dashboard">
                        <div class="empty-table">
                            <div class="empty-image">
                                <img src="/img/empty-property.svg" alt="image" class="">
                            </div>
                            <h4 class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                Your real estate portfolio is awaiting its spotlight <br>
                                let's start showcasing your properties</h4>
                            <button type="button"
                                class="Gradient_button small-button  border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white  modal-confirm-btn-success">Add
                                New Property</button>
                        </div>
                    </div>
                </div>
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8  mt-20 empty-dashboard-two">
                    <div class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue">Property
                        Portfolio Overview</div>
                    <div class="chart text-center pt-3">
                        <img src="/img/Round.svg" alt="image" class="">
                    </div>
                    <div class="chart-labels pt-30">
                        <div class="small-card-dot d-flex align-items-center">
                            <div class="dashboard-round red-color me-2"></div>
                            <div class="text-14 lineheight-18 font-weight-400 color-light-grey-four text-capitalize">
                                Home</div>
                        </div>
                        <div class="small-card-dot d-flex align-items-center">
                            <div class="dashboard-round blue-color me-2"></div>
                            <div class="text-14 lineheight-18 font-weight-400 color-light-grey-four text-capitalize">
                                Apartment</div>
                        </div>
                        <div class="small-card-dot d-flex align-items-center">
                            <div class="dashboard-round orange-color me-2"></div>
                            <div class="text-14 lineheight-18 font-weight-400 color-light-grey-four text-capitalize">
                                Offices</div>
                        </div>
                        <div class="small-card-dot d-flex align-items-center">
                            <div class="dashboard-round sky-color me-2"></div>
                            <div class="text-14 lineheight-18 font-weight-400 color-light-grey-four text-capitalize">Buy
                                to let</div>
                        </div>
                        <div class="small-card-dot d-flex align-items-center">
                            <div class="dashboard-round lightgreen-color me-2"></div>
                            <div class="text-14 lineheight-18 font-weight-400 color-light-grey-four text-capitalize">For
                                lease/Takeover</div>
                        </div>
                        <div class="small-card-dot d-flex align-items-center">
                            <div class="dashboard-round yellow-color me-2"></div>
                            <div class="text-14 lineheight-18 font-weight-400 color-light-grey-four text-capitalize">
                                Luxury</div>
                        </div>
                        <div class="small-card-dot d-flex align-items-center">
                            <div class="dashboard-round pink-color me-2"></div>
                            <div class="text-14 lineheight-18 font-weight-400 color-light-grey-four text-capitalize">
                                Investment</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 ">
                    <div class="d-flex justify-content-between pb-3">
                        <div class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue">
                            Upcoming Event</div>
                        <a href="#"
                            class="text-14 font-weight-400 text-capitalize lineheight-18 letter-s-36 color-black opacity-2">View
                            All</a>
                    </div>
                    <div class="dashboard-main-left empty-dashboard empty_dashboard_one">
                        <div class="empty-table">
                            <div class="empty-image">
                                <img src="/img/empty-calender.svg" alt="image" class="">
                            </div>
                            <h4
                                class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                No Upcoming Event</h4>
                            <button type="button"
                                class="Gradient_button small-button  border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white  modal-confirm-btn-success">Add
                                New Event</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-lg-12 mb-10">
                <div class="dashboard-card_one  box-shadow-two b-color-white border-r-8 ">
                    <div class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue">
                        Properties Map</div>
                    <div class="dashboard_map-empty empty-dashboard">
                        <div class="empty-table">
                            <div class="empty-image">
                                <img src="/img/empty-property.svg" alt="image" class="">
                            </div>
                            <h4
                                class="text-18 font-weight-700 lineheight-22 text-capitalize color-b-blue pt-12 pb-20">
                                This section is empty. Please add properties to get started</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script src="https://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>


<script>
    Chart.pluginService.register({
        afterUpdate: function(chart) {
            for (let i = 1; i < chart.config.data.labels.length; i++) {
                var arc = chart.getDatasetMeta(0).data[i];
                arc.round = {
                    x: (chart.chartArea.left + chart.chartArea.right) / 2,
                    y: (chart.chartArea.top + chart.chartArea.bottom) / 2,

                    thickness: (chart.outerRadius - chart.innerRadius) / 2 - 1,
                    backgroundColor: arc._model.backgroundColor
                }
            }

            var arc = chart.getDatasetMeta(0).data[0];
            arc.round = {
                x: (chart.chartArea.left + chart.chartArea.right) / 2,
                y: (chart.chartArea.top + chart.chartArea.bottom) / 2,

                thickness: (chart.outerRadius - chart.innerRadius) / 2 - 1,
                backgroundColor: arc._model.backgroundColor
            }
        },

        afterDraw: function(chart) {
            for (let i = 1; i < chart.config.data.labels.length; i++) {
                var ctx = chart.chart.ctx;
                arc = chart.getDatasetMeta(0).data[i];
                var startAngle = Math.PI / 2 - arc._view.startAngle;
                var endAngle = Math.PI / 2 - arc._view.endAngle;
                ctx.save();
                ctx.translate(arc.round.x, arc.round.y);
                ctx.fillStyle = arc.round.backgroundColor;
                ctx.beginPath();
                ctx.arc(arc.round.radius * Math.sin(endAngle), arc.round.radius * Math.cos(endAngle), arc
                    .round
                    .thickness, 0, 2 * Math.PI);
                ctx.closePath();
                ctx.fill();
                ctx.restore();
            }

            var ctx = chart.chart.ctx;
            arc = chart.getDatasetMeta(0).data[0];
            var startAngle = Math.PI / 2 - arc._view.startAngle;
            var endAngle = Math.PI / 2 - arc._view.endAngle;
            ctx.save();
            ctx.translate(arc.round.x, arc.round.y);
            ctx.fillStyle = arc.round.backgroundColor;
            ctx.beginPath();

            ctx.arc(arc.round.radius * Math.sin(endAngle), arc.round.radius * Math.cos(endAngle), arc.round
                .thickness, 0, 2 * Math.PI);
            ctx.closePath();
            ctx.fill();
            ctx.restore();
        },
    });

    var config = {
        type: 'doughnut',
        data: {
            labels: [
                'Red',
                'Green',
                'blue',
                'sky',
                'orange',
                'lightpink',
                'yellow'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [150, 150, 150, 150, 150, 150, 150],
                backgroundColor: [
                    'red',
                    'rgba(6, 180, 138, 1)',
                    'rgba(101, 96, 240, 1)',
                    'rgba(111, 211, 247, 1)',
                    'rgba(255, 138, 0, 1)',
                    'rgba(252, 113, 255, 1)',
                    'rgba(243, 196, 76, 1)',
                ],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,

            legend: {
                position: 'bottom',
                lineWidth: 50,
                maxWidth: 100,
                fullWidth: false,
                labels: {


                    usePointStyle: true,
                    boxWidth: 10,
                    padding: 25,
                    fontSize: 35,
                    fontColor: 'rgba(95, 95, 95, 1)',
                    width: 300,
                }
            },

            tooltips: {
                enabled: true,
            },
            cutoutPercentage: 78,
            rotation: -0.5 * Math.PI,
            circumference: 2 * Math.PI,

            animation: {
                animateScale: true,
                animateRotate: true
            },
            elements: {
                center: {

                    maxText: '100%',
                    text: '',
                    fontColor: '#000',
                    fontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                    fontStyle: 'bold',
                    minFontSize: 1,
                    maxFontSize: 256,
                }
            }
        }
    };
    window.onload = function() {
        var ctx = document.getElementById('myChart').getContext('2d');
        window.myDoughnut = new Chart(ctx, config);

    };
</script>
