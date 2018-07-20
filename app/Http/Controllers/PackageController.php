<?php

namespace App\Http\Controllers;

use App\PackageSetting;
use App\Http\Requests\PackageSettingsRequest;
use App\Http\Controllers\GenericController as Controller;

class PackageController extends Controller
{
    /**
     * PackageController constructor.
     */
    public function __construct()
    {
        $this->middleware('can:manage-package-settings');
    }


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
     * @param PackageSettingsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(PackageSettingsRequest $request)
    {

       PackageSetting::updatePackage($request);

       $this->flash('Package settings are successfully updated');

       return back();
    }
}
