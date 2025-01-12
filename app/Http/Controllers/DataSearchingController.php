<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class DataSearchingController extends Controller
{
    //
    public function searchPartner(Request $request){
    
        $gender = $request->looking_for;
        $minAge = $request->min_age; 
        $maxAge = $request->max_age; 
        $religion =$request->religion;

        $combinedUsers = $this->searchDataProcess($gender, $minAge, $maxAge, $religion); // call the Private searchDataProcess function
        
        return view('index', compact('combinedUsers'));
    }
    // Data Searching Private Function
    private function searchDataProcess($gender, $minAge, $maxAge, $religion)
    {
            // Query the User model and join with the Profile model
            $searchResults = User::query()
                ->join('profiles', 'users.custom_id', '=', 'profiles.user_id')
                ->select('users.*', 'profiles.*') // Include specific fields from the joined tables
                ->get()
                ->toArray();
        
            // Filter by gender
            if (!empty($gender)) {
                $searchResults = array_filter($searchResults, function ($value) use ($gender) {
                    return $value['gender'] === $gender;
                });
            }
        
            // Filter by age range
            if (!empty($minAge) && !empty($maxAge)) {
                $searchResults = Arr::where($searchResults, function ($value) use ($minAge, $maxAge) {
                    return isset($value['age']) && $value['age'] >= $minAge && $value['age'] <= $maxAge;
                });
            }
        
            // Filter by religion
            if (!empty($religion)) {
                $searchResults = array_filter($searchResults, function ($value) use ($religion) {
                    return isset($value['religion']) && $value['religion'] === $religion;
                });
            }
        
            return $searchResults;
    }

}
