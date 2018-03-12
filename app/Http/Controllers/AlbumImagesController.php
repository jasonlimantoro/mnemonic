<?php

namespace App\Http\Controllers;

use App\Image;
use App\Album;
use App\Http\Controllers\AlbumsController;
use Illuminate\Http\Request;
use App\Filters\GalleryFilter;

class AlbumImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Album $album)
    {
        return view("backend.website.albums.images.create", compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Album $album)
    {
        $rules = [
            'image' => 'required|image'
        ];

        $this->validate($request, $rules);

        // handle the request
        $albumImage = Image::handleUpload($request);

        // add the image to the album
        $album->addImage($albumImage);

        \Session::flash('success_msg', 'Image is uploaded successfuly!');

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album, Image $image)
    {
        // $album = $image->album;
        return view('backend.website.albums.images.show', compact(['image', 'album']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album, Image $image)
    {
        $albumInstance = new AlbumsController();
        $albums = $albumInstance->albums;
        $selectedAlbum = $image->album;
        return view('backend.website.albums.images.edit', 
                compact('image', 'albums', 'selectedAlbum', 'album')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album, Image $image)
    {
        $rules = [
            'album' => 'required'
        ];
        $this->validate($request, $rules);

		// dd($album);
		$newAlbum = Album::find($request->album);
		$newAlbum->images()->save($image);

        //store status message
        \Session::flash('success_msg', 'Changed album successfully!');

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
        //
    }
}
