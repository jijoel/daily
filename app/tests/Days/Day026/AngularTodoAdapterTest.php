<?php

use Days\Day026\AngularTodoAdapter;

/**
 * @group now
 */
class AngularTodoAdapterTest extends AdapterTestCase
{
    public function testSendFailMessageWhenValidationFails()
    {
        $this->setupValidator(False);

        $listener = Mockery::mock('Listener');
        $listener->shouldReceive('storeFailed')->once();

        $adapter = new AngularTodoAdapter($listener);

        $adapter->store();
    }

    public function testRunPrincipalAndSendSuccessMessage()
    {
        $principal = Mockery::mock('Principal')
            ->shouldReceive('store')->once()
            // ->andReturn('before_translation')
            ->getMock();

        $listener = Mockery::mock('Listener')
            ->shouldReceive('storeSucceeded')->once()
            // ->with('after_translation')
            ->getMock();
        
        $adapter = new AngularTodoAdapter($listener, $principal);
        Input::replace(array('field'=>'foo'));
        $this->setupValidator(True);

        $adapter->store();
    }
}

