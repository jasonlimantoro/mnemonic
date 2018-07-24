<?php

namespace App;

use Carbon\Carbon;
use App\Traits\HasOneImage;
use App\Traits\PresentsField;
use App\Presenters\EventPresenter;
use Collective\Html\Eloquent\FormAccessible;

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

    public static function birthday()
    {
        return static::where('name', 'like', '%birthday%')->first();
    }
}
