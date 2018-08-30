<?php

namespace App\Models;

use App\Traits\UploadsImage;


/**
 * App\Image
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $featured
 * @property string|null $caption
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $imageable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ whereCaption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ whereUpdatedAt($value)
 */
class Image extends Model
{
    use UploadsImage;

    public function albums()
    {
        return $this->morphedByMany(Album::class, 'imageable')->withPivot('featured');
    }

    public function bridesBests()
    {
        return $this->morphedByMany(BridesBest::class, 'imageable');
    }

    public function carousels()
    {
        return $this->morphedByMany(Carousel::class, 'imageable');
    }

    public function events()
    {
        return $this->morphedByMany(Event::class, 'imageable');
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'imageable');
    }

    public function isFeatured()
    {
        return $this->albums()->first()->pivot->featured === '*';
    }

    public function urlCache($template = "original")
    {
        return url(config('imagecache.route') . "/" . $template . "/" . $this->name);
    }
}
