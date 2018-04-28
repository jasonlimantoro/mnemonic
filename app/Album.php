<?php

namespace App;

use App\Image;
use App\Repositories\Albums;

class Album extends Model
{
	public $repo;

	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);
		$this->repo = new Albums;

	}
	// public static function uncategorizedAlbum(){
	// 	return static::where('name', 'Uncategorized')->first();
	// }
	
	public function images(){
		return $this->morphMany(Image::class, 'imageable');
	}

    public function featuredImage(){
        return $this->images->where('featured', 1)->first();
    }

    public function scopeFilterId($query, $filters){
        if (!empty($filters) && $id = $filters['album']){
            $query->find($id);
        }
    }

    public function uncategorizeImages(){
        // assign all the images to uncategorized
		foreach($this->images as $image){
			$this->repo->uncategorized()->images()->save($image);
		}
    }

    public function addImage($image){
        $this->images()->create($image);
    }

    public function addFeaturedImage($image){

		$imgAttr = $image->only(['file_name', 'url_asset', 'url_cache']); 
        $this->images()->updateorCreate(
            $imgAttr,
            ['featured' => 1]
        );
    }

    public function hasFeaturedImage(){
        return $this->featuredImage()->exists;
    }

    public function removeFeaturedImage(){
        if($this->hasFeaturedImage()){
            $this->featuredImage()
                ->update(['featured' => 0]);
        }
	}
}
