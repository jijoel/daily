<?php namespace Days\Day026;

use View;
use Redirect;
use Session;
use BaseController;
use Days\Day026\AngularTodoAdapter;

class AngularTodoController extends BaseController 
{
    private $adapter;

    public function __construct()
    {
        $this->adapter = new AngularTodoAdapter($this);
    }
    
    public function index()
    {
        return View::make('days.026.index');
    }

    public function indexApi()
    {
        return $this->adapter->index();
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

