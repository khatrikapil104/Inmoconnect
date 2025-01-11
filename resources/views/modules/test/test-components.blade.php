@extends('layouts.app')
@section('content')

<h5>Test Components</h5>
Multi Select With Images => <br>
<div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
    <x-forms.crm-multi-select-with-image :fieldData="[
            'name' => 'user_select',
            'hasLabel' => true,
            'label' => 'Property Association',
            'class' =>'select-icon',
            'id' => 'user_select',
            'options' => [
                '1' => ['label' => 'Test User 1', 'image' => asset('img/default-user.jpg')],
                '2' => ['label' => 'Test User 2', 'image' => asset('img/default-property.jpg')],
                '3' => ['label' => 'Test User 3', 'image' => asset('img/en_flag.png')],
                '4' => ['label' => 'Test User 4', 'image' => asset('img/es_flag.png')],
                '5' => ['label' => 'Test User 5', 'image' => asset('img/fr_flag.png')],
            ],
            'attributes' => [],
            'hasHelpText' => false,
            'placeholder' => 'User',
            'isRequired' => true
        ]"/>
</div>
<div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
    <x-forms.crm-multi-select-with-image :fieldData="[
            'name' => 'user_select_2',
            'hasLabel' => true,
            'label' => 'Property Association 2',
            'class' =>'select-icon',
            'id' => 'user_select_2',
            'options' => [
                '1' => ['label' => 'Test User 1', 'image' => asset('img/default-user.jpg')],
                '2' => ['label' => 'Test User 2', 'image' => asset('img/default-property.jpg')],
                '3' => ['label' => 'Test User 3', 'image' => asset('img/en_flag.png')],
                '4' => ['label' => 'Test User 4', 'image' => asset('img/es_flag.png')],
                '5' => ['label' => 'Test User 5', 'image' => asset('img/fr_flag.png')],
            ],
            'attributes' => [],
            'hasHelpText' => false,
            'placeholder' => 'User',
            'isRequired' => true
        ]"/>
</div>
Multi Select=> <br>
<div class="col-12 col-sm-6 col-md-6 col-lg-6 select_with_checkbox">
    <x-forms.crm-multi-select :fieldData="[
            'name' => 'user_select2',
            'hasLabel' => true,
            'label' => 'User',
            'id' => 'user_select2',
            'options' => [
                '1' => 'Test User 1',
                '2' => 'Test User 2',
                '3' => 'Test User 3'
            ],
            'attributes' => [],
            'hasHelpText' => false,
            'placeholder' => 'User',
            'isRequired' => true,
        ]"/>
</div>
    @push('scripts')
   
    @endpush
@endsection


