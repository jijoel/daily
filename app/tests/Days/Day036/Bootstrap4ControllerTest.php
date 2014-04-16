<?php


class Bootstrap4ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day036');
        $this->assertResponseOk();
    }
}

