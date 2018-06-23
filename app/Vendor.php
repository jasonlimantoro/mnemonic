<?php

namespace App;


class Vendor extends Model
{
    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(Category::class);
        // return $this->morphToMany(Category::class, 'categoriable');
    }
}
