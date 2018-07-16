<?php

namespace App;

use App\Traits\PresentsField;
use App\Presenters\PostPresenter;

class Post extends Model
{
	use PresentsField;
	
	protected $presenter = PostPresenter::class;
	public $filter = 'post';

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

    public function addImage($file)
    {
        if ($file) {
            return $this->image()->updateOrCreate([
                'file_name' => $file,
                'url_asset' => url("uploads/${file}"),
                'url_cache' => url("imagecache/" . $this->filter . "/${file}"),
            ]);
        }

        return null;
    }
}
