<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    // Function to generate PDF

    public function generatePdf(Request $request)
    {
         // Get all data from the request
        $data = $request->all();

         // Get the full URL path of the image
        $imagePath = public_path('storage/' . $data['profile_image']);
        // If the profile image does not exist, use a default image
        if (!file_exists($imagePath)) {
            $imagePath = public_path('images/set_partner_per.jpg');
        }

        // Pass the image path to the view
        $pdf = PDF::loadView('demo', ['data' => $data, 'imagePath' => $imagePath]);

        // Download the PDF file
        return $pdf->download('demo.pdf');
    }
}
