<?php

use Days\Support\DateRange;
use Carbon\Carbon;


// class DateRangeTest extends PhpUnit_Framework_TestCase
class DateRangeTest extends TestCase
{
    const DATE_ORDER_EXCEPTION = 'Days\Support\DateOrderException';

    const DATE_NA = '(n/a)';
    const DATE_NOW = 'now';

    const DATE1_TINY  = '1/2/14';
    const DATE1_SHORT = '1/2/2014';
    const DATE1_LONG  = '2014-01-02 4:20pm';
    const DATE1_SQL   = '2014-01-02';
    const DATE1_TS    = '1388679600';
    const DATE1_TITLE = 'Thursday, January 2, 2014';

    const DATE2_TINY  = '1/5/14';
    const DATE2_SHORT = '1/5/2014';
    const DATE2_LONG  = '2014-01-05 4:20pm';
    const DATE2_SQL   = '2014-01-05';
    const DATE2_TITLE = 'Sunday, January 5, 2014';

    private $now;

    public function setUp()
    {
        parent::setUp();

        $this->now = Carbon::parse(self::DATE1_LONG);
        Carbon::setTestNow($this->now);
    }

    public function tearDown()
    {
        Carbon::setTestNow();
    }

    public function testExists(){}

    public function testShouldDefaultToNow()
    {
        $test = new DateRange();

        $this->assertEquals($this->now, $test->start());
        $this->assertEquals($this->now, $test->end());

        $this->assertEquals($this->now, $test->start);
        $this->assertEquals($this->now, $test->end);        
    }

    public function testConstructorShouldAcceptString()
    {
        $string = self::DATE1_SHORT;
        $carbon = Carbon::parse($string);

        $test = new DateRange($string);   // as a string
        $this->assertEquals($carbon, $test->start);

        $test = new DateRange($carbon);  // as a Carbon object
        $this->assertEquals($carbon, $test->start);
    }

    public function testConstructorShouldAcceptTimestamp()
    {
        $carbon = Carbon::createFromTimestamp(self::DATE1_TS);

        $test = new DateRange(self::DATE1_TS);
        $this->assertEquals($carbon, $test->start);
    }

    public function testConstructorShouldAcceptDateTimeObject()
    {
        $dt = new DateTime("2014-01-09 11:14:15.638276");
        $carbon = Carbon::instance($dt);

        $test = new DateRange($dt);
        $this->assertEquals($carbon, $test->start);
    }

    public function testEndDateSetToStartDateByDefault()
    {
        $string = self::DATE1_SHORT;
        $carbon = Carbon::parse($string);

        $test = new DateRange($string);   // as a string
        $this->assertEquals($carbon, $test->start);        
        $this->assertEquals($carbon, $test->end);        
    }

    public function testEndDateCanBeSetIndependently()
    {
        $start = self::DATE1_SHORT;
        $end = self::DATE2_SHORT;

        $test = new DateRange(self::DATE1_TINY, $end);
        $this->assertEquals(Carbon::parse($start), $test->start);
        $this->assertEquals(Carbon::parse($end), $test->end);
    }

    public function testThrowExceptionIfEndPreceedsStart()
    {
        $this->setExpectedException(self::DATE_ORDER_EXCEPTION);
        $test = new DateRange(self::DATE2_SHORT, self::DATE1_SHORT);
    }

    public function testConstructorShouldAcceptNonApplicableValue()
    {
        $test = new DateRange(DateRange::NONE, Null);

        $this->assertEquals(self::DATE_NA, $test->start);
        $this->assertEquals(self::DATE_NA, $test->end);
    }

    public function testShouldBeAbleToFormatDateWithNotationalString()
    {
        $test = new DateRange(self::DATE1_TINY, Null);

        $this->assertEquals(self::DATE1_SHORT, $test->formatDate($test->start, 'short'));
    }

    public function testShouldReturnSingleFormattedDate()
    {
        $test = new DateRange(self::DATE1_TINY);
        $this->assertEquals(self::DATE1_SHORT, $test->start_short);
    }

