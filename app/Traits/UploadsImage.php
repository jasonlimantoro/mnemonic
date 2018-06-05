<?php

namespace App\Traits;

use App\Album;
use App\Image;
use App\Filters\GalleryFilter;
use Illuminate\Support\Facades\Storage;

trait UploadsImage
{
    abstract public function assignToUncategorizedAlbum();

    /**
     * Filter the uploaded file and save it to the filesystem
     *
     * @param  \Illuminate\Http\Request $request
     * @param string $filter
     * @param string $template
     * @return mixed
     */
    public static function handleUpload($request, $filter = GalleryFilter::class, $template = 'gallery')
    {
        $newImage = $request->file('image');
        $existingImageName = $request->gallery_image;

        // new image
        if ($newImage) {
            $newImageName = $newImage->getClientOriginalName();
            $imgFiltered = \Image::make($newImage);
            $resultImageName = $newImageName;
        }

        // existing images
        elseif ($existingImageName) {
            $uploadPath = public_path('uploads/' . $existingImageName);
            $imgFiltered = \Image::make($uploadPath);
            $resultImageName = $existingImageName;
        }

        // no new or gallery images in the request
        else {
            return null;
        }

        // ApplyFilter GalleryFilter and save it to file system
        $imgFiltered->filter(new $filter);
        Storage::disk('uploads')->put($resultImageName, (string) $imgFiltered->encode());

        // array
        $imageAttr = [
            'file_name' => $resultImageName,
			'url_asset' => url('uploads/' . $resultImageName),
            'url_cache' => url('/imagecache/' . $template .  '/' . $resultImageName)
        ];

        return Image::firstOrNew($imageAttr);
    }

    /**
     * @param Model $ownerClass
     * @param Model|null $updatable
     * @return mixed
     */
    public function addTo($ownerClass, $updatable = null)
    {
        // relevant attributes
        $imgAttr = $this->only('file_name', 'url_asset', 'url_cache');

        // the owner has an 'existing' polymorphic one-to-one relationship
        if ($ownerClass->image) {
            $ownerClass->image()->delete();
        }

        // a new image and not currently being added to any album
        if (!$this->exists && !$ownerClass instanceof Album) {
            $this->assignToUncategorizedAlbum($this->attributes);
        }

        // Update the image only, no need to create new relationships
        if ($updatable) {
            $updatable->update($imgAttr);
        }

        // Create the relationships
        // morphMany relationships
        if ($ownerClass->images) {
            $ownerClass->images()->create($imgAttr);
        } else {
            $ownerClass->image()->create($imgAttr);
        }

        return $this;
    }
}
