<?php

namespace App;

use App\Traits\Presentable;
use App\Presenters\PostPresenter;

class Post extends Model
{
	use Presentable;
	
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
