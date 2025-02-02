<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\User;
use App\Notifications\NoticeNotification;
use Illuminate\Support\Facades\Notification;

class NoticeController extends Controller
{
    public function index()
{
    $notices = Notice::all();

    // Remove the first return as it's causing unreachable code
    return view('admin.notice', compact('notices'));
}

    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'message' => 'required|string',
            'media' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,avi,mov|max:20480'
        ]);

        $mediaPath = null;
        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('notices', 'public');
        }

        $notice = Notice::create([
            'header' => $request->header,
            'message' => $request->message,
            'media' => $mediaPath
        ]);

        // Fetch all users
        $users = User::all(); 
         
        // Send notification
        Notification::send($users, new NoticeNotification($notice));

        $notices = Notice::all();
        return redirect()->route('notice')->with('success', 'Notification Sent Successfully!');
    }

     // ✏️ Edit Notice
     public function edit($id) {
        $notice = Notice::findOrFail($id);
        return view('admin.edit_notice', compact('notice'));
    }

    // 🔄 Update Notice
    public function update(Request $request, $id) 
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'message' => 'required|string',
            'media' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,avi,mov|max:20480'
        ]);

        $notice = Notice::findOrFail($id);

        // Media update (optional)
        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('notices', 'public');
            $notice->media = $mediaPath;
        }

        $notice->header = $request->header;
        $notice->message = $request->message;
        $notice->save();

        // Send updated notification to users
        $users = User::all();
        Notification::send($users, new NoticeNotification($notice));

        return redirect()->route('notice')->with('success', 'Notice Updated Successfully!');
    }

    // 🗑️ Delete Notice
    public function destroy($id) 
    {
        $notice = Notice::findOrFail($id);

        // Delete related notifications
        $notice->notifications()->delete();

        $notice->delete();
        return redirect()->route('notice');
    }
}

