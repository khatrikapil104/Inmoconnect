<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CrmNotificationBroadcast implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $notification;
    /**
     * Create a new event instance.
     */
    public function __construct($notification)
    {
        $this->notification = $notification;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('user_notification_' . $this->notification['user_id']),
        ];
    }
    public function broadcastAs()
    {
        return 'user_notification_event_' . $this->notification['user_id'];
    }

    public function broadcastWith(): array
    {
        $notifications = fetchNotifications(request(),$this->notification );
        $htmlData = View("components.views.layouts.notifications.notification-index",['values' => $notifications['data']])->render();
        return ['notificationsCount' => $notifications['count'],'data' =>$htmlData ];
    }
}
