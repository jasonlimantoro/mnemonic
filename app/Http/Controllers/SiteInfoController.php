<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;

class SiteInfoController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = Setting::getValueByKey('site-info');
        return view('backend.settings.siteinfo.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'admin_email' => 'email|nullable',
            'contact_zip_code' => 'numeric|nullable'
        ]);

        Setting::updateSiteInfo($request);

        $this->flash('Settings are updated successfully');

        return back();
    }
}
