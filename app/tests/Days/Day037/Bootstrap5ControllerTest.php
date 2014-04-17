<?php


class Bootstrap5ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day037');
        $this->assertResponseOk();
    }
}

