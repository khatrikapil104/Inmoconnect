@extends('layouts.app')
@section('content')

@section('title')
   {{ !empty($property->reference) ? trans('messages.properties.Edit_Property') : trans('messages.properties.Add_New_Property') }} Inmoconnect
@endsection


<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="min-vh-100 b-color-background">
      <div class="crm-main-content">
      @if(requestSegment(1) == 'properties')
        <x-forms.crm-breadcrumb
        :fieldData="[['url' => route(routeNamePrefix().'properties.index'),'label' => trans('messages.sidebar.Property_Listing')],['url' => '','label' =>!empty($property->reference) ? trans('messages.properties.Edit_Property') : trans('messages.properties.Add_New_Property')]]"  />
        @elseif(requestSegment(1) == 'properties' && requestSegment(2) == 'search' )
        <x-forms.crm-breadcrumb
        :fieldData="[['url' => route(routeNamePrefix().'propertySearch.index'),'label' => trans('messages.sidebar.Property_Search')],['url' => '','label' =>!empty($property->reference) ? trans('messages.properties.Edit_Property') : trans('messages.properties.Add_New_Property')]]" />
        @elseif(requestSegment(1) == 'agents' )
        <x-forms.crm-breadcrumb
            :fieldData="[['url' => route(routeNamePrefix().'agents.index'),'label' => trans('messages.sidebar.Agents')],['url' => !empty($checkIfValidUser) ? route(routeNamePrefix().'agents.viewAgent',$checkIfValidUser->id) : '','label' => !empty($checkIfValidUser->name) ? $checkIfValidUser->name : ''],['url' => '','label' =>!empty($property->reference) ? trans('messages.properties.Edit_Property') : trans('messages.properties.Add_New_Property')]]" />
        @elseif(requestSegment(1) == 'users' )
        <x-forms.crm-breadcrumb
            :fieldData="[['url' => route(routeNamePrefix().'user.index'),'label' => trans('messages.sidebar.Users')],['url' => route(routeNamePrefix().'user.index'),'label' => trans('messages.properties.My_Users')],['url' => !empty($checkIfValidUser) ? route(routeNamePrefix().'user.userProperties',$checkIfValidUser->id) : '','label' => !empty($checkIfValidUser->name) ? $checkIfValidUser->name : ''],['url' => '','label' =>!empty($property->reference) ? trans('messages.properties.Edit_Property') : trans('messages.properties.Add_New_Property')]]" />
        @endif

<form action="" class="" id="addPropertyForm" type="post" enctype="multipart/form-data">

<x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25']">

<x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '','name' => trans('messages.properties.Basic_Information')]"/>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
            <x-forms.crm-single-select :fieldData="[
                    'name' => 'category_id',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Property_Category'),
                    'id' => 'category_id',
                    'options' => $categories,
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => trans('messages.properties.Property_Category'),
                    'isRequired' => true,
                    'selected' => $property->category_id ?? ''
                ]"/>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
            <x-forms.crm-single-select :fieldData="[
                    'name' => 'situation_id',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Property_Situation'),
                    'id' => 'situation_id',
                    'options' => $situations,
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => trans('messages.properties.Property_Situation'),
                    'isRequired' => true,
                    'selected' => $property->situation_id ?? '', 
                ]"/>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
            <x-forms.crm-single-select :fieldData="[
                    'name' => 'type_id',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Property_Type'),
                    'id' => 'type_id',
                    'options' => $types,
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => trans('messages.properties.Property_Type'),
                    'isRequired' => true,
                    'minimumResultsForSearch' => 0,
                    'selected' => $property->type_id ?? '', 
                ]"/>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'reference',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Reference'),
                    'id' => 'reference',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->reference ?? ''
                ]"/>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'name',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Property_Title'),
                    'id' => 'name',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->name ?? ''
                ]"/>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
        @if(Auth::user()->role->name === 'agent')
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'owner_name',
                    'hasLabel' => true,
                    'label' =>trans('messages.properties.Property_Owner_Name'),
                    'id' => 'owner_name',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    //'isRequired' => true,
                    'value' => $property->owner_name ?? ''
                ]"/>
        @elseif(Auth::user()->role->name === 'superadmin' || Auth::user()->role->name === 'admin' )
            <x-forms.crm-single-select :fieldData="[
                    'name' => 'owner_id',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Property_Owner'),
                    'id' => 'owner_id',
                    'options' => $agentsDropdown, // Pass the agents' data to populate the dropdown
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please select an agent',
                    'isRequired' => true,
                    'placeholder' => trans('messages.properties.Property_Owner'),
                    'selected' => !empty($checkIfValidUser->id) ? $checkIfValidUser->id : (!empty($property->owner_id) ? $property->owner_id : '') ,

                ]"/>
        @endif

        </div>

        <div class="col-md-12 common-label-css mt-2 ">
            <x-forms.crm-textarea :fieldData="[
                    'name' => 'description',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Description'),
                    'id' => 'description',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'useCkEditor' => true,
                    'value' => $property->description ?? '',
                ]"/>
        </div>
    </div>
