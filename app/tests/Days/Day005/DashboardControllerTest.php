<?php 

use Days\Day005\DashboardController;


class Day5_DashboardControllerTest extends ControllerTestCase
{

    private $test;    
    private $layout;  

    public function setUp()
    {
        parent::setUp();

        $this->test = new DashboardController;
        $this->setupLayout($this->test);
        $this->layout = $this->getLayout($this->test);
    }

    public function testDashboardControllerIsShown()
    {
        $this->test->index();

        $this->assertPropertyExists($this->layout, 'content');
        $this->assertIsView($this->layout->content);
    }

}