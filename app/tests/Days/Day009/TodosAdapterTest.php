<?php namespace Day009Test;

use TestCase;
use Mockery;
use Days\Day009\DomainException;
use Days\Day009\TodosAdapter;
use Days\Day009\TodoBusinessRuler;
use Days\Day009\TodoRepositoryInterface;


class TodosAdapterTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->repo = Mockery::mock('Days\Day009\TodoRepositoryInterface');
        $this->ruler = Mockery::mock(new TodoBusinessRuler($this->repo));
        $this->test = new TodosAdapter($this->ruler);
    }

    public function testPaginate()
    {
        $this->ruler->shouldReceive('filteredItems->paginate')
            ->once()->with(2);

        $this->test->paginate(2);
    }

    public function testStore()
    {
        $this->ruler->shouldReceive('store')->once();

        $this->test->store();
    }

    public function testStoreFails()
    {
        $this->ruler->shouldReceive('store')->once()
            ->andThrow(new DomainException('foo'));

        $this->test->store();

        $this->assertEquals('foo', $this->test->errors());
    }

    public function testFind()
    {
        $this->ruler->shouldReceive('find')->once();

        $this->test->find(1);
    }

    public function testUpdate()
    {
        $this->ruler->shouldReceive('update')->once()->andReturn('foo');

        $this->assertEquals('foo', $this->test->update(1, array()));
    }

    public function testUpdateFails()
    {
        $this->ruler->shouldReceive('update')->once()
            ->andThrow(new DomainException('foo'));

        $this->test->update(1, array());

        $this->assertEquals('foo', $this->test->errors());
    }

    public function testDelete()
    {
        $this->ruler->shouldReceive('delete')->once()->andReturn(True);

        $this->assertTrue($this->test->delete(1));
    }

    public function testDeleteFails()
    {
        $this->ruler->shouldReceive('delete')->once()
            ->andThrow(new DomainException('foo'));

        $this->test->delete(1);
        
        $this->assertEquals('foo', $this->test->errors());
    }

}
