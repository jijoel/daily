<?php

use Days\Day016\BowlingGame\BowlingGame;
use Days\Day016\BowlingGameController;


class BowlingGameControllerTest extends ControllerTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->test = new BowlingGameController(new BowlingGame);
        $this->setupLayout($this->test);
        $this->layout = $this->getLayout($this->test);
    }

    public function testSetupController(){}

    public function testIndexReturnsView()
    {
        $this->test->index();
    }

}

