<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Notification;
use App\Events\CrmNotificationBroadcast;
class CrmNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $message;
    public $notification;
    public $extraAttributes;

    /**
     * Create a new event instance.
     */
    public function __construct($userId,$message,$extraAttributes = [])
    {
        $this->userId = $userId;
        $this->message = $message;
        $this->extraAttributes = $extraAttributes;
        $this->notification = [
            'user_id' => $userId,
            'message' => $message,
            'action_url' => !empty($extraAttributes['action_url']) ? $extraAttributes['action_url'] : NULL ,
            'type' => !empty($extraAttributes['type']) ? $extraAttributes['type'] : NULL ,
            'reference_id' => !empty($extraAttributes['reference_id']) ?$extraAttributes['reference_id'] : NULL,
            'values' => !empty($this->extraAttributes['values']) ? $this->extraAttributes['values'] : NULL, 
        ];
        
        $notificatoinId = $this->saveNotification();

        $this->notification = array_merge($this->notification,['id' => $notificatoinId]);
        // Broadcast the notification
        broadcast(new CrmNotificationBroadcast($this->notification));
    }

    private function saveNotification()
    {
        $notification = Notification::create($this->notification);
        return $notification->id ?? 0;
    }


}
