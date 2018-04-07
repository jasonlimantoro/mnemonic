<?php

namespace App\Http\Controllers;

use App\Album;
use App\Image;
use App\Filters\GalleryFilter;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorizedAlbums = $this->albums->where('name', '!=', 'Uncategorized');
        $uncategorizedAlbum = Album::where('name', 'Uncategorized')->get()->first();
        return view('backend.website.albums.main')
                    ->with(
                        [
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
        
        \Session::flash('success_msg', 'Album is created sucessfully!');

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
        
        // magic happens
        $newFeaturedImage = Image::handleUpload($request);
        // replace current featuredimage
        $album->removeFeaturedImage();
        $album->addFeaturedImage($newFeaturedImage);

        $updatedAlbum = request(['name', 'description']);
        $album->update($updatedAlbum);

        //store status message
        \Session::flash('success_msg', 'Album is updated successfully!');

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

        \Session::flash('success_msg', 'Album is deleted successfully. All the attached images have been assigned to Uncategorized album');

        return back();
    }
}
