$(document).on('submit','#passwordResetForm',function(e){
    e.preventDefault();
    $btnName = $(this).find('.confirmPasswordBtn').text();
    $(this).find('.confirmPasswordBtn').prop('disabled',true);
    $(this).find('.confirmPasswordBtn').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> '+$btnName);
    const that = this;
    var formData = new FormData($('#passwordResetForm')[0]);
    const attributes = {hasButton : true, btnSelector : '.confirmPasswordBtn',btnText : $btnName, handleSuccess : function() {
        localStorage.setItem('flashMessage', datas['msg']);
        
        window.location.href = datas['data'];
    } };
    const ajaxOptions = {
        url: routeUrl,
        method: 'post',
        data: formData
    };
    
    makeAjaxRequest(ajaxOptions,attributes);

});