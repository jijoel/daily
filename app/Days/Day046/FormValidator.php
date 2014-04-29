<?php namespace Days\Day046;

use Illuminate\Validation\Factory as Validator;


abstract class FormValidator
{
    protected $validator;
    protected $validation;
    protected $rules;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function validate($formData)
    {
        $this->validation = $this->validator->make($formData, $this->getValidationRules());

        if ($this->validation->fails()) {
            throw new FormValidationException(
                'Validation failed', 
                $this->getValidationErrors()
            );
        }

        return true;
    }

    protected function getValidationRules()
    {
        return $this->rules;
    }

    protected function getValidationErrors()
    {
        return $this->validation->errors();
    }
}

