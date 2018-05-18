<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;

class SEOController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $seo = Setting::getValueByKey('site-seo');

        return view('backend.settings.seo.edit', compact('seo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Setting::updateSiteSEO(
            $request->only(['meta_description', 'meta_title', 'g_script'])
        );

        $this->flash('Site SEO Data is successfully updated!');

        return back();
    }
}
