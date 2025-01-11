@if(!empty($uploadedPropertiesData) && !empty($copies))
                                        
@for($i = 0; $i < $copies; $i++)
<tr class="uploadedPropertyRow{{$i}}">
    <td><input type="checkbox" name="uploadedPropertiesData[{{$i}}][property_checkbox]" value="1"
            class="checkbox checkboxone  fileCheckbox uploadedPropertiesCheckbox" checked></td>
    <td><input type="text" name="uploadedPropertiesData[{{$i}}][reference]" class="form-control text-14 font-weight-400 lineheight-18 color-b-blue height-30" value="{{!empty($uploadedPropertiesData['reference']) ?  $uploadedPropertiesData['reference'] : ''}}"><div class="invalid-feedback fw-bold"></div></td>
    <td>
        <div class="common-label-css table_upload_property">
            <x-forms.crm-single-select :fieldData="[
                'name' => 'uploadedPropertiesData['.$i.'][type_id]',
                'hasLabel' => false,
                'label' => trans('messages.properties.Property_Type') . ':',
                'id' => 'type_id',
                'options' => $types,
                'attributes' => [],
                'hasHelpText' => false,
                'placeholder' => trans('messages.properties.Property_Type'),
                'isRequired' => true,
                'minimumResultsForSearch' => 0,
                'selected' => !empty($uploadedPropertiesData['type_id']) ?  $uploadedPropertiesData['type_id'] : ''
            
            ]" />
        </div>
    </td>
    <td class="position-relative">
        <div class="from-group position-relative">
            <input type="text" name="uploadedPropertiesData[{{$i}}][size]" value="{{!empty($uploadedPropertiesData['size']) ?  $uploadedPropertiesData['size'] : ''}}" class="modal_table_input form-control" style="width: 65%">
            <div class="input-group-append input_modal_meter" style="top: 10%; left: 50%;">
                <span class="input-group-text unit-label text-lowercase">m²</span>
            </div>
        </div>
        <div class="invalid-feedback fw-bold"></div>
    </td>
    <td class="table_prize position-relative">
            <div class="from-group position-relative">
                <input type="text" value="{{!empty($uploadedPropertiesData['price']) ?  $uploadedPropertiesData['price'] : ''}}" name="uploadedPropertiesData[{{$i}}][price]" class="modal_table_input modal_table_input_one form-control">
            </div>
            <div class="input-group-append input_modal_meter input_modal_meter_one">
                <span class="input-group-text unit-label">€</span>
            </div>
            <div class="invalid-feedback fw-bold"></div>
    </td>
    
    <td><button class="b-color-transparent removeUploadedPropertyButton" data-id="{{$i}}"
            > <i
                class="icon-Delete icon-20 color-b-blue "></i></button></td>
</tr>
@endfor
@endif
