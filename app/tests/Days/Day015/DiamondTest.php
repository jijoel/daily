<?php

use Days\Day015\Diamond;


class DiamondTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getDiamonds
     */
    public function testDiamondLine($test, $line, $expected)
    {
        $diamond = new Diamond;
        $result = explode(PHP_EOL, $diamond->build($test));
        $this->assertEquals($expected, $result[$line-1]);
    }

    public function getDiamonds()
    {
        return array(
            array('A', 1, 'A'),

            array('B', 1, ' A'),
            array('B', 2, 'B B'),
            array('B', 3, ' A'),

            array('C', 1, '  A'),
            array('C', 2, ' B B'),
            array('C', 3, 'C   C'),
            array('C', 4, ' B B'),
            array('C', 5, '  A'),

            array('D', 1, '   A'),
            array('D', 2, '  B B'),
            array('D', 3, ' C   C'),
            array('D', 4, 'D     D'),
            array('D', 5, ' C   C'),
            array('D', 6, '  B B'),
            array('D', 7, '   A'),
        );
    }
}

