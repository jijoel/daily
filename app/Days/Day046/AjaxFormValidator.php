<?php namespace Days\Day046;


abstract class AjaxFormValidator extends FormValidator
{
    public function validate($formData)
    {
        $this->validation = $this->validator->make($formData, $this->getValidationRules());

        if ($this->validation->fails()) {
            throw new AjaxFormValidationException(
                'Validation failed', 
                $this->getValidationErrors()
            );
        }

        return true;
    }
}
