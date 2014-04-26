<?php


class AjaxFormControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day045');
        $this->assertResponseOk();
    }
}

