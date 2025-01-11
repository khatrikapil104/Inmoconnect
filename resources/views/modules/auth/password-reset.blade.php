@extends('layouts.app')
@section('content')

@section('title')
    {{trans("messages.guest.Reset_Password")}} Inmoconnect
@endsection
{{-- @dd('12') --}}
<x-views.auth.auth-component :componentData='[
        //"left"=>"sideContent",
        "sideHeading" => trans("messages.guest.Reset_Password"), 
        "sideSubHeading" => trans("messages.guest.Time_for_a_new_password"),
        "sideBtnText" => trans("messages.guest.sign_in"),
        "mainHeading" => trans("messages.guest.Reset_Password"),
        "mainBtnText"=>trans("messages.guest.Confirm_Password"),
        "formId"=>"passwordResetForm",
        "companyImage"=>$companyImage,
        "resetPassowrd"=>true
    ]'>
    @php
    $mainFormFields = [
        view('components.forms.crm-password-field', [
                'values' => [
                    'name' => 'password',
                    'hasLabel' => true,
                    'label' => trans("messages.login.Enter_your_password"),
                    'id' => 'password',
                    'attributes' => [],
                    'hasHelpText' => true,
                    'help' => trans("messages.register.Your_Password_must_be_at_least_8_characters"),
                    'isRequired' => true,
                    'componentClass' => 'eye_reset',
          
                ],
            ])->render(),

        view('components.forms.crm-password-field', [
                'values' => [
                    'name' => 'confirm_password',
                    'hasLabel' => true,
                    'label' => trans("messages.register.Enter_your_Repassword"),
                    'id' => 'confirm_password',
                    'attributes' => [],
                    'hasHelpText' => true,
                    'help' =>trans("messages.register.Your_Password_must_be_at_least_8_characters"),
                    'isRequired' => true,
                    'componentClass' => 'eye_reset',
                ],
            ])->render(),
            '<input type="hidden" name="token" value="' . $token . '">',

    ];

    $mainFormBtn = view('components.forms.crm-button', [
    'values' => [
    'text' => trans("messages.guest.Confirm_Password"),
    'type' => 'submit',
    'class' => 'border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 confirmPasswordBtn',
    'id' => 'confirmPasswordBtn',
    'attributes' => [],

    ],
    ])->render();
    $sideFormBtn = view('components.forms.crm-button', [
    'values' => [
    'text' => trans("messages.guest.sign_in"),
    'url' => route(routeNamePrefix().'user.login'),
    'target' => '_self',
    'type' => 'button',
    'class' => 'login-white-button color-b-blue b-white-grey font-weight-700 lineheight-18 border-r-8 mt-2 border-white
    text-14',
    'id' => 'signInBtn',
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

</x-views.auth.auth-component>
@push('scripts')
<script>
    var routeUrl = "{{ route(routeNamePrefix().'password.email') }}";
</script>
<script src="{{ asset('assets/js/modules/auth/password_reset.js') }}"></script>
@endpush
@endsection