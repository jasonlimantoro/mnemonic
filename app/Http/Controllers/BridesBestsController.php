<?php

namespace App\Http\Controllers;

use App\Image;
use App\BridesBest;
use App\Http\Requests\BridesBestsRequest;
use App\Http\Controllers\GenericController as Controller;

class BridesBestsController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:read,App\BridesBest');
		$this->middleware('can:create,App\BridesBest')->only(['create', 'store']);
		$this->middleware('can:update,App\BridesBest')->only(['edit', 'update']);
		$this->middleware('can:delete,App\BridesBest')->only('destroy');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bridesBests = BridesBest::filtersSearch(request(['search', 'order', 'method']))
                                ->latest()
                                ->get();
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
		BridesBest::createRecord($request);

		$this->flash('Bridesmaid / Bestman is successfully created!');

        return redirect()->route('bridesmaid-bestmans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param BridesBest $bridesmaid_bestman
     * @return \Illuminate\Http\Response
     */
    public function show(BridesBest $bridesmaid_bestman)
    {
        $bridesBestImage = optional($bridesmaid_bestman->image)->url_cache;
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
		$bridesBestImage = optional($bridesmaid_bestman->image)->url_cache;

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

		$bridesmaid_bestman->updateRecord($request);

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
