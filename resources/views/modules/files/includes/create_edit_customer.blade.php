@php
    $nameArr = !empty($result->name) ? explode(' ',$result->name) : [];
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
            'value' => !empty($nameArr[0]) ? $nameArr[0] : ''
        ]"/>
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
            'value' => !empty($nameArr[1]) ? $nameArr[1] : ''
        ]"/>
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
            'value' => !empty($result->email) ? $result->email : ''
        ]"/>
</div>
<div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
    <x-forms.crm-text-field :fieldData="[
            'name' => 'phone',
            'hasLabel' => true,
            'label' => trans('messages.dashboard.Mobile_Number'),
            'id' => (!empty($type) && $type == 'edit') ? 'editPhone' :'phone',
            'attributes' => [],
            'hasHelpText' => false,
            'help' => 'Please enter your name',
            'isRequired' => true,
            'isInputMask' => true,
            'maskPattern' => '+(9{1,2}) (999 999 999)',
            'value' => !empty($result->phone) ? $result->phone : ''
        ]"/>
</div>