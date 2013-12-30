<?php


class HelloAngularControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day023');
        $this->assertResponseOk();
    }
}

