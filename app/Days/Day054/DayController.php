<?php namespace Days\Day054;

use View;
use Input;
use BaseController;
use Days\Support\DateRange;


class DayController extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function index()
    {
        return $this->showContent();
    }

    public function store()
    {
        return $this->showContent();
    }

    private function showContent()
    {
        $dates = $this->getInputDates();

        $this->layout->content = View::make('days.054.index')
            ->with(compact('dates'));
    }

    protected function getInputDates()
    {
        if (Input::has('date'))
            return new DateRange(Input::get('date'));
        
        return new DateRange(Input::get('start'), Input::get('end'));
    }

}

