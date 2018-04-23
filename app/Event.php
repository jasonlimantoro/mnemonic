<?php

namespace App;

use App\Image;
use App\Album;
use Carbon\Carbon;

class Event extends Model
{
	protected $dates = ['datetime'];
	
	public function image()
	{
		return $this->morphOne(Image::class, 'imageable');
	}

	public function getDatetimeAttribute($date)
	{
		return Carbon::parse($date)
					   ->format('l - M jS, Y'); // Friday - October 20th, 2017
	}

	public function setDatetimeAttribute($date)
	{
		$this->attributes['datetime'] = Carbon::parse($date);
	}
}
