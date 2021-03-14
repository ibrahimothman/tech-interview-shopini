<?php

namespace App\Listeners;

use App\Events\SendEmailToAllSubscribersEvent;
use App\Mail\BroadcastSubscribers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailToAllSubscribersListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendEmailToAllSubscribers  $event
     * @return void
     */
    public function handle(SendEmailToAllSubscribersEvent $event)
    {
        Mail::to($event->emails)->send(new BroadcastSubscribers);
    }
}
