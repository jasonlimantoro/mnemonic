<?php

namespace App;

use App\Traits\PresentsField;
use App\Presenters\PostPresenter;

class Post extends Model
{
	use PresentsField;
	
	protected $presenter = PostPresenter::class;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
