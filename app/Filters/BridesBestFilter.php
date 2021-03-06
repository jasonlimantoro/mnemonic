<?php

namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class BridesBestFilter implements FilterInterface
{
    const DEFAULT_WIDTH = 200;
    const DEFAULT_HEIGHT = 200;

    /**
     * Creates new instance of filter
     *
     */
    public function __construct($width = null, $height = null)
    {
        $this->width = is_numeric($width) ? intval($width) : self::DEFAULT_WIDTH;
        $this->height = is_numeric($height) ? intval($height) : self::DEFAULT_HEIGHT;
    }

    /**
     * Applies filter effects to given image
     *
     * @param  \Intervention\Image\Image $image
     * @return \Intervention\Image\Image
     */
    public function applyFilter(Image $image)
    {
		$image->fit(200, null, function($constraint){
			$constraint->upsize();
		});

        return $image;
    }
}
