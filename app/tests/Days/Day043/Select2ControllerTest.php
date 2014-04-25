<?php


class Select2ControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day043');
        $this->assertResponseOk();
    }
}

