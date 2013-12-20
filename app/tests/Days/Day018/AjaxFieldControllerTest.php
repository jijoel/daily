<?php


class AjaxFieldControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day018');
        $this->assertResponseOk();
    }

    public function testStates()
    {
        $model = Mockery::mock('Days\Day018\State');
        $model->shouldReceive('where->get')->once();
        App::instance('Days\Day018\State', $model);

        $this->call('GET', '/day018/states', array('term'=>'c'));

        $this->assertResponseOk();
    }
}