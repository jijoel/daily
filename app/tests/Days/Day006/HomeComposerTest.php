<?php 

use Days\Support\HomeComposer;


class Day006_HomeComposerTest extends TestCase
{

    public function tearDown()
    {
        Mockery::close();
    }

    public function testComposeSetsDayList()
    {
        Config::shouldReceive('get')
            ->andReturn(array(array(1, 'Test', 'test')));
        $test = new HomeComposer;
        $view = Mockery::mock('day006_view');
        $view->shouldReceive('with')
            ->with('days', Mockery::any())->once();

        $r = $test->compose($view);
    }

}
