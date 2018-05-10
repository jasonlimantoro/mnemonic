<?php
namespace App;

use Illuminate\Http\Request;

class Couple extends Model
{
	// custom table name
	protected $table = 'couple';
	// no timestamps is needed
	public $timestamps = false;
	
	// eager load
	protected $with = ['image'];

	public function image(){
		return $this->morphOne(Image::class, 'imageable');
	}

	public static function groom()
	{
		return static::where('gender', 'male')->first();
	}

	public static function bride()
	{
		return static::where('gender', 'female')->first();
	}

	public function updateRecord(Request $request)
	{
        optional(Image::handleUpload($request))->addTo($this);
        $this->update(
            $request->only(['name', 'father', 'mother'])
        );
	}
}
