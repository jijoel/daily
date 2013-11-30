<?php namespace Days\Day007;

use Illuminate\Database\Eloquent\ModelNotFoundException;


class ArrayTodo implements TodoInterface
{
    protected $todos = array(
        1 => 'Test Item',
    );

    public function paginate($count)
    {
        return $this->todos;
    }

    public function create(array $attrs)
    {
        $this->todos[] = $attrs['item'];
        return end($this->todos);
    }

    public function findOrFail($id)
    {
        if(array_key_exists($id, $this->todos)){
            return $this->todos[$id];
        }

        throw new ModelNotFoundException;
    }

    public function delete()
    {
        unset($this->todos[$id]);
    }



}