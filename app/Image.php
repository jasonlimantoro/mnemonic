<?php

namespace App;

use App\Album;
use App\Carousel;
use App\Couple;
use App\Filters\GalleryFilter;

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

	public function addTo($ownerClass, array $options =[])
	{
		// the owner has a polymorphic one-to-one relationship
		if($ownerClass->image)
		{
			$ownerClass->image->delete();
		}

		if(!$this->exists)
		{
			// a new image is always assigned to uncategorized album
			$newImage = $this->attributes;	
			Album::uncategorizedAlbum()->images()->create($newImage);

			
			// add the relationship to the owner's class
			$this->imageable_type = get_class($ownerClass);
			$this->imageable_id = $ownerClass->id;

			// also, add the optional options
			foreach ($options as $key => $value) 
			{
				$this->$key = $value;
			}
			$this->save();
		}

		else 
		{
			// old resource
			$imgAttr = [
				'file_name' => $this->file_name,
				'url_asset' => $this->url_asset,
				'url_cache' => $this->url_cache,
				'imageable_type' => get_class($ownerClass),
				'imageable_id' => $ownerClass->id
			];
			foreach ($options as $key => $value) {
				$imgAttr[$key] = $value;
			}
			Image::create($imgAttr);
		}

	}
    public static function withAlbum(){
        return static::where('album_id', '<>', 4)->get();
    }

    public static function withoutAlbum(){
        return static::where('album_id', 4)->get();
	}
}
