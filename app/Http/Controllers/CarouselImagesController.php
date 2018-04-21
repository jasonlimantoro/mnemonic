<?php

namespace App\Http\Controllers;
use App\Http\Controllers\GenericController as Controller;

use Illuminate\Http\Request;
use App\Filters\CarouselFilter;
use App\CarouselImage;
use App\Carousel;
use App\Image;

class CarouselImagesController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
        // All uploaded images
        $this->images = Image::where('imageable_type', Carousel::class)->oldest()->get();
    }
    public function index($carousel) {

        $images = $carousel->images()->oldest()->get();

        return view('backend.website.carousel.main', compact('images'));
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

		$image = Image::handleUpload($request)
						->addTo($carousel);

		$image->update(request(['caption']));

        $this->flash('Image is successfully uploaded to the carousel!');
        return back();
    }

    public function show(Carousel $carousel, Image $image) {
        return view('backend.website.carousel.show', compact('image')); }

    public function edit(Carousel $carousel, Image $image) {
        return view('backend.website.carousel.edit', compact('image'));
    }

    public function update(Request $request, Carousel $carousel, Image $image) {
        $rules = [
            'image' => 'image',
        ];
        $this->validate($request, $rules);

        if($carouselImage = Image::handleUpload($request)){
            $carouselImage->addTo($carousel, $image);
        }

		$image->update(request(['caption']));


        $this->flash('Updated sucessfully!');

        return back();
    }

    public function destroy(Carousel $carousel, Image $image) {

        $carousel->removeImage($image);
        
        $this->flash('Image is successfully removed from the carousel!');

        return back();
    }
}
