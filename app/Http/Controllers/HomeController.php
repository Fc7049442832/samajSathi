<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // User Registration Data
    public function ContactStore(Request $request)
    {
        // Validate the input fields
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'password' => 'required|min:8',
        ]);
    
        // Encrypt the password
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        // Create the user
        $user = User::create($validatedData);
    
        // Create a profile for the user
        Profile::create([
            'user_id' => $user->id,
        ]);
    
        // Automatically log in the user
        Auth::login($user);
    
        // Redirect with success message
        return route('home')
            ->with('success', 'User created and logged in successfully')
            ->with('user', $user);
    }
    
    public function login(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Fetch authenticated user
            $user = Auth::user();
    
            // Redirect with success message and user data
            return redirect()->route('home')->with('success', 'Logged in successfully!')->with('user', $user);
        }
    
        // Authentication failed, redirect back with an error message
        return redirect()->back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }

    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the login page with a success message
        return redirect('/')->with('success', 'Logged out successfully!');
    }
}
