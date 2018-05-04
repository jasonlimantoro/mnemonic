<?php

namespace App\Http\Controllers;

use App\Image;
use App\BridesBest;
use App\Http\Requests\BridesBestsRequest;
use App\Http\Controllers\GenericController as Controller;

class BridesBestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$bridesBests = BridesBest::filtersSearch(request(['search', 'order', 'method']))->get();
		return view('backend.wedding.bridesbests.index', compact('bridesBests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('backend.wedding.bridesbests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BridesBestsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BridesBestsRequest $request)
    {
		$bridesBest = BridesBest::create(request(['name', 'testimony', 'ig_account', 'gender']));
		if($bridesBestImage = Image::handleUpload($request)){
			$bridesBestImage->addTo($bridesBest);
		}

		$this->flash('Bridesmaid / Bestman is successfully created!');
		return redirect()->route('bridesmaid-bestmans.index.index');
    }

    /**
     * Display the specified resource.
     *
     * @param BridesBest $bridesmaid_bestman
     * @return \Illuminate\Http\Response
     */
    public function show(BridesBest $bridesmaid_bestman)
    {
		$bridesBestImage = $bridesmaid_bestman->image ? $bridesmaid_bestman->image->url_cache : NULL;
		$role = $bridesmaid_bestman->gender == 'female' ? 'Bridesmaid' : 'Bestman';
		return view('backend.wedding.bridesbests.show', with([
			'bridesBest' => $bridesmaid_bestman,
			'bridesBestImage' => $bridesBestImage,
			'role' => $role
		]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BridesBest $bridesmaid_bestman
     * @return \Illuminate\Http\Response
     */
    public function edit(BridesBest $bridesmaid_bestman)
    {
		$bridesBestImage = $bridesmaid_bestman->image ? $bridesmaid_bestman->image->url_cache : NULL;
		return view('backend.wedding.bridesbests.edit', with([
			'bridesBest' => $bridesmaid_bestman,
			'bridesBestImage' => $bridesBestImage
		]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BridesBestsRequest $request
     * @param  \App\BridesBest $bridesmaid_bestman
     * @return \Illuminate\Http\Response
     */
    public function update(BridesBestsRequest $request, BridesBest $bridesmaid_bestman)
    {
		if($bridesBestImage = Image::handleUpload($request))
		{
			$bridesBestImage->addTo($bridesmaid_bestman);
		}

		$bridesmaid_bestman->update($request->only(['name', 'testimony', 'ig_account', 'gender']));

		$this->flash('Bridesmaid / Bestman information is successfully updated!');

		return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BridesBest  $bridesmaid_bestman
     * @return \Illuminate\Http\Response
     */
    public function destroy(BridesBest $bridesmaid_bestman)
    {
		$bridesmaid_bestman->image()->delete();
		$bridesmaid_bestman->delete();
		$this->flash('Bridesmaid / Bestman is successfully deleted!');
		return back();
    }
}
