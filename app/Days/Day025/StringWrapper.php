<?php namespace Days\Day025;


class StringWrapper
{
    public function wrap($text, $length=80)
    {
        if (! $text)
            return '';

        if (strlen($text) <= $length) 
            return $text;

        $break = strrpos(substr($text, 0, $length+1), ' ') ?: $length;
        return substr($text,0,$break) . '\n' 
            . $this->wrap(trim(substr($text,$break)), $length) ;
    }
}