</x-views.layouts.main-card.main-card-index>

<x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25']">
<x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '','name' => trans('messages.properties.Vendor_Information')]"/>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'vendor_name',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Vendor_Name'),
                    'id' => 'vendor_name',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    //'value' => !empty($user->name) ? $user->name : ''
                    'value' => !empty($checkIfValidUser->name) ? $checkIfValidUser->name : (!empty($property->reference) ? $property->vendor_name : ( auth()->user()->role->name == 'agent' ? auth()->user()->name : '')) 
                ]"/>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'vendor_phone',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Vendor_Phone'),
                    'id' => 'vendor_phone',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    //'isRequired' => true,
                    'isInputMask' => true,
                    'maskPattern' => '+(9{1,2}) (999 999 999)',
                    'value' => $property->vendor_phone ?? '',
                    
                ]"/>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'vendor_fax',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Vendor_Fax'),
                    'id' => 'vendor_fax',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    //'isRequired' => true,
                    'value' => $property->vendor_fax ?? '',
                ]"/>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'vendor_mobile',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Mobile_Number'),
                    'id' => 'vendor_mobile',
                    'attributes' => [],
                    'hasHelpText' => false,
                    'help' => 'Please enter your name',
                    //'isRequired' => true,
                    'isInputMask' => true,
                    'maskPattern' => '+(9{1,2}) (999 999 999)',
                    'value' =>!empty($checkIfValidUser->phone) ? $checkIfValidUser->phone : (!empty($property->reference) ? $property->vendor_mobile : ( auth()->user()->role->name == 'agent' ? auth()->user()->phone : '')) 
                ]"/>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'vendor_email',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Vendor_Email_Address'),
                    'id' => 'vendor_email',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => !empty($checkIfValidUser->email) ? $checkIfValidUser->email : (!empty($property->reference) ? $property->vendor_email : ( auth()->user()->role->name == 'agent' ? auth()->user()->email : '')) 
                ]"/>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css mt-2">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'vendor_address',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Vendor_Address'),
                    'id' => 'vendor_address',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->vendor_address ?? '',
                ]"/>
        </div>
    </div>
</x-views.layouts.main-card.main-card-index>

