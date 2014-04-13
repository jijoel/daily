<?php namespace Days\Day035;

use View;
use BaseController;

class Bootstrap3Controller extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function index()
    {
        $this->layout->content = View::make('days.035.index');
    }
}

