<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    // show all notifications 
    public function index()
    {
        $user = auth()->user(); // Assuming the user is logged in
        $notifications = $user->unreadNotifications; // Unread notifications
        $count = $notifications->count(); // Count of unread notifications
    
        return view('notifications', compact('notifications', 'count'));
    }

    // mark as read notification
    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    
}
