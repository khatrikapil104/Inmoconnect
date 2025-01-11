@if(!empty($groupList))

@foreach($groupList as $group)
<div class="chat_msg-first d-flex justify-content-between ps-2 group{{$group['group_id']}} groupChatRow allChatRow" data-id="{{$group['group_id']}}">
    <div class="chat_message_p-left d-flex align-items-center position-relative">

        <div class="chat_number" style="{{!empty($group['unread_msg_count']) ? '' : 'display:none;'}}">{{!empty($group['unread_msg_count']) ? $group['unread_msg_count'] : 0 }}</div>
        
        <div class="p_left-img">
            <img src="{{getFileUrl($group['group_image'],'groups')}}" alt="dd Image"
                class="border-r-8" height="40" width="40">
                {{-- <img src="{{$value->group_image ?? ""}}" alt="image" class="width-36 height-36 border-r-5"> --}}
        </div>
        <div class="p_left-text ps-2">
            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">{{$group['group_name'] ?? ''}}
            </div>
            <div class="text-14 font-weight-700 lineheight-18 color-b-primary">
                {{trans('messages.group')}}
            </div>
        </div>
    </div>
    <div class="chat-msg_f-right">
        @if(!empty($group['last_message_time']))
        <div class="text-12 font-weight-400 color-light-grey-seven lastMessageTime">{{$group['last_message_time'] ?? ''}}</div>
        @endif
        @if(!empty($group['is_muted']))
        <i class="icon-mute    text-24 color-b-blue " ></i>
        @endif
    </div>
</div>

@endforeach
@else
<small class="d-flex justify-content-between ">
    {{trans('messages.messages.no_group_found')}}
</small>
@endif
