@extends('layouts.app')
@section('content')

@section('title')
    {{trans("messages.guest.Reset_Password")}} Inmoconnect
@endsection

<x-views.auth.auth-component :componentData='[
		"left"=>"sideContent",
		"sideHeading" => trans("messages.login.Already_have_an_account"), 
		"sideSubHeading" => trans("messages.login.Already_a_part_of_our_InmoConnect_community"),
		"sideBtnText" => trans("messages.guest.sign_in"),
		"mainHeading" => trans("messages.guest.Reset_Password"),
		"mainBtnText"=>trans("messages.guest.Reset_Password"),
		"formId"=>"requestPasswordResetForm"
	]'>
	@php
	$mainFormFields = [
	view('components.forms.crm-text-field', [
	'values' => [
	'name' => 'email',
	'hasLabel' => true,
	'label' => trans("messages.login.Enter_your_Email"),
	'id' => 'email',
	'attributes' => [],
	'hasHelpText' => false,
	'help' => 'Please enter your email',
	'isRequired' => true,
	],
	])->render(),
	];

	$mainFormBtn = view('components.forms.crm-button', [
	'values' => [
	'text' => trans("messages.guest.Reset_Password"),
	'type' => 'submit',
	'class' => 'border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 resetPasswordBtn',
	'id' => 'resetPasswordBtn',
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
    var routeUrl = "{{ route(routeNamePrefix().'forgot.password') }}";
</script>
<script src="{{ asset('assets/js/modules/auth/request_password_reset.js') }}"></script>
@endpush
@endsection