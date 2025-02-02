<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Carousel_Image;
use App\Models\GoogleSetting;


class SettingController extends Controller
{
    //
   

    // setting page function
    public function settingPage()
    {
        $data = Carousel_Image::all();
        $googleSettings = [
            'client_id' => GoogleSetting::getValue('GOOGLE_CLIENT_ID'),
            'client_secret' => GoogleSetting::getValue('GOOGLE_CLIENT_SECRET'),
            'redirect_uri' => GoogleSetting::getValue('GOOGLE_REDIRECT_URI'),
        ];
    
        return view('admin.settings', compact('data', 'googleSettings'));
    }

    public function storeImages(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('carousels', 'public'); // Save image in storage/app/public/carousels
                Carousel_Image::create([
                    'image' => $path, // Save image path in database
                ]);
            }
        }

        return redirect()->route('admin.setting')->with('success', 'Images uploaded successfully!');
    }

    public function update(Request $request, $id)
    {
        $carousel = Carousel_Image::findOrFail($id);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Delete old image
            if ($carousel->image) {
                Storage::disk('public')->delete($carousel->image);
            }

            // Save new image
            $path = $request->file('image')->store('carousels', 'public');
            $carousel->update(['image' => $path]);
        }

        return redirect()->back()->with('success', 'Image updated successfully!');
    }

    public function destroy($id)
    {
        $carousel = Carousel_Image::findOrFail($id);

        // Delete image from storage
        if ($carousel->image) {
            Storage::disk('public')->delete($carousel->image);
        }

        // Delete record from database
        $carousel->delete();

        return redirect()->back()->with('success', 'Image deleted successfully!');
    }

}
