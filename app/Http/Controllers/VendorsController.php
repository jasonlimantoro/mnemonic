<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use App\Category;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$vendors = Vendor::all();
		return view('backend.wedding.vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('backend.wedding.vendors.create', compact('categories'));
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

		// dd($request->category);
		$vendor = Vendor::create(request(['name']));

		if($category = $request->category)
		{
			$vendor->categories()->sync($category);
		}

		\Session::flash('success_msg', 'Vendor Information is updated!');

		return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendors  $vendors
     * @return \Illuminate\Http\Response
     */
    public function show(Vendors $vendors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendors  $vendors
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendors $vendors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendors  $vendors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendors $vendors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendors  $vendors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendors $vendors)
    {
        //
    }
}
