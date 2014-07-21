<?php


class Day055ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day055');
        $this->assertResponseOk();
    }
}

