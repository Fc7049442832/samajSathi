<?php

namespace App\Listeners;

use App\Events\UserRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;


class SendUserRegisteredEmail
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
    public function handle(UserRegisteredEvent $event)
    {
        Mail::to($event->user->email)->send(new UserRegistered($event->user));
    }
}
