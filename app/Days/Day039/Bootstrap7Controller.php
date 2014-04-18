<?php namespace Days\Day039;

use View;
use BaseController;

class Bootstrap7Controller extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function index()
    {
        $this->layout->content = View::make('days.039.index');
    }

    public function store()
    {
        return 'foo';
    }

}

