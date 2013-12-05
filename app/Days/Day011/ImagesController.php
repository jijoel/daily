<?php namespace Days\Day011;

use BaseController;
use View;
use Input;
use Validator;
use Redirect;
use Days\Day009\TodosAdapterInterface;


class ImagesController extends BaseController 
{
    protected $layout = 'layouts.main';

    public function index()
    {
        $this->layout->content = View::make('days.011.index');
        $this->layout->css = View::make('days.011.css');
        $this->layout->js = View::make('days.011.js');
    }
}
