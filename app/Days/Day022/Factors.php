<?php namespace Days\Day022;


class Factors
{
    public function make($value)
    {
        $n = $value;
        $factors = array();

        for ($divisor = 2; ($n > 1) && ($divisor <= bcsqrt($n)); $divisor++) {
            for (; bcmod($n, $divisor) == 0; $n = bcdiv($n,$divisor)) {
                $factors[] = $divisor;
            }
        }
        if ($n > 1)
            $factors[] = $n;

        return $factors;
    }

}
