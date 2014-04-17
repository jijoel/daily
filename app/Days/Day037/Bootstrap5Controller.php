<?php namespace Days\Day037;

use View;
use BaseController;

class Bootstrap5Controller extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function index()
    {
        $this->layout->content = View::make('days.037.index');
    }

    public function store()
    {
    
    }
}

