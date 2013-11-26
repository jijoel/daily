<?php

use Days\Day003\RomanController;
use Days\Day002\Roman;


class RomanControllerTest extends TestCase
{

    public function testIndexReturnsView()
    {
        $test = new RomanController(new Roman);

        $this->setupLayout($test);
        $layout = $this->getLayout($test);

        $test->index();
        $this->assertPropertyExists($layout, 'content');
        $this->assertIsView($layout->content);
    }

    public function testStoreReturnsView()
    {
        $test = new RomanController(new Roman);

        $this->setupLayout($test);
        $layout = $this->getLayout($test);

        $test->store();
        $this->assertPropertyExists($layout, 'content');
        $this->assertIsView($layout->content);
    }

    protected function assertPropertyExists($test, $property='content')
    {
        if (!isset($test->$property)) {
            $this->assertTrue(False, "Property '$property' does not exist");
        }
    }

    protected function assertIsView($test)
    {
        $this->assertInstanceOf('Illuminate\View\View', $test);
    }

    protected function setupLayout($test)
    {
        $this->callProtectedMethod($test, 'setupLayout', array());
    }

    protected function getLayout($test)
    {
        return $this->getProtectedProperty($test, 'layout');
    }
}
