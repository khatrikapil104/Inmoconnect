<label for="files"
    class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ trans('messages.profile-setup.Professional_Certifications').':' }}
    {{-- <span class="required">*</span> --}}
</label>
@if ($certificateData->isNotEmpty())
    <div class="d-block d-sm-flex justify-content-between certificateInput">
        <div class="d-inline-block d-sm-flex left-side-certificate gap-3 align-items-center flex-wrap">
            @foreach ($certificateData as $certificate)
                <div
                    class="mb-3 mb-md-0 certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-2 px-3 border-r-4">
                    <h6 class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                        {{ $certificate->original_name ?? '' }}
                        <span class="ps-4 removeCertificateBtn" data-id="{{ $certificate->id ?? '' }}"><svg
                                xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z"
                                    fill="#383192" />
                            </svg></span>
                    </h6>
                </div>
            @endforeach

        </div>
        <div class="certificate_button">
            <button type="button"
                class="border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18 gardient-button  addNewCertificateBtn"
                onclick="document.getElementById('fileInput').click()">
                {{ trans('messages.profile-setup.Add_New_Certificate') }}

            </button>
            <input type="file" name="files[]" id="fileInput" multiple onchange="handleFileSelect(event)"
                accept=".pdf, .jpeg, .jpg, .png" style="display: none;">
        </div>
    </div>
@else
    <div class="form-group dynamic-dropzone-container position-relative certificateInput">

        <input type="file" name="files[]" id="fileInput" multiple onchange="handleFileSelect(event)"
            accept=".pdf, .jpeg, .jpg, .png" style="display: none;">
        <label for="fileInput" class="dropzone dz-clickable" id="fileInputLabel"
            style="cursor: pointer; border: 2px dashed #ccc; padding: 10px;">
            <div class="dz-default dz-message"><button class="dz-button" type="button"><img
                        src="{{ asset('img/upload.svg') }}" class="upload">
                    {{ trans('messages.profile-setup.Drag_or_Drop_File') }}
                </button></div>
        </label>

    </div>
@endif
{{-- <div class="invalid-feedback fw-bold"></div> --}}
