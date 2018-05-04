<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

use App\Http\Controllers\GenericController as Controller;

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
		$adminEmail = $request->admin_email;
		$siteTitle = $request->site_title;
		$siteDescription = $request->site_description;
		$siteContact = [
			'email' => $request->contact_email,
			'phone' => $request->contact_phone,
			'mobile' => $request->contact_mobile,	
			'address' => $request->contact_address,
			'region' => $request->contact_region,
			'city' => $request->contact_city,
			'country' => $request->contact_country,
			'zip_code' => $request->contact_zip_code,
		];

		Setting::updateValueByKey('admin-email', $adminEmail);
		Setting::updateValueByKey('site-title', $siteTitle);
		Setting::updateValueByKey('site-description', $siteDescription);
		Setting::updateValueByKey('site-contact', json_encode($siteContact));

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
