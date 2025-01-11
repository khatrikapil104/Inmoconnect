@push('styles')
<link  rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/components/buttons/All-button.css') }}">
@endpush
<div
    class="col-lg-6 b-white-grey h-100 d-flex flex-column align-items-center justify-content-center h-md-50  background-right gap-3">

    {{-- image --}}
    @if (empty($values['resetPassowrd']))
    <div class="crm-image text-center pt-30 crm_sign_company">
        <img src="{{asset('img/login-logo.png')}}" alt="image" class="company-login-logo h-auto">
    </div>
    @endif

    {{-- company-img --}}
    @if (!empty($values['companyImage']))
    <div class="crm-image text-center pt-30 company_image_logo" >
        <img src="{{$values['companyImage']}}" alt="image" class="company_image_logo real-inmo-logo h-auto">
    </div>
    @endif
    
    {{-- company-img --}}
    <div class="crm-image text-center pt-30 company_image_logo" style="display: none">
        <img src="" alt="image" class="company_image_logo real-inmo-logo h-auto">
    </div>

    <form id="{{!empty($values['formId']) ? $values['formId'] : '' }}" method="post" action="" class="w-100">

        {{-- create-accout --}}
        <div class="create-account accountSelectDiv pt-100" style="{{(!empty($values['formId']) && $values['formId'] == 'registerForm') ? '' : 'display:none;' }}">
            @if(!empty($values['isInvitedUser']) && !empty($values['invitedUserDetails']))
            <h2 class="text-30 font-weight-700 lineheight-36 letter-s-72 color-b-blue text-center">
            {{trans("messages.guest.create_account")." As ".str_replace(" ","-",ucwords(str_replace("-", " ", $values['invitedUserDetails']->role->name)))}}</h2>
            @else
            <h2 class="text-30 font-weight-700 lineheight-36 letter-s-72 color-b-blue text-center">
            {{trans("messages.guest.create_account")}}</h2>
            @endif

            @if(empty($values['isInvitedUser']))
            <div class="tabs-create-account d-flex gap-3 pt-15 flex-column flex-sm-row align-items-center justify-content-center">
               
                <a class="account-agent border-r-12 border-blue registerAs" data-val="agent">
                    <img src="{{asset('img/create_account_one.svg')}}" alt="image" class="">
                    <span class="d-block text-center text-24 font-weight-700 text-capitalize lineheight-30 color-b-blue pt-20">{{trans("messages.create_account.as_agent")}}</span>
                </a>
                <a class="account-agent border-r-12 border-blue registerAs" data-val="developer">
                <img src="{{asset('img/create_account_two.svg')}}" alt="image" class="">
                <span class="d-block text-center text-24 font-weight-700 text-capitalize lineheight-30 color-b-blue pt-20">{{trans("messages.create_account.as_developer")}}</span>
                </a>
                
            </div>
            @endif
        </div>

        {{-- login-form --}}
        <div class="login_form mt-3 mx-auto w-100" style="{{!empty($values['isInvitedUser']) ? '' : ( (!empty($values['formId']) && $values['formId'] == 'registerForm') ? 'display:none;' : '') }}">

            <h2 class="text-30 font-weight-700 lineheight-36 letter-s-72 color-b-blue text-center mainFormHeading">
                {{!empty($values['mainHeading']) ? $values['mainHeading'] : '' }}</h2>
            <h2 class="text-30 font-weight-700 lineheight-36 letter-s-72 color-b-blue text-center mainFormPasswordHeading" style="display: none">
                {{!empty($values['enterPassowrdHeading']) ? $values['enterPassowrdHeading'] : '' }}</h2>
            @if (!empty($mainFormFields))
            {{ $mainFormFields }}
            @endif

            @if (!empty($mainFormText))
            {{ $mainFormText }}
            @endif


            <div class="login-create-button text-center pt-20">
                @if (!empty($mainFormBtn))
                <div class="invalid-feedback fw-bold error mainContentMsg"></div>
                {{ $mainFormBtn }}
                @endif

            </div>

            {{-- forgot-password --}}
            <div class="forgot-password justify-content-center" style="display: none;">
                @if(!empty($values['forgotPassword']))
                <a class=" text-18 color-primary lineheight-22 letter-s-48 font-weight-400 pt-4"
                    href="{{route(routeNamePrefix().'password.request')}}">
                    {{!empty($values['forgotPassword']) ? $values['forgotPassword'] : '' }}
                </a>
                @endif
            </div>

            @if (!empty($mainAdditionalContent))
            {{ $mainAdditionalContent }}
            @endif
        </div>
    </form>
</div>