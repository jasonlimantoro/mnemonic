<?php

namespace App\Models;

use App\Traits\HasImages;

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
    use HasImages;

    const DEFAULT_NAME = 'Uncategorized';


    public static function default()
    {
        return new self(['name' => self::DEFAULT_NAME]);
    }

    public function isDefault()
    {
        return $this->name === self::DEFAULT_NAME;
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function featuredImage()
    {
        return $this->images()->where('featured', '*')->first();
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
            $image->update([
                'album_id' => null,
                'featured' => null,
            ]);
        }
        return $this;
    }


    /**
     * Add featured image for this album
     *
     * @param string|Image $image
     * @return $this|null
     */
    public function addFeaturedImage($image)
    {
        if (! $image) {
            return null;
        }

        $this->removeFeaturedImage();

        if (is_string($image)){
            $image = Image::whereName($image)->first();
        }

        $this->addImage($image, ['featured' => '*']);

        return $this;
    }

    public function hasFeaturedImage()
    {
        return !is_null($this->featuredImage());
    }

    public function removeFeaturedImage()
    {
        if($image = $this->featuredImage()){
            $image->featured = null;
            $image->save();
        }
        return $this;
	}

	public function addImage(Image $image, $attr = [])
    {
        $this->images()->save($image);

        $image->update($attr);

        return $image;
    }
}
