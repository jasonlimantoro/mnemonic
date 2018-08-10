<?php

namespace App\Http\Controllers;

use App\Setting;
use App\PackageSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;

class VIPController extends Controller
{
    public $package;
    public $setting;

    public function __construct(PackageSetting $package, Setting $setting)
    {
        $this->package = $package;
        $this->setting = $setting;

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
		$mode = $this->package->getMode();

		$vip = $this->package->getVip();

		return view("backend.day.vip.${mode}.edit", compact("vip"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
		if ($mode = $this->package->getMode() === 'birthday') {
			$request->validate([
				'vip_name' => 'required',
			]);
			$this->package->updateJSONValueFromKeyField('other', [
				'vip' => [
					'birthday_person' => [
						'name' => $request->vip_name,
						'father' => $request->vip_father,
						'mother' => $request->vip_mother,
						'image' => $request->vip_image,
					]
				], 
			]);
		} else {
			$request->validate([
				'groom_name' => 'required',
				'bride_name' => 'required'
			]);
			$this->package->updateJSONValueFromKeyField('other', [
				'vip' => [
					'groom' => [
						'name' => $request->groom_name,
						'father' => $request->groom_father,
						'mother' => $request->groom_mother,
						'image' => $request->groom_image,
					],
					'bride' => [
						'name' => $request->bride_name,
						'father' => $request->bride_father,
						'mother' => $request->bride_mother,
						'image' => $request->bride_image,
					]
				],
			]);
		}
		
        $this->flash('VIP information is successfully updated!');

        return back();
    }

    public function editVideo()
    {
        $embed = $this->setting->getValueByKey('embed-video');
        return view('backend.day.vip.edit-video', compact('embed'));
    }

    public function updateVideo(Request $request)
    {
        $request->validate([
            'embed_url' => 'required'
        ]);

        $this->setting->updateValueByKey('embed-video', [
            'url' => $request->embed_url,
            'id' => getYoutubeId($request->embed_url)
        ]);

        $this->flash('Embed video URL is successfully updated');

        return back();
    }
}
