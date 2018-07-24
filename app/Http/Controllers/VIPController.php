<?php

namespace App\Http\Controllers;

use App\Setting;
use App\PackageSetting;
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
     * @param PackageSetting $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageSetting $setting)
    {
		$mode = $setting->getValueByKey('other')->mode;

		if ($mode === 'birthday') {
			$vip = $setting->getValueByKey('other')->vip->birthday_person;
			return view('backend.day.vip.birthdayEdit', compact('vip'));
		}
        $vips = $setting->getValueByKey('other')->vip;
        return view('backend.day.vip.weddingEdit', compact('vips'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param PackageSetting $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageSetting $setting)
    {
		if ($mode = $setting->getValueByKey('other')->mode === 'birthday') {
			$request->validate([
				'birthday_name' => 'required',
			]);
			$setting->updateJSONValueFromKeyField('other', [
				'vip' => [
					'birthday_person' => [
						'name' => $request->birthday_name,
						'father' => $request->birthday_father,
						'mother' => $request->birthday_mother,
						'image' => $request->birthday_image,
					]
				], 
			]);
		} else {
			$request->validate([
				'groom_name' => 'required',
				'bride_name' => 'required'
			]);
			$setting->updateJSONValueFromKeyField('other', [
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
