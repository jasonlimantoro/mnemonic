<?php

Form::macro('checkboxBootstrap', function($name, $label, $value, $checked=false){
	$checkbox = Form::checkbox($name . '[]', $value, $checked);
	$html = "<label class='checkbox-inline'>$checkbox $label</label>";
	return $html;
});