<?php

namespace App\Http\Controllers;

use App\Image;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = (object)[
            'admin_email' => Setting::getValueByKey('admin-email'),
            'site_title' => Setting::getValueByKey('site-title'),
            'site_description' => Setting::getValueByKey('site-description'),
            'contact' => json_decode(Setting::getValueByKey('site-contact')),
        ];
        return view('backend.settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Setting::updateManyByKeys([
            'admin-email' => $request->admin_email,
            'site-title' => $request->site_title,
            'site-description' => $request->site_description,
            'site-contact' => json_encode([
                'email' => $request->contact_email,
                'phone' => $request->contact_phone,
                'mobile' => $request->contact_mobile,
                'address' => $request->contact_address,
                'region' => $request->contact_region,
                'city' => $request->contact_city,
                'country' => $request->contact_country,
                'zip_code' => $request->contact_zip_code,
            ])
        ]);


        if ($favicon = $request->favicon_from_gallery) {
			Setting::updateValueByKey('site-favicon', Image::byName($favicon)->url_cache);
		} else if ($favicon = $request->file('favicon_from_local')) {
			$faviconName = $favicon->getClientOriginalName();
			$path = Storage::disk('uploads')->putFileAs('/', $favicon, $favicon->getClientOriginalName());
			$image = Image::create([
				'file_name' => $faviconName,
				'url_asset' => url('uploads/' . $faviconName),
				'url_cache' => url('imagecache/gallery/' . $faviconName)
			]);
			Setting::updateValueByKey('site-favicon', $image->url_cache);
		}

        if ($logo = $request->logo_from_gallery) {
			Setting::updateValueByKey('site-logo', Image::byName($logo)->url_cache);
		} else if ($logo = $request->file('logo_from_local')) {
			$logoName = $logo->getClientOriginalName();
			$path = Storage::disk('uploads')->putFileAs('/', $logo, $logo->getClientOriginalName());
			$image = Image::create([
				'file_name' => $logoName,
				'url_asset' => url('uploads/' . $logoName),
				'url_cache' => url('imagecache/gallery/' . $logoName)
			]);
			Setting::updateValueByKey('site-logo', $image->url_cache);
		}

        $this->flash('Settings are updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
