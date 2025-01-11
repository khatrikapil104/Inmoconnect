$(document).on('click','.deleteSavedSearchBtn', function (e) {
    e.preventDefault();
    var name = $(this).data('name');

    var id = $(this).data('id');
   show_message3(savedSearchDeleteConfirmText+ ' "'+ name+'"',
        'confirm', {
            confirmMessage: areYouSureTextConfirmPopup,
            confirmBtnText: removeTextConfirmPopup,
            confirmSecondaryMessage: removeTextConfirmPopup+' '+ name,
            callback: function () {
                window.location.href = savedSearchDeleteUrl.replace(':id',id);
            }
        });
});

$(document).on('click','.isNotifiableCheckbox',function(){
    var id = $(this).data('id');
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            show_message(datas['msg'], 'success');
        }
    };
    const ajaxOptions = {
        url: isNotificableUpdateUrl.replace(':id',id),
        method: 'get',
        data: {}
    };

    makeAjaxRequest(ajaxOptions, attributes);
    
});
$(document).on('click','.tab-link',function(){
    var tab = $(this).data('tab');
    if(tab == 'tab-1'){
        $('.totalSavedSearchCount').show();
        $('.totalSavedPropertiesCount').hide();
    }else{
        $('.totalSavedSearchCount').hide();
        $('.totalSavedPropertiesCount').show();
    }
   
});