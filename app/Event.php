<?php

namespace App;

use Carbon\Carbon;
use App\Traits\FiltersSearch;
use Collective\Html\Eloquent\FormAccessible;

class Event extends Model
{
    use FormAccessible, FiltersSearch;
	protected $dates = ['datetime'];
	protected $with = ['image'];

	public static $customDateFmt ='l - M jS, Y H:i';  // Friday - October 20th 20:00, 2017

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
		if(!empty($datestring)){
			return Carbon::createFromFormat(self::$customDateFmt, $datestring);
		}
		return null;
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

    public static function getDistinctDate()
    {
        return static::distinct()
                       ->pluck('datetime')
                       ->toArray();
	}

    public static function processDistinctDate(array $dates)
    {
       $result = [];

       foreach ($dates as $date){
           $parsed = static::getDateTimeObjectAttribute($date);
           $queries = static::whereDatetime($parsed)->get()->toArray();
           $result[$date] = $queries;
       }

       return $result;
	}

	public static function groupByDate()
    {
        return static::
            selectRaw('datetime, count(*) occurrences')
            ->groupBy('datetime')
            ->orderByRaw('min(datetime) desc')
            ->get()
            ->toArray();
    }
}
