<?php namespace Days\Day009;

interface TodosAdapterInterface
{
    public function paginate($itemCount);
    public function store();
    public function find($id);
    public function update($id);
    public function delete($id);
    public function errors();
}