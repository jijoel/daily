<?php

/**
 * @group now
 */
class MailerControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day032');
        $this->assertResponseOk();
    }
}

