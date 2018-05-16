<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;
use App\Http\Requests\UsersRequest;

class UsersController extends Controller
{

	protected $roles;
	
	public function __construct(Role $roles)
	{
		$this->roles = $roles;
		$this->rolesToArray = $this->roles->pluck('name', 'id')->toArray();
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$users = User::filtersSearch(request(['search', 'order', 'method']))->latest()->get();
        return view('backend.settings.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

		return view('backend.settings.users.create', with([
			'roles' => $this->rolesToArray
		]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
	   User::create($request->only(['name', 'email', 'password', 'role_id']));
	   
	   $this->flash('User is successfully created!');

	   return redirect()->route('users.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
		// $roles = $this->roles->pluck('name', 'id')->toArray();
        return view('backend.settings.users.edit', with([
			'roles' => $this->rolesToArray,
			'user' => $user
		]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, User $user)
    {

		$user->update($request->only(['name', 'email', 'password', 'role_id']));

		$this->flash('User info is successfully updated');

		return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
		$user->delete();
		
		$this->flash('User is successfully deleted');

		return back();
    }
}
