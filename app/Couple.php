<?php
namespace App;

use App\Image;
use App\Album;

class Couple extends Model
{
	// custom table name
	protected $table = 'couple';
	// no timestamps is needed
	public $timestamps = false;
	
	// eager load
	protected $with = ['image'];

	public $defaultState;

	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);
		$this->defaultState = Album::uncategorizedAlbum();
	}

	public function image(){
		return $this->morphOne(Image::class, 'imageable');
	}

	public function addImage($coupleImage){
		if($oldImage = $this->image()){
			// delete the old image
			$oldImage->delete();
		}
		$imageExist = Image::firstorNew($coupleImage);
		if(!$imageExist->exists){
			// add to uncategorized album if this is a new resource
			$this->defaultState->images()->create($coupleImage);
		}
		// create a new Image for this couple
		$this->image()->create($coupleImage);
	}
}
