<?php namespace Days\Support;

use Config;
use Request;


class DayComposer
{
    const DAY_NUMBER = 0;
    const DAY_PATH   = 1;
    const DAY_TITLE  = 2;

    protected $view;
    protected $cachedConfigSettings;

    public function compose($view)
    {
        $this->view = $view;

        $this->loadPropertyFromConfig('day', self::DAY_NUMBER);
        $this->loadPropertyFromConfig('dayTitle', self::DAY_TITLE);
    }

    protected function loadPropertyFromConfig($name, $configField)
    {
        // $evt = $this->view->getEnvironment();

        // if( $evt->shared($name)){
        //     return;
        // }

        $this->view->with(
            $name, 
            $this->getConfigField($configField)
        );
    }

    protected function getConfigField($field)
    {
        $settings = $this->getConfigSettingsForCurrentDay();
        
        return $settings[$field];
    }

    /**
     * Returns configuration settings for the current day
     * (based on the current day path)
     */
    protected function getConfigSettingsForCurrentDay()
    {
        $allDays = Config::get('days');
        $page = Request::segment(1);

        // return the first item with the correct path
        return array_first(
            $allDays, 
            function($key, $value) use ($page)
        {
            return $value[self::DAY_PATH] == $page;
        });
    }

}

