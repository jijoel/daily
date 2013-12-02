<?php namespace Days\Day009;

use BaseController;
use View;
use Input;
use Validator;
use Redirect;
use Days\Day009\TodosAdapterInterface;


class TodosController extends BaseController 
{
    protected $layout = 'days.009.template';

    /**
     * Todo Repository
     *
     * @var Todo
     */
    protected $todo;

    public function __construct(TodosAdapterInterface $todo)
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
        if ($this->todo->store()) {
            return Redirect::route('day009.index');
        }

        return Redirect::route('day009.create')
            ->withInput()
            ->withErrors($this->todo->errors())
            ->with('message', 'There were errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if (! $todo = $this->todo->find($id)) {
            return Redirect::route('day009.index')
                ->with('message', "Record $id not found");
        }

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
        if (! $todo = $this->todo->find($id)) {
            return Redirect::route('day009.index')
                ->with('message', "Record $id not found");
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
        if ($this->todo->update($id)) {
            return Redirect::route('day009.show', $id);
        }

        return Redirect::route('day009.edit', $id)
            ->withInput()
            ->withErrors($this->todo->errors())
            ->with('message', 'There were errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->todo->delete($id)) {
            return Redirect::route('day009.index');
        }

        return Redirect::route('day009.show', $id)
            ->withErrors($this->todo->errors())
            ->with('message', 'There were errors.');
    }

}

