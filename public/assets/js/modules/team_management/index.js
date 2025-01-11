$(document).on('click', '.inviteTeamMemberBtn', function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);
    const that = this;

    var formData = new FormData($('#inviteTeamMemberForm')[0]);
    const attributes = {
        hasButton: true,
        btnSelector: '.inviteTeamMemberBtn',
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem('flashMessage', datas['msg']);
            window.location.reload();
        }
    };
    const ajaxOptions = {
        url: routeUrlInviteTeamMember,
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions, attributes);

});
$(document).on('click', '.editTeamMemberBtn', function() {
    $('#editTeamMemberModal').find('.modal-body').addClass('loader');
    $('#editTeamMemberModal').modal('show');
    $id = $(this).attr('data-id');
    $name = $(this).attr('data-name');
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $('#editTeamMemberModal').find('#updateTeamMemberForm').html(datas['data']);
            $('#editTeamMemberModal').find('.modal-body').removeClass('loader');
            $('#editTeamMemberModal').find('.cancelInvitationBtn').attr('data-id', parseInt($id));
            $('#editTeamMemberModal').find('.cancelInvitationBtn').attr('data-name', $name);
            $('#editTeamMemberModal').find('.updateTeamMemberBtn').attr('data-id', parseInt($id));
            applyPhoneInputMask();
        },
        handleError: function() {
            $('#editTeamMemberModal').find('.modal-body').removeClass('loader');
        },
        handleErrorMessages: function() {}
    };

    const ajaxOptions = {
        url: routeUrlLoadEditView.replace(':id', $id),
        method: 'get',
        data: {}
    };

    makeAjaxRequest(ajaxOptions, attributes);
});

function applyPhoneInputMask() {
    $('#editTeamMemberModal').find('#editPhone').inputmask({
        mask: '+(9{1,2}) (999 999 999)',
        placeholder: ' '
    });
}
$(document).on('click', '.cancelInvitationBtn', function(e) {
    e.preventDefault();
    var name = $(this).data('name');
    var id = $(this).data('id');

    show_message3(cancelInviteConfirmText + " <br> " + name,
        'confirm', {
            confirmMessage: areYouSureTextConfirmPopup,
            confirmBtnText: cancelInvitationTextConfirmPopup,
            confirmSecondaryMessage: cancelInvitationTextConfirmPopup + ' ' + name,
            callback: function() {
                window.location.href = routeUrlCancelInvite.replace(':id', id);
            }
        });
});

$(document).on('click', '.updateTeamMemberBtn', function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $id = $(this).data('id');
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);
    const that = this;

    var formData = new FormData($('#updateTeamMemberForm')[0]);
    const attributes = {
        hasButton: true,
        btnSelector: '.updateTeamMemberBtn',
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem('flashMessage', datas['msg']);
            window.location.reload();
        }
    };
    const ajaxOptions = {
        url: routeUrlUpdateTeamMember.replace(':id', $id),
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions, attributes);

});