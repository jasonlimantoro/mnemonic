<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $values = Setting::getManyValueByKeys(['site-info', 'site-social', 'site-seo']);
        View::share('settings', $values);
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
