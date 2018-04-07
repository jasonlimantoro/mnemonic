<?php

namespace App;

use App\Image;

class Album extends Model
{
	public static function uncategorizedAlbum(){
		return static::where('name', 'Uncategorized')->first();
	}
	
	public function images(){
		return $this->morphMany(Image::class, 'imageable');
	}

    public function featuredImage(){
        return $this->images->where('featured', 1);
    }

    public function scopeFilterId($query, $filters){
        if (!empty($filters) && $id = $filters['album']){
            $query->find($id);
        }
    }

    public function uncategorizeImages(){
        // assign all the images to uncategorized
		foreach($this->images as $image){
			self::uncategorizedAlbum()->images()->save($image);
		}
    }

    public function addImage($image){
        $this->images()->create($image);
    }

    public function addFeaturedImage($image){
		$imgAttr = [
			'file_name' => $image->file_name,
			'url_asset' => $image->url_asset,
			'url_cache' => $image->url_cache
		];
		
        $this->images()->updateorCreate(
            $imgAttr,
            ['featured' => 1]
        );
    }

    public function hasFeaturedImage(){
        return !$this->featuredImage()->isEmpty();
    }

    public function removeFeaturedImage(){
        if($this->hasFeaturedImage()){
            $this->featuredImage()
                ->first()
                ->update(['featured' => 0]);
        }
	}
}
