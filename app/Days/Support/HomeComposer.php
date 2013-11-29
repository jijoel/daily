<?php namespace Days\Support;

use Config;

class HomeComposer
{

    public function compose($view)
    {
        $days = Config::get('days');
        $view->with('days', $days);
    }

}
 
