<?php

namespace App\Repositories;
use App\Image;
use App\Album;

class Albums 
{
	public function all()
	{
		return Album::oldest()->get();	
	}

	public function withImages()
	{
		return Album::with('images')->oldest()->get();	
	}
	
	public function categorized()
	{
		return Album::where('name', '!=', 'Uncategorized')->oldest()->get();
	}

	public function uncategorized()
	{
		return Album::where('name', 'Uncategorized')->first();
	}
}