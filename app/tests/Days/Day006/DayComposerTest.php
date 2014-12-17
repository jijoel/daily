<?php 

use Days\Support\DayComposer;


class Day006_DayComposerTest extends TestCase
{

    public function tearDown()
    {
        Mockery::close();
    }

    public function testComposeDoesNothingIfVariablesExist()
    {
        $test = new DayComposer;

        $this->setupMockConfig();
        $view = $this->getMockView('fizz', 'buzz');
        $view->shouldReceive('with');
        
        $this->assertNull($test->compose($view));
    }

    public function testComposeSetsDay()
    {
        $test = new DayComposer;

        $this->setupMockConfig();
        $view = $this->getMockView(Null, 'fizz');
        $view->shouldReceive('with')->with('day', Mockery::any())->once();
        $view->shouldReceive('with')->with('dayTitle', Mockery::any());

        $test->compose($view);
    }

    public function testComposeSetsDayTitle()
    {
        $test = new DayComposer;

        $this->setupMockConfig();
        $view = $this->getMockView('fizz', Null);
        $view->shouldReceive('with')->with('day', Mockery::any());
        $view->shouldReceive('with')->with('dayTitle', Mockery::any())->once();

        $test->compose($view);
    }

    public function testComposeFindsAndSetsCorrectConfiguration()
    {
        $test = new DayComposer;

        $this->setupMockConfig();
        $view = $this->getMockView(Null, Null);
        $view->shouldReceive('with')->with('dayTitle', 'Day6')->once();
        $view->shouldReceive('with')->with('day', '6')->once();

        $test->compose($view);
    }

    public function testComposeFailsIfConfigurationNotFound()
    {
        $test = new DayComposer;

        $this->setupMockConfig('fail');
        $view = $this->getMockView(Null, Null);
        $view->shouldReceive('with')->with('dayTitle', Null)->once();
        $view->shouldReceive('with')->with('day', Null)->once();

        $test->compose($view);
    }

    protected function getMockView($day, $dayTitle)
    {
        $view = Mockery::mock('day006_view');

        // $view->shouldReceive('getEnvironment')
        //     ->andReturn($view);
        // $view->shouldReceive('shared')->times(2)
        //     ->andReturn($day, $dayTitle);

        return $view;
    }

    protected function setupMockConfig($segment = 'day006')
    {
        Request::shouldReceive('segment')->with(1)
            ->andReturn($segment);
        Config::shouldReceive('get')
            ->andReturn(array(
                array('8', 'day008', 'Day8'), 
                array('6', 'day006', 'Day6'), 
                array('4', 'day004', 'Day4')
            ));
    }

}