<x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25']">
<x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '','name' => trans('messages.properties.Additional_Information')]"/> 
    <div class="row">
        <div class="col-md-3 common-label-css">
            <x-forms.crm-single-select :fieldData="[
                    'name' => 'bedrooms',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Number_Bedroom'),
                    'id' => 'bedrooms',
                    'options'=>['0'=>'0','1'=>'1','2'=>'2','3'=>'3','4'=>'4'],
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => trans('messages.properties.Number_Bedroom'),
                    'isRequired' => true,
                    'selected' => $property->bedrooms ?? '',
                ]"/>
        </div>
        <div class="col-md-3 common-label-css">
            <x-forms.crm-single-select :fieldData="[
                    'name' => 'bathrooms',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Number_Bathroom'),
                    'id' => 'bathrooms',
                    'options'=>['0'=>'0','1'=>'1','2'=>'2','3'=>'3','4'=>'4'],
                    'attributes' => [],
                    'hasHelpText' => false,
                    'placeholder' => trans('messages.properties.Number_Bathroom'),
                    'isRequired' => true,
                    'selected' => $property->bathrooms ?? '',
                ]"/>
        </div>
        <div class="col-md-3 common-label-css">
            <x-forms.crm-single-select :fieldData="[
                    'name' => 'floors',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Number_Floors'),
                    'id' => 'floors',
                    'options'=>['0'=>'0','1'=>'1','2'=>'2','3'=>'3','4'=>'4'],
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'placeholder' => trans('messages.properties.Number_Floors'),
                    'isRequired' => true,
                    'selected' => $property->floors ?? '',
                ]"/>
        </div>
        <div class="col-md-3 common-label-css">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'size',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Size_in_Sqft'),
                    'id' => 'size',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->size ?? '',
                ]"/>
        </div>
        <div class="col-md-3 common-label-css mt-2">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'price',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Price_in').' '.config('Reading.default_currency'),
                    'id' => 'price',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->price ?? '',
                ]"/>
        </div>
    </div>
</x-views.layouts.main-card.main-card-index>

<x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25']">
<x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '','name' => trans('messages.properties.Location')]"/>
    <div class="row">
        <div class="col-md-4 common-label-css">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'street_number',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Door_Flat_No'),
                    'id' => 'street_number_v',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->street_number ?? '',
                    
                ]"/>
        </div>
        <div class="col-md-4 common-label-css">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'street_name',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Property_Street'),
                    'id' => 'street_name_v',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->street_name ?? '',
                ]"/>
        </div>
        <div class="col-md-4 common-label-css">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'zipcode',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Postcode'),
                    'id' => 'zipcode_v',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->zipcode ?? '',
                ]"/>
        </div>
        <div class="col-9 col-md-10 common-label-css mt-2">
            <x-forms.crm-text-field :fieldData="[
                    'name' => 'address',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Property_Address'),
                    'id' => 'address',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    'isRequired' => true,
                    'value' => $property->address ?? '',
                ]"/>
        </div>
        <div class="col-3 col-md-2">
            <div class="form-group mt-3 position-relative mt-5">
                <label for="" class="text-14 font-weight-400 lineheight-18 color-b-blue"></label>
                <x-forms.crm-button :fieldData="[
                    'text' => trans('messages.properties.To_Locate'),
                    'type' => 'button',
                    'class' => 'border-r-8 b-color-Gradient color-white text-12 font-weight-400 line-height-15 w-100 h-42 gardient-button locateAddressBtn mt-2',
                    'id' => 'locateAddressBtn',
                    'attributes' => []
                        ]"/>
            </div>
        </div>
        <input type="hidden" name="latitude" class="form-control small latitude_v" value="{{!empty($property->reference) ? $property->latitude : old('latitude')}}" id="latitude_v" />
        <input type="hidden" name="longitude" class="form-control small longitude_v" value="{{!empty($property->reference) ? $property->longitude : old('longitude')}}" id="longitude_v" />
        <input type="hidden" name="country" class="form-control small country_v" value="{{!empty($property->reference) ? $property->country : old('country')}}" id="country_v" />
        <input type="hidden" name="state" class="form-control small state_v" value="{{!empty($property->reference) ? $property->state : old('state')}}" id="state_v" />
        <input type="hidden" name="city" class="form-control small city_v" value="{{!empty($property->reference) ? $property->city : old('city')}}" id="city_v" />
        <div class="col-lg-12 mt-3">
        <div id="propertyMap" style="height: 330px;"></div>
        <!-- <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus"
            width="100%" height="330" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe> -->
        </div>
        <div class="col-md-12 common-label-css mt-2 ">
            <x-forms.crm-textarea :fieldData="[
                    'name' => 'notes',
                    'hasLabel' => true,
                    'label' => trans('messages.properties.Property_Notes'),
                    'id' => 'notes',
                    'attributes' => [],
                    'hasHelpText' => false,
                    //'help' => 'Please enter your name',
                    //'isRequired' => true,
                    'value' => $property->notes ?? '',
                ]"/>
        </div>
    </div>
