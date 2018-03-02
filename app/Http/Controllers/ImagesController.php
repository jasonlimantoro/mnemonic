<?php

namespace App\Http\Controllers;

use App\Image;
use App\Carousel;
use App\Album;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ImagesController extends Controller
{

	public function __construct(){
		$this->middleware('auth')->except(['showJSON']);
		// All uploaded images
		$this->images = Image::latest()->get();
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$galleryImages = $this->images;
		return view('backend.website.galleries.index', compact('galleryImages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$albums = Album::all();
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
	   $rules = [
		   'image' => 'required|image',
		   'album' => 'required'
	   	];

		$this->validate($request, $rules);

		$newImage = Image::handleUpload($request);
		$assignedAlbum = [
		   'album_id' => $request->album
	   	];
		$newImage += $assignedAlbum;

		Image::create($newImage);

		Session::flash('success_msg', 'Image is successfully uploaded!');

	   return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Image  $image
	 * @return \Illuminate\Http\Response
	 */
	public function show(Carousel $carousel, Image $image)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Image  $image
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Carousel $carousel, Image $image)
	{

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Image  $image
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Carousel $carousel, Image $image)
	{
		
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

		Session::flash('success_msg', 'Images are successfully deleted!');

		return back();
	}

	public function showJSON(){
		return $this->images;
	}
}
