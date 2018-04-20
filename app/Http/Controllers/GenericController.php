<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class GenericController extends Controller
{
	/**
	 * Send flash message after every action
	 *
	 * @param  string  $key
	 * @param  string  $message
	 * @return void 
	 *
	 */
	
	public function flash($key, $message)
	{
		session()->flash($key, $message);	
	}

}
	