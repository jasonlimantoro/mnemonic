<?php

namespace App\Traits;

use App\Album;
use App\Image;
use App\Repositories\Albums;
use App\Filters\GalleryFilter;

trait UploadsImage {

	/** 
	 * Filter the uploaded file and save it to the filesystem
	 * 
	 * @param  Illuminate\Http\Request $request
	 * @return mixed
	 * 
	*/
	public static function handleUpload($request)
	{
        $newImage = $request->file('image');
		$existingImageName = $request->gallery_image;

		// new image
        if($newImage){
            $newImageName = $newImage->getClientOriginalName();
            $uploadPath = public_path('uploads/' . $newImageName);
            $imgFiltered = \Image::make($newImage);
            $resultImageName = $newImageName;
        }

		// existing images
        else if ($existingImageName) {
            $uploadPath = public_path('uploads/' . $existingImageName);
			$imgFiltered = \Image::make($uploadPath);
			$resultImageName = $existingImageName;
		}

		// no new or gallery images in the request
        else {
            return null;
        }

        // ApplyFilter GalleryFilter and save it to file system
        $imgFiltered->filter(new GalleryFilter)->save($uploadPath);

        // array
        $imageAttr = [
            'file_name' => $resultImageName,
            'url_asset' => url('uploads/' . $resultImageName),
            'url_cache' => url('/imagecache/gallery/' . $resultImageName)
        ];

        return Image::firstOrNew($imageAttr);
        
	}


    /**
     * @param Model $ownerClass
     * @param Model|null $updatable
     * @return mixed
     */
    public function addTo($ownerClass, $updatable = NULL)
	{

		// relevant attributes
		$imgAttr = $this->only('file_name', 'url_asset', 'url_cache');

		// the owner has an 'existing' polymorphic one-to-one relationship
		if($ownerClass->image)
		{
			$ownerClass->image()->delete();
		}

		// a new image and not currently being added to any album 
		if(!$this->exists && !$ownerClass instanceof Album)
		{
			$this->assignToUncategorizedAlbum($this->attributes);
		}
			
		// Update the image only, no need to create new relationships
		if($updatable)
		{
			$updatable->update($imgAttr);
			return 1;
		}

		// Create the relationships
		// morphMany relationships
		if($ownerClass->images)
		{
			return $ownerClass->images()->create($imgAttr);
		}

		// morphOne relationships
		else {
			return $ownerClass->image()->create($imgAttr);
		}

		return false;

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
		(new Albums)->uncategorized()
			   		->images()
			   		->create($attributes);
	}
}
