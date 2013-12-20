<?php namespace Days\Day018;

use View;
use Input;
use BaseController;
use Days\Day018\State;


class AjaxFieldController extends BaseController
{
    protected $layout = 'layouts.multipage';
    protected $states;

    public function __construct(State $state)
    {
        $this->states = $state;
    } 

    public function index()
    {
        $this->layout->js = View::make('days.018.js');
        $this->layout->styles = View::make('days.018.css');
        $this->layout->content = View::make('days.018.index');
    }

    public function getStates()
    {
        $term = Input::get('term');
        $results = $this->states->where('state_name', 'like', "%{$term}%")->get();

        return $results;
    }

}