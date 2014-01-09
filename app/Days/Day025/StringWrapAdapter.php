<?php namespace Days\Day025;

use Input;
use Validator;
use Days\Day025\StringWrapper;


class StringWrapAdapter
{
    private $listener;
    private $principal;

    private $rules = array(
        'length' => 'required|numeric|max:120',
        'text'   => 'required|max:2000',
    );

    public function __construct($listener, $principal=Null)
    {
        $this->listener = $listener;
        $this->principal = $principal ?: new StringWrapper;
    }

    public function store()
    {
        $input = Input::except('_token');

        $validator = Validator::make($input, $this->rules);
        if (! $validator->passes()) {
            return $this->listener->storeFailed($validator->errors());
        }

        $result = $this->principal->wrap($input['text'], $input['length']);
        $result = str_replace('\n', '<br>', $result);
        
        return $this->listener->storeSucceeded($result);
    }

}

