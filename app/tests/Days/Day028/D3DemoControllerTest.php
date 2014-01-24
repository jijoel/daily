<?php


class D3DemoControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day028');
        $this->assertResponseOk();
    }
}

