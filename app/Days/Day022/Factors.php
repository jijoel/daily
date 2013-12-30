<?php namespace Days\Day022;


class Factors
{
    public function make($n)
    {
        $factors = array();

        for ($divisor = 2; ($n > 1) && ($divisor <= sqrt($n)); $divisor++) {
            for (; $n % $divisor == 0; $n /= $divisor) {
                $factors[] = $divisor;
            }
        }
        if ($n > 1)
            $factors[] = $n;

        return $factors;
    }

}
