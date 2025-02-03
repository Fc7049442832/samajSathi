<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\UserRegisteredEvent;
use App\Models\User;
use App\Models\Carousel_Image;
use App\Models\Feedback;
use App\Models\Profile;
use App\Models\Save_Profile;
use App\Models\User_Activity;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

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

        $feedback = Feedback::select('id','rating')->get();

        $data = Carousel_Image::get();
        
        $notifications =0 ;
        return view('index', compact('combinedUsers','data','feedback','notifications'));
       
    }

    // Browse Partner Page for data fetch from database
    public function browsePartner()
    {
        
        $combinedUsers = $this->getFilteredUsers(); // Use private function
        $combinedUsers = $this->getRandomizedData($combinedUsers); // Data sorting and
        // Pass combined data to the view
        return view('browsepartner', compact('combinedUsers'));
    }
    // Feedback form submit
    public function feedbackStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string|min:5|max:1000',
        ]);

        Feedback::create($validated);

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
    
    public function ContactStore(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'password' => 'required|min:5',
        ]);
        
        // Encrypt password before saving
        $validatedData['password'] = bcrypt($validatedData['password']);
        
        // Create new user in the database
        $user = User::create($validatedData);

         // Create associated profile for the user
         Profile::create([
            'user_id' => $user->custom_id, // Assuming 'custom_id' is the identifier
        ]);
    
        // Log the user in
        Auth::login($user);
    
        // Send email to the user
        try {
            Mail::to($user->email)->send(new WelcomeMail($user));
        } catch (\Exception $e) {
            // Log error if email sending fails
            Log::error('Email Send Error: ' . $e->getMessage());
            
            // Return error response if email sending fails
            return response()->json(['error' => 'Email sending failed!', 'message' => $e->getMessage()], 500);
        }
    
        // Redirect to home with success message
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
            if($user->role == 'admin'){

                return redirect()->route('admin.dashboard');
                }else{
                    $user = auth()->user();  // Assuming user is authenticated
                    $unreadCount = $user->unreadNotifications->count(); // Count unread notifications
                
                    // Store the count in the session
                    Session::put('notification_count', $unreadCount);
                // Redirect with success message and user data
                return redirect()->route('home')->with('success', 'Logged in successfully!')->with('user', $user);
                }
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

    // profile save function
    public function save($profileId){

        $user = Auth::user();
        if(empty($user)){
            return redirect()->back()->with('error', 'You are not logged in.');
        }

        $data = Save_Profile::where('save_profile_id', $profileId)->first();
        if(empty($data)){

        $data = new Save_Profile();
        $data->user_id = $user->custom_id;
        $data->save_profile_id = $profileId ;
        $data->save();
       
       return redirect()->back()->with('success', 'Profile saved successfully!');
       }else{
        return redirect()->back()->with('error', 'Profile already saved.');
        }
    }

    // Saved profile Index page return function 
    public function savedProfile(){
        $user_Id =Auth::user()->custom_id;

        $datas = Save_Profile::where('user_id', $user_Id)->get();      
        $profile = []; 
        // Loop through each record in $datas
        foreach ($datas as $data) {
            // Check if save_profile_id exists and retrieve related user data
            $Profiles = User::with('profile')->where('custom_id', $data->save_profile_id)->get();
            
            // Merge the retrieved user profiles into the $profile array
            $profile = array_merge($profile, $Profiles->toArray());
        }
        // Return the profile data to the view
        return view('save_profile', compact('profile')); 
    }

    // Saved profile delete function
    public function savedProfileDelete($delete){
        $user_Id =Auth::user()->custom_id;
        $data = Save_Profile::where('save_profile_id',$delete);

        if(!empty($data)){
            $data->delete();
            return redirect()->back()->with('success', 'Profile deleted successfully!');
        }else{
            return redirect()->back()->with('error', 'Profile not found.');
        }
        
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
        
            // Check if profileData exists and has 'profile_image'
            if ($profileData && !empty($profileData['profile_image'])) {
                $combinedUsers[] = array_merge($u, $profileData);
            }
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