<?php namespace Days\Day026;

use View;
use Redirect;
use Session;
use BaseController;
use Days\Day026\TodoInterface;

class AngularTodoController extends BaseController 
{
    private $todos;

    public function __construct(TodoInterface $todos)
    {
        $this->todos = $todos;
    }
    
    public function index()
    {
        return View::make('days.026.index');
    }

    public function indexApi()
    {
        return $this->todos->all();
    }

    public function store()
    {
    }

}

