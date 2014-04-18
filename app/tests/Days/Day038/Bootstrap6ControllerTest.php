<?php


class Bootstrap6ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day038');
        $this->assertResponseOk();
    }
}

