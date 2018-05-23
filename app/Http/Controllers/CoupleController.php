<?php

namespace App\Http\Controllers;

use JavaScript;
use App\Couple;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;

class CoupleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:read,App\Couple')->only('edit');
        $this->middleware('can:update,App\Couple')->only('update');
        $this->middleware('can:read-embed-video')->only('editVideo');
        $this->middleware('can:update-embed-video')->only('updateVideo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Couple  $couple
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
		JavaScript::put([
			'canUpdate' => auth()->user()->can('update', Couple::class),
		]);
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

    public function editVideo()
    {
        $embed = Setting::getValueByKey('embed-video');
        return view('backend.wedding.couple.edit-video', compact('embed'));
    }

    public function updateVideo(Request $request)
    {
        $request->validate([
            'embed_url' => 'required'
        ]);

        Setting::updateValueByKey('embed-video', [
            'url' => $request->embed_url,
            'id' => getYoutubeId($request->embed_url)
        ]);

        $this->flash('Embed video URL is successfully updated');

        return back();
    }
}
