
$(document).on('click','.saveBtn',function(e){
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop('disabled',true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> '+$btnName);
    const that = this;
    var formData = new FormData($('#profileForm')[0]);
    const attributes = {hasButton : true, btnSelector : '.saveBtn',btnText : $btnName, handleSuccess : function() {
        show_message(datas['msg'],'success');
    } };
    const ajaxOptions = {
        url: routeUrl,
        method: 'post',
        data: formData
    };
    
    makeAjaxRequest(ajaxOptions,attributes);

});
