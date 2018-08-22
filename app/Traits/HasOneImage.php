<?php

namespace App\Traits;

trait HasOneImage
{
    public function hasImage()
    {
       return count($this->image);
    }

    public function addImage($file, $template = null, $attributes = [])
    {
        if (!$file) {
            return null;
        }

        $filter = is_null($template) ? $this->filter : $template;

        $imgAttr = [
            'file_name' => $file,
            'url_asset' => url("uploads/${file}"),
            'url_cache' => url("imagecache/" . $filter . "/${file}"),
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
