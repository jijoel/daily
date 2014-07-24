<?php


class Day057ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day057');
        $this->assertResponseOk();
    }
}

