<?php

namespace App;

use Carbon\Carbon;
use App\Traits\FiltersSearch;
use Collective\Html\Eloquent\FormAccessible;

class Event extends Model
{
    use FormAccessible, FiltersSearch;
    protected $dates = ['datetime'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getDatetimeAttribute($date)
    {
        return Carbon::parse($date)->format('l - M jS, Y'); // Friday - October 20th, 2017
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

    public function setDatetimeAttribute($date)
    {
        if (!($date instanceof \DateTime)) {
            $date = Carbon::parse($date);
        }
        $this->attributes['datetime'] = $date;
    }
}
