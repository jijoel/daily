<?php

use Days\Day009\TodoBusinessRuler;


class TodoBusinessRulerTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->repo = Mockery::mock('Days\Day009\TodoRepositoryInterface');
        $this->test = new TodoBusinessRuler($this->repo);
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testCorrectFiltersApplied()
    {
        $this->repo->shouldReceive('items')->andReturn($this->repo)
            ->shouldReceive('notStartingWith')
            ->once()->with('B')->andReturn($this->repo)
            ->shouldReceive('notEndingWith')
            ->once()->with('s');

        $this->test->filteredItems();
    }

    /**
     * @expectedException Days\Day009\DomainException
     */
    public function testStoreThrowsExceptionIfNotSimonSays()
    {
        $this->test->store(array('foo'));
    }

    /**
     * @expectedException Days\Day009\DomainException
     */
    public function testStoreThrowsExceptionIfPsych()
    {
        $this->test->store(array('Simon Says foo psych!'));
    }

    public function testStoreSavesPlainText()
    {
        $this->repo->shouldReceive('create')->once()->with(array('foo'));

        $this->test->store(array('Simon Says foo'));
    }

    public function testFind()
    {
        $this->repo->shouldReceive('findId')->once();

        $this->test->find(1);
    }

    public function testUpdateWorks()
    {
        $this->repo->shouldReceive('update')->once()->with(1, array('foo'));
        $this->test->update(1, array('foo'));
    }

    /**
     * @expectedException Days\Day009\DomainException
     */    
    public function testUpdateRequiresAttrs()
    {
        $this->test->update(1, array());
    }

    /**
     * @expectedException Days\Day009\DomainException
     */    
    public function testUpdateThrowsExceptionIfPsych()
    {
        $this->test->update(1, array('test psych!'));
    }

    public function testDeleteWorks()
    {
        $this->repo->shouldReceive('findId')->once()->with(1)
            ->andReturn($this->repo)
            ->shouldReceive('delete')->once()->with(1);
        $this->repo->item = 'foo';

        $this->test->delete(1);
    }

    /**
     * @expectedException Days\Day009\DomainException
     */    
    public function testDeleteFailsIfMarkedImportant()
    {
        $this->repo->shouldReceive('findId')->once()->with(1)
            ->andReturn($this->repo);
        $this->repo->item = 'foo!!!';

        $this->test->delete(1);
    }
}
