<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GoogleSetting;

class GoogleSettingController extends Controller
{
    //
    public function update(Request $request)
    {
        $request->validate([
            'GOOGLE_CLIENT_ID' => 'required|string',
            'GOOGLE_CLIENT_SECRET' => 'required|string',
            'GOOGLE_REDIRECT_URI' => 'required|url',
        ]);
    
        // Use updateOrCreate to ensure values are stored
        GoogleSetting::updateOrCreate(['key' => 'GOOGLE_CLIENT_ID'], ['value' => $request->GOOGLE_CLIENT_ID]);
        GoogleSetting::updateOrCreate(['key' => 'GOOGLE_CLIENT_SECRET'], ['value' => $request->GOOGLE_CLIENT_SECRET]);
        GoogleSetting::updateOrCreate(['key' => 'GOOGLE_REDIRECT_URI'], ['value' => $request->GOOGLE_REDIRECT_URI]);
    
        return redirect()->route('admin.setting')->with('success', 'Google API settings updated successfully.');
    }
    
    public function reset()
    {
        // Instead of deleting, set them to empty values to prevent errors
        GoogleSetting::whereIn('key', [
            'GOOGLE_CLIENT_ID',
            'GOOGLE_CLIENT_SECRET',
            'GOOGLE_REDIRECT_URI',
        ])->update(['value' => '']);
    
        return redirect()->route('admin.setting')->with('success', 'Google API settings reset successfully.');
    }

}
