<?php namespace Days\Day030;

use View;
use BaseController;

class D3TestController extends BaseController 
{
    protected $layout = 'layouts.multipage';
    
    public function index()
    {
        $this->layout->content = View::make('days.030.index');
    }
}

