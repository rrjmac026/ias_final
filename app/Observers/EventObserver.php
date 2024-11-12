<?php

namespace App\Observers;

use App\Models\Event;
use App\Notifications\Notification; // Make sure to import your Notification class

class EventObserver
{
    /**
     * Handle the Event "created" event.
     */
    public function created(Event $event): void
    {
        Notification::make()
            ->title('Event Created') // Add a title or message
            ->sendToDatabase($event->user); // Fixed typo here
    }

}
