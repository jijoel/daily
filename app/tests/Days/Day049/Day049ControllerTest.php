<?php


class Day049ControllerTest extends TestCase
{
    public function testIndex()
    {
        (new CreateDay044FilesTable)->up();

        $this->call('GET', '/day049');
        $this->assertResponseOk();
    }
}

