<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    //
    // Redirect to Google Login Page
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google Callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if the user exists in our database
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Create a new user if not found
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'age' => $googleUser->getAge(), 
                    'gender' => $googleUser->getGender(), 
                    'phone' => $googleUser->getPhoneNumber(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(uniqid()), // Generate a random password
                    'google_id' => $googleUser->getId(), // Store Google ID
                ]);
            }

            // Log in the user
            Auth::login($user);

            return redirect()->route('dashboard'); // Redirect to the dashboard
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Something went wrong!');
        }
    }


}
