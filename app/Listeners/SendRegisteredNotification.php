<?php

namespace App\Listeners;

use App\Events\Registered;
use App\Notifications\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRegisteredNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $event->user->notify(new UserRegistered($event->user));
    }
}
