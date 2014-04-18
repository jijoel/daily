<?php


class Bootstrap7ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day039');
        $this->assertResponseOk();
    }
}

