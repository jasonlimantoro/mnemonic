<?php

namespace App\Models;


/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Carousel $carousel
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereUpdatedAt($value)
 *
 */
class Page extends Model
{
    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function carousel(){
        return $this->hasOne(Carousel::class);
    }

    public static function home()
    {
        return static::where('title', 'like', '%home%')->first();
    }
    public static function about()
    {
        return static::where('title', 'like', '%about%')->first();
    }

    /**
     * Add a post to given page, with associated user
     *
     * @param array $attributes
     * @return Post
     */
    public function addPost(array $attributes) {
		$attributes['user_id'] = auth()->user()->id;
		return $this->posts()->create($attributes);
    }
}
