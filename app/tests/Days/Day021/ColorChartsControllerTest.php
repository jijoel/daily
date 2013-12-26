<?php

/**
 * @group now
 */
class ColorChartsControllerTest extends ControllerTestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day021');
        $this->assertResponseOk();
    }

    public function testStore()
    {
        $input = array('colors'=>'039');

        $this->call('POST', '/day021', $input);
        $this->assertRedirectedToRoute('day021.index');
    }

    public function testStoreFails()
    {
        $input = array('colors'=>'xkcdfoo');

        $this->call('POST', '/day021', $input);
        $this->assertRedirectedToRoute('day021.index');
        $this->assertSessionHas('errors');
    }
    
}

