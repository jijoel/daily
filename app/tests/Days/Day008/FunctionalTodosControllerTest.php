<?php namespace Day008Test;

use Input;
use Artisan;
use ControllerTestCase;
use Days\Day008\TodosController;


/**
 * @group functional
 */
class FunctionalTodosControllerTest extends ControllerTestCase
{
    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
        Artisan::call('db:seed', array('--class'=>'Day007_TodosTableSeeder'));
    }

    public function testIndex()
    {
        $this->call('GET', 'day008');
        $this->assertResponseOk();
    }

    public function testCreate()
    {
        $this->call('GET', 'day008/create');
        $this->assertResponseOk();
    }

    public function testStore()
    {
        $input = array('item'=>'test new item');
        $this->call('POST', 'day008', $input);

        $this->assertRedirectedToRoute('day008.index');
    }

    public function testStoreFails()
    {
        $this->call('POST', 'day008');  // fails: no input item

        $this->assertRedirectedToRoute('day008.create');
        $this->assertSessionHasErrors();
        $this->assertSessionHas('_old_input');
        $this->assertSessionHas('message');
    }

    public function testShow()
    {
        $this->call('GET', 'day008/1');
        $this->assertResponseOk();
    }

    public function testEdit()
    {
        $this->call('GET', 'day008/1/edit');

        $this->assertResponseOk();
    }

    public function testEditForMissingRecord()
    {
        $this->call('GET', 'day008/12345678/edit');

        $this->assertRedirectedToRoute('day008.index');
    }

    public function testUpdate()
    {
        $input = array('item'=>'test new item');
        
        $this->call('PATCH', 'day008/1', $input);

        $this->assertRedirectedTo('day008/1');
    }

    public function testUpdateFails()
    {
        $this->call('PATCH', 'day008/1');  // no input -- will fail validation

        $this->assertRedirectedTo('day008/1/edit');
        $this->assertSessionHasErrors();
        $this->assertSessionHas('message');
        $this->assertSessionHas('_old_input');
    }

    public function testDestroy()
    {
        $this->call('DELETE', 'day008/1');
        $this->assertRedirectedToRoute('day008.index');
    }

}

