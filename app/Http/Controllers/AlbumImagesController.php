<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Album;
use App\Repositories\Albums;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
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

        $image = Image::upload($request, false);

        if ($request->featured === '*') {
            $album->removeFeaturedImage();
        }

        $album->addImage($image, $request->only('featured'));

        $this->flash('Image is uploaded successfuly!');

        return redirect()->route('albums.show', ['album' => $album->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param Album $album
     * @param  \App\Models\Image $image
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
     * @param  \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Albums $albums, Album $album, Image $image)
    {
        $albums = $albums->toArray();

        $basename = $image->name;

        $filename = pathinfo($basename, PATHINFO_FILENAME);

        $ext = pathinfo($basename, PATHINFO_EXTENSION);

        return view('backend.website.albums.images.edit',
            compact('image', 'albums', 'album', 'filename', 'ext')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ImageRequest $request
     * @param Album $album
     * @param  \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $request, Album $album, Image $image)
    {
        $oldbase = $image->name;

        $newbase = $request->name . '.' . pathinfo($oldbase, PATHINFO_EXTENSION);

        $newImage = $image->rename($oldbase, $newbase);

        $newAlbum = Album::find($request->album);

        if ($request->featured === '*'){
            $newAlbum->removeFeaturedImage();
        }

        $album->updateImage($newImage, [
            'imageable_id' => $newAlbum->id,
            'featured' => $request->featured,
        ]);

        $this->flash('Image is updated successfully!');

        return redirect()->route('album.images.edit', ['album' => $newAlbum->id, 'image' => $image->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Album $album
     * @param  \App\Models\Image $image
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Album $album, Image $image)
    {
        $image->deleteRecord();

        $this->flash('Image is successfully deleted');

        return back();
    }
}
