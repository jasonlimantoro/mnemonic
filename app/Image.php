<?php

namespace App;

use App\Traits\UploadsImage;
use App\Repositories\Albums;


/**
 * App\Image
 *
 * @property int $id
 * @property string $file_name
 * @property string $url_asset
 * @property string $url_cache
 * @property int $featured
 * @property string|null $caption
 * @property int $imageable_id
 * @property string $imageable_type
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $imageable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereCaption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereImageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereImageableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereUrlAsset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereUrlCache($value)
 *
 */
class Image extends Model
{
	use UploadsImage;

	protected $albums;
	
	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);
		$this->albums = new Albums;
	}

	public function imageable(){
		return $this->morphTo();
	}

	public function album()
    {
		if ($this->imageable instanceof Album){
			return $this->imageable;
		}
		return null;
	}

    public function isFeatured()
    {
        return $this->featured;
	}

	/**
	 * Assign image with given attributes to Uncategorized Album
	 * 
	 * @param  array $attributes
	 * @return void
	 * 
	 */
	public function assignToUncategorizedAlbum(array $attributes)
	{
		$this->albums->uncategorized()
			   		->images()
			   		->create($attributes);
	}

	public static function byName($name)
	{
		return static::where('file_name', $name)->firstOrFail();
	}
}
