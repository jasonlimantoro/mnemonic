<?php

namespace App;

use Carbon\Carbon;
use App\Traits\FiltersSearch;
use Collective\Html\Eloquent\FormAccessible;

class Event extends Model
{
    use FormAccessible, FiltersSearch;
	protected $dates = ['datetime'];

	public static $customDateFmt ='l - M jS H:i, Y';  // Friday - October 20th 20:00, 2017

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getDatetimeAttribute($date)
    {
        return Carbon::parse($date)->format(self::$customDateFmt);
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
		return Carbon::createFromFormat(self::$customDateFmt, $datestring);
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
}
