<?php namespace Days\Day020;

use Auth;


class IndexComposer
{
    public function compose($view)
    {
        $view->with('authInfo', $this->getAuthMessage());
        $view->nest('subcontent', $this->getDashboard());
    }

    public function getAuthMessage()
    {
        if (Auth::guest()) {
            return "Please try logging in with users foo, bar, bazz, or buzz (password 'test').";
        }

        $user = Auth::user()->username;
        return "You are logged in as {$user} (<a href='/day020/logout'>log out</a>)";
    }

    public function getDashboard()
    {
        if (Auth::guest()) {
            return 'days.020.login';
        }

        return 'days.020.dashboard';
    }
}

