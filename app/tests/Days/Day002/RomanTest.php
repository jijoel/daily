<?php

use Days\Day002\Roman;

class RomanTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getValueMap
     */
    public function testRomanValuesConvertedCorrectly($decimal, $expected)
    {
        $roman = new Roman;
        $this->assertEquals($expected, $roman->convertToRoman($decimal));
    }

    /**
     * @expectedException OutOfRangeException
     */
    public function testValueOutOfRange()
    {
        $test = new Roman;
        $test->convertToRoman(4000);
    }

    public function testNegativeNumberShouldReturnBlank()
    {
        $test = new Roman;
        $this->assertEquals('', $test->convertToRoman(-5));
    }

    public function getValueMap()
    {
        return array(
            array(1, 'I'),
            array(2, 'II'),
            array(3, 'III'),
            array(4, 'IV'),
            array(5, 'V'),
            array(6, 'VI'),
            array(9, 'IX'),
            array(10, 'X'),
            array(20, 'XX'),
            array(40, 'XL'),
            array(50, 'L'),
            array(90, 'XC'),
            array(100, 'C'),
            array(400, 'CD'),
            array(500, 'D'),
            array(900, 'CM'),
            array(1000, 'M'),
        );
    }
}