<?php namespace Days\Day026;

use View;
use Redirect;
use Session;
use BaseController;
use Days\Day026\AngularTodoAdapter;

class AngularTodoController extends BaseController 
{
    protected $layout = 'layouts.multipage';
    private $adapter;

    public function __construct()
    {
        $this->adapter = new AngularTodoAdapter($this);
    }
    
    public function index()
    {
        $result = Session::get('result') ?: '';
        // $result = Session::get('result') ?: array();

        $this->layout->content = View::make('days.026.index')
            ->with('result', $result);
    }

    public function store()
    {
        return $this->adapter->store();
    }

    public function storeFailed($errors)
    {
        return Redirect::route('day026.index')
            ->withInput()
            ->withErrors($errors);
    }

    public function storeSucceeded($result)
    {
        return Redirect::route('day026.index')
            ->with('result', $result)
            ->withInput();
    }

}

