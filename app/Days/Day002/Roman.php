<?php namespace Days\Day002;


class Roman
{
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
