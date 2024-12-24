<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    // User Registration Data
    public function ContactStore( Request $request ){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'password' => 'required',
        ]);
     
        $data = User::create($validatedData);
        return "Successfully";
        return response()->json(['message' => 'User created successfully', 'data' => $data]);

    }
}
