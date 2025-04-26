<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoreController extends Controller
{
    // home function
    public function home(){
        return view('more-setting');
    }
    
}
