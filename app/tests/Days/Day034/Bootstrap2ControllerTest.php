<?php


class Bootstrap2ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day034');
        $this->assertResponseOk();
    }
}

