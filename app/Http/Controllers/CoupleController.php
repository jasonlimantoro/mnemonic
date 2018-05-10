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
        $this->validate($request, ['name' => 'required']);

		$couple->updateRecord($request);

        $this->flash('Couple information is successfully updated!');

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
