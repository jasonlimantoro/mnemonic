<?php

namespace App\Filters;

use Intervention\Image\Facades\Image;
use Intervention\Image\Filters\FilterInterface;

class GalleryFilter implements FilterInterface
{
    /**
     * Default size of filter effects
     */
    const DEFAULT_CANVAS_WIDTH = 2000;
    const DEFAULT_CANVAS_HEIGHT = 1000;


    /**
     * Creates new instance of filter
     *
     * @param integer $size
     */
    public function __construct(
        $canvasWidth = self::DEFAULT_CANVAS_WIDTH, 
        $canvasHeight = self::DEFAULT_CANVAS_HEIGHT
    )
    {
        $this->canvasWidth = $canvasWidth;
        $this->canvasHeight = $canvasHeight;
        $this->canvas = Image::canvas($canvasWidth, $canvasHeight);
    }

    /**
     * Applies filter effects to given image
     *
     * @param  \Intervention\Image\Image $image
     * @return \Intervention\Image\Image
     */
    public function applyFilter(\Intervention\Image\Image $image)
    {

        $image->resize($this->canvasWidth, $this->canvasHeight, function($constraint){
            $constraint->aspectRatio();
        });

        return $this->canvas->insert($image, 'center');
    }
}
