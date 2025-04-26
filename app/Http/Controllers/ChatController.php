<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Profile;
use App\Models\User;
use App\Models\Notice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Events\MessageSent;
use Illuminate\Notifications\DatabaseNotification;

class ChatController extends Controller
{
    //
     // partner contact function
     public function partnerContact($id = null){
        if (!$id) {
            return back()->with('error', 'ID is required to contact the partner.');
        }
    
        if (!Auth::check()) {
            return back()->with('error', 'Please Login');
        }
        $user = User::with('profile')->where('custom_id', $id)->first();
        $messages = Chat::where(function ($query) use ($user) {
            $query->where('sender_id', Auth::user()->custom_id)
                  ->where('receiver_id', $user->custom_id)->latest();
        })
        ->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->custom_id)
                  ->where('receiver_id', Auth::user()->custom_id);
        })->latest()->get();
    
        return view('chat', compact('user', 'messages'));
    }

    // public function sendMessage(Request $request)
    // {
    //     $validated = $request->validate([
    //         'receiver_id' => 'required|string',
    //         'message' => 'required|string',
    //     ]);

    //     // Save the message to the database
    //     Chat::create([
    //         'sender_id' => auth()->id(),
    //         'receiver_id' => $validated['receiver_id'],
    //         'message' => $validated['message'],
    //     ]);

    //     return response()->json(['success' => 'Message sent successfully!']);
    // }


    
    
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required',
            'message' => 'required|string',
        ]);

        // Create the chat message
        $message = Chat::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $validated['receiver_id'],
            'message' => $validated['message'],
        ]);

        // Optional: Add a system notification (optional use-case)
        $senderName = auth()->user()->name;
        $header = $senderName . ' sent you a message';

        $notice = Notice::create([
            'header' => $header,
            'message' => $validated['message'],
            'media' => '',
        ]);

        // Send notification to the receiver (ensure receiver is a User model instance)
        $receiver = User::find($validated['receiver_id']); // assuming you have a User model
        return $receiver;

        if ($receiver) {
            Notification::send($receiver, new NoticeNotification($notice));
        }

        // Broadcast the event
        broadcast(new MessageSent($message))->toOthers();

        return response()->json(['success' => 'Message sent successfully!']);
    }

    

}
