<?php

/**
 * @group now
 */
class AngularListDetailControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day027');
        $this->assertResponseOk();
    }
}

