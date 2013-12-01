<?php namespace Days\Day009;


interface TodoInterface
{
    public static function create(array $attrs);
    public static function findOrFail($id);
    public function delete();
    
    // public function paginate($count);
}