<?php namespace Days\Day036;

use View;
use BaseController;

class Bootstrap4Controller extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function index()
    {
        $this->layout->content = View::make('days.036.index');
    }
}

