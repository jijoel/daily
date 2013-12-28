<?php

use Days\Day021\ColorChart;


class Day021_ColorChartTest extends PHPUnit_Framework_TestCase
{
    private $chart;

    public function setUp()
    {
        $this->chart = new ColorChart;
    }

    public function testEmptyReturnsNull()
    {
        $this->assertNull($this->chart->make(''));
    }

    public function testGetChartResultForSingleLetter()
    {
        $result = $this->chart->make('A');

        $this->assertContains('#AAA', $result[0]);
        $this->assertCount(1, $result);
    }

    public function testGetCodeArrayForTwoLetters()
    {
        $result = $this->chart->colorCodes('AB');

        $this->assertContains('#AAA', $result);
        $this->assertContains('#AAB', $result);
        $this->assertCount(8, $result);

        $this->assertEquals(array(
            '#AAA', '#AAB', '#ABA', '#ABB',
            '#BAA', '#BAB', '#BBA', '#BBB'),
            $this->chart->colorCodes('AB'));
    }

    public function testGetCodeArrayForThreeLetters()
    {
        $result = $this->chart->colorCodes('ABC');

        $this->assertContains('#AAA', $result);
        $this->assertContains('#ABC', $result);
        $this->assertContains('#CAB', $result);
        $this->assertCount(27, $result);
    }

    public function testGetCodeArrayForFourLetters()
    {
        $result = $this->chart->colorCodes('ABCD');

        $this->assertContains('#AAA', $result);
        $this->assertContains('#ABC', $result);
        $this->assertContains('#CBD', $result);
        $this->assertCount(64, $result);
    }

    public function testGetChartResultForTwoLetters()
    {
        $result = $this->chart->make('AB');

        $this->assertContains('#ABA', $result[0]);
        $this->assertContains('#BAB', $result[1]);
    }

    public function testGetChartResultForThreeLetters()
    {
        $result = $this->chart->make('ABC');

        $this->assertContains('#ABC', $result[0]);
        $this->assertContains('#BAC', $result[1]);
        $this->assertContains('#CAB', $result[2]);
    }

    /**
     * @dataProvider getRowCountData
     */
    public function testRowCount($expectedRows, $letters)
    {
        $this->assertCount($expectedRows, $this->chart->make($letters));
    }

    public function getRowCountData()
    {
        return array(
            array(1,  'A'),
            array(2,  'AB'),
            array(3,  'ABC'),
            array(4,  'ABCD'),
            array(9,  'ABCDE'),
            array(12, 'ABCDEF'),
            array(25, '0ABCDEF'),
            array(32, '01ABCDEF'),
            array(41, '012ABCDEF'),
            array(100, '0123ABCDEF'),
            array(121, '01234ABCDEF'),
            array(144, '012345ABCDEF'),
            array(169, '0123456ABCDEF'),
            array(196, '01234567ABCDEF'),
            array(225, '012345678ABCDEF'),
            array(256, '0123456789ABCDEF'),
        );
    }

}
