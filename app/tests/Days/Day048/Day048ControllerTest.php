<?php


class Day048ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day048');
        $this->assertResponseOk();
    }
}

