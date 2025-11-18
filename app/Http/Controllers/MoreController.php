<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\User_Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MoreController extends Controller
{
    // home function
    public function home(){
        if(Auth::check()){
              // Fetch or create a User_Activity record for the given user
                $userActivity = User_Activity::where('user_id', Auth::user()->custom_id)->first();
                if (empty($userActivity)) {
                    $userActivity = new User_Activity();
                    $userActivity->user_id = Auth::user()->custom_id;
                    $userActivity->views = 0; // Initialize views to 0
                    $userActivity->save();
                }

                // Define a session key to track profile views for this specific user
                $sessionKey = 'profile_view_' . Auth::user()->custom_id;

                if (!session()->has($sessionKey)) {
                    // Increment the views count for the User_Activity model
                    $userActivity->views = $userActivity->views + 1;
                    $userActivity->save();
                    session()->put($sessionKey, true);
                }
             // Fetch the user with related profile and user_activity
            $user = User::with('profile', 'user_activity')->where('custom_id',  Auth::user()->custom_id)->first();

            return view('more-setting', compact('user'));

        }else{
            $user = null;
            return view('more-setting', compact('user'));
        }
        
    }
    
}
