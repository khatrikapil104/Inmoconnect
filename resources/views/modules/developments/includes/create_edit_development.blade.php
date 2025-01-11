
<div
    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css common_css_two common_css_four">
    <div class="form-group position-relative">
        <label for="development_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">
            Development Name
            <span class="required">*</span></label>
        <input type="text"
            class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
            name="development_name" id="development_name"
            value="{{ !empty($result->development_name) ? $result->development_name : '' }}"
            placeholder="">
        <div class="invalid-feedback fw-bold"></div>
    </div>
</div>
<div class="col-md-12 common-label-css textarea_abc">
    <x-forms.crm-textarea :fieldData="[
        'name' => 'development_description',
        'id' => 'development_description',
        'attributes' => [],
        'hasHelpText' => false,
        //'help' => 'Please enter your name',
        'isRequired' => true,
        'useCkEditor' => true,
        'value' => !empty($result->development_description) ? $result->development_description : '',
    ]" />
</div>
<div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add_event">
    <x-forms.crm-text-field :fieldData="[
        'name' => 'development_number',
        'hasLabel' => true,
        'label' => 'Development Number:',
        'id' => 'development_number',
        'attributes' => [],
        'hasHelpText' => false,
        'help' => 'Please enter your name',
        'isRequired' => true,
        'value' => !empty($result->development_number) ? $result->development_number : '',
    ]" />
</div>
<div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add_event">
    <x-forms.crm-text-field :fieldData="[
        'name' => 'cadastral_reference',
        'hasLabel' => true,
        'label' => trans('Cadastral Reference') . ':',
        'id' => 'cadastral_reference',
        'attributes' => [],
        'hasHelpText' => false,
        'help' => 'Please enter your name',
        'isRequired' => true,
        'value' => !empty($result->cadastral_reference) ? $result->cadastral_reference : '',
    ]" />
</div>
<div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add_event">
    <x-forms.crm-text-field :fieldData="[
        'name' => 'building_license',
        'hasLabel' => true,
        'label' => trans('Building License') . ':',
        'id' => 'building_license',
        'attributes' => [],
        'hasHelpText' => false,
        'help' => 'Please enter your name',
        'isRequired' => true,
        'value' => !empty($result->building_license) ? $result->building_license : '',
    ]" />
</div>

<div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add-event">
    <x-forms.crm-datepicker :fieldData="[
        'name' => 'start_date',
        'hasLabel' => true,
        'label' => trans('Construction Start Date') . ':',
        'inputId' => 'start_date',
        'attributes' => [],
        'hasHelpText' => false,
        'isRequired' => true,
        'isInputMask' => true,
        'format' => 'mm-yyyy',
        'minViewMode' => 1,
        'startDate' => date('m-d-Y'),
        'value' => !empty($result->start_date)
            ? str_replace('/', '-', $result->start_date)
            : '',
    ]" />
</div>
<div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css add-event">
    <x-forms.crm-datepicker :fieldData="[
        'name' => 'end_date',
        'hasLabel' => true,
        'label' => trans('Estimated Completion Date') . ':',
        'inputId' => 'end_date',
        'attributes' => [],
        'hasHelpText' => false,
        'isRequired' => true,
        'isInputMask' => true,
        'format' => 'mm-yyyy',
        'minViewMode' => 1,
        'startDate' => date('m-d-Y'),
        'value' => !empty($result->end_date)
            ? str_replace('/', '-', $result->end_date)
            : '',
    ]" />
</div>

<div class="col-md-6 common-label-css position-relative">
    <x-forms.crm-text-field :fieldData="[
        'name' => 'min_selling_price',
        'hasLabel' => true,
        'label' => trans('Minimum Selling Price') . ':',
        'id' => 'min_selling_price',
        'attributes' => [],
        'hasHelpText' => false,
        //'help' => 'Please enter your name',
        'value' => $result->min_selling_price ?? '',
    ]" />
    <div class="input-group-append property_per">
        <span class="input-group-text">{{config('Reading.default_currency')}}</span>
    </div>
    <div class="invalid-feedback fw-bold"></div>

