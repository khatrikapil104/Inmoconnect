@if (!empty($eventAttachemntData))
    {{-- @dd($eventAttachemntData) --}}
    @foreach ($eventAttachemntData as $data)
        <div
            class="mb-3 mb-md-0 attachmentRow certificate_name d-flex gap-3 d-flex align-items-center b-color-background py-1 px-3 border-r-4 eventAttachmentInput">
            <h6 class="text-14 font-weight-400 lineheight-18 color-primary text-capitalize ">
                {{ $data->file_name ?? '' }}
                @if (!empty($request->type) || (!empty($type)))
                    @if ( isset($request->type) && ($request->type == 'edit') || (isset($type) && $type =='edit'))
                        <span class="ps-4 removeEventAttachmentBtn" data-id="{{ $data->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="7" viewBox="0 0 6 7"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3 4.27039L0.770393 6.5L0 5.72961L2.22961 3.5L2.49367e-06 1.27039L0.770396 0.5L3 2.7296L5.2296 0.5L6 1.27039L3.77039 3.5L6 5.72961L5.22961 6.5L3 4.27039Z"
                                    fill="#383192"></path>
                            </svg>
                        </span>
                    @endif
                @endif
               

                    </h6>
        </div>
    @endforeach
@endif
