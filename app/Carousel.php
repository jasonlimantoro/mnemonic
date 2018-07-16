<?php

namespace App;

use App\Filters\GalleryFilter;

class Carousel extends Model
{
    public $filterClass = GalleryFilter::class;
    public $filter = 'gallery';

	public function images(){
		return $this->morphMany(Image::class, 'imageable');
	}
    
    public function page(){
        return $this->belongsTo(Page::class);
    }

    public function addImage($filename, $attributes = [])
    {
       $imageAttr = [
           'file_name' => $filename,
           'url_asset' => url("uploads/${filename}"),
           'url_cache' => url("imagecache/" . $this->filter . "/${filename}"),
       ];

       $completeAttr = array_merge($imageAttr, $attributes);

       return $this->images()->create($completeAttr);
    }
}
