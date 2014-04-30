<?php namespace Days\Day047;

use View;
use BaseController;

class DayController extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function index()
    {
        $this->layout->content = View::make('days.047.index');
    }

    public function store() {}
}

