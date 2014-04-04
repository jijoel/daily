<?php namespace Days\Day033;

use View;
use BaseController;

class Bootstrap1Controller extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function index()
    {
        $this->layout->content = View::make('days.033.index');
    }

    public function store()
    {
    
    }
}

