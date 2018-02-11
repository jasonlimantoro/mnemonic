<?php

namespace App\Http\Controllers;

use App\Album;
use App\Image;
use App\Filters\GalleryFilter;
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

        $newImage = $request->file('image');
        $galleryImageName = $request->gallery_image;

        if($request->hasFile('image') || $galleryImageName != ''){
            if ($newImage){
                $newImageName = $newImage->getClientOriginalName();
                $uploadPath = public_path('uploads/' . $newImageName);
                $img = \Image::make($newImage);
                $galleryImageName = $newImageName;
            }
    
            else {
                // existing images
                $galleryPath = public_path('uploads/' . $galleryImageName);
                $img = \Image::make($galleryPath);
                $uploadPath = $galleryPath;
            }
    
            // applyFilter GalleryFilter and save it to file system
            $img->filter(new GalleryFilter())->save($uploadPath);
    
            // array
            $newFeaturedImage = [
                'file_name' => $galleryImageName,
                'url_asset' => secure_asset('uploads/' . $galleryImageName),
                'url_cache' => secure_url('/imagecache/gallery/' . $galleryImageName)
            ];
            
            $album->detachFeaturedImage();
            $album->addFeaturedImage($newFeaturedImage);
        }

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

    public function showJSON() {
        return $this->albums;
    }
}
