<?php namespace Days\Day029;

use View;
use BaseController;

class AngularGridController extends BaseController 
{
    protected $layout = 'layouts.angular';
    
    public function getContainer()
    {
        View::share('ngApp', 'GridApp');
        $this->layout->content = View::make('days.029.index');
    }

}

