<?php namespace Days\Day009;

use Input;
use Days\Day009\DomainException;
use Illuminate\Support\MessageBag;
use Days\Day009\TodoBusinessRuler;
use Days\Day009\TodosAdapterInterface;


/**
 * Translate commands from a controller so that
 * they can be executed by a TodoBusinessRuler
 */
class TodosAdapter implements TodosAdapterInterface
{
    protected $ruler;
    protected $errors;

    public function __construct(TodoBusinessRuler $ruler)
    {
        $this->ruler = $ruler;
    }

    public function paginate($itemCount)
    {
        return $this->ruler->filteredItems()
            ->paginate($itemCount);
    }

    public function store()
    {
        $input = array_only(Input::all(), array('item'));

        try {
            return $this->ruler->store($input);
        } catch (DomainException $e) {
            $this->errors = $e->getMessage();
        }
    }

    public function find($id)
    {
        return $this->ruler->find($id);
    }

    public function update($id)
    {
        $input = array_only(Input::all(), array('item'));

        try {
            return $this->ruler->update($id, $input);
        } catch (DomainException $e) {
            $this->errors = $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $this->ruler->delete($id);
            return True;
        } catch (DomainException $e) {
            $this->errors = $e->getMessage();
        }
    }

    public function errors()
    {
        return $this->errors;
    }

}