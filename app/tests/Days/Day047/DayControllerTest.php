<?php


class Day047ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day047');
        $this->assertResponseOk();
    }
}

