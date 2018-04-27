<?php
namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class FormMacroServiceProvider extends ServiceProvider
{
	public function boot()
	{
		Form::macro('selectGender', function($name, $labelFemale = 'Female', $labelMale= 'Male', $femaleChecked = false, $maleChecked = false){
			$inputFemale = Form::radio($name, 'female', $femaleChecked);
			$inputMale = Form::radio($name, 'male', $maleChecked);
			$htmlFemale = "<label class=\"radio-inline\">$inputFemale $labelFemale </label>";
			$htmlMale = "<label class=\"radio-inline\">$inputMale $labelMale </label>";
			return $htmlFemale . $htmlMale;
		});	
	}

	public function register()
	{

	}
}