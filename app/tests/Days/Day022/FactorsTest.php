<?php

use Days\Day022\Factors;


class FactorsTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getNumbersToFactor
     */
    public function testFactors($test, array $expected)
    {
        $factors = new Factors;

        $this->assertEquals($expected, $factors->make($test));
    }

    public function getNumbersToFactor()
    {
        return array(
            array('', array()),
            array(-1, array()),
            array(0, array()),
            array(1, array()),
            array(2, array(2)),
            array(3, array(3)),
            array(4, array(2,2)),
            array(5, array(5)),
            array(6, array(2,3)),
            array(7, array(7)),
            array(8, array(2,2,2)),
            array(9, array(3,3)),
            array(10, array(2,5)),
            array(83, array(83)),
            array(90, array(2,3,3,5)),
            array(900, array(2,2,3,3,5,5)),
            array(984, array(2,2,2,3,41)),
            array(192892, array(2,2,7,83,83)),
            array(2*2*2*5*7*13*13*17, array(2,2,2,5,7,13,13,17)),
            array(1934234891, array(17,113778523)),
            // array(19342323423892, array(2,2,7,53,521,4691,5333)),    // Windows sees this as a floating-point number
        );
    }

}