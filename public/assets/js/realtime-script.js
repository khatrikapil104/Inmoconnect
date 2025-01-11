// Pusher Related Script
const channel = pusher.subscribe('user_notification_'+$loggedInUserId);

channel.bind('user_notification_event_'+$loggedInUserId, function(data) {
    if($('.notificationRow') && $('.notificationRow').length > 0 ){

        $('.notificationContainer').prepend(data.data ?? '');
        $('.notificationCounter').text(data.notificationsCount ?? '');
    }else{
        $('.notificationContainer').html(data.data ?? '');
        $('.notificationCounter').text(data.notificationsCount ?? '');
    }
    
});

const channel2 = pusher.subscribe('user_request_'+$loggedInUserId);

channel2.bind('user_request_event_'+$loggedInUserId, function(data) {
    if($('.requestRow') && $('.requestRow').length > 0 ){

        $('.requestContainer').prepend(data.data ?? '');
        $('.requestCounter').text(data.requestsCount ?? '');
    }else{
        $('.requestContainer').html(data.data ?? '');
        $('.requestCounter').text(data.requestsCount ?? '');
    }
    
});

// Socket Related Script

console.log('connecting')
$socket.on('connect', function () {
    console.log('broadcast')
    $socket.emit('broadcast_online_user',{id:$loggedInUserId});
});