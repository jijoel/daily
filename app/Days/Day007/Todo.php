<?php namespace Days\Day007;

use Eloquent;


class Todo extends Eloquent implements TodoInterface
{
    protected $table = 'day007_todos';
    protected $fillable = array('item');
}