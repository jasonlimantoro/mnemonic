<?php

namespace App\Models;

use App\Repositories\Albums;
use App\Traits\HasManyImages;

/**
 * App\Album
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album filterId($filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Album whereUpdatedAt($value)
 *
 */
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
