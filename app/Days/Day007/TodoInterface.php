<?php namespace Days\Day007;


interface TodoInterface
{
    public static function create(array $attrs);
    // public static function findOrFail($id);
    public function delete();

    // public function paginate($count);
}