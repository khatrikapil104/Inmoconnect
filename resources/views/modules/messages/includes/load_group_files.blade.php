@if($findGroup->group_files && $findGroup->group_files->isNotEmpty())
@foreach($findGroup->group_files as $file)
<div class="chat_msg-first d-flex justify-content-between ps-2 align-items-center">
    <div class="modal-body_left">
        <div class="modal_img">
            <i class=" icon-zip icon-24 "></i>
        </div>
        <div class="modal_body-left_text">
            <div class="text-14 font-weight-700 lineheight-18 text-capitalize color-b-blue">
                {{$file->file_name ?? ''}}</div>
            <div
                class="text-14 font-weight-400 lineheight-18 text-capitalize color-light-grey-two pt-1">
                {{formatFileSize($file->file_size)}}/{{formatFileSize($file->file_size)}}</div>
        </div>
    </div>
    <div class="chat-msg_f-right">
        <div class="text-14 font-weight-700 lineheight-18 color-b-blue">
            {{trans('messages.Sent_by')}}: 
            <span class="color-light-grey-nine font-weight-400"> {{$file->sender_name ?? ''}}</span></div>
    </div>
</div>
@endforeach
@else
{{trans('messages.no_files_found')}}
@endif
