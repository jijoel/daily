<?php namespace Day008Test;

use URL;
use Mockery;
use Input;
use ControllerTestCase;
use Days\Day008\TodosController;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class TodosControllerTest extends ControllerTestCase
{
    protected $test;
    protected $layout;

    const TODO_INTERFACE = 'Days\Day008\TodoInterface';
    const TODO_CONTROLLER = 'Days\Day008\TodosController';
    const TODO_COLLECTION = 'Illuminate\Database\Eloquent\Collection';

    public function setUp()
    {
        parent::setUp();

        $this->model = Mockery::mock(self::TODO_INTERFACE);
        $this->collection = Mockery::mock(self::TODO_COLLECTION)
            ->shouldDeferMissing(); 
        $this->test = new TodosController($this->model);
        $this->setupLayout($this->test);
        $this->layout = $this->getLayout($this->test);
    }

    public function testControllerSetupWorks(){}

    public function testIndex()
    {
        $this->model->shouldReceive('paginate')->once()
            ->andReturn($this->collection);

        $this->test->index();

        $this->assertLayoutHas('content', 'todos');
    }

    public function testCreate()
    {
        $this->test->create();

        $this->assertLayoutHas('content');
    }

    public function testStoreShouldSaveData()
    {
        $this->setupValidator(True);
        $this->model->shouldReceive('create')->once()
            ->with(array('item'=>'foo'));
        Input::replace(array('item'=>'foo', '_token'=>'x'));

        $response = $this->test->store();

        $this->assertIsRedirectToPage($response,'index');
    }

    public function testStoreFailsForInvalidData()
    {
        $this->setupValidator(False);
        Input::replace(array('item'=>'foo'));

        $response = $this->test->store();

        $this->assertIsRedirectToPage($response, 'create');
        $this->assertSessionHasErrors();
        $this->assertSessionHas('_old_input.item');
    }

    public function testShow()
    {
        $this->model->shouldReceive('findOrFail')
            ->with(1)->once()->andReturn($this->model);

        $this->test->show(1);

        $this->assertLayoutHas('content', 'todo');
    }

    public function testEdit()
    {
        $this->model->shouldReceive('find')
            ->with(1)->once()->andReturn($this->model);

        $this->test->edit(1);

        $this->assertLayoutHas('content', 'todo');
    }

    public function testEditMissingRecord()
    {
        $this->model->shouldReceive('find')
            ->with(1)->once()->andReturn(Null);

        $response = $this->test->edit(1);

        $this->assertIsRedirectToPage($response, 'index');
    }

    public function testUpdate()
    {
        $this->setupValidator(True);
        $this->model->shouldReceive('findOrFail')
            ->with(2)->once()->andReturn($this->model)
            ->shouldReceive('update')->once();

        $response = $this->test->update(2);

        $this->assertIsRedirectToPage($response, 'show', 2);
    }

    public function testUpdateValidationFails()
    {
        $this->setupValidator(False);

        $response = $this->test->update(1);

        $this->assertIsRedirectToPage($response, 'edit', 1);
    }

    /**
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function testUpdateModelNotFound()
    {
        $this->setupValidator(True);
        $this->model->shouldReceive('findOrFail')
            ->with(1)->once()->andThrow(new ModelNotFoundException);

        $response = $this->test->update(1);
    }

    public function testDelete()
    {
        $this->model->shouldReceive('findOrFail')
            ->with(1)->once()->andReturn($this->model)
            ->shouldReceive('delete')->once();

        $response = $this->test->destroy(1);
    }


// Helper Functions -----------------------------------------------------

    protected function assertIsRedirectToPage($response, $page, $id=Null)
    {
        $this->assertIsRedirect($response,
            URL::action(self::TODO_CONTROLLER.'@'.$page, $id));
    }

}

