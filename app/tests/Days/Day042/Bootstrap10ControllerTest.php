<?php


class Bootstrap10ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day042');
        $this->assertResponseOk();
    }
}

