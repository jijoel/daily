<?php


class Day050ControllerTest extends TestCase
{
    public function testIndex()
    {
        (new CreateDay044FilesTable)->up();

        $this->call('GET', '/day050');
        $this->assertResponseOk();
    }
}

