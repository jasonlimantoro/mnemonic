<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;

class AlbumImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('package.images')->only(['create', 'store']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Album $album
     * @return \Illuminate\Http\Response
     */
    public function create(Album $album)
    {
        return view("backend.website.albums.images.create", compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Album $album
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Album $album)
    {
        $request->validate([
            'image' => 'required|image'
        ]);

        $image = Image::upload($request);

        if ($request->featured === '*') {
            $album->removeFeaturedImage();
        }

        $album->addImage($image, $request->only('featured'));

        $this->flash('Image is uploaded successfuly!');

        return redirect()->route('albums.show', ['album' => $album->id]);

    }
}
