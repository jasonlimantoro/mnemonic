<?php

namespace App\Http\Controllers;

use App\Vendor;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;

class VendorsController extends Controller
{
    public $categories;

    public function __construct()
    {
        $this->middleware('can:read,App\Vendor');
        $this->middleware('can:create,App\Vendor')->only(['create', 'store']);
        $this->middleware('can:update,App\Vendor')->only(['edit', 'update']);
        $this->middleware('can:delete,App\Vendor')->only('destroy');

        $this->categories = Category::all();
        $this->categoriesToArray = $this->categories->pluck('name', 'id')->toArray();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::filtersSearch(request(['search', 'order', 'method']))
                        ->latest()
                        ->get();
        return view('backend.wedding.vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.wedding.vendors.create', with([
            'categories' => $this->categoriesToArray
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
        $this->validate($request, ['name' => 'required']);

        Category::find($request->category)
                ->addVendor($request->only(['name']));

        $this->flash('Vendor is successfully created!');

        return redirect()->route('vendors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        return view('backend.wedding.vendors.show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        return view('backend.wedding.vendors.edit', with([
            'categories' => $this->categoriesToArray,
            'vendor' => $vendor,
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $this->validate($request, ['name' => 'required']);

        $vendor->category()
               ->associate(Category::find($request->category))
               ->update($request->only(['name']));

        $this->flash('Vendor data is updated');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        $this->flash('Vendor is deleted!');

        return back();
    }
}
