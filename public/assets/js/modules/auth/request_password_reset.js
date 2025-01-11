$(document).on('submit','#requestPasswordResetForm',function(e){
    e.preventDefault();
    $btnName = $(this).find('.resetPasswordBtn').text();
    $(this).find('.resetPasswordBtn').prop('disabled',true);
    $(this).find('.resetPasswordBtn').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> '+$btnName);
    const that = this;
    var formData = new FormData($('#requestPasswordResetForm')[0]);
    const attributes = {hasButton : true, btnSelector : '.resetPasswordBtn',btnText : $btnName, handleSuccess : function() {
        
        localStorage.setItem('flashMessage2-msg1', datas['msg1']);
        localStorage.setItem('flashMessage2-msg2', datas['msg2']);
        localStorage.setItem('flashMessage2-msg3', datas['msg3']);
        window.location.href = datas['data'];
    } };
    const ajaxOptions = {
        url: routeUrl,
        method: 'post',
        data: formData
    };
    
    makeAjaxRequest(ajaxOptions,attributes);

});