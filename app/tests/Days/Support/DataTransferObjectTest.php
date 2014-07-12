<?php

use Days\Support\DataTransferObject;


class DataTransferObjectTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->test = new DataTransferObject([]);
    }

    public function testCanLoadArrayDataInConstructor()
    {
        $this->test = new DataTransferObject(['foo'=>'bar']);
        $this->assertSame('bar', $this->test['foo']);
    }

    public function testCanLoadClassDataInConstructor()
    {
        $data = new StdClass;
        $data->foo = 'bar';

        $this->test = new DataTransferObject($data);
        $this->assertSame('bar', $this->test['foo']);
    }

    public function testCanLoadDataAsArray()
    {
        $this->test['foo'] = 'bar';
        $this->assertSame('bar', $this->test['foo']);
    }

    public function testMissingDataReturnsDefaultValue()
    {
        $this->assertSame('', $this->test->foo);
        $this->assertSame('', $this->test['foo']);
    }

    public function testCanGetDataByName()
    {
        $this->test['foo'] = 'bar';
        $this->assertSame('bar', $this->test->foo);
    }

    public function testCanSetDataByName()
    {
        $this->test->foo = 'bar';
        $this->assertSame('bar', $this->test['foo']);
    }

    public function testCanReturnArray()
    {
        $this->test->foo='bar';
        $this->assertSame(['foo'=>'bar'], $this->test->toArray());
    }

    public function testCanReturnJson()
    {
        $this->test->foo = 'bar';
        $this->assertSame('{"foo":"bar"}', $this->test->toJson());
        $this->assertEquals('{"foo":"bar"}', $this->test);
    }

}

