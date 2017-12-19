<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Filters\CarouselFilter;

class CarouselController extends Controller
{
    public function showCarouselForm () {
        // All uploaded images
        $images = collect(\File::files(public_path('uploads/carousel')))
                    ->sortBy(function($image){
                        return $image->getcTime();
                    })
                    ->map(function($image){
                        return $image->getBaseName();
                    });

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
        
        // create an Image instance
        $img = Image::make($imageRequest);

        // applyFilter CarouselFilter
        $img->filter(new CarouselFilter())->save($fileDestination);

        \Session::flash('success_msg', 'Image is successfully uploaded!');
        return back();
    }
}
