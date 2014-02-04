<?php


class D3TestControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day030');
        $this->assertResponseOk();
    }
}

