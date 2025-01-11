<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <!-- botstrap-css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- slick-slider -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css'>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css'>
    <!-- custom-css -->
    <link  rel="stylesheet" href="{{ asset('assets/css/landing_test.css') }}">
    <style>
        .progress circle {
  fill: transparent;
  stroke: #00d6d6;
  stroke-width: 10;
}
.progress{
    height: auto;
    border:1px solid red;
    width:452px;
    height:452px;
    background-color:transparent;
    border-radius:50%;
}
.progress-round__wrap{
    position:relative;
}
.circle-header-round{
    position:absolute;
    top:0;
}
.round-logo{
    position: absolute;
    top: 131px;
    left: 25%;
}
    </style>
</head>
<body>
<!-- <section class="section how-work-section common-l-section fp-auto-height " id="how_work">
        <div class="landing-page-container">
            <div class="row">
                <div class="col-12">
                    <div class="key-feature-m-text text-center work-section-text">
                        <h2 class="color-primary position-relative d-inline text-capitalization">How It Works</h2>
                        <h5 class="color-b-blue mt-20">Revolve Around Success: InmoConnect's Comprehensive 360° Real
                            Estate Solutions</h5>
                    </div>
                </div>
            </div>
            <div class="row extra_slider">
                <div class="col-lg-5 col-xl-5">
                    <div class="slider-animation">
                        <div class="slick-carousel">
                            <div> <img src="{{asset('img/key-feature-11.png')}}" alt="image" class="#">
                            </div>
                            <div> <img src="{{asset('img/key-feature-12.png')}}" alt="image" class="#">
                            </div>
                            <div> <img src="{{asset('img/key-feature-13.png')}}" alt="image" class="#">
                            </div>
                            <div> <img src="{{asset('img/key-feature-14.png')}}" alt="image" class="#">
                            </div>
                            <div> <img src="{{asset('img/key-feature-15.png')}}" alt="image" class="#">
                            </div>
                            <div> <img src="{{asset('img/key-feature-17.png')}}" alt="image" class="#">
                            </div>
                        </div>
                    </div>
                    <div class="text-carousel">
                        <div class="slick-carousel_two">
                            <div>
                                <div class="slick-slider-text">Agents embark on their InmoConnect journey by signing
                                    up
                                    on our user-friendly platform</div>
                            </div>
                            <div>
                                <div class="slick-slider-text">Agents effortlessly integrate their property
                                    portfolio
                                    using XML feeds, ensuring real-time updates.</div>
                            </div>
                            <div>
                                <div class="slick-slider-text">Empower collaboration by creating teams, connecting
                                    with
                                    customers, and sharing properties seamlessly.</div>
                            </div>
                            <div>
                                <div class="slick-slider-text">Efficiently manage tasks, projects, and workflows
                                    with
                                    our integrated Project Management Module.</div>
                            </div>
                            <div>
                                <div class="slick-slider-text">Facilitate real-time communication within your team
                                    and
                                    with clients through our intuitive Chat System.</div>
                            </div>
                            <div>
                                <div class="slick-slider-text">Enjoy uninterrupted support with our responsive 24/7
                                    customer assistance, ensuring a smooth experience.</div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-2 mt-5 mt-lg-0">
                    <div class="text-carousel_one">
                        <div class=" slick_carousel_one">
                            <div>
                                <div class="slick-slider-text_one">Joining <br>InmoConenct</div>
                            </div>
                            <div>
                                <div class="slick-slider-text_one">Connect Property <br> Portfolio</div>
                            </div>
                            <div>
                                <div class="slick-slider-text_one">Create <br>and Collaborate</div>
                            </div>
                            <div>
                                <div class="slick-slider-text_one">Effortless <br> Management</div>
                            </div>
                            <div>
                                <div class="slick-slider-text_one">In-Built <br>Chat System</div>
                            </div>
                            <div>
                                <div class="slick-slider-text_one">Responsive <br> Support</div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-5 col-xl-5 mt-5 mt-lg-0">
                    <div class="work-left-s position-relative">

                        <div class="countdown">
                        <div class="slider-progress">
    <div class="progress"></div>
  </div>
                            <svg version="1.1" id="circle" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100"
                                xml:space="preserve">
                                <circle fill="none" stroke="#383192" stroke-width="2" stroke-mitterlimit="0" cx="50"
                                    cy="50" r="48" stroke-dasharray="360" stroke-linecap="round"
                                    transform="rotate(-90 ) translate(-100 0)">
                                    <animate attributeName="stroke-dashoffset" values="-360;0" dur="5.3s"
                                        repeatCount="indefinite"></animate>
                                </circle>
                            </svg>
                            <div class="circle-header-round">
                                <div class="circle-master">
                                    <div class="progress_work">
                                        <div class="circle_one circle-one active">
                                            <img src="{{asset('img/key-feature-23.png')}}" alt="image" class="#">
                                        </div>
                                    </div>
                                    <div class="progress_work">
                                        <div class="circle_one circle-two">
                                            <img src="{{asset('img/key-feature-19.png')}}" alt="image" class="#">
                                        </div>
                                    </div>
                                    <div class="progress_work">
                                        <div class="circle_one circle-three">
                                            <img src="{{asset('img/key-feature-20.png')}}" alt="image" class="#">
                                        </div>
                                    </div>
                                    <div class="progress_work">
                                        <div class="circle_one circle-four">
                                            <img src="{{asset('img/key-feature-21.png')}}" alt="image" class="#">
                                        </div>
                                    </div>
                                    <div class="progress_work">
                                        <div class="circle_one circle-five">
                                            <img src="{{asset('img/key-feature-22.png')}}" alt="image" class="#">
                                        </div>
                                    </div>
                                    <div class="progress_work">
                                        <div class="circle_one circle-six">
                                            <img src="{{asset('img/key-feature-18.png')}}" alt="image" class="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="round-logo">
                                <img src="{{asset('img/h-work-1.png')}}" alt="image" class="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section> -->

