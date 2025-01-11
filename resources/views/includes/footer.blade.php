@include('includes.modal')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
crossorigin="anonymous"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.5/socket.io.js"></script>

<script>
    agentSidemenuCheck = "{{requestSegment(1)}}";
    var $socket = io.connect("{{env('SOCKET_ENDPOINT')}}");

</script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
@if(!empty(auth()->user()))
<script>

$loggedInUserId =  "{{auth()->user()->id}}";
const pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
    cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
});
</script>
<script type="module" src="{{ asset('assets/js/realtime-script.js') }}"></script>
<script>
    $(document).on('click', '.uploadDcoumentsModalSubmitBtn', function(e) {
        e.preventDefault();
        var currentAction = $("#uploadDocumentModal").attr('data-current-action');
        if(currentAction && currentAction == 'project_attachment'){
            $("#uploadDocumentModalForm").attr("action", submitImportAttachmentsUrl ?? '');
            $("#uploadDocumentModalForm").submit();
        }else if(currentAction && currentAction == 'messages_attachment'){
            
            $chatType = $('#uploadDocumentModal').attr('data-chat-type');
            if ($chatType && $chatType == 'private') {
                $('.uploadDocumentsCheckbox').each(function(index, elem) {
                    if ($(elem).is(':checked')) {
                        requestData = {
                            chatfriend_id: $(".privateMessageSendBtn").attr("data-user-id"),
                            userid: "{{ Auth::user()->id }}",
                            profile_image: '',
                            attachment: $(elem).data('id'),
                            attachment_url: '',
                            msg: '',
                            is_upload: 1,
                            message_type: 'chat'
                        }
                        $socket.emit('msg', requestData)

                    }
                });

            } else {
                $('.uploadDocumentsCheckbox').each(function(index, elem) {
                    if ($(elem).is(':checked')) {
                        requestData = {
                            group_id: $(".groupMessageSendBtn").attr("data-user-id"),
                            userid: "{{ Auth::user()->id }}",
                            attachment: $(elem).data('id'),
                            attachment_url: '',
                            msg: '',
                            is_upload: 1,
                            user: "{{ Auth::user()->name }}",
                            message_type: 'chat'
                        }

                        $socket.emit('group_messaging', requestData)

                    }
                });

            }
            $(this).prop('disabled', true);
            $(this).html(
                '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
                $(this).text());
        }else{
            const formData = new FormData();
            var updateEventBtn = $('.updateEventBtn').data('id');
            $('.uploadDocumentsCheckbox').each(function(index, elem) {
                if ($(elem).is(':checked')) {       
                    formData.append('checkedDocumentsId[]', $(elem).data('id'));
                }
            });
            $(this).prop('disabled', true);
            $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $(this).text());
            $('.eventAttachmentData').addClass('loader');
            
            const attributes = {
                hasButton: true,
                btnSelector: '.uploadDcoumentsModalSubmitBtn',
                btnText: $(this).text(),
                handleSuccess: function() {
                    if (updateEventBtn != undefined) {
                        $('.editEventAttachmentData').append(datas['data']);
                        console.log('edit');
                        $('#uploadDocumentModal').modal('hide');
                        $('.editEventAttachmentData').removeClass('loader');
                    } else {                    
                        $('.eventAttachmentData').append(datas['data']);
                        $('#uploadDocumentModal').modal('hide');
                        $('.eventAttachmentData').removeClass('loader');
                    }
        
                },
                handleError: function() {
                    if (updateEventBtn != undefined) {
                        $('.editEventAttachmentData').removeClass('loader');
                    } else {
                        $('.eventAttachmentData').removeClass('loader');
                    }
                },
                handleErrorMessages: function() {
                    if (updateEventBtn != undefined) {
                        $.each(datas['errors'], function(index, html) {
                            $('.editEventAttachmentData').removeClass('loader');
                            show_message(html, 'error');
                        });
                    } else {
                        $.each(datas['errors'], function(index, html) {
                            $('.eventAttachmentData').removeClass('loader');
                            show_message(html, 'error');
                        });
                    }
                }
            };
            const ajaxOptions = {
                url: eventAttachmentUrl,
                method: 'post',
                data: formData
            };
            makeAjaxRequest(ajaxOptions, attributes);
        
        }
    
    });

</script>
@endif
<script src="{{ asset('assets/js/ajax_request.js') }}"></script>

