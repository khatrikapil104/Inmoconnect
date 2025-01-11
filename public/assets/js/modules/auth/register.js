$(document).on('submit', '#registerForm', function(e) {
    e.preventDefault();
    $btnName = $(this).find('.createAccountBtn').text();
    $accountVal = $(this).find('.createAccountBtn').attr('data-val');

    $(this).find('.createAccountBtn').prop('disabled', true);
    $(this).find('.createAccountBtn').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);
    const that = this;
    var formData = new FormData($('#registerForm')[0]);
    formData.append('type', $accountVal);
    const attributes = {
        hasButton: true,
        btnSelector: '.createAccountBtn',
        btnText: $btnName,
        handleSuccess: function() {
            if (datas['isInvitedCustomer']) {
                localStorage.setItem('flashMessage', datas['msg']);

                window.location.href = datas['data'];
            } else {
                localStorage.setItem('flashMessage2-msg1', datas['msg1']);
                localStorage.setItem('flashMessage2-msg2', datas['msg2']);
                window.location.href = datas['data'];
            }

        }
    };
    const ajaxOptions = {
        url: routeUrl,
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions, attributes);

});

$(document).on('click', '.registerAs', function(e) {
    if ($(this).attr('data-val') == 'agent') {
        $('.mainFormHeading').text(asAgentHeading);
        $('.socialSignIn').each(function(index, element) {
            $(element).attr('data-url', $(element).attr('data-url') + '?type=agent');
        });
    } else {
        $('.mainFormHeading').text(asDeveloperHeading);
        $('.socialSignIn').each(function(index, element) {
            $(element).attr('data-url', $(element).attr('data-url') + '?type=customer');
        });
    }
    $('.accountSelectDiv').hide();
    $('.login_form').show();
    $('.createAccountBtn').attr('data-val', $(this).attr('data-val'));

});
$(document).on('click', '.socialSignIn', function(e) {
    let url = $(this).attr('data-url');
    window.location.href = url;

});