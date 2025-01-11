@extends('layouts.app')
@section('content')
@section('title')
    {{ trans('messages.dashboard.Change_Password') }} Inmoconnect
@endsection


<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background  min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">

        <!-- ///////////////breadcrumb/////////////////////// -->
        <x-forms.crm-breadcrumb :fieldData="[
            [
                'url' => route(routeNamePrefix() . 'user.changePassword'),
                'label' => trans('messages.dashboard.Change_Password'),
            ],
        ]" />

        <!-- ///////////////form///////////////// -->
        <form action="" id="changePasswordForm" type="post" enctype="multipart/form-data"
            class="box-shadow-one py-35 b-color-white border-r-8 px-35">
            <div class="row">

                <!-- ////////////////profile-image//////////////////// -->
                <div class="col-md-6">
                    <div class="d-flex align-items-center gap-3 change-password-img">
                        <img src="{{ !empty($user->image) ? $user->image : asset('img/default-user.jpg') }}"
                            alt="Default Image" class="border-r-20 ">
                        <div class="change-password-text">
                            <h3 class="text-24 color-primary lineheight-30 letter-s-48 font-weight-700 pb-2">
                                {{ $user->name ?? '' }}</h3>
                            <h5 class="text-14 color-b-blue lineheight-18 font-weight-400 pt-1">
                                {{ !empty($user->role->name) ? ucfirst($user->role->name) : '' }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"></div>

                <!-- /////////////////current-password////////////////// -->
                @if (!empty($user->password))
                    <div class="col-md-6 common-label-css mt-14 common-has-help">
                        <x-forms.crm-password-field :fieldData="[
                            'name' => 'current_password',
                            'hasLabel' => true,
                            'label' => trans('messages.dashboard.Current_Password'),
                            'id' => 'current_password',
                            'attributes' => [],
                            'hasHelpText' => false,
                            'help' => trans('messages.register.Your_Password_must_be_at_least_8_characters'),
                            'isRequired' => true,
                        ]" />
                    </div>
                    <div class="col-md-6"></div>
                @endif

                <!-- ////////////////////////new-password/////////////////////////// -->
                <div class="col-md-6 mt-10 common-label-css">
                    <x-forms.crm-password-field :fieldData="[
                        'name' => 'new_password',
                        'hasLabel' => true,
                        'label' => trans('messages.dashboard.New_Password'),
                        'id' => 'new_password',
                        'attributes' => [],
                        'hasHelpText' => true,
                        'help' => trans('messages.register.Your_Password_must_be_at_least_8_characters'),
                        'isRequired' => true,
                    ]" />
                </div>
                <div class="col-md-6"></div>

                <!-- /////////////////confirm-new-password////////////////////// -->
                <div class="col-md-6 mt-10 common-label-css">
                    <x-forms.crm-password-field :fieldData="[
                        'name' => 'confirm_password',
                        'hasLabel' => true,
                        'label' => trans('messages.dashboard.Confirm_New_Password'),
                        'id' => 'confirm_password',
                        'attributes' => [],
                        'hasHelpText' => true,
                        'help' => trans('messages.register.Your_Password_must_be_at_least_8_characters'),
                        'isRequired' => true,
                    ]" />
                </div>


                <div class="col-md-12 common-label-css pt-40 d-flex gap-4">

                    <!-- /////////////////update-button///////////////// -->
                    <x-forms.crm-button :fieldData="[
                        'text' => trans('messages.dashboard.Update'),
                        'type' => 'button',
                        'class' =>
                            'border-r-8 b-color-Gradient color-white text-16 font-weight-400 line-height-24 small-button gardient-button updateBtn saveBtn',
                        'id' => 'updateBtn',
                        'attributes' => [],
                    ]" />

                    <!-- //////////cancel-button////////////// -->
                    <x-forms.crm-button :fieldData="[
                        'text' => trans('messages.dashboard.Cancel'),
                        'type' => 'button',
                        'url' => route(routeNamePrefix() . 'user.dashboard'),
                        'target' => '_self',
                        'class' => 'b-color-transparent color-primary text-14 font-weight-700 lineheight-18 cancelBtn ',
                        'id' => 'cancelBtn',
                        'attributes' => [],
                    ]" />
                </div>
            </div>
        </form>

    </div>
</div>
@push('scripts')
    <script>
        var routeUrl = "{{ route(routeNamePrefix() . 'user.changePassword') }}";
    </script>
    <script src="{{ asset('assets/js/modules/dashboard/change_password.js') }}"></script>
@endpush
@endsection
