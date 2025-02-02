<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_Activity;
use PDF;

class PdfController extends Controller
{
    // Function to generate PDF

    public function generatePdf(Request $request)
    {
         // Get all data from the request
        $data = $request->all();

         // Get the full URL path of the image
        $imagePath = public_path('storage/' . $data['profile_profile_image']);
        // If the profile image does not exist, use a default image
        if (!file_exists($imagePath)) {
            $imagePath = public_path('images/set_partner_per.jpg');
        }

        // Pass the image path to the view
        $pdf = PDF::loadView('download', ['data' => $data, 'imagePath' => $imagePath]);

        // Update user_activity table
        $user = User_Activity::where('user_id',$data['custom_id'])->first();

        if(!empty($user)){
            $sessionKey = 'download_' . $user->id;

            if (!session()->has($sessionKey)) {
                // Increment the views count for the User_Activity model
                $user->download = $user->download + 1;
                $user->save();
                session()->put($sessionKey, true);
            }
        }
        // Download the PDF file
        return $pdf->download('download.pdf');
    }
}
