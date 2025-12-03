<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Mail\CustomMail;
use Mail;


class MailController extends Controller
{
    //
    public function index(){
        return view("admin.mailpage");
    }

    public function writeNewMail(){
        $users = User::get();
        return view("admin.writemail" ,compact("users"));
    }
    public function send(Request $request)
    {
        // Validate basic fields
        $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'user_type' => 'required'
        ]);

        $emails = [];

        // (1) SEND TO ALL USERS
        if ($request->user_type == "all") {
            $emails = User::pluck('email')->toArray();
        }

        // (2) SEND TO SELECTED USERS (CHECKBOX)
        if ($request->user_type == "custom" && !empty($request->selected_emails)) {
            $emails = array_merge($emails, $request->selected_emails);
        }

        // (3) SINGLE CUSTOM EMAIL (OPTIONAL FIELD)
        if (!empty($request->email)) {
            $emails[] = $request->email;
        }

        // Remove duplicate emails just in case
        $emails = array_unique($emails);

        // If still no email found
        if (count($emails) == 0) {
            return back()->with('error', 'No email selected!');
        }

        // SEND MAIL TO ALL EMAILS
        foreach ($emails as $email) {
            Mail::to($email)->send(new CustomMail(
                $request->subject,
                $request->body
            ));
        }

        return back()->with('success', 'Mail sent successfully!');
    }
}
