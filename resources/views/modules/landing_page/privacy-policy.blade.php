<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZGRC65Z3L7"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-ZGRC65Z3L7');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{trans('messages.landing_page.Footer_privacy')}}</title>

     <!-- favicon -->
     <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/svg+xml" /> 
   
    <!-- botstrap-css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <!-- font-awesome-icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- google-font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
   
    <!-- slick-slider -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.css">

    <!-- custom-css -->
    <link  rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
 
    <!-- icon -->
    <link  rel="stylesheet" href="{{ asset('assets/icon/style.css') }}">

</head>
<body>

@php
$languages = getLanguages();
$currentLocale = (session()->has('locale')) ? session()->get('locale') :
config('app.locale');

$defaultLanguage =$languages->firstWhere('lang_code', $currentLocale) ?:
$languages->first();
@endphp
<div id="top">

       <!-- header -->
       <header id="header">
            <div id="navbar">
                <nav class="navbar navbar-expand-lg navbar-light w-100 d-block">
                    <div class="landing-page-container">
                        <div class="justify-content-between header-landing d-flex flex-wrap">
                        <div class="mobile-logo" onclick="window.open('{{ route('landing_page.landing_page') }}','_self')"style='{{(!empty($currentLocale) && $currentLocale == 'es') ? 'width:250px;' : '' }}'>
                                <a href="#"> <img src="{{asset('img/landing-logo.png')}}" alt="image" class="#"></a>
                            </div>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="bars"><i class="fa-solid fa-bars"></i></span>
                                <span class="cross"><i class="fa-solid fa-xmark"></i></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="justify-content-center select-language d-flex align-items-center">
                                    <div class="wrapper1 h-85 d-flex align-items-center">
                                        <dl id="country-select" class="dropdown languagesDropdown">
                            
                                            <dt>
                                                <a href="javascript:void(0);">
                                                    <span>
                                                        <!-- <span><img src="https://staging.inmoconnect.brisktechalmas.com/img/en_flag.png" alt="image" class="border-r-8 mx-2"></span> -->
                                                        <span> <img src="{{ asset('img/language-selection-box.png') }}"
                                                                alt="image" class="border-r-8 mx-2"></span>
                                                        <span class="countryName">{{ $defaultLanguage->title }}</span>

                                                    </span>
                                                </a>
                                            </dt>
                                            <dd>
                                                <ul style="display: none;" class="flag-dropdown">
                                                    <li>
                                                        <a href="{{route('user.setLocale','en')}}">
                                                            <span>
                                                                <img src="{{ asset('img/en_flag.png') }}" alt="image"
                                                                    class="border-r-8 mx-2">
                                                            </span>
                                                            <span
                                                                class="text-18 color-black font-weight-400 lineheight-24 ms-2 countryName">English</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('user.setLocale','es')}}">
                                                            <span>
                                                                <img src="{{ asset('img/es_flag.png') }}" alt="image"
                                                                    class="border-r-8 mx-2">
                                                            </span>
                                                            <span
                                                                class="text-18 color-black font-weight-400 lineheight-24 ms-2 countryName">Español</span>
                                                        </a>
                                                    </li>
                                                    <!-- <li>
                                                        <a href="javascript:void(0)">
                                                            <span>
                                                                <img src="{{ asset('img/fr_flag.png') }}" alt="image"
                                                                    class="border-r-8 mx-2">
                                                            </span>
                                                            <span
                                                                class="text-18 color-black font-weight-400 lineheight-24 ms-2 countryName">France</span>
                                                        </a>
                                                    </li> -->
                                                </ul>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                                <ul class="navbar-nav navbar-right mb-lg-0">

                                    <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)" onclick="window.open('{{ route('landing_page.landing_page') }}#Home','_self')"
                                            title="{{trans('messages.landing_page.Home')}}"style='{{(!empty($currentLocale) && $currentLocale == 'es') ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>{{trans('messages.landing_page.Home')}}</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)" onclick="window.open('{{ route('landing_page.landing_page') }}#how_work','_self')"
                                            title="{{trans('messages.landing_page.How_it_works')}}"style='{{(!empty($currentLocale) && $currentLocale == 'es') ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>{{trans('messages.landing_page.How_it_works')}}</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)" onclick="window.open('{{ route('landing_page.landing_page') }}#key-feature','_self')"
                                            title="{{trans('messages.landing_page.Key_features')}}"style='{{(!empty($currentLocale) && $currentLocale == 'es') ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>{{trans('messages.landing_page.Key_features')}}</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)" onclick="window.open('{{ route('landing_page.landing_page') }}#demo_introduction','_self')"
                                            title="{{trans('messages.landing_page.Demo_Introduction')}}"style='{{(!empty($currentLocale) && $currentLocale == 'es') ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>{{trans('messages.landing_page.Demo_Introduction')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0)" onclick="window.open('{{ route('landing_page.landing_page') }}#faq_section','_self')"
                                            title="{{trans('messages.landing_page.FAQ')}}"style='{{(!empty($currentLocale) && $currentLocale == 'es') ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>{{trans('messages.landing_page.FAQ')}}</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)" onclick="window.open('{{ route('landing_page.landing_page') }}#footer','_self')"
                                            title="{{trans('messages.landing_page.Contact_Us')}}"style='{{(!empty($currentLocale) && $currentLocale == 'es') ? 'font-size:13px!important;padding:5px 7px!important' : '' }}'>{{trans('messages.landing_page.Contact_Us')}}</a>
                                    </li>
                                    <li class="nav-item header-button">
                                        <a class="nav-link common-button" href="javascript:void(0)" onclick="window.open('{{ route('landing_page.landing_page') }}#join_us','_self')"
                                            title="{{trans('messages.landing_page.Join_Now')}}"style='{{(!empty($currentLocale) && $currentLocale == 'es') ? 'font-size:13px!important;padding:5px 20px!important' : '' }}'>{{trans('messages.landing_page.Join_Now')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

            </div>
        </header>
    <!-- end-header -->

    <!-- terms  -->
    <section class="section faq_section common-l-section common_terms" id="faq_section">
        <div class="landing-page-container">
            <div class="row">
                <div class="col-12">
                    <div class="key-feature-m-text text-center work-section-text">
                         <h2 class=" color-primary position-relative d-inline text-capitalization"> {{trans('messages.privacy_page.main')}}
                        </h2>
                    </div>
                </div>

                <div class="terms_text">
                    <h5 class="color-b-blue mt-20">  {{trans('messages.privacy_page.small_text')}}</h5>

                    <p><strong> {{trans('messages.privacy_page.strong_1')}}</strong> {{trans('messages.privacy_page.small_text_1')}}</p>
                    <p><strong> {{trans('messages.privacy_page.strong_2')}}</strong>  {{trans('messages.privacy_page.small_text_2')}}</p>
                    <p><strong>{{trans('messages.privacy_page.strong_3')}}</strong>  {{trans('messages.privacy_page.small_text_3')}}</p>
                    <p><strong>{{trans('messages.privacy_page.strong_4')}}</strong>  {{trans('messages.privacy_page.small_text_4')}}</p>
                    <p><strong>{{trans('messages.privacy_page.strong_5')}}</strong> {{trans('messages.privacy_page.small_text_5')}}</p>
                    <p><strong>{{trans('messages.privacy_page.strong_6')}}</strong> {{trans('messages.privacy_page.small_text_6')}}</p>
                    <p><strong>{{trans('messages.privacy_page.strong_7')}}</strong>  {{trans('messages.privacy_page.small_text_7')}}</p>
                    <p><strong>{{trans('messages.privacy_page.strong_8')}}</strong>  {{trans('messages.privacy_page.small_text_8')}}</p>
                    <p><strong>{{trans('messages.privacy_page.strong_9')}}</strong>  {{trans('messages.privacy_page.small_text_9')}}<a
                            href="mailto:business@inmoconnect.com">{{trans('messages.landing_page.form_email')}}</a></p>

                    <p>{{trans('messages.privacy_page.small_text_10')}}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end-terms -->

 <!-- footer -->
 <footer class="section footer" id="footer">
            <div class="landing-page-container position-relative">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="footer-logo-social">
                                <div class="footer-logo">
                                    <img src="{{asset('img/footer-1.png')}}" alt="image" class="#">
                                </div>
                                <h5 class="social_text">{{trans('messages.landing_page.Footer_follow_us')}}</h5>
                                <div class="social-icon">
                                    <a href="https://www.instagram.com/inmoconnectcrm/" target="_blank"><i
                                            class="fab fa-instagram"></i></a>
                                    <a href="https://www.linkedin.com/company/inmoconnect" target="_blank"><i
                                            class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="https://twitter.com/inmoconnect" target="_blank"><i
                                            class="fa-brands fa-x-twitter"></i></a>
                                    <a href="https://www.facebook.com/inmoconnectcrm" target="_blank"><i
                                            class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://www.youtube.com/@InmoConnectcrm" target="_blank"><i
                                            class="fa-brands fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="footer-contact">
                                <h5>{{trans('messages.landing_page.Footer_contact_info')}}</h5>
                                <div class="contant-s-info d-flex">
                                    <div class="contact-icon">
                                        <i class=" icon-Mail"></i>
                                    </div>
                                    <div class="contant-text">
                                        <p>{{trans('messages.landing_page.Footer_Email_us')}}</p>
                                        <a href="mailto:business@inmoconnect.com"
                                            class="line_hover">{{trans('messages.landing_page.form_email')}}</a>
                                    </div>
                                </div>
                                <div class="contant-s-info d-flex">
                                    <div class="contact-icon">
                                        <i class=" icon-location"></i>
                                    </div>
                                    <div class="contant-text">
                                        <p>{{trans('messages.landing_page.Footer_Address')}}</p>
                                        <a href="#">{{trans('messages.landing_page.Footer_Address_one')}}<br>
                                            {{trans('messages.landing_page.Footer_Address_two')}}<br>
                                            {{trans('messages.landing_page.Footer_Address_three')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <form id="subscribeNewsletterForm">
                                <div class="footer-email">
                                    <p> {{trans('messages.landing_page.Footer_Email_text_one')}}<br>
                                        {{trans('messages.landing_page.Footer_Email_text_two')}}</P>
                                    <div class="footer-email_button">
                                        <input type="text" name="email"
                                            placeholder="{{trans('messages.landing_page.Footer_Email_placeholder')}}">
                                        <button type="submit"
                                            class="subscribeNewsletterBtn">{{trans('messages.landing_page.Footer_Email_button')}}</button>
                                    </div>
                                    <div class="invalid-feedback fw-bold error subscribeNewsletterMsgErr"></div>
                                    <div class="valid-feedback fw-bold success subscribeNewsletterMsgSuccess"></div>
                                    <div class="footer-ellipse">
                                        <img src="{{asset('img/footer-2.png')}}" alt="image" class="#">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom d-flex flex-column align-items-center justify-content-center">
                    <p class="coptyright text-14 lineheight-22 font-weight-700 color-white">
                        {{trans('messages.landing_page.Footer_copyright')}}</p>
                    <ul class="policy-list">
                        <li><a href="terms-condition" target="_blank" class="line_hover">
                                {{trans('messages.landing_page.Footer_terms')}}</a></li>
                        <li><a href="privacy-policy" target="_blank" class="line_hover">
                                {{trans('messages.landing_page.Footer_privacy')}}</a></li>
                    </ul>
                    <a href="https://techalmas.com/" target="_blank" class="website_p color-white">
                        {{trans('messages.landing_page.Footer_Powered')}}
                        <span class="line_hover_one"></span> {{trans('messages.landing_page.Footer_Techalmas')}}</a>
                </div>
            </div>
            <a href="#top" class="footer-top-logo">
                <i class="fa-solid fa-arrow-up"></i>
            </a>
        </footer>
        <!-- end-footer -->
</div>


<!-- js -->

<!-- bootstrap-js -->
   <script src= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"> </script> 
<!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<!-- animation-js -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- slider-js -->
    <script src='https://code.jquery.com/jquery-migrate-1.2.1.min.js'></script>
    <script src='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js'></script>



    

<!-- slider -->
    <script>
 $('.slick-carousel').slick({
        vertical:true,
        verticalSwiping:true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        infinite: true,
        arrows:false,
        touchMove:true,
        swipeToSlide:true,
        swipe:true
  })
</script>

<!-- sticky-navbar -->
    <script>
        AOS.init();
    </script>
    <script>
    $(window).scroll(function() {
	var sticky = $('#navbar'),
	 scroll = $(window).scrollTop();
	
	if (scroll >= 40) { 
	  sticky.addClass('sticky'); }
	else { 
	 sticky.removeClass('sticky');
 
  }
  });
  </script>

<!-- how-it-work-animation -->
  <script>
    var x = 5.5;
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

<!-- language-dropdown  -->
<script>
   function setCountry(code) {
    if (code || code == '') {
        var text = jQuery('a[cunt_code="' + code + '"]').html();
        $(".dropdown dt a span").html(text);
    }
}
$(document).ready(function () {
    $(".dropdown img.flag").addClass("flagvisibility");

    $(".dropdown dt a").click(function () {
        $(".dropdown dd ul").toggle();
        // $('#country-select').toggleClass('active');
        $("#country-select").toggleClass("active");
    });


    $(".dropdown dd ul li a").click(function () {
        var text = $(this).find('.countryName').text();
        console.log(text)
        if(text == 'United Kingdom'){
            text = 'U.K';
        }
      
        $(".dropdown dt a").find('.countryName').text(text);
        $(".dropdown dd ul").hide();
        $("#result").html("Selected value is: " + getSelectedValue("country-select"));
        if ($(".dropdown dd ul").is(":hidden")) {
            $("#country-select").removeClass("active");
        }
    });
    $(".requestsDropdown,.notificationsDropdown,.profileDropdown").click(function () {
        $(".languagesDropdown dd ul").hide();
        // $("#country-select").removeClass("active");
        if ($(".dropdown dd ul").is(":hidden")) {
            $("#country-select").removeClass("active");
        }

    });

    function getSelectedValue(id) {
        //console.log(id,$("#" + id).find("dt a span.value").html())
        return $("#" + id).find("dt a span.value").html();
    }

    $(document).bind('click', function (e) {
        var $clicked = $(e.target);
        if (!$clicked.parents().hasClass("dropdown")) {

            $(".dropdown dd ul").hide();
            if ($(".dropdown dd ul").is(":hidden")) {
            $("#country-select").removeClass("active");
        }
            // $("#country-select").removeClass("active");
           
        }
        $("#flagSwitcher").click(function () {
            $(".dropdown img.flag").toggleClass("flagvisibility");
        });
    })
});
</script>

<!-- responsive-navbar -->
<script>
  document.querySelectorAll('.navbar-nav .nav-link').forEach(item => {
    item.addEventListener('click', function(event) {
        // Smoothly hide the collapse menu when a menu item is clicked
        var navbarCollapse = document.querySelector('.navbar-collapse');
        if (navbarCollapse.classList.contains('show')) {
            navbarCollapse.classList.remove('show');
            // Prevent default link behavior
            event.preventDefault();
            // Scroll to the anchor after the collapse animation is complete
            setTimeout(function() {
                window.location.href = item.getAttribute('href');
            }, 500); // Wait for the animation duration
        }
    });
   });
</script>

<!--bottom to top -->
<script>
        $(document).ready(function(){
            // Smooth scroll to section with offset for fixed navbar
            $('a.nav-link').on('click', function(event) {
                if (this.hash !== '') {
                    event.preventDefault();
                    var hash = this.hash;
                    var offset = 100; // Offset of 80px
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - offset
                    }, 100);
                }
            });
        });
</script>

<!-- responsive-navbar -->
<script>
        document.addEventListener("DOMContentLoaded", function() {
            const navbarToggler = document.querySelector('.navbar-toggler');
            const barsIcon = document.querySelector('.bars');
            const crossIcon = document.querySelector('.cross');
            const collapseNavbar = document.querySelector('.navbar-collapse');

            navbarToggler.addEventListener('click', function() {
                if (collapseNavbar.classList.contains('show')) {
                    // Collapse is being hidden
                    barsIcon.style.display = 'inline-block';
                    crossIcon.style.display = 'none';
                } else {
                    // Collapse is being shown
                    barsIcon.style.display = 'none';
                    crossIcon.style.display = 'inline-block';
                }
            });

            document.querySelector('#navbarSupportedContent').addEventListener('hidden.bs.collapse', function () {
                barsIcon.style.display = 'inline-block';
                crossIcon.style.display = 'none';
            });

            document.querySelector('#navbarSupportedContent').addEventListener('shown.bs.collapse', function () {
                barsIcon.style.display = 'none';
                crossIcon.style.display = 'inline-block';
            });

            // Change icons on nav-link click
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function() {
                    barsIcon.style.display = 'inline-block';
                    crossIcon.style.display = 'none';
                });
            });
        });
    </script>



</body>
</html>