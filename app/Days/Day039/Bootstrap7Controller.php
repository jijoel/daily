<?php namespace Days\Day039;

use URL;
use View;
use Input;
use Redirect;
use Validator;
use BaseController;

class Bootstrap7Controller extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';

    protected $rules = array(
        'first' => array(
            'f1' => 'required',
            'f2' => 'required|min:2',
            'f3' => 'required',
        ),
        'second' => array(
            'f1' => 'required|min:4|max:6',
        ),
    );
    
    public function index()
    {
        $url = URL::action('Days\Day039\Bootstrap7Controller@store');
        $this->layout->content = View::make('days.039.index')->withUrl($url);
    }

    public function show($page)
    {
        $url = URL::action('Days\Day039\Bootstrap7Controller@store');
        return View::make("days.039.$page")->withUrl($url);
    }

    public function store()
    {
        $page = Input::get('page');
        if (!$this->rules[$page])
            return;

        $valid = Validator::make(Input::get($page), $this->rules[$page]);

        return Redirect::to(URL::action('Days\Day039\Bootstrap7Controller@show', $page))
            ->withInput()->withErrors($valid);
    }

}

