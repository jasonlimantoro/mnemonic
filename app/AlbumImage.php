<?php

namespace App;


/**
 * App\AlbumImage
 *
 * @property-read \App\Album $album
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model filtersSearch($filters, $nameColumn = 'name')
 *
 */
class AlbumImage extends Model
{
    public function album() {
        return $this->belongsTo(Album::class);
    }
}
