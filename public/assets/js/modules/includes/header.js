$(document).ready(function () {
    var notificationContainer = $('.notificationContainer');
    var requestContainer = $('.requestContainer');
    var notificationPage = 2;
    var requestPage = 2;
    var isFetchingNotification = false;
    var isFetchingRequest = false;
    var lastFetchedPageRequest = 1;
    var lastFetchedPageNotification = 1;

    notificationContainer.scroll(function () {
        // Check if the user is near the bottom of the container
        if (isFetchingNotification || notificationContainer.scrollTop() + notificationContainer.innerHeight() < notificationContainer[0].scrollHeight - 100) {
            return;
        }
    
        // Check if the user has scrolled to a new page
        var currentPage = Math.ceil(notificationContainer.scrollTop() / notificationContainer.innerHeight()) + 1;
        if (currentPage > lastFetchedPageNotification) {
            // Set the flag to indicate that a request is in progress
            isFetchingNotification = true;
            // If so, fetch more notifications
            fetchNotifications();
        }
    });

    requestContainer.scroll(function () {
        // Check if the user is near the bottom of the container
        if (isFetchingRequest || requestContainer.scrollTop() + requestContainer.innerHeight() < requestContainer[0].scrollHeight - 100) {
            return;
        }
    
        // Check if the user has scrolled to a new page
        var currentPage = Math.ceil(requestContainer.scrollTop() / requestContainer.innerHeight()) + 1;
        var currentPage = Math.ceil(requestContainer.scrollTop() / requestContainer.innerHeight()) + 1;
        if (currentPage > lastFetchedPageRequest) {
            // Set the flag to indicate that a request is in progress
            isFetchingRequest = true;
            // If so, fetch more notifications
            fetchRequests();
        }
    });

    function fetchNotifications() {
        var formData = new FormData();
        formData.append('page',notificationPage);
        attributes = {hasButton : false, handleSuccess : function() {
            $('.notificationContainer').append(datas['data']);
            if(notificationPage < datas['notifications'].data.last_page){

                // Increment the page number for the next request
                notificationPage++;
    
                // Update the last fetched page
                lastFetchedPageNotification++;
    
                // Reset the flag since the request is complete
                isFetchingNotification = false;
            }
        }};
        const ajaxOptions = {
            url: routeUrlNotification,
            method: 'post',
            data: formData
        };
        makeAjaxRequest(ajaxOptions,attributes);
        
    }
    function fetchRequests() {
        var formData = new FormData();
        formData.append('page',requestPage);
        attributes = {hasButton : false, handleSuccess : function() {
            $('.requestContainer').append(datas['data']);
            if(requestPage < datas['requests'].data.last_page){

                // Increment the page number for the next request
                requestPage++;
    
                // Update the last fetched page
                lastFetchedPageRequest++;
    
                // Reset the flag since the request is complete
                isFetchingRequest = false;
            }
        }};
        const ajaxOptions = {
            url: routeUrlRequest,
            method: 'post',
            data: formData
        };
        makeAjaxRequest(ajaxOptions,attributes);
        
    }
});

$(document).on('click','.acceptRequestBtn',function(e){
    e.preventDefault();
    $requestId = $(this).attr('data-id');
    $btnName = $(this).text();
    $(this).prop('disabled',true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> '+$btnName);
    const that = this;
    var formData = new FormData();
    formData.append('request_id',$requestId);
    formData.append('action','accept');
    const attributes = {hasButton : true, btnSelector : '.acceptRequestBtn',btnText : $btnName, handleSuccess : function() {
        $(that).parents('.right-button').html('<span class="badge badge-pill badge-success text-black">'+acceptedRequestText+'</span>');
        $('.requestCounter').text(parseInt($('.requestCounter').text()) - 1);
    } };
    const ajaxOptions = {
        url: acceptRejectRequestUrl,
        method: 'post',
        data: formData
    };
    makeAjaxRequest(ajaxOptions,attributes);

});
$(document).on('click','.rejectRequestBtn',function(e){
    e.preventDefault();
    $requestId = $(this).attr('data-id');
    $btnName = $(this).text();
    $(this).prop('disabled',true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> '+$btnName);
    const that = this;
    var formData = new FormData();
    formData.append('request_id',$requestId);
    formData.append('action','reject');
    const attributes = {hasButton : true, btnSelector : '.rejectRequestBtn',btnText : $btnName, handleSuccess : function() {
        $(that).parents('.right-button').html('<span class="badge badge-pill badge-danger text-black">'+rejectedRequestText+'</span>');
        $('.requestCounter').text(parseInt($('.requestCounter').text()) - 1);
    } };
    const ajaxOptions = {
        url: acceptRejectRequestUrl,
        method: 'post',
        data: formData
    };
    makeAjaxRequest(ajaxOptions,attributes);
});

$(document).on('click','.logoutBtn',function(e){
    e.preventDefault();
    $userName = $(this).attr('data-name');
    show_message3(logoutConfirmText,
            'confirm', {
                confirmMessage: areYouSureTextConfirmPopup,
                confirmBtnText: logoutTextConfirmPopup,
                confirmSecondaryMessage: loggedInAsConfirmText+' '+ $userName,
                callback: function () {
                    $socket.emit('user_logout',{id:loggedInUserId});
                    $socket.emit('disconnect',{});
                    window.location.href = logoutUrl ;
                }
            });
});

