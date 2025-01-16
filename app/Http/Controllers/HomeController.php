<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\UserRegisteredEvent;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    // Index or Home page for data fetch from database
    public function index()
    {
        $combinedUsers = $this->getFilteredUsers(); // Use private function

        if (!Auth::check()) {
        $combinedUsers = $this->getRandomUsersByGender($combinedUsers, 3); // Data sorting and randomuserBy Gender for use private function 
        }else{
            $combinedUsers = array_map(fn($key) =>  $combinedUsers[$key], array_rand( $combinedUsers, min(6, count( $combinedUsers))));
        }

        // Pass combined data to the view
         return view('index', compact('combinedUsers'));
    }
    // Browse Partner Page for data fetch from database
    public function browsePartner()
    {
        
        $combinedUsers = $this->getFilteredUsers(); // Use private function
        $combinedUsers = $this->getRandomizedData($combinedUsers); // Data sorting and
        // Pass combined data to the view
        return view('browsepartner', compact('combinedUsers'));
    }
    
    // User Registration Data store in database
    public function ContactStore(Request $request)
    {
        // Validate the input fields
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'password' => 'required|min:5',
        ]);
    
        // Encrypt the password
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        // Create the user
        $user = User::create($validatedData);
    
        // Create a profile for the user
        Profile::create([
            'user_id' => $user->custom_id,
        ]);
        
        // Trigger the event
        event(new UserRegisteredEvent($user));
        
        // Automatically log in the user
        Auth::login($user);
    
        // Redirect with success message
            return redirect()->route('home')
        ->with('success', 'User created and logged in successfully')
        ->with('user', $user);
    }
    // User Login Function 
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
    // User Logout Function
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

    // Private function to handle data processing
    private function getFilteredUsers()
    {
        // Fetch all users and profiles
        $users = User::get()->toArray(); // Convert to array for merging
        $userDetails = Profile::get()->toArray(); // Convert to array for merging

        // Combine $users and $userDetails based on 'id'
        $combinedUsers = [];
        foreach ($users as $u) {
            $profileData = collect($userDetails)->firstWhere('user_id', $u['custom_id']); // Assuming 'user_id' in Profile table
            $combinedUsers[] = array_merge($u, $profileData ?? []); // Merge user data with profile data
        }

        // Filter data based on authenticated user's gender
        if (Auth::check()) {
            $authUser = Auth::user(); // Get the authenticated user

            // Filter opposite gender
            if ($authUser->gender === 'male') {
                $combinedUsers = array_filter($combinedUsers, function ($user) {
                    return $user['gender'] === 'female'; // Fetch only female users
                });
            } elseif ($authUser->gender === 'female') {
                $combinedUsers = array_filter($combinedUsers, function ($user) {
                    return $user['gender'] === 'male'; // Fetch only male users
                });
            }
        }

        return $combinedUsers;
    }
    // Private function to handle data processing
    private function getRandomUsersByGender(array $users, $no ): array
    {
        $no ;

        // Separate users by gender
        $males = array_filter($users, fn($user) => $user['gender'] === 'male');
        $females = array_filter($users, fn($user) => $user['gender'] === 'female');

        // Randomly select up to 3 males and 3 females
        $randomMales = array_map(
            fn($key) => $males[$key],
            array_rand($males, min($no, count($males))) // Get up to 3 males
        );

        $randomFemales = array_map(
            fn($key) => $females[$key],
            array_rand($females, min($no, count($females))) // Get up to 3 females
        );

        // Combine males and females and shuffle for random order
        $combinedUsers = array_merge($randomMales, $randomFemales);
        shuffle($combinedUsers); // Shuffle if needed

        return $combinedUsers;
    }

    private function getRandomizedData(array $data, int $limit = null)
    {
        shuffle($data); // Shuffle the array
        
        if ($limit) {
            $data = array_slice($data, 0, $limit); // Limit the results if specified
        }
        
        return $data;
    }
}
