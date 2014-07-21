<?php


class Day055ControllerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        (new CreateDay055BlogTable)->up();
    }

    public function testIndex()
    {
        $this->call('GET', '/day055');
        $this->assertResponseOk();
    }
}

