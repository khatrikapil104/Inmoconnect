<div class="chat_massage_card d-flex align-items-center justify-content-between">
    <div class="chat_message_p-left d-flex align-items-center">
        <div class="p_left-img1">
            <img src="{{ !empty($receiverData->image) ? $receiverData->image : asset('img/default-user.jpg') }}"
                alt="Default Image" class="border-r-8" height="50" width="50">
        </div>
        <div class="p_left-text ps-2">
            <div class="text-14 font-weight-700 lineheight-18 color-b-primary text-capitalize">
                {{ $receiverData->name ?? '' }}</div>
            <div class="text-14 font-weight-400 lineheight-18 color-grey">
                {{ ucfirst(getUserRoleName($receiverData->user_role_id)) }}</div>
            <div class="text-14 font-weight-400 lineheight-16 color-green typingText" style="display:none;">Typing...
            </div>
        </div>
    </div>
    <div class="chat_message_p-right">
        <button class="chat_img-dropdown" onclick="myFunction()">
            <img src="/img/chat_dropdown.svg" alt="image">
        </button>
        <div id="myDropdown" class="chatimg-dropdown">
            @if (!empty($receiverData->is_muted))
                <a class="mutePrivateChatBtn" data-id="{{ $receiverData->id }}" data-val="0"><i
                        class="icon-mute text-24 color-b-blue "></i>
                    {{ trans('messages.message.unmute_chat') }}
                </a>
            @else
                <a class="mutePrivateChatBtn" data-id="{{ $receiverData->id }}" data-val="1"><i
                        class="icon-mute text-24 color-b-blue "></i>
                    {{ trans('messages.message.mute_chat') }}
                </a>
            @endif
            <a class="deletePrivateChatBtn" data-id="{{ $receiverData->id }}"
                data-name="{{ $receiverData->name ?? '' }}"><i class="icon-Delete    text-24 color-b-blue "></i>
                {{ trans('messages.message.delete') }}
            </a>
            <!-- <a href="#"><i class="icon-Delete    text-24 color-b-blue"></i> Block</a> -->
        </div>
    </div>
</div>
<div class="chat_message_second-card p-30">
    <div class="chat_msg-height">
        <div class="row chat_msg-row">
            @include('modules.messages.includes.private_chat_history_section')

        </div>
    </div>
    <div class="chat_bottom_text d-flex align-items-center mt-30">
        <div class="chat_massage-input">
            <div class="chat_message_input-icon emoji-picker-container">
                <textarea class="input-chat" name="private_input_message" placeholder="{{ trans('messages.Type_your_message_here') }}"></textarea>
            </div>
        </div>
        <button class="chat-meassage_document privateDocumentSelectBtn" data-toggle="modal" data-target="#exampleModal">
            <i class=" icon-send_document icon-24 "></i>
        </button>
        <button class="chat-message_delivery privateMessageSendBtn" data-user-id="{{ $receiverData->id }}">
            <i class=" icon-send_msg icon-24 "></i>
        </button>
        @include('modules.properties.includes.leadmodal')
    </div>
</div>

<script>
    // $(function() {
    // // Initializes and creates emoji set from sprite sheet
    // window.emojiPicker = new EmojiPicker({
    //     emojiable_selector: '[data-emojiable=true]',
    //     assetsPath: "{{ asset('assets/js/emoji-picker/img/') }}",
    //     popupButtonClasses: 'fa fa-smile-o'
    // });
    // // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
    // // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
    // // It can be called as many times as necessary; previously converted input fields will not be converted again
    // window.emojiPicker.discover();
    // });
</script>
