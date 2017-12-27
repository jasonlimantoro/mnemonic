<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image;
use App\Filters\CarouselFilter;
use App\CarouselImage;
use App\Carousel;
use App\Image;

class CarouselImagesController extends Controller
{
    public function __construct() {
        // All uploaded images
        $this->images = Image::whereNotNull('carousel_id')->oldest()->get();
    }
    public function index($carousel) {

        $mainCarouselImages = $this->images->where('carousel_id', $carousel->id);

        return view('backend.website.carousel.main')->with('images', $mainCarouselImages);
    }

    public function create() {
        return view('backend.website.carousel.form');
    }

    public function store(Request $request, Carousel $carousel) {
        $rules = [
            'image' => 'required|image'
        ];
        $this->validate($request, $rules);

        // Gathering information
        $imageRequest = $request->file('image');
        $fileName = $imageRequest->getClientOriginalName();
        $fileDestination = public_path('uploads/' . $fileName);
        
        // create an Image instance
        $img = \Image::make($imageRequest);

        // applyFilter CarouselFilter
        $img->filter(new CarouselFilter())->save($fileDestination);

        // Eloquent model instance
        $carouselImage = new Image ([
            'caption' => $request->caption,
            'file_name' => $fileName,
            'url_asset' => asset('uploads/' . $fileName),
            'url_cache' => url('/imagecache/fit/' . $fileName)
        ]);

        // add the instance to the carousel
        $carousel->addImage($carouselImage);
        
        \Session::flash('success_msg', 'Image is successfully uploaded!');
        return back();
    }

    public function show(Carousel $carousel, Image $image) {
        return view('backend.website.carousel.show', compact('image'));
    }

    public function edit(Carousel $carousel, Image $image) {
        return view('backend.website.carousel.edit', compact('image'));
    }

    public function update(Request $request, Carousel $carousel, Image $image) {
        $rules = [
            'image' => 'image',
        ];
        $this->validate($request, $rules);

        // only caption
        $updatedData = [
            'caption' => $request->caption
        ];
        
        if ($request->hasFile('image')){
            // Gathering information
            $imageRequest = $request->file('image');
            $fileName = $imageRequest->getClientOriginalName();
            $fileDestination = public_path('uploads/carousel/' . $fileName);
            $url_asset = asset('uploads/carousel/' . $fileName);
            $url_cache = url('/imagecache/fit/' . $fileName);
    
            // create an Image instance
            $img = \Image::make($imageRequest);
    
            // applyFilter CarouselFilter
            $img->filter(new CarouselFilter())->save($fileDestination);
            
            // array of attributes that needs to be updated
            $updatedData = [
                'caption' => $request->caption,
                'file_name' => $fileName,
                'url_asset' => $url_asset,
                'url_cache' => $url_cache
            ];
        }
        
        // update the database
        $image->update($updatedData);
        \Session::flash('success_msg', 'Updated sucessfully!');

        return back();
    }

    public function destroy(Carousel $carousel, Image $image) {

        $carousel->removeImage($carousel, $image);
        
        \Session::flash('success_msg', 'Image is successfully removed from the carousel!');

        return back();
    }
}
