<?php


class FileUploadControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day044');
        $this->assertResponseOk();
    }
}

