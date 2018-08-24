<?php

namespace App\Models;

use App\Traits\HasManyImages;

/**
 * App\Carousel
 *
 * @property int $id
 * @property int $page_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property-read \App\Models\Page $page
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Carousel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Carousel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Carousel wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Carousel whereUpdatedAt($value)
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
