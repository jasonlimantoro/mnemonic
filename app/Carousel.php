<?php

namespace App;
use App\Image;
use App\Page;
use App\Album;

class Carousel extends Model 
{
	public $defaultState;

	public function __construct()
	{
		$this->defaultState = Album::uncategorizedAlbum();
	}
	public function images(){
		return $this->morphMany(Image::class, 'imageable');
	}
    
    public function page(){
        return $this->belongsTo(Page::class);
    }

    public function addImage($carouselImage, $caption = null){

		$imageExist = Image::firstOrNew($carouselImage);
		if(!$imageExist->exists){
			// add to uncategorized album if it's a new resource
			$this->defaultState->images()->create($carouselImage);	
		}
		// new record
		$image = new Image($carouselImage);
		$image->caption = $caption;
		$this->images()->save($image);
	}

    public function removeImage($image) {
		$image->delete();
    }
}
