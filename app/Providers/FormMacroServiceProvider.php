<?php
namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class FormMacroServiceProvider extends ServiceProvider
{
	public function boot()
	{
		// load custom macros
		foreach(glob(base_path('resources/macros/*.php')) as $filename){ 
			require_once($filename);
		}
	}

	public function register()
	{

	}
}