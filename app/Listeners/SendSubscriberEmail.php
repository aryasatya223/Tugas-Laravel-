<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use Illuminate\Support\Facades\Mail;

class SendSubscriberEmail
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
    public function handle(UserSubscribed $event): void
    {
        Mail::raw('Thank u for subscribing to our newslatter',
        function ($message) use ($event) {
            $message->to($event->user->email);
            $message->subject('Thank You');
        });
    }
}
