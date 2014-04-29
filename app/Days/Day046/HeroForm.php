<?php namespace Days\Day046;


class HeroForm extends AjaxFormValidator
{
    protected $rules = array(
        'name'  => 'required',
        'alias' => 'required',
    );
}