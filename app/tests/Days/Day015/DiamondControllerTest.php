<?php

use Days\Day015\Diamond;
use Days\Day015\DiamondController;

/**
 * @group now
 */
class DiamondControllerTest extends ControllerTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->test = new DiamondController(new Diamond);
        $this->setupLayout($this->test);
        $this->layout = $this->getLayout($this->test);
    }

    public function testSetupController(){}

    public function testIndexReturnsView()
    {
        $this->test->index();

        $this->assertLayoutHas('content', 'diamond');
    }

}

