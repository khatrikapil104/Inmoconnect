@if (isset($folders) & !empty($folders))
    @foreach ($folders as $folder)
        <div class="col-lg-3">
            <div class="folder_box d-flex flex-column align-items-center gap-2 position-relative">
                <a href="javascript:void(0)" class="{{ $loadFolder }}" data-folder-id={{ $folder->id }}><img
                        src="{{ asset('img/folder_img.svg') }}" alt="image" class="#"></a>
                <p class="text-14 font-weight-700 color_black lineheight-18"> {{ $folder->name }}
                </p>
                <p class="text-14 font-weight-400 color_black lineheight-18"> {{ count($folder->userFile) }} Files </p>
                @if(isset($attachments) && $attachments->isNotEmpty())
                @foreach ($attachments as $attachment)
                @if ($attachment->folder_id == $folder->id)
                <div class="dot_main">
                    <div class="dot"></div>
                </div>
                @endif
                @endforeach
                @endif
            </div>
        </div>
    @endforeach
@endif
