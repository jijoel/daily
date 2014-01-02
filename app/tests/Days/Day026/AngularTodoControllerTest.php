<?php

/**
 * @group now
 */
class AngularTodoControllerTest extends ControllerTestCase
{
    public function testIndex()
    {
        $this->call('GET', '/day026');
        $this->assertResponseOk();
    }

    // TODO: Test storing
    // public function testStoreFails()
    // {
    //     $this->setupValidator(False);

    //     $this->call('POST', '/day026');

    //     $this->assertRedirectedToRoute('day026.index');
    //     $this->assertHasOldInput();
    //     $this->assertSessionHas('errors');
    // }

    // public function testStore()
    // {
    //     $data = array('number'=>'200');

    //     $this->call('POST', '/day022', $data);

    //     $this->assertRedirectedToRoute('day022.index');
    // }
}

