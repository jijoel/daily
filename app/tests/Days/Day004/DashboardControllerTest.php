<?php 

use Days\Day004\DashboardController;


class DashboardControllerTest extends ControllerTestCase
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