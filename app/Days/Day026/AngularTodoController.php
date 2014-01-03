<?php namespace Days\Day026;

use View;
use Input;
use Redirect;
use Response;
use Session;
use BaseController;
use Validator;
use Days\Day026\TodoInterface;

class AngularTodoController extends BaseController 
{
    private $todos;

    public function __construct(TodoInterface $todos)
    {
        $this->todos = $todos;
    }
    
    public function getContainer()
    {
        return View::make('days.026.index');
    }

    public function index()
    {
        return $this->todos->all();
    }

    public function store()
    {
        $rules = array('todo' => 'required|max:80');
        $v = Validator::make(Input::all(), $rules);

        if ($v->passes()) {
            return $this->todos->create(array('item'=>Input::get('todo')));
        }
        return Response::make($v->errors(), 400);
    }

    public function destroy($id)
    {
        $found = $this->todos->findOrFail($id);
        $found->delete();
    }
}

