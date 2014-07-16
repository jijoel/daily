<?php


class Day053ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day053');
        $this->assertResponseOk();
    }
}

