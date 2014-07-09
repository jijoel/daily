<?php namespace Days\Day051;

use View;
use BaseController;

class DayController extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function __construct(SpeedTester $tester)
    {
        $this->tester = $tester;
    }

    public function index()
    {
        $this->layout->content = View::make('days.051.index')
            ->withData($this->tester->get());
    }

}

