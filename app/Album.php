<?php

namespace App;

use App\Image;

class Album extends Model
{
    public $defaultUncategorizedId = 4;

    public function images(){
        return $this->hasMany(Image::class);
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
}
