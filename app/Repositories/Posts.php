<?php
namespace App\Repositories;

use App\Post;

class Posts
{

	public static function home()
	{
		// Posts in home
		return Post::where('page_id', 1)->latest();
	}

	public static function count()
	{
		return static::home()->count(); 
	}
}