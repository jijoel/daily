<?php


class Day048ControllerTest extends TestCase
{
    public function testIndex()
    {
        (new CreateDay044FilesTable)->up();

        $this->call('GET', '/day048');
        $this->assertResponseOk();
    }
}

