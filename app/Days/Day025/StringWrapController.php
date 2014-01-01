<?php namespace Days\Day025;

use View;
use Redirect;
use Session;
use BaseController;
use Days\Day025\StringWrapAdapter;

class StringWrapController extends BaseController 
{
    protected $layout = 'layouts.multipage';
    private $adapter;

    public function __construct()
    {
        $this->adapter = new StringWrapAdapter($this);
    }
    
    public function index()
    {
        $string_wrap = Session::get('string_wrap') ?: '';

        $this->layout->content = View::make('days.025.index')
            ->with('string_wrap', $string_wrap);
    }

    public function store()
    {
        return $this->adapter->store();
    }

    public function storeFailed($errors)
    {
        return Redirect::route('day025.index')
            ->withInput()
            ->withErrors($errors);
    }

    public function storeSucceeded($result)
    {
        return Redirect::route('day025.index')
            ->with('string_wrap', $result)
            ->withInput();
    }

}

