<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\CrmNotification;
use App\Models\Notification;

class CrmNotifyUser
{
    /**
     * Create the event listener.
     */
    public function __construct(CrmNotification $event)
    {
        Notification::create($event->notification);
    }
 
    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        broadcast(new CrmNotification($event->userId, $event->notification['message'],$event->actionUrl));
    }
}
