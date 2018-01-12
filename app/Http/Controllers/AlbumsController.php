<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except(['showJSON']);
        $this->albums = Album::oldest()->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.website.albums.main')
                    ->with('albums', $this->albums);
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
        //
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

        $updatedAlbum = $request->all();
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

    public function showJSON() {
        return $this->albums;
    }
}
