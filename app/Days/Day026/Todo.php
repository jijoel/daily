<?php namespace Days\Day026;

use Eloquent;


class Todo extends Eloquent implements TodoInterface
{
    // Use the same todos table we created on day 7
    protected $table = 'day007_todos';

    protected $fillable = array('item');

    public static $rules = array(
        'item' => 'required|max:80',
    );
}

