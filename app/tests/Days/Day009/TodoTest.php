<?php

use Days\Day009\Todo;

/**
 * @group functional
 */
class TodoTest extends TestCase
{
    protected $test;

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
        Artisan::call('db:seed', array('--class'=>'Day007_TodosTableSeeder'));
    
        $this->test = new Todo;
    }

    public function testStartScope()
    {
        $before = array_pluck($this->test->get()->toArray(), 'item');
        $this->assertContains('Another', $before);

        $after = array_pluck($this->test->notStartingWith('A')->get()->toArray(), 'item');
        $this->assertNotContains('Another', $after);
    }

    public function testEndScope()
    {
        $before = array_pluck($this->test->get()->toArray(), 'item');
        $this->assertContains('Another', $before);

        $after = array_pluck($this->test->notEndingWith('her')->get()->toArray(), 'item');
        $this->assertNotContains('Another', $after);
    }
}

