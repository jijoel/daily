<?php


class Day058ControllerTest extends ControllerTestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day058');
        $this->assertResponseOk();
    }
}

