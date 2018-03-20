<?php

namespace App\Http\Controllers;

use App\Couple;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CoupleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Couple  $couple
     * @return \Illuminate\Http\Response
     */
    public function show(Couple $couple)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Couple  $couple
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $groom = Couple::find(1);
        $bride = Couple::find(2);
        return view('backend.wedding.couple', compact(['groom', 'bride']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Couple  $couple
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Couple $couple)
    {
        $rules = [
            'name' => 'required',
        ];
		$this->validate($request, $rules);
		
		$couple->update([
			'name' => $request->name,
			'father' => $request->father,
			'mother' => $request->mother
		]);
            
        Session::flash('success_msg', 'Couple information is sucessfully updated!');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Couple  $couple
     * @return \Illuminate\Http\Response
     */
    public function destroy(Couple $couple)
    {
        //
	}
	
	public function showJSON(){
		return Couple::all();
	}
}
