<?php

namespace App\Http\Controllers;

use App\Image;
use App\Album;
use App\Repositories\Images;
use App\Repositories\Albums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('backend.website.galleries.index', with([
            'images' => $this->images->all()
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Albums $albums)
    {
        $albums = $albums->toArray();
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
            'album' => 'required'
        ]);

        $image = Image::upload($request);

        Album::find($request->album)
            ->images()
            ->save($image);

        $this->flash('Image is successfully uploaded!');

        return redirect()->route('images.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        // Delete from the filesystem
        Storage::disk('uploads')->delete($image->file_name);

        // Delete from the database
        $image->delete();

        $this->flash('Images are successfully deleted!');

        return back();
    }
}
