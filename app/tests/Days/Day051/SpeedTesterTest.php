<?php

use Days\Day051\SpeedTester;


class SpeedTesterTest extends DomainTestCase
{
    public function setUp()
    {
        $this->test = new SpeedTester;
    }

    public function testExists(){}

    public function testGetResultsReturnsProperlyFormattedArray()
    {
        $result = $this->test->get();

        $this->assertTrue(is_array($result));

        foreach($result as $item) {
            $this->assertNotEmpty($item->title);
            $this->assertNotEmpty($item->result);
            $this->assertNotEmpty($item->code);
        }
    }

}
