<?php namespace Days\Day041;

use View;
use BaseController;

class Bootstrap9Controller extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function index()
    {
        $this->layout->content = View::make('days.041.index');
    }

}

