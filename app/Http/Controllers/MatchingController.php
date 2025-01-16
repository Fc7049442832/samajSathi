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
    public function index(Request $req){

        $requirement = $req->requirement;

        $data = User::query()
        ->join('profiles', 'users.custom_id', '=', 'profiles.user_id')
        ->select('users.*', 'profiles.*') // Include specific fields from the joined tables
        ->get()->toArray();
        
        // Filter data based on authenticated user's gender
        if (Auth::check()) {
            $authUser = Auth::user(); // Get the authenticated user
            // Filter opposite gender
            if ($authUser->gender === 'female') {
                $data = array_filter($data, function ($user) {
                    return $user['gender'] === 'male'; // Fetch only male users 
                });
            }else if ($authUser->gender === 'male') {
                $data = array_filter($data, function ($user) {
                    return $user['gender'] === 'female'; // Fetch only female users
                });
            } 
        }

       // Reset the array keys to start from 0
        $data = array_values($data);

        if(!empty($requirement)){

            $user = $userData = User::query()
            ->join('profiles', 'users.custom_id', '=', 'profiles.user_id')
            ->select('users.*', 'profiles.*') // Include specific fields from the joined tables
            ->where('users.custom_id', Auth::id()) // Ensure it retrieves data for the logged-in user
            ->first();


        }else{
            $user = $userData = User::query()
            ->join('profiles', 'users.custom_id', '=', 'profiles.user_id')
            ->select('users.*', 'profiles.*') // Include specific fields from the joined tables
            ->where('users.custom_id', Auth::id()) // Ensure it retrieves data for the logged-in user
            ->first();

        }


         $data = $this->calculateMatchPercentage($user, $data); // Calculate match percentage for each user
            
        return view('matching',compact('data', 'user'));
    }

    //
    public function requirementMatch(Request $request){
        dd($request->all());
    }


    // Calculate the match percentage
    private function calculateMatchPercentage($data, $data2)
    {
        // Ensure $data is an array
        if ($data instanceof \Illuminate\Database\Eloquent\Model || $data instanceof \Illuminate\Support\Collection) {
            $data = $data->toArray();
        }
    
        foreach ($data2 as &$item) { // Use reference to modify the array directly
            $totalFields = count($data); // Total number of fields to compare
            $matchCount = 0; // Counter for matched fields
    
            foreach ($data as $key => $value) {
                // Case-insensitive match
                if (isset($item[$key]) && strcasecmp($item[$key], $value) === 0) {
                    $matchCount++;
                }
            }
    
            // Calculate percentage and add it to the item
            $item['match_percentage'] = round(($matchCount / $totalFields) * 100, 2);
        }
    
        // Sort $data2 by 'match_percentage' in descending order
        usort($data2, function ($a, $b) {
            return $b['match_percentage'] <=> $a['match_percentage']; // Descending order
        });
    
        return $data2;
    }
    
    
}
