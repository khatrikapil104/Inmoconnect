$(document).on('click','.addUserBtn',function(e){
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop('disabled',true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> '+$btnName);
    const that = this;
    var formData = new FormData($('#addUserForm')[0]);
    const attributes = {hasButton : true, btnSelector : '.addUserBtn',btnText : $btnName, handleSuccess : function() {
        
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