</div>

<div class="col-md-6 common-label-css position-relative">
    <x-forms.crm-text-field :fieldData="[
        'name' => 'max_selling_price',
        'hasLabel' => true,
        'label' => trans('Maximum Selling Price') . ':',
        'id' => 'max_selling_price',
        'attributes' => [],
        'hasHelpText' => false,
        //'help' => 'Please enter your name',
        'value' => $result->max_selling_price ?? '',
    ]" />
    <div class="input-group-append property_per">
        <span class="input-group-text">{{config('Reading.default_currency')}}</span>
    </div>
    <div class="invalid-feedback fw-bold"></div>

</div>

<div
    class="col-md-6 common-label-css position-relative">
    <div class="form-group position-relative mt-3">
        <label for="project_name" class="text-14 font-weight-400 lineheight-18 color-b-blue">
            Terms of Payment
            <span class="required">*</span></label>
            
                <div class="termsPaymentSelector termspayment_develop" style="display: flex; align-items: center;">
                    <span>Default Agent's Commission:</span>
                    <button type="button" class="decreasePaymentTermsBtn">-</button>
                    <input type="number" name="agent_commission_per" value="{{!empty($result->agent_commission_per) ? $result->agent_commission_per : 1}}" min="1" style="text-align: center; width: 50px;" readonly>
                    <button type="button" class="increasePaymentTermsBtn">+</button>
                </div>
            
        
        <div class="invalid-feedback fw-bold"></div>
    </div>
</div>


                        
@php
    $defaultMessageCoverImage =
        "<img src='" .
        asset('img/upload.svg') .
        "' class='upload'> " .
        trans('messages.multi_image_component.Drop_cover_picture_here_or_click_to_upload');
    
    $defaultMessageDevelopmentImages =
        "<img src='" .
        asset('img/upload.svg') .
        "' class='upload'> " .
        trans('Drop files here or click to upload') .
        '. <br><small>' .
        trans('messages.multi_image_component.You_can_upload_up_to') .
        ' 30 ' .
        trans('photos') .
        '</small>';
    
    $defaultMessageLegalDocument =
        "<img src='" .
        asset('img/upload.svg') .
        "' class='upload'> " .
        trans('Drop files here or click to upload') .
        '. <br><small>' .
        trans('You can upload Legal Documents') .
        '</small>';

    $defaultMessageBrochure =
        "<img src='" .
        asset('img/upload.svg') .
        "' class='upload'> " .
        trans('Drop files here or click to upload') .
        '. <br><small>' .
        trans('You can upload Brochure') .
        '</small>';
@endphp
{{-- Brochure: --}}
<div class="col-md-12 common-label-css mt-3">
    <x-forms.crm-multi-image-upload :fieldData="[
        'name' => 'brochure',
        'hasLabel' => true,
        'label' => trans('Upload Brochure') . ':',
        'id' => 'brochure',
        'attributes' => [],
        'hasHelpText' => false,
        'help' => 'Please enter your name',
        'maxFiles' => 1,
        'isRequired' => true,
        'addRemoveLinks' => true,
        'dictDefaultMessage' => $defaultMessageBrochure,
        'acceptedFiles' => 'application/pdf',
        'uploadedFiles' => !empty($result->id)
            ? collect([$brochureInstance])
            : collect([]),
    ]" />
</div>
{{-- Cover Image: --}}
<div class="col-md-12 common-label-css mt-3">
    <x-forms.crm-multi-image-upload :fieldData="[
        'name' => 'cover_image',
        'hasLabel' => true,
        'label' => trans('messages.properties.cover_images') . ':',
        'id' => 'cover_image',
        'attributes' => [],
        'hasHelpText' => false,
        'help' => 'Please enter your name',
        'maxFiles' => 1,
        'isRequired' => true,
        'addRemoveLinks' => true,
        'dictDefaultMessage' => $defaultMessageCoverImage,
        'acceptedFiles' => 'image/*',
        'uploadedFiles' => !empty($result->id)
            ? collect([$coverImageInstance])
            : collect([]),
    ]" />
