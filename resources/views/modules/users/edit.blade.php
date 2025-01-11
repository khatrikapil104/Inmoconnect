@extends('layouts.app')
@section('content')

@section('title')
    {{trans('messages.users.Edit_Profile')}} Inmoconnect
@endsection



<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
<div class="crm-main-content">
<x-forms.crm-breadcrumb :fieldData="[['url' => '','label' => trans('messages.sidebar.Users')],['url' => '','label' => trans('messages.properties.My_Users')],['url' => route(routeNamePrefix().'user.profile'),'label' => trans('messages.users.Edit_Profile')]]"/>
<form action="" method="post" id="editUserForm"  enctype="multipart/form-data" class="box-shadow-one py-35 b-color-white border-r-8 px-35">
<div class="row">
     @method('PUT')
        @csrf
    <div class="col-md-6">
        <x-forms.crm-profile-image-upload :attributes="['name' => 'image', 'hasLabel'=> false, 'label' => trans('messages.dashboard.Profile_Image'), 'id' => 'image', 'attributes' => [], 'selectedImage' => !empty($user->image) ? $user->image : '' ,'hasHelpText'=>false,'help' => 'Please enter your password','isRequired' => false]"/>
    </div>
    <div class="col-md-6"></div>
    @php
        $nameArr = !empty($user->name) ? explode(' ',$user->name) : [];
    @endphp
    <div class="col-md-6 common-label-css mt-14">
        <x-forms.crm-text-field :fieldData="[
                'name' => 'first_name',
                'hasLabel' => true,
                'label' => trans('messages.dashboard.First_Name'),
                'id' => 'first_name',
                'attributes' => [],
                'hasHelpText' => false,
                'help' => 'Please enter your name',
                'isRequired' => true,
                'value' => !empty($nameArr[0]) ? $nameArr[0] : ''
            ]"/>
    </div>
    <div class="col-md-6 common-label-css mt-14">
        <x-forms.crm-text-field :fieldData="[
                'name' => 'last_name',
                'hasLabel' => true,
                'label' => trans('messages.dashboard.Last_Name'),
                'id' => 'last_name',
                'attributes' => [],
                'hasHelpText' => false,
                'help' => 'Please enter your name',
                'isRequired' => true,
                'value' => !empty($nameArr[1]) ? $nameArr[1] : '' 
            ]"/>
    </div>
    <div class="col-md-6 common-label-css mt-10">
        <x-forms.crm-text-field :fieldData="[
                'name' => 'email',
                'hasLabel' => true,
                'label' => trans('messages.dashboard.Email'),
                'id' => 'email',
                'attributes' => [],
                'hasHelpText' => false,
                'help' => 'Please enter your name',
                'isRequired' => true,
                'value' => !empty($user->email) ? $user->email : '' 
            ]"/>
    </div>
    <div class="col-md-6 common-label-css mt-10">
        <x-forms.crm-text-field :fieldData="[
                'name' => 'phone',
                'hasLabel' => true,
                'label' => trans('messages.dashboard.Mobile_Number'),
                'id' => 'phone',
                'attributes' => [],
                'hasHelpText' => false,
                'help' => 'Please enter your name',
                'isRequired' => true,
                'isInputMask' => true,
                'maskPattern' => '+(9{1,2}) (999 999 999)',
                'value' => !empty($user->phone) ? $user->phone : '' 
            ]"/>
    </div> 
    
    <div class="col-md-12 pt-40  d-flex gap-4 justify-content-between justify-content-sm-start">
        <x-forms.crm-button :fieldData="[
            'text' => trans('messages.dashboard.Update'),
            'type' => 'button',
            'class' => 'border-r-8 b-color-Gradient color-white text-12 font-weight-400 line-height-15 w-150 h-42 gardient-button saveBtn',
            'id' => 'saveBtn',
            'attributes' => []
                ]"/>
            <x-forms.crm-button :fieldData="[
            'text' => trans('messages.dashboard.Cancel'),
            'type' => 'button',
            'url'  => route(routeNamePrefix().'user.index'),
            'class' => 'b-color-transparent color-primary text-14 font-weight-700 lineheight-18 cancelBtn  ',
            'target' => '_self',
            'id' => 'cancelBtn',
            'attributes' => [],
            
                ]"/>
    </div>
    
</div>

</form>
            </div>
            </div>
@push('scripts')
<script>
    var routeUrl = "{{ route(routeNamePrefix().'user.update',$user->id) }}";
</script>
<script src="{{ asset('assets/js/modules/users/edit_user.js') }}"></script>
@endpush
@endsection
