<?php namespace Days\Day053;

use Auth;
use View;
use Redirect;
use Input;
use BaseController;

class DayController extends BaseController 
{
    protected $layout = 'layouts.bootstrap3';
    
    public function index()
    {
        $this->loadPageContent();
    }

    public function store()
    {
        Auth::logout();

        if (Input::get('logout'))
            return $this->loadPageContent();

        $credentials = array_only(Input::all(), ['username','password']);

        if ( ! Auth::attempt($credentials)) {
            return Redirect::route('day053.index')
                ->withInput()
                ->withErrors(array('Invalid Credentials'));
        }

        $this->loadPageContent();
    }

    public function loadPageContent()
    {
        $this->layout->content = View::make('days.053.index')
            ->with('username', Auth::check() ? Auth::user()->username : '');
    }

}

