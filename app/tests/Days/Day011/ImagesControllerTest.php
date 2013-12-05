<?php namespace Days\Day011;

use Mockery;
use ControllerTestCase;
use Days\Day011\ImagesController;


class ImagesControllerTest extends ControllerTestCase
{
    protected $test;
    protected $layout;

    public function setUp()
    {
        parent::setUp();

        $this->test = new ImagesController;
        $this->setupLayout($this->test);
        $this->layout = $this->getLayout($this->test);
    }

    public function testControllerSetupWorks(){}

    public function testIndex()
    {
        $this->test->index();

        $this->assertLayoutHas('content');
        $this->assertLayoutHas('js');
        $this->assertLayoutHas('css');
    }

}