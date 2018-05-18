<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;

class SocialController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $social = Setting::getValueByKey('site-social');

        return view('backend.settings.socials.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Setting::updateSiteSocial(
            $request->only(['google_plus', 'facebook', 'instagram', 'youtube'])
        );

        $this->flash('Social Accounts are updated successfully');

        return back();
    }
}
