<?php

namespace App\Listeners;

use App\Events\RequestedLogin;
use App\Models\User;
use App\Notifications\LoginLink;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        // TODO: test if we can do this with event->user, maybe we don't need to fetch
        $user = User::where('id', $event->user->id);
        $user->notify(new LoginLink($user));
    }
}
