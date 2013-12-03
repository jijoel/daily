<?php namespace Days\Day010;

use View;
use BaseController;


class FontController extends BaseController
{
    public function index()
    {
        return View::make('days/010/fun');
    }
}