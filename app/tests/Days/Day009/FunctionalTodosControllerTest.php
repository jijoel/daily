<?php namespace Day009Test;

use Input;
use Artisan;
use ControllerTestCase;
use Days\Day009\TodosController;


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
        $this->call('GET', 'day009');
        $this->assertResponseOk();
    }

    public function testCreate()
    {
        $this->call('GET', 'day009/create');
        $this->assertResponseOk();
    }

    public function testStore()
    {
        $input = array('item'=>'test new item');
        $this->call('POST', 'day009', $input);

        $this->assertRedirectedToRoute('day009.index');
    }

    public function testStoreFails()
    {
        $this->call('POST', 'day009');  // fails: no input item

        $this->assertRedirectedToRoute('day009.create');
        $this->assertSessionHasErrors();
        $this->assertSessionHas('_old_input');
        $this->assertSessionHas('message');
    }

    public function testShow()
    {
        $this->call('GET', 'day009/1');
        $this->assertResponseOk();
    }

    public function testEdit()
    {
        $this->call('GET', 'day009/1/edit');

        $this->assertResponseOk();
    }

    public function testEditForMissingRecord()
    {
        $this->call('GET', 'day009/12345678/edit');

        $this->assertRedirectedToRoute('day009.index');
    }

    public function testUpdate()
    {
        $input = array('item'=>'test new item');
        
        $this->call('PATCH', 'day009/1', $input);

        $this->assertRedirectedTo('day009/1');
    }

    public function testUpdateFails()
    {
        $this->call('PATCH', 'day009/1');  // no input -- will fail validation

        $this->assertRedirectedTo('day009/1/edit');
        $this->assertSessionHasErrors();
        $this->assertSessionHas('message');
        $this->assertSessionHas('_old_input');
    }

    public function testDestroy()
    {
        $this->call('DELETE', 'day009/1');
        $this->assertRedirectedToRoute('day009.index');
    }

}

