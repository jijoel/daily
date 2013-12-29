<?php namespace Days\Day022;

use View;
use Session;
use Redirect;
use BaseController;
use Days\Day022\FactorsAdapter;


class FactorsController extends BaseController 
{
    protected $layout = 'layouts.multipage';
    private $factors;

    public function __construct()
    {
        $this->factors = new FactorsAdapter($this);
    }

    public function index()
    {
        $factors = Session::get('factors') ?: array();

        $this->layout->content = View::make('days.022.index')
            ->withFactors($factors);
    }

    public function store()
    {
        return $this->factors->make();
    }

    public function makeFailed($validator)
    {
        return Redirect::route('day022.index')
            ->withInput()
            ->withErrors($validator->errors());
    }

    public function makeSucceeded($factors)
    {
        return Redirect::route('day022.index')
            ->withFactors($factors)
            ->withInput();
    }

}

