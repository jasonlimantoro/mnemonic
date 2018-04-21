<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GenericController as Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\RSVP;
use App\Mail\RSVPInvitation;


class RSVPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$rsvps = RSVP::latest()->get();
        return view('backend.wedding.rsvps.index', compact('rsvps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.wedding.rsvps.create');
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
			'email' => 'required|unique:rsvps,email'
		];
		$this->validate($request, $rules);

		$rsvp = RSVP::create(
			request(['name', 'email', 'phone', 'table_name', 'total_invitation'])
		);

		// mail the RSVP
		\Mail::to($rsvp)->send(new RSVPInvitation($rsvp));
		
		$this->flash('RSVP is sucessfully created');

		return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RSVP  $rsvp
     * @return \Illuminate\Http\Response
     */
    public function show(RSVP $rsvp)
    {
        return view('backend.wedding.rsvps.show', compact('rsvp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RSVP  $rsvp
     * @return \Illuminate\Http\Response
     */
    public function edit(RSVP $rsvp)
    {
        return view('backend.wedding.rsvps.edit', compact('rsvp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RSVP  $rsvp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RSVP $rsvp)
    {
		$rules = [
			'name' => 'required',
			'email' => Rule::unique('rsvps')->ignore($rsvp->id) 
		];
		$this->validate($request, $rules);
		$rsvp->update(
			request(['name', 'email', 'phone', 'table_name', 'total_invitation'])
		);
		$this->flash('RSVP data is updated successfully');	
		return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RSVP  $rsvp
     * @return \Illuminate\Http\Response
     */
    public function destroy(RSVP $rsvp)
    {
		$rsvp->delete();
		$this->flash('RSVP is successfully deleted!');
		return back();
    }
}
