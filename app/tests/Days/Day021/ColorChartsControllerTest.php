<?php

/**
 * @group now
 */
class ColorChartsControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day021');
        $this->assertResponseOk();
    }

    public function testStore()
    {
        $input = array('039');

        $this->call('POST', '/day021', $input);
        $this->assertResponseOk();
    }
}

