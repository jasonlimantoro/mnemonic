<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;

class CarouselImagesController extends Controller
{
    public $images;

    public function __construct(Image $images)
    {
        $this->middleware('can:read-carousel-image');
        $this->middleware('can:create-carousel-image')->only(['create', 'store']);
        $this->middleware('can:update-carousel-image')->only(['edit', 'update']);
        $this->middleware('can:delete-carousel-image')->only('destroy');

        $this->images = $images;

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

        $image = $this->images->whereName($file)->first();

        $image->update($request->only('caption'));

        $carousel->images()->save($image);

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

        $newImage = $this->images->whereName($file)->first();

        if($newImage->id !== $image->id){
            $carousel->images()->toggle([$newImage->id, $image->id]);
        }

        $newImage->update($request->only('caption'));

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
