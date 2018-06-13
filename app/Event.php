<?php

namespace App;

use App\Presenters\EventPresenter;
use Carbon\Carbon;
use App\Traits\Presentable;
use App\Traits\FiltersSearch;
use Collective\Html\Eloquent\FormAccessible;

class Event extends Model
{
    use FormAccessible, FiltersSearch, Presentable;

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

	public static function getTimeDigit($dt, $unit)
	{
		if(empty($dt)){
			return null;
		}
		switch ($unit) {
			case 'hour':
				$digit = str_split($dt->hour);
				break;
			
			case 'minute':
				$digit = str_split($dt->minute);
				break;
			
			default:
				$digit = [];
		}
		if (count($digit) === 1 ) {
			// prepend 0
			array_unshift($digit, '0');	
		}
		return $digit;
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
}
