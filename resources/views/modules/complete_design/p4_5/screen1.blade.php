@extends('layouts.app')
@section('content')
    @push('styles')

        <div class="row min-vh-lg-100 vh-100 align-items-center b-white-grey ">

            {{-- left-side --}}
            <div
                class="col-lg-6 b-white-grey h-100 d-flex flex-column align-items-center justify-content-center h-md-50  background-right gap-3">
                <div class="crm-image text-center pt-30 crm_sign_company">
                    <img src="{{ asset('img/login-logo.png') }}" alt="Default Image" class="company-login-logo h-auto">
                </div>

                <div class="h-100 d-flex flex-column align-items-center justify-content-center w-100">

                    <form id="loginForm" method="post" action="" class="w-100">
                        <div class="login_form mt-3 mx-auto w-100" style="">
                            <h2
                                class="text-30 font-weight-700 lineheight-36 letter-s-72 color-b-blue text-center mainFormHeading">
                                Sign in</h2>
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
                                    Sign in
                                </button>
                            </div>
                            <div class="continue-line text-center position-relative pt-20">
                                <h5
                                    class="text-16 font-weight-400 color-b-blue d-inline b-color-transparent b-white-grey z-1 position-relative px-2 lineheight-20 text-uppercase">
                                    Or Continue With</h5>
                            </div>
                            <div class="social-icon d-flex justify-content-center pt-15 gap-3">
                                <button class="border-r-8" type="button">
                                    <img src="{{ asset('img/google.svg') }}" alt="image">
                                </button>
                                <button class="border-r-8" type="button">
                                    <img src="{{ asset('img/twitter.svg') }}" alt="image">
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            {{-- right-side --}}
            <div
                class="col-lg-6 justify-content-center align-items-center h-100 d-flex flex-column b-color-Gradient gap-12 h-md-50 order-lg-0 order-sm-last order-last background-left">
                <h1 class="color-white-grey font-weight-700 text-40 lineheight-48 text-center">Don't have an account?</h1>
                <h5 class="color-white-grey text-16 font-weight-400 login-small-text lineheight-18 text-center mx-auto">
                    Ready
                    to revolutionize how you handle your business? Click 'Sign Up' below to begin your journey with our
                    InmoConnect platform.</h5>
                <button type="button"
                    class="login-white-button color-b-blue b-white-grey font-weight-700 lineheight-18 border-r-8 mt-2 border-white text-14"
                    id="signUpBtn">
                    Sign Up
                </button>
            </div>

        </div>
    @endsection
