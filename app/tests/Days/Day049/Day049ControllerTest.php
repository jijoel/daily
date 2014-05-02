<?php


class Day049ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day049');
        $this->assertResponseOk();
    }
}

