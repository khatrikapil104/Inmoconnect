@extends('layouts.app')
@section('content')
@push('styles')

@section('title')
{{trans('messages.sidebar.Property_Search')}} Inmoconnect
@endsection

<!-- slider -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<link  rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

<style>

.slick-list .slick-slide {
	font-size: 30px;
	text-align: center;
	line-height: 2;
	font-weight: 700;
    margin-left:10px;
    margin-right:5px;
}

.slick-slide.slick-current.slick-active{
    margin-left:0;
}
.slick-arrow {
	z-index: 1;
}

.slick-arrow:before {
	font-size: 30px;
}
.slick-next {
	right: 18px;
	top:14px;
}
.slick-prev {
	left: 93%;
    top:14px;
}
.slick-list.draggable{
    padding-top:60px;
}
.slick-next.slick-disabled:before, .slick-prev.slick-disabled:before{
    opacity:1;
}
.slick-slider .slick-disabled{
    opacity:1;
}
.slick-next:before, .slick-prev:before{
    opacity:1;
}
.my-project_dashboar ul.slick-dots{
    justify-content: end;
}
.my-project_dashboar .slick-dots{
    top: 14px;
    left: -100px;
}
.my-project_dashboar .slick-dots li button{
    width: 6px;
height: 6px;
padding:0;
background-color:#8F77EA;
}
.my-project_dashboar .slick-dots li.slick-active button{
    background-color:#383192;
}
.my-project_dashboar .slick-dots li button:before{
    content: '';
}
.my-project_dashboar .slick-dots li{
    width: 0px;
    height: 0px;
}
.slick-next:before{
    content: "";
    background-image: url("../../img/slider_right.svg");
    background-repeat: no-repeat;
    width: 30px;
    height: 30px;
    display: block;
    background-position: center center;
}
.slick-prev:before{
    content: "";
    background-image: url("../../img/slider_left.svg");
    background-repeat: no-repeat;
    width: 30px;
    height: 30px;
    display: block;
    background-position: center center;
}
.slick-arrow:before {
    font-size: 18px;
    padding: 5px 8px;
}
.slick-next:before, .slick-prev:before{
    border-radius: 4px;
    border: 1px solid #383192;
    line-height: 1;
    opacity: 1;
    color: #383192;
}
.slick_list_main_text{
    margin-bottom: -30px;
}

.slick-track{
    display: flex;
    flex-direction: row;
    justify-content: center;
    gap: 20px;
}
.slick-track:first-child{
    gap:0;
}
</style>

<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">

        <!-- ///////////////////////////////////////// breadcrumb///////////////////////////////////////////////////////////////////// -->
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">My Projects
                    </div>
                </div>
                <div class="header-right-button_one d-flex align-items-center gap-3">
                    <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                        data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                        <img src="{{asset('img/Projct_breadcrum.svg')}}" alt="image" class="#">
                    </div>
                </div>
            </div>
        </div>
        <!-- ///////////////////////////////////////////breadcrumb_end ///////////////////////////////////////////////////////// -->
    
        <!-- /////////////////////////dashboard-card/////////////////////////////////////////////// -->
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3 mb-2" onclick="window.open('http://127.0.0.1:8000/admin/users','_self')">
                <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="dashboard-top">
                            <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2 opacity-8">
                            Total Project</h4>
                            <h2 class="lineheight-42 text-32 font-weight-700 color-primary">100</h2>
                        </div>
                        <div class="dashboard-bottom">
                            <div class="dashboard-img">
                                <img src="/img/my_p-dashboard_4.svg" alt="image" class="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 mb-2" onclick="window.open('http://127.0.0.1:8000/admin/properties','_self')">
                <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="dashboard-top">
                            <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2 opacity-8">
                            On-Going Project</h4>
                            <h2 class="lineheight-42 text-32 font-weight-700 color-primary">30</h2>
                        </div>
                        <div class="dashboard-bottom">
                            <div class="dashboard-img">
                                <img src="/img/my_p-dashboard_2.svg" alt="image" class="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 mb-2" onclick="window.open('http://127.0.0.1:8000/admin/properties','_self')">
                <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="dashboard-top">
                            <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2 opacity-8">
                            Overdue Project</h4>
                            <h2 class="lineheight-42 text-32 font-weight-700 color-primary">30</h2>
                        </div>
                        <div class="dashboard-bottom">
                            <div class="dashboard-img">
                                <img src="/img/my_p-dashboard_3.svg" alt="image" class="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 mb-2" onclick="window.open('http://127.0.0.1:8000/admin/properties','_self')">
                <div class="dashboard-card box-shadow-two b-color-white border-r-8 ">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="dashboard-top">
                            <h4 class="text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-b-blue mb-2 opacity-8">
                            Completed Project</h4>
                            <h2 class="lineheight-42 text-32 font-weight-700 color-primary">15</h2>
                        </div>
                        <div class="dashboard-bottom">
                            <div class="dashboard-img">
                                <img src="/img/my_p-dashboard_1.svg" alt="image" class="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- ////////////////////////////////rashboard-card-end//////////////////////////////////// -->

        <!-- ////////////////////////slider/////////////////////////////////////////////////// -->
        <div class="my-project_dashboar">
           <div class="slick_list_main_text pt-30">
              <div class="slick_list_text text-18 font-weight-700 lineheight-22 text-capitalize color-primary letter-s-36">All
                Projects
              </div>
           </div>
    <div class="slick-list">
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ///////////////////////////end-slider///////////////////////////////////////////// -->

