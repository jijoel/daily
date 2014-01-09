<?php

use Days\Day025\StringWrapAdapter;


class StringWrapAdapterTest extends AdapterTestCase
{
    public function testFalse()
    {
        $this->assertTrue(True);
    }

    public function testSendFailMessageWhenValidationFails()
    {
        $this->setupValidator(False);

        $listener = Mockery::mock('Listener');
        $listener->shouldReceive('storeFailed')->once();

        $adapter = new StringWrapAdapter($listener);

        $adapter->store();
    }

    public function testRunPrincipalAndSendSuccessMessage()
    {
        $listener = Mockery::mock('Listener');
        $listener->shouldReceive('storeSucceeded')->once()->with('foo<br>bar');
        $principal = Mockery::mock('Principal');
        $principal->shouldReceive('wrap')->once()->andReturn('foo\nbar');
        
        $adapter = new StringWrapAdapter($listener, $principal);
        Input::replace(array('text'=>'foo', 'length'=>2));
        $this->setupValidator(True);

        $adapter->store();
    }
}
