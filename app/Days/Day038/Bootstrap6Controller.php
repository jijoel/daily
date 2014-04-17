<?php namespace Days\Day038;

use View;
use BaseController;

class Bootstrap6Controller extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function index()
    {
        $this->layout->content = View::make('days.038.index');
    }

    public function store()
    {
    
    }
}

