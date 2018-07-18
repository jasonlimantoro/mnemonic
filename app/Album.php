<?php

namespace App;

use App\Repositories\Albums;
use App\Traits\HasManyImages;

class Album extends Model
{
    use HasManyImages;

    public $repo;

    public $filter = 'gallery';

    protected $with = ['images'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->repo = new Albums;
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function featuredImage()
    {
        return $this
            ->images()
            ->where('featured', 1)
            ->first();
    }

    public function scopeFilterId($query, $filters)
    {
        if (!empty($filters) && $id = $filters['album']) {
            $query->find($id);
        }
    }

    public function uncategorizeImages()
    {
        foreach ($this->images as $image){
            $image->featured = 0;
            $this->repo->uncategorized()->images()->save($image);
        }

        return $this;
    }


    public function addFeaturedImage($file)
    {
        if (! $file) {
            return null;
        }

        $this->removeFeaturedImage();

        $imageAttr = [
            'file_name' => $file,
            'url_asset' => url("uploads/${file}"),
            'url_cache' => url("imagecache/" . $this->filter . "/${file}"),
        ];

        $image = Image::where($imageAttr)->first();

        $image->featured = 1;

        $image->imageable()->associate($this);

        $image->save();

        return $this;
    }

    public function hasFeaturedImage()
    {
        return !is_null($this->featuredImage());
    }

    public function removeFeaturedImage()
    {
        if ($this->hasFeaturedImage()) {
            $this->featuredImage()
                 ->update(['featured' => 0]);
        }
        return $this;
	}
}
