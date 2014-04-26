<?php

/**
 * @group now
 */
class FactorsControllerTest extends ControllerTestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day022');
        $this->assertResponseOk();
    }

    public function testStoreFails()
    {
        $this->setupValidator(False);

        $this->call('POST', '/day022');

        $this->assertRedirectedToRoute('day022.index');
        $this->assertHasOldInput();
        $this->assertSessionHas('errors');
    }

    public function testStore()
    {
        $data = array('number'=>'200');

        $this->call('POST', '/day022', $data);

        $this->assertRedirectedToRoute('day022.index');
    }

    public function testStoreHandlesWhitespace()
    {
        $this->call('POST', '/day022', array('number', '200 '));
        $this->assertRedirectedToRoute('day022.index');        
    }
}

