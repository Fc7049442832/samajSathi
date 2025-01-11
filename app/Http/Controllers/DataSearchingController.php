<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DataSearchingController extends Controller
{
    //
    public function searchPartner(Request $request){
        
        $gender = $request->looking_for;
        $minAge = $request->min_age; 
        $maxAge = $request->max_age; 
        $religion =$request->religion;


        $combinedUsers = $this->getProfiles($gender, $minAge, $maxAge, $religion);
        
        return view('index', compact('combinedUsers'));
    }

    // searching  Query Process Data Private function
    private function getProfiles($gender, $minAge, $maxAge, $religion)
{
    // Query the User model and join with the Profile model
    $profiles = User::query()
        ->join('profiles', 'users.custom_id', '=', 'profiles.user_id') // Join with Profile model using custom_id and user_id
        ->when($gender, function ($query) use ($gender) {
            $query->where('users.gender', $gender); // Apply gender condition from the User model
        })
        ->when($minAge, function ($query) use ($minAge) {
            $query->where('users.age', '>=', $minAge); // Apply age condition from the User model
        })
        ->when($maxAge, function ($query) use ($maxAge) {
            $query->where('users.age', '<=', $maxAge); // Apply age condition from the User model
        })
        ->when($religion !== 'any', function ($query) use ($religion) {
            $query->where('profiles.religion', $religion); // Apply religion condition from the Profile model
        })
        ->select('users.*', 'profiles.religion') // Select fields from both tables
        ->get();

    return $profiles;
}

}
