<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\ParterPreference;
use Illuminate\Support\Facades\Auth;

class MatchingController extends Controller
{
    //
    public function index(){
        $data = User::query()
        ->join('profiles', 'users.custom_id', '=', 'profiles.user_id')
        ->select('users.*', 'profiles.*') // Include specific fields from the joined tables
        ->get()->toArray();
        

        // Filter data based on authenticated user's gender
        if (Auth::check()) {
            $authUser = Auth::user(); // Get the authenticated user

            // Filter opposite gender
            if ($authUser->gender === 'male') {
                $data = array_filter($data, function ($user) {
                    return $user['gender'] === 'female'; // Fetch only female users
                });
            } elseif ($authUser->gender === 'female') {
                $data = array_filter($data, function ($user) {
                    return $user['gender'] === 'male'; // Fetch only male users
                });
            }
        }
        $user = $userData = User::query()
        ->join('profiles', 'users.custom_id', '=', 'profiles.user_id')
        ->select('users.*', 'profiles.*') // Include specific fields from the joined tables
        ->where('users.custom_id', Auth::id()) // Ensure it retrieves data for the logged-in user
        ->first();
        return view('matching',compact('data', 'user'));
    }
}
