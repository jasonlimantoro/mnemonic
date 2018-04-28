<?php

namespace App;

use App\Traits\UploadsImage;
use App\Repositories\Albums;


class Image extends Model
{
	use UploadsImage;

	protected $albums;
	
	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);
		$this->albums = new Albums;
	}

	public function imageable(){
		return $this->morphTo();
	}

    public function isFeatured(){
        return $this->featured;
	}

	/**
	 * Assign image with given attributes to Uncategorized Album
	 * 
	 * @param  array $attributes
	 * @return void
	 * 
	 */
	public function assignToUncategorizedAlbum(array $attributes)
	{
		$this->albums->uncategorized()
			   		->images()
			   		->create($attributes);
	}
}
