<?php

namespace App;

use App\Image;

class Album extends Model
{
	public static function uncategorizedAlbum(){
		return static::where('name', 'Uncategorized')->first();
	}
    public function images(){
        return $this->hasMany(Image::class);
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
			$image->album()->associate(self::uncategorizedAlbum());
			$image->save();
		}
    }

    public function addImage($image){
        $this->images()->create($image);
    }

    public function addFeaturedImage($image){
        // set the matching $image to be the featured image
        $this->images()->updateorCreate(
            $image,
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
