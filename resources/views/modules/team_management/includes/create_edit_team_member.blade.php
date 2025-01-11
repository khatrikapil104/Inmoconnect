@php
    $nameArr = !empty($result->name) ? explode(' ', $result->name) : [];
@endphp
<div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
    <x-forms.crm-text-field :fieldData="[
        'name' => 'first_name',
        'hasLabel' => true,
        'label' => trans('messages.dashboard.First_Name'),
        'id' => 'first_name',
        'attributes' => [],
        'hasHelpText' => false,
        'help' => 'Please enter your name',
        'isRequired' => true,
        'value' => !empty($nameArr[0]) ? $nameArr[0] : '',
    ]" />
</div>
<div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
    <x-forms.crm-text-field :fieldData="[
        'name' => 'last_name',
        'hasLabel' => true,
        'label' => trans('messages.dashboard.Last_Name'),
        'id' => 'last_name',
        'attributes' => [],
        'hasHelpText' => false,
        'help' => 'Please enter your name',
        'isRequired' => true,
        'value' => !empty($nameArr[1]) ? $nameArr[1] : '',
    ]" />
</div>
<div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
    <x-forms.crm-text-field :fieldData="[
        'name' => 'email',
        'hasLabel' => true,
        'label' => trans('messages.dashboard.Email'),
        'id' => 'email',
        'attributes' => [],
        'hasHelpText' => false,
        'help' => 'Please enter your name',
        'isRequired' => true,
        'value' => !empty($result->email) ? $result->email : '',
    ]" />
</div>
<div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
    <x-forms.crm-text-field :fieldData="[
        'name' => 'phone',
        'hasLabel' => true,
        'label' => trans('messages.dashboard.Mobile_Number'),
        'id' => !empty($type) && $type == 'edit' ? 'editPhone' : 'phone',
        'attributes' => [],
        'hasHelpText' => false,
        'help' => 'Please enter your name',
        'isRequired' => true,
        'isInputMask' => true,
        'maskPattern' => '+(9{1,2}) (999 999 999)',
        'value' => !empty($result->phone) ? $result->phone : '',
    ]" />
</div>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css">
    <div class="form-group mt-3 position-relative">
        <label for="reference" class="text-14 font-weight-400 lineheight-18 color-b-blue">Manage
            Access:<span class="required">*</span></label>
        <div class="d-flex gap-4">
            @if ($userPermissions->isNotEmpty())
                @foreach ($userPermissions as $permission)
                    <label class="customcb">{{ $permission->permission_name ?? '' }}
                        <input type="checkbox" name="userAccessArr[]" value="{{ $permission->id }}"
                            {{ !empty($result->user_permissions) && in_array($permission->permission_name, $result->user_permissions) ? 'checked' : '' }}>
                        <span class="checkmark"></span>
                    </label>
                @endforeach
            @endif


        </div>
    </div>
</div>
