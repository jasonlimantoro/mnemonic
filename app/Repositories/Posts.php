<?php
namespace App\Repositories;

use App\Models\Post;

class Posts
{

	public static function home()
	{
		// Posts in home
		return Post::where('page_id', 1)->latest();
	}

	public static function about()
	{
		// Posts in About us
		return Post::where('page_id', 2)->latest();
	}

	public static function count()
	{
		return static::home()->count(); 
	}
}