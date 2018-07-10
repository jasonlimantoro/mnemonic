<?php

namespace App\Http\Controllers;

use App\VIP;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;

class VIPController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:read,App\VIP')->only('edit');
        $this->middleware('can:update,App\VIP')->only('update');
        $this->middleware('can:read-embed-video')->only('editVideo');
        $this->middleware('can:update-embed-video')->only('updateVideo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $bride = VIP::bride();
        $groom = VIP::groom();
        return view('backend.day.vip.edit', compact('bride', 'groom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param VIP $vip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VIP $vip)
    {
        $this->validate($request, ['name' => 'required']);

        $vip->updateRecord($request);

        $this->flash('VIP information is successfully updated!');

        return back();
    }

    public function editVideo()
    {
        $embed = Setting::getValueByKey('embed-video');
        return view('backend.day.vip.edit-video', compact('embed'));
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
