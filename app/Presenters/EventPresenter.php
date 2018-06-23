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
     * Get the time units html markup to be displayed in frontend
     *
     * @return string
     */
    public function time()
    {
        $time = $this->datetime->format('Hi');
        $min = "<span class='time'>$time[0]</span>";
        $min .= "<span class='time'>$time[1]</span>";

        $sec = "<span class='time'>$time[2]</span>";
        $sec .= "<span class='time'>$time[3]</span>";

        return $min . ':' . $sec;

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