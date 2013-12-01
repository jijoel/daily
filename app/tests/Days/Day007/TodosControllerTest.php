<?php

use Days\Day007\TodosController;


class TodosControllerTest extends ControllerTestCase
{
    private $test;
    private $layout;

    const TODO_INTERFACE = 'Days\Day007\TodoInterface';
    const TODO_CONTROLLER = 'Days\Day007\TodosController';

    public function setUp()
    {
        parent::setUp();

        $this->model = Mockery::mock(self::TODO_INTERFACE);
        $this->test = new TodosController($this->model);
        $this->setupLayout($this->test);
        $this->layout = $this->getLayout($this->test);
    }

    public function testControllerSetupWorks(){}

    public function testIndexShouldShowPage()
    {
        $this->model->shouldReceive('paginate')->once();

        $this->test->index();

        $this->assertPropertyExists($this->layout, 'content');
        $this->assertIsView($this->layout->content);
    }

    /**
     * @group functional
     */
    public function testIndexViewReceivesRequiredData()
    {
        Artisan::call('migrate');

        try {
            $this->action('GET', self::TODO_CONTROLLER.'@index');
        } catch (ErrorException $e) {
            $this->assertFalse($e->getMessage().' in '.$e->getFile()
                .' (called from '.self::TODO_CONTROLLER.'@index)');
        }
    }

    public function testStoreShouldSaveData()
    {
        $this->setupValidator(True);
        $this->model->shouldReceive('create')->once()
            ->with(array('item'=>'foo'));
        Input::replace(array('item'=>'foo', '_token'=>'x'));

        $response = $this->test->store();

        $this->assertIsRedirectToIndex($response);
    }

    public function testStoreFailsForInvalidData()
    {
        $this->setupValidator(False);
        Input::replace(array('item'=>'foo'));

        $response = $this->test->store();

        $this->assertIsRedirectToIndex($response);
        $this->assertSessionHasErrors();
        $this->assertSessionHas('_old_input.item');
    }

    public function testDestroyRemovesRecord()
    {
        $this->model->shouldReceive('findOrFail')->once()
            ->andReturn(Mockery::mock(array('delete'=>Null)));

        $this->test->destroy(1);
    }


// Helper Functions -----------------------------------------------------

    protected function assertIsRedirectToIndex($response)
    {
        $this->assertIsRedirect($response,
            URL::action(self::TODO_CONTROLLER.'@index'));
    }

}