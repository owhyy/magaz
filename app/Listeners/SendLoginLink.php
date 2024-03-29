<?php

namespace App\Listeners;

use App\Events\RequestedLogin;
use App\Notifications\UserRequestedLogin;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLoginLink implements ShouldQueue
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
    public function handle(RequestedLogin $event): void
    {
        $event->user->notify(new UserRequestedLogin($event->user));
    }
}
