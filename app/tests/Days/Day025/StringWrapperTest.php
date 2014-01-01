<?php

use Days\Day025\StringWrapper;


class StringWrapperTest extends TestCase
{
    /**
     * @dataProvider getDataToWrap
     */
    public function testWrapperResults($length, $string, $expected)
    {
        $this->test = new StringWrapper;
        $this->assertSame($expected, $this->test->wrap($string, $length));
    }

    public function getDataToWrap()
    {
        return array(
            // length, string, result
            array(Null, Null, ''),
            array(1,    'x',  'x'),
            array(1,    'xx',  'x\nx'),
            array(2,    'x x',  'x\nx'),
            array(3,    'x xx', 'x\nxx'),
            array(3,    'x x x', 'x x\nx'),
            array(4,    'xxxx x x', 'xxxx\nx x'),
            array(4,    'xx x y y z zz z', 'xx x\ny y\nz zz\nz'),
        );
    }

}
