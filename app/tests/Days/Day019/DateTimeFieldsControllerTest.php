<?php

class DateTimeFieldsControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day019');
        $this->assertResponseOk();
    }
}

