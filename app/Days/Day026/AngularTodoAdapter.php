<?php namespace Days\Day026;

use Input;
use Validator;
use Days\Day026\AngularTodo;


class AngularTodoAdapter
{
    private $listener;
    private $principal;

    private $rules = array(
        'field' => 'required',
    );

    public function __construct($listener, $principal=Null)
    {
        $this->listener = $listener;
        $this->principal = $principal ?: new AngularTodo;
    }

    public function store()
    {
        $input = Input::except('_token');

        $validator = Validator::make($input, $this->rules);
        if (! $validator->passes()) {
            return $this->listener->storeFailed($validator->errors());
        }

        $result = $this->principal->store($input['field']);
        
        return $this->listener->storeSucceeded($result);
    }

}

