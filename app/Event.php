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
		return Carbon::parse($date)->toDayDateTimeString();
	}
}
