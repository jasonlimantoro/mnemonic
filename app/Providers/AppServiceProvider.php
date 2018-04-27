<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function($view){
			$pages = \App\Page::orderBy('id', 'asc')->get();
			$view->with(compact('pages'));
		});

		view()->composer('layouts.archives', function($view){
			$archives = \App\Post::archives();
			$postCount = \App\Repositories\Posts::count();
			$view->with(compact('archives', 'postCount'));
		});

		// API doesn't get wrapped with data key
		Resource::withoutWrapping();

		// for logging database call
		DB::listen(function($query) {
            Log::info(
                $query->sql,
                $query->bindings,
                $query->time
            );
		});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
