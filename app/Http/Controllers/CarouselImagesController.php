<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;

class CarouselImagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:read-carousel-image');
        $this->middleware('can:create-carousel-image')->only(['create', 'store']);
        $this->middleware('can:update-carousel-image')->only(['edit', 'update']);
        $this->middleware('can:delete-carousel-image')->only('destroy');

    }

    public function index(Carousel $carousel)
    {
        $images = $carousel->images()->oldest('updated_at')->get();

        return view('backend.website.carousel.index', compact('images'));
    }

    public function create()
    {
        return view('backend.website.carousel.create');
    }

    public function store(Request $request, Carousel $carousel)
    {

        $file = $request->gallery_image;

        $carousel->addImage($file, $request->only('caption'));

        $this->flash('Image is successfully uploaded to the carousel!');

        return redirect()->route('carousel.images.index', ['carousel' => 1]);
    }

    public function show(Carousel $carousel, Image $image)
    {
        return view('backend.website.carousel.show', compact('image'));
    }

    public function edit(Carousel $carousel, Image $image)
    {
        return view('backend.website.carousel.edit', compact('image'));
    }

    public function update(Request $request, Carousel $carousel, Image $image)
    {
        $file = $request->gallery_image;

        $newImage = $carousel->updateImage($file, $request->only('caption'));

        $this->flash('Updated successfully!');

        return redirect()->route('carousel.images.edit', ['carousel' => 1, 'image' => $newImage->id]);
    }

    public function destroy(Carousel $carousel, Image $image)
    {

        $carousel->images()->detach($image);

        $this->flash('Image is successfully detached from the carousel!');

        return back();
    }
}
