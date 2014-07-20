<?php


class Day054ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day054');
        $this->assertResponseOk();
    }
}

