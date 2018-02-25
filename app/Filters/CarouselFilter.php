<?php

namespace App\Filters;

use Intervention\Image\Facades\Image;
use Intervention\Image\Filters\FilterInterface;

class CarouselFilter extends GalleryFilter
{
    public function applyFilter(\Intervention\Image\Image $image)
    {
        $image->resize(
            parent::DEFAULT_CANVAS_WIDTH, 
            parent::DEFAULT_CANVAS_HEIGHT,
            function($constraint)
            {
                $constraint->aspectRatio();
                $constraint->upsize();
            }
        );

        return $this->canvas->insert($image, 'center');
    }
}
