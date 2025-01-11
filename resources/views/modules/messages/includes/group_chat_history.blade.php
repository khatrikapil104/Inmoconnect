<div class="chat_massage_card d-flex align-items-center justify-content-between">
    <a class="viewGroupDetails">
        <div class="chat_message_p-left d-flex align-items-center">
            <div class="p_left-img">
                <img src="{{ !empty($findGroup->group_image) ? getFileUrl($findGroup->group_image, 'groups') : asset('img/chat_default_group.jpg') }}"
                    alt="Default Image" class="border-r-8" height="50" width="50">
            </div>
            <div class="p_left-text ps-2">
                <div class="text-14 font-weight-700 lineheight-18 color-b-primary">{{ $findGroup->name ?? '' }}</div>
                <!-- <div class="text-14 font-weight-400 lineheight-18 color-grey">Customer</div> -->
                <div class="text-14 font-weight-400 lineheight-16 color-green">
                    {{ $findGroup->count_online_members ?? 0 }}
                    {{ trans('messages.members_are_online') }}</div>
            </div>
        </div>
    </a>
    <div class="chat_message_p-right">
        <div class="d-flex align-items-center gap-3">
            @if ($findGroup->group_members && $findGroup->group_members->isNotEmpty())
                <div class="d-flex ">
                    @foreach ($findGroup->group_members as $member)
                        <div class="dashboard_img chat_d-img">
                            {{-- <img src="{{ getFileUrl($member->image, 'users') }}" alt="image" class=""> --}}
                            <img src="{{ !empty(Auth::user()->companyDetails->company_image) ? Auth::user()->companyDetails->company_image : asset('img/logoplaceholder.svg') }}"
                            alt="image">
                        </div>
                    @endforeach

                </div>
            @endif
            <div class="chat_message_p-right">
                <!-- <button class="chat_img-dropdown" onclick="myFunction()" class="chat_img-dropdown"> -->
                @if (empty($findGroup->is_group_left))
                    <button class="chat_img-dropdown" onclick="myFunction()">
                        <img src="/img/chat_dropdown.svg" alt="image">
                    </button>
                @endif
                <div id="myDropdown" class="chatimg-dropdown ">
                    @if (!empty($findGroup->is_group_muted))
                        <a class="muteGroupChatBtn" data-id="{{ $findGroup->id }}" data-val="0"><i
                                class="icon-mute text-24 color-b-blue "></i> Unmute Chat</a>
                    @else
                        <a class="muteGroupChatBtn" data-id="{{ $findGroup->id }}" data-val="1"><i
                                class="icon-mute text-24 color-b-blue "></i> Mute Chat</a>
                    @endif
                    @if ($findGroup->created_by != auth()->user()->id)
                        <a class="leaveGroupBtn" data-id="{{ $findGroup->id }}"
                            data-name="{{ $findGroup->name ?? '' }}"><i
                                class="icon-Delete    text-24 color-b-blue "></i>Leave Group</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="chat_message_second-card p-30">
    <div class="chat_msg-height">
        <div class="row chat_msg-row">
            @include('modules.messages.includes.group_chat_history_section')
        </div>

    </div>
    @if (!empty($findGroup->is_group_left))
        <div class="chat_bottom_text d-flex align-items-center mt-30">
            <div class="chat_massage-input">
                <div class="chat_message_input-icon">
                    <textarea class="input-chat" name="group_input_message" placeholder="{{ trans('messages.Type_your_message_here') }}"></textarea>
                </div>
            </div>
            <button class="chat-meassage_document groupDocumentSelectBtn" data-toggle="modal"
                data-target="#exampleModal">
                <i class="  icon-send_document icon-24 "></i>
            </button>
            <button class="chat-message_delivery groupMessageSendBtn" data-user-id="{{ $findGroup->id }}">
                <i class=" icon-send_msg icon-24 "></i>
            </button>
        </div>
    @endif
</div>
