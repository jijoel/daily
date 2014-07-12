<?php


class Day052ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day052');
        $this->assertResponseOk();
    }
}

