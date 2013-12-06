<?php

use Days\Support\MultiPageComposer;


class MultiPageComposerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function testSetupWorks() {}

    // TODO: Figure out how to test the day link...
    // (unable to mock protected method)
    // public function testGetDayLink()
    // {
    //     $test = new MultiPageComposer;

    //     $view = Mockery::mock('multipage_view');
    //     $mock = Mockery::mock(
    //         'Days\Support\MultiPageComposer[setPropertyForView]')
    //         ->shouldReceive('setPropertyForView')
    //         ->andReturn('foo');

    //     var_dump($test->compose($view));
    // }

}
