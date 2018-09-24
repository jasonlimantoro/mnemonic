<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Album;
use App\Repositories\Images;
use App\Repositories\Albums;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Http\Controllers\GenericController as Controller;

class ImagesController extends Controller
{
    public $images;

    public function __construct(Images $images)
    {
        $this->images = $images;

        $this->middleware('package.images')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = $this->images->all();
        return view('backend.website.galleries.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Albums $albums
     * @return \Illuminate\Http\Response
     */
    public function create(Albums $albums)
    {
        $albums = $albums->all()->get();
        return view('backend.website.galleries.create', compact('albums'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        $image = Image::upload($request);

        $album = Album::find($request->album_id);

        if ($request->featured === '*'){
            $album->removeFeaturedImage();
        }

        $image->update($request->only(['album_id', 'featured']));

        //$album->addImage($image, $request->only(['featured']));

        $this->flash('Image is successfully uploaded!');

        return redirect()->route('images.index');
    }


    public function edit(Image $image, Albums $albums)
    {
        //$albums = $albums->toArray();

        $albums = $albums->all()->get();

        $basename = $image->name;

        $filename = pathinfo($basename, PATHINFO_FILENAME);

        $ext = pathinfo($basename, PATHINFO_EXTENSION);

        return view('backend.website.galleries.edit',
            compact('image', 'albums', 'filename', 'ext')
        );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param ImageRequest $request
     * @param  \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $request, Image $image)
    {
        $oldbase = $image->name;

        $newbase = $request->name . '.' . pathinfo($oldbase, PATHINFO_EXTENSION);

        $image->rename($oldbase, $newbase);

        $newAlbum = Album::find($request->album_id);

        if ($request->featured === '*'){
            $newAlbum->removeFeaturedImage();
        }

        $image->update($request->only(['album_id', 'featured']));


        $this->flash('Image is updated successfully!');

        return redirect()->route('images.edit', ['image' => $image->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return view('backend.website.galleries.show', compact('image'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->deleteRecord();

        $this->flash('Images are successfully deleted!');

        return back();
    }
}
