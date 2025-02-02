<?php

namespace App\Listeners;

use App\Events\userRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLoginNotification
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
    public function handle(userRegisteredEvent $event): void
    {
        //
        Mail::to($event->user->email)->send(new UserRegistered($event->user));
    }
}
