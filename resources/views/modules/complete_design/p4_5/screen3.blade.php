@extends('layouts.app')
@section('content')
    @push('styles')

        <link rel="stylesheet" href="{{ asset('assets/css/components/forms/crm-password-field.css') }}">


        <div class="row min-vh-lg-100 vh-100 align-items-center b-white-grey ">

            {{-- right-side --}}
            <div
                class="col-lg-6 justify-content-center align-items-center h-100 d-flex flex-column b-color-Gradient gap-12 h-md-50 order-lg-0 order-sm-last order-last background-left">
                {{-- <div class="crm-image text-center pb-20">
                    <img src="{{ asset('img/imoconnect-white-logo.svg') }}" alt="Default Image" class="inmoconnect-white-logo">
                </div> --}}
                <h1 class="color-white-grey font-weight-700 text-40 lineheight-48 text-center">Don't have an account?</h1>
                <h5 class="color-white-grey text-16 font-weight-400 login-small-text lineheight-18 text-center mx-auto">
                    Already a part of our InmoConnect community?
                    Welcome back! Simply sign in to continue your journey</h5>
                <button type="button"
                    class="login-white-button color-b-blue b-white-grey font-weight-700 lineheight-18 border-r-8 mt-2 border-white text-14"
                    id="signUpBtn">
                    Sign Up
                </button>
            </div>

            {{-- left-side --}}
            <div
                class="col-lg-6 b-white-grey h-100 d-flex flex-column align-items-center justify-content-center h-md-50  background-right gap-3">
                <div class="crm-image text-center pt-30 crm_sign_company">
                    <img src="{{ asset('img/real_inmo-logo.svg') }}" alt="Default Image" class="real-inmo-logo h-auto">
                </div>

                <div class="h-100 d-flex flex-column align-items-center justify-content-center w-100">

                    <form id="loginForm" method="post" action="" class="w-100">
                        <div class="login_form mt-3 mx-auto w-100" style="">
                            <h2
                                class="text-30 font-weight-700 lineheight-36 letter-s-72 color-b-blue text-center mainFormHeading">
                                Reset Password</h2>
                            <div class="form-group mt-3 position-relative">
                                <label for="name" class="text-14 font-weight-400 lineheight-18 color-b-blue">Enter your
                                    Email
                                    <span class="required">*</span></label>
                                <input type="text"
                                    class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                    name="email" id="name" value="" placeholder="">
                                <div class="invalid-feedback fw-bold"></div>
                            </div>


                            <div class="login-create-button text-center pt-20">
                                <div class="invalid-feedback fw-bold error mainContentMsg"></div>
                                <button type="submit"
                                    class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 signInBtn"
                                    id="signInBtn">
                                    Reset Password
                                </button>
                            </div>


                        </div>
                    </form>

                </div>
            </div>



        </div>
    @endsection
