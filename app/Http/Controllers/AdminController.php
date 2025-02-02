<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        $users = User::get();
        return view('admin.user', compact('users'));
    }
}
