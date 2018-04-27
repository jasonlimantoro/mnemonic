<?php

namespace App\Repositories;
use App\Image;
use App\Album;

class Albums 
{
	public static function all()
	{
		return Album::oldest()->get();
	}

	public static function withImages()
	{
		return Album::with('images')->oldest()->get();
	}
	
	public static function categorized()
	{
		return static::all()->where('name', '!=', 'Uncategorized');
	}

	public static function uncategorized()
	{
		return Album::where('name', 'Uncategorized')->first();
	}

	public static function toArray()
	{
		return static::all()->pluck('name', 'id')->toArray();
	}
}