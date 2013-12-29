<?php namespace Days\Day022;

use Input;
use Validator;
use Days\Day022\Factors;

class FactorsAdapter
{
    private $listener;

    private $rules = array(
        'number' => 'numeric|max:999999999999',
    );

    private $messages = array(
        'number.max' => 'We can only generate factors for values less than 1 trillion',
    );

    public function __construct($listener, $factors=Null)
    {
        $this->listener = $listener;
        $this->factors = $factors ?: new Factors;
    }

    public function make()
    {
        $input = Input::only('number');

        $validator = Validator::make($input, $this->rules, $this->messages);
        if (! $validator->passes()) {
            return $this->listener->makeFailed($validator);
        }

        $factors = $this->factors->make($input['number']);
        return $this->listener->makeSucceeded($factors);
    }

}

