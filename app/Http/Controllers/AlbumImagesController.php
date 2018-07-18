<?php

namespace App\Http\Controllers;

use App\Image;
use App\Album;
use App\Repositories\Albums;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;

class AlbumImagesController extends Controller
{
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

        $album->images()->save($image);

        $this->flash('Image is uploaded successfuly!');

        return redirect()->route('albums.show', ['album' => $album->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param Album $album
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album, Image $image)
    {
        return view('backend.website.albums.images.show', compact('image', 'album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Albums $albums
     * @param Album $album
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Albums $albums, Album $album, Image $image)
    {
		$albums = $albums->toArray();

		$basename = $image->file_name;

		$filename = pathinfo($basename, PATHINFO_FILENAME);

		$ext = pathinfo($basename, PATHINFO_EXTENSION);

        return view('backend.website.albums.images.edit', 
                compact('image', 'albums', 'album', 'filename', 'ext')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Album $album
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album, Image $image)
    {
        $request->validate([
            'file_name' => 'required',
            'album' => 'required'
        ]);

        $oldbase = $image->file_name;

        $newbase = $request->file_name . '.' . pathinfo($oldbase, PATHINFO_EXTENSION);

        $image->rename($oldbase, $newbase);

        Album::find($request->album)->images()->save($image);

		$this->flash('Image is updated successfully!');
	
        return redirect()->route('album.images.edit', ['album' => Album::find($request->album)->id, 'image' => $image->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Album $album
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Album $album, Image $image)
    {
		$image->delete();

		$this->flash('Image is successfully removed from ' . $album->name);

		return back();
    }
}
