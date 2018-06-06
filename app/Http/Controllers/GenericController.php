<?php

namespace App\Http\Controllers;


abstract class GenericController extends Controller
{

    /**
     * Filter name for Image Intervention
     *
     * @var string
     */
    protected $filter;


    /**
     * Filter class name of the corresponding filter
     *
     * @var string
     */
    protected $filterClass;

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
	