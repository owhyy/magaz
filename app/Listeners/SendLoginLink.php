<?php

namespace App\Listeners;

use App\Events\RequestedLogin;
use App\Models\User;
use App\Notifications\UserRequestedLogin;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLoginLink implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct(private readonly User $user)
    {
    }

    /**
     * Handle the event.
     */
    public function handle(RequestedLogin $event): void
    {
        $user = $this->user->whereEmail($event->token->email);
        $user->notify(new UserRequestedLogin($user));
    }
}
