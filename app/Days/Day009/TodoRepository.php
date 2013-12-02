<?php namespace Days\Day009;


use Days\Day009\TodoRepositoryInterface;


class TodoRepository implements TodoRepositoryInterface
{
    protected $todos;

    public function __construct(TodoInterface $todos)
    {
        $this->todos = $todos;
    }

    public function items()
    {
        return $this->todos;
    }

    public function create($attrs) 
    {
        return $this->todos->create($attrs);
    }

    public function update($id, $attrs)
    {
        $todo = $this->findId($id);
        return $todo->update($attrs);
    }

    public function findId($id) 
    {
        return $this->todos->find($id);
    }

    public function delete($id)
    {
        $todo = $this->findId($id);
        $todo->delete();        
    }
    
    public function __get($what)
    {
        return $this->$what();
    }
}

