<?php namespace Days\Day024;

use View;
use BaseController;

class AngularShowHideController extends BaseController 
{
    public function index()
    {
        return View::make('days.024.index');
    }
}

