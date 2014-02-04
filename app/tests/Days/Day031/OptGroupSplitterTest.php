<?php

use Days\Day031\OptGroupSplitter;


class OptGroupSplitterTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->test = new OptGroupSplitter;
    }

    public function testCanReturnSimpleList()
    {
        $result = $this->test->split(array('foo', 'bar'));
        $this->assertEquals(array('foo', 'bar'), $result);
    }

    public function testCanReturnComputedList()
    {
        $arr = array(
            array('field1'=>'foo'),
            array('field1'=>'bar'),
        );
        $result = $this->test->split($arr, 'field1');
        $this->assertEquals(array('foo', 'bar'), $result);
    }

    public function testCanReturnListWithKeys()
    {
        $arr = array(
            array('field1'=>'key1', 'field2'=>'value1'),
            array('field1'=>'key2', 'field2'=>'value2')
        );
        $result = $this->test->split($arr, 'field2', 'field1');
        $this->assertEquals(array('key1'=>'value1','key2'=>'value2'), $result);
    }

    public function testCanReturnListWithGroupKeys()
    {
        $arr = array(
            array('id'=>1, 'title'=>'first',  'group'=>'A'),
            array('id'=>2, 'title'=>'second', 'group'=>'B'),
            array('id'=>3, 'title'=>'third',  'group'=>'A'),
            array('id'=>4, 'title'=>'fourth',  'group'=>'B'),
        );
        $result = $this->test->split($arr, 'title', 'id', 'group');
        $this->assertEquals(array(
            'A'=>array('1'=>'first','3'=>'third'),
            'B'=>array('2'=>'second','4'=>'fourth')), 
            $result);
    }


}