<div class="slider-wrapper" id="slick-1">
    <div class="row">
        <div class="col-lg-5">
            <div class="slider">
            <div> <img src="{{asset('img/key-feature-11.png')}}" alt="image" class="#">
                            </div>
                            <div> <img src="{{asset('img/key-feature-12.png')}}" alt="image" class="#">
                            </div>
                            <div> <img src="{{asset('img/key-feature-13.png')}}" alt="image" class="#">
                            </div>
                            <div> <img src="{{asset('img/key-feature-14.png')}}" alt="image" class="#">
                            </div>
                            <div> <img src="{{asset('img/key-feature-15.png')}}" alt="image" class="#">
                            </div>
                            <div> <img src="{{asset('img/key-feature-17.png')}}" alt="image" class="#">
                            </div>
            </div>
            <div class="slider">
            <div>
                                <div class="slick-slider-text">Agents embark on their InmoConnect journey by signing
                                    up
                                    on our user-friendly platform</div>
                            </div>
                            <div>
                                <div class="slick-slider-text">Agents effortlessly integrate their property
                                    portfolio
                                    using XML feeds, ensuring real-time updates.</div>
                            </div>
                            <div>
                                <div class="slick-slider-text">Empower collaboration by creating teams, connecting
                                    with
                                    customers, and sharing properties seamlessly.</div>
                            </div>
                            <div>
                                <div class="slick-slider-text">Efficiently manage tasks, projects, and workflows
                                    with
                                    our integrated Project Management Module.</div>
                            </div>
                            <div>
                                <div class="slick-slider-text">Facilitate real-time communication within your team
                                    and
                                    with clients through our intuitive Chat System.</div>
                            </div>
                            <div>
                                <div class="slick-slider-text">Enjoy uninterrupted support with our responsive 24/7
                                    customer assistance, ensuring a smooth experience.</div>
                            </div>

            </div>
        </div>
        <div class="col-lg-2">
            <div class="slider">
            <div>
                                <div class="slick-slider-text_one">Joining <br>InmoConenct</div>
                            </div>
                            <div>
                                <div class="slick-slider-text_one">Connect Property <br> Portfolio</div>
                            </div>
                            <div>
                                <div class="slick-slider-text_one">Create <br>and Collaborate</div>
                            </div>
                            <div>
                                <div class="slick-slider-text_one">Effortless <br> Management</div>
                            </div>
                            <div>
                                <div class="slick-slider-text_one">In-Built <br>Chat System</div>
                            </div>
                            <div>
                                <div class="slick-slider-text_one">Responsive <br> Support</div>
                            </div>

            </div>
        </div>
        <div class="col-lg-5">
        <div class="slider-progress">
    <div class="progress1"></div>
  </div>
  <div class="progress-round__wrap">
    
      <svg class="progress">
      <circle r="226" cx="227" cy="227" />
        
                                    <!-- <circle fill="none" stroke="#383192" stroke-width="2" stroke-mitterlimit="0" cx="250"
                                    cy="250" r="248" stroke-dasharray="300" stroke-linecap="round"
                                    transform="rotate(-70 ) translate(00 -300)">
                                    <animate attributeName="stroke-dashoffset"></animate>
                                </circle> -->
      </svg>

  <div class="circle-header-round">
                                <div class="circle-master">
                                    <div class="progress_work">
                                        <div class="circle_one circle-one active">
                                            <img src="{{asset('img/key-feature-23.png')}}" alt="image" class="#">
                                        </div>
                                    </div>
                                    <div class="progress_work">
                                        <div class="circle_one circle-two">
                                            <img src="{{asset('img/key-feature-19.png')}}" alt="image" class="#">
                                        </div>
                                    </div>
                                    <div class="progress_work">
                                        <div class="circle_one circle-three">
                                            <img src="{{asset('img/key-feature-20.png')}}" alt="image" class="#">
                                        </div>
                                    </div>
                                    <div class="progress_work">
                                        <div class="circle_one circle-four">
                                            <img src="{{asset('img/key-feature-21.png')}}" alt="image" class="#">
                                        </div>
                                    </div>
                                    <div class="progress_work">
                                        <div class="circle_one circle-five">
                                            <img src="{{asset('img/key-feature-22.png')}}" alt="image" class="#">
                                        </div>
                                    </div>
                                    <div class="progress_work">
                                        <div class="circle_one circle-six">
                                            <img src="{{asset('img/key-feature-18.png')}}" alt="image" class="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="round-logo">
                                <img src="{{asset('img/h-work-1.png')}}" alt="image" class="#">
                            </div>
        </div>
