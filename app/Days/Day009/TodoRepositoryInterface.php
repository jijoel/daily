<?php namespace Days\Day009;


interface TodoRepositoryInterface
{
    public function items();
    public function create($attrs);
    public function update($id, $attrs);
    public function findId($id);
    public function delete($id);
}
