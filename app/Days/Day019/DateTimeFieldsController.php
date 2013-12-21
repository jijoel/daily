<?php namespace Days\Day019;

use View;
use BaseController;

class DateTimeFieldsController extends BaseController 
{
    protected $layout = 'layouts.multipage';
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->layout->styles  = View::make('days.019.styles');
        $this->layout->js      = View::make('days.019.js');
        $this->layout->content = View::make('days.019.index');
    }
}

