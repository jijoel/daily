<?php namespace Days\Support;

use Config;
use Request;


class DayComposer
{
    const DAY_NUMBER = 0;
    const DAY_TITLE  = 1;
    const DAY_PATH   = 2;

    public function compose($view)
    {
        $evt = $view->getEnvironment();
        $day = $evt->shared('day');
        $dayTitle = $evt->shared('dayTitle');

        if ($day && $dayTitle) {
            return;
        }

        $info = $this->getInfoForToday();

        if (! $day) {
            $view->with('day', $info[self::DAY_NUMBER]);
        } 
        if (! $dayTitle) {
            $view->with('dayTitle', $info[self::DAY_TITLE]);
        } 
    }

    /**
     * Returns the configuration settings for the current day
     * (based on the current day path)
     */
    protected function getInfoForToday()
    {
        $allDays = Config::get('days');
        $page = Request::segment(1);

        // return the first item with the correct path
        return array_first($allDays, function($key, $value) use ($page)
        {
            return $value[self::DAY_PATH] == $page;
        });
    }

}

