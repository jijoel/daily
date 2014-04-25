<?php


class FileUploadControllerTest extends ControllerTestCase
{
    public function setUp()
    {
        parent::setUp();

        (new CreateDay044FilesTable)->up();
    }

    public function testIndex()
    {
        $this->call('GET', '/day044');

        $this->assertResponseOk();
    }
}

