
<div class="col-lg-6 justify-content-center align-items-center h-100 d-flex flex-column b-color-Gradient gap-12 h-md-50 order-lg-0 order-sm-last order-last background-left">

    {{-- image --}}
    <div class="crm-image text-center pb-20 inmoconnect-logo-password" @if (!empty($values['resetPassowrd']) && $values['resetPassowrd']==true) style="display: block" @else style="display: none"  @endif>
        <img src="{{ asset('img/imoconnect-white-logo.svg') }}" alt="Default Image" class="inmoconnect-white-logo">
    </div>
    <h1 class="color-white-grey font-weight-700 text-40 lineheight-48 text-center">{{!empty($values['sideHeading']) ? $values['sideHeading'] : '' }}</h1>
    <h5 class="color-white-grey text-16 font-weight-400 login-small-text lineheight-18 text-center mx-auto">{{!empty($values['sideSubHeading']) ? $values['sideSubHeading'] : '' }}</h5>
    @if (!empty($sideFormBtn))
    {{ $sideFormBtn }}
    @endif
    
</div>

