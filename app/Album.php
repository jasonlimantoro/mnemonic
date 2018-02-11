<?php

namespace App;

use App\Image;

class Album extends Model
{
    public $defaultUncategorizedId = 4;

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
        $this->images()->update([
            'album_id' => $this->defaultUncategorizedId
        ]);
    }

    public function addImage($image){
        $this->images()->save($image);
    }

    public function addFeaturedImage($image){
        // set the matching $image to be the featured image
        $this->images()->updateorCreate(
            $image,
            ['featured' => 1]
        );
        // $this->images()->save($image);
    }

    public function hasFeaturedImage(){
        return !$this->featuredImage()->isEmpty();
    }

    public function detachFeaturedImage(){
        if($this->hasFeaturedImage()){
            $this->featuredImage()
                ->first()
                ->update(['featured' => 0]);
        }
    }
}
