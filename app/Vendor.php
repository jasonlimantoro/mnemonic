<?php

namespace App;


/**
 * App\Vendor
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vendor whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vendor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vendor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vendor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Vendor whereUpdatedAt($value)
 *
 */
class Vendor extends Model
{
    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(Category::class);
        // return $this->morphToMany(Category::class, 'categoriable');
    }
}