</div>
 
</div>
</div>

<!-- jquery -->
<script src="{{ asset('assets/js/jquery.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>

<!-- bootstrap-js -->
<script src= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"> </script> 

<!-- slider -->
<!-- <script>
        $('.slick-carousel_three').slick({
        vertical:false,
        verticalSwiping:false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        speed: 1500,
        autoplaySpeed: 5000,
        infinite: true,
        arrows:false,
        swipeToSlide:false,
        swipe:false,
        touchMove:false,
        asNavFor: '.slick_carousel_one,.slick-carousel_two,.slick-carousel',
  });
 $('.slick-carousel').slick({
        vertical:true,
        verticalSwiping:true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        speed: 1500,
        autoplaySpeed: 5000,
        infinite: true,
        arrows:false,
        touchMove:false,
        swipeToSlide:false,
        swipe:false,
        asNavFor: '.slick_carousel_one,.slick-carousel_two,.slick-carousel_three',
  });
  $('.slick_carousel_one').slick({
        vertical:true,
        verticalSwiping:true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        speed: 1500,
        autoplaySpeed: 5000,
        infinite: true,
        arrows:false,
        touchMove:false,
        swipeToSlide:false,
        swipe:false,
        asNavFor: '.slick-carousel,.slick-carousel_two,.slick-carousel_three',
  });
  $('.slick-carousel_two').slick({
        vertical:true,
        verticalSwiping:true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        speed: 1500,
        autoplaySpeed: 5000,
        infinite: true,
        arrows:false,
        touchMove:false,
        swipeToSlide:false,
        swipe:false,
        asNavFor: '.slick_carousel_one,.slick-carousel,.slick-carousel_three',
  });
</script> -->
<script>
    var x = 5.1;
function updateClass() {
  let a = $(".circle_one.active");
  a.removeClass("active");
  a = a.parent().prev(".progress_work"); // Change 'next' to 'prev'
  if (a.length == 0)
    a = $(".progress_work").last(); // Change 'first' to 'last'
  a.find(".circle_one").addClass("active");
}


$(document).ready(function() {
  setInterval(function() {
    updateClass();
  }, x * 1000);
});
  </script>
  <script>
  $(document).ready(function(){
  var time = 5;
  var $bar,
      $slick,
      isPause,
      tick,
      percentTime;
  
  $slick = $('.slider');
  $slick.slick({
    draggable: true,
    adaptiveHeight: false,
    dots: false,
    mobileFirst: true,
    pauseOnDotsHover: true,
    vertical:true,
    verticalSwiping:true,
  });
  
  $bar = $('.slider-progress .progress');
  $barRound = $('.progress');
  
  $('.slider-wrapper').on({
    mouseenter: function() {
      isPause = true;
    },
    mouseleave: function() {
      isPause = false;
    }
  })
  
  function startProgressbar() {
    resetProgressbar();
    percentTime = 0;
    isPause = false;
    tick = setInterval(interval, 10);
  }
  var $rbar = $('.progress circle');
var rlen = 2 * Math.PI * $rbar.attr('r');
  function interval() {
    
    percentTime += 1 / (time + 0.1);
    $bar.css({
      width: percentTime + '%'
    });
    $rbar.css({
      'stroke-dasharray': rlen,
      'stroke-dashoffset': rlen * (1 - percentTime / 100)
    });

    if (percentTime >= 100) {
      $slick.slick('slickNext');
      startProgressbar();
    }
 
  }
  
  
  function resetProgressbar() {
    $bar.css({
     width: 0+'%' 
    });
    clearTimeout(tick);
  }
  
  startProgressbar();
  
});

// circle bar

</script>
</body>
</html>


