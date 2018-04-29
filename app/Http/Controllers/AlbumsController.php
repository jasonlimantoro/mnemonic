<?php

namespace App\Http\Controllers;

use App\Album;
use App\Image;
use App\Repositories\Albums;
use App\Http\Requests\AlbumsRequest;
use App\Http\Controllers\GenericController as Controller;

class AlbumsController extends Controller
{

	protected $albums;

    public function __construct(Albums $albums) {
		$this->albums = $albums;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$categorizedAlbums = $this->albums->categorized();
        $uncategorizedAlbum = $this->albums->uncategorized(); 
        return view('backend.website.albums.index')
				->with([
					'albums' => $categorizedAlbums,
					'uncategorizedAlbum' => $uncategorizedAlbum,
				]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumsRequest $request)
    {

        $album = Album::create(request(['name', 'description']));
		if($newFeaturedImage = Image::handleUpload($request))
		{
			$album->addFeaturedImage($newFeaturedImage);
		}
        
        $this->flash('Album is created sucessfully!');

        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $images = $album->images;
        return view('backend.website.albums.show', compact(['images', 'album']));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('backend.website.albums.edit', compact('album'));
    }

    public function update(AlbumsRequest $request, Album $album)
    {

		$album->update(request(['name', 'description']));

		if($newFeaturedImage = Image::handleUpload($request))
		{
			$album->addFeaturedImage($newFeaturedImage);
		}

        $this->flash('Album is updated successfully!');

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Album $album
     * @return \Illuminate\Http\Response
     */

    public function destroy(Album $album)
    {
        // Assign the image to Uncategorized album
		$album->uncategorizeImages()
			  ->delete();

        $this->flash('Album is deleted successfully. All the attached images have been assigned to Uncategorized album');

        return back();
    }
}