    public function testShouldReturnSingleFormattedDateFromRange()
    {
        $test = new DateRange(self::DATE1_TINY,self::DATE1_SHORT);
        $this->assertEquals(self::DATE1_SHORT, $test->range_short);
        $this->assertEquals(self::DATE1_SHORT, $test->short);
    }

    public function testShouldReturnFormattedDateRange()
    {
        $test = new DateRange(self::DATE1_TINY,self::DATE2_TINY);
        $this->assertEquals(self::DATE1_SHORT.' &ndash; '.self::DATE2_SHORT, 
            $test->range_short);
    }

    public function testShouldReturnFormattedDateWithTitle()
    {
        $test = new DateRange(self::DATE1_TINY);
        $this->assertEquals('For '.self::DATE1_SHORT, $test->short_title);
    }

    public function testShouldReturnFormattedDateWithFullTitle()
    {
        $test = new DateRange(self::DATE1_TINY);
        $this->assertEquals('For '.self::DATE1_TITLE, $test->title);
    }

    /**
     * @dataProvider getDatesForConstructor
     */
    public function testConstructorWithDates(
        $start, $end, $expectedStart, $expectedEnd
    ){
        $test = new DateRange($start, $end);

        $this->assertEquals($expectedStart, $test->start_sql);
        $this->assertEquals($expectedEnd, $test->end_sql);
    }

    public function getDatesForConstructor()
    {
        return array(
            [Null,           Null,           self::DATE1_SQL,self::DATE1_SQL],
            [Null,           self::DATE2_SQL,self::DATE1_SQL,self::DATE2_SQL],
            [self::DATE1_SQL,Null,           self::DATE1_SQL,self::DATE1_SQL],
            [self::DATE1_TS, Null,           self::DATE1_SQL,self::DATE1_SQL],
            [self::DATE_NOW, Null,           self::DATE1_SQL,self::DATE1_SQL],
            [self::DATE1_SQL,self::DATE1_SQL,self::DATE1_SQL,self::DATE1_SQL],
            [self::DATE1_SQL,self::DATE2_SQL,self::DATE1_SQL,self::DATE2_SQL],
            [self::DATE_NOW, self::DATE2_SQL,self::DATE1_SQL,self::DATE2_SQL],
            [self::DATE1_TINY,self::DATE2_TINY,self::DATE1_SQL,self::DATE2_SQL],
            [self::DATE1_SHORT,self::DATE2_SHORT,self::DATE1_SQL,self::DATE2_SQL],
            [self::DATE1_LONG,self::DATE2_LONG,self::DATE1_SQL,self::DATE2_SQL],
            [Carbon::parse(self::DATE1_TINY), Carbon::parse(self::DATE2_TINY),
             self::DATE1_SQL, self::DATE2_SQL],
        );
    }

    /**
     * @dataProvider getFormattedData
     */
    public function testFormatting($in, $out, $format, $expected)
    {
        $test = new DateRange($in, $out);

        $this->assertSame($expected, $test->$format);
    }

    public function getFormattedData()
    {
        return array(
            [self::DATE1_TINY,Null, 'foo', self::DATE1_SHORT],  // default
            [self::DATE1_TINY,Null, 'start_foo', self::DATE1_SHORT],
            [self::DATE1_TINY,Null, 'start_tiny', self::DATE1_TINY],
            [self::DATE1_TINY,Null, 'start_short', self::DATE1_SHORT],
            [self::DATE1_TINY,Null, 'short_title', 'For '.self::DATE1_SHORT],
            [self::DATE1_TINY,Null, 'start_title', 'For '.self::DATE1_TITLE],

            [DateRange::NONE, Null, 'start', '(n/a)'],
            [DateRange::NONE, Null, 'end', '(n/a)'],
            [DateRange::NONE, Null, 'start_sql', Null],
            [DateRange::NONE, Null, 'end_sql', Null],

            [DateRange::NONE,self::DATE2_TINY, 'end_sql', self::DATE2_SQL],
            [Null,self::DATE2_TINY, 'end_tiny', self::DATE2_TINY],

            [self::DATE1_TINY,self::DATE2_TINY, 'short', 
             self::DATE1_SHORT.' &ndash; '.SELF::DATE2_SHORT],
            [self::DATE1_TINY,self::DATE2_TINY, 'range_short', 
             self::DATE1_SHORT.' &ndash; '.SELF::DATE2_SHORT],

            [self::DATE1_TINY,self::DATE2_TINY, 'short_title', 
             'From '.self::DATE1_SHORT.' to '.SELF::DATE2_SHORT],
            [self::DATE1_TINY,self::DATE2_TINY, 'range_short_title', 
             'From '.self::DATE1_SHORT.' to '.SELF::DATE2_SHORT],

            [self::DATE1_TINY,self::DATE2_TINY, 'title', 
             'From '.self::DATE1_TITLE.' to '.SELF::DATE2_TITLE],
            [self::DATE1_TINY,self::DATE2_TINY, 'range_title', 
             'From '.self::DATE1_TITLE.' to '.SELF::DATE2_TITLE],

            [self::DATE1_TINY,self::DATE2_TINY, 'url', 
             'start='.self::DATE1_SQL.'&end='.SELF::DATE2_SQL],
        );
    }

