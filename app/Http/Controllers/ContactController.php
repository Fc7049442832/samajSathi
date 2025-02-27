<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'message' => 'required|string|max:500',
        ]);

        // // Send Email (Optional)
        // Mail::raw("Message from {$request->name} ({$request->email}):\n\n{$request->message}", function ($message) {
        //     $message->to('support@samajsathi.com')->subject('New Contact Inquiry');
        // });

        return back()->with('success', 'Your message has been sent. We will get back to you soon.');
    }
}
