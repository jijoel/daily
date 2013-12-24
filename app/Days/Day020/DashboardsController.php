<?php namespace Days\Day020;

use View;
use BaseController;

class DashboardsController extends BaseController 
{
    protected $layout = 'layouts.multipage';
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->layout->content = View::make('days.020.index');
    }
}

