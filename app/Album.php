<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AlbumImage;

class Album extends Model
{
    public function image(){
        return $this->hasMany(AlbumImage::class);
    }
}
