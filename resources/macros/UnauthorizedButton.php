<?php

Form::macro('unauthorizedButton', function($text = 'Unauthorized'){
	return Form::button($text, ['class' => 'btn btn-default', 'disabled']);
});
