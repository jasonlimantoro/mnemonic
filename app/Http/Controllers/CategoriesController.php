<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoriesRequest;
use App\Http\Controllers\GenericController as Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$categories = Category::latest()->filtersSearch(request(['search', 'order', 'method']))->get();
		return view('backend.settings.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.settings.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoriesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {

		Category::create($request->only(['name', 'description']));

		$this->flash('Category is successfully created!');

		return redirect()->route('categories.index');
		
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.settings.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoriesRequest $request
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, Category $category)
    {

		$category->update($request->only(['name', 'description']));

		$this->flash('Category is successfully updated');

		return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
		$category->delete();
		$this->flash('Category is successfully deleted!');
		return back();
    }
}
