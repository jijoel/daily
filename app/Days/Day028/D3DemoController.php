<?php namespace Days\Day028;

use View;
use BaseController;

class D3DemoController extends BaseController 
{
    protected $layout = 'layouts.multipage';
    
    public function index()
    {
        $this->layout->content = View::make('days.028.index');
    }

    public function store()
    {
    
    }
}