<!-- //////////////////////second-slider //////////////////////////////////////////-->
<div class="my-project_dashboar">
           <div class="slick_list_main_text pt-30">
              <div class="slick_list_text text-18 font-weight-700 lineheight-22 text-capitalize color-primary letter-s-36">All
                Projects
              </div>
           </div>
    <div class="slick-list">
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- //////////////////////end-slider////////// /////////////////////////////-->

<!-- ////////////////////////////third-slider//////////////////////// -->
<div class="my-project_dashboar">
           <div class="slick_list_main_text pt-30">
              <div class="slick_list_text text-18 font-weight-700 lineheight-22 text-capitalize color-primary letter-s-36">All
                Projects
              </div>
           </div>
    <div class="slick-list">
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-12 slider-main-card">
                    <a href="login.php" class="slider_card" target="_blank">
                        <div class="slider-top-progress d-flex justify-content-between align-items-baseline">
                            <div class="slider-top-left">
                                <div
                                    class="text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22">
                                    Ratnadeep Complex</div>
                                <div class="text-14 color-light-grey-two text-capitalize font-weight-400 lineheight-18">
                                    For Sale</div>
                            </div>
                            <div class="slider-top-right in_progress">
                                <div class="">In-Progress</div>
                            </div>
                        </div>
                        <div
                            class="slider_price text-18 font-weight-700 lineheight-22 letter-s-36 text-capitalize color-b-blue lineheight-22 px-15">
                            Є800,000</div>
                        <div class="slider-Agent d-flex  align-items-center">
                            <img src="{{asset('img/my_p-card_3.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Project
                                Owner:</div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 owner_slider-name">
                                James Henry</div>
                        </div>
                        <div class="slider-Agent d-flex  align-items-center px-15">
                            <img src="{{asset('img/my_p-card_2.svg')}}" alt="image" class="me-2">
                            <div class="text-14 color-b-blue text-capitalize font-weight-400 lineheight-18">Deadline:
                            </div>
                            <div
                                class="text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18 ms-1 ">
                                12/02/2024</div>
                        </div>

                        <div
                            class="slider_small-text text-14 color-light-grey-five text-capitalize font-weight-400 lineheight-18">
                            Lorem ipsum dolor sit amet consectetur. Pellentesque nisi eget scelerisque neque eu euismod
                            ipsum vitae. Arcu enim libero est sagittis faucibus sed viverra viverra. Risus dui fames
                            pulvinar ut est. Viverra mollis habitasse mi ultricies pulvinar.
                        </div>
                        <div class="row px-15">
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <img src="{{asset('img/my_p-card_1.svg')}}" alt="image" class="me-2">
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex">
                                    <i class="icon-user text-18 color-b-blue me-2"></i>
                                    <div class="more-image d-flex align-items-center gap-1">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                        <img src="/img/profile_1.png" alt="image" class="">
                                    </div>
                                    <button
                                        class="text-12 color-primary text-capitalize font-weight-400 lineheight-18 more_button b-color-transparent ms-1">More</button>
                                </div>
                            </div>
                        </div>
                        <div class="task-progress">
                            <p class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18 py-2">10 Tasks
                                <span
                                    class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">80%</span>
                            </p>
                            <progress class="progress progress1" max="100" value="80"></progress>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ///////////////////////////////////////end-slider//////////////////// -->
    </div>
</div>



@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/js/modules/properties/property_index.js') }}"></script>


<script>
    $(document).ready(function () {
	$(".slick-list").slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: true,
        dots: true,
		infinite: false,
        centerPadding: '60px',
		autoplay: false,
        responsive: [
        {
            breakpoint: 1440,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 567,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }

  ]
	});
	$(".prev-btn").click(function () {
		$(".slick-list").slick("slickPrev");
	});

	$(".next-btn").click(function () {
		$(".slick-list").slick("slickNext");
	});
	$(".prev-btn").addClass("slick-disabled");
	$(".slick-list").on("afterChange", function () {
		if ($(".slick-prev").hasClass("slick-disabled")) {
			$(".prev-btn").addClass("slick-disabled");
		} else {
			$(".prev-btn").removeClass("slick-disabled");
		}
		if ($(".slick-next").hasClass("slick-disabled")) {
			$(".next-btn").addClass("slick-disabled");
		} else {
			$(".next-btn").removeClass("slick-disabled");
		}
	});
});

</script>

@endpush
@endsection

