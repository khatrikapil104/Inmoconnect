@if ($allDocumentData->isNotEmpty())
    @foreach ($allDocumentData as $documentVal)
        @if ($documentVal->upload_status == 'in_progress')
            <div class="modal-body_card justify-content-between {{ $documentVal->upload_status . '_row' }}">
                <div class="modal-body-card-left-progress d-flex align-items-center gap-4">
                    <input type="checkbox" id="vehicle1" name="dataArr[]" class="uploadDocumentsCheckbox"
                        value="{{ $documentVal->id }}" disabled="disabled">
                    <div class="modal-body_left">
                        <div class="modal_img">
                            <i class=" icon-zip icon-24 "></i>
                        </div>
                        <div class="modal_body-left_text">
                            <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                                {{ $documentVal->file_name ?? '' }}</div>
                            <div
                                class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                                {{ formatFileSize($documentVal->file_size) }}/{{ formatFileSize($documentVal->file_size) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="task-progress d-flex align-items-center">
                    <span
                        class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">{{ $documentVal->upload_progress }}%</span>
                    <progress class="progress progress2 mx-2" max="100"
                        value="{{ $documentVal->upload_progress }}"></progress>
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                        fill="none">
                        <path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd"
                            d="M5 6.28399L1.28399 10L0 8.71601L3.71601 5L4.15612e-06 1.28399L1.28399 0L5 3.71601L8.71601 0L10 1.28399L6.28399 5L10 8.71601L8.71601 10L5 6.28399Z"
                            fill="#17213A" />
                    </svg>
                </div>
            </div>
        @else
            <div class="modal-body_card {{ $documentVal->upload_status . '_row' }}">
                <input type="hidden" name="folder_id" value={{$documentVal->folder_id}}>
                <input type="checkbox" id="vehicle1" class="uploadDocumentsCheckbox" name="dataArr[]"
                    value="{{ $documentVal->id }}" data-id="{{ $documentVal->id }}">
                <div class="modal-body_left">
                    <div class="modal_img">
                        <i class=" icon-zip icon-24 "></i>
                    </div>
                    <div class="modal_body-left_text">
                        <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                            {{ $documentVal->file_name ?? '' }}</div>
                        <div class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                            {{ formatFileSize($documentVal->file_size) }}/{{ formatFileSize($documentVal->file_size) }}
                        </div>
                    </div>
                </div>
            </div>
   
        @endif
    @endforeach
@endif
