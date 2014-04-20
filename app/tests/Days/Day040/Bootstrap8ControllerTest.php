<?php


class Bootstrap8ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day040');
        $this->assertResponseOk();
    }
}

