<?php


class OptGroupSplitterControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day031');
        $this->assertResponseOk();
    }
}

