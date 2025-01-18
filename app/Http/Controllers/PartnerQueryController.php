<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\PartnerPreference;
use App\Models\User;
use App\Models\User_Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PartnerQueryController extends Controller
{
    // 
    public function index(){
        if(Auth::check()){
            $userDetail = Profile::where('user_id', Auth::user()->custom_id)->first();
            $user = User::where('custom_id', Auth::user()->custom_id)->first();
            $partner_Query = PartnerPreference::where('user_id', Auth::user()->custom_id)->first();
            return view('partnerQuery', compact('user', 'userDetail','partner_Query'));

        }else{
            return redirect()->route('home');
        }
    }

    // Show Single user Data function
    public function showProfile($id){

        // Fetch or create a User_Activity record for the given user
        $userActivity = User_Activity::where('user_id', $id)->first();
        if (empty($userActivity)) {
            $userActivity = new User_Activity();
            $userActivity->user_id = $id;
            $userActivity->views = 0; // Initialize views to 0
            $userActivity->save();
        }

        // Define a session key to track profile views for this specific user
        $sessionKey = 'profile_view_' . $id;

        if (!session()->has($sessionKey)) {
            // Increment the views count for the User_Activity model
            $userActivity->views = $userActivity->views + 1;
            $userActivity->save();
            session()->put($sessionKey, true);
        }

        // Fetch the user with related profile and user_activity
        $user = User::with('profile', 'user_activity')->where('custom_id', $id)->first();

        return view('show_profile',compact('user'));
    }

    public function updateBasicRequeriment(Request $request, $userId){
        $requeriment = PartnerPreference::where('user_id', $userId)->first();
        if (empty($requeriment)) {
            // If no record exists, create a new instance
            $requeriment = new PartnerPreference();
            $requeriment->user_id = $userId;
        }
    
        // Update the attributes
        $requeriment->min_age = $request->min_age;
        $requeriment->max_age = $request->max_age;
        $requeriment->min_height = $request->min_height;
        $requeriment->max_height = $request->max_height;

        $requeriment->marital_status = $request->marital_status;
        $requeriment->special_case = $request->special_case;
        $requeriment->body_type = $request->body_type;
        $requeriment->weight = $request->weight;
        $requeriment->citizenship = $request->citizenship;
        $requeriment->complexion = $request->complexion;
        $requeriment->Features = $request->Features;
        $requeriment->education = $request->education;
        $requeriment->working_as = $request->working_as;
        $requeriment->income_range = $request->income_range;
        
        // Save the record
        $requeriment->save();
    
        return redirect()->back()->with('success', 'Basic Requeriment set successfully!');
    }

    public function updateLifeStyleRequeriment(Request $request, $userId){
        
        $requeriment = PartnerPreference::where('user_id', $userId)->first();
        if (empty($requeriment)) {
            // If no record exists, create a new instance
            $requeriment = new PartnerPreference();
            $requeriment->user_id = $userId;
        }
    
        // Update the attributes
        $requeriment->diet = $request->diet;
        $requeriment->drink = $request->drink;
        $requeriment->smoke = $request->smoke;
    
        // Save the record
        $requeriment->save();
    
        return redirect()->back()->with('success', 'Life Style Requeriment set successfully!');
    }

    public function updateSocialRequeriment(Request $request, $userId){
        $requeriment = PartnerPreference::where('user_id', $userId)->first();
        if (empty($requeriment)) {
            // If no record exists, create a new instance
            $requeriment = new PartnerPreference();
            $requeriment->user_id = $userId;
        }
    
        // Update the attributes
        $requeriment->religion = $request->religion;
        $requeriment->cast = $request->cast;
        $requeriment->mother_tongus = $request->mother_tongus;
        $requeriment->family_type = $request->family_type;
        $requeriment->family_status = $request->family_status;
        $requeriment->city = $request->city;
        $requeriment->state = $request->state;
        $requeriment->country = $request->country;
        $requeriment->save();
    
        return redirect()->back()->with('success', 'Other Requeriment set successfully!');
    }
}