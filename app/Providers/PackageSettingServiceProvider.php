<?php

namespace App\Providers;

use App\PackageSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class PackageSettingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $mode = PackageSetting::getValueByKey('other')->mode;
        View::share('mode', $mode);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
