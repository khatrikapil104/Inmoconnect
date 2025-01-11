@if($findGroup->group_members && $findGroup->group_members->isNotEmpty())
@foreach($findGroup->group_members as $member)
<div class="chat_msg-first d-flex justify-content-between ps-2 align-items-center">
    <div class="chat_message_p-left d-flex align-items-center position-relative">
        <div class="p_left-img {{($member->is_online == 1) ? 'image_chat_before' : ''}}">
            <img src="{{getFileUrl($member->image,'users')}}" alt="Default Image"
                class="border-r-8" height="40" width="40">
        </div>
        <div class="p_left-text ps-2">
            <div class="text-14 font-weight-700 lineheight-18 color-black text-capitalization">
                {{$member->name ?? ''}}
            </div>
            <div class="text-14 font-weight-400 lineheight-18 color-light-grey-nine pt-1">
            {{ucfirst(getUserRoleName($member->user_role_id))}}</div>
        </div>
    </div>
    <div class="chat-msg_f-right">
        <div class="text-14 font-weight-400 lineheight-18 color-light-grey-nine">
            {{($member->is_admin == 1) ? 'Admin' : ''}}</div>
    </div>
</div>
@endforeach
@else
No members found
@endif