<?php
namespace App;

use App\Image;

class Couple extends Model
{
	// custom table name
	protected $table = 'couple';
	
	public function image(){
		return $this->hasOne(Image::class);
	}
}
