<?php namespace Days\Day021;

use View;
use Input;
use BaseController;

class ColorChartsController extends BaseController 
{
    protected $layout = 'layouts.multipage';
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->layout->content = View::make('days.021.index');
    }

    public function store()
    {
        var_dump(Input::all());
    }
}

