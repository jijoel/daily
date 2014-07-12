<?php namespace Days\Day045;

use View;
use Input;
use Validator;
use BaseController;

class AjaxFormController extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    protected $rules = array(
        'name' => 'required',
        'alias' => 'required',
        'nemesis' => 'required',
    );

    public function index()
    {
        $this->layout->content = View::make('days.045.index')
            ->withNemesis('Joker');
    }

    public function store()
    {
        $validation = Validator::make(Input::all(), $this->rules);
        return $validation->messages();
    }
}

