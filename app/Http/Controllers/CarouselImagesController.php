<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Filters\CarouselFilter;
use App\CarouselImage;

class CarouselImagesController extends Controller
{
    public function __construct() {
        // All uploaded images
        $this->images = CarouselImage::oldest()->get();
    }
    public function index($carouselId = 1) {

        $mainCarouselImages = $this->images->where('carousel_id', $carouselId);

        return view('backend.website.carousel.main')->with('images', $mainCarouselImages);
    }

    public function upload(Request $request, $carouselId = 1) {
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

        // save to the database
        CarouselImage::create([
            'carousel_id' => $carouselId,
            'caption' => $request->caption,
            'file_name' => $fileName,
            'url_asset' => asset('uploads/carousel' . $fileName),
            'url_cache' => url('/imagecache/fit/' . $fileName)
        ]);

        \Session::flash('success_msg', 'Image is successfully uploaded!');
        return back();
    }

    public function show(CarouselImage $image) {
        return view('backend.website.carousel.show', compact('image'));
    }

    public function edit(CarouselImage $image) {
        return view('backend.website.carousel.edit', compact('image'));
    }

    public function update(Request $request, $carouselId = 1, CarouselImage $image) {
        $rules = [
            'image' => 'required|image'
        ];
        $this->validate($request, $rules);

        // Gathering information
        $imageRequest = $request->file('image');
        $fileName = $imageRequest->getClientOriginalName();
        $fileDestination = public_path('uploads/carousel/' . $fileName);
        $url_asset = asset('uploads/carousel/' . $fileName);
        $url_cache = url('/imagecache/fit/' . $fileName);

        // create an Image instance
        $img = Image::make($imageRequest);

        // applyFilter CarouselFilter
        $img->filter(new CarouselFilter())->save($fileDestination);
        
        // array of attributes that needs to be updated
        $updatedData = [
            'caption' => $request->caption,
            'file_name' => $fileName,
            'url_asset' => $url_asset,
            'url_cache' => $url_cache
        ];

        // update the database
        $image->update($updatedData);

        \Session::flash('success_msg', 'Images updated sucessfully!');

        return back();
    }

    public function destroy(CarouselImage $image) {

        // Delete the asset file
        \Storage::disk('uploads')->delete($image->url_asset);
        
        // Delete from the databse
        $image->delete();


        \Session::flash('success_msg', 'Image is successfully deleted!');

        return back();
    }
}
