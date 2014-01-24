<?php

/**
 * @group now
 */
class AngularGridControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day029');
        $this->assertResponseOk();
    }
}

