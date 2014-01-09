<?php


class StringWrapControllerTest extends ControllerTestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day025');
        $this->assertResponseOk();
    }

    public function testStoreFails()
    {
        $this->setupValidator(False);

        $this->call('POST', '/day025');

        $this->assertRedirectedToRoute('day025.index');
        $this->assertHasOldInput();
        $this->assertSessionHas('errors');
    }

    public function testStore()
    {
        $data = array('number'=>'200');

        $this->call('POST', '/day022', $data);

        $this->assertRedirectedToRoute('day022.index');
    }
}

