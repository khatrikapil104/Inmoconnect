<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @stack('styles')  

    <!-- Main CSS -->
    <link  rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link  rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">  

    <!-- Icon Css File -->
    <link  rel="stylesheet" href="{{ asset('assets/icon/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body>

<div class="create-account">
    <div class="row min-vh-lg-100 vh-100 align-items-center b-white-grey ">
      <div class="col-lg-6 justify-content-center align-items-center h-100 d-flex flex-column b-color-Gradient gap-12 h-md-50 order-lg-0 order-sm-last order-last background-left">
        <h2 class="color-white-grey font-weight-700 text-40 linehight-48 text-center">Already have an account?</h2>
        <h6 class="color-white-grey text-15 font-weight-400 login-small-text lineheight-18 text-center mx-auto">Already a part of our InmoConnect community?
          <br>Welcome back! Simply sign in to continue your journey
        </h6>
        <button type="button"  class="login-white-button color-b-blue b-white-grey font-weight-700 lineheight-18 border-r-8 mt-2 border-white text-14 " id="agentsignin">
        Sign in
        </button>
      </div>
        <div class="col-lg-6 b-white-grey h-100 d-flex flex-column align-items-center justify-content-center h-md-50 left_responsive">
           <div class="crm-image text-center">

               <img src="{{asset('img/login-logo.png')}}" alt="image" class="login-logo h-auto">
           </div>
           <div class="create-account pt-100">
                <h3 class="text-30 font-weight-700 lineheight-36 letter-s-36 color-b-blue text-center">
                Create Account</h3>
                <div class="tabs-create-account d-flex gap-3 pt-15 flex-column flex-sm-row">
                    <a href="agent/login" class="account-agent border-r-12 border-blue">
                    <img src="{{asset('img/create_account_one.svg')}}" alt="image" class="">
                    <span class="d-block text-center  font-weight-700 text-capitalize lineheight-30 color-b-blue text-24 pt-20">As Agent</span>
                    </a>
                    <a href="customer/login" class="account-agent border-r-12 border-blue">
                    <img src="{{asset('img/create_account_two.svg')}}" alt="image" class="">
                    <span class="d-block text-center  font-weight-700 text-capitalize lineheight-30 text-24 color-b-blue pt-20">As Customer</span>
                    </a>
                </div>
           </div>
        </div>
    </div>
</div>

</body>
</html>