<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GenericController as Controller;
use App\Couple;
use Illuminate\Http\Request;
use App\Image;

class CoupleController extends Controller
{

	
	public function __construct()
	{
		$this->middleware('can:read,App\Couple')->only('edit');
		$this->middleware('can:update,App\Couple')->only('update');
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Couple  $couple
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('backend.wedding.couple');
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
        $this->validate($request, ['name' => 'required']);

		$couple->updateRecord($request);

        $this->flash('Couple information is successfully updated!');

        return back();
	}

}