</x-views.layouts.main-card.main-card-index>

<x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25']">
<x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '','name' => trans('messages.properties.Media')]"/>
    <div class="row">
        <div class="col-md-12 common-label-css mt-3">
        <x-forms.crm-multi-image-upload :fieldData="[
                'name' => 'files',
                'hasLabel' => true,
                'label' => trans('messages.properties.Property_Files'),
                'id' => 'files',
                'attributes' => [],
                'hasHelpText' => false,
                'help' => 'Please enter your name',
                'maxFilesize' => 10,
                'isRequired' => true,
                'addRemoveLinks' => true,
                'acceptedFiles' => 'image/*, application/pdf, application/msword,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel, video/*',
                'uploadedFiles' => !empty($property->reference) ? $propertyImages : collect([])
            ]"/>
        </div>
    </div>
</x-views.layouts.main-card.main-card-index>

<x-views.layouts.main-card.main-card-index :fieldData="['class' => 'card-description py-30 mb-30 b-color-white border-r-8 px-25']">
<x-views.layouts.main-card.sub-components.card-heading :fieldData="['class' => '','name' => trans('messages.properties.Features')]"/>
    <div class="row common-label-css mt-3">
            @php
                $selectedFeatures = !empty($property->reference) ? $property->features->pluck('id')->toArray() : [];
                
            @endphp
           
            <x-forms.crm-checkbox :fieldData="[
                'name' => 'feature_id',
                'hasLabel' => false, // Set to false as we are handling the label outside the component
                'id' => 'feature_id',
                'attributes' => [],
                'hasHelpText' => false,
                //'help' => 'Please enter your name',
                'isRequired' => false,
                'options' => $features,
                'selected' => $selectedFeatures,
                'hasIcon' => true
            ]">
            </x-forms.crm-checkbox>

   </div>
</x-views.layouts.main-card.main-card-index>

        <div class="col-md-12 d-flex gap-4">
            <x-forms.crm-button :fieldData="[
                'text' => !empty($property->reference) ? trans('messages.dashboard.Update') : trans('messages.dashboard.Save'),
                'type' => 'button',
                'class' => 'border-r-8 b-color-Gradient color-white text-16 font-weight-400 line-height-24 h-42 w-150 gardient-button addNewPropertyBtn',
                'id' => 'addNewPropertyBtn',
                'attributes' => []
                    ]"/>
                <x-forms.crm-button :fieldData="[
                'text' => trans('messages.dashboard.Cancel'),
                'type' => 'button',
                'url'  => url()->previous(),
                'target' => '_self',
                'class' => 'b-color-transparent color-primary text-14 font-weight-700 lineheight-18 cancelBtn ',
                'id' => 'cancelBtn',
                'attributes' => [],
                
                ]"/>
        </div>
    
</div>

</form>
                </div>
                </div>
@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap&libraries=places" defer></script>
<script>
    var routeUrl = "{{ route(routeNamePrefix().'properties.store').(!empty($property->reference) ? '/'.$property->reference : '') }}";
    var geAgentDetailsUrl = "{{ route(routeNamePrefix().'properties.getAgentDetails',':id')}}";

    var invalidAddressText = "{{trans('messages.errors.Please_enter_valid_address')}}";
</script>
<script src="{{ asset('assets/js/modules/properties/add_property.js') }}"></script>
@endpush
@endsection


