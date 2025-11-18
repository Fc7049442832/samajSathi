<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Contact;

class AdminController extends Controller
{
    //
    public function index()
    {   if (auth()->user()->role == 'admin') {
        $user = User::with('profile')->get();
        return view('admin.index', compact('user'));
        } else {
            return redirect()->route('home');
            }
    }

    public function user(){
        $users = User::with('profile')->get();
        return view('admin.user', compact('users'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::with('profile')
            ->where('name', 'like', "%{$query}%")
            ->orWhereHas('profile', function ($q) use ($query) {
                $q->where('bio', 'like', "%{$query}%")
                ->orWhere('address', 'like', "%{$query}%");
            })
            ->get();

        return response()->json($users);
    }

    public function userProfile($id){
         $user = User::with('profile')->where('custom_id', $id)->first();
        return view('admin.userprofile', compact('user'));
    }

    public function updatePhysical(Request $request, $custom_id)
    {
        $user = User::where('custom_id', $custom_id)->firstOrFail();

        $user->profile->update([
            'body_type' => $request->body_type,
            'height' => $request->height,
            'weight' => $request->weight,
            'complexion' => $request->complexion,
            'features' => $request->features,
        ]);

        return back()->with('success', 'Physical Attributes updated successfully!');
    }

  
    public function toggleVerified($id)
    {
        $user = User::where('custom_id', $id)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        // Toggle verification status
        $user->is_verified = !$user->is_verified;
        $user->save();

        return redirect()->back()->with('success', 'Verification status updated successfully!');
    }
    
    public function updateFamily(Request $request, $id)
    {
        $user = \App\Models\User::where('custom_id', $id)->first();

        if (!$user || !$user->profile) {
            return redirect()->back()->with('error', 'User or profile not found.');
        }

        $user->profile->update([
            'father_status' => $request->father_status,
            'mother_status' => $request->mother_status,
            'total_brother' => $request->total_brother,
            'total_sister' => $request->total_sister,
            'family_type' => $request->family_type,
            'family_values' => $request->family_values,
            'family_status' => $request->family_status,
        ]);

        return redirect()->back()->with('success', 'Family information updated successfully!');
    }

    public function updateEducation(Request $request, $custom_id)
    {
        $user = User::where('custom_id', $custom_id)->firstOrFail();

        $user->profile->update([
            'education' => $request->education,
            'working_as' => $request->working_as,
            'working_with' => $request->working_with,
            'income' => $request->income,
        ]);

        return back()->with('success', 'Education & Career updated successfully!');
    }

    public function updateLocation(Request $request, $custom_id)
    {
        $user = User::where('custom_id', $custom_id)->firstOrFail();

        $user->profile->update([
            'country'      => $request->country,
            'state'        => $request->state,
            'city'         => $request->city,
            'postal_code'  => $request->postal_code,
            'native_place' => $request->native_place,
        ]);

        return back()->with('success', 'Location updated successfully!');
    }

    public function userContactAdmin(){
        $data = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.usertoadmin', compact('data') );
    }

}
