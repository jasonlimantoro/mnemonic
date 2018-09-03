<?php

namespace App\Http\Controllers\API;

use App\Models\Image;
use App\Repositories\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Http\Resources\ImageCollection;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Images $images
     * @return ImageCollection
     */
    public function index(Images $images)
    {
		$images = $images->all();
		return new ImageCollection($images);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image $image
     * @return ImageResource
     */
    public function show(Image $image)
    {
		// ImageResource::withoutWrapping();
		return new ImageResource($image); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
