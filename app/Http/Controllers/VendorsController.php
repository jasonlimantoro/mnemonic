<?php

namespace App\Http\Controllers;

use App\Vendor;
use App\Category;
use App\Http\Controllers\GenericController as Controller;
use Illuminate\Http\Request;


class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public $vendors;
	public $categories;

	public function __construct()
	{
		$this->vendors = Vendor::with('categories')->get();
		$this->categories = Category::all();
	}
    public function index()
    {
		return view('backend.wedding.vendors.index', with([
			'vendors' => $this->vendors
		]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.wedding.vendors.create', with([
			'categories' => $this->categories
		]));
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
			'name' => 'required',
		];

		$this->validate($request, $rules);

		$vendor = Vendor::create(request(['name']));

		if($category = $request->category)
		{
			$vendor->categories()->attach($category);
		}

		\Session::flash('Vendor Information is updated!');

		return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendors  $vendors
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
		return view('backend.wedding.vendors.show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendors  $vendors
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
		$vcategories = $vendor->categories()->pluck('name')->toArray();
		return view('backend.wedding.vendors.edit', with([
			'categories' => $this->categories,
			'vendor' => $vendor,
			'vcategories' => $vcategories
		]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendors  $vendors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
		$rules = [
			'name' => 'required'
		];
		$this->validate($request, $rules);

		$vendor->update(request(['name']));
		$vendor->categories()->sync($request->category);

		$this->flash('Vendor data is updated');

		return back();
		

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendors  $vendors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
		$vendor->delete();
		$vendor->categories()->detach();
		$this->flash('Vendor is deleted!');
		return back();
    }
}
