<?php
namespace App;

use App\Image;

class Couple extends Model
{
	// custom table name
	protected $table = 'couple';

	// no timestamps is needed
	public $timestamps = false;
	
	public function image(){
		return $this->hasOne(Image::class);
	}
}
