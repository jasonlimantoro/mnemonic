<?php

namespace App;


/**
 * App\Category
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Vendor $vendor
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 *
 */
class Category extends Model
{

    public function vendor()
    {
        return $this->hasOne(Vendor::class);
        // return $this->morphedByMany(Vendor::class, 'categoriable');
	}
	
	public function addVendor($attributes = [])
	{
		return $this->vendor()->create($attributes);
	}
}
