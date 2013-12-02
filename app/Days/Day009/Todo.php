<?php namespace Days\Day009;

use Eloquent;


class Todo extends Eloquent implements TodoInterface
{
    // Use the same todos table we created on day 7
    protected $table = 'day007_todos';

    protected $fillable = array('item');

    public static $rules = array(
        'item' => 'required|max:80',
    );

    public function scopeNotStartingWith($query, $letter)
    {
        return $query->where('item', 'not like', $letter.'%');
    }

    public function scopeNotEndingWith($query, $letter)
    {
        return $query->where('item', 'not like', '%'.$letter);
    }

}

