<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GenericController as Controller;
use App\Album;
use App\Repositories\Albums;
use App\Image;
use App\Filters\GalleryFilter;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{

	public $albums;

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
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:albums,name',
            'description' => 'required'
        ];

        $this->validate($request, $rules);

        Album::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        
        $this->flash('Album is created sucessfully!');

        return back();
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required'
        ];
        $this->validate($request, $rules);
        
		if($newFeaturedImage = Image::handleUpload($request))
		{
			// replace current featuredimage
			$album->removeFeaturedImage();
			$album->addFeaturedImage($newFeaturedImage);
		}

        $album->update(request(['name', 'description']));

        //store status message
        $this->flash('Album is updated successfully!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        // Assign the image to Uncategorized album
        $album->uncategorizeImages();

        // Delete the album
        $album->delete();

        $this->flash('Album is deleted successfully. All the attached images have been assigned to Uncategorized album');

        return back();
    }
}
