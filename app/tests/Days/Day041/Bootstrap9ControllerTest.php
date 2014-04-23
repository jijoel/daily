<?php


class Bootstrap9ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day041');
        $this->assertResponseOk();
    }
}

