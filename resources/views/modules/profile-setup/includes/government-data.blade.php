<label for="files"
class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ trans('messages.profile-setup.Government_Certifications') }} 
{{-- <span class="required">*</span> --}}
</label>
@if(!empty($userGovCertificate->government_certification))
<div class="d-block d-sm-flex justify-content-between govcertificateInput">
    <div class="d-inline-block d-sm-flex left-side-certificate gap-3 align-items-center flex-wrap">
        <div class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
            <h6 class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                {{$userGovCertificate->original_doc_name ?? ''}}
                <span class="ps-4 downloadGovtCertificateBtn icon-Download" data-id="{{$userGovCertificate->id ?? ''}}"><svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7"
                        fill="none">
                    </svg></span>
                </h6>
        </div>        
    </div>
    <div class="certificate_button">
        <button type="button"
            class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 gardient-button addNewCertificateBtn" onclick="document.getElementById('govfileInput').click()">
            {{ trans('messages.profile-setup.Upload_New_ID') }}
           
        </button>
        <input type="file" name="gov_files" id="govfileInput" onchange="handleGovernmentFileSelect(event)" accept=".pdf, .jpeg, .jpg, .png" style="display: none;">
    </div>
</div>
@else
<div class="form-group dynamic-dropzone-container position-relative govcertificateInput">
   
    <input type="file" name="gov_files" id="govfileInput" onchange="handleGovernmentFileSelect(event)" accept=".pdf, .jpeg, .jpg, .png" style="display: none;">
    <label for="govfileInput" class="dropzone dz-clickable" id="govfileInputLabel" style="cursor: pointer; border: 2px dashed #ccc; padding: 10px;">
        <div class="dz-default dz-message"><button class="dz-button" type="button"><img
            src="{{asset('img/upload.svg')}}" class="upload"> {{ trans('messages.profile-setup.Drag_or_Drop_File') }}
        </button></div>
    </label>
    
</div>
@endif
<div class="invalid-feedback fw-bold"></div>