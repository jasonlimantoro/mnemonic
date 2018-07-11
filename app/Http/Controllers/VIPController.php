<?php

namespace App\Http\Controllers;

use App\PackageSetting;
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
        $vips = PackageSetting::getValueByKey('other')->vip;
        return view('backend.day.vip.edit', compact('vips'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'groom_name' => 'required',
            'bride_name' => 'required'
        ]);

        PackageSetting::updateJSONValueFromKeyField('other', [
            'vip->groom->name' => $request->groom_name,
            'vip->groom->father' => $request->groom_father,
            'vip->groom->mother' => $request->groom_mother,
            'vip->groom->image' => $request->groom_gallery,

            'vip->bride->name' => $request->bride_name,
            'vip->bride->father' => $request->bride_father,
            'vip->bride->mother' => $request->bride_mother,
            'vip->bride->image' => $request->bride_gallery,
        ]);

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
