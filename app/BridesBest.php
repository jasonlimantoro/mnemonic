<?php

namespace App;

use App\Traits\HasOneImage;

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
