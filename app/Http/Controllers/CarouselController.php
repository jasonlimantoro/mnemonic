<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function showCarouselForm () {
        return view('backend.website.carousel-form');
    }

    public function upload(Request $request) {
        $rules = [
            'image' => 'required|image'
        ];
        $this->validate($request, $rules);

        // Gathering information
        $imageRequest = $request->file('image');
        $fileName = $imageRequest->getClientOriginalName();

        // Store it in 'uploads' disk (see app/filesystems.php)
        $path = \Storage::disk('uploads')
                    ->putFileAs(
                        'uploads', 
                        $imageRequest,
                        $fileName
                    );
        \Session::flash('success_msg', 'Image is successfully uploaded!');
        return back()->with('path', $path);
    }
}
