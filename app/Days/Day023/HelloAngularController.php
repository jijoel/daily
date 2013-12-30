<?php namespace Days\Day023;

use View;
use Blade;
use BaseController;

class HelloAngularController extends BaseController 
{
    
    public function index()
    {
        return View::make('days.023.index');
    }

}

