@php
    $totalCount = storeCrmComponentsDataIntoSession('crm-multi-image-upload');
@endphp

@if (!empty($totalCount) && $totalCount == 1)
    @push('styles')
    <link  rel="stylesheet" href="{{ asset('assets/css/dropzone.min.css') }}">
    @endpush
@endif

<label for="{{ $values['id'] ?? '' }}" class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ $values['label'] ?? 'Multi-Select' }} @if(isset($values['isRequired']) && $values['isRequired'])<span class="required">*</span>@endif</label>
<div class="form-group dynamic-dropzone-container position-relative">
    @if(isset($values['hasLabel']) && $values['hasLabel'])
        <!-- <label for="{{ $values['id'] ?? '' }}" class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ $values['label'] ?? 'Multi-Select' }} @if(isset($values['isRequired']) && $values['isRequired'])<span class="required">*</span>@endif</label> -->
    @endif
    <input type="hidden" name="removedUploaded{{ $values['name'] ?? 'file' }}Ids" id="removedUploaded{{ $values['name'] ?? 'file' }}Ids">
    <div class="dropzone" id="{{ $values['id'] ?? '' }}"
        @if (isset($values['attributes']) && is_array($values['attributes']))
            {!! implode(' ', $values['attributes']) !!}
        @endif
    ></div>
    
    
    @if (isset($values['hasHelpText']) && $values['hasHelpText'])
    <small class="small-text-select color-b-blue opacity-8 text-10 font-weight-400 line-height-20 text-capitalize position-relative">
        {!! $values['help'] ?? '' !!}
    </small>
    @endif
</div>
<div class="invalid-feedback fw-bold"></div>

@push('scripts')
@if (!empty($totalCount) && $totalCount == 1)
<script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
@endif
    <script>
        // $(document).ready(function () {
            // Initialize Dropzone
            var dropzone = new Dropzone("#{{ $values['id'] ?? '' }}", {
                url : "{{route(routeNamePrefix().'user.dashboard')}}",
                paramName: "{{ $values['name'] ?? 'file' }}",
                maxFilesize: {{ $values['maxFilesize'] ?? 2 }},
                maxFiles: {{ $values['maxFiles'] ?? 30 }},
                acceptedFiles: "{{ $values['acceptedFiles'] ?? 'image/*' }}",
                addRemoveLinks: {{ isset($values['addRemoveLinks']) && $values['addRemoveLinks'] ? 'true' : 'true' }},
                autoProcessQueue: false, // Disable automatic uploads,
                dictDefaultMessage:"{!! $values['dictDefaultMessage'] ?? '' !!}",
                dictRemoveFile: "Remove", 
        //         previewTemplate: '<div class="dz-preview dz-file-preview">' +
        // '<img data-dz-thumbnail class="image-thumbnail" />' +
        // '<a class="dz-remove" href="javascript:undefined;" data-dz-remove>&times;</a>' +
        // '</div>'
        //     });
                init: function () {
                    var dropzone = this;
                    var fileCount = 0;
                    // Fetch existing files (propertyImages) and display them
                    @if(isset($values['uploadedFiles']) && $values['uploadedFiles']->isNotEmpty())
                    @foreach($values['uploadedFiles'] as $image)
                        var mockFile = { name: "{{ $image->image }}", size: 12345,customId: {{ $image->id }}  }; // Adjust the size as needed
                        dropzone.emit("addedfile", mockFile);
                        @if($image->type == 'image')
                        dropzone.emit("thumbnail", mockFile, "{{$image->image}}");
                        @elseif($image->type == 'document')
                        dropzone.emit("thumbnail", mockFile, "{{ asset('img/certificate.svg') }}");
                        @else
                        dropzone.emit("thumbnail", mockFile, "{{asset('img/default-property.jpg')}}");
                        @endif
                        dropzone.emit("complete", mockFile);
                        fileCount++;
                    @endforeach
                    @endif

                    dropzone.on("addedfile", function(file) {
                        fileCount++;
                        checkForDefaultMessage();
                        const documentExtensions = [".pdf", ".doc", ".docx", ".xls", ".xlsx", ".ppt", ".pptx", ".txt", ".rtf", ".odt", ".ods"];

                        const isDocument = documentExtensions.some(extension => file.name.toLowerCase().endsWith(extension));

                        if (file.type.startsWith("image/")) {
                            
                            dropzone.emit("thumbnail", file, file.dataURL || file.previewElement.src);
                        } else if (isDocument) {
                            
                            dropzone.emit("thumbnail", file, "{{ asset('img/certificate.svg') }}");
                        } else {
                            
                            dropzone.emit("thumbnail", file, "{{ asset('img/default-property.jpg') }}");
                        }
                    });
                    

                    // Other init logic goes here

                    dropzone.on("removedfile", function (file) {
                        // Access the custom ID and update the hidden field
                        var removedUploadedFilesId = file.customId;
                        updateHiddenField(removedUploadedFilesId);
                        fileCount--;
                        checkForDefaultMessage();
                    });
                    function updateHiddenField(removedUploadedFilesId) {
                        if(removedUploadedFilesId){

                            // Assuming you have a hidden input with the ID 'removedPropertyImageIds'
                            var hiddenField = document.getElementById("removedUploaded{{ $values['name'] ?? 'file' }}Ids");
    
                            // Get existing IDs from the hidden field
                            var existingIds = hiddenField.value.split(',');
                            var existingIds = existingIds.filter(function(id) {
                                return id !== '';
                            });
    
                            if(existingIds.length > 0){
                                existingIds.push(removedUploadedFilesId);
                            }else{
                                existingIds = [];
                                existingIds.push(removedUploadedFilesId);
                            }
                           
    
                            // Update the hidden field with the updated IDs
                            hiddenField.value = existingIds.join(',');
                        }
                    }
                    function checkForDefaultMessage() {
                        if (fileCount === 0) {
                            dropzone.element.querySelector(".dz-message").style.display = "block"; // Show message
                        } else {
                            dropzone.element.querySelector(".dz-message").style.display = "none"; // Hide message
                        }
                    }

                    checkForDefaultMessage();

                  
                }

        });
        </script>

@endpush
