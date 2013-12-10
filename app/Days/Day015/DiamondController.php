<?php namespace Days\Day015;

use View;
use Input;
use BaseController;
use Days\Day015\Diamond;


class DiamondController extends BaseController
{
    protected $layout = 'layouts.multipage';

    public function __construct(Diamond $diamond)
    {
        $this->diamond = $diamond;
    }

    public function index()
    {
        $this->layout->content = View::make('days.015.index')
            ->with('diamond', '');
    }

    public function store()
    {   
        $diamond = $this->diamond->build(Input::get('letter'));

        $this->layout->content = View::make('days.015.index')
            ->with('diamond', "<pre>$diamond</pre>");
    }

}
