<?php

namespace App\Providers;

use App\PackageSetting;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		Blade::if('frontend', function (){
			return Route::currentRouteNamed('front*');
		});

		Blade::directive('react', function ($component) {
			return "<?php echo '<div data-component={$component}></div>'; ?>";
        });
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
