<?php

namespace App\Traits;

trait HasOneImage
{
    public function hasImage()
    {
       return count($this->image);
    }

    public function addImage($file, $attributes = [])
    {
        if (!$file) {
            return null;
        }

        $imgAttr = [
            'file_name' => $file,
            'url_asset' => url("uploads/${file}"),
            'url_cache' => url("imagecache/" . $this->filter . "/${file}"),
        ];

        $completeAttr = array_merge($imgAttr, $attributes);

        if ($this->hasImage()) {
            return $this->image()->update($completeAttr);
        } else {
            return $this->image()->create($completeAttr);
        }
    }

    public function deleteRecord()
    {
        $this->image()->delete();
        return $this->delete();
    }
}
