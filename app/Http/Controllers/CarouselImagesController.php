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

        $this->middleware('auth');
        // All uploaded images
        $this->images = Image::whereNotNull('carousel_id')->oldest()->get();
    }
    public function index($carousel) {

        $mainCarouselImages = $this->images->where('carousel_id', $carousel->id);

        return view('backend.website.carousel.main')->with('images', $mainCarouselImages);
    }

    public function create() {
        return view('backend.website.carousel.create');
    }

    public function store(Request $request, Carousel $carousel) {
        $rules = [
            'image' => 'required_if:gallery_image,""|image'
        ];
        $customMessages = [
            'image.required_if' => 'Please upload a new image or use one from your existing gallery!'
        ];
        $this->validate($request, $rules, $customMessages);

        $newCarouselImage = Image::handleUpload($request);

        // add the record to the carousel
        $carousel->addImage($newCarouselImage, $request->caption);
        
        \Session::flash('success_msg', 'Image is successfully uploaded to the carousel!');
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
        
        $newCarouselImage = Image::handleUpload($request);
        if($newCarouselImage){
            // join the image record to the caption
            $updatedData += $newCarouselImage;
        }
        // update the database
        $image->update($updatedData);

        \Session::flash('success_msg', 'Updated sucessfully!');

        return back();
    }

    public function destroy(Carousel $carousel, Image $image) {

        $carousel->removeImage($image);
        
        \Session::flash('success_msg', 'Image is successfully removed from the carousel!');

        return back();
    }
}
