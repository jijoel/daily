<?php namespace Day009Test;

use URL;
use Mockery;
use Input;
use ControllerTestCase;
use Days\Day009\TodosController;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class TodosControllerTest extends ControllerTestCase
{
    protected $test;
    protected $layout;

    const TODO_ADAPTER = 'Days\Day009\TodosAdapterInterface';
    // const TODO_REPOSITORY = 'Days\Day009\TodoRepositoryInterface';
    const TODO_CONTROLLER = 'Days\Day009\TodosController';
    const TODO_COLLECTION = 'Illuminate\Database\Eloquent\Collection';

    public function setUp()
    {
        parent::setUp();

        $this->model = Mockery::mock(self::TODO_ADAPTER);
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
        // $this->setupValidator(True);
        $this->model->shouldReceive('store')->once()
            ->andReturn('foo');
        Input::replace(array('item'=>'foo', '_token'=>'x'));

        $response = $this->test->store();

        $this->assertIsRedirectToPage($response,'index');
    }

    public function testStoreFailsForInvalidData()
    {
        // $this->setupValidator(False);
        $this->model->shouldReceive('store')->once()
            ->shouldReceive('errors')->once();
        Input::replace(array('item'=>'foo'));

        $response = $this->test->store();

        $this->assertIsRedirectToPage($response, 'create');
        $this->assertSessionHasErrors();
        $this->assertSessionHas('_old_input.item');
    }

    public function testShow()
    {
        $this->model->shouldReceive('find')
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
        // $this->setupValidator(True);
        $this->model->shouldReceive('update')
            ->with(2)->once()->andReturn($this->model);

        $response = $this->test->update(2);

        $this->assertIsRedirectToPage($response, 'show', 2);
    }

    public function testUpdateValidationFails()
    {
        // $this->setupValidator(False);
        $this->model->shouldReceive('update')
            ->with(1)->once()
            ->shouldReceive('errors')->once();

        $response = $this->test->update(1);

        $this->assertIsRedirectToPage($response, 'edit', 1);
    }

    /**
     * @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function testUpdateModelNotFound()
    {
        $this->model->shouldReceive('update')
            ->with(1)->once()->andThrow(new ModelNotFoundException);

        $response = $this->test->update(1);
    }

    public function testDelete()
    {
        $this->model->shouldReceive('delete')
            ->with(1)->once()->andReturn(True);

        $response = $this->test->destroy(1);
    }

    public function testDeleteFails()
    {
        $this->model->shouldReceive('delete')
            ->with(1)->once()->andReturn(False)
            ->shouldReceive('errors')->once()->andReturn('foo');

        $response = $this->test->destroy(1);
        $this->assertIsRedirectToPage($response, 'show', 1);
        $this->assertSessionHasErrors();
    }


// Helper Functions -----------------------------------------------------

    protected function assertIsRedirectToPage($response, $page, $id=Null)
    {
        $this->assertIsRedirect($response,
            URL::action(self::TODO_CONTROLLER.'@'.$page, $id));
    }

}

