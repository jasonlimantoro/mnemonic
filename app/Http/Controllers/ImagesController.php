<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Carousel;

class ImagesController extends Controller
{

    public function __construct(){
        // All uploaded images
        $this->images = Image::oldest()->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleryImages = $this->images;
        return view('backend.website.galleries', compact('galleryImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.carousel.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Carousel $carousel)
    {
        $rules = [
            'image' => 'required|image'
        ];
        $this->validate($request, $rules);

        // Gathering information
        $imageRequest = $request->file('image');
        $fileName = $imageRequest->getClientOriginalName();
        $fileDestination = public_path('uploads/' . $fileName);
        
        // create an Image instance
        $img = Image::make($imageRequest);

        // applyFilter CarouselFilter
        $img->filter(new CarouselFilter())->save($fileDestination);

        // Eloquent model instance
        $carouselImage = new CarouselImage ([
            'caption' => $request->caption,
            'file_name' => $fileName,
            'url_asset' => asset('uploads/carousel/' . $fileName),
            'url_cache' => url('/imagecache/fit/' . $fileName)
        ]);

        // add the instance to the carousel
        $carousel->addImage($carouselImage);
        
        \Session::flash('success_msg', 'Image is successfully uploaded!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel, Image $image)
    {
        return view('backend.website.carousel.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel, Image $image)
    {
        return view('backend.website.carousel.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel, Image $image)
    {
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
            $fileDestination = public_path('uploads/' . $fileName);
            $url_asset = asset('uploads/' . $fileName);
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
        }
        
        // update the database
        $image->update($updatedData);
        \Session::flash('success_msg', 'Updated sucessfully!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        // Delete from the filesystem
        Storage::disk('uploads')->delete($image->file_name);

        // Delete from the database
        $image->delete();

        Session::flash('success_msg', 'Images are successfully deleted!');

        return back();
    }
}
