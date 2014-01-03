<?php

/**
 * @group now
 */
class AngularTodoControllerTest extends ControllerTestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day026');
        $this->assertResponseOk();
    }

    public function testDestroy()
    {
        $model = $this->setupModel('Days\Day026\TodoInterface');
        $model->shouldReceive('findOrFail')->once()->andReturn($model)
            ->shouldReceive('delete')->once();

        $this->call('DELETE', '/day026/api/1');
    }

    protected function setupModel($interface)
    {
        $model = Mockery::mock($interface);
        $this->app->instance($interface, $model);
        return $model;
    }

    public function testStoreFails()
    {
        $this->setupValidator(False);

        $this->call('POST', '/day026/api', array());
        $this->assertResponseStatus(400);
    }

    public function testStore()
    {
        $model = $this->setupModel('Days\Day026\TodoInterface');
        $model->shouldReceive('create')->once();

        $data = array('todo'=>'foo');

        $this->call('POST', '/day026/api', $data);
        $this->assertResponseOk();
    }
}

