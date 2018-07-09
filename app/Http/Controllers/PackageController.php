<?php

namespace App\Http\Controllers;

use App\PackageSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\GenericController as Controller;

class PackageController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = PackageSetting::getValueByManyKeys(['resources-limit', 'other']);
        return view('backend.package.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $request->validate(PackageSetting::getRules());

       PackageSetting::updateValueByKey('resources-limit',
           $request->only(PackageSetting::getResourcesLimitFields())
       );
       PackageSetting::updateValueByKey('other', $request->only(PackageSetting::getOtherFields()));

       $this->flash('Package settings are successfully updated');

       return back();
    }
}
