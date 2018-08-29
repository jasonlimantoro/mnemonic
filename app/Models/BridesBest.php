<?php

namespace App\Models;

use App\Traits\HasManyImages;

/**
 * App\BridesBest
 *
 * @property int $id
 * @property string $name
 * @property string $testimony
 * @property string $ig_account
 * @property string $gender
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BridesBest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BridesBest whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BridesBest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BridesBest whereIgAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BridesBest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BridesBest whereTestimony($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BridesBest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BridesBest extends Model
{
    use HasManyImages;

    protected $with = ['images'];

    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }

    public function image()
    {
        return $this->images()->first();
    }

    public static function bridesMaid()
    {
        return static::whereGender('female')->get();
    }

    public static function bestMen()
    {
        return static::whereGender('male')->get();
    }
}
