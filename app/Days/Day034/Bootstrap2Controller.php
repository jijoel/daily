<?php namespace Days\Day034;

use View;
use BaseController;
use Validator;
use Input;
use Redirect;

class Bootstrap2Controller extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function index()
    {
        $this->layout->content = View::make('days.034.index');
    }

    public function store()
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        );

        $v = Validator::make(Input::all(), $rules);
        if ($v->fails()) {
            return Redirect::back()->withInput()->withErrors($v);
        }

        return Redirect::back()->withInput()
            ->withSuccess('The form has been successfully validated.');
    
    }
}

