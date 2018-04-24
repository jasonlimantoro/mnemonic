<?php

namespace App\Traits;

use App\Album;
use App\Image;
use App\Repositories\Albums;
use App\Filters\GalleryFilter;

trait UploadsImage {

	public static function handleUpload($request)
	{
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

	public function addTo($ownerClass, $updatable = NULL)
	{

		$imgAttr = $this->only('file_name', 'url_asset', 'url_cache');

		// the owner has an exisiting polymorphic one-to-one relationship
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
				$this->assignToUncategorizedAlbum($this->attributes);
			}
		}
			
		if($updatable)
		{
			// update the image only
			$updatable->update($imgAttr);
			return 1;
		}

		if($ownerClass->images)
		{
			return $ownerClass->images()->create($imgAttr);
		}

		else {
			return $ownerClass->image()->create($imgAttr);
		}

		return false;

	}

	public function assignToUncategorizedAlbum(array $attributes)
	{
		(new Albums)->uncategorized()
			   		->images()
			   		->create($attributes);
	}
}
