<?php

namespace App\Http\Controllers;

use App\Events\SendEmailToAllSubscribers;
use App\Events\SendEmailToAllSubscribersEvent;
use App\Http\Requests\StoreSubscribeFormRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function create()
    {
        return view('subscribers.subscribe');
    }

    public function store(StoreSubscribeFormRequest $request)
    {
        Subscriber::create($request->validated());
        return back()->with('message', 'successfully subscribed');
    }

    public function sendEmail()
    {
        $subscribersEmails = Subscriber::pluck('email');
        event(new SendEmailToAllSubscribersEvent($subscribersEmails));
        return back()->with('message', 'successfully sent');
    }
}
