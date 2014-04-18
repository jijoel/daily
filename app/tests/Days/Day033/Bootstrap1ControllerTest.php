<?php


class Bootstrap1ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day033');
        $this->assertResponseOk();
    }
}

