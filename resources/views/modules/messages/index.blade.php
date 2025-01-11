@extends('layouts.app')
@section('content')
@section('title')
    {{ trans('messages.Messages') }} Inmoconnect
@endsection
<link href="{{ asset('assets/js/emoji-picker/css/emoji.css') }}" rel="stylesheet">

<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="main-content-crm b-color-background  min-vh-100">
    <div class="crm-main-content">

        <!-- ////////////////////////////breadcrum///////////////////////////////////// -->
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <h3
                        class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">
                        {{ trans('messages.Messages') }}
                </h3>
                </div>
            </div>
        </div>
        <!-- ///////////////////////////end-breadcrum////////////////////////////////////// -->
        <!-- ////////////////////////////////chat_message///////////////////////////////////// -->
        <div class="d-flex gap-3 chat_tabs_main">
            <div class="col-lg-3s leftsidecontent">
                <div class="border-r-12 b-color-white box-shadow-one  p-15">
                    <!-- /////////////////search-button///////////// -->
                    <!-- <div class="search-dashboard d-flex justify-content-between">
                        <div class="search_button w-100">
                            <div class="form-group position-relative">
                                <div class="input-group input-group-sm dashboard_input-search w-100">
                                    <span
                                        class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                    <input type="text" name="userListingFilterData[search]"
                                        class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize"
                                        placeholder="Search Massage" value="">
                                </div>
                            </div>
                        </div>
                        <div class="search-select"></div>
                    </div> -->
                    <!-- /////////////////left_tables/////////////// -->
                    <ul class="tabs chat_tab">
                        <li class="tab-link current tab_link_one" data-tab="tab-1">
                            {{ trans('messages.Messages_Private') }}
                        </li>
                        <li class="tab-link tab_link-two" data-tab="tab-2">
                            {{ trans('messages.Messages_Group') }}
                        </li>
                        <li class="tab-link tab_link_three" data-tab="tab-3">
                            {{ trans('messages.Messages_Contacts') }}
                        </li>
                    </ul>
                    <!-- /////////////////////tab_1///////////////// -->
                    <div id="tab-1" class="tab-content current">
                        <div class="chat_message_main-card mt-2 privateUsersSection">
                            @include('modules.messages.includes.load_private_users')
                        </div>
                    </div>
                    <!-- /////////////////////tab_2 /////////////// -->
                    <div id="tab-2" class="tab-content">
                        <div class="chat_m-second-card mt-2 chat_message_main-card">
                            @if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'sub-agent' || auth()->user()->role->name == 'developer' || auth()->user()->role->name == 'sub-developer')
                                <div class="chat-m-button">
                                    <button
                                        class="w-100 h-42 b-color-transparent border-r-8 text-14 font-weight-400 lineheight-18 color-primary"
                                        data-bs-toggle="modal" data-bs-target="#newGroupModal"><i
                                            class=" icon-plus color-primary me-2"></i>
                                        {{ trans('messages.message.Create_new_group') }}
                                    </button>
                                </div>
                            @endif
                            <div class="chat-message-s-cards groupUsersSection">
                                @include('modules.messages.includes.load_groups')

                            </div>

                        </div>
                    </div>
                    <!-- ////////////////////tab_3//////////////// -->
                    <div id="tab-3" class="tab-content">
                        <div class="chat-message_t-card mt-10">
                            @include('modules.messages.includes.load_contact_users')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9s border-r-12 b-color-white box-shadow-one p-0 rightSideChatContent">

            </div>
        </div>
        <!-- /////////////////////////////////////end-chat_message////////////////////////////////// -->

    </div>
</div>

<div class="modal fade" id="editGroupModal" tabindex="-1" aria-labelledby="editGroupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
        <div class="modal-content border-r-8 border-0 b-color-white createEditGroupData">

        </div>
    </div>
</div>
<!-- /////////////////////////////////////////////Create New Group Modal ///////////////////////////////////////////// -->
<div class="modal fade" id="newGroupModal" tabindex="-1" aria-labelledby="newGroupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
        <div class="modal-content border-r-8 border-0 b-color-white">
            @include('modules.messages.includes.create_edit_group')
        </div>
    </div>
