<?php

namespace App\Http\Controllers;


abstract class GenericController extends Controller
{
	/**
	 * Send flash message after every action
	 *
	 * @param  string  $key
	 * @param  string  $message
	 * @return void 
	 *
	 */
	
	public function flash($message, $key= 'success_msg')
	{
		session()->flash($key, $message);
	}

}
	