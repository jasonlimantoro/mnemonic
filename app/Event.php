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

	public function addImage($eventImage)
	{
		if($oldImage = $this->image)
		{
			// delete the old image
			$oldImage->delete();
		}
		$imageExist = Image::firstorNew($eventImage);
		if(!$imageExist->exists)
		{
			// add to uncategorized album if this is a new resource
			$this->defaultState->images()->create($eventImage);
		}
		// create a new Image for this event
		$this->image()->create($eventImage);
	}
}
