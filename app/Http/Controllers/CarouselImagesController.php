<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Filters\CarouselFilter;

class CarouselImagesController extends Controller
{
    public function index () {
        // All uploaded images
        $images = collect(\File::files(public_path('uploads/carousel')))
                    ->sortBy(function($image){
                        return $image->getcTime();
                    })
                    ->map(function($image){
                        return $image->getBaseName();
                    });

        return view('backend.website.carousel.index', compact('images'));
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

    public function destroy($image) {
        $filePath = 'uploads/carousel/' . $image;
        \Storage::disk('uploads')->delete($filePath);

        \Session::flash('success_msg', 'Image is successfully deleted!');

        return back();
    }
}
