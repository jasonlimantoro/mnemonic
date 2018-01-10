<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Intervention\Image\Facades\Image;
use App\Filters\CarouselFilter;
use App\CarouselImage;
use App\Carousel;
use App\Image;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\SplFileInfo;

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

        // Gathering information
        $newImage = $request->file('image');
        $galleryImage = $request->gallery_image;

        if ($newImage) {
            $newImageName = $newImage->getClientOriginalName();
            $uploadPath = public_path('uploads/' . $newImageName);
            $exist = Storage::disk('uploads')->exists($newImageName);
            $img = \Image::make($newImage);
            $galleryImage = $newImageName;
        }

        else {
            $galleryPath = public_path('images/' . $galleryImage);
            $img = \Image::make($galleryPath);
            $uploadPath = public_path('uploads/' . $galleryImage);
        }

        // applyFilter CarouselFilter and save it to file system
        $img->filter(new CarouselFilter())->save($uploadPath);

        // Eloquent model instance
        $carouselImage = new Image ([
            'caption' => $request->caption,
            'file_name' => $galleryImage,
            'url_asset' => asset('uploads/' . $galleryImage),
            'url_cache' => secure_url('/imagecache/gallery/' . $galleryImage)
        ]);

        // add the instance to the carousel
        $carousel->addImage($carouselImage);
        
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
