<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\HasOneImage;
use App\Traits\PresentsField;
use App\Presenters\EventPresenter;
use Collective\Html\Eloquent\FormAccessible;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $location
 * @property \Carbon\Carbon $datetime
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $date_time_object
 * @property-read \App\Models\Image $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model filtersSearch($filters, $nameColumn = 'name')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereUpdatedAt($value)
 *
 */
class Event extends Model
{
    use FormAccessible, PresentsField, HasOneImage;

    public $filter = 'event';
	protected $dates = ['datetime'];
	protected $with = ['image'];
	protected $presenter = EventPresenter::class;


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

	public function setDatetimeAttribute($date)
	{
		if (!($date instanceof \DateTime)) {
			$date = Carbon::parse($date);
		}
		$this->attributes['datetime'] = $date;
	}

	public static function getDateTimeObjectAttribute($datestring)
	{
		if(!empty($datestring)){
			return Carbon::createFromFormat(self::$customDateFmt, $datestring);
		}
		return null;
	}

    public function isSameDate(Carbon $date)
    {
        return $date->format('Y-m-d') === $this->datetime->format('Y-m-d');
	}

    /**
     * Get the event's datetime for forms.
     *
     * @param  string  $value
     * @return string
     */
    public function formDatetimeAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
	}

	public static function byName($name)
	{
		return static::whereName($name)->first();
	}

	public static function wedding()
	{
		return static::where('name', 'like', '%wedding%')->first();
	}

    public static function holyMatrimony()
    {
        return static::where('name', 'like', '%holy%')->first();
	}

    public static function birthday()
    {
        return static::where('name', 'like', '%birthday%')->first();
    }
}
