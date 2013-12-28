<?php namespace Days\Day021;


class ColorChart
{
    const MAX_COLS = 20;

    public function make($str)
    {
        if (! $str) return;

        return $this->splitIntoRows($this->colorCodes($str));
    }

    private function splitIntoRows(array $codes)
    {
        $sections = pow(count($codes)+1, 1/3);
        if (pow($sections,2) > self::MAX_COLS)
            return array_chunk($codes, $sections * floor(self::MAX_COLS/$sections));

        return array_chunk($codes, $sections * $sections);
    }

    public function colorCodes($str)
    {
        $letters = array_unique(str_split($str));
        sort($letters);

        $colorCodes = array();
        for ($red=0; $red<count($letters); $red++) {
            for ($green=0; $green<count($letters); $green++) {
                for ($blue=0; $blue<count($letters); $blue++) {
                    $colorCodes[] = '#'
                      . $letters[$red]
                      . $letters[$green] 
                      . $letters[$blue];
                }
            }
        }
        return $colorCodes;
    }

}
