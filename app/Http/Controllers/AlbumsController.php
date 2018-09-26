<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use App\Repositories\Albums;
use App\Http\Requests\AlbumsRequest;
use App\Http\Controllers\GenericController as Controller;

class AlbumsController extends Controller
{
    protected $albums;

    public function __construct(Albums $albums)
    {
        $this->albums = $albums;

        $this->middleware('package.albums')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorizedAlbums = $this->albums->filtered()->latest()->get();
        return view('backend.website.albums.index')
                ->with([
                    'albums' => $categorizedAlbums,
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
     * @param AlbumsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumsRequest $request)
    {
        $file = $request->gallery_image;

        $album = Album::create($request->only(['name', 'description']));

        $album->addFeaturedImage($file);

        $this->flash('Album is created successfully!');

        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album = null)
    {
        if ($album){
            $images = $album->images;
        } else {
            $images = Image::doesntHave('album')->get();
            $album =  Album::default();
        }

        return view('backend.website.albums.show', compact('images', 'album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        $featuredImage = optional($album->featuredImage())->urlCache('gallery');

        $featuredImageName = optional($album->featuredImage())->name;

        return view('backend.website.albums.edit', compact('album', 'featuredImage', 'featuredImageName'));
    }

    public function update(AlbumsRequest $request, Album $album)
    {
        $file = $request->gallery_image;

        $album->update($request->only(['name', 'description']));

        $album->addFeaturedImage($file);

        $this->flash('Album is updated successfully!');

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->uncategorizeImages()
              ->delete();

        $this->flash('Album is deleted successfully. All the attached images have been assigned to Uncategorized album');

        return back();
    }
}
