<?php

Form::macro('selectGender', function($name, $labelFemale = 'Female', $labelMale= 'Male', $femaleChecked = false, $maleChecked = false){
	$inputFemale = Form::radio($name, 'female', $femaleChecked);
	$inputMale = Form::radio($name, 'male', $maleChecked);
	$htmlFemale = "<label class=\"radio-inline\">$inputFemale $labelFemale </label>";
	$htmlMale = "<label class=\"radio-inline\">$inputMale $labelMale </label>";
	return $htmlFemale . $htmlMale;
});	
