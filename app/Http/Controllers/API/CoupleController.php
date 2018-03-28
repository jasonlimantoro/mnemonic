<?php

namespace App\Http\Controllers\API;

use App\Couple;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CoupleResource;
use App\Http\Resources\CoupleCollection;

class CoupleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$couple = Couple::with('image')->get();
		return new CoupleCollection($couple);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Couple  $couple
     * @return \Illuminate\Http\Response
     */
    public function show(Couple $couple)
    {
		return new CoupleResource($couple);	
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
        //
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
