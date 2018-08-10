<?php

namespace App\Http\Controllers;

use App\PackageSetting;
use App\Http\Requests\PackageSettingsRequest;
use App\Http\Controllers\GenericController as Controller;
use App\Events\ModeChanged;

class PackageController extends Controller
{
    public $setting;

    /**
     * PackageController constructor.
     * @param PackageSetting $setting
     */
    public function __construct(PackageSetting $setting)
    {
        $this->setting = $setting;
        $this->middleware('can:manage-package-settings');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = $this->setting->getValueByManyKeys(['resources-limit', 'other']);
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
        $oldMode = $this->setting->getMode();

        $newMode = $request->mode;

        if (strtolower($oldMode) !== strtolower($newMode)) {
            event(new ModeChanged($newMode));
        }

        $this->setting->updatePackage($request);

        $this->flash('Package settings are successfully updated');

        return back();
    }
}
