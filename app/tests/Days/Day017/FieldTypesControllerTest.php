<?php

use Days\Day017\FieldTypesController;


/**
 * @group now
 */
class FieldTypesControllerTest extends ControllerTestCase
{
    public function testCreateController()
    {
        $test = new FieldTypesController;
    }

    public function testIndex()
    {
        $response = $this->call('GET', 'day017');

        $this->assertIsView($response->original);
    }

}
