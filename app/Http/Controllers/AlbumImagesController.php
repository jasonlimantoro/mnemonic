<?php

namespace App\Http\Controllers;

use App\Image;
use App\Http\Controllers\AlbumsController;
use Illuminate\Http\Request;

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
    public function create()
    {
        //
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
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        $albumInstance = new AlbumsController();
        $albums = $albumInstance->albums;
        $selectedAlbum = $image->album;
        return view('backend.website.albums.edit', 
                compact('image', 'albums', 'selectedAlbum')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $rules = [
            'album' => 'required'
        ];
        $this->validate($request, $rules);

        $image->update([
            'album_id' => $request->album
        ]);

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
