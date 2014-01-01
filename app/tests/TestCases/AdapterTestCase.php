<?php

class AdapterTestCase extends TestCase
{

    protected function setupValidator($returnValue, $returnErrs=array())
    {
        Validator::shouldReceive('make')->once()
            ->andReturn(Mockery::mock(array(
                'passes'=>$returnValue, 
                'errors'=>$returnErrs,
            )));
    }    

}
