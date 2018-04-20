<?php

namespace App\Http\Controllers;

use App\Http\Controllers\GenericController as Controller;
use App\Couple;
use Illuminate\Http\Request;
use App\Image;

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
        $rules = [
            'name' => 'required',
        ];
		$this->validate($request, $rules);
		
		if ($coupleImage = Image::handleUpload($request))
		{
			$coupleImage->addTo($couple);
		}

		$couple->update(
			request(['name', 'father', 'mother'])
		);

        $this->flash('success_msg', 'Couple information is sucessfully updated!');

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

}
