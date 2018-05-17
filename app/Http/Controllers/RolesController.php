<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$roles = Role::filtersSearch(request(['search', 'order', 'method']))->latest()->get();
        return view('backend.settings.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$permissions = Permission::all();
        return view('backend.settings.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'permission' => 'required'
		]);
		
		$role = Role::create($request->only(['name', 'description']));
		$role->syncAllowedActions($request->permission);


		$this->flash('Role is created successfully');

		return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
		$permissions = Permission::all();
		return view('backend.settings.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
		$this->validate($request, [
			'name' => 'required',
			'permission' => 'required',
		]);

		$role->syncAllowedActions($request->permission);
		$role->update($request->only(['name', 'description']));

		$this->flash('The permissions of '.  $role->name . ' is updated successfully');

		return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
		$role->delete();
		
		$this->flash('Role is deleted successfully');

		return back();
    }
}
