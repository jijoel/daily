<?php


class ControllerTestCase extends TestCase
{
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

    protected function assertIsRedirect($test, $url=Null)
    {
        $this->assertInstanceOf('Illuminate\Http\RedirectResponse', $test);

        if ($url) {
            $this->assertEquals($url, $test->getTargetUrl());
        }
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

