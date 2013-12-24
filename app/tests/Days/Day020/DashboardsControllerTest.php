<?php

class DashboardsControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day020');
        $this->assertResponseOk();
    }
}