    /**
     * @dataProvider getRecordsToCheckForSameDay
     */
    public function testSameDay($start, $end, $expected)
    {
        $test = new DateRange($start, $end);
        $this->assertEquals($expected, $test->isSameDay());
        $this->assertEquals($expected, $test->onSameDay());
    }

    public function getRecordsToCheckForSameDay()
    {
        return array(
            [self::DATE1_SQL, self::DATE1_SQL, True],  // same dates
            [self::DATE1_SQL, self::DATE2_SQL, False], // diff dates
            [self::DATE1_SQL, self::DATE1_LONG, True], // same date, w/datetime
            [self::DATE1_LONG, self::DATE2_SQL, False], // diff date, w/datetime
            [DateRange::NONE, DateRange::NONE, True], // no date for either
            [self::DATE1_SQL, DateRange::NONE, True], // no date? always match
        );
    }

    public function testCanRepresentFullDay()
    {
        $test = new DateRange(self::DATE1_LONG,Null);

        $test->fullDay();
        $this->assertEquals(self::DATE1_SQL.' 00:00:00', $test->start_full);
        $this->assertEquals(self::DATE1_SQL.' 23:59:59', $test->end_full);
    }

    /**
     * @dataProvider getOverlappingDates
     */
    public function testOverlappingDates($start1, $end1, $expected)
    {
        $test1 = new DateRange($start1, $end1);
        $test2 = new DateRange('1/4/2014', '1/8/2014');

        $this->assertSame($expected, $test1->overlaps($test2));
        $this->assertSame($expected, $test2->overlaps($test1));
    }

    public function getOverlappingDates()
    {
        return array(
            ['1/1/2014', '1/2/2014', False],
            ['1/1/2014', '1/5/2014', True],
            ['1/5/2014', '1/6/2014', True],
            ['1/7/2014', '1/9/2014', True],
            ['1/8/2014', '1/9/2014', False],
            ['1/9/2014', '1/10/2014', False],
        );
    }

    /**
     * @dataProvider getAdjacentDates
     */
    public function testAdjacency($start1, $end1, $expected)
    {
        $test1 = new DateRange($start1, $end1);
        $test2 = new DateRange('1/4/2014', '1/8/2014');

        $this->assertSame($expected, $test1->isAdjacentTo($test2));
    }

    public function getAdjacentDates()
    {
        return array(
            ['1/1/2014','1/2/2014', False],
            ['1/1/2014','1/4/2014', True],
            ['1/8/2014','1/9/2014', True],
            ['1/9/2014','1/10/2014', False],
        );
    }

    public function testShouldBeAbleToGetDifferenceInDaysViaClosure()
    {
        $test = new DateRange(self::DATE1_SHORT, self::DATE2_SHORT);
        $this->assertEquals(3, $test->days);
    }

    public function testShouldGetDecimalTimeViaClosure()
    {
        $test = new DateRange('10:00am', '10:30am');
        $this->assertEquals(10, $test->decimal);
        $this->assertEquals(10, $test->start_decimal);
        $this->assertEquals(10.5, $test->end_decimal);
    }
}

