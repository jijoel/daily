<?php namespace Days\Day026;

use Days\Day026\TodoInterface;

class AngularTodo
{
    protected $repo;

    public function __construct(TodoInterface $repo)
    {
        $this->repo = $repo;
    }

    public function all()
    {
        return $this->repo->all();
    }

    public function store($data)
    {
        return $data;
    }
}

