<?php

class DayControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day046');
        $this->assertResponseOk();
    }
}

