<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CarouselController extends Controller
{
    public function showCarouselForm () {
        // All uploaded images
        $images = $files = \Storage::disk('uploads')->files('/uploads/carousel');

        return view('backend.website.carousel-form', compact('images'));
    }

    public function upload(Request $request) {
        $rules = [
            'image' => 'required|image'
        ];
        $this->validate($request, $rules);

        // Gathering information
        $imageRequest = $request->file('image');
        $fileName = $imageRequest->getClientOriginalName();
        $fileDestination = public_path('uploads/carousel/' . $fileName);

        // Store it in 'uploads' disk (see app/filesystems.php)
        // $path = \Storage::disk('uploads')
        //             ->putFileAs(
        //                 'uploads/carousel', 
        //                 $imageRequest,
        //                 $fileName
        //             );
        
        $path = Image::make($imageRequest)->resize(300, 200)->save($fileDestination);

        \Session::flash('success_msg', 'Image is successfully uploaded!');
        return back();
    }
}
