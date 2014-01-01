<?php


class AngularShowHideControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day024');
        $this->assertResponseOk();
    }
}

