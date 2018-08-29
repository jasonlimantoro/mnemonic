<?php

namespace App\Models;

use App\Traits\HasOneImage;

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
 * @property-read \App\Models\Image $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BridesBest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BridesBest whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BridesBest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BridesBest whereIgAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BridesBest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BridesBest whereTestimony($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BridesBest whereUpdatedAt($value)
 *
 */
class BridesBest extends Model
{
    use HasOneImage;

    public $filter = 'bridesbest';

    protected $with = ['image'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
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