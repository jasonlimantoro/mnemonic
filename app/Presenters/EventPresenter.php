<?php


namespace App\Presenters;

use Carbon\Carbon;

class EventPresenter extends BasePresenter
{
	public static $customDateFmt ='l - M jS, Y';  // Friday - October 20th 20:00, 2017

    public function getDistinctDate()
    {
		return $this->distinct()
			->pluck('datetime')
            ->toArray();
	}

    public function prettyDatetime()
    {
        return Carbon::parse($this->datetime)->format(self::$customDateFmt);
	}
	
	public function prettyDate($dateObj)
	{
		return Carbon::parse($dateObj)->format(self::$customDateFmt);
	}

    public function displayEventsGroupByDate()
    {
		$dates = $this->getDistinctDate();
		$result = [];

        foreach ($dates as $date){
			$parsed = $this->prettyDate($date);
			$queries = static::whereDatetime($date)->get()->toArray();
			$result[$parsed] = $queries;

        }

        return $result;
    }
}