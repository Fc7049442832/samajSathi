<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Events\MessageSent;

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
            'receiver_id' => 'required|string',
            'message' => 'required|string',
        ]);
    
        $message = Chat::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $validated['receiver_id'],
            'message' => $validated['message'],
        ]);
    
        broadcast(new MessageSent($message));
    
        return response()->json(['success' => 'Message sent successfully!']);
    }
    

}
