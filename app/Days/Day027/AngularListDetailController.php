<?php namespace Days\Day027;

use View;
use BaseController;

class AngularListDetailController extends BaseController 
{
    
    public function index()
    {
        return View::make('days.027.index');
    }

}

