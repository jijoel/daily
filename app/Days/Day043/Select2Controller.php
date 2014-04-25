<?php namespace Days\Day043;

use View;
use BaseController;

class Select2Controller extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function index()
    {
        $this->layout->content = View::make('days.043.index');
    }

    public function store()
    {
    
    }
}

