
@extends('layouts.app')
@section('content')

@section('title')
{{trans("messages.guest.sign_in")}} Inmoconnect
@endsection

@php
    $dontHaveAccountText = trans('messages.login.Dont_have_an_account');
    $sideBarText= trans('messages.login.Ready_to_revolutionize_how_you_handle_your_business');
@endphp

<x-views.auth.auth-component :componentData='[
    //"left"=>"sideContent",
    "sideHeading" => $dontHaveAccountText, 
    "sideSubHeading" => $sideBarText,
    "sideBtnText" => trans("messages.login.Sign_Up"),
    "mainHeading" => trans("messages.guest.sign_in"),
    "enterPassowrdHeading" => trans("messages.guest.enter_password"),
    "forgotPassword"=>trans("messages.login.Forgot_Password"),
    "formId"=>"loginForm",
    "companyImage"=>$companyImage ?? ""
]'>
    @php 

        $mainFormFields = [
            view('components.forms.crm-text-field', [
                'values' => [
                    'name' => 'email',
                    'hasLabel' => true,
                    'label' => trans("messages.login.Enter_your_Email"),
                    'id' => 'name',
                    'attributes' => [],
                    'hasHelpText' => false,
                    'help' => 'Please enter your name',
                    'isRequired' => true,
                    'componentClass' => 'loginEmailField'
                ],
            ])->render(),
            view('components.forms.crm-password-field', [
                'values' => [
                    'name' => 'password',
                    'hasLabel' => true,
                    'label' => trans("messages.login.Enter_your_password"),
                    'id' => 'password',
                    'attributes' => [],
                    'hasHelpText' => true,
                    //'help' => 'Please enter your password',
                    'isRequired' => true,
                    'isComponentHidden' => true,
                    'componentClass' => 'loginPasswordField'
                ],
            ])->render()
        ];

        $mainFormBtn = view('components.forms.crm-button', [
                'values' => [
                    'text' => trans("messages.guest.sign_in"),
                    'type' => 'submit',
                    'class' => 'border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 signInBtn',
                    'id' => 'signInBtn',
                    'attributes' => ["data-current-step  = 'email'"],
                    
                ],
            ])->render();
        $sideFormBtn = view('components.forms.crm-button', [
            'values' => [
                'text' => trans("messages.login.Sign_Up"),
                'url'  => route(routeNamePrefix().'user.register'),
                'target' => '_self',
                'type' => 'button',
                'class' => 'login-white-button color-b-blue b-white-grey font-weight-700 lineheight-18 border-r-8 mt-2 border-white text-14',
                'id' => 'signUpBtn',
                'attributes' => [],
                
            ],
        ])->render();
    @endphp
    <x-slot name="mainFormBtn">
            {!! $mainFormBtn !!}
    </x-slot>    
    <x-slot name="sideFormBtn">
            {!! $sideFormBtn !!}
    </x-slot>

    <x-slot name="mainFormFields">
        @foreach ($mainFormFields as $mainFormField)
            {!! $mainFormField !!}
        @endforeach
    </x-slot>

    <x-slot name="mainAdditionalContent">
    <div class="continue-line text-center position-relative pt-20 main_additional_content">
        <h5 class="text-16 font-weight-400 color-b-blue d-inline b-color-transparent b-white-grey z-1 position-relative px-2 lineheight-20 text-uppercase">{{trans("messages.login.Or_Continue_With")}}</h5>
        </div>
        <div class="social-icon d-flex justify-content-center pt-15 gap-3 main_additional_content">
        <button class="border-r-8" type="button" onclick = "window.open('{{route(routeNamePrefix().'user.login.google')}}','_self')">
        <img src="{{asset('img/google.svg')}}" alt="image">
        <!-- <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="Google__G__Logo 2" clip-path="url(#clip0_4290_48)">
              <g id="Group">
              <path id="Vector" d="M15.0118 12.2727V18.0818H23.0909C22.7361 19.95 21.6715 21.5319 20.0748 22.5955L24.9468 26.3729C27.7854 23.7548 29.4231 19.9092 29.4231 15.3411C29.4231 14.2774 29.3276 13.2546 29.1501 12.2729L15.0118 12.2727Z" fill="#4285F4"/>
              <path id="Vector_2" d="M6.59874 17.8552L5.49991 18.6957L1.61041 21.7229C4.08054 26.6184 9.14326 30.0003 15.0115 30.0003C19.0646 30.0003 22.4627 28.6639 24.9465 26.373L20.0745 22.5957C18.7371 23.4957 17.0312 24.0412 15.0115 24.0412C11.1084 24.0412 7.79226 21.4094 6.60487 17.8639L6.59874 17.8552Z" fill="#34A853"/>
              <path id="Vector_3" d="M1.61043 8.27734C0.586949 10.2955 0.000183105 12.5728 0.000183105 15C0.000183105 17.4273 0.586949 19.7046 1.61043 21.7227C1.61043 21.7362 6.60537 17.8499 6.60537 17.8499C6.30513 16.9499 6.12767 15.9955 6.12767 14.9999C6.12767 14.0043 6.30513 13.0498 6.60537 12.1498L1.61043 8.27734Z" fill="#FBBC05"/>
              <path id="Vector_4" d="M15.0118 5.97276C17.2227 5.97276 19.1878 6.73638 20.7572 8.20913L25.056 3.91371C22.4494 1.48646 19.065 0 15.0118 0C9.14356 0 4.08054 3.36819 1.61041 8.27733L6.6052 12.1501C7.79243 8.60457 11.1087 5.97276 15.0118 5.97276Z" fill="#EA4335"/>
              </g>
              </g>
              <defs>
              <clipPath id="clip0_4290_48">
              <rect width="29.4231" height="30" fill="white"/>
              </clipPath>
              </defs>
            </svg> -->
        </button>
        <button class="border-r-8" type="button" onclick = "window.open('{{route(routeNamePrefix().'user.login.twitter')}}','_self')">
        <!-- <svg width="30" height="25" viewBox="0 0 30 25" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g id="Logo_of_Twitter" clip-path="url(#clip0_4290_10301)">
          <path id="Vector" d="M26.8488 6.24208C26.8669 6.50618 26.8669 6.77028 26.8669 7.03681C26.8669 15.1581 20.7218 24.5244 9.48508 24.5244V24.5196C6.16573 24.5244 2.91533 23.5678 0.120972 21.7642C0.603633 21.8226 1.08871 21.8518 1.575 21.853C4.32581 21.8555 6.99799 20.9269 9.1621 19.2169C6.54799 19.167 4.25565 17.4522 3.45484 14.9488C4.37057 15.1265 5.31412 15.09 6.21291 14.8429C3.36291 14.2636 1.3125 11.7443 1.3125 8.81855V8.74066C2.1617 9.21653 3.1125 9.48062 4.08508 9.50983C1.40081 7.70496 0.573391 4.11227 2.19436 1.30334C5.29597 5.1431 9.87218 7.47738 14.7847 7.72444C14.2923 5.58975 14.9649 3.35283 16.552 1.85223C19.0125 -0.474753 22.8823 -0.355483 25.1952 2.11876C26.5633 1.84736 27.8746 1.34229 29.0746 0.626667C28.6186 2.04939 27.6641 3.25791 26.3891 4.02586C27.6 3.88225 28.7831 3.55608 29.8972 3.05831C29.077 4.29482 28.044 5.3719 26.8488 6.24208Z" fill="#1D9BF0"/>
          </g>
          <defs>
          <clipPath id="clip0_4290_10301">
          <rect width="30" height="24.8276" fill="white"/>
          </clipPath>
          </defs>
        </svg> -->
        <img src="{{asset('img/twitter.svg')}}" alt="image">
        </button>
        </div>
    </x-slot>

    <div class="modal fade" id="developer_review" tabindex="-1" role="dialog" aria-labelledby="customer_detailsLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_nine" role="document">
        <div class="modal-content modal-content-file">

            <div class="modal-body pt-0 pb-0 ps-2 pe-2 overflow-hidden">
                <div class="row ">
                    <div class="col-lg-4 modal-header_file modal-header_color d-flex">
                        <div class="modal-reject-img d-flex align-items-center justify-content-center">
                            <img src="{{ asset('img/underview_modal.svg') }}" alt="agent image">
                        </div>
                    </div>
                    <div class="col-lg-8 modal-header_file ">
                        <div class="modal-header border-0  p-0">
                            <h4 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                                id="customer_detailsLabel">
                                <img src="{{ asset('img/login-logo.png') }}" alt="agent image" width="228"
                                    height="32">
                            </h4>
                            <button type="button" class="close b-color-transparent" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true"> <i
                                        class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                            </button>
                        </div>
                        <div class="modal_checkbox-h pt-30 text-center">
                            <h4 class="text-20 color-primary font-weight-700">Your Application is under Review!
                            </h4>
                            <h6 class="text-14 color-b-blue font-weight-400 pt-12">Team Inmoconnect is reviewing
                                your application and will be getting in touch with you over your email regarding
                                the status of your Developer's Account at our CRM Portal.</h6>
                            <h6 class="text-14 color-b-blue font-weight-400 pt-20 mb-3">For any queries or
                                concern, you can always reach out to us on</h6>
                            <a href="#"
                                class="text-16 font-weight-700 color-primary lineheight-20">{{ Config('Mail.Admin_Email') }}</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-views.auth.auth-component>


@push('scripts')
<script>
    var routeUrl = "{{ route(routeNamePrefix().'user.postLogin') }}";
</script>
<script src="{{ asset('assets/js/modules/auth/login.js') }}"></script>
@endpush
@endsection

