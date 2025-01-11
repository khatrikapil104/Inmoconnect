$(document).on('click', '.inviteCustomerBtn', function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);
    const that = this;

    var formData = new FormData($('#inviteCustomerForm')[0]);
    const attributes = {
        hasButton: true,
        btnSelector: '.inviteCustomerBtn',
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem('flashMessage', datas['msg']);
            window.location.reload();
        }
    };
    const ajaxOptions = {
        url: routeUrlInviteCustomer,
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions, attributes);

});
$(document).on('click', '.editCustomerInviteBtn', function() {
    $('#editCustomerModal').find('.modal-body').addClass('loader');
    $('#editCustomerModal').modal('show');
    $id = $(this).attr('data-id');
    $name = $(this).attr('data-name');
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $('#editCustomerModal').find('#updateCustomerForm').html(datas['data']);
            $('#editCustomerModal').find('.modal-body').removeClass('loader');
            $('#editCustomerModal').find('.cancelInvitationBtn').attr('data-id', parseInt($id));
            $('#editCustomerModal').find('.cancelInvitationBtn').attr('data-name', $name);
            $('#editCustomerModal').find('.updateCustomerBtn').attr('data-id', parseInt($id));

            applyPhoneInputMask();
        },
        handleError: function() {
            $('#editCustomerModal').find('.modal-body').removeClass('loader');
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
    $('#editCustomerModal').find('#editPhone').inputmask({
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

$(document).on('click', '.updateCustomerBtn', function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $id = $(this).data('id');
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);
    const that = this;

    var formData = new FormData($('#updateCustomerForm')[0]);
    const attributes = {
        hasButton: true,
        btnSelector: '.updateCustomerBtn',
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem('flashMessage', datas['msg']);
            window.location.reload();
        }
    };
    const ajaxOptions = {
        url: routeUrlUpdateCustomer.replace(':id', $id),
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions, attributes);

});
$(document).on('click', '.viewCustomerInviteBtn', function() {
    $('#customerDetailsModal').find('.modal-body').addClass('loader');
    $('#customerDetailsModal').modal('show');
    $id = $(this).attr('data-id');
    $name = $(this).attr('data-name');
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $('#customerDetailsModal').find('#view_customer_details').html(datas['data']);
            $('#customerDetailsModal').find('.modal-body').removeClass('loader');
            // $('#editCustomerModal').find('.cancelInvitationBtn').attr('data-id', parseInt($id));
            // $('#editCustomerModal').find('.cancelInvitationBtn').attr('data-name', $name);
            $('#customerDetailsModal').find('.viewCustomerInviteBtn').attr('data-id', parseInt($id));
        },
        handleError: function() {
            $('#editCustomerModal').find('.modal-body').removeClass('loader');
        },
        handleErrorMessages: function() {}
    };
    var url = routeUrlLoadEditView.replace(':id', $id)
    const ajaxOptions = {
        url: url + "?type=view",
        method: 'get',
        data: {}
    };

    makeAjaxRequest(ajaxOptions, attributes);
});