<?php namespace Days\Day046;

use View;
use Input;
use BaseController;

class DayController extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function __construct(HeroForm $form)
    {
        $this->form = $form;
    }

    public function index()
    {
        $this->layout->content = View::make('days.046.index');
    }

    public function store()
    {
        $this->form->validate(Input::all());
        return '';    // TODO: Change to success state and success message
    }
}

