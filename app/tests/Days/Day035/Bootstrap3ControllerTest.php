<?php

class Bootstrap3ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day035');
        $this->assertResponseOk();
    }
}

