<?php namespace Days\Support;

use App;
use DateTime;
use Carbon\Carbon;


class DateRange
{
    const NONE = -1;

    protected $config;
    protected $start;
    protected $end;

    public function __construct($start=Null, $end=Null)
    {
        $this->config = App::make('config');  // can I unload this somehow???
        $this->setDates($start, $end);
    }

    // public static function make($start=Null, $end=Null)
    // {
    //     return new self($start, $end);
    // }

    public function setDates($start, $end)
    {
        if (! $end)
            $end = $start;

        $this->start = $this->setDate($start);
        $this->end = $this->setDate($end);

        if ($this->canCompareDates() && $this->start->gt($this->end))
            throw new DateOrderException('Start date must precede end date');
    }

    private function setDate($date)
    {
        if ($date instanceof Carbon)
            return $date;

        if ($date instanceof DateTime)
            return Carbon::instance($date);

        if ($date == self::NONE)
            return $this->getConfig('none.default');

        if (is_numeric($date))
            return Carbon::createFromTimestamp($date);

        return Carbon::parse($date);
    }

    private function getConfig($value, $default='')
    {
        return $this->config->get('date-range.'.$value, $default);
    }

    public function start()
    {
        return $this->start;
    }

    public function end()
    {
        return $this->end;
    }

    public function isSameDay()
    {
        if ( ! $this->canCompareDates())
            return True;

        if ($this->start == $this->end)
            return True;

        return $this->start->copy()->startOfDay()
            ->eq($this->end->copy()->startOfDay());
    }

    public function onSameDay()
    {
        return $this->isSameDay();
    }

    private function canCompareDates()
    {
        return $this->start instanceof Carbon && $this->end instanceof Carbon;
    }

    public function fullDay()
    {
        $this->start->startOfDay();
        $this->end->endOfDay();

        return $this;
    }

    // public function days()
    // {
    //     return $this->end->diffInDays($this->start);
    // }

    public function overlaps(DateRange $other)
    {
        return ($this->start->lt($other->end)
            && $this->end->gt($other->start));
    }



    public function isAdjacentTo(DateRange $other)
    {
        return ($this->start->eq($other->end)
            || $this->end->eq($other->start));
    }




// Get formatted output -------------------------------------------------------

    public function __get($name)
    {
        if (method_exists($this, $name)) 
            return $this->$name();

        list($value, $format) = $this->getComponentsToFormat($name);
        if ($value == 'range')
            return $this->formatRange($format);

        $prefix = $this->getConfig("range.$format.only");
        if ($prefix)
            return $prefix.$this->formatDate($this->$value(), $format);
        
        return $this->formatDate($this->$value(), $format);
    }

    private function getComponentsToFormat($value)
    {
        foreach(['start','end','range'] as $date)
            if (strpos($value, $date) === 0)
                return array($date, substr($value, strlen($date)+1));

        return array('range', $value);
    }

    public function formatDate($date, $format)
    {
        if ( ! is_object($date)) {
            $defaultForFormat = $this->getConfig('none.'.$format, '(n/a)');
            return ($defaultForFormat<>'(n/a)') ? $defaultForFormat : $date;            
        }

        $dateFormat = $this->getConfig('formats.'.$format);
        if ($dateFormat)
            return $date->format($dateFormat);

        return $date->format($this->getConfig('formats.default'));
    }

    private function formatRange($format)
    {
        list($delimiters, $dateFormat) = $this->getRangeDelimitersAndFormat($format);

        if ($this->start == $this->end)
            return $delimiters['only'] . $this->formatDate($this->start, $dateFormat);

        return $delimiters['before']
            . $this->formatDate($this->start, $dateFormat)
            . $delimiters['middle'] 
            . $this->formatDate($this->end, $dateFormat)
            . $delimiters['end'];
    }

    private function getRangeDelimitersAndFormat($format)
    {
        if ( ! strpos($format, '_')) 
            return array($this->getRangeDelimiters($format), $format);

        $parts = explode('_', $format);        
        list($dateFormat, $rangeFormat) = $parts;
        return array($this->getRangeDelimiters($rangeFormat), $dateFormat);
    }

    private function getRangeDelimiters($format)
    {
        $delimiters = $this->getConfig('range.'.$format);
        if ($delimiters)
            return $delimiters;

        return $this->getConfig('range.default');
    }

}
