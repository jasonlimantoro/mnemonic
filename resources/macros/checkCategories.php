<?php

Form::macro('checkCategories', function($name, $label, $value, $checked){
	$checkbox = Form::checkbox($name . '[]', $value, $checked);
	$html = "<label class='checkbox-inline'>$checkbox $label</label>";
	return $html;
});