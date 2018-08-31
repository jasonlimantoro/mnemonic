<?php

namespace App\Traits;

use App\Models\Image;

trait HasManyImages
{

    /**
     *
     * Attach image to this model
     * @param $image
     * @param array $pivotAttributes
     * @return Image|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function addImage($image, $pivotAttributes = [])
    {
        if (!$image){
            return null;
        }

        if(is_string($image)){
            $image = Image::whereName($image)->first();
        }

        $this->images()->save($image, $pivotAttributes);

        return $image;
    }

    /**
     *
     * Update given image
     *
     * @param mixed $image
     * @param array $pivotAttributes
     * @return Image|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */

    public function updateImage($image, $pivotAttributes = [])
    {
        if(!$image){
           return null;
        }

        if (is_string($image)){
            $image = Image::whereName($image)->first();
        }

        $this->images()->updateExistingPivot($image->id, $pivotAttributes);

        return $image;
    }

    /**
     * Delete record along with the associated images
     *
     * @return mixed
     */
    public function deleteRecord()
    {
        $this->images()->detach();

        return $this->delete();
    }
}
