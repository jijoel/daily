<?php namespace Days\Day002;


class Roman
{
    const MAX_DECIMAL = 3999;

    private $map = array(
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90  => 'XC',
        50  => 'L',
        40  => 'XL',
        10  => 'X',
        9   => 'IX',
        5   => 'V',
        4   => 'IV',
        1   => 'I',
    );

    public function convertToRoman($decimal)
    {
        if (($decimal) > self::MAX_DECIMAL) {
            throw new \OutOfRangeException('The number you entered is too large. Please use a smaller number');
        }

        $roman = '';

        foreach($this->map as $key=>$value) {
            while($decimal >= $key) {
                $decimal -= $key;
                $roman .= $value;
            }
        }
        return $roman;
    }    
}
