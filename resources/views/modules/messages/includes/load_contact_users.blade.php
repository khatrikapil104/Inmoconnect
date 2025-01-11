@if (!empty($contactUsers))

    @foreach ($contactUsers as $contactUserKey => $contactUserData)
        <div class="chat_messag_contant pb-1 pt-3">
            <div class="chat-m-number text-capitalize">{{ $contactUserKey }}</div>
        </div>
        @if (!empty($contactUserData))
            @foreach ($contactUserData as $contactUser)
                <div class="chat_msg-first d-flex justify-content-between ps-2 user{{ $contactUser->id }} oneToOneChatRow allChatRow"
                    data-id="{{ $contactUser->id }}">
                    <div class="chat_message_p-left d-flex align-items-center position-relative w-100">

                        <div class="chat_number"
                            style="{{ !empty($contactUser->unread_msg_count) ? '' : 'display:none;' }}">
                            {{ !empty($contactUser->unread_msg_count) ? $contactUser->unread_msg_count : 0 }}</div>

                        <div class="p_left-img {{ !empty($contactUser->is_online) ? 'image_chat_before' : '' }}">
                            <img src="{{ !empty($contactUser->image) ? $contactUser->image : asset('img/default-user.jpg') }}"
                                alt="Default Image" class="border-r-8" height="40" width="40">
                        </div>
                        <div class="p_left-text ps-2 ">
                            <div class="d-flex justify-content-between">
                                <div class="text-14 font-weight-700 lineheight-18 color-b-primary user_width">
                                    {{ $contactUser->name ?? '' }}
                                </div>
                                <div class="chat-msg_f-right">
                                    @if (!empty($contactUser->last_message_time))
                                        <div class="text-12 font-weight-400 color-light-grey-seven lastMessageTime">
                                            {{ $contactUser->last_message_time }}</div>
                                    @endif

                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between text-12 font-weight-400 lineheight-18 color-grey">
                                {{ ucfirst(getUserRoleName($contactUser->user_role_id)) }}
                                @if (!empty($contactUser->is_muted))
                                <i class="icon-mute    text-24 color-b-blue "></i>
                            @endif
                            </div>
                            <div class="text-14 font-weight-400 lineheight-16 color-green typingText"
                                style="display:none;">Typing...</div>
                            @if (!empty($contactUser->last_message))
                                <div
                                    class="text-chat-change text-14 font-weight-400 lineheight-16 color-b-blue lastMessageText">
                                    @if($contactUser->message_type == "custom")
                                        @include('modules.properties.includes.modal')
                                        {{ $contactUser->custom_title }}
                                    @else
                                        {{ $contactUser->last_message }}
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            @endforeach
        @endif
    @endforeach
@else
    <small class="d-flex justify-content-between ">
        No Contacts Found
    </small>
@endif
