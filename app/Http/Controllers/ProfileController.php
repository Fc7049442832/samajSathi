<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // user profile page data return function
    public function index()
    {   
        if(Auth::check()){
            $userDetail = Profile::where('user_id', Auth::user()->id)->first();
            $user = User::where('id', Auth::user()->id)->first();
            return view('profile', compact('user', 'userDetail'));

        }else{
            return redirect()->route('home');
        }
    }
    // User Profile about- content Update
    public function updateAboutMe(Request $request, $userId)
    {
        // Validate the input
        $request->validate([
            'about_me' => 'required|string|max:500', // Adjust max length as per your database column
        ]);

        $profile = Profile::where('user_id', $userId)->first(); // Fetch the profile associated with the user
    
        if (!$profile) {
            return redirect()->route('profile')->with('error', 'Profile not found!');  // Check if profile exists
        }
    
        $profile->about_me = $request->about_me; // Update the about_me column
        $profile->save();
    
        return redirect()->route('profile')->with('success', 'About Me updated successfully!');
    }
    // Udate user profile Basics Details
    public function updateBasicInfo(Request $request, $userId)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'age' => 'nullable|numeric',
            'dob' => 'nullable|date',
            'marital_status' => 'nullable|string|max:255',
            'citizenship' => 'nullable|string|max:255',
            'blood_group' => 'nullable|string|max:255',
            'immigration' => 'nullable|string|max:255',
            'special_case' => 'nullable|string',
            'status' => 'nullable|string|max:255',
            'body_type' => 'nullable|string|max:255',
            'height' => 'nullable|string|max:255',
            'weight' => 'nullable|string|max:255',
            'complexion' => 'nullable|string|max:255',
            'Features' => 'nullable|string|max:255',
        ]);

        // Find the user details entry by user_id
        $userDetail = Profile::where('user_id', $userId)->first();

        if (!$userDetail) {
            return response()->json(['error' => 'User details not found.'], 404);
        }

        // Check if the user exists
        $user = User::where('id', $userId)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }
        if($user->age != $validatedData['age']){
            $user->age =  $validatedData['age']; // Update the age column in the user table
            $user->save();
        } 

        // Update the age if it has changed
        if ($user->age !== $request->age) {
            $user->age = $request->age;
            $user->save();
        }

        // Update the user details
        $userDetail->dob = $validatedData['dob'] ?? $userDetail->dob;
        $userDetail->marital_status = $validatedData['marital_status'] ?? $userDetail->marital_status;
        $userDetail->citizenship = $validatedData['citizenship'] ?? $userDetail->citizenship;
        $userDetail->blood_group = $validatedData['blood_group'] ?? $userDetail->blood_group;
        $userDetail->immigration = $validatedData['immigration'] ?? $userDetail->immigration;
        $userDetail->special_case = $validatedData['special_case'] ?? $userDetail->special_case;
        $userDetail->status = $validatedData['status'] ?? $userDetail->status;
        $userDetail->body_type = $validatedData['body_type'] ?? $userDetail->body_type;
        $userDetail->height = $validatedData['height'] ?? $userDetail->height;
        $userDetail->weight = $validatedData['weight'] ?? $userDetail->weight;
        $userDetail->complexion = $validatedData['complexion'] ?? $userDetail->complexion;
        $userDetail->Features = $validatedData['Features'] ?? $userDetail->Features;

        $userDetail->save();

        return redirect()->back()->with('success', 'Basic Details updated successfully!');
    }

    // Update user profile Life Style Details 
    public function updateLifeStyle(Request $request, $userId)
    {
        $request->validate([
            'living_situation' => 'required|string|max:255',
            'house_ownership' => 'required|string|max:255',
            'diet' => 'required|string|max:255',
            'drink' => 'required|string|max:255',
            'smoke' => 'required|string|max:255',
        ]);
        $profile = Profile::where('user_id', $userId)->first(); // Fetch the profile associated with the user
        $profile->living_situation = $request->living_situation;
        $profile->house_ownership = $request->house_ownership;
        $profile->diet = $request->diet;
        $profile->drink = $request->drink;
        $profile->smoke = $request->smoke;
        $profile->save(); // Save the updated profile
    
        return redirect()->back()->with('success', 'Life Style updated successfully!');
    }
    
    // Update user profile Religious Details
    public function updateReligious(Request $request, $userId){
         // Validate the incoming request data
         $validatedData = $request->validate([
            'religion' => 'nullable|string|max:255',
            'caste' => 'nullable|string|max:255',
            'sub_caste' => 'nullable|string|max:255',
            'mother_tongus' => 'nullable|string|max:255',
            'gothra' => 'nullable|string|max:255',
        ]);
    
        // Find the user details entry by user_id
        $userDetail = Profile::where('user_id', $userId)->first();
    
        if (!$userDetail) {
            return response()->json(['error' => 'User details not found.'], 404);
        }
    
        // Update the user details
        $userDetail->religion = $validatedData['religion'] ?? $userDetail->religion;
        $userDetail->caste = $validatedData['caste'] ?? $userDetail->caste;
        $userDetail->sub_caste = $validatedData['sub_caste'] ?? $userDetail->sub_caste;
        $userDetail->mother_tongus = $validatedData['mother_tongus'] ?? $userDetail->mother_tongus;
        $userDetail->gothra = $validatedData['gothra'] ?? $userDetail->gothra;
        $userDetail->save();
        
        return redirect()->back()->with('success', 'Religious Details updated successfully!');
    }
    
    
    public function updateFamilyInfo(Request $request, $userId){
         // Validate the incoming request data
         $validatedData = $request->validate([
            'father_status' => 'nullable|string|max:255',
            'mother_status' => 'nullable|string|max:255',
            'total_sister' => 'nullable|integer|min:0',
            'total_brother' => 'nullable|integer|min:0',
            'family_type' => 'nullable|string|max:255',
            'family_values' => 'nullable|string|max:255',
            'family_status' => 'nullable|string|max:255',
            'native_place' => 'nullable|string|max:255',
        ]);
    
        // Find the user details entry by user_id
        $userDetail = Profile::where('user_id', $userId)->first();
    
        if (!$userDetail) {
            return response()->json(['error' => 'User details not found.'], 404);
        }
    
        // Update the user details
        $userDetail->update($validatedData);
    
        return response()->json(['message' => 'Basic information updated successfully.', 'data' => $userDetail]);
    }

    public function updateEducation(Request $request, $userId){
         // Validate the incoming request data
         $validatedData = $request->validate([
            'education' => 'nullable|string|max:255',
            'working_as' => 'nullable|string|max:255',
            'working_with' => 'nullable|string|max:255',
            'income' => 'nullable|string|max:255',
        ]);
    
        // Find the user details entry by user_id
        $userDetail = Profile::where('user_id', $userId)->first();
    
        if (!$userDetail) {
            return response()->json(['error' => 'User details not found.'], 404);
        }
    
        // Update the user details
        $userDetail->update($validatedData);
    
        return response()->json(['message' => 'Basic information updated successfully.', 'data' => $userDetail]);
    }

    public function updateAddress(Request $request, $userId){
        // Validate the incoming request data
        $validatedData = $request->validate([
            'country' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:10',
        ]);
    
        // Find the user details entry by user_id
        $userDetail = Profile::where('user_id', $userId)->first();
    
        if (!$userDetail) {
            return response()->json(['error' => 'User details not found.'], 404);
        }
    
        // Update the user details
        $userDetail->update($validatedData);
    
        return response()->json(['message' => 'Basic information updated successfully.', 'data' => $userDetail]); 
    }


}
