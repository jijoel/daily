<?php namespace Days\Day021;

use View;
use Input;
use Redirect;
use Validator;
use Session;
use BaseController;

class ColorChartsController extends BaseController 
{
    protected $layout = 'layouts.multipage';

    public function index()
    {
        $chart = Session::get('chart') ?: array();

        $this->layout->content = View::make('days.021.index')
            ->withChart($chart);
    }

    public function store()
    {
        $rules = array(
            'colors' => 'required|max:4|regex:"^[0-9A-Fa-f]+$"',
        );

        $validator = Validator::make(Input::all(), $rules);

        if (! $validator->passes()) {
            return Redirect::route('day021.index')
                ->withInput()
                ->withErrors($validator->errors());
        }

        return Redirect::route('day021.index')
            ->withInput()
            ->withChart(array(array('foo', 'bar')));
    }
}

