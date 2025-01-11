<!-- Your Image Upload Component -->
<div class="form-group crm-profile-image-upload-container position-relative">
    @if(isset($values['hasLabel']) && $values['hasLabel'])
        <label class="text-14 font-weight-400 lineheight-18 color-b-blue d-block">{{ $values['label'] ?? 'Image Upload' }} @if(isset($values['isRequired']) && $values['isRequired'])<span class="required">*</span>@endif</label>
    @endif

    <div class="image-container  common-label-css">
        <label for="{{ $values['id'] ?? 'imageUpload' }}" class="position-relative image-label{{ $values['id'] ?? 'imageUpload' }}">
            <img src="{{ !empty($values['selectedImage']) ? $values['selectedImage'] : asset('img/default-user.jpg') }}" alt="Default Image" class=" border-r-20" id="{{ $values['id'] ?? 'imageUpload' }}_image" height="150" width="150">
            <div class="badge-overlay position-absolute b-color-blue-opacity-5 w-100 edit-profile-img">
                <span class="badge badge-pill badge-add d-block color-white text-16 lineheight-20 font-weight-700">{{!empty($values['selectedImage']) ? trans('messages.profile_image_component.Edit_text') : trans('messages.profile_image_component.Add_text')}}</span>
            </div>
        </label>
        <input type="file" id="{{ $values['id'] ?? 'imageUpload' }}_file" name="{{ $values['name'] ?? 'image' }}" class="d-none mt-3" accept="image/*" onchange="updateImage(this,'{{ $values['id'] ?? 'imageUpload' }}')">
        <div class="invalid-feedback fw-bold"></div>
    </div>



    @if(isset($values['hasHelpText']) && $values['hasHelpText'])
        <small class="small-text-image color-b-blue opacity-8 text-10 font-weight-400 line-height-20 text-capitalize position-relative">{!! $values['help'] ?? '' !!}</small>
    @endif
</div>

<script>
    $(document).on('click','.image-label{{ $values['id'] ?? 'imageUpload' }}',function(e){
        e.preventDefault();
        $('#{{ $values['id'] ?? 'imageUpload' }}_file').click();
    });
        
    function updateImage(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                // Update the image source
                $('#'+id+'_image').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);

            // Change the badge to 'Edit'
            $('#'+id+'_image').parents('.image-label{{ $values['id'] ?? 'imageUpload' }}').find('.badge-overlay span').text("{{trans('messages.profile_image_component.Edit_text')}}");
        }
    }
</script>
