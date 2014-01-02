<?php

use Days\Day026\AngularTodo;

/**
 * @group now
 */
class AngularTodoTest extends PHPUnit_Framework_TestCase
{
    public $test;

    public function setUp()
    {
        $this->test = new AngularTodo(Mockery::mock('Days\Day026\TodoInterface'));
    }

    public function testExists(){}

}
