<?php

namespace App;

use App\Traits\HasManyImages;

/**
 * App\Carousel
 *
 * @property int $id
 * @property int $page_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
 * @property-read \App\Page $page
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Carousel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Carousel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Carousel wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Carousel whereUpdatedAt($value)
 *
 */
class Carousel extends Model
{
    use HasManyImages;

    public $filter = 'gallery';

	public function images(){
		return $this->morphMany(Image::class, 'imageable');
	}
    
    public function page(){
        return $this->belongsTo(Page::class);
    }
}
