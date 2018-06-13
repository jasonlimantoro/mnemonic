<?php


namespace App\Presenters;

use Carbon\Carbon;

class EventPresenter extends BasePresenter
{

    /**
     * @var string
     */
    public static $customDateFmt ='l - M jS, Y';  // Friday - October 20th 20:00, 2017

    /**
     * Get distinct datetime field
     *
     * @return array
     */
    public function getDistinctDate()
    {
		return $this->distinct()
			->pluck('datetime')
            ->toArray();
	}

    /**
     * Datetime to be displayed in frontend
     *
     * @return string
     */
    public function prettyDatetime()
    {
        return Carbon::parse($this->datetime)
            ->format(static::$customDateFmt);
	}

    /**
     * Get the time units to be displayed in frontend
     *
     * @return mixed
     */
    public function time()
    {
        return $this->datetime->format('H:i');
	}

    /**
     * All data grouped by datetime displayed in frontend
     *
     * @return array
     */
    public function displayEventsGroupByDate()
    {
		$dates = $this->getDistinctDate();
		$result = [];

        foreach ($dates as $date){
			$parsed = Carbon::parse($date)
                ->format(static::$customDateFmt);

			$queries = static::all()
                ->filter->isSameDate($date);

			$result[$parsed] = $queries;
        }

        return $result;
    }
}