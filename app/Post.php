<?php

namespace App;

use App\Traits\HasOneImage;
use App\Traits\PresentsField;
use App\Presenters\PostPresenter;

/**
 * App\Post
 *
 * @property int $id
 * @property int $user_id
 * @property int $page_id
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Image $image
 * @property-read \App\Page $page
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUserId($value)
 *
 */
class Post extends Model
{
	use PresentsField, HasOneImage;

	public $presenter = PostPresenter::class;
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
}
