<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coming Soon Inmoconnect</title>
    <!-- favicon -->
    <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/svg+xml" />
    <!-- google-font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <!-- font-awesome-icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- custom-css -->
    <link rel="stylesheet" href="{{ asset('assets/css/coming_soon.css') }}">



</head>

<body>
    <div class="main_coming">
    <div class="main_logo">
            <img src="{{asset('img/coming_soon.svg')}}" alt="image" class="#">
        </div>
        <div class="coming_eight">
            <img src="{{asset('img/coming-s-8.png')}}" alt="image" class="#">
        </div>
        <div class="coming_one">
            <img src="{{asset('img/coming-soon-2.svg')}}" alt="image" class="#">
        </div>
        <div class="container_coming">
            <div class="row">
                <div class="col-lg-5 coming-soon-responsive">
                    <div class="coming_soon-left">
                        <h1>Coming Soon</h1>
                        <h2>Get Notified When we Launch</h2>
                        <div class="signup">
                            <form id="comingSoonForm">
                              <input type="email" name="email" id="email-signup" placeholder="Enter Your Email">
                              <input type="submit" class="comingSoonBtn" value="Notify Me" id="btn">
                            </form>
                            <div class="invalid-feedback fw-bold error comingSoonMsgErr"></div>
                            <div class="valid-feedback fw-bold success comingSoonMsgSuccess"></div>
                            <p>*Don't worry we will not spam you :)</p>
                        </div>
                    </div>
                    <a href="https://techalmas.com/" target="_blank" class="coming_two">
                        <img src="{{asset('img/techalmas_logo.svg')}}" alt="image" class="#">
                    </a>
                </div>
                <div class="col-lg-7">
                    <div class="coming-soon-right">
                        <div class="d-flex align-items-center gap-3 justify-content-center justify-content-md-end">
                            <div class="coming_three">
                                <img src="{{asset('img/coming-logo.png')}}" alt="image" class="#">
                            </div>
                            <h3>FOLLOW US ON SOCIAL MEDIA</h3>
                        </div>
                        <div class="social-icon">
                            <div class="social_icon-one">
                                <a href="  https://twitter.com/inmoconnect" target="_blank">
                                    <img src="{{asset('img/coming-s-2.svg')}}" alt="image" class="#">
                                    <span>/inmoconnect</span></a>
                                <a href=" https://www.instagram.com/inmoconnectcrm/ " target="_blank"> <img
                                        src="{{asset('img/coming-s-3.svg')}}" alt="image" class="#">
                                    <span>@inmoconnectcrm</span></a>
                                <a href=" https://www.linkedin.com/company/inmoconnect" target="_blank"> <img
                                        src="{{asset('img/coming-s-5.svg')}}" alt="image" class="#">
                                    <span>/inmoconnect</span></a>
                            </div>
                            <div class="social_icon-one social_change">
                                <a href="https://www.facebook.com/inmoconnectcrm" target="_blank"> <img
                                        src="{{asset('img/coming-s-4.svg')}}" alt="image" class="#">
                                    <span>/inmoconnectcrm</span></a>
                                <a href="https://www.youtube.com/@InmoConnectcrm" target="_blank"> <img
                                        src="{{asset('img/coming-s-1.svg')}}" alt="image" class="#">
                                    <span>@InmoConnectcrm</span></a>
                            </div>
                        </div>
                        <div class="coming_five">
                            <img src="{{asset('img/coming-soon-3.svg')}}" alt="image" class="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="coming_seven">
            <img src="{{asset('img/coming-s-6.png')}}" alt="image" class="#">
        </div>
        <div class="coming_four">
            <img src="{{asset('img/coming-soon-1.svg')}}" alt="image" class="#">
        </div>
     
    </div>


    <!-- bootstrap-js -->
   <script src= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"> </script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/ajax_request.js') }}"></script>

<script>
  $(document).on('submit', '#comingSoonForm', function (e) {
    e.preventDefault();
    $btnName = $(this).find('.comingSoonBtn').text();
    $('.comingSoonMsgErr').text('').hide();
    $('.comingSoonMsgSuccess').text('').hide();
    $(this).find('.comingSoonBtn').prop('disabled', true);
    $(this).find('.comingSoonBtn').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);
    const that = this;
    var formData = new FormData($('#comingSoonForm')[0]);
    const attributes = {
        hasButton: true, btnSelector: '.comingSoonBtn', btnText: $btnName, handleSuccess: function () {

            $('.comingSoonMsgSuccess').text(datas['msg']).show();
            $('#comingSoonForm')[0].reset();
        }, handleError: function () {
            $('.comingSoonMsgErr').text(errorMsg).show();
        },handleErrorMessages : function(){
            $.each(datas['errors'], function(index, html) {
                if(index == 'email'){
                    $('.comingSoonMsgErr').addClass('error');
                    $('.comingSoonMsgErr').html(html);
                    $('.comingSoonMsgErr').show();
                }
            });
            

        }
    };
    const ajaxOptions = {
        url: "{{route('user.postComingSoon')}}",
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions, attributes);  
    

});
</script>
</body>
</html>