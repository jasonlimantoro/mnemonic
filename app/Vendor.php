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

    public function updateValue(array $attributes = [])
    {
        $this->update(['name' => $attributes['name']]);
        $this->category()->associate($attributes['category'])->save();
    }

    public static function createVendor(array $attributes = [])
    {
        static::create(['name' => $attributes['name']])
                ->category()
                ->associate($attributes['category'])
                ->save();
    }
}
