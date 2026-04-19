<?php

namespace App\Listeners;

use App\Events\Registered;
use Illuminate\Auth\Events\Registered as EventsRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailForUserListener
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
    public function handle(EventsRegistered $event): void
    {
        Mail::send(new \App\Mail\UserRegisterMail($event->user));
    }
}