</div>

<!-- /////////////////////////////////////////////Edit Group Modal ///////////////////////////////////////////// -->

<div class="modal fade" id="newGroupModal" tabindex="-1" aria-labelledby="newGroupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-width-change_three modal-dialog-centered" role="document">
        <div class="modal-content border-r-8 border-0 b-color-white">
            @include('modules.messages.includes.create_edit_group')
        </div>
    </div>
</div>
<!-- Document Upload Modal -->
@include('modules.files.includes.upload_document_modal')



@push('scripts')
    <script>
        console.log($socket)
        var routeToGetPpproperty = "{{ route(routeNamePrefix() . 'property.getProperty', ':id' ) }}";
        var cancleAgreement = "{{ route(routeNamePrefix() . 'property.rejectAgreement' ) }}";

        var  getProjectData = "{{ route(routeNamePrefix() . 'property.acceptAgreement' ) }}";
        var savesignatureUrl = "{{ route(routeNamePrefix() .'property.savesignature') }}";
        var generatepdfurl = "{{ route(routeNamePrefix() .'generate.pdf') }}";
        // var routeUrlRemoveFile = "{{ route(routeNamePrefix() . 'files.destroy', ':id') }}";
        // var areYouSureTextConfirmPopup = "{{ trans('messages.confirm_popup.Are_you_sure') }}";
        // var removeFileTextConfirmPopup = "{{ trans('messages.confirm_popup.Remove_File') }}";
        // var removeFileConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_remove_file') }}";
    </script>
    <script src="{{ asset('assets/js/modules/messages/index.js') }}"></script>
    <!-- Begin emoji-picker JavaScript -->
    <script src="{{ asset('assets/js/emoji-picker/js/config.min.js') }}"></script>
    <script src="{{ asset('assets/js/emoji-picker/js/util.min.js') }}"></script>
    <script src="{{ asset('assets/js/emoji-picker/js/jquery.emojiarea.min.js') }}"></script>
    <script src="{{ asset('assets/js/emoji-picker/js/emoji-picker.min.js') }}"></script>
    <!-- End emoji-picker JavaScript -->
    <script>
        $(document).ready(function() {

            $('ul.tabs li').click(function() {
                var tab_id = $(this).attr('data-tab');


                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');


                $(this).addClass('current');
                $("#" + tab_id).addClass('current');

            })

        })
    </script>
    <script>
        $('.tab_link_one').click(function() {
            $('.tab-content_one').removeClass('active');
            $('.tab-content_one').addClass('active');
            $('.tab-content2').removeClass('active');
            $('.tab-content3').removeClass('active');
        });
        $('.tab_link-two').click(function() {
            $('.tab-content_one').removeClass('active');
            $('.tab-content2').addClass('active');
            $('.tab-content3').removeClass('active');
        });
        $('.tab_link_three').click(function() {
            $('.tab-content_one').removeClass('active');
            $('.tab-content2').removeClass('active');
            $('.tab-content3').addClass('active');
        });
    </script>
    <script>
        $(document).ready(function() {

            $('ul.Group_chat li').click(function() {
                var tab_id = $(this).attr('data-tab');


                $('ul.Group_chat li').removeClass('current');
                $('.tab-content_group').removeClass('current');


                $(this).addClass('current');
                $("#" + tab_id).addClass('current');

            })

        })
    </script>

    <script>
        /* When the user clicks on the button,
                toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function scrollToBottom() {
            $('.rightSideChatContent').find('.chat_msg-height').stop().animate({
                scrollTop: $('.rightSideChatContent').find('.chat_msg-height')[0].scrollHeight
            }, 800);
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.chat_img-dropdown')) {
                var dropdowns = document.getElementsByClassName("chatimg-dropdown");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var $old_room_id = 0;
            var $old_group_id = 0;

            var firstUserId = parseInt("{{ $firstUserId }}");
            if (firstUserId && firstUserId > 0) {

                getHistoryMessage(firstUserId);
                $(".user" + firstUserId).addClass('active');
            }


            $(document).on('click', ".oneToOneChatRow", function() {
                var chat_user_id = $(this).attr('data-id');
                if ($old_room_id != 0 && $old_room_id != chat_user_id) {
                    $socket.emit('disconnect', {})
                }
                getHistoryMessage(chat_user_id);
                $(".allChatRow").removeClass('active');
                $(".user" + chat_user_id).addClass('active');

            });
            $(document).on('click', ".groupChatRow", function() {

                var groupID = $(this).attr('data-id');
                if ($old_group_id != 0 && $old_group_id != groupID) {
                    // leave group
                    let leaveData = {
                        group_id: groupID,
                        id: "{{ Auth::user()->id }}"
                    };
                    $socket.emit('group_leave', leaveData);

                    // leave seprate room
                    var inputData = {
                        user: "{{ Auth::user()->name }}",
                        id: "{{ Auth::user()->id }}"
                    };
                    $socket.emit('user_group_leave', inputData)
                }
                getGroupHistoryMessage(groupID);
                $(".allChatRow").removeClass('active');
                $(".group" + groupID).addClass('active');

            });



            // For private and contacts chat history
            function getHistoryMessage(chat_user_id) {
                const formData = new FormData();
                formData.append('chat_user_id', chat_user_id);
                formData.append('chat_type', 'private');

                $('.rightSideChatContent').addClass('loader');
                const attributes = {
                    hasButton: false,
                    handleSuccess: function() {
                        $old_room_id = chat_user_id;
                        var roomId = "{{ Auth::user()->id }}";

                        var inputData = {
                            receiver_id: chat_user_id,
                            sender_id: "{{ Auth::user()->id }}",
                            id: roomId
                        };
                        $socket.emit('login', inputData)

                        $(".rightSideChatContent").html(datas['data']);
                        $(".rightSideChatContent").attr('chat-user-id', chat_user_id);
                        scrollToBottom();
                        $(".user" + chat_user_id).find('.chat_number').text(0);
                        $(".user" + chat_user_id).find('.chat_number').hide();
                        $('.rightSideChatContent').removeClass('loader');
                    },
                    handleError: function() {
                        $('.rightSideChatContent').removeClass('loader');
                    },
                    handleErrorMessages: function() {
                        $.each(datas['errors'], function(index, html) {
                            $('.rightSideChatContent').removeClass('loader');
                            show_message(html, 'error');
                        });


                    }
                };
                const ajaxOptions = {
                    url: "{{ route(routeNamePrefix() . 'messages.getUserChatMessage') }}",
                    method: 'post',
                    data: formData
                };
                makeAjaxRequest(ajaxOptions, attributes);

            }

            //For Group History Message
            function getGroupHistoryMessage(groupID) {
                const formData = new FormData();
                formData.append('group_id', groupID);
                formData.append('chat_type', 'group_chat');

                $('.rightSideChatContent').addClass('loader');
                const attributes = {
                    hasButton: false,
                    handleSuccess: function() {
                        $old_group_id = groupID;
                        var roomId = "{{ Auth::user()->id }}";
                        // connect group
                        let init_var = {
                            type: 'group',
                            group_id: groupID,
                            authId: "{{ Auth::user()->id }}",
                            user: "{{ Auth::user()->name }}"
                        }
                        $socket.emit('group_connect', init_var);
                        // connect user's seperate room
                        var inputData = {
                            user: "{{ Auth::user()->name }}",
                            id: "{{ Auth::user()->id }}"
                        };
                        $socket.emit('user_group_connect', inputData);

                        $(".rightSideChatContent").html(datas['data']);
                        $(".rightSideChatContent").attr('chat-group-id', groupID);
                        scrollToBottom();
                        $(".group" + groupID).find('.chat_number').text(0);
                        $(".group" + groupID).find('.chat_number').hide();
                        $('.rightSideChatContent').removeClass('loader');
                    },
                    handleError: function() {
                        $('.rightSideChatContent').removeClass('loader');
                    },
                    handleErrorMessages: function() {
                        $.each(datas['errors'], function(index, html) {
                            $('.rightSideChatContent').removeClass('loader');
                            show_message(html, 'error');
                        });


                    }
                };
                const ajaxOptions = {
                    url: "{{ route(routeNamePrefix() . 'messages.getUserChatMessage') }}",
                    method: 'post',
                    data: formData
                };
                makeAjaxRequest(ajaxOptions, attributes);

            }


            // For loading private Users
            function loadPrivateUsers() {
                const formData = new FormData();
                formData.append('requestType', 'private');

                $('.privateUsersSection').addClass('loader');
                const attributes = {
                    hasButton: false,
                    handleSuccess: function() {
                        $(".privateUsersSection").html(datas['data']);
                        $('.privateUsersSection').removeClass('loader');
                    },
                    handleError: function() {
                        $('.privateUsersSection').removeClass('loader');
                    },
                    handleErrorMessages: function() {
                        $.each(datas['errors'], function(index, html) {
                            $('.privateUsersSection').removeClass('loader');
                            show_message(html, 'error');
                        });


                    }
                };
                const ajaxOptions = {
                    url: "{{ route(routeNamePrefix() . 'messages.index') }}",
                    method: 'post',
                    data: formData
                };
                makeAjaxRequest(ajaxOptions, attributes);

            }



            function getSinglePrivateMessage(recordId) {
                const formData = new FormData();
                formData.append('record_id', recordId);
                formData.append('chat_type', 'private');
                const attributes = {
                    hasButton: false,
                    handleSuccess: function() {

                        $(".rightSideChatContent").find('.row').append(datas['data']);
                        scrollToBottom();
                        $("textarea[name = private_input_message]").val("");
                        $('.privateMessageSendBtn').prop('disabled', false);
                        $('.privateMessageSendBtn').html('<i class=" icon-send_msg icon-24 "></i>');
                        $('.uploadDcoumentsModalSubmitBtn').prop('disabled', false);
                        $('.uploadDcoumentsModalSubmitBtn').html('Send');
                        $('#uploadDocumentModal').modal('hide');
                    },
                    handleError: function() {
                        // $('.rightSideChatContent').removeClass('loader');
                    },
                    handleErrorMessages: function() {
                        $.each(datas['errors'], function(index, html) {
                            // $('.rightSideChatContent').removeClass('loader');
                            show_message(html, 'error');
                        });

                    }
                };
                const ajaxOptions = {
                    url: "{{ route(routeNamePrefix() . 'messages.getUserChatMessage') }}",
                    method: 'post',
                    data: formData
                };
                makeAjaxRequest(ajaxOptions, attributes);
            }
            $socket.on('updateUserMessage', function(msg) {
                console.log("msg")
                console.log(msg)
                if (msg.record_id) {
                    getSinglePrivateMessage(msg.record_id);

                }

            })
            $socket.on('receiveMessage', function(msg) {
                console.log("msg");
                console.log(msg);
                console.log($('.privateMessageSendBtn').attr('data-user-id'))
                var chat_user_id = parseInt($('.privateMessageSendBtn').attr('data-user-id'));
                if (typeof msg.chatfriendid !== 'undefined' && msg.chatuserid == chat_user_id) {
                    let lastMessage;
                    if(msg.message_type=="custom"){
                        lastMessage = msg.custom_title;
                    }else{
                        lastMessage = msg.msg;
                    }
                    $(".user" + msg.chatuserid).find('.lastMessageText').text(lastMessage);
                    $(".user" + msg.chatuserid).find('.lastMessageTime').text('Just Now');
                    getSinglePrivateMessage(msg.record_id);
                } else {
                    loadPrivateUsers();
                }

            })

            function userTyping() {

                var chat_user_id = parseInt($('.privateMessageSendBtn').attr('data-user-id'));
                if (chat_user_id != 0 && chat_user_id != '' && chat_user_id != undefined) {
                    var roomId = chat_user_id + '_' + "{{ Auth::user()->id }}";
                    var userName = "{{ Auth::user()->name }}";
                    var inputData = {
                        receiver_id: chat_user_id,
                        sender_id: "{{ Auth::user()->id }}",
                        id: roomId,
                        user: userName,
                        status: 'yes'
                    };
                    $socket.emit('show_is_typing', inputData);

                }

            }

            $socket.on('chat_typing', function(msg) {

                var chat_user_id = parseInt($('.privateMessageSendBtn').attr('data-user-id'));
                console.log("chat_user_id " + chat_user_id)
                console.log("chat_friendid " + msg.chatfriendid)
                if (typeof msg.chatfriendid !== 'undefined' && msg.chatfriendid == chat_user_id && msg
                    .status == 'yes') {
                    $('.chat_massage_card').find('.typingText').toggle();
                    $(".user" + msg.chatfriendid).find('.typingText').toggle();
                    setTimeout(function() {
                        $('.chat_massage_card').find('.typingText').toggle();
                        $(".user" + msg.chatfriendid).find('.typingText').toggle();
                    }, 1000);

                } else {
                    $(".user" + msg.chatfriendid).find('.typingText').toggle();
                    setTimeout(function() {
                        $(".user" + msg.chatfriendid).find('.typingText').toggle();
                    }, 1000);
                }
            });

            function showRemoveTypingBox($action) {
                console.log(typeof($("#chat_list_ul").find('.userTypingText').html()));
                if ($action == 'show') {
                    if (typeof($("#chat_list_ul").find('.userTypingText').html()) != 'undefined') {
                        $("#chat_list_ul").find('.userTypingText').remove();
                        $('<span class="d-flex flex-column mb-5 align-items-end userTypingText">Typing...</span>')
                            .insertAfter($("#chat_list_ul").find('.userChatBox').last());
                    } else {
                        $('<span class="d-flex flex-column mb-5 align-items-end userTypingText">Typing...</span>')
                            .insertAfter($("#chat_list_ul").find('.userChatBox').last());
                    }
                } else {
                    $("#chat_list_ul").find('.userTypingText').remove();

                }
            }

            $(document).on('keyup', 'textarea[name = private_input_message]', function() {
                $element = $("textarea[name = private_input_message]").val();

                if (event.keyCode === 13 && !event.shiftKey) {
                    $('.privateMessageSendBtn').prop('disabled', true);
                    $('.privateMessageSendBtn').html(
                        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> '
                    );
                    sendChatMessage();
                } else {
                    userTyping();
                }
            });
            $(document).on('click', '.privateMessageSendBtn', function() {
                $(this).prop('disabled', true);
                $(this).html(
                    '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> '
                );
                sendChatMessage();

            });

            function sendChatMessage(is_upload = 0, messageUpload = "") {
                var message = $("textarea[name = private_input_message]").val();

                if (message != '' && message != null && message != undefined) {
                    if (messageUpload != '') {
                        message = messageUpload;
                    }
                    requestData = {
                        chatfriend_id: $(".privateMessageSendBtn").attr("data-user-id"),
                        userid: "{{ Auth::user()->id }}",
                        profile_image: '',
                        attachment: '',
                        attachment_url: '',
                        msg: message,
                        is_upload: is_upload,
                        message_type: 'chat'
                    }
                    $socket.emit('msg', requestData)

                }
            }


            $(document).on('click', '.createGroupBtn', function(e) {
                e.preventDefault();
                $btnName = $(this).text();
                $(this).prop('disabled', true);
                $(this).html(
                    '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
                    $btnName);
                const that = this;

                var formData = new FormData($('#createNewGroupForm')[0]);
                const attributes = {
                    hasButton: true,
                    btnSelector: '.createGroupBtn',
                    btnText: $btnName,
                    handleSuccess: function() {
                        localStorage.setItem('flashMessage', datas['msg']);
                        window.location.reload();
                    }
                };
                const ajaxOptions = {
                    url: "{{ route(routeNamePrefix() . 'messages.createGroup') }}",
                    method: 'post',
                    data: formData
                };

                makeAjaxRequest(ajaxOptions, attributes);

            });


            $(document).on('click', '.updateGroupBtn', function(e) {
                e.preventDefault();
                $btnName = $(this).text();
                $groupId = $(this).attr('data-id');
                if ($groupId) {

                    $(this).prop('disabled', true);
                    $(this).html(
                        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
                        $btnName);
                    const that = this;

                    var formData = new FormData($('#updateGroupForm')[0]);
                    const attributes = {
                        hasButton: true,
                        btnSelector: '.updateGroupBtn',
                        btnText: $btnName,
                        handleSuccess: function() {
                            localStorage.setItem('flashMessage', datas['msg']);
                            window.location.reload();
                        }
                    };
                    let url = "{{ route(routeNamePrefix() . 'messages.updateGroup', ':groupId') }}";
                    url = url.replace(':groupId', $groupId);
                    const ajaxOptions = {
                        url: url,
                        method: 'post',
                        data: formData
                    };

                    makeAjaxRequest(ajaxOptions, attributes);
                }

            });


            $(document).on('click', '.mutePrivateChatBtn', function() {
                $chatUserId = $(this).attr('data-id');
                $actionVal = $(this).attr('data-val');
                let url = "{{ route(routeNamePrefix() . 'messages.mutePrivateChat', ':chatUserId') }}";
                url = url.replace(':chatUserId', $chatUserId);
                window.location.href = url + "?action_val=" + $actionVal;
            });

            $(document).on('click', '.deletePrivateChatBtn', function(e) {
                e.preventDefault();
                $chatUserId = $(this).attr('data-id');
                $chatUserName = $(this).attr('data-name');

                show_message3("You are attempting to delete Chat?",
                    'confirm', {
                        confirmMessage: "Are you sure?",
                        confirmBtnText: "Delete",
                        confirmSecondaryMessage: "Delete" + ' ' + $chatUserName + "'s Chat",
                        callback: function() {
                            let url =
                                "{{ route(routeNamePrefix() . 'messages.deletePrivateChat', ':chatUserId') }}";
                            url = url.replace(':chatUserId', $chatUserId);
                            window.location.href = url;
                        }
                    });
            });

            $(document).on('click', '.privateDocumentSelectBtn', function() {
                $('#uploadDocumentModal').modal('show');
                $('#uploadDocumentModal').attr('data-current-action', 'messages_attachment');
                $('#uploadDocumentModal').attr('data-chat-type', 'private');

            });



            // For loading private Users
            function loadGroupUsers() {
                const formData = new FormData();
                formData.append('requestType', 'group');

                $('.groupUsersSection').addClass('loader');
                const attributes = {
                    hasButton: false,
                    handleSuccess: function() {
                        $(".groupUsersSection").html(datas['data']);
                        $('.groupUsersSection').removeClass('loader');
                    },
                    handleError: function() {
                        $('.groupUsersSection').removeClass('loader');
                    },
                    handleErrorMessages: function() {
                        $.each(datas['errors'], function(index, html) {
                            $('.groupUsersSection').removeClass('loader');
                            show_message(html, 'error');
                        });


                    }
                };
                const ajaxOptions = {
                    url: "{{ route(routeNamePrefix() . 'messages.index') }}",
                    method: 'post',
                    data: formData
                };
                makeAjaxRequest(ajaxOptions, attributes);

            }

            $(document).on('keyup', 'textarea[name = group_input_message]', function() {
                $element = $("textarea[name = group_input_message]").val();

                if (event.keyCode === 13 && !event.shiftKey) {
                    $('.groupMessageSendBtn').prop('disabled', true);
                    $('.groupMessageSendBtn').html(
                        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> '
                    );
                    sendGroupChatMessage();
                } else {
                    // userTyping();
                }
            });
            $(document).on('click', '.groupMessageSendBtn', function() {
                $(this).prop('disabled', true);
                $(this).html(
                    '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> '
                );
                sendGroupChatMessage();

            });

            function sendGroupChatMessage(is_upload = 0, messageUpload = "") {
                var message = $("textarea[name = group_input_message]").val();

                if (message != '' && message != null && message != undefined) {
                    if (messageUpload != '') {
                        message = messageUpload;
                    }
                    requestData = {
                        group_id: $(".groupMessageSendBtn").attr("data-user-id"),
                        userid: "{{ Auth::user()->id }}",
                        attachment: '',
                        attachment_url: '',
                        msg: message,
                        is_upload: is_upload,
                        user: "{{ Auth::user()->name }}",
                        message_type: 'chat'
                    }
                    $socket.emit('group_messaging', requestData)

                }
            }

            function getSingleGroupMessage(recordId, groupId) {
                const formData = new FormData();
                formData.append('record_id', recordId);
                formData.append('group_id', groupId);
                formData.append('chat_type', 'group_chat');
                const attributes = {
                    hasButton: false,
                    handleSuccess: function() {

                        $(".rightSideChatContent").find('.row').append(datas['data']);
                        scrollToBottom();
                        $("textarea[name = group_input_message]").val("");
                        $('.groupMessageSendBtn').prop('disabled', false);
                        $('.groupMessageSendBtn').html('<i class=" icon-send_msg icon-24 "></i>');
                        $('.uploadDcoumentsModalSubmitBtn').prop('disabled', false);
                        $('.uploadDcoumentsModalSubmitBtn').html('Send');
                        $('#uploadDocumentModal').modal('hide');
                    },
                    handleError: function() {
                        // $('.rightSideChatContent').removeClass('loader');
                    },
                    handleErrorMessages: function() {
                        $.each(datas['errors'], function(index, html) {
                            // $('.rightSideChatContent').removeClass('loader');
                            show_message(html, 'error');
                        });

                    }
                };
                const ajaxOptions = {
                    url: "{{ route(routeNamePrefix() . 'messages.getUserChatMessage') }}",
                    method: 'post',
                    data: formData
                };
                makeAjaxRequest(ajaxOptions, attributes);
            }
            $socket.on('receiveGroupMessage', function(msg) {
                if (msg.record_id) {
                    getSingleGroupMessage(msg.record_id, msg.group_id);

                }

            })
            $socket.on('user_group_message_receive', function(msg) {

                var chat_user_id = parseInt($('.groupMessageSendBtn').attr('data-user-id'));
                if (typeof msg.group_id !== 'undefined' && msg.group_id == chat_user_id) {
                    // $(".group"+msg.chatuserid).find('.lastMessageText').text(msg.msg);
                    // $(".group"+msg.chatuserid).find('.lastMessageTime').text('Just Now');
                    getSingleGroupMessage(msg.record_id, msg.group_id);
                } else {
                    loadGroupUsers();
                }

            });

            $(document).on('click', '.muteGroupChatBtn', function() {
                $chatUserId = $(this).attr('data-id');
                $actionVal = $(this).attr('data-val');
                let url = "{{ route(routeNamePrefix() . 'messages.muteGroupChat', ':chatUserId') }}";
                url = url.replace(':chatUserId', $chatUserId);
                window.location.href = url + "?action_val=" + $actionVal;
            });

            $(document).on('click', '.leaveGroupBtn', function(e) {
                e.preventDefault();
                $chatUserId = $(this).attr('data-id');
                $chatUserName = $(this).attr('data-name');

                show_message3("You are attempting to Leave Group?",
                    'confirm', {
                        confirmMessage: "Are you sure?",
                        confirmBtnText: "Leave",
                        confirmSecondaryMessage: "Leaving" + ' ' + $chatUserName + " Group",
                        callback: function() {
                            let url =
                                "{{ route(routeNamePrefix() . 'messages.leaveGroup', ':chatUserId') }}";
                            url = url.replace(':chatUserId', $chatUserId);
                            window.location.href = url;
                        }
                    });
            });
            $(document).on('click', '.deleteGroupBtn', function(e) {
                e.preventDefault();
                $chatUserId = $(this).attr('data-id');
                $chatUserName = $(this).attr('data-name');

                show_message3("You are attempting to Delete Group?",
                    'confirm', {
                        confirmMessage: "Are you sure?",
                        confirmBtnText: "Delete",
                        confirmSecondaryMessage: "Delete" + ' ' + $chatUserName + " Group",
                        callback: function() {
                            let url =
                                "{{ route(routeNamePrefix() . 'messages.deleteGroup', ':chatUserId') }}";
                            url = url.replace(':chatUserId', $chatUserId);
                            window.location.href = url;
                        }
                    });
            });

            $(document).on('click', '.groupDocumentSelectBtn', function() {
                $('.form_file').hide();
                $('#uploadDocumentModal').modal('show');
                $('#uploadDocumentModal').attr('data-current-action', 'messages_attachment');
                $('#uploadDocumentModal').attr('data-chat-type', 'group');

            });

            $(document).on('click', '.viewGroupDetails', function() {
                $groupId = $('.groupMessageSendBtn').attr('data-user-id');
                if ($groupId) {

                    const attributes = {
                        hasButton: false,
                        handleSuccess: function() {
                            $('.rightSideChatContent').html(datas['data']);

                        },
                        handleError: function() {
                            // $('.rightSideChatContent').removeClass('loader');
                        },
                        handleErrorMessages: function() {
                            $.each(datas['errors'], function(index, html) {
                                // $('.rightSideChatContent').removeClass('loader');
                                show_message(html, 'error');
                            });

                        }
                    };
                    let url = "{{ route(routeNamePrefix() . 'messages.loadGroupDetails', ':groupId') }}";
                    url = url.replace(':groupId', $groupId);
                    const ajaxOptions = {
                        url: url + "?type=all",
                        method: 'get',
                        data: {}
                    };
                    makeAjaxRequest(ajaxOptions, attributes);
                }
            });

            $(document).on('click', '.editGroupBtn', function() {
                $groupId = $(this).attr('data-id');
                if ($groupId) {
                    $('.createEditGroupData').addClass('loader');
                    $('#editGroupModal').modal('show');

                    const attributes = {
                        hasButton: false,
                        handleSuccess: function() {
                            $('.createEditGroupData').html(datas['data']);
                            $('.createEditGroupData').removeClass('loader');
                        },
                        handleError: function() {
                            // $('.rightSideChatContent').removeClass('loader');
                        },
                        handleErrorMessages: function() {
                            $.each(datas['errors'], function(index, html) {
                                // $('.rightSideChatContent').removeClass('loader');
                                show_message(html, 'error');
                            });

                        }
                    };
                    let url = "{{ route(routeNamePrefix() . 'messages.loadEditGroupView', ':groupId') }}";
                    url = url.replace(':groupId', $groupId);
                    const ajaxOptions = {
                        url: url,
                        method: 'get',
                        data: {}
                    };
                    makeAjaxRequest(ajaxOptions, attributes);
                }
            });

            $(document).on('change', 'input[name=group_image]', function() {

                $('.rightSideChatContent').find('.image-container').addClass('loader');
                $groupId = $('.rightSideChatContent').attr('chat-group-id');
                if ($groupId) {

                    var formData = new FormData();
                    const that = this;
                    if (this.files && this.files[0]) {
                        formData.append('group_image', this.files[0]);
                    }
                    const attributes = {
                        hasButton: false,
                        handleSuccess: function() {
                            $('.rightSideChatContent').find('.image-container').removeClass(
                                'loader');
                            updateImage(that, 'image');
                        }
                    };
                    let url = "{{ route(routeNamePrefix() . 'messages.uploadGroupImage', ':groupId') }}";
                    url = url.replace(':groupId', $groupId);
                    const ajaxOptions = {
                        url: url,
                        method: 'post',
                        data: formData
                    };

                    makeAjaxRequest(ajaxOptions, attributes);
                }


            });
        });
    </script>
@endpush
@endsection
