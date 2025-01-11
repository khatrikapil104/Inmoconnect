$(document).on('submit', '#loginForm', function(e) {
    e.preventDefault();
    $btnName = $(this).find('.signInBtn').text();
    $('.mainContentMsg').text('').hide();
    $(this).find('.signInBtn').prop('disabled', true);
    $(this).find('.signInBtn').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);
    const that = this;
    var formData = new FormData($('#loginForm')[0]);
    var currentSignInStep = $(this).find('.signInBtn').attr('data-current-step');
    if (currentSignInStep) {
        formData.append('current_step', currentSignInStep);
    }
    const attributes = {
        hasButton: true,
        btnSelector: '.signInBtn',
        btnText: $btnName,
        handleSuccess: function() {
            if (datas['dataNextStep']) {
                $(that).find('.signInBtn').attr('data-current-step', datas['dataNextStep']);
                $('.loginEmailField').hide();
                console.log(2112);

                $('.inmoconnect-logo-password').show();
                $('.loginPasswordField').show();
                $('.forgot-password').addClass('d-flex');
                $('.main_additional_content').addClass('d-none');
                $('.mainFormHeading').addClass('d-none');
                $('.mainFormPasswordHeading').show();
                $('.inmoconnect_white_logo').show();
                $('.company-login-logo').addClass('d-none');
                var currentImageSrc = $('.crm_sign_company img').attr('src');

                if (datas['companyImage'].length > 0) {
                    console.log(datas['companyImage']);
                    var imageUrl = datas['companyImage'];
                    $('.company_image_logo').attr('src', imageUrl);
                    $('.crm-image').show();
                }


            } else if (datas['data'] == 'developer') {
                console.log('deve');

                $('#developer_review').modal('show');
            } else {
                console.log(datas);

                localStorage.setItem('flashMessage', datas['msg']);
                window.location.href = datas['data'];
            }
        },
        handleError: function() {
            if (errorMsg != '' && errorMsg != undefined) {
                $('.mainContentMsg').text(errorMsg).show();
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


$('input').val("");
$('.form-group input').focusout(function() {
    var text_val = $(this).val();
    if (text_val === "") {
        console.log("empty!");
        $(this).removeClass('has-value');
    } else {
        $(this).addClass('has-value');
    }
});