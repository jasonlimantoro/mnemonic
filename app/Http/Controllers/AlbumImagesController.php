<?php

namespace App\Http\Controllers;

use App\Image;
use App\Album;
use App\Repositories\Albums;
use Illuminate\Http\Request;
use App\Filters\GalleryFilter;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\GenericController as Controller;

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
		$albumImage = Image::handleUpload($request)
							->addTo($album);


        $this->flash('Image is uploaded successfuly!');

        return redirect()->route('albums.show', ['album' => $album->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album, Image $image)
    {
        return view('backend.website.albums.images.show', compact(['image', 'album']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Albums $albums, Album $album, Image $image)
    {
		$albums = $albums->toArray();
		$selectedAlbum = $album;
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

		$targetAlbum = Album::find($request->album);
		$targetAlbum->images()->save($image);

		$this->flash('Changed from ' . $album->name . ' to ' . $targetAlbum->name);
	
        return redirect()->route('album.images.edit', ['album' => $targetAlbum->id, 'image' => $image->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album, Image $image)
    {
		$image->delete();

		$this->flash('Image is successfully removed from ' . $album->name);

		return back();
    }
}
