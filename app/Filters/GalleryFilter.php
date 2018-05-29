<?php

namespace App\Filters;

use Intervention\Image\Facades\Image;
use Intervention\Image\Filters\FilterInterface;

class GalleryFilter implements FilterInterface
{
    public $canvas;
    public $width;
    public $height;

    /**
     * Creates new instance of filter
     *
     */
    public function __construct($width = 2000, $height = 1000)
    {
        $this->width = $width;
        $this->height = $height;
        $this->canvas = Image::canvas($this->width, $this->height);
    }

    /**
     * Applies filter effects to given image
     *
     * @param  \Intervention\Image\Image $image
     * @return \Intervention\Image\Image
     */
    public function applyFilter(\Intervention\Image\Image $image)
    {
        $image->resize(
            $this->width,
            $this->height,
            function ($constraint) {
                $constraint->aspectRatio();
            }
        );

        return $this->canvas->insert($image, 'center');
    }
}
