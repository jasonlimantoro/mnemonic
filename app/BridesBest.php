<?php

namespace App;

use Illuminate\Http\Request;
use App\Filters\BridesBestFilter;

class BridesBest extends Model
{
    protected $with = ['image'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public static function createRecord(Request $request)
    {
        $bridesBest = static::create($request->only(['name', 'testimony', 'ig_account', 'gender']));
        optional(Image::handleUpload($request, BridesBestFilter::class, 'bridesbest'))->addTo($bridesBest);
    }

    public function updateRecord(Request $request)
    {
        $this->update($request->only(['name', 'testimony', 'ig_account', 'gender']));
        optional(Image::handleUpload($request, BridesBestFilter::class, 'bridesbest'))->addTo($this);
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
