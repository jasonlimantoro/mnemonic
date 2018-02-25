<?php

namespace App\Filters;

use Intervention\Image\Facades\Image;
use Intervention\Image\Filters\FilterInterface;

class GalleryFilter implements FilterInterface
{
    /**
     * Default size of filter effects
     */
    protected const DEFAULT_CANVAS_WIDTH = 2000;
    protected const DEFAULT_CANVAS_HEIGHT = 1000;

    public $canvas;


    /**
     * Creates new instance of filter
     *
     * @param integer $size
     */
    public function __construct()
    {
        $this->canvas = Image::canvas(self::DEFAULT_CANVAS_HEIGHT, self::DEFAULT_CANVAS_WIDTH);
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
            self::DEFAULT_CANVAS_WIDTH,
            self::DEFAULT_CANVAS_HEIGHT, 
            function($constraint)
            {
                $constraint->aspectRatio();
            }
        );

        return $this->canvas->insert($image, 'center');
    }
}