</div>
{{-- Development Images: --}}
<div class="col-md-12 common-label-css mt-3">
    <x-forms.crm-multi-image-upload :fieldData="[
        'name' => 'development_images',
        'hasLabel' => true,
        'label' => trans('Upload Development Images'),
        'id' => 'development_images',
        'attributes' => [],
        'hasHelpText' => false,
        'help' => 'Please enter your name',
        'maxFiles' => 30,
        'maxFilesize' => 5,
        'isRequired' => true,
        'addRemoveLinks' => true,
        'dictDefaultMessage' => $defaultMessageDevelopmentImages,
        'acceptedFiles' =>
            'image/*, application/pdf, application/msword,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel, video/*',
        'uploadedFiles' => !empty($result->id) ? $developmentImages : collect([]),
    ]" />
</div>
<div class="col-md-12 common-label-css mt-3">
    <x-forms.crm-multi-image-upload :fieldData="[
        'name' => 'floor_plans',
        'hasLabel' => true,
        'label' => trans('Upload Floor Plans'),
        'id' => 'floor_plans',
        'attributes' => [],
        'hasHelpText' => false,
        'help' => 'Please enter your name',
        'maxFiles' => 30,
        'maxFilesize' => 5,
        'isRequired' => true,
        'addRemoveLinks' => true,
        'dictDefaultMessage' => $defaultMessageDevelopmentImages,
        'acceptedFiles' =>
            'image/*, application/pdf, application/msword,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel, video/*',
        'uploadedFiles' => !empty($result->id) ? $floorPlans : collect([]),
    ]" />
</div>
<div class="col-md-12 common-label-css mt-3">
    <x-forms.crm-multi-image-upload :fieldData="[
        'name' => 'legal_document',
        'hasLabel' => true,
        'label' => trans('Upload Legal Document') . ':',
        'id' => 'legal_document',
        'attributes' => [],
        'hasHelpText' => false,
        'help' => 'Please enter your name',
        'maxFiles' => 1,
        'isRequired' => true,
        'addRemoveLinks' => true,
        'dictDefaultMessage' => $defaultMessageLegalDocument,
        'acceptedFiles' => 'application/pdf',
        'uploadedFiles' => !empty($result->id)
            ? collect([$legalDocumentInstance])
            : collect([]),
    ]" />
</div>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css add-event">
    <x-forms.crm-text-field :fieldData="[
        'name' => 'location',
        'hasLabel' => true,
        'class' => 'developmentLocation',
        'label' => trans('Location'),
        'id' => !empty($result->id) ? 'location_0' : 'location_0',
        'attributes' => [],
        'hasHelpText' => false,
        //'help' => 'Please enter your name',
        'isRequired' => true,
        'value' => !empty($result->location) ? $result->location : '',
    ]" />
</div>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css add-event">
    <div id="{{!empty($result->id) ? 'developmentLocationMap_0' : 'developmentLocationMap_0'}}" class="mt-10" style="height: 260px;border-radius:8px;">
    </div>
    <input type="hidden" name="latitude" class="form-control small latitude_v"
        value="{{ !empty($result->latitude) ? $result->latitude : old('latitude') }}"
        id="{{!empty($result->id) ? 'latitude_v_0' : 'latitude_v_0'}}" />
    <input type="hidden" name="longitude" class="form-control small longitude_v"
        value="{{ !empty($result->longitude) ? $result->longitude : old('longitude') }}"
        id="{{!empty($result->id) ? 'longitude_v_0' : 'longitude_v_0'}}" />
        <div class="checkbox_text d-flex mt-1">
            <label for="checkbox">
                <input id="checkbox" type="checkbox" name="terms_conditions">
                <span class="label-text"></span>
            </label>
            <p class="checkbox-small-text">Open Collaboration With All Agent's Network. (This Will Include Connected Agent And Non-Connected Agents)</p>
        </div>
</div>
