<?php namespace Days\Day020;

use Auth;


class DashboardsComposer
{
    public function compose($view)
    {
        $view->with('user', Auth::user());
    }
}

