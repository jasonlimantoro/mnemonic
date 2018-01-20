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

        $imageRequest = $request->file('image');
        $imageName = $imageRequest->getClientOriginalName();
        $uploadPath = public_path('uploads/' . $imageName);

        $img = \Image::make($imageRequest);

        // applyFilter GalleryFilter and save it to file system
        $img->filter(new GalleryFilter())->save($uploadPath);

        $albumImage = new Image ([
            'file_name' => $imageName,
            'url_asset' => asset('uploads/' . $imageName),
            'url_cache' => secure_url('imagecache/gallery/' . $imageName)
        ]);
        
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
    public function show(Image $image)
    {
        $album = $image->album;
        return view('backend.website.albums.images.show', compact(['image', 'album']));
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
        return view('backend.website.albums.images.edit', 
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
