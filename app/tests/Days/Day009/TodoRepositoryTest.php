<?php

use Days\Day009\TodoRepository;


class TodoRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->model = Mockery::mock('Days\Day009\TodoInterface');
        $this->test = new TodoRepository($this->model);
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testItems()
    {
        $this->assertEquals($this->model, $this->test->items());
    }

    public function testCreate()
    {
        $this->model->shouldReceive('create')->once();

        $this->test->create(array('attrs'));
    } 

    public function testUpdate()
    {
        $this->model->shouldReceive('find')->once()->with(1)
            ->andReturn($this->model)
            ->shouldReceive('update')->once()->with(array('attrs'));

        $this->test->update(1, array('attrs'));
    }

    public function testFindId()
    {
        $this->model->shouldReceive('find')->once()->with(1);

        $this->test->findId(1);
    } 

    public function testDelete()
    {
        $this->model->shouldReceive('find')->once()->with(1)
            ->andReturn($this->model)
            ->shouldReceive('delete')->once();

        $this->test->delete(1);
    }

}