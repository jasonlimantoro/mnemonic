<?php

namespace App;

use App\Image; 
use App\Album;

class BridesBest extends Model
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

	public function addImage($bridesBestImage){
		if($oldImage = $this->image()){
			// delete the old image
			$oldImage->delete();
		}
		$imageExist = Image::firstorNew($bridesBestImage);
		if(!$imageExist->exists){
			// add to uncategorized album if this is a new resource
			$this->defaultState->images()->create($bridesBestImage);
		}
		// create a new Image for thisbridesBest 
		$this->image()->create($bridesBestImage);
	}
}
