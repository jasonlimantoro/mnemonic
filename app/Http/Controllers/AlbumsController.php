<?php

namespace App\Http\Controllers;

use App\Album;
use App\Image;
use App\Repositories\Albums;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\GenericController as Controller;
use Illuminate\Support\Facades\Validator;

class AlbumsController extends Controller
{

	protected $albums;

    public function __construct(Albums $albums) {
		$this->albums = $albums;
	}
    public function index()
    {
		$categorizedAlbums = $this->albums->categorized();
        $uncategorizedAlbum = $this->albums->uncategorized(); 
        return view('backend.website.albums.index')
				->with([
					'albums' => $categorizedAlbums,
					'uncategorizedAlbum' => $uncategorizedAlbum,
				]);
    }
    public function create()
    {
        return view('backend.website.albums.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:albums,name',
            'description' => 'required'
        ];

        $this->validate($request, $rules);

        $album = Album::create(request(['name', 'description']));
		if($newFeaturedImage = Image::handleUpload($request))
		{
			$album->addFeaturedImage($newFeaturedImage);
		}
        
        $this->flash('Album is created sucessfully!');

        return redirect()->route('albums.index');
    }

    public function show(Album $album)
    {
        $images = $album->images;
        return view('backend.website.albums.show', compact(['images', 'album']));
    }

    public function edit(Album $album)
    {
        return view('backend.website.albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
		$rules = Validator::make($request->all(), [
			'name' => [
				'required',
				Rule::unique('albums')->ignore($album->id)
			],
			'description' => 'required'
		])->validate();
        
		$album->update(request(['name', 'description']));

		if($newFeaturedImage = Image::handleUpload($request))
		{
			$album->addFeaturedImage($newFeaturedImage);
		}

        //store status message
        $this->flash('Album is updated successfully!');

        return back();
    }

    public function destroy(Album $album)
    {
        // Assign the image to Uncategorized album
		$album->uncategorizeImages()
			  ->delete();

        $this->flash('Album is deleted successfully. All the attached images have been assigned to Uncategorized album');

        return back();
    }
}
