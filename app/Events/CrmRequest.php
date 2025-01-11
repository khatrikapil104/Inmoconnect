<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\PendingRequest;
use App\Events\CrmNotificationBroadcast;
class CrmRequest
{ 
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $requestId;

    /**
     * Create a new event instance.
     */
    public function __construct($userId,$requestId)
    {
        $this->userId = $userId;
        $this->requestId = $requestId;
        
        // Broadcast the request
        broadcast(new CrmRequestBroadcast($this->userId,$this->requestId));
    }



}
