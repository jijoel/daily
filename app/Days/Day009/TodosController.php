<?php namespace Days\Day009;

use Days\Day009\TodoInterface;
use BaseController;
use View;
use Input;
use Validator;
use Redirect;


class TodosController extends BaseController 
{
    protected $layout = 'days.009.template';

    /**
     * Todo Repository
     *
     * @var Todo
     */
    protected $todo;

    public function __construct(TodoInterface $todo)
    {
        $this->todo = $todo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $todos = $this->todo->paginate(5);

        $this->layout->content = View::make('days.009.index', 
            compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->layout->content = View::make('days.009.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = array_only(Input::all(), array('item'));
        $validation = Validator::make($input, Todo::$rules);

        if ($validation->passes())
        {
            $this->todo->create($input);

            return Redirect::route('day009.index');
        }

        return Redirect::route('day009.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $todo = $this->todo->findOrFail($id);

        $this->layout->content = View::make('days.009.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $todo = $this->todo->find($id);

        if (is_null($todo))
        {
            return Redirect::route('day009.index');
        }

        $this->layout->content = View::make('days.009.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_only(Input::all(), array('item'));

        $validation = Validator::make($input, Todo::$rules);

        if ($validation->passes())
        {
            $todo = $this->todo->findOrFail($id);
            $todo->update($input);

            return Redirect::route('day009.show', $id);
        }

        return Redirect::route('day009.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->todo->findOrFail($id)->delete();

        return Redirect::route('day009.index');
    }

}

