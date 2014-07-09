<?php


class Day051ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day051');
        $this->assertResponseOk();
    }
}

