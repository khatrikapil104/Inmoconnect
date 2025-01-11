@if (!empty($chatUsers))

    @php
        $noMessagesCount = 0;
    @endphp
    @foreach ($chatUsers as $chatUser)
        @if (!empty($chatUser->last_message) && !empty($chatUser->last_message_time))
            <div class="chat_msg-first d-flex justify-content-between ps-2 user{{ $chatUser->id }} oneToOneChatRow allChatRow"
                data-id="{{ $chatUser->id }}">
                <div class="chat_message_p-left d-flex align-items-center position-relative w-100">

                    <div class="chat_number" style="{{ !empty($chatUser->unread_msg_count) ? '' : 'display:none;' }}">
                        {{ !empty($chatUser->unread_msg_count) ? $chatUser->unread_msg_count : 0 }}</div>

                    <div class="p_left-img {{ !empty($chatUser->is_online) ? 'image_chat_before' : '' }}">
                        <img src="{{ !empty($chatUser->image) ? $chatUser->image : asset('img/default-user.jpg') }}"
                            alt="Default Image" class="border-r-8" height="40" width="40">
                    </div>
                    <div class="p_left-text ps-2 ">
                        <div class="d-flex justify-content-between">
                            <div class="text-14 font-weight-700 lineheight-18 color-b-primary user_width">
                                {{ $chatUser->name ?? '' }}
                            </div>
                            <div class="chat-msg_f-right">
                                @if (!empty($chatUser->last_message_time))
                                    <div class="text-12 font-weight-400 color-light-grey-seven lastMessageTime">
                                        {{ $chatUser->last_message_time }}</div>
                                @endif

                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between text-12 font-weight-400 lineheight-18 color-grey">
                            {{ ucfirst(getUserRoleName($chatUser->user_role_id)) }}
                            @if (!empty($chatUser->is_muted))
                                <i class="icon-mute    text-24 color-b-blue "></i>
                            @endif
                        </div>
                        <div class="text-14 font-weight-400 lineheight-16 color-green typingText" style="display:none;">
                            Typing...</div>
                        @if (!empty($chatUser->last_message))
                            <div class="text-chat-change text-14 font-weight-400 lineheight-16 color-b-blue lastMessageText">
                                @if($chatUser->message_type == "custom")
                                    @include('modules.properties.includes.modal')
                                    {{ $chatUser->custom_title }}
                                @else
                                    {{ $chatUser->last_message }}
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        @else
            @php
                $noMessagesCount++;
            @endphp
        @endif
    @endforeach
    @if ($noMessagesCount == count($chatUsers))
        <small class="d-flex justify-content-between ">
            {{ trans('messages.No_messages_found') }}
        </small>
    @endif
@else
    <small class="d-flex justify-content-between ">
        {{ trans('messages.No_messages_found') }}
    </small>
@endif
