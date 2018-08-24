<?php

namespace App\Providers;

use App\Models\PackageSetting;
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
        if ($this->app->environment() !== 'testing') {
            $mode = PackageSetting::getMode();
            View::share('mode', $mode);
        }
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
