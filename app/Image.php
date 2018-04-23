<?php

namespace App;

use App\Album;
use App\Couple;
use App\Carousel;
use App\Repositories\Albums;
use App\Filters\GalleryFilter;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;


class Image extends Model
{
	public function imageable(){
		return $this->morphTo();
	}

    public function isFeatured(){
        return $this->featured;
    }

    public static function handleUpload($request){
        $newImage = $request->file('image');
        $galleryImageName = $request->gallery_image;
        if($newImage){
            // new image
            $newImageName = $newImage->getClientOriginalName();
            $uploadPath = public_path('uploads/' . $newImageName);
            $imgFiltered = \Image::make($newImage);
            $galleryImageName = $newImageName;
        }

        else if ($galleryImageName) {
            // existing images
            $galleryPath = public_path('uploads/' . $galleryImageName);
            $imgFiltered = \Image::make($galleryPath);
            $uploadPath = $galleryPath;
        }
        else {
            // no new or gallery images in the request
            return null;
        }

        // applyFilter GalleryFilter and save it to file system
        $imgFiltered->filter(new GalleryFilter)->save($uploadPath);

        // array
        $imageAttr = [
            'file_name' => $galleryImageName,
            'url_asset' => url('uploads/' . $galleryImageName),
            'url_cache' => url('/imagecache/gallery/' . $galleryImageName)
        ];

        return Image::firstOrNew($imageAttr);
        
    }

	public function addTo($ownerClass, $editable = NULL)
	{

		$imgAttr = [
			'file_name' => $this->file_name,
			'url_asset' => $this->url_asset,
			'url_cache' => $this->url_cache,
		];

		// the owner has a polymorphic one-to-one relationship
		if($ownerClass->image)
		{
			$ownerClass->image()->delete();
		}

		// a new image
		if(!$this->exists)
		{
			// if it's not added to album
			if (!$ownerClass instanceof Album) 
			{
				$newImage = $this->attributes;	
				(new Albums)->uncategorized()->images()->create($newImage);
			}
		}
			
		if($editable)
		{
			// update the image only
			$editable->update($imgAttr);
			return NULL;
		}

		if($ownerClass->image() instanceof MorphOne)
		{
			return $ownerClass->image()->create($imgAttr);
		}

		else if ($ownerClass->images() instanceof MorphMany)
		{
			return $ownerClass->images()->create($imgAttr);
		}

		return false;

	}
    public static function withAlbum(){
        return static::where('album_id', '<>', 4)->get();
    }

    public static function withoutAlbum(){
        return static::where('album_id', 4)->get();
	}
}
