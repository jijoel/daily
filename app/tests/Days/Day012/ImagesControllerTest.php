<?php namespace Days\Day012;

use Mockery;
use Input;
use ControllerTestCase;
use Days\Day012\ImagesController;

/**
 * @group now
 */
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

    public function testStore()
    {
        Input::replace(array(
            'x'=>'5',  'y'=>'10', 
            'w'=>'20', 'h'=>'30',
            'dw'=>'50', 'dh'=>'100',
            'img'=>'foo.jpg',
        ));

        $this->test->store();

        $this->assertLayoutHas('content');
        $this->assertLayoutHas('js');
        $this->assertLayoutHas('css');
    }

    public function testShow()
    {
        $this->test->show(1);
        $this->assertLayoutHas('content');
        $this->assertLayoutHas('js');
        $this->assertLayoutHas('css');
    }

}
