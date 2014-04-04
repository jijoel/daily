<?php namespace Days\Day033;

use View;
use BaseController;
use Validator;
use Input;
use Redirect;

class Bootstrap1Controller extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function index()
    {
        $this->layout->content = View::make('days.033.index');
    }

    public function store()
    {
        $rules = array(
            'builder' => array(
                'name1' => 'required',
                'email1' => 'required|email',
                'message1' => 'required',
            ),
            'manual' => array(
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ),
        );
        $set = (null !== Input::get('name1')) ? 'builder' : 'manual';

        $v = Validator::make(Input::all(), $rules[$set]);
        if ($v->fails()) {
            return Redirect::back()->withInput()->withErrors($v);
        }

        return Redirect::back()->withSuccess('Your message has been validated');
    }
}

