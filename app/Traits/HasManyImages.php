<?php

namespace App\Traits;

use App\Models\Image;

trait HasManyImages
{
    public function addImage($file, $attributes = [])
    {
        if (!$file){
            return null;
        }

        $imageAttr = [
            'file_name' => $file,
            'url_asset' => url("uploads/${file}"),
            'url_cache' => url("imagecache/" . $this->filter . "/${file}"),
        ];

        $completeAttr = array_merge($imageAttr, $attributes);

        return $this->images()->create($completeAttr);
    }

    public function updateImage(Image $image, $file, $attributes = [])
    {
        if (!$file){
           return null;
        }

        $imageAttr = [
            'file_name' => $file,
            'url_asset' => url("uploads/${file}"),
            'url_cache' => url("imagecache/" . $this->filter . "/${file}"),
        ];

        $completeAttr = array_merge($imageAttr, $attributes);

        return $image->update($completeAttr);
    }

    public function deleteRecord()
    {
        $this->images()->delete();
        return $this->delete();
    }
}
