<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CrmRequestBroadcast implements ShouldBroadcast
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
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
      
        return [
            new Channel('user_request_' . $this->userId),
        ];
    }
    public function broadcastAs()
    {
        return 'user_request_event_' . $this->userId;
    }

    public function broadcastWith(): array
    {
        $requests = fetchRequests(request(),['requestId' => $this->requestId, 'user_id' => $this->userId]);
        $htmlData = View("components.views.layouts.requests.request-index",['values' => $requests['data']])->render();
        return ['requestsCount' => $requests['count'],'data' =>$htmlData ];
    }
}
