<?php

namespace App;

use App\Image;
use App\Album;

class Event extends Model
{
	public $defaultState;

	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);
		$this->defaultState = Album::uncategorizedAlbum();	
	}
	public function image()
	{
		return $this->morphOne(Image::class, 'imageable');

	}
}
