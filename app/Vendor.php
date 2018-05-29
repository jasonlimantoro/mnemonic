<?php

namespace App;

use App\Traits\FiltersSearch;

class Vendor extends Model
{
    use FiltersSearch;

    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(Category::class);
        // return $this->morphToMany(Category::class, 'categoriable');
    }
}
